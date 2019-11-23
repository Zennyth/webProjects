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
   <!-- <p id="titrearticles">Quel navigateur choisir ?</p>!-->
    <center><img class="topimgarticle" src="../Image/articles/choixnav.png"> </center></br>
      <p id="introductiontxt">Chrome ? Safari ? Mozila ? Internet Explorer ? Microsoft Edge ?
  Tous ces noms nous sont communs, en effet il existe une palette énorme de navigateur qui permettent de naviguer sur le web. Regardons de près qui sont les meilleurs navigateurs ?

  Une multitude de navigateur, mais qui sont-ils ?
  Dans cette partie, nous allons passer en revue la majorité des plus grands navigateurs web.
 </p>

 <ul class="Objectifs">

    <h3>Objectifs pédagogiques :</h3>
<li>- Comprendre l’utilisation de HTML</li>
<li>- Connaître l’histoire du langage</li>
<li>- Connaitre les bases importantes du HTML</li>
<li>- Et d’autres ….</li>
</ul>

    <p id="titreintermediaire"><br>Internet Explorer … Le papy des navigateurs</p>

    <p id="texteall">  Le premier, et sans aucun doute le plus connu de tous est Internet Explorer. Ce vieux mastodonte dans ce domaine date de 1995, à l’époque de Netscape, intégré directement pour la première fois dans Windows 95 il rencontre pendant plusieurs années un fort succès. Mais au fil du temps et à la sortie des autres navigateurs, Internet Explorer s’enfonce et ne sortira plus jamais du côté sombre de ses concurrents. Une cause est principale : Internet Explorer donne une interface par forcément très sympathique, un affichage des pages souvent spéciales, des manières de rechercher souvent drôle. De plus, nous sommes tous d’accord sur un point : personne n’ose utiliser internet explorer en 2019.
Malgré cela, internet explorer reste une référence dans le domaine : tout le monde a déjà utilisé ce vieux navigateur et on serait tous triste de voir disparaitre ce « papy des navigateurs ».</p>
  


  <p id="titreintermediaire">Microsoft Edge … Ce qui devait être le renouveau dans le modèle </p>
  <p id="texteall">Créé de toutes pièces pour Microsoft, et surtout pour Windows 10, Microsoft Edge propose une interface très épurée à un tel point que les fonctionnalités sont minimes. Beaucoup de fonctionnalités ne sont pas adaptés, aucune compatibilité flash. Même si la navigation est très rapide, mais elle est également très bordélique, les marques pages sont très complexes, les favoris du même type, pour conclure rien ne va. Une catastrophe ! Le pire défaut de ce navigateur ? Etre obligé d’utiliser bing, le pire navigateur de recherche, étant donné que ce navigateur est installé par défaut sur le navigateur web Microsoft Edge ! </p>

   <p id="titreintermediaire">Google Chrome … La puissance avant tout</p>
  <p id="texteall">Finis les navigateurs Microsoft sans utilité, nous avons ici le navigateur de recherche le plus puissant au monde. Rapide, et efficace il offre de nombreuses possibilités d’interaction. Contrairement à Microsoft Edge son utilisation est diversifiée, ses menus sont simples et efficaces. Il est également très sécurisé. Pourtant pour moi et le reste de l’équipe, ce navigateur n’est pas notre « favori », en effet Google chrome à un gros point noir, il apporte souvent beaucoup de pollution dans nos ordinateurs.</p>
  
  <p id="titreintermediaire">Safari … La conformité Apple </p>
  <p id="texteall">Safari est le navigateur par défaut d’Apple, comme Explorer en 1995, Safari est le navigateur par défaut, et comme tous les produits Apple, le navigateur est très simple d’utilisation, mais bien sur limité en mode Apple ! Nous pouvons donc comparer Safari à Internet Explorer, mais en mode Apple, c’est-à-dire sans aucun bug.</p>

  <p id="titreintermediaire">Opéra … le navigateur professionnel </p>
  <p id="texteall">Ce « magnifique » navigateur de recherche est une petite pépite, souvent utilisé par les pros, il reste extrêmement sécurisé, avec énormément de fonctionnalités à son bord comme la possibilité d’installer gratuitement des VPN dans la dernière version. Mais le seul défaut de ce navigateur face à tous les autres et qu’il n’est pas un navigateur de tous les jours, c’est plus un outil informatique qu’autre choses ! </p>

  <p id="titreintermediaire">Firefox … Finalement le meilleur navigateur </p>
  <p id="texteall">Et maintenant … le meilleur pour la fin, pour ce navigateur open source nous ne pouvons révéler un et un seul et unique défaut : il consomme beaucoup de puissance machine. En dehors de ce défaut mineur nous ne pouvons rien reprocher à Firefox : marques pages, favoris, mots de passe, navigation sécurisée, affichage au top, utilisation instinctive et rapide. De plus je ne pense pas être le seul et l’unique fan de Firefox, d’après de nombreux sondages et plus de 1.2 milliards de téléchargements, c’est LE navigateur préféré à travers le monde.</p>


  <form id="QR" method="post">
    <?php 
      $questionrep = array('Question1' => array('types'=>'checkbox','questions'=> 'Quel navigateur est considéré comme le « papy des navigateurs » ?','reponses'=>array('1r1'=>'Internet Explorer','1r2'=>'Netscape','1r3'=>'Microsoft Edge'),'reponseCorrect'=>'Internet Explorer'),                                                                                                             'Question2' => array('types'=>'checkbox','questions'=> 'Quel est le navigateur le plus appréciés à travers le monde ?','reponses'=>array( '2r1'=> 'Google Chrome','2r2'=>'Safari','2r3'=> 'Firefox'),'reponseCorrect'=>'Firefox'),                                               'Question3' => array('types'=>'radio','questions'=> 'Opera est un navigateur qui est préféré pour les professionnel ?','reponses'=> array('3r1'=>'Oui', '3r2'=>'Non'),'reponseCorrect'=>'Oui'));

      include_once('../fonctions/fonctions.php');
      echo "<div id=\"questionnaire\">Questions :";
      echo afficheQuestion($questionrep['Question1'],'Q1');
      if (!empty($_POST)) {
        // verificationReponse($questionrep,'1');
        verificationReponse($questionrep,'1');
     
      }

      echo afficheQuestion($questionrep['Question2'],'Q2');
      if (!empty($_POST)) {
        // verificationReponse($questionrep,'2');
        verificationReponse($questionrep,'2');
  
      }

      echo afficheQuestion($questionrep['Question3'],'Q3');
      if (!empty($_POST)) {
        // verificationReponse($questionrep,'3');
        verificationReponse($questionrep,'3');
       
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
        echo "<form method=\"link\" action=\"Astuce1.php\">";
        echo "<input type=\"submit\" id=\"Continuer\" value=\"Continuer\"> ";
        echo "</form>";
      }
     ?>

  </article>
</section>

<?php require_once('footer.php'); ?>