<?php
/*******************************************************************
 * [pugoin] (C)2010 - 2099 Dream3 Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename schedule.func.php $
 *
 * @Author http://www.pugo.in $
 *
 * @Date 2011-09-16 17:25:30 1592538317 1361764 5147 $
 *******************************************************************/


if(!defined('IN_PUGOIN'))
{
    exit('invalid request');
}

/**
 * 文件名： schedule.func.php
 * 版本号： 1.0.0
 * 作  者：　pugo.in
 * 修改时间： 2011年3月28日
 * 功能描述： 任务调试函数 for Pugoin
 * 版权所有： Powered by SMS 1.0.0 (a) 2005 - 2099 Dream3 Inc.
 * 公司网站： http://cenwor.com
 */

$GLOBALS['jsg_schedule'] = array();
$GLOBALS['schedule_html'] = '';


function schedule_add($vars,$type='')
{
    $datas = array('uid'=> max(0, (int) MEMBER_ID),'type'=>$type,'vars'=>base64_encode(serialize(array('vars'=>$vars))),);    
    
    $schedule_id = DB::insert('schedule',$datas,true);
    
    _schedule_create($schedule_id);
    
    return $schedule_id;
}

function schedule_get($id,$del=true)
{
    $return = array();
    
    $id = (is_numeric($id) ? $id : 0);
    if($id > 0)
    {
        $row = DB::fetch_first("select * from ".DB::table('schedule')." where `id`='$id'");
        if($row)
        {
            if($del)
            {
                schedule_del($id);
            }
            
            if($row['vars'])
            {
                $vars = unserialize(base64_decode($row['vars']));
                if($vars)
                {
                    $row['vars'] = $vars['vars'];
                }
                else
                {
                    $row['vars'] = array();
                }
            }                
            
            $return = $row;
        }
    }
    
    return $return;
}

function schedule_del($id)
{
    $return = false;
    
    $id = (is_numeric($id) ? $id : 0);
    if($id > 0)
    {
        $return = DB::delete('schedule',"`id`='$id'");
        
        _schedule_destory($id);
    }
    
    return $return;
}

function schedule_html($id=0)
{
    $return = '';
    
    $jsg_schedules = array();    
    if($id > 0)
    {
        $jsg_schedules[$id] = $id;
    }
    else
    {
        if($GLOBALS['jsg_schedule'])
        {
            $jsg_schedules = (array) $GLOBALS['jsg_schedule'];
        }        
        if(($_jsg_schedules = jsg_getcookie('jsg_schedule')) && ($__jsg_schedules = explode(",",$_jsg_schedules)))
        {
            $__jsg_schedules = (array) $__jsg_schedules;
            foreach($__jsg_schedules as $id)
            {
                $jsg_schedules[$id] = $id;
            }
        }
        
        _schedule_destory();
    }
    
    
        if(!$GLOBALS['__jsg_schedules'])
    {        
        $query = DB::query("select `id` from ".TABLE_PREFIX."schedule order by `id` desc limit 10");
        while($row = DB::fetch($query))
        {
            $jsg_schedules[$row['id']] = $row['id'];
        }
    }
        
        
    if($jsg_schedules)
    {
        settype($jsg_schedules,'array');        
        $sys_config = ConfigHandler::get();
        
        $html = '';    
        foreach($jsg_schedules as $id)
        {
            $id = (is_numeric($id) ? $id : 0);
            
            if($id > 0 && !isset($GLOBALS['__jsg_schedules'][$id]))
            {
                $GLOBALS['__jsg_schedules'][$id] = $id;
                
                $url = "{$sys_config['site_url']}/ajax.php?mod=schedule&code=execute&id=$id";
            
                $html .= "<img src='{$url}' border='0' width='0' height='0' />";
            }
        }    
        
        if($html)
        {
            $return = "<span style='display:none;'>{$html}</span>";
        }
    }
    
    return $return;
}

function _schedule_create($id)
{
    if(!isset($GLOBALS['jsg_schedule'][$id]))
    {
        $GLOBALS['jsg_schedule'][$id] = $id;
        
        _schedule_setcookie();
        
        $GLOBALS['schedule_html'] .= schedule_html($id);
    }
}
function _schedule_destory($id=0)
{
    if($id > 0)
    {
        unset($GLOBALS['jsg_schedule'][$id]);
    }
    else
    {
        unset($GLOBALS['jsg_schedule']);
    }
    
    _schedule_setcookie();
}
function _schedule_setcookie()
{
    $_jsg_schedule = '';
    
    if($GLOBALS['jsg_schedule'])
    {
        $_jsg_schedule = implode(",",$GLOBALS['jsg_schedule']);
    }    
            
    jsg_setcookie("jsg_schedule",$_jsg_schedule,($_jsg_schedule ? 600 : -86400000));
    
    _schedule_config($_jsg_schedule);
}
function _schedule_config($jsg_schedule=0)
{
    $return = false;
    
    $jsg_schedule = ($jsg_schedule ? 1 : 0);
    
    include(ROOT_PATH . 'setting/settings.php');
    
    if(is_array($config) && count($config))
    {
        $config_default = $config;
        
        if($config['jsg_schedule']!=$jsg_schedule)
        {
            $config['jsg_schedule'] = $jsg_schedule;
        }
        
        if($config != $config_default)
        {            
            $return = ConfigHandler::set($config);
            
            if(!$return)
            {
                ConfigHandler::set($config_default);
            }
        }
    }
    
    return $return;
}

?>