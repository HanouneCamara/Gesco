<?php
include 'config.php';
if (isset($_POST['envoi'])){
    if(!empty($_POST['id_user']) AND !empty($_POST['Datedebut']) AND !empty($_POST['Datefin']) AND !empty($_POST['raison'])){
        $id_user = $_POST['id_user'];
        $Datedebut = $_POST['Datedebut'];
        $Datefin = $_POST['Datefin'];
        $raison = $_POST['raison'];

        $sql = "INSERT INTO Conge (id_user, Datedebut, Datefin, raison)
                VALUES($id_user, '$Datedebut' , '$Datefin' , '$raison')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $success[] = "Démande envoyer avec succès";
        }else {
            $error[] = "Erreur : " . $sql . "<br>" . mysqli_error($conn);
        }
    }else{
        $error[] = "Veillez remplir tout les champs";
    }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="demandeConge.css">
    <title></title>
</head>
<body>
    <form method="POST">
        <h1>Demander de congé</h1>
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
                    <label for="id_user">Votre Identifiant</label>
                    <input type="text" name="id_user" id="id_user">
                </div>
                <div class="groupe">
                    <label for="Datedebut">Date de debut</label>
                    <input type="date" name="Datedebut" id="Datedebut">
                </div>
                <div class="groupe">
                    <label for="Datefin">Date de fin</label>
                    <input type="date" name="Datefin" id="Datefin">
                </div>
            </div>
            <div class="droite">
                <div class="groupe">
                    <textarea name="raison"cols="30" rows="10" placeholder="La raison du demande"></textarea>
                </div>
            </div>
        </div>     
            <div class="pied-formulaire" align="center">
                <a href="accueil.php">←</a>
                <input type="submit" name="envoi" value="Envoi">
            </div>   
    </form>
</body>
</html>