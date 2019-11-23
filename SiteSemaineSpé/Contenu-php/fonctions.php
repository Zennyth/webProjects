<?php 
	function afficheQuestion($tab,$name) {

		if ($tab['types'] == 'checkbox' ) {
			echo "<p class=\"question\">";
				echo $name." : ".$tab['questions']."<br/>";
				$name.='[]';

				foreach ($tab['reponses'] as $key => $value) {
					echo "<input type=\"".$tab['types']."\" name=\"$name\" id=\"$key\" value=\"$value\" class=\"css-checkbox\"/>";
					echo "<label for=\"$key\">$value</label><br/>";	
				}

			echo "</p>";
		}
		else if ($tab['types'] == 'radio' ) {
			echo "<p class=\"question\">";
				echo $name." : ".$tab['questions']."<br/>";

				foreach ($tab['reponses'] as $key => $value) {
					echo "<input type=\"".$tab['types']."\" name=$name id=\"$key\" value=\"$value\" class=\"css-radio\"/>";
					echo "<label for=\"$key\"><span class=\"check\"></span>$value</label><br/>";
				}
			echo "</p>";
		}
		elseif ($tab['types'] == 'text') {
			echo "<p class=\"question\">";
				echo $name." : ".$tab['questions']."<br/>";
				echo "<input type=\"".$tab['types']."\" name=$name id=\"choixText\" size=\"30\" maxlenght=\"32\" autocomplete=\"off\"/>";
			echo "</p>";
		}
	}



	function verificationReponse($tab,$numQ) {
		require 'db.php';
		$Q='Q'.$numQ;
		$Question='Question'.$numQ;
		$cle=$numQ-1;
		$bravo=False;
		// echo "<p>Question $numQ</p>";

		if ($tab[$Question]['types'] == 'checkbox') {
			$bon=0;

			if (isset($_POST[$Q]) == False) {
					$_POST[]=array('');
					krsort($_POST);					
					$_POST[$Q]=$_POST[key($_POST)];
					unset($_POST[key($_POST)]);
			}

			foreach ($_POST[$Q] as $value) {

				if ($value == $tab[$Question]['reponseCorrect']) {
					$bon++;
				}
				else if ($value != $tab[$Question]['reponseCorrect']) {
					$bon--;
				}

			}

			if ($bon == 1) 
				{   $bravo=True;   }
		}
		elseif ($tab[$Question]['types'] == 'text') {

			if (strtolower($_POST[$Q]) == $tab[$Question]['reponseCorrect']) {
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
			
			echo "<p class=\"reussite\" style=\"font-weight:bolder;\">Bonne réponse !</p>";
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
			echo "<p class=\"echec\"><span style=\"font-weight:bolder;\">Dommage !</span> La réponse était : ".$tab[$Question]['reponseCorrect']."</p>";
		}
	}

	
 ?>