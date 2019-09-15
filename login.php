<?php
    include("config/config.php");
    $db=mysqli_connect($servername, $username, $password, $db_name);
    session_start();

    if(isset($_SESSION['login_user'])){
        header("location: index.php");
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $myusername = mysqli_real_escape_string($db,$_POST['username']);
        $mypassword = mysqli_real_escape_string($db,$_POST['password']);

        $sql = "SELECT id from admin where username='$myusername' and password='$mypassword'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['active'];

        $count = mysqli_num_rows($result);

        if($count == 1) {
            $_SESSION['login_user'] = $myusername;

            $sql = ("TRUNCATE TABLE active_user;");
            $db->query($sql);

            $korisnik = $myusername;
            $sql = "INSERT INTO active_user(username) VALUES ('{$korisnik}')";

            if ($db->query($sql) === TRUE) {
                header("location:login.php");
                } 
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }
        }else {
            $error = "Your Login Name or Password is invalid";
        }
    }
?>

<html>
    <head>
        <title>Login Page</title>

        <style type = "text/css">
            body {
                font-family:Arial, Helvetica, sans-serif;
                font-size:14px;
            }
            label {
                font-weight:bold;
                width:100px;
                font-size:14px;
            }
            .box {
                border:#666666 solid 1px;
            }
        </style>

    </head>

    <body bgcolor = "#FFFFFF">

        <div align = "center">
            <div style = "width:300px; border: solid 1px #333333; " align = "left">
                <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>

                <div style = "margin:30px">

                    <form action = "" method = "post">
                        <label>Username  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                        <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                        <center><input style="width:150px" type = "submit" value = " Login "/><br /></center>
                    </form>
                    <form action="create_account.php" method = "get">
                        <center><input style="width:150px" type = "submit" value = " Create account "/><br /></center>
                    </form>

                    <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

                </div>
            </div>
        </div>
    </body>
</html>
