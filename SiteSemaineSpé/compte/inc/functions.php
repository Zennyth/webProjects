<?php
	function debug($variable){
		echo '<p>' . print_r($variable, true) . '</p>';
	}

	function str_random($length){
		$alphabet = "0123456789azertyuiopqsdfghjklmwxcvbn";
		return substr(str_shuffle(str_repeat($alphabet, $length)),0 ,$length);
	}

	function logged_only(){
		if (session_status() == PHP_SESSION_NONE){
        session_start();
		}
		if(!isset($_SESSION['auth'])){
        $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette pasge !";
	   header('Location: login.php');
	   exit();
		}
	}
?>