<?php 

        require_once("../config.php "); // connexion a la base de donnée

        if(isset($_GET['Supp']))
        {
            $id_ordinateur = $_GET['Supp'];
            $query = " delete from ordinateurs where id_ordinateur = '".$id_ordinateur."'";
            $result = mysqli_query($db,$query);

            if($result)
            {
                header("location:../gestion_ordinateurs.php");
                
            }
            else
            {
                echo ' Veuillez verifier votre requête ! ';
            }
        }
        else
        {
            header("location:../gestion_ordinateurs.php");
        }

?>