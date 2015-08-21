<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo css_url('style')?>">
	<title></title>
</head>
<body>
	<table>
<tr>
			<td>N°</td>
			<td>NOM</td>
			<td>Prénom</td>
			<td>Note</td>
			<td>choix</td>
			<td>Filière attribuée</td>
		</tr>
<?php

foreach ($information as $key => $value) 
{
?>
	
		<tr>
			<td><?php echo $key;?></td>
			<td><?php echo $value['nom'];?></td>
			<td><?php echo $value['prenom'];?></td>
			<td><?php echo $value['moyen'];?></td>
			<td><?php echo $value['choix'];?></td>
			<td><?php echo $value['final_filiere'];?></td>
		</tr>
	
<?php
}
?>
</table>
</body>
</html>