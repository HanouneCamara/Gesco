<?php
include 'config.php';
$id = $_GET['id'];
$req = "DELETE FROM users WHERE id= $id";
$rs = $conn->query($req);
header("Location: listEmp.php");
?>