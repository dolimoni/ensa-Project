<!DOCTYPE html>
<html>
    <head>
        <title>ENSA - Trombinoscopes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="images/favicon-32x32.png" />
         <!-- Bootstrap files -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" />
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,800,700,600,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/icons/flaticon.css" />
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/signup.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/login.css" />
    </head>
    <body>
        <!-- Inscription -->
        <div id="e_signup">
            <div class="container">
                <div class="e_title col-sm-6 col-sm-offset-2">
                    <h3>Génération des Trombinoscopes</h3>
                </div>
				<div class="row">
                    <div class="col-sm-8 col-sm-offset-1">
	<form name="form1" method="post" action="<?php echo site_url('cntrTrombino'); ?>">
<div class="e_input e_date col-md-12">
<div class="e_input e_date col-md-12">
                                <h3> <span class="glyphicon glyphicon-certificate"></span>Choix de type d'élèves </h3>
								<?php echo form_error('et'); ?>
                            </div>
                            <div class="e_input e_date col-md-12">
                               
                                
                                <input type="radio" name="et" value="ensas" /> Les élèves issus de la 2ème année cycle prépa de l'ENSAS<br/>
                                <input type="radio" name="et" value="cnc" /> Les élèves issus du cnc<br/>
                                <input type="radio" name="et" value="concours3" /> Les élèves issus du concours d'accès 3eme année<br/>
                                <input type="radio" name="et" value="concours4" /> Les élèves issus du concours d'accès 4eme année<br/>
                            <input type="radio" name="et" value="ts" /> Tous les étudiants de la 3eme année
                            
							</div>
							
							
							 <div class="e_input e_date col-md-12">
                                 <h3> <span class="glyphicon glyphicon-certificate"></span> Année universitaire  </h3>
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
                            </div>
							<div class="e_input e_date col-md-12">
                                <h3> <span class="glyphicon glyphicon-certificate"></span> Choix de la filière </h3>
								<?php echo form_error('choix1'); ?>
                            </div>
								
                            
                            <div class="e_input e_date col-md-12">
                                
                            
                                <input type="radio" name="choix1" value="D" />Génie industriel<br/>
                                <input type="radio" name="choix1" value="P" />Génie des procédés et M.C<br/>
                                <input type="radio" name="choix1" value="F" />Génie informatique<br/>
                                <input type="radio" name="choix1" value="T"  />Génie télécommunication et réseau<br/>
                            </div>
							
							<div class="e_login_btn col-md-4 col-md-offset-8 text-right">
                                <input type="submit" name="submit" value="Générer" id="e_inscription" class='btn btn-success'/>
                            </div>
							</div>
							</form>
</body>
</html>