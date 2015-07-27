<?php /* 2015-07-27 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?>
<?php $__my=$this->MemberHandler->MemberFields; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo $this->Config['site_url']; ?>/" />
<?php $conf_charset=$this->Config['charset']; ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->Title; ?> - <?php echo $this->Config['site_name']; ?>(<?php echo $this->Config['site_domain']; ?>)<?php echo $this->Config['page_title']; ?></title>
<meta name="Keywords" content="<?php echo $this->MetaKeywords; ?>,<?php echo $this->Config['site_name']; ?><?php echo $this->Config['meta_keywords']; ?>" />
<meta name="Description" content="<?php echo $this->MetaDescription; ?>,<?php echo $this->Config['site_notice']; ?><?php echo $this->Config['meta_description']; ?>" />
<link rel="shortcut icon" href="templates/default/images/favicon.ico" >
<link href="templates/default/styles/main.css" rel="stylesheet" type="text/css" />
<?php if($this->Config['theme_id']) { ?>
<link href="templates/default/styles/<?php echo $this->Config['theme_id']; ?>.css" rel="stylesheet" type="text/css" />
<?php } ?>
<style type="text/css">
<?php if($this->Config['theme_text_color']) { ?>
body{ color:<?php echo $this->Config['theme_text_color']; ?>; }
<?php } ?>

<?php if($this->Config['theme_bg_color']) { ?>
body{ background-color:<?php echo $this->Config['theme_bg_color']; ?>; }
<?php } ?>

<?php if($this->Config['theme_bg_image']) { ?>
body{ background-image:url(<?php echo $this->Config['theme_bg_image']; ?>); }
<?php } ?>

<?php if($this->Config['theme_bg_position']) { ?>
body{ background-position:<?php echo $this->Config['theme_bg_position']; ?>; }
<?php } ?>

<?php if($this->Config['theme_bg_repeat']) { ?>
body{ background-repeat:<?php echo $this->Config['theme_bg_repeat']; ?>; }
<?php } ?>

<?php if($this->Config['theme_bg_fixed']) { ?>
body{ background-attachment:<?php echo $this->Config['theme_bg_fixed']; ?>; }
<?php } ?>

<?php if($this->Config['theme_text_color']) { ?>
body{ color:<?php echo $this->Config['theme_text_color']; ?>; }
<?php } ?>

<?php if($this->Config['theme_link_color']) { ?>
a:link{ color:<?php echo $this->Config['theme_link_color']; ?>; }
<?php } ?>
a.artZoom{ cursor:url(<?php echo $this->Config['site_url']; ?>/templates/default/images/magnifier_b.cur), pointer; }
.artZoomBox a.maxImgLink { cursor:url(<?php echo $this->Config['site_url']; ?>/templates/default/images/magnifier_s.cur), pointer; }

a.artZoom2{ cursor:url(<?php echo $this->Config['site_url']; ?>/templates/default/images/magnifier_b.cur), pointer; }

a.artZoom3{ cursor:url(<?php echo $this->Config['site_url']; ?>/templates/default/images/magnifier_b.cur), pointer; }
.artZoomBox a.maxImgLink3 { cursor:url(<?php echo $this->Config['site_url']; ?>/templates/default/images/magnifier_s.cur), pointer; }

a.artZoomAll{ cursor:url(<?php echo $this->Config['site_url']; ?>/templates/default/images/magnifier_b.cur), pointer; }
.artZoomBox a.maxImgLinkAll { cursor:url(<?php echo $this->Config['site_url']; ?>/templates/default/images/magnifier_s.cur), pointer; }
</style>

<script type="text/javascript">
var thisSiteURL = '<?php echo $this->Config['site_url']; ?>/';
var thisTopicLength = '<?php echo $this->Config['topic_length']; ?>';
var thisMod = '<?php echo $this->Module; ?>';
var thisCode = '<?php echo $this->Code; ?>';
<?php $qun_setting = ConfigHandler::get('qun_setting'); ?>
<?php if($qun_setting['qun_open']) { ?>
	
	var isQunClosed = false;
<?php } else { ?>var isQunClosed = true;
<?php } ?>
function faceError(imgObj)
{
<?php if(TRUE===UCENTER_FACE) { ?>
		var errorSrc = '<?php echo $this->Config['site_url']; ?>/images/noavatar.gif';
<?php } else { ?>var errorSrc = '<?php echo $this->Config['site_url']; ?>/images/no.gif';
	
<?php } ?>
imgObj.src = errorSrc;
}
</script>
<script type="text/javascript" src="templates/default/js/min.js"></script>
<script type="text/javascript" src="templates/default/js/common.js"></script>
<script type="text/javascript" src="templates/default/js/rotate.js"></script>
<script type="text/javascript" src="templates/default/js/dialog.js" id="dialog_js"></script>
<script type="text/javascript" src="templates/default/js/lang.js"></script>
<script type="text/javascript" src="images/uploadify/jquery.uploadify.v2.1.4.min.js"></script>
<?php if(in_array($this->Code, array("follow","fans"))) { ?>
<script type="text/javascript" src="templates/default/js/relation.js"></script>
<?php } ?>

<?php if($this->Get['mod']=="vote") { ?>
<script type="text/javascript" src="templates/default/js/vote.js"></script>
<?php } ?>

<?php if($this->Get['mod']=="qun") { ?>
<script type="text/javascript" src="templates/default/js/qun.js"></script>
<?php } ?>
<!--[if IE 6]>
<script type="text/javascript" src="templates/default/js/DD_belatedPNG_0.0.8a-min.js" ></script>
<script type="text/javascript">DD_belatedPNG.fix('.header,.pweibo,.boxRNav2 li,.boxRNav2 li a');   </script>
<![endif]-->   

</head>
<?php echo $additional_str; ?>
<body>
<?php if(MEMBER_ID) { ?>
<?php if(MEMBER_STYLE_THREE_TOL == 1) { ?>
<?php $t_col_header ='t_col_header';  $t_col_logo ='t_col_logo'; $t_col_main='t_col_main'; $t_col_main_side='t_col_main_side'; $t_col_foot='t_col_foot'; $t_col_backTop='t_col_backTop'; $t_col_main_rn='t_col_main_rn'; $t_col_main_lb='t_col_main_lb'; $t_col_tagBox='t_col_tagBox';  ?>
<?php } ?>
<?php } ?>
<div class="header">
<script type="text/javascript">
$(document).ready(function(){
$(".t_c1").mouseover(function(){$(".t_c1_box").show();$(".t_c1").addClass("on");});
$(".t_c1").mouseout(function(){$(".t_c1_box").hide();$(".t_c1").removeClass("on");});
//$(".t_c2").mouseover(function(){$(".t_c2_box").show();$(".t_c2").addClass("on");});
//$(".t_c2").mouseout(function(){$(".t_c2_box").hide();$(".t_c2").removeClass("on");});
});
</script>
<div class="headerNav <?php echo $t_col_header; ?>">
    <ul class="hleft">
	<li class="logo2"><a href="index.php?mod=topic&code=shopping" title="<?php echo $this->Config['site_name']; ?>"><img src="templates/default/images/logo2.png" /></a></li>
<?php $navigation_config=ConfigHandler::get('navigation');global $rewriteHandler; ?>
<?php if(is_array($navigation_config['list'])) { foreach($navigation_config['list'] as $_v) { ?>
<?php if(!empty($_v['type_list'])) { ?>
		<script type="text/javascript">
		$(document).ready(function(){
			$(".t_c<?php echo $_v['code']; ?>").mouseover(function(){$(".t_c<?php echo $_v['code']; ?>_box").show();$(".t_c<?php echo $_v['code']; ?>").addClass("on");});
			$(".t_c<?php echo $_v['code']; ?>").mouseout(function(){$(".t_c<?php echo $_v['code']; ?>_box").hide();$(".t_c<?php echo $_v['code']; ?>").removeClass("on");});
		});
		</script>
	
<?php } ?>
<?php if($rewriteHandler)$_v['url']=$rewriteHandler->formatURL($_v['url']); ?>
<li class="t_c<?php echo $_v['code']; ?>"><a href="<?php echo $_v['url']; ?>" target="<?php echo $_v['target']; ?>" title="<?php echo $_v['name']; ?>"><?php echo $_v['name']; ?></a>
<?php if(!empty($_v['type_list'])) { ?>
		<ul class="t_c1_box t_c<?php echo $_v['code']; ?>_box" style="display:none;">
		 
<?php if(is_array($_v['type_list'])) { foreach($_v['type_list'] as $val) { ?>
		  
<?php if($val['name']) { ?>
		  
<?php if($rewriteHandler)$val['url']=$rewriteHandler->formatURL($val['url']); ?>
<li><a href="<?php echo $val['url']; ?>" target="<?php echo $val['target']; ?>"><?php echo $val['name']; ?></a></li>
		   
<?php } ?>
 
<?php } } ?>
 
<?php if(!empty($navigation_config['pluginmenu']) && $_v['code'] == 'app') { ?>
		 
<?php if(is_array($navigation_config['pluginmenu'])) { foreach($navigation_config['pluginmenu'] as $pmenus) { ?>
		 
<?php if(is_array($pmenus)) { foreach($pmenus as $pmenu) { ?>
<?php if($pmenu['type'] == 1) { ?>
<?php if($rewriteHandler)$pmenu['url']=$rewriteHandler->formatURL($pmenu['url']); ?>
<li><a href="<?php echo $pmenu['url']; ?>" target="<?php echo $pmenu['target']; ?>"><?php echo $pmenu['name']; ?></a></li>
			
<?php } ?>
 
<?php } } ?>
 
<?php } } ?>
 
<?php } ?>
 </ul>
	 
<?php } ?>
</li>
	
<?php } } ?>
<li class="sweibo">
	    <div class="searchTool">
          <form method="get" action="#" name="headSearchForm" id="headSearchForm" onsubmit="return headDoSearch();">
            <input id="headSearchType" name="searchType" type="hidden" value="topicSearch">
            <div class="selSearch">
              <div class="nowSearch" id="headSlected" onclick="if(document.getElementById('headSel').style.display=='none'){document.getElementById('headSel').style.display='block';}else {document.getElementById('headSel').style.display='none';};return false;" onmouseout="drop_mouseout('head');">分享</div>
              <div class="btnSel"><a href="#" onclick="if(document.getElementById('headSel').style.display=='none'){document.getElementById('headSel').style.display='block';}else {document.getElementById('headSel').style.display='none';};return false;" onmouseout="drop_mouseout('head');"></a></div>
              <div class="clear"></div>
              <ul class="selOption" id="headSel" style="display:none;">
			  	<li><a href="#" onclick="return search_show('head','topicSearch',this)" onmouseover="drop_mouseover('head');" onmouseout="drop_mouseout('head');">分享</a></li>
                <li><a href="#" onclick="return search_show('head','userSearch',this)" onmouseover="drop_mouseover('head');" onmouseout="drop_mouseout('head');">用户</a></li>
                <li><a href="#" onclick="return search_show('head','tagSearch',this)" onmouseover="drop_mouseover('head');" onmouseout="drop_mouseout('head');">话题</a></li>
<?php $vote_setting = ConfigHandler::get('vote'); ?>
<?php if($vote_setting['vote_open']) { ?>
					<li>
						<a href="#" onclick="return search_show('head','voteSearch',this)" onmouseover="drop_mouseover('head');" onmouseout="drop_mouseout('head');">投票</a>					</li>
				
<?php } ?>
<?php $qun_setting = ConfigHandler::get('qun_setting'); ?>
<?php if($qun_setting['qun_open']) { ?>
					<li>
						<a href="#" onclick="return search_show('head','qunSearch',this)" onmouseover="drop_mouseover('head');" onmouseout="drop_mouseout('head');">微群</a>					</li>
				
<?php } ?>
              </ul>
            </div>
            <input class="txtSearch" id="headq" name="headSearchValue" type="text" value="请输入关键字" onfocus="this.value=''"/>
            <div class="btnSearch"> <a href="#" onclick="javascript:return headDoSearch();"><span class="lbl"></span></a></div>
          </form>
        </div>
	  	</li>
		

		<li class="pweibo" style="cursor:pointer;" onclick="showMainPublishBox();">发分享
		  <input type="hidden" name="check_PublishBox_uid" id="check_PublishBox_uid"  value="<?php echo MEMBER_ID; ?>"/>
		</li>
    </ul>
    <ul class="hright">
      
<?php if(MEMBER_ID > 0) { ?>
	  <li class="t_c3">欢迎您</li>
	  <li class="t_c2" onmouseout="this.className='t_c2'" onmouseover="this.className='t_c2 t_c2_over'">
	  <dl>
	  <dt><a title="<?php echo MEMBER_NICKNAME; ?>" href="index.php?mod=<?php echo MEMBER_NAME; ?>"><?php echo MEMBER_NICKNAME; ?></a><span class="more"></span></dt>
	  <dd><a href="index.php?mod=profile&code=invite">邀请</a></dd>
	  <dd id="web_list_type_<?php echo MEMBER_ID; ?>">
	  <input type="hidden" id="web_style" name="web_style" value="<?php echo MEMBER_STYLE_THREE_TOL; ?>"/>
	  
<?php if (MEMBER_STYLE_THREE_TOL == 1) $ajax_list = 'right'; else $ajax_list = 'left'; ?>
   
	  <a href="javascript:void(0);" onclick="web_list_type(<?php echo MEMBER_ID; ?>,'web_style','<?php echo $params['code']; ?>','<?php echo $ajax_list; ?>','<?php echo $member['uid']; ?>'); return false;"></a> 
	  </dd>
	  <dd><a href="index.php?mod=pm&code=list" title="私信">私信</a></dd>
	  <dd><a href="index.php?mod=settings" title="设置用户昵称、头像等">账号设置</a></dd>
	  <dd><a href="index.php?mod=<?php echo MEMBER_NAME; ?>&code=follow">关系中心</a></dd>
	  
<?php if('admin'==MEMBER_ROLE_TYPE) { ?>
	  <dd><a href="admin.php">后台管理</a></dd>
	  
<?php } ?>
  <dd><a href="<?php echo $this->Config['site_url']; ?>/index.php?mod=login&code=logout" rel="nofollow">退出</a></dd>
	  </dl>
	  </li>
	  <li class="theme_c"><a href="index.php?mod=theme">换肤</a></li>
	  
<?php } else { ?>      <li><a href="javascript:viod(0)" rel="nofollow" title="登录即可分享新鲜事" onclick="ShowLoginDialog(); return false;">登录</a></li>
      
<?php } ?>
    </ul>
  </div>
  <!--<div class="headerBg"></div>-->
</div>

<div class="logow <?php echo $t_col_logo; ?>">

    
<?php if(MEMBER_ID>0) { ?>
    <!-- 消息提示框 开始 -->
    
<?php if($__my['comment_new']>0 || $__my['fans_new']>0 || $__my['at_new']>0 || $__my['newpm']>0 || $__my['favoritemy_new']>0 || $__my['vote_new']>0 || $__my['qun_new']>0 || $__my['event_new']>0 || $__my['topic_new']>0 || $__my['event_post_new']>0 || $__my['fenlei_post_new']>0) { ?>
        
<?php $__tagBoxStyle='display:block;visibility:visible;'; ?>
    
<?php } else { ?>        
<?php $__tagBoxStyle='display:none;visibility:hidden;'; ?>
    
<?php } ?>
    <script type="text/javascript">
        function tagBox_close()
        {
            var obj = document.getElementById("tagBox_<?php echo MEMBER_ID; ?>");
            obj.style.visibility = "hidden";
        }
    </script>
    <div class="tagBox <?php echo $t_col_tagBox; ?>" id="tagBox_<?php echo MEMBER_ID; ?>" style="<?php echo $__tagBoxStyle; ?>">
        <div id="tagBoxContent_<?php echo MEMBER_ID; ?>">
        <ul>
		
          
<?php if($__my['newpm']>0) { ?>
          <li><a href="index.php?mod=pm&code=list"><?php echo $__my['newpm']; ?>条新私信，查看</a></li>
          
<?php } ?>
          
<?php if($__my['comment_new']>0) { ?>
          <li><a href="index.php?mod=topic&code=mycomment"><?php echo $__my['comment_new']; ?>条新评论，查看</a></li>
          
<?php } ?>
          
<?php if($__my['fans_new']>0) { ?>
          <li><a href="index.php?mod=<?php echo $__my['username']; ?>&code=fans"><?php echo $__my['fans_new']; ?>人关注了我，查看</a></li>
          
<?php } ?>
          
<?php if($__my['at_new']>0) { ?>
          <li><a href="index.php?mod=topic&code=myat"><?php echo $__my['at_new']; ?>人@提到我，查看</a></li>
          
<?php } ?>
          
<?php if($__my['favoritemy_new']>0) { ?>
          <li><a href="index.php?mod=topic&code=favoritemy"><?php echo $__my['favoritemy_new']; ?>人收藏了我的微博，查看</a></li>
          
<?php } ?>
  
<?php if($__my['vote_new']>0) { ?>
		  <li><a href="index.php?mod=vote&view=me&filter=new_update&uid=<?php echo $__my['uid']; ?>">投票新增<?php echo $__my['vote_new']; ?>人参与，查看</a></li>
		  
<?php } ?>
  
<?php if($__my['qun_new']>0) { ?>
		  <li><a href="index.php?mod=topic&code=qun">微群新增<?php echo $__my['qun_new']; ?>条内容，查看</a></li>
		  
<?php } ?>
          
<?php if($__my['event_new']>0) { ?>
          <li><a href="index.php?mod=event&code=myevent&type=new">活动新增<?php echo $__my['event_new']; ?>人报名，查看</a></li>
          
<?php } ?>
          
<?php if($__my['topic_new']>0) { ?>
          <li><a href="index.php?mod=topic&code=tag">话题新增<?php echo $__my['topic_new']; ?>条微博，查看</a></li>
          
<?php } ?>
          
<?php if($__my['event_post_new']>0) { ?>
          <li><a href="index.php?mod=topic&code=other&view=event">新增<?php echo $__my['event_post_new']; ?>个关注的活动，查看</a></li>
          
<?php } ?>
          
<?php if($__my['fenlei_post_new']>0) { ?>
          <li><a href="index.php?mod=topic&code=other&view=fenlei">新增<?php echo $__my['fenlei_post_new']; ?>个关注的分类信息，查看</a></li>
          
<?php } ?>
        </ul>
        </div>
        <div class="tagBox_del"><a href="javascript:tagBox_close();" title="关闭" javascript:void(0)><img src="templates/default/images/imgdel.gif" /></a></div>
    </div>
    <!-- 消息提示框 结束 -->
    
<?php } ?>
</div>
<script type="text/javascript" src="templates/default/js/validate.js"></script>
<div class="main <?php echo $t_col_main; ?>">

<!--此处三栏-->
<div class="t_col_main_si <?php echo $t_col_main_side; ?>">
<div class="t_col_main_fl">
	<div id="topic_index_left_ajax_list">
<?php if(MEMBER_STYLE_THREE_TOL == 1) { ?>
	 <script language="javascript">
	$(document).ready(function(){
		/*
		* ajax 右侧显示数据
		* 这里的函数可以随便更改位置，加载的顺序也会不同。
		*/
		if(<?php echo MEMBER_ID; ?>)
		{
			get_my_user_tag(); 
			get_myfavoritetags();
		}
		
	});
	function get_my_user_tag(){
		//我的个人标签
		right_show_ajax('<?php echo MEMBER_ID; ?>','user_tag','user_tag');
	}
	function get_myfavoritetags(){
		//我关注的话题
		right_show_ajax('<?php echo MEMBER_ID; ?>','myfavoritetags','myfavoritetags');
	}
