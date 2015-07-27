<?php
/*******************************************************************
 * [pugoin] (C)2010 - 2099 Dream3 Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename master.mod.php $
 *
 * @Author http://www.pugo.in $
 *
 * @Date 2011-09-16 17:25:45 799486873 2043032568 16356 $
 *******************************************************************/


if(!defined('IN_PUGOIN'))
{
    exit('invalid request');
}

class MasterObject
{
	
	var $Config=array();
	var $Get,$Post,$Files,$Request,$Cookie,$Session;

	
	var $DatabaseHandler;
	
	var $MemberHandler;

	
	var $TemplateHandler;

	
	var $CookieHandler;

	
	var $Title='';

	var $MetaKeywords='';

	var $MetaDescription='';

	
	var $Position='';

	
	var $Module='index';

	
	var $Code='';

	var $hookall_temp = '';

	function MasterObject(&$config)
	{
		global $TemplateHandler;
		        $vvv = explode('.', SYS_VERSION);array_pop($vvv);
        $config['sys_version'] = implode('.', $vvv);
        $config['sys_published'] = SYS_PUBLISHED;
        
        		if (!$config['ad']['enable'] && isset($config['ad'])) 
        {
			unset($config['ad']);
		}
        
                if(!$config['wap_url'])
        {
            $config['wap_url'] = $config['site_url'] . "/wap";
        }

		        if(!$config['topic_length'])
        {
            $config['topic_length'] = 140;
        }
        
		$this->Config=$config;
		Obj::register('config',$this->Config);

				$this->Get     = &$_GET;
		$this->Post    = &$_POST;
		$this->Cookie  = &$_COOKIE;
		$this->Session = &$_SESSION;
		$this->Request = &$_REQUEST;
		$this->Server  = &$_SERVER;
		$this->Files   = &$_FILES;
		$this->Module = trim($this->Post['mod']?$this->Post['mod']:$this->Get['mod']);
		$this->Code   = trim($this->Post['code']?$this->Post['code']:$this->Get['code']);


		$GLOBALS['iframe'] = '';
		$GLOBALS['schedule_html'] = '';
		

				include_once ROOT_PATH . 'include/lib/template.han.php';
		$TemplateHandler = $this->TemplateHandler=new TemplateHandler($config);
		Obj::register('TemplateHandler',$this->TemplateHandler);


				if($this->Config['ipbanned_enable']) {
			$ipbanned=ConfigHandler::get('access','ipbanned');
			if(!empty($ipbanned) && preg_match("~^({$ipbanned})~",client_ip())) {
				$this->Messager("您的IP已经被禁止访问。",null);
			}
			unset($ipbanned);
		}
		

				include_once ROOT_PATH . 'include/lib/cookie.han.php';
		$this->CookieHandler = new CookieHandler($this->Config, $_COOKIE);
		Obj::register('CookieHandler',$this->CookieHandler);
//print_r($_COOKIE);


				include_once ROOT_PATH . 'include/db/database.db.php';
		include_once ROOT_PATH . 'include/db/mysql.db.php';
		$this->DatabaseHandler = new MySqlHandler($this->Config['db_host'],$this->Config['db_port']);
		$this->DatabaseHandler->Charset($this->Config['charset']);
		$this->DatabaseHandler->doConnect($this->Config['db_user'],$this->Config['db_pass'],$this->Config['db_name'],$this->Config['db_persist']);
		Obj::register('DatabaseHandler',$this->DatabaseHandler);


				if($this->Config['robot']['turnon'])
		{
			include_once ROOT_PATH . 'include/logic/robot.logic.php';
			$RobotLogic=new RobotLogic();
			$robot_name = $RobotLogic->isRobot();
			if($robot_name)
			{
								if ($this->Config['robot']['list'][$robot_name]['disallow']) {
					exit('Access Denied');
				}

				$RobotLogic->statistic();
				include_once ROOT_PATH . 'include/logic/robot_log.logic.php';
				$RobotLogLogic=new RobotLogLogic($robot_name);
				$RobotLogLogic->statistic();
				unset($RobotLogLogic);
			}
			unset($RobotLogic);
		}
		unset($this->Config['robot']);
		
				include_once ROOT_PATH . 'include/lib/member.han.php';
		$uid = 0;
		$password = '';
		
		if(($authcode=$this->CookieHandler->GetVar('auth')))
		{
		
			list($password,$uid)=explode("\t",authcode($authcode,'DECODE'));
		}
		$this->MemberHandler=new MemberHandler($this->Config);
		
		$MemberFields = $this->MemberHandler->FetchMember($uid,$password);
		if($this->MemberHandler->HasPermission($this->Module,$this->Code)==false)
		{
			$this->Messager($this->MemberHandler->GetError(),null);
		}
		$this->Title=$this->MemberHandler->CurrentAction['name'];		Obj::register("MemberHandler",$this->MemberHandler);


        		define("FORMHASH",substr(md5(substr(time(), 0, -4).$this->Config['auth_key']),0,16));
		if($_SERVER['REQUEST_METHOD']=="POST") {
			if($this->Post["FORMHASH"]!=FORMHASH) {
							}
		}


						if($this->Config['task_disable'] && ($cronnextrun=ConfigHandler::get('task','nextrun'))!=false)
		{
			$timestamp	=time();

			if($cronnextrun && $cronnextrun <= $timestamp)
			{
				include_once ROOT_PATH . 'include/logic/task.logic.php';
				$TaskLogic = new TaskLogic();
				$TaskLogic->run();

			}
		}

		if($this->Config['extcredits_enable'])
		{
			
			if(MEMBER_ID>0 && $this->CookieHandler->GetVar('login_credits')+3600<time())
			{
				update_credits_by_action('login',MEMBER_ID);

				$this->CookieHandler->SetVar('login_credits',time(),3600);
			}
		}
		
				$this->hookall_temp = $this->hookscript();
		
        
		$this->_initTheme((MEMBER_ID>0?$MemberFields:null));

	}

	
	function Messager($message, $redirectto='',$time = -1,$return_msg=false,$js=null)
	{
		global $rewriteHandler;

		ob_start();

		if ($time===-1)
        {
			$time=(is_numeric($this->Config['msg_time'])?$this->Config['msg_time']:5);
		}


		$to_title=($redirectto==='' or $redirectto==-1)?"返回上一页":"跳转到指定页面";

		if($redirectto===null)
		{
			$return_msg=$return_msg===false?"&nbsp;":$return_msg;
		}
		else
		{
			$redirectto=($redirectto!=='')?$redirectto:($from_referer=referer());
			if(str_exists($redirectto,'mod=login','code=register','/login','/register'))
			{
				$referer='&referer='.urlencode('index.php?'.$_SERVER['QUERY_STRING']);
				$this->CookieHandler->Setvar('referer','index.php?'.$_SERVER['QUERY_STRING']);
			}
			if (is_numeric($redirectto)!==false and $redirectto!==0)
			{
				if($time!==null){
					$url_redirect="<script language=\"JavaScript\" type=\"text/javascript\">\r\n";
					$url_redirect.=sprintf("window.setTimeout(\"history.go(%s)\",%s);\r\n",$redirectto,$time*1000);
					$url_redirect.="</script>\r\n";
				}
				$redirectto="javascript:history.go({$redirectto})";
			}
			else
			{
				if($rewriteHandler && null!==$message)
				{
					$redirectto .= $referer;
					if(!$from_referer && !$referer) {
						$redirectto=$rewriteHandler->formatURL($redirectto,true);
					}
				}

				if($message===null)
				{
					$redirectto=rawurldecode(stripslashes(($redirectto)));
					@header("Location: $redirectto"); #HEADER跳转
				}
				if($time!==null)
				{
					$url_redirect = ($redirectto?'<meta http-equiv="refresh" content="' . $time . '; URL=' . $redirectto . '">':null);
				}
			}
		}
		$title="消息提示:".(is_array($message)?implode(',',$message):$message);

		$title=strip_tags($title);
		if($js!="") {
			$js="<script language=\"JavaScript\" type=\"text/javascript\">{$js}</script>";
		}
		$additional_str = $url_redirect.$js;

		include($this->TemplateHandler->Template('messager'));
		$body=ob_get_clean();

		$this->ShowBody($body);

        exit;
	}

	
	function _initTheme($uid=null)
	{
		$themes = 'themes';

        if(!$this->Config[$themes])
        {
            $this->Config[$themes] = array(
                'theme_id' => $this->Config['theme_id'],
                'theme_bg_image' => $this->Config['theme_bg_image'],
                'theme_bg_color' => $this->Config['theme_bg_color'],
                'theme_text_color' => $this->Config['theme_text_color'],
                'theme_link_color' => $this->Config['theme_link_color'],
                'theme_bg_image_type' => $this->Config['theme_bg_image_type'],
                'theme_bg_repeat' => $this->Config['theme_bg_repeat'],
                'theme_bg_fixed' => $this->Config['theme_bg_fixed'],
            );
        }

        if($uid)
        {
            $this->Config['theme_id'] = $this->Config[$themes]['theme_id'];
            $this->Config['theme_bg_image'] = $this->Config[$themes]['theme_bg_image'];
			$this->Config['theme_bg_color'] = $this->Config[$themes]['theme_bg_color'];
			$this->Config['theme_text_color'] = $this->Config[$themes]['theme_text_color'];
			$this->Config['theme_link_color'] = $this->Config[$themes]['theme_link_color'];
			$this->Config['theme_bg_image_type'] = $this->Config[$themes]['theme_bg_image_type'];
            $this->Config['theme_bg_repeat'] = $this->Config[$themes]['theme_bg_repeat'];
            $this->Config['theme_bg_fixed'] = $this->Config[$themes]['theme_bg_fixed'];


            $_my = array();
            if (is_array($uid))
    		{
    			$_my = $uid;
    		}
    		else
    		{
    			$uid = max(0,(int) ($uid ? $uid : MEMBER_ID));
    			if ($uid < 1)
    			{
    				$uid = MEMBER_ID;
    			}

    			if($uid==MEMBER_ID)
    			{
    				$_my = $this->MemberHandler->MemberFields;
    			}
    			else
    			{
    				if($uid > 0)
    				{
    					$query = $this->DatabaseHandler->Query("select `uid`,`theme_id`,`theme_bg_image`,`theme_bg_color`,`theme_text_color`,`theme_link_color`,`theme_bg_image_type`,`theme_bg_repeat`,`theme_bg_fixed` from ".TABLE_PREFIX."members where `uid`='".$uid."'");
    					$_my = $query->GetRow();
    				}
    			}
    		}

            if ($_my && $_my['theme_id'])
    		{
    			$this->Config['theme_id'] = $_my['theme_id'];
                $this->Config['theme_bg_image'] = $_my['theme_bg_image'];
    			$this->Config['theme_bg_color'] = $_my['theme_bg_color'];
    			$this->Config['theme_text_color'] = $_my['theme_text_color'];
    			$this->Config['theme_link_color'] = $_my['theme_link_color'];

    			    			$this->Config['theme_bg_image_type'] = $_my['theme_bg_image_type'];
                $this->Config['theme_bg_repeat'] = $_my['theme_bg_repeat'];
                $this->Config['theme_bg_fixed'] = $_my['theme_bg_fixed'];
    		}
        }


		        if($this->Config['theme_bg_image'] && false===strpos($this->Config['theme_bg_image'],':/'.'/'))
		{
			$this->Config['theme_bg_image'] = ($this->Config['site_url'] . '/' . $this->Config['theme_bg_image']);

            if(MEMBER_ID>0 && $_my['uid']==MEMBER_ID)
            {
                $this->Config['theme_bg_image'] .= "?".date("YmdHi");
            }
            
            $this->Config['theme_bg_repeat'] = ($this->Config['theme_bg_repeat'] ? 'repeat' : 'no-repeat');
            $this->Config['theme_bg_fixed'] = ($this->Config['theme_bg_fixed'] ? 'fixed' : 'scroll');            
		}
		$this->Config['theme_bg_image_type'] = ($this->Config['theme_id'] ? $this->Config['theme_bg_image_type'] : "");
		if($this->Config['theme_bg_image_type'])
		{			
			$this->Config['theme_bg_position'] = ($this->Config['theme_bg_image_type'] . ' top');
			if ('repeat'==$this->Config['theme_bg_image_type'])
			{
				$this->Config['theme_bg_position'] = 'left top';
			}            
		}
	}

