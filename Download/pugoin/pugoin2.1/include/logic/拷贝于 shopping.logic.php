<?php
/*********************************************************
 *文件名： shopping.logic.php
 *作  者： pugo.in
 *创建时间： 2011年10月16日
 *修改时间：
 *功能描述：微博商品逻辑操作
 *使用方法：

 ******************************************************/
if(!defined('IN_PUGOIN'))
{
    exit('invalid request');
}

/**
 * 
 * 微博图片的数据库逻辑操作类
 * 
 * @author pugo.in
 *
 */
class ShoppingLogic
{
	
	var $DatabaseHandler;
    
    var $Config;
	
	var $table;
	
	function ShoppingLogic($base = null)
    {
		error_log("shoppinglogic init:".$shoppingid."<br>",3,'d:\www\sql_error.html');
        if ($base)
        {
            $this->DatabaseHandler = &$base->DatabaseHandler;
            
            $this->MemberHandler = &$base->MemberHandler;

            $this->Config = &$base->Config;
        }
        else
        {
            $this->DatabaseHandler = &Obj::registry("DatabaseHandler");
            
            $this->MemberHandler = &Obj::registry("MemberHandler");

            $this->Config = &Obj::registry("config");
        }
        $this->table = 'topic_shopping';	
    }
	
    
	
	function delete_by_tid($tid)
	{
					
		$ret =  DB::query("delete from ".DB::table($this->table)." where `tid`='$tid'");
			
			
		return $ret;
	}
		
	
	function get_by_tid($tid)
	{
		$tid = max(0, (int) $tid);
		if($tid < 1) return array();

		$sql = "select `id`,`shopping_hosts`,`shopping_link`,`shopping_img`,`shopping_img_url`,`shopping_url`,`shopping_price` from `" .
                TABLE_PREFIX . "topic_shopping` where `tid`='$tid' ";
        $query = DB::query($sql);
        $topic_shopping = $query->GetRow();
 
		return $topic_shopping;
	}

	//保存到shopping中，并返回shoppingid，不对topic里的进行更新
	//如果url为空，而tid不为空，则返回0
	function get_shoppingid($url,$tid=0,$uid=0)
	{
		error_log("shoppinglogic:".$uid.$url."<br>",3,'d:\www\sql_error.html');
		$shoppingid = 0;
        
		$result = array();
		
		$topic_shopping = $this->get_by_tid($tid);
			
		//如果url不同则需要解析，相同则退出
		if(empty($url)){
		
			if($tid == 0){
			
				return 0;
				
			}else{
				//删除tid对应的那条记录
				$this->delete_by_tid($tid)
			}
			
		}else{
		
			$member = $this->GetMember($data['uid']);
			
			//新增
			if($tid == 0){
			
				$result = $this->get_parse_result($url);
				$timestamp 		= time();
				
				$sql = "insert into `".TABLE_PREFIX."topic_shopping`
				(`uid`,`tid`,`username`,`shopping_hosts`,`shopping_link`,`shopping_url`,`shopping_img`,`shopping_img_url`,`shopping_price`,`dateline`) 
				values 
				('".$uid."','".''."','".$member['username']."','".$result['shopping_hosts']."','".$result['shopping_link']."','".$result['shopping_url']."','".$result['shopping_img']."','".$result['shopping_img_url']."','".$result['shopping_price']."','".$timestamp."')";
				$this->DatabaseHandler->Query($sql);
				
				$shoppingid = $this->DatabaseHandler->Insert_ID();
			}else{
				//更新tid对应的那条记录
				
			}
		}
			
		 
         return $shoppingid;
	}
	
	//parse shopping
	function _parse_shopping($url)
    {        
        $return = array();

        $vhconfs = array(
			//http://item.taobao.com/item.htm?id=13567908305&cm_cat=&pm1=3&from=shuma
			//价格 <strong id="J_StrPrice" >5699.00 - 7599.00</strong>
			"taobao.com" => array('c'=>'gbk','tp'=>"/\<title\>(.+?)\s*[\-\_].*?\<\/title\>/"),
			"paipai.com" => array('c'=>'gbk','tp'=>"/\<title\>(.+?)\s*[\-\_].*?\<\/title\>/"),
			"lashou.com" => array('c'=>'utf-8','tp'=>"/\<title\>(.+?)\s*[\-\_].*?\<\/title\>/"),
    	);
      
        $urls = parse_url($url);
		
      	
		if(false != ($host = trim(strtolower($urls['host']))))
        {
            foreach($vhconfs as $k=>$v)
            {
                if(false!==strpos($host,$k))
                {
                    $vvv = "_parse_shopping_" . str_replace(array('-','.'),"_",$k);
					
                        
					if(method_exists($this,$vvv))
					{
						$return = $this->$vvv($url,$v);
						
						if($return && !isset($return['host']))
						{
							$return['host'] = $k;
						}
					}
                    break;
                }
            }
			
        }
        return $return;
    }
	
