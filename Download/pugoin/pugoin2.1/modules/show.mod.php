<?php

/**
 * 微博秀
 *
 * @author pugo.in
 * @package pugo.in
 */



if(!defined('IN_PUGOIN'))
{
    exit('invalid request');
}

class ModuleObject extends MasterObject
{

	function ModuleObject($config)
	{
		$this->MasterObject($config);

		Load::logic('topic');
		$this->TopicLogic = new TopicLogic($this);

		$this->CacheConfig = ConfigHandler::get('cache');

		$this->shareConfig = ConfigHandler::get('share');



		$this->Execute();
	}


	

	function Execute()
	{
		ob_start();
		switch($this->Code)
		{

			case 'show':
				$this->Show();
				break;

			default:
				$this->Main();
				break;
		}
		$body=ob_get_clean();

		$this->ShowBody($body);
	}


		function Main()
	{	
		extract($this->Get);
		extract($this->Post);
		
		$uid = $this->Get['uid'] ? $this->Get['uid'] : MEMBER_ID;
		
		if($uid)
		{
						$members = $this->TopicLogic->GetMember($uid,"`uid`,`ucuid`,`username`,`nickname`,`face_url`,`face`,`topic_count`,`fans_count`,`validate`,`province`,`city`");
		    if(false===strpos($members['face'],':/'.'/'))
		    {
		        $members['face'] = $this->Config['site_url'] . "/" . $members['face'];
		    }
		
						$showFans 		= $showFans   ? $showFans 	: '1';
	
			$userlimit 		= $showFans * 4;
		
						
						$width 			= $width  ? $width  : '300';
			$height 		= $height ? $height : '500';
			
						$div_width 	= $width  - 8;
			$div_height = $height - 8;
			
						$memberlist_height = 70;
			$title_height = $isTitle ? '30' :'0';
		
			
			$fans_height = $isFans ? 115*$showFans : '0';
			
			$topic_height = $height - ($memberlist_height+$fans_height+$title_height+24);
			$Color = explode(',',$color);
		
	
			$titleColor 	= '#'.$Color[0]		? '#'.$Color[0] : '#D6F3F7';
			$bgColor 		= '#'.$Color[1]		? '#'.$Color[1] : '#FFFFFF';
			$textColor		= '#'.$Color[2]		? '#'.$Color[2]	: '#666666';
			$linkColor 		= '#'.$Color[3]		? '#'.$Color[3]	: '#0082CB';
			$borderColor 	= '#'.$Color[4]		? '#'.$Color[4]	: '#C0DADE';
			

						$isFans 		= $isFans;
			$isTopic 		= $isTopic;
			$isTitle 		= $isTitle ;
			$isBorder		= $isBorder ? '1' : '';
			
						if($isFans)
			{				
    			$sql = "select `uid` as id from `".TABLE_PREFIX."buddys` where `buddyid`='{$uid}' order by `id` desc";
    			$query = $this->DatabaseHandler->Query($sql);
    			$uids = array();
    			while ($row = $query->GetRow())
    			{
    				$uids[$row['id']] = $row['id'];
    			}
    
    			$user_list = $this->TopicLogic->GetMember("where `uid` in('".implode("','",$uids)."') limit {$userlimit}","`uid`,`ucuid`,`username`,`nickname`,`face_url`,`face`,`topic_count`,`fans_count`,`validate`,`province`,`city`");
    		}
    		
						if($isTopic)
			{
				$where = "where `uid` = '{$uid}' and `type` != 'reply' order by `dateline` desc limit 0,20 ";		
				$topic_list = $this->TopicLogic->Get($where);
			}
		}
			
		include  $this->TemplateHandler->Template('iframe_show');
        
        exit;

	}

	
		function Show()
	{	
		if (MEMBER_ID < 1) {
			$this->Messager(null,$this->Config['site_url'] . "/index.php?mod=login");
		}	
		
				if($this->MemberHandler->HasPermission($this->Module,$this->Code)==false)
		{
			$this->Messager($this->MemberHandler->GetError(),null);
		}
		
				if(MEMBER_STYLE_THREE_TOL){
			$my_member = $this->TopicLogic->GetMember(MEMBER_ID);
						if ($my_member['medal_id']) {
				$medal_list = $this->TopicLogic->GetMedal($my_member['medal_id'],$my_member['uid']);
			}
		}
		
		$act_list = array('share'=>'分享到微博','qmd'=>'签名档',);
		
		$act_list['show'] = array('name'=>'微博秀','link_mod'=>'show','link_code'=>'show',);    

        if($this->Config['qqwb_enable'] && qqwb_init($this->Config))
        {
            $act_list['qqwb'] = 'QQ微博';
        }                
       // $act_list['imjiqiren'] = 'QQ机器人';        
		if ($this->Config['sina_enable'] && sina_weibo_init($this->Config))
		{
			$act_list['sina'] = '新浪微博';
		}
        if('qqrobot'==$this->Code && !isset($act_list['qqrobot']) && isset($act_list['imjiqiren']))
        {
            $this->Code = 'imjiqiren';
        }
        $act_list['medal'] = array('name'=>'勋章','link_mod'=>'other','link_code'=>'medal',);  
      //  $act_list['sms'] = '短信';    
		$act = isset($act_list[$this->Code]) ? $this->Code : 'show';

		
				$uid =  MEMBER_ID;

		$sql = "select `uid`,`stylevalue` from `".TABLE_PREFIX."topic_show` where `uid` =  '{$uid}' ";
		$query = $this->DatabaseHandler->Query($sql);
		$topicShow = $query->GetRow();		
		$style = @unserialize($topicShow['stylevalue']);
        if(!$style)
        {
            $style['isTopic'] = 1;
        }
   
		if(empty($topicShow))
		{
						$width = '280'	;
			$height = '450';	
			
			$titleColor	= '#D6F3F7';
			$bgColor = '#FFFFFF';
			$textColor = '#666666';
			$linkColor = '#0082CB';
			$borderColor = 'C0DADE';
			
			$isFans = '1';
			$isTitle = '1';
			$isTopic = '1';
			$isBorder = '1';
			
			$showFans = '1';
		
		}
		else
		{
    		    		$width 	  = $style['width'];
    		$height   = $style['height'];
    		
    		    		$titleColor = $style['titleColor'];
    		$bgColor 	= $style['bgColor'];
    		$textColor	= $style['textColor'];
    		$linkColor 	= $style['linkColor'];
    		$borderColor = $style['borderColor'];

    		    		$isFans 	= $style['isFans'];
    		$isTitle 	= $style['isTitle'];
    		$isTopic 	= $style['isTopic'];
    		$isBorder 	= $style['isBorder'];
    		
    		$showFans 	= $style['showFans'];
		}
		
				$iframe_color = str_replace('#','',$titleColor.','.$bgColor.','.$textColor.','.$linkColor.','.$borderColor);
		
    	$this->Title = '微博秀';
		include  $this->TemplateHandler->Template('topic_show');
	}
	
		function _member()
	{
		if (MEMBER_ID < 1) {
			$this->Messager(null,$this->Config['site_url'] . "/index.php?mod=login");
		}

		$member = $this->TopicLogic->GetMember(MEMBER_ID);

		return $member;
	}

}
?>
