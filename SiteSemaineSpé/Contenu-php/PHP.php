<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../Css/style.css">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <title>Apprendre l'PHP</title>
  <link rel="icon" href="../Image/favicon.ico" />
</head>
<body>
  <div id="RetourEnHaut"></div>
<?php 
  session_start();
  $text= "../src/html.csv";
  $file = @fopen($text, r);
  if ($file==false)
    die("pb d'ouverture du fichier $text");
  while (!feof($file)) {
    $questions[] = fgetcsv($file,0,";");
  }
  fclose($file);

  $exemple1 = array_slice($questions, 1, 4);

?>
   <nav id="logos2">
    <img src="../Image/essailogo.png">
  </nav>  
    <nav id="menu">

    <ul id="phone">
      <li><img id="imgmenu2" src="../Image/menu.png">
        <ul id="afficher" class="ul">
          <li class="menu" id="enlever"><img  id="logo" src="../Image/essailogo.png"> </li>
          <li class="menu"><a href="../index.php">HOME</a></li>
          <li class="menu"><a href="../Contenu-html/HTML.php">HTML</a></li>
          <li class="menu"><a href="../Contenu-css/CSS.php">CSS</a></li>
          <li class="menu"><a href="../Contenu-php/PHP.php">PHP</a></li>
          <li class="menu"><a href="../Contenu-histoire/HISTOIRE.php">HISTOIRE/TIPS</a></li>
          <li class="menu"><a class="connecter" href="../compte/moncompte.php"><?php if(!empty($_SESSION['auth'])){ 
           if(strlen($_SESSION['auth']->username)<=8){ echo $_SESSION['auth']->username;} else {echo "Mon compte";}} else {echo "Mon compte";} ?></a></li>
        </ul>
      </li>
    </ul>
  </nav>
   </nav>
  
<section class="corps">

  <nav class="nav" id="bloc">
    <ul class="ul" id="scroll">
      <li class="menugauche"><a href="#">Introduction au PHP</a></li>
      <li class="menugauche"><a href="#les_bases_php">Les bases</a></li>
      <li class="menugauche"><a href="#boucles_php">Boucles/Conditions</a></li>
      <li class="menugauche"><a href="#chaines_php">Manipuler des chaînes</a></li>
      <li><a href="#tableaux_php">Tableaux</a>
      <li><a href="#fichiers_php">Travailler dans des fichiers</a>
      <li><a href="#QCM_php">Quiz</a></li>
      <li><a href="#RetourEnHaut">Retour en haut</a></li>
    </ul>
  </nav>

  <article> 
    <!--<h1>PHP</h1>!-->
     <center><img class="topimgarticle" src="../Image/articles/php.png"> </center></br>
      <h3 id="titreintermediaire">Introduction & Historique</h3>
        <br>

        <p  id="textall">Le PHP est un langage de programmation accompagné de code HTML afin de produire des pages web dynamiques. C’est exactement pour cette raison que vous devriez commencer par les cours sur la programmation en HTML et en CSS pour avoir le minimum de connaissances nécessaires avant de commencer ce cours.</br>
        Le PHP est un langage interprété. Il n’y a pas de compilations et donc pas de code exécutable.</br>
        Vous le comprendrez donc son avantage est avant tout sa portabilité car le PHP fonctionne sur différents systèmes.</br>
        Cependant le PHP est un des langages les plus lents car il doit traduire pas à pas.</br>
        Changement : l’extension du site passe de index.html à index.php même si on pourra continuer à utiliser les balises html dans le script.</p>
        <br>
        <p id="textall">Le PHP fut créé en 1994 sous le nom de PHP/FI par Rasmus Lerdorf. Au début c’était un simple jeu de binaires écrit en C. PHP signifie "Personal Home Page" et FI "Forms Interpreter". PHP fut un franc succès et son créateur décida par la suite de développer son script pour y ajouter des fonctions, des bases de données. En 1995 Rasmus décida de publier son code au grand public afin de laisser la possibilité d’utiliser et de profiter à tous les utilisateurs.</br>
        Un peu plus tard en 1997 deux étudiants, Andi Gutmans et Zeev Suraski redéveloppe le cœur de PHP/FI qui devient PHP (Hypertext Preprocessor). Peu de temps après ils écrivent un nouveau moteur interne pour le PHP qui servira de base à la version 4 de PHP.</br>
        Aujourd’hui nous en sommes à la version 7, 7.3.1 pour être plus précis qui est sortie le 10 Janvier 2019. Entre il y a eu la modification du modèle objet interne, la refonte du noyau puis tout un tas de choses utiles pour améliorer ces performances.</br>
        Maintenant que vous êtes incollables sur le PHP commençons par les bases dans le cours suivant.</br>

