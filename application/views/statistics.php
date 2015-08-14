<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo css_url("style")?>">
	<title></title>
</head>
<body>

<table>
	<tr>
		<td>Filière</td>
		<td>Taux de demande</td>
		<td>Nombre de places</td>
	</tr>
	<tr>
		<td>G.informatique</td>
		<td><?php echo $informatique/$total*100; ?></td>
		<td>à faire</td>
	</tr>
	<tr>
		<td>G.industriel</td>
		<td><?php echo $industriel/$total*100; ?></td>
		<td>à faire</td>
	</tr>
	<tr>
		<td>GPMC</td>
		<td><?php echo $GPMC/$total*100; ?></td>
		<td>à faire</td>
	</tr>
	<tr>
		<td>GTR</td>
		<td><?php echo $GTR/$total*100; ?></td>
		<td>à faire</td>
	</tr>
</table>

</body>
</html>