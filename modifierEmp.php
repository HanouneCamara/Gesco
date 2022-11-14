<?php
    include 'config.php';
    $user_id = $_GET['id'];
    if(isset($_POST['update_profile'])){
        $update_username = $_POST['update_username'];
        $update_lastname = $_POST['update_lastname'];
        $update_poste = $_POST['update_poste'];
        $update_telephone = $_POST['update_telephone'];
        $update_adresse = $_POST['update_adresse'];
        $update_dateNaiss = $_POST['update_dateNaiss'];
        $update_lieuNaiss = $_POST['update_lieuNaiss'];
        $update_departement = $_POST['update_departement'];
        $update_email = $_POST['update_email'];

        $sql = " UPDATE users SET username = '$update_username',
            lastname = '$update_lastname', poste = '$update_poste',
            telephone = '$update_telephone', adresse = '$update_adresse',
            dateNaiss = '$update_dateNaiss', lieuNaiss = '$update_lieuNaiss',
            email = '$update_email' WHERE id = $user_id";
        $result = mysqli_query($conn, $sql);   
        if ($result) {
            $success[] = "Modification réussis avec succès";
        }else {
            $error[] = "Erreur : " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="commentaire.css" type="text/css">
    <title></title>
</head>
<body>
<?php
    $sql = "SELECT * FROM users WHERE id = $user_id";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $fetch = mysqli_fetch_assoc($result);
    }
   ?>
   <form action="" method="POST">
   <h1>Modifier Les informations :</h1>
        <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            }else if(isset($success)){
                foreach($success as $success){
                    echo '<span class="success-msg">'.$success.'</span>';
                }
            }
        ?>
       <div class="separation"></div>
       <div class="corps-formulaire">
            <div class="gauche">
                <div class="groupe">
                    <label>Nom :</label>
                    <input type="text" name="update_username" value="<?php echo $fetch['username']; ?>">
                </div>
                <div class="groupe">
                    <label>Prénom :</label>
                    <input type="text" name="update_lastname" value="<?php echo $fetch['lastname']; ?>">
                </div>
                <div class="groupe">
                    <label>Poste :</label>
                    <input type="text" name="update_poste" value="<?php echo $fetch['poste']; ?>">
                </div>
                <div class="groupe">
                    <label>Téléphone :</label>
                    <input type="text" name="update_telephone" value="<?php echo $fetch['telephone']; ?>">
                </div>
                <div class="groupe">
                    <label>Adresse :</label>
                    <input type="text" name="update_adresse" value="<?php echo $fetch['adresse']; ?>">
                </div>
            </div>
            <div class="droite">
                <div class="groupe">
                    <label>Date de naissance :</label>
                    <input type="text" name="update_dateNaiss" value="<?php echo $fetch['dateNaiss']; ?>">
                </div>
                <div class="groupe">
                    <label>Lieu de naissance :</label>
                    <input type="text" name="update_lieuNaiss" value="<?php echo $fetch['lieuNaiss']; ?>">
                </div>
                <div class="groupe">
                    <label>Email :</label>
                    <input type="text" name="update_email" value="<?php echo $fetch['email']; ?>">
                </div>
            </div>
       </div>
       <div class="pied-formulaire" align="center">
            <a href="listEmp.php">←</a>
            <input type="submit" value="Terminer" name="update_profile">
       </div>    
   </form>
</body>
</html>