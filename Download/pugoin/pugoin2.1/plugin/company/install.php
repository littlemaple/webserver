<?php
/*******************************************************************
 * [pugoin] (C)2010 - 2099 Dream3 Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename install.php $
 *
 * @Author http://www.pugo.in $
 *
 * @Date 2011-09-16 17:25:48 1517186411 141835819 808 $
 *******************************************************************/


if(!defined('IN_PUGOIN'))
{
    exit('invalid request');
}
$sql = <<<EOF
DROP TABLE IF EXISTS {pugoin}plugin_company;
CREATE TABLE {pugoin}plugin_company(
  `cid` int(10) unsigned NOT NULL auto_increment,
  `uid` int(10) unsigned NOT NULL default '0',
  `uccid` int(10) unsigned NOT NULL default '0',
  `username` varchar(50) NOT NULL default '',
  `companyname` varchar(200) NOT NULL default '',
  `companyid` varchar(80) NOT NULL default '',
  `ceoname` varchar(20) NOT NULL default '',
  `userid` varchar(30) NOT NULL default '',
  `address` varchar(250) NOT NULL default '',
  `tel` varchar(30) NOT NULL default '',
  `ptime` int(10) NOT NULL default '0',
  `ison` tinyint(1) NOT NULL default '0',
  `descripction` text,
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM;
EOF;
?>