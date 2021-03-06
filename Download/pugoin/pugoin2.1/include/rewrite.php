<?php
/*******************************************************************
 * [pugoin] (C)2010 - 2099 Dream3 Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename rewrite.php $
 *
 * @Author http://www.pugo.in $
 *
 * @Date 2011-09-16 17:25:34 1435434827 344597715 767 $
 *******************************************************************/


if(!defined('IN_PUGOIN'))
{
    exit('invalid request');
}

include_once(ROOT_PATH . 'setting/rewrite.php');
if($_rewrite['mode'])
{
	include_once(ROOT_PATH . 'include/lib/rewrite.han.php');
	global $rewriteHandler;
	$rewriteHandler=new rewriteHandler();
	$rewriteHandler->absPath=$_rewrite['abs_path'];
	$rewriteHandler->gateway=$_rewrite['gateway'];
	$rewriteHandler->argSeparator=$_rewrite['arg_separator'];
	$rewriteHandler->varSeparator=$_rewrite['var_separator'];
	$rewriteHandler->prependVarList=$_rewrite['prepend_var_list'];
	$rewriteHandler->varReplaceList=(array)$_rewrite['var_replace_list'];
	$rewriteHandler->valueReplaceList=(array)$_rewrite['value_replace_list'];
	$rewriteHandler->parseRequest($_rewrite['request']);
}
?>