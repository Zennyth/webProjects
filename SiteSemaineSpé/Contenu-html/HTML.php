<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../Css/style.css">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <title>P4B - Apprendre le HTML</title>
  <link rel="icon" href="../Image/favicon.ico" />
</head>
<body>
  <?php session_start(); ?>
  <?php 
  $text= "../src/html.csv";
  $file = @fopen($text, r);
  if ($file==false)
    die("pb d'ouverture du fichier $text");
  while (!feof($file)) {
    $questions[] = fgetcsv($file,0,";");
  }
  fclose($file);

  $exemple1 = array_slice($questions, 0, 4);
  $exemple2 = array_slice($questions, 5, 5);
  $exemple3 = array_slice($questions, 10, 1);
  $exemple4 = array_slice($questions, 12, 6);
  $exemple5 = array_slice($questions, 19, 1);
  $exemple6 = array_slice($questions, 21, 2);
  $exemple7 = array_slice($questions, 24, 3);
  $exemple8 = array_slice($questions, 28, 1);
  $exemple9 = array_slice($questions, 30, 3);
  $exemple10 = array_slice($questions, 34, 2);
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
          <li class="menu"><a href="HTML.php">HTML</a></li>
          <li class="menu"><a href="../Contenu-css/CSS.php">CSS</a></li>
          <li class="menu"><a href="../Contenu-php/PHP.php">PHP</a></li>
          <li class="menu"><a href="../Contenu-histoire/HISTOIRE.php">HISTOIRE/TIPS</a></li>
          <li class="menu"><a class="connecter" href="../compte/moncompte.php"><?php if(!empty($_SESSION['auth'])){ 
           if(strlen($_SESSION['auth']->username)<=8){ echo $_SESSION['auth']->username;} else {echo "Mon compte";}} else {echo "Mon compte";} ?></a></li>
         </ul>
       </li>
     </ul>
   </nav>

   <section class="corps">

    <nav class="nav" id="bloc">
      <ul class="ul" id="scroll">
        <li class="menugauche"><a href="#histoire">L'histoire du HTML</a></li>
        <li class="menugauche"><a href="#quiz1">Premier Quiz</a></li>
        <li class="menugauche"><a href="#partie1">I - Structure simple</a></li>
        <li class="menugauche"><a href="#partie2">II - Balises utiles</a></li>
        <li class="menugauche"><a href="#partie3">III - Les balises d'approndisement</a></li>
        <li class="menugauche"><a href="#quiz2">Second Quiz</a></li>
        <li class="menugauche"><a href="HTML.php">Retour en haut</a></li>
      </ul>
    </nav>

    <article>
      <?php 
      include '../fonctions/functions.php';  
      ?> 
      <div id="histoire">
  <!--
   <p id="titrearticles">Apprendre l'histoire du HTML pour le comprendre</br></br></p>!-->
   <center><img class="topimgarticle" src="../Image/articles/html.png"> </center></br>

   <ul class="Objectifs">

    <h3>Prérequis</h3>
    <li>Aucun prérequis est nécessaire pour cette formation seul une bonne dose de motivation vous seras utile ! </li>
  </ul>
  <p id="textall">Dans cette partie du cours nous allons voir un langage très important pour la programmation web, le HTML, mais avant de comprendre comment l’utiliser, il pourrait être important de connaître l’histoire de ce langage. </p>
  <p id="titrearticles">Historique du HTML </p>
  <p id="titrepartie">Tim Berners-Lee  le roi du HTML</p>
  <p id="textall">Pour cela, revenons dans les années 1989, un informaticien « Tim Berners-Lee » invente le World Wide Web. Mais vous allez nous dire ? Quel est le rapport entre le WWW et le HTML? Pour faire simple, le html est une des trois inventions du WWW. Le HTML est ici un lange de balise, qui permet la création simple de site web. La toute première version de HTML comprend titre de document, simple structuration de texte, sous-titre, liste et encore simple texte brut. 
    Tim Berners-Lee n’a pas créé le HTML de toutes pièces, il se base sur SGML (Standart Generalized Markup Language), un langage généraliste de balise standard. Mais là n’est pas le sujet ! 
  </p>
  <p id="titrepartie">Les années 1990 : Terrain de bataille </p>
  <p id="textall">Revenons à nos moutons, à la fin des années 1993, la première version du HTML voit un effet de normalisation ! A ce moment on l’appelle le « HTML + ».
  Pendant tout ce temps, et ce jusqu’à l’arrivée, de NCSA Mosaic, les possibilités du HTML sont très limitées, vu que c’est le navigateur en lui-même qui définit son implantation. NCSA Mosaic, est le premier navigateur à offrir l’implantation des images et l’introduction des formulaires.</p>
  <p id="titrepartie">La concurrence qui aide le développement</p>
  <p id="textall">La concurrence entre les navigateurs est rude (je vous invite à voir notre article sur la concurrence des navigateurs), en novembre 1993 Netscape Navigator, sort la version 0.9 qui permet l’ajout de multiples éléments comme les attributs, le centrage et bien d’autres ! Ces éléments paraissent aujourd’hui dérisoires, aujourd’hui les navigateurs prennent en compte le design avec par exemple l’ajout du CSS. 
    Après une version améliorée avec HTML 2.0 en 1995, en décembre 1997 le W3C (World Wide Web Consortium) de Tim Berners-Lee présente la nouvelle version de HTML, la version 4.0, le nouvel élément marquant de cette mise à jour, est la standardisation et la séparation des éléments de structure et de présentation.
    Mais le HTML représente également une période sombre, à toute berzingue, les informaticiens décident de délaisser HTML pour du XHTML !
  De 2000 à 2007 les informaticiens jurent que par ce nouveau langage « révolutionnaire », mais ce n’est qu’en 2007 que l’équipe de notre ami « Tim Berners-Lee » relance (avec l’aide de Microsoft) le développement du HTML.</br>
