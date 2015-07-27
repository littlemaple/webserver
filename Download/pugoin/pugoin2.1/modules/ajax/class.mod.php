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
 * @Date 2011-09-16 17:25:42 665068839 1524097756 3555 $
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
		
		$province_id = $this->Get['province_id'];
		if($this->Get['admin']){
			$show = "<option value=''>请选择</option>\t\n";
		}
		if($province_id && $province_id != 0){
			$city = $this->Get['city'];
			$query = $this->DatabaseHandler->Query("select * from `".TABLE_PREFIX."common_district` where upid = $province_id order by list ");
			while ($rs = $query->GetRow()){
				if($city && $city == $rs['id']){
					$show .= "<option value={$rs['id']} selected>{$rs['name']}</option>\t\n";
				}else{
					$show .= "<option value={$rs['id']} >{$rs['name']}</option>\t\n";
				}
			}
		}
		
		$city_id = $this->Get['city_id'];
		if($city_id && $city_id != 0){
			$area = $this->Get['area'];
			$query = $this->DatabaseHandler->Query("select * from `".TABLE_PREFIX."common_district` where upid=$city_id order by list ");
			while ($rs = $query->GetRow()){
				if($area && $area == $rs['id']){
					$show .= "<option value={$rs['id']} selected>{$rs['name']}</option>";
				}else{
					$show .= "<option value={$rs['id']} >{$rs['name']}</option>";
				}
			}
		}
		
		$area_id = $this->Get['area_id'];
		if($area_id && $area_id != 0){
			$street = $this->Get['street'];
			$query = $this->DatabaseHandler->Query("select * from `".TABLE_PREFIX."common_district` where upid = $area_id order by list ");
			while ($rs = $query->GetRow()){
				if($street && $street == $rs['id']){
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
		$area_id = $this->Get['area_id'];
		$city_id = $this->Get['city_id'];
		$zone_id = $this->Get['zone_id'];
		$province_id = $this->Get['province'];
		$act = $this->Get['act'];
		
		if($area_id && $area_id != 0){
			$area = $area_id;
			$where = " where upid = $area_id ";
			$code = "cityorder";
			$query = $this->DatabaseHandler->Query("select * from `".TABLE_PREFIX."common_district` $where order by list");
		} else if ($city_id && $city_id != 0){
			$area = $this->Get['area'];
			$city = $city_id;
			$where = " where upid = $city_id ";
			$code = "zoneorder";
			$query = $this->DatabaseHandler->Query("select * from `".TABLE_PREFIX."common_district` $where order by list");
		} else if ($zone_id && $zone_id != 0){
			$area = $this->Get['area'];
			$city = $this->Get['city'];
			$zone = $zone_id;
			$where = " where upid = $zone_id ";
			$code = "streetorder";
			$query = $this->DatabaseHandler->Query("select * from `".TABLE_PREFIX."common_district` $where order by list");
		} else if ($act=="college" && $province_id && $province_id != 0){
			$province = $this->Get['province'];
			$area = $province;
			$where = " where upid = $province_id ";
			$code = "collegeorder";
			$query = $this->DatabaseHandler->Query("select * from `".TABLE_PREFIX."common_college` $where order by list");
		}
		
		$rs = array();
		if($query){
			while ($rsdb = $query->GetRow()){
				$rs[$rsdb['id']] = $rsdb;
			}
		}
		include template('admin/resultList');
		exit;
	}
}