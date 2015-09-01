<html>
<head>
    <meta charset="UTF-8">
<script type="text/javascript">
	function actif() {
		if(document.form1.et[4].checked)
		{    
			document.form1.choix1[4].disabled=false;
			for (var i=0; i<4;i++)
			{
				document.form1.choix1[i].disabled=true;
				
			}
		}
		else
		{   document.form1.choix1[4].disabled=true;
			for (var i=0; i<4;i++)
			{
				document.form1.choix1[i].disabled=false;
			}
		}
}
</script>
<title></title>    
</head>
<body OnClick="actif();">
<h1>Génération des Trombinoscopes</h1>


<form name="form1" ENCTYPE="multipart/form-data" method="post" action="<?php echo site_url('cntrTrombino'); ?>">
	
<h3>Choix de type d'eleves :</h3>
<?php echo form_error('et'); ?>
<input type="radio" name="et" value="ensas" />Les élèves issus de la 2ème année cycle prépa de l'ENSAS<br/>
<input type="radio" name="et" value="cnc" />Les élèves issus du cnc<br/>
<input type="radio" name="et" value="concours3" />Les élèves issus du concours d'accès 3eme année<br/>
<input type="radio" name="et" value="concours4" />Les élèves issus du concours d'accès 4eme année<br/>
<input type="radio" name="et" value="ts" />Tous les étudiants 3eme année <br/>


<h3>Année universitaire :</h3> 
	<?php
    echo form_error('AU'); 
	echo'<select name="AU">';
	for ($au =2014; $au <= 2030; $au++)
	{
		$au2=$au+1;
		echo'<option>'.$au.'-'.$au2.'</option>';
	}
	echo '</select>';
	?>
	 <br/>
	 <br/>
 <h3>Choix de filière :</h3>
<?php 

echo form_error('choix1'); ?>

<input type="radio" name="choix1"  value="D" />Génie industriel<br/>
<input type="radio" name="choix1"  value="P" />Génie des procédés et M.C<br/>
<input type="radio" name="choix1" value="F" />Génie informatique<br/>
<input type="radio" name="choix1"  value="T" />Génie télécommunication et réseau<br/>
<input type="radio" name="choix1" disabled="disabled" value="all" />Toutes les filières<br/>

<input type="submit" value="Générer" /><br/>
</form>
</body>
</html>
