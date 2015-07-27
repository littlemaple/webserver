<?php 
  
$config['navigation']=array (
  'list' => 
  array (
    0 => 
    array (
      'order' => 100,
      'name' => '城市广场',
      'code' => 'shopping',
      'url' => 'index.php',
      'target' => '_parent',
      'type_list' => 
      array (
        0 => 
        array (
          'order' => 110,
          'name' => '广场首页',
          'code' => 'shopping',
          'url' => 'index.php?mod=topic&code=shopping',
          'target' => '_parent',
        ),
        1 => 
        array (
          'order' => 99,
          'name' => '最新分享',
          'code' => 'topic',
          'url' => 'index.php?mod=topic&code=new',
          'target' => '_parent',
        ),
        2 => 
        array (
          'order' => 98,
          'name' => '最新评论',
          'code' => 'reply',
          'url' => 'index.php?mod=topic&code=newreply',
          'target' => '_parent',
        ),
      ),
    ),
    1 => 
    array (
      'order' => 9,
      'name' => '我的购衣柜',
      'code' => 'gyg',
      'url' => 'index.php?mod=myblog&type=shopping',
      'target' => '_parent',
    ),
    2 => 
    array (
      'order' => 8,
      'name' => '我的蒲公英',
      'code' => 'myhome',
      'url' => 'index.php?mod=topic&code=myhome',
      'target' => '_parent',
    ),
    3 => 
    array (
      'order' => 5,
      'name' => '工具箱',
      'code' => 'tools',
      'url' => 'index.php?mod=tools',
      'target' => '_parent',
      'type_list' => 
      array (
        0 => 
        array (
          'order' => 0,
          'name' => '分享到微博',
          'code' => 'share',
          'url' => 'index.php?mod=tools&code=share',
          'target' => '_parent',
        ),
        1 => 
        array (
          'order' => 0,
          'name' => '签名档',
          'code' => 'qmd',
          'url' => 'index.php?mod=tools&code=qmd',
          'target' => '_parent',
        ),
        2 => 
        array (
          'order' => 0,
          'name' => '微博秀',
          'code' => 'show',
          'url' => 'index.php?mod=show&code=show',
          'target' => '_parent',
        ),
        3 => 
        array (
          'order' => 0,
          'name' => '我要找人',
          'code' => 'search',
          'url' => 'index.php?mod=profile&code=search',
          'target' => '_parent',
        ),
        4 => 
        array (
          'order' => 0,
          'name' => '手机WAP',
          'code' => 'wap',
          'url' => 'index.php?mod=other&code=wap',
          'target' => '_parent',
        ),
        5 => 
        array (
          'order' => 0,
          'name' => '我要上墙',
          'code' => 'wall',
          'url' => 'index.php?mod=wall&code=control',
          'target' => '_parent',
        ),
      ),
    ),
  ),
);
?>