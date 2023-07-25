<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>等比数列</title>
</head>
<body>
    <?php
    $file = fopen('num_seq.txt', 'a+') or die('ファイルを開けません');
    $val = 1;
    while($line = fgets($line, 10)) {
        print $line. "<br />";
        $val = (int)$line;
    }
    $val *= 2;
    fwrite($file, $val. PHP_EOL);
    print $val. "br /";
    ?>
</body>
</html>