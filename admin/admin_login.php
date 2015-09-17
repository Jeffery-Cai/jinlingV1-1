<?php
require "../include/init/init.php";
session_set_cookie_params(3600);
session_start();


// 退出登陆
if(isset($_SESSION["is_login"])==1)
{
   session_destroy();
}
if($_POST)
{
  $name=$_POST["name"];
  $pass=$_POST["pass"];
  $yz_code=$_POST["yz_code"];
  $yz_session=$_SESSION["code"];
  $admindata=select_all("SELECT admin_password FROM jl_admin WHERE admin_username='{$name}'");

  if(!empty($admindata))
  {
    foreach ($admindata as $value) {
      if($value["admin_password"]==$pass && strtolower($yz_code)==strtolower($yz_session))
      { 
        $_SESSION["is_login"]=1;
        $_SESSION["name"]=$name;
        success("登陆成功","./index.php");
      }else{
       error("验证码错误");
      }
    }
  }else{
      error("登陆失败");
  }
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="">
  <title>金陵后台管理</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/dashboard.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">金陵后台管理</a>
      </div>
    </div>
  </nav>
  <div class="col-sm-12 col-sm-offset-3 col-md-7 col-md-offset-2 main">
    <h3 class="page-header"><strong>登陆</strong></h3>
    <form class="form-horizontal" method="post">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" placeholder="请输入用户名" name="name">
        </div>
      </div> 
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">密码</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" placeholder="请输入密码" name="pass">
        </div>
      </div> 
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">验证码</label>
        <div class="row">
          <div class="col-md-3">
            <input type="text" class="form-control" placeholder="请输入验证码" name="yz_code">
            </div>
            <div class="col-md-3">
            <img src="regular_img.php" alt="" onclick="this.src='regular_img.php?r='+Math.random();">
           </div>
          </div>
        </div>
      <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">登陆</button>
          </div>
        </div>
    </form>
  </div>
</div>
</div>
<?php require "../include/js_all.php" ?>
</body>
</html>