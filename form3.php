<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>フォーム3</title>
</head>
<body>
    <?php
        if(!empty($user = $_GET['username'])) {
            $user = htmlspecialchars($user, ENT_QUOTES|ENT_HTML5);
            print"こんにちは".$user."さん";
        } else {
            print"氏名が未入力です";
        }
    ?>
</body>
</html>