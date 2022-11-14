<?php 

session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
}
include 'config.php';
$user_id = $_SESSION['id'];
if (isset($_POST['validate'])) {
    $presence = $_POST['presence'];
    
    $sql = "UPDATE users SET presence = '$presence' WHERE id =  $user_id";
    $result = mysqli_query($conn, $sql);
    if ($result){

    }else{
        echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="accueil.css" type="text/css">
    <title>Accueil</title>
</head>
<body>
    <header>
        <nav>
            <div id="logo">
                <h1>GESCO</h1>
            </div>
            <ul class="nav-links">
                <li><a href="demandeConge.php">Demander Congé</a></li>
                <li><a href="Mesdemande.php">Mes demandes</a></li>
                <li><a href="logout.php">Deconnecter</a></li>
            </ul>
            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>
    </header>
  
    <div class="container">
        <div class="profile">
            <img src="user.png" alt=""/>
            <ul>
                <li><span>Identifiant : </span> <?= $_SESSION['id'] ?></li>
                <li><span>Nom : </span><?= $_SESSION['username'] ?></li>
                <li><span>Prénom : </span><?= $_SESSION['lastname'] ?></li>
                <li><span>Adresse mail : </span><?= $_SESSION['email'] ?></li>
                <li><span>Date de naissance : </span><?= $_SESSION['dateNaiss'] ?></li>
                <li><span>Lieu de naissance : </span><?= $_SESSION['lieuNaiss'] ?></li>
                <li><span>Poste : </span><?= $_SESSION['poste'] ?></li>
                <li><span>Département : </span><?= $_SESSION['departement'] ?></li>
                <li><span>Sexe : </span><?= $_SESSION['sexe'] ?></li>
                <li><span>Adresse : </span><?= $_SESSION['adresse'] ?></li>
            </ul>
            <footer>
                <p><a href="Updateprofile.php">Modifier</a></p>
            </footer>
                
        </div>
    </div>
    <form method="POST" class="presence">
        <h1>Présence</h1>
        <select name="presence" required>
            <option value=""></option>
			<option value="1">Présent</option>
			<option value="0">Absent</option>
		</select>
        <button type="submit" name="validate">Confirmer</button>
    </form>

    <script src="app.js"></script>

</body>
</html>