</div>

<div id="les_bases_php">
</div>
      <h3 id="titrepartie">Les bases</h3>
        <br>
        <p id="textall">Le code PHP est souvent intégré à une page HTML</br>
        Pour l’intégrer à une balise HTML il suffit juste d’ajouter la balise ouvrante « < ?PHP » et la balise fermante « ?> ».</br></p>

        <p id="textall">Exemple :</p>
        <br>
          <p id="textall">&lt;!DOCTYPE html&gt;</br>
          &lt;html lang=”fr”&gt;</br>
          &lt;head&gt;</br>
          &lt;title&gt;Mon premier script PHP/title&gt;</br>
          &lt;/head&gt;</br>
          &lt;body&gt;</br>
          &lt;?PHP</br>
          echo "Hello World ! \n";</br>
          ?&gt;</br>
          &lt;/body&gt;</br>
          &lt;/html&gt;</br>
          &lt;/code&gt;</p>
        <br>
        <img src="../Image/exemple/exemplehtml.PNG">
        <br>
        <p id="textall">Comme vous l’aurez compris “echo” permet d’écrire sur notre site web ainsi fini les répétitions pour afficher des listes !</br>
        On aurait très bien pu mettre</br>
        "echo "&lt;p&gt;Hello World !&lt;/p&gt;";".</br>
        Toutes les balises HTML peuvent être utilisés dans un script PHP.</p>
        <br>
        <p id="textall">Pour commenter il suffit juste de mettre "//" ou bien pour commenter sur plusieurs lignes "/* */".</p>
        <br>
        <p id="textall">Le PHP n’utilise que quatre types de variable qui sont :</br>
        -boolean (true ou false)</br>
        -integer (Pour les chiffres entiers)</br>
        -double (Qui comprend aussi les float)</br>
        -string (Pour les chaînes de caractères car char n’existe plus)</p>
        <br>
        <p id="textall">Pour faire appel à une variable il suffit de mettre "$" devant chaque variable.</br>
        $age = 18;</br>
        echo $age;</p>
        <br>
        <img src="../Image/exemple/exemplevariable.PNG">
        <br>
        <p id="textall">"var_dump" vous permet d’afficher les informations d’une variable.</br>
        $age = 18;</br>
        var_dump($age);</p>
        <br>
        <img src="../Image/exemple/exemplevardump.PNG">
        <br>
        <p id="textall">Alors que la commande "gettype" retourne seulement le type</br>
        $pi = 3.14;</br>
        echo gettype($pi);</p>
        <br>
        <img src="../Image/exemple/exemplegettype.PNG">
        <br>
        <p id="textall">On peut changer le type d’une variable en utilisant "settype($variable, "type")". Si vous avez une variable double de valeur 1.3333 et que vous la transformez en integer elle prend alors la valeur 1 !</p>
        <br>
        <p id="textall">Les constantes sont globales et très utiles pensez à les utiliser dès que vous pouvez !</br>
        define("AGEMAXENCE", 10);</br>
        echo $AGEMAXENCE;</p>
        <br>
        <img src="../Image/exemple/exempleconstante.PNG">
        <br>
        <p id="textall">Pour afficher du texte il y a différentes façons, le "." permet d’ajouter quelque chose après une première partie de texte. Le " "" " affiche les variables cependant le " ' ' " ne les affiche pas. Essayez avec les codes suivants :</br>
        $test = 18;</br>
        echo  "J’ai $test ans";</br>
        echo 'J’ai $test ans';</br>
        echo 'J’ai'.$test.'ans';</p>
        <br>
        <img src="../Image/exemple/exempleaffichertexte.PNG">
        <br>
        <p id="textall">Pour annuler un « " » il suffit de mettre un "\" devant.</br>
        Il existe d’autres caractères spéciaux dont je vous donne la liste à vous de les essayer :</br>
        -\n</br>
        -\r</br>
        -\t</br>
        -\\</br>
        -\$</br>
        -\’</p>
        <br>
        <p id="textall">Il faut retenir cependant que si un booléen est affiché, si le résultat est false alors rien ne sera affiché ! True affiche "1".</p>
        <br>
        <p id="textall">Pour récupérer une saisie utilisateur il suffit d’utiliser « trim(fgets(STDIN)) »</br>
        echo "Entrez un nombre :";</br>
        $reponse = trim(fgets(STDIN));</p>
        <br>
        <img src="../Image/exemple/exemplesaisie.PNG">
        <br>
        <p id="textall">Puis tous les opérateurs déjà connus :</br>
        " + , -  , / , % , * , ++ , -- , < , > , = , <= , >=  , != , && , || ".</p>
        <br>

