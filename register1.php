<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>ユーザー登録</title>
</head>
<body>
    <?php
    $file = @fopen("register.txt", 'a+') or die("ファイルを開けません");
    
    if(! @empty($user = $_POST["user"])) {
        $flag = 0;
        while($line = fgets($file)) {
            $line = mb_ereg_replace(PHP_EOL, "", $line);
            if ($user == $line) {
                print "${user}は登録済みです。<br />";
                $flag = 1; break;
            }
        }
    if ($flag == 0) {
        fwrite($file, $user. PHP_EOL);
        print "${user}を登録しました。";
    }
    rewind($file);
    }
    print "登録ユーザー:";
    while($line = fgets($line, 10)) print "$line";
    ?>
    <form method="POST" action="register1.php">
    新規登録 <input type="text" name="user" size="20" />
    <input type="submit" value="登録" />
</form>
</body>
</html>