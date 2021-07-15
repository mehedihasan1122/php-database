<?php
require 'dbconnect.php';

function register($userName,$password)
{
    $conn = connect();
    $sql = $conn->prepare("INSERT INTO USERS (usernaame,password) VALUES (?, ?)");
    $sql->bind_param("sss", $userName, $password);
    return $sql->execute();
}
?>