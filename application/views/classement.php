<!DOCTYPE html>
<html>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" />
 <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<head>
	<title></title>
</head>
<body>
<br/>
<h4 align="center">
	<b>Accès en 3ème année<br/>
	pour les élèves issus du cycle prépa de l'ENSAS <br/></b> 
	Année : à faire<br/>
	<b  style="color: blue; ">Liste des attributions des filières <br/></b> 
</h4>


<h3> <span class="glyphicon glyphicon-certificate"></span> Choix du type d'affichage </h3>
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
	
</div>
 <input class="order" type="radio" name="classement" value="nom"> afficher par nom
<br/>
 
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
	
</div>
<input class="order" type="radio" name="classement" value="moyen"> afficher par ordre de mérite

<br/><br/>
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
<script type="text/javascript">
$(document).ready(function () {
$(".order").change(function () {
					var val = $('.order:checked').val();

                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo site_url('admin_controller/sort'); ?>",
                        dataType: 'html',
                        data: {name: val},
                        success: function(res) {
                            if (res)
                            {
                                jQuery("div.content").html(res);
                            }
                        }
                    });
    
});
});

</script>
</html>

