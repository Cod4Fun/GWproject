<!DOCTYPE html>
<html lang="fr">
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Syca Pay | Activation du compte</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo base_url() ?>assets/css/lock.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo base_url() ?>assets/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>assets/css/plugins-md.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>assets/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>assets/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo base_url() ?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body style="background-color: #F3F5F9!important;">
<div class="page-lock">
	<div class="page-logo">
		<a class="brand" href="index.html">
		<img src="<?php echo base_url() ?>assets/img/logo-poste.png" alt="logo"/>
		</a>
	</div>
	<div class="page-body" style="background-color: #fff!important;">
		<div class="lock-head">
			 Processus d'inscription
		</div>
		<div class="lock-body">
			<div class="lock-form">
				<h4>Félicitations, votre compte a été créé.</h4>
				<div class="form-group">
					<p>
						Pour finir le processus, merci d'activer votre compte <br\>
						via le mail d'activation depuis votre compte email <?php echo $mail; ?>
					</p>
				</div>				
			</div>
		</div>
		<div class="lock-bottom">
			<p style="color: #4DB3A5!important;">Merci de votre confiance</p>
		</div>
	</div>
	<div class="page-footer-custom">
		 2016 Poste de Côte d'Ivoire.
	</div>
</div>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<script src="<?php echo base_url() ?>assets/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url() ?>assets/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url() ?>assets/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/scripts/demo.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {    
Metronic.init(); 
Layout.init();
Demo.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>