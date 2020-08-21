<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["Admin"])){
    header("Location: Connexion/connexion.php");
    exit(); 
  }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/icone.png"/>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="Navigation/css/styles.css">
    <title>Accueil - Gestion d'attribution d'ordinateurs</title>
    <?php
        $repRacine = true; //pour l'affichage des fichiers dans un dossier dans la racine.
        include 'Navigation/navigation.php';
    ?>

</head>
<body>

    <main> 
        <h1 id="h1-titre"> Gestion d’attribution d’ordinateurs </h1>
    </main>
    
</body>
</html>