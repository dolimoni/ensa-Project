<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="<?php echo site_url('Etudiant_controller/login');?>">
	<h2>Bienvenue dans le site le l'ENSA</h2>
		cin : <input type="text" name="cin" /><br/><br/>
		cne : <input type="text" name="cne" /><br/><br/>
		password : <input type="password" name="password" /><br/><br/>
	<input type="submit" value="envoyer"/>	<br/><br/>
</form>

<a href="<?php echo site_url('ensa_controller/inscription_ensa') ?>">inscription 2eme année</a><br/>
<a href="<?php echo site_url('cnc_controller/inscription_cnc') ?>">inscription cnc</a><br/>
<a href="<?php echo site_url('The3and4Year_controller/inscription_3and4Year') ?>">inscription 3eme et 4eme année</a><br/>

</body>
</html>