<?php
/**
 * For log any variables in your php program,
 *     and view these logs in web browser.
 * Copyright (C) 2009 DengZhiYi 
 * 
 * Licensed under the terms of the GNU General Public License:
 *      http://www.opensource.org/licenses/gpl-license.php
 * @license  GPL
 * 
 * @link     https://sourceforge.net/project/phplog/
 * @version  1.0.0
 * @author   DengZhiYi<altsee@gmail.com>
 *           Special thanks stone<stone.pei@gmail.com> suggest adding stack trace.
 * @since    2009/08/24, @GuangZhou of China
 */

if( ! function_exists('__log') ){

$__phplog_config = array(
	'enable' => true,
	// now we only support using mysql, file to store log
	'use_file_storage' => true,
	
	// using a directory to store log files.
	'file' => array(
		'phplog_save_path' => 'd:/www/debug_log/',
	),
	
	// using database to store log files.
	'database' => array(
		'dbhost' => 'localhost',
		'dbuser' => 'root',
		'dbpass' => 'root',
	
		// if you do not specify the dbname and table, will create it for for you.
		'dbname' => 'wei',
		'dbtable' => '_phplog_table',
	),
	
	// You can enable below line after ensure this line will not affect your program.
	// if been set, we will using date_default_timezone_set('PRC') for you;  // The People's Republic of China 
	'timezone' => '', 
);

// this function name is a alias of __log, you can change it's name if you do not like __log.^_^
// For example, you can define this function name => system_log, then you can using system_log to log in any place.
function you_can_rename_this_function_name_to_what_you_like(){
	$args = func_get_args();
	return call_user_func_array('__log', $args);
}

// Okay, the __log function
function __log(){
	global $__phplog_config;
	
	if( version_compare( PHP_VERSION, '5.1.0', '<' ) ){
		$__phplog_config['timezone'] = false;
	}
	
	$config = $__phplog_config;
	
	if( $config['use_file_storage'] ){
		$store_in_file = true;
	}else{
		$store_in_file = false;
	}
	if( ! $config['enable'] ){
		return;
	}
	
	// use file to store info
	if( $store_in_file ){
		$log_dir = $config['file']['phplog_save_path'];
		$log_dir = rtrim(str_replace("\\", "/", $log_dir), "/") . "/";
		
		if( ! is_dir($log_dir) ) {
			return false;
		}
	// use mysql database to store!
	}else{
		$link = mysql_connect($config['database']['dbhost'], 
				$config['database']['dbuser'], 
				$config['database']['dbpass'], 
				true);
				
		if( $link === false ){
			return false;
		}
		$selected_db = mysql_select_db($config['database']['dbname'], $link);
		// if the database not exists, create it!
		if( $selected_db === false ) {
			$dbname = $config['database']['dbname'];
			$sql = "create database $dbname ";
			if( mysql_query($sql) === false )
				return false;
		}
		$sql = "show tables";
		$query = mysql_query($sql, $link);
		$tables = array();
		while($rs = mysql_fetch_row($query)){
			$tables[] = $rs[0];
		}
		$phplog_table = $config['database']['dbtable'];
		if( ! in_array($phplog_table, $tables) ){
			$sql = "create table $phplog_table(
				id bigint(20) unsigned not null auto_increment,
				line int(11) not null default 1,
				traces text,
				data text,
				ts_date date default '0000-00-00',
				ts_time char(8),
				
				primary key(id),
				key i_log_date(ts_date)
			)";
			$create_table = mysql_query($sql, $link);
			if( $create_table === false ){
				return false;
			}
		}
	}
	
	$ER = error_reporting(0);
	// get_current_timezone_setting, next will be restore to this value
	if( $config['timezone'] ){
		$timezone = date_default_timezone_get();
		date_default_timezone_set( $config['timezone'] );
	}
	
	$debug = debug_backtrace();
	$args = func_get_args();
	
	// been aliased, then remove call_user_func_array, and __log call stack
	if( count($debug) > 1 && $debug[1]['function'] == 'call_user_func_array'){ 
		array_shift($debug);
		array_shift($debug);
	}
	
	if( count($args) == 0 ){
		$debug[0]['args'] = "Call PHPLoG without arguments,\nYou can use in this way to generate BackTrace!";
	}
	if( count($args) == 1 ){
		$debug[0]['args'] = "Only 1 argument.\nIt's value is in the below textarea!";
	}
	
	for($i = 0; $i < count($debug); $i++){
		if( isset($debug[$i]['args']) ){
			ob_start();
			print_r( $debug[$i]['args'] );
			$info = ob_get_contents();
			ob_end_clean();
			$debug[$i]['args'] = $info;
		}
		if( !empty($debug[$i]['class']) AND !empty($debug[$i]['type']) ){
			$debug[$i]['function'] = $debug[$i]['class'] . $debug[$i]['type'] . $debug[$i]['function'];
		}
	}
	
	$traces = urlencode( serialize($debug) );
	
	if( $store_in_file ){
		$file = $log_dir . date('Y-m-d') . '.log';
		$fd = fopen($file, "a+");
		flock($fd, LOCK_EX);
	}
	
	$content = '';
	foreach($args as $object){
		ob_start();
		print_r($object);
		$info = ob_get_contents();
		ob_end_clean();
		
		$data = urlencode($info);
		//unset($info);
		$ts = date("Y-m-d H:i:s");
		
		if( $store_in_file ){
			$line = "$ts> <$traces> <$data\n";
			$content = $line . $content;
		// mysql database access!
		}else{
			$date_time = explode(' ', $ts);
			$date = $date_time[0];
			$time = $date_time[1];
			
			$sql = "select max(line) from $phplog_table where ts_date='$date' limit 1";
			$query = mysql_query($sql, $link);
			$row = mysql_fetch_row($query);
			$line_number = max(0, $row[0]) + 1;
			
			$sql = "insert into $phplog_table(line, traces, data, ts_date, ts_time) 
						values('$line_number', '$traces', '$data', '$date', '$time')";
			mysql_query($sql, $link);
		}
	}
	if( empty($content) ){
		$ts = date("Y-m-d H:i:s");
		$content = "$ts> <$traces> <\n";
	}
	
	if( $config['timezone'] ){
		date_default_timezone_set( $timezone );
	}
	
	if( $store_in_file ){
		fwrite($fd, $content);
		flock($fd, LOCK_UN);
		fclose($fd);
	}else{
		mysql_close($link);
	}
	
	error_reporting($ER);
	return true;
}


/**
 * Changes
 *     Revision 1.0
 *         - Initial release
 *         - implement __log() function
 *         - implement view log from web browser
 *         - implement debug_backtrace to trace call stack and call arguments
 * 
 * @todo add group tag function
 * @todo implement mysql database store method
 * @todo reconstruct code
 * @todo add user preferece setting using cookie.
 * 
 */

// $_tmp = get_included_files();
// if( $_tmp[0] == __FILE__ )....

// Nice, avoid global variable pollution
if( array_search(__FILE__ , get_included_files()) != 0 ){
	// Been included, return! true? false? nothing?
	return true;
}

