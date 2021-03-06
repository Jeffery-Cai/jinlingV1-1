<?php
  require "../include/init/init.php";
  if(isset($_POST["addSubmit"]))
  {
    $name=trim($_POST["name"])?$_POST["name"]:"";
    $link=trim($_POST["link"])?$_POST["link"]:"";

// 插入数据
    insert("INSERT INTO jl_friend(friend_name,friend_link) VALUES('{$name}','{$link}')");
  }

// 页数
$datacount=countNum("jl_friend");
$total_record=count($datacount);
// 每页记录数
$per_record=5;
// 总页数（总记录数/每页记录数）
$page_num=ceil($total_record/$per_record);
// 当前页数
  $cur_id=isset($_GET["page"])?(int)$_GET["page"]:1;
  $offset=($cur_id-1)*$per_record;
//  查询数据
 $data=select_all("SELECT * FROM jl_friend ORDER BY friend_id DESC LIMIT {$offset},{$per_record}");
// 编号
  $i=1;

  if(isset($_POST["delSubmit"]))
  {
    // var_dump($_POST);
// 删除数据
    delMore("del","jl_friend","friend_id",$_SERVER["PHP_SELF"]);
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
    <h3 class="page-header"><strong>友链管理</strong></h3>
    <div class="row">
      <h4>#添加友链</h4>
      <form class="form-horizontal" method="post">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">友链名称</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="请输入友链名称" name="name">
          </div>
        </div>
       <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">友链链接</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="请输入友链链接" name="link">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default" name="addSubmit">添加</button>
          </div>
        </div>
      </form>
    </div>
    <div class="row">
      <h4>#友链列表</h4>
      <form action="" method="post">
        <table class="table table-bordered table-hover placeholders">
          <thead>
            <tr style="font-weight:700">
              <td><input type="checkbox" name="" id="check_all">全选 <button class="btn btn-primary btn-xs" type="submit" name="delSubmit">删除</button></td>
              <td>友链名称</td>
              <td>友链链接</td>
              <td>操作</td>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data as $value):?>
            <tr>
              <td><input type="checkbox" name="del[]" value="<?php echo $value["friend_id"] ?>"> <?php echo $i; ?></td>
              <td><?php echo $value["friend_name"] ?></td>
              <td><?php echo $value["friend_link"] ?></td>
              <td><a href="friend_edit.php?id=<?php echo $value["friend_id"]; ?>"><button class="btn btn-primary btn-xs" type="button">编辑</button></a></td>
            </tr>
          <?php $i++;endforeach; ?>
          </tbody>
        </table>
      </form>
      <friend>
     <ul class="pagination pull-right">
      <?php echo $html=pagetion($page_num); ?>
     </ul>
      </friend>
    </div>
  </div>
</div>
</div>
<?php require "../include/js_all.php" ?>
</body>
</html>