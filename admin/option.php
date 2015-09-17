<?php
  require "../include/init/init.php";
  $optiondata=select_row("SELECT * FROM jl_option");
  
// 修改数据
  if($_POST)
  {
    $keyword=$_POST["keyword"];
    $description=$_POST["description"];
    $address=$_POST["address"];
    $contact=$_POST["contact"];
    $copyright=$_POST["copyright"];
    updateTable("UPDATE `jl_option` SET `keyword`='{$keyword}',`description`='{$description}',`address`='{$address}',`contact`='{$contact}',`copyright`='{$copyright}'","./option.php");
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
  <?php require "../include/admin_header.php" ?>
  <div class="col-sm-12 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <!-- 更改即可 -->
    <h3 class="page-header"><strong>网站设置管理</strong></h3>
    <div class="row">
      <h4>#网站设置列表</h4>
      <form action="" method="post" class="form-horizontal">
         <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">网站关键字</label>
          <div class="col-sm-10">
            <textarea name="keyword" class="form-control"><?php echo $optiondata["keyword"] ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">网站描述</label>
          <div class="col-sm-10">
            <textarea name="description" class="form-control"><?php echo $optiondata["description"] ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">联系地址</label>
          <div class="col-sm-10">
            <textarea name="address" class="form-control"><?php echo $optiondata["address"] ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">联系方式</label>
          <div class="col-sm-10">
            <textarea name="contact" class="form-control"><?php echo $optiondata["contact"] ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">版权</label>
          <div class="col-sm-10">
            <textarea name="copyright" class="form-control"><?php echo $optiondata["copyright"] ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">修改</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<?php require "../include/js_all.php" ?>
</body>
</html>