<?php
require "include/init/init.php";

session_start();

// 产品
$data2=select_all("SELECT * FROM jl_products ORDER BY products_id DESC LIMIT 0,5");

// 新闻
$data3=select_all("SELECT * FROM jl_news ORDER BY news_id DESC LIMIT 0,5");

// 通知
$data4=select_all("SELECT * FROM jl_notice ORDER BY notice_id DESC LIMIT 0,5");

// 友链
$data5=select_all("SELECT * FROM jl_friend ORDER BY friend_id DESC LIMIT 0,20");

// 网站设置
$optiondata=select_row("SELECT * FROM jl_option");

// 公司简介

// $data6=select_row("SELECT * FROM jl_document WHERE document_id=1");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<meta name="keywords" content="<?php echo $optiondata["keyword"] ?>" />
	<meta name="description" content="<?php echo $optiondata["description"] ?>" />
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/base.css">
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<style type="text/css">
	.picMarquee-left{ overflow:hidden; position:relative;  border:1px solid #ddd;margin-bottom: 13px;}
	.picMarquee-left .hd{ overflow:hidden;  height:30px;padding:0 10px;  }
	.picMarquee-left .hd .prev,.picMarquee-left .hd .next{ display: block;
		float: right;
		margin-right: 5px;
		margin-top: 2px;
		overflow: hidden;
		cursor: pointer;
		color: orange!important;
		font-size: 18px;
		font-weight: 700;}
		.picMarquee-left .bd{ padding:10px;}
		.picMarquee-left .bd ul{ overflow:hidden; zoom:1;}
		.picMarquee-left .bd ul li{ margin:0 8px; float:left; _display:inline; overflow:hidden; text-align:center;  }
		.picMarquee-left .bd ul li .pic{ text-align:center; }
		.picMarquee-left .bd ul li .pic img{ width:148px; height:109px; display:block; padding:2px; border:1px solid #ccc; }
		.picMarquee-left .bd ul li .pic a:hover img{ border-color:#999;}
		.picMarquee-left .bd ul li .title{ line-height:24px; }
		</style>
	</head>
	<body>
		<div id="container">
			<?php require "include/header.php" ?>
			<div id="main">
				<img src="images/index-main-bigImg.png" style="margin:1px 0 0 46px;" />
				<div class="content">
					<div class="left-top">
						<ul style="margin:11px 0 0 13px;">
							<li class="left">
								<span style="color:#3366cc;">公司简介</span>
								<span style="color:#999;">About us</span>
							</li>
							<li class="right"></li>
						</ul>
						<div class="description">
							我公司前身是金能保温材料经营部，因扩大经营规模，于2009年3月变更为金陵贸易有限公司。1994年开始从事保温、保冷、吸音、耐火、化工、建材等产品的经营贸易，对控制产品质量方面具备非常好的经验，是中国东南地区最大的保温材料经营贸易公司之一。公司经营宗旨是：诚信经营，质量第一。欢迎您的洽谈！1994年开始从事保温、保冷、吸音、耐火、化工、建材等产品的经营贸易，对控制产品质量方面具备非常好的经验，是中国东南地区最大的保温材料经营贸易公司之一。公司经营宗旨是：诚信经营，质量第一。欢迎您的洽谈！
							<span style="color:#0033ff"><a href="about_us.php">查看更多...</a></span>
						</div>
					</div>
					<div class="right-top">
						<ul style="margin:11px 0 0 40px;">
							<li class="left">
								<span style="color:#3366cc;">行业新闻</span>
								<span style="color:#999;">News</span>
							</li>
							<li class="right" style="width:222px;"></li>
						</ul>
						<ul class="news">
							<?php foreach ($data3 as $value):?>
							<li>
								<a href="<?php echo $value["news_link"] ?>" title="<?php echo $value['news_description'] ?>"><?php echo $value["news_name"] ?></a><span><?php echo date("Y-m-d",$value["news_time"]) ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="left-bottom">
					<ul style="margin-left:13px;">
						<li class="left">
							<span style="color:#3366cc;">产品展示</span>
							<span style="color:#999;">Products</span>
						</li>
						<li class="right"><a href="product.php" style="color:#0033ff;">more>>></a></li>
					</ul>
					<div class="picMarquee-left">
						<div class="hd">
							<a class="next"> &gt; </a>
							<a class="prev"> &lt; </a>
						</div>
						<div class="bd">
							<div class="tempWrap" style="overflow:hidden; position:relative; width:1236px">
								<ul class="picList" style="width: 3708px; position: relative; overflow: hidden; padding: 0px; margin: 0px; left: -917px;">
									<?php foreach ($data2 as $value):?>
									<li class="clone" style="float: left; width: 196px;">
										<div class="pic">
											<img src="./admin/uploads/<?php echo $value['products_img'] ?>" alt="" width='148' height='109' >
										</div>
										<div class="title"><a href="dsadsad" target="_blank"></a></div>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="right-bottom">
				<ul style="margin-left:40px;">
					<li class="left">
						<span style="color:#3366cc;">通知公告</span>
						<span style="color:#999;">Notice</span>
					</li>
					<li class="right" style="width:222px;"><a href="product.php" style="color:#0033ff;">more>>></a></li>
				</ul>
				<ul class="news">
					<?php foreach ($data4 as $value):?>
					<li>
						<a href="javascript:void(0)" title=""><?php echo $value["notice_name"] ?></a><span><?php echo date("Y-m-d",$value["notice_time"]) ?></span>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="bottom">
			<ul style="margin-left:13px;">
				<li class="left">
					<span style="color:#3366cc;">友情链接</span>
					<span style="color:#999;">Links</span>
				</li>
				<li class="right"></li>
			</ul>
			<ul class="links">
				<?php foreach ($data5 as $value):?>
				<li><a href="<?php echo $value["friend_link"]; ?>"><?php echo $value["friend_name"]; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
</div>
<?php require "include/footer.php" ?>
</div>
<script src="js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript">
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
jQuery(".picMarquee-left").slide({mainCell:".bd ul",autoPlay:true,effect:"leftMarquee",vis:3,interTime:50,trigger:"click"});
</script>
</body>
</html>