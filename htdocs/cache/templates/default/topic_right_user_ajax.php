<?php /* 2015-07-27 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?>
<?php if($code == 'favorite_tag') { ?>
	<!---我关注的话题-->
	<li id="add_ajax_favorite_tags">
		 
<?php if(is_array($my_favorite_tags)) { foreach($my_favorite_tags as $val) { ?>
<span id="favorite_<?php echo $val['tag']; ?>">
 <a href="index.php?mod=tag&code=<?php echo $val['tag']; ?>" target="_blank"><?php echo $val['tag']; ?></a>
 <a href="javascript:void(0);" onclick="favoriteTag('<?php echo $val['tag']; ?>','delete');return false;" title="取消关注">x</a>
</span>
<?php } } ?>
	</li>
	<span class="thread_add"> <a href="javascript:void(0);" onclick="getElementById('add_favorite_tags').style.display=(getElementById('add_favorite_tags').style.display=='none')?'':'none'">加关注话题</a> </span>
	<div id="add_favorite_tags" style="display:none;"> <span>请添加想关注的话题
	  <p>
		<input type="text" name="tag_name" id="tag_name" class="sc_r_t_a"/>
		<input name="button" type="button" onclick="favoriteTag('tag_name','input_add')" value="保存" class="c_b1" />
	  </p>
	  </span> 
	  </div>
	<!---我关注的话题--><?php } elseif($code == 'user_tag') { ?><!---属于我/TA的标签-->
	<ul class="FTL SC_biaoqian_box">
	  <li>
<?php if($myuser_tag) { ?>
<?php if(is_array($myuser_tag)) { foreach($myuser_tag as $val) { ?>
		<span class="sc_bq"><a href="index.php?mod=search&code=usertag&usertag=<?php echo $val['tag_name']; ?>"><?php echo $val['tag_name']; ?></a></span>
		
<?php } } ?>
  </li>
	  
<?php } else { ?>  设置自己的标签，<a href="index.php?mod=user_tag" target="_blank">点此添加</a>
	  
<?php } ?>
</ul>
	<!---属于我/TA的标签--><?php } elseif($code == 'to_user_tag') { ?><!---属于我/TA的标签-->
	<ul class="FTL SC_biaoqian_box">
	  <li>
<?php if($to_user_tag) { ?>
<?php if(is_array($to_user_tag)) { foreach($to_user_tag as $val) { ?>
		<span class="sc_bq"><a href="index.php?mod=search&code=usertag&usertag=<?php echo $val['tag_name']; ?>"><?php echo $val['tag_name']; ?></a></span>
		
<?php } } ?>
  </li>
	  
<?php } else { ?>  设置自己的标签，<a href="index.php?mod=user_tag" target="_blank">点此添加</a>
	  
<?php } ?>
</ul>
	<!---属于我/TA的标签--><?php } elseif($code == 'refresh') { ?><!-- 可能感兴趣的人 -->
	<div id="interestUid">
	  <!-- 
<?php if($member_list) { ?>
 -->
	  <ul class="followList" style="overflow:hidden">
		<!-- 
<?php if(is_array($member_list)) { foreach($member_list as $val) { ?>
 -->
		<li class="pane" id="follow_user_<?php echo $val['uid']; ?>">
		  <div class="fBox_l"><img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_right_user',<?php echo $val['uid']; ?>);" onmouseout="clear_user_choose();"/> </div>
		 
		  <div class="fBox_R "> <span class="name"><a href="index.php?mod=<?php echo $val['username']; ?>"><?php echo $val['nickname']; ?></a><?php echo $val['validate_html']; ?></span> 
		  <span id="follow_<?php echo $val['uid']; ?>"> 	<?php echo $val['follow_html']; ?> </span> 
		  
		  
<?php if($refresh_type == 'follow') { ?>
		  <span class="ff_1">我 关注的<?php echo $val['count']; ?>人关注<?php echo $val['gender_ta']; ?></span>
		  <?php } elseif($refresh_type == 'tag') { ?>  <span class="ff_1">我和<?php echo $val['gender_ta']; ?>有<?php echo $val['count']; ?>个共同话题</span>
		  <?php } elseif($refresh_type == 'user_tag') { ?>  <span class="ff_1">我和<?php echo $val['gender_ta']; ?>有<?php echo $val['count']; ?>个共同标签</span>
		  <?php } elseif($refresh_type == 'city') { ?>  <span class="ff_1"><?php echo $val['gender_ta']; ?>和我同在一个城市</span>
		  <?php } elseif($refresh_type == 'college') { ?>  <span class="ff_1"><?php echo $val['gender_ta']; ?>和我同在一个学校</span>
		  
<?php } ?>
  </div>
 		<div id="user_<?php echo $val['uid']; ?>_right_user" class="layS"></div>
		</li>
		
		<div id="alert_follower_menu_<?php echo $val['uid']; ?>"></div>
		<div id="Pmsend_to_user_area"></div>
		<div id="global_select_<?php echo $val['uid']; ?>" class="alertBox alertBox_2" style="display:none"></div>
		<div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);"></div>
		<!-- 
<?php } } ?>
 -->
	  </ul>
	 <p class="r_replace"><a href="javascript:viod(0);" onclick="right_show_ajax('<?php echo $my_id; ?>','refresh','refresh'); return false;">换一换</a></p>
	  <!-- 
<?php } ?>
 -->
	</div>
	<!-- 可能感兴趣的人--><?php } elseif($code == 'hot_tag') { ?><!--热门推荐话题-->
<?php if(is_array($hot_tag_recommend['list'])) { foreach($hot_tag_recommend['list'] as $val) { ?>
	<li> 
	  <a href="index.php?mod=tag&code=<?php echo $val['name']; ?>" target="_blank"><?php echo $val['name']; ?></a>

	  
<?php if($val['desc']) { ?>
	  	<div class="rught_tj_box"><span><?php echo $val['desc']; ?></span></div>
	  
<?php } ?>
 
	 </li>
	
<?php } } ?>
<!--热门推荐话题--><?php } elseif($code == 'to_user_info') { ?><!--关于他的信息-->
<?php if($member['aboutme']) { ?>
	<li>&nbsp;<?php echo $member['aboutme']; ?></li>
<?php } else { ?><li>这家伙很懒，什么也没有留下。</li>
	
<?php } ?>
<!--关于他的信息--><?php } elseif($code == 'to_user_event') { ?><!--他参与的活动-->
<?php if($to_user_event) { ?>
<?php if(is_array($to_user_event)) { foreach($to_user_event as $val) { ?>
		<li>
			<a href="index.php?mod=event&code=detail&id=<?php echo $val['id']; ?>" title="点此查看活动详情" target="_blank"><?php echo $val['title']; ?></a>
		</li>
	
<?php } } ?>
<?php } ?>
<!--他参与的活动-->
	
	
	
<?php } ?>
<?php if($code == 'recommend_user') { ?>
		<!--人气用户推荐-->
<?php if(is_array($recommend_user_list)) { foreach($recommend_user_list as $val) { ?>
			<li> 
				<a href="index.php?mod=<?php echo $val['username']; ?>" target="_blank">
					<img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" class="manface" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user',<?php echo $val['uid']; ?>)" onmouseout="clear_user_choose()"/>
				</a> 
				<b><a href="index.php?mod=<?php echo $val['username']; ?>" target="_blank"><?php echo $val['nickname']; ?></a></b> <!--
设置分组 设置备注  点击关注触发分组 私信  @谁  拉黑  头像悬浮  操作框
-->
<div id="user_<?php echo $val['uid']; ?>_user"></div>
<div id="alert_follower_menu_<?php echo $val['uid']; ?>"></div>
<div id="global_select_<?php echo $val['uid']; ?>" class="alertBox alertBox_2" style="display:none"></div>
<div id="get_remark_<?php echo $val['uid']; ?>" ></div>
<div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);"></div>
<div id="Pmsend_to_user_area"></div> 
			</li>
			
<?php } } ?>
<!--人气用户推荐-->
	
<?php } ?>

<?php if($code == 'user_follow') { ?>
	<!--TA关注的人-->
<?php if(is_array($user_follow_list)) { foreach($user_follow_list as $val) { ?>
		<li> 
			<img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" class="manface" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user',<?php echo $val['uid']; ?>)" onmouseout="clear_user_choose()"/> 
			<b><?php echo $val['nickname']; ?></b>
			<b><?php echo $val['follow_html']; ?></b> 
		</li><!--
设置分组 设置备注  点击关注触发分组 私信  @谁  拉黑  头像悬浮  操作框
-->
<div id="user_<?php echo $val['uid']; ?>_user"></div>
<div id="alert_follower_menu_<?php echo $val['uid']; ?>"></div>
<div id="global_select_<?php echo $val['uid']; ?>" class="alertBox alertBox_2" style="display:none"></div>
<div id="get_remark_<?php echo $val['uid']; ?>" ></div>
<div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);"></div>
<div id="Pmsend_to_user_area"></div>
		
<?php } } ?>
<p class="m_m2"><a href="index.php?mod=<?php echo $member['username']; ?>&code=follow">更多&gt;&gt;</a></p>
	<!--TA关注的人-->
	
<?php } ?>