<!DOCTYPE html>
<html>
    <head>
        <title>ENSA - Gestion des Filière</title>
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
                    <h3>Gestion des Filières</h3>
                </div>
                <div>
                <table class="table-list-etudiants table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Symbole</th>
					<th>Abréviation</th>
                    <th>Signification</th>
					<th>Created_at</th>
                    <th>Outils</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($results as $filiere){
                    ?>
                    <tr>
                        <th scope="row"><?php echo $filiere->id ?></th>
                        <td><?php echo $filiere->titre ?></td>
                        <td><?php echo $filiere->abreviation ?></td>
                        <td><?php echo $filiere->signification ?></td>
                        <td><?php echo $filiere->created_at ?></td>
                     <!-- <input type="hidden" value="<?php //$filiere->id ?>" name="id" >; 
-->					 
					   <td>
                         <!--   <a href="#" title="Afficher la filière" class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span></a>
                            -->
							<a href="<?php echo site_url("Filiere_controller/editFiliere/".$filiere->id); ?>" title="Modifier les information" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a>
                            <a href="<?php echo site_url("Filiere_controller/supprimerFiliere/".$filiere->id); ?>" title="Supprimer" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
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
<form ENCTYPE="multipart/form-data" method="post" action="
                         <?php 
                        echo site_url('filiere_controller/ajouterFiliere');
                         ?>">
						 
        <div class="e_login_btn col-md-40 col-md-offset-80 text-center">
     <input type="submit" name="submit" value="Ajouter une nouvelle filière" id="e_inscription" class='btn btn-success'/>
         </div>
        <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
    </body>
</html>