<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>メモ帳</title>
    <script type="text/javascript">
        const onInput = () => {
            const user = document.getElementbyId("username").value;
            const pass = document.getElementbyId("password").value;

            
        }
    </script>
</head>
<body>
    <h1 style="text-align: center;">メモ帳</h1>
    <select name="uesrname" id="username">
    <option value="" selected>--Please choose your name--</option>
    <?php
    $users = glob("memo/*");
    foreach($users as $user) {
        $subeduser=substr($user, 5);
        print "<option value=".$subeduser.">".$subeduser."</option>";
    }
    ?>
    </select>
    <br />
    <br />
    <input id="pass" type="password" maxlength="10" placeholder="password" required/>
    <input type="submit" />
    
</body>
</html>