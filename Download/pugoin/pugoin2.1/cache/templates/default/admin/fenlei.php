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
    <li class="current">
      <a href="admin.php?mod=fenlei">大类管理</a>
    </li>
    <li>
      <a href="admin.php?mod=fenlei&code=subclass">小类管理</a>
    </li>
    <li>
      <a href="admin.php?mod=fenlei&code=tag">标签管理</a>
    </li>
  </ul>
</div>

<div class="mt10">
<form name="form1" method="post"  action="admin.php?mod=fenlei&code=addclass">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
  <table width=98% cellspacing=1 cellpadding=3 class="tableorder">
  <!-- 
<?php if($id) { ?>
 -->
    <tr class="header"> 
      <td colspan=2>修改大类</td>
    </tr>
    <tr>
  	  <td class="altbg1">名称</td>
  	  <td class="altbg2"><input type="text" id="class" name="class" value="<?php echo $class; ?>"></td>
    </tr>
  <!-- 
<?php } else { ?> -->
    <tr class="header"> 
      <td colspan=2>创建大类</td>
    </tr>
    <tr>
  	  <td class="altbg1">名称</td>
  	  <td class="altbg2"><textarea id="class" name="class" rows="5" cols="40"></textarea><font color="red">注:</font>如要同时添加多个地名,每个大类换一行.</td>
    </tr>
  <!-- 
<?php } ?>
 -->
    <tr>
      <td>
        <input type="submit" name="submit22" value="确定" class="button">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
      </td>
    </tr>
  </table>
</form>
<br>
<form name="form2" method="post"  action="admin.php?mod=fenlei&code=classorder">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
  <table width="98%" border="0" cellspacing="0" cellpadding="0" class="tableorder">
    <tr align="center" class="header"> 
      <td width="40%">名称</td>
      <td width="30%">排序</td>
      <td width="30%">操作</td>
    </tr>
    <!-- 
<?php if(is_array($rs)) { foreach($rs as $key => $val) { ?>
 -->
    <tr> 
      <td class="altbg1" style="border-bottom:1px dashed #ccc"><a href="admin.php?mod=fenlei&code=subclass&class=<?php echo $val['id']; ?>"><?php echo $val['name']; ?></a></td>
      <td class="altbg1" style="border-bottom:1px dashed #ccc"><input type='text' name='order[<?php echo $val['id']; ?>]' value='<?php echo $val['list']; ?>' size='5'/></td>
      <td class="altbg1" style="border-bottom:1px dashed #ccc">
        <a href="admin.php?mod=fenlei&id=<?php echo $val['id']; ?>">编辑</a>
        <span>&nbsp;|&nbsp;</span>
        <a href="admin.php?mod=fenlei&code=delclass&fid=<?php echo $val['id']; ?>" onclick="return confirm('你确实要删除吗?不可恢复');">删除</a>
      </td>
    </tr>
    <!-- 
<?php } } ?>
 -->
    <tr>
      <td><input type="submit" name="submit11" value="修改排序" class="button"></td>
    </tr>
  </table>
</form>
</div>