<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../Css/style.css">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" media="screen and (max-width: 665px)" href="petite_resolution.css" />
  <title>P4B - Apprendre le CSS</title>
  <link rel="icon" href="../Image/favicon.ico" />
</head>
<body>
  <?php session_start(); ?>

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