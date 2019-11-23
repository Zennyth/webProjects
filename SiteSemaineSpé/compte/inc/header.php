<?php 
if (session_status() == PHP_SESSION_NONE){
  session_start(); //Permet d'éviter la redondance de session_start()
}
?>
<?php require_once 'functions.php'; //Permet d'utiliser les fonctions comprisent dans functions.php ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../Css/style.css">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <title>P4B - Mon compte</title>
  <link rel="icon" href="../Image/favicon.ico" />
</head>
<body>


  <nav id="logos2">
    <img src="../Image/essailogo.png">
  </nav>
    <nav id="menu">
    <ul id="phone">
      <li><img id="imgmenu2" src="../Image/menu.png">

      <ul id="afficher" class="ul">
         <li class="menu" id="enlever"><img  id="logo" src="../Image/essailogo.png"> </li>
         <li class="menu"><a href="../index.php">Home</a></li>
        <?php if(isset($_SESSION['auth'])): ?>
          <li class="menu"><a href="logout.php">Se déconnecter</a></li>
          <?php else: ?>
          <li class="menu"><a href="register.php">S'inscrire </a></li>
          <li class="menu"><a href="login.php">Se connecter</a></li>
        <?php endif; ?>
  </ul>
    </li>
</ul>
   </nav>


     


  
<section class="corps">
  <article>
    <?php if(isset($_SESSION['flash'])): ?> <!-- Affiche les erreurs, s'il y en a -->

          <?php foreach($_SESSION['flash'] as $type => $message): ?>

            <div class="alert alert-<?= $type; ?>">

              <?= $message; ?>

            </div>
          <?php endforeach ?>
          <?php unset($_SESSION['flash']); //detruit la variable ?> 
    <?php endif; ?>
    

      
