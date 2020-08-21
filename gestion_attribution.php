<?php
require_once("config.php");
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["Admin"])){
    header("Location: Connexion/connexion.php");
    exit(); 
  }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/icone.png"/>
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="Navigation/css/styles.css">
    <title>Gestion des attributions</title>
    <?php
        $repRacine = true; //pour l'affichage des fichiers dans un dossier dans la racine.
        include 'Navigation/navigation.php';
    ?>

</head>
<body>

	<div class="contenu_site">
			
        <header > 
            <center>
                <h1> Liste des attributions: </h1><br>
            </center>
        </header>
		
		<div class="tableau">
			<table>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nom</th>
					<th scope="col">Prénom</th>				  
					<th scope="col">Nom Ordinateur</th>
					<th scope="col">Horaire</th>
					<th scope="col">Date</th>
					<th scope="col">Attribution</th>
				</tr>
				
				<?php

				// Sélectionne et stocke tout les données de la table attributions dans la variable "$liste_table_attributions"
				  $liste_table_attributions = mysqli_query($db, "select * from attributions");
				  
				// La fonction "mysqli_num_rows" va retourner le nombre de lignes totale dans un résultat
				  if(mysqli_num_rows($liste_table_attributions))
				  {

					//Pour i allant de 1 à le nombre totale de lignes de la table attributions
			  		for( $i=1; $i<=mysqli_num_rows($liste_table_attributions); $i++ ) 
					{
						
						/*La fonction "mysqli_fetch_array" va retourner une ligne de résultat sous la forme d'un tableau.
							les valeurs sont prit grâce au différentes requêtes dnas le fichier "attribuer_U_O"*/
			  			$table_attributions = mysqli_fetch_array($liste_table_attributions);
			  			?>
			  			<tr>
						  <th scope="row"><?php echo $i; ?></th>
						  <td><?php echo $table_attributions['nom_utilisateur_attribuer']?></td>
						  <td><?php echo $table_attributions['prenom_utilisateur_attribuer']?></td>
						  <td><?php echo $table_attributions['nom_ordinateur_attribuer']; ?></td>
						  <td><?php echo $table_attributions['horaire']; ?></td>
						  <td><?php echo $table_attributions['date']; ?></td>
						  
						  <!-- Annuler attribution -->
						  <td><a href="Gestion-attribution/delete_attribution.php?supp=attribution&id_attribution=
						  		<?php echo $table_attributions['id_attribution']; ?>"><img id="icon_del" src="images/icone_del.png"></button></a></td>
						</tr><?php
			  		}
				  } 
				  
				 // Si aucune attribution n'a été faites: on affiche un msg pour 0 attribution
				  else {
			  		?>
			  		<tr>
			  			<td colspan="7"><h6 style="padding: 5px">Aucune attribution n'a été faites</h6></td>
			  		</tr>
			  		<?php
			  	}
			  	?>
			</table>
			
			<!-- Faire attribution -->
            <div class="text_Ajout">
                <a href="Gestion-attribution/faire_attribution.php"> <img id="icon_modif" src="images/icone_modif.png"> Faire une attribution </a>
            </div>
        </div>    
    </div>
</body>
</html>