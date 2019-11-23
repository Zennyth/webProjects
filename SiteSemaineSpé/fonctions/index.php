<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="Css/style.css">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <title>P4B - Home Page</title>
  <link rel="icon" href="Image/favicon.ico" />
</head>
<body>
  <?php session_start(); ?>
  <header>
    <nav id="logo2">
      <img src="Image/essailogo.png">
    </nav>
    <nav id="menu">

    <ul id="phone">
      <li><img id="imgmenu" src="Image/menu.png">
        <ul id="afficher" class="ul">
          <li class="disparaits"><a></a></li>
          <li class="disparaits"><a></a></li>
          <li class="disparaits"><a></a></li>
          <li class="disparaits"><a></a></li>
          <li class="menu" id="enlever"><img  id="logo" src="Image/essailogo.png"> </li>
          <li class="menu"><a href="index.php">HOME</a></li>
          <li class="menu"><a href="Contenu-html/HTML.php">HTML</a></li>
          <li class="menu"><a href="Contenu-css/CSS.php">CSS</a></li>
          <li class="menu"><a href="Contenu-php/PHP.php">PHP</a></li>
          <li class="menu"><a href="Contenu-histoire/HISTOIRE.php">HISTOIRE/TIPS</a></li>
          <li class="menu"><a class="connecter" href="compte/moncompte.php"><?php if(!empty($_SESSION['auth'])){ 
           if(strlen($_SESSION['auth']->username)<=8){ echo $_SESSION['auth']->username;} else {echo "Mon compte";}} else {echo "Mon compte";} ?></a></li>
        </ul>
      </li>
    </ul>
  </nav>
   </nav>
      <div id="slideshow">
          <ul id="sContent">
              <li><img id="banniere" src="Image/yolo.png" alt="Image bleue"  /></li>
          </ul>
      </div>
  </header>

  <!--
<section class="corps">

  <nav class="nav" class="bloc">
    <ul class="ul" class="scroll">
      <li class="menugauche"><a href="#">Exemple1</a></li>
      <li class="menugauche"><a href="#">Exemple2</a></li>
      <li class="menugauche"><a href="#">Exemple3</a></li>
      <li class="menugauche"><a href="#">Exemple4</a></li>
      <li class="menugauche"><a href="#">Exemple5</a></li>
      <li class="menugauche"><a href="#">Exemple6</a></li>
    </ul>
  </nav>

!-->
  <article>
 <ul class="Objectifs">
    <center><a class="lien" href="presentation.pdf"
   download="presentation.pdf">Télécharger notre présentation en PDF</a></center>
 </ul></br> </br>
    <h1>Décourez l'HTML !</h1>
      <ul class="Objectifs">
       <h3>Objectifs pédagogiques :</h3>
       <li>- Comprendre l’utilisation de HTML</li>
       <li>- Connaître l’histoire du langage</li>
       <li>- Connaitre les bases importantes du HTML</li>
       <li>- Et d’autres ….</li>
      </ul><br><br>
    <h1>Découvrez le CSS !</h1>
      <ul class="Objectifs">
       <h3>Objectifs pédagogiques :</h3>
       <li>- Comprendre l’utilisation du CSS</li>
       <li>- Connaître l’histoire du langage</li>
       <li>- Connaitre les bases importantes du CSS</li>
       <li>- Et d’autres ….</li>
      </ul><br><br>
    <h1>Découvrez le PHP !</h1>
      <ul class="Objectifs">
       <h3>Objectifs pédagogiques :</h3>
       <li>- Comprendre l’utilisation du PHP</li>
       <li>- Connaître l’histoire du langage</li>
       <li>- Connaitre les bases importantes du PHP</li>
       <li>- Et d’autres ….</li>
      </ul><br><br>
    <h1>Découvrez les astuces des précédents langages !</h1>
      <ul class="Objectifs">
       <h3>Objectifs spécifiques :</h3>
       <li>- Comprendre les possibles ereurs</li>
       <li>- Connaître et comprendre l'existence des documentations</li>
       <li>- Connaitre les differents outils du programmeur</li>
       <li>- Et d’autres ….</li>
      </ul>

<!-- <form id="QR" method="post" action="index.php">
  
    <?php 
    /*
      $questionrep = array('Question1' => array('types'=>'checkbox','questions'=> 'énoncé','reponses'=>array('1r1'=>'rep1','1r2'=>'rep2','1r3'=>'rep3'),'reponseCorrect'=>'rep1'), 'Question2' => array('types'=>'radio','questions'=> 'DODO est relou ?','reponses'=>array( '2v'=> 'vrai','2f'=>'faux'),'reponseCorrect'=>'vrai'),'Question3' => array('types'=>'text','questions'=> 'Qui clc ? (dodo)','reponseCorrect'=> 'dodo'),'Question4' => array('types' => 'radio' , 'questions' => 'DODO est riche ?' , 'reponses' => array('4v'=>'vrai','4f'=>'faux'), 'reponseCorrect' => 'vrai'),'Question5' => array('types'=>'checkbox','questions' => 'DODO est violent ?' , 'reponses' => array('5r1'=>'OUI','5r2'=>'NON','5r3'=>'PEUT ETRE'),'reponseCorrect'=>'OUI'));
      include_once("fonctions/fonctions.php");
      echo "<div id=\"questionnaire\">Questions :";
      echo afficheQuestion($questionrep['Question1'],'Q1');
      if (!empty($_POST)) {
          verificationReponse($questionrep,'1');
      }

      echo afficheQuestion($questionrep['Question2'],'Q2');
      if (!empty($_POST)) {
          verificationReponse($questionrep,'2');
      }

      echo afficheQuestion($questionrep['Question3'],'Q3');
      if (!empty($_POST)) {
          verificationReponse($questionrep,'3');
      }

      echo afficheQuestion($questionrep['Question4'],'Q4');
      if (!empty($_POST)) {
          verificationReponse($questionrep,'4');
      }

      echo afficheQuestion($questionrep['Question5'],'Q5');
      if (!empty($_POST)) {
          verificationReponse($questionrep,'5');
      }

      echo "</div>";
    */
     ?>

    <p>   
      <input type="submit" id="Confirmer" value="Confirmer">
    </p>
  </form>  -->

  <p id="titrearticles"></br></br></p>
  </article>
<!--</section>!-->

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
    <h4>Contacter nous :</h4>
    <span class="insta">
      <a href="https://www.instagram.com/prog4beginners/?hl=fr" title="Instagram" class="fa fa-instagram" href="https://www.youtube.com/watch?v=BQ58peKDq3o"></a>
    </span>
    <span class="fb">
      <a href="https://www.facebook.com/Prog4Beginners-346668622585826/?epa=SEARCH_BOX" title="Facebook" class="fa fa-facebook"></a>
    </span>
  </span>
</div>

<div class="img">
  <img src="Image/essailogo.png">
</div>
  <h2 class="copyright">&copy;prog4beginners 2019</h2>
</footer>


</body>
</html>