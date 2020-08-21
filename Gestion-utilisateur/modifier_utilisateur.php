<?php 

    require_once("../config.php");

    $id_utilisateur = $_GET['GetID'];
    $query = " select * from utilisateurs where id_utilisateur='".$id_utilisateur."'";
    $result = mysqli_query($db,$query);

    while($row=mysqli_fetch_assoc($result))
    {
        $id_utilisateur = $row['id_utilisateur'];
        $nom_utilisateur = $row['nom_utilisateur'];
        $prenom_utilisateur = $row['prenom_utilisateur'];
    }

?>

<!DOCTYPE html>
<html class="design-page-html">
  <title>Modifier un utilisateur</title>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="../images/icone.png"/>
    <link rel="stylesheet" href="../css/styles.css">
  </head>
<body class="design-page-body">
    <div class="formcontainer">
        <div class="container">
            <form action="../php/update_Utilisateur.php?Id=<?php echo $id_utilisateur ?>" method="post">
                <h2>Modifier l'utilisateur</h2>

                    <label for="nom"><strong>Nom:</strong></label>
                        <input type="text" placeholder=" Entrez le nouveau nom " name="nom_utilisateur" value="<?php echo $nom_utilisateur ?>">

                    <label for="prenom"><strong>Prenom:</strong></label>
                      <input type="text" placeholder=" Entrez le nouveau prenom " name="prenom_utilisateur" value="<?php echo $prenom_utilisateur ?>">

                <div class="btn">
                <button name="update"><strong>Modifier</strong></button>
                <div class="container" style="background-color: #eee">
                </div>
            </form>
        </div>
    </div>
</body>
</html>