<?php
/*******************************************************************
 * [pugoin] (C)2010 - 2099 Dream3 Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename class.mod.php $
 *
 * @Author http://www.pugo.in $
 *
 * @Date 2011-10-26 17:25:42  $
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

		$this->initMemberHandler();
		
		Load::logic('topic');
		$this->TopicLogic = new TopicLogic($this);

		$this->Execute();
	}

	
	function Execute()
	{
        ob_start();
        switch($this->Code){
        	case 'resultlist':
				$this->resultList();
				break;
        	case 'sel':
        		$this->makeSel();
        		break;
        	default:
        		break;
		}
        response_text(ob_get_clean());
	}	
	
	function makeSel(){
		
		$class_id = $this->Get['class_id'];
		if($this->Get['admin']){
			$show = "<option value=''>请选择</option>\t\n";
		}
		if($class_id && $class_id != 0){
			$subclass = $this->Get['subclass'];
			$query = $this->DatabaseHandler->Query("select * from `".TABLE_PREFIX."common_class` where upid = $class_id order by list ");
			while ($rs = $query->GetRow()){
				if($subclass && $subclass == $rs['id']){
					$show .= "<option value={$rs['id']} selected>{$rs['name']}</option>\t\n";
				}else{
					$show .= "<option value={$rs['id']} >{$rs['name']}</option>\t\n";
				}
			}
		}
		
		$subclass_id = $this->Get['subclass_id'];
		if($subclass_id && $subclass_id != 0){
			$class = $this->Get['class'];
			$query = $this->DatabaseHandler->Query("select * from `".TABLE_PREFIX."common_class` where upid=$subclass_id order by list ");
			while ($rs = $query->GetRow()){
				if($class && $class == $rs['id']){
					$show .= "<option value={$rs['id']} selected>{$rs['name']}</option>";
				}else{
					$show .= "<option value={$rs['id']} >{$rs['name']}</option>";
				}
			}
		}
		
		
		echo $show;
		exit();
	}
	
	
	function resultList(){
		$class_id = $this->Get['class_id'];
		$subclass_id = $this->Get['subclass_id'];
		
		$act = $this->Get['act'];
		
		if($class_id && $class_id != 0){
			$class = $class_id;
			$where = " where upid = $class_id ";
			$code = "subclassorder";
			$query = $this->DatabaseHandler->Query("select * from `".TABLE_PREFIX."common_class` $where order by list");
		} else if ($subclass_id && $subclass_id != 0){
			$class = $this->Get['class'];
			$subclass = $subclass_id;
			$where = " where upid = $subclass_id ";
			$query = $this->DatabaseHandler->Query("select * from `".TABLE_PREFIX."common_class_tag` $where order by id");
		}
		
		$rs = array();
		if($query){
			while ($rsdb = $query->GetRow()){
				$rs[$rsdb['id']] = $rsdb;
			}
		}
		include template('admin/class_resultList');
		exit;
	}
}