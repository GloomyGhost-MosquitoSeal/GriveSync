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
            <form id="input-upload" class="label_upload_file" action="upload.php" method="post"
                  enctype="multipart/form-data">
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
            <th id="upload_file_status" class="upload_file_status">下载</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $resource = opendir('upload');
        while ($rows = readdir($resource)) {
            if ($rows == "." || $rows == "..") {
                continue;
            }
            echo '<tr>';
            echo '<td class="td-file-name">' . $rows . '</td>';
            echo '<td>' . round(filesize('upload/' . $rows) / (1024 * 1024), 4) . 'MB</td>';
            echo '<td><a href="download.php?file=upload/' . $rows . '&filename=' . $rows . '">下载</a></td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>
</body>

</html>
