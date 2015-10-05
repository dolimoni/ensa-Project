<!DOCTYPE html>
<html>
    <head>
        <title>ENSA - Administration</title>
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
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/admin.css"/>
    </head>
    <body>
        <!-- Inscription -->
        <div id="e_signup">
            <div class="container">
                <div class="e_title col-sm-4 col-sm-offset-2">
                    <h3>Administration</h3>
                </div>
                <div class="row admin">
                    <div class="col-sm-3 sidebar">
                        <ul>
                            <li><a href="<?php echo site_url("Admin"); ?>"><span class="glyphicon glyphicon-dashboard"></span> Information generale</a></li>
                            <li><a href="<?php echo site_url("admin_controller/gestionEtudiants"); ?>"><span class="glyphicon glyphicon-user"></span> Gestion des etudiants</a></li>
                            <li><a href="<?php echo site_url("Filiere_controller/gestionFiliere"); ?>"><span class="glyphicon glyphicon-picture"></span> Gestion des fillieres</a></li>
                            <li><a href="<?php echo site_url("admin_controller/statistics"); ?>"><span class="glyphicon glyphicon-file"></span> Statistiques</a></li>
                            <li><a href="<?php echo site_url("admin_controller/attributionUpload"); ?>"><span class="glyphicon glyphicon-file"></span> Attribution des filières</a></li>
                            <li><a href="<?php echo site_url("etudiant_controller/deconnexion"); ?>"><span class="glyphicon glyphicon-file"></span> Deconnexion</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-9 content">
                        <h3 class="page-title">Dashboard <span> Information generale </span></h3>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
    </body>
</html>