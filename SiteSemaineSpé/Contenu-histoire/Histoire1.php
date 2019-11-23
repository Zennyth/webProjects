<?php require_once('header.php'); ?>
  
<section class="corps">

   <nav class="nav" id="bloc">
    <ul class="ul" id="scroll">
      <li class="menugauche"><a href="Histoire1.php">L'histoire des navigateurs</a></li>
      <li class="menugauche"><a href="Histoire2.php">L'histoire des langages</a></li>
      <li class="menugauche"><a href="Astuce1.php">Quel navigateur utilisé ?</a></li>
      <li class="menugauche"><a href="Astuce2.php">Utilisation de Sublime Text</a></li>
      <li class="menugauche"><a href="Astuce3.php">Utilisation de la documentation</a></li>
      <li class="menugauche"><a href="Histoire3.php">Quelques liens utiles</a></li>
    </ul>
  </nav>

  <article>
    <!--<p id="titrearticles">Histoire et fonctionnement des navigateurs web</br></p>!-->
<center><img class="topimgarticle" src="../Image/articles/navigateurs2.png"> </center></br>
  <ul class="Objectifs">

    <h3>Objectifs</h3>
        <li>- Connaître l'histoire des navigateurs </li>
        <li>- Comprendre le fonctionnement des navigateurs </li>
        <li>- Choisir le navigateur utile </li>
  </ul>

  <p id="titrepartie">Quand et comment ? </p>
  <p id="textall">Les navigateurs WEB sont arrivés très tôt dans l’histoire de l’informatique, et l’utilisation de ces navigateurs web a explosé de façon exponentielle avec l’arrivée d’internet dans la vie de tous. 
Même si cette forme de navigateur a vu le jour dans les années 1990, c’est uniquement dans les années 2000 qu’ils ont été démocratisés.
</p>

<p id="titrepartie">Netscape … L’arrivée du premier navigateur WEB ! </p>
<p id="textall">Netscape représente le premier navigateur WEB, développé par Mosaic, ce nouveau moteur de recherche est fonctionnel sur Windows et Linux. C’est uniquement après la version 4 de ce navigateur que les développeurs de Netscape ont intégrés un client « mail ». Une réelle révolution pour l’époque.</p>
<p id="textall">Mais c’est lorsque Windows intègre Internet explorer à Windows 95, que l’utilisation de Netscape n’a fait que chuter. Après cette forte chute, Netscape est racheté par AOL en 1998.
Après cela, Netscape a beaucoup de mal à se relancer, après une nouvelle version très peu fonctionnelle en 2000, Netscape développe une nouvelle version (la 5ème de la série) : « Mozilla » (Mosaic killer) qui ne verra jamais le jour.
C’est quelques mois après en juin 2002, que la première version de Mozilla sort sous le nom de « Mozilla 1.0 ».
Deux mois après la sortie de cette version, la Fondation Mozilla annonce la création de l’entreprise « La Mozilla Corporation ». L’objectif de cette entreprise est la création de Firefox, avec sa première version en fin 2002 après de multiples versions et après plus de 15 ans de développement, Mozilla est en train de devenir l’un des explorateurs internet le plus répandu.
</p>
<p id="textall">Pendant tout ce temps, toujours dans les années 90, Opera Software voit le jour. Avec une première version d’Opera en 1993, Opera devient connu pour ses innovations techniques comme la possibilité de charger plusieurs pages en parallèle ! Une solution qui nous paraît évidente aujourd’hui, mais qui pour l’époque s'apparente comme une révolution !</p>
<p id="titrepartie">Les années 2000 ... L’explosion des navigateurs WEB</p>
<p id="textall">Les années 2000 représentent donc la sortie ainsi que l’implosion d’Opera, d’internet Explorer et Firefox. Rythmé par une forte concurrence, les nouvelles technologies pour ces navigateurs se sont fortement développées. 
En 2006, sort Internet Explorer 7, et 2 ans plus tard, Google lance son premier navigateur web : Google chrome ! Avec son interface révolutionnaire, simple et très rapide, ces deux navigateurs ont permis de relancer et dynamiser le marché. 
</p>

<p id="titrepartie">La guerre des navigateurs WEB ...</p>
<p id="textall">Les chiffres parlent d’eux-mêmes : en 1994 Netscape possédait 90% du marché. C’est uniquement après l’arrivée d’Internet Explorer en 1995 que Netscape commence à perdre des parts de marché. Netscape qui est considéré comme « la bienveillance des navigateurs » rentre donc en concurrence avec « Internet Explorer », qui est souvent considéré comme le « méchant » avec son manque de bienveillance pour les internautes. Mais Microsoft a une carte supplémentaire face à ses concurrents, il impose son navigateur par défaut pour toutes les nouvelles machines supportant Windows 95.
C’est comme cela que 3 ans après la domination de Netscape, Internet Explorer possédera 98% des parts du marché ! 
Netscape ne s’arrête pas là, et lance une poursuite en justice face à Microsoft. L’objectif de Netscape et du « Département de la justice » est de couper le monopole de Microsoft. 
</p>

<p id="titrepartie">La seconde guerre des navigateurs …</p>
<p id="textall">La seconde guerre des navigateurs débute en 2004, internet Explorer possède encore plus de 90% des parts du marché. C’est à ce moment que Firefox décide d’attaquer et grappiller petit à petit des parts de marché. De plus, entre 2001 et 2006, Internet Explorer ne change pas de version, et reste sur sa version 6. C’est uniquement après 6 ans que cette version est remplacé par la version 7. Avec un tout nouveau système de gestion d’onglet et un champ « moteur de recherche ». Mais Google a été plus intelligent pour gérer la menace d’Internet Explorer, et devient à ce jour le moteur de recherche le plus utilisé ! 
</br>
La guerre des navigateurs s’est soldé par un partage inégal de leurs utilisations : 
Aujourd’hui Chrome, Firefox, Internet Explorer, Opera et safari se partagent le marché.
</p>



<form id="QR" method="post">
    <?php 
       $questionrep = array('Question1' => array('types'=>'text','questions'=>'En ____ Internet Explorer devient le navigateur de base sur Windows 95 ','reponseCorrect'=>'1995'),'Question2' => array('types'=>'checkbox','questions'=> 'Quel est le premier navigateur web ?','reponses'=>array('1r1'=>'Netscape','1r2'=>'Google Chrome','1r3'=>'Internet Explorer'),'reponseCorrect'=>'Netscape'),'Question3' => array('types'=>'text','questions'=>'En ___ Opera Software est crée.','reponseCorrect'=>'1993'),'Question4' => array('types'=>'checkbox','questions'=> 'Aujourd hui quel est le moteur de recherche le plus utilisé ?','reponses'=>array('4r1'=>'FireFox','4r2'=>'Google Chrome','5r3'=>'Safari'),'reponseCorrect'=>'Google Chrome'));

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
        echo "<form method=\"link\" action=\"Histoire1.php\">";
        echo "<input type=\"submit\" id=\"Continuer\" value=\"Continuer\"> ";
        echo "</form>";
      }
     ?>


  </article>
</section>
<?php require_once('footer.php'); ?>
