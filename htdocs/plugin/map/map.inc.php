<?php
/*******************************************************************
 * [pugoin] (C)2010 - 2099 Dream3 Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename map.inc.php $
 *
 * @Author http://www.pugo.in $
 *
 * @Date 2011-09-16 17:25:48 54913317 1655732176 693 $
 *******************************************************************/


if(!defined('IN_PUGOIN'))
{
    exit('invalid request');
}
$sql = "select t.*,m.province,m.city from ".TABLE_PREFIX."topic AS t, ".TABLE_PREFIX."members AS m WHERE t.uid = m.uid AND t.uid IN(SELECT uid FROM ".TABLE_PREFIX."members WHERE province <>'' OR city <>'') ORDER BY t.tid DESC LIMIT 20";
$query = $this->DatabaseHandler->Query($sql);
$list = array();
$i = 0;
while ($row = $query->GetRow()) 
{
	$list[$i] = $this->TopicLogic->Make($row);
	$list[$i]['address'] = ($row['province'].$row['city'] == '其他其他') ? '浙江省杭州市' : $row['province'].$row['city'];
	$list[$i] = str_replace("'","\'",str_replace("\n","",$list[$i]));
	$i = $i + 1;
}
$topics = $list;
?>