<?php /* 2015-07-27 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $conf_charset=$this->Config['charset']; ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->Config['site_name']; ?>(<?php echo $this->Config['site_domain']; ?>)<?php echo $this->Config['page_title']; ?></title>
<meta name="Keywords" content="<?php echo $this->MetaKeywords; ?>,<?php echo $this->Config['site_name']; ?><?php echo $this->Config['meta_keywords']; ?>" />
<meta name="Description" content="<?php echo $this->MetaDescription; ?>,<?php echo $this->Config['site_notice']; ?><?php echo $this->Config['meta_description']; ?>" />
<link rel="shortcut icon" href="templates/default/images/favicon.ico" />
<link href="templates/default/styles/pugoin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="templates/default/js/min.js"></script>
<script type="text/javascript" src="templates/default/js/rotate.js"></script>
<script type="text/javascript" src="templates/default/js/dialog.js" id="dialog_js"></script>
<script type="text/javascript" src="templates/default/js/common.js"></script>
</head>
<body>
<div class="full_wrapper index_warpper">

	<div class="header wrapper">
		<div class="contents">
			<div class="logo_slogn">
				<p>大学女生专属微社区</p>
				<p class="font12">来这里吧，这里有很多大学女生网购的分享心得，说不定对你有参考哦。</p>
			</div>
			<div class="logo"><a href="index.php?mod=topic&code=shopping" title="蒲公英">Skinpp</a></div>
		</div>
	</div>
    
    <div class="contents main_content">
        <div class="index-login-box">
            <h3 class="login_title"><span style="font-weight:normal; font-size:14px; float:right;"><a title="注册" class="sub_link" href="<?php echo $this->Config['site_url']; ?>/index.php?mod=member">注册</a></span>登录</h3>				
            <div id="show_loginform" class="row ">
                <form method="POST"  action="<?php echo $this->Config['site_url']; ?>/index.php?mod=login&code=dologin" id="guest_login" onKeyDown="if(event.keyCode==13) guestLoginSubmit();" autocomplete="off">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
                
<?php if($this->Config['seccode_login']) { ?>
					<input type="hidden" name="seccode" id="seccode_input" value="">
				
<?php } ?>
                <div class="login">
                    <div class="item">
                        <label class="form_label">用户名</label>
						<input type="text" name="username" class="form_input" id="username_input">
                        <div class="err_box hidden" id="login_email_tip"></div>
                        <div id="user_preview" class="login_p_box hidden"></div>
                    </div>
                    <div class="item">
                        <label class="form_label">密码</label>
						<input type="password" name="password" class="form_input" id="password_input">
                        <div class="err_box hidden" id="login_pwd_tip"></div>                            
                    </div>
                </div>
                <div style="float:left; width:90px; padding-top:47px;" class="form_btn">
                    <input type="submit" value="" class="btn_login_index" alt="登录" title="登录">
                    <p>
					<input type="checkbox" name="savelogin" style="vertical-align: middle;" checked title="请不要在公共电脑上使用自动登录功能">&nbsp;记住我
					</p>
                </div>
                </form>
            </div>
            
        </div>
    </div>
    
    <div class="footer wrapper">
		<div class="contents">			
			<div class="clearfix boot"><script type="text/javascript" src="templates/default/js/combobox.js"></script>
<script language="javascript" src="templates/default/js/jsgst.js"></script>
<script language="javascript" src="templates/default/js/jsgst_autocomplete.js"></script>
<script language="javascript" src="templates/default/js/ai.js"></script>
<!-- JS消息提示层 show_message('发布成功') -->
<div id="show_message_area"></div>
<?php echo $this->js_show_msg(); ?>
<?php echo $GLOBALS['schedule_html']; ?>
<?php if($this->Config['jsg_schedule'] || jsg_getcookie('jsg_schedule')) echo jsg_schedule(); ?>
<!-- Ajax端内容返回 -->
<div id="ajax_output_area"></div>

<div id="footer">Copyright &copy;  2011 - 2012 pugo.in <a href="index.php?mod=other&amp;code=about">关于我们</a> <a href="index.php?mod=tag&amp;code=意见反馈">意见反馈</a> <a rel="nofollow" title="网站公告" target="_blank" href="index.php?mod=other&amp;code=notice">网站公告</a> [<a rel="nofollow" title="网站备案" target="_blank" href="http://www.miibeian.gov.cn/"><?php echo $this->Config['icp']; ?></a>] <?php echo $this->Config['tongji']; ?></div>

<script type="text/javascript">
$(document).ready(function(){
$('.goTop').click(function(e){
e.stopPropagation();
$('html, body').animate({scrollTop: 0},300);
backTop();
return false;
});
});
</script>
<div id="backtop" class="backTop <?php echo $t_col_backTop; ?>"><a href="/#" class="goTop" ></a></div>
<script type="text/javascript">
window.onscroll=backTop;
function backTop(){
var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
  if(scrollTop==0){
   document.getElementById('backtop').style.display="none";
   }else{
   document.getElementById('backtop').style.display="block";
    }
  }
backTop();
</script>
</body>
</html>
<?php echo $GLOBALS['iframe']; ?></div>
		</div>
	</div>

    
</div>

</body>
</html>