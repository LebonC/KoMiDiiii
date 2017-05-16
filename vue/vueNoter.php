<?php 
session_start();
if(isset($_SESSION['prenom']))
{
    $titretab = "Komidi Notes";

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
		echo '
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="utf-8" />
				<title>Test Notation</title>
				<link rel="stylesheet" type="text/css" href="Le_CSS_test.css" media="all"/>
			</head>

			<body>
				<span class="star-rating">  
					<input type="radio" name="rating" value="1"><i></i>  
					<input type="radio" name="rating" value="2"><i></i>  
					<input type="radio" name="rating" value="3"><i></i>  
					<input type="radio" name="rating" value="4"><i></i>  
					<input type="radio" name="rating" value="5"><i></i>
				</span>
			</body>
		</html>';
		$contenupage = ob_get_clean();

require 'vue/vueSidebar.php';
require 'vue/template.tpl';


}

else
{
    header("Location:index.php?action=Connexion");
}


?>