</script>


<!--网站开启三栏后 显示左边  关于我的信息-->

<div class="t_col_main_ln <?php echo $t_col_main_lb; ?>">
<script type="text/javascript">
	$(document).ready(function(){
		$(".member_exp").mouseover(function(){$(".member_exp_c").show();});
		$(".member_exp").mouseout(function(){$(".member_exp_c").hide();});
		$("#m_avatar2").mouseover(function(){$(".avatar_tips").show();});
		$("#m_avatar2").mouseout(function(){$(".avatar_tips").hide();});
	});
</script>
<!--用户头像等信息-->
<?php if($my_member || $member) { ?>
<?php $_mymember = $my_member ? $my_member : $member ?>
<?php if((MEMBER_ID == $_mymember['uid'] || $this->Code > 0) ) { ?>
	<div class="sideBox">
		<div class="avatar2" id="m_avatar2">
			<p class="avatar2_i"><a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="<?php echo $_mymember['username']; ?>">
			<img src="<?php echo $_mymember['face']; ?>" alt="<?php echo $_mymember['nickname']; ?>" onerror="javascript:faceError(this);" />
			</a></p>
			<p class="avatar_tips"><a id="avatar_upload" href="index.php?mod=settings&code=face">上传头像</a></p>
		
		</div>
		
		
		<div class="avatar2_info">
		<a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="@<?php echo $_mymember['nickname']; ?>"><?php echo $_mymember['nickname']; ?></a><?php echo $_mymember['validate_html']; ?>
		<?php echo $this->hookall_temp['global_user_extra1']; ?>

		<div class="member_exp">
			 
<?php if($this->Config['level_radio']) { ?>
<?php if($this->Config['topic_level_radio']) { ?>
						 <a href="index.php?mod=settings&code=exp" target="_blank" class="ico_level wbL<?php echo $_mymember['level']; ?>"><em><?php echo $_mymember['level']; ?></em></a>
				
<?php } ?>
 
<?php } ?>
<?php if($_mymember['credits']) { ?>
积分：<a title="点击查看我的积分" href="index.php?mod=settings&code=extcredits"><b><?php echo $_mymember['credits']; ?></b></a>
<?php } ?>
</div>
		
		<div id="userarea">
<?php if(trim($_mymember['from_area'])) { ?>
		<?php echo $_mymember['from_area']; ?>
<?php } else { ?><div class="edit_sign"><a href="#" onclick="follower_choose(<?php echo $_mymember['uid']; ?>,'<?php echo $_mymember['nickname']; ?>','editarea'); return false;">编辑注册地址</a></div>
		
<?php } ?>
</div>
		<?php echo $this->hookall_temp['global_user_extra2']; ?>
	</div>
		<div class="edit_sign">
<?php $member_signature = cut_str($_mymember['signature'],20); ?>
<?php if($_mymember['uid'] == MEMBER_ID ) { ?>
			<a href="javascript:viod(0);"onclick="follower_choose(<?php echo $_mymember['uid']; ?>,'<?php echo $_mymember['nickname']; ?>','topic_signature'); return false;" >
			<span ectype="user_signature_ajax_left_<?php echo $_mymember['uid']; ?>">
				<span  title="个人签名：<?php echo $_mymember['signature']; ?>">
<?php if($_mymember['signature']) { ?>
(<?php echo $member_signature; ?>)
<?php } else { ?>编辑个人签名
<?php } ?>
</span>
			</span>
			</a>
<?php } else { ?><span  title="个人签名：<?php echo $_mymember['signature']; ?>">(<?php echo $member_signature; ?>)</span>
		
<?php } ?>
<?php echo $this->hookall_temp['global_user_extra3']; ?>
		</div>
	</div>
	
<?php } ?>
<div class="sideBox">
		<div class="person_atten_l">
			<p><span class="num"><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=follow" title="<?php echo $_mymember['nickname']; ?>关注的"><?php echo $_mymember['follow_count']; ?></a></span></p>
			<p><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=follow" title="<?php echo $_mymember['nickname']; ?>关注的">关注</a> </p>
		</div>
		<div class="person_atten_l">
			<p><span class="num"><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=fans" title="关注<?php echo $_mymember['nickname']; ?>的"><?php echo $_mymember['fans_count']; ?></a></span></p>
			<p><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=fans" title="关注<?php echo $_mymember['nickname']; ?>的">粉丝</a> </p>
		</div>
		<div class="person_atten_r">
			<p><span class="num"><a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="<?php echo $_mymember['nickname']; ?>的分享"><?php echo $_mymember['topic_count']; ?></a></span></p>
			<p><a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="<?php echo $_mymember['nickname']; ?>的分享">分享</a> </p>
		</div>
		<?php echo $this->hookall_temp['global_user_extra4']; ?>
	</div>
<?php } ?>
<!------用户头像等信息------->


