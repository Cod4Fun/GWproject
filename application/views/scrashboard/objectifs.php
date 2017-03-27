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
    $data['page'] = 'objectif';
    $this->load->view('tpl/sidebar',$data);

    ?>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <h1>Agents <small>Liste des Agents</small></h1>
                </div>
                <!-- END PAGE TITLE -->
            </div>
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb hide">
                <li>
                    <a href="javascript:;">Agents</a><i class="fa fa-circle"></i>
                </li>
                <li class="active">
                    Liste des Agents
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE CONTENT INNER -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-globe"></i>Liste des Agents
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="reload">
                                </a>
                            </div>
                        </div>
                        
                            <div class="portlet-body">
                                <div class="table-toolbar">       
                                    <div class="form-group">
                                            <label class="control-label">Période : </label>
                                            <select name="periode" id="periode" onchange="getval(this);">
                                                <option value="<?php echo site_url('Agents/objectifs/')."/0";?>" <?php if($select=="0") {echo"selected=true";} ?>> Semaine en cours </option>
                                                <option value="<?php echo site_url('Agents/objectifs/')."/1";?>" <?php if($select=="1") {echo"selected=true";} ?>> Semaine N-1</option>
                                                <option value="<?php echo site_url('Agents/objectifs/')."/2";?>" <?php if($select=="2") {echo"selected=true";} ?>> Semaine N-2</option>              
                                                                             
                                            </select>
                                    </div>
                                 <?php if ( $error == 'vide'): ?>
                                    <div class="alert alert-danger">
                                        <button class="close" data-close="alert"></button>
                                        AUCUN OBJECTIF POUR CETTE PERIODE !!!
                                    </div>
                                <?php endif; ?>                                             
                                 </div>
                                 <?php if ($agents) : ?>            
                                <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <thead>
                                    <tr>
                                        <th style="">
                                            Nom
                                        </th>
                                        <th>
                                            Commission
                                        </th>
                                        <th>
                                            Profils
                                        </th>
                                        <th>
                                            Localisation
                                        </th>
                                        <th>
                                            Mails/Contacts
                                        </th>
                                        <th>
                                            Statut
                                        </th>
                                        <th width="15%" style="display:none">

                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($agents as $entr) : ?>
                                        <tr class="odd gradeX">
                                            <td style="">
                                                 <?php echo $entr->nom; ?>
                                            </td>
                                            <td>
                                               <?php echo $entr->commission; ?>
                                            </td>
                                            <td>
                                                <?php echo $entr->profils; ?>
                                            </td>
                                            <td>
                                                <?php echo $entr->localication; ?>
                                                
                                            </td>
                                            <td>
                                                <?php echo $entr->email; ?> /   <?php  echo $entr->numero; ?>
                                            </td>
                                            <td>
                                                <?php if ((($entr->total/$entr->seuil_hebdo)*100) < 100) { ?>
                                                    <span style="width:5% !important" class="label label-sm label-danger">
                                                    <?php echo number_format(($entr->total/$entr->seuil_hebdo)*100,2)  ?>% </span>
                                                <?php } elseif((($entr->total/$entr->seuil_hebdo)*100) == 100){?>
                                                    <span style="width:5% !important" class="label label-sm label-success">
                                                    <?php echo number_format(($entr->total/$entr->seuil_hebdo)*100,2) ?>% </span>
                                                <?php } elseif((($entr->total/$entr->seuil_hebdo)*100) > 100){?>
                                                    <span style="width:5% !important" class="label label-sm label-warning">
                                                     Seuil atteint</span>
                                                <?php }?>
                                            </td>
                                            <td class="center" style="display:none">
                                                
                                                        <a class="btn default btn-xs default" href="<?php echo site_url('Agents/modifier/'.$entr->id_user) ?>">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    
                                                 
                                                        <?php if ($entr->etat == "A"){ ?>
                                                        <a class="btn default btn-xs red-haze" onclick="javascript:suprimer('<?php echo $entr->id_user ?>')">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                   <?php }else{ ?> 
                                                        <a class="btn default btn-xs green" onclick="javascript:activate('<?php echo $entr->id_user ?>')">
                                                            <i class="fa fa-play"></i>
                                                        </a> 
                                                    <?php } ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>

                                </table>
                                <?php endif; ?>
                            </div>
                        
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
    <div id="myModal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                <div class="modal-dialog" style="margin-top: 0px!important;">
                    <div class="modal-content">
                        <form class="form-horizontal" action="<?php echo site_url('Entreprise/insertion') ?>" method="post" role="form">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h2 class="modal-title">Fiche agence postale</h2>
                        </div>
                        <div class="modal-body">
                            <h4 style="color: #7FB0DA; font-weight: bold;">Informations sur l'agence</h4>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Agence  </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" value="" placeholder="Libellé " required name="bureau">
                                        </div>
                                        <?php echo form_error('bureau'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Ville </label>
                                        <div class="col-md-8">
                                            <input type="text" id="prenom" class="form-control center" value="" name="ville" required placeholder="ville">
                                        </div>
                                        <?php echo form_error('ville'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Commune </label>
                                        <div class="col-md-8">
                                            <input type="text" id="commune" class="form-control center" value="" name="raison" required placeholder="commune">
                                        </div>
                                        <?php echo form_error('commune'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Email </label>
                                        <div class="col-md-8">
                                            <input type="email" class="form-control center" value="" name="email" required placeholder="email">
                                        </div>
                                        <?php echo form_error('email'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Contact </label>
                                        <div class="col-md-8">
                                            <input type="text" id="contact" class="form-control center" value="" name="contact" required placeholder="contact">
                                        </div>
                                        <?php echo form_error('contact'); ?>
                                    </div>
                                    
                                </div>
                            <h4 style="color: #7FB0DA; font-weight: bold;">Administrateur</h4>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Nom </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" value="" placeholder="Libellé " required name="name">
                                        </div>
                                        <?php echo form_error('name'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Prénom </label>
                                        <div class="col-md-8">
                                            <input type="text" id="prenom" class="form-control center" value="" name="prenom" required placeholder="prenom">
                                        </div>
                                        <?php echo form_error('prenom'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Email </label>
                                        <div class="col-md-8">
                                            <input type="email" class="form-control center" value="" name="email_admin" required placeholder="email">
                                        </div>
                                        <?php echo form_error('email_admin'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Contact </label>
                                        <div class="col-md-8">
                                            <input type="text" id="contact_admin" class="form-control center" value="" name="contact_admin" required placeholder="contact">
                                        </div>
                                        <?php echo form_error('contact_admin'); ?>
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding-top: 0px!important;">
                            <button class="btn yellow" data-dismiss="modal" aria-hidden="true">Annuler</button>
                            <input class="btn green" type="submit" value="Valider">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
</div>
<!-- BEGIN FOOTER -->
<?php $this->load->view('tpl/footer'); ?>
<!-- END FOOTER -->
<?php $this->load->view('tpl/js_files'); ?>
        <script type="text/javascript">
            function suprimer(id){
                bootbox.confirm("Voulez vous vraiment supprimer cet agent ?", function(result) {
                    if (result==true) {
                        //alert(id);
                        document.location.href = '<?php echo site_url('Agents/supprimer/').'/'?>'+id;
                    }
                });
            }
            function activate(id){
                bootbox.confirm("Voulez vous vraiment activer cet agent ?", function(result) {
                    if (result==true){
                        document.location.href = '<?php echo site_url('Agents/activer/').'/'?>'+id;
                    }
                    else    { alert(" Annuler");};
                });
            }
             function getval(sel) {              
               //alert(sel.value);
               window.location=sel.value;
            }
        </script>
        
</body>
</html>