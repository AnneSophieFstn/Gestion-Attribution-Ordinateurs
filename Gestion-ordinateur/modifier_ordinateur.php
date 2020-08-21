<?php 

    require_once("../config.php");
    $id_ordinateur = $_GET['GetID'];
    $query = " select * from ordinateurs where id_ordinateur='".$id_ordinateur."'";
    $result = mysqli_query($db,$query);

    while($row=mysqli_fetch_assoc($result))
    {
        $id_ordinateur = $row['id_ordinateur'];
        $nom_ordinateur = $row['nom_ordinateur'];
    }

?>

<!DOCTYPE html>
<html lang="fr" class="design-page-html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" type="image/png" href="../images/icone.png"/>
    
    <title>Modifier un ordinateur</title>
</head>
<body class="design-page-body">
<div class="formcontainer">
    <div class="container">

        <form action="../php/update_ordinateur.php?Id=<?php echo $id_ordinateur ?>" method="post">
            
            <h2> Modifier un ordinateur </h2>

            <input type="text" placeholder=" Entrez le nouveau nom du poste " name="nom_ordi" value="<?php echo $nom_ordinateur ?>">

            <div class="btn">
                <button name="update">Modifier</button>
            <div class="container" style="background-color: #eee">
            </div>
        </form>
    </div>
</div>   
</body>
</html>