<?php /* 2011-12-28 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?><style type="text/css">
body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,form,fieldset,input,textarea,p,blockquote,th,td{margin:0;padding:0;}
body{color:#393939;font-size:12px; padding:5px;}
li{list-style-type:none}
a{color:<?php echo $linkColor; ?>;text-decoration:none}
/*微博秀预览*/
.tblog{font-family:Arial, Helvetica, sans-serif; height:500px;}
.tblog img{border:none}
/*标题*/
.tblog .tblog_header{background:none repeat scroll 0 0 #D6F3F7;color:#333;height:30px;overflow:hidden;border-bottom:1px solid <?php echo $titleColor; ?>;}
.tblog .tblog_header h1{float:left;padding-left:10px;padding-top:4px;position:relative;font-weight:400;font-size:12px;}
.tblog .tblog_header h1 a.mini_logo{background:url(<?php echo $this->Config['site_url']; ?>/images/t_logo.gif) no-repeat scroll 0 0 transparent;display:block;height:16px;left:11px;position:absolute;top:9px;width:19px;}
.tblog .tblog_header h1 a.title{display:inline-block;position:relative;padding:4px 0 0 0;}
/*个人信息*/
.tblog .fans_top{overflow:hidden;width:100%;padding:12px 0 10px;height:55px;*height:80px;}
.tblog .fans_top .fansphoto{float:left;height:52px;width:52px;margin:0 11px 0 9px;}
.tblog .fans_top ul li{height:16px;margin-bottom:4px;overflow:hidden;padding-right:9px;}
.tblog .fans_top ul li.btn{height:auto;margin:10px 0 0;}
/*微博列表*/
.tblog .blog_list .list_warp{overflow:hidden;width: 100%; position:relative; height:259px;}
.tblog .blog_list ul li{margin:3px auto;padding:0px; width:98%;border-bottom:1px dotted #ccc;}
.tblog .blog_list ul li p{ padding:5px;}
.tblog .blog_list dl{border-bottom:1px dotted #ccc;overflow:hidden;width:100%;padding:8px 0;}
.tblog .blog_list dl dd.msg{margin-bottom:3px;word-wrap:break-word;line-height:18px;}
.tblog .blog_list dl dd span.act{float:right;white-space:nowrap;}
/*FANS列表*/
.tblog .fans_list{ overflow:hidden;}
.tblog .fans_list h4{height:25px;line-height:25px;overflow:hidden;font-weight:400;margin:2px 9px; font-size:12px;}
.tblog .fans_list h4 a.all{float:right;font-family:宋体}
.tblog .fans_list ul li{float:left;height:72px;overflow:hidden;padding-bottom:12px;text-align:center;width:50px;margin:0 5px;}
.tblog .fans_list ul li a.pic{display:block;height:50px;margin-bottom:6px;width:50px;}
.tblog .fans_list ul li a.name{font-family:宋体;vertical-align:middle;}
.tblog .blog_list dl dd p,.fans_list h4 span{float:left;}
/*控制按钮*/
.tblog .bg_arrow{background:#e6e6e6 url(<?php echo $this->Config['site_url']; ?>/images/ico_tblog_arrow.gif);background-repeat:repeat-x;display:block;height:7px;padding-top:3px;*padding:0px;text-align:center;margin:0;}
.tblog .bg_arrow img{ margin:0 auto; width:8px; height:4px; background:url(<?php echo $this->Config['site_url']; ?>/images/ico_tblog_arrow.png) no-repeat;}
.tblog a.arrow_up img {background-position: 0 0;}
.tblog a.arrow_down img {background-position: 0 -12px;}
</style>
<script language="JavaScript">
function scroll(n){
	temp=n;
	News.scrollTop=News.scrollTop+temp;
	if (temp==0) return;
	setTimeout("scroll(temp)",20); 
}
</script>

<div class="tblog" style="width:<?php echo $div_width; ?>px;height:<?php echo $div_height; ?>px;background:<?php echo $bgColor; ?>;border:<?php echo $isBorder; ?>px solid <?php echo $borderColor; ?>;">
 
  <!--标题-->
  
<?php if($isTitle) { ?>
  <div class="tblog_header" style="background:<?php echo $titleColor; ?>; borde-bottom:1px solid #C0DADE; height:<?php echo $title_height; ?>px;" >
	<h1><a target="_blank" class="title" href="<?php echo $this->Config['site_url']; ?>"><?php echo $this->Config['site_name']; ?></a></h1>
  </div>
  
<?php } ?>
  <!--标题-->
 

  <!--个人信息-->
  <div class="fans_top">
    <div class="fansphoto">
		<a target="_blank" href="<?php echo $this->Config['site_url']; ?>/index.php?mod=<?php echo $members['username']; ?>"> 
		<img src="<?php echo $members['face']; ?>" width="54px" height="54px" border="0" onerror="javascript:faceError(this);" /></a> 
	</div>
    <ul>
      <li> <a  target="_blank" href="<?php echo $this->Config['site_url']; ?>/index.php?mod=<?php echo $members['username']; ?>"><?php echo $members['nickname']; ?></a> </li>
      
<?php if($members['province']) { ?>
      <li><span style="color:#666"><?php echo $members['province']; ?> <?php echo $members['city']; ?></span> </li>
      
<?php } ?>
      <li><span> <a  target="_blank" href="<?php echo $this->Config['site_url']; ?>/index.php?mod=<?php echo $members['username']; ?>">微博<?php echo $members['topic_count']; ?>条 </a></span> <span><a target="_blank" href="<?php echo $this->Config['site_url']; ?>/index.php?mod=<?php echo $members['username']; ?>&code=fans">被<?php echo $members['fans_count']; ?>人关注</a></span></li>
    </ul>
  </div>
  <!--个人信息-->

  <!--微博列表-->
  
<?php if($isTopic) { ?>
  <div class="blog_list">
	  <a class="bg_arrow arrow_up" href="javascript:;" onmousedown="scroll(-3)" onmouseover="scroll(-3)" style="cursor: pointer" onmouseout="scroll(0)">
		 <img width="8" height="4" title="" class="arrow" src="<?php echo $this->Config['site_url']; ?>/templates/default/images/transparent.gif">
	  </a>
    <div class="list_warp" id="News" style="height:<?php echo $topic_height; ?>px;">
      <ul>
      
<?php if(is_array($topic_list)) { foreach($topic_list as $val) { ?>
		<div style="color:<?php echo $textColor; ?>;">
			  <li>
				<p>
					<a href="<?php echo $this->Config['site_url']; ?>/index.php?mod=<?php echo $val['username']; ?>" style="color:<?php echo $linkColor; ?>;" target="_blank"><?php echo $val['nickname']; ?></a>：
					<span class="mbTxtB" style="color:<?php echo $textColor; ?>;"><?php echo $val['content']; ?></span>
				</p>
				<p>
				  <span style="color:<?php echo $textColor; ?>;"><?php echo $val['dateline']; ?></span>
				  <span style="color:<?php echo $textColor; ?>;">[转发:<?php echo $val['forwards']; ?>]</span>
				  <span style="color:<?php echo $textColor; ?>;">[评论:<?php echo $val['replys']; ?>]</span>
				</p>
			</li>
		 </div>
        
<?php } } ?>
      </ul>
    </div>
	  <a class="bg_arrow arrow_down" href="javascript:;" onmousedown="scroll(3)" onmouseover="scroll(3)" style="CURSOR: hand" onmouseout="scroll(0)" >
	  	<img width="8" height="4" title="" class="arrow" src="<?php echo $this->Config['site_url']; ?>/templates/default/images/transparent.gif">
	  </a>
  </div>
  
<?php } ?>
  <!--微博列表-->

 
  <!--FANS列表-->
  
<?php if($isFans) { ?>
  <div class="fans_list" style="height:<?php echo $fans_height; ?>px;">
    <h4> 
	<span>被<em><strong><?php echo $members['fans_count']; ?></strong>人</em>关注</span> 
	<a target="_blank" class="all" href="<?php echo $this->Config['site_url']; ?>/index.php?mod=<?php echo $members['username']; ?>&code=fans">全部&gt;&gt;</a> 
	</h4>
    <ul style="padding:0 22px;">
      
<?php if(is_array($user_list)) { foreach($user_list as $val) { ?>
      
<?php if(false===strpos($val['face'],'://')) $val['face'] = $this->
      Config[site_url].'/'.$val['face'];  ?>
      <li> 
	  <a target="_blank" title="" class="pic" href="<?php echo $this->Config['site_url']; ?>/index.php?mod=<?php echo $val['username']; ?>"> 
	  <img title="<?php echo $val['username']; ?>" onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" width="50px" height="50px"></a> 
	  <a title="<?php echo $val['username']; ?>" target="_blank" class="name" href="<?php echo $this->Config['site_url']; ?>/index.php?mod=<?php echo $val['username']; ?>"><?php echo $val['nickname']; ?></a> 
	  </li>
      
<?php } } ?>
    </ul>
  </div>
  
<?php } ?>
  <!--FANS列表-->

</div>