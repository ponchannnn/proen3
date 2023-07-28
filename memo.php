<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>メモ帳</title>
    <?php
            if (isset($_GET["username"])) {
                global $FLAG; // make global for is password correct
                global $UN; // make global username for slot
                $UN = $_GET["username"];
                $pass = $_POST["pass"];
                $f = fopen("memo/$UN/p.p", "r");
                $password = fgets($f, 10);
                fclose($f);
                if ($password == $pass) $FLAG = TRUE;
                else $FLAG = FALSE;
            } else {
                header("HTTP/1.1 404 Not Found");
                include ('404.php');
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
    if (!$FLAG) {
        print <<< EOT
        <select name="username" id="username" onchange="renewSite()">
        <option value="">--Please choose your name--</option>
        EOT;
        $users = glob("memo/*"); // get name from file
        foreach($users as $user) {
            $subeduser = substr($user, 5); // cut memo/
            print "<option ";
            if ($UN == $subeduser) print "selected"; // if get username, fix slot
            print ">".$subeduser."</option>"; 
        }
        print <<< EOT
        </select>
        <br />
        <br />
        <form method="POST" action="{$_SERVER['REQUEST_URI']}">
            <input id="pass" name="pass" type="password" maxlength="10" placeholder="password" required />
            <input type="submit"/>
        </form>
        <br id="answer"></br>
        EOT;
    }  else {
        // read old memo
        $f = fopen("memo/$UN/text", "r+");
        $text = "";
        while (($l = fgets($f))) $text .= $l;
        fclose($f);

        print <<< EOT
        <h2 style="text-align: left;">ログイン中</h2>
        <input type="submit" value="ログアウト" onclick='location = "memo.php"' />
        <form method="POST" action="{$_SERVER['REQUEST_URI']}">
        <textarea class="tarea" name="newText">$text</textarea>
        <input type="submit" value="保存"/>
        </form>
        EOT;
    }
    
    ?>
    
</body>
</html>