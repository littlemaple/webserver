<?php
/*******************************************************************
 * [pugoin] (C)2010 - 2099 Dream3 Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename task_core.task.php $
 *
 * @Author http://www.pugo.in $
 *
 * @Date 2011-09-16 17:25:34 1920143001 141196805 1299 $
 *******************************************************************/


if(!defined('IN_PUGOIN'))
{
    exit('invalid request');
}


/**
 * TASK对象核心
 *
 * @author pugo.in
 * @package www.tttuangou.net
 */
class TaskCore
{
	var $DatabaseHandler=null;
	
	var $log=array('message'=>'已成功执行','error'=>0);
	
	function TaskCore()
	{
		$this->DatabaseHandler=&Obj::registry("DatabaseHandler");
	}
	
	function SqlError($sql,$file='',$line='')
	{
		$this->log['message']="<b>SQL查询语句错误</b>".
				"\r\n<br><br>错误语句:<br>[{$line}]{$file}<code>$sql</code>".
				"\r\n<br><br>错误编号:".$this->DatabaseHandler->GetLastErrorNo().
				"\r\n<br><br>错误信息:<br>".$this->DatabaseHandler->GetLastErrorString()."<br>";

		$this->log['error']=E_USER_ERROR;
	}
	
	function log($message,$error=0)
	{
		$this->log['message']=$message;
		$this->log['error']=$error;
	}
	
	function request($url)
	{
		$config=&Obj::registry('config');
		if(strpos($url,':/'.'/')===false) {
			$url=$config['site_url'].'/'.$url;
		}
		
		if ((defined('ROBOT_NAME') && false!==ROBOT_NAME) || 			('remote_script' == $_REQUEST['request_from']) || 			(!$_SERVER['HTTP_USER_AGENT']) || 			(!$_COOKIE)) {
			dfopen($url,-1,$post,$cookie,true,3);
			@usleep(rand(10000,100000)); 		} else {
			$GLOBALS['iframe'] .="<iframe src='{$url}' border=0 width=0 height=0></iframe>";
		}
	}
}
?>