<?php
	require "include/init/init.php";
	if($_POST)
	{
		 $name=trim($_POST["name"])?$_POST["name"]:"";
    $content=trim($_POST["content"])?$_POST["content"]:"";

// 插入数据
    insert("INSERT INTO jl_meg(meg_name,meg_content) VALUES('{$name}','{$content}')");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>金陵贸易有限公司-客服留言</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/gbook.css">
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
</head>
<body>
	<div id="container">
		<?php require "include/header.php" ?>
		<div id="main">
			<img src="images/index-main-bigImg.png" style="margin:1px 0 0 46px;" />
			<div class="content">
				<div class="contLeft">
					<ul style="margin:11px 0 0 13px;">
						<li class="left">
							<span style="color:#3366cc;">客户留言</span>
							<span style="color:#999;">Guestbook</span>
						</li>
						<li class="right"></li>
					</ul>
					<div class="clear"></div>
					<form action="" method="post">
					<div class="name">
						<label>昵称:</label>
						<input type="text" name="name"/>
					</div>
					<div class="text">
						<label>内容:</label>
						<textarea name="content"></textarea>
					</div>
					<input type="submit" style="margin:9px 0 0 54px;" value="提交">
				</form>
				</div>
				<?php require "include/child_silde.php"; ?>
			
			</div>
		</div>
		<?php require "include/footer.php" ?>
	
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			function timer(){
				var now= new Date();
				var Y=now.getFullYear();
				var M=now.getMonth()+1;
				var M=M>=10?M:("0"+M);
				var D=now.getDate();
				var D=D>=10?D:("0"+D);
				var H=now.getHours();
				var H=H>=10?H:("0"+H);
				var i=now.getMinutes();
				var i=i>=10?i:("0"+i);
				var time=Y+'-'+M+'-'+D+' '+H+':'+i;	
				$('.lastLi').html(time);
			}
			timer();
			setInterval(timer,1000);
		})
	</script>
</body>
</html>