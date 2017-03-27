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
				$data['page'] = 'transactions';
				$this->load->view('tpl/sidebar',$data); 
				
			?>
			<!-- END SIDEBAR -->
			<!-- BEGIN CONTENT -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-head">
						<!-- BEGIN PAGE TITLE -->
						<div class="page-title">
							<h1>Transactions <small>Gestions des paiements</small></h1>
						</div>
						<!-- END PAGE TITLE -->
					</div>
					<!-- BEGIN PAGE BREADCRUMB -->
					<ul class="page-breadcrumb breadcrumb hide">
						<li>
							<a href="javascript:;">Transactions</a><i class="fa fa-circle"></i>
						</li>
						<li class="active">
							 Gestions des paiements
						</li>
					</ul>
					<!-- END PAGE BREADCRUMB -->
					<!-- BEGIN PAGE CONTENT INNER -->
					
					<div class="row">						
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="dashboard-stat2">
								<div class="display">
									<form class="form-inline margin-top-20;" style="text-align: center;" action="<?php echo site_url('Transactions/search') ?>" method="post" role="form">
										
										<div class="form-group">
											<label class="control-label">Période : </label>
											<select name="periode" id="periode" onchange="getval(this);">
												<option value="<?php echo site_url('Transactions/periode/')."/0";?>" <?php if($select=="0") {echo"selected=true";} ?>> Journalier</option>
												<option value="<?php echo site_url('Transactions/periode/')."/1";?>" <?php if($select=="1") {echo"selected=true";} ?>>Hebdomadaire</option>
												<option value="<?php echo site_url('Transactions/periode/')."/2";?>" <?php if($select=="2") {echo"selected=true";} ?>>Mensuel</option>				
												<option value="<?php echo site_url('Transactions/periode/')."/3";?>" <?php if($select=="3") {echo"selected=true";} ?>>Annuel</option>										
											</select>
										</div>
										<div class="form-group" style="padding-left:10px;display:none" style="">											
											<div style="width:70%" class="input-group date date-picker  margin-bottom-5" data-date-format="yyyy-mm-dd">
				
												<input type="text" class="form-control form-filter input-sm" name="min_date" value="<?php echo $this->session->userdata('min_date'); ?>" placeholder="Date début">
												<span class="input-group-btn">
												<button class="btn btn-sm default" type="button"><span class="md-click-circle md-click-animate" style="height: 45px; width: 55px; top: -15.5px; left: -2.5px;"></span><i class="fa fa-calendar"></i></button>
												</span>
											</div>
										</div>
										<div class="form-group" style="display:none">											
											<div style="width:70%" class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd">
												
												<input type="text" class="form-control form-filter input-sm" value="<?php echo $this->session->userdata('max_date'); ?>" name="max_date" placeholder="Date final">
												<span class="input-group-btn">
												<button class="btn btn-sm default" type="button"><span class="md-click-circle md-click-animate" style="height: 45px; width: 55px; top: -15.5px; left: -2.5px;"></span><i class="fa fa-calendar"></i></button>
												</span>
											</div>
										</div>
										<div  class="form-group">
										<?php if ($agent) : ?>
											<span class="input-group">Agent</span>
											<select class="form-control select2_category input-sm" style="margin-bottom: 5px;" id="client" name="agent">
												<option value="0" selected="true"> Tous </option>
												<?php foreach ($agent as $cli) :?>
												<option value="<?php echo $cli->id_user; ?>" <?php if($this->session->userdata('clie')=="$cli->id_user") echo "selected=true" ?>>
													     <?php echo $cli->nom; ?>
												</option>
												<?php endforeach; ?>
											</select>
										<?php endif; ?>
										</div>
										
										
										<!--div class="form-group">
										<?php //if ($card) : ?>
											<span class="input-group">Carte</span>
											<select class="form-control select2_category input-sm" style="margin-bottom: 5px;" id="client" name="card">
												<option value="0" selected="true"> Tous </option>
												<?php //foreach ($card as $ca) :?>
												<option value="<?php //echo $ca->card_type; ?>" <?php //if($this->session->userdata('stat')=="$ca->card_type") echo "selected=true" ?>>
													     <?php //echo $ca->card_type; ?>
												</option>
												<?php //endforeach; ?>
											</select>
											<?php //endif; ?>
										</div-->
										
										<button type="submit"  class="btn blue btn-sm margin-bottom-5">Rechercher<i class="fa fa-search"></i></button>
									</form>
								</div>
							</div>							
						</div>
						<div class="col-md-3 col-sm-12 col-xs12 col-lg-3" style="padding-top: 12px; display:none">
									<div class="dashboard-stat2">
									   <div class="display">			
										<div class="form-group">
											<label class="control-label">Période : </label>
											<select name="periode" id="periode" onchange="getval(this);">
												<option value="<?php echo site_url('Transactions/periode/')."/0";?>" <?php if($select=="0") {echo"selected=true";} ?>> Journalier</option>
												<option value="<?php echo site_url('Transactions/periode/')."/1";?>" <?php if($select=="1") {echo"selected=true";} ?>>Hebdomadaire</option>
												<option value="<?php echo site_url('Transactions/periode/')."/2";?>" <?php if($select=="2") {echo"selected=true";} ?>>Mensuel</option>				
												<option value="<?php echo site_url('Transactions/periode/')."/3";?>" <?php if($select=="3") {echo"selected=true";} ?>>Annuel</option>										
											</select>
										</div>
									  </div>	
									</div>
						</div>
								
						
					
					
					
						<div class="col-md-12">
							<!-- BEGIN EXAMPLE TABLE PORTLET-->
							<div class="portlet box grey-cascade">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-globe"></i>Transactions
									</div>
									<div class="tools">
										<a href="javascript:;" class="reload">
										</a>
									</div>
								</div>
								<div class="portlet-body">
									<div class="table-toolbar">
									 <?php if ( $success == 'faux'): ?>
                                            <div class="alert alert-danger">
                                                <button class="close" data-close="alert"></button>
                                                AUCUN RESULTAT !!!
                                            </div>
                                      <?php endif; ?>  
					
					                  <?php if ($list) : ?>
										<div class="row" >
										
											<div class="col-md-12"style="display:none">
												<div class="btn-group pull-right">													
													<a href="<?php echo site_url('Jetons/export_csv')?>" id="print_csv" class="btn blue">
													Export | CSV <i class="fa fa-print"></i>
													</a>
													<button style="display: none;" id="print_pdf" class="btn blue">
													Export | PDF <i class="fa fa-print"></i>
													</button>													
												</div>
											</div>
										</div>
									</div>
									<table class="table table-striped table-bordered table-hover" id="sample_1">
									<thead>
									<tr>
										<th>
											 N° Commande
										</th>										
										<th>
											 Type de carte
										</th>
										<th>
											 Commission (XOF)
										</th>										
										<th>
											 Date
										</th>
										<th>
											 Agent
										</th>
										<th style="">
											 Contact
										</th>
										<th>
											 Status
										</th>
										
										
									</tr>
									</thead>
									<tbody>
										<?php foreach ($list as $pay) : ?>
											<tr class="odd gradeX">
												<td>
													 <?php echo $pay->transaction_id; ?>
												</td>
												<td>
													 <?php echo $pay->type_carte; ?>
												</td>
												<td>
													<?php echo $pay->commission; ?>
												</td>												
												<td>
													 <?php echo $pay->date_transaction; ?>
												</td>
												<td>
													 <?php echo $pay->nom; ?>
												</td>
												<td style="">
													<?php echo $pay->numero; ?>
												</td>
												<td class="center">
													<?php if ($pay->etat == "1"){ ?>
														<span class="label label-sm label-warning">
															En attente
														</span>
													<?php } else if ($pay->etat == "2") { ?>
														<span class="label label-sm label-success">
															Succès
														</span>
													<?php } else if ($pay->etat == "3") { ?>
														<span class="label label-sm label-danger">
															Echec
														</span>
													<?php }  ?>
													
												</td>
												
											</tr>
										<?php endforeach; ?>								
									</tbody>
									</table>
								</div>
							</div>
							<!-- END EXAMPLE TABLE PORTLET-->
						</div>				
					
					<?php endif; ?>
				</div>
			</div>			
			<!-- END CONTENT -->
		</div>

		<script type="text/javascript">
			function refund(id){
				bootbox.confirm("Voulez vous vraiment demander le remboursement de ce client ?", function(result) {
					if (result==true) {
						document.location.href = '<?php echo site_url('Payment/refund/').'/'?>'+id;
						/*bootbox.dialog({
							message: '<div> Demande envoyée à votre administrateur </div>'+
									 '<br/>'+
									 '<div> Merci de nous faire confiance ! </div>',
							title: "Demande envoyée",
							buttons: {
								success: {
									label: "Merci!",
									className: "btn-success",
									document.location.href = '<?php echo site_url('Payment/refund/').'/'?>'+id;
								}
							}
						});*/
					}
				});
			}
			//end #demo_3


		</script>
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