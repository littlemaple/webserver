<?php /* 2015-07-27 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?><script type="text/javascript">
$(document).ready(function(){
var objStr1 = "#topic_lists_<?php echo $val['tid']; ?>_a";
var objStr2 = "#topic_lists_<?php echo $val['tid']; ?>_b";
$(objStr1).mouseover(function(){$(objStr2).show();});
$(objStr1).mouseout(function(){$(objStr2).hide();});
});
</script>

<div class="from"> 
<div class="option">
<!--不是群内成员无法对群内的微博进行操作-->
<ul>
<?php $tpid=$val['top_parent_id']; if ($tpid&&$parent_list[$tpid]) $root_type=$parent_list[$tpid]['type']; ?>
<?php if((!isset($root_type)) || (isset($root_type) && in_array($root_type, get_topic_type('forward')))) { ?>
	<li>
	  <!--转发的判断 Begin-->
	  
<?php if(in_array($val['type'], get_topic_type('forward')) || $this->Module=='qun') { ?>
	  
<?php $not_allow_forward=0; ?>
<span 
<?php if(MEMBER_ID <1 ) { ?>
 onclick="ShowLoginDialog();" 
<?php } ?>
>
			<a href="javascript:void(0);" onclick="get_forward_choose(<?php echo $val['tid']; ?>);" style="cursor:pointer;">转发
<?php if($val['forwards']) { ?>
(<?php echo $val['forwards']; ?>)
<?php } ?>
</a>
		</span>
	 
<?php } else { ?> 
<?php $not_allow_forward=1; ?>
 
<?php if(isset($val['fansgroup'])) { ?>
	  <span><?php echo $val['fansgroup']; ?></span>
	 
<?php } else { ?> <span title="设置了特殊的权限，不允许转发">转发</span>
	 
<?php } ?>
 
<?php } ?>
 <!--转发的判断 End-->
	</li>
	<li class="o_line_l">|</li>
<?php } else { ?><?php $not_allow_forward=1; ?>
<?php } ?>
<?php if(!$val['reply_disable']) { ?>
	<li>
		<span >
		<a id="topic_list_reply_<?php echo $val['tid']; ?>_aid" href="javascript:void(0)" 
<?php if(MEMBER_ID <1 ) { ?>
 onclick="ShowLoginDialog();" 
<?php } ?>
 onclick="replyTopic(<?php echo $val['tid']; ?>,'reply_area_<?php echo $val['tid']; ?>','<?php echo $val['replys']; ?>',<?php echo $not_allow_forward; ?>);return false;">评论
<?php if($val['replys']) { ?>
(<?php echo $val['replys']; ?>)
<?php } ?>
</a>
		</span>
	</li>
	
<?php } ?>
<li class="o_line_l">|</li>


	<li id="topic_lists_<?php echo $val['tid']; ?>_a" class="mobox">
		<a href="javascript:void(0)" class="moreti" ><span class="txt">更多</span><span class="more"></span></a> 
		<div id="topic_lists_<?php echo $val['tid']; ?>_b" class="molist" style="display:none">
<?php if('myfavorite'==$this->Code) { ?>
 
				<span id="favorite_<?php echo $val['tid']; ?>" 
<?php if(MEMBER_ID <1 ) { ?>
 onclick="ShowLoginDialog();" 
<?php } ?>
>
					<a href="javascript:void(0)" onclick="favoriteTopic(<?php echo $val['tid']; ?>,'delete');return false;">取消收藏</a>
				</span>
<?php } else { ?><span id="favorite_<?php echo $val['tid']; ?>" 
<?php if(MEMBER_ID < 1) { ?>
 onclick="ShowLoginDialog();" 
<?php } ?>
>
					<a href="javascript:void(0)" onclick="favoriteTopic(<?php echo $val['tid']; ?>,'add');return false;">收藏</a>
				</span> 
			
<?php } ?>
<?php if($this->Config['is_report'] || MEMBER_ID > 0) { ?>
			<span 
<?php if(MEMBER_ID <1 ) { ?>
 onclick="ShowLoginDialog();" 
<?php } ?>
><a href="javascript:void(0)" onclick="ReportBox('<?php echo $val['tid']; ?>')" title="举报不良信息">举报</a></span>
			
<?php } ?>
<?php if($val['uid']==MEMBER_ID || 'admin'==MEMBER_ROLE_TYPE) { ?>
<?php if($this->Code > 0  ||  in_array($this->Code,array('list_reply','do_add'))) $eid = 'reply_list'; else $eid = 'topic_list'  ?>
<a href="javascript:void(0)" onclick="deleteTopic(<?php echo $val['tid']; ?>,'<?php echo $eid; ?>_<?php echo $val['tid']; ?>');return false;">删除</a>
<?php $datetime = time(); $modify_time = $this->Config['topic_modify_time'] * 60 ?>
<?php if($datetime - $val['addtime'] < $modify_time || 'admin'==MEMBER_ROLE_TYPE ) { ?>
<?php if($val['replys'] <= 0 && $val['forwards'] <= 0 || 'admin'==MEMBER_ROLE_TYPE) { ?>
						<a href="javascript:void(0);" onclick="modifyTopic(<?php echo $val['tid']; ?>,'modify_topic_<?php echo $val['tid']; ?>','<?php echo $eid; ?>');return false;" style="cursor:pointer;">编辑</a>
					
<?php } ?>
<?php } ?>
<!--推荐开始 Begin-->
					<a href="javascript:void(0)" onclick="showTopicRecdDialog({'tid':'<?php echo $val['tid']; ?>','tag_id':'<?php echo $tag_id; ?>'});return false;">推荐</a>
				<!--推荐开始 End-->
				
			
<?php } ?>
</div>
	</li>
</ul>
</div> 
<div class="mycome">
<!-- <a href="index.php?mod=topic&code=<?php echo $val['tid']; ?>"><?php echo $val['dateline']; ?></a>  -->
<?php if(!$no_from) { ?>
<?php echo $val['from_html']; ?>
<?php } ?>
<?php echo $this->hookall_temp['global_topiclist_extra3']; ?>
</div>
<?php echo $this->hookall_temp['global_topiclist_extra4']; ?>
</div>