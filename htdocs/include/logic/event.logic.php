<?php
/*******************************************************************
 * [pugoin] (C)2010 - 2099 Dream3 Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename event.logic.php $
 *
 * @Author http://www.pugo.in $
 *
 * @Date 2011-09-16 17:25:32 1853841005 12250990 653 $
 *******************************************************************/




if(!defined('IN_PUGOIN')) {
    exit('invalid request');
}

class EventLogic
{
	function EventLogic()
	{
	}
	
	
	function is_exists($id)
	{
		$count = DB::result_first("SELECT COUNT(*) FROM ".DB::table('event')." WHERE id='{$id}'");
		return $count;
	}
	
	
	function get_event_info($id)
	{
		$event_info = DB::fetch_first("SELECT * FROM ".DB::table('event')." WHERE id='{$id}'");
		return $event_info;
	}
}