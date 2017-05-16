<?php 	

	require('./controleur/Controleur.php');

  if (isset($_GET['action']))
  {
      if ($_GET['action'] == 'Accueil') {
        Accueil() ; // Acceuil du site
        exit;
      }
       if ($_GET['action'] == 'Rechercher') {
        Rechercher() ; // Acceuil du site
        exit;
      }
      if ($_GET['action'] == 'Noter') {
        Noter();
        exit;
      }
       if ($_GET['action'] == 'Admin') {
        Admin() ; 
        exit;
      }
      if ($_GET['action'] == 'Connexion') {
        Connexion();
        exit;
      }
      if ($_GET['action'] == 'ValidationConnexion') {
        ValidationConnexion();
        exit;
      }
      if ($_GET['action'] == 'ValidationInscription') {
        ValidationInscription();
        exit;
      }
      if ($_GET['action'] == 'Inscription') {
        Inscription();
        exit;
      }
      if ($_GET['action'] == 'Déconnexion') {
        session_start ();
        session_unset ();
        session_destroy ();
        Accueil();
        exit;
      }

   }
   else{
   	 Accueil() ;
   }
?>
