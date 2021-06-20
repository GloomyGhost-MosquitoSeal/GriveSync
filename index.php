<!--
* This program is free software. It comes without any warranty, to
* the extent permitted by applicable law. You can redistribute it
* and/or modify it under the terms of the Do What The Fuck You Want
* To Public License, Version 2, as published by Sam Hocevar. See
* http://www.wtfpl.net/ for more details.
-->

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>Grive Sync Server</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<div class="upload-file">
    <h3 id='h3_title'>Grive Sync Server</h3>
    <div>
        <div class="upload-title">
            <form id="input-upload" class="label_upload_file" action="upload.php" method="post" enctype="multipart/form-data">
                <label for="file">上传文件</label>
                <input type="file" onchange="this.form.submit()" name="file" id='file'/>
            </form>
        </div>
    </div>
    <table>
        <thead>
        <tr>
            <th id="upload_file_name" class="td-file-name upload_file_name">文件名称</th>
            <th id="upload_file_size" class="upload_file_size">大小</th>
            <th id="upload_file_status" class="upload_file_download">下载</th>
            <th id="upload_file_status" class="upload_file_delete">删除</th>
        </tr>
        </thead>
        <tbody>
        <?php
        function mkdirs($dir, $mode = 0777){
            if (is_dir($dir) || @mkdir($dir, $mode)) return TRUE;
            if (!mkdirs(dirname($dir), $mode)) return FALSE;
            return @mkdir($dir, $mode);
        }

        mkdirs('upload');
        $resource = opendir('upload');
        while ($rows = readdir($resource)) {
            if ($rows == "." || $rows == "..") {
                continue;
            }
            echo '<tr>';
            echo '<td class="td-file-name">' . $rows . '</td>';
            echo '<td>' . round(filesize('upload/' . $rows) / (1024 * 1024), 4) . 'MB</td>';
            echo '<td><a href="download.php?file=upload/' . $rows . '&filename=' . $rows . '">下载</a></td>';
            echo '<td><a href="delete.php?file=upload/' . $rows . '&filename=' . $rows . '">删除</a></td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>
</body>

</html>
