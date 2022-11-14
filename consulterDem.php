<?php
  session_start();
  if (!isset($_SESSION['id'])) {
    header("Location: login.php");
  }
include 'config.php';
$user_departement = $_SESSION['departement'];
if ($_SESSION['poste'] == 'admin'){
    $sql = "SELECT users.username, users.lastname,
        users.telephone, Conge.id, Conge.Datedebut,
        Conge.Datefin, Conge.raison FROM
        users, Conge WHERE users.id = Conge.id_user AND users.departement = '$user_departement'";
    $result = mysqli_query($conn, $sql);
}else if($_SESSION['poste'] == 'directeur'){
    $sql = "SELECT users.username, users.lastname,
        users.telephone, Conge.id, Conge.Datedebut,
        Conge.Datefin, Conge.raison FROM
        users, Conge WHERE users.id = Conge.id_user";
    $result = mysqli_query($conn, $sql);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title></title>
</head>
<body>
    <?php
        include 'header.php' ;
    ?>
    <header>
            <h1>La liste des démandes de congé : </h1>
    </header>    
    <table class="table">
        <thead>
            <th>id</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Téléphone</th>
            <th>Date de debut</th>
            <th>Date de fin</th>
            <th>Raison</th>
            <th colspan="3">Actions</th>
        </thead>
        <?php
            while($fetch = mysqli_fetch_assoc($result)){?>
            
                <tbody>
                    <td data-label="id"><?php echo($fetch['id']) ?></td>
                    <td data-label="Nom"><?php echo($fetch['username']) ?></td>
                    <td data-label="Prenom"><?php echo($fetch['lastname']) ?></td>
                    <td data-label="Tel"><?php echo($fetch['telephone']) ?> </td>
                    <td data-label="Date de debut"><?php echo($fetch['Datedebut']) ?></td>
                    <td data-label="Date de fin"><?php echo($fetch['Datefin']) ?> </td>
                    <td data-label="Raison"><?php echo($fetch['raison']) ?></td>
                    <td data-label="Action"><a href="accpterDemande.php?id=<?php echo $fetch['id'] ?>"><i class="fa-solid fa-check"></i></a></td>
                    <td data-label="Action"><a href="refuserDemande.php?id=<?php echo $fetch['id'] ?>"><i class="fa-solid fa-xmark"></i></a></td>
                    <td data-label="Action"><a href="commentaire.php?id=<?php echo $fetch['id'] ?>"><i class="fa-solid fa-comment"></i></a></td>
                </tbody>
        <?php } ?>
    </table>
    <script src="script.js"></script>
</body>
</html>