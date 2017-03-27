<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top" style="background:#fff !important">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="<?php echo site_url('dashboard') ?>">
				<img src="<?php echo img_url('illicash.png'); ?>" alt="logo" class="logo-default"/>
			</a>
			<div class="menu-toggler sidebar-toggler">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<div class="page-actions">
			<div class="btn-group">

				<span class="btn btn-xs " style="margin-left: 13px;margin-top:6px">
					<span class="hidden-xs hidden-xs">Langue  &nbsp;</span><img src="<?php echo base_url() ?>assets/global/img/flags/fr.png"/>
				</span>
				<?php if ($this->session->userdata('country') !=""): ?>
					<span   class="btn btn-xs" style="margin-left:13px;margin-top:6px;" >
					<?php $session_country = $this->session->userdata('country');?>
						<span class="hidden-xs hidden-xs"></span><img src="<?php echo base_url() ?>assets/global/img/flags/<?php echo strtolower($session_country);?>.png"/>
				</span>
				<?php endif ?>
				<?php if ($this->session->userdata('option') == 1): ?>
					<span class=" " style="">
					<div class="form-group" style="float:right;margin-top:5px;">
						<!--label class="control-label">Pays : </label-->
						<?php //if ($pays): ?>
						<div class="" style="width: 165px !important;">
					                        <span style="float : left;">
									            <label class="control-label visible-ie8 visible-ie9">Pays</label>
									             <select name="country" style="height: 25px;padding-top: 1px;padding: 2px 12px !important;" id="select2_sample4" class="select2 form-control" onchange="getval(this);">
													 <option value="<?php echo  site_url('Dashboard/refresh/')."/CI";?>" <?php if($this->session->userdata('country')=="CI") {echo"selected=true";} ?>>Cote d'Ivoire
													 </option>
													 <option value="<?php echo site_url('Dashboard/refresh/')."/SN";?>" <?php if($this->session->userdata('country')=="SN") {echo"selected=true";} ?>>Senegal
													 </option>
													 <option value="<?php echo site_url('Dashboard/refresh/')."/4";?>" <?php if($this->session->userdata('country')=="") {echo"selected=true";} ?>>Tous
													 </option>

												 </select>
								            </span>
							                <span style="display:none">
								            	     <input style="margin-top: 5px;display:none" class="" type="submit" class="btn btn-xs" name="ok" value="Confirmer">
							                </span>
						</div>
						<?php //endif ?>

					</div>
				</span>
				<?php endif ?>

				<span>

			</span>
			</div>
		</div>
		<!-- BEGIN PAGE TOP -->
		<div class="page-top">
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-left">
					<li class="separator hide"></li>
				</ul>
				<ul class="nav navbar-nav pull-right">
					<li class="separator hide">
					</li>
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li style="display: none;" class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-bell"></i>
						<span class="badge badge-success">
						7 </span>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3><span class="bold">12 pending</span> notifications</h3>
								<a href="#">view all</a>
							</li>
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
									<li>
										<a href="javascript:;">
											<span class="time">just now</span>
										<span class="details">
										<span class="label label-sm label-icon label-success">
										<i class="fa fa-plus"></i>
										</span>
										New user registered. </span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<li class="separator hide">
					</li>
					<!-- BEGIN INBOX DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li style="display: none;" class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-envelope-open"></i>
						<span class="badge badge-danger">
						4 </span>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <span class="bold">7 New</span> Messages</h3>
								<a href="#">view all</a>
							</li>
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
									<li>
										<a href="#">
										<span class="photo">
										<img src="<?php echo img_url('avatar2.jpg'); ?>" class="img-circle" alt="">
										</span>
										<span class="subject">
										<span class="from">
										Lisa Wong </span>
										<span class="time">Just Now </span>
										</span>
										<span class="message">
										Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<!-- END INBOX DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-user dropdown-dark">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<span class="username username-hide-on-mobile">
							<?php
							$session_nom = $this->session->userdata('nom');
							echo $session_nom; ?> </span>
							<!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
							<img alt="" class="img-circle" src="<?php echo img_url('avatar9.jpg'); ?>"/>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li>
								<a href="#">
									<i class="icon-user"></i> Profil </a>
							</li>
							<li>
								<a href="#">
									<i class="icon-calendar"></i> My Calendar </a>
							</li>

							<li class="divider">
							</li>
							<li>
								<a href="#">
									<i class="icon-lock"></i> Verrouiller </a>
							</li>
							<li>
								<a href="<?php echo site_url('Welcome') ?>">
									<i class="icon-key"></i> Deconnexion </a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li style="display: none;" class="dropdown dropdown-extended quick-sidebar-toggler">
						<a href="<?php echo site_url('Deconnexion') ?>">
							<span class="sr-only">Déconnexion</span>
							<i class="icon-logout"></i> </a>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- END PAGE TOP -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->