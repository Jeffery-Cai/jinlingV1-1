<?php
	require "include/init/init.php";

	// 页数
$datacount=countNum("jl_news");
$total_record=count($datacount);
// 每页记录数
$per_record=15;
// 总页数（总记录数/每页记录数）
$page_num=ceil($total_record/$per_record);
// 当前页数
  $cur_id=isset($_GET["page"])?(int)$_GET["page"]:1;
  $offset=($cur_id-1)*$per_record;
//  查询数据
 $newsdata=select_all("SELECT * FROM jl_news ORDER BY news_id DESC LIMIT {$offset},{$per_record}");
// 编号
  $i=1;

  if(isset($_POST["delSubmit"]))
  {
    // var_dump($_POST);
// 删除数据
    delMore("del","jl_news","news_id",$_SERVER["PHP_SELF"]);
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>金陵贸易有限公司-行业新闻</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/knowledge.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
</head>
<body>
	<div id="container">
		<?php require "include/header.php" ?>
		<div id="main">
			<img src="images/index-main-bigImg.png" style="margin:1px 0 0 46px; margin-top:-9px;" />
			<div class="content">
				<div class="contLeft">
					<ul style="margin:11px 0 0 13px;">
						<li class="left">
							<span style="color:#3366cc;">行业知识</span>
							<span style="color:#999;">Knowledge</span>
						</li>
						<li class="right"></li>
					</ul>
					<div class="clear"></div>
					<div class="knowledgeLis">
						<ul class="knowledge" style="margin-top:10px;">
							<?php foreach ($newsdata as $value):?>
							<li>
								<a href="<?php echo $value["news_link"] ?>" title="<?php echo $value['news_description'] ?>"><?php echo $value["news_name"] ?></a><span><?php echo date("Y-m-d",$value["news_time"]) ?></span>
							</li>
						<?php endforeach; ?>
						</ul>
					</div>
					<div class="knowledgeLis" style="display:none">
						<ul class="knowledge">
							<li style="margin-top:6px;">
								<a href="">四川达州持续遭受特大暴雨袭击</a><span>2009-07-09</span>
							</li>
						</ul>
					</div>
					<div class="knowledgeLis" style="display:none">
						<ul class="knowledge">
							<li style="margin-top:6px;">
								<a href="">广东省招办就高考录取数据错误向考生道歉</a><span>2009-07-09</span>
							</li>
						</ul>
					</div>
				 <ul class="pagination pull-right">
		      <?php echo $html=pagetion($page_num); ?>
		     </ul>
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
				console.log(H);
				var i=now.getMinutes();
				var i=i>=10?i:("0"+i);
				var time=Y+'-'+M+'-'+D+' '+H+':'+i;	
				$('.lastLi').html(time);
			}
			timer();
			setInterval(timer,1000);
			
			//翻页
			var i=0;
			$('.num').click(function(){
				i = $(this).index();
				$('.knowledgeLis').eq(i).css("display","").siblings('div.knowledgeLis').css("display","none");
			})
			$('.pre').click(function(){
				if(i>0){
					$('.num').eq((--i)%4).trigger('click');
				}
			})
			$('.next').click(function(){
				if(i<2){
					$('.num').eq((++i)%4).trigger('click');
				}
			})
		})
	</script>
</body>
</html>