// End of been included, Begin The Cli or Page!
else{

if( ! $__phplog_config['enable'] ){
	die('PHPLog has been disabled in your project!');
}

// interface in php4, php5
class Store{
	function Store(){}
	// $date = '2009-11-09'
	function parse($date = null){}
	function parse_line($line_data){}
	function get_log_from_line($current_line){}
	function get_trace_by_line($line){}
	function get_log_by_line($line){}
	
	function delete_lines($from, $to){}
	function delete_selected_lines($selected_lines){}
	function remove_log_files(){}
	
	// count rows in a string.
	function count_rows($data){
		$data = preg_replace("/\r\n?/", "\n", $data);
		return substr_count($data, "\n");
	}
	
	function log_welcome(){
	
	$tips = <<<EOT
Congratulation, your configuration is correct!

1. You can include (phplog.php) in you program.

2. Then you can use __log() function to spy object.

3. Example: __log(), __log('Hello'), __log(\$_SERVER, \$_COOKIE), __log(apache_request_headers()), it is all okay.

4. then return to this page, you will know how to use it, it is simple but useful!

Best Regards!
EOT;
	   $copyright = <<<EOT
       PHPLog v1.0
				
Author    : DengZhiYi
Contact   : 
            Email: altsee@gmail.com
            Skype: altsee
            Msn  : altsee@hotmail.com
App Name  : PHPLog
Version   : 1.0
License   : GNU GENERAL PUBLIC LICENSE Version 3
Website   : http://sourceforge.net/projects/phplog/
Copyright : All rights reserved.
EOT;
		
		__log($copyright);
		__log($tips);
		return true;
	}
}

// Store Log in File.
class FileStore extends Store{
	var $file;
	
	function FileStore(){
		global $__phplog_config;
		
		$this->dir  = $__phplog_config['file']['phplog_save_path'];
		$this->dir = rtrim(str_replace("\\", "/", $this->dir), "/") . "/";
		if( ! file_exists($this->dir) ){
			$this->guide();
			exit;
		}
		$this->file = $this->get_last_log_filename();
		if( $this->file == false ){
			// configure right, but no file, generate one file.
			$this->welcome();
			// die();
		}
	}
	
	function parse($file = null){
		$ret = array();
		if( $file == null ){
			$file = $this->file;
		}
		$log = file($file);
		for($i = 0; $i < count($log); $i++ ){
			$ret[] = $this->parse_line($log[$i]);
		}
		return $ret;
	}
	
	function parse_line($line_data){
		$arr = explode('> <', $line_data);
		$ts = explode(' ',$arr[0]);
		$ts_time = $ts[1];
		$traces = unserialize(urldecode($arr[1]));
		$data = urldecode($arr[2]);
		return array($ts_time, $traces, $data);
	}
	
	// get log > line
	// for speed up, we return total file lines if current_line >= total line;
	function get_log_from_line($current_line){
		$log = file($this->file);
		if( count($log) <= $current_line ){
			return count($log);
		}
		$lines = array_splice($log, $current_line);
		$ret = array();
		$line = array();
		for( $i = 0; $i < count($lines); $i++ ){
			$line_data = $lines[$i];
			$line = $this->parse_line($line_data);
			
			$date = $line[0];
			$caller_file = $line[1][0]['file'];
			$caller_line = $line[1][0]['line'];
			$data = $line[2];
			$rows = $this->count_rows($data);
			
			$ret[] = array($date, $caller_file, $caller_line, $data, $rows);
		}
		return $ret;
	}
	
	// get backtrace info in a line
	function get_trace_by_line($line){	
		$log = $this->get_log_by_line($line);
		return $log[1];
	}
	
	// privated
	function get_log_by_line($line){
		$logs = file($this->file);
		return $this->parse_line($logs[$line-1]);
	}
	
		// delete from->to lines
	function delete_lines($from, $to){
		$log = file($this->file);
		
		for($i = $from - 1; $i < $to; $i++ ){
			if(isset($log[$i])) {
				unset($log[$i]);
			}
		}
		file_put_contents($this->file, join("", $log));
	}
	
	// delete selected lines
	function delete_selected_lines($selected_lines){
		$log = file($this->file);
		
		if( is_string($selected_lines) ){
			$selected_lines = explode(',', $selected_lines);
		}
		$selected_lines = array_unique($selected_lines);
		for( $i = 0; $i < count($selected_lines); $i++ ){
			$line = $selected_lines[$i] - 1;
			if( isset($log[$line]) ){
				unset($log[$line]);
			}
		}
		file_put_contents($this->file, join("", $log));
	}
	
	// remove all log files excluded current one;
	function remove_log_files(){
		// maybe should use readdir, for now not!
		$files = glob($this->dir . "*.log");
		// should exclude the user current used log file!
		$filename = '';
		$file = '';
		$arr = array();
		foreach($files as $file){
			if( $file != $this->file ){
				// check whether filename is a log file
				$filename = basename($file, ".log");
				$arr = explode("-", $filename);
				if( count($arr) == 3 && is_numeric($arr[0]) 
					&& is_numeric($arr[0]) && is_numeric($arr[0]) ){
					
					unlink($file);
				}
			}
		}
	}
	
	// private
	function get_last_log_filename(){
		$ts = time();
		$y2009 = mktime(0, 0, 0, 0, 0, 2009);
		do{
			$y_m_d = date('Y-m-d', $ts);
			$file = $this->dir . $y_m_d . '.log';
			$ts = $ts - 24 * 60 * 60;
			if( $ts < $y2009 ){
				return false;
			}
		}while( ! file_exists($file) );
		return $file;
	}
	
	// show guide message to user
	function guide(){
		$dir = $this->dir;
		$html = <<<EOT
<html><title>PHPLog</title>
	<body>
		<div style="margin-top:50px;font-size:16px;text-align:center;">
			Please ensure: The directory <b>($dir)</b> exists, and you have write permission on it, Then <b>retry</b>.
		</div>
	</body>
</html>
EOT;
		echo $html;
		exit;
	}
	
	// show welcome message in the page, so user can gain the use experience.
	function welcome(){
		if( file_exists($this->dir . date('Y-m-d') . '.log') ){
			return true;
		}
		
		$this->file = $this->dir . date('Y-m-d') . '.log';
		touch($this->file);
		
		$this->log_welcome();
	}
	
}

class DBStore extends Store{
	var $date;
	var $config;
	
	function DBStore(){
		global $__phplog_config;
		
		$this->config = $__phplog_config;
		
		$db = $this->config['database'];
		
		$link = mysql_connect($db['dbhost'], $db['dbuser'], $db['dbpass'], true);
				
		if( $link === false ){
			$title = "Cann't connect database server!";
			$this->guide($title);
			return false;
		}
		$selected_db = mysql_select_db($db['dbname'], $link);
		// if the database not exists, create it!
		if( $selected_db === false ) {
			$dbname = $db['dbname'];
			$sql = "create database $dbname ";
			if( mysql_query($sql) === false ){
				$title = "Connt Create database $dbname!";
				$this->guide($title);
				return false;
			}
		}
		$sql = "show tables";
		$query = mysql_query($sql, $link);
		$tables = array();
		while($rs = mysql_fetch_row($query)){
			$tables[] = $rs[0];
		}
		$phplog_table = $db['dbtable'];
		if( ! in_array($phplog_table, $tables) ){
			$sql = "create table $phplog_table(
				id bigint(20) unsigned not null auto_increment,
				line int(11) not null default 1,
				traces text,
				data text,
				ts_date date default '0000-00-00',
				ts_time char(8),
				
				primary key(id),
				key i_log_date(ts_date)
			)";
			$create_table = mysql_query($sql, $link);
			if( $create_table === false ){
				$title = "Connot create table $phplog_table!";
				$this->guide($title);
				return false;
			}
			$this->welcome();
		}
		// @todo, add adjust
		$sql = "select max(ts_date) as max_date from {$db['dbtable']} limit 1";
		if( $entity = $this->get_record_sql($sql) ){
			$this->date = $entity->max_date;
		}else{
			$this->date = date('Y-m-d');
		}
		
	}
	
	function parse(){
		$sql = "select * from {$this->config['database']['dbtable']} where ts_date = '{$this->date}' and line > 0 order by line asc";
		$ret = array();
		$entities = $this->get_records_sql($sql);
		if( $entities ){
			foreach( $entities as $entity ){
				$ret[] = $this->parse_line($entity);
			}
		}
		return $ret;
	}
	
	function parse_line($line_entity){
		$traces = unserialize(urldecode($line_entity->traces));
		$data = urldecode($line_entity->data);
		return array($line_entity->ts_time, $traces, $data);
	}
	
	function get_log_from_line($current_line){
		$sql = "select count(id) as count from {$this->config['database']['dbtable']} where ts_date = '{$this->date}' and line > 0";
		$log = $this->get_record_sql($sql);
		//print_r($log);
		if( $log->count <= $current_line ){
			return $log->count;
		}
		
		$sql = "select * from {$this->config['database']['dbtable']} where ts_date = '{$this->date}' and line > 0";
		$logs = $this->get_records_sql($sql);
		$lines = array_splice($logs, $current_line);
		$ret = array();
		$line = array();
		for( $i = 0; $i < count($lines); $i++ ){
			$line_data = $lines[$i];
			$line = $this->parse_line($line_data);
			
			$date = $line[0];
			$caller_file = $line[1][0]['file'];
			$caller_line = $line[1][0]['line'];
			$data = $line[2];
			$rows = $this->count_rows($data);
			
			$ret[] = array($date, $caller_file, $caller_line, $data, $rows);
		}
		return $ret;
	}
	
	// get backtrace info in a line
	function get_trace_by_line($line){	
		$log = $this->get_log_by_line($line);
		return $log[1];
	}
	
	// privated
	function get_log_by_line($line){
		$sql = "select * from {$this->config['database']['dbtable']} where ts_date = '{$this->date}' and line > 0";
		$log = $this->get_record_sql($sql);
		return $this->parse_line($log);
	}
	
	// delete from->to lines
	function delete_lines($from, $to){
		$sql = "delete from {$this->config['database']['dbtable']} where ts_date='{$this->date}' and line >= $from and line <= $to";
		$this->query($sql);
		$this->adjust_lines();
	}
	
	// delete selected lines
	function delete_selected_lines($selected_lines){
		//$log = file($this->file);
		
		if( is_string($selected_lines) ){
			$selected_lines = explode(',', $selected_lines);
		}
		$selected_lines = array_unique($selected_lines);
		
		$sql = "delete from {$this->config['database']['dbtable']} where ts_date='{$this->date}' and(";
		for($i = 0; $i < count($selected_lines); $i++ ){
			$sql .= " line='{$selected_lines[$i]}' or ";
		}
		$sql .= " 1=0) ";
		$this->query($sql);
		$this->adjust_lines();
	}
	
	// remove all log files excluded current one;
	function remove_log_files(){
		$sql = "delete from {$this->config['database']['dbtable']} where ts_date!='{$this->date}'";
		$this->query($sql);
	}
	
	function adjust_lines(){
		$sql = "select id, line from {$this->config['database']['dbtable']} where ts_date='{$this->date}' and line > 0";
		$entities = $this->get_records_sql($sql);
		$i = 1;
		foreach( $entities as $entity ){
			$sql = "update {$this->config['database']['dbtable']} set line='$i' where id='{$entity->id}'";
			$this->query($sql);
			$i++;
		}
	}
	
	// Database Operation Function
	function query($sql){
		return mysql_query($sql);
	}
	
	function get_record_sql($sql){
		$query = $this->query($sql);
		if( $query ){
			return mysql_fetch_object($query);
		}
		return false;
	}
	
	function get_records_sql($sql){
		$query = $this->query($sql);
		if($query){
			$ret = array();
			while( $rs = mysql_fetch_object($query) ){
				$ret[] = $rs;
			}
			return $ret;
		}
		return false;
	}
	
	// Message 
	function guide($title){
		echo '<center>' . $title . '</center>';
		echo '<pre>';
		print_r( $this->config );
		echo '</pre>';
		die();
	}
	
	function welcome(){
		$this->log_welcome();
	}
}

class PhpLog{
	var $handler;
	
	function PhpLog(){
		global $__phplog_config;
		
		if( $__phplog_config['use_file_storage'] ){
			$this->handler = new FileStore;
		}else{
			$this->handler = new DBStore;
		}
	}
	
	// parse current file
	function parse($file = null){
		$ret = $this->handler->parse($file);
		return $ret;
	}
	
	// parse a line, actually should say parse_data..
	// data format description
	// date> <traces> <data
	function parse_line($line_data){
		return $this->handler->parse_line($line_data);
	}

	// get log > line
	// for speed up, we return total file lines if current_line >= total line;
	function get_log_from_line($current_line){
		return $this->handler->get_log_from_line($current_line);
	}
	
	// delete from->to lines
	function delete_lines($from, $to){
		$this->handler->delete_lines($from, $to);
	}
	
	// delete selected lines
	function delete_selected_lines($selected_lines){
		$this->handler->delete_selected_lines($selected_lines);
	}
	
	// get backtrace info in a line
	function get_trace_by_line($line){
		return $this->handler->get_trace_by_line($line);
		//$log = $this->get_log_by_line($line);
		//return $log[1];
	}
	
	// remove all log files excluded current one;
	function remove_log_files(){
		$this->handler->remove_log_files();
	}
	
	// privated
	function get_log_by_line($line){
		$this->handler->get_log_by_line($line);
		//$logs = file($this->file);
		//return $this->parse_line($logs[$line-1]);
	}
	
	// count rows in a string.
	function count_rows($data){
		return $this->handler->count_rows($data);
	}
	
