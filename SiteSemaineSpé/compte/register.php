<?php

require_once 'inc/functions.php';

session_start();
if(!empty($_SESSION['auth']))
{
	header('Location: account.php');
}
if(!empty($_POST)){
	$errors = array(); //Declaration du tableau erreur
	require_once 'inc/db.php';
	if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){ //Validation du pseudo
		$errors['username'] = "Votre pseudo n'est pas valide !"; 
	} else {
		$req = $pdo->prepare('SELECT id FROM users WHERE username = ?'); //Verification de doublon dans la base de donnée
		$req->execute([$_POST['username']]);
		$user = $req->fetch();
		if($user){
			$errors['username'] = 'Ce pseudo est déjà pris !';
		}
	}
	
	if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){//Validation de l'adresse mail
		$errors['email'] = "Votre email n'est pas valide !";
	} else {
			$req = $pdo->prepare('SELECT id FROM users WHERE email = ?'); //Verification de doublon dans la base de donnée
			$req->execute([$_POST['email']]);
			$user = $req->fetch();
			if($user){
				$errors['email'] = 'Cette adresse mail a déjà été prise !';
			}

		}

	if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){ //Validation du mot de passe 
		$errors['password'] = "Vous devez rentrer un mot de passe valide !";
	}
	if(empty($errors)){
		$req = $pdo->prepare('INSERT INTO users VALUES (NULL,:username , :email,:password,NULL,0)'); //S'il ni a pas d'erreur alors on ecrit dans la basa de donnée 
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$req->bindParam(':username',$_POST['username'], PDO::PARAM_STR);
		$req->bindParam(':email',$_POST['email'], PDO::PARAM_STR);
		$req->bindParam(':password',$password, PDO::PARAM_STR);
		$req->execute();
		$user_id = $pdo->lastInsertId();
		header('Location: login.php');
		exit();	
	}
}

?>
<?php require 'inc/header.php'; ?>

<h1>S'inscrire ! </h1>

<?php if(!empty($errors)): ?>
<div class="alert alert-danger"><!-- Affiche les erreurs, s'il y en a -->
	<p>Vous n'avez pas rempli le formulaire correctement</p>
	<ul>
		<?php foreach($errors as $error): ?>
			<li><?php echo $error; ?></li>
		<?php endforeach; ?>
	</ul>
</div>
<?php endif; ?>




<form action="" method="POST">  <!-- Changer de classe -->

	<div class="form-group">

		<label for="">Pseudo</label>

		<input type="text" name="username" class="form-control" />

	</div>

	<div class="form-group">

		<label for="">Email</label>

		<input type="text" name="email" class="form-control" />
		
	</div>

	<div class="form-group">

		<label for="">Mot de passe</label>

		<input type="password" name="password" class="form-control" />
		
	</div>

	<div class="form-group">

		<label for="">Confirmez votre mot de passe</label>

		<input type="password" name="password_confirm" class="form-control" />
		
	</div>

	<button type="submit" class="btn">M'inscrire</button>


</form>

<?php require 'inc/footer.php'; ?>