<?php /* 2011-12-28 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?><?php /* 2011-12-27 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $conf_charset=$this->Config['charset']; ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="./templates/default/styles/admincp.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript" src="./templates/default/js/cookies.js"></script>
<script type="text/javascript" src="templates/default/./js/min.js"></script>
<script type="text/javascript" src="templates/default/./js/admin_script_common.js"></script>
<script language="JavaScript">
function checkalloption(form, value) {
	for(var i = 0; i < form.elements.length; i++) {
		var e = form.elements[i];
		if(e.value == value && e.type == 'radio' && e.disabled != true) {
			e.checked = true;
		}
	}
}
function checkallvalue(form, value, checkall) {
	var checkall = checkall ? checkall : 'chkall';
	for(var i = 0; i < form.elements.length; i++) {
		var e = form.elements[i];
		if(e.type == 'checkbox' && e.value == value) {
			e.checked = form.elements[checkall].checked;
		}
	}
}
function zoomtextarea(objname, zoom) {
	zoomsize = zoom ? 10 : -10;
	obj = $(objname);
	if(obj.rows + zoomsize > 0 && obj.cols + zoomsize * 3 > 0) {
		obj.rows += zoomsize;
		obj.cols += zoomsize * 3;
	}
}
function redirect(url) {
	window.location.replace(url);
}
function checkall(form, prefix, checkall) {
	var checkall = checkall ? checkall : 'chkall';
	for(var i = 0; i < form.elements.length; i++) {
		var e = form.elements[i];
		if(e.name != checkall && (!prefix || (prefix && e.name.match(prefix)))) {
			e.checked = form.elements[checkall].checked;
		}
	}
}
var collapsed = Cookies.getCookie('guanzhu_collapse');
function collapse_change(menucount) {
	if(document.getElementById('menu_' + menucount).style.display == 'none') {
		document.getElementById('menu_' + menucount).style.display = '';collapsed = collapsed.replace('[' + menucount + ']' , '');
		$('menuimg_' + menucount).src = './templates/default/images/admincp/menu_reduce.gif';
	} else {
		document.getElementById('menu_' + menucount).style.display = 'none';collapsed += '[' + menucount + ']';
		$('menuimg_' + menucount).src = './templates/default/images/admincp/menu_add.gif';
	}
	Cookies.setCookie('guanzhu_collapse', collapsed, 2592000);
}
function advance_search(o)
{
	o.innerHTML=$('advance_search').visible()?"高级搜索":"简单搜索";
	$('advance_search').toggle();
	return false;
}
</script>
</head>
<body>
<table width="100%" border="0" cellpadding="2" cellspacing="6" style="_margin-left:-10px; ">
<tr>
  <td><table width="100%" border="0" cellpadding="2" cellspacing="6">
    <tr>
      <td>
<?php if($__is_messager!=true) { ?>
        <div style="width:100%; height:15px;color:#000;margin:0px 0px 10px;">
          <div style="float:left;"><a href="admin.php?mod=index&code=home"><b>控制面板首页</b></a>&nbsp;&raquo;&nbsp;
		  
<?php if($pluginconfig && $pluginname) { ?>
		  <?php echo $pluginconfig; ?>&nbsp;&raquo;&nbsp;<?php echo $pluginname; ?>
		  <?php } elseif($this->pluginconfig && $this->pluginname) { ?>  <?php echo $this->pluginconfig; ?>&nbsp;&raquo;&nbsp;<?php echo $this->pluginname; ?>
		  
<?php } else { ?>  
<?php echo $this->actionName(); ?>
  
<?php } ?>
  </div>
        </div>
        
<?php } ?>
<!--新手上路-->
<?php if($new) { ?>
<table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
  <tr class="header">
    <td colspan="2">核心提示</td>
  </tr>
  <tr class="altbg2">
    <td colspan="2"> 1、蒲公英微博在安装完成之后，默认情况下不需要做任何的修改即可投入使用；<BR>
      2、为了更好的运营微博网站，下面一些还是请你务必了解，比如URL伪静态、填写备案号、微博管理、用户管理、实名认证等。 </td>
  </tr>
</table>
<br>
<table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
  <tr class="header">
    <td colspan="2"><A name="#内容管理"></A>【必要设置】</td>
  </tr>
  <tr class="altbg2">
    <td width="15%">1、URL伪静态设置</td>
    <td class="smalltxt"> 在系统设置：<A HREF="admin.php?mod=setting&code=modify_rewrite">URL地址设置</A>中，可根据服务器情况开启路径模式伪静态和标准伪静态；<BR>
	另外还可在此给每个系统模块，设置独一无二的URL地址名称，让你的网站与众不同。</td>
  </tr>
  <tr class="altbg1">
    <td width="15%">2、填写备案号</td>
    <td class="smalltxt"> 国家要求建站必须备案，请在做好域名备案审核后，将备案号在系统设置：<A HREF="admin.php?mod=setting&code=modify_normal#beian">核心设置</A>中填写；</td>
  </tr>
  <tr class="altbg2">
    <td width="15%">3、内容过滤设置</td>
    <td class="smalltxt">为避免网站出现不和谐的信息，可在系统设置：<A HREF="admin.php?mod=setting&code=modify_filter">内容过滤设置</A>中，填写要过滤的关键词，包括关键词的微博将被禁止发布。 </td>
  </tr>
</table>
<BR>
<table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
  <tr class="header">
    <td colspan="2"><A name="#内容管理"></A>【微博管理】</td>
  </tr>
  <tr class="altbg1">
    <td width="15%">1、微博管理</td>
    <td class="smalltxt">在内容管理：<A HREF="admin.php?mod=topic">微博管理</A>中，可根据用户名、关键词等搜索微博，并可进行批量删除操作 </td>
  </tr>
  <tr class="altbg2">
    <td>2、举报管理</td>
    <td class="smalltxt">用户在前台对微博进行举报后，管理员可在内容管理：<A HREF="admin.php?mod=report">举报管理</A>中进行审核或者进行删除操作；</td>
  </tr>
</table>
<BR>
<table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
  <tr class="header">
    <td colspan="2"><A name="#内容管理"></A>【用户管理】</td>
  </tr>
  <tr class="altbg1">
    <td width="15%">1、邀请注册</td>
    <td class="smalltxt">系统默认开启了邀请注册，即只有通过邀请链接才可注册，这样可强化注册者的归属感；如需关闭，请在系统设置：<A HREF="admin.php?mod=setting&code=modify_normal#user">核心设置</A>中，将“每个邀请链接可使用次数”设置为0即可。</td>
  </tr>
  <tr class="altbg1">
    <td width="15%">2、实名认证</td>
    <td class="smalltxt">通过用户管理：<A HREF="admin.php?mod=member&code=search">编辑用户</A>，在编辑用户资料中，可设置用户通过实名认证，这样在前台其用户名后将自动出现V字图片标示。</td>
  </tr>
  <tr class="altbg2">
    <td width="15%">3、编辑或删除用户</td>
    <td class="smalltxt">如果某用户乱发微博内容，则可以通过编辑用户，修改用户的角色，比如设置为禁言组，用户将无法发信息；也可以直接删除用户，那将自动删除该用户所有微博内容。 </td>
  </tr>
</table>
<BR>
<table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
  <tr class="header">
    <td colspan="2"><A name="#内容管理"></A>【轻松推广网站】</td>
  </tr>
  <tr class="altbg2">
    <td>核心提示</td>
    <td class="smalltxt"> 搜索引擎是互联网的入口，网站被搜索引擎收录才可以吸引流量，下面的三个步骤将有助于网站被搜索引擎快速的收录。 </td>
  </tr>
  <tr class="altbg1">
    <td>1、友情链接</td>
    <td class="smalltxt">同类型的、高质量的外链可有效引导搜索引擎蜘蛛来访问你的网站。<BR>
      但需要定期进行【<A HREF=http://checklink.biniu.com><font color=red>友情链接检测</font></A>】，预防友情链接站点被惩罚</td>
  </tr>
  <tr class="altbg1">
    <td width="15%">2、监控网站收录</td>
    <td class="smalltxt">网站收录多少，反应了网站在搜索引擎中的权重<br>
      不定期【<A HREF=http://shoulu.biniu.com>搜索引擎收录查询</A>】可第一时间了解网站状况</td>
  </tr>
</table>
<br>
<!--帮助-->
<?php } else { ?>
<?php } ?>