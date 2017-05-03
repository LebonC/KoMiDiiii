<?php
session_start();  // démarrage d'une session

include "../include/config.php";

$authOK = getAuthentification();

if (!$authOK) {
	header('Location: index.php');  
}
else {
	 $sessionOK = getSession();
}

if ($sessionOK) {

	include 'templates/header.php';

	?>

	<div class="container">
	<h2>Administration ailTECH</h2>

	<table class="table table-striped">
	    <thead>                
	        <tr>
	            <th>Titre spectacle</th>
	            <th>Description</th>
	            <th>Année</th>
	            <th>Note</th>
	        </tr>
	    </thead>
    
	<?php
	$reponse = $cnx->query("SELECT * FROM kdi_spectacle S, noter N WHERE N.Spe_id=S.Spe_id ORDER BY Spe_titre;");
	while($donnees=$reponse->fetch(PDO::FETCH_ASSOC))
	{
	    ?>
	    <tbody>
	      <tr>
	        <td><?php echo $donnees['Spe_titre']; ?></td>
	        <td><?php echo $donnees['Spe_mes']; ?></td>
	        <td><?php echo $donnees['Spe_annee']; ?></td>
	        <td><?php echo $donnees['Spe_note']; ?></td>
	       <td>
	            <!-- 
	            	<a href="supprimer.php" class="btn btn-xs btn-danger" title="Supprimer"><span class="glyphicon glyphicon-remove"></span></a>
	            -->
	            
	            <a class="btn btn-xs btn-danger" title="Supprimer" href="#?idp=<?= $donnees['id'];  ?>">
	            	<span class="glyphicon glyphicon-remove"></span>
	            </a>
	            <a title="Modifier" href="model.class.php" class="btn btn-xs btn-danger" ><span class="glyphicon glyphicon-pencil"></span></a
	      </tr>
	  
<?php
	}
	if(isset($_GET['delete'])){
		$idp = $_GET['idp'];
		$strSQL= "DELETE FROM tbl_produits WHERE id ='".$idp ."';";
		echo $strSQL;
		exit;

	}
	if(isset($_GET['update']))
	{
	    $idp=$_GET['idp'];
	    $spectacle->updateSpectacle($idp);
	}
	include 'templates/footer.php';
}
else {
	header('Location: index.php');
}
?>