<div id="boucles_php">
</div>
      <h3 id="titreintermediaire">Boucles/Conditions</h3>
        <br>
        <p id="textall">Le "if" permet de vérifier une condition :</br>
        Ici on veut que l’âge de notre visiteur soit supérieur à 24 ans et inférieur à 80.</br>
        echo "Votre âge s’il vous plaît :\n";</br>
        $age = trim(fgets(STDIN));</br>
        if($age <= 24 || $age >= 80){</br>
        echo "Vous ne pouvez accéder au site\n";</br>
        }</br>
        else{</br>
        echo "Bienvenue !\n";</br>
        }</p>
        <br>
        <img src="../Image/exemple/exempleif.PNG">
        <br>
        <p id="textall">Le switch s’utilise quand il y a trop de conditions à écrire pour une simple condition "if"</br>
        echo "Bonjour quel mois sommes-nous ?\n";</br>
        $mois = trim(fgets(STDIN));</br>
        switch($mois){</br>
        case "Janvier" :</br>
        echo "Vive la Galette !\n";</br>
        break;</br>
        case …</br>
        …</br>
        break;</br>
        default :</br>
        echo "Erreur !\n";</br>
        }</p>
        <br>
        <img src="../Image/exemple/exempleswitch.PNG">
        <br>
        <p id="textall">La boucle "for" est similaire au C mais pas besoin de déclarer $i !</br>
        for($i=0 ;$i&lt; 3 ;$i++){</br>
        echo $i;</br>
        }</p>
        <br>
        <img src="../Image/exemple/exemplefor.PNG">
        <br>
        <p id="textall">La boucle "while" permet d’exécuter ce qu’il y a à l’intérieur tant que la condition n’est pas remplie.</br>
        define("MIN", 19);</br>
        $reponse = 0;</br>
        while($reponse < MIN){</br>
        echo "Rentrez votre age:\n";</br>
        $reponse = trim(fgets(STDIN));</br>
        }</br>
        echo "Vous avez l’age\n";</p>
        <br>
        <img src="../Image/exemple/exemplewhile.PNG">
        <br>
