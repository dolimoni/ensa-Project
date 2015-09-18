<!DOCTYPE html>
<html>
    <head>
        <title>ENSA - Files</title>
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
                    <h3>Insertion de fichiers </h3>
                </div>
				<div class="row">
                    <div class="col-sm-8 col-sm-offset-1">
	<!-- non pas <form> pr pouvoir transferer le fichier-->
	<?php echo form_open_multipart('cntr_RI/RI_admin');?>
	
<div class="e_input e_date col-md-12">
<div class="e_input e_date col-md-12">

<h3> <span class="glyphicon glyphicon-certificate"></span>Choisir un fichier </h3>
				<?php echo form_error('userfile'); ?>			
<input type="file" name="userfile"/>
                         
                                <h3> <span class="glyphicon glyphicon-certificate"></span>Choix de type de fichier </h3>
								
                            </div>
                            <div class="e_input e_date col-md-12">
                               <?php echo form_error('fichier'); ?>
                                
                                <input type="radio" name="fichier" value="1CP" />Fiche de renseignements -1ere année cycle Préparatoir<br/>
                                <input type="radio" name="fichier" value="2CP" /> Fiche de renseignements-2eme année Cycle Préparatoir<br/>
                                <input type="radio" name="fichier" value="1CI" /> Fiche de renseignements-1eme année Cycle Ingénieur<br/>
                                <input type="radio" name="fichier" value="2CI" /> Fiche de renseignements-2eme année Cycle Ingénieur<br/>
                                <input type="radio" name="fichier" value="3CI" /> Fiche de renseignements-3eme année Cycle Ingénieur<br/>
                                <input type="radio" name="fichier" value="cnc" /> Dossier d'inscription définitif dn CNC  <?php $d=date('Y');$dd=date('Y')+1; echo $d."-".$dd; ?> <br/>
								<input type="radio" name="fichier" value="pieces" /> Pièces à fournir pour la réinscription<br/>
                            
							</div>
							
							
							<div class="e_login_btn col-md-4 col-md-offset-8 text-right">
                                <input type="submit" name="upload" value="upload" id="e_inscription" class='btn btn-success'/>
                            </div>
							</div>
							</form>
</body>
</html>