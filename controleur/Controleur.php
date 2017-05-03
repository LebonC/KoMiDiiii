<?php

require './modele/modele.class.php';

function Accueil() {
	$spectacles = new Spectacle();
		// Page courante
    $current_page = basename($_SERVER['PHP_SELF']); // Ex: index.php

	// Paramètrage de la page
	$titretab = "Komidi";
    $menupage = array(
        'Accueil' => 'index.php?action=Accueil',
        'Rechercher' => '#Rechercher',
        'Noter' => 'index.php?action=Noter',
        'Admin' => 'index.php?action=Admin',
        'Connexion' => 'index.php?action=Connexion',
        'Inscription' => 'index.php?action=Inscription',

    );

    $titrepage = "Bienvenue sur KomidiScope !";
    $logopage  = "image/logoscope.png";

    $msgaccueilpage = "Découvrez notre <a href='search.php'>
                recherche</a> de spéctacle et les 
                <a href='news.php'>actualités</a> du festival.";
                
    $msgaccueilpage = "";

    $tailleresume = 255;
	require './vue/vueAccueil.php';
}

function Noter() {
		// Page courante
    $current_page = basename($_SERVER['PHP_SELF']); // Ex: index.php

	// Paramètrage de la page
	$titretab = "Komidi";
    $menupage = array(
        'Accueil' => 'index.php?action=Accueil',
        'Rechercher' => '#Rechercher',
        'Noter' => 'index.php?action=Noter',
        'Admin' => 'index.php?action=Admin',
        'Connexion' => 'index.php?action=Connexion',
        'Inscription' => 'index.php?action=Inscription',

    );

    $titrepage = "Bienvenue sur KomidiScope !";
    $logopage  = "image/logoscope.png";

    $msgaccueilpage = "Découvrez notre <a href='search.php'>
                recherche</a> de spéctacle et les 
                <a href='news.php'>actualités</a> du festival.";
                
    $msgaccueilpage = "";

    $tailleresume = 255;
	require './vue/vueNoter.php';
}

function Admin() {
		// Page courante
    $current_page = basename($_SERVER['PHP_SELF']); // Ex: index.php

	// Paramètrage de la page
	$titretab = "Komidi";
    $menupage = array(
        'Accueil' => 'index.php?action=Accueil',
        'Rechercher' => '#Rechercher',
        'Noter' => 'index.php?action=Noter',
        'Admin' => 'index.php?action=Admin',
        'Connexion' => 'index.php?action=Connexion',
        'Inscription' => 'index.php?action=Inscription',

    );

    $titrepage = "Bienvenue sur KomidiScope !";
    $logopage  = "image/logoscope.png";

    $msgaccueilpage = "Découvrez notre <a href='search.php'>
                recherche</a> de spéctacle et les 
                <a href='news.php'>actualités</a> du festival.";
                
    $msgaccueilpage = "";

    $tailleresume = 255;
	require './vue/vueAMD.php';
}
function Connexion() {
		// Page courante
    $current_page = basename($_SERVER['PHP_SELF']); // Ex: index.php

	// Paramètrage de la page
	$titretab = "Komidi";
    $menupage = array(
        'Accueil' => 'index.php?action=Accueil',
        'Rechercher' => '#Rechercher',
        'Noter' => 'index.php?action=Noter',
        'Admin' => 'index.php?action=Admin',
        'Connexion' => 'index.php?action=Connexion',
        'Inscription' => 'index.php?action=Inscription',

    );

    $titrepage = "Bienvenue sur KomidiScope !";
    $logopage  = "image/logoscope.png";

    $msgaccueilpage = "Découvrez notre <a href='search.php'>
                recherche</a> de spéctacle et les 
                <a href='news.php'>actualités</a> du festival.";
                
    $msgaccueilpage = "";

    $tailleresume = 255;
	require './vue/vueConnexion.php';
}
function ValidationConnexion() {
		// Page courante
    $current_page = basename($_SERVER['PHP_SELF']); // Ex: index.php

	// Paramètrage de la page
	$titretab = "Komidi";
    $menupage = array(
        'Accueil' => 'index.php?action=Accueil',
        'Rechercher' => '#Rechercher',
        'Noter' => 'index.php?action=Noter',
        'Admin' => 'index.php?action=Admin',
        'Connexion' => 'index.php?action=Connexion',
        'Inscription' => 'index.php?action=Inscription',

    );

    $titrepage = "Bienvenue sur KomidiScope !";
    $logopage  = "image/logoscope.png";

    $msgaccueilpage = "Découvrez notre <a href='search.php'>
                recherche</a> de spéctacle et les 
                <a href='news.php'>actualités</a> du festival.";
                
    $msgaccueilpage = "";

    $tailleresume = 255;


	$utilisateur = new user();
	if($utilisateur->Comparaison())
	{
		Accueil();
	}
	else
	{
		Connexion();
	}
}


function ValidationInscription() {
	$utilisateur = new user();
	if($utilisateur->addUtilisateur())
	{
		Connexion();
	}
	else
	{
		Inscription();
	}
}



function Inscription() {
		// Page courante
    $current_page = basename($_SERVER['PHP_SELF']); // Ex: index.php

	// Paramètrage de la page
	$titretab = "Komidi";
    $menupage = array(
        'Accueil' => 'index.php?action=Accueil',
        'Rechercher' => '#Rechercher',
        'Noter' => 'index.php?action=Noter',
        'Admin' => 'index.php?action=Admin',
        'Connexion' => 'index.php?action=Connexion',
        'Inscription' => 'index.php?action=Inscription',

    );

    $titrepage = "Bienvenue sur KomidiScope !";
    $logopage  = "image/logoscope.png";

    $msgaccueilpage = "Découvrez notre <a href='search.php'>
                recherche</a> de spéctacle et les 
                <a href='news.php'>actualités</a> du festival.";
                
    $msgaccueilpage = "";

    $tailleresume = 255;
	require './vue/vueInscription.php';
}

?>