<!------用户勋章信息------->

<script type="text/javascript">
$(document).ready(function(){
	$(".sina_weibo").mouseover(function(){$(".sina_weibo_c").show();});
	$(".sina_weibo").mouseout(function(){$(".sina_weibo_c").hide();});
	$(".qqwb").mouseover(function(){$(".qqwb_c").show();});
	$(".qqwb").mouseout(function(){$(".qqwb_c").hide();});
	$(".qqim").mouseover(function(){$(".qqim_c").show();});
	$(".qqim").mouseout(function(){$(".qqim_c").hide();});
	$(".tel").mouseover(function(){$(".tel_c").show();});
	$(".tel").mouseout(function(){$(".tel_c").hide();});
<?php if(is_array($medal_list)) { foreach($medal_list as $v) { ?>
		$(".medal_<?php echo $v['id']; ?>").mouseover(function(){$(".medal_c_<?php echo $v['id']; ?>").show();});
		$(".medal_<?php echo $v['id']; ?>").mouseout(function(){$(".medal_c_<?php echo $v['id']; ?>").hide();});
	
<?php } } ?>
});
</script>

<ul class="Vimg">
<?php if('tag'!=$this->Get['mod'] || $_mymember['style_three_tol'] == 1) { ?>
<?php if($this->Config['sina_enable'] && sina_weibo_init($this->Config)) { ?>
	<li class="sina_weibo">
<?php echo sina_weibo_bind_icon($_mymember['uid']); ?>
 &nbsp; 
		<div class="sina_weibo_c">
			<div class="VM_box">
				<div class="VM_top">
					<div class="med_img"><img src="./templates/default/images/medal/M_sina.gif"></div>
					<div class="med_intro">
						<p>新浪微博</p>
						 绑定后，可以使用新浪微博帐号进行登录，在本站发的微博可以同步发到新浪微博<br />
<?php $sina_return  = sina_weibo_has_bind($member['uid']); ?>
<?php if(!$sina_return) { ?>
						<a href="index.php?mod=tools&code=sina">绑定新浪微博</a> |
						
<?php } ?>
<a target="_blank" href="index.php?mod=settings&code=user_medal">查看我的勋章</a>
					</div>
				</div>
			</div>
		</div>		
	</li>
	
<?php } ?>
<?php if($this->Config['qqwb_enable'] && qqwb_init($this->Config)) { ?>
	<li class="qqwb">
<?php echo qqwb_bind_icon($_mymember['uid']); ?>
 &nbsp; 
		<div class="qqwb_c">
			<div class="VM_box">
				<div class="VM_top">
					<div class="med_img"><img src="./templates/default/images/medal/qqwb.png"></div>
					<div class="med_intro">
						<p>腾讯微博</p>
						 绑定后，可以使用腾讯微博帐号进行登录，在本站发的微博可以同步发到腾讯微博<br />
<?php $qqwb_return  = qqwb_bind_icon($member['uid']); ?>
<?php if(!$qqwb_return) { ?>
						<a href="index.php?mod=tools&code=qqwb">绑定腾讯微博</a> |
						
<?php } ?>
<a target="_blank" href="index.php?mod=settings&code=user_medal">查看我的勋章</a>
					</div>
				</div>
			</div>
		</div>
	</li>
	
<?php } ?>
<?php if($this->Config['imjiqiren_enable'] && imjiqiren_init($this->Config)) { ?>
	<li class="qqim">
<?php echo imjiqiren_bind_icon($_mymember['uid']); ?>
 &nbsp; 
		<div class="qqim_c">
			<div class="VM_box">
				<div class="VM_top">
					<div class="med_img"><img src="./templates/default/images/medal/M_qq.gif"></div>
					<div class="med_intro">
					<p>QQ机器人</p>
					用自己的QQ发微博、通过QQ签名发微博，如果有人@你、评论你、关注你、给你发私信，你都可以第一时间收到QQ机器人的通知<br />
<?php $imjiqiren_return  = imjiqiren_has_bind($member['uid']); ?>
<?php if(!$imjiqiren_return) { ?>
					<a href="index.php?mod=tools&code=imjiqiren">绑定QQ机器人</a> |
					
<?php } ?>
<a target="_blank" href="index.php?mod=settings&code=user_medal">查看我的勋章</a>
					</div>
				</div>
			</div>
		</div>
	</li>
	
<?php } ?>
<?php if($this->Config['sms_enable'] && sms_init($this->Config)) { ?>
	<li class="tel">
<?php echo sms_bind_icon($_mymember['uid']); ?>
 &nbsp; 
		<div class="tel_c">
			<div class="VM_box">
				<div class="VM_top">
					<div class="med_img"><img src="./templates/default/images/medal/Tel.gif"></div>
					<div class="med_intro">
					<p>手机短信</p>
					用自己的手机发微博、通过手机签名发微博，如果有人@你、评论你、关注你、给你发私信，你都可以第一时间收到手机短信的通知<br />
<?php $sms_return  = sms_has_bind($_mymember['uid']); ?>
<?php if(!$sms_return) { ?>
					<a href="index.php?mod=tools&code=sms">绑定手机短信</a> |
					
<?php } ?>
<a target="_blank" href="index.php?mod=settings&code=user_medal">查看我的勋章</a>
					</div>
				</div>
			</div>
		</div>
	</li>
	
<?php } ?>
<?php } ?>
<?php if($member['validate'] || $medal_list) { ?>
<?php if(is_array($medal_list)) { foreach($medal_list as $val) { ?>
<?php $medal_type = unserialize($val['conditions']); ?>
<li class="medal_<?php echo $val['id']; ?>"><a href="index.php?mod=other&code=medal" target="_blank"><img src="<?php echo $val['medal_img']; ?>"/></a> &nbsp; 
		<div class="medal_c medal_c_<?php echo $val['id']; ?>">
			<div class="VM_box">
				<div class="VM_top">
				<div class="med_img"><img src="<?php echo $val['medal_img']; ?>"/></div>
					<div class="med_intro">
					<p><?php echo $val['medal_name']; ?></p>
					<?php echo $val['medal_depict']; ?> <br />
<?php if(MEMBER_ID != $member['uid']) { ?>
(他于：<?php echo $val['dateline']; ?> 获得) <br />
<?php if($medal_type['type'] == 'topic') { ?>
					<a href="index.php?mod=topic&code=myhome" target="_blank">我要发分享</a> |<?php } elseif($medal_type['type'] == 'reply') { ?><a href="index.php?mod=topic&code=new" target="_blank">我要发评论</a> |<?php } elseif($medal_type['type'] == 'tag') { ?><a href="index.php?mod=tag&code=<?php echo $medal_type['tagname']; ?>" target="_blank">我要发话题</a> |<?php } elseif($medal_type['type'] == 'invite') { ?><a href="index.php?mod=profile&code=invite" target="_blank">马上去邀请好友</a> |<?php } elseif($medal_type['type'] == 'shoudong') { ?>管理员手动发放  |	
					
<?php } ?>
<?php } else { ?>(我于：<?php echo $val['dateline']; ?> 获得) <br />
					
<?php } ?>
<a target="_blank" href="index.php?mod=settings&code=user_medal">查看我的勋章</a>
					</div>
				</div>
			</div>
		</div>
	</li>
	
<?php } } ?>
<?php } ?>
</ul>   
<!------用户勋章信息------->
<?php if(MEMBER_ID == $_mymember['uid']) { ?>
<?php if($_mymember['face'] == './images/no.gif') { ?>
		<div class="sideBox Rlot" style="padding-top:18px;"> <a href="index.php?mod=settings&code=face"><img src="templates/default/images/setmyablum.gif" /></a> </div>
	
<?php } ?>

<?php if(in_array($this->Code,array('myhome','myfavorite','favoritemy','mycomment','tocomment','myat','myblog')) || $params['code'] == 'myblog' || $_mymember['style_three_tol'] == 1) { ?>
  

	<div class="blackBox"></div>
		<ul class="boxRNav2">
<?php if(in_array($this->Code,array('myhome','tag','groupview'))) { ?>
  
			<li class="index current"> 
<?php } else { ?><li class="index">
			
<?php } ?>
<a href="index.php?mod=topic&code=myhome" hidefocus="true" title="我的首页">我的首页</a>
			</li>
<?php if($params['code'] == 'myblog') { ?>
  
			<li class="mypub current"> 
<?php } else { ?><li class="mypub">
			
<?php } ?>
<a href="index.php?mod=<?php echo $_mymember['username']; ?>" hidefocus="true" title="我的分享">我的分享</a>
			</li>

		<script type="text/javascript">
		$(document).ready(function(){
			var objSt = ".myfav";
			$(objSt).mouseover(function(){$(objSt + " i").show();});
			$(objSt).mouseout(function(){$(objSt + " i").hide();});
		});
		</script>
<?php if('myfavorite'== $this->Code) { ?>
	
		<li class="myfav current"> 
<?php } else { ?><li class="myfav">
		
<?php } ?>
<a href="index.php?mod=topic&code=myfavorite" hidefocus="true" title="我的收藏">我的收藏</a>
			<i class="anoTh" onclick="window.location.href='index.php?mod=topic&code=favoritemy'" title="收藏我的">收藏我的</i>
		</li>

		<script type="text/javascript">
		$(document).ready(function(){
			var objSt = ".letter";
			$(objSt).mouseover(function(){$(objSt + " i").show();});
			$(objSt).mouseout(function(){$(objSt + " i").hide();});
		});
		</script>
<?php if('mycomment'== $this->Code) { ?>
	
		<li class="letter current"> 
<?php } else { ?><li class="letter">
		
<?php } ?>
<a href="index.php?mod=topic&code=mycomment" hidefocus="true" title="评论我的">评论我的</a>
			<i class="anoTf" onclick="window.location.href='index.php?mod=topic&code=tocomment'" title="我评论的">我评论的</i>
		</li>
<?php if('myat'== $this->Code) { ?>
		<li class="about current"> 
<?php } else { ?><li class="about">
		
<?php } ?>
<a href="index.php?mod=topic&code=myat" hidefocus="true" title="提到我的">提到我的</a>
		</li>

		<script type="text/javascript">
		$(document).ready(function(){
		var objSl = ".mailBox";
			$(objSl).mouseover(function(){$(objSl + " i").show();});
			$(objSl).mouseout(function(){$(objSl + " i").hide();});
		});
		</script>
		<li class="mailBox">
			<a href="index.php?mod=vote&view=me&filter=created&uid=<?php echo $uid; ?>" hidefocus="true" title="我的投票">我的投票</a>
			<i class="anoTv" onclick="window.location.href='index.php?mod=vote&view=me&filter=joined&uid=<?php echo $uid; ?>'" title="我参与的投票">我参与的</i>
		</li>

		<script type="text/javascript">
		    $(document).ready(function(){
		    var objSA = ".actBox";
			$(objSA).mouseover(function(){$(objSA + " i").show();});
			$(objSA).mouseout(function(){$(objSA + " i").hide();});
			});
		</script>
		<!-- 
<?php $event_setting=ConfigHandler::get('event_setting') ?>
 -->
		<!-- 
<?php if($event_setting == 1) { ?>
 -->
        <li class="actBox">
        <a href="index.php?mod=event&code=myevent" hidefocus="true" title="我的活动">我的活动</a>
		<i class="anoTv" onclick="window.location.href='index.php?mod=event&code=myevent&type=part&uid=<?php echo $uid; ?>'" title="我参与的活动">我参与的</i>
		</li>
		<!-- 
<?php } ?>
 -->
<?php $navigation_config=ConfigHandler::get('navigation') ?>
<?php if(!empty($navigation_config['pluginmenu'])) { ?>
		 
<?php if(is_array($navigation_config['pluginmenu'])) { foreach($navigation_config['pluginmenu'] as $pmenus) { ?>
		 
<?php if(is_array($pmenus)) { foreach($pmenus as $pmenu) { ?>
		  
<?php if($pmenu['type'] == 3) { ?>
		  
<?php if('topic'==$this->require) { ?>
		  <li class="mypub current">
		  
<?php } else { ?>  <li class="mypub">
		  
<?php } ?>
  <a href="<?php echo $pmenu['url']; ?>&require=topic" hidefocus="true" title="<?php echo $pmenu['name']; ?>"><?php echo $pmenu['name']; ?></a></li>
		   
<?php } ?>
 
<?php } } ?>
 
<?php } } ?>
 
<?php } ?>
      </ul>
      <div class="blackBox2"></div>
	
<?php } ?>
<?php } ?>
<!-------------------------关于我的信息-------------------------------->
<?php if(MEMBER_ID == $_mymember['uid'] ) { ?>
<?php if(in_array($this->Code,array('myhome','myfavorite','favoritemy','mycomment','tocomment','myat'))   || $_mymember['style_three_tol'] == 1) { ?>
  

		<script type="text/javascript">
		$(document).ready(function(){
			$(".SC_guanyu").click(function(){$(this).parent().toggleClass("fold_guanyu");$(".SC_guanyu_box").toggle();});
		});
		</script>
		<div class="SC">
			<h3>关于<?php echo $_mymember['nickname']; ?><a class="btn SC_guanyu" href="javascript:void(0)"></a></h3>
			<ul class="FTL SC_guanyu_box">
<?php if($_mymember['aboutme']) { ?>
				<li>&nbsp;<?php echo $_mymember['aboutme']; ?></li><?php } elseif(MEMBER_ID==$_mymember['uid'] && !$_GET['mod_original']) { ?><li><a href="index.php?mod=settings">快来写一句话</a>，向大家介绍一下吧</li>
<?php } else { ?>这家伙很懒，什么都没留下。
				
<?php } ?>
</ul>
		</div>
		
		<!--我的标签-->
<?php if(MEMBER_ID > 0) { ?>
			<script type="text/javascript">
				$(document).ready(function(){
					$(".SC_biaoqian").click(function(){$(this).parent().toggleClass("fold_biaoqian");$(".SC_biaoqian_box").toggle();});
				});
			</script>
			<div class="SC">
			<h3>我的标签
				<a class="btn SC_biaoqian" href="javascript:void(0);" onclick="right_show_ajax('<?php echo MEMBER_ID; ?>','user_tag','user_tag'); return false;"></a>
			</h3>
			<ul class="FTL SC_biaoqian_box">
				<div id="<?php echo MEMBER_ID; ?>_user_tag"></div>
			</ul>
			</div>
			
<?php } ?>
  
		<!--我的标签-->
<?php if(!$tag) { ?>
			<!--我关注的话题-->
<?php if(MEMBER_ID > 0) { ?>
			<script type="text/javascript">
				$(document).ready(function(){
					$(".SC_woguanzhu").click(function(){$(this).parent().toggleClass("fold_woguanzhu");$(".SC_woguanzhu_box").toggle();});
				});
			</script>
			<div class="SC">
			<h3>我关注的话题<a class="btn SC_woguanzhu" href="javascript:void(0);" onclick="right_show_ajax('<?php echo MEMBER_ID; ?>','myfavoritetags','myfavoritetags')"></a></h3>
			<ul class="FTL SC_woguanzhu_box">
				<div id="<?php echo MEMBER_ID; ?>_myfavoritetags"></div>
			</ul>
			</div>
			
<?php } ?>
<!--我关注的话题-->
		
<?php } ?>
<?php } ?>
<?php } ?>
<!-------------------------关于我的信息-------------------------------->