	// Helper Function, Template engine
	// repleace a array key => value
	// replace a object properties => value
	function template_eval($template, $params){
		$replace = array();
		
		if( is_object($params) OR is_array($params) ){
			foreach( $params as $key => $value){
				$replace += array( '{' . $key . '}' => $value);
			};
		}
		return strtr($template, $replace);
	}
	
	// Helper Function, htmlspecialchars must be more efficient, not changed for this version.
	function safe_javascript_string($str){
		$from = array("\r", "\n", "'");
		$to = array("","", "\'");
		return str_replace($from, $to, $str);
	}
	
	// Helper Function, output expire headers
	function expire_headers(){
		header('Expires: Thu, 01 Jan 1970 00:00:00 GMT');
		// HTTP/1.1
		header('Cache-Control: private, no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0, max-age=0', false);
		// HTTP/1.0
		header('Pragma: no-cache');
	}
}

// Begin The Magic
$phplog = new PhpLog();

// If been called in command line interface, echo latest 5 log to stdout;
if( php_sapi_name() == 'cli' ){
	$log = $phplog->parse();
	
	$eol = "\n";
	if( strtoupper(substr(PHP_OS, 0, 3)) == 'WIN' ){
		$eol = "\r\n";
	}
	$log = array_reverse($log);
	// output latest 5 line info the stdout
	$output = '';
	for($count = count($log), $i = $count - 1; $i > $count - 5; $i--){
		if( ! $log[$i] ) continue;
		$date = $log[$i][0];
		$traces = $log[$i][1];
		$data = $log[$i][2];
		
		$caller_file = $traces[0]['file'];
		$caller_line = $traces[0]['line'];
		$line = $i + 1;
		ob_start();
		print '[' . $line . '] [' . $date . '] [' . $caller_file . '] [' . $caller_line . "]".$eol;
		print_r($data);
		print $eol;
		$output = ob_get_contents() . $output;
		ob_clean();
	}
	print $output;
	exit;
}


?>
<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
/**
 * Converts to and from JSON format.
 *
 * JSON (JavaScript Object Notation) is a lightweight data-interchange
 * format. It is easy for humans to read and write. It is easy for machines
 * to parse and generate. It is based on a subset of the JavaScript
 * Programming Language, Standard ECMA-262 3rd Edition - December 1999.
 * This feature can also be found in  Python. JSON is a text format that is
 * completely language independent but uses conventions that are familiar
 * to programmers of the C-family of languages, including C, C++, C#, Java,
 * JavaScript, Perl, TCL, and many others. These properties make JSON an
 * ideal data-interchange language.
 *
 * This package provides a simple encoder and decoder for JSON notation. It
 * is intended for use with client-side Javascript applications that make
 * use of HTTPRequest to perform server communication functions - data can
 * be encoded into JSON notation for use in a client-side javascript, or
 * decoded from incoming Javascript requests. JSON format is native to
 * Javascript, and can be directly eval()'ed with no further parsing
 * overhead
 *
 * All strings should be in ASCII or UTF-8 format!
 *
 * LICENSE: Redistribution and use in source and binary forms, with or
 * without modification, are permitted provided that the following
 * conditions are met: Redistributions of source code must retain the
 * above copyright notice, this list of conditions and the following
 * disclaimer. Redistributions in binary form must reproduce the above
 * copyright notice, this list of conditions and the following disclaimer
 * in the documentation and/or other materials provided with the
 * distribution.
 *
 * THIS SOFTWARE IS PROVIDED ``AS IS'' AND ANY EXPRESS OR IMPLIED
 * WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN
 * NO EVENT SHALL CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS
 * OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR
 * TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE
 * USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH
 * DAMAGE.
 *
 * @category
 * @package     Services_JSON
 * @author      Michal Migurski <mike-json@teczno.com>
 * @author      Matt Knapp <mdknapp[at]gmail[dot]com>
 * @author      Brett Stimmerman <brettstimmerman[at]gmail[dot]com>
 * @copyright   2005 Michal Migurski
 * @version     CVS: $Id: JSON.php,v 1.3 2009/05/22 23:51:00 alan_k Exp $
 * @license     http://www.opensource.org/licenses/bsd-license.php
 * @link        http://pear.php.net/pepr/pepr-proposal-show.php?id=198
 */

/**
 * Marker constant for Services_JSON::decode(), used to flag stack state
 */
define('SERVICES_JSON_SLICE',   1);

/**
 * Marker constant for Services_JSON::decode(), used to flag stack state
 */
define('SERVICES_JSON_IN_STR',  2);

/**
 * Marker constant for Services_JSON::decode(), used to flag stack state
 */
define('SERVICES_JSON_IN_ARR',  3);

/**
 * Marker constant for Services_JSON::decode(), used to flag stack state
 */
define('SERVICES_JSON_IN_OBJ',  4);

/**
 * Marker constant for Services_JSON::decode(), used to flag stack state
 */
define('SERVICES_JSON_IN_CMT', 5);

/**
 * Behavior switch for Services_JSON::decode()
 */
define('SERVICES_JSON_LOOSE_TYPE', 16);

/**
 * Behavior switch for Services_JSON::decode()
 */
define('SERVICES_JSON_SUPPRESS_ERRORS', 32);

/**
 * Converts to and from JSON format.
 *
 * Brief example of use:
 *
 * <code>
 * // create a new instance of Services_JSON
 * $json = new Services_JSON();
 *
 * // convert a complexe value to JSON notation, and send it to the browser
 * $value = array('foo', 'bar', array(1, 2, 'baz'), array(3, array(4)));
 * $output = $json->encode($value);
 *
 * print($output);
 * // prints: ["foo","bar",[1,2,"baz"],[3,[4]]]
 *
 * // accept incoming POST data, assumed to be in JSON notation
 * $input = file_get_contents('php://input', 1000000);
 * $value = $json->decode($input);
 * </code>
 */
class Services_JSON
{
   /**
    * constructs a new JSON instance
    *
    * @param    int     $use    object behavior flags; combine with boolean-OR
    *
    *                           possible values:
    *                           - SERVICES_JSON_LOOSE_TYPE:  loose typing.
    *                                   "{...}" syntax creates associative arrays
    *                                   instead of objects in decode().
    *                           - SERVICES_JSON_SUPPRESS_ERRORS:  error suppression.
    *                                   Values which can't be encoded (e.g. resources)
    *                                   appear as NULL instead of throwing errors.
    *                                   By default, a deeply-nested resource will
    *                                   bubble up with an error, so all return values
    *                                   from encode() should be checked with isError()
    */
    function Services_JSON($use = 0)
    {
        $this->use = $use;
    }

   /**
    * convert a string from one UTF-16 char to one UTF-8 char
    *
    * Normally should be handled by mb_convert_encoding, but
    * provides a slower PHP-only method for installations
    * that lack the multibye string extension.
    *
    * @param    string  $utf16  UTF-16 character
    * @return   string  UTF-8 character
    * @access   private
    */
    function utf162utf8($utf16)
    {
        // oh please oh please oh please oh please oh please
        if(function_exists('mb_convert_encoding')) {
            return mb_convert_encoding($utf16, 'UTF-8', 'UTF-16');
        }

        $bytes = (ord($utf16{0}) << 8) | ord($utf16{1});

        switch(true) {
            case ((0x7F & $bytes) == $bytes):
                // this case should never be reached, because we are in ASCII range
                // see: http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                return chr(0x7F & $bytes);

            case (0x07FF & $bytes) == $bytes:
                // return a 2-byte UTF-8 character
                // see: http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                return chr(0xC0 | (($bytes >> 6) & 0x1F))
                     . chr(0x80 | ($bytes & 0x3F));

            case (0xFFFF & $bytes) == $bytes:
                // return a 3-byte UTF-8 character
                // see: http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                return chr(0xE0 | (($bytes >> 12) & 0x0F))
                     . chr(0x80 | (($bytes >> 6) & 0x3F))
                     . chr(0x80 | ($bytes & 0x3F));
        }

        // ignoring UTF-32 for now, sorry
        return '';
    }

   /**
    * convert a string from one UTF-8 char to one UTF-16 char
    *
    * Normally should be handled by mb_convert_encoding, but
    * provides a slower PHP-only method for installations
    * that lack the multibye string extension.
    *
    * @param    string  $utf8   UTF-8 character
    * @return   string  UTF-16 character
    * @access   private
    */
    function utf82utf16($utf8)
    {
        // oh please oh please oh please oh please oh please
        if(function_exists('mb_convert_encoding')) {
            return mb_convert_encoding($utf8, 'UTF-16', 'UTF-8');
        }

        switch(strlen($utf8)) {
            case 1:
                // this case should never be reached, because we are in ASCII range
                // see: http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                return $utf8;

            case 2:
                // return a UTF-16 character from a 2-byte UTF-8 char
                // see: http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                return chr(0x07 & (ord($utf8{0}) >> 2))
                     . chr((0xC0 & (ord($utf8{0}) << 6))
                         | (0x3F & ord($utf8{1})));

            case 3:
                // return a UTF-16 character from a 3-byte UTF-8 char
                // see: http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                return chr((0xF0 & (ord($utf8{0}) << 4))
                         | (0x0F & (ord($utf8{1}) >> 2)))
                     . chr((0xC0 & (ord($utf8{1}) << 6))
                         | (0x7F & ord($utf8{2})));
        }

