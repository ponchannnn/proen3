<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>変数と定数①</title>
</head>
<body>
<?php
$name="茨大バーガー";
$price=500;
const TAX=1.1;
printf("おいしい%sの税込価格は%.0f円です", $name, $price*TAX);
?>
</body>
</html>