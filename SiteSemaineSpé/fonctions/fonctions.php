<?php 
	function afficheQuestion($tab,$name) {

		if ($tab['types'] == 'checkbox' ) { // si la question est une checkbox
			echo "<p class=\"question\">";
				echo $name." : ".$tab['questions']."<br/>"; //affiche l'énoncé de la question
				$name.='[]'; //le nom que sera attribué au input checkbox

				foreach ($tab['reponses'] as $key => $value) { //le foreach affiche toutes les réponses
					echo "<input type=\"".$tab['types']."\" name=\"$name\" id=\"$key\" value=\"$value\" class=\"css-checkbox\"/>";// création de l'input
					echo "<label for=\"$key\">$value</label><br/>";	//création des labels (réponses)
				}

			echo "</p>";
		}
		else if ($tab['types'] == 'radio' ) { // si la question est un radio bouton
			echo "<p class=\"question\">";
				echo $name." : ".$tab['questions']."<br/>";

				foreach ($tab['reponses'] as $key => $value) { 
					echo "<input type=\"".$tab['types']."\" name=$name id=\"$key\" value=\"$value\" class=\"css-radio\"/>";
					echo "<label for=\"$key\"><span class=\"check\"></span>$value</label><br/>";
				}
			echo "</p>";
		}
		elseif ($tab['types'] == 'text') { // si la question est un type text
			echo "<p class=\"question\">";
				echo $name." : ".$tab['questions']."<br/>";
				echo "<input type=\"".$tab['types']."\" name=$name id=\"choixText\" size=\"30\" maxlenght=\"32\" autocomplete=\"off\"/>";
			echo "</p>";
		}
	}



	function verificationReponse($tab,$numQ) {
		require 'db.php'; //pour la base de données
		$Q='Q'.$numQ; //pour avoir la clé dans $_POST de la question
		$Question='Question'.$numQ; // pour avoir la clé dans $tab de la question
		$bravo=False; //la condition pour savoir si il répond correctement

		if ($tab[$Question]['types'] == 'checkbox') {
			$bon=0;

//--------- Remplacer la clé dans $_POST par $Q pour faciliter l'accès a la clé ---------
			if (isset($_POST[$Q]) == False) {
					$_POST[]=array('');//rajoute une valeur null
					krsort($_POST);	//trie $_POST pour avoir la valeur null en premier
					$_POST[$Q]=$_POST[key($_POST)];//cela va donner $_POST[$Q] => $_POST[clé de la valeur null] => ''
					unset($_POST[key($_POST)]); //supprime $_POST[clé de la valeur null] pour donner $_POST[$Q] => ''
			}

			foreach ($_POST[$Q] as $value) {

				if ($value == $tab[$Question]['reponseCorrect']) {
					$bon++; // si réponse correct $bon +1
				}
				else if ($value != $tab[$Question]['reponseCorrect']) {
					$bon--; // sinon $bon -1
				}

			}

			if ($bon == 1) // si la réponse est correct alors $bravo est vrai
				{   $bravo=True;   }
		}
		elseif ($tab[$Question]['types'] == 'text') {

			if (strtolower($_POST[$Q]) == $tab[$Question]['reponseCorrect']) { //strtolower est là pour ne pas avoir de sensibilité à la casse
				$bravo=True;
			}

		}
		else {

			if (isset($_POST[$Q]) == False) {
					$_POST[]='';
					krsort($_POST);
					$_POST[$Q]=$_POST[key($_POST)];
					unset($_POST[key($_POST)]);
			}

			if ($_POST[$Q] == $tab[$Question]['reponseCorrect']) 
			{   $bravo=True;   }

		}

		if ($bravo) {
			
//---------------------BASE DE DONNEES POUR METTRE UN POINT EN PLUS EN CAS DE BONNE REPONSES---------------
			echo "<p class=\"reussite\" style=\"font-weight:bolder;\">Bonne réponse !</p>"; //affiche une div avec écrit bonne réponse;
			$user_id = $_SESSION['auth']->id;
			$req = $pdo->prepare('SELECT nbpoint FROM users WHERE id = :id');
			$req->bindParam(':id', $user_id, PDO::PARAM_INT);
			$req->execute();
			$nbpoint = $req->fetch();
   			$nbpoint->nbpoint = $nbpoint->nbpoint+1;
			$req = $pdo->prepare('UPDATE users SET nbpoint = :nbpoint where id = :id');
			$req->bindParam(':nbpoint', $nbpoint->nbpoint, PDO::PARAM_INT);
   			$req->bindParam(':id', $user_id, PDO::PARAM_INT);
   			$req->execute();
		}
		else {
			echo "<p class=\"echec\"><span style=\"font-weight:bolder;\">Dommage !</span> La réponse était : ".$tab[$Question]['reponseCorrect']."</p>"; // affiche une div avec écrit mauvaise réponse
		}
	}

	
 ?>