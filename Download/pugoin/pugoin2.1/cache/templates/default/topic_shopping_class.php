<?php /* 2011-12-28 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?><div class="top_tags">
	<ul class="top_tags_bd clearfix">
<?php if(is_array($class_list)) { foreach($class_list as $val) { ?>
<?php $classcounts++; ?>
<?php if($classcounts == 1) { ?>
		<li class="c3">
<?php } else { ?><li class="c2">
		
<?php } ?>
<span><?php echo $val['classname']; ?></span>
			<p class="list_w">
<?php if(is_array($val['sub_class_list'])) { foreach($val['sub_class_list'] as $iv) { ?>
<?php if($iv['type']=='green' ) { ?>
					<a class="h" href="index.php?mod=topic&code=shopping&cls=<?php echo $iv['id']; ?>" title="<?php echo $iv['name']; ?>"><?php echo $iv['name']; ?></a>
<?php } else { ?><a href="index.php?mod=topic&code=shopping&cls=<?php echo $iv['id']; ?>" title="<?php echo $iv['name']; ?>"><?php echo $iv['name']; ?></a>
					
<?php } ?>
<?php } } ?>
</p>
			</p>
		</li>
		
<?php } } ?>
</ul>
</div>