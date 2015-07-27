<?php
/*******************************************************************
 * [pugoin] (C)2010 - 2099 Dream3 Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename other.logic.php $
 *
 * @Author http://www.pugo.in $
 *
 * @Date 2011-09-16 17:25:33 1754880825 1029652098 10680 $
 *******************************************************************/



if(!defined('IN_PUGOIN'))
{
    exit('invalid request');
}

class OtherLogic
{

	var $Config;
	var $DatabaseHandler;

		
	function OtherLogic()
	{
		$this->DatabaseHandler = &Obj::registry("DatabaseHandler");
		$this->Config = &Obj::registry("config");
	}
	
	
	
	
	function TopicFavorite($uid=0,$tid=0,$act='') 
	{   
	    $timestamp = time();
	  
	    if ($tid < 1) {
			return  "请指定一个微博";
		}
		
	    $topic_info = DB::fetch_first("select * from ".DB::table('topic')." where `tid`='$tid' ");
	    if(!$topic_info) {
	      return "指定的微博已经不存在了";
	    }
	    
	    
	    $sql = "select * from `".TABLE_PREFIX."topic_favorite` where `uid`='{$uid}' and `tid`='{$tid}'";
		$query = $this->DatabaseHandler->Query($sql);
		$is_favorite = ($query->GetNumRows()>0);
		$topic_favorite = $query->GetRow();

		$sql = "select count(*) as `topic_favorite_count` from `".TABLE_PREFIX."topic_favorite` where `uid`='{$uid}'";
		$query = $this->DatabaseHandler->Query($sql);
		$row = $query->GetRow();
		if($row) {
			$sql = "update `".TABLE_PREFIX."members` set `topic_favorite_count`='{$row['topic_favorite_count']}' where `uid`='{$uid}'";
			$this->DatabaseHandler->Query($sql);
		}
		
		if('add' == $act)
		{
    		if(!$is_favorite) {
				$sql = "insert into `".TABLE_PREFIX."topic_favorite` (`uid`,`tid`,`tuid`,`dateline`) values ('{$uid}','{$tid}','{$topic_info['uid']}','{$timestamp}')";
				$this->DatabaseHandler->Query($sql);

				$sql = "update `".TABLE_PREFIX."members` set `topic_favorite_count`=`topic_favorite_count`+1 where `uid`='{$uid}'";
				$this->DatabaseHandler->Query($sql);

				$sql = "update `".TABLE_PREFIX."members` set `favoritemy_new`=`favoritemy_new`+1 where `uid`='{$topic_info['uid']}'";
				if($uid!=$topic_info['uid']) {
					$this->DatabaseHandler->Query($sql);
			    }
    		}
			return "已成功收藏";
		}
		
		if('delete' == $act)
		{
    		if ($is_favorite) {
    				$id = $topic_favorite['id'];
    
    				$sql = "delete from `".TABLE_PREFIX."topic_favorite` where `id`='{$id}'";
    				$this->DatabaseHandler->Query($sql);
    
    				$sql = "update `".TABLE_PREFIX."members` set `topic_favorite_count`=if(`topic_favorite_count`>1,`topic_favorite_count`-1,0) where `uid`='{$uid}'";
    				$this->DatabaseHandler->Query($sql);
    			}
    		return "已取消收藏";
		}
		
		
	}
	
	
	
	  
	 function Hot_User($hot_type='',$limit=0) 
	 {
	 	 ;
	 }
	 
	 
	
	  
	 function AddFavoriteTag($uid=0,$tagids=0) 
	 {   
	
    	if($tagids)
    	{   		
    		$where_list = "where `id` in ('".implode("','",$tagids)."')";
    		
	    		    	$sql = "select `id`,`name` from `".TABLE_PREFIX."tag` {$where_list}";
	    	$query = $this->DatabaseHandler->Query($sql);
	    	$tagname = array();
	    	while ($row=$query->GetRow()) {
	    	  $tagname[] = $row;
	    	}
    	} 
    	
    	$timestamp = time();
    	
    	if ($tagname) {
    	
    		foreach ($tagname as $tag) {
    			
    			    			$sql = "select `id`,`tag` from `".TABLE_PREFIX."tag_favorite` where `tag` = '{$tag['name']}' and `uid` = '".MEMBER_ID."' ";
    			$query = $this->DatabaseHandler->Query($sql);
    			$row=$query->GetRow();
    			
    			    			if(empty($row))
    			{
        			$sql = "insert into `".TABLE_PREFIX."tag_favorite` (`uid`,`tag`,`dateline`) values ('{$uid}','{$tag['name']}','{$timestamp}')";
        			$this->DatabaseHandler->Query($sql);
        			
        			$sql = "update `".TABLE_PREFIX."members` set `tag_favorite_count`=`tag_favorite_count`+1 where `uid`='{$uid}'";
        			$this->DatabaseHandler->Query($sql);
        
        			        			$sql = "update `".TABLE_PREFIX."tag` set `tag_count`=`tag_count`+1 where `id`='{$tag['id']}'";
        			$this->DatabaseHandler->Query($sql);
    			}
    		}
    		return 1;
    	}
    	else{
    		
    		return -1;
    	}
    	
    	
	 }
	 
	 
	   
