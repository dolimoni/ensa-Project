<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="<?php echo css_url('style')?>">
 <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<head>
	<title></title>
</head>
<body>


<input class="order" type="radio" name="classement" value="nom">nom
<br>
<input class="order" type="radio" name="classement" value="moyen">ordre de mérite




<div class="content">
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

