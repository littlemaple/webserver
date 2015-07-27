<?php /* 2011-12-29 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?><?php /* 2011-12-27 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
  <tr class="header">
    <td>友情提示</td>
  </tr>
  <tr class="altbg1">
    <td><ul>
        <li>您可以在下面勾选想出现在后台首页的快捷方式</li>
      </ul></td>
  </tr>
</table>
<form method="post"  name="smtp" action="<?php echo $action; ?>">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
  <a name="快捷方式设置"></a>
  <table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
    <tr class="header">
      <td colspan="2">快捷方式设置</td>
    </tr>
    
<?php if(is_array($menu_list)) { foreach($menu_list as $m_key => $m_val) { ?>
    
<?php if($m_val['sub_menu_list'] && is_array($m_val['sub_menu_list']) && count($m_val['sub_menu_list'])) { ?>
    <tr>
      <td class="altbg1" width="145"><?php echo $m_val['title']; ?></td>
      <td class="altbg2">
<?php if(is_array($m_val['sub_menu_list'])) { foreach($m_val['sub_menu_list'] as $s_m_key => $s_m_val) { ?>
        
<?php $_checked=$s_m_val['shortcut']?' checked ':''; ?>
        <input type="checkbox" id="menu_list_<?php echo $m_key; ?>_<?php echo $s_m_key; ?>" name="menu_list[<?php echo $m_key; ?>][<?php echo $s_m_key; ?>][shortcut]" value="1" <?php echo $_checked; ?> />
        <label for="menu_list_<?php echo $m_key; ?>_<?php echo $s_m_key; ?>"><?php echo $s_m_val['title']; ?></label>
        &nbsp;
        
<?php } } ?>
      </td>
    </tr>
    
<?php } ?>
    
<?php } } ?>
  </table>
  <br>
  <center>
    <input type="submit" class="button" name="settingsubmit" value="提 交">
  </center>
  <br>
</form>
<br>