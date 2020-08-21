<?php 

        require_once("../config.php "); // connexion a la base de donnée

        if(isset($_GET['Supp']))
        {
            $id_utilisateur = $_GET['Supp'];
            $query = " delete from utilisateurs where id_utilisateur = '".$id_utilisateur."'";
            $result = mysqli_query($db,$query);

            if($result)
            {
                header("location:../gestion_utilisateurs.php");
                
            }
            else
            {
                echo ' Veuillez verifier votre requête ! ';
            }
        }
        else
        {
            header("location:../gestion_utilisateurs.php");
        }

?>