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
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/jquery.js" />
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
                        <?php echo form_open_multipart('ensa_controller');?>
                            

                            <?php 
                            if(isset($inexistant) and $inexistant==true)
                            {
                            ?>
                            <div class="alert alert-danger text-center" role="alert">
                                <span class="glyphicon glyphicon-remove-sign"></span>
                                Votre nom ne figure pas dans la liste des étudiants, vérifiez le nom, prénom, CNE et CIN
                            </div>
                                
                            <?php
                            }
                            else if($this->form_validation->first_error()!="")
                            {
                            ?>
                             <div class="alert alert-danger text-center" role="alert">
                                <span class="glyphicon glyphicon-remove-sign"></span>
                               <?php  echo $this->form_validation->first_error(); ?>
                            </div>
                            <?php
                            }
                           
                            ?>

                            <?php if (isset($error)) 
                            {
                            ?>
                             <div class="alert alert-danger text-center" role="alert">
                                <span class="glyphicon glyphicon-remove-sign"></span>
                              <?php echo $error;?>
                            </div>
                            <?php
                            }
                           ?>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-user"></span>
                                <span>Nom</span>
                                <input type="text" name="nom" value="<?php if(isset($_POST['nom'])) echo $_POST['nom']; ?>" class="pull-right"/> 
                                <span class="obli">*</span>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-user"></span>
                                <span>Prénom</span>
                                <input type="text" name="prenom" value="<?php if(isset($_POST['prenom'])) echo $_POST['prenom']; ?>" class="pull-right"/>
                                <span class="obli">*</span>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-bookmark"></span>
                                <span> Civilite</span>
                                <input type="radio" name="civilite" value="homme" <?php if (isset($_POST['civilite']) and $_POST['civilite']=="homme") echo 'checked="checked"';?>  checked="checked"/> Homme
                                <input type="radio" name="civilite" value="femme" <?php if (isset($_POST['civilite']) and $_POST['civilite']=="femme") echo 'checked="checked"';?> /> Femme
                                <span class="obli">*</span>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-asterisk"></span>
                                <span>Mot de passe</span>
                                <input type="password" name="password" class="pull-right"/>
                                <span class="obli">*</span>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-asterisk"></span>
                                <span>Confirmation</span>
                                <input type="password" name="passconf" class="pull-right"/>
                                <span class="obli">*</span>
                            </div>
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-camera"></span>
                                <span> Photo</span>
                                <span class="obli">*</span>
                                <INPUT TYPE="HIDDEN" NAME="photo" VALUE="2000000">
                                <INPUT TYPE="FILE" SIZE="40" NAME="photo">
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-flag"></span>
                                <span>Nationalité</span>
                                <input type="text" name="nationalite" value="<?php if(isset($_POST['nationalite'])) echo $_POST['nationalite']; ?>"  class="pull-right"/>
                                <span class="obli">*</span>
                            </div>
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-calendar"></span>
                                <span> Date de naissance</span>
                                <span class="obli">*</span>
                                <input type="text" name="date_naissance_day" placeholder="jour" id="e_jour" value="<?php if(isset($_POST['date_naissance_day'])) echo $_POST['date_naissance_day']; ?>"/>
                                <select name="date_naissance_month">
                                    <option value="01" <?php if ( isset($_POST['date_naissance_month']) and $_POST['date_naissance_month'] == 'Janvier') echo ' selected="selected"'; ?> >Janvier</option>
                                    <option value="02" <?php if (isset($_POST['date_naissance_month']) and $_POST['date_naissance_month'] == 'Février') echo ' selected="selected"'; ?> >Février</option>
                                    <option value="03" <?php if (isset($_POST['date_naissance_month']) and $_POST['date_naissance_month'] == 'Mars') echo ' selected="selected"'; ?> >Mars</option>
                                    <option value="04" <?php if (isset($_POST['date_naissance_month']) and $_POST['date_naissance_month'] == 'Avril') echo ' selected="selected"'; ?> >Avril</option>
                                    <option value="05" <?php if (isset($_POST['date_naissance_month']) and $_POST['date_naissance_month'] == 'Mai') echo ' selected="selected"'; ?> >Mai</option>
                                    <option value="06" <?php if (isset($_POST['date_naissance_month']) and $_POST['date_naissance_month'] == 'Juin') echo ' selected="selected"'; ?> >Juin</option>
                                    <option value="07" <?php if (isset($_POST['date_naissance_month']) and $_POST['date_naissance_month'] == 'Juillet') echo ' selected="selected"'; ?> >Juillet</option>
                                    <option value="08" <?php if (isset($_POST['date_naissance_month']) and $_POST['date_naissance_month'] == 'Aout') echo ' selected="selected"'; ?> >Aout</option>
                                    <option value="09" <?php if (isset($_POST['date_naissance_month']) and $_POST['date_naissance_month'] == 'Septembre') echo ' selected="selected"'; ?> >Septembre</option>
                                    <option value="10" <?php if (isset($_POST['date_naissance_month']) and $_POST['date_naissance_month'] == 'Octobre') echo ' selected="selected"'; ?> >Octobre</option>
                                    <option value="11" <?php if (isset($_POST['date_naissance_month']) and $_POST['date_naissance_month'] == 'Novembre') echo ' selected="selected"'; ?> >Novembre</option>
                                    <option value="12" <?php if (isset($_POST['date_naissance_month']) and $_POST['date_naissance_month'] == 'Décembre') echo ' selected="selected"'; ?>>Décembre</option>
                                </select>
                                <input type="text" name="date_naissance_year" placeholder="Annee" value="<?php if(isset($_POST['date_naissance_year'])) echo $_POST['date_naissance_year']; ?>"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-map-marker"></span>
                                <span>Lieu de naissance</span>
                                <input type="text" name="lieu_naissance" value="<?php if(isset($_POST['lieu_naissance'])) echo $_POST['lieu_naissance']; ?>" class="pull-right"/>
                                <span class="obli">*</span>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <span>CIN</span>
                                <input type="text" name="cin" value="<?php if(isset($_POST['cin'])) echo $_POST['cin']; ?>" class="pull-right"/>
                                <span class="obli">*</span>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-earphone"></span>
                                <span>Tel</span>
                                <input type="text" name="tel" value="<?php if(isset($_POST['tel'])) echo $_POST['tel']; ?>" class="pull-right"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-phone"></span>
                                <span>GSM</span>
                                <input type="text" name="gsm" value="<?php if(isset($_POST['gsm'])) echo $_POST['gsm']; ?>" class="pull-right"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-envelope"></span>
                                <span>Email</span>
                                <input type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" class="pull-right"/>
                                <span class="obli">*</span>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-map-marker"></span>
                                <span>Adresse</span>
                                <input type="text" name="adresse" value="<?php if(isset($_POST['adresse'])) echo $_POST['adresse']; ?>" class="pull-right"/>
                                <span class="obli">*</span>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-map-marker"></span>
                                <span>Ville</span>
                                <input type="text" name="ville" value="<?php if(isset($_POST['ville'])) echo $_POST['ville']; ?>" class="pull-right"/>
                                <span class="obli">*</span>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-info-sign"></span>
                                <span>Profession du père</span>
                                <input type="text" name="profession_pere" value="<?php if(isset($_POST['profession_pere'])) echo $_POST['profession_pere']; ?>" class="pull-right"/>
                                <span class="obli">*</span>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-info-sign"></span>
                                <span>Profession du mère</span>
                                <input type="text" name="profession_mere" value="<?php if(isset($_POST['profession_mere'])) echo $_POST['profession_mere']; ?>" class="pull-right"/>
                                <span class="obli">*</span>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <span>CNE</span>
                                <input type="text" name="cne" value="<?php if(isset($_POST['cne'])) echo $_POST['cne']; ?>" class="pull-right"/>
                                <span class="obli">*</span>
                            </div>
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                <span> Type du bac</span>
                                <span class="obli">*</span>
                                <select name="type_bac" value=<?php if(isset($_POST['type_bac'])) echo $_POST['type_bac']; ?>>
                                    <option <?php if (isset($_POST['type_bac']) and $_POST['type_bac'] == 'PC') echo ' selected="selected"'; ?> >PC</option>
                                    <option <?php if (isset($_POST['type_bac']) and $_POST['type_bac'] == 'SVT') echo ' selected="selected"'; ?> >SVT</option>
                                    <option <?php if (isset($_POST['type_bac']) and $_POST['type_bac'] == 'Sn Math') echo ' selected="selected"'; ?>>Sn Math</option>
                                </select>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <span>Note du bac</span>
                                <input type="text" name="note_bac" value="<?php if(isset($_POST['note_bac'])) echo $_POST['note_bac']; ?>" class="pull-right"/>
                                <span class="obli">*</span>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <span>Note 1er Annee</span>
                                <input type="text" name="note_1er_annee" value="<?php if(isset($_POST['note_1er_annee'])) echo $_POST['note_1er_annee']; ?>" class="pull-right"/>
                            </div>
                            <div class="e_input col-md-12">
                                <span class="glyphicon glyphicon-lock"></span>
                                <span>Classement</span>
                                <input type="text" name="classement" value="<?php if(isset($_POST['classement'])) echo $_POST['classement']; ?>"  class="pull-right"/>
                            </div>
                            <div class="e_input e_date col-md-12">
                                <h3>Choix de la filliere:</h3>
                            </div>
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-certificate"></span>
                                <span> Choix 1</span><span class="obli">*</span><br/>
                                <input type="radio" name="choix1" value="D" <?php if (isset($_POST['choix1']) and $_POST['choix1']=="I") echo 'checked="checked"';?>/>Génie industriel<br/>
                                <input type="radio" name="choix1" value="P" <?php if (isset($_POST['choix1']) and $_POST['choix1']=="P") echo 'checked="checked"';?>/>Génie des procédés et M.C<br/>
                                <input type="radio" name="choix1" value="I" <?php if (isset($_POST['choix1']) and $_POST['choix1']=="F") echo 'checked="checked"';?>/>Génie informatique<br/>
                                <input type="radio" name="choix1" value="T" <?php if (isset($_POST['choix1']) and $_POST['choix1']=="T") echo 'checked="checked"';?>/>Génie télécommunication et réseau<br/>
                            </div>
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-certificate"></span>
                                <span> Choix 2</span><span class="obli">*</span><br/>
                                <input type="radio" name="choix2" value="D" <?php if (isset($_POST['choix2']) and $_POST['choix2']=="I") echo 'checked="checked"';?>/>Génie industriel<br/>
                                <input type="radio" name="choix2" value="P" <?php if (isset($_POST['choix2']) and $_POST['choix2']=="P") echo 'checked="checked"';?>/>Génie des procédés et M.C<br/>
                                <input type="radio" name="choix2" value="I" <?php if (isset($_POST['choix2']) and $_POST['choix2']=="F") echo 'checked="checked"';?>/>Génie informatique<br/>
                                <input type="radio" name="choix2" value="T" <?php if (isset($_POST['choix2']) and $_POST['choix2']=="T") echo 'checked="checked"';?>/>Génie télécommunication et réseau<br/>
                            </div>
                            <div class="e_input e_date col-md-12">
                                <span class="glyphicon glyphicon-certificate"></span>
                                <span> Choix 3</span><span class="obli">*</span><br/>
                                <input type="radio" name="choix3" value="D" <?php if (isset($_POST['choix3']) and $_POST['choix3']=="I") echo 'checked="checked"';?>/>Génie industriel<br/>
                                <input type="radio" name="choix3" value="P"  <?php if (isset($_POST['choix3']) and $_POST['choix3']=="P") echo 'checked="checked"';?>/>Génie des procédés et M.C<br/>
                                <input type="radio" name="choix3" value="I"  <?php if (isset($_POST['choix3']) and $_POST['choix3']=="F") echo 'checked="checked"';?>/>Génie informatique<br/>
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
              <div class="rating">
          <input type="radio" name="group1" value="1" />1
          <input type="radio" name="group1" value="2" />2
          <!-- more radio buttons -->
      </div>
      <div class="rating">
          <input type="radio" name="group2" value="1" />1
           <input type="radio" name="group2" value="2" />2
          <!-- more radio buttons -->
