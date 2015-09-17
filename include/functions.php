<?php
/**
 * 右边的var_dump
 */
function dump($du)
{
	echo var_dump($du);
}
/**
 * 成功弹出库
 * $content: string类型, 弹出消息框
 * $url: 路径
 */
function success($content,$url)
{
  echo '<script type="text/javascript">alert("'.$content.'");location.href="'.$url.'"</script>';
}
/**
 * 失败弹出库
 */
function error($content)
{
  die('<script type="text/javascript">alert("'.$content.'");history.back();</script>');
}



/**
 * 连接数据库
 * @param $dbname 数据库名称
 * @param string $user 数据库用户名
 * @param string $pwd 数据库密码
 * @param string $hostname 数据库主机名
 * @param string $encoding 设置php和mysql的通信编码
 * @author Shann <1829823496@qq.com>
 * @example
 * ---------------------------------------------------------
 * connect('dianzi', 'root', '123456', 'localhost', 'utf8');
 * ---------------------------------------------------------
 */
function connect($dbname, $user="root", $pwd='', $hostname='localhost', $encoding='utf8'){
  mysql_connect($hostname, $user, $pwd) or die('连接数据库失败');
  mysql_query("set names {$encoding}");
  mysql_select_db($dbname) or die('选择数据库失败');
}

/**
 * 获取所有表记录
 * @param $sql 要处理的SQL查询语句
 * @return array 以二维关联数组形式返回所有表记录
 * @author Shann <1829823496@qq.com>
 * @example
 * ---------------------------------------------------------
 * $sql = 'SELECT * FROM article';
 * $articles = select_all($sql);
 * ---------------------------------------------------------
 */
function select_all($sql){
  $result = mysql_query( $sql );
  $data = array();
  if( mysql_num_rows( $result ) > 0 ){
    while( $row = mysql_fetch_assoc( $result ) ){
      $data[] = $row;
    }
  }
  return $data;
}
/**
 * 获取一条表记录
 * @param $sql 要处理的SQL查询语句
 * @return array 以一维关联数组形式返回一条表记录
 * @author Shann <1829823496@qq.com>
 * @example
 * ---------------------------------------------------------
 * $sql = 'SELECT * FROM article WHERE id=1';
 * $detail = select_row($sql);
 * ---------------------------------------------------------
 */
function select_row($sql){
    $result = mysql_query( $sql );
    $data = array();
    if( mysql_num_rows( $result ) == 1 ){
        $data = mysql_fetch_assoc( $result );
    }
    return $data;
}




/**
 * 数据库编辑单条功能函数
 * $table: 数据库表名
 * $table_id: 数据库ID(主键);
 */
function editTable($sqlContent)
{ 
 $res=mysql_query("{$sqlContent}");
 $id_data=array();
 if(mysql_num_rows($res)>0)
 {  
   $id_data=mysql_fetch_assoc($res);
 }
 return $id_data;
}



/**
 * 插入表记录
 * @param $sql 要处理的SQL插入语句
 * @return bool|int 成功返回新增记录ID，失败返回false
 * @author Shann <1829823496@qq.com>
 * @example
 * ----------------------------------------------------------------------------
 * $sql = 'INSERT INTO article(title, content) VALUES('文章标题', '文章内容');
 * $id = insert($sql);
 * ----------------------------------------------------------------------------
 */
function insert($sql){
  mysql_query( $sql );
  if( $id = mysql_insert_id() ){
    return $id;
  }else{
    return false;
  }
}

/**
 * 总记录数函数
 */
function countNum($tablename)
{
	$datacount=select_all("SELECT * FROM {$tablename}");
	return $datacount;
}

/**
 * 数据库修改功能函数
 * $sqlContent: sql语句
 * $url: 链接路径;
 */
function updateTable($sqlContent,$url)
{
  // 修改sql语句
      $sql="{$sqlContent}";
      mysql_query($sql);
      if(mysql_affected_rows()>0)
      {
        success("更新成功",$url);
      }else{
        error("更新失败");
      }
}





/**
 * 数据库多个删除函数
 * $delname: 表单删除的名称(id)
 * $table: 数据库表名
 * $table_id: 数据库表名ID(主键)
 */
function delMore($delname,$table,$table_id,$url)
{
 $delid=implode(",",$_POST[$delname]);
 $sql="DELETE FROM {$table} WHERE {$table_id} IN({$delid})";
 mysql_query($sql);
        // 判断是否影响了记录
 if(mysql_affected_rows()>0)
 {
  success("删除成功",$url);
}else{
  error("删除失败");
}
}



