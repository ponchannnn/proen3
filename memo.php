<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8"/>
    <title>メモ帳<?php global $FLAG; $FLAG == 1? "-{$_GET['username']}" : "" ?></title>
    <?php
        global $FLAG; // make global for is password correct
        global $UN; // make global username for slot

        $FLAG == 0;

        if (isset($_GET["username"])) {
            $UN = $_GET["username"];
            $pass = $_POST["pass"];
            $f = fopen("memo/$UN/p.p", "r");
            $password = fgets($f, 10);
            fclose($f);
            if ($password == $pass) $FLAG = 1;
            else $FLAG = 0;
        } else {
            header("HTTP/1.1 404 Not Found");
            include ('404.php');
        }

        if (isset($_GET["signup"])) $FLAG = 2;
    ?>
    <?php
        if (!empty($_POST["newText"])) {
            $f = fopen("memo/{$_GET["username"]}/text", "w");
            fwrite($f, $_POST["newText"]) or die("Cant write the content.");
            fclose($f);
        }
    ?>
    <?php
    if (isset($_POST["newusername"]) && isset($_POST["newpass"])) {
        // array of username
        $users = glob("memo/*"); // get name from file
        $userArray = [];
        foreach($users as $user) $userArray.array_push(substr($user, 5)); // add exist username to array
        if ($userArray.array_search($_POST["newusername"])) {
            print "console.log('Exist this name')";
        } else {
            mkdir("memo/{$_POST['newsuername']}");
            $f = fopen("memo/{$_POST["newusername"]}/p.p", "w");
            fwrite($f, $_POST["newpass"]) or die("Cant create your account.");
            fclose($f);
        }
    }
    ?>
    <script type="text/javascript">
        // if choose username, renew site with GET
        function renewSite () {
            const username = document.getElementById("username").value;
            if (username !== "") location = `memo.php?username=${username}`;
            else location = `memo.php`;
        }
    </script>
    <style>
        .tarea{
            display: inline-block;
            width: 100%;
            padding: 10px;
            border: 1px solid #999;
            box-sizing: border-box;
            background: #f2f2f2;
            margin: 0.5em 0;
            line-height: 1.5;
            height: 6em;
        }
</style>
</head>
<body>
    <h1 style="text-align: center;">メモ帳</h1>
    <?php
    global $FLAG;
    if ($FLAG == 0) {
        print <<< EOT
        <form method="GET">
        <input name="signup" type="submit" value="サインアップ"/>
        </form>
        <h2 style="text-align: left;">ログイン</h2>
        <select name="username" id="username" onchange="renewSite()">
        <option value="">--Please choose your name--</option>\n
        EOT;
        $users = glob("memo/*"); // get name from file
        foreach($users as $user) {
            $subeduser = substr($user, 5); // cut memo/
            print "<option ";
            if ($UN == $subeduser) print "selected"; // if get username, fix slot
            print ">".$subeduser."</option>\n"; 
        }
        print <<< EOT
        </select>
        <form method="POST" action="{$_SERVER['REQUEST_URI']}">
            <input id="pass" name="pass" type="password" maxlength="10" placeholder="password" required />
            <input type="submit"/>
        </form>
        EOT;
    }  else if ($FLAG == 1) {
        // read old memo
        $f = fopen("memo/$UN/text", "r");
        $text = "";
        while (($l = fgets($f))) $text .= $l;
        fclose($f);

        print <<< EOT
        <h2 style="text-align: left;">ログイン中</h2>
        <input type="submit" value="ログアウト" onclick='location = "memo.php"'/>
        <form method="POST" action="{$_SERVER['REQUEST_URI']}">
        <textarea class="tarea" name="newText">$text</textarea>
        <input type="submit" value="保存"/>
        </form>
        EOT;
    } else if ($FLAG == 2) {
        // sign up
        print <<< EOT
        <input name="login" type="submit" value="ログイン" onclick='location = "memo.php"'/>
        <h2 style="text-align: left;">サインアップ</h2>
        <form method="POST" action="memo.php">
        <input type="text" placeholder="username" name="newusername">
        <br/>
        <input name="newpass" type="password" maxlength="10" placeholder="password" required/>
        <input type="submit" value="保存"/>
        </form>
        EOT;
    }
    
    ?>
    
</body>
</html>