	function get_parse_result($url)
	{
		$shoppingid = 0;
        
		$return = array();
		
        $return = $this->_parse_shopping($url);		
		
		if ($return) 
        {
			$return['shopping_img'] = '';
			$return['shopping_img_url'] = '';
		}else{		
			$return['shopping_link'] = '';
			$return['shopping_hosts'] = '';
			$return['shopping_url'] = $url;
			$return['shopping_price'] = '';
			$return['shopping_img'] = '';
			$return['shopping_img_url'] = '';
		}
		
	}
	
	function _parse_shopping_taobao_com($url, $v)
    {
    	$return = array();
    	
    	//if(preg_match('~\/v\_playlist\/.+?\.htm~',$url) && ($html = dfopen($url)))
		if(preg_match('~http\:\/\/item\.taobao\.com\/item\.htm\?id=([\w\d]+)~i', $url, $m) && $m[1] && ($html = dfopen($url)))
        {
        	if($v['gzip'])
        	{
        		$html = gzdecode($html);
        	}
        	$html = array_iconv($v['c'], $this->Config['charset'], $html);
        	
        	$id = $m[1];
			
			//http://item.taobao.com/item.htm?id=10405859576
			//http://item.taobao.com/item.htm?id=13567908305&cm_cat=&pm1=3&from=shuma
			
			//从url中获取商品的id
			/*
			if(preg_match('~http\:\/\/item\.taobao\.com\/item\.htm\?id=([\w\d]+)~i', $url, $m) && $m[1])
        	{
        		$id = $m[1];
        	}
			*/
			
			//开始获取价格
			if(preg_match('~\<strong\s*id=[\"\']J\_StrPrice[\"\']\s*\>(.+?\s*.*?)\<\/strong\>~i', $html, $m) && $m[1])
			{
				$price = $m[1];
			}
				
        	if($id)
        	{	
				
        		$return['id'] = $id;
        		$return['url'] = $url;
				$return['price'] = $price;
        		$return['title'] = '';
        		
        	}
        }
    	
    	return $return;
    }
	
	function _parse_shopping_paipai_com($url, $v)
    {
    	$return = array();
    	
		//暂时不判断URL类型，只判断是否存在  defaultVal= 字样，并截取数字
		//if(preg_match('~http\:\/\/item\.paipai\.com\/search\.htm\?id=([\w\d]+)~i', $url, $m) && $m[1] && ($html = dfopen($url)))
		if($html = dfopen($url))
        {
        	if($v['gzip'])
        	{
        		$html = gzdecode($html);
        	}
        	$html = array_iconv($v['c'], $this->Config['charset'], $html);
        	
        	$id = "";
			
			//http://auction1.paipai.com/17AE572500000000001739E906A56F5A?qz_express=EVYvtv!rJonzSUxpRXkuLTVE6xiCbnxl2b7pkuh9ppsF9K8SVd6ONLFNKl_S3unTt2KwF0JFPTI&PTAG=31056.232201.1
			// '价　　格：</span><span class="p c3" ftag="price"><b>&yen;</b><em id="commodityCurrentPrice" promotType="" sale="" defaultVal="30.00">30.00</em></span></li>';
			
			//开始获取价格
			//if(preg_match('~defaultVal\s*=\s*[\"\'](.+?\s*.*?)[\"\']\>~i', $html, $m))
			if(preg_match('~defaultVal\s*=\s*[\"\'](.+?\s*.*?)[\"\']\>~i', $html, $m) && $m[1])
			{
				$price = $m[1];
			}

        	if($price)
        	{	
				
        		$return['id'] = $id;
        		$return['url'] = $url;
				$return['price'] = $price;
        		$return['title'] = '';
        		
        	}
        }
    	
    	return $return;
    }
	
	function _parse_shopping_lashou_com($url, $v)
    {
    	$return = array();
    	
		//暂时不判断URL类型，只判断是否存在  defaultVal= 字样，并截取数字
		//if(preg_match('~http\:\/\/item\.paipai\.com\/search\.htm\?id=([\w\d]+)~i', $url, $m) && $m[1] && ($html = dfopen($url)))
		if($html = dfopen($url))
        {
        	if($v['gzip'])
        	{
        		$html = gzdecode($html);
        	}
        	$html = array_iconv($v['c'], $this->Config['charset'], $html);
        	
        	$id = "";
			
			//开始获取价格
			if(preg_match('~\<div\s*class=[\"\']\s*l\s*trip_jg[\"\']\s*\>￥(.+?\s*.*?)\<\/div\>~i', $html, $m) && $m[1])
			{
				$price = $m[1];
			}elseif(preg_match('~\<span\s*class=[\"\']\s*units\_1[\"\']\s*\>¥\<\/span\>(.+?\s*.*?)\<\/span\>~i', $html, $m)&& $m[1]){
				$price = $m[1];
			}else{
			
			}

        	if($price)
        	{	
				
        		$return['id'] = $id;
        		$return['url'] = $url;
				$return['price'] = $price;
        		$return['title'] = '';
        		
        	}
        }
    	
    	return $return;
    }
}

?>