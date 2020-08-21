<?php 

    require_once("../config.php");

    if(isset($_POST['update']))
    {
        $id_utilisateur = $_GET['Id'];
        $nom_utilisateur = $_POST['nom_utilisateur'];
        $prenom_utilisateur = $_POST['prenom_utilisateur'];

        $query = " update utilisateurs set id_utilisateur = '".$id_utilisateur."', nom_utilisateur='".$nom_utilisateur."',prenom_utilisateur='".$prenom_utilisateur."' where id_utilisateur='".$id_utilisateur."'";
        $result = mysqli_query($db,$query);

        if($result)
        {
            header("location:../gestion_utilisateurs.php");
        }
        else
        {
            echo ' Veuillez vérifier votre requête ! ';
        }
    }
    else
    {
        header("location:../gestion_utilisateurs.php");
    }

?>

