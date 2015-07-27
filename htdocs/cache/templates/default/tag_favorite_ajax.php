<?php /* 2015-07-27 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?>
<?php if(is_array($my_favorite_tags)) { foreach($my_favorite_tags as $val) { ?>
<span id="favorite_<?php echo $val['tag']; ?>">
 <a href="index.php?mod=tag&code=<?php echo $val['tag']; ?>" target="_blank"><?php echo $val['tag']; ?></a>
 <a href="javascript:void(0);" onclick="favoriteTag('<?php echo $val['tag']; ?>','delete');return false;" title="取消关注">x</a>
</span>
<?php } } ?>