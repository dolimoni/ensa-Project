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
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/signup.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/login.css" />
    </head>
    <body>
        <!-- Inscription -->
        <div id="e_signup">
            <div class="container">
                <div class="e_title col-sm-4 col-sm-offset-2">
                    <h3>Mon profile</h3>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                      <br/><br/><br/><br/>

                            <?php 
                            if(isset($inexistant) and $inexistant==true)
                                echo "Votre nom ne figure pas dans la liste des étudiants, vérifiez votre nom, prénom, CNE et CIN";
                            else
                            echo $this->form_validation->first_error();
                            ?>
                            <?php if (isset($error)) echo $error;?>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-bookmark"></span>
                                <span> nom </span><?php echo $nom; ?>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-bookmark"><span> prénom </span></span><?php echo $prenom; ?>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <span> CIN</span><?php echo $cin; ?>
                            </div>
                             <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span><span> CNE</span><?php echo $cne; ?>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-bookmark"></span>
                                <span> Civilité</span><?php echo $civilite; ?>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-flag">
                                 <span> Nationalité</span></span><?php echo $nationalite; ?>
                               
                            </div>
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-calendar"></span>
                                <span> Date de naissance</span><?php echo $date_naissance; ?>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-map-marker">
                                <span> Lieu de naissance</span></span><?php echo $lieu_naissance; ?>
                            </div>

                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-earphone">
                                <span> Téléphone</span></span><?php echo $tel; ?>
                                
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-phone"></span>
                                <span> GSM</span><?php echo $gsm; ?>
                                
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-envelope">
                                <span> Email</span></span><?php echo $email; ?>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-map-marker"></span>
                                <span> Adresse</span><?php echo $adresse; ?>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-map-marker"></span>
                                <span> Ville</span><?php echo $ville; ?>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-info-sign"></span>
                                <span>Profession du père</span><?php echo $profession_pere; ?>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-info-sign"></span>
                                <span> Porfession de la mère</span><?php echo $profession_mere; ?>
                            </div>
                           
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                <span>Type de bac</span><?php echo $type_bac; ?>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <span>Note de bac</span><?php echo $note_bac; ?>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span><span>Note de la 1er année</span><?php echo $note_1er_annee; ?>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>// à faire le classement
                            </div>
                            Choix de filière : <br/>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>1er choix</th>
                                                    <th>2éme choix</th>
                                                    <th>3éme choix</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $choix1; ?></td>
                                                    <td><?php echo $choix2; ?></td>
                                                    <td><?php echo $choix3; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                           
                            <p class="pull-left"><a href="<?php echo site_url('My_controllerpdf/pdfensasprepa')?>">télécharger</a></p>
                            <p class="pull-right"><input type="button" value="modifier" class="btn-primary" OnClick="window.location.href='<?php echo site_url('etudiant_controller/edit')?>'"/></p>
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