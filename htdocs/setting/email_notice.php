<?php
/*******************************************************************
 * [pugoin] (C)2010 - 2099 Dream3 Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename email_notice.php $
 *
 * @Author http://www.pugo.in $
 *
 * @Date 2011-09-16 17:25:48 1112815106 431552185 502 $
 *******************************************************************/

 
  
$config['email_notice']=array (
  'is_email' => '0',
  'at' => 
  array (
    'content' => '你的好友对你发了一条@信息。复制连接查看 http://您蒲公英微博的地址/index.php?mod=topic&code=myat',
  ),
  'pm' => 
  array (
    'content' => '你的好友发了一条站内短信给你。复制连接查看 http://您蒲公英微博的地址/index.php?mod=pm&code=list',
  ),
  'reply' => 
  array (
    'content' => '你的好友评论了你的微博。复制连接查看 http://您蒲公英微博的地址/index.php?mod=topic&code=mycomment',
  ),
);
?>