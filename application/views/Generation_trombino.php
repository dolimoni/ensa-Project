<html>
<head>
</head>
<title></title>
<body>
<h1>G�n�ration des Trombinoscopes</h1>


<form name="form1" ENCTYPE="multipart/form-data" method="post" action="<?php echo site_url('cntrTrombino'); ?>">
	
<h3>Choix de type d'eleves :</h3>
<?php echo form_error('et'); ?>
<input type="radio" name="et" value="ensas" />Les �l�ves issus de la 2�me ann�e cycle pr�pa de l'ENSAS<br/>
<input type="radio" name="et" value="cnc" />Les �l�ves issus du cnc<br/>
<input type="radio" name="et" value="concours3" />Les �l�ves issus du concours d'acc�s 3eme ann�e<br/>
<input type="radio" name="et" value="concours4" />Les �l�ves issus du concours d'acc�s 4eme ann�e<br/>
<input type="radio" name="et" value="ts" />Tous les �tudiants de la 3eme ann�e <br/>


<h3>Ann�e universitaire :</h3> 
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
 <h3>Choix de fili�re :</h3>
<?php 

echo form_error('choix1'); ?>

<input type="radio" name="choix1"  value="D" />G�nie industriel<br/>
<input type="radio" name="choix1"  value="P" />G�nie des proc�d�s et M.C<br/>
<input type="radio" name="choix1" value="F" />G�nie informatique<br/>
<input type="radio" name="choix1"  value="T" />G�nie t�l�communication et r�seau<br/>

<input type="submit" value="G�n�rer" /><br/>
</form>
</body>
</html>
