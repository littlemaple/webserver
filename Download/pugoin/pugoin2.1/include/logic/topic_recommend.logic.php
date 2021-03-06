<?php
/*******************************************************************
 * [pugoin] (C)2010 - 2099 Dream3 Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename topic_recommend.logic.php $
 *
 * @Author http://www.pugo.in $
 *
 * @Date 2011-09-16 17:25:34 743617673 1299934716 1591 $
 *******************************************************************/

 


if(!defined('IN_PUGOIN'))
{
    exit('invalid request');
}

class TopicRecommendLogic
{
	
	function TopicRecommendLogic()
	{
	}
	
	function add($data)
	{
		DB::insert('topic_recommend', $data, false, true);
	}
	
	function modify($data, $c)
	{
		DB::update('topic_recommend', $data, $c);
	}
	
	function get_info($c)
	{
		$topic_recd = DB::fetch_first("SELECT * FROM ".DB::table('topic_recommend')." WHERE tid='{$c}'");
		return $topic_recd;
	}
	
	function delete($c)
	{
		DB::query("DELETE FROM ".DB::table('topic_recommend')." WHERE tid IN(".jimplode($c).")");
	}
	
	function recd_levels($type = 'all')
	{
		$recd_levels = array(
			1 =>  array('name' => '无', 'level' => 0),
			2 => array('name'=> '全局置顶', 'level' => 4),
			3 => array('name'=> '全局推荐', 'level' => 3),
			4 => array('name'=> '话题内置顶', 'level' => 2),
			5 => array('name'=> '话题内推荐', 'level' => 1),
			6 => array('name'=> '群内置顶', 'level' => 2),
			7 => array('name'=> '群内推荐', 'level' => 1),
		);
		
		if ($type == 'tag') {
			unset($recd_levels[6], $recd_levels[7]);
		} else if ($type == 'admin_qun') {
			unset($recd_levels[4], $recd_levels[5]);
		} else if ($type == 'qun') {
			return array($recd_levels[1],$recd_levels[7]);
		} else if ($type == 'topic') {
			return array($recd_levels[1],$recd_levels[2],$recd_levels[3]);
		}
		return $recd_levels;
	}
	
}

?>