<?php
require_once 'include/fonction.php'; 

$rech=$_POST['t_rechercher'];
$nom=$_POST['t_nom'];
$prenom=$_POST['t_prenom'];
$email=$_POST['t_email'];
$mdp=$_POST['t_mdp'];

$PARAM_sgbd         = "mysql";      // SGBDR
    $PARAM_hote         = "localhost";  // le chemin vers le serveur
    $PARAM_port         = "3306";       // Port de connexion
    $PARAM_nom_bd       = "db_komidi";  // le nom de votre base de données
    $PARAM_utilisateur  = "root";       // nom utilisateur
    $PARAM_mot_passe    = "btssio";     // mot de passe utilisateur
    // Nom de la source de données
    $PARAM_dsn          = $PARAM_sgbd.":host=".$PARAM_hote.";dbname=".$PARAM_nom_bd;
$dbh = new PDO($PARAM_dsn, $PARAM_utilisateur, $PARAM_mot_passe, $dboptions);
 if (isset($_POST['rechercher']))
{
$stmt = $dbh->prepare("SELECT * FROM utilisateur WHERE nom='$rech'");
$stmt->execute();

$enrg=$stmt->fetch();
 
 if ($enrg[0] == $rech)
{
 
   echo "<form id='form1' name='form1' method='post' action='code.php'>
    <table width='420' border='0'>
   <tr>
     <td width='169' bgcolor='#CCFF00'><label>
    <input name='rechercher' type='submit' id='rechercher' value='Rechercher' />
     </label></td>
     <td width='369' bgcolor='#CCFF00'><label>
    <input name='t_rechercher' type='text' id='t_rechercher' value='$enrg[0]' />
     </label>Recherche par nom</td>
   </tr>
   <tr>
     <td>Nom</td>
     <td><label>
    <input name='t_nom' type='text' id='t_nom'  value='$enrg[0]'/>
     </label></td>
   </tr>
   <tr>
     <td>Prénom</td>
     <td><label>
    <input name='t_prenom' type='text' id='t_prenom' value='$enrg[1]' />
     </label></td>
   </tr>
   <tr>
     <td>Te</td>
     <td><label>
    <input name='t_email' type='email' id='t_email' value='$enrg[2]' />
     </label></td>
   </tr>
   <tr>
     <td>Fax</td>
     <td><input name='t_mdp' type='text' id='t_mdp' value='$enrg[3]' /></td>
   </tr>
   <tr>
     <td colspan='2'><label>
    <input name='nouveau' type='reset' id='nouveau' value='Nouveau' />
    <input name='ajouter' type='submit' id='ajouter' value='Ajouter' />
    <input name='modifier' type='submit' id='modifier' value='Modidier' />
    <input name='supprimer' type='submit' id='supprimer' value='Supprimer' />
     </label></td>
   </tr>
    </table>
    <p> </p>
  </form>";
}
  else
   {
  echo '<body onLoad="alert("Client introuvable..."")">';
  echo '<meta http-equiv="refresh" content="0;URL=index.php">';
  }
} 
 
 else
  {
  
                 
      
         if (isset($_POST['ajouter']))
                              
           if($nom=='')
          {
         echo '<body onLoad="alert("Le nom obligatoire")">';
                               echo '<meta http-equiv="refresh" content="0;URL=index.php">';
           
          }
          elseif ($prenom=='')
          {
          echo '<body onLoad="alert("Prénom obligatoire...")">';
                               echo '<meta http-equiv="refresh" content="0;URL=index.php">';
          }
          elseif($tel=='')
          {
          echo '<body onLoad="alert("Téléphone obligatoire...")">';
                                   echo '<meta http-equiv="refresh" content="0;URL=index.php">';
          }
         
         else
         {
          $rqt="INSERT INTO utilisateur VALUES('$nom','$prenom','$email','$mdp')";
          $rqt->execute();
         
           
          echo '<body onLoad="alert("Ajout effectuée...")">';
          echo '<meta http-equiv="refresh" content="0;URL=index.php">';
          
               }
       if (isset($_POST['modifier']))
        
                                    if($nom=='' || $prenom=='' ||$tel==''   )
          {
          
          echo '<body onLoad="alert("fair une recherch avant la modification ou verifiez les champs                                               obligatoire..."")">';
                                   echo '<meta http-equiv="refresh" content="0;URL=index.php">';
          }
          else
          {
           $rqt="UPDATE utilisateur SET nom='$nom',prenom='$prenom',email='$email',mdp='$mdp' WHERE nom ='$rech'";
          $rqt->execute();
          echo '<body onLoad="alert("Modification effectuée..."")">';
          echo '<meta http-equiv="refresh" content="0;URL=index.php">';
        
         }
       elseif(isset($_POST['supprimer']))       
         {
         
         $rqt="DELETE  FROM utilisateur  WHERE nom ='$rech'";
        $rqt->execute();

         echo '<body onLoad="alert("Suppression effectuée...")">';
        echo '<meta http-equiv="refresh" content="0;URL=index.php">';
        
         }
      
  
  }

?>
<?php
    $PARAM_dsn          = $PARAM_sgbd.":host=".$PARAM_hote.";dbname=".$PARAM_nom_bd;
$req="SELECT * FROM  utilisateur";
$req->execute();

?>
<table width="630" align="left" bgcolor="#CCCCCC">
<tr >
 
<td width="152">Nom</td>
<td width="66">Prénom</td>
<td width="248">Email</td>
<td width="42">Mdp</td>
</tr>
<?php
$var=0;
while($row=$stmt->fetch())
{
 
if ($var==0)
{
?>
<tr bgcolor="#EEEEEE">
<td><? echo $row[0];  ?></td>
<td><? echo $row[1];  ?></td>
<td><? echo $row[2]  ?></td>
<td><? echo $row[3]  ?></td>
</tr>
<?php
$var=1; 
 }
else
{
?>
<tr bgcolor="#FFCCCC">
<td><? echo $row[0];  ?></td>
<td><? echo $row[1];  ?></td>
<td><? echo $row[2]  ?></td>
<td><? echo $row[3]  ?></td>
</tr>
<?php
$var=0; 
 }
 }
?>
</table>
