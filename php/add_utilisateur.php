<?php

    require_once("../config.php");

    if(isset($_POST['ajouter']))
    {
        if(empty($_POST['nom_utilisateur']) || empty($_POST['prenom_utilisateur']))
        {
            echo ' Veuillez remplir tous les champs ! ';
        }
        else
        {
            $nom_utilisateur = $_POST['nom_utilisateur'];
            $prenom_utilisateur = $_POST['prenom_utilisateur'];

            $query = " insert into utilisateurs (nom_utilisateur, prenom_utilisateur) values('$nom_utilisateur','$prenom_utilisateur')";
            $result = mysqli_query($db,$query);

            if($result)
            {
                header("location:../gestion_utilisateurs.php");
            }
            else
            {
                echo '  Veuillez vérifier votre requête ! ';
            }
        }
    }
    else
    {
        header("location:../Gestion-utilisateur/ajouter_utilisateur.php");
    }

?>