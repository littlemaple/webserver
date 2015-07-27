<?php
/*******************************************************************
 * [pugoin] (C)2010 - 2099 Dream3 Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename credits.php $
 *
 * @Author http://www.pugo.in $
 *
 * @Date 2011-09-16 17:25:48 1258453452 1558092812 279 $
 *******************************************************************/

 
  
$config['credits']=array (
  'ext' => 
  array (
    'extcredits2' => 
    array (
      'enable' => 1,
      'ico' => '',
      'name' => '金币',
      'unit' => '',
      'default' => 0,
    ),
  ),
  'formula' => '$member[topic_count]+$member[extcredits2]',
);
?>