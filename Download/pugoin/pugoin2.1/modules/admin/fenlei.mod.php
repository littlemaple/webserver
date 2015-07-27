<?php
/*******************************************************************
 * [pugoin] (C)2010 - 2099 Dream3 Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename fenlei.mod.php $
 *
 * @Author http://www.pugo.in $
 *
 * @Date 2011-10-22 17:23:38 1138972631 1838877947 9793 $
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
		
		switch ($this->Get['code'])
		{
			case 'addclass':
				$this->addClass();
				break;
			case 'classorder':
				$this->classOrder();
				break;
			case 'delclass':
				$this->delClass();
				break;

			case 'subclass':
				$this->subClass();
				break;
			case 'addsubclass':
				$this->addSubClass();
				break;
			case 'subclassorder':
				$this->subClassOrder();
				break;
			case 'delsubclass':
				$this->delSubClass();
				break;
				
			case 'tag':
				$this->tag();
				break;
			case 'addtag':
				$this->addTag();
				break;
			case 'deltag':
				$this->delTag();
				break;
			
				
			default:
				$this->main();
				break;		
		}
		
		$body = ob_get_clean();
		
		$this->ShowBody($body);
		
	}
	
	function main(){
		$id = $this->Get['id'];
		if($id){
			$class = $this->DatabaseHandler->ResultFirst("select name from `".TABLE_PREFIX."common_class` where id = $id");
		}
		$query = $this->DatabaseHandler->Query("select * from `".TABLE_PREFIX."common_class` where upid = 0 order by list");
		while ($rsdb = $query->GetRow()){
			$rs[$rsdb['id']] = $rsdb;
		}
		include template('admin/fenlei');
	}
	
	function addClass(){
		$class = $this->Post['class'];
		$id = $this->Post['id'];
		if($id){
			$this->DatabaseHandler->Query(" update `".TABLE_PREFIX."common_class` set `name` = '$class' where id = $id");
			$this->Messager("大类修改成功","admin.php?mod=fenlei");
		}else{
			$class_arr = explode("\r\n",$class);
			foreach ($class_arr as $key => $value) {
				if(!$value){
					continue;
				}
				$this->DatabaseHandler->Query(" insert into `".TABLE_PREFIX."common_class` (`name`) values ('$value')");
			}
			$this->Messager("大类创建成功","admin.php?mod=fenlei");
		}
	}
	
	function classOrder(){
		$order = $this->Post['order'];
		
		foreach ($order as $key=>$value) {
			$this->DatabaseHandler->Query("update `".TABLE_PREFIX."common_class` set `list` = $value where id = $key");
		}
		$this->Messager("排序修改成功","admin.php?mod=fenlei");
	}
	
	function delClass(){
		$fid = $this->Get['fid'];
		$count = $this->DatabaseHandler->ResultFirst("select count(*) from ".TABLE_PREFIX."common_class where upid = $fid");
		if($count){
			$this->Messager("该大类下有子类存在、请删除子类后再执行删除操作",-1);
		}
		$this->DatabaseHandler->Query("delete from `".TABLE_PREFIX."common_class` where id = $fid");
		$this->Messager("大类删除成功","admin.php?mod=fenlei");
	}
	
	function subClass(){
		$class = $this->Get['class'];
		$id = $this->Get['id'];
		if($id){
			$name = $this->DatabaseHandler->ResultFirst("select name from `".TABLE_PREFIX."common_class` where id = $id");
		}
		$class_option = $this->makeClassSel($class);		
		include template('admin/fenlei_sub');
	}
	
	function addSubClass(){
		$subclass = $this->Post['subclass'];
		$id = $this->Post['id'];
		$fup = $this->Post['class'];
		
		if($id){
			$this->DatabaseHandler->Query(" update `".TABLE_PREFIX."common_class` set `name` = '$subclass',`upid` = $fup where id = $id");
			$this->Messager("子类修改成功","admin.php?mod=fenlei&code=subclass&class=$fup");
		}else{
			$subclass_arr = explode("\r\n",$subclass);
			if($fup == 0){
				$this->Messager("请选择大类",-1);
			}
			foreach ($subclass_arr as $key => $value) {
				if(!$value){
					continue;
				}
				$this->DatabaseHandler->Query(" insert into `".TABLE_PREFIX."common_class` (`upid`,`name`) values ($fup,'$value')");
			}
			$this->Messager("子类创建成功","admin.php?mod=fenlei&code=subclass&class=$fup");
		}
	}
	
	function subClassOrder(){
		$order = $this->Post['order'];
		$class = $this->Get['class'];
		foreach ($order as $key=>$value) {
			$this->DatabaseHandler->Query("update `".TABLE_PREFIX."common_class` set `list` = $value where id = $key");
		}
		$this->Messager("排序修改成功","admin.php?mod=fenlei&code=subclass&class=$class");
	}
	
	function delSubClass(){
		$fid = $this->Get['fid'];
		$class = $this->Get['class'];
		
		$this->DatabaseHandler->Query("delete from `".TABLE_PREFIX."common_class` where id = $fid");
		$this->DatabaseHandler->Query("delete from `".TABLE_PREFIX."common_class_tag` where upid = $fid");
		$this->Messager("子类删除成功","admin.php?mod=fenlei&code=subclass&class=$class");
		
	}
	
	
	function tag(){
		$class = $this->Get['class'];
		$subclass = $this->Get['subclass'];
		$id = $this->Get['id'];
		if($id){
			$name = $this->DatabaseHandler->ResultFirst("select name from `".TABLE_PREFIX."common_class_tag` where id = $id");
		}
		$class_option = $this->makeClassSel($class);	
		include template('admin/fenlei_tag');
	}
	
	function addTag(){
		$tag = $this->Post['tag'];
		$tag_arr = explode("\r\n",$tag);
		$class = $this->Post['class'];
		$fup = $this->Post['subclass'];
		
		$id = $this->Post['id'];
		if($id){
			$this->DatabaseHandler->Query(" update `".TABLE_PREFIX."common_class_tag` set `name` = '$tag',`upid` = $fup where id = $id");
			$this->Messager("标签修改成功","admin.php?mod=fenlei&code=tag&class=$class&subclass=$fup");
		}else{
			if($fup == 0){
				$this->Messager("请选择子类",-1);
			}
			foreach ($tag_arr as $key => $value) {
				if(!$value){
					continue;
				}
				$this->DatabaseHandler->Query(" insert into `".TABLE_PREFIX."common_class_tag` (`upid`,`name`) values ($fup,'$value')");
			}
			$this->Messager("标签创建成功","admin.php?mod=fenlei&code=tag&class=$class&subclass=$fup");
		}
	}
	
		
	function delTag(){
		$class = $this->Get['class'];
		$subclass = $this->Get['subclass'];
		$fid = $this->Get['fid'];
		
		$this->DatabaseHandler->Query("delete from `".TABLE_PREFIX."common_class_tag` where id = $fid");
		$this->Messager("标签删除成功","admin.php?mod=fenlei&code=tag&class=$class&subclass=$subclass");
	}
	
	
	
	function makeClassSel($class){
		$query = $this->DatabaseHandler->Query(" select * from `".TABLE_PREFIX."common_class` where upid = 0 order by list ");
		while ($rs = $query->GetRow()){
			if($class == $rs['id']){
			    $class_option .= "\t<option value='{$rs['id']}' selected>{$rs['name']}</option>\t\n";
			}else{
				$class_option .= "\t<option value='{$rs['id']}'>{$rs['name']}</option>\t\n";
			}
		}
		return $class_option;
	}
}
