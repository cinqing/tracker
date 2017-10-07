<?php
	require 'config.php';
	
	//显示数据
	$query = "SELECT * FROM infro";
	$result = @mysql_query($query) or die('SQL错误：'.mysql_error());
	
	print_r(mysql_fetch_array($result,MYSQL_ASSOC));
	
	//print_r(mysql_fetch_row($result));
	
	//print_r(mysql_fetch_assoc($result));
	
//	while (!!$row = mysql_fetch_array($result)) {
//		echo $row['id'].'----'.$row['name'].'----'.$row['email'];
//		echo mb_strlen($row['name'],'utf-8');
//		echo '<br />';
//	}

//	for ($i=0;$i<mysql_num_fields($result);$i++) {
//		echo mysql_field_name($result,$i);
//		echo '----';
//	}
//	
//	echo '<br />';
//	
//	echo mysql_get_proto_info();
	
	//求出多少条数据
	print_r(@mysql_query($query) );
	
	
	mysql_close();
?>