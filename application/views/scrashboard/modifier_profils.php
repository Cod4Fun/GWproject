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
    $data['page'] = 'compte';
    $this->load->view('tpl/sidebar',$data);

    ?>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title" style="padding-left:178px !important">
                     
                    <h1>Gestion des Profils <small>Modifier du Profils</small></h1>
                   
                </div>
                <!-- END PAGE TITLE -->
            </div>
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb hide">
                <li>
                    <a href="javascript:;">Profils</a><i class="fa fa-circle"></i>
                </li>
                <li class="active">
                    Modifier le Profil
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE CONTENT INNER -->
            <div class="row">
                <div class="col-md-offset-2 col-md-7" style="">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-globe"></i>Modification du Profil
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="reload">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                              <?php if ( $error == 'error'): ?>
                                    <div class="alert alert-danger">
                                        <button class="close" data-close="alert"></button>
                                        Echec de modifaication veuillez remplir les champs!
                                    </div>
                                <?php endif; ?>
                                <?php if ( $error == 'update'): ?>
                                    <div class="alert alert-success">
                                        <button class="close" data-close="alert"></button>
                                        Modification effectué avec succès !!!
                                    </div>
                                <?php endif; ?>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php if ($profil) : ?>
                                            <?php foreach ($profil as $infos) : ?>
                                                <form class="form-horizontal" action="<?php echo site_url('Profils/update')."/".$infos->id_profils; ?>" method="post" role="form">
                                                    <div class="modal-body">
                                                        <div class="form-body row">
                                                            <div class="col-md-12">
                                                                    
                                                                    <div class="form-group">
                                                                        <label class="col-md-3 control-label">Profil </label>
                                                                        <div class="col-md-6">
                                                                            <input class="form-control placeholder-no-fix"  value="<?php echo $infos->profils; ?>" type="text"  id="register_password"  name="profil"/>
                                                                         </div>
                                                                        <?php echo form_error('prenom'); ?>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-3 control-label">Commission </label>
                                                                        <div class="col-md-6">
                                                                                                          
                                                                           <input class="form-control placeholder-no-fix" value="<?php echo $infos->commission; ?>" type="text"  id="register_password"  name="commission"/>
                                                                               
                                                                        </div>
                                                                        <?php echo form_error('prenom'); ?>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-3 control-label">Seuil solde </label>
                                                                        <div class="col-md-6">
                                                                                                          
                                                                           <input class="form-control placeholder-no-fix" value="<?php echo $infos->seuil  ; ?>" type="text"  id="register_password"  name="seuil"/>
                                                                               
                                                                        </div>
                                                                        <?php echo form_error('prenom'); ?>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-3 control-label">Seuil hebdomadaire </label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" id="seuil_hebdo" class="form-control center" value="<?php echo $infos->seuil_hebdo  ; ?>" name="seuil_hebdo" required placeholder="seuil hebdomadaire">
                                                                        </div>
                                                                        <?php echo form_error('seuil_hebdo'); ?>
                                                                    </div>

                                                            
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a  class="btn yellow pull-left" href="<?php echo site_url('Profils')?>" data-dismiss="modal" aria-hidden="true">Annuler</a>
                                                        <input class="btn blue" type="submit" value="Modifier">
                                                    </div>
                                                </form>
                                            <?php endforeach;?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
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
</body>
</html>