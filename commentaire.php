<?php
include 'config.php';

$idConge = $_GET['id'];
if(isset($_POST['envoi'])){
    $commentaire = $_POST['commentaire'];
    $sql = "UPDATE Conge SET commentaire = '$commentaire' WHERE id = $idConge";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('Location: consulterDem.php');
        
    }else{
        echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="commentaire.css">
    <title></title>
</head>
<body>
    <form method="POST">
        <h1>commentaire :</h1>
       
        <div class="separation"></div>
        <div class="corps-formulaire">
            <div class="gauche">
                <div class="groupe">
                    <textarea name="commentaire" cols="30" rows="10" placeholder="La raison du refus"></textarea>
                </div>
            </div>
        </div>     
            <div class="pied-formulaire" align="center">
                <a href="consulterDem.php">←</a>
                <input type="submit" name="envoi" value="Envoi">
            </div>
    </form>
</body>
</html>