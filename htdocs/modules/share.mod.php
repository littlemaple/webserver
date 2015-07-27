<?php

/**
 * 站外调用
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
		
		
		$this->Execute();
	}

	
		

	function Execute()
	{
		switch($this->Code)
		{
			case 'share':
				$this->ShareLink();
				break;
			case 'show':
				$this->Show();
				break;
			case 'doshare':
				$this->DoShareLink();
				break;
			case 'endshare':
				$this->EndShare();
				break;
			case 'doshare':
				$this->DoShareLink();
				break;
			case 'recommend':
				$this->iframe_recommend();
				break;
			default:
				$this->Main();
				break;
		}
		
		exit;
	}
	
		function Main()
	{ 
		
	die('建设中。。。');
	
	}
	
		function ShareLink()
	{ 

		$action = 'index.php?mod=share&code=doshare';
	
		$url     = $this->Get['url'];
		$sbuject = array_iconv('utf-8',$this->Config['charset'],$this->Get['t']);
		
		$content = $sbuject.' '.$url;
		
		$return_url = $_SERVER["QUERY_STRING"]; 
	
		include  $this->TemplateHandler->Template('share');
	
	}
	
		function DoShareLink()
	{	
		$action = 'index.php?mod=share&code=doshare';
		
		extract($this->Get);
		extract($this->Post);
	
		        $content = trim(strip_tags((string) $this->Post['content']));
        
        		$filter_msg = filter($content);
		if(!empty($filter_msg)){ 	
          $filter_msg = str_replace("\'",'',$filter_msg);
        }
		
	 	        $content_length = strlen($content);
        if ($content_length < 2){
            $filter_msg =  "内容不允许为空";
        }
   		
        		$return = $this->TopicLogic->Add($content);
		
		if(is_array($return))
		{	
			$this->Messager(NULL,"{$this->Config['site_url']}/index.php?mod=share&code=endshare");
		}
		else
		{	
						$content = trim(strip_tags((string) $this->Post['return_content']));	
						$error = $return ? $return : $filter_msg;	
			include  $this->TemplateHandler->Template('share');	
		}
	}
	
		function EndShare() {
		
		include  $this->TemplateHandler->Template('share');
	}
	
	
	
		function iframe_recommend()
	{	
		
				$time_config = ConfigHandler::get('time');
		$this->ShowConfig = ConfigHandler::get('show');
		
	
		$ids = (int) $this->Get['ids'];
		
		$sql = " select * from `".TABLE_PREFIX."share` where `id` = '{$ids}' ";
    	$query = $this->DatabaseHandler->Query($sql);
    	$sharelist = $query->GetRow();
    	
				if ($sharelist['type'] == 1) {
			$type = 'topic';
		} else{
			$type = 'tag';
		}
	
		
    	
		$style = @unserialize($sharelist['topic_style']);

    			$width 			= $style['width'] 			? $style['width'] 			: '300'; 
		$height 		= $style['height'] 			? $style['height'] 			: '500';
		$bg_color 		= $style['bg_color'] 	 	? $style['bg_color'] 		: '#FFFFFF';
		$text_color		= $style['text_color'] 		? $style['text_color'] 		: '#666666';
		$link_color 	= $style['link_color'] 		? $style['link_color'] 		: '#0082CB';
		$title_color 	= $style['title_color'] 	? $style['title_color'] 	: '#D6F3F7';

		
		
		$show = @unserialize($sharelist['show_style']);
		
		
		$Module = @unserialize($sharelist['condition']);
		
				$title_height = $show['is_topic_title'] ? 51 : 20;	
		$warp_width 	= $width - 15;
		$warp_height 	= $height - $title_height;
		
				if($Module['face'] || $Module['face_link']){
			$faceWidth = 80;
		}
		$face_width = $faceWidth ? $faceWidth : 20;
		$content_width  = $width - $face_width;
		$content_height = $style['is_jianju'] ? ' *height:100%' : 'height:'.$style['jianju'].'px';
		
		
				$topic_string 	= $show['topic_string'];
		
				$topic_charset  = $show['topic_charset'];

	
		
		
		
		
				
    	if ($sharelist['nickname']) 
    	{	
    		$nickname = $sharelist['nickname'];
    		
        	if(!empty($nickname))
    		{
    			$nickname = explode('|',$nickname);
    			
    			$sql = "select `uid`,`nickname` from `".TABLE_PREFIX."members` where  `nickname` in ('".implode("','",$nickname)."')";
    			$query = $this->DatabaseHandler->Query($sql);
    			$uids = array();
    			while ($row = $query->GetRow())
    			{
    				$uids[$row['uid']] = $row['uid'];
    			}
    			
    			if($uids)
    			{   
    				
    				$topic_where_list = " `uid` in ('".implode("','",$uids)."') and ";
    				
    				
    			} else{
    			
    				echo('相关用户不存在，请重新指定。');die();
    			}
    		
    		}
    	}
		
		
		
    	
    	if($sharelist['type'] == 'tag')
    	{	
    		$tag  = $sharelist['tag'];
    	
        	if(!empty($tag))
        	{
        		$tagname = explode('|',$tag);
        
        		$sql = "select * from `".TABLE_PREFIX."tag` where  `name` in ('".implode("','",$tagname)."')";
        		$query = $this->DatabaseHandler->Query($sql);
        		$tagids = array();
        		while ($row = $query->GetRow())
        		{
        			$tagids[$row['id']] = $row['id'];
        		}
	
        		if($tagids)
        		{
        			$tag_where_list = " where `tag_id` in ('".implode("','",$tagids)."') ";
        		} 
        	}
     
        	    		$sql = "select `item_id`,`tag_id` from `".TABLE_PREFIX."topic_tag` {$tag_where_list} order by `dateline` desc limit 0,{$show['topic_limit']}";
    		$query = $this->DatabaseHandler->Query($sql);
    		$tids = array();
    		while ($row = $query->GetRow())
    		{
    			$tids[$row['item_id']] = $row['item_id'];
    		}
    		
    		if($tids)
    		{
    			$tag_condition = "`tid` in  ('".implode("','",$tids)."')";
    		} 
        	
    	}

		if(!empty($tag_condition)){
		
						$condition = $tag_condition ;	
			
		} else{
			
			$condition = " {$topic_where_list}  `type` = 'first' ";
		}
		
				if ($sharelist['type'] == 'img') {
			$where_type = "and `imageid` > 0";
		} elseif ($sharelist['type'] == 'video'){
			$where_type = "and `videoid`> 0";
		} elseif ($sharelist['type'] == 'music'){
			$where_type = "and `musicid`> 0";
		} 

		$where = "where {$condition} {$where_type} order by `dateline` desc limit 0,{$show['topic_limit']}";

		$topic_list = $this->TopicLogic->Get($where);	
		
		include  $this->TemplateHandler->Template('iframe_recommend');

		$content=ob_get_contents();			
		ob_clean();
		$content = str_replace("'","\'",$content);
		$content = str_replace("\n", "", $content);
		$content = str_replace("\r", "", $content);
		$content = str_replace("/http", "http", $content);
		$content=preg_replace(array("/\r\n/i","/\>\s+\</","/\>\s+/","/\s+\</"),array("","><",">","<"),$content);
		echo "document.write('".$content."');";
		die;
	}

}
?>
