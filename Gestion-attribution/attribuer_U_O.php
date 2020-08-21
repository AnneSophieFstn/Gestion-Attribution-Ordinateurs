<?php 

require_once("../config.php");

if( isset($_GET['attribution']) && $_GET['attribution'] == "ordinateur" ){
	
	
	$nom_utilisateur = $_POST['nom_utilisateur'];
	
	//On récupère la table utilisateurs
	$table_utilisateurs = mysqli_query($db, "select * from utilisateurs where id_utilisateur = '".$nom_utilisateur."'"); 
    
    //On met les données sous forme de liste avec "mysqli_fetch_array"
	$liste_table_utilisateurs = mysqli_fetch_array($table_utilisateurs);

	$nom_utilisateur_attribuer = $liste_table_utilisateurs['nom_utilisateur'];
	$prenom_utilisateur_attribuer = $liste_table_utilisateurs['prenom_utilisateur'];
	
	
	// Récuperera la valeur de 'horaire' dans la liste déroulante fait dans le fichier "faire_attribution.php"
	$horaire_attribuer = $_POST['horaire_attribuer'];
    
    // Récuperera la valeur de l'id pour identifier le nom de l'ordinateur
	$id_ordinateur = $_POST['id_ordinateur'];

	// date input dans " faire_attribution.php"
	$date_attribuer = $_POST['date_attribuer'];

    //Sélectionne et stocke tout les données de la table ordinateurs dans la variable "$table_ordinateurs"
	$table_ordinateur = mysqli_query($db, "select * from ordinateurs where id_ordinateur = '".$id_ordinateur."'"); 
    
	/* La fonction "mysqli_fetch_array" va retourner une ligne de résultat sous la forme d'un tableau.
	   Ici on va avoir tout les nom des ordinateurs*/
    $liste_table_ordinateurs = mysqli_fetch_array($table_ordinateur);
	$nom_ordinateur_attribuer = $liste_table_ordinateurs['nom_ordinateur'];

	/* Requête d'insertion pour les attributions */
    $attribution_U_O = mysqli_query($db, "insert into attributions(id_utilisateur_attribuer,nom_utilisateur_attribuer,
    prenom_utilisateur_attribuer,id_ordinateur_attribuer,nom_ordinateur_attribuer,horaire,date) 
    values('".$nom_utilisateur."', '".$nom_utilisateur_attribuer."','".$prenom_utilisateur_attribuer."','".$id_ordinateur."','".$nom_ordinateur_attribuer."','".$horaire_attribuer."','".$date_attribuer."')");
    
    if( $attribution_U_O ) {
        
		/* Ne pas oublier de mettre à jour au niveau des disponibilités de l'utilisateur
		   Donc changement de valeur "utilise_Ordinateur 0 -> 1" 
		*/
    	$utilisateur_avec_ordinateur = mysqli_query($db, "update utilisateurs set utilise_Ordinateur = '1' where id_utilisateur = '".$nom_utilisateur."'");
		
		/* Faire de même pour la disponibilité de l'ordinateur
		   Donc changement de valeur "Occuper 0 -> 1" 
		*/
    	$ordinateur_occuper = mysqli_query($db, "update ordinateurs set Occuper = '1' where id_ordinateur = '".$id_ordinateur."'");

        header("location:../gestion_attribution.php");
        
        die;
	} else {
		echo mysqli_error($db);
	}
        
}
?>



