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
<link href="H-ui/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="H-ui/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
<link href="H-ui/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="H-ui/lib/Hui-iconfont/1.0.7/iconfont.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>后台登录 </title>
<meta name="keywords" content="H">
<meta name="description" content="">
</head>
<body>

<?php 


	
	$user=$_POST['user'];
	$pw=$_POST['pw'];
	
	if($user=="admin"&&$pw=="a123456"){
		
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
		
		//显示数据
	$query = "INSERT INTO  `userlog` (`user` ,`ip` ,`time`)VALUES ( '".$user."',  '".$ip."',  '".date("Y-m-d H:i:s")."');";
	//echo $query;
	$result = @mysql_query($query) or die('SQL错误：'.mysql_error());
		header("Location: main.php");

//

session_start();
// store session data
$_SESSION['user']=1;		
//确保重定向后，后续代码不会被执行 
exit;
	}
	if(strlen($user)>0){
		
		echo "<script type=\"text/javascript\">alert(\"账号或者密码错误\") </script> ";
		
	}
	
	
 ?>
<div class="header"></div>
<div class="loginWraper">
  <div id="loginform" class="loginBox">
    <form class="form form-horizontal" action="login.php" method="post">
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input id="" name="user" type="text" placeholder="账户" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          <input id="" name="pw" type="password" placeholder="密码" class="input-text size-L">
        </div>
      </div>

      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <label for="online">
            <input type="checkbox" name="online" id="online" value="">
            使我保持登录状态</label>
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
          <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer"></div>
<script type="text/javascript" src="H-ui/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="H-ui/static/h-ui/js/H-ui.js"></script> 

</body>
</html>