<div id="chaines_php">
</div>
      <h3 id="titreintermediaire">Manipuler des chaînes</h3>
      	<br>
        <p id="textall">Voici une liste de chaînes utiles pour coder en PHP, cependant si vous n’en comprenez pas une de vous-même nous ne pouvons que vous conseillez de regarder la documentation officielle (En tapant dans la barre de recherche l’élément dont vous voudriez des précisions). Dans la liste suivante la variable $prenom est "alexis".</br>
        <br>
        <p id="textall">$nb = strlen($prenom) ; //Met le nombre de caractères contenus dans $prenom dans la variable $nb ($nb = 6)</br>
        $prenomenMaj = strtoupper($prenom) //Je pense que vous comprenez facilement ici pas besoin d’explications</br>
        $prenomenMin = strtolower($prenom) //Presque la même</br>
        $prenomAvecPremiereLettreMaj = ucfirst($prenom) //Tout est dans la variable ($prenomAvecPremiereLettreMaj = "Alexis")</br>
        $prenomAvecPremiereLettreMin = lcfirst($prenom) //Once again but the opposite</br>
        echo substr($prenom,2,2) //Ici affiche "ex"</br>
        echo substr($prenom,0) //Ici affiche "alexis"</br>
        echo strpos($prenom, "l"); //Affiche la position du caractère choisi (Donc ici "1")</br>
        Et bien d’autres sur http://php.net/manual/fr/</p>
        <br>
<div id="fonctions_php">
</div>
      <h3 id="titreintermediaire">Les fonctions</h3>
        <p id="textall">Pour créer sa propre fonction il faut mettre une signature puis la fonction.</br>
        Ensuite il suffira juste de l’appeler dans le code pour gérer des scripts plus longs avec le moins de lignes possibles.</p>
        <br>
        <p id="textall">//void direBonjour( )</br>
        function direBonjour( ){</br>
        echo "Bonjour \n";</br>
        }</br>
        //Dans le code :</br>
        direBonjour() ;</br>
        Vous pouvez retourner une valeur d’une fonction grâce au "return".</p>
        <br>
        <img src="../Image/exemple/exemplefonction.PNG">
        <br>
<div id="filtre_php">
</div>
      <h3 id="titreintermediaire">Filtrer des saisies utilisateurs</h3>
      	<br>
        <p id="textall">Deux possibilités :</br>
        -Le "filter_var"</br>
        -Le "preg_match"</p>
        <br>
        <p id="textall">Le "filtar_var" contient des fonctions prédéfinis pour vérifier les saisies :</br>
        echo "Mail ?\n";</br>
        $mail = trim(fgets(STDIN));</br>
        $mail = filter_var($mail,FILTER_VALIDATE_EMAIL);</br>
        if($mail === false)</br>
        echo "pb";</p>
        <br>
        <img src="../Image/exemple/exemplefiltervar.PNG">
        <br>
        <p id="textall">Voici la liste des filter disponible :</br>
        -FILTER_VALIDATE_BOOLEAN</br>
        -FILTER_VALIDATE_INT</br>
        -FILTER_VALIDATE_FLOAT</br>
        -FILTER_VALIDATE_EMAIL</br>
        -FILTER_VALIDATE_IP</br>
        -FILTER_VALIDATE_MAC</br>
        -FILTER_VALIDATE_URL</p>
        <br>
        <p id="textall">Le "preg_match" n’a donc aucunes fonctions prédéfinies. Il faut donc dire tout ce que l’on souhaite filtrer pour avoir un résultat.</br>
        Imaginons que nous ayons comme variable $phrase "Bonjour à vous le PHP c’est sympa" :</br>
        $res correspond à la variable qui récupère le résultat du "preg_match"</br>
        $res = preg_match("/PHP$/", $phrase); //Analyse si la phrase finit par PHP (Fin = $)</br>
        $res = preg_match("/^PHP/", $phrase); //Analyse si la phrase commence par PHP (Début = ^)</br>
        $res = preg_match("/^PHP$/", $phrase); //Analyse si la phrase contient seulement PHP</br>
        <br>
        <img src="../Image/exemple/exemplepregmatch.PNG">
        <br>
        Autres exemples de preg_match :</br>
        ^[a-z]$ //1 caractère compris entre a et z</br>
        ^[^a-z]$ //1 caractère non compris entre a et z</br>
        [a-z]$ //chaîne qui finit par un caractère compris entre a et z</br>
        ^[a-z] //chaîne qui commence par un caractère compris entre a et z</br>
        ^[az]$ //1 caractère soit a soit z</br>
        ^[0-9]$ //1 caractère compris entre 0 et 9</br>
        [a-z]+ //chaîne avec un ou plusieurs caractères compris entre a et z</br>
        ^[a-z]+ $ //chaîne constituée uniquement de caractères compris entre a et z</br>
        ^[0-9]{2}$ //2 chiffres</p>
        <br>
