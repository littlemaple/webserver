<?php /* 2015-07-27 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?><div>
<div class="mainR">
<?php if($this->Config['ad_enable']) { ?>
  
<?php if('myhome'== $this->Code) { ?>
    
<?php if($this->Config['ad']['ad_list']['group_myhome']['middle_right']) { ?>
<div class="R_AD"> <?php echo $this->Config['ad']['ad_list']['group_myhome']['middle_right']; ?></div>	
<?php } ?>
  <?php } elseif('tag'== $this->Get['mod']) { ?>    
<?php if($this->Config['ad']['ad_list']['tag_view']['middle_right']) { ?>
<div class="R_AD"><?php echo $this->Config['ad']['ad_list']['tag_view']['middle_right']; ?></div>
<?php } ?>
  
<?php } ?>
<?php } ?>
<div id="topic_right_ajax_list">
	<!--两栏  三栏 显示判断  (style_three_tol != 1 两栏)-->
<?php if(MEMBER_STYLE_THREE_TOL != 1) { ?>
<script language="javascript">
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
		
<?php } ?>
<!--两栏  三栏 显示判断-->	
</div>
<?php $qun_setting = ConfigHandler::get('qun_setting'); ?>
  
<?php if(MEMBER_ID != $member['uid']) { ?>
	<script language="javascript">
		$(document).ready(function(){
		
		/*
		* ajax 右侧显示数据
		* 这里的函数可以随便更改位置，加载的顺序也会不同。
		*/
			
			//他关注的人
			get_user_follow();
			
			//属于他的标签
			get_to_user_tag();
<?php if($qun_setting['qun_open']) { ?>
				//他加入的群
				get_my_qun();
			
<?php } ?>
<?php $event_setting=ConfigHandler::get('event_setting') ?>
<?php if($event_setting['event_setting']) { ?>
				//他参与的活动
				get_to_user_event();
			
<?php } ?>
});
		
		function get_user_follow(){
			//他关注的人
			right_show_ajax('<?php echo $member['uid']; ?>','user_follow','user_follow');
		}
		function get_to_user_tag(){
			//属于他的标签
			right_show_ajax('<?php echo $member['uid']; ?>','to_user_tag','to_user_tag');
		}
		function get_my_qun(){
			right_show_ajax('<?php echo $member['uid']; ?>','my_qun','qun_box');
		}
		//他参加的活动
		function get_to_user_event()
		{
			right_show_ajax('<?php echo $member['uid']; ?>','to_user_event','to_user_event_box');
		}
		
	</script>

	<div id="topic_right_user_info">
<?php if(MEMBER_STYLE_THREE_TOL == 1) { ?>
		

		<div class="sideBox">
			<div class="person_atten_l">
				<p><span class="num"><a href="index.php?mod=<?php echo $member['username']; ?>&code=follow" title="<?php echo $member['nickname']; ?>关注的"><?php echo $member['follow_count']; ?></a></span></p>
				<p><a href="index.php?mod=<?php echo $member['username']; ?>&code=follow" title="<?php echo $member['nickname']; ?>关注的">关注</a> </p>
			</div>
			<div class="person_atten_l">
			<p><span class="num"><a href="index.php?mod=<?php echo $member['username']; ?>&code=fans" title="关注<?php echo $member['nickname']; ?>的"><?php echo $member['fans_count']; ?></a></span></p>
			<p><a href="index.php?mod=<?php echo $member['username']; ?>&code=fans" title="关注<?php echo $member['nickname']; ?>的">粉丝</a> </p>
			</div>
			<div class="person_atten_r">
				<p><span class="num"><a href="index.php?mod=<?php echo $member['username']; ?>" title="<?php echo $member['nickname']; ?>的微博"><?php echo $member['topic_count']; ?></a></span></p>
				<p><a href="index.php?mod=<?php echo $member['username']; ?>" title="<?php echo $member['nickname']; ?>的微博">微博</a> </p>
			</div>
		</div>
			
	
<?php } ?>
</div>
	<?php echo $this->hookall_temp['global_usernav_extra2']; ?>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$(".SC_guanyu").click(function(){$(this).parent().toggleClass("fold_guanyu");$(".SC_guanyu_box").toggle();});
		});
		</script>
		<div class="SC">
			<h3>关于<?php echo $member['nickname']; ?><a class="btn SC_guanyu" href="javascript:void(0)"></a></h3>
			<ul class="FTL SC_guanyu_box">
<?php if($member['aboutme']) { ?>
				<li>&nbsp;<?php echo $member['aboutme']; ?></li><?php } elseif(MEMBER_ID==$member['uid'] && !$_GET['mod_original']) { ?><li><a href="index.php?mod=settings">快来写一句话</a>，向大家介绍一下吧</li>
<?php } else { ?>这家伙很懒，什么都没留下。
				
<?php } ?>
</ul>
		</div>
		
	
			  
		<!--认证资料-->
