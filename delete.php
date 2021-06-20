<meta http-equiv="refresh" content="1;url=/index.php"> 
<?php
$file = $_GET['file'];
$filename = $_GET['filename'];

if (!unlink($file)){
  echo ("$file: 删除失败");
}else{
  echo ("$file: 删除完成，正在回到主页面");
}
