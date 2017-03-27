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
    $data['page'] = 'profils';
    $this->load->view('tpl/sidebar',$data);

    ?>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                     
                    <h1>Gestion des Profils <small>Profils</small></h1>
                   
                </div>
                <!-- END PAGE TITLE -->
            </div>
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb hide">
                <li>
                    <a href="javascript:;">Gestion des Profils</a><i class="fa fa-circle"></i>
                </li>
                <li class="active">
                    Ajouter des profils
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE CONTENT INNER -->
            <div class="row">
                <div class="col-md-5" style="">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-globe"></i>Ajouter un nouveau profil
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="reload">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                       <?php if ( $error == 'numeric'): ?>
                                                    <div class="alert alert-danger">
                                                        <button class="close" data-close="alert"></button>
                                                        Enregistrement non effectué, entrez des chiffres numeriques !
                                                    </div>
                                        <?php endif; ?>
                                        
                                        <?php if ($error == 'exist'):?>
                                                    <div class="alert alert-danger">
                                                        <button class="close" data-close="alert"></button>
                                                        Enregistrement non effectué, le profil existe deja !
                                                    </div> 
                                                        
                                        <?php endif;?>
                                        <?php if ($error == 'insert'):?>
                                                    <div class="alert alert-success">
                                                        <button class="close" data-close="alert"></button>
                                                        Enregistrement effectué avec success !!!
                                                    </div> 
                                                        
                                        <?php endif;?>
                                        
                                <div class="row">
                                    <div class="col-md-12">
                                               <form class="form-horizontal" action="<?php echo site_url('Profils/insert'); ?>" method="post" role="form">
                                                    <div class="modal-body">
                                                        <div class="form-body row">
                                                            <div class="col-md-12">
                                                                   <div class="form-group">
                                                                        <label class="col-md-3 control-label"> Nom </label>
                                                                        <div class="col-md-8">
                                                                            <input  type="text" class="form-control" value="" placeholder="Nom du profil " required name="profil">
                                                                        </div>
                                                                        <?php echo form_error('nom'); ?>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-3 control-label">Commission </label>
                                                                        <div class="col-md-8">
                                                                            <input  type="text" id="profil" class="form-control center" value="" name="commission" required placeholder="commission">
                                                                        </div>
                                                                        <?php echo form_error('prenom'); ?>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-3 control-label">Seuil solde </label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" id="seuil" class="form-control center" value="" name="seuil" required placeholder="seuil">
                                                                        </div>
                                                                        <?php echo form_error('prenom'); ?>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-3 control-label">Seuil hebdomadaire </label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" id="seuil_hebdo" class="form-control center" value="" name="seuil_hebdo" required placeholder="seuil hebdomadaire">
                                                                        </div>
                                                                        <?php echo form_error('seuil_hebdo'); ?>
                                                                    </div>
                                                                    
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a style=""  class="btn yellow pull-left" href="<?php echo site_url('Profils')?>" data-dismiss="modal" aria-hidden="true">Annuler</a>
                                                        <input class="btn blue" type="submit" value="Ajouter">
                                                    </div>
                                                </form>
                                           </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
               
                                                                   
                <div class="col-md-7" style="">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box blue-chambray">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i>Liste des profils
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="reload">
                                        </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <?php if ($error == 'nodelete'):?>
                                                    <div class="alert alert-danger">
                                                        <button class="close" data-close="alert"></button>
                                                        Suppression non effectuée, le profil est utilisé par un agent !!!
                                                    </div> 
                                                        
                                        <?php endif;?>
                                        <?php if ($error == 'delete'):?>
                                                    <div class="alert alert-warning">
                                                        <button class="close" data-close="alert"></button>
                                                        Suppression effectuée avec succès!!!
                                                    </div> 
                                                        
                                        <?php endif;?>

                                    <div style="" class="table-toolbar" style="display :none">
                                       
                                        <div class="row" style="display :none">
                                            <div class="col-md-12">
                                                <div class="btn-group pull-right">                                                  
                                                    <a href="<?php echo site_url('Paiements/export_csv')?>" id="print_csv" class="btn blue">
                                                    Export | CSV <i class="fa fa-print"></i>
                                                    </a>
                                                    <a href="<?php echo site_url('Refunds/export_pdf')?>" style="display: none;" id="print_pdf" class="btn blue">
                                                    Export | PDF <i class="fa fa-print"></i>
                                                    </a>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <thead>
                                    <tr>
                                        <th style="display:none">
                                            
                                        </th>
                                        <th style="display:none">
                                            
                                        </th>
                                        
                                        <th>
                                            Profils
                                        </th>
                                        <th>
                                             Commission
                                        </th>
                                        <th>
                                            Seuil
                                        </th>                                       
                                        <th style="">
                                             Objectifs
                                        </th>
                                        <th style="">

                                        </th>                                       
                                        
                                        
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($profils as $pay) : ?>
                                            <tr class="odd gradeX">
                                                <td style="display:none">
                                                    
                                                </td>
                                                <td style="display:none">
                                                    
                                                </td>
                                                <td>
                                                    <?php echo $pay->profils; ?>
                                                </td>
                                                <td>
                                                     <?php echo $pay->commission; ?> 
                                                </td>
                                                <td>
                                                     <?php echo $pay->seuil; ?>
                                                </td>
                                                <td style="">
                                                    <?php echo $pay->seuil_hebdo; ?>
                                                </td>
                                                <td class="center">
                                                
                                                        <a class="btn default btn-xs default" href="<?php echo site_url('profils/modifier/'.$pay->id_profils) ?>">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    
                                                                                        
                                                        <a class="btn default btn-xs red-haze" onclick="javascript:suprimer('<?php echo $pay->id_profils ?>')">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                 </td>

                                            
                                                
                                            </tr>
                                            
                                        <?php endforeach; ?>                                
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                     
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
</div>
<!-- BEGIN FOOTER -->
<?php $this->load->view('tpl/footer'); ?>
<!-- END FOOTER -->
<?php $this->load->view('tpl/js_files'); ?>
<script type="text/javascript">
            function suprimer(id){
                bootbox.confirm("Voulez vous vraiment cet profil ?", function(result) {
                    if (result==true) {
                        //alert(id);
                        document.location.href = '<?php echo site_url('Profils/supprimer/').'/'?>'+id;
                    }
                });
            }
</script>
</body>
</html>