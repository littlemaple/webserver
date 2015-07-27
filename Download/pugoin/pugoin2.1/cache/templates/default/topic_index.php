<?php /* 2011-12-28 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?>
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
<?php if(MEMBER_ID ==0) { ?>
<div class="inventLine2"> 
        <div class="atxt">
			<p class="p_1"><span><?php echo $member['nickname']; ?></span>在这里写微博，想收到TA的最新消息吗？</p> 
			<p class="p_2">微博是现在最酷、最火的沟通交流工具，可以随时随地分享新鲜事，与朋友保持联络。</p> 
			<p class="p_3">现在注册微博就可通过网页、手机、QQ机器人随时分享新鲜事，并关注好友的最新消息！</p>
        </div>
		<div class="abtn">
			<a href="index.php?mod=member&code&uid=<?php echo $member['uid']; ?>">
			<img src="templates/default/images/regbtn.gif"></a>
			<p>已有帐号，<a href="javascript:void(0);" onclick="ShowLoginDialog(); return false;">请点此登录</a></p>
		</div> 
</div>
<?php } ?>
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
    
<?php if($is_personal && !$_GET['mod_original']) { ?>
        <style type="text/css">ul.mycon li{ width:65px;}</style>
<script type="text/javascript" src="templates/default/js/publishbox.js"></script>
<div id="zz_main_publish">
<div id="tigBox_2" class="tigBox_2">用<a href="javascript:" onClick="thread_insert()" style="cursor:pointer">#关键词#</a>给微博添加话题，方便他人关注话题</div>
<div class="issueBox">
<div class="fbqCount">
<div class="fLeft">
<?php if($this->Get['mod'] == 'member') { ?>
<?php $content = '#新人报到# 我是'.$this->Config['site_name'].'新加入的成员@'.MEMBER_NICKNAME.' ，欢迎大家来关注我！'; ?>
所有关注我的人将看到我分享的信息
<?php } else { ?><span>
<?php if(!empty($member['fans_count'])) { ?>
<?php echo $member['fans_count']; ?>
<?php } else { ?><?php echo MEMBER_FANS; ?>
<?php } ?>
 </span>人在关注我，
<A href="index.php?mod=profile&code=invite" style="cursor:pointer">邀请</A>更多人
<?php } ?>
</div>
<ul class="mycon">
<li>还可以输入</li><li style="width:auto"><span id="wordCheck" style='font-family:Georgia;font-size:24px;'><?php echo $this->Config['topic_length']; ?></span></li><li style="width:14px;">字</li>
</ul>
</div>
<div class="box_1" style="display:block">
<?php $i_already_value = $content ? $content : $this->Config['today_topic']; ?>
<script type="text/javascript">
var __I_ALREADY_VALUE__ = '<?php echo $i_already_value; ?>';
</script>
<textarea name="content" id="i_already"  onkeyup="javascript:checkWord(<?php echo $this->Config['topic_length']; ?>,event,'wordCheck')" onkeydown="ctrlEnter(event, 'publishSubmit')"><?php echo $i_already_value; ?></textarea>
<input name="topic_type" type="hidden" id="topic_type" value="<?php echo $this->Get['type']; ?>" />

<!--应用 Begin-->
<input name="item" type="hidden" id="mapp_item" value="<?php echo $this->item; ?>" />
<input name="item_id" type="hidden" id="mapp_item_id" value="<?php echo $this->item_id; ?>" />
<!--应用 End-->

</div>   
  <div class="box_3">
	<script type="text/javascript">
	 $(document).ready(function() {	 	
		
	 //图片 
	 $(".menu_tqb_c").click(function(){
	 $(".menu_tqb").show();
	 $(".menu_spb").hide();
	 $('#showface').hide();
	 $('.menu_htb').hide();
	 $('.menu_vsb').hide();
	 $(".menu_wqb").hide();
	 $(".menu_hdb").hide();
	 $(".menu_cwb").hide();
	 });
	 $('#pubImg').click(function(){
	 $("#publisher_file").style.posLeft=event.x-offsetWidth/2;$("#publisher_file").style.posTop=event.y-offsetHeight/2;});
	 $(".menu_tqb_c1").click(function(){$(".menu_tqb").hide();});
	 $(".menu_tqb_c2").click(function(){$(".menu_tqb").hide();});
	 $("#publishSubmit").click(function(){$(".menu_tqb").hide();});
	 //视频
	 $(".menu_spb_c").click(function(){
	 $(".menu_spb").show();
	 $(".menu_tqb").hide();
	 $('#showface').hide();
	 $('.menu_htb').hide();
	 $('.menu_vsb').hide();
	 $(".menu_wqb").hide();
	 $(".menu_hdb").hide();
	 $(".menu_cwb").hide();
	 });
	 $(".menu_spb_c1").click(function(){$(".menu_spb").hide();});
	 //表情
	 $(".menu_bqb_c").click(function(){
	 $("#showface").show();
	 $(".menu_tqb").hide();
	 $(".menu_spb").hide();
	 $('.menu_htb').hide();
	 $('.menu_vsb').hide();
	 $(".menu_wqb").hide();
	 $(".menu_hdb").hide();
	 $(".menu_cwb").hide();
	 });
	 $('#showface').click(function(){return false;});
	 //活动
	 $(".menu_htb_c").click(function(){
	 $(".menu_htb").show();
	 $(".menu_spb").hide();
	 $(".menu_tqb").hide();
	 $('#showface').hide();
	 $('.menu_vsb').hide();
	 $(".menu_wqb").hide();
	 $(".menu_hdb").hide();
	 $(".menu_cwb").hide();
	 });
	 $('.menu_htb').click(function(){return false;});
	 //投票
	 $(".menu_vsb_c").click(function(){
	 getVoteAvtivityFromIndex('vote_publish', 'con_vote_content_1');
	 $(".menu_vsb").show();
	 $(".menu_tqb").hide();
	 $(".menu_spb").hide();
	 $('#showface').hide();
	 $('.menu_htb').hide();
	 $(".menu_wqb").hide();
	 $(".menu_hdb").hide();
	 $(".menu_cwb").hide();
	 });
	 $(".menu_vsb_c1").click(function(){$(".menu_vsb").hide();});
	 //活动
	 $(".menu_hdb_c").click(function(){
	 getEventPost();
	 $(".menu_hdb").show();
	 $(".menu_vsb").hide();
	 $(".menu_tqb").hide();
	 $(".menu_spb").hide();
	 $('#showface').hide();
	 $('.menu_htb').hide();
	 $(".menu_wqb").hide();
	 $(".menu_cwb").hide();
	 });
	 $(".menu_hdb_c1").click(function(){$(".menu_hdb").hide();});
	 
	 //微群
	 $(".menu_wqb_c").click(function(){
		 getMyQun();
		 $(".menu_wqb").show();
		 $(".menu_tqb").hide();
		 $(".menu_spb").hide();
		 $('#showface').hide();
		 $('.menu_htb').hide();
		 $(".menu_vsb").hide();
		 $(".menu_hdb").hide();
		 $(".menu_cwb").hide();
	 });
	 $(".menu_wqb_c1").click(function(){$(".menu_wqb").hide();});
	 
	 //长文本
	 $(".menu_cwb_c").click(function(){
		 get_longtext_info();
		 $(".menu_cwb").show();
		 $(".menu_tqb").hide();
		 $(".menu_spb").hide();
		 $('#showface').hide();
		 $('.menu_htb').hide();
		 $(".menu_vsb").hide();
		 $(".menu_hdb").hide();
		 $(".menu_wqb").hide();
	 });
	 $(".menu_cwb_c1").click(function(){$(".menu_cwb").hide();});
	 
	 //分类
	 $(".menu_xb_c").click(function(){
	 getClassPost();
	 $(".menu_xb").show();
	 $(".menu_wqb").hide();
	 $(".menu_tqb").hide();
	 $(".menu_spb").hide();
	 $('#showface').hide();
	 $('.menu_htb').hide();
	 $(".menu_vsb").hide();
	 });
	 $(".menu_xb_c1").click(function(){$(".menu_xb").hide();});
	 
});

//-----------------------------------
function setTab(name,cursel,n){
	for(i=1;i<=n;i++){
	var menu=document.getElementById(name+i);
	var con=document.getElementById("con_"+name+"_"+i);
	menu.className=i==cursel?"vhover":"";
	con.style.display=i==cursel?"block":"none";
}
}

function setTab1(name,cursel,n){
	for(i=1;i<=n;i++){
	var menu=document.getElementById(name+i);
	var con=document.getElementById("con_"+name+"_"+i);
	menu.className=i==cursel?"vhover":"";
	con.style.display=i==cursel?"block":"none";
}
}

function setTab2(name,cursel,n){
	for(i=1;i<=n;i++){
	var menu2=document.getElementById(name+i);
	var con2=document.getElementById("con2_"+name+"_"+i);
	menu2.className=i==cursel?"vhover2":"";
	con2.style.display=i==cursel?"block":"none";
}
}
</script>

	<!-- 商品区块 开始 -->
	<!-- JS引用 开始 -->	   
<?php $image_uploadify_topic = array(); ?>

<?php $image_uploadify_from = 'topic_publish'; ?>

<?php $image_uploadify_only_js = 1; ?>
<?php $image_uploadify_id=$content_textarea_id.$image_uploadify_type.($image_uploadify_topic['tid']>0?"_".$image_uploadify_topic['tid']:""); ?>

<?php $image_uploadify_image_small_size=$image_uploadify_image_small_size?$image_uploadify_image_small_size:45; ?>

<?php $content_textarea_id=$content_textarea_id?$content_textarea_id:'i_already'; ?>

<?php $content_textarea_empty_val=isset($content_textarea_empty_val)?$content_textarea_empty_val:'分享图片'; ?>

<?php $image_uploadify_queue_size_limit=max(0, (int) $this->Config['image_uploadify_queue_size_limit']);if($image_uploadify_queue_size_limit<1)$image_uploadify_queue_size_limit=3; ?>
<!-- <success></success> -->
		
		<!-- <script type="text/javascript" src="images/uploadify/jquery.uploadify.v2.1.4.min.js"></script> -->
		<script type="text/javascript">
		
		var __IMAGE_IDS__ = {};
		
		$(document).ready(function(){
			
			$('#publisher_file<?php echo $image_uploadify_id; ?>').uploadify({
				'uploader'  : '<?php echo $this->Config['site_url']; ?>/images/uploadify/uploadify.swf?id=<?php echo $image_uploadify_id; ?>&random=' + Math.random(),
			    'script'    : '<?php echo urlencode($this->Config['site_url'] . "/ajax.php?mod=uploadify&code=image"); ?>',
			    'cancelImg' : '<?php echo $this->Config['site_url']; ?>/images/uploadify/cancel.png',
			    'buttonImg'	: '<?php echo $this->Config['site_url']; ?>/images/uploadify/addatt.gif',
			    'width'		: 111,
			    'height'	: 17,
			    'multi'		: true,
			    'auto'      : true,
			    'sizeLimit' : '2097152',
			    'fileExt'	: '*.jpg;*.png;*.gif;*.jpeg',
			    'fileDesc'	: '请选择图片文件(*.jpg;*.png;*.gif;*.jpeg)',
			    'queueID'	: 'uploadifyQueueDiv<?php echo $image_uploadify_id; ?>',
			    'wmode'		: 'transparent',
			    'fileDataName'	 : 'topic',
			    'queueSizeLimit' : <?php echo $image_uploadify_queue_size_limit; ?>,
			    'simUploadLimit' : 1,
			    'scriptData'	 : {
			    
<?php if($image_uploadify_topic_uid) { ?>
			    	'topic_uid'  : '<?php echo $image_uploadify_topic_uid; ?>',
			    	
<?php } ?>
    	'cookie_auth': '<?php echo urlencode(jsg_getcookie("auth")); ?>'
			    },
			    'onSelect'		 : function(event, ID, fileObj) {
			    },
			    'onSelectOnce'	 : function (event, data) {
			    	imageUploadifySelectOnce<?php echo $image_uploadify_id; ?>();			    	
			    },
			    'onProgress'     : function(event, ID, fileObj, data) {
			        return false;
			    },
			    'onComplete'	 : function(event, ID, fileObj, response, data) {
			    	eval('var r = ' + response + ';');
					if (r.done) {					
						var rv = r.retval;
						if ( rv.id > 0 && rv.src.length > 0 ) {
							imageUploadifyComplete<?php echo $image_uploadify_id; ?>(rv.id, rv.src, fileObj.name);
						}
					}
			    },
			    'onError'        : function (event, ID, fileObj, errorObj) {
			        alert(errorObj.type + ' Error: ' + errorObj.info);
			    },
			    'onAllComplete'	 : function(event, data) {
			    	imageUploadifyAllComplete<?php echo $image_uploadify_id; ?>();
			    }
			});
			
			
			$("#viewImgDiv<?php echo $image_uploadify_id; ?> img").each(function() {
			    if($(this).width() > $(this).parent().width()) {
			    	$(this).width("100%");
				}
			});
			
				
		});
		
		
		//删除一张图片
		function imageUploadifyDelete<?php echo $image_uploadify_id; ?>(idval)
		{
			var idval = ('undefined'==typeof(idval) ? 0 : idval);
			if(idval > 0) 
			{
				$.post
				(
					'ajax.php?mod=uploadify&code=delete_image',
					{
						'id' : idval
					},
					function (r) 
					{				
						if(r.done)
						{
							$('#uploadImgSpan_' + idval).remove();
							
							if( ($.trim(($('#viewImgDiv<?php echo $image_uploadify_id; ?>').html()))).length < 1 )
							{
								$('#viewImgDiv<?php echo $image_uploadify_id; ?>').css('display', 'none');
								$('#insertImgDiv<?php echo $image_uploadify_id; ?>').css('display', 'block');
							}
							
							if( 'undefined' != typeof(__IMAGE_IDS__[idval]) )
							{
								__IMAGE_IDS__[idval] = 0;
							}
						}
						else
						{
							if(r.msg)
							{
								MessageBox('warning', r.msg);
							}
						}
					},
					'json'
				);
			}
		}
		
		function imageUploadifySelectOnce<?php echo $image_uploadify_id; ?>()
		{
			$('#uploading<?php echo $image_uploadify_id; ?>').html("<img src='images/loading.gif'/>&nbsp;上传中，请稍候……");
		}
		
		function imageUploadifyComplete<?php echo $image_uploadify_id; ?>(idval, srcval, nameval)
		{
			var imageIdsCount = 0;
	    	$.each( __IMAGE_IDS__, function( k, v ) { if( v > 0 ) { imageIdsCount += 1; } } );
	    	if( imageIdsCount >= <?php echo $image_uploadify_queue_size_limit; ?> )
	    	{
	    		MessageBox('warning', '本次图片数量超过限制了');
	    		return false;
	    	}
			
			var idval = ('undefined' == typeof(idval) ? 0 : idval);
			var srcval = ('undefined' == typeof(srcval) ? 0 : srcval);
			var nameval = ('undefined' == typeof(nameval) ? '' : nameval);
<?php if('topic_publish'==$image_uploadify_from) { ?>
				$('#viewImgDiv<?php echo $image_uploadify_id; ?>').prepend('<li id="uploadImgSpan_' + idval + '" class="menu_ps vv_2"><img src="' + srcval + '"/> <p><i>' + nameval + ' <a title="删除图片" onclick="imageUploadifyDelete<?php echo $image_uploadify_id; ?>(' + idval + ');return false;" href="javascript:;">删除</a></i></p></li>');<?php } elseif('topic_longtext_info_ajax'==$image_uploadify_from) { ?>$('#viewImgDiv<?php echo $image_uploadify_id; ?>').append('<span id="uploadImgSpan_' + idval + '"><img src="' + srcval + '" width="<?php echo $image_uploadify_image_small_size; ?>" alt="点击图片插入到文中" onclick="longtext_info_img_insert(\'' + srcval + '\');" /><a href="javascript:void(0);" onclick="imageUploadifyDelete<?php echo $image_uploadify_id; ?>(' + idval + '); return false;" title="删除图片">×</a></span>');
<?php } else { ?>$('#viewImgDiv<?php echo $image_uploadify_id; ?>').append('<span id="uploadImgSpan_' + idval + '"><img src="' + srcval + '" width="<?php echo $image_uploadify_image_small_size; ?>" /><a href="javascript:void(0);" onclick="imageUploadifyDelete<?php echo $image_uploadify_id; ?>(' + idval + '); return false;" title="删除图片">×</a></span>');
			
<?php } ?>
$('#normalUploadFile<?php echo $image_uploadify_id; ?>').val('');
			
			__IMAGE_IDS__[idval] = idval;
		}
		
		function imageUploadifyAllComplete<?php echo $image_uploadify_id; ?>()
		{
			$('#uploading<?php echo $image_uploadify_id; ?>').html('');			    	
	    	$('#viewImgDiv<?php echo $image_uploadify_id; ?>').css('display', 'block');
	    	//$('#insertImgDiv<?php echo $image_uploadify_id; ?>').css('display', 'none');
	    	if( $.trim(($('#<?php echo $content_textarea_id; ?>').val())).length < 1 ) {
	    		$('#<?php echo $content_textarea_id; ?>').val('<?php echo $content_textarea_empty_val; ?>');	
	    	}
	    	$('#<?php echo $content_textarea_id; ?>').focus();
		}
		
		function normalUploadFormSubmit<?php echo $image_uploadify_id; ?>()
		{
			var fileVal = $('#normalUploadFile<?php echo $image_uploadify_id; ?>').val();
			
			if(($.trim(fileVal)).length < 1)
			{
				MessageBox('warning', '请选择一个正确的图片文件');
				return false;
			}
			else
			{
				if(!(/\.(jpg|png|gif|jpeg)$/i.test(fileVal)))
				{
					MessageBox('warning', '请选择一个正确的图片文件');
					return false;
				}
				else
				{
					imageUploadifySelectOnce<?php echo $image_uploadify_id; ?>();
					
					return true;
				}
			}
		}
		
		function imageUploadifyModuleSwitch<?php echo $image_uploadify_id; ?>()
		{
			if('none' == $('#normalUploadDiv<?php echo $image_uploadify_id; ?>').css('display'))
			{
				$('#uploadDescModuleSpan<?php echo $image_uploadify_id; ?>').html('快速');
				
				$('#swfUploadDiv<?php echo $image_uploadify_id; ?>').css('display', 'none');
				$('#normalUploadDiv<?php echo $image_uploadify_id; ?>').css('display', 'block');
			}
			else
			{
				$('#uploadDescModuleSpan<?php echo $image_uploadify_id; ?>').html('普通');
				
				$('#normalUploadDiv<?php echo $image_uploadify_id; ?>').css('display', 'none');
				$('#swfUploadDiv<?php echo $image_uploadify_id; ?>').css('display', 'block');
			}
		}
		
		</script>
<?php if(!$image_uploadify_only_js) { ?>
        <div id="insertImgDiv<?php echo $image_uploadify_id; ?>" class="insertImgDiv">
		    <div id="swfUploadDiv<?php echo $image_uploadify_id; ?>">
			
			<input type="file" id="publisher_file<?php echo $image_uploadify_id; ?>" name="publisher_file<?php echo $image_uploadify_id; ?>" style="display:none;" />（可一次上传多图）
			</div>
		    <iframe id="imageUploadifyIframe<?php echo $image_uploadify_id; ?>" name="imageUploadifyIframe<?php echo $image_uploadify_id; ?>" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank" style="display:none;"></iframe>
		    <div id="normalUploadDiv<?php echo $image_uploadify_id; ?>" style="display:none;">
				<form id="normalUploadForm<?php echo $image_uploadify_id; ?>" method="post"  action="ajax.php?mod=uploadify&code=image&type=normal" enctype="multipart/form-data" target="imageUploadifyIframe<?php echo $image_uploadify_id; ?>" onsubmit="return normalUploadFormSubmit<?php echo $image_uploadify_id; ?>()">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
		    		<input type="hidden" name="image_uploadify_id" value="<?php echo $image_uploadify_id; ?>" />
		    		<input type="file" id="normalUploadFile<?php echo $image_uploadify_id; ?>" name="topic" />
		    		<input type="submit" value="上传" class="tul" />
		    	</form>
		    </div>
			<span id="uploading<?php echo $image_uploadify_id; ?>"></span>
			<div id="uploadDescDiv<?php echo $image_uploadify_id; ?>">
				<span style="display:none ">
				<input name="shoppingurl" type="text" id="shoppingurl" class="sc_r_t_a" style=" width:220px; display:inline;"/><br>
				（已支持以下网站：<a href="http://www.taobao.com/" rel="nofollow" target="_blank">淘宝</a>、<a href="http://www.tmall.com/" rel="nofollow" target="_blank">淘宝商城</a>、<a href="http://www.paipai.com/" rel="nofollow" target="_blank">拍拍</a>、<a href="http://www.lashou.com/" rel="nofollow" target="_blank">拉手</a>，请复制粘帖团购地址）
				<BR/>
				</span>
				<span class="fontRed">*</span> 如果您不能上传图片，可以<a href="javascript:;" onclick="imageUploadifyModuleSwitch<?php echo $image_uploadify_id; ?>();">点击这里</a>尝试<span id="uploadDescModuleSpan<?php echo $image_uploadify_id; ?>">普通</span>模式上传
<?php if('topic_longtext_info_ajax'==$image_uploadify_from) { ?>
				<br /><span class="fontRed">*</span> 图片上传成功后，可以点击图片将图片插入到您想要的位置
				
<?php } ?>
<!-- 
				<br />*可上传JPG、JPEG、GIF、PNG图片格式（小于2M）
				<br />*可直接将网上图片URL地址复制到发布框来发布
				-->
			</div>
	    </div>
		<div id="uploadifyQueueDiv<?php echo $image_uploadify_id; ?>" style="display:none;"></div>
        <div id="viewImgDiv<?php echo $image_uploadify_id; ?>" class="viewImgDiv">
        
<?php if((!$image_uploadify_new || $image_uploadify_modify) && $image_uploadify_topic['imageid']) { ?>
        	
        
<?php if(is_array($image_uploadify_topic['image_list'])) { foreach($image_uploadify_topic['image_list'] as $ik => $iv) { ?>
        	<script type="text/javascript"> __IMAGE_IDS__[<?php echo $ik; ?>] = <?php echo $ik; ?>; </script>
        	<span id="uploadImgSpan_<?php echo $ik; ?>">
	        	<img src="<?php echo $iv['image_small']; ?>" width="<?php echo $image_uploadify_image_small_size; ?>" />
	        	<a href="javascript:void(0);" onclick="imageUploadifyDelete<?php echo $image_uploadify_id; ?>('<?php echo $ik; ?>'); return false;" title="删除图片">×</a>
        	</span>
        
<?php } } ?>
        	
<?php } ?>
        </div>
        
<?php } ?>
	<!-- JS引用 结束 -->
	<div class="menu">
	<div class="menu_tq" ><b class="menu_tqb_c">商品</b>
	<div class="menu_tqb">
	    <div class="menu_pi insertImgDiv" id="insertImgDiv">
		    <div id="swfUploadDiv">
			第一步：传图片<input type="file" id="publisher_file" name="publisher_file" style="display:none;" />（可一次上传多图）
			</div>
		    <iframe id="imageUploadifyIframe" name="imageUploadifyIframe" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank" style="display:none;"></iframe>
		    <div id="normalUploadDiv" style="display:none;">
				<form id="normalUploadForm" method="post"  action="ajax.php?mod=uploadify&code=image&type=normal" enctype="multipart/form-data" target="imageUploadifyIframe" onsubmit="return normalUploadFormSubmit()">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
		    		<input type="file" id="normalUploadFile" name="topic" />
		    		<input type="submit" value="上传" class="tul" />
		    	</form>
		    </div>
		    <i class="menu_tqb_c1"><img src="templates/default/images/imgdel.gif" title="关闭" /></i>
			<em>
				第二步：添网址<input name="shoppingurl" type="text" id="shoppingurl"  style=" width:220px; display:inline;"/>
				<BR/>（已支持以下网站：<a href="http://www.taobao.com/" rel="nofollow" target="_blank">淘宝</a>、<a href="http://www.tmall.com/" rel="nofollow" target="_blank">淘宝商城</a>、<a href="http://www.paipai.com/" rel="nofollow" target="_blank">拍拍</a>、<a href="http://www.lashou.com/" rel="nofollow" target="_blank">拉手</a>）
				<BR/>
				第三步：点击右侧发布分享按钮，完成发布
				<BR/>
				1、如果您不能上传图片，可以<a href="javascript:;" onclick="imageUploadifyModuleSwitch();">点击这里</a>尝试<span id="uploadDescModuleSpan">普通</span>模式上传 ；<br />
				2、可上传JPG、JPEG、GIF、PNG图片格式（小于2M）；<BR/>
				
			</em>
			<span id="uploading"></span>
			
			<div class="viewImgDiv" id="viewImgDiv"></div>
		</div>
		<div id="uploadifyQueueDiv" style="display:none;"></div>		
	</div>
	</div>
	</div>
	<!-- 图片区块 结束 -->
	
		
	<div class="menu">
	<div class="menu_sp"><b class="menu_spb_c">视频</b>
	<div class="menu_spb" id="upload_ajax_video">
	<div class="menu_tb"><span style="float:left; padding-left:5px;">支持音乐和视频的站内播放</span><div class="menu_spb_c1"></div></div>
	<p class="menu_p">支持如下视频的站内播放：<a href="http://video.sina.com.cn/" rel="nofollow" target="_blank">新浪</a>、<a href="http://www.youku.com/" rel="nofollow" target="_blank">优酷</a>、<a href="http://v.blog.sohu.com/" rel="nofollow" target="_blank">搜狐</a>、<a href="http://www.ku6.com/" rel="nofollow" target="_blank">酷6</a>、<a href="http://www.tudou.com/" rel="nofollow" target="_blank">土豆</a>，请复制粘帖视频播放页url地址</p>
	  <div id="upload_video_list" class="menu_p" style="display:none;">
		<span id="return_ajax_video_title"></span>
		<span><img id="video_img" src="" width="130" /></span>
		<p>
		<input id="videoid" type="hidden" name="video_id" />
		<span><a href=""onclick="DelVideo('videoid','video_ajax'); return false;" title="删除视频">删除视频</a></span>
		</p>
	  </div>
	  <div id="add_video" class="menu_p" style=" margin-bottom:6px; padding-top:0">
	  <iframe id="upload_video_frame" name="upload_video_frame" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank"></iframe>
	   <form action="ajax.php?mod=topic&code=dovideo" method="post"  enctype="multipart/form-data" name="upload_video" id="upload_video" target="upload_video_frame">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
		<input name="url" type="text" id="url" class="sc_r_t_a" style=" width:220px; display:inline;"/>
		<input type="submit" name="Submit" value="提交" class="c_b1" />
	   </form>
	  </div>
	</div></div>
	</div>

	<div class="menu">
	<div class="menu_bq" id="editface" ><b class="menu_bqb_c"><a href="javascript:void(0);" onclick="topic_face('showface','i_already','topic_face');return false;">表情</a></b>
	<div id="showface" class="showface"></div>
	</div></div>

	<div class="menu" >
	<div class="menu_ht" id="button_<?php echo MEMBER_ID; ?>"><span onclick="get_tag_choose(<?php echo MEMBER_ID; ?>,'my_tag');return false;" class="menu_htb_c">话题</span>
	<div class="menu_htb"><div id="tag_<?php echo MEMBER_ID; ?>"></div></div>
	</div>
	</div>
<?php $vote_setting = ConfigHandler::get('vote'); ?>
<?php if($vote_setting['vote_open']) { ?>
	<div class="menu">
	<div class="menu_vs"><b class="menu_vsb_c">投票</b>
	<div class="menu_vsb">
	<div class="menu_vsbox">
	<p class="stitle">
	<b id="vote_content1" class="vhover" onclick="setTab('vote_content',1,3)">新的投票</b>
	<b id="vote_content2" onclick="setTab('vote_content',2,3);getMyVoteList(1);">我发起的投票</b>
	<b id="vote_content3" onclick="setTab('vote_content',3,3);getMyJoinList(1);">我参与的投票</b>
	<sub class="menu_vsb_c1"></sub>
	</p>
	
	<div class="vcontent" id="con_vote_content_1">
	<p>正在加载...</p>
	</div>
	<div class="vcontent vote_conLi" id="con_vote_content_2" style="display:none;">
	<p>正在加载...</p>
	</div>
	<div class="vcontent vote_conLi" id="con_vote_content_3" style="display:none;">
	<p>正在加载...</p>
	</div>
	
	</div>
	</div>
	</div>
	</div>
	
<?php } ?>
<!-- 
<?php $event_setting=ConfigHandler::get('event_setting') ?>
 -->
	<!-- 
<?php if($event_setting == 1) { ?>
 -->
	<div class="menu">
	<div class="menu_hd"><b class="menu_hdb_c">活动</b>
	<div class="menu_hdb">
	<div class="menu_hdbox">
	<p class="stitle">
	<b id="event_content1" class="vhover" onclick="setTab1('event_content',1,3)">新的活动</b>
	<b id="event_content2" onclick="setTab1('event_content',2,3);getMyEventList(1);">我发起的活动</b>
	<b id="event_content3" onclick="setTab1('event_content',3,3);getJoinEventList(1);">我参与的活动</b>
	<sub class="menu_hdb_c1"></sub>
	</p>
	
	<div class="vcontent" id="con_event_content_1">
	<p>正在加载...</p>
	</div>
	<div class="vcontent vote_conLi" id="con_event_content_2" style="display:none;">
	<p>正在加载...</p>
	</div>
	<div class="vcontent vote_conLi" id="con_event_content_3" style="display:none;">
	<p>正在加载...</p>
	</div>
	
	</div>
	</div>
	</div>
	</div>
	<!-- 
<?php } ?>
 -->
<?php $qun_setting = ConfigHandler::get('qun_setting'); ?>
<?php if($qun_setting['qun_open']) { ?>
	<!--微群 Begin-->
	<div class="menu">
		<div class="menu_wq">
			<b class="menu_wqb_c">微群</b>
			<div class="menu_wqb">
				<div class="menu_wqbox" style="width:210px;">
					<div class="menu_tb" style="width:210px;">
						<span style="float:left; padding-left:5px;">选择你要发布到的群</span>
						<sub class="menu_wqb_c1"></sub>
					</div>
					<div class="wcontent" id="wcontent_wp"></div>
				</div>
			</div>
		</div>
	</div>
	<!--微群 End-->
	
<?php } ?>
<!--长文 Begin-->
	<div class="menu">
		<div class="menu_cw">
			<b class="menu_cwb_c">长文</b>
			<div class="menu_cwb">
				<div class="menu_cwbox">
					<div class="menu_cwtb">
						<span style="float:left; padding-left:5px;">发布微博长文</span>
						<sub class="menu_cwb_c1"></sub>
					</div>
					<div class="wcontent" id="wcontent_cw"><p>正在加载...</p></div>
				</div>
			</div>
		</div>
	</div>
	<!--长文 End-->
	
	<!--分类 Begin 
<?php $fenlei_setting=ConfigHandler::get('fenlei_setting') ?>
<?php if($fenlei_setting == 1) { ?>
	<div class="menu">
		<div class="menu_x">
			<b class="menu_xb_c">分类</b>
			<div class="menu_xb">
				<div class="menu_xbox">
					<p class="stitle">
					<b id="vote2_content1" class="vhover2" onclick="setTab2('vote2_content',1,2)">新的分类</b>
					<b id="vote2_content2" onclick="setTab2('vote2_content',2,2);getMyFenleiList(1);">我发布的分类</b>
					<sub class="menu_xb_c1"></sub>
					</p>
					<div class="vcontent" id="con2_vote2_content_1">
					<p>正在加载...</p>
					</div>
					<div class="vcontent vote_conLi" id="con2_vote2_content_2" style="display:none;">
					<p>正在加载...</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php } ?>
 分类 End-->
	
	<?php echo $this->hookall_temp['global_publish_extra1']; ?>
</div>
<div class="box_4">
<?php if ($this->Get['mod'] == 'tag') $type = 'tagview' ;elseif ($this->Get['mod'] == 'member') $type = 'tohome';elseif ($this->Get['mod'] == 'vote') $type='app'; else $type = $params['code']; ?>

<?php $type = $type ? $type : $this->Code; ?>
<input type="button" class="indexBtn" id="publishSubmit" title="按Ctrl+Enter直接发布"/>
	
	<!--这边的判断主要是为了在应用中使用微博发布框-->
<?php if(!in_array($this->Get['mod'], array('qun'))) { ?>
		<div class="box_4_open" id="weibo_syn_wp">
<?php if($this->Config['sina_enable'] && sina_weibo_init()) { ?>
<?php echo sina_weibo_syn(); ?>
<?php } ?>

<?php if($this->Config['qqwb_enable'] && qqwb_init()) { ?>
<?php echo qqwb_syn(); ?>
<?php } ?>
</div>
<?php } else { ?><div class="box_4_open"><input id="chk_toweibo" type="checkbox" onclick="selectAppTopicType(this.id, {toid:'topic_type', defTopicType:'qun'})">分享到微博 
		<script language="javascript">
			$('#topic_type').val('qun');
		</script>
		</div>
	
<?php } ?>
</div>

</div>
</div>
<script type="text/javascript">		
		
		$(document).ready(function(){

			$("#i_already").bind('focus', function(){
			   $('#tigBox_2').css('visibility', 'visible');
			   var i=0;
			   setTimeout(function(){i+=1; $('#tigBox_2').css('visibility', 'hidden'); },5000);
			});
			
			$("#publishSubmit").bind('click',function() {
				publishSubmit('i_already',0,'<?php echo $type; ?>','topic_type','','',$('#mapp_item').val(),$('#mapp_item_id').val());
				return false;
			});


			initAiInput('i_already');
		});
		/*
		$("#i_already").bind('keydown',function(event) {
			event = event || window.event;
			if (event.keyCode == 13 && event.ctrlKey) {
				$("#publishSubmit").click();
			};
		});*/
