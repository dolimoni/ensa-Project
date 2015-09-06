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
                    <h3>Modification des informations personnels</h3>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <form ENCTYPE="multipart/form-data" method="post" action="
                            <?php 
                            if($who == "ensa"){
                                echo site_url('ensa_controller/editProfile');
                            }elseif ($who == "cnc") {
                                echo site_url('cnc_controller/editProfile');
                            }else{
                                echo site_url('The3and4Year_controller/editProfile');
                            }
                            ?>">
                            <?php
                            $validationErrors = validation_errors();
                            if(!empty($validationErrors)){
                            ?>
                            <div class="alert alert-danger text-center" role="alert">
                                <span class="glyphicon glyphicon-remove-sign"></span>
                                <?php echo $validationErrors; ?>
                            </div>
                            <?php
                            }
                            ?>
                            <div class="e_input col-md-12 disabled">
                                <span class="glyphicon glyphicon-user"></span>
                                <input type="text" name="nomD" value="<?php echo $nom; ?>" placeholder="Nom" disabled="disabled"/> 
                                <input type="hidden" name="nom" value="<?php echo $nom; ?>" placeholder="Nom"/> 
                                <?php echo form_error('nom'); ?>
                            </div>
                            <div class="e_input col-md-12 disabled">
                                <span class="glyphicon glyphicon-user"></span>
                                <input type="text" name="prenomD" value="<?php echo $prenom ?>" placeholder="Prénom" disabled="disabled"/>
                                <input type="hidden" name="prenom" value="<?php echo $prenom ?>" placeholder="Prénom"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-bookmark"></span>
                                <span> Civilite</span>
                                <input type="radio" name="civilite" value="homme" <?php echoChecked($civilite,"homme") ?> /> Homme
                                <input type="radio" name="civilite" value="femme" <?php echoChecked($civilite,"femme") ?>/> Femme
                            </div>
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-camera"></span>
                                <span> Photo</span>
                                <INPUT TYPE="HIDDEN" NAME="photo" VALUE="2000000">
                                <INPUT TYPE="FILE" SIZE="40" NAME="photo">
                                <img src="<?php echo img_url($photo); ?>" class="profile-img-small"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-flag"></span>
                                <input type="text" name="nationalite" value="<?php echo $nationalite ?>" placeholder="Nationalité" />
                            </div>
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-calendar"></span>
                                <span> Date de naissance</span>
                                <input type="text" name="date_naissance_day" placeholder="jour" id="e_jour"
                                       value="<?php echo date('d', strtotime($date_naissance)); ?>"/>
                                <select name="date_naissance_month">
                                    <option value="0" <?php echoSelected("0",date('m', strtotime($date_naissance))) ?>>Mois</option>
                                    <option value="1" <?php echoSelected("1",date('m', strtotime($date_naissance))) ?>>1</option>
                                    <option value="2" <?php echoSelected("2",date('m', strtotime($date_naissance))) ?>>2</option>
                                    <option value="3" <?php echoSelected("3",date('m', strtotime($date_naissance))) ?>>3</option>
                                    <option value="4" <?php echoSelected("4",date('m', strtotime($date_naissance))) ?>>4</option>
                                    <option value="5" <?php echoSelected("5",date('m', strtotime($date_naissance))) ?>>5</option>
                                    <option value="6" <?php echoSelected("6",date('m', strtotime($date_naissance))) ?>>6</option>
                                    <option value="7" <?php echoSelected("7",date('m', strtotime($date_naissance))) ?>>7</option>
                                    <option value="8" <?php echoSelected("8",date('m', strtotime($date_naissance))) ?>>8</option>
                                    <option value="9" <?php echoSelected("9",date('m', strtotime($date_naissance))) ?>>9</option>
                                    <option value="10" <?php echoSelected("10",date('m', strtotime($date_naissance))) ?>>10</option>
                                    <option value="11" <?php echoSelected("11",date('m', strtotime($date_naissance))) ?>>11</option>
                                    <option value="12" <?php echoSelected("12",date('m', strtotime($date_naissance))) ?>>12</option>
                                </select>
                                <input type="text" name="date_naissance_year" placeholder="Annee"
                                       value="<?php echo date('Y', strtotime($date_naissance)); ?>"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-map-marker"></span>
                                <input type="text" name="lieu_naissance" value="<?php echo $lieu_naissance ?>" placeholder="Lieu de naissance"/>
                            </div>
                            <div class="e_input col-md-12 disabled">
                                <span class="glyphicon glyphicon-lock"></span>
                                <input type="text" name="cinD" value="<?php echo $cin; ?>" placeholder="CIN" disabled="disabled"/>
                                <input type="hidden" name="cin" value="<?php echo $cin; ?>" placeholder="CIN"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-earphone"></span>
                                <input type="text" name="tel" value="<?php echo $tel ?>" placeholder="Tel"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-phone"></span>
                                <input type="text" name="gsm" value="<?php echo $gsm; ?>" placeholder="GSM"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-envelope"></span>
                                <input type="text" name="email" value="<?php echo $email; ?>" placeholder="Email"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-map-marker"></span>
                                <input type="text" name="adresse" value="<?php echo $adresse ?>" placeholder="Adresse"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-map-marker"></span>
                                <input type="text" name="ville" value="<?php echo $ville ?>" placeholder="Ville"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-info-sign"></span>
                                <input type="text" name="profession_pere" value="<?php echo $profession_pere ?>" placeholder="Profession du père"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-info-sign"></span>
                                <input type="text" name="profession_mere" value="<?php echo $profession_mere ?>" placeholder="Profession du mère"/>
                            </div>
                            <div class="e_input col-md-12 disabled">
                                <span class="glyphicon glyphicon-lock"></span>
                                <input type="text" name="cneD" value="<?php echo $cne ?>" placeholder="CNE" disabled="disabled"/>
                                <input type="hidden" name="cne" value="<?php echo $cne ?>" placeholder="CNE"/>
                            </div>
                            <?php
                            // If Who == ENSA
                            if($who == "ensa"){
                            ?>
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                <span> Type du bac</span>
                                <select name="type_bac">
                                    <option value="PC" <?php echoSelected($type_bac,"PC") ?>>PC</option>
                                    <option value="SVT" <?php echoSelected($type_bac,"SVT") ?>>SVT</option>
                                    <option value="Sn Math" <?php echoSelected($type_bac,"Sn Math") ?>>Sn Math</option>
                                </select>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <input type="text" name="note_bac" value="<?php echo $note_bac; ?>" placeholder="Note du bac"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <input type="text" name="note_1er_annee" value="<?php echo $note_1er_annee; ?>" placeholder="Note 1er année"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <input type="text" name="classement" value="<?php echo $classement_1er_annee; ?>" placeholder="Classement"/>
                            </div>
                            <div class="e_input e_date col-md-12">
                                <h3>Choix de la filliere:</h3>
                            </div>
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-certificate"></span>
                                <span> Choix 1</span><br/>
                                <input type="radio" name="choix1" value="Génie industriel" <?php echoChecked($choix1,"Génie industriel") ?> />Génie industriel<br/>
                                <input type="radio" name="choix1" value="Génie des procédés et M.C" <?php echoChecked($choix1,"Génie des procédés et M.C") ?> />Génie des procédés et M.C<br/>
                                <input type="radio" name="choix1" value="Génie informatique" <?php echoChecked($choix1,"Génie informatique") ?> />Génie informatique<br/>
                                <input type="radio" name="choix1" value="Génie télécommunication et réseau" <?php echoChecked($choix1,"Génie télécommunication et réseau") ?> />Génie télécommunication et réseau<br/>
                            </div>
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-certificate"></span>
                                <span> Choix 2</span><br/>
                                <input type="radio" name="choix2" value="Génie industriel" <?php echoChecked($choix2,"Génie industriel") ?> />Génie industriel<br/>
                                <input type="radio" name="choix2" value="Génie des procédés et M.C" <?php echoChecked($choix2,"Génie des procédés et M.C") ?> />Génie des procédés et M.C<br/>
                                <input type="radio" name="choix2" value="Génie informatique" <?php echoChecked($choix2,"Génie informatique") ?> />Génie informatique<br/>
                                <input type="radio" name="choix2" value="Génie télécommunication et réseau" <?php echoChecked($choix2,"Génie télécommunication et réseau") ?> />Génie télécommunication et réseau<br/>
                            </div>
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-certificate"></span>
                                <span> Choix 3</span><br/>
                                <input type="radio" name="choix3" value="Génie industriel" <?php echoChecked($choix3,"Génie industriel") ?> />Génie industriel<br/>
                                <input type="radio" name="choix3" value="Génie des procédés et M.C" <?php echoChecked($choix3,"Génie des procédés et M.C") ?> />Génie des procédés et M.C<br/>
                                <input type="radio" name="choix3" value="Génie informatique" <?php echoChecked($choix3,"Génie informatique") ?> />Génie informatique<br/>
                                <input type="radio" name="choix3" value="Génie télécommunication et réseau" <?php echoChecked($choix3,"Génie télécommunication et réseau") ?> />Génie télécommunication et réseau<br/>
                            </div>
                            <input type="hidden" value="ensa" name="who" />
                            <?php
                            }elseif ($who == "cnc") {
                            ?>        
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                <span> Type du bac</span>
                                <select name="type_bac">
                                    <option>PC</option>
                                    <option>SVT</option>
                                    <option>Sn Math</option>
                                </select>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <input type="text" name="note_bac" value="<?php if(isset($_POST['note_bac'])) echo $_POST['note_bac']; ?>" placeholder="Note du bac"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <input type="text" name="filiere_cp" value="<?php if(isset($_POST['filiere_cp'])) echo $_POST['filiere_cp']; ?>" placeholder="Filiere CP"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <input type="text" name="etablissement_cp" value="<?php if(isset($_POST['etablissement_cp'])) echo $_POST['etablissement_cp']; ?>" placeholder="Etablissement CP"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <input type="text" name="ville_cp" value="<?php if(isset($_POST['ville_cp'])) echo $_POST['ville_cp']; ?>" placeholder="Ville"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <input type="text" name="range_cnc" value="<?php if(isset($_POST['range_cnc'])) echo $_POST['range_cnc']; ?>" placeholder="Range CNC"/>
                            </div>
                            <div class="e_input e_date col-md-12">
                                <h3>Choix de la filliere:</h3>
                            </div>
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                <span> Choix de la filiere</span>
                                <input type="radio" name="filiere" value="Génie industriel" />Génie industriel<br/>
                                <input type="radio" name="filiere" value="Génie des procédés et M.C" />Génie des procédés et M.C<br/>
                                <input type="radio" name="filiere" value="Génie informatique" />Génie informatique<br/>
                                <input type="radio" name="filiere" value="Génie télécommunication et réseau" />Génie télécommunication et
                            </div>
                            <?php
                            }else{
                            ?>
                            <div class="e_input e_date col-md-12">
                                <h3>Information du diplome</h3>
                            </div>
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                <span> Type du bac</span>
                                <select name="type_bac">
                                    <option>PC</option>
                                    <option>SVT</option>
                                    <option>Sn Math</option>
                                </select>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <input type="text" name="note_bac" value="<?php if(isset($_POST['note_bac'])) echo $_POST['note_bac']; ?>" placeholder="Note du bac"/>
                            </div>
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                <span> Diplome : </span>
                                <select name="type_diplome">
                                    <option>DUT</option>
                                    <option>Licence</option>
                                </select>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <input type="text" name="etablissement_diplome" value="<?php if(isset($_POST['etablissement_diplome'])) echo $_POST['etablissement_diplome']; ?>" placeholder="Etablissement d'obtention du diplome"/>
                            </div>
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                <span> Choix de la filiere</span>
                                <input type="radio" name="filiere" value="Génie industriel" />Génie industriel<br/>
                                <input type="radio" name="filiere" value="Génie des procédés et M.C" />Génie des procédés et M.C<br/>
                                <input type="radio" name="filiere" value="Génie informatique" />Génie informatique<br/>
                                <input type="radio" name="filiere" value="Génie télécommunication et réseau" />Génie télécommunication et
                            </div>
                            <?php
                            }
                            ?>
                            <div class="e_login_btn col-md-4 col-md-offset-8 text-right">
                                <input type="submit" name="submit" value="Valider les modifications" id="e_inscription" class='btn btn-success'/>
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