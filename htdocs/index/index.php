<?php 
	$dbc = mysql_connect("127.0.0.1","root","1234");
	if(!$dbc){
		echo "数据链接错误";
	}else{
		echo "数据库连接成功";
	}
	mysql_close();
	
?>
