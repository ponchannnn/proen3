<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>メモ帳</title>
    <script type="text/javascript">
        function passSub () {
            const user = document.getElementById("username").value;
            const pass = document.getElementById("pass").value;

            <?php
            if ($user !== null) {
                $password = fgets(fopen("memo/user1/p.p", "r"), 10);
                print"console.log($password);";
            }
            ?>
            
            
        };
    </script>
</head>
<body>
    <h1 style="text-align: center;">メモ帳</h1>
    <select name="uesrname" id="username">
    <option value="" selected>--Please choose your name--</option>
    <?php
    $users = glob("memo/*"); // get name from file
    foreach($users as $user) {
        $subeduser=substr($user, 5); // cut memo/
        print "<option value=".$subeduser.">".$subeduser."</option>";
    }
    ?>
    </select>
    <br />
    <br />
    <input id="pass" type="password" maxlength="10" placeholder="password" required />
    <input type="submit" onclick="passSub()"/>
    <br id="answer"></br>
    
</body>
</html>