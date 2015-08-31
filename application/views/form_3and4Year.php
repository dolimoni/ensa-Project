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
                    <h3>Inscription 2eme année</h3>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <form ENCTYPE="multipart/form-data" method="post" action="<?php echo site_url('ensa_controller'); ?>">
                            <div class="alert alert-danger text-center" role="alert">
                                <span class="glyphicon glyphicon-remove-sign"></span>
                                Veuillez remplir tous les champs obligatoires
                            </div>
                            
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-user"></span>
                                <input type="text" name="nom" value="<?php if(isset($_POST['nom'])) echo $_POST['nom']; ?>" placeholder="Nom"/> 
                                <?php echo form_error('nom'); ?>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-user"></span>
                                <input type="text" name="prenom" value="<?php if(isset($_POST['prenom'])) echo $_POST['prenom']; ?>" placeholder="Prénom"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-bookmark"></span>
                                <span> Civilite</span>
                                <input type="radio" name="civilite" value="homme"/> Homme
                                <input type="radio" name="civilite" value="femme"/> Femme
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-asterisk"></span>
                                <input type="password" name="password" placeholder="Mot de passe"/> <?php echo form_error('password'); ?>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-asterisk"></span>
                                <input type="password" name="passconf" placeholder="Confirmation du mot de passe"/> <?php echo form_error('passconf'); ?>
                            </div>
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-camera"></span>
                                <span> Photo</span>
                                <INPUT TYPE="HIDDEN" NAME="photo" VALUE="2000000">
                                <INPUT TYPE="FILE" SIZE="40" NAME="photo">
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-flag"></span>
                                <input type="text" name="nationalite" value="<?php if(isset($_POST['nationalite'])) echo $_POST['nationalite']; ?>" placeholder="Nationalité" />
                            </div>
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-calendar"></span>
                                <span> Date de naissance</span>
                                <input type="text" name="date_naissance_day" placeholder="jour" id="e_jour"/>
                                <select name="date_naissance_month">
                                    <option value="0">Mois</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                                <input type="text" name="date_naissance_year" placeholder="Annee"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-map-marker"></span>
                                <input type="text" name="lieu_naissance" value="<?php if(isset($_POST['lieu_naissance'])) echo $_POST['lieu_naissance']; ?>" placeholder="Lieu de naissance"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <input type="text" name="cin" value="<?php if(isset($_POST['cin'])) echo $_POST['cin']; ?>" placeholder="CIN"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-earphone"></span>
                                <input type="text" name="tel" value="<?php if(isset($_POST['tel'])) echo $_POST['tel']; ?>" placeholder="Tel"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-phone"></span>
                                <input type="text" name="gsm" value="<?php if(isset($_POST['gsm'])) echo $_POST['gsm']; ?>" placeholder="GSM"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-envelope"></span>
                                <input type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" placeholder="Email"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-map-marker"></span>
                                <input type="text" name="adresse" value="<?php if(isset($_POST['adresse'])) echo $_POST['adresse']; ?>" placeholder="Adresse"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-map-marker"></span>
                                <input type="text" name="ville" value="<?php if(isset($_POST['ville'])) echo $_POST['ville']; ?>" placeholder="Ville"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-info-sign"></span>
                                <input type="text" name="profession_pere" value="<?php if(isset($_POST['profession_pere'])) echo $_POST['profession_pere']; ?>" placeholder="Profession du père"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-info-sign"></span>
                                <input type="text" name="profession_mere" value="<?php if(isset($_POST['profession_mere'])) echo $_POST['profession_mere']; ?>" placeholder="Profession du mère"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <input type="text" name="cne" value="<?php if(isset($_POST['cne'])) echo $_POST['cne']; ?>" placeholder="CNE"/>
                            </div>
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
                                <select name="filiere">
                                    <option>PC</option>
                                    <option>SVT</option>
                                    <option>Sn Math</option>
                                </select>
                            </div>
                                    <input type="hidden" value="3and4Year" name="who" / >
                            <div class="e_login_btn col-md-4 col-md-offset-8 text-right">
                                <input type="submit" name="submit" value="Inscription" id="e_inscription" class='btn btn-success'/>
                            </div>
                            <p class="pull-right"><a href="<?php echo site_url('My_controllerpdf/pdfensasprepa')?>">genere pdf</a>.</p>
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