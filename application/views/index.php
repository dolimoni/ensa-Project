<!DOCTYPE html>
<html>
    <head>
        <title>ENSA - Authentification</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="images/favicon-32x32.png" />
         <!-- Bootstrap files -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" />
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,800,700,600,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/icons/flaticon.css" />
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/cummon.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/signup.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/login.css" />
    </head>
    <body>
        <!-- Inscription -->
        <div id="e_signup">
            <div class="container">
                <div class="e_title col-sm-4 col-sm-offset-2">
                    <h3>Authentification</h3>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <form method="post" action="<?php echo site_url('Etudiant_controller/login');?>">
                            <div class="alert alert-danger text-center" role="alert">
                                <span class="glyphicon glyphicon-remove-sign"></span>
                                Email et/ou mot de passe est incorrecte!
                            </div>
                            
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-user"></span>
                                <input type="text" name="cin" placeholder="Votre CIN"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-user"></span>
                                <input type="text" name="cne" placeholder="Votre CNE"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <input type="password" name="password" placeholder="Mot de passe"/>
                            </div>
                            <div class="e_login_btn col-md-4 col-md-offset-8 text-right">
                                <input type="submit" name="submit" value="Connexion" id="e_inscription" class='btn btn-success'/>
                            </div>
                            <p class="pull-right">Vous n'avez pas de compte ? <a href="signup.php">Insciption</a>.</p>
                        </form>
                    </div>
                </div>
                (admin account : cin =1,cne=1,password=essalhi)<br/>
                (authentifaction for students is not totaly ready)<br/>
                <a href="<?php echo site_url('ensa_controller/inscription_ensa') ?>">inscription 2eme année</a><br/>
                <a href="<?php echo site_url('cnc_controller/inscription_cnc') ?>">inscription cnc</a><br/>
                <a href="<?php echo site_url('The3and4Year_controller/inscription_3and4Year') ?>">inscription 3eme et 4eme année</a><br/><br/>
                <a href="<?php echo site_url('admin_controller/administration') ?>">Administration - upload the excel File</a><br/><br/>
                <a href="<?php echo site_url('etudiant_controller/sendEmailtoUser') ?>">Send a test email</a><br/>
            </div>
        </div>
        
        <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
    </body>
</html>