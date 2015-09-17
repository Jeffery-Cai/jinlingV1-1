<?php
	/**
	 * 头部文件
	 */
	$data=select_all("SELECT * FROM jl_nav ORDER BY nav_id ASC");
?>
<div id="header">
			<img src="images/index-campany-logo.png" style="margin:14px 0 0 66px;" />
			<ul class="top">
				<li><a href="./admin"> > 超级管理员登陆</a></li>
				<li style="background:url(images/homeLogo.png) no-repeat scroll 6px 3px;"><a href="">设为首页</a></li>
				<li style="background:url(images/bookLogo.png) no-repeat scroll 6px 5px;"><a href="">收藏本站</a></li>
			</ul>
			<div class="clear"></div>
			<div class="navigator">
				<img src="images/index-navigator-left.png">
				<ul>
					<?php foreach ($data as $value):?>
					<li><a href="<?php echo $value["nav_link"] ?>"><?php echo $value["nav_name"] ?></a></li>
				<?php endforeach; ?>
					<span class="lastLi"></span>
				</ul>
				<img src="images/index-navigator-right.png">
			</div>
		</div>