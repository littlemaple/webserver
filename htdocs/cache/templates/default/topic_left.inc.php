<?php /* 2015-07-27 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?><script language="javascript">
	$(document).ready(function(){
		/*
		* ajax 右侧显示数据
		* 这里的函数可以随便更改位置，加载的顺序也会不同。
		*/
		if(<?php echo MEMBER_ID; ?>)
		{
			get_my_user_tag(); 
			get_myfavoritetags();
		}
		
	});
	function get_my_user_tag(){
		//我的个人标签
		right_show_ajax('<?php echo MEMBER_ID; ?>','user_tag','user_tag');
	}
	function get_myfavoritetags(){
		//我关注的话题
		right_show_ajax('<?php echo MEMBER_ID; ?>','myfavoritetags','myfavoritetags');
	}
</script>


<!--网站开启三栏后 显示左边  关于我的信息-->

<div class="t_col_main_ln <?php echo $t_col_main_lb; ?>">
<script type="text/javascript">
	$(document).ready(function(){
		$(".member_exp").mouseover(function(){$(".member_exp_c").show();});
		$(".member_exp").mouseout(function(){$(".member_exp_c").hide();});
		$("#m_avatar2").mouseover(function(){$(".avatar_tips").show();});
		$("#m_avatar2").mouseout(function(){$(".avatar_tips").hide();});
	});
</script>
<!--用户头像等信息-->
<?php if($my_member || $member) { ?>
<?php $_mymember = $my_member ? $my_member : $member ?>
<?php if((MEMBER_ID == $_mymember['uid'] || $this->Code > 0) ) { ?>
	<div class="sideBox">
		<div class="avatar2" id="m_avatar2">
			<p class="avatar2_i"><a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="<?php echo $_mymember['username']; ?>">
			<img src="<?php echo $_mymember['face']; ?>" alt="<?php echo $_mymember['nickname']; ?>" onerror="javascript:faceError(this);" />
			</a></p>
			<p class="avatar_tips"><a id="avatar_upload" href="index.php?mod=settings&code=face">上传头像</a></p>
		
		</div>
		
		
		<div class="avatar2_info">
		<a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="@<?php echo $_mymember['nickname']; ?>"><?php echo $_mymember['nickname']; ?></a><?php echo $_mymember['validate_html']; ?>
		<?php echo $this->hookall_temp['global_user_extra1']; ?>

		<div class="member_exp">
			 
<?php if($this->Config['level_radio']) { ?>
<?php if($this->Config['topic_level_radio']) { ?>
						 <a href="index.php?mod=settings&code=exp" target="_blank" class="ico_level wbL<?php echo $_mymember['level']; ?>"><em><?php echo $_mymember['level']; ?></em></a>
				
<?php } ?>
 
<?php } ?>
<?php if($_mymember['credits']) { ?>
积分：<a title="点击查看我的积分" href="index.php?mod=settings&code=extcredits"><b><?php echo $_mymember['credits']; ?></b></a>
<?php } ?>
</div>
		
		<div id="userarea">
<?php if(trim($_mymember['from_area'])) { ?>
		<?php echo $_mymember['from_area']; ?>
<?php } else { ?><div class="edit_sign"><a href="#" onclick="follower_choose(<?php echo $_mymember['uid']; ?>,'<?php echo $_mymember['nickname']; ?>','editarea'); return false;">编辑注册地址</a></div>
		
<?php } ?>
</div>
		<?php echo $this->hookall_temp['global_user_extra2']; ?>
	</div>
		<div class="edit_sign">
<?php $member_signature = cut_str($_mymember['signature'],20); ?>
<?php if($_mymember['uid'] == MEMBER_ID ) { ?>
			<a href="javascript:viod(0);"onclick="follower_choose(<?php echo $_mymember['uid']; ?>,'<?php echo $_mymember['nickname']; ?>','topic_signature'); return false;" >
			<span ectype="user_signature_ajax_left_<?php echo $_mymember['uid']; ?>">
				<span  title="个人签名：<?php echo $_mymember['signature']; ?>">
<?php if($_mymember['signature']) { ?>
(<?php echo $member_signature; ?>)
<?php } else { ?>编辑个人签名
<?php } ?>
</span>
			</span>
			</a>
<?php } else { ?><span  title="个人签名：<?php echo $_mymember['signature']; ?>">(<?php echo $member_signature; ?>)</span>
		
<?php } ?>
<?php echo $this->hookall_temp['global_user_extra3']; ?>
		</div>
	</div>
	
<?php } ?>
<div class="sideBox">
		<div class="person_atten_l">
			<p><span class="num"><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=follow" title="<?php echo $_mymember['nickname']; ?>关注的"><?php echo $_mymember['follow_count']; ?></a></span></p>
			<p><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=follow" title="<?php echo $_mymember['nickname']; ?>关注的">关注</a> </p>
		</div>
		<div class="person_atten_l">
			<p><span class="num"><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=fans" title="关注<?php echo $_mymember['nickname']; ?>的"><?php echo $_mymember['fans_count']; ?></a></span></p>
			<p><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=fans" title="关注<?php echo $_mymember['nickname']; ?>的">粉丝</a> </p>
		</div>
		<div class="person_atten_r">
			<p><span class="num"><a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="<?php echo $_mymember['nickname']; ?>的分享"><?php echo $_mymember['topic_count']; ?></a></span></p>
			<p><a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="<?php echo $_mymember['nickname']; ?>的分享">分享</a> </p>
		</div>
		<?php echo $this->hookall_temp['global_user_extra4']; ?>
	</div>
<?php } ?>
<!------用户头像等信息------->


