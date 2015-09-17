<?php
	require "include/init/init.php";
	$aboutData=select_row("SELECT * FROM jl_document WHERE document_id=1");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>金陵贸易有限公司-<?php echo $aboutData["document_name"]; ?></title>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/about_us.css">
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
</head>
<body>
	<div id="container">
		<?php require "include/header.php" ?>
		<div id="main">
			<img src="images/index-main-bigImg.png" style="margin:1px 0 0 46px;" />
			<div class="content">
				<?php echo $aboutData["document_content"];?>
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