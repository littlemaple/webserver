<?php
/**
 * 文件名：notice.mod.php
 * 版本号：1.0
 * 最后修改时间：2010-7-23 11:40
 * 作者：pugo.in
 * 功能描述: 营销模块
 */

if(!defined('IN_PUGOIN'))
{
    exit('invalid request');
}

class ModuleObject extends MasterObject
{
	var $TopicLogic;	

	function ModuleObject($config)
	{
		$this->MasterObject($config);

		Load::logic('topic');
		$this->TopicLogic = new TopicLogic($this);
		
		$this->Execute();
	}

	
	function Execute()
	{
		ob_start();
		switch($this->Code)
		{	
			case 'sendsms':
				$this->SendSms();
				break;			
			default:
				$this->Main();
				break;
		}
		$body = ob_get_clean();
		
		$this->ShowBody($body);
		
	}

	function Main()
	{
		$ButtonTitle = '发送';
		$sql = "select `id`,`title`,`dateline` from `".TABLE_PREFIX."notice` order by `id` desc";
	 	$query = $this->DatabaseHandler->Query($sql);
	
	 	$notice_list=array();
		while($row=$query->GetRow())
		{	
			$row['dateline'] = date('Y-m-d H:s:i',$row['dateline']);
			$notice_list[] = $row;	
		}
		
		//测试
		$phones = '';
		$content = '';
		//
		
		include $this->TemplateHandler->Template('admin/smsplugin');
	}
	


	function SendSms()
	{		
		$phones   = $this->Post['phones'];
		$content = $this->Post['content'];

		
		if(empty($phones))
		{
			$this->Messager("请输入手机号码",-1);
		}			
		
		if(empty($content))
		{
			$this->Messager("请输入短信内容",-1);
		}
		
		
		//Load::lib('mail');
		$phone_list = explode(';',$phones);
		//$send_success = $send_failed = 0;
		$phone_failed = '';
		
		
		
		foreach($phone_list as $phone) {
			$phone = trim($phone);
			
			/*
			$sendurl = $sms_config['sendurl'] ;
			$sendurl = str_replace('{account}',$sms_config['account'],$sendurl);
			$sendurl = str_replace('{password}',md5($sms_config['password']),$sendurl);
			$sendurl = str_replace('{content}',$content,$sendurl);
			$sendurl = str_replace('{phone}',$phone,$sendurl);
			*/
			
			//die(">>".$sendurl);

			if (preg_match("/^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/",$phone)) {
			
				$result = $this->_send_sms($phone,$content);
//echo $result;
				//die(">>aa".strstr($aa,'<response>0</response>'));
				//die($result);
				if(strpos($result,'<response>0</response>')== -1){
					$phone_failed .= $phone.';';
					//echo("111|>>".strpos($result,'<response>0</response>'));
				}else{
					//echo("222|>>".strpos($result,'<response>0</response>'));
				}
				
				//die(">>>>>>>>>>>");
				
			}else{
				$phone_failed .= $phone.';';
			}
			
		}

		$msg = '';
		if(!empty($phone_failed)){
			$msg = $phone_failed."这些号码发送失败";
		}else{
			$msg = "发送成功";
		}
		$this->Messager($msg,'admin.php?mod=market');
	}
	
	//read sms url
	function _send_sms($phone,$content)
    {        
		$sms_config = ($sms_config ? $sms_config : ConfigHandler::get('smsplugin'));
		$URL = $sms_config['sendurl'];

		$post_data['Account'] = $sms_config['account'];
		$post_data['Password'] =md5($sms_config['password']);
		$post_data['Phone'] =$phone;
		$post_data['Content'] =$content;
		$referrer="";
		$URL_Info=parse_url($URL);
		if($referrer==""){
			$referrer=$_SERVER["SCRIPT_URI"];
		}
		foreach($post_data as $key=>$value){
			$values[]="$key=".urlencode($value); 
		}
		
		$data_string=implode("&",$values);
		
		
		if(!isset($URL_Info["port"]))
			$URL_Info["port"]=80;
			
		$request.="POST ".$URL_Info["path"]." HTTP/1.1\n";
		$request.="Host: ".$URL_Info["host"]."\n";
		$request.="Referer: $referrer\n";
		$request.="Content-type: application/x-www-form-urlencoded\n";
		$request.="Content-length: ".strlen($data_string)."\n";
		$request.="Connection: close\n";
		$request.="\n";
		$request.=$data_string."\n";
		
		$fp = fsockopen($URL_Info["host"],$URL_Info["port"]);
		//die($data_string);
		fputs($fp, $request);
		
		$result = '';
		while(!feof($fp)) {
			$result .= fgets($fp, 1024);
		}
		fclose($fp);

		return $result;	
    }
	
		
}

?>