</p>

</div>

<div id="quiz1">    
  <form id="QR" method="post">
    <?php 
    $questionrep = array('Question1' => array('types'=>'checkbox','questions'=> 'Que signifie WWW ?','reponses'=>array('1r1'=>'Worl Wlide Web','1r2'=>'World Wide Web','1r3'=>'Water Waffle Web'),'reponseCorrect'=>'World Wide Web'),         'Question2' => array('types'=>'text','questions'=>'Le HTML est basé sur le :','reponseCorrect'=>'SGML'),'Question3' => array('types'=>'checkbox','questions'=> 'Entre 2000 et 2007 un nouveau langage est utilisé pour remplacer le HTML :','reponses'=>array( '2r1'=> 'HTML +','2r2'=>'XHTML','2r3'=> 'HTML 3.0'),'reponseCorrect'=>'XHTML'));

    include_once('../fonctions/fonctions.php');
    echo "<div id=\"questionnaire\">Questions :";
    echo afficheQuestion($questionrep['Question1'],'Q1');
    if (!empty($_POST)) {
        // verificationReponse($questionrep,'1');
      verificationReponse($questionrep,'1');

    }
    echo afficheQuestion($questionrep['Question2'],'Q2');
    if (!empty($_POST)) {
        // verificationReponse($questionrep,'1');
      verificationReponse($questionrep,'2');

    }
    echo afficheQuestion($questionrep['Question3'],'Q3');
    if (!empty($_POST)) {
        // verificationReponse($questionrep,'1');
      verificationReponse($questionrep,'3');

    }


    echo "</div>";
    ?>



    
  ?>






  <p>
    <?php 
      /*if (empty($_POST)) {
        echo "<input type=\"submit\" id=\"Confirmer\" value=\"Confirmer\">";
      }*/
      ?>
    </p>


  </form>

  <?php 
      /*if (!empty($_POST)) {
        echo "<form method=\"link\" action=\"Astuce1.php\">";
        echo "<input type=\"submit\" id=\"Continuer\" value=\"Continuer\"> ";
        echo "</form>";
      }*/
      ?>
    </div>

    <div id="partie1">
    </p>
    <p id="titrearticles">Cours de HTML</p>
    <p id="textall">Le langage HTML est un langage qui repose sur des balises simples : </br>
    Par exemple : &lt;&gt;</br>
  Voici une balise simple. Les balises peuvent être ouvrante, fermante, ou auto fermante.</br>
</p>

<?php codehtml($exemple1) ?>
<p id="textall">L’organisation d’une page html est très importante ! Les balises sont utiles pour organiser et apporter des modifications plus rapidement ! </br>
  Pour commencer nous allons voir les 4 balises les plus importantes pour une page html ! 
