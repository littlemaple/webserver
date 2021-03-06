<?php
/*******************************************************************
 * [pugoin] (C)2010 - 2099 Dream3 Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename siteUserVerifier.class.php $
 *
 * @Author http://www.pugo.in $
 *
 * @Date 2011-09-16 17:25:36 1798494350 1689877188 3130 $
 *******************************************************************/



class siteUserVerifier{

	var $db;

	function siteUserVerifier(){
		$this->db = XWB_plugin::getDB();
	}

	
	function verify( $username, $password, $questionid = '', $answer = '',$isuid = 0 )
	{

		$return = array( 0 => -1, 1 => -1);


		$ip = XWB_plugin::getIP();

		
		
		$failedlogins = $this->db->fetch_first("select * from ".XWB_S_TBPRE."failedlogins where `ip`='{$ip}'");
		if($failedlogins && $failedlogins['count'] >= 5)
		{
			$return[0] = -5;
				
			return $return;
		}


		
		if (true===UCENTER) 
		{
						include_once(ROOT_PATH . 'uc_client/client.php');

			$uc_result = uc_user_login($username, $password, $isuid, 0, $questionid, $answer);
			$ucuid = $uc_result[0];
			if ($ucuid < 1) 
			{
				$return[0] = $ucuid;
				
				return $return;
			}
		}

		
		$member = $this->db->fetch_first("SELECT `uid`, `password`, `username`, `role_type` FROM ". XWB_S_TBPRE. "members WHERE `username`='{$username}'");
				
		if ($member) 
		{
			
			if($member['password']==md5($password))
			{
				$return[0] = (int)$member['uid'];
				$return[1] = ('admin'==$member['role_type'] ? 1 : 0);
			}
			else
			{
				$return[0] = -2;

				
				if($failedlogins)
				{
					$this->db->query("update ".XWB_S_TBPRE."failedlogins set `count`='".(max(1,(int) $failedlogins['count']) + 1)."', `lastupdate`='".time()."' where `ip`='{$ip}'");
				}
				else
				{
					$this->db->query("insert into ".XWB_S_TBPRE."failedlogins (`ip`,`count`,`lastupdate`) values ('{$ip}','1','".time()."')");
				}
			}
		}
		
		
		return $return;

	}
	
}