</script>
    
<?php } else { ?>    
<?php $__my_link_='index.php?mod='.$member['username'];$__my_link_=get_invite_url($__my_link_,$this->Config['site_url']); ?>
<div class="member_list_top">
	   <div class="left_user_info">
		  <div class="avatar_left"><a href="index.php?mod=<?php echo $member['username']; ?>" title="">
		  <img src="<?php echo $member['face_original']; ?>" title="<?php echo $member['nickname']; ?>" width="128" height="128" onerror="javascript:faceError(this);" /></a>
		  </div>
		  <div class="avatar2_info">
			 <p class="left_t_nick_name">
			 <strong title="<?php echo $member['nickname']; ?>"><?php echo $member['nickname']; ?><?php echo $member['validate_html']; ?> </strong>
			 
<?php if($this->Config['level_radio']) { ?>
					<a href="index.php?mod=settings&code=exp" target="_blank" class="ico_level wbL<?php echo $member['level']; ?>"><em><?php echo $member['level']; ?></em></a>
			 
<?php } ?>
 </strong>
			 <a href="javascript:void(0)" onclick="follower_choose(<?php echo $member['uid']; ?>,'<?php echo $member['nickname']; ?>','at','');">(@<?php echo $member['nickname']; ?>)</a>
			  <!--备注-->
			  <span id="remarklist_<?php echo $member['uid']; ?>"><?php echo $buddys['remark']; ?></span>
			  <!--备注-->
			 
			   
<?php if($member['gender'] == 1) { ?>
			  <img src="templates/default/images/user.gif"  title="男"/>
			  
<?php } else { ?>  <img src="templates/default/images/user_female.gif"  title="女"/>
			  
<?php } ?>
 
			  </p>
			 <p class="left_t2"><a href="index.php?mod=<?php echo $member['username']; ?>"><?php echo $__my_link_; ?></a></p>
			 <p class="left_t2"><?php echo $member['from_area']; ?> 
<?php if($member['credits']) { ?>
 积分：<a href="index.php?mod=settings&code=extcredits&op=rule" title="点击查看获取积分的方法"><b><?php echo $member['credits']; ?></b></a>
<?php } ?>
</p>
<?php if($member['aboutme']) { ?>
			<p class="left_t2">简介：
<?php $aboutme = cut_str($member['aboutme'],50); ?>
<span title="简介：<?php echo $member['aboutme']; ?>"><?php echo $aboutme; ?></span></p>
			
<?php } ?>
<!-- 关注 拉黑 等操作选项-->
                
<?php if(MEMBER_ID && MEMBER_ID!=$member['uid']) { ?>
				<div id="topic_index_blacklist_<?php echo $member['uid']; ?>">
<?php if($member['uid'] == $list_blacklist['touid']) { ?>
						<div class="blacklist">
							他在你的黑名单里 <a href="javascript:void(0)" onclick="follower_choose(<?php echo $member['uid']; ?>,'<?php echo $member['nickname']; ?>','del','topic_black_ajax');"> [取消拉黑] </a>
						</div>
<?php } else { ?><div class="dialogue">
						 <?php echo $member['follow_html']; ?>
						 <span>
						 <!--判断是否是好友-->
						 
<?php if($buddys) { ?>
							 | <a href="javascript:void(0)" onclick="follower_choose(<?php echo $member['uid']; ?>,'','lahei','topic_black_ajax');">拉黑</a> |
							 <a href="javascript:void(0)" onclick="get_group_choose(<?php echo $member['uid']; ?>);">分组</a> |
							 <a href="javascript:void(0)" onclick="get_remark(<?php echo $member['uid']; ?>);return false;">备注</a> |
							 <a href="javascript:void(0)" onclick="follower_choose(<?php echo $member['uid']; ?>,'<?php echo $member['nickname']; ?>','buddys','');">推荐给朋友</a> |
							 
<?php } ?>
 	
							 <a href="javascript:void(0)" onclick="PmSend(<?php echo $member['uid']; ?>,'<?php echo $member['nickname']; ?>');return false;" >私信</a>
						 <!--判断是否是好友-->
						 </span>
						</div>
					
						<div id="Pmsend_to_user_area"></div>
						<div id="alert_follower_menu_<?php echo $member['uid']; ?>"></div>
						<span id="button_<?php echo $member['uid']; ?>" onclick="get_group_choose(<?php echo $member['uid']; ?>);"></span>
						<div id="global_select_<?php echo $member['uid']; ?>" class="alertBox" style="display:none"></div>
						<div id="get_remark_<?php echo $member['uid']; ?>" ></div>
					
<?php } ?>
</div> 
				
<?php } ?>
 
			<!-- 关注 拉黑 等操作选项-->
			<?php echo $this->hookall_temp['global_usernav_extra1']; ?>
			</div>
	   </div>
	</div>
<?php } ?>
<div style="width:560px; margin:0 auto 8px; overflow:hidden">
<script language="Javascript">
function listTopic( s , lh ) {	
	var s = 'undefined' == typeof(s) ? 0 : s;
	var lh = 'undefined' == typeof(lh) ? 1 : lh;
	if(lh) {
		window.location.hash="#listTopicArea";
	}
    $("#listTopicMsgArea").html("<div><center><span class='loading'>内容正在加载中，请稍候……</span></center></div>");
	var myAjax = $.post(
		"ajax.php?mod=topic&code=list",
		{
<?php if(is_array($params)) { foreach($params as $k => $v) { ?>
<?php echo $k; ?>:"<?php echo $v; ?>",
<?php } } ?>
start:s
		},
		function (d) {
			$("#listTopicMsgArea").html('');
			$("#listTopicArea").html(d);			
		}
	); 
}
</script>
<!--幻灯广告-->
<?php if($this->Config['slide_enable'] && ($slide_config=ConfigHandler::get('slide')) && $slide_config['enable'] && $slide_config['list']) { ?>
	<script src="templates/default/js/kinslideshow.js" type="text/javascript"></script>
	<script type="text/javascript">
	$(function(){
		$("#KinSlideshow").KinSlideshow({
		moveStyle:"down",			//切换方向 可选值：【 left | right | up | down 】
		intervalTime:3,   			//设置间隔时间为5秒 【单位：秒】 [默认为5秒]
		moveSpeedTime:400 , 		//切换一张图片所需时间，【单位：毫秒】[默认为400毫秒]
		isHasTitleFont:false,		//是否显示标题文字 可选值：【 true | false 】
		isHasTitleBar:false,		//是否显示标题背景 可选值：【 true | false 】[默认为true]	
		//标题文字样式，(isHasTitleFont = true 前提下启用)  
		titleBar:{titleBar_height:30,titleBar_bgColor:"#08355c",titleBar_alpha:0.3},
		titleFont:{TitleFont_size:12,TitleFont_color:"#FFFFFF",TitleFont_weight:"normal"},
		//按钮样式设置，(isHasBtn = true 前提下启用) 
		btn:{btn_bgColor:"#FFFFFF",btn_bgHoverColor:"#1072aa",btn_fontColor:"#000000",btn_fontHoverColor:"#FFFFFF",btn_borderColor:"#cccccc",btn_borderHoverColor:"#1188c0",btn_borderWidth:1}
		});
	})
	</script>
	<div id="KinSlideshow" style="visibility:hidden;">
<?php if(is_array($slide_config['list'])) { foreach($slide_config['list'] as $_v) { ?>
        <a href="<?php echo $_v['href']; ?>" target="_blank"><img src="<?php echo $_v['src']; ?>" alt="" width="560" height="100" /></a>
	
<?php } } ?>
    </div>
<?php } ?>
<!--幻灯广告-->

