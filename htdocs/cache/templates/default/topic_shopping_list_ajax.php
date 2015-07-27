<?php /* 2015-07-27 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?> <div class="vg_connbody">
    <span id="favCountMsg" class="fr"></span>            
	<div class="item_wrap">
		<ul class="item_list">
<?php if(is_array($topics)) { foreach($topics as $val) { ?>
<?php $counts++; ?>

<?php $imagecounts=0; ?>
<li class="vg_line">
<?php if($val['imageid'] && $val['image_list']) { ?>
<?php $val['image_key']=$val['tid'].'_'.random(6); ?>
<?php if(is_array($val['image_list'])) { foreach($val['image_list'] as $iv) { ?>
<?php $imagecounts++; ?>
<?php if($imagecounts == 1) { ?>
						<div class="item_photo">
<?php if($val['ShoppingPrice']) { ?>
							<span class="p"><span><b>¥</b><?php echo $val['ShoppingPrice']; ?></span></span>
							
<?php } ?>
<a target="_blank" title="" href="index.php?mod=topic&code=<?php echo $val['tid']; ?>">
								<img alt="" src="<?php echo $iv['image_original']; ?>" style="width: 200px;">
							</a>
						</div>
						
<?php } ?>
 
<?php } } ?>
<?php } ?>
<div class="favorite">
					<a href="javascript:void(0)" onclick="dig('<?php echo $val['tid']; ?>','digCount_<?php echo $val['tid']; ?>','favCountMsg');return false;" class="favaImg"></a>
					<span class="favCount">(<span id="digCount_<?php echo $val['tid']; ?>"><?php echo $val['digs']; ?></span>)</span>
					<a href="index.php?mod=topic&code=<?php echo $val['tid']; ?>" class="creply" target="_blank">评论(<?php echo $val['replys']; ?>)</a>
				</div>
				<div class="vg_line_solid"></div>
				<div class="ws_bd">
					<a href="index.php?mod=<?php echo $val['username']; ?>" target="_blank"><img alt="<?php echo $val['username']; ?>" class="avt fl" src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);"></a>
					<p>
					由<a target="_blank" href="index.php?mod=<?php echo $val['username']; ?>" class="n"><?php echo $val['nickname']; ?></a><span>分享</span>
					<br><span class="fca"><?php echo $val['dateline']; ?></span>
					</p>
				</div>
				<div class="tk">
					<p><?php echo $val['content']; ?>   <a href="index.php?mod=topic&code=<?php echo $val['tid']; ?>" class="creply" target="_blank">查看详细>></a></p>
				</div>
			</li>
<?php if($counts%5 == 0) { ?>
				</ul>
			</div>
			<div class="item_wrap">
				<ul class="item_list">
			
<?php } ?>
<?php } } ?>
</ul>
		</div>
		
   
        
</div>
<?php if($page_arr['html']) { ?>
<div class="pageStyle">
	<li><?php echo $page_arr['html']; ?></li>
</div>
<?php } ?>