<?php if($member['vip_info']) { ?>
		<div class="SC">
			<div style="width:160px; margin:7px auto; border:1px solid #CAD1B7; padding:10px; overflow:hidden; line-height:19px;">
				<div class="ico_vData"><?php echo $this->Config['site_name']; ?>认证资料</div>
				<p style="display:block;clear:both; margin-top:1px;"><span style="padding:3px;"><?php echo $member['vip_info']; ?></span></p>
			</div>
		</div>
		
<?php } ?>
  
		
		
		
	  
<?php if(MEMBER_ID) { ?>
	  
<?php if($this->Code > 0) { ?>
	  <div class="SC">
		<div class="vDateBox">
		<p><?php echo $member['follow_html']; ?></p>
		</div>
	  </div>
	  
<?php } ?>
   
<?php } ?>
<!--属于TA的标签-->
<?php if($this->Get['mod'] !='tag') { ?>
		  
<?php if(MEMBER_ID > 0) { ?>
		   
<?php if(MEMBER_ID != $member['uid']) { ?>
			  <script type="text/javascript">
				$(document).ready(function(){
				$(".SC_to_user_tag").click(function(){$(this).parent().toggleClass("fold_to_user_tag");$(".SC_to_user_tag_box").toggle();});
				});
			  </script>
			  <div class="SC">
				<h3>属于<?php echo $member['gender_ta']; ?>的标签
				<a class="btn SC_to_user_tag" href="javascript:void(0);" onclick="right_show_ajax('<?php echo $member['uid']; ?>','to_user_tag','to_user_tag'); return false;"></a>
				</h3>
				  <ul class="FTL SC_to_user_tag_box">
					<div id="<?php echo $member['uid']; ?>_to_user_tag"></div>
				  </ul>
			   </div>
			
<?php } ?>
  
		  
<?php } ?>
  
		
<?php } ?>
  
	   <!--属于TA的标签-->
	   
	   
	   
<?php if(MEMBER_ID != $member['uid']) { ?>
		  <script type="text/javascript">
			$(document).ready(function(){
			$(".SC_taguanzhu").click(function(){$(this).parent().toggleClass("fold_taguanzhu");$(".SC_taguanzhu_box").toggle();});
			});
		  </script>
		<div class="SC">
		<h3><?php echo $member['gender_ta']; ?>关注的人 (<?php echo $member['follow_count']; ?>)
			<a class="btn SC_taguanzhu" href="javascript:void(0)" onclick="right_show_ajax('<?php echo $member['uid']; ?>','user_follow','user_follow'); return false;"></a>
		</h3>
		<ul class="FTL FTL2 SC_taguanzhu_box">
			<div id="<?php echo $member['uid']; ?>_user_follow"></div>
		</ul>
	  </div>
	  
<?php } ?>
  
	  
	  
<?php $qun_setting = ConfigHandler::get('qun_setting'); ?>
  
<?php if($qun_setting['qun_open']) { ?>
		  <!--他的微群 Begin-->
			<script type="text/javascript">
				$(document).ready(function(){
					$(".SC_my_qun").click(function(){$(this).parent().toggleClass("fold_qun");$(".SC_qun_box").toggle();});
				});
			</script>
			<div class="SC">
				<h3>
					<?php echo $member['gender_ta']; ?>加入的微群
					<a class="btn SC_my_qun" href="javascript:void(0);" onclick="right_show_ajax('<?php echo $member['uid']; ?>','my_qun','qun_box'); return false;">
					</a>
				</h3>
				<ul class="FTL SC_qun_box">
					<div id="<?php echo $member['uid']; ?>_qun_box"></div>
				</ul>
			</div>
		  <!--他的微群 End-->
	  
<?php } ?>
  
	  <!--他参与的活动 Begin-->
	  <script type="text/javascript">
				$(document).ready(function(){
					$(".SC_my_event").click(function(){$(this).parent().toggleClass("fold_event");$(".SC_event_box").toggle();});
				});
			</script>
			<div class="SC">
				<h3>
					<?php echo $member['gender_ta']; ?>参与的活动
					<a class="btn SC_my_event" href="javascript:void(0);" onclick="right_show_ajax('<?php echo $member['uid']; ?>','to_user_event','to_user_event_box'); return false;">
					</a>
				</h3>
				<ul class="FTL SC_event_box">
					<div id="<?php echo $member['uid']; ?>_to_user_event_box"></div>
				</ul>
			</div>
	   <!--他参与的活动 End-->
	   
