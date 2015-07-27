<?php /* 2011-12-28 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?><span class="un">

<a title="点此查看<?php echo $val['nickname']; ?>的微博(@<?php echo $val['nickname']; ?>)" href="index.php?mod=<?php echo $val['username']; ?>" ><?php echo $val['nickname']; ?></a>
<?php if($val['validate_html']) { ?>
<?php echo $val['validate_html']; ?>&nbsp;
<?php } else { ?>
<?php if($this->Config['topic_level_radio']) { ?>
<span class="wb_l_level">
<a href="index.php?mod=settings&code=exp" target="_blank" class="ico_level wbL<?php echo $val['level']; ?>"><em><?php echo $val['level']; ?></em></a>
</span>
<?php } ?>
<?php } ?>
<?php if($this->Config['is_signature']) { ?>
<?php if(!$_GET['mod_original']) { ?>
<?php if($val['signature']) { ?>
<span class="signature">
<?php if($val['uid'] == MEMBER_ID ||  'admin' == MEMBER_ROLE_TYPE) { ?>
<a href="javascript:void(0);" onclick="follower_choose(<?php echo $val['uid']; ?>,'<?php echo $val['nickname']; ?>','topic_signature');" title="点击修改个人签名">
<em ectype="user_signature_ajax_<?php echo $val['uid']; ?>">(<?php echo $val['signature']; ?>)</em>
</a>
<?php } else { ?><em>(<?php echo $val['signature']; ?>)</em>
<?php } ?>
</span>
<?php } ?>
<?php } ?>
<?php } ?>
<?php echo $this->hookall_temp['global_topiclist_extra1']; ?>
</span>
<?php echo $this->hookall_temp['global_topiclist_extra2']; ?>