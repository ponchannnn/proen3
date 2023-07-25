<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>配列①</title>
</head>
<body>
<?php
$cities=["Mito", "Hitachi", "Tsukuba"];

for($i=0; $i<count($cities); $i++) { // print all
    print $i . ")" . $cities[$i] . "<br />";
}
print"削除: " . array_shift($cities) . "<br />"; // remove first stuff
rsort($cities); // reverse sort list
print"連結: " . implode($cities); // implode "n" print
?>
</body>
</html>