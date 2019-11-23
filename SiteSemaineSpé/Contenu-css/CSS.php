<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../Css/style.css">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <title>P4B - Apprendre le CSS</title>
  <link rel="icon" href="../Image/favicon.ico" />
</head>
<body>
<?php session_start(); ?>
<?php 
  $text= "../src/css.csv";
  $file = @fopen($text, r);
  if ($file==false)
    die("pb d'ouverture du fichier $text");
  while (!feof($file)) {
    $questions[] = fgetcsv($file,0,";");
  }
  fclose($file);

  $text= "../src/htmlcss.csv";
  $file = @fopen($text, r);
  if ($file==false)
    die("pb d'ouverture du fichier $text");
  while (!feof($file)) {
    $questions2[] = fgetcsv($file,0,";");
  }
  fclose($file);
  /*Exemple html*/
  $exemple1 = array_slice($questions2, 1, 1);
  $exemple3html = array_slice($questions2, 3, 2);
  /*Exemple css*/
  $exemple2 = array_slice($questions, 1, 3);
  $exemple3 = array_slice($questions, 5, 5);
  $exemple4 = array_slice($questions, 11, 5);
  $exemple5 = array_slice($questions, 17, 8);
  $exemple6 = array_slice($questions, 26, 4);
  $exemple7 = array_slice($questions, 31, 5);
  $exemple8 = array_slice($questions, 37, 7);
  $exemple9 = array_slice($questions, 45, 6);

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
        <li class="menu"><a href="CSS.php">CSS</a></li>
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
      <li class="menugauche"><a href="#histoire">L'histoire du CSS</a></li>
      <li class="menugauche"><a href="#quiz1">Premier Quiz</a></li>
      <li class="menugauche"><a href="#partie1">I - Les bases du CSS</a></li>
      <li class="menugauche"><a href="#partie2">II - Structure de base</a></li>
      <li class="menugauche"><a href="#partie3">III - Effet de style</a></li>
      <li class="menugauche"><a href="#quiz2">Second Quiz</a></li>
      <li class="menugauche"><a href="CSS.php">Retour en haut</a></li>
    </ul>
  </nav>

  <article>

    <?php 
    include '../fonctions/functions.php';  
    ?> 
    
<div id="histoire">
   <!-- <p id="titrearticles">Apprendre l'histoire du CSS pour le comprendre</br></br></p>!-->

    <center><img class="topimgarticle" src="../Image/articles/css.png"> </center></br>

    <ul class="Objectifs">

    <h3>Prérequis</h3>
        <li>Attention, prérequis, pour voir ce cours de CSS3 il faudra obligatoirement prendre connaisance du cours HTML 5</li>
  </ul>

  <p id="titrearticles">Historique du CSS </p>
  <p id="texteall">Vous avez normalement lors d’un précédent cours appris les bases du HTML, mais vous le savez sans aucun doute, du html sans du css, c’est … nous pourrions trouver de multiples superlatifs : moche, contre-intuitif. Bref du html c’est comme un père noël avec un bonnet rouge : c’est la base !
  Mais le CCS c’est quoi ? Scientifiquement le CSS c’est le « Cascading Style Sheets » c’est-à-dire en langue compréhensible des feuilles de style en cascade ! Et dans le principe, l’objectif du CSS est de pouvoir faire de la mise en page d’une page WEB ! Il a été initialement créé dans les années 1990 par W3C, et il a fallu attendre les années 2000 pour que le CSS soit pris en charge par tous les navigateurs. La première version de css ne permet pas réellement la mise en page, mais uniquement de la mise en style (couleur, police …). Pour avoir une réelle mise en page il faudra attendre 1998 pour que la seconde version de CSS propose 70 nouvelles propriétés. Mais cette nouvelle version du CSS pose beaucoup de problèmes dans l’implantation. C’est pourquoi en 1999 une nouvelle version du CSS rentre en production : le CSS3 ! Il faudra plus de 10 ans de développement pour avoir finalement une version stable et depuis, cela ne cesse d’évoluer depuis plus de 10 ans ! 
  </p>
</div>

<div id="quiz1">
  <h1> Après cela, vous pouvez faire ce mini-quiz </h1>
  <form id="QR" method="post">
    <?php 
      $questionrep = array('Question1' => array('types'=>'checkbox','questions'=> 'Que signifie CSS :','reponses'=>array('1r1'=>'Cascading Super Style','1r2'=>'Color Style Sheets','1r3'=>'Cascading Style Sheets', '1r4'=>'Color Super Style'),'reponseCorrect'=>'Cascading Style Sheets'));

      include_once('../fonctions/fonctions.php');
      echo "<div id=\"questionnaire\">Questions :";
      echo afficheQuestion($questionrep['Question1'],'Q1');
      if (!empty($_POST)) {
        // verificationReponse($questionrep,'1');
        verificationReponse($questionrep,'1');
     
      }

      
      echo "</div>";
     ?>




