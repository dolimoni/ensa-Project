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
                         
                            <form method="post" action="<?php echo site_url('etudiant_controller/editProfile')?>">
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
                                <span> Adresse</span><div class="pull-right"><?php echo $adresse; ?></div>
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
                           <?php
                           if($who == "ensa"){
                           ?>
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
                                     <input type="hidden" value="ensa" name="who" />
                                      <p class="pull-left"><a href="<?php echo site_url('My_controllerpdf/pdfensasprepa')?>">télécharger</a></p>
                             <?php }
                             else if($who == "cnc"){
                             ?>
                              <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                <span>Type de bac</span><div class="pull-right"><?php echo $type_bac; ?></div>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <span>Note de bac</span><div class="pull-right"><?php echo $note_bac; ?></div>
                            </div>
                             <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                 <span>filiere cp</span><div class="pull-right"><?php echo $filiere_cp; ?></div>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                 <span>etablissement cp</span><div class="pull-right"><?php echo $etablissement_cp; ?></div>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                 <span>ville_cp</span><div class="pull-right"><?php echo $ville_cp; ?></div>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                 <span>rang cp</span><div class="pull-right"><?php echo $range_cnc; ?></div>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                 <span>filière ENSA</span><div class="pull-right"><?php echo $choix1; ?></div>
                            </div>
                             <input type="hidden" value="ensa" name="cnc" />
                              <p class="pull-left"><a href="<?php echo site_url('My_controllerpdf/pdfelevescnc')?>">télécharger</a></p>
                             <?php }
                             else {
                             ?>
                              <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                <span>Type de bac</span><div class="pull-right"><?php echo $type_bac; ?></div>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <span>Note de bac</span><div class="pull-right"><?php echo $note_bac; ?></div>
                            </div>
                             <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                 <span>type de diplome</span><div class="pull-right"><?php echo $type_diplome; ?></div>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                 <span>etablissement du diplome</span><div class="pull-right"><?php echo $etablissement_diplome; ?></div>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                 <span>filière ENSA</span><div class="pull-right"><?php echo $choix1; ?></div>
                            </div>
                             <input type="hidden" value="ensa" name="3and4Year" />
                             <p class="pull-left"><a href="<?php echo site_url('My_controllerpdf/pdfconcours')?>">télécharger</a></p>
                             <?php
                             }
                             ?>
                           
                            <p class="pull-right"><input type="submit" value="modifier" class="btn-primary" /></p>
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