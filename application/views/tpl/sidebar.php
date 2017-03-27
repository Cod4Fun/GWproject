<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar md-shadow-z-2-i  navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<li id="dashboard" <?php if($page == 'dashboard') echo 'class="active"';?>>
					<a href="<?php echo site_url('dashboard') ?>">
						<i class="icon-home"></i>
						<span class="title">Accueil</span>
					</a>
				</li>
				<li class="active">
					<a href="#">
						<i class="icon-users"></i>
						<span class="title">Adhérents</span>
					</a>
				</li>
				<li id="create_carte" <?php if($page == 'create_carte') echo 'class="active"';?>>
					<a href="<?php echo site_url('Agents/new_agent') ?>">
						<i class="icon-plus"></i>
						<span class="title">Inscrire</span>
					</a>
				</li>
				<li id="create_fieul" <?php if($page == 'create_fieul') echo 'class="active"';?> style="display: none">
					<a href="<?php echo site_url('Agents/new_agent') ?>">
						<i class="icon-plus"></i>
						<span class="title">Parainnage</span>
					</a>
				</li>
				<li id="agents" <?php if($page == 'agents') echo 'class="active"';?>>
					<a href="<?php echo site_url('Agents') ?>">
						<i class="icon-list"></i>
						<span class="title">Liste</span>
					</a>
				</li>
				<li class="active ">
					<a href="#">
						<i class="icon-wrench"></i>
						<span class="title">Configurations</span>
					</a>
				</li>
				<li id="profils" <?php if($page == 'profils') echo 'class="active"';?> >
					<a href="<?php echo site_url('Profils') ?>">
						<i class="icon-globe"></i>
						<span class="title">Profils</span>
					</a>
				</li>
				<li id="collaborateurs" <?php if($page == 'collaborateurs') echo 'class="active"';?>>
					<a href="<?php echo site_url('Collaborateur')?>">
						<i class="icon-users"></i>
						<span class="title">Collaborateur</span>
					</a>
				</li>
				<li id="compte" <?php if($page == 'compte') echo 'class="active"';?>>
					<a href="<?php echo site_url('Compte/modifier')."/".$this->session->userdata('id'); ?>">
					<i class="icon-wallet"></i>
					<span class="title">Mon compte</span>
					</a>
				</li>
				<li id="parametre" <?php if($page == 'parametre') echo 'class="active"';?>>
					<a href="<?php echo site_url('Parametres'); ?>">
						<i class="fa-plug"></i>
						<span class="title">Paramètres</span>
					</a>
				</li>
				<div style="display: none;">
				<li class="active">
					<a href="#">
						<i class="icon-graph"></i>
						<span class="title">Statistiques</span>
					</a>
				</li>
				<li id="transactions" <?php if($page == 'transactions') echo 'class="active"';?>>
					<a href="<?php echo site_url('Transactions') ?>">
					<i class="icon-wallet"></i>
					<span class="title">Transactions</span>
					</a>
				</li>
				<li id="alertes" <?php if($page == 'alertes') echo 'class="active"';?>>
					<a href="<?php echo site_url('Alertes') ?>">
						<i class="icon-call-out"></i>
						<span class="title">Alertes</span>
					</a>
				</li>
				<li id="objectif" <?php if($page == 'objectif') echo 'class="active"';?>>
					<a href="<?php echo site_url('Agents/objectifs/')."/0"; ?>">
					<i class="icon-directions"></i>
					<span class="title">Objectifs</span>
					</a>
				</li>
				</div>
				<li id="maps" <?php if($page == 'maps') echo 'class="active"';?>>
					<a href="<?php echo site_url('Maps'); ?>">
						<i class="icon-pin"></i>
						<span class="title">Localisation</span>
					</a>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<script type="text/javascript">
		
	</script>