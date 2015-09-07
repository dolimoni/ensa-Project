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
                        <?php echo form_open_multipart('ensa_controller');?>

                            <?php 
                            if(isset($inexistant) and $inexistant==true)
                                echo "Votre nom ne figure pas dans la liste des étudiants, vérifiez votre nom, prénom, CNE et CIN";
                            else
                            echo $this->form_validation->first_error();
                            ?>
                            <?php if (isset($error)) echo $error;?>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-user"></span><?php echo $nom; ?>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-user"></span><?php echo $prenom; ?>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-bookmark"></span>
                                <span> Civilite</span><?php echo $civilite; ?>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-flag"></span><?php echo $nationalite; ?>
                               
                            </div>
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-calendar"></span>
                                <span> Date de naissance</span>
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
                                <span class="glyphicon glyphicon-list-alt"></span>
                                <span> Type du bac</span>
                                <select name="type_bac" value=<?php if(isset($_POST['type_bac'])) echo $_POST['type_bac']; ?>>
                                    <option <?php if (isset($_POST['type_bac']) and $_POST['type_bac'] == 'PC') echo ' selected="selected"'; ?> >PC</option>
                                    <option <?php if (isset($_POST['type_bac']) and $_POST['type_bac'] == 'SVT') echo ' selected="selected"'; ?> >SVT</option>
                                    <option <?php if (isset($_POST['type_bac']) and $_POST['type_bac'] == 'Sn Math') echo ' selected="selected"'; ?>>Sn Math</option>
                                </select>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <input type="text" name="note_bac" value="<?php if(isset($_POST['note_bac'])) echo $_POST['note_bac']; ?>" placeholder="Note du bac"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <input type="text" name="note_1er_annee" value="<?php if(isset($_POST['note_1er_annee'])) echo $_POST['note_1er_annee']; ?>" placeholder="Note 1er année"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <input type="text" name="classement" value="<?php if(isset($_POST['classement'])) echo $_POST['classement']; ?>" placeholder="Classement"/>
                            </div>
                            <div class="e_input e_date col-md-12">
                                <h3>Choix de la filliere:</h3>
                            </div>
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-certificate"></span>
                                <span> Choix 1</span><br/>
                                <input type="radio" name="choix1" value="I" <?php if (isset($_POST['choix1']) and $_POST['choix1']=="I") echo 'checked="checked"';?>/>Génie industriel<br/>
                                <input type="radio" name="choix1" value="P" <?php if (isset($_POST['choix1']) and $_POST['choix1']=="P") echo 'checked="checked"';?>/>Génie des procédés et M.C<br/>
                                <input type="radio" name="choix1" value="F" <?php if (isset($_POST['choix1']) and $_POST['choix1']=="F") echo 'checked="checked"';?>/>Génie informatique<br/>
                                <input type="radio" name="choix1" value="T" <?php if (isset($_POST['choix1']) and $_POST['choix1']=="T") echo 'checked="checked"';?>/>Génie télécommunication et réseau<br/>
                            </div>
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-certificate"></span>
                                <span> Choix 2</span><br/>
                                <input type="radio" name="choix2" value="I" <?php if (isset($_POST['choix2']) and $_POST['choix2']=="I") echo 'checked="checked"';?>/>Génie industriel<br/>
                                <input type="radio" name="choix2" value="P" <?php if (isset($_POST['choix2']) and $_POST['choix2']=="P") echo 'checked="checked"';?>/>Génie des procédés et M.C<br/>
                                <input type="radio" name="choix2" value="F" <?php if (isset($_POST['choix2']) and $_POST['choix2']=="F") echo 'checked="checked"';?>/>Génie informatique<br/>
                                <input type="radio" name="choix2" value="T" <?php if (isset($_POST['choix2']) and $_POST['choix2']=="T") echo 'checked="checked"';?>/>Génie télécommunication et réseau<br/>
                            </div>
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-certificate"></span>
                                <span> Choix 3</span><br/>
                                <input type="radio" name="choix3" value="I" <?php if (isset($_POST['choix3']) and $_POST['choix3']=="I") echo 'checked="checked"';?>/>Génie industriel<br/>
                                <input type="radio" name="choix3" value="P"  <?php if (isset($_POST['choix3']) and $_POST['choix3']=="P") echo 'checked="checked"';?>/>Génie des procédés et M.C<br/>
                                <input type="radio" name="choix3" value="F"  <?php if (isset($_POST['choix3']) and $_POST['choix3']=="F") echo 'checked="checked"';?>/>Génie informatique<br/>
                                <input type="radio" name="choix3" value="T"  <?php if (isset($_POST['choix3']) and $_POST['choix3']=="T") echo 'checked="checked"';?>/>Génie télécommunication et réseau<br/>
                            </div>
                                    <input type="hidden" value="ensa" name="who" / >
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