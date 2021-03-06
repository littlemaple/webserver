<?php
/*******************************************************************
 * [pugoin] (C)2010 - 2099 Dream3 Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename install.lang.php $
 *
 * @Author http://www.pugo.in $
 *
 * @Date 2011-09-16 17:25:38 201535511 1610470484 9171 $
 *******************************************************************/


define('INSTALL_LANG', 'SC_GBK');

$lang = array
(
	'SC_GBK' => '简体中文'.strtoupper($config['charset']).'版',

	'username' => '网站管理员帐号:',
	'password' => '网站管理员密码:',
	'repeat_password' => '重复密码:',
	'admin_email' => '管理员 Email:',
	
	'setting' => '基本设置',
	'site_name' => '站点名称:',
	'site_notice' => '站点简要描述:',
	'site_url' => '站点地址:',
	'keywords' => '专题名称:',
	'keywords_tab' => '自动创建专题',
	'keywords_comment' => '此处可填写要创建的专题名称，也可为空，等安装成功后在系统后台：专题管理栏目下添加；',

	'succeed' => '成功',
	'enabled' => '允许',
	'writeable' => '可写',
	'readable' => '可读',
	'unwriteable' => '不可写',
	'yes' => '可',
	'no' => '不可',
	'unlimited' => '不限',
	'support' => '支持',
	'unsupport' => '<span class="redfont">不支持</span>',
	'old_step' => '上一步',
	'new_step' => '下一步',
	'tips_message' => '提示信息',
	'return' => '返回',
	'error_message' => '错误信息',

	'env_os' => '操作系统',
	'env_php' => 'PHP 版本',
	'env_mysql' => 'MySQL 支持',
	'env_attach' => '附件上传',
	'env_diskspace' => '磁盘空间',
	'env_dir_writeable' => '目录写入',

	'init_log' => '初始化记录',
	'clear_dir' => '清空目录',
	'select_db' => '选择数据库',
	'create_table' => '建立数据表',

	'install_wizard' => '安装向导',
	'current_process' => '当前状态:',
	'show_license' => '蒲公英微博系统 用户许可协议',
	'agreement_yes' => '我同意',
	'agreement_no' => '我不同意',
	'check_config' => '检查配置文件状态',
	'check_catalog_file_name' => '目录文件名称',
	'check_need_status' => '所需状态',
	'check_currently_status' => '当前状态',
	'edit_config' => '浏览/编辑当前配置',
	'variable' => '设置选项',
	'value' => '当前值',
	'comment' => '注释',
	'dbhost' => '数据库服务器:',
	'dbhost_comment' => '国内空间上数据库服务器地址, 一般为localhost',
	'dbuser' => '数据库用户名:',
	'dbuser_comment' => '连接空间上数据库的用户名',
	'dbpw' => '数据库密码:',
	'dbpw_comment' => '连接空间上数据库的密码',
	'dbname' => '数据库名称:',
	'dbname_comment' => '空间上数据库的名称',
	'email' => '常用Email（重要）:',
	'email_comment' => '用于给用户发Email通知等，数据库错误报告也将发到此Email',
	'tablepre' => '表名前缀:',
	'tablepre_comment' => '默认无需修改，如同一数据库安装多个蒲公英时必须修改',
	'tablepre_prompt' => '除非您需要在同一数据库安装多个 蒲公英系统 \n,否则,强烈建议您不要修改表名前缀。',

	'recheck_config' => '重新检查设置',
	'check_env' => '检查当前服务器环境',
	'env_required' => 'pugoin微博系统 所需配置',
	'env_best' => 'pugoin微博系统 最佳配置',
	'env_current' => '当前服务器',
	'install_note' => '安装向导提示',
	'add_admin' => '设置管理员帐号',
	'start_install' => '开始安装 pugoin微博系统',
	'dbname_invalid' => '数据库名为空，请填写数据库名称',
	'admin_username_invalid' => '用户名空, 长度超过限制或包含非法字符。',
	'admin_password_invalid' => '两次输入密码不一致。',
	'admin_email_invalid' => 'Email 地址无效',
	'admin_invalid' => '您的信息没有填写完整。',

	'config_comment' => '请在下面填写您空间的Mysql数据库信息，所有信息必填。</li><li><font style="font-size:16px;color:red;">如果您不清楚数据库相关信息，请向您的空间提供商咨询。</font>',
	'config_unwriteable' => '安装向导无法写入配置文件, 请核对现有信息, 如需修改, 请通过 FTP 将改好的 ./setting/settings.php 上传。',

	'database_errno_2003' => '无法连接数据库，请检查数据库是否启动，数据库服务器地址是否正确',
	'database_errno_1044' => '无法创建新的数据库，请检查数据库名称填写是否正确',
	'database_errno_1045' => '无法连接数据库，请检查数据库用户名或者密码是否正确',

	'dbpriv_createtable' => '没有CREATE TABLE权限，无法安装pugoin微博系统',
	'dbpriv_insert' => '没有INSERT权限，无法安装pugoin微博系统',
	'dbpriv_select' => '没有SELECT权限，无法安装pugoin微博系统',
	'dbpriv_update' => '没有UPDATE权限，无法安装pugoin微博系统',
	'dbpriv_delete' => '没有DELETE权限，无法安装pugoin微博系统',
	'dbpriv_droptable' => '没有DROP TABLE权限，无法安装',
	
	'path_unsupport' => 'pugoin不支持在中文目录下安装',

	'php_version_406' => '您的 PHP 版本小于 4.0.6, 无法使用 pugoin微博系统。',
	'attach_enabled' => '允许/最大尺寸 ',
	'attach_enabled_info' => '您可以上传附件的最大尺寸: ',
	'attach_disabled' => '不允许上传附件',
	'attach_disabled_info' => '附件上传或相关操作被服务器禁止。',
	'mysql_version_323' => '您的 MySQL 版本低于 3.23，安装无法继续进行。',
	'mysql_unsupport' => '您的服务器不支持MySql数据库，无法安装pugoin微博系统程序',
	'cache_unwriteable' => '缓存目录(./cache)属性非 777 或无法写入，在线缓存功能将无法使用。',
	'images_unwriteable' => '图片目录(./imagess)属性非 777 或无法写入，系统将无法使用图片聚合功能。',
	'errorlog_unwriteable' => '错误日志目录(./errorlog)属性非 777 或无法写入，错误日志将无法记录。',
	'install_unwriteable' => '安装目录(./install)属性非 777 或无法写入，系统安装后将不能锁定，有可能多次安装，比较危险。',
	'setting_unwriteable' => '配置目录(./install)属性非 777 或无法写入，无法保存系统配置文件。',
	'tablepre_invalid' => '您指定的数据表前缀包含点字符(".")，请返回修改。',
	'db_invalid' => '指定的数据库不存在, 系统也无法自动建立, 无法安装 pugoin微博系统。',
	'db_auto_created' => '指定的数据库不存在, 但系统已成功建立, 可以继续安装。',
	'db_not_null' => '数据库中已经安装过 pugoin微博系统, 继续安装会清空原有数据。',
	'db_drop_table_confirm' => '继续安装会清空全部原有数据，您确定要继续吗?',
	'install_in_processed' => '正在安装...',
	'install_succeed' => '恭喜您安装成功，点击进入网站首页',



	'license' => '<p class="subtitle">蒲公英微博系统，以下简称蒲公英或pugoin。


	<p>蒲公英电子商务分享系统是基于记事狗微博的基础上进行调整的，前提是想打造一个微博+电子商务的模式，感谢记事狗开源了程序，当然，记事狗享受有著作权受法律和国际公约保护，使用者无论个人或组织、盈利与否、用途如何（包括以学习和研究为目的），均需仔细阅读本协议，在理解、同意、并遵守本协议的全部条款后，方可开始使用。 


	<p><li><b>协议许可的权利</b>
    
	<ul type="1">
		<li>您可以在完全遵守本最终用户授权协议的基础上，将本软件应用于非商业用途，而不必支付软件版权授权费用。 
		<li>您可以在协议规定的约束和限制范围内修改 蒲公英 源代码(如果被提供的话)或界面风格以适应您的网站要求。 
		<li>您拥有使用本软件构建的微博中全部会员资料、文章及相关信息的所有权，并独立承担与文章内容的相关法律义务。 
		<li>获得商业授权之后，您可以将本软件应用于商业用途，同时依据所购买的技术服务中确定的技术支持期限、技术支持方式和技术支持内容，通过指定的方式获得指定范围内的技术支持服务。 
	</ul>
	
	<p>蒲公英 不对使用本软件构建的网站中的文章或信息承担责任。',

	'preparation' => '<li>请给以下目录和文件可写和可修改权限：<br />&nbsp; &nbsp; <b>./cache</b> 目录;&nbsp; &nbsp; <b>./images</b> 目录;&nbsp; &nbsp; <b>./errorlog</b> 目录;&nbsp; &nbsp;  <b>./install</b> 目录; &nbsp;&nbsp;<B>./setting </B>目录及目录下所有文件
	 &nbsp;&nbsp;</li>',

);

$msglang = array(

	'lock_exists' => '您已经安装过蒲公英微博系统，如果您想重新安装，请删除 install/install.lock 文件，再次运行安装文件。',
	'short_open_tag_invalid' => '对不起，请将 php.ini 中的 short_open_tag 设置为 On，否则无法继续安装pugoin微博系统。',
	'database_nonexistence' => '您的 ./install/db_mysql.class.php 不存在, 无法继续安装, 请用 FTP 将该文件上传后再试。',
	'config_nonexistence' => '您的 ./setting/settings.php 不存在, 无法继续安装, 请用 FTP 将该文件上传后再试。',

);

?>