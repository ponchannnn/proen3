<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>ファイル1</title>
</head>
<body>
    <?php
    $file=@fopen("read_text1.txt", 'r') or die("ファイルを開けません");
    while ($line=fgets($file, 10)) {
        print $line. "<br />";
    } 
    ?>
</body>
</html>