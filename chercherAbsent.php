<?php
      session_start();
      if (!isset($_SESSION['id'])) {
          header("Location: login.php");
      }
    include 'config.php';
    $user_departement = $_SESSION['departement'];
    if ($_SESSION['poste'] == 'admin'){
        $name = $_POST['name'];
        $req = "SELECT * FROM users WHERE username LIKE'%$name%' AND poste NOT LIKE ('admin') AND departement = '$user_departement' AND presence = 0";
        $rs = $conn->query($req);
        $row_cnt = mysqli_num_rows($rs);
    }else if($_SESSION['poste'] == 'directeur'){
        $name = $_POST['name'];
        $req = "SELECT * FROM users WHERE username LIKE'%$name%' AND presence = 0";
        $rs = $conn->query($req);
        $row_cnt = mysqli_num_rows($rs);
    }
    
?>
<html>
<head>
    <link rel="stylesheet" href="listEmp.css">
    <meta charset="UTF-8">

</head>    
    <body>
        <?php 
            include'header.php' ;
        ?>

            

              
        <?php
                
            if($row_cnt > 0){?>
                <table border="1" width="50%" class="tableau-style">
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
                    </tr>
                </thead><?php
                while($row = $rs->fetch_assoc()) {?>
                    <tbody>
                        <tr>
                            <td><?php echo($row['username'])?></td>
                            <td><?php echo($row['lastname'])?></td>
                            <td><?php echo($row['poste'])?></td>
                            <td><?php echo($row['telephone'])?></td>
                            <td><?php echo($row['adresse'])?></td>
                            <td><?php echo($row['dateNaiss'])?></td>
                            <td><?php echo($row['lieuNaiss'])?></td>
                            <td><?php echo($row['email'])?></td>
                        </tr>
                    </tbody>
                        
                <?php }  
            }else{?>
                    <p style="text-align: center; color: red; font-size: 22px; font-weight: bold">Pas de resultat pour votre recherche</p>     
            <?php } ?></table><?php  
        ?>
       
     
    </body>
</html>