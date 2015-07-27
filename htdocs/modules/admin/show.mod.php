<?php
/*******************************************************************
 * [pugoin] (C)2010 - 2099 Dream3 Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename show.mod.php $
 *
 * @Author http://www.pugo.in $
 *
 * @Date 2011-09-16 17:25:41 789417682 24056693 3946 $
 *******************************************************************/



if(!defined('IN_PUGOIN'))
{
    exit('invalid request');
}

class ModuleObject extends MasterObject
{

	
	function ModuleObject($config)
	{
		$this->MasterObject($config);
		$this->Execute();
	}

	
	function Execute()
	{
		ob_start();
		switch($this->Code)
		{
			case 'modify':
				$this->Main();
				break;
			case 'domodify':
				$this->DoModify();
				break;
			default:
				$this->Main();
				break;
		}
		
		$body = ob_get_clean();
		
		$this->ShowBody($body);
		
	}
	
	
	function Main()
	{
		$this->Modify();
	}
	
	function Modify()
	{
		$show=ConfigHandler::get('show');
		$cache = ConfigHandler::get('cache');
		$time = ConfigHandler::get('time');
		
		
				$fp=opendir($this->Config['template_root_path']);
		while ($template=readdir($fp)) 
		{
			if($template=='..' || $template=='.' || $template=='.svn' || $template=='_svn')continue;
			if(is_dir($this->Config['template_root_path'].'/'.$template))
			{
				$tpl_name=$template;
				$tplinfo_file = $this->Config['template_root_path'].'/'.$template.'/tplinfo.php';
				if(is_file($tplinfo_file))
				{
					@include($tplinfo_file);
				}
				$template_list[$template]=array("name"=>($tpl_name ? $tpl_name : $template),"value"=>$template);
				$template_name_list[$template]=$tpl_name;
			}
		}
		array_multisort($template_name_list,SORT_DESC,$template_list);
		Load::lib('form');
		$template_select=FormHandler::Select('template_path',$template_list,$this->Config['template_path']);
		
		include($this->TemplateHandler->Template('admin/show'));
	}
	
	function DoModify()
	{
		ConfigHandler::set('show',$this->Post['show']);
		ConfigHandler::set('cache',$this->Post['cache']);
		ConfigHandler::set('time',$this->Post['time']);
		
		clearcache();
		
				if($this->Post['template_path']!="" && 
		$this->Post['template_path']!=$this->Config['template_path'])
		{
			include(ROOT_PATH . 'setting/settings.php');
			$config['template_path']=$this->Post['template_path'];
			ConfigHandler::set($config);
		}
		$this->Messager("设置成功");
	}
	
	function cache_time($min=0,$max=0)
	{
		$list = array(
			10 => array('name'=>'10秒','value'=>'10',),
			30 => array('name'=>'30秒','value'=>'30',),
			60 => array('name'=>'1分钟','value'=>'60',),
			180 => array('name'=>'3分钟','value'=>'180',),
			300 => array('name'=>'5分钟','value'=>'300',),
			600 => array('name'=>'10分钟','value'=>'600',),
			1800 => array('name'=>'半小时','value'=>'1800',),
			3600 => array('name'=>'1小时','value'=>'3600',),
			7200 => array('name'=>'2小时','value'=>'7200',),
			14400 => array('name'=>'4小时','value'=>'14400',),
			28800 => array('name'=>'8小时','value'=>'28800',),
			43200 => array('name'=>'12小时','value'=>'43200',),
			86400 => array('name'=>'1天','value'=>'86400',),
			172800 => array('name'=>'2天','value'=>'172800',),
			345600 => array('name'=>'4天','value'=>'345600',),
			604800 => array('name'=>'1星期','value'=>'604800',),
			1209600 => array('name'=>'2星期','value'=>'1209600',),
			1814400 => array("name"=>"3星期",'value'=>1814400),
			2592000 => array('name'=>'1个月','value'=>'2592000',),
			5184000 => array('name'=>'2个月','value'=>'5184000',),
			7776000 => array("name"=>"3个月",'value'=>7776000),
			15552000 => array('name'=>'6个月','value'=>'15552000',),
			31104000 => array('name'=>'1年','value'=>'31104000',),
			62208000 => array('name'=>'2年','value'=>'62208000',),
		);
		if(0==$min && 0==$max) return $list;
		
		$_min = min((int) $min,(int) $max);
		$_max = max((int) $min,(int) $max);
		$cache_time = array();
		foreach ($list as $k=>$v) {
			if($k >= $_min && $k <= $_max) {
				$cache_time[$k] = $v;
			}
		}

		return $cache_time;	
	}
}
?>
