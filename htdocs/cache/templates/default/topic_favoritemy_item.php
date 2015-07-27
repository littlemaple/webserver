<?php /* 2015-07-27 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?><div class="avatar">
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