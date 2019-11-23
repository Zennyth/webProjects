<?php
require 'inc/functions.php';
require 'inc/db.php';
logged_only();
if(empty($_SESSION['auth'])) //Redirection si l'utilisateur n'est pas log
{
	header('Location: login.php');
}
if(isset($_POST['dontremember'])) //Permet de se loguer avec le cookie
{
	$user_id = $_SESSION['auth']->id;
	$req = $pdo->prepare('UPDATE users SET remember_token = NULL WHERE id = :id');
   	$req->bindParam(':id', $user_id, PDO::PARAM_INT);
   	$req->execute();
   	if(isset($_COOKIE['Remember']))
	{	
		setcookie('Remember', null, -1, '/'); //supprime le cookie de l'utilisateur
	}
   	header('Location: logout.php');
}
else if(!empty($_POST['password']) || !empty($_POST['password_confirm'])){ //Changer de mot de passe 

    if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
        $_SESSION['flash']['danger'] = "Les mots de passes ne correspondent pas";
    }else{
        $user_id = $_SESSION['auth']->id;
        $password= password_hash($_POST['password'], PASSWORD_BCRYPT);
        require_once 'inc/db.php';
        $pdo->prepare('UPDATE users SET password = ? WHERE id = ?')->execute([$password,$user_id]);
        $_SESSION['flash']['success'] = "Votre mot de passe a bien été mis à jour";
    }
}
?>
<?php require 'inc/header.php'; ?>


<h1 id="title-user">Bonjour, <?= $_SESSION['auth']->username; ?></h1>

<p id="changer_mdp">Pour changer votre mot de passe :</p>

<form id="form-account" action="" method="POST">

	<div class="form-group">

		<label for="">Mot de passe</label>

		<input type="password" name="password" class="form-control" />
		
	</div>

	<div class="form-group">

		<label for="">Confirmez votre mot de passe</label>

		<input type="password" name="password_confirm" class="form-control" />
		
	</div>
	<label>

		<input type="checkbox" class="css-checkbox" name="dontremember" value="1" /> Ne pas se souvenir de moi !
	</label>
	<div id="btn-account">
		<button type="submit" class="btn">Confirmer</button>
	</div>
	<div>
		<?php 
		require 'inc/db.php';
		if(isset($_SESSION['auth']))
		{
			$user_id = $_SESSION['auth']->id;
			$req = $pdo->prepare('SELECT nbpoint FROM users WHERE id = :id'); //Recuperation du nombre de point dans la base donnée
			$req->bindParam(':id', $user_id, PDO::PARAM_INT);
			$req->execute();
			$nbpoint = $req->fetch();
			$req = $pdo->prepare('SELECT * from users where nbpoint = (Select max(nbpoint) from users)');
			$req->execute();
			$Mvp = $req->fetch();
		}?>
		<p>Votre nombre de point est :</p>
		<p id="point" style="text-align: center; color: rgba(231,140,51,0.8); font-size: 26px;"><?php print $nbpoint->nbpoint;  ?></p>
	</div>
</form>
<div id="mvp">
		<?php if($user_id == $Mvp->id): ?>
			<p>Vous êtes le mvp du serveur !</p>
			<?php else: ?>
			<p>Le Mvp du serveur est :</p>
			<p id="point" style="text-align: center; color: rgba(231,140,51,0.8); font-size: 26px;"><?php print $Mvp->username; ?></p>
			<p>avec :</p>
			<p id="point" style="text-align: center; color: rgba(231,140,51,0.8); font-size: 26px;"><?php print $Mvp->nbpoint; ?></p>
		<?php endif;?>
	</div>
<?php require 'inc/footer.php'; ?>