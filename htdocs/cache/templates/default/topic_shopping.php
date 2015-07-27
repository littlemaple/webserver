<?php /* 2015-07-27 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?><!--Shopping Begin-->
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