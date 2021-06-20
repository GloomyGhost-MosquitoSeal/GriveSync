<meta http-equiv="refresh" content="1;url=/index.php"> 

<?php
if ($_FILES["file"]["error"] > 0) {
    echo "Error: " . $_FILES["file"]["error"] . "<br />";
} else {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / (1024 * 1024)) . " Mb<br />";
    echo "Stored in: " . $_FILES["file"]["tmp_name"] . "<br />";
    // 判断当期目录下的 upload 目录是否存在该文件
    if (file_exists("upload/" . $_FILES["file"]["name"])) {
        echo $_FILES["file"]["name"] . " 文件上传失败。 ";
    } else {
        move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
        echo "文件存储在: " . "upload/" . $_FILES["file"]["name"];
    }
    echo "<p>上传完成，正在回到主页面</p>";
}
