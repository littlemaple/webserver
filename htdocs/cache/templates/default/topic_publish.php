<?php /* 2015-07-27 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?><style type="text/css">ul.mycon li{ width:65px;}</style>
<script type="text/javascript" src="templates/default/js/publishbox.js"></script>
<div id="zz_main_publish">
<div id="tigBox_2" class="tigBox_2">用<a href="javascript:" onClick="thread_insert()" style="cursor:pointer">#关键词#</a>给微博添加话题，方便他人关注话题</div>
<div class="issueBox">
<div class="fbqCount">
<div class="fLeft">
<?php if($this->Get['mod'] == 'member') { ?>
<?php $content = '#新人报到# 我是'.$this->Config['site_name'].'新加入的成员@'.MEMBER_NICKNAME.' ，欢迎大家来关注我！'; ?>
所有关注我的人将看到我分享的信息
<?php } else { ?><span>
<?php if(!empty($member['fans_count'])) { ?>
<?php echo $member['fans_count']; ?>
<?php } else { ?><?php echo MEMBER_FANS; ?>
<?php } ?>
 </span>人在关注我，
<A href="index.php?mod=profile&code=invite" style="cursor:pointer">邀请</A>更多人
<?php } ?>
</div>
<ul class="mycon">
<li>还可以输入</li><li style="width:auto"><span id="wordCheck" style='font-family:Georgia;font-size:24px;'><?php echo $this->Config['topic_length']; ?></span></li><li style="width:14px;">字</li>
</ul>
</div>
<div class="box_1" style="display:block">
<?php $i_already_value = $content ? $content : $this->Config['today_topic']; ?>
<script type="text/javascript">
var __I_ALREADY_VALUE__ = '<?php echo $i_already_value; ?>';
</script>
<textarea name="content" id="i_already"  onkeyup="javascript:checkWord(<?php echo $this->Config['topic_length']; ?>,event,'wordCheck')" onkeydown="ctrlEnter(event, 'publishSubmit')"><?php echo $i_already_value; ?></textarea>
<input name="topic_type" type="hidden" id="topic_type" value="<?php echo $this->Get['type']; ?>" />

<!--应用 Begin-->
<input name="item" type="hidden" id="mapp_item" value="<?php echo $this->item; ?>" />
<input name="item_id" type="hidden" id="mapp_item_id" value="<?php echo $this->item_id; ?>" />
<!--应用 End-->

</div>   
  <div class="box_3">
	<script type="text/javascript">
	 $(document).ready(function() {	 	
		
	 //图片 
	 $(".menu_tqb_c").click(function(){
	 $(".menu_tqb").show();
	 $(".menu_spb").hide();
	 $('#showface').hide();
	 $('.menu_htb').hide();
	 $('.menu_vsb').hide();
	 $(".menu_wqb").hide();
	 $(".menu_hdb").hide();
	 $(".menu_cwb").hide();
	 });
	 $('#pubImg').click(function(){
	 $("#publisher_file").style.posLeft=event.x-offsetWidth/2;$("#publisher_file").style.posTop=event.y-offsetHeight/2;});
	 $(".menu_tqb_c1").click(function(){$(".menu_tqb").hide();});
	 $(".menu_tqb_c2").click(function(){$(".menu_tqb").hide();});
	 $("#publishSubmit").click(function(){$(".menu_tqb").hide();});
	 //视频
	 $(".menu_spb_c").click(function(){
	 $(".menu_spb").show();
	 $(".menu_tqb").hide();
	 $('#showface').hide();
	 $('.menu_htb').hide();
	 $('.menu_vsb').hide();
	 $(".menu_wqb").hide();
	 $(".menu_hdb").hide();
	 $(".menu_cwb").hide();
	 });
	 $(".menu_spb_c1").click(function(){$(".menu_spb").hide();});
	 //表情
	 $(".menu_bqb_c").click(function(){
	 $("#showface").show();
	 $(".menu_tqb").hide();
	 $(".menu_spb").hide();
	 $('.menu_htb').hide();
	 $('.menu_vsb').hide();
	 $(".menu_wqb").hide();
	 $(".menu_hdb").hide();
	 $(".menu_cwb").hide();
	 });
	 $('#showface').click(function(){return false;});
	 //活动
	 $(".menu_htb_c").click(function(){
	 $(".menu_htb").show();
	 $(".menu_spb").hide();
	 $(".menu_tqb").hide();
	 $('#showface').hide();
	 $('.menu_vsb').hide();
	 $(".menu_wqb").hide();
	 $(".menu_hdb").hide();
	 $(".menu_cwb").hide();
	 });
	 $('.menu_htb').click(function(){return false;});
	 //投票
	 $(".menu_vsb_c").click(function(){
	 getVoteAvtivityFromIndex('vote_publish', 'con_vote_content_1');
	 $(".menu_vsb").show();
	 $(".menu_tqb").hide();
	 $(".menu_spb").hide();
	 $('#showface').hide();
	 $('.menu_htb').hide();
	 $(".menu_wqb").hide();
	 $(".menu_hdb").hide();
	 $(".menu_cwb").hide();
	 });
	 $(".menu_vsb_c1").click(function(){$(".menu_vsb").hide();});
	 //活动
	 $(".menu_hdb_c").click(function(){
	 getEventPost();
	 $(".menu_hdb").show();
	 $(".menu_vsb").hide();
	 $(".menu_tqb").hide();
	 $(".menu_spb").hide();
	 $('#showface').hide();
	 $('.menu_htb').hide();
	 $(".menu_wqb").hide();
	 $(".menu_cwb").hide();
	 });
	 $(".menu_hdb_c1").click(function(){$(".menu_hdb").hide();});
	 
	 //微群
	 $(".menu_wqb_c").click(function(){
		 getMyQun();
		 $(".menu_wqb").show();
		 $(".menu_tqb").hide();
		 $(".menu_spb").hide();
		 $('#showface').hide();
		 $('.menu_htb').hide();
		 $(".menu_vsb").hide();
		 $(".menu_hdb").hide();
		 $(".menu_cwb").hide();
	 });
	 $(".menu_wqb_c1").click(function(){$(".menu_wqb").hide();});
	 
	 //长文本
	 $(".menu_cwb_c").click(function(){
		 get_longtext_info();
		 $(".menu_cwb").show();
		 $(".menu_tqb").hide();
		 $(".menu_spb").hide();
		 $('#showface').hide();
		 $('.menu_htb').hide();
		 $(".menu_vsb").hide();
		 $(".menu_hdb").hide();
		 $(".menu_wqb").hide();
	 });
	 $(".menu_cwb_c1").click(function(){$(".menu_cwb").hide();});
	 
	 //分类
	 $(".menu_xb_c").click(function(){
	 getClassPost();
	 $(".menu_xb").show();
	 $(".menu_wqb").hide();
	 $(".menu_tqb").hide();
	 $(".menu_spb").hide();
	 $('#showface').hide();
	 $('.menu_htb').hide();
	 $(".menu_vsb").hide();
	 });
	 $(".menu_xb_c1").click(function(){$(".menu_xb").hide();});
	 
});

//-----------------------------------
function setTab(name,cursel,n){
	for(i=1;i<=n;i++){
	var menu=document.getElementById(name+i);
	var con=document.getElementById("con_"+name+"_"+i);
	menu.className=i==cursel?"vhover":"";
	con.style.display=i==cursel?"block":"none";
}
}

function setTab1(name,cursel,n){
	for(i=1;i<=n;i++){
	var menu=document.getElementById(name+i);
	var con=document.getElementById("con_"+name+"_"+i);
	menu.className=i==cursel?"vhover":"";
	con.style.display=i==cursel?"block":"none";
}
}

function setTab2(name,cursel,n){
	for(i=1;i<=n;i++){
	var menu2=document.getElementById(name+i);
	var con2=document.getElementById("con2_"+name+"_"+i);
	menu2.className=i==cursel?"vhover2":"";
	con2.style.display=i==cursel?"block":"none";
}
}
</script>

	<!-- 商品区块 开始 -->
	<!-- JS引用 开始 -->	   
<?php $image_uploadify_topic = array(); ?>

<?php $image_uploadify_from = 'topic_publish'; ?>

<?php $image_uploadify_only_js = 1; ?>
<?php $image_uploadify_id=$content_textarea_id.$image_uploadify_type.($image_uploadify_topic['tid']>0?"_".$image_uploadify_topic['tid']:""); ?>

<?php $image_uploadify_image_small_size=$image_uploadify_image_small_size?$image_uploadify_image_small_size:45; ?>

<?php $content_textarea_id=$content_textarea_id?$content_textarea_id:'i_already'; ?>

<?php $content_textarea_empty_val=isset($content_textarea_empty_val)?$content_textarea_empty_val:'分享图片'; ?>

<?php $image_uploadify_queue_size_limit=max(0, (int) $this->Config['image_uploadify_queue_size_limit']);if($image_uploadify_queue_size_limit<1)$image_uploadify_queue_size_limit=3; ?>
<!-- <success></success> -->
		
		<!-- <script type="text/javascript" src="images/uploadify/jquery.uploadify.v2.1.4.min.js"></script> -->
		<script type="text/javascript">
		
		var __IMAGE_IDS__ = {};
		
		$(document).ready(function(){
			
			$('#publisher_file<?php echo $image_uploadify_id; ?>').uploadify({
				'uploader'  : '<?php echo $this->Config['site_url']; ?>/images/uploadify/uploadify.swf?id=<?php echo $image_uploadify_id; ?>&random=' + Math.random(),
			    'script'    : '<?php echo urlencode($this->Config['site_url'] . "/ajax.php?mod=uploadify&code=image"); ?>',
			    'cancelImg' : '<?php echo $this->Config['site_url']; ?>/images/uploadify/cancel.png',
			    'buttonImg'	: '<?php echo $this->Config['site_url']; ?>/images/uploadify/addatt.gif',
			    'width'		: 111,
			    'height'	: 17,
			    'multi'		: true,
			    'auto'      : true,
			    'sizeLimit' : '2097152',
			    'fileExt'	: '*.jpg;*.png;*.gif;*.jpeg',
			    'fileDesc'	: '请选择图片文件(*.jpg;*.png;*.gif;*.jpeg)',
			    'queueID'	: 'uploadifyQueueDiv<?php echo $image_uploadify_id; ?>',
			    'wmode'		: 'transparent',
			    'fileDataName'	 : 'topic',
			    'queueSizeLimit' : <?php echo $image_uploadify_queue_size_limit; ?>,
			    'simUploadLimit' : 1,
			    'scriptData'	 : {
			    
<?php if($image_uploadify_topic_uid) { ?>
			    	'topic_uid'  : '<?php echo $image_uploadify_topic_uid; ?>',
			    	
<?php } ?>
    	'cookie_auth': '<?php echo urlencode(jsg_getcookie("auth")); ?>'
			    },
			    'onSelect'		 : function(event, ID, fileObj) {
			    },
			    'onSelectOnce'	 : function (event, data) {
			    	imageUploadifySelectOnce<?php echo $image_uploadify_id; ?>();			    	
			    },
			    'onProgress'     : function(event, ID, fileObj, data) {
			        return false;
			    },
			    'onComplete'	 : function(event, ID, fileObj, response, data) {
			    	eval('var r = ' + response + ';');
					if (r.done) {					
						var rv = r.retval;
						if ( rv.id > 0 && rv.src.length > 0 ) {
							imageUploadifyComplete<?php echo $image_uploadify_id; ?>(rv.id, rv.src, fileObj.name);
						}
					}
			    },
			    'onError'        : function (event, ID, fileObj, errorObj) {
			        alert(errorObj.type + ' Error: ' + errorObj.info);
			    },
			    'onAllComplete'	 : function(event, data) {
			    	imageUploadifyAllComplete<?php echo $image_uploadify_id; ?>();
			    }
			});
			
			
			$("#viewImgDiv<?php echo $image_uploadify_id; ?> img").each(function() {
			    if($(this).width() > $(this).parent().width()) {
			    	$(this).width("100%");
				}
			});
			
				
		});
		
		
		//删除一张图片
		function imageUploadifyDelete<?php echo $image_uploadify_id; ?>(idval)
		{
			var idval = ('undefined'==typeof(idval) ? 0 : idval);
			if(idval > 0) 
			{
				$.post
				(
					'ajax.php?mod=uploadify&code=delete_image',
					{
						'id' : idval
					},
					function (r) 
					{				
						if(r.done)
						{
							$('#uploadImgSpan_' + idval).remove();
							
							if( ($.trim(($('#viewImgDiv<?php echo $image_uploadify_id; ?>').html()))).length < 1 )
							{
								$('#viewImgDiv<?php echo $image_uploadify_id; ?>').css('display', 'none');
								$('#insertImgDiv<?php echo $image_uploadify_id; ?>').css('display', 'block');
							}
							
							if( 'undefined' != typeof(__IMAGE_IDS__[idval]) )
							{
								__IMAGE_IDS__[idval] = 0;
							}
						}
						else
						{
							if(r.msg)
							{
								MessageBox('warning', r.msg);
							}
						}
					},
					'json'
				);
			}
		}
		
		function imageUploadifySelectOnce<?php echo $image_uploadify_id; ?>()
		{
			$('#uploading<?php echo $image_uploadify_id; ?>').html("<img src='images/loading.gif'/>&nbsp;上传中，请稍候……");
		}
		
		function imageUploadifyComplete<?php echo $image_uploadify_id; ?>(idval, srcval, nameval)
		{
			var imageIdsCount = 0;
	    	$.each( __IMAGE_IDS__, function( k, v ) { if( v > 0 ) { imageIdsCount += 1; } } );
	    	if( imageIdsCount >= <?php echo $image_uploadify_queue_size_limit; ?> )
	    	{
	    		MessageBox('warning', '本次图片数量超过限制了');
	    		return false;
	    	}
			
			var idval = ('undefined' == typeof(idval) ? 0 : idval);
			var srcval = ('undefined' == typeof(srcval) ? 0 : srcval);
			var nameval = ('undefined' == typeof(nameval) ? '' : nameval);
<?php if('topic_publish'==$image_uploadify_from) { ?>
				$('#viewImgDiv<?php echo $image_uploadify_id; ?>').prepend('<li id="uploadImgSpan_' + idval + '" class="menu_ps vv_2"><img src="' + srcval + '"/> <p><i>' + nameval + ' <a title="删除图片" onclick="imageUploadifyDelete<?php echo $image_uploadify_id; ?>(' + idval + ');return false;" href="javascript:;">删除</a></i></p></li>');<?php } elseif('topic_longtext_info_ajax'==$image_uploadify_from) { ?>$('#viewImgDiv<?php echo $image_uploadify_id; ?>').append('<span id="uploadImgSpan_' + idval + '"><img src="' + srcval + '" width="<?php echo $image_uploadify_image_small_size; ?>" alt="点击图片插入到文中" onclick="longtext_info_img_insert(\'' + srcval + '\');" /><a href="javascript:void(0);" onclick="imageUploadifyDelete<?php echo $image_uploadify_id; ?>(' + idval + '); return false;" title="删除图片">×</a></span>');
<?php } else { ?>$('#viewImgDiv<?php echo $image_uploadify_id; ?>').append('<span id="uploadImgSpan_' + idval + '"><img src="' + srcval + '" width="<?php echo $image_uploadify_image_small_size; ?>" /><a href="javascript:void(0);" onclick="imageUploadifyDelete<?php echo $image_uploadify_id; ?>(' + idval + '); return false;" title="删除图片">×</a></span>');
			
<?php } ?>
$('#normalUploadFile<?php echo $image_uploadify_id; ?>').val('');
			
			__IMAGE_IDS__[idval] = idval;
		}
		
		function imageUploadifyAllComplete<?php echo $image_uploadify_id; ?>()
		{
			$('#uploading<?php echo $image_uploadify_id; ?>').html('');			    	
	    	$('#viewImgDiv<?php echo $image_uploadify_id; ?>').css('display', 'block');
	    	//$('#insertImgDiv<?php echo $image_uploadify_id; ?>').css('display', 'none');
	    	if( $.trim(($('#<?php echo $content_textarea_id; ?>').val())).length < 1 ) {
	    		$('#<?php echo $content_textarea_id; ?>').val('<?php echo $content_textarea_empty_val; ?>');	
	    	}
	    	$('#<?php echo $content_textarea_id; ?>').focus();
		}
		
		function normalUploadFormSubmit<?php echo $image_uploadify_id; ?>()
		{
			var fileVal = $('#normalUploadFile<?php echo $image_uploadify_id; ?>').val();
			
			if(($.trim(fileVal)).length < 1)
			{
				MessageBox('warning', '请选择一个正确的图片文件');
				return false;
			}
			else
			{
				if(!(/\.(jpg|png|gif|jpeg)$/i.test(fileVal)))
				{
					MessageBox('warning', '请选择一个正确的图片文件');
					return false;
				}
				else
				{
					imageUploadifySelectOnce<?php echo $image_uploadify_id; ?>();
					
					return true;
				}
			}
		}
		
		function imageUploadifyModuleSwitch<?php echo $image_uploadify_id; ?>()
		{
			if('none' == $('#normalUploadDiv<?php echo $image_uploadify_id; ?>').css('display'))
			{
				$('#uploadDescModuleSpan<?php echo $image_uploadify_id; ?>').html('快速');
				
				$('#swfUploadDiv<?php echo $image_uploadify_id; ?>').css('display', 'none');
				$('#normalUploadDiv<?php echo $image_uploadify_id; ?>').css('display', 'block');
			}
			else
			{
				$('#uploadDescModuleSpan<?php echo $image_uploadify_id; ?>').html('普通');
				
				$('#normalUploadDiv<?php echo $image_uploadify_id; ?>').css('display', 'none');
				$('#swfUploadDiv<?php echo $image_uploadify_id; ?>').css('display', 'block');
			}
		}
		
		</script>
<?php if(!$image_uploadify_only_js) { ?>
        <div id="insertImgDiv<?php echo $image_uploadify_id; ?>" class="insertImgDiv">
		    <div id="swfUploadDiv<?php echo $image_uploadify_id; ?>">
			
			<input type="file" id="publisher_file<?php echo $image_uploadify_id; ?>" name="publisher_file<?php echo $image_uploadify_id; ?>" style="display:none;" />（可一次上传多图）
			</div>
		    <iframe id="imageUploadifyIframe<?php echo $image_uploadify_id; ?>" name="imageUploadifyIframe<?php echo $image_uploadify_id; ?>" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank" style="display:none;"></iframe>
		    <div id="normalUploadDiv<?php echo $image_uploadify_id; ?>" style="display:none;">
				<form id="normalUploadForm<?php echo $image_uploadify_id; ?>" method="post"  action="ajax.php?mod=uploadify&code=image&type=normal" enctype="multipart/form-data" target="imageUploadifyIframe<?php echo $image_uploadify_id; ?>" onsubmit="return normalUploadFormSubmit<?php echo $image_uploadify_id; ?>()">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
		    		<input type="hidden" name="image_uploadify_id" value="<?php echo $image_uploadify_id; ?>" />
		    		<input type="file" id="normalUploadFile<?php echo $image_uploadify_id; ?>" name="topic" />
		    		<input type="submit" value="上传" class="tul" />
		    	</form>
		    </div>
			<span id="uploading<?php echo $image_uploadify_id; ?>"></span>
			<div id="uploadDescDiv<?php echo $image_uploadify_id; ?>">
				<span style="display:none ">
				<input name="shoppingurl" type="text" id="shoppingurl" class="sc_r_t_a" style=" width:220px; display:inline;"/><br>
				（已支持以下网站：<a href="http://www.taobao.com/" rel="nofollow" target="_blank">淘宝</a>、<a href="http://www.tmall.com/" rel="nofollow" target="_blank">淘宝商城</a>、<a href="http://www.paipai.com/" rel="nofollow" target="_blank">拍拍</a>、<a href="http://www.lashou.com/" rel="nofollow" target="_blank">拉手</a>，请复制粘帖团购地址）
				<BR/>
				</span>
				<span class="fontRed">*</span> 如果您不能上传图片，可以<a href="javascript:;" onclick="imageUploadifyModuleSwitch<?php echo $image_uploadify_id; ?>();">点击这里</a>尝试<span id="uploadDescModuleSpan<?php echo $image_uploadify_id; ?>">普通</span>模式上传
<?php if('topic_longtext_info_ajax'==$image_uploadify_from) { ?>
				<br /><span class="fontRed">*</span> 图片上传成功后，可以点击图片将图片插入到您想要的位置
				
<?php } ?>
<!-- 
				<br />*可上传JPG、JPEG、GIF、PNG图片格式（小于2M）
				<br />*可直接将网上图片URL地址复制到发布框来发布
				-->
			</div>
	    </div>
		<div id="uploadifyQueueDiv<?php echo $image_uploadify_id; ?>" style="display:none;"></div>
        <div id="viewImgDiv<?php echo $image_uploadify_id; ?>" class="viewImgDiv">
        
<?php if((!$image_uploadify_new || $image_uploadify_modify) && $image_uploadify_topic['imageid']) { ?>
        	
        
<?php if(is_array($image_uploadify_topic['image_list'])) { foreach($image_uploadify_topic['image_list'] as $ik => $iv) { ?>
        	<script type="text/javascript"> __IMAGE_IDS__[<?php echo $ik; ?>] = <?php echo $ik; ?>; </script>
        	<span id="uploadImgSpan_<?php echo $ik; ?>">
	        	<img src="<?php echo $iv['image_small']; ?>" width="<?php echo $image_uploadify_image_small_size; ?>" />
	        	<a href="javascript:void(0);" onclick="imageUploadifyDelete<?php echo $image_uploadify_id; ?>('<?php echo $ik; ?>'); return false;" title="删除图片">×</a>
        	</span>
        
<?php } } ?>
        	
<?php } ?>
        </div>
        
<?php } ?>
	<!-- JS引用 结束 -->
	<div class="menu">
	<div class="menu_tq" ><b class="menu_tqb_c">商品</b>
	<div class="menu_tqb">
	    <div class="menu_pi insertImgDiv" id="insertImgDiv">
		    <div id="swfUploadDiv">
			第一步：传图片<input type="file" id="publisher_file" name="publisher_file" style="display:none;" />（可一次上传多图）
			</div>
		    <iframe id="imageUploadifyIframe" name="imageUploadifyIframe" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank" style="display:none;"></iframe>
		    <div id="normalUploadDiv" style="display:none;">
				<form id="normalUploadForm" method="post"  action="ajax.php?mod=uploadify&code=image&type=normal" enctype="multipart/form-data" target="imageUploadifyIframe" onsubmit="return normalUploadFormSubmit()">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
		    		<input type="file" id="normalUploadFile" name="topic" />
		    		<input type="submit" value="上传" class="tul" />
		    	</form>
		    </div>
		    <i class="menu_tqb_c1"><img src="templates/default/images/imgdel.gif" title="关闭" /></i>
			<em>
				第二步：添网址<input name="shoppingurl" type="text" id="shoppingurl"  style=" width:220px; display:inline;"/>
				<BR/>（已支持以下网站：<a href="http://www.taobao.com/" rel="nofollow" target="_blank">淘宝</a>、<a href="http://www.tmall.com/" rel="nofollow" target="_blank">淘宝商城</a>、<a href="http://www.paipai.com/" rel="nofollow" target="_blank">拍拍</a>、<a href="http://www.lashou.com/" rel="nofollow" target="_blank">拉手</a>）
				<BR/>
				第三步：点击右侧发布分享按钮，完成发布
				<BR/>
				1、如果您不能上传图片，可以<a href="javascript:;" onclick="imageUploadifyModuleSwitch();">点击这里</a>尝试<span id="uploadDescModuleSpan">普通</span>模式上传 ；<br />
				2、可上传JPG、JPEG、GIF、PNG图片格式（小于2M）；<BR/>
				
			</em>
			<span id="uploading"></span>
			
			<div class="viewImgDiv" id="viewImgDiv"></div>
		</div>
		<div id="uploadifyQueueDiv" style="display:none;"></div>		
	</div>
	</div>
	</div>
	<!-- 图片区块 结束 -->
	
		
	<div class="menu">
	<div class="menu_sp"><b class="menu_spb_c">视频</b>
	<div class="menu_spb" id="upload_ajax_video">
	<div class="menu_tb"><span style="float:left; padding-left:5px;">支持音乐和视频的站内播放</span><div class="menu_spb_c1"></div></div>
	<p class="menu_p">支持如下视频的站内播放：<a href="http://video.sina.com.cn/" rel="nofollow" target="_blank">新浪</a>、<a href="http://www.youku.com/" rel="nofollow" target="_blank">优酷</a>、<a href="http://v.blog.sohu.com/" rel="nofollow" target="_blank">搜狐</a>、<a href="http://www.ku6.com/" rel="nofollow" target="_blank">酷6</a>、<a href="http://www.tudou.com/" rel="nofollow" target="_blank">土豆</a>，请复制粘帖视频播放页url地址</p>
	  <div id="upload_video_list" class="menu_p" style="display:none;">
		<span id="return_ajax_video_title"></span>
		<span><img id="video_img" src="" width="130" /></span>
		<p>
		<input id="videoid" type="hidden" name="video_id" />
		<span><a href=""onclick="DelVideo('videoid','video_ajax'); return false;" title="删除视频">删除视频</a></span>
		</p>
	  </div>
	  <div id="add_video" class="menu_p" style=" margin-bottom:6px; padding-top:0">
	  <iframe id="upload_video_frame" name="upload_video_frame" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank"></iframe>
	   <form action="ajax.php?mod=topic&code=dovideo" method="post"  enctype="multipart/form-data" name="upload_video" id="upload_video" target="upload_video_frame">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
		<input name="url" type="text" id="url" class="sc_r_t_a" style=" width:220px; display:inline;"/>
		<input type="submit" name="Submit" value="提交" class="c_b1" />
	   </form>
	  </div>
	</div></div>
	</div>

	<div class="menu">
	<div class="menu_bq" id="editface" ><b class="menu_bqb_c"><a href="javascript:void(0);" onclick="topic_face('showface','i_already','topic_face');return false;">表情</a></b>
	<div id="showface" class="showface"></div>
	</div></div>

	<div class="menu" >
	<div class="menu_ht" id="button_<?php echo MEMBER_ID; ?>"><span onclick="get_tag_choose(<?php echo MEMBER_ID; ?>,'my_tag');return false;" class="menu_htb_c">话题</span>
	<div class="menu_htb"><div id="tag_<?php echo MEMBER_ID; ?>"></div></div>
	</div>
	</div>
<?php $vote_setting = ConfigHandler::get('vote'); ?>
<?php if($vote_setting['vote_open']) { ?>
	<div class="menu">
	<div class="menu_vs"><b class="menu_vsb_c">投票</b>
	<div class="menu_vsb">
	<div class="menu_vsbox">
	<p class="stitle">
	<b id="vote_content1" class="vhover" onclick="setTab('vote_content',1,3)">新的投票</b>
	<b id="vote_content2" onclick="setTab('vote_content',2,3);getMyVoteList(1);">我发起的投票</b>
	<b id="vote_content3" onclick="setTab('vote_content',3,3);getMyJoinList(1);">我参与的投票</b>
	<sub class="menu_vsb_c1"></sub>
	</p>
	
	<div class="vcontent" id="con_vote_content_1">
	<p>正在加载...</p>
	</div>
	<div class="vcontent vote_conLi" id="con_vote_content_2" style="display:none;">
	<p>正在加载...</p>
	</div>
	<div class="vcontent vote_conLi" id="con_vote_content_3" style="display:none;">
	<p>正在加载...</p>
	</div>
	
	</div>
	</div>
	</div>
	</div>
	
<?php } ?>
<!-- 
<?php $event_setting=ConfigHandler::get('event_setting') ?>
 -->
	<!-- 
<?php if($event_setting == 1) { ?>
 -->
	<div class="menu">
	<div class="menu_hd"><b class="menu_hdb_c">活动</b>
	<div class="menu_hdb">
	<div class="menu_hdbox">
	<p class="stitle">
	<b id="event_content1" class="vhover" onclick="setTab1('event_content',1,3)">新的活动</b>
	<b id="event_content2" onclick="setTab1('event_content',2,3);getMyEventList(1);">我发起的活动</b>
	<b id="event_content3" onclick="setTab1('event_content',3,3);getJoinEventList(1);">我参与的活动</b>
	<sub class="menu_hdb_c1"></sub>
	</p>
	
	<div class="vcontent" id="con_event_content_1">
	<p>正在加载...</p>
	</div>
	<div class="vcontent vote_conLi" id="con_event_content_2" style="display:none;">
	<p>正在加载...</p>
	</div>
	<div class="vcontent vote_conLi" id="con_event_content_3" style="display:none;">
	<p>正在加载...</p>
	</div>
	
	</div>
	</div>
	</div>
	</div>
	<!-- 
<?php } ?>
 -->
<?php $qun_setting = ConfigHandler::get('qun_setting'); ?>
<?php if($qun_setting['qun_open']) { ?>
	<!--微群 Begin-->
	<div class="menu">
		<div class="menu_wq">
			<b class="menu_wqb_c">微群</b>
			<div class="menu_wqb">
				<div class="menu_wqbox" style="width:210px;">
					<div class="menu_tb" style="width:210px;">
						<span style="float:left; padding-left:5px;">选择你要发布到的群</span>
						<sub class="menu_wqb_c1"></sub>
					</div>
					<div class="wcontent" id="wcontent_wp"></div>
				</div>
			</div>
		</div>
	</div>
	<!--微群 End-->
	
<?php } ?>
<!--长文 Begin-->
	<div class="menu">
		<div class="menu_cw">
			<b class="menu_cwb_c">长文</b>
			<div class="menu_cwb">
				<div class="menu_cwbox">
					<div class="menu_cwtb">
						<span style="float:left; padding-left:5px;">发布微博长文</span>
						<sub class="menu_cwb_c1"></sub>
					</div>
					<div class="wcontent" id="wcontent_cw"><p>正在加载...</p></div>
				</div>
			</div>
		</div>
	</div>
	<!--长文 End-->
	
	<!--分类 Begin 
<?php $fenlei_setting=ConfigHandler::get('fenlei_setting') ?>
<?php if($fenlei_setting == 1) { ?>
	<div class="menu">
		<div class="menu_x">
			<b class="menu_xb_c">分类</b>
			<div class="menu_xb">
				<div class="menu_xbox">
					<p class="stitle">
					<b id="vote2_content1" class="vhover2" onclick="setTab2('vote2_content',1,2)">新的分类</b>
					<b id="vote2_content2" onclick="setTab2('vote2_content',2,2);getMyFenleiList(1);">我发布的分类</b>
					<sub class="menu_xb_c1"></sub>
					</p>
					<div class="vcontent" id="con2_vote2_content_1">
					<p>正在加载...</p>
					</div>
					<div class="vcontent vote_conLi" id="con2_vote2_content_2" style="display:none;">
					<p>正在加载...</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php } ?>
 分类 End-->
	
	<?php echo $this->hookall_temp['global_publish_extra1']; ?>
</div>
<div class="box_4">
<?php if ($this->Get['mod'] == 'tag') $type = 'tagview' ;elseif ($this->Get['mod'] == 'member') $type = 'tohome';elseif ($this->Get['mod'] == 'vote') $type='app'; else $type = $params['code']; ?>

<?php $type = $type ? $type : $this->Code; ?>
<input type="button" class="indexBtn" id="publishSubmit" title="按Ctrl+Enter直接发布"/>
	
	<!--这边的判断主要是为了在应用中使用微博发布框-->
<?php if(!in_array($this->Get['mod'], array('qun'))) { ?>
		<div class="box_4_open" id="weibo_syn_wp">
<?php if($this->Config['sina_enable'] && sina_weibo_init()) { ?>
<?php echo sina_weibo_syn(); ?>
<?php } ?>

<?php if($this->Config['qqwb_enable'] && qqwb_init()) { ?>
<?php echo qqwb_syn(); ?>
<?php } ?>
</div>
<?php } else { ?><div class="box_4_open"><input id="chk_toweibo" type="checkbox" onclick="selectAppTopicType(this.id, {toid:'topic_type', defTopicType:'qun'})">分享到微博 
		<script language="javascript">
			$('#topic_type').val('qun');
		</script>
		</div>
	
<?php } ?>
</div>

</div>
</div>
<script type="text/javascript">		
		
		$(document).ready(function(){

			$("#i_already").bind('focus', function(){
			   $('#tigBox_2').css('visibility', 'visible');
			   var i=0;
			   setTimeout(function(){i+=1; $('#tigBox_2').css('visibility', 'hidden'); },5000);
			});
			
			$("#publishSubmit").bind('click',function() {
				publishSubmit('i_already',0,'<?php echo $type; ?>','topic_type','','',$('#mapp_item').val(),$('#mapp_item_id').val());
				return false;
			});


			initAiInput('i_already');
		});
		/*
		$("#i_already").bind('keydown',function(event) {
			event = event || window.event;
			if (event.keyCode == 13 && event.ctrlKey) {
				$("#publishSubmit").click();
			};
		});*/
</script>