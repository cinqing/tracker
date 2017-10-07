<?php
//header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('PRC');

$str = json_encode($_GET);
$u=$_GET["u"];
$v=$_GET["va"];
$burl=$_GET["burl"];
$dir = "./t/";
$file_name = $dir.date("Y-m-d").'.txt';

if (getenv("HTTP_CLIENT_IP")){
$ip = getenv("HTTP_CLIENT_IP");
}else if(getenv("HTTP_X_FORWARDED_FOR")){
$ip = getenv("HTTP_X_FORWARDED_FOR");
}else if(getenv("REMOTE_ADDR")){ 
$ip = getenv("REMOTE_ADDR"); 
}else if($_SERVER["REMOTE_ADDR"]) {
	$ip=$_SERVER["REMOTE_ADDR"];
	
}
else{
$ip = "Unknow"; 
}
//date('Y-m-d H:i:s',strtotime('+1 day'));
$time = date('Y-m-d H:i:s');
$info= $_SERVER['HTTP_USER_AGENT'];
$str = $u."|".$v."|".$ip."|".$info."|".$time."\r\n";

if(file_exists($file_name)){
	// file_put_contents($file_name,$str,FILE_APPEND.PHP_EOL);
//file_put_contents($file_name,$str,FILE_APPEND);
}else{
//file_put_contents($file_name,$str);
 //file_put_contents($file_name,$str.PHP_EOL,FILE_APPEND);
}

require 'admin/config.php';
//$ip="100.194.212.204,211.103.82.170";
echo $ip;
$infrof=getCity($ip);//获取ip信息
$guojia="";
$sheng="";
$shi="";
if($infrof&&count($infrof)>6){
	
$guojia=$infrof["country"];
$sheng=$infrof["region"];
$shi=$infrof["city"];
	
}

//
$arr = parse_url($u);
//print_r($arr);


//2.0 将URL中的参数取出来放到数组里
$arr_query = convertUrlQuery($arr['query']);

//print_r($arr_query); utm_medium


//
$arr2 = parse_url($burl);
//print_r($arr);


//2.0 将URL中的参数取出来放到数组里
$arr_query2 = convertUrlQuery($arr2['query']);
print_r($arr_query2);
if($arr_query2["word"]!=""){
	
	$wd=$arr_query2["word"];
}else{
$wd=$arr_query2["wd"];
}
//神马 so.m.sm.cn
if(strstr($burl,"yz.m.sm.cn")||strstr($burl,"m.yz.sm.cn")||strstr($burl,"m.sm.cn")||strstr($burl,"so.m.sm.cn")){
	
	$wd=$arr_query2["q"];
}
//搜狗 wisd.sogou.com
if(strstr($burl,"m.sogou.com")||strstr($burl,"wap.sogou.com")||strstr($burl,"wisd.sogou.com")){
	
	$wd=$arr_query2["keyword"];
	
	if($wd==""){
		
		$wd=$arr_query2["query"];
	}
}
//360 m.so.com
if(strstr($burl,"m.so.com")){
	
	
	$wd=$arr_query2["q"];
}	
//echo $burl;
if($u==""){
	return;
	
}
	$query = "INSERT INTO  `infro` (`url` ,`ID` ,`wx` ,`ip` ,`guojia` ,`sheng` ,`shi` ,`infor` ,`time`,`utm_source`,`utm_medium`,`utm_term`,`utm_content`,`utm_campaign`,`word`,`burl`,`web`) VALUES ('".$u."', NULL ,  '".$v."',  '".$ip."',  '".$guojia."',  ' ".$sheng."', '".$shi."',  '".$info."',  '".$time."','".$arr_query['utm_source']."','".urldecode($arr_query['utm_medium'])."','".urldecode($arr_query['utm_term'])."','".urldecode($arr_query['utm_content'])."','".$arr_query['utm_campaign']."','".urldecode($wd)."',  '".$burl."','".$arr['host'].$arr['path']."');";
	echo $query;
	$result = @mysql_query($query) ;//or die('SQL错误：'.mysql_error());
	
	
	
	if(!$result){
		file_put_contents("./log.txt",$query.'\r\n',FILE_APPEND);
	}
	//第五步，释放记录集资源
	//mysql_free_result($result);
	
	//最后一步，关闭数据库
	mysql_close();
	
	
	function getCity($ip = '')
{
	
	if(strstr($ip, ',')){
		$arr=explode(',', $ip);
		$ip=$arr[1];
		//file_put_contents("./log.txt",$ip.'\r\n',FILE_APPEND);
	}
	
    if($ip == ''){
        $url = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json";
        $ip=json_decode(file_get_contents($url),true);
        $data = $ip;
    }else{
        $url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
        $ip=json_decode(file_get_contents($url));   
        if((string)$ip->code=='1'){
           return false;
        }
        $data = (array)$ip->data;
    }
    
    return $data;   
}
//url  can shu 
	function convertUrlQuery($query)
{ 
    $queryParts = explode('&', $query); 
    
    $params = array(); 
    foreach ($queryParts as $param) 
	{ 
        $item = explode('=', $param); 
        $params[$item[0]] = $item[1]; 
    } 
    
    return $params; 
}

?>