</div>

 <div class="listBox">
	 
<?php if(in_array($this->Code,array('myhome','tag','qun','recd','other')) || $this->Get['gid'] !='') { ?>
	<div class="TopicMan s_fixed">
		<div class="nfTagB">
			<ul> 
				<!--我关注的人 Begin--> 
<?php if($this->Code == 'myhome') $myhome= "current"; ?>
<li class="<?php echo $myhome; ?>">
					<span id="follow_menu_wp">
						<a href="index.php?mod=topic&code=myhome" title="我和我关注的人">我关注的人</a>
					</span>
				</li>
				<!--我关注的人 End--> 
<?php $qun_setting = ConfigHandler::get('qun_setting'); ?>
<?php if($qun_setting['qun_open']) { ?>
				<!--我的微群 Begin-->
<?php if($this->Code == 'qun') $qun= "current"; ?>
<li class="<?php echo $qun; ?>">
					<span id="qun_menu_wp">
							<a href="index.php?mod=topic&code=qun" title="我的微群" class="wp_id">我的微群</a>
					</span>
				</li>
				<!--我的微群 End-->
				
<?php } ?>
<?php if($this->Code == 'tag') $tag= "current"; ?>
<li class="<?php echo $tag; ?>">
					<span><a href="index.php?mod=topic&code=tag" title="我关注的话题">我关注的话题</a></span>
				</li>
<?php if($this->Code == 'recd') $recd= "current"; ?>
<li class="<?php echo $recd; ?>">
					<span><a href="index.php?mod=topic&code=recd" title="今日推荐">今日推荐</a><em class="navNew"></em></span>
				</li>
				<script type="text/javascript">
				 $(document).ready(function(){
				 $("#follow_m_1").mouseover(function(){$("#follow_morelist").show();});
				 $("#follow_m_1").mouseout(function(){$("#follow_morelist").hide();});
				 $("#follow_m_2").mouseover(function(){$("#sel_morelist").show();});
				 $("#follow_m_2").mouseout(function(){$("#sel_morelist").hide();});
			     });
				</script>
				<?php echo $this->hookall_temp['global_index_extra1']; ?>
			</ul>
			<div class="clear"></div>
		</div>
		<div class="nfBox index_m">
		  <div class="left">
			  
<?php if($this->Code=='qun' || $this->Code=='tag') { ?>
			  	  <!--群和话题筛选 Begin-->
				  <a title="查看最近更新的微博" href="index.php?mod=topic&code=<?php echo $this->Code; ?>&view=new" class="<?php echo $active['new']; ?>">最新微博</a>
				  <a title="查看最新的评论" href="index.php?mod=topic&code=<?php echo $this->Code; ?>&view=new_reply" class="<?php echo $active['new_reply']; ?>">最新评论</a>
				  <a title="热门推荐" href="index.php?mod=topic&code=<?php echo $this->Code; ?>&view=recd" class="<?php echo $active['recd']; ?>">今日推荐</a>
				  <!--群和话题筛选 End-->
			  <?php } elseif($this->Code=='other') { ?>  <a title="我关注的活动" href="index.php?mod=topic&code=<?php echo $this->Code; ?>&view=event" class="<?php echo $active['event']; ?>">我关注的活动</a>

			  <?php } elseif($this->Code=='myhome') { ?>  	  <!--我关注的 Begin-->
				  <a href="index.php?mod=topic&code=myhome" title="" class="<?php echo $active['all']; ?>">全部</a>
				  
<?php if(!empty($grouplist2)) { ?>
					  
<?php if($grouplist2) { ?>
<?php if(is_array($grouplist2)) { foreach($grouplist2 as $group) { ?>
							<a title="<?php echo $group['group_name']; ?>" href="index.php?mod=topic&code=<?php echo $this->Code; ?>&gid=<?php echo $group['id']; ?>" class="<?php echo $active[$group['id']]; ?>"><?php echo $group['group_name']; ?></a>
						
<?php } } ?>
  
<?php } ?>
  
<?php if($group_count <= $cut_num) { ?>
					  			<a href="javascript:;" onclick="showFollowGroupAddDialog();" title="">添加分组</a>
					  
<?php } else { ?>  <span id="follow_m_1"><a href="index.php?mod=topic&code=myhome" >更多</a>
							  <ul class="index_ml" id="follow_morelist">
<?php $__no_del_group=true; ?>
<li>
<?php if(is_array($group_list)) { foreach($group_list as $group) { ?>
<dl class="ml_dl" id="del_group_ajax_<?php echo $group['id']; ?>">
<dd>
<?php if($touid) { ?>
<input id="select_<?php echo $val['uid']; ?>_<?php echo $group['id']; ?>" name="group" type="checkbox" onclick="groupState(<?php echo $group['id']; ?>,'<?php echo $touid; ?>',this);return false;"/>
<?php } ?>
<?php if($this->Code == 'follow') $urlcode = 'follow'; else $urlcode = 'myhome'; ?>
 
<a href="index.php?mod=topic&code=<?php echo $urlcode; ?>&gid=<?php echo $group['id']; ?>" title="成员人数：<?php echo $group['group_count']; ?>"><?php echo $group['group_name']; ?></a> 
</dd>
<dt>(<?php echo $group['group_count']; ?>)<a onclick="del_group('<?php echo $group['id']; ?>','<?php echo $touid; ?>');return false;" href="javascript:;" title="删除分组" style="float:none;">×</a></dt>
</dl>
<?php } } ?></li>
								<li class="B_linedot"></li>
								<li class="slA"><a href="javascript:void(0)" onclick="showFollowGroupAddDialog();">添加分组</a></li>
								<li class="slM"><a href="index.php?mod=<?php echo $member['username']; ?>&code=follow">管理分组</a></li>
							  </ul>
							  </span>
					  
<?php } ?>
  
<?php } else { ?>  <a href="javascript:;" onclick="showFollowGroupAddDialog();" title="">添加分组</a>
				  
<?php } ?>
  <!--我关注的 End-->
			  <?php } elseif($this->Code=='recd') { ?>  	<a title="查看最今日推荐" href="index.php?mod=topic&code=recd" class="<?php echo $active['all']; ?>">全部</a>
				<a title="查看最新的评论" href="index.php?mod=topic&code=recd&view=new_reply" class="<?php echo $active['new_reply']; ?>">最新评论</a>
			  
<?php } ?>
  </div>
		  <?php echo $this->hookall_temp['global_index_extra2']; ?>
		  
<?php $filter_ary = array(
				'all' => array('name'=>'全部','tips' => '查看全部微博'),
				'pic' => array('name'=>'图片','tips' => '含图片'),
				'video' => array('name'=>'视频','tips' => '含视频'),
				'music' => array('name'=>'音乐','tips' => '含音乐'),
				'vote' => array('name'=>'投票','tips' => '含投票'),
				'event' => array('name'=>'活动','tips' => '含活动'),
				'longtext' => array('name'=>'长文','tips' => '含长文'),
			);
			 ?>

<?php if($this->Code=='qun')unset($filter_ary['vote']); ?>

<?php $_fkey = empty($this->Get['type']) ? 'all' : $this->Get['type']; ?>

<?php !isset($filter_ary[$_fkey]) && $_fkey = 'all'; ?>
  <div class="right">
		  	<div style="float:left">筛选：</div>
			  <span id="follow_m_2"><a href="<?php echo $type_url; ?>&type=<?php echo $_fkey; ?>" ><?php echo $filter_ary[$_fkey]['name']; ?></a>
			  <ul class="index_ml index_ml_2" id="sel_morelist">
			  
<?php if(is_array($filter_ary)) { foreach($filter_ary as $key => $f) { ?>
<?php if($key != $_fkey) { ?>
			  			<li><a title="<?php echo $f['tips']; ?>" href="<?php echo $type_url; ?>&type=<?php echo $key; ?>" ><?php echo $f['name']; ?></a></li>
					
<?php } ?>
<?php } } ?>
  </ul>
			  </span>
			<div class="clear"></div>
		  </div>

	  	  <div class="clear"></div>
		</div>
<?php if($this->Code=='other') { ?>
		<div class="nfBox index_m">
		  <div class="left">
	  		<ul>
	  		  <li>
	  		  
<?php if($view == 'event') { ?>
	      	    
<?php if($favorite_event) { ?>
	  		      <!-- 
<?php if(is_array($favorite_event)) { foreach($favorite_event as $key => $val) { ?>
 -->
	  		      <span id="event_<?php echo $key; ?>"><a href="javascript:void(0);"><?php echo $val; ?></a><a title="取消关注" onclick="favoriteEvent('delete',<?php echo $key; ?>);return false;" href="javascript:void(0);">x</a></span>
	  		      <!-- 
<?php } } ?>
 -->
	  	  	    
<?php } ?>
  	  <span class="thread_add">
			  	    <a onclick="document.getElementById('add_favorite_event').style.display=(document.getElementById('add_favorite_event').style.display=='none')?'':'none'" href="javascript:void(0);">加关注活动</a>
			  	  </span>
			  	  <div id="add_favorite_event" style="display:none">
			  
<?php if($event_sort_list) { ?>
			  	  <?php echo $event_sort_list; ?>
			  	  <input class="c_b1" type="button" value="保存" onclick="favoriteEvent('add',document.getElementById('event').value);" name="button">
			  
<?php } else { ?>  	  没有新活动类型可以选择
			  	
<?php } ?>
  	  </div>
			  <?php } elseif($view == 'fenlei') { ?>      	    
<?php if($favorite_fenlei) { ?>
	  		    <!-- 
<?php if(is_array($favorite_fenlei)) { foreach($favorite_fenlei as $key => $val) { ?>
 -->
	  		    <span id="fenlei_<?php echo $key; ?>"><a href="javascript:void(0);"><?php echo $val; ?></a><a title="取消关注" onclick="favoriteFenlei('delete',<?php echo $key; ?>);return false;" href="javascript:void(0);">x</a></span>
	  		    <!-- 
<?php } } ?>
 -->
	  	  	    
<?php } ?>
  	  <span class="thread_add">
			  	    <a onclick="document.getElementById('add_favorite_fenlei').style.display=(document.getElementById('add_favorite_fenlei').style.display=='none')?'':'none'" href="javascript:void(0);">加关注分类</a>
			  	  </span>
			  	  <div id="add_favorite_fenlei" style="display:none">
			  	  
<?php if($fenlei_sort_list) { ?>
			  	  <?php echo $fenlei_sort_list; ?>
			  	  <input class="c_b1" type="button" value="保存" onclick="favoriteFenlei('add',document.getElementById('fenlei').value);" name="button">
			  
<?php } else { ?>  	  没有新分类可以选择
			  	
<?php } ?>
  	  </div>
			  
<?php } ?>
  		  </li>
	  		</ul>
	  	  <script type="text/javascript">
			function favoriteEvent(act,id){
				var myAjax=$.post
				(
						"ajax.php?mod=topic&code=favor_event",
						{
							id:id,
							act:act
						},
						function(d)
						{
							location.reload();
						}
				);
			}

			function favoriteFenlei(act,id){
				var myAjax=$.post
				(
						"ajax.php?mod=topic&code=favor_fenlei",
						{
							id:id,
							act:act
						},
						function(d)
						{
							location.reload();
						}
				);
			}
		  </script>
		  </div>
		</div>
		
<?php } ?>
</div>
	
<?php } ?>
<?php if(MEMBER_ID == $member['uid']) $_my = '我'; else $_my = $member['nickname']; ?>
     