        // ignoring UTF-32 for now, sorry
        return '';
    }

   /**
    * encodes an arbitrary variable into JSON format (and sends JSON Header)
    *
    * @param    mixed   $var    any number, boolean, string, array, or object to be encoded.
    *                           see argument 1 to Services_JSON() above for array-parsing behavior.
    *                           if var is a strng, note that encode() always expects it
    *                           to be in ASCII or UTF-8 format!
    *
    * @return   mixed   JSON string representation of input var or an error if a problem occurs
    * @access   public
    */
    function encode($var)
    {
        header('Content-type: application/x-javascript');
        return $this->_encode($var);
    }
    /**
    * encodes an arbitrary variable into JSON format without JSON Header - warning - may allow CSS!!!!)
    *
    * @param    mixed   $var    any number, boolean, string, array, or object to be encoded.
    *                           see argument 1 to Services_JSON() above for array-parsing behavior.
    *                           if var is a strng, note that encode() always expects it
    *                           to be in ASCII or UTF-8 format!
    *
    * @return   mixed   JSON string representation of input var or an error if a problem occurs
    * @access   public
    */
    function encodeUnsafe($var)
    {
        return $this->_encode($var);
    }
    /**
    * PRIVATE CODE that does the work of encodes an arbitrary variable into JSON format 
    *
    * @param    mixed   $var    any number, boolean, string, array, or object to be encoded.
    *                           see argument 1 to Services_JSON() above for array-parsing behavior.
    *                           if var is a strng, note that encode() always expects it
    *                           to be in ASCII or UTF-8 format!
    *
    * @return   mixed   JSON string representation of input var or an error if a problem occurs
    * @access   public
    */
    function _encode($var) 
    {
         
        switch (gettype($var)) {
            case 'boolean':
                return $var ? 'true' : 'false';

            case 'NULL':
                return 'null';

            case 'integer':
                return (int) $var;

            case 'double':
            case 'float':
                return (float) $var;

            case 'string':
                // STRINGS ARE EXPECTED TO BE IN ASCII OR UTF-8 FORMAT
                $ascii = '';
                $strlen_var = strlen($var);

               /*
                * Iterate over every character in the string,
                * escaping with a slash or encoding to UTF-8 where necessary
                */
                for ($c = 0; $c < $strlen_var; ++$c) {

                    $ord_var_c = ord($var{$c});

                    switch (true) {
                        case $ord_var_c == 0x08:
                            $ascii .= '\b';
                            break;
                        case $ord_var_c == 0x09:
                            $ascii .= '\t';
                            break;
                        case $ord_var_c == 0x0A:
                            $ascii .= '\n';
                            break;
                        case $ord_var_c == 0x0C:
                            $ascii .= '\f';
                            break;
                        case $ord_var_c == 0x0D:
                            $ascii .= '\r';
                            break;

                        case $ord_var_c == 0x22:
                        case $ord_var_c == 0x2F:
                        case $ord_var_c == 0x5C:
                            // double quote, slash, slosh
                            $ascii .= '\\'.$var{$c};
                            break;

                        case (($ord_var_c >= 0x20) && ($ord_var_c <= 0x7F)):
                            // characters U-00000000 - U-0000007F (same as ASCII)
                            $ascii .= $var{$c};
                            break;

                        case (($ord_var_c & 0xE0) == 0xC0):
                            // characters U-00000080 - U-000007FF, mask 110XXXXX
                            // see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                            if ($c+1 >= $strlen_var) {
                                $c += 1;
                                $ascii .= '?';
                                break;
                            }
                            
                            $char = pack('C*', $ord_var_c, ord($var{$c + 1}));
                            $c += 1;
                            $utf16 = $this->utf82utf16($char);
                            $ascii .= sprintf('\u%04s', bin2hex($utf16));
                            break;

                        case (($ord_var_c & 0xF0) == 0xE0):
                            if ($c+2 >= $strlen_var) {
                                $c += 2;
                                $ascii .= '?';
                                break;
                            }
                            // characters U-00000800 - U-0000FFFF, mask 1110XXXX
                            // see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                            $char = pack('C*', $ord_var_c,
                                         @ord($var{$c + 1}),
                                         @ord($var{$c + 2}));
                            $c += 2;
                            $utf16 = $this->utf82utf16($char);
                            $ascii .= sprintf('\u%04s', bin2hex($utf16));
                            break;

                        case (($ord_var_c & 0xF8) == 0xF0):
                            if ($c+3 >= $strlen_var) {
                                $c += 3;
                                $ascii .= '?';
                                break;
                            }
                            // characters U-00010000 - U-001FFFFF, mask 11110XXX
                            // see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                            $char = pack('C*', $ord_var_c,
                                         ord($var{$c + 1}),
                                         ord($var{$c + 2}),
                                         ord($var{$c + 3}));
                            $c += 3;
                            $utf16 = $this->utf82utf16($char);
                            $ascii .= sprintf('\u%04s', bin2hex($utf16));
                            break;

                        case (($ord_var_c & 0xFC) == 0xF8):
                            // characters U-00200000 - U-03FFFFFF, mask 111110XX
                            // see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                            if ($c+4 >= $strlen_var) {
                                $c += 4;
                                $ascii .= '?';
                                break;
                            }
                            $char = pack('C*', $ord_var_c,
                                         ord($var{$c + 1}),
                                         ord($var{$c + 2}),
                                         ord($var{$c + 3}),
                                         ord($var{$c + 4}));
                            $c += 4;
                            $utf16 = $this->utf82utf16($char);
                            $ascii .= sprintf('\u%04s', bin2hex($utf16));
                            break;

                        case (($ord_var_c & 0xFE) == 0xFC):
                        if ($c+5 >= $strlen_var) {
                                $c += 5;
                                $ascii .= '?';
                                break;
                            }
                            // characters U-04000000 - U-7FFFFFFF, mask 1111110X
                            // see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                            $char = pack('C*', $ord_var_c,
                                         ord($var{$c + 1}),
                                         ord($var{$c + 2}),
                                         ord($var{$c + 3}),
                                         ord($var{$c + 4}),
                                         ord($var{$c + 5}));
                            $c += 5;
                            $utf16 = $this->utf82utf16($char);
                            $ascii .= sprintf('\u%04s', bin2hex($utf16));
                            break;
                    }
                }
                return  '"'.$ascii.'"';

            case 'array':
               /*
                * As per JSON spec if any array key is not an integer
                * we must treat the the whole array as an object. We
                * also try to catch a sparsely populated associative
                * array with numeric keys here because some JS engines
                * will create an array with empty indexes up to
                * max_index which can cause memory issues and because
                * the keys, which may be relevant, will be remapped
                * otherwise.
                *
                * As per the ECMA and JSON specification an object may
                * have any string as a property. Unfortunately due to
                * a hole in the ECMA specification if the key is a
                * ECMA reserved word or starts with a digit the
                * parameter is only accessible using ECMAScript's
                * bracket notation.
                */

                // treat as a JSON object
                if (is_array($var) && count($var) && (array_keys($var) !== range(0, sizeof($var) - 1))) {
                    $properties = array_map(array($this, 'name_value'),
                                            array_keys($var),
                                            array_values($var));

                    foreach($properties as $property) {
                        if(Services_JSON::isError($property)) {
                            return $property;
                        }
                    }

                    return '{' . join(',', $properties) . '}';
                }

                // treat it like a regular array
                $elements = array_map(array($this, '_encode'), $var);

                foreach($elements as $element) {
                    if(Services_JSON::isError($element)) {
                        return $element;
                    }
                }

                return '[' . join(',', $elements) . ']';

            case 'object':
                $vars = get_object_vars($var);

                $properties = array_map(array($this, 'name_value'),
                                        array_keys($vars),
                                        array_values($vars));

                foreach($properties as $property) {
                    if(Services_JSON::isError($property)) {
                        return $property;
                    }
                }

                return '{' . join(',', $properties) . '}';

            default:
                return ($this->use & SERVICES_JSON_SUPPRESS_ERRORS)
                    ? 'null'
                    : new Services_JSON_Error(gettype($var)." can not be encoded as JSON string");
        }
    }

   /**
    * array-walking function for use in generating JSON-formatted name-value pairs
    *
    * @param    string  $name   name of key to use
    * @param    mixed   $value  reference to an array element to be encoded
    *
    * @return   string  JSON-formatted name-value pair, like '"name":value'
    * @access   private
    */
    function name_value($name, $value)
    {
        $encoded_value = $this->_encode($value);

        if(Services_JSON::isError($encoded_value)) {
            return $encoded_value;
        }

        return $this->_encode(strval($name)) . ':' . $encoded_value;
    }

   /**
    * reduce a string by removing leading and trailing comments and whitespace
    *
    * @param    $str    string      string value to strip of comments and whitespace
    *
    * @return   string  string value stripped of comments and whitespace
    * @access   private
    */
    function reduce_string($str)
    {
        $str = preg_replace(array(

                // eliminate single line comments in '// ...' form
                '#^\s*//(.+)$#m',

                // eliminate multi-line comments in '/* ... */' form, at start of string
                '#^\s*/\*(.+)\*/#Us',

                // eliminate multi-line comments in '/* ... */' form, at end of string
                '#/\*(.+)\*/\s*$#Us'

            ), '', $str);

        // eliminate extraneous space
        return trim($str);
    }

   /**
    * decodes a JSON string into appropriate variable
    *
    * @param    string  $str    JSON-formatted string
    *
    * @return   mixed   number, boolean, string, array, or object
    *                   corresponding to given JSON input string.
    *                   See argument 1 to Services_JSON() above for object-output behavior.
    *                   Note that decode() always returns strings
    *                   in ASCII or UTF-8 format!
    * @access   public
    */
    function decode($str)
    {
        $str = $this->reduce_string($str);

        switch (strtolower($str)) {
            case 'true':
                return true;

            case 'false':
                return false;

            case 'null':
                return null;

            default:
                $m = array();

                if (is_numeric($str)) {
                    // Lookie-loo, it's a number

                    // This would work on its own, but I'm trying to be
                    // good about returning integers where appropriate:
                    // return (float)$str;

                    // Return float or int, as appropriate
                    return ((float)$str == (integer)$str)
                        ? (integer)$str
                        : (float)$str;

                } elseif (preg_match('/^("|\').*(\1)$/s', $str, $m) && $m[1] == $m[2]) {
                    // STRINGS RETURNED IN UTF-8 FORMAT
                    $delim = substr($str, 0, 1);
                    $chrs = substr($str, 1, -1);
                    $utf8 = '';
                    $strlen_chrs = strlen($chrs);

                    for ($c = 0; $c < $strlen_chrs; ++$c) {

                        $substr_chrs_c_2 = substr($chrs, $c, 2);
                        $ord_chrs_c = ord($chrs{$c});

                        switch (true) {
                            case $substr_chrs_c_2 == '\b':
                                $utf8 .= chr(0x08);
                                ++$c;
                                break;
                            case $substr_chrs_c_2 == '\t':
                                $utf8 .= chr(0x09);
                                ++$c;
                                break;
                            case $substr_chrs_c_2 == '\n':
                                $utf8 .= chr(0x0A);
                                ++$c;
                                break;
                            case $substr_chrs_c_2 == '\f':
                                $utf8 .= chr(0x0C);
                                ++$c;
                                break;
                            case $substr_chrs_c_2 == '\r':
                                $utf8 .= chr(0x0D);
                                ++$c;
                                break;

                            case $substr_chrs_c_2 == '\\"':
                            case $substr_chrs_c_2 == '\\\'':
                            case $substr_chrs_c_2 == '\\\\':
                            case $substr_chrs_c_2 == '\\/':
                                if (($delim == '"' && $substr_chrs_c_2 != '\\\'') ||
                                   ($delim == "'" && $substr_chrs_c_2 != '\\"')) {
                                    $utf8 .= $chrs{++$c};
                                }
                                break;

                            case preg_match('/\\\u[0-9A-F]{4}/i', substr($chrs, $c, 6)):
                                // single, escaped unicode character
                                $utf16 = chr(hexdec(substr($chrs, ($c + 2), 2)))
                                       . chr(hexdec(substr($chrs, ($c + 4), 2)));
                                $utf8 .= $this->utf162utf8($utf16);
                                $c += 5;
                                break;

                            case ($ord_chrs_c >= 0x20) && ($ord_chrs_c <= 0x7F):
                                $utf8 .= $chrs{$c};
                                break;

                            case ($ord_chrs_c & 0xE0) == 0xC0:
                                // characters U-00000080 - U-000007FF, mask 110XXXXX
                                //see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                                $utf8 .= substr($chrs, $c, 2);
                                ++$c;
                                break;

                            case ($ord_chrs_c & 0xF0) == 0xE0:
                                // characters U-00000800 - U-0000FFFF, mask 1110XXXX
                                // see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                                $utf8 .= substr($chrs, $c, 3);
                                $c += 2;
                                break;

                            case ($ord_chrs_c & 0xF8) == 0xF0:
                                // characters U-00010000 - U-001FFFFF, mask 11110XXX
                                // see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                                $utf8 .= substr($chrs, $c, 4);
                                $c += 3;
                                break;

                            case ($ord_chrs_c & 0xFC) == 0xF8:
                                // characters U-00200000 - U-03FFFFFF, mask 111110XX
                                // see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                                $utf8 .= substr($chrs, $c, 5);
                                $c += 4;
                                break;

                            case ($ord_chrs_c & 0xFE) == 0xFC:
                                // characters U-04000000 - U-7FFFFFFF, mask 1111110X
                                // see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
                                $utf8 .= substr($chrs, $c, 6);
                                $c += 5;
                                break;

                        }

                    }

                    return $utf8;

                } elseif (preg_match('/^\[.*\]$/s', $str) || preg_match('/^\{.*\}$/s', $str)) {
                    // array, or object notation

                    if ($str{0} == '[') {
                        $stk = array(SERVICES_JSON_IN_ARR);
                        $arr = array();
                    } else {
                        if ($this->use & SERVICES_JSON_LOOSE_TYPE) {
                            $stk = array(SERVICES_JSON_IN_OBJ);
                            $obj = array();
                        } else {
                            $stk = array(SERVICES_JSON_IN_OBJ);
                            $obj = new stdClass();
                        }
                    }

                    array_push($stk, array('what'  => SERVICES_JSON_SLICE,
                                           'where' => 0,
                                           'delim' => false));

                    $chrs = substr($str, 1, -1);
                    $chrs = $this->reduce_string($chrs);

                    if ($chrs == '') {
                        if (reset($stk) == SERVICES_JSON_IN_ARR) {
                            return $arr;

                        } else {
                            return $obj;

                        }
                    }

                    //print("\nparsing {$chrs}\n");

                    $strlen_chrs = strlen($chrs);

                    for ($c = 0; $c <= $strlen_chrs; ++$c) {

                        $top = end($stk);
                        $substr_chrs_c_2 = substr($chrs, $c, 2);

                        if (($c == $strlen_chrs) || (($chrs{$c} == ',') && ($top['what'] == SERVICES_JSON_SLICE))) {
                            // found a comma that is not inside a string, array, etc.,
                            // OR we've reached the end of the character list
                            $slice = substr($chrs, $top['where'], ($c - $top['where']));
                            array_push($stk, array('what' => SERVICES_JSON_SLICE, 'where' => ($c + 1), 'delim' => false));
                            //print("Found split at {$c}: ".substr($chrs, $top['where'], (1 + $c - $top['where']))."\n");

                            if (reset($stk) == SERVICES_JSON_IN_ARR) {
                                // we are in an array, so just push an element onto the stack
                                array_push($arr, $this->decode($slice));

                            } elseif (reset($stk) == SERVICES_JSON_IN_OBJ) {
                                // we are in an object, so figure
                                // out the property name and set an
                                // element in an associative array,
                                // for now
                                $parts = array();
                                
                                if (preg_match('/^\s*(["\'].*[^\\\]["\'])\s*:\s*(\S.*),?$/Uis', $slice, $parts)) {
                                    // "name":value pair
                                    $key = $this->decode($parts[1]);
                                    $val = $this->decode($parts[2]);

                                    if ($this->use & SERVICES_JSON_LOOSE_TYPE) {
                                        $obj[$key] = $val;
                                    } else {
                                        $obj->$key = $val;
                                    }
                                } elseif (preg_match('/^\s*(\w+)\s*:\s*(\S.*),?$/Uis', $slice, $parts)) {
                                    // name:value pair, where name is unquoted
                                    $key = $parts[1];
                                    $val = $this->decode($parts[2]);

                                    if ($this->use & SERVICES_JSON_LOOSE_TYPE) {
                                        $obj[$key] = $val;
                                    } else {
                                        $obj->$key = $val;
                                    }
                                }

                            }

                        } elseif ((($chrs{$c} == '"') || ($chrs{$c} == "'")) && ($top['what'] != SERVICES_JSON_IN_STR)) {
                            // found a quote, and we are not inside a string
                            array_push($stk, array('what' => SERVICES_JSON_IN_STR, 'where' => $c, 'delim' => $chrs{$c}));
                            //print("Found start of string at {$c}\n");

                        } elseif (($chrs{$c} == $top['delim']) &&
                                 ($top['what'] == SERVICES_JSON_IN_STR) &&
                                 ((strlen(substr($chrs, 0, $c)) - strlen(rtrim(substr($chrs, 0, $c), '\\'))) % 2 != 1)) {
                            // found a quote, we're in a string, and it's not escaped
                            // we know that it's not escaped becase there is _not_ an
                            // odd number of backslashes at the end of the string so far
                            array_pop($stk);
                            //print("Found end of string at {$c}: ".substr($chrs, $top['where'], (1 + 1 + $c - $top['where']))."\n");

                        } elseif (($chrs{$c} == '[') &&
                                 in_array($top['what'], array(SERVICES_JSON_SLICE, SERVICES_JSON_IN_ARR, SERVICES_JSON_IN_OBJ))) {
                            // found a left-bracket, and we are in an array, object, or slice
                            array_push($stk, array('what' => SERVICES_JSON_IN_ARR, 'where' => $c, 'delim' => false));
                            //print("Found start of array at {$c}\n");

                        } elseif (($chrs{$c} == ']') && ($top['what'] == SERVICES_JSON_IN_ARR)) {
                            // found a right-bracket, and we're in an array
                            array_pop($stk);
                            //print("Found end of array at {$c}: ".substr($chrs, $top['where'], (1 + $c - $top['where']))."\n");

                        } elseif (($chrs{$c} == '{') &&
                                 in_array($top['what'], array(SERVICES_JSON_SLICE, SERVICES_JSON_IN_ARR, SERVICES_JSON_IN_OBJ))) {
                            // found a left-brace, and we are in an array, object, or slice
                            array_push($stk, array('what' => SERVICES_JSON_IN_OBJ, 'where' => $c, 'delim' => false));
                            //print("Found start of object at {$c}\n");

                        } elseif (($chrs{$c} == '}') && ($top['what'] == SERVICES_JSON_IN_OBJ)) {
                            // found a right-brace, and we're in an object
                            array_pop($stk);
                            //print("Found end of object at {$c}: ".substr($chrs, $top['where'], (1 + $c - $top['where']))."\n");

                        } elseif (($substr_chrs_c_2 == '/*') &&
                                 in_array($top['what'], array(SERVICES_JSON_SLICE, SERVICES_JSON_IN_ARR, SERVICES_JSON_IN_OBJ))) {
                            // found a comment start, and we are in an array, object, or slice
                            array_push($stk, array('what' => SERVICES_JSON_IN_CMT, 'where' => $c, 'delim' => false));
                            $c++;
                            //print("Found start of comment at {$c}\n");

                        } elseif (($substr_chrs_c_2 == '*/') && ($top['what'] == SERVICES_JSON_IN_CMT)) {
                            // found a comment end, and we're in one now
                            array_pop($stk);
                            $c++;

                            for ($i = $top['where']; $i <= $c; ++$i)
                                $chrs = substr_replace($chrs, ' ', $i, 1);

                            //print("Found end of comment at {$c}: ".substr($chrs, $top['where'], (1 + $c - $top['where']))."\n");

                        }

                    }

                    if (reset($stk) == SERVICES_JSON_IN_ARR) {
                        return $arr;

                    } elseif (reset($stk) == SERVICES_JSON_IN_OBJ) {
                        return $obj;

                    }

                }
        }
    }

    /**
     * @todo Ultimately, this should just call PEAR::isError()
     */
    function isError($data, $code = null)
    {
        if (class_exists('pear')) {
            return PEAR::isError($data, $code);
        } elseif (is_object($data) && (get_class($data) == 'services_json_error' ||
                                 is_subclass_of($data, 'services_json_error'))) {
            return true;
        }

        return false;
    }
}