<div id="tableaux_php">
</div>
      <h3 id="titreintermediaire">Tableaux</h3>
      	<br>
        <p id="textall">Il existe deux types de tableaux : les tableaux associatifs et les tableaux classiques.</p>
        <br>
        <p id="textall">Comment faire un tableau ? Un tableau sert déjà à rentrer plusieurs valeurs qui seront stockés à un endroit précis où l’on pourra par la suite utiliser les données ou les modifier.</br>
        Voici comment déclarer un tableau classique :</br>
        $notes[0] = 10;</br>
        $notes[1] = 12;</br>
        $notes[2] = 08;</br>
        Ici nous aurons un tableau contenant les trois valeurs 10,12 et 08.</br>
        Il y a aussi plus simple :</br>
        $notes = array(10,12,08);</br>
        Puis les tableaux associatifs :</br>
        $notes["Maths"] = 10;</br>
        $notes["Geo"] = 12;</br>
        $notes["Communication"] = 08;</br>
        Pareil pour la solution plus simple :</br>
        $notes = array("Maths"=>10, "Geo"=>12, "Communication"=>08);</br>
        <br>
        <img src="../Image/exemple/exempletableaux.PNG">
        <br>
        Il existe des fonctions utiles pour pouvoir manipuler les tableaux que nous allons voir dans cette seconde partie :</p>
        <br>
        <p id="textall">Le "count" permet de connaitre la taille d’un tableau, il sera stocké dans une variable et sera utile pour afficher toutes les valeurs d’un tableau avec l’exemple ci-dessous :</br>
        $notes = array(10,12,08);</br>
        $nb = count($notes);</br>
        for($i=0;$i<$nb;$i++)</br>
        echo $notes[$i]. "\n";</p>
        <br>
        <img src="../Image/exemple/exemplecount.PNG">
        <br>
        <p id="textall">Le "foreach" permet de récupérer les valeurs et/ou clés d’un tableau. Un exemple ou l’on affiche les notes comme précédemment :</br>
        $notes = array(10,12,08);</br>
        foreach($notes as $note)</br>
        echo $note."\n";</br>
        Plus compliqué mais avec les clés ce coup-ci :</br>
        $notes = array("Maths"=>10,"Geo"=>12,"Communication"=>08);</br>
        foreach($notes as $cle => $valeur)</br>
        echo "$cle : $valeur\n";</p>
        <br>
        <img src="../Image/exemple/exempleforeach.PNG">
        <br>
        <p id="textall">"print_r" est très pratique car il renvoie l’affichage du tableau sélectionné :</br>
        print_r($notes);  //A vous de voir le résultat</p>
        <br>
        <p id="textall">Vous pouvez utiliser les opérateurs sur les tableaux mais on vous laisse le plaisir de les découvrir en même temps que la liste de fonctions ci-dessous (il vous suffit de changer $tab1 et $tab2 par des tableaux) et rappelons-le la doc officielle reste votre amie :</br>    
        -array_merge($tab1,$tab2)</br>
        -array_intersect($tab1,$tab2)</br>
        -$max = max($tab1)</br>
        -$min = min($tab1)</br>
        -$moy = array_sum($tab1)</br>
        -in_array("valeur", $tab1)</br>
        -array_search</br>
        -array_keys</br>
        -sort</br>
        -asort</br>
        -array_unique</br>
        -array_values</br>
        -explode</p>
        <br>
        <p id="textall">Les tableaux peuvent être passé en paramètres de fonctions et c’est bon à savoir !</p>
        <br>
        <p id="textall">Vous pouvez aussi faire des tableaux à plusieurs dimensions :</br>
        $notes = array("Maths"=> array("DS1"=>10,"DS2"=>12),</br>
        "Prog"=> array("DS1"=>08,"DS2"=>12));</p>
        <br>
        <img src="../Image/exemple/exempletableauxdimensions.PNG">
        <br>
