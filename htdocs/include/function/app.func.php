<?php
/*******************************************************************
 * [pugoin] (C)2010 - 2099 Dream3 Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename app.func.php $
 *
 * @Author http://www.pugo.in $
 *
 * @Date 2011-09-16 17:25:29 820096410 725426983 4288 $
 *******************************************************************/




if(!defined('IN_PUGOIN'))
{
    exit('invalid request');
}


function app_get_list()
{
	$app_list = array(
		'vote',
		'qun',
		'fenlei',
		'event'
	);
	return $app_list;
}


function app_check($item, $item_id = 0)
{
	$app_list = app_get_list();
	if (in_array($item, $app_list)) {
		if (empty($item_id)) {
			return true;
		}
	} else {
		return false;
	}

		if (!Load::logic($item)) {
		return false;
	}

	$class_name = ucwords($item).'Logic';
	if (method_exists($class_name, 'is_exists')) {
		$ret = call_user_func(array($class_name, 'is_exists'), $item_id);

		if (empty($ret)) {
			return false;
		}
		return true;
	}
	
		return false;
}


function app_get_topic_list($item, $item_id, $options = null)
{
	$no_where = false;
	Load::logic('topic');
	$TopicLogic = new TopicLogic($this);
	$where_sql = " 1 ";
	
		if ($item_id) {
		$tids = app_itemid2tid($item, $item_id);
		
		
		if ($options['reply'] == true) {
			$where_sql = " roottid IN(".jimplode($tids).") ";
			if (!empty($options['where'])) {
				$where_sql .= " AND {$options['where']} ";
			}
			
			$query = DB::query("SELECT DISTINCT roottid FROM ".DB::table('topic')." WHERE {$where_sql}");
			$tids = array();
			while ($value = DB::fetch($query)) {
				$tids[] = $value['roottid'];
			}
			$where_sql = " 1 AND tid IN(".jimplode($tids).") ";
			$no_where = true;
			unset($query);
			unset($tids);
		} else {
			$where_sql .= " AND tid IN(".jimplode($tids).") ";
		}
	}
	
	if (!$no_where) {
		if (!empty($options['where'])) {
			$where_sql .= " AND {$options['where']} ";
		}
	}

	$order_sql = ' dateline DESC ';
	if (!empty($options['order'])) {
		$order_sql = $options['order']; 	
	}
	
	$limit_sql = '';
	if (!empty($options['limit'])) {
		$limit_sql = " LIMIT {$options['limit']} ";
	}
	
	$field = ' * ';
	if (!empty($options['$field'])) {
		$field = $options['$field'];
	}
	
	$count = DB::result_first("SELECT COUNT(*) FROM ".DB::table('topic')." WHERE {$where_sql}");
	
	if ($count) {
		$list = array();
		if ($options['page']) {
			$page_arr = page($count, $options['perpage'], $options['page_url'], array('return'=>'array',));
			$limit_sql = $page_arr['limit'];
		}
		
		$condition = " WHERE {$where_sql} ORDER BY {$order_sql} {$limit_sql} ";
		$list = $TopicLogic->Get($condition);
		return array('count' => $count, 'list' => $list, 'page' => $page_arr);
	}
	return false;
}


function app_add_relation($param)
{
	$item = $param['item'];
	$table_name = app_table($item);
	$data = array(
		'item_id' => $param['item_id'],
		'tid' => $param['tid'],
	);
	DB::insert($table_name, $data);
	
		if ($item == 'qun') {
		DB::query("UPDATE ".DB::table('qun')." SET thread_num=thread_num+1 WHERE qid='{$param['item_id']}'");
	}
}


function app_delete_relation($item, $item_id, $tid)
{
	$delete_sql = " WHERE item_id='{$item_id}' AND tid='{$tid}' ";
	DB::query("DELETE FROM ".DB::table(app_table($item))." {$delete_sql}");
	
		if ($item == 'qun') {
		DB::query("UPDATE ".DB::table('qun')." SET thread_num=thread_num-1 WHERE qid='{$item_id}'");
	}
}


function app_table($item)
{
	$table_name = 'topic_'.$item;
	return $table_name;
}


function app_itemid2tid($item, $item_id)
{
	$table_name = app_table($item);
	$where_sql = ' 1 ';
	if (is_array($item_id)) {
		$where_sql = " item_id IN (".jimplode($item_id).") ";
	} else {
		$where_sql = " item_id='{$item_id}' ";
	}
	
	$query = DB::query("SELECT tid FROM ".DB::table($table_name)." WHERE {$where_sql} ");
	$tid_ary = array();
	while ($value = DB::fetch($query)) {
		$tid_ary[] = $value['tid'];
	}
	return $tid_ary;
}


?>