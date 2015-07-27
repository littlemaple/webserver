<?php /* 2011-12-28 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?><div class="setupTag_list02" style="padding:0;">
  <ul class="tagList">
  
<?php if(is_array($user_tag_fields)) { foreach($user_tag_fields as $val) { ?>
    <li onmouseout="this.className='';" onmouseover="this.className='bg';" class="" id="del_id_<?php echo $val['tag_id']; ?>">
	<a class="a1" href="index.php?mod=search&code=usertag&usertag=<?php echo $val['tag_name']; ?>"><?php echo $val['tag_name']; ?></a>
	<a class="a2" onclick="del_tag('<?php echo $val['tag_id']; ?>');return false;" href="javascript:;"><img src="templates/default/images/transparent.gif" title="删除标签"></a>
	</li>
	
<?php } } ?>
  </ul>
</div>