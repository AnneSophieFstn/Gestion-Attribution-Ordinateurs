<?php
  // Initialiser la session
  session_start();
  
  // Détruire la session.
  if(isset($_GET['deconnecter']))
  {
    //detruit la session
    session_destroy();
    // Redirection vers la page de connexion
    header("Location: connexion.php");
  }
?>