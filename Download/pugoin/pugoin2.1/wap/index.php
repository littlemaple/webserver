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
 * @Date 2011-09-16 17:25:53 1138114312 1679702682 2966 $
 *******************************************************************/



error_reporting(E_ERROR);
ini_set("arg_seperator.output", "&amp;");
ini_set("magic_quotes_runtime", 0);
header('Content-Type: text/html; charset=utf-8');




define('ROOT_PATH',substr(dirname(__FILE__),0,-4) . '/');
define('TEMPLATE_ROOT_PATH', ROOT_PATH . 'wap/');
define('RELATIVE_ROOT_PATH','../');
define('IN_PUGOIN_WAP',true);


class initialize
{

	
	function init()
	{
		$config=array();

				require(ROOT_PATH . 'setting/settings.php');
		
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
		
		if(!$config['wap'])
		{
			include(ROOT_PATH . 'wap/include/error_wap.php');
		}
		
		require ROOT_PATH . 'setting/constants.php';
		
				if($config['robot_enable']) 
		{
			include(ROOT_PATH . 'setting/robot.php');
		}
		
				if ($config['extcredits_enable']) 
		{
			include(ROOT_PATH . 'setting/credits.php');
		}
		
		require_once ROOT_PATH . 'include/function/global.func.php';
		
		require_once ROOT_PATH . 'wap/include/function/wap_global.func.php'; 		
		
		require_once ROOT_PATH . 'wap/modules/master.mod.php';		
		require_once ROOT_PATH . 'wap/modules/' . $this->SetEvent($config['default_module']).'.mod.php';
		if($_GET) 
		{
			$_GET		= jaddslashes($_GET, 1, TRUE);
		}
		if($_POST) 
		{
			$_POST		= jaddslashes($_POST, 1, TRUE);
		}
		$moduleobject=new ModuleObject($config);
		
	}



	function SetEvent($default='topic')
	{
		$modss = array('topic'=>1,'login'=>1,'member'=>1,'tag'=>1,'pm'=>1,);
		
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
		
		Return $mod;
	}
}
$init=new initialize;
$init->init();

?>