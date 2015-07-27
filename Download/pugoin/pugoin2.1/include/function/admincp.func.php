<?php
/*******************************************************************
 * [pugoin] (C)2010 - 2099 Dream3 Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename admincp.func.php $
 *
 * @Author http://www.pugo.in $
 *
 * @Date 2011-09-16 17:25:28 718212014 921989221 424 $
 *******************************************************************/




if(!defined('IN_PUGOIN'))
{
    exit('invalid request');
}


function get_sub_menu($mod)
{
	global $menu_list;
	if (!@include_once(ROOT_PATH."./setting/admin_page_menu.php")) {
		return false;
	}
	return $menu_list[$mod];
}

?>
