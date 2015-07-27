<?php
/*******************************************************************
 * [pugoin] (C)2010 - 2099 Dream3 Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename company.inc.php $
 *
 * @Author http://www.pugo.in $
 *
 * @Date 2011-09-16 17:25:48 823024534 437795231 805 $
 *******************************************************************/


if(!defined('IN_PUGOIN'))
{
    exit('invalid request');
}
$comid = $_GET['uid'];
if($comid)
{
	$sql = "select * from ".TABLE_PREFIX."plugin_company where `uid`='".$comid."' OR username = '".$comid."'";
	$query = $this->DatabaseHandler->Query($sql);
	$cominfo = $query->GetRow();
	$cominfo['ptime'] = my_date_format($cominfo['ptime']);
}
else
{
	$sql = "select c.*,u.face from ".TABLE_PREFIX."plugin_company c LEFT JOIN ".TABLE_PREFIX."members u ON c.uid = u.uid ORDER BY c.cid DESC";
	$query = $this->DatabaseHandler->Query($sql);
	$i = 0;
	while($row = $query->GetRow())
	{
		$companys[$i] = $row;
		$companys[$i]['ptime'] = my_date_format($row['ptime']);
		$companys[$i]['face'] = empty($row['face']) ? 'templates/default/images/no.gif' : $row['face'];
		$i++;
	}
}
?>