<?php
	/**
	 * 后台管理js相同文件
	 */
?>
  <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript">
    // 当前激活路径
      var a1 = document.URL;
      var a2 = $("ul.nav a");
      for (var i = 0; i < a2.length; i++) {
      if (a1.indexOf($(a2[i]).attr("href")) != -1) {
        $(a2[i]).parent().addClass("active");
        }
      }
      $(a2[0]).parent().addClass("active");

      
  /* 全选功能 */
  $("#check_all").click(function()
  {
    var checked=$(this).prop("checked");
    if(checked==true)
    {
      $('[name="del[]"]').prop("checked",true);
    }else if(checked==false){
      $('[name="del[]"]').prop("checked",false);
    } 
  })
    </script>