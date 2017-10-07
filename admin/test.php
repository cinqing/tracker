<?php 

$star=$_GET["star"];
$end=$_GET["end"];
$web=$_GET['web'];

$websql="";
	if($web!=""&&$web!="0"){
		
		$websql=" and web='".$web."' ";
	}
header("Content-type:application/vnd.ms-excel"); 
header("Content-Disposition:attachment;filename=test.xls"); 
	require 'config.php';
	//显示数据
	
	
	$query = "SELECT * FROM infro where time>'".$star."' and time<'".$end." 23:59:59' ".$websql." order by time desc ";
	
	$result = @mysql_query($query) or die('SQL错误：'.mysql_error());
	
						
	$data;
	while (!!$row = mysql_fetch_array($result)) {
		
			//	echo $row[1]."\t";
			//echo $row[0]."\t";
			//echo $row[2]."\t";
			//echo $row[8]."\t";
			//echo $row[3]."\t";
			//echo $row[4]."\t";
			//echo $row[5]."\t";
			//echo $row[6]."\t";
			if(strstr($row[0],"#")){
				$arr=explode("#",$row[0]);
				if(count($arr)>2){
					
					$bh="";
				}else{
				$bh=$arr[1];
				}
			}else{
				
				$bh="";
			}
			$data=$data.$row[1]."\t".$row[0]."\t".$row["word"]."\t".$bh."\t".$row[2]."\t".$row[8]."\t".$row[3]."\t".$row[4]."\t".$row[5]."\t".$row[6]."\t".$row[7]."\t".$row["utm_term"]."\t".$row["utm_content"]."\t".$row["utm_medium"]."\t\n";
				//echo $row[7]."\t\n";
		
		//echo "test1\t"; 
//echo "test2\t\n"; 
		//echo $row[1].'----'.$row[0].'----'.$row[2].$row[3].'----'.$row[4].'----'.$row[5];
		//echo mb_strlen($row['name'],'utf-8');
		
	}

	
	mysql_close();
?>

<?php 
header("Content-type:application/vnd.ms-excel"); 
header("Content-Disposition:attachment;filename=test.xls"); 
//echo "test1\\t"; 
//echo "test2\\t\\n"; 
//echo "ID\t"; 
//echo "url\t"; 
//echo "编号\t"; 
//echo "微信\t"; 
//echo "时间\t"; 
//echo "ip\t"; 
//echo "国家\t"; 
//echo "省\t"; 
//echo "市\t"; 
//echo "信息\t\n"; 
$data = iconv("utf-8","gb2312//IGNORE",$data);
echo $data;
?> 

