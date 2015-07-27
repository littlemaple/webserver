<?php
/*******************************************************************
 * [pugoin] (C)2010 - 2099 Dream3 Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename admin_left_menu.php $
 *
 * @Author http://www.pugo.in $
 *
 * @Date 2011-09-16 17:25:48 1740210838 1053559968 11412 $
 *******************************************************************/

 $menu_list = array (
  1 =>
  array (
    'title' => '首页',
    'link' => 'index.php?mod=admin',
  ),
  2 =>
  array (
    'title' => '系统设置',
    'link' => 'index.php?mod=admin&code=home',
    'sub_menu_list' =>
    array (
      0 =>
      array (
        'title' => '<font color=blue>核心设置</font>',
        'link' => 'admin.php?mod=setting&code=modify_normal',
        'shortcut' => true,
      ),
      2 =>
      array (
        'title' => '界面与显示',
        'link' => 'admin.php?mod=show',
        'shortcut' => false,
      ),
	 18 =>
      array (
          'title' => '<font color=blue>顶部导航菜单</font>',
          'link' => 'admin.php?mod=setting&code=navigation',
          'shortcut' => true,
        ),
      
      6 =>
      array (
        'title' => 'IP访问控制',
        'link' => 'admin.php?mod=setting&code=modify_access',
        'shortcut' => false,
      ),
      8 =>
      array (
        'title' => '积分规则',
        'link' => 'admin.php?mod=setting&code=modify_credits',
        'shortcut' => false,
      ),
       10 =>
      array (
        'title' => '<font color=blue>积分等级</font>',
        'link' => 'admin.php?mod=setting&code=experience',
        'shortcut' => false,
      ),
      12 =>
      array (
        'title' => '关注默认分组',
        'link' => 'admin.php?mod=setting&code=follow',
        'shortcut' => false,
      ),
      
      14 =>
      array (
        'title' => '<font color=red>默认关注和推荐</font>',
        'link' => 'admin.php?mod=setting&code=regfollow',
        'shortcut' => true,
      ),
      
	  15 =>
      array (
        'title' => '邀请设置',
        'link' => 'admin.php?mod=setting&code=invite',
        'shortcut' => true,
      ),

      16 =>
      array (
        'title' => '计划任务',
        'link' => 'admin.php?mod=task',
        'shortcut' => false,
      ),
      
      
      22 =>
      array (
        'title' => '友情链接',
        'link' => 'admin.php?mod=link',
        'shortcut' => false,
      ),
      
      
      34 =>
      array (
        'title' => '邮件发送设置',
        'link' => 'admin.php?mod=setting&code=modify_smtp',
        'shortcut' => false,
      ),
      
	  
	  
	  40 =>
      array (
        'title' => '短信设置',
        'link' => 'admin.php?mod=setting&code=modify_smsplugin',
        'shortcut' => false,
      ),
	  
    ),
  ),
  3 =>
  array (
    'title' => '内容管理',
    'link' => '',
    'sub_menu_list' =>
    array (
      array (
        'title' => '微博管理',
        'link' => 'admin.php?mod=topic',
        'shortcut' => true,
      ),
      array (
        'title' => '话题管理',
        'link' => 'admin.php?mod=tag',
        'shortcut' => false,
      ),
      array (
        'title' => '投票管理',
        'link' => 'admin.php?mod=vote',
        'shortcut' => false,
      ),
      array (
        'title' => '活动管理',
        'link' => 'admin.php?mod=event&code=manage',
        'shortcut' => false,
      ),
      array (
        'title' => '城市管理',
        'link' => 'admin.php?mod=city',
        'shortcut' => false,
      ),
      array (
        'title' => '分类管理',
        'link' => 'admin.php?mod=fenlei',
        'shortcut' => false,
      ),
      //
      array (
        'title' => '私信管理',
        'link' => 'admin.php?mod=pm',
        'shortcut' => false,
      ),
      array (
        'title' => '举报管理',
        'link' => 'admin.php?mod=report',
        'shortcut' => false,
      ),
      array (
        'title' => '标签管理',
        'link' => 'admin.php?mod=user_tag',
        'shortcut' => false,
      ),
      array (
        'title' => '推荐话题',
        'link' => 'admin.php?mod=tag&code=recommend',
        'shortcut' => true,
      ),
	  9 =>
      array (
        'title' => '今日推荐',
        'link' => 'admin.php?mod=recdtopic',
        'shortcut' => true,
      ),
      array (
        'title' => '话题专题',
        'link' => 'admin.php?mod=tag&code=extra',
        'shortcut' => true,
      ),
      1001 =>
      array (
        'title' => '内容设置',
        'link' => 'hr',
        'shortcut' => false,
      ),
      array (
        'title' => '首页幻灯管理',
        'link' => 'admin.php?mod=setting&code=modify_slide_index',
        'shortcut' => false,
      ),
      array (
        'title' => '内页幻灯管理',
        'link' => 'admin.php?mod=setting&code=modify_slide',
        'shortcut' => true,
      ),
      1009 =>
      array (
        'title' => '内容过滤设置',
        'link' => 'admin.php?mod=setting&code=modify_filter',
        'shortcut' => true,
      ),
      1110 =>
      array (
        'title' => '关于我们设置',
        'link' => 'admin.php?mod=web_info',
        'shortcut' => false,
      ),
      1111 =>
      array (
        'title' => '首页公告',
        'link' => 'admin.php?mod=notice',
        'shortcut' => false,
      ),
      1112 =>
      array (
        'title' => '广告管理',
        'link' => 'admin.php?mod=income',
        'shortcut' => false,
      ),
    ),
  ),
  
 4 =>
  array (
    'title' => '应用',
    'link' => '',
    'sub_menu_list' =>
    array (
      1 =>
      array (
        'title' => '微群',
        'link' => 'admin.php?mod=qun',
        'shortcut' => false,
      ),
      2 =>
      array (
        'title' => '投票',
        'link' => 'admin.php?mod=vote',
        'shortcut' => false,
      ),
      /* //已暂时关闭
      3 =>
      array (
        'title' => '分类',
        'link' => 'admin.php?mod=fenlei',
        'shortcut' => false,
      ),
      //*/
      4 =>
      array (
        'title' => '活动',
        'link' => 'admin.php?mod=event',
        'shortcut' => false,
      ),
	  5 =>
      array (
        'title' => '营销',
        'link' => 'admin.php?mod=market',
        'shortcut' => false,
      ),
      /* //已暂时关闭
      array (
        'title' => '账号',
        'link' => 'admin.php?mod=account',
        'shortcut' => false,
      ),
      //*/
    ),
  ),  
  
  

    7 =>
  array (
    'title' => '用户管理',
    'link' => '',
    'sub_menu_list' =>
    array (
      1 =>
      array (
        'title' => '默认关注和推荐',
        'link' => 'admin.php?mod=setting&code=regfollow',
        'shortcut' => false,
      ),
      2 =>
      array (
        'title' => '编辑用户',
        'link' => 'admin.php?mod=member&code=search',
        'shortcut' => true,
      ),
      3 =>
      array (
        'title' => '修改管理员密码',
        'link' => 'admin.php?mod=member&code=modify&id=1',
        'shortcut' => false,
      ),
      4 =>
      array (
        'title' => '当前在线用户',
        'link' => 'admin.php?mod=sessions',
        'shortcut' => false,
      ),
      5 =>
      array (
        'title' => '+添加新用户',
        'link' => 'admin.php?mod=member&code=add',
        'shortcut' => false,
      ),
      6 =>
      array (
        'title' => '用户勋章',
        'link' => 'admin.php?mod=medal',
        'shortcut' => true,
      ),
      7 =>
      array (
        'title' => '媒体汇',
        'link' => 'admin.php?mod=media',
        'shortcut' => false,
      ),
     8 =>
      array (
        'title' => '用户V认证',
        'link' => 'admin.php?mod=vipintro',
        'shortcut' => true,
      ),
     9 =>
      array (
        'title' => '导出用户到Excel',
        'link' => 'admin.php?mod=member&code=export_all_user',
        'shortcut' => false,
      ),
      1001 =>
      array (
        'title' => '角色权限设置',
        'link' => 'hr',
        'shortcut' => false,
      ),
      10 =>
      array (
        'title' => '管理员角色',
        'link' => 'admin.php?mod=role&code=list&type=admin',
        'shortcut' => false,
      ),
      11 =>
      array (
        'title' => '普通用户角色',
        'link' => 'admin.php?mod=role&code=list&type=normal',
        'shortcut' => false,
      ),
      12 =>
      array (
        'title' => '+添加用户角色',
        'link' => 'admin.php?mod=role&code=add',
        'shortcut' => false,
      ),
    ),
  ),

  8 =>
  array (
    'title' => '数据库管理',
    'link' => '',
    'sub_menu_list' =>
    array (
     
      31 =>
      array (
        'title' => '数据备份',
        'link' => 'admin.php?mod=db&code=export',
        'shortcut' => false,
      ),
      32 =>
      array (
        'title' => '数据恢复',
        'link' => 'admin.php?mod=db&code=import',
        'shortcut' => false,
      ),
      33 =>
      array (
        'title' => '数据表优化',
        'link' => 'admin.php?mod=db&code=optimize',
        'shortcut' => false,
      ),
    ),
  ),

); ?>