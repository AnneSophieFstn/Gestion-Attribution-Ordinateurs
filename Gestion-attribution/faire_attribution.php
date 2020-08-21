<?php

require_once("../config.php");

?> 

<!DOCTYPE html>
<html lang="fr" class="design-page-html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../images/icone.png"/>
    <link rel="stylesheet" href="../css/styles.css">
    <title>Gestion des attribution</title>
    
    <style>

	.formcontainer {
		width: 50vw;
	}

	button {
		background-color: rgba(0, 0, 0, 0.7);
		color: white;
		width: 20%; 
		border-radius: 5px; 
	}

	</style>
	
</head>

<body class="design-page-body">

<div class="formcontainer">
    <div class="container">

        <form action="attribuer_U_O.php?attribution=ordinateur" method="post">

                <h2> Liste des attributions: </h2>

			<div class="centre">
 		  		<span class="container-liste">
                   
				  	<select name="nom_utilisateur" >
						<option>Utilisateurs</option>
						
						<!-- Selectione tout les utilisateurs disponible cad ceux qui n'utilise pas d'ordinateur -->
						<?php $select_utilisateurs_disponible = mysqli_query($db, "select * from utilisateurs where utilise_Ordinateur = '0'"); 
						
						/* Pour i allant de 1 au nombre totale de lignes de la table utilisateurs
							affiche tout les utilisateurs sous forme liste deroulante (nom, prenom)
						*/
						for( $i=1; $i<=mysqli_num_rows($select_utilisateurs_disponible); $i++ ) {
							$liste_table_utilisateurs = mysqli_fetch_array($select_utilisateurs_disponible);
							echo '<option value="'.$liste_table_utilisateurs['id_utilisateur'].'">'.htmlspecialchars_decode($liste_table_utilisateurs['nom_utilisateur'], ENT_QUOTES).', '.htmlspecialchars_decode($liste_table_utilisateurs['prenom_utilisateur'], ENT_QUOTES).'</option>';
						} ?>
					</select>
					
 				</span>
 
				<span class="container-liste">

					<!-- Horaire -->
					<select name="horaire_attribuer">
					  	<option>Horaires</option>
						<option value="08:30">08:30</option>
						<option value="09:30">09:30</option>
						<option value="10:00">10:00</option>
						<option value="10:30">10:30</option>
						<option value="11:00">11:00</option>
						<option value="11:30">11:30</option>
						<option value="12:00">12:00</option>
						<option value="12:30">12:30</option>
						<option value="13:00">13:00</option>
						<option value="13:30">13:30</option>
						<option value="14:00">14:00</option>
						<option value="14:30">14:30</option>
						<option value="15:00">15:00</option>
						<option value="15:30">15:30</option>
						<option value="16:00">16:00</option>
						<option value="16:30">16:30</option>
						<option value="17:00">17:00</option>
					</select>

				</span>
				
				<span class="container-liste">

						<!-- Date -->
					<input  type="date" id="calendrier" name="date_attribuer" value="2020-08-01" min="2020-01-01" max="2020-12-31">
					
				</span>


					<span class="container-liste">

						<!-- Ordinateurs -->
						<select  name="id_ordinateur" >
							<option>Id Ordinateur</option>
							
							<!-- Selectionne tout les ordinateurs qui ne sont pas occuper par un utlisateurs. -->
							<?php $select_ordinateurs_non_occuper = mysqli_query($db, "select * from ordinateurs where Occuper = '0'"); 
							
							/* Pour j allant de 1 au nombre totale de ligne de la table ordinateurs
							affiche tout les ordinateurs sous forme liste deroulante (nom ordi) */
							for( $j=1; $j<=mysqli_num_rows($select_ordinateurs_non_occuper); $j++ ) {
								$liste_table_ordinateurs = mysqli_fetch_array($select_ordinateurs_non_occuper);
                                echo '<option value="'.$liste_table_ordinateurs['id_ordinateur'].'">Ordinateur '
                                .$liste_table_ordinateurs['nom_ordinateur'].'</option>';
							} ?>
						</select>

					</span>	
			</div>

					<!-- Bouton -->
					<div class="btn">
						<button type="submit" >Créer</button>
						<div class="container" style="background-color: #eee"></div>
					</div>
				</div>
		  	</form>
	</div>
</div>
</body>
</html>