if (class_exists('PEAR_Error')) {

    class Services_JSON_Error extends PEAR_Error
    {
        function Services_JSON_Error($message = 'unknown error', $code = null,
                                     $mode = null, $options = null, $userinfo = null)
        {
            parent::PEAR_Error($message, $code, $mode, $options, $userinfo);
        }
    }

} else {

    /**
     * @todo Ultimately, this class shall be descended from PEAR_Error
     */
    class Services_JSON_Error
    {
        function Services_JSON_Error($message = 'unknown error', $code = null,
                                     $mode = null, $options = null, $userinfo = null)
        {

        }
    }

}
?>
<?
if( ! function_exists('json_encode') ){
	function json_encode($obj){
		$json = new Services_JSON();
		return $json->encode($obj);
	}
}

// ajax update, delete, backtrace,
if( isset($_REQUEST['action']) ){
	$action = $_REQUEST['action'];
	
	switch($action){
		case 'delete':
			// Delete lines from current log file
			if( isset($_REQUEST['from']) && isset($_REQUEST['to']) ){
				$from = (int) $_REQUEST['from'];
				$to = (int) $_REQUEST['to'];
				$phplog->delete_lines($from, $to);
			}
			// delete select lines;
			if( isset($_REQUEST['selected_lines']) ){
				$selected_lines = explode(',', $_REQUEST['selected_lines']);
				$phplog->delete_selected_lines($selected_lines);
			}
			$js = array('msg' => 'Success', 'status'=>1);
			echo json_encode( $js );
			exit;
		break;
		case 'update':
			// Ajax way get log from $current_last_line
			if( isset($_REQUEST['current_last_line']) ){
				$current_last_line = (int) $_REQUEST['current_last_line'];
				
				$log = $phplog->get_log_from_line($current_last_line);
				// @see $phplog->get_log_from_line, when log lines less than current line, should return count
				if( is_numeric($log) ){
					$js = array('response_log_end_line' => $log, 'data' => array());
				}else{
					$js = array('response_log_end_line' => $current_last_line + count($log), 'data' => $log);
				}
				
				$phplog->expire_headers();
				echo json_encode( $js );
				exit;
			}
		break;
		case 'backtrace':
			$line = (int)$_REQUEST['line'];
			$traces = $phplog->get_trace_by_line($_REQUEST['line']);
			for($i = 0; $i < count($traces); $i++){
				$traces[$i]['args'] = htmlspecialchars($traces[$i]['args']);
				$traces[$i]['rows'] = $phplog->count_rows($traces[$i]['args']);
				if( empty($traces[$i]['file']) ) $traces[$i]['file'] = '';
				if( empty($traces[$i]['line']) ) $traces[$i]['line'] = '';
			}
			$phplog->expire_headers();
			echo json_encode( array('line'=>$line, 'traces' => $traces) );
			exit;
		break;
		case 'remove':
			$phplog->remove_log_files();
			echo json_encode( array('msg' => 'All log files has been removed,(Excluded this latest log!)', 'status' => 1) );
			exit;
		break;
		default: 
			die( json_encode(array('msg' => 'action is support for now!', 'status' => 0)) );
	}
	exit;
}