<?php if($params['code'] == myblog and $this->Get['keyword'] == '') { ?>
	  <div class="listBoxNav">
	   <div class="nleftL">
	  	<li style="float:left; font-weight:600; color:#333;">&nbsp;<?php echo $_my; ?>的微博</li> 
		<li class="liR2"> 
		  
<?php if($params['code'] == 'myblog' and $this->Get['type'] == '') { ?>
		  <span class="liL_5"><a href="index.php?mod=<?php echo $member['username']; ?>">全部</a></span> |
		  
<?php } else { ?>  <span><a href="index.php?mod=<?php echo $member['username']; ?>">全部</a></span> |
		   
<?php } ?>
  
<?php if('my_reply' == $this->Get['type']) { ?>
		   <span class="liL_2"><a href="index.php?mod=<?php echo $member['username']; ?>&type=my_reply">TA评论的</a></span>
		  
<?php } else { ?>   <span><a href="index.php?mod=<?php echo $member['username']; ?>&type=my_reply">TA评论的</a></span>
		  
<?php } ?>
</li>
		<?php echo $this->hookall_temp['global_index_extra2']; ?>
	   </div>
	   </div>
	  
<?php } ?>
      
<?php if(in_array($this->Code,array('myfavorite','favoritemy'))) { ?>
	  <div class="listBoxNav">
      <ul class="nleftL">
        
<?php if('myfavorite'==$this-> Code) { ?>
        <li class="liL_2"><a href="index.php?mod=topic&code=myfavorite" class="cWhite">我的收藏</a></li>
        
<?php } else { ?>        <li><a href="index.php?mod=topic&code=myfavorite" >我的收藏</a></li>
        
<?php } ?>
        <li class="liLine">|</li>
        
<?php if('favoritemy'==$this-> Code) { ?>
        <li class="liL_2"><a href="index.php?mod=topic&code=favoritemy" class="cWhite">收藏我的</a></li>
        
<?php } else { ?>        <li><a href="index.php?mod=topic&code=favoritemy">收藏我的</a></li>
        
<?php } ?>
      </ul>
	  <?php echo $this->hookall_temp['global_index_extra3']; ?>
	  </div>
      
<?php } ?>
  
