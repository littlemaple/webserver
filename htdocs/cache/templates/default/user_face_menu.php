<?php /* 2015-07-27 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?>

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