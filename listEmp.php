
<?php 
    session_start();
    if (!isset($_SESSION['id'])) {
        header("Location: login.php");
    }
    include 'config.php';
    $user_departement = $_SESSION['departement'];
    if ($_SESSION['poste'] == 'admin'){
        $req = "SELECT * FROM users WHERE poste NOT LIKE ('admin') AND poste NOT LIKE ('directeur') AND departement = '$user_departement'";
        $rs = $conn->query($req);
    }else if($_SESSION['poste'] == 'directeur'){
        $req = "SELECT * FROM users WHERE poste NOT LIKE ('directeur')";
        $rs = $conn->query($req);

    
    }
    
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        include 'header.php';
    ?>
        <header>
            <h1>La liste des employés : </h1>
        </header> 
        <div class="container">
                <form action="chercherAbsent.php" method="POST" class="form">
                    <div class="form-controle">
                        <input type="text" name="name" placeholder="Taper le nom" autocomplete="off">
                    </div>
                    <button type="submit"  value="Valider">Chercher</button>
                </form>
            </div>          
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Poste</th>
                    <th>Tel</th>
                    <th>Adresse</th>
                    <th>Date de naissance</th>
                    <th>Lieu de naissance</th>
                    <th>Email</th>
                    <th>Actions</th>

                </tr>
            </thead>
            

              
            <?php while($row = $rs->fetch_assoc()) {?>
                <tbody>
                    <tr>
                        <td data-label="Nom"><?php echo($row['username'])?></td>
                        <td data-label="Prénom"><?php echo($row['lastname'])?></td>
                        <td data-label="Poste"><?php echo($row['poste'])?></td>
                        <td data-label="Tel"><?php echo($row['telephone'])?></td>
                        <td data-label="Adresse"><?php echo($row['adresse'])?></td>
                        <td data-label="Date de naissance"><?php echo($row['dateNaiss'])?></td>
                        <td data-label="Lieu de naissance"><?php echo($row['lieuNaiss'])?></td>
                        <td data-label="Email"><?php echo($row['email'])?></td>
                        <td data-label="Actions"><a href="modifierEmp.php?id=<?php echo($row['id'])?>"><i class="fa-solid fa-pen"></i></a></td>

                    </tr>
                </tbody>
                
            <?php } ?>
        </table>
        <script src="script.js"></script>
</body>
</html>