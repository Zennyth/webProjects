<?php
require_once 'inc/db.php';
require_once 'inc/functions.php';
session_start();
if(!empty($_SESSION['auth'])) //Redirection si l'utilisateur est déja log
{
	header('Location: account.php'); 
}
if(isset($_COOKIE['Remember'])) //Authentification par cookie
{	
	session_start();
	$req = $pdo->prepare('SELECT * FROM users WHERE remember_token = :remember_token');
	$req->bindParam(':remember_token', $_COOKIE['Remember'], PDO::PARAM_STR);
	$req->execute();
	$user = $req->fetch();
	$_SESSION['auth'] = $user;
	header('Location: account.php');
}
if((empty($_POST['username']) || empty($_POST['password'])) && isset($_POST['username']) && isset($_POST['password']))
{
	$errors['Invalide'] ="Tous les champs sont nécessaires !";
}
if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){ //Verification des mots de passe 
	require_once 'inc/functions.php';
	$req = $pdo->prepare('SELECT * FROM users WHERE (username = :username OR email = :username) ');
	$req->execute(['username' => $_POST['username']]);
	$user = $req->fetch();
	if(password_verify($_POST['password'], $user->password)){
		session_start();
		$_SESSION['auth'] = $user;
		$_SESSION['flash']['success'] = 'Vous êtes maintenant connecté !';
		if($_POST['remember']){
			$remember_token = str_random(250);
			$req = $pdo->prepare('UPDATE users SET remember_token = :remember_token WHERE id = :id');
			$req->bindParam(':remember_token', $remember_token, PDO::PARAM_STR);
			$req->bindParam(':id', $user->id, PDO::PARAM_INT);
			$req->execute();
			$cookieName = "Remember";
			$temps = 365*24*3600;
			setcookie($cookieName,$remember_token,time()+$temps, "/");
		}
		header('Location: account.php');
		exit();
	}else {
		$errors['Invalide'] ="Identifiant ou mot de passe invalide !";
	}
}
?>
<?php require 'inc/header.php'; ?>

<?php if(!empty($errors)): ?> <!-- Affiche les erreurs, s'il y en a -->
<div class="alert-danger">
	<p>Vous n'avez pas rempli le formulaire correctement :</p>
	<ul>
		<?php foreach($errors as $error): ?>
			<li><?php echo $error; ?></li>
		<?php endforeach; ?>
	</ul>
</div>
<?php endif; ?>
<h1>Se connecter :</h1>


<form id="form-connect" action="" method="POST">

	<div class="form-group">

		<label for="">Pseudo ou email</label>

		<input type="text" name="username" class="form-control" />

	</div>

	<div class="form-group">

		<label for="">Mot de passe</label>

		<input type="password" name="password" class="form-control" />
		
	</div>

	<div class="form-group" method="POST">

		<label>

			<input type="checkbox" class="css-checkbox" name="remember" value="1" /> Se souvenir de moi !
		</label>
		
	</div>

	<button type="submit" class="btn">Se connecter</button>


</form>

<?php require 'inc/footer.php'; ?>