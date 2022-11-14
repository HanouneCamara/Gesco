<?php 

session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="accueil.css" type="text/css">
    <title>profile</title>
</head>
<body>
    <div class="Menu">
        <div class="icon">
            <h2>Voici vos informations: </h2>
            <ul>
                <li>votre id : <?= $_SESSION['id'] ?></li>
                <li>votre nom : <?= $_SESSION['username'] ?></li>
                <li>votre prénom : <?= $_SESSION['lastname'] ?></li>
                <li>votre Adresse mail : <?= $_SESSION['email'] ?></li>
                <li>votre adresse : <?= $_SESSION['adresse'] ?></li>
                <li>date de naissance : <?= $_SESSION['dateNaiss'] ?></li>
                <li>lieu de naissance : <?= $_SESSION['lieuNaiss'] ?></li>
                <li>Poste : <?= $_SESSION['poste'] ?></li>
                <li>Département : <? $_SESSION['departement'] ?></li>
                <li>Sexe : <?= $_SESSION['sexe'] ?></li>
            </ul>
        </div>	
        
    </div>
</body>
</html>	