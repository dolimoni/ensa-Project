<!DOCTYPE html>
<html>
    <head>
        <title>ENSAS Files</title>
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
                    <h3>Ajout </h3>
                </div>
				<div class="row">
                    <div class="col-sm-8 col-sm-offset-1">
	<form name="form1" method="post" action="<?php echo site_url('cntr_RI/gestionRI_admin'); ?>">
<div class="e_input e_date col-md-12">
<div class="e_input e_date col-md-12">
                                <h4> <span class="glyphicon glyphicon-certificate"></span>Fichier bien ajouté </h4>
								
                            </div>
							affichage des fichiers 
							<br><br>
							<table>
							
                            <?php
							  
							  /* metthode 2  */
							  $nb_fichier = 0;
						
							  if($dossier = opendir('./telechargements'))
							{
								while(false !== ($fichier = readdir($dossier)))

									{if($fichier != '.' && $fichier != '..' && $fichier != 'index.php')
										{
											$nb_fichier++; // On incrémente le compteur de 1

								echo '<tr><td><a href="./telechargements/' . $fichier . '">' . $fichier . '   </a>';
                                  // site_url('cntr_RI/supp_fichier('./telechargements/' . $fichier . ')');
					

								?>
								
				<td><td><a href="<?php echo site_url("cntr_RI/supp_fichier/".$fichier);?>">Supprimer </a>
				
				<!--
				<a href="<?php echo site_url("cntr_RI/supp_fichier/".$ff3); ?>" title="Supprimer" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                -->     				
								
								<?php   
								   //$this->load->view('Gestion_reinscription_admin.php');
								} // On ferme le if (qui permet de ne pas afficher index.php, etc.)

								 

								} // On termine la boucle
									echo '<br />';

						echo '<tr><td><br><br>Il y a <strong>' . $nb_fichier .'</strong> fichier(s) dans le dossier';

						 

						closedir($dossier);

						 

						}

						 

						else

							 echo 'Le dossier n\' a pas pu être ouvert';	
							?>
						</table><br><br><br>
							<div class="e_login_btn col-md-4 col-md-offset-8 text-right">
                                <input type="submit" name="submit" value="Retour" id="e_inscription" class='btn btn-success'/>
                            </div>
							</div>
							</form>
</body>
</html>