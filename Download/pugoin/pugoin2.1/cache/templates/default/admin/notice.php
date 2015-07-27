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
<script type="text/javascript" charset="utf-8" src="templates/default/js/kind/kindeditor.js"></script>
<script type="text/javascript">
KE.show({
id : 'content'
});
</script>


<form action="admin.php?mod=notice&code=add" method="post"  enctype="multipart/form-data">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
  <table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
    <tr class="header">
      <td colspan="3"> <?php echo $ButtonTitle; ?>网站公告</td>
    </tr>
    <tr>
       <td width="13%" bgcolor="#F8F8F8"><span class="altbg1">标题: </span></td>
       <td bgcolor="#FFFFFF"><span class="altbg2">
        <input name="title" type="text" id="title" value="<?php echo $title; ?>" size="60" />
      </span>
	  </td>
    </tr>
	    <tr>
       <td width="13%" bgcolor="#F8F8F8"><span class="altbg1">内容: </span></td>
       <td bgcolor="#FFFFFF"><textarea name="content" cols="100" rows="10" id="content"><?php echo $content; ?></textarea></td>
    </tr>
	</tr>
	  <td rowspan="3" class="altbg1" width="200"></td>
      <td rowspan="3" class="altbg1" width="200"><button name="do" value='' type="submit" class="button"><?php echo $ButtonTitle; ?></button></td>
    </tr>
  </table>
</form>

<form action="admin.php?mod=notice&code=delete" method="post"  enctype="multipart/form-data">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableborder">
			<tr class="header">
				<td width="70">
			  <input class="checkbox" type="checkbox" name="chkall" onclick="checkall(this.form,'ids')" >全选</td>	
				<td width="914">标题</td>
				<td width="320">发布时间</td>
				<td width="87">操作</td>
			</tr>
<?php if(is_array($notice_list)) { foreach($notice_list as $notice) { ?>
			<tr align="center">
				<td class="altbg1" style="border-bottom:1px dashed #ccc">
				<input class="checkbox" type="checkbox" name="ids[]" id="ids" value="<?php echo $notice['id']; ?>" ></td>
				<td class="altbg2" style="border-bottom:1px dashed #ccc">
				<span class="altbg1" style="border-bottom:1px dashed #ccc"><a href="index.php?mod=other&code=notice&ids=<?php echo $notice['id']; ?>" target="_blank"><?php echo $notice['title']; ?></a></span></td>
				<td class="altbg1" style="border-bottom:1px dashed #ccc"><?php echo $notice['dateline']; ?></td>
				<td class="altbg2" style="border-bottom:1px dashed #ccc">
				<a href="admin.php?mod=notice&code=modify&ids=<?php echo $notice['id']; ?>">编辑</a>&nbsp;&nbsp;
				<A href="admin.php?mod=notice&code=delete&ids=<?php echo $notice['id']; ?>">删除</A>&nbsp;				</td>
			</tr>
			
<?php } } ?>
<?php if($page_arr['html']) { ?>
			<tr align="center">
				<td colspan="4" class="altbg1">
				<?php echo $page_arr['html']; ?>				</td>
			</tr>
			
<?php } ?>
</table>
<center>
  <button type="submit" class="button"> 删除选定 </button>&nbsp;&nbsp;
</center>

</form>