// Finally, Load Page Html

// a simple template engine, @see phplog->template_eval()

// group template
$template_group = <<<EOT
<div class="group" id="group_{end_line}" >
	<div class="group_info" onclick="toggle('group', {end_line});">
		<span class="from_to_line">
			<b>[{from_line}-{end_line}]</b>
		</span>
		<span>
			<input type="checkbox" name="delete_group[]" value="{end_line}" id="group_checkbox_{end_line}" 
			onclick="click_checkbox('group', {from_line}, {end_line});stop_bubble(event);" />
		</span>
		<span>
			[<a onclick="delete_lines({from_line}, {end_line});">Delete</a>]
		</span>
		
		<!-- reverse checkbox in this group -->
		<!--<span><a onclick="reverse_checkbox({from_line}, {end_line});stop_bubble(event);" />reverse</a></span>-->
		
		<span>
			[<a onclick="toggle_a_group({from_line}, {end_line});stop_bubble(event);" />Toggle</a>]
		</span>
	</div>
	<div id="group_data_{end_line}" class="group_data">
		{log_data_html}
	</div>
</div>
EOT;

// line template
$template_line = <<<EOT
	<div class="line {parity}" id="line_{line}">
		<div class="line_info {parity}" onclick="toggle('line', {line});">
			<span><b>[{line}]</b></span>
			<span>
				<input type="checkbox" name="delete_line[]" 
				id="line_checkbox_{line}" value="{line}" 
				onclick="click_checkbox('line', {line});stop_bubble(event);" />
			</span>
			<span>
				[<a class="delete_a" onclick="delete_lines({line}, {line});">Delete</a>]
			</span>
			<span>
				[<a onclick="toggle_backtrace({line});stop_bubble(event);">BackTrace</a>]
			</span>
			<span><small>[{date}]</small></span>
			<span><small>[{caller_file}]</small></span>
			<span><small>[{caller_line}]</small></span>
		</div>
		<div class="line_data" id="line_data_{line}">
			<div class="trace off" id="trace_{line}"></div>
			<div><textarea readonly rows="{rows}">{data} </textarea></div>
		</div>
	</div>
EOT;

// trace template
$template_trace = <<<EOT
	<span class="trace_block">
		<span class="function">{caller_function}(<a onclick="show_window(this, event);" args="{args}" rows="{rows}">...</a>)</span>
		<span class="fileline">[{caller_file}] [{caller_line}]</span>
	</span>
EOT;

// trace arrow template
$template_trace_arrow = <<<EOT
	<span class="trace_arrow">>></span>
EOT;

// for now, not used
$template_window = <<<EOT
	<div id="args_window" style="display:none">
		<textarea id="args_textarea" rows="{rows}"></textarea>
	</div>
EOT;


// Do not allow cache this page
$phplog->expire_headers();

$log = $phplog->parse();
$page_end_line = count($log);

?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>PHPLog</title>
<style type="text/css">
body,html{
font-family: "Courier New", Verdana;
font-size: 14px;
margin: 0px;
padding: 0px;
}

/* general setting */
*{
margin: 0px;
padding: 0px;
font-family: "Courier New", Verdana;
}
a{
text-decoration: underline;
cursor: pointer;
}

#toolbar{
z-index: 10;
position:fixed !important; 
top: 0px;
position:absolute; 
top:expression(offsetParent.scrollTop);
width:100%;
text-align: center;
}
#tools{
width: 100%; 
height: 30px;
overflow: hidden; 
font-size: 14px;
background-color: #B3F09F;
text-align: center;
}
#toolbar lable{
height: 30px;
}
#toolbar input{
padding-top: 5px;
}
#tools a{
padding-right: 10px;
}
#tools .help{
cursor: help;
}

/* all logs container */
#container{
margin-top: 50px;
}

/* group style setting */
.group{
border: 1px solid #A7D5FF;
margin: 3px 3px;
}
.group_info{
cursor: pointer;
background: #A7D5FF;
height: 30px;
padding-left: 10px;
font-size: 15px;
}
.group_info span{
padding: 0 5px;
font-size: 15px;
}
.group_data{
}

/* log style setting! */
.line{
margin: 3px;
margin-bottom: 5px;
position:relative;
}
.line_info{
cursor: pointer;
padding-left: 50px;
height: 28px;
}
.line_info span{
padding: 0 5px;
font-size: 15px;
}
.line_info span.file_line{
width: 50px;
text-align: right;
}
.line_data{
clear: left;
}
.line_data textarea{
width: 100%;
height: auto;
overflow: visible;
font-size: 14px;
}

/* odd or even for line info, line data */
.line.even{
border-left: 2px solid #EEF1F1;
border-right: 2px solid #EEF1F1;
}
.line_info.even{
background: #EEF1F1;
}
.line.odd{
border-left: 2px solid #E1DDDD;
border-right: 2px solid #E1DDDD;
}
.line_info.odd{
background: #E1DDDD;
}

/* Trace Info for a particular log */
.trace{
/*position: relative;*/
width: 100%;
background-color: white;
margin: 0px;
padding:0px;
border: 0px;
}
.trace.off{
display: none;
}
.trace.on{
/* nothing */
}
.trace .trace_block{
text-align: left;
border: 1px solid;
width: 22%;
float: left;
overflow-x: auto;
height: 80px;
margin: 3px 0px;
}
.trace .trace_block span{
display: block;
text-decoration: none;
}
.trace .trace_block .function{
padding-bottom: 5px;
}
.trace .trace_block .fileline{
color: #007700;
font-size: 12px;
}
.trace  .trace_arrow{
width: 2%;
float: left;
margin-top: 30px;
}

/* Popup window style */
#window{
position: absolute;
z-index: 999;
border: 2px solid green;
background-color: white;
}
#window textarea{
font-size: 12px;
width: 100%;
overflow-y: auto;
}
#window .window_button{
background-color:green;
color: white;
cursor: pointer;
}
</style>
<script type="text/javascript">
//var isOpera = navigator.userAgent.indexOf('Opera') > -1;
//var isIE = navigator.userAgent.indexOf('MSIE') > 1 && !isOpera;
//var isMoz = navigator.userAgent.indexOf('Mozilla/5.') == 0 && !isOpera;

// too many global variables, ^_^

// ajax related parameters
var timer;
var original_ajax_timeout = ajax_timeout = 1500;
var ajax_in_process = 0;
var original_ajax_step = ajax_step = 1000;

// Suggest ,turn on this option, to slow down page refresh when you are not focus on PhpLog.
var enable_load_balance = true;
var toggle_all_flag = 0;

var page_end_line = <?php echo $page_end_line;?>;
var url = "<?php echo $_SERVER['PHP_SELF'];?>";

// template in javascript of this project.
var template_group = '<?php echo $phplog->safe_javascript_string($template_group);?>';;
var template_line  = '<?php echo $phplog->safe_javascript_string($template_line);?>';
var template_trace = '<?php echo $phplog->safe_javascript_string($template_trace);?>';
var template_trace_arrow = '<?php echo $phplog->safe_javascript_string($template_trace_arrow);?>';
</script>
<script type="text/javascript">
//
// *****Server Side Action*****
//
// update action
function update(){
	if( ajax_in_process ) {
		return true;
	}
	var data = {current_last_line: page_end_line, ajax_ts: ajax_timeout, action: 'update'};
	ajax( url, data, process_logs );
}

// delete from->end lines in files
function delete_lines(start, end, event){
	var data = {action: 'delete', current_last_line: 0, from: start, to: end};
	$("container").innerHTML = '';
	page_end_line = 0;
	ajax( url, data, refresh );
	return false;
}

