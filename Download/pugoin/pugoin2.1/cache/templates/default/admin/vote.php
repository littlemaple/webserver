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
<?php $_sub_menu_list = $_sub_menu_list?$_sub_menu_list:get_sub_menu($this->Module); ?>
<div class="nav3">
	<ul class="cc">
<?php if(is_array($_sub_menu_list)) { foreach($_sub_menu_list as $value) { ?>
<?php if($value['type'] == '1' && PLUGINDEVELOPER < 1)continue; ?>
<li 
<?php if($value['code'] == $this->Code) { ?>
class="current"
<?php } ?>
>
<?php if($this->pluginid) { ?>
<a href="<?php echo $value['link']; ?>&id=<?php echo $this->pluginid; ?>">
<?php } else { ?><a href="<?php echo $value['link']; ?>">
<?php } ?>
<?php echo $value['name']; ?></a></li>
		
<?php } } ?>
</ul>
</div>
<script language="javascript">
function check_all(type, form, value, checkall, changestyle) {
	var checkall = checkall ? checkall : 'chkall';
	for(var i = 0; i < form.elements.length; i++) {
		var e = form.elements[i];
		if(type == 'option' && e.type == 'radio' && e.value == value && e.disabled != true) {
			e.checked = true;
		} else if(type == 'value' && e.type == 'checkbox' && e.getAttribute('chkvalue') == value) {
			e.checked = form.elements[checkall].checked;
			if(changestyle) {
				multiupdate(e);
			}
		} else if(type == 'prefix' && e.name && e.name != checkall && (!value || (value && e.name.match(value)))) {
			e.checked = form.elements[checkall].checked;
			if(changestyle && e.parentNode && e.parentNode.tagName.toLowerCase() == 'li') {
				e.parentNode.className = e.checked ? 'checked' : '';
			}
		}
	}
}
</script>
<div id="main_wp" class="mt10">
	<form action="admin.php" method="get" name="search">
	<table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
		<tr class="header">
			<td colspan="2">搜索投票</td>
		</tr>
		<input name="mod" type="hidden" value="vote">
		<!--<input name="per_page_num" type="hidden" value="<?php echo $per_page_num; ?>">-->
		<tr>
			<td class="altbg1" width="150">
			投票ID:
			</td>
			<td class="altbg2">
			<input name="vid" type="text" id="vid" value="<?php echo $vid; ?>" size="40">		
			</td>
		</tr>
		<tr>
			<td class="altbg1" width="150">
			投票主题:
			</td>
			<td class="altbg2">
			<input type="text" name="subject" value="<?php echo $subject; ?>" size="40">		
			</td>
		</tr>
		<tr>
			<td class="altbg1" width="150">&nbsp;
			
			</td>
			<td class="altbg2">
			<button name="do" value='' type="submit" class="button">搜索一下</button> &nbsp;<button class="button" type="button" onclick="window.location.href='admin.php?mod=vote';return false;">全部投票</button>
			</td>
		</tr>
		
	</table>
	</form>

	<form method="post"  action="admin.php?mod=vote&code=batch">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
		<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableborder">
			<tr class="header">
				<td width="30">
				<input class="checkbox" type="checkbox" name="chkall" onclick="checkall(this.form, 'del_ids')" ></td>	
				<td>投票主题</td>
				<td width="80">参与人数</td>
				<td width="140">时间</td>
				<td width="80">推荐</td>
				<td width="80">操作</td>
			</tr>
<?php if($count) { ?>
<?php if(is_array($list)) { foreach($list as $value) { ?>
				<tr align="center">
					<td class="altbg1" style="border-bottom:1px dashed #ccc">
					<input type="hidden" name="vids[]" value="<?php echo $value['vid']; ?>" >
					<input class="checkbox" type="checkbox" name="del_ids[]" value="<?php echo $value['vid']; ?>" ></td>
					<td class="altbg2" style="border-bottom:1px dashed #ccc">
						<a href="index.php?mod=vote&code=view&vid=<?php echo $value['vid']; ?>" target="_blank"><?php echo $value['subject']; ?></a>
					</td>
					<td class="altbg1" style="border-bottom:1px dashed #ccc"><?php echo $value['voter_num']; ?></td>
					<td class="altbg2" style="border-bottom:1px dashed #ccc">
<?php echo my_date_format($value['dateline'], 'Y-m-d') ?>
</td>
					<td class="altbg1" style="border-bottom:1px dashed #ccc">
						<input class="checkbox" type="checkbox" name="recd_ids[<?php echo $value['vid']; ?>]" value="1" <?php echo $value['recd_checked']; ?>>
					</td>
					<td class="altbg2" style="border-bottom:1px dashed #ccc">
					<a href="admin.php?mod=vote&amp;code=edit&amp;vid=<?php echo $value['vid']; ?>">编辑</a>&nbsp;&nbsp;
					<A href="admin.php?mod=vote&code=delete&ids=<?php echo $value['vid']; ?>">删除</A>&nbsp;				</td>
				</tr>
				
<?php } } ?>
<?php if($page_arr['html']) { ?>
				<tr align="center">
					<td colspan="6" class="altbg1">
					<?php echo $page_arr['html']; ?>
					</td>
				</tr>
				
<?php } ?>
<?php } else { ?><tr align="center">
					<td colspan="5">
						还没有投票记录
					</td>
				</tr>
			
<?php } ?>
</table>
	
		<center><input class="button" type="submit" name="cronssubmit" value="提 交"></center>
	</form>
	
	<br />
</div>