<?php if(in_array($this->Code,array('mycomment','tocomment'))) { ?>
	  <div class="listBoxNav">
	   <ul class="nleftL">
	   
<?php if('mycomment' == $this->Code) { ?>
        <li class="liL_2"><a href="index.php?mod=topic&code=mycomment" class="cWhite">评论我的</a></li>
        
<?php } else { ?>        <li><a href="index.php?mod=topic&code=mycomment" >评论我的</a></li>
        
<?php } ?>
        <li class="liLine">|</li>
        
<?php if('tocomment'== $this->Code) { ?>
        <li class="liL_2"><a href="index.php?mod=topic&code=tocomment" class="cWhite">我评论的</a></li>
        
<?php } else { ?>        <li><a href="index.php?mod=topic&code=tocomment">我评论的</a></li>
        
<?php } ?>
   </ul>
	   <?php echo $this->hookall_temp['global_index_extra4']; ?>
	   </div>
	   
<?php } ?>
  <div id="ajax_reminded"></div>
	
	 <div id="listTopicMsgArea"></div>
      <div id="listTopicArea">
	  	<!--微博列表 Begin--><div class="Listmain">
	<div class="mBlog_linedot"></div>
          
<?php if($topic_list) { ?>
		  
<?php if('favoritemy'==$this->Code) { ?>
			
				<!--收藏我的列表 Begin-->
<?php if(is_array($topic_list)) { foreach($topic_list as $val) { ?>
<?php $counts++; ?>
<script type="text/javascript">
						$(document).ready(function(){
							var objStr = "#topic_lists_<?php echo $val['tid']; ?>";
							$(objStr).mouseover(function(){$(objStr + " i").show();});
							$(objStr).mouseout(function(){$(objStr + " i").hide();});
						});
					</script>
					<div class="feedCell" id="topic_list_<?php echo $val['tid']; ?>"><div class="avatar">
	<a href="index.php?mod=<?php echo $favorite_members[$val['fuid']]['username']; ?>">
		<img onerror="javascript:faceError(this);" src="<?php echo $favorite_members[$val['fuid']]['face']; ?>" />
	</a>
</div>
<div class="Contant">
	<div id="topic_lists_<?php echo $val['tid']; ?>" style="_overflow:hidden;">
		<div class="oriTxt">
			<p>
				<a title="<?php echo $val['username']; ?>" href="index.php?mod=<?php echo $favorite_members[$val['fuid']]['username']; ?>">		 										<?php echo $favorite_members[$val['fuid']]['nickname']; ?>
				</a>
				<?php echo $favorite_members[$val['fuid']]['validate_html']; ?>：
				<span style="color:#666; font-size:12px;">收藏于<?php echo $val['favorite_time']; ?></span>
			</p>
		</div>
		<div class="blogTxt">
			<div class="top"></div>
			<div class="mid">
				<span>
					<a href="index.php?mod=<?php echo $val['username']; ?>">
						<?php echo $val['nickname']; ?>
					</a><?php echo $val['validate_html']; ?>:<?php echo $val['content']; ?>
				</span><!--Shopping Begin-->
<?php if(!empty($val['ShoppingTypeLogo'])) { ?>
<div class="artZoomtop" style="display:none ">
	<img src="<?php echo $val['ShoppingTypeLogo']; ?>" width="16" height="16" align="absmiddle" />
	<a target="_blank" href="#" style="display:none ">title</a>
	<span class="price"><i>¥</i><?php echo $val['ShoppingPrice']; ?></span>
	<a class="buy_url" target="_blank" href="<?php echo $val['ShoppingUrl']; ?>"></a>
</div>
<?php } ?>
      

<!--Shopping End-->
<?php if($val['imageid'] && $val['image_list']) { ?>
<?php $val['image_key']=$val['tid'].'_'.random(6); ?>
<ul class="imgList" id="image_area_<?php echo $val['image_key']; ?>">
	  
<?php if(is_array($val['image_list'])) { foreach($val['image_list'] as $iv) { ?>
	  <li><a href="<?php echo $iv['image_original']; ?>" class="artZoomAll" topicId="<?php echo $val['tid']; ?>" rel="<?php echo $iv['image_small']; ?>" rev="<?php echo $val['image_key']; ?>" shoppingUrl="<?php echo $val['ShoppingUrl']; ?>" shoppingPrice="<?php echo $val['ShoppingPrice']; ?>" shoppingTypeLogo="<?php echo $val['ShoppingTypeLogo']; ?>"><img style="width:<?php echo $this->Config['thumbwidth']; ?>px; height:<?php echo $this->Config['thumbheight']; ?>px;" src="<?php echo $iv['image_small']; ?>" /></a></li>
	  
<?php } } ?>
</ul>
<?php } ?>
<!--投票 Begin-->
<?php if($val['is_vote'] > 0) { ?>
<?php $val['vote_key']=$val['tid'].'_'.$val['random'] ?>
<ul class="imgList" id="vote_detail_<?php echo $val['vote_key']; ?>">
		  <li><a href="javascript:;" onclick="getVoteDetailWidgets('<?php echo $val['vote_key']; ?>', <?php echo $val['is_vote']; ?>);"><img src='./images/vote_pic_01.gif'/></a> </li>
		</ul>
		<div id="vote_area_<?php echo $val['vote_key']; ?>" style="display:none;">
			<div class="blogTxt"> 
				<div class="top"></div> 
				<div class="mid" id="vote_content_<?php echo $val['vote_key']; ?>"> 
				</div> 
				<div class="bottom"></div> 
			</div>
		</div>
	
<?php } ?>
              
<!--投票 End-->
<?php if($val['videoid'] and $this->Config['video_status']) { ?>
<div class="feedUservideo"><a onClick="javascript:showFlash('<?php echo $val['VideoHosts']; ?>', '<?php echo $val['VideoLink']; ?>', this, '<?php echo $val['VideoID']; ?>','<?php echo $val['VideoUrl']; ?>');" >
  <div id="play_<?php echo $val['VideoID']; ?>" class="vP"><img src="images/feedvideoplay.gif"  /></div>
  <img src="<?php echo $val['VideoImg']; ?>" style="border:none"/> </a></div>
<?php } ?>

<?php if($val['musicid']) { ?>
<div class="feedUserImg"><div id="play_<?php echo $val['MusicID']; ?>"></div><img src="images/music.gif" title="点击播放音乐" onClick="javascript:showFlash('music', '<?php echo $val['MusicUrl']; ?>', this, '<?php echo $val['MusicID']; ?>');" style="cursor:pointer; border:none;" /> </div>
<?php } ?>
				
				<a href="index.php?mod=topic&code=<?php echo $val['tid']; ?>" target="_blank">原文评论
<?php if($val['replys']) { ?>
				（<?php echo $val['replys']; ?>）
				
<?php } ?>
</a>
			</div>
			<div class="bottom"></div>
		</div>
		<div class="from">
			<span class="option"></span> 
			<span class="mycome"></span> 
		</div>
	</div>
	<div id="reply_area_<?php echo $val['tid']; ?>"></div>
	<!--编辑微博-->
	<div id="modify_topic_<?php echo $val['tid']; ?>"></div>
	<!--编辑微博-->
</div>
<div class="mBlog_linedot"></div>	
					</div>
				
<?php } } ?>
  		<!--收藏我的列表 End-->
		  
          
<?php } else { ?>  	<!--微博列表 Begin-->
<?php if(is_array($topic_list)) { foreach($topic_list as $val) { ?>
<?php $counts++; ?>
<div class="feedCell" id="topic_list_<?php echo $val['tid']; ?>">
<?php if($this->Config['ad_enable']) { ?>
<?php if($counts == 3 && $this->Config['ad']['ad_list']['group_myhome']['middle_center']) { ?>
							<div class="L_AD"><?php echo $this->Config['ad']['ad_list']['group_myhome']['middle_center']; ?></div>
						
<?php } ?>

<?php if($counts == 10 && $this->Config['ad']['ad_list']['group_myhome']['middle_center1']) { ?>
							<div class="L_AD"><?php echo $this->Config['ad']['ad_list']['group_myhome']['middle_center1']; ?></div>
						
<?php } ?>
<?php } ?>
<div class="wb_l_face">
<div class="avatar">
<?php if($this->Code != '') { ?>
<?php if(MEMBER_ID != $val['uid']) { ?>
<a href="javascript:void(0)" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user',<?php echo $val['tid']; ?>);" onmouseout="clear_user_choose();"><img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" /></a>
<?php } else { ?><img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" />
<?php } ?>
<?php } else { ?><a href="index.php?mod=<?php echo $val['username']; ?>"><img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" /></a>
<?php } ?>
</div>


</div>


<!--悬浮头像、弹出对话框-->
<div id="user_<?php echo $val['tid']; ?>_user"></div>
<!--悬浮头像、弹出对话框-->

<!--私信对话框-->
<div id="Pmsend_to_user_area" style="width:430px;" style="display:none"></div>
<!--私信对话框-->

<!--AT、拉黑对话框-->
<div id="alert_follower_menu_<?php echo $val['uid']; ?>" style="display:none"></div>
<!--AT、拉黑对话框-->

<div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);" style="display:none"></div>

<!--分组对话框-->
<div id="global_select_<?php echo $val['uid']; ?>" class="alertBox" style="display:none"></div>
<!--分组对话框-->

<!--备注对话框-->
<div id="get_remark_<?php echo $val['uid']; ?>" style="display:none"></div>
<!--备注对话框-->


<!--微博内容中 @用户 悬浮提示-->
<div id="at_<?php echo $val['tid']; ?>_user" class="at_style" style="display:none;"></div>
<!--微博内容中 @用户 悬浮提示-->
<div class="Contant">
	<div id="topic_lists_<?php echo $val['tid']; ?>" style="_overflow:hidden">
		<div class="oriTxt">
<?php if('myfavorite'==$this->Code && $val['favorite_time']) { ?>
				<p style="color:#666; font-size:12px;">收藏于：<?php echo $val['favorite_time']; ?></p>
			
<?php } ?>
  
			<p class="utitle">
				<!--个人签名文件--><span class="un">

<a title="点此查看<?php echo $val['nickname']; ?>的微博(@<?php echo $val['nickname']; ?>)" href="index.php?mod=<?php echo $val['username']; ?>" ><?php echo $val['nickname']; ?></a>
<?php if($val['validate_html']) { ?>
<?php echo $val['validate_html']; ?>&nbsp;
<?php } else { ?>
<?php if($this->Config['topic_level_radio']) { ?>
<span class="wb_l_level">
<a href="index.php?mod=settings&code=exp" target="_blank" class="ico_level wbL<?php echo $val['level']; ?>"><em><?php echo $val['level']; ?></em></a>
</span>
<?php } ?>
<?php } ?>
<?php if($this->Config['is_signature']) { ?>
<?php if(!$_GET['mod_original']) { ?>
<?php if($val['signature']) { ?>
<span class="signature">
<?php if($val['uid'] == MEMBER_ID ||  'admin' == MEMBER_ROLE_TYPE) { ?>
<a href="javascript:void(0);" onclick="follower_choose(<?php echo $val['uid']; ?>,'<?php echo $val['nickname']; ?>','topic_signature');" title="点击修改个人签名">
<em ectype="user_signature_ajax_<?php echo $val['uid']; ?>">(<?php echo $val['signature']; ?>)</em>
</a>
<?php } else { ?><em>(<?php echo $val['signature']; ?>)</em>
<?php } ?>
</span>
<?php } ?>
<?php } ?>
<?php } ?>
<?php echo $this->hookall_temp['global_topiclist_extra1']; ?>
</span>
<?php echo $this->hookall_temp['global_topiclist_extra2']; ?>
				<!--个人签名文件-->
				<span class="ut"><a href="index.php?mod=topic&code=<?php echo $val['tid']; ?>" target="_blank"><?php echo $val['dateline']; ?> </a></span>
			</p><!--Shopping Begin-->
<?php if(!empty($val['ShoppingTypeLogo'])) { ?>
<div class="artZoomtop" style="display:none ">
	<img src="<?php echo $val['ShoppingTypeLogo']; ?>" width="16" height="16" align="absmiddle" />
	<a target="_blank" href="#" style="display:none ">title</a>
	<span class="price"><i>¥</i><?php echo $val['ShoppingPrice']; ?></span>
	<a class="buy_url" target="_blank" href="<?php echo $val['ShoppingUrl']; ?>"></a>
</div>
<?php } ?>
      

<!--Shopping End-->
<?php if($val['imageid'] && $val['image_list']) { ?>
<?php $val['image_key']=$val['tid'].'_'.random(6); ?>
<ul class="imgList" id="image_area_<?php echo $val['image_key']; ?>">
	  
<?php if(is_array($val['image_list'])) { foreach($val['image_list'] as $iv) { ?>
	  <li><a href="<?php echo $iv['image_original']; ?>" class="artZoomAll" topicId="<?php echo $val['tid']; ?>" rel="<?php echo $iv['image_small']; ?>" rev="<?php echo $val['image_key']; ?>" shoppingUrl="<?php echo $val['ShoppingUrl']; ?>" shoppingPrice="<?php echo $val['ShoppingPrice']; ?>" shoppingTypeLogo="<?php echo $val['ShoppingTypeLogo']; ?>"><img style="width:<?php echo $this->Config['thumbwidth']; ?>px; height:<?php echo $this->Config['thumbheight']; ?>px;" src="<?php echo $iv['image_small']; ?>" /></a></li>
	  
<?php } } ?>
</ul>
<?php } ?>
			<span id="topic_content_<?php echo $val['tid']; ?>_short"><?php echo $val['content']; ?></span>
			<span id="topic_content_<?php echo $val['tid']; ?>_full"></span>
<?php if($val['longtextid'] > 0) { ?>
				<span>
				<a href="javascript:;" onclick="view_longtext('<?php echo $val['longtextid']; ?>', '<?php echo $val['tid']; ?>', this);return false;">查看全文</a>
				</span>
			
<?php } ?>
<!--投票 Begin-->
<?php if($val['is_vote'] > 0) { ?>
<?php $val['vote_key']=$val['tid'].'_'.$val['random'] ?>
<ul class="imgList" id="vote_detail_<?php echo $val['vote_key']; ?>">
		  <li><a href="javascript:;" onclick="getVoteDetailWidgets('<?php echo $val['vote_key']; ?>', <?php echo $val['is_vote']; ?>);"><img src='./images/vote_pic_01.gif'/></a> </li>
		</ul>
		<div id="vote_area_<?php echo $val['vote_key']; ?>" style="display:none;">
			<div class="blogTxt"> 
				<div class="top"></div> 
				<div class="mid" id="vote_content_<?php echo $val['vote_key']; ?>"> 
				</div> 
				<div class="bottom"></div> 
			</div>
		</div>
	
<?php } ?>
              
<!--投票 End-->
<?php if($val['videoid'] and $this->Config['video_status']) { ?>
<div class="feedUservideo"><a onClick="javascript:showFlash('<?php echo $val['VideoHosts']; ?>', '<?php echo $val['VideoLink']; ?>', this, '<?php echo $val['VideoID']; ?>','<?php echo $val['VideoUrl']; ?>');" >
  <div id="play_<?php echo $val['VideoID']; ?>" class="vP"><img src="images/feedvideoplay.gif"  /></div>
  <img src="<?php echo $val['VideoImg']; ?>" style="border:none"/> </a></div>
<?php } ?>

<?php if($val['musicid']) { ?>
<div class="feedUserImg"><div id="play_<?php echo $val['MusicID']; ?>"></div><img src="images/music.gif" title="点击播放音乐" onClick="javascript:showFlash('music', '<?php echo $val['MusicUrl']; ?>', this, '<?php echo $val['MusicID']; ?>');" style="cursor:pointer; border:none;" /> </div>
<?php } ?><script type="text/javascript"> var __TOPIC_VIEW__ = '<?php echo $topic_view; ?>'; </script>
<?php if(($tpid=$val['top_parent_id'])>0 && !in_array($this->Code, array('forward', 'reply'))) { ?>
<?php if(('mycomment'==$this->Code || $topic_view) && 'reply'==$val['type'] && $tpid!=($pid=$val['parent_id']) && $parent_list[$pid]) { ?>
<p class="feedP">回复{<a href="index.php?mod=<?php echo $parent_list[$pid]['username']; ?>"><?php echo $parent_list[$pid]['nickname']; ?>：</a><span><?php echo $parent_list[$pid]['content']; ?></span>}</p>
<?php } ?>

<?php if(!$topic_view) { ?>
<?php $pt=$parent_list[$tpid]; ?>
<div class="blogTxt">
  <div class="top"></div>
  <div class="mid">
    
<?php if($pt) { ?>
		<span>
        <a href="index.php?mod=<?php echo $pt['username']; ?>" onmouseover="get_user_choose(<?php echo $pt['uid']; ?>,'_reply_user',<?php echo $pt['tid']; ?>);" onmouseout="clear_user_choose();">
       	 	<?php echo $pt['nickname']; ?>
		</a>
        <?php echo $pt['validate_html']; ?> :  
        	<!--悬浮头像、弹出对话框-->
            <span id="user_<?php echo $pt['tid']; ?>_reply_user"></span>
            <!--悬浮头像、弹出对话框-->	
        </span>
<?php $TPT_ = $TPT_ ? $TPT_ : 'TPT_'; ?>
<span id="topic_content_<?php echo $TPT_; ?><?php echo $pt['tid']; ?>_short"><?php echo $pt['content']; ?></span>
		<span id="topic_content_<?php echo $TPT_; ?><?php echo $pt['tid']; ?>_full"></span>
<?php if($pt['longtextid'] > 0) { ?>
			<span>
			<a href="javascript:;" onclick="view_longtext('<?php echo $pt['longtextid']; ?>', '<?php echo $pt['tid']; ?>', this, '<?php echo $TPT_; ?>');return false;">查看全文</a>
			</span>
		
<?php } ?>

<?php if($pt['imageid'] && $pt['image_list']) { ?>
<?php $pt['image_key']=$pt['tid'].'_'.random(6); ?>
<ul class="imgList" id="image_area_<?php echo $pt['image_key']; ?>">
			  
<?php if(is_array($pt['image_list'])) { foreach($pt['image_list'] as $iv) { ?>
			  <li><a href="<?php echo $iv['image_original']; ?>" class="artZoomAll" rel="<?php echo $iv['image_small']; ?>" topicId="<?php echo $pt['tid']; ?>" rev="<?php echo $pt['image_key']; ?>" shoppingUrl="<?php echo $pt['ShoppingUrl']; ?>" shoppingPrice="<?php echo $pt['ShoppingPrice']; ?>" shoppingTypeLogo="<?php echo $pt['ShoppingTypeLogo']; ?>"><img style="width:<?php echo $this->Config['thumbwidth']; ?>px; height:<?php echo $this->Config['thumbheight']; ?>px;" src="<?php echo $iv['image_small']; ?>" /></a></li>
			  
<?php } } ?>
</ul>
		
<?php } ?>
<!--投票 Begin-->
<?php if($pt['is_vote'] > 0) { ?>
<?php $__vote_key = $pt['tid'].'_'.$pt['random'] ?>
<ul class="imgList" id="vote_detail_<?php echo $__vote_key; ?>">
				  <li><a href="javascript:;" onclick="getVoteDetailWidgets('<?php echo $__vote_key; ?>', <?php echo $pt['is_vote']; ?>);"><img src='./images/vote_pic_01.gif'/></a> </li>
				</ul>
				<div id="vote_area_<?php echo $__vote_key; ?>" style="display:none;">

						<div class="vote_zf_box" id="vote_content_<?php echo $__vote_key; ?>"></div> 

				</div>
			
<?php } ?>
              
		<!--投票 End-->
<?php if($pt['videoid'] and $this->Config['video_status']) { ?>
		<div class="feedUservideo"><a onClick="javascript:showFlash('<?php echo $pt['VideoHosts']; ?>', '<?php echo $pt['VideoLink']; ?>', this, '<?php echo $pt['VideoID']; ?>','<?php echo $pt['VideoUrl']; ?>');" >
		  <div id="play_<?php echo $pt['VideoID']; ?>" class="vP"><img src="images/feedvideoplay.gif"  /></div>
		  <img src="<?php echo $pt['VideoImg']; ?>" style="border:none"/> </a></div>
		
<?php } ?>

<?php if($pt['musicid']) { ?>
		<div class="feedUserImg"><div id="play_<?php echo $pt['MusicID']; ?>"></div><img src="images/music.gif" title="点击播放音乐" onClick="javascript:showFlash('music', '<?php echo $pt['MusicUrl']; ?>', this, '<?php echo $pt['MusicID']; ?>');" style="cursor:pointer; border:none;" /> </div>
		
<?php } ?>
    
	    
		<div>
		<a href="index.php?mod=topic&code=<?php echo $tpid; ?>" target="_blank">原文评论(<?php echo $pt['replys']; ?>)</a>&nbsp;
		<a onclick="get_forward_choose(<?php echo $tpid; ?>);return false;" href="index.php?mod=topic&code=<?php echo $tpid; ?>" target="_blank">转发原文(<?php echo $pt['forwards']; ?>)</a>&nbsp;	
		<?php echo $pt['from_html']; ?>
		</div>
    
<?php } else { ?><?php $val['reply_disable']=0; ?>
<p><span>原始微博已删除</span></p>
    
<?php } ?>
  </div>
  <div class="bottom"></div>
</div>
<?php } ?>
<?php } ?>
<?php if($this->Module=='qun') { ?>
              <script type="text/javascript">
$(document).ready(function(){
var objStr1 = "#topic_lists_<?php echo $val['tid']; ?>_a";
var objStr2 = "#topic_lists_<?php echo $val['tid']; ?>_b";
$(objStr1).mouseover(function(){$(objStr2).show();});
$(objStr1).mouseout(function(){$(objStr2).hide();});
});
</script>

<div class="from"> 
<div class="option"> 
<ul>
<?php if(MEMBER_ID>0) { ?>
<li>
<!--转发的判断 Begin-->
<a href="javascript:void(0);" onclick="
<?php if($allow_list_manage) { ?>
get_forward_choose(<?php echo $val['tid']; ?>, {appitem:'<?php echo $val['item']; ?>', appitem_id:'<?php echo $val['item_id']; ?>',noReply:1});
<?php } else { ?>get_forward_choose(<?php echo $val['tid']; ?>);
<?php } ?>
" style="cursor:pointer;">转发
<?php if($val['forwards']) { ?>
(<?php echo $val['forwards']; ?>)
<?php } ?>
</a>
<!--转发的判断 End-->
</li>
<li class="o_line_l">|</li>
<?php if(!$val['reply_disable']) { ?>
<li><a href="javascript:void(0)" onclick="
<?php if($allow_list_manage) { ?>
replyTopic(<?php echo $val['tid']; ?>,'reply_area_<?php echo $val['tid']; ?>','<?php echo $val['replys']; ?>',1,{appitem:'<?php echo $val['item']; ?>', appitem_id:'<?php echo $val['item_id']; ?>'});
<?php } else { ?>replyTopic(<?php echo $val['tid']; ?>,'reply_area_<?php echo $val['tid']; ?>','<?php echo $val['replys']; ?>');
<?php } ?>
return false;">评论
<?php if($val['replys']) { ?>
(<?php echo $val['replys']; ?>)
<?php } ?>
</a></li>
<?php } ?>
<li class="o_line_l">|</li>
<li id="topic_lists_<?php echo $val['tid']; ?>_a" class="mobox"><a href="javascript:void(0)" class="moreti" ><span class="txt">更多</span><span class="more"></span></a> 
<div id="topic_lists_<?php echo $val['tid']; ?>_b" class="molist" style="display:none">
<?php if(MEMBER_ID>0) { ?>
<?php if('myfavorite'==$this->
Code) { ?>
 <span id="favorite_<?php echo $val['tid']; ?>"><a href="javascript:void(0)" onclick="favoriteTopic(<?php echo $val['tid']; ?>,'delete');return false;">取消收藏</a></span>
<?php } else { ?><span id="favorite_<?php echo $val['tid']; ?>"><a href="javascript:void(0)" onclick="favoriteTopic(<?php echo $val['tid']; ?>,'add');return false;">收藏</a></span> 
<?php } ?>
<?php } ?>
<?php if($this->Config['is_report'] || MEMBER_ID > 0) { ?>
<a href="javascript:void(0)" onclick="ReportBox('<?php echo $val['tid']; ?>')" title="举报不良信息">举报</a>
<?php } ?>

<?php if($val['uid']==MEMBER_ID || 'admin'==MEMBER_ROLE_TYPE) { ?>
<?php if($this->Code > 0  ||  in_array($this->Code,array('list_reply','do_add'))) $eid = 'reply_list'; else $eid = 'topic_list'  ?>
<a href="javascript:void(0)" onclick="deleteTopic(<?php echo $val['tid']; ?>,'<?php echo $eid; ?>_<?php echo $val['tid']; ?>');return false;">删除</a>
<?php $datetime = time(); $modify_time = $this->Config['topic_modify_time'] * 60 ?>
<?php if($datetime - $val['addtime'] < $modify_time || 'admin'==MEMBER_ROLE_TYPE ) { ?>
<?php if($val['replys'] <= 0 && $val['forwards'] <= 0 || 'admin'==MEMBER_ROLE_TYPE) { ?>
<a href="javascript:void(0);" onclick="modifyTopic(<?php echo $val['tid']; ?>,'modify_topic_<?php echo $val['tid']; ?>','<?php echo $eid; ?>');return false;" style="cursor:pointer;">编辑</a>
<?php } ?>
<?php } ?>
<!--推荐开始 Begin-->
		<a href="javascript:void(0)" onclick="showTopicRecdDialog({'tid':'<?php echo $val['tid']; ?>'});return false;">推荐</a>
	<!--推荐开始 End-->
<?php } ?>
</div>
</li>
<?php } ?>
</ul>
</div> 
<div class="mycome">
<?php if(!$no_from) { ?>
<?php echo $val['from_html']; ?>
<?php } ?>
</div> 
</div>
<?php } else { ?><script type="text/javascript">
$(document).ready(function(){
var objStr1 = "#topic_lists_<?php echo $val['tid']; ?>_a";
var objStr2 = "#topic_lists_<?php echo $val['tid']; ?>_b";
$(objStr1).mouseover(function(){$(objStr2).show();});
$(objStr1).mouseout(function(){$(objStr2).hide();});
});
</script>

<div class="from"> 
<div class="option">
<!--不是群内成员无法对群内的微博进行操作-->
<ul>
<?php $tpid=$val['top_parent_id']; if ($tpid&&$parent_list[$tpid]) $root_type=$parent_list[$tpid]['type']; ?>
<?php if((!isset($root_type)) || (isset($root_type) && in_array($root_type, get_topic_type('forward')))) { ?>
	<li>
	  <!--转发的判断 Begin-->
	  
<?php if(in_array($val['type'], get_topic_type('forward')) || $this->Module=='qun') { ?>
	  
<?php $not_allow_forward=0; ?>
<span 
<?php if(MEMBER_ID <1 ) { ?>
 onclick="ShowLoginDialog();" 
<?php } ?>
>
			<a href="javascript:void(0);" onclick="get_forward_choose(<?php echo $val['tid']; ?>);" style="cursor:pointer;">转发
<?php if($val['forwards']) { ?>
(<?php echo $val['forwards']; ?>)
<?php } ?>
</a>
		</span>
	 
<?php } else { ?> 
<?php $not_allow_forward=1; ?>
 
<?php if(isset($val['fansgroup'])) { ?>
	  <span><?php echo $val['fansgroup']; ?></span>
	 
<?php } else { ?> <span title="设置了特殊的权限，不允许转发">转发</span>
	 
<?php } ?>
 
<?php } ?>
 <!--转发的判断 End-->
	</li>
	<li class="o_line_l">|</li>
<?php } else { ?><?php $not_allow_forward=1; ?>
<?php } ?>
<?php if(!$val['reply_disable']) { ?>
	<li>
		<span >
		<a id="topic_list_reply_<?php echo $val['tid']; ?>_aid" href="javascript:void(0)" 
<?php if(MEMBER_ID <1 ) { ?>
 onclick="ShowLoginDialog();" 
<?php } ?>
 onclick="replyTopic(<?php echo $val['tid']; ?>,'reply_area_<?php echo $val['tid']; ?>','<?php echo $val['replys']; ?>',<?php echo $not_allow_forward; ?>);return false;">评论
<?php if($val['replys']) { ?>
(<?php echo $val['replys']; ?>)
<?php } ?>
</a>
		</span>
	</li>
	
<?php } ?>
<li class="o_line_l">|</li>


	<li id="topic_lists_<?php echo $val['tid']; ?>_a" class="mobox">
		<a href="javascript:void(0)" class="moreti" ><span class="txt">更多</span><span class="more"></span></a> 
		<div id="topic_lists_<?php echo $val['tid']; ?>_b" class="molist" style="display:none">
<?php if('myfavorite'==$this->Code) { ?>
 
				<span id="favorite_<?php echo $val['tid']; ?>" 
<?php if(MEMBER_ID <1 ) { ?>
 onclick="ShowLoginDialog();" 
<?php } ?>
>
					<a href="javascript:void(0)" onclick="favoriteTopic(<?php echo $val['tid']; ?>,'delete');return false;">取消收藏</a>
				</span>
<?php } else { ?><span id="favorite_<?php echo $val['tid']; ?>" 
<?php if(MEMBER_ID < 1) { ?>
 onclick="ShowLoginDialog();" 
<?php } ?>
>
					<a href="javascript:void(0)" onclick="favoriteTopic(<?php echo $val['tid']; ?>,'add');return false;">收藏</a>
				</span> 
			
<?php } ?>
<?php if($this->Config['is_report'] || MEMBER_ID > 0) { ?>
			<span 
<?php if(MEMBER_ID <1 ) { ?>
 onclick="ShowLoginDialog();" 
<?php } ?>
><a href="javascript:void(0)" onclick="ReportBox('<?php echo $val['tid']; ?>')" title="举报不良信息">举报</a></span>
			
<?php } ?>
<?php if($val['uid']==MEMBER_ID || 'admin'==MEMBER_ROLE_TYPE) { ?>
<?php if($this->Code > 0  ||  in_array($this->Code,array('list_reply','do_add'))) $eid = 'reply_list'; else $eid = 'topic_list'  ?>
<a href="javascript:void(0)" onclick="deleteTopic(<?php echo $val['tid']; ?>,'<?php echo $eid; ?>_<?php echo $val['tid']; ?>');return false;">删除</a>
<?php $datetime = time(); $modify_time = $this->Config['topic_modify_time'] * 60 ?>
<?php if($datetime - $val['addtime'] < $modify_time || 'admin'==MEMBER_ROLE_TYPE ) { ?>
<?php if($val['replys'] <= 0 && $val['forwards'] <= 0 || 'admin'==MEMBER_ROLE_TYPE) { ?>
						<a href="javascript:void(0);" onclick="modifyTopic(<?php echo $val['tid']; ?>,'modify_topic_<?php echo $val['tid']; ?>','<?php echo $eid; ?>');return false;" style="cursor:pointer;">编辑</a>
					
<?php } ?>
<?php } ?>
<!--推荐开始 Begin-->
					<a href="javascript:void(0)" onclick="showTopicRecdDialog({'tid':'<?php echo $val['tid']; ?>','tag_id':'<?php echo $tag_id; ?>'});return false;">推荐</a>
				<!--推荐开始 End-->
				
			
<?php } ?>
</div>
	</li>
</ul>
</div> 
<div class="mycome">
<!-- <a href="index.php?mod=topic&code=<?php echo $val['tid']; ?>"><?php echo $val['dateline']; ?></a>  -->
<?php if(!$no_from) { ?>
<?php echo $val['from_html']; ?>
<?php } ?>
<?php echo $this->hookall_temp['global_topiclist_extra3']; ?>
</div>
<?php echo $this->hookall_temp['global_topiclist_extra4']; ?>
</div>
			
<?php } ?>
</div>
	</div>
	<div id="reply_area_<?php echo $val['tid']; ?>"></div>
	<div id="modify_topic_<?php echo $val['tid']; ?>"></div>
	<div id="forward_menu_<?php echo $val['tid']; ?>" class="Fbox"></div>
</div>
<?php if(!$no_mBlog_linedot2) { ?>
	<div class="mBlog_linedot"></div>
<?php } ?>
				</div>
		  	
<?php } } ?>
<!--微博列表 End-->
		
<?php } ?>
  
          
<?php if($page_arr['html']) { ?>
          <div class="pageStyle">
            <li><?php echo $page_arr['html']; ?></li>
          </div>
          
<?php } ?>
          