// delete selected lines, include from->to, and all selected lines
function delete_selected_lines(){
	
	var elements = document.getElementsByName('delete_line[]');
	var e;
	var lines = '';
	var i;

	for( i = 0; i < elements.length; i++ ){
		e = elements[i];
		if( e.checked == true ){
			lines += e.value + ',';
		}
	}
	
	var from = to = 0;
	from = safe_parse_int( $('input_from_line').value );
	if( trim($('input_to_line').value) == '' && trim($('input_from_line').value) != ''){
		to = elements.length;
	}else{
		to  = safe_parse_int( $('input_to_line').value );
	}
	
	// parse int from unknown value
	function safe_parse_int( value ){
		if( trim(value) == '' ) return 0;
		var ret = parseInt(value);
		if( ! ret ) return 0;
		return ret;
	}
	
	// merge with selected lines
	for( i = from; i <= to; i++ ){
		if( i != 0){
			lines += i + ',';
		}
	}
	
	if( lines.length == 0 ){
		return false;
	}
	
	page_end_line = 0;
	$("container").innerHTML = '';
	
	var data = {action: 'delete', current_last_line: 0, selected_lines: lines};
	ajax(url, data, refresh);
	return true;
}

// clear action
function delete_all_lines(){
	delete_lines(1, page_end_line);
}

// remove all log files except current one
function remove_log_files(){
	var data = {action: 'remove'};
	ajax(url, data);
	return true;
}

//
// *****Client Side Action*****
//

// toggel all lines;
function toggle_all(){
	var total = page_end_line;
	var group;
	var group_data;
	var line;
	var line_data;

	for(var i = 1; i <= page_end_line; i++){
		line = $( 'line_' + i );
		if( line != null ){
			line_data = 'line_data_' + i;
			toggle_by_id(line_data, toggle_all_flag);
		}
	}
	
	toggle_all_flag = toggle_all_flag ? 0 : 1;
}

// show/hidden a group or a line data, maybe need been renamed 
function toggle(type, id){
	var element_id;
	if( type == 'group' ){
		element_id = 'group_data_' + id;
	}else{
		element_id = 'line_data_' + id;
	}
	var e = $(element_id);
	
	toggle_by_id(e);
}

// record toggle group for toggle a group action
var toggled_group = {};
// toggle a group
function toggle_a_group(from, to){
	if( from > to ) return;
	var group = $('group_' + to);
	var line;
	var hash_key = 'group_' + to;
	var flag = 0;
	if( toggled_group[hash_key] != undefined && toggled_group[hash_key] != null ){
		flag = toggled_group[hash_key] ? 0 : 1;
		toggled_group[hash_key] = ( toggled_group[hash_key] ) ? 0 : 1;
	}else{
		toggled_group[hash_key] = 0;
	}
	for(var i = from; i <= to; i++){
		line = $('line_data_' + i);
		toggle_by_id(line, flag);
	}
	// toggle the group data show!
	toggle_by_id('group_data_' + to, 1);
	return true;
}

// toggle backtrace block of a line
function toggle_backtrace(line_number){
	var element = $( 'trace_' + line_number );
	// the first time, we need fetch data from server
	if( css_has(element, 'off') ) {
		css_remove(element, 'off');
		var data = {action: 'backtrace', line: line_number};
		ajax( url, data, process_backtrace );
		toggle_by_id(element, 1);
		toggle_by_id( 'line_data_' + line_number, 1);
		return true;
	}
	
	var line_data = $( 'line_data_' + line_number );
	
	// the backtrace is available in page, toggle it
	if( ! line_data.style.display ){
		line_data.style.display = 'block';
		toggle_by_id( element, 1);
	}
	else if( line_data.style.display == 'none' ){
		toggle('line', line_number);
		toggle_by_id(element, 1);
	}else if( line_data.style.display == 'block' ){
		toggle_by_id(element);
	}
	return true;
}

// click a group or a line checkbox
function click_checkbox(type, from, to){
	if( type == 'group' ){
		id = 'group_checkbox_' + to;
	}else{
		id = 'line_checkbox_' + from;
	}
	var target = $(id);
	
	var e;
	if( type == 'group' ){
		var elements = document.getElementsByName('delete_line[]');
		for( var i = 0; i < elements.length; i++ ){
			e = elements[i];
			if(  e.value > from - 1 && e.value < to + 1){
				if ( target.checked == true ){
					e.checked = true;
				}else{
					e.checked = false;
				}
			}
			
		}
	}
	return false;
}

// @deprecated, it's not much valueable, so disable it!
// reverse all checkbox in a group.
function reverse_checkbox(from, to){
	var e;
	var elements = document.getElementsByName('delete_line[]');
	for( var i = 0; i < elements.length; i++ ){
		e = elements[i];
		if(  e.value > from - 1 && e.value < to + 1){
			if ( e.checked == true ){
				e.checked = false;
			}else{
				e.checked = true;
			}
		}
	}
}

//
// *****Popup Window*****
//

// show popup window at appropriate location
function show_window(obj, evt){
	var args = obj.getAttribute('args');
	var rows = parseInt(obj.getAttribute('rows'));
	
	var obj = $('window');
	var args_textarea = $('window_textarea');
	if( rows > 20 ){
		args_textarea.setAttribute('rows', 20);
	}else{
		args_textarea.setAttribute('rows', rows + 1);
	}
	args_textarea.value = args;
	
	xPos = parseInt(evt.clientX);
	yPos = parseInt(evt.clientY);
	var currentTop = document.body.scrollTop;
	
	var clientWidth;
	var clientHeight;
	var totalWidth;
	var totalHeight;
	
	if((document.body)&&(document.body.clientWidth))
       clientWidth = document.body.clientWidth;
    if((document.body)&&(document.body.clientHeight))
       clientHeight = document.body.clientHeight;
	
	if( document.body ){
		totalWidth = parseInt( document.body.scrollWidth );
		totalHeight =parseInt( document.body.scrollHeight );
	}
	/*
	if( document.documentElement && document.documentElement.clientWidth && document.documentElement.clientHeight ){
		clientWidth = document.documentElement.clientHeight;
		clientHeight = document.documentElement.clientWidth;
    }
	*/
	clientWidth = parseInt(clientWidth);
	clientHeight = parseInt(clientHeight);
	
	var window_max_height = 306;
	var each_line_height = 15;
	var content_width = 400;
	if( rows < 20 ){
		content_height = (rows + 1) * each_line_height;
	}else{
		content_height = 300;
	}
	
	//             |
	// left,top    | right,top
	// -------------------------- 
	// left,bottom | right,bottom
	//             |
	
	// x axis overflow, set x => left
	if( content_width + xPos > clientWidth ){
		obj.style.left = xPos - content_width - 20;
		// content is too height, then y => top!
		if( content_height > currentTop + yPos - 100 ){
			obj.style.top = currentTop + yPos;
		// content height is okay, then y => bottom
		}else{
			obj.style.top = currentTop + yPos - content_height - 35;
		}
	// y axis overflow, set y... 
	}else if(content_height + yPos > clientHeight) {
		// x axis not changed, x => right
		obj.style.left = xPos;
		// if content been show upward not extend the height, then set y => top! adjusted!
		if( content_height + 50 <  currentTop + yPos ){
			obj.style.top = currentTop + yPos - content_height - 35;
		// normal content, then y => bottom
		}else{
			obj.style.top = currentTop + yPos;
		}
	// normal, x => right, y => bottom;
	}else{ 
		obj.style.left = xPos;
		obj.style.top = currentTop + yPos;
	}
	obj.style.width = content_width;
	obj.style.display = 'block';
	
	/*
	if( document.addEventListener ){
		document.addEventListener("mouseup", check_user_click_area, true);
	}else{
		document.onmouseup = check_user_click_area;
	}
	function check_user_click_area(event){
	}
	*/
}

// drag popup window
function drag_window(element, e){
	e = e || event || window.event;
	
	if( document.addEventListener ){
		document.addEventListener("mousemove", startDrag, true);
		document.addEventListener("mouseup", stopDrag, true);
	}else{
		document.onmousemove = startDrag;
		document.onmouseup = stopDrag;
	}
	
	var target = $('window');
	var delatX = e.clientX - parseInt(target.style.left);
	var delatY = e.clientY - parseInt(target.style.top);
	
	function startDrag(e){
		e = e || event || window.event;
		target.style.left = e.clientX - delatX;
		target.style.top = e.clientY - delatY;
	}
	
	function stopDrag(){
		if( document.removeEventListener ){
			document.removeEventListener("mousemove", startDrag, true);
			document.removeEventListener("mouseup", stopDrag, true);
		}else{
			document.onmousemove = "";
			document.onmouseup = "";
		}
	}
}

// close popup window, and clear the text in it.
function close_window(){
	var win_textarea = $('window_textarea');
	win_textarea.innerHTML = '';
	
	var obj = $('window');
	obj.style.display = 'none';
}

//
// *****Data Process*****
//

// update center
function process_logs(response){
	ajax_in_process = 1;
	var data = json_parse(response);
	var response_log_end_line = data['response_log_end_line'];
	
	if( response_log_end_line < page_end_line ){
		ajax_in_process = 0;
		refresh();
		return;
	}
	else if( response_log_end_line == page_end_line ){
		// load balance, then slow down the refresh speed
		if( enable_load_balance  && ajax_timeout < 100000){
			ajax_timeout += ajax_step;
		}
		
		ajax_in_process = 0;
		if( timer ) window.clearTimeout(timer);
		timer = setTimeout(update, ajax_timeout);
		return;
	}
	
	// we need update log in page!
	var map = {};
	
	map.end_line = response_log_end_line;
	map.from_line = (page_end_line + 1);
	map.log_data_html = '';
	
	// @see template_eval for more detail
	var group = template_eval(template_group, map);
	var container = $("container");
	
	var group_0 = $("group_0");
	// remove group 0, when user clear the log, group 0 will show in page.
	if( group_0 != null ){
		container.removeChild(container.lastChild);
	}
	
	// insert a new group to the document.
	prepend(container, group);
	
	var group_data_id = $('group_data_' + response_log_end_line);
	var lines = data['data'];
	
	var this_line = {};
	
	var html;
	// insert lines
	for( var i = page_end_line + 1, j = 0; i < response_log_end_line + 1; i++, j++ ){
		if( lines[j][0] == undefined ){
			continue;
		}else{
			this_line.date = lines[j][0];
			this_line.caller_file = lines[j][1];
			this_line.caller_line = lines[j][2];
			this_line.data = lines[j][3];
			this_line.rows = lines[j][4];
			this_line.line = i;
			this_line.parity = ( i % 2 == 0 ) ? 'odd' : 'even'; 
			
			html = template_eval(template_line, this_line);
			prepend(group_data_id, html);
		}
	}
	
	page_end_line = response_log_end_line;
	ajax_timeout = original_ajax_timeout;
	ajax_in_process = 0;
	if( timer ) window.clearTimeout( timer );
	timer = setTimeout(update, ajax_timeout);
}

