<?php
/*******************************************************************
 * [pugoin] (C)2010 - 2099 Dream3 Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename index.php $
 *
 * @Author http://www.pugo.in $
 *
 * @Date 2011-09-16 17:25:37 1269302148 1282650491 4261 $
 *******************************************************************/


error_reporting(E_ERROR);
ini_set("arg_seperator.output", "&amp;");
ini_set("magic_quotes_runtime", 0);

$time_start = microtime_float();

define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());




define('ROOT_PATH',dirname(__FILE__) . '/');
define('RELATIVE_ROOT_PATH','./');

define('IN_PUGOIN_INDEX',true);

define('PLUGIN_DIR',ROOT_PATH . 'plugin');

class initialize
{

	
	function init()
	{
		$config=array();

		require(ROOT_PATH . 'setting/settings.php');
		@header('Content-Type: text/html; charset=' . $config['charset']);
		@header('P3P: CP="CAO PSA OUR"');

		if($config['install_lock_time'] < 1) 
		{
			if (!is_file(ROOT_PATH . 'install/install.lock') && is_file(ROOT_PATH . 'install.php')) 
			{
				die("<a href='./install.php'>请点此进行系统的安装</a>");
			}
		}
		
				if ($config['upgrade_lock_time'] > 0) 
		{			
			if(($config['upgrade_lock_time'] + 600 > time()) || (is_file(ROOT_PATH . 'cache/upgrade.lock') && @filemtime(ROOT_PATH . 'cache/upgrade.lock')+600>time())) 
            {
				die('系统升级中，请稍候……');
			}
		}
		
				if ($config['site_closed']) 
		{
			if ('login'!=$_GET['mod'] && $site_enable_msg=file_get_contents('./cache/site_enable.php')) 
			{
				die($site_enable_msg);
			}
		}
		
				require(ROOT_PATH . 'setting/constants.php');
		
				if ($config['rewrite_enable']) 
		{
			include(ROOT_PATH . 'include/rewrite.php');
		}
		
				if($config['robot_enable']) 
		{
			include(ROOT_PATH . 'setting/robot.php');
		}
		
				if($config['ad_enable']) 
		{
			include(ROOT_PATH . 'setting/ad.php');
		}
		
				if ($config['extcredits_enable']) 
		{
			include(ROOT_PATH . 'setting/credits.php');
		}
		
				require_once(ROOT_PATH . 'include/function/global.func.php');
		
				require_once(ROOT_PATH . 'modules/master.mod.php');

				$mod_ary = $this->SetEvent($config['default_module']);
				
				

		require_once(ROOT_PATH . 'modules/' . $mod_ary . '.mod.php');
			
		if($_GET) 
		{
			$_GET		= jaddslashes($_GET, 1, TRUE);
		}
		if($_POST) 
		{
			$_POST		= jaddslashes($_POST, 1, TRUE);
		}
		
		//增加日志
				
		$moduleobject = new ModuleObject($config);
		
		
	}

	
	function SetEvent($default='topic')
	{
		$modss = array(
			'topic'=>1,
			'pm'=>1,
			'login'=>1,
			'member'=>1,
			'profile'=>1,
			'tag'=>1,
			'get_password'=>1,
			'report'=>1,
			'url'=>1,
			'share'=>1,
			'other'=>1,
			'show'=>1,
			'user_tag'=>1,
			'theme'=>1,
			'search'=>1,
			'blacklist'=>1,
			'xwb'=>1,
			'settings'=>1,
			'qqwb'=>1,
			'vote' => 1,
			'qun' => 1,
			'tools' => 1,
			'wall' => 1,
			'plugin' => 1,
			'qmd' => 1,
		    'fenlei' => 1,
			'event' => 1,
			'account' => 1,
			'yy' => 1,
			'renren' => 1,
			'kaixin' => 1,
		);
		
		$mod = (isset($_POST['mod']) ? $_POST['mod'] : $_GET['mod']);
		
				if(!isset($modss[$mod])) 
		{
			if($mod)
			{
				$_POST['mod_original'] = $_GET['mod_original'] = $mod;
			}
			
			$mod = ($default ? $default : 'index');
		}

		$_POST['mod'] = $_GET['mod'] = $mod;	

				define('CURMODULE',$mod);
		
		Return $mod;
	}
}

ob_start("my_output");
$init=new initialize;
$init->init();
unset($init);
ob_end_flush();

function my_output(&$buffer,$mode=5)
{
	$modss = array('share'=>1);

	if(GZIP===true && function_exists('ob_gzhandler') && substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') && !isset($modss[$_GET['mod']])) {
		$buffer=ob_gzhandler($buffer,$mode);
	}
	return $buffer;
}

function microtime_float()
{
	list($usec, $sec) = explode(" ", microtime());
	return ((float)$usec + (float)$sec);
}

?>