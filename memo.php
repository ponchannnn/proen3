<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>メモ帳</title>
    <script type="text/javascript">
        function isPasswordMatched () {
            const user = document.getElementById("username").value;
            const pass = document.getElementById("pass").value;

            <?php
            if ($_GET["username"] !== null) {
                global $UN; // make global username for slot
                $UN=$_GET["username"];
                $password = fgets(fopen("memo/$UN/p.p", "r"), 10);
                print"console.log($password);";
            }
            $a="\"a\"";
            print"console.log(".$a.")";
            ?>
            
            
        };
        function renewSite () {
            location = `memo.php?username=${document.getElementById("username").value}`;
        }
        //isPasswordMatched();
    </script>
</head>
<body>
    <h1 style="text-align: center;">メモ帳</h1>
    <form method="GET">
    <select name="username" id="username" onchange="renewSite()">
    <option value="">--Please choose your name--</option>
    <?php
    $users = glob("memo/*"); // get name from file
    foreach($users as $user) {
        $subeduser=substr($user, 5); // cut memo/
        print "<option value=".$subeduser." ";
        if ($UN == $subeduser) print "selected"; // if get username, fix slot
        print ">".$subeduser."</option>"; 
    }
    ?>
    </select>
    </form>
    <br />
    <br />
    <input id="pass" type="password" maxlength="10" placeholder="password" required />
    <input type="submit"/>
    <br id="answer"></br>
    
</body>
</html>