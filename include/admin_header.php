<?php
	/**
	 * 管理员头部文件
	 */
  session_start();

// 验证是否登陆后进入后台
  if(!isset($_SESSION["is_login"])==1)
  {
    die('<script type="text/javascript">alert("你未登陆,即将为你跳转到登陆界面");location.href="../admin/admin_login.php";</script>');
  }

?>	
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">金陵后台管理</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="javascript:void(0)"><?php echo $_SESSION["name"]; ?></a></li>
              <li><a href="admin_login.php?is_login=1" onclick="alert('即将为您退出')">退出 > </a></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
              <li><a href="index.php">首页</a></li>
              <li><a href="nav.php">导航管理</a></li>
              <li><a href="products.php">产品管理</a></li>
              <li><a href="news.php">新闻管理</a></li>
              <li><a href="notice.php">通知管理</a></li>
              <li><a href="document.php">单页管理</a></li>
              <li><a href="friend.php">友链管理</a></li>
              <li><a href="admin.php">管理员</a></li>
              <li><a href="meg.php">留言管理</a></li>
              <li><a href="option.php">网站设置</a></li>
            </ul>
          </div>
