<?php /* 2011-12-27 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
  <tr>
    <td style="padding-left:20px;">第一次使用：请看&nbsp;&nbsp;[&nbsp;<A HREF="admin.php?mod=index&code=help&new=1&action_name=新手上路向导" style="color:red"><u>新手上路向导</u></A>&nbsp;]</td>
    <td></td>
  </tr>
</table>

<!--版本信息-->
<table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
  <tr class="header">
    <td colspan="12">
    <div class="NavaL ndt">程序版本信息</div>
      </td>
  </tr>
  <tr class="altbg1">
    <td>
        当前所用版本：V
        <?php echo SYS_VERSION; ?>&nbsp;<?php echo SYS_PUBLISHED; ?>&nbsp;(<?php echo $this->Config['charset']; ?>)&nbsp;&nbsp;
    </td>
  </tr>
</table>

<!--最新动态-->
<table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder" id="recommend_tabler" style="display: none;">
  <tr class="header">
    <td colspan="12">
	<div class="NavaL ndt">官方最新动态</div>
      </td>
  </tr>
  <tr class="altbg1">
    <td id="recommend">正在载入中...</td>
  </tr>
</table>
<!--最新动态-->

<table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
  <tr class="header">
    <td colspan="12">
      基本数据统计 </td>
  </tr>
  <tr class="altbg1">
    
<?php if(is_array($item_list)) { foreach($item_list as $item_name => $item) { ?>
    <td title="<?php echo $item_name; ?>个数"><?php echo $item_name; ?></td>
    
<?php } } ?>
    <td title="数据库占用空间">数据库大小</td>
  </tr>
  <tr class="altbg2">
    
<?php if(is_array($statistic)) { foreach($statistic as $item => $count) { ?>
    <td><a href="admin.php?mod=<?php echo $item; ?>" title="管理"><?php echo $count; ?></a></td>
    
<?php } } ?>
    <td><a href="admin.php?mod=db&code=export" title="备份"><?php echo $data_length; ?></a></td>
  </tr>
</table>
<div class="c"></div>

<table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
  <tr class="header">
    <td colspan="3">相关系统推荐</td>
  </tr>
  <tr class="altbg1">
    <td><A HREF="http://www.dream3.cn" target=_blank title="个人用户可以免费使用">手拉手团购系统：免费开源</A></td>
    <td></td>
    <td></td>
  </tr>
</table>
<?php if($check_upgrade) { ?>
<script language="JavaScript" type="text/javascript" src="admin.php?mod=upgrade&code=check&js=1"></script>
<?php } ?>
<script type="text/javascript" src="./templates/default/js/min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$.get('admin.php?mod=index&code=recommend', function(data)
	{
		if (data != '')
        {
            $('#recommend_tabler').show();
            $('#recommend').html(data);
        }
	})
    $.get('admin.php?mod=index&code=upgrade_check', function(data){
        if (data != 'noups')
        {
            $('#ups_alert').html(''+data+' &gt;&gt;&gt; <a href="admin.php?mod=upgrade"><font id="ups_alert_light" style="color:red;font-weight:bold;font-size:13px;">点此进行在线升级</font></a>');
        }
        else
        {
            $('#ups_alert').html('已是最新版本');
        }
    });
    if (typeof(lrcmd) != 'undefined' && typeof(lrcmd) == 'string')
    {
        $.get('admin.php?mod=index&code=lrcmd_nt&lv='+lrcmd, function(data){
            if (data != 'false')
            {
                $('#lic_recommend').html(data).slideDown();
            }
        });
    }
});
</script>