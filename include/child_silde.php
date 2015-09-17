<?php
/**
 * 除了首页的页面，右侧兰的HTML结构
 */
	// require "init/init.php";

// 通知
$noticedata=select_all("SELECT * FROM jl_notice ORDER BY notice_id DESC LIMIT 0,5");

// 友链
$friendata=select_all("SELECT * FROM jl_friend ORDER BY friend_id DESC LIMIT 0,20");
?>
<div class="contRight">
					<div class="topTit">
						<img src="images/about-contright-writeLogo.png">
						<span><a href="gbook.php">我要留言</a></span>
					</div>
					<ul class="rightBox">
						<h5 class="left" style="border-bottom:1px solid #ccc;">
							<span style="color:#3366cc;margin-left:10px;">最新公告</span>
							<span style="color:#999;">News</span>
						</h5>
						<?php foreach ($noticedata as $value):?>
						<li>
							<a href="javascript:void(0)" title=""><?php echo $value["notice_name"] ?></a><span><?php echo date("Y-m-d",$value["notice_time"]) ?></span>
						</li>
						<?php endforeach; ?>
					</ul>
					<ul class="rightBox">
						<h5 class="left" style="border-bottom:1px solid #ccc;">
							<span style="color:#3366cc;margin-left:10px;">友情链接</span>
							<span style="color:#999;">Links</span>
						</h5>
					<?php foreach ($friendata as $value):?>
							<li><a href="<?php echo $value["friend_link"]; ?>"><?php echo $value["friend_name"]; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>