<!------用户勋章信息------->

<script type="text/javascript">
$(document).ready(function(){
	$(".sina_weibo").mouseover(function(){$(".sina_weibo_c").show();});
	$(".sina_weibo").mouseout(function(){$(".sina_weibo_c").hide();});
	$(".qqwb").mouseover(function(){$(".qqwb_c").show();});
	$(".qqwb").mouseout(function(){$(".qqwb_c").hide();});
	$(".qqim").mouseover(function(){$(".qqim_c").show();});
	$(".qqim").mouseout(function(){$(".qqim_c").hide();});
	$(".tel").mouseover(function(){$(".tel_c").show();});
	$(".tel").mouseout(function(){$(".tel_c").hide();});
<?php if(is_array($medal_list)) { foreach($medal_list as $v) { ?>
		$(".medal_<?php echo $v['id']; ?>").mouseover(function(){$(".medal_c_<?php echo $v['id']; ?>").show();});
		$(".medal_<?php echo $v['id']; ?>").mouseout(function(){$(".medal_c_<?php echo $v['id']; ?>").hide();});
	
<?php } } ?>
});
</script>

<ul class="Vimg">
<?php if('tag'!=$this->Get['mod'] || $_mymember['style_three_tol'] == 1) { ?>
<?php if($this->Config['sina_enable'] && sina_weibo_init($this->Config)) { ?>
	<li class="sina_weibo">
<?php echo sina_weibo_bind_icon($_mymember['uid']); ?>
 &nbsp; 
		<div class="sina_weibo_c">
			<div class="VM_box">
				<div class="VM_top">
					<div class="med_img"><img src="./templates/default/images/medal/M_sina.gif"></div>
					<div class="med_intro">
						<p>新浪微博</p>
						 绑定后，可以使用新浪微博帐号进行登录，在本站发的微博可以同步发到新浪微博<br />
<?php $sina_return  = sina_weibo_has_bind($member['uid']); ?>
<?php if(!$sina_return) { ?>
						<a href="index.php?mod=tools&code=sina">绑定新浪微博</a> |
						
<?php } ?>
<a target="_blank" href="index.php?mod=settings&code=user_medal">查看我的勋章</a>
					</div>
				</div>
			</div>
		</div>		
	</li>
	
<?php } ?>
<?php if($this->Config['qqwb_enable'] && qqwb_init($this->Config)) { ?>
	<li class="qqwb">
<?php echo qqwb_bind_icon($_mymember['uid']); ?>
 &nbsp; 
		<div class="qqwb_c">
			<div class="VM_box">
				<div class="VM_top">
					<div class="med_img"><img src="./templates/default/images/medal/qqwb.png"></div>
					<div class="med_intro">
						<p>腾讯微博</p>
						 绑定后，可以使用腾讯微博帐号进行登录，在本站发的微博可以同步发到腾讯微博<br />
<?php $qqwb_return  = qqwb_bind_icon($member['uid']); ?>
<?php if(!$qqwb_return) { ?>
						<a href="index.php?mod=tools&code=qqwb">绑定腾讯微博</a> |
						
<?php } ?>
<a target="_blank" href="index.php?mod=settings&code=user_medal">查看我的勋章</a>
					</div>
				</div>
			</div>
		</div>
	</li>
	
<?php } ?>
<?php if($this->Config['imjiqiren_enable'] && imjiqiren_init($this->Config)) { ?>
	<li class="qqim">
<?php echo imjiqiren_bind_icon($_mymember['uid']); ?>
 &nbsp; 
		<div class="qqim_c">
			<div class="VM_box">
				<div class="VM_top">
					<div class="med_img"><img src="./templates/default/images/medal/M_qq.gif"></div>
					<div class="med_intro">
					<p>QQ机器人</p>
					用自己的QQ发微博、通过QQ签名发微博，如果有人@你、评论你、关注你、给你发私信，你都可以第一时间收到QQ机器人的通知<br />
<?php $imjiqiren_return  = imjiqiren_has_bind($member['uid']); ?>
<?php if(!$imjiqiren_return) { ?>
					<a href="index.php?mod=tools&code=imjiqiren">绑定QQ机器人</a> |
					
<?php } ?>
<a target="_blank" href="index.php?mod=settings&code=user_medal">查看我的勋章</a>
					</div>
				</div>
			</div>
		</div>
	</li>
	
<?php } ?>
<?php if($this->Config['sms_enable'] && sms_init($this->Config)) { ?>
	<li class="tel">
<?php echo sms_bind_icon($_mymember['uid']); ?>
 &nbsp; 
		<div class="tel_c">
			<div class="VM_box">
				<div class="VM_top">
					<div class="med_img"><img src="./templates/default/images/medal/Tel.gif"></div>
					<div class="med_intro">
					<p>手机短信</p>
					用自己的手机发微博、通过手机签名发微博，如果有人@你、评论你、关注你、给你发私信，你都可以第一时间收到手机短信的通知<br />
<?php $sms_return  = sms_has_bind($_mymember['uid']); ?>
<?php if(!$sms_return) { ?>
					<a href="index.php?mod=tools&code=sms">绑定手机短信</a> |
					
<?php } ?>
<a target="_blank" href="index.php?mod=settings&code=user_medal">查看我的勋章</a>
					</div>
				</div>
			</div>
		</div>
	</li>
	
<?php } ?>
<?php } ?>
<?php if($member['validate'] || $medal_list) { ?>
<?php if(is_array($medal_list)) { foreach($medal_list as $val) { ?>
<?php $medal_type = unserialize($val['conditions']); ?>
<li class="medal_<?php echo $val['id']; ?>"><a href="index.php?mod=other&code=medal" target="_blank"><img src="<?php echo $val['medal_img']; ?>"/></a> &nbsp; 
		<div class="medal_c medal_c_<?php echo $val['id']; ?>">
			<div class="VM_box">
				<div class="VM_top">
				<div class="med_img"><img src="<?php echo $val['medal_img']; ?>"/></div>
					<div class="med_intro">
					<p><?php echo $val['medal_name']; ?></p>
					<?php echo $val['medal_depict']; ?> <br />
<?php if(MEMBER_ID != $member['uid']) { ?>
(他于：<?php echo $val['dateline']; ?> 获得) <br />
<?php if($medal_type['type'] == 'topic') { ?>
					<a href="index.php?mod=topic&code=myhome" target="_blank">我要发分享</a> |<?php } elseif($medal_type['type'] == 'reply') { ?><a href="index.php?mod=topic&code=new" target="_blank">我要发评论</a> |<?php } elseif($medal_type['type'] == 'tag') { ?><a href="index.php?mod=tag&code=<?php echo $medal_type['tagname']; ?>" target="_blank">我要发话题</a> |<?php } elseif($medal_type['type'] == 'invite') { ?><a href="index.php?mod=profile&code=invite" target="_blank">马上去邀请好友</a> |<?php } elseif($medal_type['type'] == 'shoudong') { ?>管理员手动发放  |	
					
<?php } ?>
<?php } else { ?>(我于：<?php echo $val['dateline']; ?> 获得) <br />
					
<?php } ?>
<a target="_blank" href="index.php?mod=settings&code=user_medal">查看我的勋章</a>
					</div>
				</div>
			</div>
		</div>
	</li>
	
<?php } } ?>
<?php } ?>
</ul>   
<!------用户勋章信息------->
<?php if(MEMBER_ID == $_mymember['uid']) { ?>
<?php if($_mymember['face'] == './images/no.gif') { ?>
		<div class="sideBox Rlot" style="padding-top:18px;"> <a href="index.php?mod=settings&code=face"><img src="templates/default/images/setmyablum.gif" /></a> </div>
	
<?php } ?>

<?php if(in_array($this->Code,array('myhome','myfavorite','favoritemy','mycomment','tocomment','myat','myblog')) || $params['code'] == 'myblog' || $_mymember['style_three_tol'] == 1) { ?>
  

	<div class="blackBox"></div>
		<ul class="boxRNav2">
<?php if(in_array($this->Code,array('myhome','tag','groupview'))) { ?>
  
			<li class="index current"> 
<?php } else { ?><li class="index">
			
<?php } ?>
<a href="index.php?mod=topic&code=myhome" hidefocus="true" title="我的首页">我的首页</a>
			</li>
<?php if($params['code'] == 'myblog') { ?>
  
			<li class="mypub current"> 
<?php } else { ?><li class="mypub">
			
<?php } ?>
<a href="index.php?mod=<?php echo $_mymember['username']; ?>" hidefocus="true" title="我的分享">我的分享</a>
			</li>

		<script type="text/javascript">
		$(document).ready(function(){
			var objSt = ".myfav";
			$(objSt).mouseover(function(){$(objSt + " i").show();});
			$(objSt).mouseout(function(){$(objSt + " i").hide();});
		});
		</script>
<?php if('myfavorite'== $this->Code) { ?>
	
		<li class="myfav current"> 
<?php } else { ?><li class="myfav">
		
<?php } ?>
<a href="index.php?mod=topic&code=myfavorite" hidefocus="true" title="我的收藏">我的收藏</a>
			<i class="anoTh" onclick="window.location.href='index.php?mod=topic&code=favoritemy'" title="收藏我的">收藏我的</i>
		</li>

		<script type="text/javascript">
		$(document).ready(function(){
			var objSt = ".letter";
			$(objSt).mouseover(function(){$(objSt + " i").show();});
			$(objSt).mouseout(function(){$(objSt + " i").hide();});
		});
		</script>
<?php if('mycomment'== $this->Code) { ?>
	
		<li class="letter current"> 
<?php } else { ?><li class="letter">
		
<?php } ?>
<a href="index.php?mod=topic&code=mycomment" hidefocus="true" title="评论我的">评论我的</a>
			<i class="anoTf" onclick="window.location.href='index.php?mod=topic&code=tocomment'" title="我评论的">我评论的</i>
		</li>
<?php if('myat'== $this->Code) { ?>
		<li class="about current"> 
<?php } else { ?><li class="about">
		
<?php } ?>
<a href="index.php?mod=topic&code=myat" hidefocus="true" title="提到我的">提到我的</a>
		</li>

		<script type="text/javascript">
		$(document).ready(function(){
		var objSl = ".mailBox";
			$(objSl).mouseover(function(){$(objSl + " i").show();});
			$(objSl).mouseout(function(){$(objSl + " i").hide();});
		});
		</script>
		<li class="mailBox">
			<a href="index.php?mod=vote&view=me&filter=created&uid=<?php echo $uid; ?>" hidefocus="true" title="我的投票">我的投票</a>
			<i class="anoTv" onclick="window.location.href='index.php?mod=vote&view=me&filter=joined&uid=<?php echo $uid; ?>'" title="我参与的投票">我参与的</i>
		</li>

		<script type="text/javascript">
		    $(document).ready(function(){
		    var objSA = ".actBox";
			$(objSA).mouseover(function(){$(objSA + " i").show();});
			$(objSA).mouseout(function(){$(objSA + " i").hide();});
			});
		</script>
		<!-- 
<?php $event_setting=ConfigHandler::get('event_setting') ?>
 -->
		<!-- 
<?php if($event_setting == 1) { ?>
 -->
        <li class="actBox">
        <a href="index.php?mod=event&code=myevent" hidefocus="true" title="我的活动">我的活动</a>
		<i class="anoTv" onclick="window.location.href='index.php?mod=event&code=myevent&type=part&uid=<?php echo $uid; ?>'" title="我参与的活动">我参与的</i>
		</li>
		<!-- 
<?php } ?>
 -->
<?php $navigation_config=ConfigHandler::get('navigation') ?>
<?php if(!empty($navigation_config['pluginmenu'])) { ?>
		 
<?php if(is_array($navigation_config['pluginmenu'])) { foreach($navigation_config['pluginmenu'] as $pmenus) { ?>
		 
<?php if(is_array($pmenus)) { foreach($pmenus as $pmenu) { ?>
		  
<?php if($pmenu['type'] == 3) { ?>
		  
<?php if('topic'==$this->require) { ?>
		  <li class="mypub current">
		  
<?php } else { ?>  <li class="mypub">
		  
<?php } ?>
  <a href="<?php echo $pmenu['url']; ?>&require=topic" hidefocus="true" title="<?php echo $pmenu['name']; ?>"><?php echo $pmenu['name']; ?></a></li>
		   
<?php } ?>
 
<?php } } ?>
 
<?php } } ?>
 
<?php } ?>
      </ul>
      <div class="blackBox2"></div>
	
<?php } ?>
<?php } ?>
<!-------------------------关于我的信息-------------------------------->
<?php if(MEMBER_ID == $_mymember['uid'] ) { ?>
<?php if(in_array($this->Code,array('myhome','myfavorite','favoritemy','mycomment','tocomment','myat'))   || $_mymember['style_three_tol'] == 1) { ?>
  

		<script type="text/javascript">
		$(document).ready(function(){
			$(".SC_guanyu").click(function(){$(this).parent().toggleClass("fold_guanyu");$(".SC_guanyu_box").toggle();});
		});
		</script>
		<div class="SC">
			<h3>关于<?php echo $_mymember['nickname']; ?><a class="btn SC_guanyu" href="javascript:void(0)"></a></h3>
			<ul class="FTL SC_guanyu_box">
<?php if($_mymember['aboutme']) { ?>
				<li>&nbsp;<?php echo $_mymember['aboutme']; ?></li><?php } elseif(MEMBER_ID==$_mymember['uid'] && !$_GET['mod_original']) { ?><li><a href="index.php?mod=settings">快来写一句话</a>，向大家介绍一下吧</li>
<?php } else { ?>这家伙很懒，什么都没留下。
				
<?php } ?>
</ul>
		</div>
		
		<!--我的标签-->
<?php if(MEMBER_ID > 0) { ?>
			<script type="text/javascript">
				$(document).ready(function(){
					$(".SC_biaoqian").click(function(){$(this).parent().toggleClass("fold_biaoqian");$(".SC_biaoqian_box").toggle();});
				});
			</script>
			<div class="SC">
			<h3>我的标签
				<a class="btn SC_biaoqian" href="javascript:void(0);" onclick="right_show_ajax('<?php echo MEMBER_ID; ?>','user_tag','user_tag'); return false;"></a>
			</h3>
			<ul class="FTL SC_biaoqian_box">
				<div id="<?php echo MEMBER_ID; ?>_user_tag"></div>
			</ul>
			</div>
			
<?php } ?>
  
		<!--我的标签-->
<?php if(!$tag) { ?>
			<!--我关注的话题-->
<?php if(MEMBER_ID > 0) { ?>
			<script type="text/javascript">
				$(document).ready(function(){
					$(".SC_woguanzhu").click(function(){$(this).parent().toggleClass("fold_woguanzhu");$(".SC_woguanzhu_box").toggle();});
				});
			</script>
			<div class="SC">
			<h3>我关注的话题<a class="btn SC_woguanzhu" href="javascript:void(0);" onclick="right_show_ajax('<?php echo MEMBER_ID; ?>','myfavoritetags','myfavoritetags')"></a></h3>
			<ul class="FTL SC_woguanzhu_box">
				<div id="<?php echo MEMBER_ID; ?>_myfavoritetags"></div>
			</ul>
			</div>
			
<?php } ?>
<!--我关注的话题-->
		
<?php } ?>
<?php } ?>
<?php } ?>
<!-------------------------关于我的信息-------------------------------->

</div>