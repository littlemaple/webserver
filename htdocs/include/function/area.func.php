<?php
/*******************************************************************
 * [pugoin] (C)2010 - 2099 Dream3 Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename area.func.php $
 *
 * @Author http://www.pugo.in $
 *
 * @Date 2011-09-16 17:25:29 1106455899 1865180124 663 $
 *******************************************************************/


if(!defined('IN_PUGOIN'))
{
    exit('invalid request');
}



function area_config_to_json() {
	include(ROOT_PATH . 'setting/area.php');
	
	$json = "";
	foreach($config['area'] as $key=>$val) {
		$j = '';
		foreach($val as $k=>$v) {
			$j .= "'{$k}':'{$v}',";
		}
		$j = trim($j,' ,');
		
		$json .= "'{$key}':{'key':'{$key}','values':{{$j}}},";
	}
	$json = trim($json,',');
	$json = "{'请选择…':{'key':'0','defaultvalue' : '0','values':{'请选择…':'0'}},{$json}}";

	return $json;
}



?>