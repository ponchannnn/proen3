<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>フォーム1</title>
</head>
<body>
    <?php
        if(!empty($user = $_GET['username'])) {
            print"こんにちは".$user."さん";
        } else {
            print"氏名が未入力です";
        }
    ?>
</body>
</html>