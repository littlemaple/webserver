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


<div class="main_2b">
	<div class="main_t"><span>设置</span></div>
	<div class="Menubox2">
	<ul>
<?php if(is_array($act_list)) { foreach($act_list as $key => $val) { ?>
<?php $_hoverCLS = ($key==$act ? ' class="tago" ' : 'class="tagn"'); ?>
<?php if(!is_array($val)) { ?>
	<li><div <?php echo $_hoverCLS; ?>><A HREF="index.php?mod=settings&code=<?php echo $key; ?>"><span><?php echo $val; ?></span></A></div></li>
<?php } else { ?><li><div <?php echo $_hoverCLS; ?>><A HREF="index.php?mod=<?php echo $val['link_mod']; ?>&code=<?php echo $val['link_code']; ?>"><span><?php echo $val['name']; ?></span></A></div></li>
	
<?php } ?>
<?php } } ?>
</ul>
	</div>

<div class="set_warp" style="width:715px; margin:0 auto; padding:20px 0 100px;">
  
<?php if('secret'==$act) { ?>
	<form method="POST"  action="index.php?mod=settings&code=do_modify_password" onSubmit="return Validator.Validate(this,3);">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
		<table width="100%" border="0">
		  <tr>
		<td width="110" align="right" valign="top">当前登录密码：</td>
		<td><input name="password_old" dataType="LimitB" min="3" msg="修改本页信息，必须输入当前登录密码" type="password"  class="p1"/>
		（必填）</td>
		  </tr>
		  <tr>
			<td align="right" valign="top">设置新的密码：</td>
			<td><input name="password_new1" require="false" dataType="LimitB" min="5" msg="新密码过短，请设置5位以上" type="password"  class="p1"/>
			（如不修改请留空即可）</td>
		  </tr>
		  <tr>
			<td align="right" valign="top">确认新的密码：</td>
			<td><input name="password_new2" dataType="Repeat" to="password_new1" msg="两次输入的密码不一致" type="password"  class="p1"/></td>
		  </tr>

		  <tr>
			<td align="right" valign="middle">&nbsp;</td>
			<td>（修改上述信息需要重新登录）<br /><input type="submit" class="save" value="保存修改" /></td>
		  </tr>
		</table>
	</form>
	<div style="font-size:12px;">
		<BR />如忘记了登录密码，可通过如下方式找回：<BR/>
		1、在登录界面，点<a href="index.php?mod=get_password" target="_blank">取回密码</a>链接，重设密码的邮件会发送到您的登录Email中；<BR />
		2、请在<a href="index.php?mod=settings">个人资料</a>设置中，填写好真实姓名和证件号码信息，可据此凭证通过客服重设密码。
	</div>

 <?php } elseif('email'==$act) { ?> 	<form method="POST"  action="index.php?mod=settings&code=modify_email" onSubmit="return Validator.Validate(this,3);">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
		<table width="100%" border="0">
		  <tr>
		<td width="110" align="right" valign="top">当前登录密码：</td>
		<td><input name="password_old" dataType="LimitB" min="3" msg="修改本页信息，必须输入当前登录密码" type="password"  class="p1"/>
		（必填）</td>
		  </tr>
		  <tr>
			<td align="right" valign="top">登录提醒Email：</td>
			<td><input name="email_new" dataType="Email" msg="请输入正确的Email 地址" type="text" value="<?php echo $member['email']; ?>" class="p1" /></td>
		  </tr>
		  <tr>
			<td align="right" valign="middle">&nbsp;</td>
			<td>（修改上述信息需要重新登录）<br /><input type="submit" class="save" value="保存修改" /></td>
		  </tr>
		</table>
	</form>

  <?php } elseif('extcredits'==$act) { ?><div class="jfMenu">
		<ul>
<?php if($op_lists) { ?>
<?php if(is_array($op_lists)) { foreach($op_lists as $_k => $_v) { ?>
<a href="index.php?mod=settings&code=<?php echo $act; ?>&op=<?php echo $_k; ?>" 
<?php if($op==$_k) { ?>
 class="selected" 
<?php } ?>
><?php echo $_v; ?></a>
<?php } } ?>
<?php } ?>
</ul>
	</div>
	<div class="Contentbox">
		<script type="text/javascript">
			$(document).ready(function(){
			 $(".stripe_tb tr").mouseover(function(){
			 $(this).addClass("over");}).mouseout(function(){
			 $(this).removeClass("over");})
			 $(".stripe_tb tr:even").addClass("alt");
			 });
		</script>
<?php if('base'==$op) { ?>
			<table width="100%" border="0">
<?php if(is_array($credits_config['ext'])) { foreach($credits_config['ext'] as $_k => $_v) { ?>
<?php if($_v['enable']) { ?>
			  <tr>
				<td width="10%"><?php echo $_v['name']; ?>：</td>
				<td><b><?php echo $_v['ico']; ?> <?php echo $member[$_k]; ?> <?php echo $member['unit']; ?></b></td>
			  </tr>
			  
<?php } ?>
  
<?php } } ?>
  <tr>
				<td>总积分：</td>
				<td><b><?php echo $member['credits']; ?></b> （<?php echo $credits_config_formula; ?>）</td>
			  </tr>
			  <tr>
				<td colspan=2><A HREF="index.php?mod=settings&code=exp">点此查看我的微博积分等级</A></td>
			  </tr>
			</table><?php } elseif('log'==$op) { ?><table width="100%" border="0" class="stripe_tb">
			<thead>
		   <tr>
				 <th>动作名称</th>
				 <th>总次数</th>
				 <th>周期次数</th>
<?php if(is_array($credits_config['ext'])) { foreach($credits_config['ext'] as $__k => $__v) { ?>
 <th><?php echo $__v['name']; ?></th>
<?php } } ?>
 <th>最后奖励时间</th>
			 </tr>
		  </thead>
<?php if(is_array($log_list)) { foreach($log_list as $_k => $_v) { ?>
  <tr>
				<td><?php echo $_v['rulename']; ?></td>
				<td><?php echo $_v['total']; ?></td>
				<td><?php echo $_v['cyclenum']; ?></td>
<?php if(is_array($credits_config['ext'])) { foreach($credits_config['ext'] as $__k => $__v) { ?>
<td><?php echo $_v[$__k]; ?></td>
<?php } } ?>
<td><?php echo $_v['dateline']; ?></td>
			  </tr>
			  
<?php } } ?>
 <thead>
		   <tr>
				 <th>总计</th>
				 <th>&nbsp;</th>
				 <th>&nbsp;</th>
				 
<?php if(is_array($credits_config['ext'])) { foreach($credits_config['ext'] as $__k => $__v) { ?>
 <th><?php echo $_counts[$__k]; ?></th>
				 
<?php } } ?>
 <th>&nbsp;</th>
		   </tr>
		  </thead>
			</table><?php } elseif('rule'==$op) { ?><span style="font-size:12px; float:left; padding:4px 0 4px 5px">进行以下动作，会得到积分奖励。注意：在一个周期内，你得到的奖励次数是有限制。</span>
			<table width="100%" border="0" class="stripe_tb">
			<thead>
		   <tr>
				 <th>动作名称</th>
				 <th>周期范围</th>
				 <th>周期内最多奖励次数</th>
				 
<?php if(is_array($credits_config['ext'])) { foreach($credits_config['ext'] as $__k => $__v) { ?>
 <th><?php echo $__v['name']; ?></th>
				 
<?php } } ?>
 </tr>
		  </thead>
<?php if(is_array($credits_rule)) { foreach($credits_rule as $_k => $_v) { ?>
  <tr>
				<td><?php echo $_v['rulename']; ?><b><?php echo $_v['related']; ?></b></td>
				<td><?php echo $_v['cycletype']; ?></td>
				<td><?php echo $_v['rewardnum']; ?></td>
<?php if(is_array($credits_config['ext'])) { foreach($credits_config['ext'] as $__k => $__v) { ?>
<td>
<?php if($_v[$__k]>0) { ?>
+
<?php } ?>
<?php echo $_v[$__k]; ?></td>
<?php } } ?>
  </tr>
			  
<?php } } ?>
</table>
<?php } else { ?>未定义的操作
		
<?php } ?>
</div>

  <!--邮件提醒-->
  <?php } elseif('notice'==$act) { ?><form method="post"  action="index.php?mod=settings&amp;code=do_notice" enctype="multipart/form-data">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
		<table width="100%" border="0">
		  <tr>
			<td align="right">提醒邮箱：</td>
			<td><input name="textfield" type="text" value="<?php echo $member['email']; ?>" class="p1"  readonly disabled />
			（<A HREF="index.php?mod=settings&code=email">点此修改</A>）
			</td>
		  </tr>
		  <tr>
			<td width="18%" align="right" valign="top"><span class="fontRed"></span>提醒类型：</td>
			<td width="82%">

			<input name="notice_at" type="checkbox" id="notice_at" value="1"
<?php if($member['notice_at'] == 1) { ?>
checked="checked" 
<?php } ?>
/>
			@我的&nbsp;&nbsp;
			<br />

			<input name="notice_reply" type="checkbox" id="notice_reply" value="1"
<?php if($member['notice_reply'] == 1) { ?>
checked="checked" 
<?php } ?>
 />
			评论我的
			<br />

			<input name="notice_pm" type="checkbox" id="notice_pm" value="1"
<?php if($member['notice_pm'] == 1) { ?>
 checked="checked" 
<?php } ?>
 />
			站内短消息 &nbsp;&nbsp;

			</td>
		  </tr>
		  <tr>
			<td align="right">提醒频率：</td>
			<td>
			<?php echo $user_notice_time; ?>		    </td>
		  </tr>
		  <tr>
			<td align="right" valign="top">&nbsp;</td>
			<td><input type="submit" class="save" value="确定提醒"/></td>
		  </tr>
		</table>
	</form>

 <!--上传头像-->
 <?php } elseif('face'==$act) { ?> 	<script type="text/javascript">
		function updateavatar() {
			window.location.reload();
		}
	</script>
	<div style="padding:10px 0;">
		<span class="fontRed">用户头像会显示在<a href="index.php?mod=<?php echo $member['username']; ?>" target="_blank">个人微博</a>页面，以及你的微博中！</span><BR />
	</div>
<?php if($uc_avatarflash) { ?>
	<img src="<?php echo $member['face_original']; ?>" onerror="javascript:faceError(this);"/>
	<h2>设置我的新头像</h2>
	<p>请选择一个新照片进行上传编辑。</p>
	<?php echo $uc_avatarflash; ?>
<?php } else { ?>    <style type="text/css">
        .jcrop-holder { text-align: left; }

        .jcrop-vline, .jcrop-hline
        {
        	font-size: 0;
        	position: absolute;
        	background: white url('./templates/default/images/jcrop.gif') top left repeat;
        }
        .jcrop-vline { height: 100%; width: 1px !important; }
        .jcrop-hline { width: 100%; height: 1px !important; }
        .jcrop-handle {
        	font-size: 1px;
        	width: 7px !important;
        	height: 7px !important;
        	border: 1px #eee solid;
        	background-color: #333;
        	*width: 9px;
        	*height: 9px;
        }

        .jcrop-tracker { width: 100%; height: 100%; }

        .custom .jcrop-vline,
        .custom .jcrop-hline
        {
        	background: yellow;
        }
        .custom .jcrop-handle
        {
        	border-color: black;
        	background-color: #C7BB00;
        	-moz-border-radius: 3px;
        	-webkit-border-radius: 3px;
        }
        .Image {
			 max-width:600px;height:auto;cursor:pointer;
			 border:1px dashed #4E6973;
			 zoom:expression( function(elm) {
				 if (elm.width>560) {
					 var oldVW = elm.width; elm.width=560;
					 elm.height = elm.height*(560 /oldVW);
				 }
				 elm.style.zoom = '1';
			 }(this));
		 }


    </style>
    <script type="text/javascript" src="templates/default/js/jquery.Jcrop.js"></script>
    <script language="Javascript">
    	function upload_face()
    	{
    		// Remember to invoke within jQuery(window).load(...)
    		// If you don't, Jcrop may not initialize properly
    		jQuery(document).ready(function(){

    			jcrop_init();

    		});    		
    	}        
        function jcrop_init()
        {
            jQuery('#cropbox').Jcrop({
                    minSize: [ 40, 40 ],
                    maxSize: [ 600, 600 ],
                    aspectRatio: 1,
    				setSelect: [ 0, 0, 200, 200 ],
    				onChange: jcrop_showCoords,
    				onSelect: jcrop_showCoords
    			});
        }        
        // Our simple event handler, called from onChange and onSelect
		// event handlers, as per the Jcrop invocation above
		function jcrop_showCoords(c)
		{
			jQuery('#x').val(c.x);
			jQuery('#y').val(c.y);
			jQuery('#w').val(c.w);
			jQuery('#h').val(c.h);
		};
        
<?php if($temp_face) { ?>
            upload_face();
        
<?php } ?>
    </script>


	<span style="font-size:12px; color:#333; display:block; margin:10px 0;">
		上传头像支持JPG、GIF和PNG格式的图片文件，大小<i style="color:#ff0000">2M</i>以内；<br />
		请点下面“浏览”按钮选择头像图片，系统会自动上传并显示在下面，用鼠标在头像上选择剪裁区域，最后点确认剪裁。
	</span>

	<div>
	<div>
		<iframe id="uploadface" name="uploadface" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank"></iframe>
		<form method="post"  action="ajax.php?mod=topic&code=uploadface" enctype="multipart/form-data" name="face_form" target="uploadface" id="face_form">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
            <input type="hidden" id="temp_face" name="temp_face" value="<?php echo $temp_face; ?>" />
		  <input id="idFile" name="face" type="file" onchange="document.getElementById('face_form').submit();show_message('正在上传头像，请不要刷新页面');"/>
		</form>
	</div><br />


        <span id="jcrop_init_id" onclick="jcrop_init();"></span>
		<div><img src="<?php echo $member['face_original']; ?>" id="cropbox" onclick="upload_face();" border="0" alt="" class="Image" /></div>


		<form action="index.php?mod=settings&code=do_modify_face" method="post"  id="crop_form">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
			<input name="img_path" value="<?php echo $temp_face; ?>" type="hidden" id="img_path" /><br />

			<input type="submit" value="确认" id="crop_submit" class="shareI" />
			<input type="button" value="取消" class="shareI" onclick="updateavatar();" />
		</form>

	</div>
 
<?php } ?>
<?php } elseif('base'==$act) { ?><script type="text/javascript"> 
$(function(){ 
    $("#nickname_input").focus(function(){$(this).css("background","#CBFE9F");$(".R_tt1").show();}).blur(function(){$(this).css("background","#FFF");$(".R_tt1").hide();});
}); 
</script>

	<form method="POST"  name="profile_base" action="index.php?mod=settings&code=do_modify_profile" onSubmit="return Validator.Validate(this,3);">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
	<table width="100%" border="0">
	  <tr>
	    <td width="110" align="right" valign="top">用户帐户：</td>
	    <td><input value="<?php echo $member['username']; ?>" type="text" class="p1" readonly disabled />
		（用于登录本站和访问<a href="index.php?mod=<?php echo $member['username']; ?>" target="_blank">个人微博</a>，禁修改）
		</td>
	  </tr>
	  <tr>
	    <td width="110" align="right" valign="top">姓名/昵称：</td>
	    <td>
		<input name="nickname" id="nickname_input" type="text"  class="p1"  value="<?php echo $member_nickname; ?>" 
<?php if($member['validate']) echo "Readonly"; ?>
  />
		（发微博后会显示，也用于@姓名 通知）
<?php if($member['validate']) { ?>
        	<div class="R_tt1" >提醒：申请<a href="index.php?mod=other&code=vip_intro" target="_blank">V认证</a>后，禁止再修改昵称</div>
		
<?php } ?>
</td>
	  </tr>
	  <tr>
	    <td align="right" valign="top">Email 邮箱：</td>
	    <td><input name="email" type="text" value="<?php echo $member['email']; ?>" class="p1"  readonly disabled />
		（用于登录、<A HREF="index.php?mod=settings&code=notice">提醒</A>和<a href="index.php?mod=get_password" target="_blank">取回密码</A>，
		<A HREF="index.php?mod=settings&code=base#modify_email_area">点此修改</A>）
		</td>
	  </tr>
	  
	  <tr>
	    <td align="right" valign="top">我正在：</td>
	    <td>
		<?php echo $work_type_select; ?>
		</td>
	  </tr>

	  <tr>
	    <td align="right" valign="top">
		<span id="work_college_title"><span class="fontRed">*</span>所在大学：</span><span id="work_area_title"><span class="fontRed">*</span>所在地区：</span>
		</td>
	    
		<td>
			  <div style="float:left;">
                <?php echo $province_list; ?>
              </div>
              <div style="float:left;" id="work_college">
                <select id="college" name="college" onchange="changeCollege();">
				<option value='0'>请选择</option>
				</select>
				<input type="hidden" id="hidForCollege" name="hidForCollege" value="<?php echo $hid_college; ?>"/>
              </div>
			  <div style="float:left;" id="work_area">
                <select id="city" name="city" onchange="changeCity();">
				<option value='0'>请选择</option>
				</select>
				<input type="hidden" id="hidForCity" name="hidForCity" value="<?php echo $hid_city; ?>"/>
             
                <select id="area" name="area" onchange="changeArea();">
				<option value='0'>请选择</option>
				</select>
              
                <select id="street" name="street">
				<option value='0'>请选择</option>
				</select>
              </div>
			  <input type="hidden" id="hid_city" name="hid_city" value="<?php echo $hid_city; ?>">
              <input type="hidden" id="hid_area" name="hid_area" value="<?php echo $hid_area; ?>">
              <input type="hidden" id="hid_street" name="hid_street" value="<?php echo $hid_street; ?>">
			  <input type="hidden" id="hid_college" name="hid_college" value="<?php echo $hid_college; ?>">
              <div>（设置后，其他人会通过<a href="index.php?mod=profile&code=search" target="_blank">找人</a>找到你）</div>
			  </td>
	  </tr>
	  <tr>
	    <td align="right" valign="top"><span class="fontRed">*</span> 用户性别：</td>
	    <td><?php echo $gender_radio; ?></td>
	  </tr>
	  <tr>
	    <td align="right" valign="top">一句话介绍：</td>
	    <td><textarea name="aboutme"><?php echo $member['aboutme']; ?></textarea><br />（会在你的<a href="index.php?mod=<?php echo $member['username']; ?>" target="_blank">个人微博</a>页面右侧看到）</td>
	  </tr>
	  <tr>
	    <td align="right" valign="top">个人签名：</td>
	    <td>
	      <input name="signature" type="text" id="signature" value="<?php echo $member['signature']; ?>" class="p1" style="width:413px;" onkeyup="javascript:checkWord(16,event)"/>
		 
	      <br />（显示在发布微博后，用户名后面。 还可以输入 <span id="signature_info" style='font-family:Georgia;font-size:24px;'>16</span> 字）

		 </td>
	  </tr>
	  	 <script language="Javascript">
			//字数统计 STR
			function checkWord(len,evt){ 
			   if(evt==null) 
			   evt = window.event; 
			   var src = evt.srcElement? evt.srcElement : evt.target; 
			   var str = src.value.trim();
			   myLen =0;
			   i=0;
			   for(;(i<str.length)&&(myLen<=len*2);i++){
			   if(str.charCodeAt(i)>0&&str.charCodeAt(i)<128)
			   myLen++;
			   else
			   myLen+=2;
			   }
			   var mydiv=document.getElementById("signature_info");
			   if(myLen>len*2){
			   src.value=str.substring(0,i-1);
			   }
			   else{ 
			   document.getElementById("signature_info").innerHTML = "<span style='color:#FF0000;'>"+Math.floor((len*2-myLen)/2)+"</span>";
			   }
			}
			String.prototype.trim = function() 
			{ 
			return this.replace(/(^\s*)|(\s*$)/g, ""); 
			}
			//字数统计 END
		</script>
	  <tr>
	  <td colspan="2">

	 <div class="tagg2">以下信息将作为通过客服取回帐号的依据
	    
<?php if(!$member['validate_true_name'] || !$member['validate_card_type'] || !$member['validate_card_id']) { ?>
	    ，请认真填写，保存后不可修改
	    
<?php } ?>
</div>
	    </td>
	  </tr>
	  <tr>
	    <td align="right" valign="top">真实姓名：</td>
	    <td>
	    
<?php if($member['validate_user']) { ?>
	    <?php echo $member['validate_user']; ?>
	    
<?php } else { ?>    <input type="text" name="validate_true_name" value="<?php echo $memberfields['validate_true_name']; ?>" class="p1" />
	    
<?php } ?>
（不会对外部公开，其他人看不到）
	    </td>
	  </tr>
	  <tr>
	    <td align="right" valign="top">证件类型：</td>
	    <td>
	    
<?php if($member['validate_card_type']) { ?>
	    <?php echo $memberfields['validate_card_type']; ?>
	    
<?php } else { ?>    <?php echo $validate_card_type_select; ?>
	    
<?php } ?>
    </td>
	  </tr>
	  <tr>
	    <td align="right" valign="top">证件号码：</td>
	    <td>
	    
<?php if($member['validate_card_id']) { ?>
	    
<?php $_v=substr_replace($memberfields['validate_card_id'],'******',-6); ?>
    <?php echo $_v; ?>
	    
<?php } else { ?>    <input type="text" name="validate_card_id" value="<?php echo $memberfields['validate_card_id']; ?>" class="p1" />（保存后将只在此处显示部分号码）
	    
<?php } ?>
    </td>
	  </tr>
	  <tr>
	    <td align="right" valign="top">&nbsp;</td>
	    <td><input type="submit" class="save" value="保存"/></td>
	  </tr>
	</table>
</form>

<a id="modify_email_area"></a>
<br />
<form method="POST"  action="index.php?mod=settings&code=modify_email" onSubmit="return Validator.Validate(this,3);">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
		<table width="100%" border="0">
        <tr>
    	  <td colspan="2">
    	   <div class="tagg2"><b style="font-size:14px">修改邮箱，需要输入当前登录密码</b></div>
    	  </td>
    	</tr>
		  <tr>
		<td width="110" align="right" valign="top">当前登录密码：</td>
		<td><input name="password_old" dataType="LimitB" min="3" msg="修改本页信息，必须输入当前登录密码" type="password"  class="p1"/>
		（必填）</td>
		  </tr>
		  <tr>
			<td align="right" valign="top">登录提醒Email：</td>
			<td><input name="email_new" dataType="Email" msg="请输入正确的Email 地址" type="text" value="<?php echo $member['email']; ?>" class="p1" /></td>
		  </tr>
		  <tr>
			<td align="right" valign="middle">&nbsp;</td>
			<td>（修改上述信息需要重新登录）<br /><br /><input type="submit" class="save" value="保存修改" /></td>
		  </tr>
		</table>
	</form>
    
<script type="text/javascript" src="templates/default/js/city.js"></script>
<script type="text/javascript">
$(document).ready(function(){
var selectOption=
<?php load::functions('area');echo area_config_to_json(); ?>
;
});

var validateRegularList={
	province:{dataType:"LimitB",min:'1',msg:"请选择省/直辖市"},
	hidForCity:{dataType:"LimitB",min:'1',msg:"请选择城市/地区"},
	email2:{require:"false",dataType:"Email",msg:"邮箱格式不正确"},
	qq:{require:"false",dataType:"QQ",msg:"请填写正确的QQ号"},
	msn:{require:"false",dataType:"Email",msg:"MSN格式不正确"},
	aboutme:{require:"false",dataType:"LimitB",min:'3',max:'250',msg:"请将长度控制在3~250个字符之间"}
}

var validateRegularListCollege={
	province:{dataType:"LimitB",min:'1',msg:"请选择省/直辖市"},
	hidForCollege:{dataType:"LimitB",min:'1',msg:"请选择学校"},
	email2:{require:"false",dataType:"Email",msg:"邮箱格式不正确"},
	qq:{require:"false",dataType:"QQ",msg:"请填写正确的QQ号"},
	msn:{require:"false",dataType:"Email",msg:"MSN格式不正确"},
	aboutme:{require:"false",dataType:"LimitB",min:'3',max:'250',msg:"请将长度控制在3~250个字符之间"}
}
//Validator.SetRegular("profile_base",validateRegularList);

function changeProvince(){
  var province = document.getElementById("province").value;
  var work_type = document.getElementById("work_type").value;
  var hid_city = document.getElementById("hid_city").value;
  var hid_college = document.getElementById("hid_college").value;

  if(work_type == "2"){
  	  document.getElementById("hidForCollege").value = "";
  	  var url = "ajax.php?mod=member&type=top&code=sel&collegeprovince="+province + "&hid_college="+hid_college;
  	  var myAjax=$.post(
				url,
				function(d){
					$('#' + "college").html(d);	
					changeCollege();
				}
	  );
  }else{
  	  document.getElementById("hidForCity").value = "";
	  var url = "ajax.php?mod=member&code=sel&type=top&province="+province + "&hid_city="+hid_city;
	  var myAjax=$.post(
				url,
				function(d){
					$('#' + "city").html(d);
					document.getElementById("street").length = 1;
					document.getElementById("area").length = 1;
					//document.getElementById("street").style.display = "none";
					//document.getElementById("area").style.display = "none";
					changeCity();
				}
	  );
  }
}
changeProvince();
function changeCity(){
  var city = document.getElementById("city").value;
  document.getElementById("hidForCity").value = city;
  var hid_area = document.getElementById("hid_area").value;
  var url = "ajax.php?mod=member&code=sel&type=top&city="+city+"&hid_area="+hid_area;
  var myAjax=$.post(
		  	url,
		  	function(d){
				if(d){
					document.getElementById("area").style.display = "block";
		  		    $('#' + "area").html(d);
					changeArea();
				}else{
		  		    document.getElementById('area').length = 1;
		  		    document.getElementById('street').length = 1;
					document.getElementById("street").style.display = "none";
					document.getElementById("area").style.display = "none";
				}
		  	}
  );
}
function changeArea(){
  var area = document.getElementById("area").value;
  var hid_street = document.getElementById("hid_street").value;
  var url = "ajax.php?mod=member&code=sel&type=top&area="+area+"&hid_street="+hid_street;
  var myAjax=$.post(
		  	url,
		  	function(d){
				if(d){
					document.getElementById("street").style.display = "block";
				    $('#' + "street").html(d);
				}else{
		  		    document.getElementById('street').length = 1;
					document.getElementById("street").style.display = "none";
				}
		  	}
  );
}

changeWorkType();
function changeWorkType(){
	var work_type = document.getElementById("work_type").value;
	if(work_type == "2"){
		Validator.SetRegular("profile_base",validateRegularListCollege);
		document.getElementById("hidForCity").value = "true";
	    document.getElementById("hidForCollege").value = document.getElementById("college").value;
		document.getElementById("work_college").style.display = "block";
		document.getElementById("work_area").style.display = "none";
		document.getElementById("work_college_title").style.display = "block";
		document.getElementById("work_area_title").style.display = "none";
	}else{
		Validator.SetRegular("profile_base",validateRegularList);
		document.getElementById("hidForCollege").value = "true";
	    document.getElementById("hidForCity").value = document.getElementById("city").value;
		document.getElementById("work_college").style.display = "none";
		document.getElementById("work_area").style.display = "block";
		document.getElementById("work_college_title").style.display = "none";
		document.getElementById("work_area_title").style.display = "block";
	}
	changeProvince();
}

function changeCollege(){
  var college = document.getElementById("college").value;
  document.getElementById("hidForCollege").value = college;
}
</script><?php } elseif('user_medal'==$act) { ?>    
<?php if(is_array($medal_list)) { foreach($medal_list as $val) { ?>
	<div style="width:120px; height:120px; float:left; margin-right:15px;">
        <img src="<?php echo $val['medal_img']; ?>" style="margin-right:5px; vertical-align:middle" />
		<p><?php echo $val['medal_name']; ?></p>
		<p>
		  <input type="checkbox"  onchange="open_medal_index(<?php echo $val['id']; ?>);return false;" 
<?php if($val['is_index'] == "1") echo "checked=checkbox"; ?>
/>
	    显示		</p>
	</div>
    
<?php } } ?>
    
<?php if($sina) { ?>
    <div style="width:120px; height:120px; float:left; margin-right:15px;">
    <img src="templates/default/images/medal/M_sina.gif" />
    <p>绑定新浪</p>
	<p><input type="checkbox" checked="checked" disabled="disabled"/>显示</p>
    </div>
    
<?php } ?>
    
    
<?php if($qqwb) { ?>
    <div style="width:120px; height:120px; float:left; margin-right:15px;">
    <img src="./templates/default/images/medal/qqwb.png" />
    <p>绑定腾讯</p>
	<p><input type="checkbox" checked="checked" disabled="disabled"/>显示</p>
    </div>
    
<?php } ?>
 
<?php if($imjiqiren) { ?>
    <div style="width:120px; height:120px; float:left; margin-right:15px;">
    <img src="templates/default/images/medal/M_qq.gif" />
    <p>绑定QQ</p>
	<p><input type="checkbox" checked="checked" disabled="disabled"/>显示</p>
    </div>
    
<?php } ?>
    
<?php if($sms) { ?>
    <div style="width:120px; height:120px; float:left; margin-right:15px;">
    <img src="templates/default/images/medal/Tel.gif" />
	<p>绑定手机</p>
	<p><input type="checkbox" checked="checked" disabled="disabled"/>显示</p>
    </div>
    
<?php } ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td><a href="index.php?mod=other&code=medal" target="_blank">点击获得更多勋章</a></td>
	  </tr>
	</table><?php } elseif('exp'==$act) { ?><!--等级说明结构开始-->
    <div class="lelInfo">
    <div class="currentLel">
        <img src="<?php echo $member['face_original']; ?>" alt="<?php echo $member['nickname']; ?>" class="userPic" onerror="javascript:faceError(this);"/>
        <div class="lelProcess">
        	<div class="userName">
			<b><?php echo $member['nickname']; ?></b>  
            <!--
			<span class="wb_l_level">
			<a href="index.php?mod=settings&code=exp" target="_blank" class="ico_level wbL<?php echo $member['level']; ?>"><em><?php echo $member['level']; ?></em></a>
			</span>
			-->
			<em> LV <?php echo $member['level']; ?> </em>
			</div>
            <div class="lelProcessBox">
            	<p class="blueProcess" style="width:<?php echo $exp_width; ?>%;"></p>
            </div>
            <div class="lelEx">
            	<p>你当前的积分值是<span class="num"><?php echo $my_credits; ?></span>分，升级还需<span class="num"><?php echo $nex_exp_credit; ?></span>分。</p>
                <div class="arrow"></div>
            </div>
        </div>
    </div>
 
    <div class="lelIntro">
    	<h2>用户等级与你一起并肩成长</h2>
        <p class="tg">担心粉丝永远超不过名人？没关系，现在我们有用户等级。</p>
        <p class="tg"><?php echo $this->Config['site_name']; ?>积分等级隆重上线。它是对微博用户“活跃程度”和“受欢迎程度”的综合衡量。</p>
        <p class="tg">只要持续经营自己的微博，努力贡献并分享优质内容，你将获得等级的加速提升，享受更多微时代的乐趣。</p>       
        <h3>用户等级计算方法</h3>
        <p class="fc6"><a style="float: right;" href="index.php?mod=settings&code=extcredits&op=rule">查看积分获取规则</a>您在<?php echo $this->Config['site_name']; ?>的等级完全取决于积分的多少。有新鲜功能会让高等级用户优先体验。</p>
        <table cellpadding="0" cellspacing="0" class="gTable">
			<tr>
<?php if(is_array($exp_list)) { foreach($exp_list as $val) { ?>
                <th>LV<?php echo $val['level']; ?></th>
			
<?php } } ?>
</tr>
            <tr>
<?php if(is_array($exp_list)) { foreach($exp_list as $val) { ?>
                <td><?php echo $val['start_credits']; ?></td>
			
<?php } } ?>
            </tr>
        </table>
    </div>
</div>
<!--等级说明结构结束-->
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