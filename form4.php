<!DOCTYPE html>
<html>
    <?php
    if (isset($_GET['username'])) $mode = 1;
    else $mode = 0;
    ?>
<head>
    <meta charset="UTF-8"/>
    <title><?php print $mode==0? "フォーム(4)の入力": "フォーム(4)の応答";?></title>
</head>
<body>
    <?php
    if($mode == 0) {
        print <<< EOF
        名前を入力してください。
        <form method="GET" action="form4.php">
        <input type="text" name="username" size="10" />
        <input type="submit" value="提出" />
        </form>
        EOF;
    } else {
        if(!empty($user = $_GET['username'])) {
            $user = htmlspecialchars($user, ENT_QUOTES|ENT_HTML5);
            print"こんにちは".$user."さん";
        } else {
            print"氏名が未入力です";
        }
    }
    ?>
</body>
</html>