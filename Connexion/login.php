<?php
session_start();
require_once('../config.php');

if(isset($_POST['btnConnexion']))
{

   /* SI l'un des deux champs est vide -> msg d'erreur */
   if(empty($_POST['mailconnect']) || empty($_POST['mdpconnect']))
   {
      header("location: connexion.php?erreur= Veuillez remplir tous les champs !");
   }
   /* SINON */
   else
   {
      /* Select tout les données dans la table membres
      où email_membre correspont à la valeur entrée par la personne */
      $query= "SELECT * FROM membres WHERE email_membre='".$_POST['mailconnect']."' and motdepasse='".$_POST['mdpconnect']."'";
      $result=mysqli_query($db,$query);
    
      /* Si les valeurs correspondent
      la connexion est validé DONC page d'accueil  */
      if(mysqli_fetch_assoc($result))
      {
         $_SESSION['Admin']=$_POST['mailconnect'];
         header("location:../accueil.php");
      }

      /* SINON msg d'erreur email ou mdp incorrect */
      else
      {
         header("location: connexion.php?Invalide= L'email ou le mot de passe est incorrect !");
      }
   }
}

      else
      {
         echo 'FONCTIONNE PAS';
      }
?>


