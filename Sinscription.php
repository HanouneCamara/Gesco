<?php 
    session_start();
    if (!isset($_SESSION['id'])) {
        header("Location: login.php");
    }
    include 'config.php';
    $user_id = $_SESSION['id'];
    if (isset($_POST['validate'])) {
        $IdAdmin = $_POST['IdAdmin'];
        $decision = $_POST['decision'];

        $sql = "INSERT INTO SInscription(IdAdmin, decision) VALUES ($IdAdmin, $decision)";
        $result = mysqli_query($conn, $sql);
        if($result){
            $msg[] = "Le systéme a été modifier";
        }else{
            $msg[] = "Erreur : " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    $rquet = 
        "SELECT users.username, users.lastname, SInscription.decision, SInscription.date FROM SInscription, users WHERE SInscription.IdAdmin = users.id AND 
        SInscription.date= (SELECT MAX(date) FROM SInscription)";
    $rslt = mysqli_query($conn, $rquet);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Sinscription.css">
    <title>SInscription</title>
</head>

    <style>

    </style>

<body>
    <?php include 'header.php' ?>
    <section>
    <h3>Activer/Désactiver le Systéme d'Inscription</h3>
    <?php
			if(isset($msg)){
				foreach($msg as $msg){
					echo '<span class="success-msg">'.$msg.'</span>';
				};
			};
     	?>
    <form method="POST">
        <label for="IdAdmin">Votre Identifiant</label>
        <input type="text" name="IdAdmin" value="<?php echo($user_id) ?> "><br>
        <label for="decision">Systeme d'inscription</label>
        <select name="decision" required>
            <option value=""></option>
			<option value="1">Activer</option>
			<option value="0">désactiver</option>
		</select>
        <button type="submit" name="validate">Confirmer</button>
    </form>

    <h3>La dernière opération effectuée : </h3>
    <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Décision</th>
                    <th>Date/Heure</th>
                </tr>
            </thead>
            <?php while($row = $rslt->fetch_assoc()) {
                    if($row['decision'] == 0){
                       $desc[] = "Désactivé";
                    }else if($row['decision'] == 1){
                        $desc[] = "Activé";
                    }
                ?>
                <tbody>
                    <tr>
                        <td data-label="Nom"><?php echo($row['username'])?></td>
                        <td data-label="Prénom"><?php echo($row['lastname'])?></td> 
                        <td data-label="Décision">
                            <?php 
                                if(isset($desc)){
                                    foreach($desc as $desc){
                                        echo '<span>'.$desc.'</span>';
                                    };
                                };
                            ?>
                        </td> 
                        <td data-label="Date/Heure"><?php echo($row['date'])?></td>
                    </tr>
                </tbody>
                
            <?php } ?>
        </table>
        </section>
        <script src="script.js"></script>
   
</body>
</html>    