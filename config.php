<?php 

$server = "localhost";
$user = "Hanoune";
$pass = "0701";
$database = "Gesco";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>
