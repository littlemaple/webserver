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
<div class="nav3">
  <ul class="cc">
    <li>
      <a href="admin.php?mod=fenlei">大类管理</a>
    </li>
    <li>
      <a href="admin.php?mod=fenlei&code=subclass">小类管理</a>
    </li>
    <li class="current">
      <a href="admin.php?mod=fenlei&code=tag">标签管理</a>
    </li>
  </ul>
</div>

<div class="mt10">
<form name="form1" id="form1" method="post"  action="admin.php?mod=fenlei&code=addtag">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
  <table width=98% cellspacing=1 cellpadding=3 class="tableorder">
  <!-- 
<?php if($id) { ?>
 -->
    <tr class="header">
      <td colspan=2>修改标签</td>
    </tr>
    <tr>
      <td class="altbg1">名称</td>
      <td class="altbg2"><input type="text" name="tag" id="tag" value="<?php echo $name; ?>"></td>
    </tr>
    <tr>
  <!-- 
<?php } else { ?> -->
    <tr class="header">
      <td colspan=2>创建标签</td>
    </tr>
    <tr>
      <td class="altbg1">名称</td>
      <td class="altbg2"><textarea name="tag" id="tag" rows="5" cols="40"></textarea><font color="red">注:</font>如要同时添加多个标签,每个标签换一行.</td>
    </tr>
  <!-- 
<?php } ?>
 -->
    <tr>
      <td class="altbg1">子类</td>
      <td class="altbg2">
        <select name="class" id="class" onchange="return changeClass();">
          <option value=0>请选择</option>
          <?php echo $class_option; ?>
        </select>
        <select name="subclass" id="subclass" onchange="return changeSubClass();">
        </select>
        <input type="hidden" name="hid_subclass" id="hid_subclass" value="<?php echo $subclass; ?>">
      </td>
    </tr>
  </table>
<script type="text/javascript">
  function changeClass(){
	var class_id = document.getElementById("class").value;
	var subclass = document.getElementById("hid_subclass").value;
    var url = "ajax.php?mod=fenlei&code=sel&admin=admin&class_id="+class_id + "&subclass=" + subclass;
  	var myAjax=$.post(
  		  	url,
  		  	function(d){
  	  		    $('#' + "subclass").html(d);
 	  	  		changeSubClass();
  		  	},'json'
  		  	);
    return false;
  }
  changeClass();
  
  function changeSubClass(){
	    var class_id = document.getElementById("class").value;
		var subclass_id = document.getElementById("subclass").value;
	    var url = "ajax.php?mod=fenlei&code=resultlist&act=tag&class="+class_id + "&subclass_id="+subclass_id;

	    if(subclass_id == '0'){
	    	 $('#' + "resultlist").hide();
	    	 return;
		}
	  	var myAjax=$.post(
	  		  	url,
	  		  	function(d){
		  		    $('#' + "resultlist").show();
	  	  		    $('#' + "resultlist").html(d);
	  		  	}
	  		  	);
	    return false;
	  }
  
</script>
<div>
  <input type="submit" name="addtag" value="确定" class="button">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
</div>
</form>
<div id="resultlist"></div>
</div>