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
<div class="main_2 <?php echo $t_col_main; ?>">

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
<div class="main_t"><span>个人标签</span></div>
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

<div class="labelBox">
<div class="setupTag">
<div class="setupTag_box">
<div class="setupTag_boxR">
<p class="setupTag_tip2 gray6">1、添加描述自己职业、兴趣爱好等方面的词语，让更多人找到你，让你找到更多同类(点击直接添加) ：</p>
<div id="rec_tags" class="setupTag_list01">
<?php if(is_array($user_tag)) { foreach($user_tag as $val) { ?>
<span id="del_tag_<?php echo $val['id']; ?>">
<a href="javascript:void(0)" onclick="user_tag('<?php echo $val['id']; ?>','<?php echo $val['name']; ?>','useradd');return false;" title="添加标签"><em>+</em><?php echo $val['name']; ?></a>
</span>
<?php } } ?>
</div>
</div>
<div class="setupTag_boxL">
<div class="setupTag_input">
<iframe id="user_tag_frame" name="user_tag_frame" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank"></iframe>
<form action="ajax.php?mod=topic&code=user_tag" method="post"  enctype="multipart/form-data" name="user_tag_form" id="user_tag_form" target="user_tag_frame">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
<p class="setupTag_tip2">2、自定义标签，每次添加一个 &nbsp; <input name="tag_name" type="text" class="setupTag_txt" id="tags_name" onfocus="if(value=='我来写标签') {value=''}" onblur="if (value=='') {value='我来写标签'}" value="我来写标签" maxlength="6">
<input type="button" class="shareI" value="贴上标签" onclick="user_tag('0','tags_name','add');return false;" /></p>
</form>
</div>
</div>
</div>
</div>

<div class="setupTag_tit">我已经添加的标签（点X去除）：</div>
<div id="user_tag_list"><div class="setupTag_list02" style="padding:0;">
  <ul class="tagList">
  
<?php if(is_array($user_tag_fields)) { foreach($user_tag_fields as $val) { ?>
    <li onmouseout="this.className='';" onmouseover="this.className='bg';" class="" id="del_id_<?php echo $val['tag_id']; ?>">
	<a class="a1" href="index.php?mod=search&code=usertag&usertag=<?php echo $val['tag_name']; ?>"><?php echo $val['tag_name']; ?></a>
	<a class="a2" onclick="del_tag('<?php echo $val['tag_id']; ?>');return false;" href="javascript:;"><img src="templates/default/images/transparent.gif" title="删除标签"></a>
	</li>
	
<?php } } ?>
  </ul>
</div>
</div>

<div class="setupTag_tit" style="padding-top:30px;">关于标签：</div>
<div class="setupTag_txtList">
<p>·已经添加的标签将显示在“我的微博”页面右侧栏中，方便大家了解你。</p>
<p>·点击你已添加的标签，可以搜索到有同样兴趣的人。</p>
</div>   					
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