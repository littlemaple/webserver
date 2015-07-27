<?php
/*******************************************************************
 * [pugoin] (C)2010 - 2099 Dream3 Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename uninstall.php $
 *
 * @Author http://www.pugo.in $
 *
 * @Date 2011-09-16 17:25:48 534545176 1544470739 144 $
 *******************************************************************/


if(!defined('IN_PUGOIN'))
{
    exit('invalid request');
}
$sql = <<<EOF
DROP TABLE IF EXISTS {table_pre}plugin_company;
EOF;
?>