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
  <ul>
    <li><a href="#">A propos de Foukka (WIP)</a></li>
    <li><a href="/user/connexion">Log In</a></li>
  </ul>
  
  <?php
    foreach($dVueListe as $liste){
      echo '<h4><a href= "/liste/liste">' . $liste->getNom() . '</a></h4>';
    }
      
  ?>

</body>
</html>