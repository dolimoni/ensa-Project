<!DOCTYPE html>
<html>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" />
 <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<head>
	<title></title>
</head>
<body>

<div class="content">


<table class="table table-hover">
		
		<thead>
			<tr>
				<th>N°</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Note 2éme année</th>
				<th>Choix</th>
				<th>Filière attribuée</th>
			</tr>
		</thead>
		
		<?php

		foreach ($information as $key => $value) 
		{
		?>
			<tbody>
				<tr class="<?php echo  $value['color'];?>">
					<td><?php echo $key;?></td>
					<td><?php echo $value['nom'];?></td>
					<td><?php echo $value['prenom'];?></td>
					<td><?php echo $value['moyen'];?></td>
					<td><?php echo $value['choix'];?></td>
					<td><?php echo $value['final_filiere'];?></td>
				</tr>
			</tbody>
		<?php
		}
		?>

</table>
</div>
</body>
</html>