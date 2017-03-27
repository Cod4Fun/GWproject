<!DOCTYPE html>
<html lang="fr">
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Green World Manager | Connexion</title>
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
<link href="<?php echo base_url() ?>assets/plugins/select2/select2.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>assets/css/login-soft.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo base_url() ?>assets/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>assets/css/plugins-md.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>assets/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="<?php echo base_url() ?>assets/css/default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body  class="login">
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="#">
	<!--img src="<?php echo base_url() ?>assets/img/logo-poste.png" alt=""/!-->
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div style="margin-right:100px;background: rgba(21, 161, 74, 0.82);" class="content pull-right col-md-12 col-sm-12 col-xs-12">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" action="<?php echo site_url('welcome/connecter') ?>" method="post">
			
		<h3 class="form-title" style="color: #FFFFFF !important; font-weight: bold; text-align: center;">Se Connecter</h3>
		
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			veuillez entrer vos informations de connexion </span>
		</div>
		<?php if($error== 'error'): ?>
			<div class="alert alert-danger">
				<button class="close" data-close="alert"></button>
		<span>Mot de passe ou Login incorrect !!.</span>
			</div>
		<?php endif; ?>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">login</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" id="login" type="text" autocomplete="off" value="<?php echo set_value('login'); ?>" placeholder="Login" name="login"/>
				<?php echo form_error('login'); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" id"password" type="password" autocomplete="off" value="<?php echo set_value('password'); ?>" placeholder="Password" name="password"/>
			</div>
			<?php echo form_error('password'); ?>
		</div>
		<div class="form-actions">
			<label class="checkbox">
			<input type="checkbox" name="remember" value="1"/> Se souvenir de moi</label>
			<button type="submit" id="connexion" class="btn pull-right" style="background-color: #000!important; color: #ffffff">
			Connexion <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
		<div class="login-options" style="display: none;">
			<h4>Or login with</h4>
			<ul class="social-icons">
				<li>
					<a class="facebook" data-original-title="facebook" href="javascript:;">
					</a>
				</li>
				<li>
					<a class="twitter" data-original-title="Twitter" href="javascript:;">
					</a>
				</li>
				<li>
					<a class="googleplus" data-original-title="Goole Plus" href="javascript:;">
					</a>
				</li>
				<li>
					<a class="linkedin" data-original-title="Linkedin" href="javascript:;">
					</a>
				</li>
			</ul>
		</div>
		<div class="forget-password">
			<h4>Mot de passe oublié?</h4>
			<p>
				 Pas de soucis, cliquez <a href="javascript:;" id="forget-password">
				içi </a>
				pour le réinitialiser.
			</p>
		</div>
		<div class="create-account" style="display:none">
			<p>
				 Vous n'avez pas de compte ?&nbsp; <a href="javascript:;" id="register-btn">
				Inscription </a>
			</p>
		</div>
	</form>
	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form" action="<?php echo site_url('Welcome/passwords') ?>" method="post">
		<h3>Mot de passe oublié?</h3>
		<p>
			 Entrez votre email pour la réinitialisation.
		</p>
		<div class="form-group">
			<div class="input-icon">
				<i class="fa fa-envelope"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
			</div>
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn">
			<i class="m-icon-swapleft"></i> Retour </button>
			<button type="submit" class="btn blue pull-right">
			Valider <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->
	<!-- BEGIN REGISTRATION FORM -->
	<form class="register-form" action="<?php echo site_url('Welcome/add_entreprise') ?>" method="post">
		<h3>Inscription </h3>
		<p>
			 Entrez vos informations Entreprise
		</p>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Entreprise</label>
			<div class="input-icon">
				<i class="fa fa-font"></i>
				<input class="form-control placeholder-no-fix" type="text" placeholder="nom de l'entreprise" name="fullname"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Raison sociale</label>
			<div class="input-icon">
				<i class="fa fa-font"></i>
				<input class="form-control placeholder-no-fix" type="text" placeholder="raison sociale" name="raison"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Contact</label>
			<div class="input-icon">
				<i class="fa fa-phone"></i>
				<input class="form-control placeholder-no-fix" type="text" placeholder="contact" name="contact"/>
			</div>
		</div>		
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Pays</label>
			<select name="country" id="select2_sample4" class="select2 form-control">
				<option value=""></option>
				<!--option style="display:none;" value="DZ">Algeria</option>
				<option style="display:none" value="AO">Angola</option>
				<option style="display:none" value="BJ">Benin</option>
				<option style="display:none" value="BF">Burkina Faso</option>
				<option style="display:none" value="CM">Cameroon</option>
				<option style="display:none" value="CV">Cap vert</option>
				<option style="display:none" value="CF">Républic centraficaine</option>
				<option style="display:none" value="TD">Tchad</option>
				<option style="display:none" value="CG">Congo</option>
				<option style="display:none" value="CD">RDC</option-->
				<option value="CI">Cote d'Ivoire</option>				
				<!--option style="display:none" value="GA">Gabon</option>
				<option style="display:none" value="GH">Ghana</option>
				<option style="display:none" value="GN">Guinea</option>
				<option style="display:none" value="GW">Guinea-Bissau</option>
				<option style="display:none" value="ML">Mali</option>
				<option style="display:none" value="MR">Mauritani</option>
				<option style="display:none" value="NE">Niger</option>
				<option style="display:none" value="NG">Nigeria</option-->
				<option value="SN">Senegal</option>
				<!--option style="display:none" value="SC">Seychelles</option>
				<option style="display:none" value="SL">Sierra Leone</option>
				<option style="display:none" value="TG">Togo</option>
				<option style="display:none" value="TN">Tunisia</option>
				<option style="display:none" value="ZW">Zimbabwe</option-->
			</select>
		</div>		
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Ville</label>
			<div class="input-icon">
				<i class="fa fa-location-arrow"></i>
				<input class="form-control placeholder-no-fix" type="text" placeholder="Ville" name="city"/>
			</div>
		</div>	
		<p>
			 Entrez les informations de l'administrateur du compte
		</p>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Nom</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Nom" name="name"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Prénom(s)</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Prénom(s)" name="surname"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Mobile</label>
			<div class="input-icon">
				<i class="fa fa-phone"></i>
				<input class="form-control placeholder-no-fix" type="text" placeholder="mobile" name="mobile"/>
			</div>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Email</label>
			<div class="input-icon">
				<i class="fa fa-envelope"></i>
				<input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email"/>
			</div>
		</div>		
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Mot de passe</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Mot de passe" name="password"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Resaisir votre mot de passe</label>
			<div class="controls">
				<div class="input-icon">
					<i class="fa fa-check"></i>
					<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Resaisir votre mot de passe" name="rpassword"/>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label>
			<input type="checkbox" name="tnc"/> J'adhère au <a href="javascript:open_infos();">
			Contrat d'utilisation </a>
			et à la <a href="javascript:;">
			politique de confidentialité </a>
			</label>
			<div id="register_tnc_error">
			</div>
		</div>
		<div class="form-actions">
			<button id="register-back-btn" type="button" class="btn">
			<i class="m-icon-swapleft"></i> Retour </button>
			<button type="submit" id="register-submit-btn inscrip" class="btn blue pull-right">
			Valider <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
	<!-- END REGISTRATION FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<!--div class="copyright">
	 2016 &copy; La Poste de Côte d'ivoire.
</div-->



<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]-->
<script src="<?php echo base_url() ?>assets/plugins/respond.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/excanvas.min.js"></script> 
<![endif]-->
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
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url() ?>assets/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/scripts/login-soft.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {
  Metronic.init(); // init metronic core components
Layout.init(); // init current layout
  Login.init();
  Demo.init();
       // init background slide images
       $.backstretch([
		"<?php echo base_url() ?>assets/media/bg/1.png",
		"<?php echo base_url() ?>assets/media/bg/1.png"
        ], {
          fade: 1000,
          duration: 8000
    }
    );
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>