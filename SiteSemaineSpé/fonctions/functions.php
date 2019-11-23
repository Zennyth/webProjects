<?php 

function codehtml($questions){
	echo "<table id=\"tableau\">";
	$i=1;
	foreach ($questions as $question) {
		if ($question[9]==1) {
	        if (!$question[0]) {
				echo "<span class=\"gris\">&lt;!--".$question[8]."--></span>";
	        }
	        else {
			echo "<tr><td class=\"chiffre\">".$i."</td>";
			echo "<td class=\"code\">";
			for ($j=0; $j < $question[3]; $j++) { 
				echo "<span class=\"tabulation\"></span>";
			}
			echo "&lt;";
			if ($question[5]!=0) {
				echo "/";
			}
			echo "<span class=\"rouge\">".$question[0]."</span>";
			if ($question[1]=="id") {
				echo "</span><span class=\"vert\"> id</span>=<span class=\"orange\">\"".$question[2]."\"</span>>";
			}
			else if ($question[1]=="class") {
				echo "</span><span class=\"vert\"> class</span>=<span class=\"orange\">\"".$question[2]."\"</span>>";
			}
			else if ($question[1]=="href" || $question[1]=="controls src") {
				echo "</span><span class=\"vert\"> ".$question[1]."</span>=<span class=\"orange\">\"".$question[2]."\"</span>>";
			}	
			else if ($question[10]==1)
			{
				echo " html >";
			}
			else {
				echo ">";
			}
			echo $question[6];
			if ($question[4]!=0) {
				echo "";
				echo "&lt;/<span class=\"rouge\">".$question[0]."</span>>";
			}
			if ($question[7]!=0) {
				echo "<span class=\"gris\">&lt;!--".$question[8]."--></span>";
			}
			$i++;
		}
		}
	}
	echo "</table>";
}


function codecss($questions) {
	echo "<table id=\"tableau\">";
	$i=1;
	foreach ($questions as $question) {
		if ($question[15]==1) {
			if ($question[0]==0) {
				echo "<tr><td class=\"chiffre\">".$i."<td>";
				echo "<span class=\"vert\">".$question[1]."</span><span class=\"rouge\">".$question[2]."</span>".$question[3];
			}
			else if($question[0]==1) {
				echo "<tr><td class=\"chiffre\">".$i."<td>";
				echo "<span class=\"tabulation\"></span><span class=\"bleu\">";
				if ($question[18]==1)
					echo "-";
				echo $question[4]."</span> :";
				echo "<span class=\"bleu\"> ".$question[5]."</span>";
				if ($question[6]!="non") {
					echo "<span class=\"violette\"> ".$question[6]."</span><span class=\"rouge\">".$question[7]."</span>";
					echo "<span class=\"violette\"> ".$question[8]."</span><span class=\"rouge\">".$question[9]."</span>";
					echo "<span class=\"violette\"> ".$question[10]."</span><span class=\"rouge\">".$question[11]."</span>";
				} 
				echo "<span class=\"bleu\"> ".$question[12]." ".$question[13]." ".$question[14]."</span>;";
			}
			else if ($question[0]==2) {
				echo "<tr><td class=\"chiffre\">".$i;
				echo "<td>".$question[3];
				if($question[16]==1)
				{
					echo "<span class=\"gris\"> /*".$question[17]." */</span>";
				}
				echo "</tr>";
			}
			else if ($question[0]==3)
			{
				echo "<tr><td class=\"chiffre\">".$i;
				echo "<td>".$question[1]."<span class=\"bleu\" > -".$question[2]."-</span>";
				echo "</tr>";
			}
			$i++;
		}
	}
	echo "</table>";
}

function codehtmlcss($questions){
	echo "<table id=\"tableau\">";
	$i=1;
	foreach ($questions as $question) {
		if ($question[7]==1) {
	        # code...

			echo "<tr><td class=\"chiffre\">".$i."</td>";
			echo "<td class=\"code\">";
			for ($j=0; $j < $question[3]; $j++) { 
				echo "<span class=\"tabulation\"></span>";
			}
			echo "&lt;";
			if ($question[5]!=0) {
				echo "/";
			}
			echo "<span class=\"rouge\">".$question[0]."</span>";
			if ($question[1]=="id") {
				echo "</span><span class=\"vert\"> id</span>=<span class=\"orange\">\"".$question[2]."\"</span>";
			}
			else if ($question[1]=="class") {
				echo "</span><span class=\"vert\"> class</span>=<span class=\"orange\">\"".$question[2]."\"</span>";
			}
			else if ($question[1]=="rel") {
				echo "</span><span class=\"vert\"> ".$question[1]."</span>=<span class=\"orange\">\"".$question[2]."\"</span>";
			}

				echo "</span><span class=\"vert\"> ".$question[3]."</span>=<span class=\"orange\">\"".$question[4]."\"</span>";
			if ($question[5]=="href") {
				echo "</span><span class=\"vert\"> ".$question[5]."</span>=<span class=\"orange\">\"".$question[6]."\"</span>>";
			}
			else
				echo ">";

		$i++;
		}
	}
	echo "</table>";
}

?>