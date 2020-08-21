<!DOCTYPE html>
<html lang="fr" class="design-page-html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" type="image/png" href="../images/icone.png"/>
    
    <title>Ajouter un utilisateur</title>


</head>
<body class="design-page-body">
<div class="formcontainer">
        <div class="container">

    
    <form action="../php/add_Utilisateur.php" method="post">

        <h2> Ajouter un nouvel utilisateur </h2>

            <input type="text" placeholder=" Entrez le nom de l'utilisateur " name="nom_utilisateur">
        
            <input type="text" placeholder=" Entrez le prenom de l'utilisateur " name="prenom_utilisateur">
        
        <div class="btn">
            <button name="ajouter">Ajouter</button>
        <div class="container" style="background-color: #eee">
        </div>
    </form>
    
</body>
</html>