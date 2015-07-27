<?php
/*******************************************************************
 * [pugoin] (C)2010 - 2099 Dream3 Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename city.mod.php $
 *
 * @Author http://www.pugo.in $
 *
 * @Date 2011-09-16 17:25:38 1138972631 1838877947 9793 $
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
			case 'addarea':
				$this->addArea();
				break;
			case 'areaorder':
				$this->areaOrder();
				break;
			case 'delarea':
				$this->delArea();
				break;

			case 'city':
				$this->city();
				break;
			case 'addcity':
				$this->addCity();
				break;
			case 'cityorder':
				$this->cityOrder();
				break;
			case 'delcity':
				$this->delCity();
				break;
			case 'college':
				$this->college();
				break;
			case 'addcollege':
				$this->addCollege();
				break;
			case 'collegeorder':
				$this->CollegeOrder();
				break;
			case 'delcollege':
				$this->delCollege();
				break;

			case 'zone':
				$this->zone();
				break;
			case 'addzone':
				$this->addZone();
				break;
			case 'zoneorder':
				$this->zoneOrder();
				break;
			case 'delzone':
				$this->delZone();
				break;

			case 'street':
				$this->street();
				break;
			case 'addstreet':
				$this->addStreet();
				break;
			case 'streetorder':
				$this->streetOrder();
				break;
			case 'delstreet':
				$this->delStreet();
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
			$province = $this->DatabaseHandler->ResultFirst("select name from `".TABLE_PREFIX."common_district` where id = $id");
		}
		$query = $this->DatabaseHandler->Query("select * from `".TABLE_PREFIX."common_district` where upid = 0 order by list");
		while ($rsdb = $query->GetRow()){
			$rs[$rsdb['id']] = $rsdb;
		}
		include template('admin/area');
	}
	
		function addArea(){
		$area = $this->Post['area'];
		$id = $this->Post['id'];
		if($id){
			$this->DatabaseHandler->Query(" update `".TABLE_PREFIX."common_district` set `name` = '$area' where id = $id");
			$this->Messager("省份修改成功","admin.php?mod=city");
		}else{
			$area_arr = explode("\r\n",$area);
			foreach ($area_arr as $key => $value) {
				if(!$value){
					continue;
				}
				$this->DatabaseHandler->Query(" insert into `".TABLE_PREFIX."common_district` (`name`,`level`) values ('$value',1)");
			}
			$this->Messager("省份创建成功","admin.php?mod=city");
		}
	}
	
		function areaOrder(){
		$order = $this->Post['order'];
		
		foreach ($order as $key=>$value) {
			$this->DatabaseHandler->Query("update `".TABLE_PREFIX."common_district` set `list` = $value where id = $key");
		}
		$this->Messager("排序修改成功","admin.php?mod=city");
	}
	
	function delArea(){
		$fid = $this->Get['fid'];
		$count = $this->DatabaseHandler->ResultFirst("select count(*) from ".TABLE_PREFIX."common_district where upid = $fid");
		if($count){
			$this->Messager("该省市下有城市存在、请删除城市后再执行删除操作",-1);
		}
		$this->DatabaseHandler->Query("delete from `".TABLE_PREFIX."common_district` where id = $fid");
		$this->Messager("省份删除成功","admin.php?mod=city");
	}
	
	function city(){
		$area = $this->Get['area'];
		$id = $this->Get['id'];
		if($id){
			$name = $this->DatabaseHandler->ResultFirst("select name from `".TABLE_PREFIX."common_district` where id = $id");
		}
		$area_option = $this->makeAreaSel($area);		
		include template('admin/city');
	}
		function addCity(){
		$city = $this->Post['city'];
		$id = $this->Post['id'];
		$fup = $this->Post['area'];
		
		if($id){
			$this->DatabaseHandler->Query(" update `".TABLE_PREFIX."common_district` set `name` = '$city',`upid` = $fup where id = $id");
			$this->Messager("城市修改成功","admin.php?mod=city&code=city&area=$fup");
		}else{
		$city_arr = explode("\r\n",$city);
			if($fup == 0){
				$this->Messager("请选择省份",-1);
			}
			foreach ($city_arr as $key => $value) {
				if(!$value){
					continue;
				}
				$this->DatabaseHandler->Query(" insert into `".TABLE_PREFIX."common_district` (`upid`,`name`,`level`) values ($fup,'$value',2)");
			}
			$this->Messager("城市创建成功","admin.php?mod=city&code=city&area=$fup");
		}
	}
	
		function cityOrder(){
		$order = $this->Post['order'];
		$area = $this->Get['area'];
		foreach ($order as $key=>$value) {
			$this->DatabaseHandler->Query("update `".TABLE_PREFIX."common_district` set `list` = $value where id = $key");
		}
		$this->Messager("排序修改成功","admin.php?mod=city&code=city&area=$area");
	}
		function delCity(){
		$fid = $this->Get['fid'];
		$area = $this->Get['area'];
		$count = $this->DatabaseHandler->ResultFirst("select count(*) from ".TABLE_PREFIX."common_district where upid = $fid");
		if($count){
			$this->Messager("该城市下有区域存在、请删除区域后再执行删除操作",-1);
		} else {
			$this->DatabaseHandler->Query("delete from `".TABLE_PREFIX."common_district` where id = $fid");
			$this->Messager("城市删除成功","admin.php?mod=city&code=city&area=$area");
		}
	}
	
	function college(){
		$province = $this->Get['province'];
		$college = $this->Get['college'];
		if($college){
			$name = $this->DatabaseHandler->ResultFirst("select name from `".TABLE_PREFIX."common_college` where id = $college");
		}
		$area_option = $this->makeAreaSel($province);		
		include template('admin/college');
	}
	function addCollege(){
		$province = $this->Post['province'];
		$college_name = $this->Post['college'];
		$college_id = $this->Post['id'];
		if($college_id){
			$this->DatabaseHandler->Query(" update `".TABLE_PREFIX."common_college` set `name` = '$college_name',`upid` = $province where id = $college_id");
			$this->Messager("学校修改成功","admin.php?mod=city&code=college&province=$province");
		}else{
			$college_arr = explode("\r\n",$college_name);
			if($province == 0){
				$this->Messager("请选择省份",-1);
			}
			foreach ($college_arr as $key => $value) {
				if(!$value){
					continue;
				}
				$this->DatabaseHandler->Query(" insert into `".TABLE_PREFIX."common_college` (`upid`,`name`) values ($province,'$value')");
			}
			$this->Messager("学校创建成功","admin.php?mod=city&code=college&province=$province");
		}
	}

	function collegeOrder(){
		$order = $this->Post['order'];
		$province = $this->Get['area'];
		foreach ($order as $key=>$value) {
			$this->DatabaseHandler->Query("update `".TABLE_PREFIX."common_college` set `list` = $value where id = $key");
		}
		$this->Messager("排序修改成功","admin.php?mod=city&code=college&province=$province");
	}
	
	function delCollege(){
		$college = $this->Get['college'];
		$province = $this->Get['province'];
		
		$this->DatabaseHandler->Query("delete from `".TABLE_PREFIX."common_college` where id = $college");
		$this->Messager("学校删除成功","admin.php?mod=city&code=college&province=$province");
		
	}

	function zone(){
		$area = $this->Get['area'];
		$city = $this->Get['city'];
		$id = $this->Get['id'];
		if($id){
			$name = $this->DatabaseHandler->ResultFirst("select name from `".TABLE_PREFIX."common_district` where id = $id");
		}
		$area_option = $this->makeAreaSel($area);	
		include template('admin/zone');
	}
	
		function addZone(){
		$zone = $this->Post['zone'];
		$zone_arr = explode("\r\n",$zone);
				$area = $this->Post['area'];
				$fup = $this->Post['city'];
		
		$id = $this->Post['id'];
		if($id){
			$this->DatabaseHandler->Query(" update `".TABLE_PREFIX."common_district` set `name` = '$zone',`upid` = $fup where id = $id");
			$this->Messager("区域修改成功","admin.php?mod=city&code=zone&area=$area&city=$fup");
		}else{
			if($fup == 0){
				$this->Messager("请选择城市",-1);
			}
			foreach ($zone_arr as $key => $value) {
				if(!$value){
					continue;
				}
				$this->DatabaseHandler->Query(" insert into `".TABLE_PREFIX."common_district` (`upid`,`name`,`level`) values ($fup,'$value',3)");
			}
			$this->Messager("区域创建成功","admin.php?mod=city&code=zone&area=$area&city=$fup");
		}
	}
	
		function zoneOrder(){
		$area = $this->Get['area'];
		$city = $this->Get['city'];
		$order = $this->Post['order'];
		foreach ($order as $key=>$value) {
			$this->DatabaseHandler->Query("update `".TABLE_PREFIX."common_district` set `list` = $value where id = $key");
		}
		$this->Messager("排序修改成功","admin.php?mod=city&code=zone&area=$area&city=$city");
	}
		function delZone(){
		$area = $this->Get['area'];
		$city = $this->Get['city'];
		$fid = $this->Get['fid'];
		$count = $this->DatabaseHandler->ResultFirst("select count(*) from ".TABLE_PREFIX."common_district where upid = $fid");
		if($count){
			$this->Messager("该区域下有街道存在、请先删除街道后再执行该删除操作",-1);
		} 
		$this->DatabaseHandler->Query("delete from `".TABLE_PREFIX."common_district` where id = $fid");
		$this->Messager("区域删除成功","admin.php?mod=city&code=zone&area=$area&city=$city");
	}
	
	function street(){
		$area = $this->Get['area'];
		$city = $this->Get['city'];
		$zone = $this->Get['zone'];
		$id = $this->Get['id'];
		if($id){
			$name = $this->DatabaseHandler->ResultFirst("select name from `".TABLE_PREFIX."common_district` where id = $id");
		}
		$area_option = $this->makeAreaSel($area);
		include template('admin/street');
	}
		function addStreet(){
		$area = $this->Post['area'];
		$city = $this->Post['city'];
		$street = $this->Post['street'];
		$street_arr = explode("\r\n",$street);
		$fup = $this->Post['zone'];
		
		$id = $this->Post['id'];
		if($id){
			$this->DatabaseHandler->Query(" update `".TABLE_PREFIX."common_district` set `name` = '$street',`upid` = $fup where id = $id");
			$this->Messager("街道修改成功","admin.php?mod=city&code=street&area=$area&city=$city&zone=$fup");
		}else{
			if($fup == 0){
				$this->Messager("请选择区域",-1);
			}
			foreach ($street_arr as $key => $value) {
				if(!$value){
					continue;
				}
				$this->DatabaseHandler->Query(" insert into `".TABLE_PREFIX."common_district` (`upid`,`name`,`level`) values ($fup,'$value',4)");
			}
			$this->Messager("街道创建成功","admin.php?mod=city&code=street&area=$area&city=$city&zone=$fup");
		}
	}
	
		function streetOrder(){
		$area = $this->Get['area'];
		$city = $this->Get['city'];
		$zone = $this->Get['zone'];
		$order = $this->Post['order'];
		foreach ($order as $key=>$value) {
			$this->DatabaseHandler->Query("update `".TABLE_PREFIX."common_district` set `list` = $value where id = $key");
		}
		$this->Messager("排序修改成功","admin.php?mod=city&code=street&area=$area&city=$city&zone=$zone");
	}
		function delStreet(){
		$area = $this->Get['area'];
		$city = $this->Get['city'];
		$zone = $this->Get['zone'];
		
		$fid = $this->Get['fid'];
		$this->DatabaseHandler->Query("delete from `".TABLE_PREFIX."common_district` where id = $fid");
		$this->Messager("街道删除成功","admin.php?mod=city&code=street&area=$area&city=$city&zone=$zone");
	}
	
		function makeAreaSel($area){
		$query = $this->DatabaseHandler->Query(" select * from `".TABLE_PREFIX."common_district` where upid = 0 order by list ");
		while ($rs = $query->GetRow()){
			if($area == $rs['id']){
			    $area_option .= "\t<option value='{$rs['id']}' selected>{$rs['name']}</option>\t\n";
			}else{
				$area_option .= "\t<option value='{$rs['id']}'>{$rs['name']}</option>\t\n";
			}
		}
		return $area_option;
	}
}