	function ShowBody($body)
	{
		echo $body;

		if($this->MemberHandler) $this->MemberHandler->UpdateSessions();

		/*
		if (upsCtrl()->ccDSP()){
				echo "<div style=\"clear:both;text-align:center;margin:5px auto;\">Powered by <a href=\"http:/"."/www.pugo.in\" target=\"_blank\">蒲公英(pugo.in) $version".
          	"</a> &nbsp; Copyright &copy;  2010 - 2011</div>";
		 }
		 */
	}

    function js_show_msg()
    {
        $return = "{$GLOBALS['schedule_html']}";
        
		if($this->Config['jsg_schedule'] || jsg_getcookie('jsg_schedule'))
		{
			$return .= jsg_schedule();
		}
		
        if(!$GLOBALS['js_show_msg_executed'] && ($js_show_msg=($_REQUEST['js_show_msg'] ? $_REQUEST['js_show_msg'] : $this->CookieHandler->GetVar('js_show_msg'))))
        {
            $GLOBALS['js_show_msg_executed'] = 1;
            $this->CookieHandler->DeleteVar('js_show_msg');
            jsg_setcookie('js_show_msg','',-86400000);
            unset($_REQUEST['js_show_msg'],$_COOKIE['js_show_msg']);

            $return .= "<script language='javascript'>
                $(document).ready(function(){show_message('{$js_show_msg}');});
            </script>";
        }

        return $return;
    }
	
	
	function hookscript($script ='', $type = 'funcs')
	{
		static $PluginObj;
		
		$hookall_config = ConfigHandler::get('hookall');
		
		$hook_return = array();		
		if(@is_array($hookall_config))
		{
			foreach($hookall_config as $identifier => $hook_file)
			{
								if(@file_exists($modfile = PLUGIN_DIR .'/'.$hook_file.'.class.php')){
				
										@include_once PLUGIN_DIR .'/'.$hook_file.'.class.php';
						
										$class_name = 'plugin_'.$identifier;
							
										if(!class_exists($class_name)){
						continue;
					}
							
										if(!isset($PluginObj[$class_name])) {
						$PluginObj[$identifier] = new $class_name;
					}
							
										$classfunc = get_class_methods($class_name);
							
										foreach($classfunc as $funcname){
							
												if(!method_exists($PluginObj[$identifier], $funcname)) {
								continue;
						}
				
						if($funcname)
						{
														if($PluginObj[$identifier]->$funcname())
							{
								$hook_return[$funcname] .= $PluginObj[$identifier]->$funcname();
							}
						}
					}
				}
			}
		}
		return $hook_return;
	}
}
?>