<?php /* 2011-12-27 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?><!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"><head>
<?php $conf_charset=$this->Config['charset']; ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=7" />
<title>蒲公英微博客后台管理系统</title>
<link href="./templates/default/admin/admin_m.css" rel="stylesheet" type="text/css">
</head>
<body scroll="yes" style="height:100%">
<script type="text/javascript">
function setTab(name,cursel,n){
	for(i=1;i<=n;i++){
	var menu=document.getElementById(name+i);
	var con=document.getElementById("con_"+name+"_"+i);
	try {
		menu.className=i==cursel?"navon":"";
		con.style.display=i==cursel?"block":"none";
	}catch(e){}
}
return false;
}
</script>
<table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" height="80" valign="top"><div id="header">
        <div class="logo fl">
          <div class="png"><img width="160" height="43" src="./templates/default/admin/images/logo.gif" alt=" 蒲公英微博系统 " /></div>
          <div class="lun"><span style="color:#FA891B">V<?php echo SYS_VERSION; ?></span> <?php echo SYS_PUBLISHED; ?> </div>
        </div>
        <!--大导航 -->
        <ul class="nav">
<?php if(is_array($menuList)) { foreach($menuList as $i => $menuOne) { ?>
          <li id="nav<?php echo $i; ?>" onClick="return setTab('nav',<?php echo $i; ?>,8)"
<?php if($i==1) { ?>
 class="navon"
<?php } ?>
><em><a href="#"><?php echo $menuOne['title']; ?></a></em></li>
<?php } } ?>
        </ul>
        <!--头部信息导航-->
        <div class="wei fl">用户名：<?php echo MEMBER_NAME; ?>（<a href="admin.php?mod=login&code=logout">退出</a>） &nbsp;|&nbsp; <a href="admin.php?mod=index&code=home" target="main">控制面板首页</a> &nbsp;|&nbsp; <a href="admin.php?mod=cache" target="main">清空缓存</a> &nbsp;|&nbsp; <a title="在新窗口中打开访问首页" href="index.php" style="cursor: pointer;" class="s0" target="_blank">访问网站首页</a> &nbsp;|&nbsp; <a title="后退到前一页" onClick="history.go(-1);" style="cursor: pointer;" >后退一页</a> &nbsp;</div>
        <div class="wei2 fr">
          <TABLE>
            <TR>
              <TD valign="top"><div style="_padding-top:6px"><img title="商业用户可QQ在线咨询蒲公英客服" style="cursor: pointer" onClick="javascript:window.open('http://b.qq.com/webc.htm', '_blank', 'height=544, width=644,toolbar=no,scrollbars=no,menubar=no,status=no');"  border="0" src="./templates/default/images/admincp/qq.gif"></div></TD>
            </TR>
          </TABLE>
        </div>
        <!--头部信息导航结束-->
      </div></td>
  </tr>
  <tr>
    <td valign="top" id="main-fl"><div id="left">
        
<?php if(is_array($menuList)) { foreach($menuList as $i => $menuOne) { ?>
        <div id="con_nav_<?php echo $i; ?>"
<?php if($i>1) { ?>
 style="display:none;"
<?php } ?>
>
          <h1>
<?php if($i>1) { ?>
<?php echo $menuOne['title']; ?>
<?php } else { ?>常用操作 [<a style="background:none;padding:0;margin:0;display:inline;" href="admin.php?mod=setting&code=modify_shortcut" target="main">设置</a>]
<?php } ?>
</h1>
          <div class="cc"/>
        </div>
        <ul>
<?php if(is_array($menuOne['sub_menu_list'])) { foreach($menuOne['sub_menu_list'] as $j => $menu) { ?>
<?php if($menu['type'] == '1' && PLUGINDEVELOPER < 1)continue; ?>
<?php if($menu['link']!='hr') { ?>
          <li><a href="<?php echo $menu['link']; ?>" target="main"><?php echo $menu['title']; ?></a></li>
<?php } else { ?>        </ul>
        <h1><?php echo $menu['title']; ?></h1>
        <div class="cc"/>
      </div>
      <ul>
		
<?php } ?>
  
<?php } } ?>
      </ul>
      </div>
	  
<?php } } ?>
    </td>
    <td valign="top" id="mainright" style="height:94%; ">
	<iframe name="main" frameborder="0" width="100%" height="100%" frameborder="0" scrolling="yes" style="overflow: visible;" src="admin.php?mod=index&code=home">
	
      </iframe>
    </td>
  </tr>
</table>
</body>
</html>