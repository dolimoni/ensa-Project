<!DOCTYPE html>
<html>
    <head>
        <title>ENSA - Réinscription</title>
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
                    <h3>Réinscription</h3>
                </div>
                <table class="table table-bordered table-calendrier">
                  <tbody>
                    <tr>
                      <th scope="row">25 Juin</th>
                      <td>Ouverture des choix de filliere en ligne sur le site web</td>
                    </tr>
                    <tr>
                      <th scope="row">03 juillet</th>
                      <td>Date de limite des choix de filliere</td>
                    </tr>
                      <tr>
                      <th scope="row">25 Juin</th>
                      <td>Ouverture des choix de filliere en ligne sur le site web</td>
                    </tr>
                      <tr>
                      <th scope="row">25 Juin</th>
                      <td>Ouverture des choix de filliere en ligne sur le site web</td>
                    </tr>
                      <tr>
                      <th scope="row">25 Juin</th>
                      <td>Ouverture des choix de filliere en ligne sur le site web</td>
                    </tr>
                  </tbody>
                </table>
                <!--     pieces  -->
<?php
if(file_exists("telechargements/pieces.pdf")) {
$name="pieces.pdf";
//$origin="telechargements/1.pdf";
$origin="telechargements";

?>
<br/>
<a href="<?php echo site_url("fcntr/down/".$name."/".$origin); ?>"> télécharger les pièces en pdf</a>
<?php
}
//else echo "les pieces ne sont pas disponibles pour le moment !";
?>
<!--     1ere annee  -->
<?php
if(file_exists("telechargements/1CP.pdf")) {
$name="1CP.pdf";
$origin="telechargements";

?>
<br/>
<a href="<?php echo site_url("fcntr/down/".$name."/".$origin); ?>"> Fiche de renseignements-1ere année C.P.</a>
<?php
}
//else echo "la fiche 2eme annee n'est pas disponible pour le moment !";
?>
<!--     2eme annee  -->
<?php
if(file_exists("telechargements/2CP.pdf")) {
$name="2CP.pdf";
//$origin="telechargements/1.pdf";
$origin="telechargements";

?>
<br/>
<a href="<?php echo site_url("fcntr/down/".$name."/".$origin); ?>"> Fiche de renseignements-2eme année Cycle Préparatoire</a>
<?php
}
//else echo "la fiche 2eme annee n'est pas disponible pour le moment !";
?>

<!--     3eme annee  -->
<?php
if(file_exists("telechargements/1CI.pdf")) {
$name="1CI.pdf";
//$origin="telechargements/1.pdf";
$origin="telechargements";

?>
<br/>
<a href="<?php echo site_url("fcntr/down/".$name."/".$origin); ?>"> Fiche de renseignements-1ere année Cycle Ingénieur</a>
<?php
}
//else echo "la fiche 3eme annee n'est pas disponible pour le moment !";
?>
<!--     4eme annee  -->
<?php
if(file_exists("telechargements/2CI.pdf")) {
$name="2CI.pdf";
//$origin="telechargements/1.pdf";
$origin="telechargements";

?>
<br/>
<a href="<?php echo site_url("fcntr/down/".$name."/".$origin); ?>"> Fiche de renseignements-2eme annee Cycle Ingénieur</a>
<?php
}
//else echo "la fiche 4eme annee n'est pas disponible pour le moment !";
?>

<!--     5eme annee  -->
<?php
if(file_exists("telechargements/3CI.pdf")) {
$name="3CI.pdf";
//$origin="telechargements/1.pdf";
$origin="telechargements";

?>
<br/>
<a href="<?php echo site_url("fcntr/down/".$name."/".$origin); ?>"> Fiche de renseignements-3eme année Cycle Ingénieur</a>
<?php
}
//else echo "la fiche 5eme annee n'est pas disponible pour le moment !";
?>
<!--     cnc  -->
<?php
if(file_exists("telechargements/cnc.pdf")) {
$name="cnc.pdf";
//$origin="telechargements/1.pdf";
$origin="telechargements";

?>
<br/>
<a href="<?php echo site_url("fcntr/down/".$name."/".$origin); ?>"> Dossier d'inscription définitif en CNC <?php $d=date('Y');$dd=date('Y')+1; echo $d."-".$dd; ?></a>
<?php
}
//else echo "la fiche 5eme annee n'est pas disponible pour le moment !";
?>
<br/><br/><br/>

                    
                </div>
         
                 </div>



        
        <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
    </body>
</html>