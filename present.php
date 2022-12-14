<?php 

    session_start();
    if (!isset($_SESSION['id'])) {
        header("Location: login.php");
    }
    include 'config.php';
    $user_departement = $_SESSION['departement'];
    if ($_SESSION['poste'] == 'admin'){
        $req = "SELECT * FROM users WHERE poste NOT LIKE ('admin') AND poste NOT LIKE ('directeur') AND departement = '$user_departement' AND presence = 1";
        $rs = $conn->query($req);
    }else if($_SESSION['poste'] == 'directeur'){

        $req = "SELECT * FROM users WHERE poste NOT LIKE ('admin') AND poste NOT LIKE ('directeur') AND presence = 1";
        $rs = $conn->query($req);
    }
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title></title>
</head>
<body>
    <style>
            .form{
                padding: 30px 4px 0;
            }
            .container{
                position: absolute;
                width: auto;
                top: 10%;
                right: 6;
            }
            .form-controle input{
                border: 1px solid #0b0f0c;
                border-radius: 4px;
                display: block;
                padding: 10px;
                width: 110px;
                font-size: 14px;
                font-family: inherit;
                margin-bottom: 5px;
            }
            .form button{
                background-color: #12ca7e;
                border: 2px solid #12ca7e;
                border-radius: 4px;
                color: black;
                display: block;
                width: 110px;
                padding: 5px;
                font-size: 14px;
                font-family: inherit;
                font-weight: bolder;
                cursor: pointer;
                text-align: center;
            }
            .form button:hover{
                background-color: #0b0f0c;
                color: #12ca7e;
            }
    </style>

    <?php  
        include 'header.php' ;
    ?> 
        <header>
            <h1>La liste des pr??sents : </h1>
            <div class="container">
                <form action="chercherPresent.php" method="POST" class="form">
                    <div class="form-controle">
                        <input type="text" name="name" placeholder="Taper le nom " autocomplete="off">
                    </div>
                    <button type="submit"  value="Valider">Chercher</button>
                </form>
            </div>
        </header>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Pr??nom</th>
                    <th>Poste</th>
                    <th>Tel</th>
                    <th>Adresse</th>
                    <th>Date de naissance</th>
                    <th>Lieu de naissance</th>
                    <th>Email</th>

                </tr>
            </thead>
            

              
            <?php while($row = $rs->fetch_assoc()) {?>
                <tbody>
                    <tr>
                        <td data-label="Nom"><?php echo($row['username'])?></td>
                        <td data-label="Prenom"><?php echo($row['lastname'])?></td>
                        <td data-label="Poste"><?php echo($row['poste'])?></td>
                        <td data-label="Tel"><?php echo($row['telephone'])?></td>
                        <td data-label="Adresse"><?php echo($row['adresse'])?></td>
                        <td data-label="Date de naissance"><?php echo($row['dateNaiss'])?></td>
                        <td data-label="Lieu de naissance"><?php echo($row['lieuNaiss'])?></td>
                        <td data-label="Email"><?php echo($row['email'])?></td>

                    </tr>
                </tbody>
                
            <?php } ?>
        </table>
        <script src="script.js"></script>

</body>
</html>