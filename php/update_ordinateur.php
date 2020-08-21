<?php 

    require_once("../config.php");

    if(isset($_POST['update']))
    {
        $id_ordinateur = $_GET['Id'];
        $nom_ordinateur = $_POST['nom_ordi'];

        $query = " update ordinateurs set id_ordinateur = '".$id_ordinateur."', nom_ordinateur='".$nom_ordinateur."' where id_ordinateur='".$id_ordinateur."'";
        $result = mysqli_query($db,$query);

        if($result)
        {
            header("location:../gestion_ordinateurs.php");
        }
        else
        {
            echo ' Veuillez vérifier votre requête ! ';
        }
    }
    else
    {
        header("location:../gestion_ordinateurs.php");
    }

?>

