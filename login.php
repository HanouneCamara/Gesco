<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])){
    header("Location: accueil.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['id'] = $row['id'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['lastname'] = $row['lastname'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['adresse'] = $row['adresse'];
		$_SESSION['dateNaiss'] = $row['dateNaiss'];
		$_SESSION['lieuNaiss'] = $row['lieuNaiss'];
		$_SESSION['poste'] = $row['poste'];
		$_SESSION['departement'] = $row['departement'];
		$_SESSION['sexe'] = $row['sexe'];
		if ($row['poste'] == 'admin') {
			header('Location: listEmp.php');
		}else if($row['poste'] == 'directeur'){
			header("Location: listEmp.php");
		}else{
			header("Location: accueil.php");
		}
	}else {
		$error[] ="Oups ! L'e-mail ou le mot de passe est incorrect.";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="loginStyle.css">

	<title>Formulaire de connection</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<div class="header">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			</div>
			<?php
				if(isset($error)){
					foreach($error as $error){
						echo '<span class="error-msg">'.$error.'</span>';
					};
				};
     		 ?>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Connexion</button>
			</div>
			<p class="login-register-text">J'ai pas de compte? <a href="Verifregister.php">M'inscrire</a>.</p>
		</form>
	</div>
</body>

</html>