<?php } ?>
  
<?php if(MEMBER_ID == $member['uid']) { ?>
<?php if(in_array($params['code'],array('myhome','myfavorite','mycomment','tocomment','myat','myblog')) ) { ?>
  
	
	<script language="javascript">
		$(document).ready(function(){
		
		/*
		* ajax 右侧显示数据
		* 这里的函数可以随便更改位置，加载的顺序也会不同。
		*/
		
		//可能感兴趣
		get_refresh();
		
		//热门话题推荐
		get_hot_tag();
		
		//人气用户推荐
		get_recommend_user();
			
		});
		
		function get_refresh(){
			//可能感兴趣
			right_show_ajax('<?php echo $member['uid']; ?>','refresh','refresh');
		}
		function get_hot_tag(){
			//热门话题
			right_show_ajax('<?php echo MEMBER_ID; ?>','hot_tag','hot_tag');
		}
		function get_recommend_user(){
			//人气用户推荐
			right_show_ajax('<?php echo MEMBER_ID; ?>','recommend_user','recommend_user');
		}
	</script>

	<!-- 可能感兴趣的人start -->
		  <script type="text/javascript">
			$(document).ready(function(){
			$(".SC_guanxingqu").click(function(){$(this).parent().toggleClass("fold_guanxingqu");$(".SC_guanxingqu_box").toggle();});
			});
		  </script>
		  <div class="SC">
			<h3>
			可能感兴趣的人<a class="btn SC_guanxingqu" href="javascript:void(0);" onclick="right_show_ajax('<?php echo $member['uid']; ?>','refresh','refresh'); return false;"></a>
			</h3>
			<div class="FTL SC_guanxingqu_box">
				<div id="<?php echo $member['uid']; ?>_refresh"></div>
			</div>
		</div>
	  <!-- 可能感兴趣的人end -->

	  <!-- 热门话题推荐-->
	  
<?php if($this->Config['hot_tag_recommend_enable'] && ($hot_tag_recommend = ConfigHandler::get('hot_tag_recommend')) && $hot_tag_recommend['list']) { ?>
		  <script type="text/javascript">
			$(document).ready(function(){
			$(".SC_rementuijian").click(function(){$(this).parent().toggleClass("fold_rementuijian");$(".SC_rementuijian_box").toggle();});
			});
		  </script>
		<div class="SC">
		<h3><?php echo $hot_tag_recommend['name']; ?><a class="btn SC_rementuijian" href="javascript:void(0);" onclick="right_show_ajax('<?php echo MEMBER_ID; ?>','hot_tag','hot_tag');"></a></h3>
		<ul class="FTL SC_rementuijian_box">
			<div id="<?php echo MEMBER_ID; ?>_hot_tag"></div>
		</ul>
	  </div>
	  
<?php } ?>
<!--人气用户推荐-->
		  <script type="text/javascript">
			$(document).ready(function(){
			$(".SC_renqituijian").click(function(){$(this).parent().toggleClass("fold_renqituijian");$(".SC_renqituijian_box").toggle();});
			});
		  </script>
	  <div class="SC">
	  <h3>人气用户推荐<a class="btn SC_renqituijian" href="javascript:void(0);" onclick="right_show_ajax('<?php echo MEMBER_ID; ?>','recommend_user','recommend_user');"></a></h3>
		<ul class="FTL FTL3 SC_renqituijian_box">
	 
			<div id="<?php echo MEMBER_ID; ?>_recommend_user"></div>
	
		</ul>
	  </div>
	<!-- 人气用户推荐-->
<?php if($fans_list) { ?>
		  <script type="text/javascript">
			$(document).ready(function(){
			$(".SC_guanzhuta").click(function(){$(this).parent().toggleClass("fold_guanzhuta");$(".SC_guanzhuta_box").toggle();});
			});
		  </script>
		<div class="SC">
		<h3>关注<?php echo $member['nickname']; ?>的人<a class="btn SC_guanzhuta" href="javascript:void(0)"></a></h3>
		<ul class="FTL FTL2 SC_guanzhuta_box">
		  
<?php if(is_array($fans_list)) { foreach($fans_list as $val) { ?>
		  <li class="h_h2"> <a href="index.php?mod=<?php echo $val['username']; ?>" target="_blank"><img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" class="manface"/></a><span><a href="index.php?mod=<?php echo $val['username']; ?>" target="_blank"><?php echo $val['nickname']; ?></a></span></li>
		  
<?php } } ?>
  <li><a href="index.php?mod=<?php echo $member['username']; ?>&code=fans">更多</a></li>
		</ul>
	  </div>
	  
<?php } ?>
<?php } ?>
<?php } ?>
  
	<!--获取积分方式--> 
