<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="/vues/style/index.css">
  <title>Accueil</title>
</head>
<body>
  <h1>Bienvenue sur Foukka</h1>
  <p>Foukka est une to-do list comme il en existe des milliers. Celle-ci n'a aucune particularité qui la distingue des autres To-Do list.</p>
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
    <li class="navItem"><a class="itemLink" href="#">A propos de Foukka (WIP)</a></li>
    <li class="navItem"><a class="itemLink" href="/user/connexion">Log In</a></li>
  </ul>
  
  <h2>Les listes publiques</h2>
  <ul>
    <?php
      foreach($dVueListe as $liste):
    ?>
      <li><a class="listeLink" href="/liste/liste/<?= $liste->getId(); ?>"><?= $liste->getNom() ?></a></li>
    <?php
      endforeach;
    ?>
  </ul>

</body>
</html>