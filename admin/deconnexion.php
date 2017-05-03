<?php      
	// Destruction de la session.
	session_start(); 
	unset($_SESSION['login']);
    unset($_SESSION['mdp']);
	if (session_destroy()) {
    	header('Location: ./index.php'); 
	} 
	else {
	    echo 'Erreur : impossible de détruire la session !';
	    header('Location: ./index.php'); 
	}
	exit;
	     
?>