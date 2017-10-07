<?php
error_reporting(0); 
require 'config.php';
session_start();
if($_SESSION['user']!="1"){
	header("Location: login.php");
	exit;
}


	
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
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>角色管理</title>
</head>
<body>
<?php
//session_start();
//if($_SESSION['user']!="1"){
	
//	header("Location: login.php");
//	exit;
//}


	require 'config.php';
	
	$star=$_GET['star'];
	$end=$_GET['end'];
	$web=$_GET['web'];
	if($star==""){
		
	$star=date("Y-m-d");
$end=	date("Y-m-d");
		
	}
	$websql="";
	if($web!=""&&$web!="0"){
		
		$websql=" and web='".$web."' ";
	}
	//显示数据
	$query = "SELECT * FROM infro where time>'".$star."' and time<'".$end." 23:59:59' ".$websql." order by id desc ";
	//echo $query;
	$result = @mysql_query($query) or die('SQL错误：'.mysql_error());
	
	//print_r(mysql_fetch_array($result,MYSQL_ASSOC));
	//print_r(mysql_fetch_array($result));
	//print_r(mysql_fetch_row($result));
	
	//print_r(mysql_fetch_assoc($result));
	
	?>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 数据管理 <span class="c-gray en">&gt;</span> 数据列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
<div class="text-c">	网站:
		<span class="select-box inline">
		<select class="select" id="web" name="">
			<option value="0">全部</option>
			<?php
			$r = "SELECT distinct(web) FROM infro  order by id desc ";
	
	$d = @mysql_query($r) or die('SQL错误：'.mysql_error());
			//echo $r;
			//print_r($d);
			
			while (!!$row = mysql_fetch_array($d)) {
	
			if($web!=""&&$web==$row[0]){
				
				echo "	<option value=\"".$row[0]."\" selected = \"selected\">".$row[0]."</option>";
			}else	{
			echo "	<option value=\"".$row[0]."\">".$row[0]."</option>";
			}
		//echo $row[1].'----'.$row[0].'----'.$row[2].$row[3].'----'.$row[4].'----'.$row[5];
		//echo mb_strlen($row['name'],'utf-8');
		
	}
			?>
			
		
		</select>
		</span>
 日期范围：
		<input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}'})" value="<?php echo $star ?>" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d'})" value="<?php echo $end ?>" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="" id="" name="">
		<button type="submit" class="btn btn-success" id="bth" name=""><i class="Hui-iconfont">&#xe665;</i> 搜记录</button>
	</div>

	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="xiazai()" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe640;</i> 数据下载</a></span>  <span class="r">共有数据：<strong><?php echo mysql_num_rows($result); ?></strong> 条</span> </div>
		<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr>
				<th scope="col" colspan="9">数据列表</th>
			</tr>
			
<style type="text/css"> .t{
	width:200px !important ;
	
}
.t2{
	width:50px !important ;
	
}
</style>
			<tr class="text-c">
				
				<th width="10">ID</th>
				<th width="10" class="t" style=" width: 200px; ">URL</th>
				<th width="10" class="t2">搜索词</th>
				<th  width="10">平台</th>
				<th width="20">时间</th>
					<th width="10">ip</th>
				<th width="10">国家</th>
				<th width="10">省</th>
				<th width="10">市</th>
				
				
				
			</tr>
			
			
			
		</thead>
		<tbody>
		
						<?php
	
	while (!!$row = mysql_fetch_array($result)) {
		echo "<tr class=\"text-c\">";
				echo "<td>".$row[1]."</td>";
			echo "<td>".trim($row[0])."</td>";
			
			//平台
			$arr = parse_url($row["burl"]);

			echo "<td>".$row["word"]."</td>";
			echo "<td>".$arr['host']."</td>";
			echo "<td>".$row[8]."</td>";
			echo "<td>".$row[3]."</td>";
			echo "<td>".$row[4]."</td>";
			echo "<td>".$row[5]."</td>";
			echo "<td>".$row[6]."</td>";
			
			
			
					
			echo"</tr>";
		//echo $row[1].'----'.$row[0].'----'.$row[2].$row[3].'----'.$row[4].'----'.$row[5];
		//echo mb_strlen($row['name'],'utf-8');
		
	}
		
		

			


	
	mysql_close();
?>
			
		
		
		</tbody>
	</table>
</div>
<script type="text/javascript" src="H-ui/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="H-ui/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="H-ui/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="H-ui/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="H-ui/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="H-ui/static/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript">
$(function(){
	$('.table-sort').dataTable({
		"aaSorting": [[ 0, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
	
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		 {"orderable":false,"aTargets":[1,3,2,4,5,6,7,8]}// 制定列不参与排序
		
		]
	});
	$('.table-sort tbody').on( 'click', 'tr', function () {
		if ( $(this).hasClass('selected') ) {
			$(this).removeClass('selected');
		}
		else {
			table.$('tr.selected').removeClass('selected');
			$(this).addClass('selected');
		}
	});
	
	
	//搜搜
	$("#bth").click(function(){
		
		window.location.href="list.php?star="+$("#datemin").val()+"&end="+$("#datemax").val()+"&web="+$("#web").val();
		
	})
	
	
});


function xiazai(){
	
	window.location.href="test.php?star="+$("#datemin").val()+"&end="+$("#datemax").val()+"&web="+$("#web").val();
	
}
</script>

</body>
</html>