<?php if($this->Config['extcredits_enable'] && MEMBER_ID > 0 && $member['uid']==MEMBER_ID) { ?>
	  <script type="text/javascript">
		$(document).ready(function(){
		$(".SC_jifen").click(function(){$(this).parent().toggleClass("fold_jifen");$(".SC_jifen_box").toggle();});
		});
	  </script>
	  <div class="SC">
		<h3>获取积分<a class="btn SC_jifen" href="javascript:void(0)"></a></h3>
		<ul class="FTL SC_jifen_box">
<?php $credits_rule=ConfigHandler::get('credits_rule'); ?>
<?php if(is_array($credits_rule)) { foreach($credits_rule as $k => $v) { ?>
<?php if($v['related'] && '_'==$k['0']) { ?>
					<li>
<?php if('T'==$k['1']) { ?>
						<a href="index.php?mod=tag&code=<?php echo $v['related']; ?>">发布<b>#<?php echo $v['related']; ?>#</b>话题</a><?php } elseif('U'==$k['1']) { ?><a href="index.php?mod=<?php echo $v['related']; ?>">关注<b><?php echo $v['related']; ?></b></a>
					
<?php } ?>
<?php if(is_array($this->Config['credits']['ext'])) { foreach($this->Config['credits']['ext'] as $_k => $_v) { ?>
<?php if($_v['enable'] && $v[$_k]) { ?>
							<?php echo $_v['name']; ?>
<?php if($v[$_k]>0) { ?>
							+
							
<?php } ?>
<?php echo $v[$_k]; ?>
						
<?php } ?>
<?php } } ?>
</li>
				
<?php } ?>
<?php } } ?>
<li>更多获取积分的方法，<a href="index.php?mod=settings&code=extcredits&op=rule">点此查看</a></li>
		</ul>
	  </div>
	
<?php } ?>
<!--获取积分方式--> 
	
  
	<!-- 意见反馈-->
	<script type="text/javascript">
		$(document).ready(function(){
		$(".SC_yijianfankui").click(function(){$(this).parent().toggleClass("fold_yijianfankui");$(".SC_yijianfankui_box").toggle();});
		});
	  </script>
	  <div class="SC">
	  <h3><?php echo $this->Config['site_name']; ?>意见反馈<a class="btn SC_yijianfankui" href="javascript:void(0)"></a></h3>
	  <ul class="FTL SC_yijianfankui_box">
		  <li>众人拾柴火焰高，如您有任何建议欢迎点<a href="index.php?mod=tag&code=意见反馈" target="_blank">意见反馈</a>告诉我们。</li>
		  <li>&nbsp;</li>
		</ul>
	  </div>
	<!--意见反馈-->
<?php if($member['uid']) { ?>
<div id="add_remark_<?php echo $member['uid']; ?>" class="alertBox" style="display:none" >
	<ul class="manBox">
	 <li>
		<div class="tt1">
			<span>设置备注名</span>
			<div class="mclose" onclick="getElementById('add_remark_<?php echo $member['uid']; ?>').style.display=(getElementById('add_remark_<?php echo $member['uid']; ?>').style.display=='none')?'':'none'"></div>
		</div>
		<div class="mWarp">
			 <form action="ajax.php?mod=topic&code=add_remark" method="POST"  name="remarkform"   onsubmit="publishSubmit_remark('remark_<?php echo $member['uid']; ?>',<?php echo $member['uid']; ?>);return false;">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
			  给朋友加个备注名，方便认出他是谁（0~6个字符）
					<table >
					  <tr>
						<td><input name="remark_<?php echo $member['uid']; ?>" type="text" id="remark_<?php echo $member['uid']; ?>" class="text-area2" value="<?php echo $buddys['remark']; ?>" size="6" maxlength="6"/>
						</td>
						<td align="left">
						<input type="button" class="shareI" value="保 存" onclick="publishSubmit_remark('remark_<?php echo $member['uid']; ?>',<?php echo $member['uid']; ?>);return false;" /> 
						</td>
					  </tr>
					</table>
			  </form>
		  </div>
		</li>
	 </ul>
 </div>
<?php } ?>
 
<?php if($this->Config['ad_enable']) { ?>
<div class="R_AD"> 
  
<?php if('myhome'== $this->Code) { ?>
  <?php echo $this->Config['ad']['ad_list']['group_myhome']['middle_right1']; ?>
  <!-- 右2-->
  <?php } elseif('tag'== $this->Get['mod']) { ?>  <?php echo $this->Config['ad']['ad_list']['tag_view']['middle_right1']; ?>
  
<?php } ?>
</div>
<?php } ?>
</div></div>