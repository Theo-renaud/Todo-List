<html>
<head><title>Erreur</title>
</head>

<body>

<h1>ERREUR !!!!!</h1>
<?php
if (isset($dVueEreur)) {
    foreach ($dVueEreur as $value){
        echo $value . "<br>";
    }
}

echo "<a href='/accueil/accueil'>Retour à l'accueil</a>";

?>



</body> 
</html>