</div>
	
<?php } ?>
</div>
</div>
</div>
<!--此处三栏-->


<div class="mainL">
	<div class="main_t"><span>找人</span></div>

	<div class="Menubox2">
	<ul>
<?php if(is_array($act_list)) { foreach($act_list as $key => $val) { ?>
<?php $_hoverCLS = ($key==$act ? ' class="tago" ' : 'class="tagn"'); ?>
<?php if(!is_array($val)) { ?>
	<li><div <?php echo $_hoverCLS; ?>><A HREF="index.php?mod=profile&code=<?php echo $key; ?>"><span><?php echo $val; ?></span></A></div></li>
<?php } else { ?><li><div <?php echo $_hoverCLS; ?>><A HREF="index.php?mod=<?php echo $val['link_mod']; ?>&code=<?php echo $val['link_code']; ?>"><span><?php echo $val['name']; ?></span></A></div></li>
	
<?php } ?>
<?php } } ?>
</ul>
	</div>


<div class="set_warp">
<?php if('search'==$act) { ?>
<div class="oneCity">
  <form method="GET" name="profile_base" action="index.php" onSubmit="return Validator.Validate(this,3);">
    <p>
	  <?php echo $province_list; ?>
	  
      <select id="city" name="city" onchange="changeCity();">
        <option value="0">请选择</option>
	  </select>

      <select id="area" name="area" onchange="changeArea();" style="display:none">
        <option value="0">请选择</option>
	  </select>
	  
      <select id="street" name="street" style="display:none">
        <option value="0">请选择</option>
	  </select>
    </p>
	<p>
      <input type="submit" class="shareI" value="搜索"/>
      <input type="hidden" name="mod" value="profile" />
      <input type="hidden" name="code" value="search" />
    </p>
  </form>
  <input type="hidden" id="hid_city" name="hid_city" value="<?php echo $hid_city; ?>">
  <input type="hidden" id="hid_area" name="hid_area" value="<?php echo $hid_area; ?>">
  <input type="hidden" id="hid_street" name="hid_street" value="<?php echo $hid_street; ?>">
</div>
<script type="text/javascript" src="templates/default/js/city.js"></script>
<script type="text/javascript">
$(document).ready(function(){
var selectOption=
<?php load::functions('area');echo area_config_to_json(); ?>
;
});

function changeProvince(){
  var province = document.getElementById("province").value;
  var hid_city = document.getElementById("hid_city").value;
  var url = "ajax.php?mod=member&code=sel&type=top&province="+province + "&hid_city="+hid_city;
  var myAjax=$.post(
		  	url,
		  	function(d){
	  		    $('#' + "city").html(d);
	  		    document.getElementById('area').length = 1;
	  		    document.getElementById('street').length = 1;
				changeCity();
		  	}
  );
}
changeProvince();
function changeCity(){
  var province = document.getElementById("province").value;
  var city = document.getElementById("city").value;
  document.getElementById("area").style.display = '';
  var hid_area = document.getElementById("hid_area").value;
  
  if(city){
    var url = "ajax.php?mod=member&code=sel&type=top&city="+city+"&hid_area="+hid_area;
    var myAjax=$.post(
		  	url,
		  	function(d){
				if(d){
					document.getElementById("area").style.display = "block";
		  		    $('#' + "area").html(d);
					changeArea();
				}else{
					document.getElementById("street").style.display = "none";
					document.getElementById("area").style.display = "none";
					
					document.getElementById("hid_city").value = '';
					document.getElementById("hid_area").value = '';
					document.getElementById("hid_street").value = '';
				}
		  	}
  );
  }else{
		document.getElementById("street").style.display = "none";
		document.getElementById("area").style.display = "none";
		
		document.getElementById("hid_city").value = '';
		document.getElementById("hid_area").value = '';
		document.getElementById("hid_street").value = '';
  }
}
function changeArea(){
  var area = document.getElementById("area").value;
  var hid_street = document.getElementById("hid_street").value;
  if(area){
	  var url = "ajax.php?mod=member&code=sel&type=top&area="+area+"&hid_street="+hid_street;
	  var myAjax=$.post(
			  	url,
			  	function(d){
					if(d){
						document.getElementById("street").style.display = "block";
					    $('#' + "street").html(d);
					}else{
						document.getElementById("street").style.display = "none";
					}
			  	}
	  );
  }else{
	  document.getElementById("street").style.display = "none";
  }
  document.getElementById("hid_city").value = '';
  document.getElementById("hid_area").value = '';
  document.getElementById("hid_street").value = '';
}
</script>
   
<?php if($member_list) { ?>
   <p style="padding:5px 0">
	找到 <?php echo $total_record; ?>人在<span class="fontRed"><?php echo $province_name; ?>&nbsp;<?php echo $city_name; ?>&nbsp;<?php echo $area_name; ?>&nbsp;<?php echo $street_name; ?>&nbsp;(<A HREF="index.php?mod=settings">修改</A>)</span>
	</p>
	<ul class="followList" style="padding:0">
<?php if(is_array($member_list)) { foreach($member_list as $val) { ?>
    <li>
        <div class="fBox_l ">
		  <img onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user',<?php echo $val['uid']; ?>)" onmouseout="clear_user_choose()" onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" width="50px" height="50px;"/>
        </div>
	    <div id="user_<?php echo $val['uid']; ?>_user" class="layS"></div>
        <div class="fBox_R ">
			<a href="index.php?mod=<?php echo $val['username']; ?>" target="_blank"><?php echo $val['nickname']; ?><?php echo $val['validate_html']; ?></a>
			<span style="color:#ccc">@<?php echo $val['nickname']; ?><br><?php echo $val['from_area']; ?></span>
			<div class="fBox_R">被<span style="color:#ff0000;"><?php echo $val['fans_count']; ?></span>人关注 | 分享 <span style="color:#ff0000;"><?php echo $val['topic_count']; ?></span> 条</div>
		 
<?php if(is_array($topic_list)) { foreach($topic_list as $t_val) { ?>
		 
<?php if($val['uid'] == $t_val['uid']) { ?>
		 		<div style="color:#ccc">最近更新：<?php echo $t_val['dateline']; ?><?php echo $t_val['tid']; ?></div>
		 		<span style="margin-left:10px;"><a href="index.php?mod=topic&code=<?php echo $t_val['tid']; ?>">
<?php if($t_val['content']) { ?>
<?php echo $t_val['content']; ?>
<?php } ?>
</a></span>
		 	
<?php } ?>
<?php } } ?>
     	</div>
	   
<?php if(MEMBER_ID!=$val['uid'] && $val['follow_html']) { ?>
        		<div class="fBox_R2"><?php echo $val['follow_html']; ?></div>
    		
<?php } ?>
   	 </li>
		<div id="Pmsend_to_user_area" style="width:430px;"></div>
		<div id="alert_follower_menu_<?php echo $val['uid']; ?>"></div>
		<span id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);"></span>
		<div id="global_select_<?php echo $val['uid']; ?>" class="alertBox alertBox_2" style="display:none"></div>
	
<?php } } ?>
<?php if($page_arr['html']) { ?>
        <li><?php echo $page_arr['html']; ?></li>
        
<?php } ?>
</ul>
<?php } else { ?><br />
	暂无符合条件的用户；<BR />
	你可尝试通过<A HREF="index.php?mod=profile&code=invite">邀请好友</A>功能，邀请站外朋友加入。
	
<?php } ?>
<?php } elseif('maybe_college'==$act) { ?><div class="oneCity">
  <form method="GET" name="profile_base" action="index.php" onSubmit="return Validator.Validate(this,3);">
    <p>
	  <?php echo $province_list; ?>
	  
      <select id="college" name="college">
        <option value="0">请选择</option>
	  </select>

    </p>
	<p>
      <input type="submit" class="shareI" value="搜索"/>
      <input type="hidden" name="mod" value="profile" />
      <input type="hidden" name="code" value="maybe_college" />
    </p>
  </form>
  <input type="hidden" id="hid_college" name="hid_college" value="<?php echo $hid_college; ?>">
</div>

<script type="text/javascript">

function changeProvince(){
  var province = document.getElementById("province").value;
  var hid_college = document.getElementById("hid_college").value;
  //var url = "ajax.php?mod=member&code=sel&type=top&province="+province + "&hid_college="+hid_college;
  var url = "ajax.php?mod=member&type=top&code=sel&collegeprovince="+province + "&hid_college="+hid_college;

  var myAjax=$.post(
		  	url,
		  	function(d){
	  		    $('#' + "college").html(d);
		  	}
  );
}
changeProvince();

</script>
   
<?php if($member_list) { ?>
   <p style="padding:5px 0">
	找到 <?php echo $total_record; ?>人在<span class="fontRed"><?php echo $province_name; ?>&nbsp;<?php echo $college_name; ?>&nbsp;(<A HREF="index.php?mod=settings">修改</A>)</span>
	</p>
	<ul class="followList" style="padding:0">
<?php if(is_array($member_list)) { foreach($member_list as $val) { ?>
    <li>
        <div class="fBox_l ">
		  <img onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user',<?php echo $val['uid']; ?>)" onmouseout="clear_user_choose()" onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" width="50px" height="50px;"/>
        </div>
	    <div id="user_<?php echo $val['uid']; ?>_user" class="layS"></div>
        <div class="fBox_R ">
			<a href="index.php?mod=<?php echo $val['username']; ?>" target="_blank"><?php echo $val['nickname']; ?><?php echo $val['validate_html']; ?></a>
			<span style="color:#ccc">@<?php echo $val['nickname']; ?><br><?php echo $val['from_area']; ?></span>
			<div class="fBox_R">被<span style="color:#ff0000;"><?php echo $val['fans_count']; ?></span>人关注 | 分享 <span style="color:#ff0000;"><?php echo $val['topic_count']; ?></span> 条</div>
		 
<?php if(is_array($topic_list)) { foreach($topic_list as $t_val) { ?>
		 
<?php if($val['uid'] == $t_val['uid']) { ?>
		 		<div style="color:#ccc">最近更新：<?php echo $t_val['dateline']; ?><?php echo $t_val['tid']; ?></div>
		 		<span style="margin-left:10px;"><a href="index.php?mod=topic&code=<?php echo $t_val['tid']; ?>">
<?php if($t_val['content']) { ?>
<?php echo $t_val['content']; ?>
<?php } ?>
</a></span>
		 	
<?php } ?>
<?php } } ?>
     	</div>
	   
<?php if(MEMBER_ID!=$val['uid'] && $val['follow_html']) { ?>
        		<div class="fBox_R2"><?php echo $val['follow_html']; ?></div>
    		
<?php } ?>
   	 </li>
		<div id="Pmsend_to_user_area" style="width:430px;"></div>
		<div id="alert_follower_menu_<?php echo $val['uid']; ?>"></div>
		<span id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);"></span>
		<div id="global_select_<?php echo $val['uid']; ?>" class="alertBox alertBox_2" style="display:none"></div>
	
<?php } } ?>
<?php if($page_arr['html']) { ?>
        <li><?php echo $page_arr['html']; ?></li>
        
<?php } ?>
</ul>
<?php } else { ?><br />
	暂无符合条件的用户；<BR />
	你可尝试通过<A HREF="index.php?mod=profile&code=invite">邀请好友</A>功能，邀请站外朋友加入。
	
<?php } ?>
 <?php } elseif('maybe_friend'==$act) { ?><div class="oneCity">
		<form method="GET" name="profile_base" action="index.php" onSubmit="return Validator.Validate(this,3);">
			<input type="hidden" name="mod" value="search" />
			<input type="hidden" name="code" value="tag" />
			<p>
			<input name="tag" value="" type="text" class="p1 iip2" width="60px"  />
			<input type="submit" class="shareI" value="按话题"/></p>
		</form>
	</div>
<p>这里显示与你关注同样<a href="index.php?mod=tag" target="_blank">话题</a>、并且你还未关注的人；</p>
<?php if($member_list) { ?>
	<ul class="followList"  style="padding:0">
<?php if(is_array($member_list)) { foreach($member_list as $val) { ?>
		<li class="pane">
			<div class="fBox_l "><img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user',<?php echo $val['uid']; ?>)" onmouseout="clear_user_choose()"/></div>
			<div id="user_<?php echo $val['uid']; ?>_user"></div>
			<div class="fBox_R ">
				<span class="name"><a href="index.php?mod=<?php echo $val['username']; ?>"><?php echo $val['nickname']; ?></a><?php echo $val['validate_html']; ?>(@<?php echo $val['nickname']; ?>)</span>
				<div class="fBox_R"> 被<span style="color:#ff0000;"><?php echo $val['fans_count']; ?></span>人关注 | 微博<span style="color:#ff0000;"><?php echo $val['topic_count']; ?></span>条</div>
				<div>他关注的话题：
<?php if(is_array($user_favorite)) { foreach($user_favorite as $v) { ?>
<?php if($val['uid'] == $v['uid']) { ?>
							<span><a href="index.php?mod=tag&code=<?php echo $v['tag']; ?>"><?php echo $v['tag']; ?></a> |</span>
						
<?php } ?>
<?php } } ?>
</div>
			</div>
			<div class="fBox_R2">
<?php if(MEMBER_ID!=$val['uid'] && $val['follow_html']) { ?>
					<?php echo $val['follow_html']; ?><?php } elseif(MEMBER_ID==$val['uid']) { ?>（这是我自己）
				
<?php } ?>
</div>
		</li>
		<div id="Pmsend_to_user_area" style="width:430px;"></div>
		<div id="alert_follower_menu_<?php echo $val['uid']; ?>"></div>
		<span id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);"></span>
		<div id="global_select_<?php echo $val['uid']; ?>" class="alertBox alertBox_2" style="display:none"></div>
	
<?php } } ?>
</ul>
<?php } else { ?><div class="oneCity">
暂时没有（查看所有<a href="index.php?mod=<?php echo $member['username']; ?>&code=follow" target="_blank">我关注的</a>人）。<BR /><BR />
你可以先访问<a href="index.php?mod=tag" target="_blank">话题</a>页，查找感兴趣的话题并予以关注，然后再访问此页面；<BR/>
或者直接访问<a href="index.php?mod=topic&code=top" target="_blank">达人榜</a>，关注网站达人们。
</div>
<?php } ?>
<?php } elseif('usertag'==$act) { ?><style>.mainL{ _overflow:hidden}</style>
<p class="Stti">系统根据你的个性标签为你推荐同类人（<A HREF="index.php?mod=user_tag">设置标签</A>）；你也可以用搜索框查找。</p>
<div style="margin: 20px 0 0 60px;">
<form method="GET" name="profile_base" action="index.php" onSubmit="return Validator.Validate(this,3);">
  <span>输入标签：</span> 
  <span><input name="usertag" value="" type="text" class="p1" /></span>
  <span><input type="submit" class="shareI" value="搜 索"/></span>
  <input type="hidden" name="mod" value="search" />
  <input type="hidden" name="code" value="usertag" />
</form>
<p style="margin: 0 0 0 63px;">输入你的兴趣标签，找到更多同类。如：音乐</p>
</div>
<?php if($member_list) { ?>
<p>&nbsp;</p>
	<div class="TopicMan">
	<div class="nfTagB">
		<ul>
			<li class="current"><span>我的标签</span></li>
		</ul>	
		<div class="clear"></div>
	</div>
	
	<div class="nfBox">
			  <div>
				  
<?php if(is_array($mytag)) { foreach($mytag as $my_val) { ?>
				  <span  style="float:left; padding:3px; white-space:nowrap"><a href="index.php?mod=search&code=usertag&usertag=<?php echo $my_val['tag_name']; ?>"><?php echo $my_val['tag_name']; ?></a></span>
				  
<?php } } ?>
  </div>
			  <div class="clear"></div>
		</div>
</div>

 <ul class="followList" style="padding:0">
  
<?php if(is_array($member_list)) { foreach($member_list as $val) { ?>
  <li>
	<div class="fBox_l"><img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user',<?php echo $val['uid']; ?>)" onmouseout="clear_user_choose()"/></div>
	<div id="user_<?php echo $val['uid']; ?>_user"></div>
	<div class="fBox_R">
	  <span>
	  <a href="index.php?mod=<?php echo $val['username']; ?>"><?php echo $val['nickname']; ?></a> 
	  
<?php if($val['validate']) { ?>
<img src="./images/vip.gif"/>
<?php } ?>
 
	  <a href="javascript:void(0)" onclick="follower_choose(<?php echo $val['uid']; ?>,'<?php echo $val['nickname']; ?>','at','');">(@<?php echo $val['nickname']; ?>)</a>
	  </span>
	</div>
	<div class="fBox_R">被<span style="color:#ff0000;"><?php echo $val['fans_count']; ?></span>人关注 | 微博 <span style="color:#ff0000;"><?php echo $val['topic_count']; ?></span>条</div>

	<div class="fBox_R2">
	  
<?php if(MEMBER_ID!=$val['uid'] && $val['follow_html']) { ?>
	  <?php echo $val['follow_html']; ?>
	  <?php } elseif(MEMBER_ID==$val['uid']) { ?>  
<?php } ?>
    </div>
	
	<div class="fBox_R">
<?php if(is_array($member_tag)) { foreach($member_tag as $mb_val) { ?>
<?php if($val['uid'] == $mb_val['uid']) { ?>
	<span style="float:left; padding:3px; white-space:nowrap">
		<a href="index.php?mod=search&code=usertag&usertag=<?php echo $mb_val['tag_name']; ?>">
<?php if(in_array($mb_val['tag_id'],$user_tagid)) { ?>
		<span style="color:#FF0000;word-wrap: break-word; word-break: normal; "><?php echo $mb_val['tag_name']; ?></span> | 
<?php } else { ?><?php echo $mb_val['tag_name']; ?> | 
		
<?php } ?>
</a>
	</span>
	
<?php } ?>
<?php } } ?>
</div>

	<div id="Pmsend_to_user_area" style="width:430px;"></div>
	<div id="alert_follower_menu_<?php echo $val['uid']; ?>"></div>
	<span id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);"></span>
	<div id="global_select_<?php echo $val['uid']; ?>" class="alertBox alertBox_2" style="display:none"></div>
  </li>
  
<?php } } ?>
  
<?php if($page_arr['html']) { ?>
  <li><?php echo $page_arr['html']; ?></li>
 
<?php } ?>
</ul>
<?php } else { ?> 
<br />
暂无符合条件的用户；<BR />
<?php } ?>
<?php } elseif('share'==$act) { ?><style>.mainL{ _overflow:hidden}.textB textarea{ width:400px; height:80px;}</style>
	<div class="friends textB">
		<li>
		<p class="vshare"><img src="templates/default/images/shareB.gif" border="0" />将其他网页内容分享到<?php echo $this->Config['site_name']; ?>（复制下面代码，粘贴到其他网页源码中）</p>
			<textarea id="inviteURL1" type="text"  value="" onclick="copyText(this.value);"><a title="分享到<?php echo $this->Config['site_name']; ?>" href="javascript:var d=document,w=window,f='<?php echo $this->Config['site_url']; ?>',l=d.location,e=encodeURIComponent,p=''+e(l.href)+'&t='+e(d.title);if(!w.open(f+'/index.php?mod=share&code=share&url='+p,'','toolbar=0,status=0,width=500,height=400')){l.href=f+'.new'+p;}void(0)"><img src="
            <?php echo $this->Config['site_url']; ?>/templates/default/images/shareB.gif" border="0" />分享到<?php echo $this->Config['site_name']; ?></a>
			</textarea>
			<input type="button" class="save frr" value="复制链接" onclick="copyText($('#inviteURL1').val());" /></li>

	</div><?php } elseif('invite'==$act) { ?><style>.mainL{ _overflow:hidden}.textB textarea{width:400px; height:80px;}</style>
<?php if($can_invite_count<1) { ?>
您的<?php echo $this->Config['invite_count_max']; ?>个邀请名额已经用完，暂时不能再邀请好友了。
<?php } else { ?>邀请好友是有限制的，您还可以邀请 <span class="fontRed"><?php echo $can_invite_count; ?>人 </span>，可在下面看到已发邀请的相关信息。<BR /> 
通过你邀请加入的朋友，将与你自动相互关注（查看所有正在<a href="index.php?mod=<?php echo $member['username']; ?>&code=fans" target="_blank">关注我的</a>人）。
<div class="friends textB">
		<span>方法一：根据情况复制下面的邀请内容，通过QQ、MSN、网站等发给你的朋友<br />
		注意：以下邀请链接每次最多可邀请<?php echo $this->Config['invite_enable']; ?>人，达到<?php echo $this->Config['invite_enable']; ?>人后邀请即自动失效</span>
		<textarea id="invite_url" type="text" onclick="copyText($(this).val());">
<?php if(!empty($invite_msg)) { ?>
<?php echo $invite_msg; ?>
<?php } else { ?>想体验最酷、最火的即时微博服务吗？
	欢迎在内测期加入【<?php echo $this->Config['site_name']; ?>】做‘创始元老’，即可随时随地的记录生活、分享见闻，更可自由关注人物和话题的动态，与朋友保持联络；内测邀请<?php echo $inviteURL; ?>（限<?php echo $this->Config['invite_enable']; ?>人）
<?php } ?>
</textarea>
		<input type="button" class="save frr" value="复制链接" onclick="copyText($('#invite_url').val());" />
</div>
<br />
<div class="friends textB">
	<form method="POST"  action="index.php?mod=profile&code=invite_by_email" onsubmit="return Validator.Validate(this,3);">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
		<span>方法二：直接在下面输入朋友的邮箱地址，系统将自动通过邮件发邀请<br />
		注意：多个邮箱地址需用;分隔开，最多不超过10个。</span>
		<input dataType="LimitB" min="6" max="300" msg="请将长度控制在6~300个字符之间" name="inviteEmail" type="text" class="p1" style="width:400px; height:80px; padding:5px; margin-bottom:5px; margin-top:10px;" />&nbsp;<input type="submit" class="save frr" value="发送邀请" />
	</form>
</div>
<br />
<?php } ?>
<a id="MIL"></a>
已发送 <span class="fontRed"><?php echo $my_invite_count; ?>个</span> 邀请
<?php if($my_invite_count) { ?>
<table width="100%" border="0" class="table_1">
<?php if(is_array($invite_list)) { foreach($invite_list as $val) { ?>
<tr>
	<td width="80%" class="t1">
<?php if($val['fusername']) { ?>
	<a href="index.php?mod=<?php echo $val['fusername']; ?>"><img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" width="50" height="50"/></a> 
	
<?php } ?>
<span class="fontGreen">
<?php if($val['fusername']) { ?>
	<a href="index.php?mod=<?php echo $val['fusername']; ?>"><?php echo $val['fusername']; ?></a>
	
<?php } ?>

<?php if($val['femail']) { ?>
&lt;<?php echo $val['femail']; ?>&gt;
<?php } ?>
</span>
	</td>
	<td width="20%" class="t1">
<?php if($val['fuid'] || ($val['dateline']+600)>time()) { ?>
<?php $tm=my_date_format($val['dateline'],'Y-m-d H:i'); ?>
<?php echo $tm; ?>
<?php if($val['follow_html']) { ?>
			<br /><?php echo $val['follow_html']; ?>	
		
<?php } ?>
<?php } elseif($val['femail']) { ?><a href="index.php?mod=profile&code=invite_by_email&inviteEmail=<?php echo $val['femail']; ?>">重新发送邀请？</a><?php } elseif(!$val['fuid']) { ?>邀请已发送，等待其注册
	
<?php } ?>
</td>
</tr>
<?php } } ?>
<?php if($page_arr['html']) { ?>
<tr>
	<td colspan="2"><?php echo $page_arr['html']; ?></td>
</tr>
<?php } ?>
</table>
<?php } ?>
<?php } ?>
</div>
</div><div class="mainR">
<div id="topic_right_ajax_list">
	<!--两栏  三栏 显示判断  (style_three_tol != 1 两栏)-->
