<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>
<body>
<h1>Login</h1>

 <?php

    require 'dbread.php';

    $useName = $password =  "";
    $userNameErr = $passwordErr =  "";
    $successMessage = $errorMessage = "";
    $flag = false;
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $userName = $_POST['userName'];
        $password = $_POST['password'];


        if (empty($userName)) {
            $userNameErr = "User name cannot be empty!";
            $flag = true;
        }
        if (empty($password)) {
            $passwordErr = "password cannot be empty!";
            $flag = true;
        }

        if (!$flag) {
            if (strlen($userName) > 6) {
                $userNameErr = " username must be within 6 character";
                $flag = true;
            }
            if (strlen($password) > 8) {
                $passwordErr = "password must be minimum 8 character";
                $flag = true;
            }
            if (!$flag) {
                $userName = test_input($userName);
                $password = test_input($password);

                
                $result1 = login($userName, $password);
                if ($result1) {
                    session_start();
                    $_SESSION['username'] = $userName;
                   
                } else {
                    $errorMessage = "Login failed!";
                }
            }
        }
    }

   

    function test_input($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
        method="POST">
        <label for="userName">Username:</label>
        <input type="text" id="userName" name="userName" >
        <span style = "color : red;"><?php echo $userNameErr;?></span> <br> <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" >

        <span style = "color : red;"><?php echo $passwordErr;?></span> <br> <br>

        <input class="register_button" type="submit" value="LOGIN">
        </form>
        <span style = "color : green"><?php echo $successMessage; ?> </span> 
        <span style = "color : red"><?php echo $messageErr; ?> </span>


</body>
</html>