<?php
require_once("config.php");

// Initialiser la session
session_start();

// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if(!isset($_SESSION["Admin"]))
{
    header("Location: Connexion/connexion.php");
    exit(); 
}
    require_once("config.php");
    $query = " select * from ordinateurs ";
    $result = mysqli_query($db,$query);

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/icone.png"/>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="Navigation/css/styles.css">
    <title>Gestion des ordinateurs</title>
    <?php
        $repRacine = true; //pour l'affichage des fichiers dans un dossier dans la racine.
        include 'Navigation/navigation.php';
    ?>

</head>
<body>

    <div class="contenu_site">

        <header class="header_ordinateur"> 
            <center>
                <h1> Liste des ordinateurs: </h1><br>
            </center>
        </header>

        <div class="tableau">
            <!-- Afficher tableau ordinateurs -->
            <table>
                <tr>
                    <th scope="col"> Nom Ordinateur</th>
                    <th scope="col"> Modifier</th>
                    <th scope="col"> Supprimer</th>
                </tr>

                <?php 
                        
                    while($row=mysqli_fetch_assoc($result))
                    {
                        $id_ordinateur = $row['id_ordinateur'];
                        $nom_ordinateur = $row['nom_ordinateur'];
                ?>
                    <tr>
                        <td><?php echo $nom_ordinateur ?></td>
                        
                        <!-- Modifier ordinateur -->
                        <td><a href="Gestion-ordinateur/modifier_ordinateur.php?GetID=<?php echo $id_ordinateur ?>"> <img id="icon_modif" src="images/icone_modif.png"> </a></td>
                        
                        <!-- Supprimer ordinateur -->
                        <td><a href="php/delete_ordinateur.php?Supp=<?php echo $id_ordinateur ?>"> <img id="icon_del" src="images/icone_del.png"> </a></td>
                    </tr>        
                <?php 
                        }
                ?>                                                                    
            
            </table>

            <!-- Ajouter ordinateur -->
            <div class="text_Ajout">
                <a href="Gestion-ordinateur/ajouter_ordinateur.php"> <div class="img_add"> <img src="images/icone_add.png">  Ajouter un nouvel ordinateur </div></a>
            </div>
        </div>    
    </div>
</body>
</html>