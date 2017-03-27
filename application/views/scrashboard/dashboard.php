<!DOCTYPE html>
<html lang="fr" class="no-js"> 
	<!-- BEGIN HEAD -->
	<head> 
		<?php $this->load->view('tpl/css_files'); ?>
	</head>
	<!-- END HEAD -->
	<body class="page-md page-header-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo">
		<!-- BEGIN HEADER -->
		<?php $this->load->view('tpl/header'); ?>
		<!-- END HEADER -->
		<div class="clearfix">
		</div>
		<!-- BEGIN CONTAINER -->
		<div class="page-container">
			<!-- BEGIN SIDEBAR -->
			<?php 
				$data['page'] = 'dashboard';
				$this->load->view('tpl/sidebar',$data); 
				
			?>
			<!-- END SIDEBAR -->
			<!-- BEGIN CONTENT -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-head">
						<!-- BEGIN PAGE TITLE -->
						<div class="page-title">
							<h1>Accueil <small>statistiques & reports</small></h1>
						</div>
						<!-- END PAGE TITLE -->
					</div>
					<!-- BEGIN PAGE BREADCRUMB -->
					<ul class="page-breadcrumb breadcrumb hide">
						<li>
							<a href="<?php echo site_url('dashboard') ?>">Home</a><i class="fa fa-circle"></i>
						</li>
						<li class="active">
							Dashboard
						</li>
					</ul>
					<!-- END PAGE BREADCRUMB -->
					<!-- BEGIN PAGE CONTENT INNER -->
					<div class="row margin-top-10">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label">Période : </label>
								<select name="periode" id="periode" onchange="getval(this);">
									<option value="" <?php if($select=="0") {echo"selected=true";} ?>> Journalier</option>
									<option value="" <?php if($select=="1") {echo"selected=true";} ?>>Hebdomadaire</option>
									<option value="" <?php if($select=="2") {echo"selected=true";} ?>>Mensuel</option>
									<option value="" <?php if($select=="3") {echo"selected=true";} ?>>Annuel</option>

								</select>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="display: none">
								<div class="form-group">
									<label class="control-label">Point de vente : </label>
									<select name="periode" id="periode" onchange="getval(this);">
										<option value="tous" >Tous</option>
										<option value="jour" >Henry</option>
										<option value="semaine" >Colombe</option>
										<option value="mois" >Eric</option>
									</select>
								</div>
						</div>






						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="display:none">
							<div class="form-group" style="float:right;background-color:">
								<label class="control-label">Pays : </label>
								<div class="btn btn-sm blue" style="width: 165px !important;">
			                        <span style="float : left;">
							            <label class="control-label visible-ie8 visible-ie9">Pays</label>
							             <select name="country" id="select2_sample4" class="select2 form-control" onchange="getval(this);">
											 <option value="<?php //echo site_url('Dashboard/refresh/')."/CI";?>" <?php // if($this->session->userdata('country')=="CI") {echo"selected=true";} ?>>Cote d'Ivoire
											 </option>
											 <option value="<?php //echo site_url('Dashboard/refresh/')."/SN";?>" <?php // if($this->session->userdata('country')=="SN") {echo"selected=true";} ?>>Senegal
											 </option>
										 </select>
						                </span>
					                    <span style="display:none">
						                 <input style="margin-top: 5px;display:none" class="	btn btn-xs red-haze" type="submit" class="btn btn-xs" name="ok" value="Confirmer">
					                </span>
								</div>
							</div>
						</div>
					</div>
					<div class="row margin-top-10">
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="dashboard-stat2">
								<div class="display">
									<div class="number">
										<h3 class="font-green-sharp">
											450
										</h3>
										<br />
										<small>Hommes</small>
									</div>
									<div class="icon">
										<i class="icon-user"></i>
									</div>
								</div>
								<div class="progress-info">
									<div class="progress">
										<span style="width: 100%;" class="progress-bar progress-bar-success green-sharp">
										<span class="sr-only">100% progress</span>
										</span>
									</div>
									<div class="status">
										<div class="status-title">

										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="dashboard-stat2">
								<div class="display">
									<div class="number">
										<h3 class="font-red-haze">800</h3>
										<br />
										<small>Femmes</small>
									</div>
									<div class="icon">
										<i class="icon-user-female"></i>
									</div>
								</div>
								<div class="progress-info">
									<div class="progress">
										<span style="width: 100%;" class="progress-bar progress-bar-success red-haze">
										<span class="sr-only">100% change</span>
										</span>
									</div>
									<div class="status">
										<div class="status-title">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="dashboard-stat2">
								<div class="display">
									<div class="number">
										<h3 class="font-blue-sharp">60</h3>
										<br />
										<small>Nouveaux Inscrits</small>
									</div>
									<div class="icon">
										<i class="icon-pencil"></i>
									</div>
								</div>
								<div class="progress-info">
									<div class="progress">
										<span style="width: 100%;" class="progress-bar progress-bar-success blue-sharp">
										<span class="sr-only">100% grow</span>
										</span>
									</div>
									<div class="status">
										<div class="status-title">

										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="dashboard-stat2">
								<div class="display">
									<div class="number">
										<h3 class="font-purple-soft">1250</h3>
										<br />
										<small>Total Inscrits</small>
									</div>
									<div class="icon">
										<i class="icon-users"></i>
									</div>
								</div>
								<div class="progress-info">
									<div class="progress">
										<span style="width: 100%;" class="progress-bar progress-bar-success purple-soft">
										<span class="sr-only">100% change</span>
										</span>
									</div>
									<div class="status">
										<div class="status-title">

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<?php
						echo $this->gcharts->ColumnChart('Repartition')->outputInto('graph1');
						echo $this->gcharts->PieChart('Foods')->outputInto('food_div');

						if($this->gcharts->hasErrors())
						{
							echo $this->gcharts->getErrors();
						}
						?>
						<div class="col-md-6 col-sm-12">
							<!-- BEGIN STACK CHART CONTROLS PORTLET-->
							<div class="portlet box grey-cascade">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-bar-chart-o"></i> Les derniers inscrits
									</div>
									<div class="tools">
										<a href="javascript:;" class="reload">
										</a>
									</div>
								</div>
								<div class="portlet-body">
									<div id="block" style="height:300px;">
									</div>
									<div class="btn-toolbar">
										<div class="space5">
										</div>
									</div>
								</div>
							</div>
							<!-- END STACK CHART CONTROLS PORTLET-->
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="portlet box grey-cascade">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-bar-chart-o"></i> Ratio
									</div>
									<div class="tools">
										<a href="javascript:;" class="reload">
										</a>
									</div>
								</div>
								<div class="portlet-body">
									<div id="food_div" class="chart">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<!-- END CONTENT -->
		</div>
		<script type="text/javascript">
			function getval(sel) {				
		       //alert(sel.value);
		       window.location=sel.value;
		    }
		</script>
		<!-- BEGIN FOOTER -->
		<?php $this->load->view('tpl/footer'); ?>
		<!-- END FOOTER -->
		<?php $this->load->view('tpl/js_files'); ?>
	</body>
</html>