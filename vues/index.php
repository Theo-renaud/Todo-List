<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="/vues/style/index.css">
  <title>Accueil</title>
</head>
<body>
  <h1>Bienvenue sur Foukka</h1>
  <p>Foukka est une to-do list comme il en existe des milliers. Celle-ci n'a aucune particularité qui la distingue des autres to-do list.</p>
  <p>
    <?php 
      if(isset($_SESSION["nomUtilisateur"])):
        echo "Bonjour " . $_SESSION["nomUtilisateur"];
      else:
        echo "Bonjour inconnu";
      endif; 
    ?>
  </p>
  <ul class="nav">
    <li class="navItem"><a class="itemLink" href="/user/connexion">Connexion</a></li>
    <li class="navItem"><a class="itemLink" href="/user/deconnexion">Déconnexion</a></li>
  </ul>
  
  <h2>Les listes publiques</h2>
  <ul>
    <?php
      if($dVueListe == null){
        echo "Aucune liste publique";
      }else {
        foreach($dVueListe as $liste):
      ?>
            <li><a class="listeLink" href="/liste/listePublique/<?= $liste->getId(); ?>"><?= $liste->getNom() ?></a></li>
          <?php
            endforeach;
          }
          ?>
      
  </ul>


  <?php

    if(isset($_SESSION["nomUtilisateur"])){
      echo "<h2>Les listes privées</h2>";
      echo "<ul>";
      foreach($dVueListePrive as $liste){
        echo "<li><a class='listeLink' href='/liste/listePrivee/" . $liste->getId() . "'>" . $liste->getNom() . "</a></li>";
      }
      echo "</ul>";
    } 

  ?>

  <a href='/liste/creation'><button class='createButton'>Créer une liste</button></a>

</body>
</html>