<?php } ?>
  
		  
<?php if('groupview'== $this->Code && $counts <=0) { ?>
		   <BR />
			"<strong><?php echo $groupname; ?></strong>" 分组下的用户暂时没有发布微博。
		  
<?php } ?>
          
<?php if($counts <=5) { ?>
          <div id="topic_list_<?php echo $counts; ?>">
            
<?php if('myat'== $this->
            Code) { ?>
 <BR />
            这里会显示含有"@<?php echo MEMBER_NICKNAME; ?>"的微博。<BR />
            <BR />
            <span>@用户名 </span>技巧：注意用户名后面有“空格”，可以理解为向某人说，被@用户名 提到的人如果在系统中存在，那么TA就可在其个人首页“@提到我的”的栏目中看到你发布的内容。
            <?php } elseif('mycomment' == $this->
            Code) { ?> <BR />
            <BR />
            <BR />
            这里会显示他人对你微博所做的评论。<BR />
            <BR />
            <A HREF="index.php?mod=<?php echo $member['username']; ?>&code=fans" title="关注<?php echo $member['nickname']; ?>的">关注你的</A>人越多，就会有越多人参与你分享内容的讨论，尝试通过<A HREF="index.php?mod=profile&code=invite">邀请好友</A>来让更多人关注你；<BR /><?php } elseif('tocomment' == $this->Code) { ?> <BR />
            <BR />
            <BR />
            这里会显示你对他人微博所做的评论。<BR />
            <BR />
            <?php } elseif('myfavorite' == $this->
            Code) { ?> <BR />
            这里会显示你所收藏的微博。<BR />
            <BR />
            在登录状态下，每个微博的下方都有一个收藏连接，点击即可自动完成收藏，然后你就可以在这里看到了。你可以访问<A HREF="index.php?mod=topic&code=hot">热门微博</A>来发现有收藏价值的内容；<BR />
            <?php } elseif('favoritemy' == $this->
            Code) { ?> <BR />
            这里会显示谁收藏了你的微博。<BR />
            <BR />
            赶快分享些有价值的新鲜事吧，当有人收藏后，你就会在这里看到。<BR /><?php } elseif('myhome' == $this->Code ) { ?><BR /><BR />
			这里显示我和我关注人的微博。<BR /><BR />
			关注你喜欢的人，你就可以在这看到他们分享的内容，尝试通过<A HREF="index.php?mod=topic&code=top">达人榜</A>、<A HREF="index.php?mod=profile&code=search">找人</A>选择用户加关注；<BR /><?php } elseif('tag' == $this->Code ) { ?><BR /><BR />
			这里显示我关注话题的相关微博。<BR /><BR />
			对你感兴趣的话题进行关注，就可以在这里直接查看相关微博，还可以结识有共同话题的人，尝试通过<A HREF="index.php?mod=tag">话题榜</A> 选择话题关注；<BR /><?php } elseif('event' == $view ) { ?><BR />
			这里显示我关注活动的相关微博。<BR />
			对你感兴趣的活动进行关注，就可以在这里直接查看相关微博，还可以结识有共同话题的人。<BR /><?php } elseif('qun' == $this->Code ) { ?><BR /><BR />
			这里显示我加入的群相关的微博。<BR /><BR />
			加入你感兴趣的群，就可以在这里直接查看相关微博，还可以结识有共同话题的人。<a href="index.php?mod=qun" target="_blank">去群里逛逛吧~~</a><BR /><?php } elseif('recd' == $this->Code ) { ?><BR /><BR />
			这里显示推荐的微博。<BR /><BR /><?php } elseif('fenlei' == $view ) { ?><BR />
			这里显示我关注分类的相关微博。<BR />
			对你感兴趣的分类进行关注，就可以在这里直接查看相关微博。<BR />	
			
<?php } ?>
          </div>
          
<?php } ?>
        </div>
