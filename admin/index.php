<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: #add8e6;
        }
        /* Container */
        .container {
            width: 40%;
            margin: 0 auto;
        }

        /* Login */
        #div_login {
            border: 5px solid #555;
            border-radius: 3px;
            width: 400px;
            height: 270px;
            box-shadow: 0px 2px 2px 0px gray;
            margin: auto;
    display: block;
            background-color:#fdd5b1;
        }

        #div_login h1 {
            margin-top: 0px;
            font-weight: normal;
            padding: 10px;
            background-color: #93ccea;
            color: black;
            font-family: sans-serif;
        }

        #div_login div {
            clear: both;
            margin-top: 10px;
            padding: 5px;
        }

        #div_login .textbox {
            width: 96%;
            padding: 7px;
        }

        #div_login input[type=submit] {
            padding: 7px;
            width: 100px;
            background-color: lightseagreen;
            border: 0px;
            color: white;
        }
        .login-pho{
            margin: auto;
    display: block;
    width:400px;
    height:200px;
    border: 5px solid #555;
    box-shadow: 0px 2px 2px 0px gray;
        }
        label{
            font-weight:bold;
            font-size:18px;
        }
    </style>
</head>

<body>
    <br>
    <br>
    <br><br>
    <img src="logo.jfif" alt="logo" class="login-pho"/>
    <br><br><br>
    <div class="container">
        <form method="post" action="">
            <div id="div_login">
                <h1>Login</h1>
                <div>
                    <label>Username:</label>
                    <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" />
                </div>
                <div>
                <label>Password:</label>
                    <input type="password" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Password" />
                </div>
                <div>
                    <input type="submit" value="Submit" name="but_submit" id="but_submit" />
                </div>
            </div>
        </form>
    </div>
</body>

</html>

<?php
include "config.php";

if (isset($_POST['but_submit'])) {

    $uname = mysqli_real_escape_string($con, $_POST['txt_uname']);
    $password = mysqli_real_escape_string($con, $_POST['txt_pwd']);

    if ($uname != "" && $password != "") {

        $sql_query = "select count(*) as cntUser from users where username='" . $uname . "' and password='" . $password . "'";
        $result = mysqli_query($con, $sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if ($count > 0) {
            $_SESSION['uname'] = $uname;
            header('Location: admin.php');
        } else {
            echo "Invalid username and password";
        }
    }
}
?>