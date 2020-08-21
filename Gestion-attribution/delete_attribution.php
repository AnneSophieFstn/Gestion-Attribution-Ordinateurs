<?php 

require_once("../config.php");


if( isset($_GET['supp']) && $_GET['supp'] == "attribution" ) {

    $id_attribution = $_GET['id_attribution'];
    $table_attribution = mysqli_query($db, "select * from attributions where id_attribution = '".$id_attribution."'");
    $liste_table_attribution = mysqli_fetch_array($table_attribution);

    $supp_attribution = mysqli_query($db, "delete from attributions where id_attribution = '".$id_attribution."'");
    if( $supp_attribution ) {
      
    	//Réactualise les valeurs pour que les utilisateurs non disponible le redevienne.
    	$utilisateur_avec_ordinateur = mysqli_query($db, "update utilisateurs set utilise_Ordinateur = '0' where id_utilisateur = '".$liste_table_attribution['id_utilisateur_attribuer']."'");
    	//Réactualise les valeurs pour que les ordinateurs non disponible le redevienne.
    	$ordinateur_occuper = mysqli_query($db, "update ordinateurs set Occuper = '0' where id_ordinateur = '".$liste_table_attribution['id_ordinateur_attribuer']."'");
      
        header("location:../gestion_attribution.php");
        
    	die;
    }
    
}
?>