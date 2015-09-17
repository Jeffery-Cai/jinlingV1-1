<?php
  require "../include/init/init.php";
  $notice_num=select_all("SELECT notice_id FROM jl_notice");
  $products_num=select_all("SELECT products_id FROM jl_products");
  $meg_num=select_all("SELECT meg_id FROM jl_meg");
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
            <h3 class="page-header"><strong>网站统计</strong></h3>
            <div class="row placeholders">
              <div class="col-xs-6 col-sm-4 placeholder">
                <h2><?php echo count($notice_num); ?></h2>
                <span class="text-muted">公告数目</span>
              </div>
              <div class="col-xs-6 col-sm-4 placeholder">
               <h2><?php echo count($products_num); ?></h2>
                <span class="text-muted">产品数目</span>
              </div>
              <div class="col-xs-6 col-sm-4 placeholder">
                 <h2><?php echo count($meg_num); ?></h2>
                <span class="text-muted">留言数目</span>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h3 class="page-header"><strong>系统信息</strong></h3>
            <div class="row">
              <div class="col-sm-6">
                <p>主机名 : <?php echo $_SERVER["HTTP_HOST"] ?></p>
                  <p>操作系统 ：<?php echo PHP_OS ?></p>
                  <p>服务器软件 ： <?php echo $_SERVER['SERVER_SOFTWARE'] ?></p>
                  <p>数据库平台 ： <?php echo mysql_get_server_info(); ?></p>
              </div>
              <div class="col-sm-6">
                <p>版权所有: 本公司所有</p>
                  <p>程序版本: 金陵V1.0 Release</p>
                  <p>技术支持:1345199080@qq.com</p>
                  <p>备案号: .....</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php require "../include/js_all.php" ?>
  </body>
  </html>