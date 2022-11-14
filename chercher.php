<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chercher</title>
</head>
<body>
        <style>
            
            #active2 {
                border-bottom: 1px solid #fff;
            }
            .container{
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                min-height: 60vh;
                border-radius: 5px;
                width: 400px;
            }
            .header{
                border-bottom: 1px solid  #12ca7e;
                padding: 20px 40px;
                text-align: center;
                border-radius: 5px;
            }
            .header h2{
                color:  #12ca7e;
                font-family: dayom, serif;
                text-transform: uppercase;
                margin: 0;
            }
            .form{
                padding: 30px 40px;
            }
            .form-controle{
                position: relative;
                margin-bottom: 10px;
                padding-bottom: 20px;
            }
            .form-controle input{
                border: 2px solid #0b0f0c;
                border-radius: 4px;
                display: block;
                margin: 5px;
                width: 100%;
                padding: 10px;
                font-size: 14px;
                font-family: inherit;
            }
            .form button{
                background-color: #12ca7e;
                border: 2px solid #12ca7e;
                border-radius: 4px;
                color: black;
                display: block;
                width: 100%;
                padding: 10px;
                font-size: 18px;
                font-family: inherit;
                font-weight: bolder;
                cursor: pointer;
                margin-bottom: 12px;
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

    <div class="container">
        <div class="header">
            <h2>Chercher</h2>
        </div>
        <form action="chercherEmp.php" method="POST" class="form">
            <div class="form-controle">
                <input type="text" name="name" placeholder="Taper le nom de la personne" autocomplete="off">
            </div>
            <button type="submit"  value="Valider">Chercher</button>
        </form>
    </div>
    <script src="script.js"></script>

</body>
</html>