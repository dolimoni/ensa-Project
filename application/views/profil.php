<!DOCTYPE html>
<html>
    <head>
        <title>ENSA - Authentification</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="images/favicon-32x32.png" />
        <link rel="stylesheet" type="text/css" href="<?php echo css_url('style')?>">
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
                  <div class="pull-right"><img src="<?php echo img_url($cin.".jpg"); ?>" style="width:200px; height: 200px; position:relative; left:14px;" /></div>
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
                                <span> nom </span><div class="pull-right"><?php echo $nom; ?></div>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-bookmark"><span> prénom </span></span><div class="pull-right"><?php echo $prenom; ?></div>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <span> CIN</span><div class="pull-right"><?php echo $cin; ?></div>
                            </div>
                             <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span><span> CNE</span><div class="pull-right"><?php echo $cne; ?></div>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-bookmark"></span>
                                <span> Civilité</span><div class="pull-right"><?php echo $civilite; ?></div>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-flag">
                                 <span> Nationalité</span></span><div class="pull-right"><?php echo $nationalite; ?></div>
                               
                            </div>
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-calendar"></span>
                                <span> Date de naissance</span><div class="pull-right"><?php echo $date_naissance; ?></div>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-map-marker">
                                <span> Lieu de naissance</span></span><div class="pull-right"><?php echo $lieu_naissance; ?></div>
                            </div>

                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-earphone">
                                <span> Téléphone</span></span><div class="pull-right"><?php echo $tel; ?></div>
                                
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-phone"></span>
                                <span> GSM</span><div class="pull-right"><?php echo $gsm; ?></div>
                                
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-envelope">
                                <span> Email</span></span><div class="pull-right"><?php echo $email; ?></div>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-map-marker"></span>
                                <span> Adresse</span><div class="pull-right"><?php echo $adresse; ?></div>/
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-map-marker"></span>
                                <span> Ville</span> <div class="pull-right"><?php echo $ville; ?></div>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-info-sign"></span>
                                <span>Profession du père</span><div class="pull-right"><?php echo $profession_pere; ?></div>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-info-sign"></span>
                                <span> Porfession de la mère</span><div class="pull-right"><?php echo $profession_mere; ?></div>
                            </div>
                           
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                <span>Type de bac</span><div class="pull-right"><?php echo $type_bac; ?></div>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <span>Note de bac</span><div class="pull-right"><?php echo $note_bac; ?></div>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span><span>Note de la 1er année</span>
                                <div class="pull-right"><?php echo $note_1er_annee; ?></div>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <div class="pull-right">// à faire le classement</div>
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
                            <p class="pull-right"><input type="button" value="modifier" class="btn-primary" OnClick="window.location.href='<?php echo site_url('etudiant_controller/editProfile')?>'"/></p>
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