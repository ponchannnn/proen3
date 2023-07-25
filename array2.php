<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>配列②</title>
</head>
<body>
<?php
$cities=["Mito"=>"水戸", "Hitachi"=>"日立", "Tsukuba"=>"つくば"];

ksort($cities); // sort with keys upper to down
foreach ( array_keys($cities) as $city) {
    print $cities[$city] . "<br />";
}
?>
</body>
</html>