<?php echo $this->js_show_msg(); ?>
		<!--微博列表 End-->
      </div>
    </div>
  </div>
  <div>
<div class="mainR">
<?php if($this->Config['ad_enable']) { ?>
  
<?php if('myhome'== $this->Code) { ?>
    
<?php if($this->Config['ad']['ad_list']['group_myhome']['middle_right']) { ?>
<div class="R_AD"> <?php echo $this->Config['ad']['ad_list']['group_myhome']['middle_right']; ?></div>	
<?php } ?>
  <?php } elseif('tag'== $this->Get['mod']) { ?>    
<?php if($this->Config['ad']['ad_list']['tag_view']['middle_right']) { ?>
<div class="R_AD"><?php echo $this->Config['ad']['ad_list']['tag_view']['middle_right']; ?></div>
<?php } ?>
  
<?php } ?>
<?php } ?>
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
<?php $qun_setting = ConfigHandler::get('qun_setting'); ?>
  
<?php if(MEMBER_ID != $member['uid']) { ?>
	<script language="javascript">
		$(document).ready(function(){
		
		/*
		* ajax 右侧显示数据
		* 这里的函数可以随便更改位置，加载的顺序也会不同。
		*/
			
			//他关注的人
			get_user_follow();
			
			//属于他的标签
			get_to_user_tag();
<?php if($qun_setting['qun_open']) { ?>
				//他加入的群
				get_my_qun();
			
<?php } ?>
<?php $event_setting=ConfigHandler::get('event_setting') ?>
<?php if($event_setting['event_setting']) { ?>
				//他参与的活动
				get_to_user_event();
			
<?php } ?>
});
		
		function get_user_follow(){
			//他关注的人
			right_show_ajax('<?php echo $member['uid']; ?>','user_follow','user_follow');
		}
		function get_to_user_tag(){
			//属于他的标签
			right_show_ajax('<?php echo $member['uid']; ?>','to_user_tag','to_user_tag');
		}
		function get_my_qun(){
			right_show_ajax('<?php echo $member['uid']; ?>','my_qun','qun_box');
		}
		//他参加的活动
		function get_to_user_event()
		{
			right_show_ajax('<?php echo $member['uid']; ?>','to_user_event','to_user_event_box');
		}
		
	</script>

	<div id="topic_right_user_info">
<?php if(MEMBER_STYLE_THREE_TOL == 1) { ?>
		

		<div class="sideBox">
			<div class="person_atten_l">
				<p><span class="num"><a href="index.php?mod=<?php echo $member['username']; ?>&code=follow" title="<?php echo $member['nickname']; ?>关注的"><?php echo $member['follow_count']; ?></a></span></p>
				<p><a href="index.php?mod=<?php echo $member['username']; ?>&code=follow" title="<?php echo $member['nickname']; ?>关注的">关注</a> </p>
			</div>
			<div class="person_atten_l">
			<p><span class="num"><a href="index.php?mod=<?php echo $member['username']; ?>&code=fans" title="关注<?php echo $member['nickname']; ?>的"><?php echo $member['fans_count']; ?></a></span></p>
			<p><a href="index.php?mod=<?php echo $member['username']; ?>&code=fans" title="关注<?php echo $member['nickname']; ?>的">粉丝</a> </p>
			</div>
			<div class="person_atten_r">
				<p><span class="num"><a href="index.php?mod=<?php echo $member['username']; ?>" title="<?php echo $member['nickname']; ?>的微博"><?php echo $member['topic_count']; ?></a></span></p>
				<p><a href="index.php?mod=<?php echo $member['username']; ?>" title="<?php echo $member['nickname']; ?>的微博">微博</a> </p>
			</div>
		</div>
			
	
<?php } ?>
</div>
	<?php echo $this->hookall_temp['global_usernav_extra2']; ?>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$(".SC_guanyu").click(function(){$(this).parent().toggleClass("fold_guanyu");$(".SC_guanyu_box").toggle();});
		});
		</script>
		<div class="SC">
			<h3>关于<?php echo $member['nickname']; ?><a class="btn SC_guanyu" href="javascript:void(0)"></a></h3>
			<ul class="FTL SC_guanyu_box">
<?php if($member['aboutme']) { ?>
				<li>&nbsp;<?php echo $member['aboutme']; ?></li><?php } elseif(MEMBER_ID==$member['uid'] && !$_GET['mod_original']) { ?><li><a href="index.php?mod=settings">快来写一句话</a>，向大家介绍一下吧</li>
<?php } else { ?>这家伙很懒，什么都没留下。
				
<?php } ?>
</ul>
		</div>
		
	
			  
		<!--认证资料-->
<?php if($member['vip_info']) { ?>
		<div class="SC">
			<div style="width:160px; margin:7px auto; border:1px solid #CAD1B7; padding:10px; overflow:hidden; line-height:19px;">
				<div class="ico_vData"><?php echo $this->Config['site_name']; ?>认证资料</div>
				<p style="display:block;clear:both; margin-top:1px;"><span style="padding:3px;"><?php echo $member['vip_info']; ?></span></p>
			</div>
		</div>
		
<?php } ?>
  
		
		
		
	  
