<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Inscription ENSA</h1>


<!-- 
$this->form_validation->set_message('rule', 'Error Message'); -->
<form ENCTYPE="multipart/form-data" method="post" action="<?php echo site_url('ensa_controller'); ?>">
	nom : <input type="text" name="nom" value="<?php if(isset($_POST['nom'])) echo $_POST['nom']; ?>" /> <?php echo form_error('nom'); ?><br/><br/>
	prénom <input type="text" name="prenom" value="<?php if(isset($_POST['prenom'])) echo $_POST['prenom']; ?>"/><br/><br/>
	Civilité <input type="text" name="civilite" value="<?php if(isset($_POST['civilite'])) echo $_POST['civilite']; ?>"/><br/><br/>
	password <input type="password" name="password" /><br/><br/>
	Photo <INPUT TYPE=HIDDEN NAME="photo" VALUE="2000000">
    <INPUT TYPE=FILE SIZE=40 NAME="photo"><br/><br/>
	Nationalité <input type="text" name="nationalite" value="<?php if(isset($_POST['nationalite'])) echo $_POST['nationalite']; ?>"/><br/><br/>
	Date de naissance <input type="text" name="date_naissance" value="<?php if(isset($_POST['date_naissance'])) echo $_POST['date_naissance']; ?>"/><br/><br/>
	Lieu de naissance <input type="text" name="lieu_naissance" value="<?php if(isset($_POST['lieu_naissance'])) echo $_POST['lieu_naissance']; ?>"/><br/><br/>
	CIN <input type="text" name="cin" value="<?php if(isset($_POST['cin'])) echo $_POST['cin']; ?>"/><br/><br/>
	Tel <input type="text" name="tel" value="<?php if(isset($_POST['tel'])) echo $_POST['tel']; ?>"/><br/><br/>
	GSM <input type="text" name="gsm" value="<?php if(isset($_POST['gsm'])) echo $_POST['gsm']; ?>"/><br/><br/>
	Email <input type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"/><br/><br/>
	Adresse <input type="text" name="adresse" value="<?php if(isset($_POST['adresse'])) echo $_POST['adresse']; ?>"/><br/><br/>
	Ville <input type="text" name="ville" value="<?php if(isset($_POST['ville'])) echo $_POST['ville']; ?>"/><br/><br/>
	Profession de père <input type="text" name="profession_pere" value="<?php if(isset($_POST['profession_pere'])) echo $_POST['profession_pere']; ?>"/><br/><br/>
	Profession de mère <input type="text" name="profession_mere" value="<?php if(isset($_POST['profession_mere'])) echo $_POST['profession_mere']; ?>"/><br/><br/>
	CNE <input type="text" name="cne" value="<?php if(isset($_POST['cne'])) echo $_POST['cne']; ?>"/><br/><br/>
	Type de bac : 
	<select name="type_bac">
		<option>PC</option>
		<option>SVT</option>
		<option>Sn Math</option>
	</select>
	 <br/>
	 <br/>
	Note de bac : <input type="text" name="note_bac" value="<?php if(isset($_POST['note_bac'])) echo $_POST['note_bac']; ?>"/><br/><br/>
	Note 1ère année : <input type="text" name="note_1er_annee" value="<?php if(isset($_POST['note_1er_annee'])) echo $_POST['note_1er_annee']; ?>"/><br/><br/>
	Classement : <input type="text" name="classement" value="<?php if(isset($_POST['classement'])) echo $_POST['classement']; ?>"/><br/><br/>
	<input type="hidden" value="ensa" name="who" / >
<input type="submit" value="envoyer">
</form>
</body>
</html>