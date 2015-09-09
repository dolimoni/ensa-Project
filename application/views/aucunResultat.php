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
                    <h3>Erreur </h3>
                </div>
				<div class="row">
                    <div class="col-sm-8 col-sm-offset-1">
	<form name="form1" method="post" action="<?php echo site_url('cntrTrombino'); ?>">
<div class="e_input e_date col-md-12">
<div class="e_input e_date col-md-12">
                                <h4> <span class="glyphicon glyphicon-certificate"></span>Aucun résultat trouvé,Veuillez ressayer </h4>
								<?php echo form_error('et'); ?>
                            </div>
                            
							
							<div class="e_login_btn col-md-4 col-md-offset-8 text-right">
                                <input type="submit" name="submit" value="Ressayer" id="e_inscription" class='btn btn-success'/>
                            </div>
							</div>
							</form>
</body>
</html>