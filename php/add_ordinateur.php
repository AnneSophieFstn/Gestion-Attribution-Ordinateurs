<?php

    require_once("../config.php");

    if(isset($_POST['ajouter']))
    {
        if(empty($_POST['nom_ordinateur']))
        {
            echo ' Veuillez remplir tous les champs ! ';
        }
        else
        {
            $nom_ordinateur = $_POST['nom_ordinateur'];

            $query = " insert into ordinateurs (nom_ordinateur) values('$nom_ordinateur')";
            $result = mysqli_query($db,$query);

            if($result)
            {
                header("location:../gestion_ordinateurs.php");
            }
            else
            {
                echo '  Veuillez vérifier votre requête ! ';
            }
        }
    }
    else
    {
        header("location:../Gestion-ordinateur/ajouter_ordinateur.php");
    }

?>