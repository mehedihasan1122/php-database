<?php
function connect(){
$conn = new mysqli("localhost", "mehedi", "345354", "wtm");

if ($conn->connect_errno) {
    die("Database connection failed" . $conn->connect_err);
}
return $conn;
}
?>