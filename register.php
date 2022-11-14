<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
	header("Location: login.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$lastname = $_POST['lastname'];
	$poste = $_POST['poste'];
	$telephone = $_POST['telephone'];
	$adresse = $_POST['adresse'];
	$dateNaiss = $_POST['dateNaiss'];
	$lieuNaiss = $_POST['lieuNaiss'];
	$departement = $_POST['departement'];
	$sexe = $_POST['sexe'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if(strlen($_POST['password']) >= 8){
		if ($password == $cpassword) {
		
			$sql = "SELECT * FROM users WHERE email='$email'";
			$result = mysqli_query($conn, $sql);
			if (!$result->num_rows > 0) {
				$sql = "INSERT INTO users (username, lastname, poste, telephone, adresse, dateNaiss, lieuNaiss, departement, sexe, email, password)
					VALUES ('$username', '$lastname', '$poste', '$telephone', '$adresse', '$dateNaiss', '$lieuNaiss', '$departement', '$sexe', '$email', '$password')";
				$result = mysqli_query($conn, $sql);
				if ($result) {
					header('Location: login.php');
				} else {
					$error[] = "Erreur : " . $sql . "<br>" . mysqli_error($conn);
				}
			} else {
				$error[] = "l'utilisateur existe déjà!";
			}
			
		} else {
			$error[] = "le mot de passe ne correspond pas!";
		}
	}else{
		$error[] = "le mot de passe est trop court";

	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="register.css">

	<title>Formulaire d'inscription</title>
</head>
<body>
	<form action="" method="POST">
        <h1>inscription</h1>
			
		<?php
			if(isset($error)){
				foreach($error as $error){
					echo '<span class="error-msg">'.$error.'</span>';
				};
			};
     	?>
		<div class="separation"></div>
		<div class="corps-formulaire">	
			<div class="gauche">
				<div class="input-group">
					<input type="text" placeholder="First Name" name="username" value="<?php echo $username; ?>" required>
				</div>
				<div class="input-group">
					<input type="text" placeholder="Last Name" name="lastname" value="<?php echo $lastName; ?>" required>
				</div>
				<div class="input-group">
					<input type="text" placeholder="Poste" name="poste" value="<?php echo $poste; ?>" required>
				</div>
				<div class="input-group">
					<input type="text" placeholder="Téléphone" name="telephone" value="<?php echo $telephone; ?>" required>
				</div>
				<div class="input-group">
					<input type="text" placeholder="Adresse" name="adresse" value="<?php echo $adresse; ?>" required>
				</div>
				<div class="input-group">
					<input type="date" placeholder="Date de Naissance" name="dateNaiss" value="<?php echo $dateNaiss; ?>" required>
				</div>
			</div>
			<div class="droite">		
				<div class="input-group">
					<input type="text" placeholder="Lieu de Naissance" name="lieuNaiss" value="<?php echo $lieuNaiss; ?>" required>
				</div>
				<div class="input-group">
					<select name="departement" required>
						<option value="">Départements</option>
						<option value="D1">D1</option>
						<option value="D2">D2</option>
						<option value="D3">D3</option>
					</select>
				</div>
				<div class="input-group">
					<select name="sexe" required>
						<option value="">Sexe</option>
						<option value="Homme">Homme</option>
						<option value="Femme">Femme</option>
					</select>
				</div>
				<div class="input-group">
					<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
				</div>
				<div class="input-group">
					<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
				</div>
				<div class="input-group">
					<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
				</div>
			</div>	
		</div>	
		<div class="pied-formulaire">
			<button name="submit">S'inscrire</button>
		</div>
			<p class="login-register-text">J'ai déja un compte? <a href="login.php">Se connecter</a></p>
	</form>
</body>
</html>