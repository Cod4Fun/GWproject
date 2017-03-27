<!DOCTYPE html>
<html lang="fr">
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Syca Pay | Changement du mot de passe</title>
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
<body style="">
<div class="page-lock">
	<div class="page-logo">
		<a class="brand" href="index.html">
		<img width="15%" src="<?php echo base_url() ?>assets/img/illicash.png" alt="logo"/>
		</a>
	</div>
	<div class="page-body" style="">
		<div class="lock-head" style="color:white">
			 Changement du mot de passe
		</div>
		<div class="lock-body">
			<div class="lock-form">
				<form class="register-form" action="<?php echo site_url('Activate/abo_change_password') ?>" method="post">
					<h4>Merci de remplir le formulaire.</h4>
					<div class="form-group" style="display: none;">
						<label class="control-label visible-ie8 visible-ie9">Email</label>
						<div class="input-icon">
							<i class="fa fa-envelope"></i>
							<input class="form-control placeholder-no-fix" type="text" value="<?php echo $mail; ?>" placeholder="Email" name="mail"/>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label visible-ie8 visible-ie9">Nouveau mot de passe</label>
						<div class="input-icon">
							<i class="fa fa-lock"></i>
							<input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password"/>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label visible-ie8 visible-ie9">Entrez de nouveau le mot de passe</label>
						<div class="controls">
							<div class="input-icon">
								<i class="fa fa-check"></i>
								<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="rpassword"/>
							</div>
						</div>
					</div>	
					<div class="form-actions">
						<button type="submit" id="register-submit-btn" class="btn yellow pull-right">
						Confirmer le changement <i class="m-icon-swapright m-icon-white"></i>
						</button>
					</div>	
				</form>		
			</div>
		</div>
		<div class="lock-bottom" style="color:white">
			<p style="">Merci de votre confiance</p>
		</div>
	</div>
	<div class="page-footer-custom" style="color:white">
		 2016 Illicash.
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
<script src="<?php echo base_url() ?>assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url() ?>assets/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/scripts/login-soft.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {    
Metronic.init(); 
Login.init();
Layout.init();
Demo.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>