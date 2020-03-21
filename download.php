<?php
$file = $_GET['file'];
$filename = $_GET['filename'];
header("Content-Type: application/force-download");
header("Content-Disposition: attachment; filename=".($filename));

echo $file;
echo $filename;
readfile($file);

header('location:/');