</div>
        
    </body>
        <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>

      <script src="jquery.js"></script>
        <script>

            var choix1= "";
            var choix2= "";
            var choix3= "";
            var val = $('.choix1:checked').val();  
                var name= $(this).attr('name');
                  if(choix1=="")
                     choix1=$('.choix1:checked').val();
                  if(choix2=="")
                     choix2=$('.choix2:checked').val();
                  if(choix3=="")
                     choix3=$('.choix3:checked').val();
                 
               $('input:radio:not([name="choix1"])[value="' + choix1 + '"]').attr('disabled', false);
               $('input:radio:not([name="choix1"])[value="' + val + '"]').attr('disabled', true); 


               var val2 = $('.choix2:checked').val();

               $('input:radio:not([name="choix2"])[value="' + choix2 + '"]').attr('disabled', false);
               $('input:radio:not([name="choix2"])[value="' + val2 + '"]').attr('disabled', true); 


               var val3 = $('.choix3:checked').val();

               $('input:radio:not([name="choix3"])[value="' + choix3 + '"]').attr('disabled', false);
               $('input:radio:not([name="choix3"])[value="' + val3 + '"]').attr('disabled', true); 

               choix1=$('.choix1:checked').val();
               choix2=$('.choix2:checked').val(); 
               choix3=$('.choix3:checked').val(); 
            var f=function(){
                var val = $('.choix1:checked').val();  
                var name= $(this).attr('name');
                  if(choix1=="")
                     choix1=$('.choix1:checked').val();
                  if(choix2=="")
                     choix2=$('.choix2:checked').val();
                  if(choix3=="")
                     choix3=$('.choix3:checked').val();

               $('input:radio:not([name="choix1"])[value="' + choix1 + '"]').attr('disabled', false);
               $('input:radio:not([name="choix1"])[value="' + val + '"]').attr('disabled', true); 


               var val2 = $('.choix2:checked').val();

               $('input:radio:not([name="choix2"])[value="' + choix2 + '"]').attr('disabled', false);
               $('input:radio:not([name="choix2"])[value="' + val2 + '"]').attr('disabled', true); 


               var val3 = $('.choix3:checked').val();

               $('input:radio:not([name="choix3"])[value="' + choix3 + '"]').attr('disabled', false);
               $('input:radio:not([name="choix3"])[value="' + val3 + '"]').attr('disabled', true); 

               choix1=$('.choix1:checked').val();
               choix2=$('.choix2:checked').val(); 
               choix3=$('.choix3:checked').val(); 
            };
            $("input:radio").change(f);

        </script>
</html>