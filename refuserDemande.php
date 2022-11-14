<?php
include 'config.php';
$idConge = $_GET['id'];
$sql = "UPDATE Conge SET decisionAdmin = 'Refusé' WHERE id = $idConge";
$result = mysqli_query($conn, $sql);
if ($result) {
    header('Location: consulterDem.php');
    
}else{
    echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
}
?>