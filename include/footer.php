<?php
	/**
	 * 头部文件
	 */
  $optiondata=select_row("SELECT * FROM jl_option");
?>
	<div id="nav"></div>
		<div id="footer">
			<!-- <img src="images/footer-QQcommit.png"> -->
			<p>地址： <?php echo $optiondata["address"]?> 联系方式 <?php echo $optiondata["contact"]?> </p>		
			<p style="margin-top:0;"><?php echo $optiondata["copyright"]?></p>
		</div>