<?php
    include 'config.php';
    session_start();
    $user_id = $_SESSION['id'];
 
    $sql = "SELECT * FROM Conge WHERE id_user = $user_id";
    $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Mesdemande.css">
    <title></title>
</head>
<body>
    <header>
        <h1>Mes démandes :</h1>
    </header>
    <table border="1" width="80%" class="tableau-style">
        <thead>
            <th>date de debut</th>
            <th>date de fin</th>
            <th>Raison</th>
            <th>Décision de l'administrateur</th>
            <th>Commentaire</th>
        </thead>
        <?php
            while($fetch = mysqli_fetch_assoc($result)){?>
            
                <tbody>
                    <td><?php echo($fetch['Datedebut']) ?> </td>
                    <td><?php echo($fetch['Datefin']) ?> </td>
                    <td><?php echo($fetch['raison']) ?> </td>
                    <td><?php echo($fetch['decisionAdmin']) ?></td>
                    <td><?php echo($fetch['commentaire']) ?></td>
                </tbody>
        <?php } ?>
    </table>
    <a id="btnReturn" href="accueil.php">←</a>
</body>
</html>