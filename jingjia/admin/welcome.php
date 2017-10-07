<?php
ob_start();
require 'config.php';
 ?>
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
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>我的桌面</title>
</head>
<body>

<?php
	
	
	//显示数据
	$query = "SELECT count(1) FROM infro ";
	$result = @mysql_query($query) or die('SQL错误：'.mysql_error());
	
	//print_r(mysql_fetch_array($result,MYSQL_ASSOC));
	//print_r(mysql_fetch_array($result));
	//print_r(mysql_fetch_row($result));
	
	//print_r(mysql_fetch_assoc($result));
	?>
<div class="page-container">
	<p class="f-20 text-success">欢迎登录后台！</p>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th colspan="7" scope="col">信息统计</th>
			</tr>
			<tr class="text-c">
				<th>统计</th>
				<th>总数</th>
				<th>ip</th>
			
			</tr>
		</thead>
		<tbody>
			<tr class="text-c">
				<td>总数</td>
				<td><?php 	$query = "SELECT count(1) FROM infro ";
	$result = @mysql_query($query) or die('SQL错误：'.mysql_error());
	while (!!$row = mysql_fetch_array($result)) {
	
				echo $row[0];
	
	}
	?></td>
				<td><?php 	$query = "SELECT distinct(ip) FROM infro   ";
	$result = mysql_query($query) ;
	
	
$num_rows = mysql_num_rows($result);
print_r($num_rows);
	?></td>
			
			</tr>
			<tr class="text-c">
				<td>今日</td>
				<td><?php 	$query = "SELECT count(1) FROM infro where time>'".date("Y-m-d")."' ";
	$result = @mysql_query($query) or die('SQL错误：'.mysql_error());
	while (!!$row = mysql_fetch_array($result)) {
	
				echo $row[0];
				
				
	
	}
	?></td>
				<td><?php 	$query = "SELECT distinct(ip) FROM infro where  time>'".date("Y-m-d")."'  ";
	$result = mysql_query($query) ;
	
	
$num_rows = mysql_num_rows($result);
print_r($num_rows);
?>
</td>
			
			</tr>
			<tr class="text-c">
				<td>昨日</td>
				<td><?php 	$query = "SELECT count(1) FROM infro where time<'".date("Y-m-d")."' and time>'".date("Y-m-d",strtotime("-1 day"))."' ";
	$result = @mysql_query($query) or die('SQL错误：'.mysql_error());
	while (!!$row = mysql_fetch_array($result)) {
	
				echo $row[0];
				
				
	
	}
	?></td>
				<td><?php 	$query = "SELECT distinct(ip) FROM infro where  time<'".date("Y-m-d")."' and time>'".date("Y-m-d",strtotime("-1 day"))."' ";
	$result = mysql_query($query) ;
	
	
$num_rows = mysql_num_rows($result);
print_r($num_rows);
?></td>
			
			</tr>
			
			<tr class="text-c">
				<td>本周</td>
				<td>	
<?php 	$query = "SELECT count(1) FROM infro where time>FROM_UNIXTIME(".this_monday().") ";
//echo $query;
	
//echo this_monday();
	$result = @mysql_query($query) or die('SQL错误：'.mysql_error());
	while (!!$row = mysql_fetch_array($result)) {
	
				echo $row[0];

	}
	?>

</td>
				<td><?php 	$query = "SELECT distinct(ip) FROM infro where  time>FROM_UNIXTIME(".this_monday().")  ";
	$result = mysql_query($query) ;

$num_rows = mysql_num_rows($result);
print_r($num_rows);
?></td>
			
			</tr>
				<tr class="text-c">
				<td>上周</td>
				<td><?php
				
				$n = time() - 86400 * date('N', time());



$query = "SELECT count(1) FROM infro where time>'".date('Y-m-d', $n - 86400 * 6 )."' and time<'".date('Y-m-d', $n)." 23:59:59' ";
//echo $query;

	$result = @mysql_query($query) or die('SQL错误：'.mysql_error());
	while (!!$row = mysql_fetch_array($result)) {
	
				echo $row[0];
				
				
	
	}

				?></td>
				<td><?php 	$query = "SELECT distinct(ip) FROM infro where  time>'".date('Y-m-d', $n - 86400 * 6 )."' and time<'".date('Y-m-d', $n)." 23:59:59' ";
	$result = mysql_query($query) ;
	
	
$num_rows = mysql_num_rows($result);
print_r($num_rows);
?></td>
			
			</tr>
			<tr class="text-c">
				<td>本月</td>
				<td>
				
				<?php 	$query = "SELECT count(1) FROM infro where time>'".date('Y-m-01', strtotime(date("Y-m-d")))."' ";
	$result = @mysql_query($query) or die('SQL错误：'.mysql_error());
	while (!!$row = mysql_fetch_array($result)) {
	
				echo $row[0];

	}
	?>
				</td>
				<td><?php 	$query = "SELECT distinct(ip) FROM infro where  time>'".date('Y-m-01', strtotime(date("Y-m-d")))."'  ";
	$result = mysql_query($query) ;

$num_rows = mysql_num_rows($result);
print_r($num_rows);
?>
</td>
			
			</tr>
				<tr class="text-c">
				<td>上月</td>
				<td>
				
				<?php 	$query = "SELECT count(1) FROM infro where time<'".date('Y-m-01', strtotime('-1 month'))."' and time>'".date('Y-m-01', strtotime(date("Y-m-d")))."' ";
	$result = @mysql_query($query) or die('SQL错误：'.mysql_error());
	while (!!$row = mysql_fetch_array($result)) {
	
				echo $row[0];
				
				
	
	}
	?>
				</td>
				<td><?php 	$query = "SELECT distinct(ip) FROM infro where  time<'".date('Y-m-01', strtotime('-1 month'))."' and time>'".date('Y-m-01', strtotime(date("Y-m-d")))."' ";
	$result = mysql_query($query) ;
	
	
$num_rows = mysql_num_rows($result);
print_r($num_rows);
?></td>
			
			</tr>
		</tbody>
	</table>

</div>

<?php
function this_monday($timestamp=0,$is_return_timestamp=true){ 
static $cache ; 
$id = $timestamp.$is_return_timestamp; 
if(!isset($cache[$id])){ 
if(!$timestamp) $timestamp = time(); 
$monday_date = date('Y-m-d', $timestamp-86400*date('w',$timestamp)+(date('w',$timestamp)>0?86400:-/*6*86400*/518400)); 
if($is_return_timestamp){ 
$cache[$id] = strtotime($monday_date); 
}else{ 
$cache[$id] = $monday_date; 
} 
} 
return $cache[$id]; 
}
?>
<footer class="footer mt-20">
	<div class="container">
		<p>感谢jQuery、layer、laypage、Validform、UEditor、My97DatePicker、iconfont、Datatables、WebUploaded、icheck、highcharts、bootstrap-Switch<br>
			Copyright &copy;2015 H-ui.admin v2.3 All Rights Reserved.<br>
			本后台系统由提供技术支持</p>
	</div>
</footer>
<script type="text/javascript" src="H-ui/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="H-ui/static/h-ui/js/H-ui.js"></script> 
<?php ob_end_flush(); ?>
</body>
</html>