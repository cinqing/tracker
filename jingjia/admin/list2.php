
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<script type="text/javascript" src="lib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="H-ui/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="H-ui/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="H-ui/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="H-ui/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="H-ui/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="H-ui/static/h-ui.admin/css/style.css" />
<?php
	require 'config.php';
	
	//显示数据
	$query = "SELECT * FROM infro ";
	$result = @mysql_query($query) or die('SQL错误：'.mysql_error());
	
	//print_r(mysql_fetch_array($result,MYSQL_ASSOC));
	//print_r(mysql_fetch_array($result));
	//print_r(mysql_fetch_row($result));
	
	//print_r(mysql_fetch_assoc($result));
	?>
	<title>我的数据</title>
</head>
<body>
	<div>
	<table class="table table-border table-bordered table-bg">
		<thead>
		
			<tr class="text-c">
				<th>id</th>
				<th>URl</th>
				<th>微信</th>
				<th>Ip</th>
				<th>国家</th>
				<th>省</th>
				<th>市</th>
				<th>信息</th>
				<th>时间</th>
			</tr>
		</thead>
		<tbody>
			
		
		
		<?php
	
	while (!!$row = mysql_fetch_array($result)) {
		echo "<tr class=\"text-c\">";
				echo "<td>".$row[1]."</td>";
			echo "<td>".$row[0]."</td>";
			echo "<td>".$row[2]."</td>";
			echo "<td>".$row[3]."</td>";
			echo "<td>".$row[4]."</td>";
			echo "<td>".$row[5]."</td>";
			echo "<td>".$row[6]."</td>";
			echo "<td>".$row[7]."</td>";
				echo "<td>".$row[8]."</td>";
			echo"</tr>";
		//echo $row[1].'----'.$row[0].'----'.$row[2].$row[3].'----'.$row[4].'----'.$row[5];
		//echo mb_strlen($row['name'],'utf-8');
		
	}
		
		echo"</tbody></table>";
	
//	for ($i=0;$i<mysql_num_fields($result);$i++) {
//		echo mysql_field_name($result,$i);
//		echo '----';
//	}
//	
//	echo '<br />';
//	
//	echo mysql_get_proto_info();
	
	//求出多少条数据
	//print_r(@mysql_query($query) );

	
	mysql_close();
?>
</div>
</body>
</html>