<h1>
	Test
</h1>
<?php echo css_url("dolimony");?>
<p>
	<a href="<?php echo site_url(); ?>"><?php echo current_url();?></a>
	<br />
	
	<a href="<?php echo site_url('test'); ?>">accueil</a> du test
	<br />
	
	<a href="<?php echo site_url('test/secret'); ?>">page secrète</a>
	<br />
	
	<a href="<?php echo site_url(array('test', 'secret')); ?>">page secrète</a>
</p>