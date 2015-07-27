<?php /* 2011-12-28 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?>

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