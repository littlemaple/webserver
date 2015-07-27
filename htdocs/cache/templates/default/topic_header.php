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