<?php
/*******************************************************************
 * [pugoin] (C)2010 - 2099 Dream3 Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename plugin.php $
 *
 * @Author http://www.pugo.in $
 *
 * @Date 2011-09-16 17:25:49 476495243 1184157341 888 $
 *******************************************************************/

 
  
$config['plugin']=array (
  'modtype' =>array(
		  array (
			'name' => '插件菜单',
			'val'  => '1',
		  ),
		   array (
			'name' => '顶部菜单',
			'val'  => '2',
		  ),
		   array (
			'name' => '个人管理中心',
			'val'  => '3',
		  ),
		   array (
			'name' => '插件管理中心',
			'val'  => '4',
		  ),
		   array (
			'name' => '页面镶入',
			'val'  => '5',
		  )),
	'vartype' => array(
		   array(
		   	'name' => '单行文本框',
			'val'  => 'text',
		   ),
		    array(
		   	'name' => '多行文本框',
			'val'  => 'textarea',
		   ),
		   array(
		   	'name' => '下拉菜单',
			'val'  => 'select',
		   ),
		    array(
		   	'name' => '单选框',
			'val'  => 'radio',
		   ),
		    array(
		   	'name' => '复选框',
			'val'  => 'checkbox',
		   ),
		   array(
		   	'name' => '用户组',
			'val'  => 'usergroup',
		   )),
);
?>