<?php if(MEMBER_ID) { ?>
	  
<?php if($this->Code > 0) { ?>
	  <div class="SC">
		<div class="vDateBox">
		<p><?php echo $member['follow_html']; ?></p>
		</div>
	  </div>
	  
<?php } ?>
   
<?php } ?>
<!--属于TA的标签-->
<?php if($this->Get['mod'] !='tag') { ?>
		  
<?php if(MEMBER_ID > 0) { ?>
		   
<?php if(MEMBER_ID != $member['uid']) { ?>
			  <script type="text/javascript">
				$(document).ready(function(){
				$(".SC_to_user_tag").click(function(){$(this).parent().toggleClass("fold_to_user_tag");$(".SC_to_user_tag_box").toggle();});
				});
			  </script>
			  <div class="SC">
				<h3>属于<?php echo $member['gender_ta']; ?>的标签
				<a class="btn SC_to_user_tag" href="javascript:void(0);" onclick="right_show_ajax('<?php echo $member['uid']; ?>','to_user_tag','to_user_tag'); return false;"></a>
				</h3>
				  <ul class="FTL SC_to_user_tag_box">
					<div id="<?php echo $member['uid']; ?>_to_user_tag"></div>
				  </ul>
			   </div>
			
<?php } ?>
  
		  
<?php } ?>
  
		
<?php } ?>
  
	   <!--属于TA的标签-->
	   
	   
	   
<?php if(MEMBER_ID != $member['uid']) { ?>
		  <script type="text/javascript">
			$(document).ready(function(){
			$(".SC_taguanzhu").click(function(){$(this).parent().toggleClass("fold_taguanzhu");$(".SC_taguanzhu_box").toggle();});
			});
		  </script>
		<div class="SC">
		<h3><?php echo $member['gender_ta']; ?>关注的人 (<?php echo $member['follow_count']; ?>)
			<a class="btn SC_taguanzhu" href="javascript:void(0)" onclick="right_show_ajax('<?php echo $member['uid']; ?>','user_follow','user_follow'); return false;"></a>
		</h3>
		<ul class="FTL FTL2 SC_taguanzhu_box">
			<div id="<?php echo $member['uid']; ?>_user_follow"></div>
		</ul>
	  </div>
	  
<?php } ?>
  
	  
	  
<?php $qun_setting = ConfigHandler::get('qun_setting'); ?>
  
<?php if($qun_setting['qun_open']) { ?>
		  <!--他的微群 Begin-->
			<script type="text/javascript">
				$(document).ready(function(){
					$(".SC_my_qun").click(function(){$(this).parent().toggleClass("fold_qun");$(".SC_qun_box").toggle();});
				});
			</script>
			<div class="SC">
				<h3>
					<?php echo $member['gender_ta']; ?>加入的微群
					<a class="btn SC_my_qun" href="javascript:void(0);" onclick="right_show_ajax('<?php echo $member['uid']; ?>','my_qun','qun_box'); return false;">
					</a>
				</h3>
				<ul class="FTL SC_qun_box">
					<div id="<?php echo $member['uid']; ?>_qun_box"></div>
				</ul>
			</div>
		  <!--他的微群 End-->
	  
<?php } ?>
  
	  <!--他参与的活动 Begin-->
	  <script type="text/javascript">
				$(document).ready(function(){
					$(".SC_my_event").click(function(){$(this).parent().toggleClass("fold_event");$(".SC_event_box").toggle();});
				});
			</script>
			<div class="SC">
				<h3>
					<?php echo $member['gender_ta']; ?>参与的活动
					<a class="btn SC_my_event" href="javascript:void(0);" onclick="right_show_ajax('<?php echo $member['uid']; ?>','to_user_event','to_user_event_box'); return false;">
					</a>
				</h3>
				<ul class="FTL SC_event_box">
					<div id="<?php echo $member['uid']; ?>_to_user_event_box"></div>
				</ul>
			</div>
	   <!--他参与的活动 End-->
	   
<?php } ?>
  
<?php if(MEMBER_ID == $member['uid']) { ?>
<?php if(in_array($params['code'],array('myhome','myfavorite','mycomment','tocomment','myat','myblog')) ) { ?>
  
	
	<script language="javascript">
		$(document).ready(function(){
		
		/*
		* ajax 右侧显示数据
		* 这里的函数可以随便更改位置，加载的顺序也会不同。
		*/
		
		//可能感兴趣
		get_refresh();
		
		//热门话题推荐
		get_hot_tag();
		
		//人气用户推荐
		get_recommend_user();
			
		});
		
		function get_refresh(){
			//可能感兴趣
			right_show_ajax('<?php echo $member['uid']; ?>','refresh','refresh');
		}
		function get_hot_tag(){
			//热门话题
			right_show_ajax('<?php echo MEMBER_ID; ?>','hot_tag','hot_tag');
		}
		function get_recommend_user(){
			//人气用户推荐
			right_show_ajax('<?php echo MEMBER_ID; ?>','recommend_user','recommend_user');
		}
	</script>

	<!-- 可能感兴趣的人start -->
		  <script type="text/javascript">
			$(document).ready(function(){
			$(".SC_guanxingqu").click(function(){$(this).parent().toggleClass("fold_guanxingqu");$(".SC_guanxingqu_box").toggle();});
			});
		  </script>
		  <div class="SC">
			<h3>
			可能感兴趣的人<a class="btn SC_guanxingqu" href="javascript:void(0);" onclick="right_show_ajax('<?php echo $member['uid']; ?>','refresh','refresh'); return false;"></a>
			</h3>
			<div class="FTL SC_guanxingqu_box">
				<div id="<?php echo $member['uid']; ?>_refresh"></div>
			</div>
		</div>
	  <!-- 可能感兴趣的人end -->

	  <!-- 热门话题推荐-->
	  
<?php if($this->Config['hot_tag_recommend_enable'] && ($hot_tag_recommend = ConfigHandler::get('hot_tag_recommend')) && $hot_tag_recommend['list']) { ?>
		  <script type="text/javascript">
			$(document).ready(function(){
			$(".SC_rementuijian").click(function(){$(this).parent().toggleClass("fold_rementuijian");$(".SC_rementuijian_box").toggle();});
			});
		  </script>
		<div class="SC">
		<h3><?php echo $hot_tag_recommend['name']; ?><a class="btn SC_rementuijian" href="javascript:void(0);" onclick="right_show_ajax('<?php echo MEMBER_ID; ?>','hot_tag','hot_tag');"></a></h3>
		<ul class="FTL SC_rementuijian_box">
			<div id="<?php echo MEMBER_ID; ?>_hot_tag"></div>
		</ul>
	  </div>
	  
<?php } ?>
<!--人气用户推荐-->
		  <script type="text/javascript">
			$(document).ready(function(){
			$(".SC_renqituijian").click(function(){$(this).parent().toggleClass("fold_renqituijian");$(".SC_renqituijian_box").toggle();});
			});
		  </script>
	  <div class="SC">
	  <h3>人气用户推荐<a class="btn SC_renqituijian" href="javascript:void(0);" onclick="right_show_ajax('<?php echo MEMBER_ID; ?>','recommend_user','recommend_user');"></a></h3>
		<ul class="FTL FTL3 SC_renqituijian_box">
	 
			<div id="<?php echo MEMBER_ID; ?>_recommend_user"></div>
	
		</ul>
	  </div>
	<!-- 人气用户推荐-->
<?php if($fans_list) { ?>
		  <script type="text/javascript">
			$(document).ready(function(){
			$(".SC_guanzhuta").click(function(){$(this).parent().toggleClass("fold_guanzhuta");$(".SC_guanzhuta_box").toggle();});
			});
		  </script>
		<div class="SC">
		<h3>关注<?php echo $member['nickname']; ?>的人<a class="btn SC_guanzhuta" href="javascript:void(0)"></a></h3>
		<ul class="FTL FTL2 SC_guanzhuta_box">
		  
<?php if(is_array($fans_list)) { foreach($fans_list as $val) { ?>
		  <li class="h_h2"> <a href="index.php?mod=<?php echo $val['username']; ?>" target="_blank"><img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" class="manface"/></a><span><a href="index.php?mod=<?php echo $val['username']; ?>" target="_blank"><?php echo $val['nickname']; ?></a></span></li>
		  
<?php } } ?>
  <li><a href="index.php?mod=<?php echo $member['username']; ?>&code=fans">更多</a></li>
		</ul>
	  </div>
	  
<?php } ?>
<?php } ?>
<?php } ?>
  
	<!--获取积分方式--> 
<?php if($this->Config['extcredits_enable'] && MEMBER_ID > 0 && $member['uid']==MEMBER_ID) { ?>
	  <script type="text/javascript">
		$(document).ready(function(){
		$(".SC_jifen").click(function(){$(this).parent().toggleClass("fold_jifen");$(".SC_jifen_box").toggle();});
		});
	  </script>
	  <div class="SC">
		<h3>获取积分<a class="btn SC_jifen" href="javascript:void(0)"></a></h3>
		<ul class="FTL SC_jifen_box">
<?php $credits_rule=ConfigHandler::get('credits_rule'); ?>
<?php if(is_array($credits_rule)) { foreach($credits_rule as $k => $v) { ?>
<?php if($v['related'] && '_'==$k['0']) { ?>
					<li>
<?php if('T'==$k['1']) { ?>
						<a href="index.php?mod=tag&code=<?php echo $v['related']; ?>">发布<b>#<?php echo $v['related']; ?>#</b>话题</a><?php } elseif('U'==$k['1']) { ?><a href="index.php?mod=<?php echo $v['related']; ?>">关注<b><?php echo $v['related']; ?></b></a>
					
<?php } ?>
<?php if(is_array($this->Config['credits']['ext'])) { foreach($this->Config['credits']['ext'] as $_k => $_v) { ?>
<?php if($_v['enable'] && $v[$_k]) { ?>
							<?php echo $_v['name']; ?>
<?php if($v[$_k]>0) { ?>
							+
							
<?php } ?>
<?php echo $v[$_k]; ?>
						
<?php } ?>
<?php } } ?>
</li>
				
<?php } ?>
<?php } } ?>
<li>更多获取积分的方法，<a href="index.php?mod=settings&code=extcredits&op=rule">点此查看</a></li>
		</ul>
	  </div>
	
<?php } ?>
<!--获取积分方式--> 
	
  
	<!-- 意见反馈-->
	<script type="text/javascript">
		$(document).ready(function(){
		$(".SC_yijianfankui").click(function(){$(this).parent().toggleClass("fold_yijianfankui");$(".SC_yijianfankui_box").toggle();});
		});
	  </script>
	  <div class="SC">
	  <h3><?php echo $this->Config['site_name']; ?>意见反馈<a class="btn SC_yijianfankui" href="javascript:void(0)"></a></h3>
	  <ul class="FTL SC_yijianfankui_box">
		  <li>众人拾柴火焰高，如您有任何建议欢迎点<a href="index.php?mod=tag&code=意见反馈" target="_blank">意见反馈</a>告诉我们。</li>
		  <li>&nbsp;</li>
		</ul>
	  </div>
	<!--意见反馈-->
<?php if($member['uid']) { ?>
<div id="add_remark_<?php echo $member['uid']; ?>" class="alertBox" style="display:none" >
	<ul class="manBox">
	 <li>
		<div class="tt1">
			<span>设置备注名</span>
			<div class="mclose" onclick="getElementById('add_remark_<?php echo $member['uid']; ?>').style.display=(getElementById('add_remark_<?php echo $member['uid']; ?>').style.display=='none')?'':'none'"></div>
		</div>
		<div class="mWarp">
			 <form action="ajax.php?mod=topic&code=add_remark" method="POST"  name="remarkform"   onsubmit="publishSubmit_remark('remark_<?php echo $member['uid']; ?>',<?php echo $member['uid']; ?>);return false;">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
			  给朋友加个备注名，方便认出他是谁（0~6个字符）
					<table >
					  <tr>
						<td><input name="remark_<?php echo $member['uid']; ?>" type="text" id="remark_<?php echo $member['uid']; ?>" class="text-area2" value="<?php echo $buddys['remark']; ?>" size="6" maxlength="6"/>
						</td>
						<td align="left">
						<input type="button" class="shareI" value="保 存" onclick="publishSubmit_remark('remark_<?php echo $member['uid']; ?>',<?php echo $member['uid']; ?>);return false;" /> 
						</td>
					  </tr>
					</table>
			  </form>
		  </div>
		</li>
	 </ul>
 </div>
<?php } ?>
 
<?php if($this->Config['ad_enable']) { ?>
<div class="R_AD"> 
  
<?php if('myhome'== $this->Code) { ?>
  <?php echo $this->Config['ad']['ad_list']['group_myhome']['middle_right1']; ?>
  <!-- 右2-->
  <?php } elseif('tag'== $this->Get['mod']) { ?>  <?php echo $this->Config['ad']['ad_list']['tag_view']['middle_right1']; ?>
  
<?php } ?>
</div>
<?php } ?>
</div></div>
</div>
<?php if($this->Config['ad_enable'] && $this->Config['ad']['ad_list']['group_myhome']['footer']) { ?>
  <div style="text-align:center" class="T_AD">
  <?php echo $this->Config['ad']['ad_list']['group_myhome']['footer']; ?>
 </div>
<?php } ?>
<script type="text/javascript" src="templates/default/js/combobox.js"></script>
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
<?php if($this->Config['ajax_topic_time'] > 0 && MEMBER_ID > 0 && 'myhome'==$this->Code) { ?>
<?php $ajax_time = $this->Config['ajax_topic_time'] * 1000; ?>
<script>
function circle_topic()
{
	ajax_reminded(<?php echo MEMBER_ID; ?>);
	setTimeout('circle_topic();',<?php echo $ajax_time; ?>);
}
setTimeout('circle_topic();',<?php echo $ajax_time; ?>);
</script>
<?php } ?>