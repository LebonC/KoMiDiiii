<?php

class cnx
{
	private $db;
	
	function __construct()
	{
		// Paramètres de connexion
	    $PARAM_sgbd         = "mysql";      // SGBDR
	    $PARAM_hote         = "localhost";  // le chemin vers le serveur
	    $PARAM_port         = "3306";       // Port de connexion
	    $PARAM_nom_bd       = "db_komidi";	// le nom de votre base de données
	    $PARAM_utilisateur  = "root";       // nom utilisateur
	    $PARAM_mot_passe    = "";     // mot de passe utilisateur
	    // Nom de la source de données
	    $PARAM_dsn          = $PARAM_sgbd.":host=".$PARAM_hote.";dbname=".$PARAM_nom_bd; 

	    $dboptions = array(
	        PDO::ATTR_PERSISTENT => FALSE,
	        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
	        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",);

	    try{
	        $this->db = new PDO($PARAM_dsn, $PARAM_utilisateur, $PARAM_mot_passe, $dboptions);

	        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

	    } catch(PDOException $e){
	        die('Erreur: '.$e->getMessage());
	       }
    }
    function getDB()
    {
    	return $this->db;
    }
}


class user
{
	private $db;
	
	function __construct()
	{
		$cnx = new cnx();
		$this->db = $cnx->getDB();
	}
	function getUtilisateur()
	{
		return $this->db->query("SELECT * FROM kdi_utilisateur");
	}
	function Comparaison()
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		$utilisateur = $this->getUtilisateur();
		while ($result = $utilisateur->fetch(PDO::FETCH_ASSOC)) 
		{
			if($result['EmailUtilisateur'] == $email && $result['MDPUtilisateur'] == $password)
			{
				session_start();
				$_SESSION['nom'] = $result['NomUtilisateur'];
				$_SESSION['prenom'] = $result['PrenomUtilisateur'];
				$_SESSION['type'] = $result['StatutUtilisateur'];
				return true;
			}
		}
		return false;
	}
	function addUtilisateur()
	{
		try
		{
			$email = $_POST['email'];
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$tel = $_POST['tel'];
			$mdp = $_POST['password'];

			$this->db->query("INSERT INTO kdi_utilisateur values('".$email."','".$mdp."','".$nom."','".$prenom."','".$tel."',0)");
			return true;

		}
		catch(PDOExeption $e)
		{
			return false;
		}
	}
}


class Spectacle
{
	private $db;
	
	function __construct()
	{
		$cnx = new cnx();
		$this->db = $cnx->getDB();
	}

	public function getSpectacles()
	{
		return $this->db->query("SELECT * FROM kdi_spectacle ");
	}
	
	public function getSpectacle($id)
	{
		/*
		$stmt = $this->db->prepare("SELECT * FROM db_komidi WHERE Spe_id=".$id);
		$editRow2=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow2; */
	}
	
	
	public function updateSpectacle($params)
	{
	   /* $titre=$_POST['Titre'];
	    $Mes=$_POST['Description'];
	    $Annee=$_POST['Annee'];
	    
        $this->$db->query("update FROM kdi_spectacle SET ")*/
	}
	
	public function deleteSpectacle($id)
	{
		$stmt = $this->db->prepare("DELETE FROM kdi_spectacle WHERE Spe_id=".$id);
		$stmt->execute();
	}
	

	/* paging */
	function getCover($spec_id = 0) {
		$picture = 'image/'.$spec_id;

		if (file_exists($picture)) {
			return $picture;
		}
		return 'image/defaut.png';
	}

	public function dataview($query)
	{
		$stmt = $this->db->query($query);


		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$id 		= $row['Spe_id'];	
				$title 		= $row['Spe_titre'];
				$genre 		= $row['Gre_nom'];
				$public 	= $row['Spe_public'];
				$tailleresume = 100;
				$synopsis 	= substr($row['Spe_resume_court'], 0, $tailleresume).' [...]';
				$picture 	= $this->getCover($row['Spe_affiche']);
?>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4"> 
					<a  href="#?id=<?= $id ?>">
						<img class="img-rounded" src="<?= $picture ?>" class='img-rounded' width='150px' height='150px'>
					</a>
					<div class="caption">
						<h4><?= $title ?></h4>
						<ul class="list-unstyled">
							<li><?= $synopsis ?></li>
							<li><strong>Public :</strong><?= $public ?></li>
							<li><strong>Genre :</strong><?= $genre 	?></li>
						</ul>
					</div>
				</div>
<?php
			}
		}
		else
		{
			echo  "<div class='caption'>
				<div class='alert alert-warning'>
				<span class='glyphicon glyphicon-info-sign'></span> 
				&nbsp; Inconnu ...</div></div>";
		}
		
	}
	
	public function paging($query,$records_per_page)
	{
		$starting_position=0;
		if(isset($_GET["page_no"]))
		{
			$starting_position=($_GET["page_no"]-1)*$records_per_page;
		}
		$query2=$query." limit $starting_position,$records_per_page";
		return $query2;
	}
	
	public function paginglink($query,$records_per_page)
	{
		
		$self = $_SERVER['PHP_SELF'];
		
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		
		$total_no_of_records = $stmt->rowCount();
		
		if($total_no_of_records > 0)
		{
			?><ul class="pagination"><?php
			$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
			$current_page=1;
			if(isset($_GET["page_no"]))
			{
				$current_page=$_GET["page_no"];
			}
			if($current_page!=1)
			{
				$previous =$current_page-1;
				echo "<li><a href='".$self."?page_no=1'>Premier</a></li>";
				echo "<li><a href='".$self."?page_no=".$previous."'>Précédent</a></li>";
			}
			for($i=1;$i<=$total_no_of_pages;$i++)
			{
				if($i==$current_page)
				{
					echo "<li><a href='".$self."?page_no=".$i."' style='color:red;'>".$i."</a></li>";
				}
				else
				{
					echo "<li><a href='".$self."?page_no=".$i."'>".$i."</a></li>";
				}
			}
			if($current_page!=$total_no_of_pages)
			{
				$next=$current_page+1;
				echo "<li><a href='".$self."?page_no=".$next."'>Suivant</a></li>";
				echo "<li><a href='".$self."?page_no=".$total_no_of_pages."'>Last</a></li>";
			}
			?></ul><?php
		}
	}
	
	/* paging */
	
}

?>
