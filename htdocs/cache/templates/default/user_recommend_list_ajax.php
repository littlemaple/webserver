<?php /* 2015-07-27 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?><ul class="vg_short">
	<!-- 
<?php if(is_array($member_list)) { foreach($member_list as $val) { ?>
 -->
	<li>
		<a title="强阿星的美好生活" href="index.php?mod=<?php echo $val['username']; ?>">
			<img title="" alt="" src="<?php echo $val['face_original']; ?>" class="long_img">
		</a>
		<div class="vg_txtc contents">
			<h4 class="fl"><a title="<?php echo $val['nickname']; ?>" href="index.php?mod=<?php echo $val['username']; ?>"><?php echo $val['nickname']; ?></a></h4>
		</div>
		<div class="vg_txtc contents">
			<span class="fl" style="display:none ">
				人气：<em>1</em>
			</span>
			<span>
				粉丝：<em><?php echo $val['fans_count']; ?></em>
			</span>
		</div>
	</li>
	<!-- 
<?php } } ?>
 -->
	
</ul>