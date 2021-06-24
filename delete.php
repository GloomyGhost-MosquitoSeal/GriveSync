<!--
* This program is free software. It comes without any warranty, to
* the extent permitted by applicable law. You can redistribute it
* and/or modify it under the terms of the Do What The Fuck You Want
* To Public License, Version 2, as published by Sam Hocevar. See
* http://www.wtfpl.net/ for more details.
-->

<meta http-equiv="refresh" content="1;url=/index.php"> 
<?php
$file = $_GET['file'];
$filename = $_GET['filename'];

if (!unlink($file)){
  echo ("$file: 删除失败");
}else{
  echo ("$file: 删除完成，正在回到主页面");
}