</div>
<div id="partie1">

  <p id="titreintermediaire">Cours de CSS</p>
  <p id=textall">Avant de commencer, j’espère que vous avez bien lu l’historique du CSS ! Revenons à nos moutons ! Posons-nous une première question : le CSS comment ça marche ?
Après avoir créé vos balises HTML qui représentent les données de votre site, c’est le moment de mettre en forme. Pour cela comme sur la langage HTML il existe de beaucoup de balises. Ce cours représente uniquement une approche du CSS, le CSS s’apprend avec le temps, beaucoup de temps, essayer et réessayer du code pour progresser à toute vitesse.
</p>

<p id="titrepartie"> 1 - Les Bases du CSS</p>
<p id="soustitrepartie"> A - Relier votre CSS a votre HTML </p>
<p id="textall"> En css tout comme en HTML il faut créer un fichier .css, conventionnellement on appelle ce fichier style.css. Pour inclure le CSS sur votre fichier HTML on utilise la balise auto fermante &lt;link &gt;</p></br>
<?php codehtmlcss($exemple1)?>

<p id="soustitrepartie">B – Structure de base d’une balise css</p>
<p id="textall">La structure d’une balise css est toujours identique, même si sa déclaration est différente, elle sera toujours déclarée de la façon suivante : un sélecteur, une ou plusieurs propriétés, accompagnées de différentes valeurs. Comme dans l’exemple suivant :  </p></br>
<?php codecss($exemple2)?></br>
<p id="textall">Le sélecteur peut représenter plusieurs choses : une balise simple, un identifiant (id) créé par vous-même ainsi qu’une “class” créée également par vous-même.
Les balises simples peuvent être body, p, img, h1 ou tout autre balise de base sur html.
Mais les styles de textes peuvent être différents en fonction de certaines parties de texte, par exemple un h1 peut avoir plusieurs couleurs, pour cela on utilise des identifiants et des classes. </br>
Pour cela à l’intérieur de votre HTML vous devez les indiquer : 
</p><br>
<?php codehtmlcss($exemple3html)?></br>
<?php codecss($exemple3)?></br>



<p id="textall">Pour donner ces informations sur votre css il faudra faire</p>
<p> EXEMPLLELELEL </p><br>
<?php codecss($exemple4)?><br>
<p id="textall">C’est à ce moment que vous allez vous dire : Quelle est la différence entre une class ou un id ? 
C’est très simple : si vous pensez que vous allez utiliser sa mise en forme une seule fois, utiliser un id, dans le cas contraire, si vous l’utilisez plusieurs fois utiliser une class. 
</p>
<p id="soustitrepartie">C - Le navigateur contre le CSS</p>
<p id="textall">Lorsque l’on fait du css il faut prendre en compte l’environnement, pour cela il faut savoir que selon le moteur de recherche, le code peut être différent. Voici les différentes balises que vous pourrez utiliser. </p><br>

<?php codecss($exemple5)?><br>
<p id="textall">Exemple</p><br>
<?php codecss($exemple6)?></br>
<p id="textall"> Dans l’exemple, nous avons mis une compatibilité uniquement pour Safari et Opéra, mais vous pouvez installer une compatibilité pour tous.</p>

</div>
<div id="partie2">
<p id="titrepartie">2 - Structure du CSS</p>
<p id="soustitrepartie">A - L'exemple de la mise en place d'un body</p>
<p id=textall> Pour notre premier exemple de structure de CSS nous allons utiliser l’exemple du body, même si nous avons déjà parlé du body au début de notre cours je pense qu’une piqûre de rappel ne fait pas de mal. Le body est donc le corp du site, c’est ici que vous pourrez insérer vos textes ou encore images.</br>
Pour cela, je vais commencer par vous mettre un exemple que je vais ensuite expliciter.</p><br>
<?php codecss($exemple7)?><br>
<p id="textall">Dans cette exemple, tous le body sera de couleur de fond bleu avec une couleur de texte rouge.
</p>

