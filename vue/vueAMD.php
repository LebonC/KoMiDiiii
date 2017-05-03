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

echo '<html>
<head>

<style type="text/css">
<!--
.Style4 {font-size: 12px}
-->
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="code.php">
  <table width="420" border="0">
    <tr>
      <td width="169" bgcolor="#CCFF00"><label>
        <input name="rechercher" type="submit" id="rechercher" value="Rechercher" />
      </label></td>
      <td width="369" bgcolor="#CCFF00"><label>
        <input name="t_rechercher" type="text" id="t_rechercher" />
        <span class="Style4">      Recherche par nom</span> </label></td>
    </tr>
    <tr>
      <td>Nom</td>
      <td><label>
        <input name="t_nom" type="text" id="t_nom" />
      </label></td>
    </tr>
    <tr>
      <td>Prénom</td>
      <td><label>
        <input name="t_prenom" type="text" id="t_prenom" />
      </label></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label>
        <input name="t_email" type="email" id="t_email" />
      </label></td>
    </tr>
    <tr>
      <td>Mdp</td>
      <td><input name="t_mdp" type="text" id="t_mdp" /></td>
    </tr>
    <tr>
      <td colspan="2"><label>
        <input name="nouveau" type="reset" id="nouveau" value="Nouveau" />
        <input name="ajouter" type="submit" id="ajouter" value="Ajouter" />
        <input name="modidier" type="submit" id="modidier" value="Modifier" />
        <input name="supprimer" type="submit" id="supprimer" value="Supprimer" />
      </label></td>
    </tr>
  </table>
  <p> </p>
</form>'.

    $PARAM_sgbd         = "mysql";      // SGBDR
    $PARAM_hote         = "localhost";  // le chemin vers le serveur
    $PARAM_port         = "3306";       // Port de connexion
    $PARAM_nom_bd       = "db_komidi";  // le nom de votre base de données
    $PARAM_utilisateur  = "root";       // nom utilisateur
    $PARAM_mot_passe    = "";     // mot de passe utilisateur
    // Nom de la source de données
    $PARAM_dsn          = $PARAM_sgbd.":host=".$PARAM_hote.";dbname=".$PARAM_nom_bd;
$dbh = new PDO($PARAM_dsn, $PARAM_utilisateur, $PARAM_mot_passe, $dboptions);
$stmt = $dbh->prepare("SELECT * FROM  kdi_utilisateur");
$stmt->execute();

'
<table width="630" align="left" bgcolor="#CCCCCC">
<tr >
 
<td width="152">Nom</td>
<td width="66">Prénom</td>
<td width="248">Email</td>
<td width="42">Mdp</td>
</tr>
'.

$var=0;
while($row=$stmt->fetch())
{
 
if ($var==0)
{
'
<tr bgcolor="#EEEEEE">
<td><? echo $row[0];  ?></td>
<td><? echo $row[1];  ?></td>
<td><? echo $row[2]  ?></td>
<td><? echo $row[3]  ?></td>
</tr>
'.
$var=1; 
 }
else
{
'
<tr bgcolor="#FFCCCC">
<td><? echo $row[0];  ?></td>
<td><? echo $row[1];  ?></td>
<td><? echo $row[2]  ?></td>
<td><? echo $row[3]  ?></td>
</tr><undefined></undefined>
'.
$var=0; 
 }
 }
'
</table>
</body>
</html>
';

$contenupage = ob_get_clean();

require 'vue/vueSidebar.php';
require 'vue/template.tpl';
?>