<div id="fichiers_php">
</div>
      <h3 id="titreintermediaire">Travailler dans des fichiers</h3>
      	<br>
        <p id="textall">Dans ce cours nous apprendrons à utiliser des fichiers pour y stocker des informations ou bien les lire.</p> 
        <br>
        <p id="textall">Pour modifier ou lire un fichier il faut toujours l’ouvrir et le refermer avec :</br>
        $file = fopen("fichier.txt", "mode");</br>
        fclose($file);  //Ne fonctionne pas car je vous explique le mode ensuite</p>
        <br>
        <img src="../Image/exemple/exemplefichier.PNG">
        <br>
        <p id="textall">On ouvre le fichier avec fopen donc. On le lit avec fgets/fgetscsv/fscanf/file_get_contents, et l’on écrit avec fwrite/ fputscsv/fprintf.</p>
        <br>
        <p id="textall">Pour les modes il faut remplacer mode par les lettres suivantes :</br>
        -"r" Lecture seule, pointeur au début du fichier</br>
        -"r+" Ecriture en plus</br>
        -"w" Ecriture en mettant à 0 le fichier (Création si inexistant)</br>
        -"w+" Lecture en plus</br>
        -"a" Ecriture pointeur à la fin (Création si inexistant)</br>
        -"a+" Lecture en plus</br>
        -"x, x+" Ecriture, crée le fichier, retourne false si existe déjà</br>
        -Et bien d’autres mais moins utiles</p>
        <br>
        <p id="textall">Une boucle bien utile pour lire le fichier ligne par ligne tant que le pointeur n’est pas à la fin :</br>
        while( !feof($file)){</br>
        $ligne = fgets($file);</br>
        echo $ligne;</br>
        }</p>
        <br>
        <img src="../Image/exemple/exemplewhilefeof.PNG">
        <br>
        <p id="textall">Bien d’autres fonctions existent pour les fichiers mais je pense avoir donné le plus important, et nous arrivons à la fin du cours sur le PHP je vous laisse passer au QCM de fin pour vérifier vos connaissances.</p>
        <br>

      <div id="QCM_php"></div>
      	

      <form id="QR" method="post" action="index.php">
    <?php 
      $point=0;
      $questionrep = array('Question1' => array('types'=>'checkbox','questions'=> 'Soit le tableau $notes = array(10,15,12); que fais la commande "echo $notes[1]" ?','reponses'=>array('1r1'=>'Elle affiche le tableau $notes','1r2'=>'Elle affiche 15','1r3'=>'Elle affiche 10','1r4'=>'Elle n\'affiche rien'),'reponseCorrect'=>'Elle affiche 10'), 'Question2' => array('types'=>'text','questions'=> 'Déclarez la commande pour dire "bonjour" :','reponseCorrect'=>'echo("bonjour");'),'Question3' => array('types'=>'checkbox','questions'=> 'Quelle extension faut-il mettre à la fin de son fichier HTML pour le passer en PHP :','reponses'=> array('3r1'=>'.html','3r2' => '.php/fi' , '3r3'=>'.php'),'reponseCorrect'=>'.php'),'Question4' => array('types' => 'text' , 'questions' => 'Dans fputs/fputcsv, quel mode mettre pour écrire en fin de fichier (répondre sans guillemets !):', 'reponseCorrect' => 'a'),'Question5' => array('types'=>'checkbox','questions' => 'Lequel ne contien pas de fonctions prédéfinies pour filtrer les saisies utilisateurs:' , 'reponses' => array('5r1'=>'filter_var','5r2'=>'array_unique','5r3'=>'preg_match','5r4'=>'array_keys'),'reponseCorrect'=>'preg_match'),'Question6' => array('types'=>'checkbox','questions' => 'En quelle année est apparu le PHP ?' , 'reponses' => array('6r1'=>'1964','6r2'=>'1994','6r3'=>'1995','6r4'=>'2005'),'reponseCorrect'=>'1994'),'Question7' => array('types'=>'radio','questions' => 'Est-ce important de mettre fclose($fichier); à la fin de son code après avoir ouvert un fichier ?' , 'reponses' => array('7r1'=>'Oui','7r2'=>'Non','7r3'=>'Surement mais j’ai sauté cette partie du cours (Vous savez que cela ne sera jamais la bonne réponse)'),'reponseCorrect'=>'Oui'),'Question8' => array('types'=>'radio','questions' => 'Ce cours vous a-t-il été utile (Point facile si vous êtes un minimum sympa avec nous) ?' , 'reponses' => array('8r1'=>'Oui','8r2'=>'Non'),'reponseCorrect'=>'Oui'));

      include_once('../fonctions/fonctions.php');
      echo "<div id=\"questionnaire\">Questions :";
      echo afficheQuestion($questionrep['Question1'],'Q1');
      if (!empty($_POST)) {
        $point+=verificationReponse($questionrep,'1');
        echo "$point";
      }

      echo afficheQuestion($questionrep['Question2'],'Q2');
      if (!empty($_POST)) {
        $point+=verificationReponse($questionrep,'2');
        echo "$point";
      }

      echo afficheQuestion($questionrep['Question3'],'Q3');
      if (!empty($_POST)) {
        $point+=verificationReponse($questionrep,'3');
        echo "$point";
      }

      echo afficheQuestion($questionrep['Question4'],'Q4');
      if (!empty($_POST)) {
        $point+=verificationReponse($questionrep,'4');
        echo "$point";
      }

      echo afficheQuestion($questionrep['Question5'],'Q5');
      if (!empty($_POST)) {
        $point+=verificationReponse($questionrep,'5');
        echo "$point";
      }

      echo afficheQuestion($questionrep['Question6'],'Q6');
      if (!empty($_POST)) {
        $point+=verificationReponse($questionrep,'6');
        echo "$point";
      }

      echo afficheQuestion($questionrep['Question7'],'Q7');
      if (!empty($_POST)) {
        $point+=verificationReponse($questionrep,'7');
        echo "$point";
      }

      echo afficheQuestion($questionrep['Question8'],'Q8');
      if (!empty($_POST)) {
        $point+=verificationReponse($questionrep,'8');
        echo "$point";
      }

      echo "</div>";

     ?>



    <p>
      <?php 
      if (empty($_POST)) {
        echo "<input type=\"submit\" id=\"Confirmer\" value=\"Confirmer\">";
      }
        ?>
    </p>


  </form>

    <?php 
      if (!empty($_POST)) {
        echo "<form method=\"link\" action=\"index.php\">";
        echo "<input type=\"submit\" id=\"Continuer\" value=\"Continuer\"> ";
        echo "</form>";
      }
     ?>
    
  </article>
</section>

<footer>

<div class="gauche">
<nav id="groupe">
  <h4>Faits par :</h4>
    <ul>
      <li>Alexis VANHOUTTE</li>
      <li>Mathis FIGUET</li>
      <li>Dorian CAULIREAU</li>
      <li>Edgar BRAND</li>
      <li>Léonardo SOUSA MORAIS</li>
      <li>Elias PODER</li>
    </ul>
  </nav>
</div>

<div class="droite">
  <span class="reseau">
    <h4>Contactez nous :</h4>
    <span class="insta">
      <a href="https://www.instagram.com/prog4beginners/?hl=fr" title="Instagram" class="fa fa-instagram" href="https://www.youtube.com/watch?v=BQ58peKDq3o"></a>
    </span>
    <span class="fb">
      <a href="https://www.facebook.com/Prog4Beginners-346668622585826/?epa=SEARCH_BOX" title="Facebook" class="fa fa-facebook"></a>
    </span>
  </span>
</div>

<div class="img">
  <img src="../Image/essailogo.png">
</div>
  <h2 class="copyright">&copy;prog4beginners 2019</h2>
</footer>


</body>
</html>