</p>
<p id="titrepartie"> 1 - Structure simple d'une page HTML</p>
<p id="soustitrepartie">A - Les balises les plus importantes</p>
<?php codehtml($exemple2) ?>
<p id="soustitrepartie">B - Les paragraphes et titres.</p>
<p id="textall"> Le paragraphe est entre une balise ouvrante et une balise fermante “p”.</p>
<?php codehtml($exemple3) ?>
<p id="textall">Ici pour l’exemple l’antislash (/) représente la fin de la balise.</br>
  Pour les titres il existe déjà des balises prédéfinies.
</p>
<?php codehtml($exemple4) ?>
<p id="textall">L’objectif est d’avoir des titres de plus en plus petit.</br>
Exemple : </p>
<h2> test </h2>
<h3> test </h3>
<h4> test </h4>
<h5> test </h5>
<h6> test </h6>
<p id="soustitrepartie">C -  Les balises qui permettent de commenter un texte </p>
<p id="textall"> Une partie est très importante en programmation : l’explication de notre code.</br>
Le code doit être compris de tous, et doit être modifiable simplement par tous.</br>
Il faut donc commenter notre code c’est-à-dire mettre des commentaires de toutes nos actions.</br>
En HTML on utilise 
</p>
<?php codehtml($exemple5) ?>
</div>
<div id="partie2">
  <p id="titrepartie">2 - Balises utiles</p>
  <p id="soustitrepartie">A - Sauts de lignes</p>
  <p id="textall">Vous allez sans aucun doute écrire des paragraphes sur vos site web. L’utilisation de sauts de ligne sera donc nécessaire ! </p>
  <?php codehtml($exemple6) ?>
  <p id="soustitrepartie">B - Base simple d'une mise en forme</p>
  <p id="textall"> Dans la leçon « css » vous pourrez apprendre pleins de fonction pour modifier textes, images, ou encore d’autres éléments. </br>
  Nous allons ici voir les simples balises utiles pour des effets de style sur votre texte. </br>
Comme sur word, vous allez pouvoir mettre votre texte en gras, en italique, ou encore en exposant. </br>
Voyons donc rapidement ces trois balises : 
</p>
<?php codehtml($exemple7) ?>
<p id="soustitrepartie">C - Les balises liens</p>
<p id="textall">Les balises lien sont très utiles pour relier plusieurs pages entre elle ou encore mettre des liens sur d’autres sites.</br>
  Nous allons éviter le blabla et voir directement son utilisation :
</p>
<?php codehtml($exemple8) ?>
<p id="textall"> Donc nous avons ici une balise fermante, et nous avons pour la première fois un attribut ! 
Mais en fait un attribut c’est quoi ?</br>
L’attribut est utile pour donner des précisions. Pour l’exemple &lt;href&gt; est utile de définir la position du fichier que l’on cherche à relier.
</p>
<p id="textall"> Dans la balise &lt;href=”’”&gt; nous pouvons utiliser deux types de liens</br>
Les liens relatifs, et les liens absolus : </br>
Les liens relatifs sont utilisables uniquement si le lien est une redirection vers votre propre site ! </br>
Par exemple : </br>
Si sur votre serveur vous avez une page index.html.</br>
Si votre lien est une redirection vers une page contact.html dans un fichier contact.</br>
Vous pouvez avoir : </br>
- /contact/index.html -> lien relatif</br>
- www.nomdevotresite.com/contact/contact.html -> lien absolue</br>
Vous comprenez donc que pour un site externe a votre site le lien absolu sera obligatoire ! </br>
Exemple : http://facebook.com/contact</br>
</p>

<p id="soustitrepartie">D - Les balises images</p>
<p id="textall">Un site sans image n’est pas un vrai site ! Pour faire un site attractif, la présence d’image est obligatoire !</br>
Pour cela une balise simple existe : </br>
Pour comprendre voici un exemple :</br> 
&lt;img src=  « votreimage.png » alt=  « photo d’un machin »/&gt;
</br>
Maintenant décortiquons notre code : </br>
- Src : comme vu précédemment elle sert à préciser l’endroit où se trouve le fichier à insérer.</br>
- Alt : sert à afficher un texte si l’image ne s’affiche pas. Très important pour le référencement.

