<!doctype html>
<html>
<?php
    try
    {
        // Paramètres de connexion 
        $PARAM_sgbd         ="mysql";       // SGBDR
        $PARAM_hote         ="localhost";   // le chemin vers le serveur 
        $PARAM_port         ="3306";        // Port de connexion
        $PARAM_nom_bd       ="db_komidi";   // le nom de votre base de données
        $PARAM_utilisateur  ="root";        // nom utilisateur 
        $PARAM_mot_passe    ="btssio";            // mot de passe utilisateur
        $PARAM_dsn          =$PARAM_sgbd.":host=".$PARAM_hote.";dbname=".$PARAM_nom_bd; // Nom de la source de données

        $dboptions = array(
        PDO::ATTR_PERSISTENT => FALSE,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",);

        $cnx = new PDO($PARAM_dsn, $PARAM_utilisateur, $PARAM_mot_passe, $dboptions);
    
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../images/icon.png" />
    <link href="css/style.css" rel="stylesheet">
    <title>Admin AilTECH</title>
</head>
<body>
<div class="navbar navbar-default" role="navigation">
    <!-- Partie de la barre toujours affichée -->
    <div class="navbar-header">
        <!-- Bouton d'accès affiché à droite si la zone d'affichage est trop petite -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-target">
            <span class="sr-only">Activer la navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="administration.php"><span class="glyphicon glyphicon-film"></span> ailTECH</a>
    </div>

    <div class="collapse navbar-collapse" id="navbar-collapse-target">
        <ul class="nav navbar-nav">
            <li class="active"><a href="ajouter.php">Ajouter un  Produit</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrateur<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="deconnexion.php">Se deconnecter</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
