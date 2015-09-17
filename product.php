<?php
	require "include/init/init.php";

// 页数
$datacount=countNum("jl_products");
$total_record=count($datacount);
// 每页记录数
$per_record=12;
// 总页数（总记录数/每页记录数）
$page_num=ceil($total_record/$per_record);
// 当前页数
  $cur_id=isset($_GET["page"])?(int)$_GET["page"]:1;
  $offset=($cur_id-1)*$per_record;
//  查询数据
 $productData=select_all("SELECT * FROM jl_products ORDER BY products_id DESC LIMIT {$offset},{$per_record}");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>金陵贸易有限公司-产品展示</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/product.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
</head>
<body>
	<div id="container">
		<?php require "include/header.php" ?>
		<div id="main">
			<img src="images/index-main-bigImg.png" style="margin:1px 0 0 46px;    margin-top: -9px;" />
			<div class="content">
				<div class="contLeft">
					<ul style="margin:11px 0 0 13px;">
						<li class="left">
							<span style="color:#3366cc;">产品展示</span>
							<span style="color:#999;">Products</span>
						</li>
						<li class="right"></li>
					</ul>
					<div class="clear"></div>
					<div class="productLis">
						<ul class="product">
							<?php foreach ($productData as $value):?>
							<li>
									<img src="./admin/uploads/<?php echo $value["products_img"] ?>" alt="" width='148' height='109' >
								<p><?php echo $value["products_name"] ?></p>
							</li>
						<?php endforeach ?>
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
</body>
</html>