/**
 * bootstrap分页函数（有1,2,3,4,5页数功能）
 * $page_num: 总页数
 */

function pagetion($page_num)
{
   // 当前页数
  $cur_id=isset($_GET["page"])?(int)$_GET["page"]:1;

  // 上一页
  $next_id=$cur_id-1;

  // 下一页
  $pre_id=$cur_id+1;

  $html="";

// 上一页、点击的时候，返回当前页数-1、当到了最前的页数，不让按钮点击
  if($cur_id==1)
  {
   $html.='<li class="disabled"><a>«</a></li>';
 }else{
   $html.='<li><a href="?page='.$next_id.'">«</a></li>';
 }
  // ...12[3]45...
  // $cur_id-2 <= $i <= $cur_id+2
  // 前...

 if($cur_id>3)
 {
   $html.="...";
 }

 for($i=1;$i<=$page_num;$i++)
 {
   if(($cur_id-2) <= $i && $i <= ($cur_id+2))
   { 
      // 判断是否是当前页，是的话，不让它可以点击
    if($cur_id==$i)
    {
     $html.='<li class="disabled"><a>'.$i.'</a></li>';

   }else{
    $html.='<li><a href="?page='.$i.'">'.$i.'</a></li>';
  }
}
}
if($cur_id<($page_num-2))
{
  $html.="...";
}

// 下一页、点击的时候，返回当前页面+1、当到了最后一页的时候，不让Next按钮可以点击
if($cur_id>$page_num-2)
{
 $html.='<li class="disabled"><a href="#" aria-label="Previous">»</a></li>';
}else{
 $html.='<li><a href="?page='.$pre_id.'">»</a></li>';
}
return $html;
}


/**
 * 上传函数
 */

  function upload_file($input_name, $uploaded_dir='./uploads/'){
    // 接收上传过来的文件数据
    $file = $_FILES[$input_name];  

    // 根据错误信息反馈用户
    $error = $file['error'];
    switch($error){
        case UPLOAD_ERR_INI_SIZE:
            //die('<script>alert("");location.href="'.$_SERVER['PHP_SELF'].'"</script>');
            error("请上传小于1MB的文件");
            break;
        case UPLOAD_ERR_FORM_SIZE:
            break;
        case UPLOAD_ERR_PARTIAL:
            //die('<script>alert("你的网络有问题");location.href="'.$_SERVER['PHP_SELF'].'"</script>');
          error("你的网络有问题");
            break;
        case UPLOAD_ERR_NO_FILE:
            //die('<script>alert("请选择上传的文件");location.href="'.$_SERVER['PHP_SELF'].'"</script>');
             error("请选择上传的文件");
            break;
    }

    // 限制文件类型（MIME）
    $type = $file['type'];
    if( !in_array($type, array('image/jpeg', 'image/jpg', 'image/png', 'image/gif'))){
       // die('<script>alert("请上传jpg、png、gif格式的图片");location.href="'.$_SERVER['PHP_SELF'].'"</script>');
        error("请上传jpg、png、gif格式的图片");
    }

    // 限制文件大小
    $size = $file['size'];
    if( $size > 1*1024*1024 ){
        //die('<script>alert("请上传小于1MB的文件");location.href="'.$_SERVER['PHP_SELF'].'"</script>');
        error("请上传小于1MB的文件");
    }
        
    // 生成文件名
    // $filename = date('YmdHis') . rand(1000,9999);

    // 检查上传目录是否存在
    if( !file_exists( $uploaded_dir ) ){
        mkdir( $uploaded_dir );
    }

    // 获取原文件的文件类型
    $suffix = '';
    switch($file['type']){
        case 'image/jpeg':
        case 'image/jpg':
            $suffix = 'jpg';
            break;
        case 'image/png':
            $suffix = 'png';
            break;
        case 'image/gif':
            $suffix = 'gif';
            break;
    }

    // 保存文件
    $result = move_uploaded_file($file['tmp_name'], "{$uploaded_dir}{$_FILES[$input_name]['name']}");  

    if( $result ){
        //die('<script>alert("文件上传成功");location.href="'.$_SERVER['PHP_SELF'].'"</script>');
    }else{
        error("文件上传失败");
       // die('<script>alert("文件上传失败");location.href="'.$_SERVER['PHP_SELF'].'"</script>');
    }
}
?>
