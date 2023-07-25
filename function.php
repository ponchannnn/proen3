<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>関数/title>
</head>
<body>
<?php
function  func($str) {
    global $kou;
    return $str .= $kou;
}

$kou = "工学部";
print func("茨城大学");
?>
</body>
</html>