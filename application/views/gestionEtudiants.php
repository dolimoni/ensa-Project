<!DOCTYPE html>
<html>
    <head>
        <title>ENSA - Gestion des etudiants</title>
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
                <div class="e_title col-sm-4 col-sm-offset-2">
                    <h3>Gestion des etudiants</h3>
                </div>
                <div>
                <table class="table-list-etudiants table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>CNE</th>
                    <th>CIN</th>
                    <th>Outils</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($etudiants as $etudiant){
                    ?>
                    <tr>
                        <th scope="row"><?php echo $etudiant["id"] ?></th>
                        <td><?php echo $etudiant["nom"] ?></td>
                        <td><?php echo $etudiant["prenom"] ?></td>
                        <td><?php echo $etudiant["cne"] ?></td>
                        <td><?php echo $etudiant["cin"] ?></td>
                        <td>
                            <a href="#" title="Afficher le profile" class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span></a>
                            <a href="<?php echo site_url("admin_controller/editProfile/".$etudiant["id"]); ?>" title="Modifier les information" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a>
                            <a href="<?php echo site_url("admin_controller/supprimerEtudiant/".$etudiant["id"]); ?>" title="Supprimer" class="btn btn-danger btn-delete"><span class="glyphicon glyphicon-remove"></span></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
              </table>
                </div>
            </div>
        </div>
        
        <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
    </body>
</html>