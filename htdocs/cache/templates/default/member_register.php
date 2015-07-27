<?php /* 2015-07-27 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?>
<?php $__my=$this->
MemberHandler->MemberFields; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo $this->Config['site_url']; ?>/" />
<?php $conf_charset=$this->Config['charset']; ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=7" />
<title><?php echo $this->Title; ?> - <?php echo $this->Config['site_name']; ?>(<?php echo $this->Config['site_domain']; ?>)</title>
<meta name="Keywords" content="<?php echo $this->MetaKeywords; ?>,<?php echo $this->Config['site_name']; ?>" />
<meta name="Description" content="<?php echo $this->MetaDescription; ?>,<?php echo $this->Config['site_notice']; ?>" />
<script type="text/javascript">
var thisSiteURL = '<?php echo $this->Config['site_url']; ?>/';
var thisTopicLength = '<?php echo $this->Config['topic_length']; ?>';
var thisMod = '<?php echo $this->Module; ?>';
var thisCode = '<?php echo $this->Code; ?>';
<?php $qun_setting = ConfigHandler::get('qun_setting'); ?>
<?php if($qun_setting['qun_open']) { ?>
	
	var isQunClosed = false;
<?php } else { ?>var isQunClosed = true;
<?php } ?>
function faceError(imgObj)
{
<?php if(TRUE===UCENTER_FACE) { ?>
		var errorSrc = '<?php echo $this->Config['site_url']; ?>/images/noavatar.gif';
<?php } else { ?>var errorSrc = '<?php echo $this->Config['site_url']; ?>/images/no.gif';
	
<?php } ?>
imgObj.src = errorSrc;
}
</script>
<link rel="shortcut icon" href="images/favicon.ico" >
<link href="templates/default/styles/main.css" rel="stylesheet" type="text/css" />
<link href="templates/default/styles/reg.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="templates/default/js/min.js"></script>
<script type="text/javascript" src="templates/default/js/dialog.js" id="dialog_js"></script>
<script type="text/javascript" src="templates/default/js/common.js"></script>
<script type="text/javascript" src="templates/default/js/validate.js"></script>  
<?php if($this->Config['theme_id']) { ?>
<link href="templates/default/styles/<?php echo $this->Config['theme_id']; ?>.css" rel="stylesheet" type="text/css" />
<?php } ?>
<style type="text/css">
<?php if($this->Config['theme_text_color']) { ?>
body{ color:<?php echo $this->Config['theme_text_color']; ?>;}
<?php } ?>

<?php if($this->Config['theme_bg_color']) { ?>
body{ background-color:<?php echo $this->Config['theme_bg_color']; ?>;}
<?php } ?>

<?php if($this->Config['theme_bg_image']) { ?>
body{ background-image:url(<?php echo $this->Config['theme_bg_image']; ?>);}
<?php } ?>

<?php if($this->Config['theme_bg_position']) { ?>
body{ background-position:<?php echo $this->Config['theme_bg_position']; ?>;}
<?php } ?>

<?php if($this->Config['theme_bg_repeat']) { ?>
body{ background-repeat:<?php echo $this->Config['theme_bg_repeat']; ?>;}
<?php } ?>

<?php if($this->Config['theme_text_color']) { ?>
body{ color:<?php echo $this->Config['theme_text_color']; ?>;}
<?php } ?>

<?php if($this->Config['theme_link_color']) { ?>
a:link{ color:<?php echo $this->Config['theme_link_color']; ?>;}
<?php } ?>
.regU{ margin:0 0 20px}
.set_warp select{ margin-right:6px; margin-bottom:6px; float:left; display:inline;}
</style>
<script type="text/javascript"> 
$(function(){ 
    $("#email_input").focus(function(){$(this).css("background","#CBFE9F");$(".R_tt1").show();}).blur(function(){$(this).css("background","#FFF");$(    ".R_tt1").hide();});
	$("#password").focus(function(){$(this).css("background","#CBFE9F");$(".R_tt2").show();}).blur(function(){$(this).css("background","#FFF");$(".R_tt2"    ).hide();});
    $("#username_input").focus(function(){$(this).css("background","#CBFE9F");$(".R_tt3").show();}).blur(function(){$(this).css("background","#FFF");$(    ".R_tt3").hide();});
    $("#nickname_input").focus(function(){$(this).css("background","#CBFE9F");$(".R_tt4").show();}).blur(function(){$(this).css("background","#FFF");$(    ".R_tt4").hide();});
	$("#work_type").focus(function(){$(this).css("background","#CBFE9F");$(".R_tt5").show();}).blur(function(){$(this).css("background","#FFF");$(    ".R_tt5").hide();});
}); 
</script>
</head>
<body>
<div class="Rlogo"><a title="<?php echo $this->Config['site_name']; ?>" href="index.php">title="<?php echo $this->Config['site_name']; ?>"</a></div>
<div class="main_2">
  <div class="main_t"></div>
  <div class="set_warp">
    <div class="R_L">
      <form method="post"  action="<?php echo $action; ?>" name='reg' id="member_register" onSubmit="return check_submit(this, 3);">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
        <input type="hidden" name="referer" value="<?php echo $referer; ?>">
        <table width="100%" border="0">
          
<?php if($inviter_member['username']) { ?>
          <tr>
            <td align="center"><img src="<?php echo $inviter_member['face']; ?>" width="54px" height="54px;"/></td>
            <td align="left" valign="middle"><span class="fontGreen"><?php echo $inviter_member['nickname']; ?></span> 正邀请您加入<?php echo $this->Config['site_name']; ?>，<br />
              注册成功后，你们将自动相互关注，并在个人首页中看到对方分享的信息。</td>
          </tr>
          
<?php } ?>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
		  
<?php if($this->_sms_register()) { ?>
		  <tr>
            <td align="right" valign="top" width="90">手机号码：</td>
            <td>
				<div id="sms_bind_area">
					1、请输入您的手机号，并点击“获取验证码”按钮<br>
					验证码将通过短信发到手机上(节假日期间短信稍有延迟，请耐心等待)<br>
					<input type="text" value="" name="sms_bind_num" id="sms_bind_num" class="regP" onBlur="Validator.Validate(this.form,3,this.name)" />&nbsp;<input type="button" value="获取验证码" class="save" onclick="Validator.Validate(this.form,3,'sms_bind_num')&&sms_bind()" id="sms_bind_button" />
				</div>
			</td>
          </tr>
		  <tr>
			<td></td>
			<td>				
				<div style="display:none;" id="sms_bind_verify_area">
					2、请输入发到您手机的验证码<br>
					<input type="text" value="" name="sms_bind_key" id="sms_bind_key" class="regP" onBlur="Validator.Validate(this.form,3,this.name)" />
				</div>
				<div id="sms_bind_msg"></div>
				<script language="javascript">        
					function sms_bind()
					{
						var sms_num = $('#sms_bind_num').val();

						if(11!=sms_num.length)
						{
							MessageBox('notice', '请输入11位的手机号码');
							$('#sms_bind_num').focus();

							return false;
						}
						
						var myAjax = $.post
						(
							'ajax.php?mod=sms&code=register_verify',
							{
								sms_num:sms_num                        
							},
							function (d) 
							{
								if(d)
								{
									$('#sms_bind_msg').html(d);
									$('#sms_bind_num').focus();
								}
								else
								{
									$('#sms_bind_button').attr('disabled','true');
									$('#sms_bind_verify_area').css('display','block');
								}
							}
						);
					}
					function check_sms_bind_key()
					{
						var sms_num = $('#sms_bind_num').val();
						var bind_key = $('#sms_bind_key').val();
                
						if(11!=sms_num.length)
						{
							MessageBox('notice', '请输入11位的手机号码');
							$('#sms_bind_num').focus();

							return false;
						}
						if(6!=bind_key.length)
						{
							MessageBox('notice', '请输入6位的验证码');
							$('#sms_bind_key').focus();

							return false;
						}

						var myAjax = $.post(
							'ajax.php?mod=sms&code=check_register_verify',
							{
								sms_num:sms_num,
								bind_key:bind_key
							},
							function (d)
							{
								if(d)
								{
									$('#sms_bind_msg').html(d);
									$('#sms_bind_key').focus();
								}
							}
						);
					}
				</script>
			</td>
		  </tr>
		  
<?php } ?>
  
<?php if(!$noemail) { ?>
          <tr>
            <td align="right" valign="top" width="90">常用Email：</td>
            <td><input type="text" name="email" id="email_input" value="<?php echo $email; ?>" class="regP" tabindex="1" />
              <div id="check_email_result" class="error" style="display:none"></div>
              <div class="R_tt1">需要验证Email，用于登录和取回密码等.</div></td>
          </tr>
		  
<?php } ?>
          <tr>
            <td align="right" valign="top">登录密码：</td>
            <td><input type="password" name="password" id="password" maxlength="32" class="regP" onBlur="Validator.Validate(this.form,3,this.name)" tabindex="2"/>
              <div class="R_tt2">密码至少5位</div></td>
          </tr>
          <tr>
            <td align="right" valign="top">确认密码：</td>
            <td><input type="password" name="password2" id="password2" maxlength="32" class="regP" onBlur="Validator.Validate(this.form,3,this.name)" tabindex="3"/></td>
          </tr>
          <tr>
            <td align="right" valign="top">用户帐户：</td>
            <td><input name="username" type="text" id="username_input" maxlength="15" url="true" class="regP" onkeyup="value=value.replace(/[\W]/g,'') " onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" tabindex="4"/>
              <div id="check_username_result" class="error" style="display:none;"></div>
              <div class="R_tt3">只能用英文+数字，不能用中文，用于他人访问你的微博，你也可以用来登录本站，一旦注册不能修改。你的微博地址是：<?php echo $this->Config['site_url']; ?>/
                <input url="true" class="sp_5" type="text" />
              </div></td>
          </tr>
          <tr>
            <td align="right" valign="top">姓名/昵称：</td>
            <td><input name="nickname" type="text" id="nickname_input" maxlength="15"  class="regP" tabindex="5"/>
              <div id="check_nickname_result" class="error" style="display:none;"></div>
              <div class="R_tt4">用于显示、@通知和发送站内信）</div></td>
          </tr>
          
<?php if($this->
          Config[city_status]) { ?>
		  <tr>
            <td align="right" valign="top">我正在：</td>
            <td><?php echo $work_type_select; ?>
              <div id="check_work_type_result" class="error" style="display:none;"></div>
              <div class="R_tt5">非常重要</div></td>
          </tr>
		  <tr >
            <td align="right" valign="top">
			<span id="work_college_title">所在大学：</span><span id="work_area_title">所在地区：</span>
			</td>
            <td>
			  <div style="float:left;">
                <?php echo $province; ?>
              </div>
              <div style="float:left;" id="work_college">
                <select id="college" name="college" onchange="changeCollege();">
				<option value=''>请选择</option>
				</select>
				<input type="hidden" id="hidForCollege" name="hidForCollege" value=""/>
              </div>
			  <div style="float:left;" id="work_area">
                <select id="city" name="city" onchange="changeCity();Validator.Validate(this.form,3,this.name)">
				<option value=''>请选择</option>
				</select>
				<input type="hidden" id="hidForCity" name="hidForCity" value=""/>
             
                <select id="area" name="area" onchange="changeArea();">
				<option value=''>请选择</option>
				</select>
              
                <select id="street" name="street">
				<option value=''>请选择</option>
				</select>
              </div>
              <span class="fontC" style="display:none; float:left; *float:none; *display:inline; width:400px;"></span> 
			  </td>
            
          </tr>
          
<?php } ?>
  
<?php if($this->Config['seccode_register']) { ?>
			  <tr>
				<td align="right" valign="top">验证码：</td>
				<td>
				  <div class="ml10">
					<input type="text" name="seccode" id="seccode_input" style="width:80px;" class="regP" tabindex="10"/>
					<div id="check_seccode_result" class="error_2" style="display:none;"></div>
				  </div>


				  
				  <div class="ml11">
					<script language="javascript">seccode({"id":"seccode_input"});</script>
					<a href="javascript:updateSeccode('seccode_input');">换一换</a>
				  </div>
				  
				  </td>
			  </tr>
		  
<?php } ?>
          <tr>
            <td align="right" valign="middle">&nbsp;</td>
            <td>
              <input name="copyrightInput" type="checkbox" id="copyrightInput" onclick="regCopyrightSubmit();" value="1" checked="checked" />
              <label for="copyrightInput"> <span class="font12px"><a href="index.php?mod=other&code=regagreement" target="_blank">我已看过并同意《使用协议》</a></span></label>
            </td>
          </tr>
          <tr>
            <td align="right" valign="middle">&nbsp;</td>
            <td>
              <input id="regSubmit" class="Reg_b" type="submit" disabled value="确定注册"/>
            </td>
          </tr>
        </table>
      </form>
    </div>
    <div class="R_R">
      <div class="r_tit">已有<?php echo $this->Config['site_name']; ?>帐号？请直接登录</div>
      <a class="r_loginbtn" href="<?php echo $this->Config['site_url']; ?>/index.php?mod=login" rel="nofollow" title="登录即可分享新鲜事" onclick="ShowLoginDialog();return false;">登录<?php echo $this->Config['site_name']; ?></a>
      <div class="R_linedot"></div>
      <div class="r_tit">如果已开通以下服务，点击相应图标登录</div>
      <div class="R_logoList"> 
<?php if($this->Config['sina_enable'] && sina_weibo_init()) { ?>
 &nbsp; 
<?php echo sina_weibo_login('b'); ?>
 
<?php } ?>

<?php if($this->Config['qqwb_enable'] && qqwb_init()) { ?>
 &nbsp; 
<?php echo qqwb_login('b'); ?>
 
<?php } ?>

<?php if($this->Config['yy_enable'] && yy_init()) { ?>
 &nbsp; 
<?php echo yy_login('b'); ?>
 
<?php } ?>

<?php if($this->Config['renren_enable'] && renren_init()) { ?>
 &nbsp; 
<?php echo renren_login('b'); ?>
 
<?php } ?>
  </div>
    </div>
  </div>
</div>
<script type="text/javascript">
function regCopyrightSubmit() {
	document.getElementById('regSubmit').disabled = !document.getElementById('copyrightInput').checked;
}
regCopyrightSubmit();

$(document).ready(function(){
var selectOption=
<?php load::functions('area');echo area_config_to_json(); ?>
;


});

</script>
<script language="JavaScript" type="text/javascript">
var validateRegularList={
	username:{dataType:"LimitB",min:'3',max:'15',msg:"用户名必须在3至15个字节以内"},
	nickname:{dataType:"LimitB",min:'3',max:'15',msg:"微博主页必须在3至15个字节以内"},
	password:{dataType:"LimitB",min:"5",msg:"密码过短，请设成5位以上。"},
	password2:{dataType:"Repeat",to:"password",msg:"两次输入的密码不一致"},
<?php if($this->_sms_register()) { ?>
	sms_bind_num:{require:true,dataType:"Mobile",min:"10",max:'12',msg:"请输入11位的手机号码"},
	sms_bind_key:{require:true,dataType:"Number",min:"5",max:'7',msg:"请输入6位的验证码"},
	
<?php } ?>

<?php if(!$noemail) { ?>
	email:{require:true,dataType:"Email",msg:"Email邮箱格式不正确"},
	
<?php } ?>
province:{dataType:"LimitB",min:'1',msg:"请选择省/直辖市"},
	hidForCity:{dataType:"LimitB",min:'1',msg:"请选择城市/地区"},
	truename:{require:false,dataType:"Truename",msg:"请填写真实姓名"},
	seccode:{dataType:"LimitB",min:"4",msg:"验证码不正确，重新输入下吧。"}
}

var validateRegularListCollege={
	username:{dataType:"LimitB",min:'3',max:'15',msg:"用户名必须在3至15个字节以内"},
	nickname:{dataType:"LimitB",min:'3',max:'15',msg:"微博主页必须在3至15个字节以内"},
	password:{dataType:"LimitB",min:"5",msg:"密码过短，请设成5位以上。"},
	password2:{dataType:"Repeat",to:"password",msg:"两次输入的密码不一致"},
<?php if($this->_sms_register()) { ?>
	sms_bind_num:{require:true,dataType:"Mobile",min:"10",max:'12',msg:"请输入11位的手机号码"},
	sms_bind_key:{require:true,dataType:"Number",min:"5",max:'7',msg:"请输入6位的验证码"},
	
<?php } ?>

<?php if(!$noemail) { ?>
	email:{require:true,dataType:"Email",msg:"Email邮箱格式不正确"},
	
<?php } ?>
province:{dataType:"LimitB",min:'1',msg:"请选择省/直辖市"},
	hidForCollege:{dataType:"LimitB",min:'1',msg:"请选择学校"},
	truename:{require:false,dataType:"Truename",msg:"请填写真实姓名"},
	seccode:{dataType:"LimitB",min:"4",msg:"验证码不正确，重新输入下吧。"}
}

</script>
<script type="text/javascript">

function addEvent(eventHandler)
    {
        var tags = document.getElementsByTagName('input');
        for(var i=0;i<tags.length;i++)
        {
            if(tags[i].getAttribute('url') == 'true')
            {
                if(tags[i].addEventListener)
                {
                    tags[i].addEventListener('keyup',eventHandler,true);
                }
                else
                {
                    tags[i].attachEvent('onkeyup',eventHandler);
                }
            }
        }
    }
function addInput(e)
    {
        var obj = e.target ? e.target : e.srcElement;
        var tags = document.getElementsByTagName('input');
        for(var i=0;i<tags.length;i++)
        {
            if(tags[i].getAttribute('url') == 'true'&&tags[i]!=obj)
            {
                tags[i].value = obj.value;
            }
        }
    }
    window.onload = function()
    {
        addEvent(addInput);
    }
</script>
<SCRIPT LANGUAGE="JavaScript">
$("#username_input").bind("blur",function (){check('username')});
<?php if($this->_sms_register()) { ?>
$("#sms_bind_key").bind("blur", function(){check_sms_bind_key()});
<?php } ?>

<?php if(!$noemail) { ?>
$("#email_input").bind("blur",function (){check('email')});
<?php } ?>
$("#nickname_input").bind("blur",function (){check('nickname')});
$("#seccode_input").bind("blur",function (){check('seccode')});
function check(obj)
{
	var _objList={username:'用户帐户',email:'E-MAIL地址',nickname:'姓名/昵称'};
	var _objValue=$('#'+obj+'_input').val();	
	if(_objValue.length==0 || Validator.Validate(document.getElementById('member_register'),3,obj)!=true) {
		$("#check_"+obj+"_result").hide();
		return false;
	}

	$("#check_"+obj+"_result").html('正在检查'+_objList[obj]+'是否可注册...');
	var myAjax = $.post(
		'ajax.php?mod=member',
		{
			code:'check_'+obj,
			check_value:_objValue
		},
		function (r) {
			if(''!=r) {
				$("#check_"+obj+"_result").html(r);
				$("#check_"+obj+"_result").show();
				$("#check_"+obj+"_result").addClass('error');
				$('#'+obj+'_input').val('');
				$('#'+obj+'_input').focus();
				//对验证码的特殊处理
				if (obj == 'seccode') {
					updateSeccode();
				}
			} else {
				$("#check_"+obj+"_result").hide();
			}
		}
	);
}
function changeProvince(){
  var work_type = document.getElementById("work_type").value;
  var province = document.getElementById("province").value;
  
  if(work_type == "2"){
  	  document.getElementById("hidForCollege").value = "";
  	  var url = "ajax.php?mod=member&type=top&code=sel&collegeprovince="+province;
  	  var myAjax=$.post(
				url,
				function(d){
					$('#' + "college").html(d);	
				}
	  );
  }else{
  	  document.getElementById("hidForCity").value = "";
      var url = "ajax.php?mod=member&type=top&code=sel&province="+province;
	  var myAjax=$.post(
				url,
				function(d){
					$('#' + "city").html(d);
					document.getElementById("street").length = 1;
					document.getElementById("area").length = 1;
					document.getElementById("street").style.display = "none";
					document.getElementById("area").style.display = "none";
	
				}
	  );
  }
}
changeProvince();
function changeCity(){
  var city = document.getElementById("city").value;
  document.getElementById("hidForCity").value = city;
  var url = "ajax.php?mod=member&type=top&code=sel&city="+city;
  var myAjax=$.post(
		  	url,
		  	function(d){
				if(d){
					document.getElementById("area").style.display = "block";
		  		    $('#' + "area").html(d);
				}else{
					document.getElementById("area").length = 1;
					document.getElementById("area").style.display = "none";
				}
				document.getElementById("street").style.display = "none";
				document.getElementById("street").length = 1;
		  	}
  );
}

function changeCollege(){
  var college = document.getElementById("college").value;
  document.getElementById("hidForCollege").value = college;
}

function changeArea(){
  var area = document.getElementById("area").value;
  var url = "ajax.php?mod=member&type=top&code=sel&area="+area;
  var myAjax=$.post(
		  	url,
		  	function(d){
				if(d){
					document.getElementById("street").style.display = "block";
				    $('#' + "street").html(d);
				}else{
					document.getElementById("street").length = 1;
					document.getElementById("street").style.display = "none";
				}
		  	}
  );
}
function check_submit(vobj, vtype)
{
	return Validator.Validate(vobj, vtype)&&check('seccode')
<?php if($this->_sms_register()) { ?>
&&check_sms_bind_key()
<?php } ?>
;
}

changeWorkType();
function changeWorkType(){
	var work_type = document.getElementById("work_type").value;
	if(work_type == "2"){
		document.getElementById("hidForCity").value = "true";
	    document.getElementById("hidForCollege").value = document.getElementById("college").value;
		Validator.SetRegular("member_register",validateRegularListCollege);
		document.getElementById("work_college").style.display = "block";
		document.getElementById("work_area").style.display = "none";
		document.getElementById("work_college_title").style.display = "block";
		document.getElementById("work_area_title").style.display = "none";
	}else{
		document.getElementById("hidForCollege").value = "true";
	    document.getElementById("hidForCity").value = document.getElementById("city").value;
		Validator.SetRegular("member_register",validateRegularList);
		document.getElementById("work_college").style.display = "none";
		document.getElementById("work_area").style.display = "block";
		document.getElementById("work_college_title").style.display = "none";
		document.getElementById("work_area_title").style.display = "block";
	}
	
	changeProvince();
}
</SCRIPT><script type="text/javascript" src="templates/default/js/combobox.js"></script>
<script language="javascript" src="templates/default/js/jsgst.js"></script>
<script language="javascript" src="templates/default/js/jsgst_autocomplete.js"></script>
<script language="javascript" src="templates/default/js/ai.js"></script>
<!-- JS消息提示层 show_message('发布成功') -->
<div id="show_message_area"></div>
<?php echo $this->js_show_msg(); ?>
<?php echo $GLOBALS['schedule_html']; ?>
<?php if($this->Config['jsg_schedule'] || jsg_getcookie('jsg_schedule')) echo jsg_schedule(); ?>
<!-- Ajax端内容返回 -->
<div id="ajax_output_area"></div>

<div id="footer">Copyright &copy;  2011 - 2012 pugo.in <a href="index.php?mod=other&amp;code=about">关于我们</a> <a href="index.php?mod=tag&amp;code=意见反馈">意见反馈</a> <a rel="nofollow" title="网站公告" target="_blank" href="index.php?mod=other&amp;code=notice">网站公告</a> [<a rel="nofollow" title="网站备案" target="_blank" href="http://www.miibeian.gov.cn/"><?php echo $this->Config['icp']; ?></a>] <?php echo $this->Config['tongji']; ?></div>

<script type="text/javascript">
$(document).ready(function(){
$('.goTop').click(function(e){
e.stopPropagation();
$('html, body').animate({scrollTop: 0},300);
backTop();
return false;
});
});
</script>
<div id="backtop" class="backTop <?php echo $t_col_backTop; ?>"><a href="/#" class="goTop" ></a></div>
<script type="text/javascript">
window.onscroll=backTop;
function backTop(){
var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
  if(scrollTop==0){
   document.getElementById('backtop').style.display="none";
   }else{
   document.getElementById('backtop').style.display="block";
    }
  }
backTop();
</script>
</body>
</html>
<?php echo $GLOBALS['iframe']; ?>