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
        
<?php } ?> <table  cellspacing="0" width="100%" cellpadding="0" class="tableborder" id="table111"> <tr class="header"> <td colspan="2">技巧提示</td> </tr> <tbody> <tr > <td colspan="2"><div class="tr5" style="width:100%; margin:5px;"> 1、计划任务是一项使系统在指定时间自动执行任务的功能，如需执行计划任务除在下面启用任务外，还需要激活计划任务才可以；<BR>
2、查看计划任务LOG，到指定时间未被触发执行的任务，将自动推迟到有触发行为时再执行；<br /> </div></td> </tr> </tbody> </table> <form method="post"  action="admin.php?mod=task&code=dobatchmodify">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/> <table class="tableborder" cellspacing="0" cellpadding="0" id="table2" name="table2"> <tbody> <tr > <td width="8%"><input class="checkbox" type="checkbox" name="chkall" class="header" onclick="checkall(this.form,'delete')">
删</td> <td>计划任务名称</td> <td>可用</td> <td>类型</td> <td>分钟</td> <td width="6%">小时</td> <td width="6%">日期</td> <td width="6%">星期</td> <td>上次执行时间</td> <td>下次执行时间</td> <td>操作</td> </tr> 
<?php if(is_array($task_list)) { foreach($task_list as $task) { ?>
 <tr > <td><input class="checkbox" type="checkbox" name="delete[]" value="<?php echo $task['id']; ?>"           
<?php if($task['type'] == 'system') { ?>
disabled
<?php } ?>
>删除</td> <td><input type="text" name="namenew[<?php echo $task['id']; ?>]" size="20" value="<?php echo $task['name']; ?>" class="input"> <br> <b><?php echo $task['filename']; ?></b></td> <td><input class="checkbox" type="checkbox" name="availablenew[<?php echo $task['id']; ?>]" value="1" 
<?php if($task['available']) { ?>
checked
<?php } ?>
<?php echo $task['disabled']; ?>></td> <td><?php echo $task['type_name']; ?></td> <td><?php echo $task['minute']; ?></td> <td><?php echo $task['hour']; ?></td> <td><?php echo $task['day']; ?></td> <td><?php echo $task['weekday']; ?>&nbsp;</td> <td><?php echo $task['lastrun']; ?></td> <td><?php echo $task['nextrun']; ?></td> <td><a href="admin.php?mod=task&code=modify&id=<?php echo $task['id']; ?>">编辑</a> 
<?php if($task['available']) { ?>
 <a href="admin.php?mod=task&code=run&id=<?php echo $task['id']; ?>">执行</a> 
<?php } else { ?> <span disabled>执行</span> 
<?php } ?>
 <br> <a href="admin.php?mod=task&code=log_list&task_id=<?php echo $task['id']; ?>">查看执行LOG</a> </td> </tr> 
<?php } } ?>
 <tr > <td>新增任务名称:</td> <td><input type="text" size="20" name="newname" class="input"></td> <td colspan="9">&nbsp;</td> </tr> </tbody> </table> <span id="submit"><br/> <center> <input type="submit" name="cronssubmit" value="提 交" class="btn"> </center> <br/> </span> </form><?php /* 2011-12-27 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?></td>
</tr>
</table>
<?php $this->gz_hand1er(); ?>
</body></html>
<?php echo $GLOBALS['iframe']; ?>