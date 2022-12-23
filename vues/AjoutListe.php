<html>
  <head>
    <link rel="stylesheet" href="/vues/style/FormLayout.css">
    <title>Ajout d'une liste</title>
  </head>
  <body>
    <h1>Ajouter une liste</h1>
    <a href='/'><button class='button'>Retour à l'accueil</button></a>
    <form enctype="multipart/form-data" action="" method="post" id="form">
      <label for="username">Nom de la liste</label><br>
      <input type="text" id="username" name="nom"><br>
      <?php 
        if(isset($_SESSION['idUtilisateur'])): ?>      
          <label for="status">Cochez pour rendre la liste publique</label>
          <input type="checkbox" id="status" name="isPrivate">
      <?php endif; ?>
      <button type="submit" value="AJOUTER">Ajouter</button>
    </form>
  </body>
</html>