<?php /* 2015-07-27 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?><success></success>
<?php if($total_record > 0) { ?>
<div class="newTig" onclick="ajax_reminded('<?php echo $uid; ?>',1); return false;"><a href="#" onclick="ajax_reminded('<?php echo $uid; ?>',1); return false;">有新微博，点击查看</a></div>
<?php } ?>

<?php if($__my['comment_new']>0 || $__my['fans_new']>0 || $__my['at_new']>0 || $__my['newpm']>0 || $__my['favoritemy_new']>0 || $__my['vote_new']>0 || $__my['qun_new']>0 || $__my['event_new']>0 || $__my['event_post_new']>0 || $__my['fenlei_post_new']>0 || $__my['topic_new']>0) { ?>
    <script language="javascript">
        var tagBoxContentHTML = '';
        
<?php if($__my['newpm']>0) { ?>
        tagBoxContentHTML += '<li><a href="index.php?mod=pm&code=list"><?php echo $__my['newpm']; ?>条新私信，查看</a></li>';
        
<?php } ?>
        
<?php if($__my['comment_new']>0) { ?>
        tagBoxContentHTML += '<li><a href="index.php?mod=topic&code=mycomment"><?php echo $__my['comment_new']; ?>条新评论，查看</a></li>';
        
<?php } ?>
        
<?php if($__my['fans_new']>0) { ?>
        tagBoxContentHTML += '<li><a href="index.php?mod=<?php echo $__my['username']; ?>&code=fans"><?php echo $__my['fans_new']; ?>人关注了我，查看</a></li>';
        
<?php } ?>
        
<?php if($__my['at_new']>0) { ?>
        tagBoxContentHTML += '<li><a href="index.php?mod=topic&code=myat"><?php echo $__my['at_new']; ?>人@提到我，查看</a></li>';
        
<?php } ?>
        
<?php if($__my['favoritemy_new']>0) { ?>
        tagBoxContentHTML += '<li><a href="index.php?mod=topic&code=favoritemy"><?php echo $__my['favoritemy_new']; ?>人收藏了我的微博，查看</a></li>';
        
<?php } ?>

<?php if($__my['vote_new']>0) { ?>
		tagBoxContentHTML += '<li><a href="index.php?mod=vote&view=me&filter=new_update&uid=<?php echo $uid; ?>">投票新增<?php echo $__my['vote_new']; ?>人参与，查看</a></li>';
		
<?php } ?>

<?php if($__my['qun_new']>0) { ?>
		tagBoxContentHTML += '<li><a href="index.php?mod=topic&code=qun">微群新增<?php echo $__my['qun_new']; ?>条内容，查看</a></li>';
		
<?php } ?>
        
<?php if($__my['event_new']>0) { ?>
        tagBoxContentHTML += '<li><a href="index.php?mod=event&code=myevent&type=new">活动新增<?php echo $__my['event_new']; ?>人报名，查看</a></li>';
        
<?php } ?>
        
<?php if($__my['topic_new']>0) { ?>
          tagBoxContentHTML += '<li><a href="index.php?mod=topic&code=tag">话题新增<?php echo $__my['topic_new']; ?>条微博，查看</a></li>';
       	
<?php } ?>
           	
        
<?php if($__my['event_post_new']>0) { ?>
          tagBoxContentHTML += '<li><a href="index.php?mod=topic&code=other&view=event">新增<?php echo $__my['event_post_new']; ?>个关注的活动，查看</a></li>';
        
<?php } ?>
        
<?php if($__my['fenlei_post_new']>0) { ?>
          tagBoxContentHTML += '<li><a href="index.php?mod=topic&code=other&view=fenlei">新增<?php echo $__my['fenlei_post_new']; ?>个关注的分类信息，查看</a></li>';
        
<?php } ?>
            
        if(''!=tagBoxContentHTML)
        {
            tagBoxContentHTML = '<ul>' + tagBoxContentHTML + '</ul>';
            
            $('#tagBoxContent_<?php echo $uid; ?>').html(tagBoxContentHTML);
            $('#tagBox_<?php echo $uid; ?>').css({
                display: 'block',
                visibility: 'visible'
            });
        }
    </script>
<?php } ?>