</p>
</div>
<div id="partie3">
  <p id="titrepartie">3 - Les balises "pour aller plus loin"</p>
  <p id="soustitrepartie">A - Les balises pour une meilleure présentation de page</p>
  <?php codehtml($exemple9) ?>

  <p id="soustitrepartie">B - Les balises vidéos</p>
  <p id="textall">Souvent cette nouvelle balise n’est pas utile, l’utilisation des vidéos est premièrement rare sur les sites web, et elles sont souvent hébergées sur des sites comme youtube ou Dailymotion.
    Mais il est tout de même possible de créer son propre lecteur vidéo.
    La structure du code sera la suivante :  
    <?php codehtml($exemple10) ?>
    Il existe 4 types de vidéos prisent en compte 
    - MP4, OGG,WEBM mais le type de vidéo le plus simple reste le simple et le seul compatible pour presque tous les navigateurs.
  </p>


  <p id="soustitrepartie">C - Les autres balises</p>
  <p id="textall"> Il existe d’autres balises comme les balises audio qui vous seront utiles pour ajouter des éléments à votre site web. L’objectif de ce cours n’étant pas d’approfondir totalement le html je vous invite à voir notre page “les liens utiles” ou une multitude de site pourront vous aider à approfondir vos compétences.</p>


</div>
<div id="quiz2">




  <form id="QR" method="post">
    <?php 
    $questionrep = array('Question1' => array('types'=>'text','questions'=>'&lt;p&gt; est une balise qui est','reponseCorrect'=>'ouvrante'),'Question2' => array('types'=>'checkbox','questions'=> '&lt;h1&gt; représente','reponses'=>array('1r1'=>'Un titre','1r2'=>'Le plus grand titre de base','1r3'=>'Une structure de commentaire'),'reponseCorrect'=>'Le plus grand titre de base'),'Question3' => array('types'=>'radio','questions'=> 'Pour commenter une partie de code en HTML on utilise #','reponses'=> array('3r1'=>'Vrai', '3r2'=>'Faux'),'reponseCorrect'=>'Faux'),'Question4' => array('types'=>'text','questions'=>'Pour mettre un texte en gras en html on utilise la balise','reponseCorrect'=>'strong'),'Question5' => array('types'=>'checkbox','questions'=> 'La balise &lt;footer&gt; est utile pour','reponses'=>array('5r1'=>'Insérér une image','5r2'=>'Indiquer un pied de page','5r3'=>'Indiquer une portion comme &lt;article&gt;'),'reponseCorrect'=>'Indiquer un pied de page'));

    include_once('../fonctions/fonctions.php');
    echo "<div id=\"questionnaire\">Questions :";
    echo afficheQuestion($questionrep['Question1'],'Q1');
    if (!empty($_POST)) {
        // verificationReponse($questionrep,'1');
      verificationReponse($questionrep,'1');

    }
    echo afficheQuestion($questionrep['Question2'],'Q2');
    if (!empty($_POST)) {
        // verificationReponse($questionrep,'1');
      verificationReponse($questionrep,'2');

    }
    echo afficheQuestion($questionrep['Question3'],'Q3');
    if (!empty($_POST)) {
        // verificationReponse($questionrep,'1');
      verificationReponse($questionrep,'3');

    }
    echo afficheQuestion($questionrep['Question4'],'Q4');
    if (!empty($_POST)) {
        // verificationReponse($questionrep,'1');
      verificationReponse($questionrep,'4');

    }

    echo afficheQuestion($questionrep['Question5'],'Q5');
    if (!empty($_POST)) {
        // verificationReponse($questionrep,'1');
      verificationReponse($questionrep,'5');

    }


    echo "</div>";
    ?>



    <p>
      <?php 
      if (empty($_POST)) {
        echo "<input type=\"submit\" id=\"Confirmer\" value=\"Confirmer\" action=\"#quiz2\">";
      }
      ?>
    </p>


  </form>

  <?php 
  if (!empty($_POST)) {
    echo "<form method=\"link\" action=\"#quiz2\">";
    echo "<input type=\"submit\" id=\"Continuer\" value=\"Continuer\"> ";
    echo "</form>";
  }
  ?>





</div>







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