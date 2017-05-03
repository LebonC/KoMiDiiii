<?php
$titretab = "Komidi Admin";

ob_start(); 
foreach($menupage as $page_name => $page_url) 
{
  $class = '';
  if ($current_page == $page_url) {
    $class = 'active';
  }
  echo "<li class='$class'>
    <a href='$page_url'>".$page_name ."</a>".
   "</li>";
}
$menupage = ob_get_clean();

ob_start();
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Connexion</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>

	<body>
		<h1>Connexion</h1>
		<div class="container">
		 	
		 	<form class="form-horizontal" method="POST" action="index.php?action=ValidationConnexion">
		 		<div class="well">
			    	<div class="form-group">
			    		<label class="control-label col-sm-4" for="email">Email:</label>
			    		<div class="col-sm-8">
			        		<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
			      		</div>
			    	</div>

				    <div class="form-group">
				        <label class="control-label col-sm-4" for="password">Mot de passe:</label>
				        <div class="col-sm-8">          
				        	<input type="password" class="form-control" id="password" placeholder="Enter votre mot de passe" name="password" required>
				        </div>
				    </div>

				    <div class="form-group">        
				        <div class="col-sm-offset-2 col-sm-10">
				        	<div class="checkbox">
				        		<label><input type="checkbox" name="se rapeler">Se repeler de moi</label>
				        	</div>
				        </div>
				    </div>

				    <div class="form-group">        
				        <div class="col-sm-offset-2 col-sm-10">
				        	<button type="submit" class="btn btn-primary">inscription</button>
				        </div>
				    </div>
				</div>
			</form>
		</div>
	</body>

</html>

<?php
$contenupage = ob_get_clean();

require 'vue/vueSidebar.php';
require 'vue/template.tpl';
?>