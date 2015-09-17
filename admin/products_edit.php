<?php
  require "../include/init/init.php";

$id=isset($_GET["id"])?(int)$_GET["id"]:1;
// 查询数据
$dataselect=editTable("SELECT * FROM jl_products WHERE products_id={$id}");
  if($_POST)
  {
    $name=trim($_POST["name"])?$_POST["name"]:"";
     if($_FILES)
    {
      upload_file("img");
      $img=$_FILES["img"]["name"];
    }
    updateTable("UPDATE jl_products SET 
     products_name='{$name}',
      products_img='{$img}' WHERE products_id={$id}","./products.php");
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
    <h3 class="page-header"><strong>产品管理</strong></h3>
    <div class="row">
      <h4>#编辑产品 <span class="pull-right"> <<< <a href="products.php">返回产品管理</a> </span></h4>
      <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">产品名称</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="name" value="<?php echo $dataselect["products_name"]; ?>">
          </div>
        </div>
         <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">产品图像</label>
          <div class="col-sm-10">
            <input type="file" name="img" value="<?php echo $dataselect["products_img"] ?>">
              <td> 当前您选择的图像 ：<img src="./uploads/<?php echo $dataselect["products_img"] ?>" alt="" width="200" height="150"></td>
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