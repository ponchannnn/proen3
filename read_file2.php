<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>ファイル2</title>
    <style>
        td {border: 1px solid blue;}
    </style>
</head>
<body>
    <?php
    $file=@fopen("read_file2.txt", 'r') or die("ファイルを開けません");
    print "<table>";
    while ($line=fgetcsv($file, 100)) {
        print "<tr>";
        foreach ($line as $value) {
            print"<td>". $value. "</td>";
        }
        print "</tr>";
    }
    print "</table>";
    ?>
</body>
</html>