<p id="soustitrepartie">B - Margin et Padding .. Le sauveur de vie</p>
<p id=textall>Le margin et le padding sont très très très utile pour le css. Même si les noms ne sont pas du tout explicites vous allez vite comprendre. Le margin sert a faire une marge, c’est à dire une bordure, extérieur à votre élément. Le padding contrairement au margin sera très utile pour ajouter de l’espace à l'intérieur de vos éléments. </br>
En prenant l’exemple d’une boîte à pizza, le padding et l'intérieur de la boîte (que nous pouvons agrandir pour avoir plus de place), et le margin représente la table où sera posé la PIZZA)
</p>
</div>
<div id="partie3">
<p id="titrepartie">3 - Effet de style sur votre texte</p>
<p id="soustitrepartie">1 - Ombre d'un texte</p>
<p id="textall">Nous allons ici voir rapidement une balise qui peut être utile, une balise que vous devez sans aucun doute connaître étant donné que cette fonctionnalité est disponible sur le pack office (word).</br>
Avant d’expliquer voici un exemple : 
</p><br>
<?php codecss($exemple8)?><br>
<p id="textall"> Pour comprendre nous allons expliquer les trois lignes utilisées : </br>
La première sert à aligner le texte au centre de notre page.
La seconde est utile pour gérer l’ombre sur notre texte, le premier élément est nécessaire pour la direction horizontale de l’ombre (ici 3px vers la droite), la deuxième est utile pour la direction verticale de l’ombre (6px vers le bas dans l’exemple), le troisième est utile pour l’opacité de l’ombre, le dernier est utile pour la couleur de l’ombre.</br>
Sur le dernier élément nous changeons la police d’écriture du texte. Time New Roman étant une police connue, nous l’avons utilisé avec une taille de 30 px, pour avoir plus de police d’écriture vous pouvez consulter notre documentation sur les liens utiles
</p>

<p id="soustitrepartie">2 - Reglage de la couleur du texte</p>
<p id="textall">Un apport d’une couleur dans un texte peut être très important, il peut faire ressortir une information, appuyer un raisonnement ou faire simplement un élément de décor supplémentaire.</br>
Pour cela nous utilisons la balise color: ;</br>
Dans cette balise nous pouvons utiliser plusieurs éléments.
Le premier est l’utilisation des couleurs les plus connue c’est à dire red,pink et bien d’autres que nous pouvons utiliser directement dans notre balise.</br>
La seconde utilisation sont les couleurs html, c’est à dire sous la forme #ffffff (Hexadécimal), que vous pouvez trouver sur des sites sur le web (cf liens utiles).</br>
La troisième utilisation et le rgba avec comme variable les couleurs primaire rouge, vert et bleu d’une intensité de 0 à 255, si vous avez fait des cours de physique-chimie au collège ce type de format doit vous parler ! Mais un élément rentre en jeu le “a”, et là je ne pense pas que vous ayez déjà vu quelque chose de la sorte ! Le “a” représente l'opacité de la couleur, allant de 0 à 1 (1 étant la couleur de base), vous pourrez choisir ou non de mettre une transparence.</br>
</p>

<p id="soustitrepartie">3 - Les transitions </p>
<p id=textall"> Une transition c’est quoi ? Voici un exemple simple : </p><br>
<?php codecss($exemple9)?><br>
<p id="textall">Ici lorsque la souris survole le texte, la couleur du texte change directement ! Magique non ?
Il faut simplement faire attention à ne pas donner un style “jacky tuning” à votre site! 
</p>

<p id="soustitrepartie">4 - Boarder et coins de page </p>
<p id="textall">Nous avons donc vu que sur votre site vous allez pouvoir ajouter des photos, des boxs ou encore tout autre éléments graphiques utile pour la beauté de votre site. 
Nous allons ici voir une nouvelle composante : les bordures, et comme d'habitude voici un exemple 
</p><br>
<?php codecss($exemple10)?><br>
<p id="textall">Pour comprendre, ici nous avons donc un carrée de 200px de côté avec un bord solid rouge, et des bords avec un angle composé par “border-radius”
La partie solid peut être remplacé par de multiples autres éléments (pointillé ..), pour en savoir plus je vous laisse chercher sur le net ! 
</p>
</div>
<div id="quiz2">


<form id="QR2" method="post">
    <?php 
      $questionrep = array('Question1' => array('types'=>'checkbox','questions'=> 'Quel est le nom de la balise html pour relier un code css à une page html ?','reponses'=>array('1r1'=>'addcss','1r2'=>'link','1r3'=>'fputcss'),'reponseCorrect'=>'link'),'Question2' => array('types'=>'checkbox','questions' => 'Pour un code css nous pouvons utiliser des “id” et des “class”, on représente une “class” par :' , 'reponses' => array('2r1'=>'un .','2r2'=>'un #'),'reponseCorrect'=>'un .'),'Question3' => array('types'=>'text','questions'=>'Le body represente le ____ de la page','reponseCorrect'=>'corp'),'Question4' => array('types'=>'checkbox','questions'=> 'Pour mettre un effet d’ombre sur un texte, on utilise :','reponses'=>array('1r1'=>'Text-Shadow','1r2'=>'Css-Shadow','1r3'=>'Shadow'),'reponseCorrect'=>'Text-Shadow'),'Question5' => array('types'=>'checkbox','questions' => 'Dans rgba le « a » représente la netteté d’une couleur' , 'reponses' => array('5r1'=>'vrai','5r2'=>'faux'),'reponseCorrect'=>'faux'));

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
        echo "<input type=\"submit\" id=\"Confirmer\" value=\"Confirmer\">";
      }
        ?>
    </p>


  </form>

    <?php 
      if (!empty($_POST)) {
        echo "<form method=\"link\" action=\"CSS.php\">";
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