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
        
<?php } ?><!-- 
<?php if($this->Code == '') $main_class='current' ?>
 -->
<!-- 
<?php if($this->Code == 'info') $info_class='current' ?>
 -->
<!-- 
<?php if($this->Code == 'manage') $manage_class='current' ?>
 -->
<!-- 
<?php if($this->Code == 'setting') $setting_class='current' ?>
 -->
<div class="nav3">
  <ul class="cc">
    <li class="<?php echo $main_class; ?>">
      <a href="admin.php?mod=event">活动主题</a>
    </li>
    <li class="<?php echo $info_class; ?>">
      <a href="admin.php?mod=event&code=info">可选必填项</a>
    </li>
	<li class="<?php echo $setting_class; ?>">
	  <a href="admin.php?mod=event&code=setting">基本设置</a>
	</li>
	<li class="<?php echo $manage_class; ?>">
	  <a href="admin.php?mod=event&code=manage">活动管理</a>
	</li>
  </ul>
</div>

<div>
<form action="admin.php?mod=event&code=addevent&act=<?php echo $act; ?>" method="POST" >
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
  <table width=100% cellspacing=1 cellpadding=3>
    <tr>
      <td>活动主题:</td>
    </tr>
    <tr> 
      <td> 
        <textarea name="name" cols="25" rows="5"></textarea>
        <font color="#FF0000">注意:</font>可以同时创建多个栏目,每个栏目换一行即可.
      </td>
    </tr>
    <tr> 
      <td> 
        <input type=submit value="提交" name="create" class="button">
      </td>
    </tr>
  </table>
</form>
</div>

<!-- 
<?php if($event) { ?>
 -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableborder">
  <tr class="header">
    <td width=30%>活动主题</td>
    <td width="20%">活动数</td>
    <td width=10%>删除</td>
  </tr>
<!-- 
<?php if(is_array($event)) { foreach($event as $key => $val) { ?>
 -->
  <tr>
    <td class="altbg1" style="border-bottom:1px dashed #ccc"><?php echo $val['type']; ?></td>
    <td class="altbg1" style="border-bottom:1px dashed #ccc">
    	<?php echo $val['count']; ?>
      <input type="hidden" id="hid_count_<?php echo $key; ?>" name="hid_count_<?php echo $key; ?>" value="<?php echo $val['count']; ?>">
    </td>
    <td class="altbg1" style="border-bottom:1px dashed #ccc">
      <a href="admin.php?mod=event&code=delevent&id=<?php echo $key; ?>" onclick="return del(<?php echo $key; ?>);">删除</a>
    </td>
  </tr>
<!-- 
<?php } } ?>
 -->
<!-- 
<?php } ?>
 -->
</table>
<script type="text/javascript">
  function del(key){
	  var count = document.getElementById('hid_count_'+key).value;
	  if(count == 0){
		  return confirm('你确实要删除吗?不可恢复');
	  }else{
		  alert('该主题下有活动，不能删除');
		  return false;
	  }
  }
</script>