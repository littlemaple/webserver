<?php if (!defined('IS_IN_XWB_PLUGIN')) {die('access deny!');}?><?php if('UTF-8' != strtoupper($GLOBALS['jsg_sys_config']['charset'])){@header("Content-type: text/html; charset=utf-8");}?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>错误提示</title>
<link type="text/css" rel="stylesheet" href="<?php echo XWB_plugin::getPluginUrl('images/xwb_'. XWB_S_VERSION .'.css');?>" />
</head>

<body>
<div class="bind-setting xwb-plugin">
	<p class="alert-tips">出错啦！</p>
	<div class="bing-text">
		<p><?php echo $info; ?></p>
    </div>
    
    <div class="setting-box">
		<p><a href="<?php echo XWB_plugin::siteUrl(); ?>">返回首页</a></p>
		<p><a href="http://www.pugo.in/" target="_blank">我是站长，寻求帮助</a></p>
    </div>
    
    
</div>



</body>
</html>
