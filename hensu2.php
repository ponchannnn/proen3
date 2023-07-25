<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>変数と定数②</title>
</head>
<body>
<?php
$name="茨大バーガー";
$price=500;
const TAX=1.1
?>
おいしい<?=$name?>の税込価格は<?php printf("%.0f", $price*TAX);?>円です。
</body>
</html>