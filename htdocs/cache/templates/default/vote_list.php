<?php /* 2015-07-27 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?>
<?php if(is_array($vote_list)) { foreach($vote_list as $val) { ?>
<div id="topic_list_25">
<div class="feedCell vote_list" id="topic_list_25"> 
	<div class="avatarL"> 
		<div class="avatar">
			<a href="index.php?mod=vote&view=me&uid=<?php echo $val['uid']; ?>"><img src="<?php echo $members[$val['uid']]['face']; ?>" /></a>
		</div>
		<div class="vText"><a href="index.php?mod=vote&view=me&uid=<?php echo $val['uid']; ?>"><?php echo $members[$val['uid']]['nickname']; ?><?php echo $members[$val['uid']]['validate_html']; ?></a></div>
	</div>
	<div id="user_25_user"></div>
	<div id="Pmsend_to_user_area" style="width:430px; display:none"></div>
	<div id="global_select_4" class="alertBox" style="display:none"></div>
	<div class="Contant">
	<div id="topic_lists_25" style="_overflow:hidden">
	<div class="oriTxt">
		<p class="vote_l_1">
		<span><a title="<?php echo $val['subject']; ?>" href="index.php?mod=vote&code=view&vid=<?php echo $val['vid']; ?>" target="_blank" ><?php echo $val['subject']; ?></a><span>
<?php if($val['is_expiration']) { ?>
			<span style="color:#666;">(已结束)</span>
		
<?php } ?>

<?php if($val['is_vote']) { ?>
			<span  style="color:#00CC00;">(已投票)</span>
		
<?php } ?>
</p>
		<p style="font-size:12px; color:#666;" class="vote_l_1">
<?php if(is_array($val['vote_show'])) { foreach($val['vote_show'] as $it => $item) { ?>
<?php if($it<$val['vi_count']) { ?>
<img src="templates/default/images/accept.png" />
<?php } else { ?><input type="<?php echo $val['input_type']; ?>" disabled="disabled"/>
<?php } ?>
 <?php echo $item; ?>
			<br />
			
<?php } } ?>
...
		</p>
		<div class="vote_num"><b><?php echo $val['voter_num']; ?></b></div>
	</div>
	<div class="from">
	<div class="option"></div>
	<div class="mycome">
	<span style="color:#666;">最后更新时间：<?php echo $val['last_update_time']; ?></span>
	<span style="margin-left:5px;"><a href="index.php?mod=vote&code=view&vid=<?php echo $val['vid']; ?>" target="_blank" >查看投票&rsaquo;&rsaquo;</a></span>
	</div>

</div>        
</div>
</div>
</div>
</div>
<?php } } ?>
<?php if($page_arr['html']) { ?>
<div class="pageStyle">
<li><?php echo $page_arr['html']; ?></li>
</div>
<?php } ?>