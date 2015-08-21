<link rel="stylesheet" type="text/css" href="config.css">
<?php
require ("MySQL.php") ;
$connection=new MySQL("root","","restaurant","localhost");
if(isset($_GET['nom']) and !empty($_GET['nom']))
{
	$rqt="SELECT * FROM cuisine where meal LIKE '".$_GET['nom']."%'";
	
$resultat=$connection->execRequete($rqt);

if(mysql_num_rows($resultat)==0)
echo "Pas de correspondance";
if(mysql_num_rows($resultat))
{
	?>
	<table>
		<tr>
		<td>nom
		<td>prenom
		<tr/>
	<?php
		while ($achats=$connection->objetSuivant($resultat)) {
		echo '<tr>';
		echo '<td>'.$achats->meal;
		echo '<td>'.$achats->prix;
		echo '<tr/>';
	}
	echo '</table>';
	}
}


for ($i=0; $i < 1000000; $i++) { 
	# code...
}
/*$rqt="SELECT * FROM cuisine where meal LIKE '".$_GET['nom']."'";*/
?>