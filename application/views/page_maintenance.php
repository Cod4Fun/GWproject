<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Post Alert - Page maintenance</title>
		<link href="<?php echo css_url('maintenance') ?>" rel="stylesheet" type="text/css"  media="all" />
	</head>
	<body>
		<div class="wrap">
				<div class="header">
					<div class="logo">
						<h1><a href="#">Post Alert en cours de maintenance</a></h1>
					</div>
				</div>
			<div class="content">
				<img src="<?php echo img_url('maintenance.png') ?>" title="error" />
				<p><span><label style="color: #33a805;">Désolé, </label></span>Votre service Post Alert est actuellement en cours de maintenance...</p>
				<p>Merci de ressayer plus tard ...</p>
				<div class="copy-right">
					<p>&#169 Tous droits réservés à la Poste</p>
				</div>
   			</div>
		</div>
	</body>
</html>