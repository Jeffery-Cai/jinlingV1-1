<?php
  require "../include/init/init.php";

$id=isset($_GET["id"])?(int)$_GET["id"]:1;
// 查询数据
$dataselect=editTable("SELECT * FROM jl_notice WHERE notice_id={$id}");
  if($_POST)
  {
    $name=trim($_POST["name"])?$_POST["name"]:"";
    $content=trim($_POST["content"])?$_POST["content"]:"";
    $time=strtotime($_POST["time"]);
    updateTable("UPDATE jl_notice SET 
      notice_name='{$name}',
      notice_time='{$time}',
      notice_content='{$content}' WHERE notice_id={$id}","./notice.php");
  }
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="content" content="">
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
    <h3 class="page-header"><strong>公告管理</strong></h3>
    <div class="row">
      <h4>#编辑公告</h4>
      <form class="form-horizontal" method="post">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">公告名称</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="请输入公告名称" name="name" value="<?php echo $dataselect["notice_name"]; ?>">
          </div>
        </div> 
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">公告内容</label>
          <div class="col-sm-10">
            <textarea name="content" class="form-control" placeholder="请输入公告内容"><?php echo $dataselect["notice_content"]?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">发布时间</label>
          <div class="col-sm-10">
            <input type="date" name="time" class="form-control">
            <span>你当前所选时间为：<?php echo date("Y-m-d",$dataselect["notice_time"]);?></span>
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