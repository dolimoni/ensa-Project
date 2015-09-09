<!DOCTYPE html>
<html>
    <head>
        <title>ENSA - Modification des Filières</title>
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
        <!-- Modifier une filiere -->
        <div id="e_signup">
            <div class="container">
                <div class="e_title col-sm-4 col-sm-offset-2">
                    <h3>Modification des Filières</h3>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                      <form ENCTYPE="multipart/form-data" method="post" action="<?php echo site_url('filiere_controller/editFiliereConf');?>">
                            <?php
                    foreach($results as $filiere){
                    ?>
                            <div class="e_input col-md-12 disabled">
                                <span class="glyphicon glyphicon-user"></span>
                                <input type="text" name="id" value="<?php echo $filiere->id ?>" placeholder="id"  readonly="true" /> 
                                
                            </div>
                           <?php  echo form_error('titre'); ?>
							<div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-info-sign"></span>
                                <span> Symbole</span>
								<input type="text" name="titre" value="<?php echo $filiere->titre ?>" placeholder="Symbole" />
                           </div>
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-info-sign"></span>
                                <span> Abréviation</span>
								<input type="text" name="abreviation" value="<?php echo $filiere->abreviation ?>" placeholder="Abreviation"/>
                           </div>
						    <?php  echo form_error('abreviation'); ?>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-info-sign"></span>
                                <span> Signification</span>
                                <input type="text" name="signification" value="<?php echo $filiere->signification ?>" placeholder="Signification"/>
                         
							</div>
							 <?php  echo form_error('signification'); ?>
							
                            
                             <?php
							}
							?>
                            
                         
							
							
                            <div class="e_login_btn col-md-4 col-md-offset-8 text-center">
                                <input type="submit" value="Valider" id="e_inscription" class='btn btn-success'/>
                                <a href="<?php echo site_url('Filiere_controller/gestionFiliere')?>"> Annuler</a>
                           
							</div>
							  
							
						  
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
    </body>
</html>