// process call stack infomation return by ajax response
function process_backtrace(response){
	
	var data = json_parse(response);
	var line = data['line'];
	var traces = data['traces'];
	
	var trace_entity = {};
	var trace;
	var trace_html = '';
	var trace_obj = $( 'trace_' + line );
	
	// insert each BackTrace to this line data.
	for( var i = 0; i < traces.length; i++ ){
		var trace = traces[i];
		trace_entity.caller_function = trace['function'];
		trace_entity.caller_file = trace['file'];
		trace_entity.caller_line = trace['line'];
		trace_entity.args = trace['args'];
		trace_entity.rows = trace['rows'];
		trace_html = template_eval(template_trace, trace_entity);
		if( i != 0 )
			prepend(trace_obj, template_trace_arrow);
		prepend(trace_obj, trace_html);
	}
}

//
// *****General Used Function*****
//

// toggle a element by id or object, 
// if status afforded then set this element to that status
function toggle_by_id(e, status){
	if( typeof e == 'string' ) e = $(e);
	
	if( status != undefined ){
		var value = (status == 'block' || (status != 'none' && status) ) ? 'block' : 'none';
		e.style.display = value;
		return true;
	}
	
	if( e.style.display == 'block' ){
		e.style.display = 'none';
	}else if(e.style.display == 'none'){
		e.style.display = 'block';
	}else{
		e.style.display = 'none';
	}
}

// document.location.reload();
function refresh(){
	var redirect_to = document.location;
	document.location = redirect_to;
}

// stop a event bubble
function stop_bubble(event){
	if( event.stopPropagation ) event.stopPropagation();
	else event.cancelBubble = true;
}

// prepend html as firstChild, only for this project, ^_^. (@see Jquery.prepend())
function prepend(obj, html){
	if( typeof obj == 'string' ) obj = $(obj);
	
	html = trim(html);
	var pattern = /^<\s*(\w+)\s+([^>]*)>((.|\r|\n)*)<\s*\/\s*\w*\s*>$/;
	
	var result = html.match( pattern );
	var tagName = result[1];
	var target = document.createElement(tagName);
	
	var attributes = result[2];
	var inner_html = result[3];
	target.innerHTML = inner_html;

	if( trim(attributes) ){
		var get_attr = /(\w+)="([^"]+)"/g;
		while((result = get_attr.exec(attributes)) != null) {
			var key = trim(result[1]);
			var value = trim(result[2]);
			// need consider other properties?
			if( key == 'class' ){
				target.className = value;
			}else
				target.setAttribute(key, value);
		}
	}
	obj.insertBefore( target, obj.firstChild );
}

// a simple template engine only for this project,please not rely on these
function template_eval( template, params ){
	var ps = '';
	for( var p in params ){
		ps += "|(\{" + p + "\})";
	}
	ps = ps.substring(1);
	
	var pattern = new RegExp(ps, "g");
	
	// replace each word {key} => value
	return template = template.replace( pattern, function(word){
		var key = word.substring(1, word.length - 1);
		return params[key];
	});
	return template;
}

// ajax communicate with server, invoke callback 
function ajax(url, values, callback){
	var request = xhr();
	var pairs = [];
	var pair;
	
	// compose the request data;
	for(var p in values){
		pair = encodeURIComponent(p) + '=' + encodeURIComponent(values[p]);
		pairs.push(pair);
	}
	var data = pairs.join('&');
	
	request.onreadystatechange = function(){
		if( request.readyState == 4 ) {  // If the request is finished
			if(request.status == 200)  // If it was successful
				if( callback )
					callback(request.responseText);  // Display the server's response
		}
	};
	
	request.open("POST", url, true);
	request.setRequestHeader("Method", "POST " + url + " HTTP/1.1");
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	
	request.send( data );
}

// XML http request object
function xhr(){
	var obj;
	try{
		obj = new XMLHttpRequest();
	}catch(e){
		try{
			obj = new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e_){
			try{
				obj = new ActiveXObject("Microsoft.XMLHTTP");
			}catch(e__){
				obj = null;
			}
		}
	}
	if( ! obj ){
		alert('Ajax not support ajax by browser!');
	}
	return obj;
}

//
// *****Help Function*****
//

// Help Function, document.getElementById
function $(id){
	return document.getElementById(id);
}

// Help Function trim space at head and tail!
function trim(str){
	var str = str + '';
	return str.replace(/^\s*|\s*$/, '');
}

// Help Function
function css_has(e, c){
	if( typeof e == 'string' ) e = $(e);
	
	var classes = e.className;
	if( ! classes ) return false;
	if( classes == c ) return true;
	
	return e.className.search("\\b" + c + "\\b") != -1;
}

// Help Function
function css_add(e, c){
	if( typeof e == 'string' ) e = $(e);
	if( css_has(e, c) ) return;
	if( e.className )  c = " " + c;
	e.className += c;
}

// Help Function
function css_remove(e, c){
	if( typeof e == 'string' ) e = $(e);
	e.className = e.className.replace( new RegExp("\\b" + c + "\\b\\s*", "g"), "");
}

function json_parse(str){
	return eval( '(' + str + ');' );
}

// 
// *****Begin The Magic***** 
//

// a cron to update in particular timeout
timer = setTimeout(update, ajax_timeout);

// simple load balance, will trigger event if onblur or onfocus
if( enable_load_balance ){

	// slow down the refresh
	window.onblur = function(){
		ajax_step = 2 * original_ajax_step;
		ajax_timeout = 10000;
	}

	// speed up the refresh
	window.onfocus = function(){
		if( ajax_in_process ) {
			return false;
		}
		ajax_timeout = 1000;
		ajax_step = original_ajax_step / 2;
		if(timer) window.clearTimeout(timer);
		update();
		return true;
	}
}
</script>
</head>
<body>
<div id="window" style="display:none;">
	<div class="window_button" onmousedown="return drag_window(this,event);"><a onclick="close_window();">Close Window</a></div>
	<textarea id="window_textarea" rows="" readonly="true"></textarea>
</div>
<?php
$help = <<<EOT
Click any underline text will trigger a action:

From       : From line number input
To         : To line number input
Delete     : 
             1.Delete From->To Lines
             2.Delete selected Lines
             3.Delete a Group
             4.Delete a Line
Clear      : Clear current log file.
Refresh    : Refresh Page
Remove     : Remove all log files except current one
Toggle     : 
             1.Toggle all lines
             2.Toggle a group lines
...        : Arguments in a function call of BackStack
BackTrace  : generate the debug_backtrace()

All pointer cursor area is clickable,
Their behavior need you to digg, (^_^).

EOT;

$about = <<<EOT
                  PHPLog v1.0
				
    Author    : DengZhiYi
    Contact   : 
                Email: altsee@gmail.com
                Skype: altsee
                Msn  : altsee@hotmail.com
    App Name  : PHPLog
    Version   : 1.0
    License   : GNU GENERAL PUBLIC LICENSE Version 3
    Website   : http://sourceforge.net/projects/phplog/
    Copyright : All rights reserved.
	
EOT;

$rows = $phplog->count_rows($help) + 1;

$help = htmlspecialchars($help);
$help_a = "<a args=\"$help\" rows='$rows' class='help' onclick='show_window(this, event);'>Help</a>";

$rows = $phplog->count_rows($about) + 1;
$about = htmlspecialchars($about);
$about_a = "<a args=\"$about\" rows='$rows' onclick='show_window(this, event);'>About</a>";
?>
<div id="toolbar">
	<div id="tools">
		From:<input id="input_from_line" type="text" size="4" value="" maxlength="4" />
		To:<input id="input_to_line" type="text" size="4" value="" maxlength="4" />
		<a class="delete" onclick="delete_selected_lines();">Delete</a>
		<a onclick="toggle_all();">Toggle</a>
		<a class="clear" onclick="delete_all_lines();">Clean</a>
		<a onclick="refresh();">Refresh</a>
		<a onclick="remove_log_files();">Remove</a>
		<?php echo $help_a;?>
		<?php echo $about_a;?>
	</div>
</div>
<div id="container">
<?php
// $log_data_html = '';

// for speed up, split template_group, then render html immediately line by line;
$group_split_html = explode('{log_data_html}', $template_group);
$group_head = $group_split_html[0];
$group_tail = $group_split_html[1];

// output the head;
echo $phplog->template_eval( $group_head, array('from_line'=>1, 'end_line'=>$page_end_line) );

// output the log line by line
for( $i = count($log) - 1 ; $i >= 0; $i-- ){
	if( ! $log[$i] ){
		continue;
	}
	
	$date = $log[$i][0];
	$traces = $log[$i][1];
	$data = $log[$i][2];
	
	$log_entity = new stdClass();
	$log_entity->date = $date;
	$log_entity->caller_file = $traces[0]['file'];
	$log_entity->caller_line = $traces[0]['line'];
	$log_entity->data = $data;
	$log_entity->rows = $phplog->count_rows($data);
	$log_entity->line = $i + 1;
	if( $i % 2 == 0 ){
		$log_entity->parity = 'even';
	}else{
		$log_entity->parity = 'odd';
	}
	/*
	// next version will make this as option, user turn on this, then output these html?
	$trace_html = '';
	for($j = 1 ; $j < count($traces); $j++ ){
		$trace_info = $traces[$j];
		$trace_entity = new stdClass();
		$trace_entity->function = $trace_info['function'];
		$trace_entity->file = $trace_info['file'];
		$trace_entity->line = $trace_info['line'];
		//print_r($trace_entity);
		$trace_html .= $phplog->template_eval($template_trace, $trace_entity);
	}
	$log_entity->trace = $trace_html;
	*/
	echo $phplog->template_eval($template_line, $log_entity);
	// flush();
	//$log_data_html .= $phplog->template_eval($template_line, $log_entity);
}

echo $group_tail;
//$content  = $phplog->template_eval( $template_group, array('log_data_html'=>$log_data_html, 'from_line'=>1, 'end_line'=>$page_end_line) );
//echo $content;
?>
</div>
</body>
</html>
<?
} // end of been directly accessed
} // end of function_exists
?>