	function qmd_list($uid=0,$pic_path='')
	{ 
		if ($this->Config['is_qmd'])
		{	
		
						$sql = "select `tid`,`uid`,`username`,`content`,`dateline` from `".TABLE_PREFIX."topic` where `type` = 'first' and `uid` =  '{$uid}' order by `dateline` desc ";
			$query = $this->DatabaseHandler->Query($sql);
			$topic_list = $query->GetRow();		
			$topic_list['dateline'] = date('m月d日 H:s',$topic_list['dateline']);
			
			
						Load::logic('topic');
			$TopicLogic = new TopicLogic();
			
			$members = $TopicLogic->GetMember($uid,"`uid`,`ucuid`,`username`,`nickname`,`face_url`,`face`,`topic_count`,`fans_count`,`validate`,`province`,`city`");
		  
			if(false===strpos($members['face_original'],':/'.'/'))
		    {
		        $members['face_original'] = $this->Config['site_url'] . "/" . $members['face_original'];
		    }
	
		    		    		 
		    		    $string = strip_tags($members['nickname'].' ：'.$topic_list['content']);
		    $content = cut_str($string,70);
		    
	        			$qmd_list = $this->qmd_img_list($pic_path,$members['uid'],$members['face_original'],$content,$topic_list['dateline']); 
	
			return $qmd_list;
		}
		
		return false;
		
	}
       
	
	function qmd_img_list($pic_path='',$user_uid=0,$user_face='',$topic_content='',$topic_dateline) 
	{	 
				
		
        Load::lib('io');
        $IoHandler = new IoHandler();
		
        
        
		
		        $bg = imagecreatefromjpeg($pic_path);  
       
                $white = imagecolorallocate($bg, 80, 80, 80); 
        
                 $url_white = imagecolorallocate($bg, 75, 167, 213);
        
     
                $content = array_iconv($this->Config['charset'],'utf-8',$topic_content);
     	$content = str_split($content,60);
    
                $topic_url = $this->Config['site_url'];
 
        $topic_date = array_iconv($this->Config['charset'],'utf-8',$topic_dateline.' | '.$this->Config['site_name']);
		
                imagettftext($bg, 9, 0, 118, 25, $white, $this->Config['qmd_fonts_url'], strip_tags($content[0]));
        imagettftext($bg, 9, 0, 118, 45, $white, $this->Config['qmd_fonts_url'], strip_tags($content[1]));        
        imagettftext($bg, 9, 0, 118, 70, $white, $this->Config['qmd_fonts_url'], $topic_date);       
        imagettftext($bg, 9, 0, 218, 90, $url_white, $this->Config['qmd_fonts_url'], $topic_url);

 
                $dst_im = imagecreatefromjpeg($bg); 
        $dst_info = getimagesize($bg); 
        
                $dst_x = 20;
          
                $dst_y  = 15;

     	        $user_src = $user_face; 
        $user_src_im = imagecreatefromjpeg($user_src); 
        
        #缩放比例 新图/原图
        $percent='0.58';       
        
        		list($width,$height)=getimagesize($user_src);
	 	
				$new_face_width=$width*$percent;  
		
				$new_face_height=$height*$percent; 

                $src_x = 0;
          
                $src_y = 0;
  
          
        		$box = imagecreatefrompng('./images/kuang.png');  
		imagecopyresampled($user_src_im,$box,0,0,0,0,$new_face_width,$new_face_height,80,80); 
		

                $alpha = 100; 
          
                imagecopymerge($bg,$user_src_im,$dst_x,$dst_y,$src_x,$src_y,$new_face_width,$new_face_height,$alpha); 

	 	
        if(!$this->Config['ftp_on'])
        {
        	$qmd_file_url = $this->Config['qmd_file_url'];
        }
   
        $image_path = $qmd_file_url. face_path(MEMBER_ID);
      	$image_file =  $image_path . MEMBER_ID . '_o.gif';
		 if(!is_dir($image_path))
        {
            $IoHandler->MakeDir($image_path);
        }

                imagegif($bg,$image_file);
        imagedestroy($bg);
   
		 	     $site_url = '';
	     if($this->Config['ftp_on'])
	     {
	      	 $site_url = ConfigHandler::get('ftp','attachurl');
	                   
	         $ftp_result = ftpcmd('upload',$image_file);
	         if($ftp_result > 0)
	         {               
	          	 $IoHandler->DeleteFile($image_file);
              
	             $image_file = $site_url . '/' . $image_file; 
	              
	         }                        
	      }
	      
      
        $sql = "update `".TABLE_PREFIX."members` set `qmd_url`='{$image_file}' where `uid`='".MEMBER_ID."' ";
	    $this->DatabaseHandler->Query($sql);
                    
					
        return $image_file;

	}

}
?>