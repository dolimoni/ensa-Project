<?php
//echo $error;
/* ça marche
echo form_open_multipart('fcntr/do_upload');
echo form_input(array('type' => 'file','name' => 'userfile'));
echo form_submit('submit','upload');
echo form_close();

*/

?>
<html>
<head></head>
<body>
<?php echo form_open_multipart('fcntr/do_upload');?>
<input type='file' name='userfile'>
<input type='submit' name='submit' value='upload'>
</form>
</body>
</html>