<?php if(MEMBER_STYLE_THREE_TOL != 1) { ?>
<script language="javascript">
	$(document).ready(function(){
		/*
		* ajax 右侧显示数据
		* 这里的函数可以随便更改位置，加载的顺序也会不同。
		*/
		if(<?php echo MEMBER_ID; ?>)
		{
			get_my_user_tag(); 
			get_myfavoritetags();
		}
		
	});
	function get_my_user_tag(){
		//我的个人标签
		right_show_ajax('<?php echo MEMBER_ID; ?>','user_tag','user_tag');
	}
	function get_myfavoritetags(){
		//我关注的话题
		right_show_ajax('<?php echo MEMBER_ID; ?>','myfavoritetags','myfavoritetags');
	}
</script>


<!--网站开启三栏后 显示左边  关于我的信息-->

<div class="t_col_main_ln <?php echo $t_col_main_lb; ?>">
<script type="text/javascript">
	$(document).ready(function(){
		$(".member_exp").mouseover(function(){$(".member_exp_c").show();});
		$(".member_exp").mouseout(function(){$(".member_exp_c").hide();});
		$("#m_avatar2").mouseover(function(){$(".avatar_tips").show();});
		$("#m_avatar2").mouseout(function(){$(".avatar_tips").hide();});
	});
</script>
<!--用户头像等信息-->
<?php if($my_member || $member) { ?>
<?php $_mymember = $my_member ? $my_member : $member ?>
<?php if((MEMBER_ID == $_mymember['uid'] || $this->Code > 0) ) { ?>
	<div class="sideBox">
		<div class="avatar2" id="m_avatar2">
			<p class="avatar2_i"><a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="<?php echo $_mymember['username']; ?>">
			<img src="<?php echo $_mymember['face']; ?>" alt="<?php echo $_mymember['nickname']; ?>" onerror="javascript:faceError(this);" />
			</a></p>
			<p class="avatar_tips"><a id="avatar_upload" href="index.php?mod=settings&code=face">上传头像</a></p>
		
		</div>
		
		
		<div class="avatar2_info">
		<a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="@<?php echo $_mymember['nickname']; ?>"><?php echo $_mymember['nickname']; ?></a><?php echo $_mymember['validate_html']; ?>
		<?php echo $this->hookall_temp['global_user_extra1']; ?>

		<div class="member_exp">
			 
<?php if($this->Config['level_radio']) { ?>
<?php if($this->Config['topic_level_radio']) { ?>
						 <a href="index.php?mod=settings&code=exp" target="_blank" class="ico_level wbL<?php echo $_mymember['level']; ?>"><em><?php echo $_mymember['level']; ?></em></a>
				
<?php } ?>
 
<?php } ?>
<?php if($_mymember['credits']) { ?>
积分：<a title="点击查看我的积分" href="index.php?mod=settings&code=extcredits"><b><?php echo $_mymember['credits']; ?></b></a>
<?php } ?>
</div>
		
		<div id="userarea">
<?php if(trim($_mymember['from_area'])) { ?>
		<?php echo $_mymember['from_area']; ?>
<?php } else { ?><div class="edit_sign"><a href="#" onclick="follower_choose(<?php echo $_mymember['uid']; ?>,'<?php echo $_mymember['nickname']; ?>','editarea'); return false;">编辑注册地址</a></div>
		
<?php } ?>
</div>
		<?php echo $this->hookall_temp['global_user_extra2']; ?>
	</div>
		<div class="edit_sign">
<?php $member_signature = cut_str($_mymember['signature'],20); ?>
<?php if($_mymember['uid'] == MEMBER_ID ) { ?>
			<a href="javascript:viod(0);"onclick="follower_choose(<?php echo $_mymember['uid']; ?>,'<?php echo $_mymember['nickname']; ?>','topic_signature'); return false;" >
			<span ectype="user_signature_ajax_left_<?php echo $_mymember['uid']; ?>">
				<span  title="个人签名：<?php echo $_mymember['signature']; ?>">
<?php if($_mymember['signature']) { ?>
(<?php echo $member_signature; ?>)
<?php } else { ?>编辑个人签名
<?php } ?>
</span>
			</span>
			</a>
<?php } else { ?><span  title="个人签名：<?php echo $_mymember['signature']; ?>">(<?php echo $member_signature; ?>)</span>
		
<?php } ?>
<?php echo $this->hookall_temp['global_user_extra3']; ?>
		</div>
	</div>
	
<?php } ?>
<div class="sideBox">
		<div class="person_atten_l">
			<p><span class="num"><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=follow" title="<?php echo $_mymember['nickname']; ?>关注的"><?php echo $_mymember['follow_count']; ?></a></span></p>
			<p><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=follow" title="<?php echo $_mymember['nickname']; ?>关注的">关注</a> </p>
		</div>
		<div class="person_atten_l">
			<p><span class="num"><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=fans" title="关注<?php echo $_mymember['nickname']; ?>的"><?php echo $_mymember['fans_count']; ?></a></span></p>
			<p><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=fans" title="关注<?php echo $_mymember['nickname']; ?>的">粉丝</a> </p>
		</div>
		<div class="person_atten_r">
			<p><span class="num"><a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="<?php echo $_mymember['nickname']; ?>的分享"><?php echo $_mymember['topic_count']; ?></a></span></p>
			<p><a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="<?php echo $_mymember['nickname']; ?>的分享">分享</a> </p>
		</div>
		<?php echo $this->hookall_temp['global_user_extra4']; ?>
	</div>
<?php } ?>
<!------用户头像等信息------->


<!------用户勋章信息------->

<script type="text/javascript">
$(document).ready(function(){
	$(".sina_weibo").mouseover(function(){$(".sina_weibo_c").show();});
	$(".sina_weibo").mouseout(function(){$(".sina_weibo_c").hide();});
	$(".qqwb").mouseover(function(){$(".qqwb_c").show();});
	$(".qqwb").mouseout(function(){$(".qqwb_c").hide();});
	$(".qqim").mouseover(function(){$(".qqim_c").show();});
	$(".qqim").mouseout(function(){$(".qqim_c").hide();});
	$(".tel").mouseover(function(){$(".tel_c").show();});
	$(".tel").mouseout(function(){$(".tel_c").hide();});
<?php if(is_array($medal_list)) { foreach($medal_list as $v) { ?>
		$(".medal_<?php echo $v['id']; ?>").mouseover(function(){$(".medal_c_<?php echo $v['id']; ?>").show();});
		$(".medal_<?php echo $v['id']; ?>").mouseout(function(){$(".medal_c_<?php echo $v['id']; ?>").hide();});
	
<?php } } ?>
});
</script>

<ul class="Vimg">
<?php if('tag'!=$this->Get['mod'] || $_mymember['style_three_tol'] == 1) { ?>
<?php if($this->Config['sina_enable'] && sina_weibo_init($this->Config)) { ?>
	<li class="sina_weibo">
<?php echo sina_weibo_bind_icon($_mymember['uid']); ?>
 &nbsp; 
		<div class="sina_weibo_c">
			<div class="VM_box">
				<div class="VM_top">
					<div class="med_img"><img src="./templates/default/images/medal/M_sina.gif"></div>
					<div class="med_intro">
						<p>新浪微博</p>
						 绑定后，可以使用新浪微博帐号进行登录，在本站发的微博可以同步发到新浪微博<br />
<?php $sina_return  = sina_weibo_has_bind($member['uid']); ?>
<?php if(!$sina_return) { ?>
						<a href="index.php?mod=tools&code=sina">绑定新浪微博</a> |
						
<?php } ?>
<a target="_blank" href="index.php?mod=settings&code=user_medal">查看我的勋章</a>
					</div>
				</div>
			</div>
		</div>		
	</li>
	
<?php } ?>
<?php if($this->Config['qqwb_enable'] && qqwb_init($this->Config)) { ?>
	<li class="qqwb">
<?php echo qqwb_bind_icon($_mymember['uid']); ?>
 &nbsp; 
		<div class="qqwb_c">
			<div class="VM_box">
				<div class="VM_top">
					<div class="med_img"><img src="./templates/default/images/medal/qqwb.png"></div>
					<div class="med_intro">
						<p>腾讯微博</p>
						 绑定后，可以使用腾讯微博帐号进行登录，在本站发的微博可以同步发到腾讯微博<br />
<?php $qqwb_return  = qqwb_bind_icon($member['uid']); ?>
<?php if(!$qqwb_return) { ?>
						<a href="index.php?mod=tools&code=qqwb">绑定腾讯微博</a> |
						
<?php } ?>
<a target="_blank" href="index.php?mod=settings&code=user_medal">查看我的勋章</a>
					</div>
				</div>
			</div>
		</div>
	</li>
	
<?php } ?>
<?php if($this->Config['imjiqiren_enable'] && imjiqiren_init($this->Config)) { ?>
	<li class="qqim">
<?php echo imjiqiren_bind_icon($_mymember['uid']); ?>
 &nbsp; 
		<div class="qqim_c">
			<div class="VM_box">
				<div class="VM_top">
					<div class="med_img"><img src="./templates/default/images/medal/M_qq.gif"></div>
					<div class="med_intro">
					<p>QQ机器人</p>
					用自己的QQ发微博、通过QQ签名发微博，如果有人@你、评论你、关注你、给你发私信，你都可以第一时间收到QQ机器人的通知<br />
<?php $imjiqiren_return  = imjiqiren_has_bind($member['uid']); ?>
<?php if(!$imjiqiren_return) { ?>
					<a href="index.php?mod=tools&code=imjiqiren">绑定QQ机器人</a> |
					
<?php } ?>
<a target="_blank" href="index.php?mod=settings&code=user_medal">查看我的勋章</a>
					</div>
				</div>
			</div>
		</div>
	</li>
	
<?php } ?>
<?php if($this->Config['sms_enable'] && sms_init($this->Config)) { ?>
	<li class="tel">
<?php echo sms_bind_icon($_mymember['uid']); ?>
 &nbsp; 
		<div class="tel_c">
			<div class="VM_box">
				<div class="VM_top">
					<div class="med_img"><img src="./templates/default/images/medal/Tel.gif"></div>
					<div class="med_intro">
					<p>手机短信</p>
					用自己的手机发微博、通过手机签名发微博，如果有人@你、评论你、关注你、给你发私信，你都可以第一时间收到手机短信的通知<br />
<?php $sms_return  = sms_has_bind($_mymember['uid']); ?>
<?php if(!$sms_return) { ?>
					<a href="index.php?mod=tools&code=sms">绑定手机短信</a> |
					
<?php } ?>
<a target="_blank" href="index.php?mod=settings&code=user_medal">查看我的勋章</a>
					</div>
				</div>
			</div>
		</div>
	</li>
	
<?php } ?>
<?php } ?>
<?php if($member['validate'] || $medal_list) { ?>
<?php if(is_array($medal_list)) { foreach($medal_list as $val) { ?>
<?php $medal_type = unserialize($val['conditions']); ?>
<li class="medal_<?php echo $val['id']; ?>"><a href="index.php?mod=other&code=medal" target="_blank"><img src="<?php echo $val['medal_img']; ?>"/></a> &nbsp; 
		<div class="medal_c medal_c_<?php echo $val['id']; ?>">
			<div class="VM_box">
				<div class="VM_top">
				<div class="med_img"><img src="<?php echo $val['medal_img']; ?>"/></div>
					<div class="med_intro">
					<p><?php echo $val['medal_name']; ?></p>
					<?php echo $val['medal_depict']; ?> <br />
<?php if(MEMBER_ID != $member['uid']) { ?>
(他于：<?php echo $val['dateline']; ?> 获得) <br />
<?php if($medal_type['type'] == 'topic') { ?>
					<a href="index.php?mod=topic&code=myhome" target="_blank">我要发分享</a> |<?php } elseif($medal_type['type'] == 'reply') { ?><a href="index.php?mod=topic&code=new" target="_blank">我要发评论</a> |<?php } elseif($medal_type['type'] == 'tag') { ?><a href="index.php?mod=tag&code=<?php echo $medal_type['tagname']; ?>" target="_blank">我要发话题</a> |<?php } elseif($medal_type['type'] == 'invite') { ?><a href="index.php?mod=profile&code=invite" target="_blank">马上去邀请好友</a> |<?php } elseif($medal_type['type'] == 'shoudong') { ?>管理员手动发放  |	
					
<?php } ?>
<?php } else { ?>(我于：<?php echo $val['dateline']; ?> 获得) <br />
					
<?php } ?>
<a target="_blank" href="index.php?mod=settings&code=user_medal">查看我的勋章</a>
					</div>
				</div>
			</div>
		</div>
	</li>
	
<?php } } ?>
<?php } ?>
</ul>   
<!------用户勋章信息------->
<?php if(MEMBER_ID == $_mymember['uid']) { ?>
<?php if($_mymember['face'] == './images/no.gif') { ?>
		<div class="sideBox Rlot" style="padding-top:18px;"> <a href="index.php?mod=settings&code=face"><img src="templates/default/images/setmyablum.gif" /></a> </div>
	
<?php } ?>

<?php if(in_array($this->Code,array('myhome','myfavorite','favoritemy','mycomment','tocomment','myat','myblog')) || $params['code'] == 'myblog' || $_mymember['style_three_tol'] == 1) { ?>
  

	<div class="blackBox"></div>
		<ul class="boxRNav2">
<?php if(in_array($this->Code,array('myhome','tag','groupview'))) { ?>
  
			<li class="index current"> 
<?php } else { ?><li class="index">
			
<?php } ?>
<a href="index.php?mod=topic&code=myhome" hidefocus="true" title="我的首页">我的首页</a>
			</li>
<?php if($params['code'] == 'myblog') { ?>
  
			<li class="mypub current"> 
<?php } else { ?><li class="mypub">
			
<?php } ?>
<a href="index.php?mod=<?php echo $_mymember['username']; ?>" hidefocus="true" title="我的分享">我的分享</a>
			</li>

		<script type="text/javascript">
		$(document).ready(function(){
			var objSt = ".myfav";
			$(objSt).mouseover(function(){$(objSt + " i").show();});
			$(objSt).mouseout(function(){$(objSt + " i").hide();});
		});
		</script>
<?php if('myfavorite'== $this->Code) { ?>
	
		<li class="myfav current"> 
<?php } else { ?><li class="myfav">
		
<?php } ?>
<a href="index.php?mod=topic&code=myfavorite" hidefocus="true" title="我的收藏">我的收藏</a>
			<i class="anoTh" onclick="window.location.href='index.php?mod=topic&code=favoritemy'" title="收藏我的">收藏我的</i>
		</li>

		<script type="text/javascript">
		$(document).ready(function(){
			var objSt = ".letter";
			$(objSt).mouseover(function(){$(objSt + " i").show();});
			$(objSt).mouseout(function(){$(objSt + " i").hide();});
		});
		</script>
<?php if('mycomment'== $this->Code) { ?>
	
		<li class="letter current"> 
<?php } else { ?><li class="letter">
		
<?php } ?>
<a href="index.php?mod=topic&code=mycomment" hidefocus="true" title="评论我的">评论我的</a>
			<i class="anoTf" onclick="window.location.href='index.php?mod=topic&code=tocomment'" title="我评论的">我评论的</i>
		</li>
<?php if('myat'== $this->Code) { ?>
		<li class="about current"> 
<?php } else { ?><li class="about">
		
<?php } ?>
<a href="index.php?mod=topic&code=myat" hidefocus="true" title="提到我的">提到我的</a>
		</li>

		<script type="text/javascript">
		$(document).ready(function(){
		var objSl = ".mailBox";
			$(objSl).mouseover(function(){$(objSl + " i").show();});
			$(objSl).mouseout(function(){$(objSl + " i").hide();});
		});
		</script>
		<li class="mailBox">
			<a href="index.php?mod=vote&view=me&filter=created&uid=<?php echo $uid; ?>" hidefocus="true" title="我的投票">我的投票</a>
			<i class="anoTv" onclick="window.location.href='index.php?mod=vote&view=me&filter=joined&uid=<?php echo $uid; ?>'" title="我参与的投票">我参与的</i>
		</li>

		<script type="text/javascript">
		    $(document).ready(function(){
		    var objSA = ".actBox";
			$(objSA).mouseover(function(){$(objSA + " i").show();});
			$(objSA).mouseout(function(){$(objSA + " i").hide();});
			});
		</script>
		<!-- 
<?php $event_setting=ConfigHandler::get('event_setting') ?>
 -->
		<!-- 
<?php if($event_setting == 1) { ?>
 -->
        <li class="actBox">
        <a href="index.php?mod=event&code=myevent" hidefocus="true" title="我的活动">我的活动</a>
		<i class="anoTv" onclick="window.location.href='index.php?mod=event&code=myevent&type=part&uid=<?php echo $uid; ?>'" title="我参与的活动">我参与的</i>
		</li>
		<!-- 
<?php } ?>
 -->
<?php $navigation_config=ConfigHandler::get('navigation') ?>
<?php if(!empty($navigation_config['pluginmenu'])) { ?>
		 
<?php if(is_array($navigation_config['pluginmenu'])) { foreach($navigation_config['pluginmenu'] as $pmenus) { ?>
		 
<?php if(is_array($pmenus)) { foreach($pmenus as $pmenu) { ?>
		  
<?php if($pmenu['type'] == 3) { ?>
		  
<?php if('topic'==$this->require) { ?>
		  <li class="mypub current">
		  
<?php } else { ?>  <li class="mypub">
		  
<?php } ?>
  <a href="<?php echo $pmenu['url']; ?>&require=topic" hidefocus="true" title="<?php echo $pmenu['name']; ?>"><?php echo $pmenu['name']; ?></a></li>
		   
<?php } ?>
 
<?php } } ?>
 
<?php } } ?>
 
<?php } ?>
      </ul>
      <div class="blackBox2"></div>
	
<?php } ?>
<?php } ?>
<!-------------------------关于我的信息-------------------------------->
<?php if(MEMBER_ID == $_mymember['uid'] ) { ?>
<?php if(in_array($this->Code,array('myhome','myfavorite','favoritemy','mycomment','tocomment','myat'))   || $_mymember['style_three_tol'] == 1) { ?>
  

		<script type="text/javascript">
		$(document).ready(function(){
			$(".SC_guanyu").click(function(){$(this).parent().toggleClass("fold_guanyu");$(".SC_guanyu_box").toggle();});
		});
		</script>
		<div class="SC">
			<h3>关于<?php echo $_mymember['nickname']; ?><a class="btn SC_guanyu" href="javascript:void(0)"></a></h3>
			<ul class="FTL SC_guanyu_box">
<?php if($_mymember['aboutme']) { ?>
				<li>&nbsp;<?php echo $_mymember['aboutme']; ?></li><?php } elseif(MEMBER_ID==$_mymember['uid'] && !$_GET['mod_original']) { ?><li><a href="index.php?mod=settings">快来写一句话</a>，向大家介绍一下吧</li>
<?php } else { ?>这家伙很懒，什么都没留下。
				
<?php } ?>
</ul>
		</div>
		
		<!--我的标签-->
<?php if(MEMBER_ID > 0) { ?>
			<script type="text/javascript">
				$(document).ready(function(){
					$(".SC_biaoqian").click(function(){$(this).parent().toggleClass("fold_biaoqian");$(".SC_biaoqian_box").toggle();});
				});
			</script>
			<div class="SC">
			<h3>我的标签
				<a class="btn SC_biaoqian" href="javascript:void(0);" onclick="right_show_ajax('<?php echo MEMBER_ID; ?>','user_tag','user_tag'); return false;"></a>
			</h3>
			<ul class="FTL SC_biaoqian_box">
				<div id="<?php echo MEMBER_ID; ?>_user_tag"></div>
			</ul>
			</div>
			
<?php } ?>
  
		<!--我的标签-->
<?php if(!$tag) { ?>
			<!--我关注的话题-->
<?php if(MEMBER_ID > 0) { ?>
			<script type="text/javascript">
				$(document).ready(function(){
					$(".SC_woguanzhu").click(function(){$(this).parent().toggleClass("fold_woguanzhu");$(".SC_woguanzhu_box").toggle();});
				});
			</script>
			<div class="SC">
			<h3>我关注的话题<a class="btn SC_woguanzhu" href="javascript:void(0);" onclick="right_show_ajax('<?php echo MEMBER_ID; ?>','myfavoritetags','myfavoritetags')"></a></h3>
			<ul class="FTL SC_woguanzhu_box">
				<div id="<?php echo MEMBER_ID; ?>_myfavoritetags"></div>
			</ul>
			</div>
			
<?php } ?>
<!--我关注的话题-->
		
<?php } ?>
<?php } ?>
<?php } ?>
<!-------------------------关于我的信息-------------------------------->

</div>
		
<?php } ?>
<!--两栏  三栏 显示判断-->	
</div>
<?php if(MEMBER_ID) { ?>
 <ul class="boxRNav3">
 
<?php if($this->Code == 'follow') $follow_tab = 'current'; ?>

<?php if($this->Code == 'fans') $fans_tab = 'current'; ?>

<?php if($this->Code == 'maybe_friend') $maybe_friend_tab = 'current'; ?>

<?php if($this->Code == 'usertag') $usertag_tab = 'current'; ?>

<?php if($this->Code == 'search') $search_tab = 'current'; ?>

<?php if($this->Get['mod'] == 'blacklist') $blacklist_tab = 'current'; ?>

<?php if (MEMBER_ID==$member['uid'] ) $_my = '我'; else $_my = $member['gender_ta'] ?>
<li class="<?php echo $follow_tab; ?> i_follow"><a href="index.php?mod=<?php echo $member['username']; ?>&code=follow"><?php echo $_my; ?>的关注(<?php echo $member['follow_count']; ?>)</a></li>
	<li class="<?php echo $fans_tab; ?> i_fans"><a href="index.php?mod=<?php echo $member['username']; ?>&code=fans" ><?php echo $_my; ?>的粉丝(<?php echo $member['fans_count']; ?>)</a></li>
	<li class="<?php echo $maybe_friend_tab; ?> i_maybe"><a href="index.php?mod=profile&code=maybe_friend">找到感兴趣的人</a></li>
	<li class="<?php echo $usertag_tab; ?> i_tag"><a href="index.php?mod=profile&code=usertag">标签/兴趣爱好</a></li>
	<li class="<?php echo $search_tab; ?> i_search"><a href="index.php?mod=profile&code=search">可能在我附近 </a></li>
	<li class="<?php echo $blacklist_tab; ?> i_black"><a href="index.php?mod=blacklist">黑名单 </a></li>
 </ul>
<?php } ?>
</div>
</div>

</div><script type="text/javascript" src="templates/default/js/combobox.js"></script>
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
<?php echo $GLOBALS['iframe']; ?>