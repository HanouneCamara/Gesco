<?php 

    include 'config.php';
    $rq = "SELECT decision FROM SInscription WHERE date = (SELECT MAX(date) FROM SInscription)";
    $res = mysqli_query($conn, $rq);
    if($res->num_rows > 0) {
        $row = mysqli_fetch_assoc($res);
        if($row['decision'] == 0) {
            header("Location: login.php");
        }else if($row['decision'] == 1){
            header("Location: register.php");
        }
    }
?>    