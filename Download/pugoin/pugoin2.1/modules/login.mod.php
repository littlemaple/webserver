<?php
/**
 * 文件名：login.mod.php
 * 版本号：(1.0)
 * 最后修改时间：2006年8月22日 18:58:20
 * 作者：pugo.in
 * 功能描述：用户登录
 */

if(!defined('IN_PUGOIN'))
{
    exit('invalid request');
}

class ModuleObject extends MasterObject
{


	
	var $Code = false;

	
	var $Username = '';

	
	var $Password = '';

	var $Secques = '';

	
	function ModuleObject($config)
	{
		$this->MasterObject($config);

		$this->Username = isset($this->Post['username'])?trim($this->Post['username']):"";
		$this->Password = isset($this->Post['password'])?trim($this->Post['password']):"";

		if(MEMBER_ID > 0) {
			$this->IsAdmin = $this->MemberHandler->HasPermission('member','admin');
		}
		$this->Execute();
	}

	
	function Execute()
	{
		ob_start();
		switch($this->Code)
		{
			case 'dologin':
				$this->DoLogin();
				break;
			case 'logout':
				$this->LogOut();
				break;
			default:
				$this->login();
				break;
		}
		$body=ob_get_clean();

		$this->ShowBody($body);
	}
	
	function login()
	{
		if(MEMBER_ID != 0 AND false == $this->IsAdmin)
		{
			$this->Messager("您已经使用用户名 ". MEMBER_NAME ." 登录系统，无需再次登录！",null);
		}
		$loginperm = $this->_logincheck();
		if(!$loginperm) {
			$this->Messager("累计 5 次错误尝试，15 分钟内您将不能登录。",null);
		}
		
	
		$this->Title="用户登录";
		
		if ($this->CookieHandler->GetVar("referer")=="")
		{
			$this->CookieHandler->Setvar("referer",referer());
		}
		
		$action="index.php?mod=login&code=dologin";
		$this->a = array('你好啊 ', 'no');

		include($this->TemplateHandler->Template("global_login"));

	}


	
	function DoLogin()
	{	
		
		
		if ($this->Config['seccode_login']) {
			$seccode = $this->Post['seccode'];
			if (!ckseccode($seccode)) {
				$this->Messager("验证码输入错误",-1);
			}
		}
        if(is_numeric($this->Username))
        {           
        	            if($this->Config['imjiqiren_enable'] && jsg_is_qq($this->Username) && imjiqiren_init($this->Config))
            {
                $_imjiqiren_client_user = _imjiqiren_client_user($this->Username);
                if($_imjiqiren_client_user && $_imjiqiren_client_user['uid'] > 0)
                {
                    $this->Username = $this->DatabaseHandler->ResultFirst("select `username` from `".TABLE_PREFIX."members` where `uid`='{$_imjiqiren_client_user['uid']}'");
                }
            }
                        elseif($this->Config['sms_enable'] && jsg_is_mobile($this->Username))
            {
                $this->Username = $this->DatabaseHandler->ResultFirst("select `username` from `".TABLE_PREFIX."members` where `phone`='{$this->Username}'");
            }
        }
        else
        {
        	            if (false!==strpos($this->Username,'@') and strlen($this->Username)>5) 
            {
                $this->Username = $this->DatabaseHandler->ResultFirst("select `username` from `".TABLE_PREFIX."members` where `email`='{$this->Username}'");
    		}
        }
        
        if($this->Username=="" || $this->Password=="")
		{
			$this->Messager("无法登录,用户名或密码不能为空");
		}
		
		
		$username = $this->Username;
		$password = $this->Password;
		
		
		
		
		$referer=$this->CookieHandler->GetVar('referer');
		Load::functions('member');
		$rets = jsg_member_login($username, $password);
        if($rets['uid'] < 1)
        {
        	$_msgs = array(
        		'0' => '无法登录，未知的错误',
        		'-1' => '无法登录,用户名不存在,您可以有至多 5 次尝试。',
        		'-2' => '无法登录,用户密码错误,您可以有至多 5 次尝试。',
        		'-3' => '累计 5 次错误尝试，15 分钟内您将不能登录。'
        	);
        	
        	$this->Messager($_msgs[$rets['uid']], null);
        }
        
        
		if($this->Config['reg_email_verify'] == '1')
		{	
			
			
			
		 	$member_info = DB::fetch_first("select `uid`,`username` from ".DB::table('members')." where `username`='$username' limit 0,1");
		 	
		    if($member_info) 
		    {
		     	$member_validate = DB::fetch_first("select `uid`,`status` from ".DB::table('member_validate')." where `uid`='{$member_info['uid']}' ");
		    }
		    
		    if($member_validate)
		    {
		    	if($member_validate['status'] != '1')
		    	{	
		    		$this->Messager(null,'index.php?mod=member&code=setverify&ids='.$member_info['uid'],0);
		    	}
		    }
		}
		
		
		if($this->Config['extcredits_enable'] && $rets['uid'] > 0)
		{
			
			update_credits_by_action('login',$rets['uid']);
		}
		
		
		
		$redirecto=($referer?$referer:referer());
		
		if(strpos($redirecto,'login')!==false)
        {
            $redirecto = "index.php?mod=topic&code=myhome" ;
        }
		
		if($this->Post['loginType'] == 'share')
		{
			$redirecto = $this->Post['return_url'];
			$this->Messager(null,$redirecto,0);
		}
		
		if($this->Post['loginType'] == 'show_login')
		{	
			$this->Messager(NULL,$redirecto,0);
		}
		
		if($rets['uc_syn_html'])
        {
            $this->Messager("{$rets['uc_syn_html']}登录成功",$redirecto,3);
        }
        else
        {
            $this->Messager(null,$redirecto);
        }
	}


	
	function LogOut()
	{
		$this->CookieHandler->ClearAll();

		$this->MemberHandler->SessionExists=false;
		$this->MemberHandler->MemberFields=array();

		$msg = null;
		if (true === UCENTER) {
						include_once(ROOT_PATH . 'uc_client/client.php');

			$msg = '已经成功退出，现在为您跳转到首页';
			$msg .= uc_user_synlogout();

					}

		$this->Messager($msg,'?',0);
	}

	function _logincheck() {
		$onlineip= client_ip();
		$timestamp=time();
		$query = $this->DatabaseHandler->Query("SELECT count, lastupdate FROM ".TABLE_PREFIX.'failedlogins'." WHERE ip='$onlineip'");
		if(false != ($login = $query->GetRow())) {
			if($timestamp - $login['lastupdate'] > 900) {
				return 3;
			} elseif($login['count'] < 5) {
				return 2;
			} else {
				return 0;
			}
		} else {
			return 1;
		}
	}

}

?>