<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
</head>
<body>
<h1>Registration</h1>

<?php

    require 'dbinsert.php';

    $userName = $password = "";
    $userNameErr = $passwordErr = "";
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
            if (strlen($userName) >6) {
                $userNameErr = "Username cannot be more than 10 characters!";
                $flag = true;
            }
            if (strlen($password) > 8) {
                $passwordErr = "password cannot be more than 8 characters!";
                $flag = true;
            }
            if (!$flag) {
                $userName = test_input($userName);
                $password = test_input($password);

               
                $result1 = register($userName,$password);
                if ($result1) {
                    $successMessage = "Signup Successfully.";
                } else {
                    $errorMessage = "Error while signing up!";
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

 

<fieldset>
        <legend>Basic Information:</legend>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
<label for="firstname">First Name<span style="color: red">*</span>: </label>
<input type="text" name="firstname" id="firstname" value="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<span style="color: red"><?php echo $firstNameErr; ?></span>
<br><br>
<label for="lastname">Last Name<span style="color: red">*</span>: </label>
<input type="text" name="lastname" id="lastname" value="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<span style="color: red"><?php echo $lastNameErr; ?></span>
<br><br>



<label for="Gender">Gender<span style="color: red">*</span>:</label>
<span style="color: red"><?php echo $genderErr; ?></span>
<br>
<input type="radio" id="male"name="gender" value="male">
<label for="male">Male</label>
<br>
<input type="radio" id="female" name="gender" value="female">
<label for="male">female</label>
<br>
<input type="radio" id="other" name="gender" value="other"
<label for="other">other</label>
<br><br>



<label for="DOB">DOB<span style="color: red">*</span></label>
<input type="date" id="DOB" name="DOB">
<span style="color: blue"><?php echo $dobErr; ?></span>
<br><br>



<label for="Religion">Religion<span style="color: red">*</span></label>
        <select id="Religion" name="Religion">
            <option value="" selected></option>
            <option value="Muslim">Muslim</option>
            <option value="Hindu">Hindu</option>
            <option value="Buddist">Buddist</option>
            <option value="Christian">Christian</option>
            <option value="Others">Others</option>
        </select>
 <span style="color: blue"><?php echo $religionErr; ?></span>
<br><br>

</fieldset>

<fieldset>
<legend>Contact Information:</legend>
<label for="present address">present address<span style="color: red">*</span></label>
<span style="color: blue"><?php echo $presentAddressErr; ?></span>
        <textarea id="present address" name="present address" rows="15" cols="25"></textarea>
        <span style="color: blue"><?php echo $presentAddressErr; ?></span>
        <br><br>




<label for="permanent address">permanent address<span style="color: red">*</span></label>
<span style="color: blue"><?php echo $permanentAddressErr; ?></span>
        <textarea id="present address" name="present address" rows="15" cols="25"></textarea>
        
        <br><br>



        <label for="email">Email <span style="color: red">*</span></label>
<input type="email" id="email" name="email">
<span style="color: blue"><?php echo $emailErr; ?></span>

<br><br>

<label for="phone number">phone number <span style="color: red">*</span></label>
<input type="tel" id="tel" name="tel">
<span style="color: blue"><?php echo $phoneErr; ?></span>

<br><br>

<label for="Website link">Website link:</label><p><a href="https://www.facebook.com/acepect.rayhan/">facebook profile</a></p>

</fieldset>




<fieldset>
<legend>Account Information</legend>
<label for="name">Username<span style="color: red">*</span></label>
<input type="text" id="name" name="name" value="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<span style="color: blue"><?php echo $userNameErr; ?></span>
<br><br>



<label for="password">password<span style="color: red">*</span></label>
<input type="password" id="pwd" name="pwd" value="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<span style="color: blue"><?php echo $passwordErr; ?></span>

</fieldset>


<input type="submit" name="submit" value="Register">
</form>

 <br>

 <span style="color: green"><?php echo $successfulMessage; ?></span>
<span style="color: red"><?php echo $errorMessage; ?></span>

 
</body>
</html>