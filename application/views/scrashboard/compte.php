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
                     
                    <h1>Gestion des Comptes <small>Modifier des Comptes</small></h1>
                   
                </div>
                <!-- END PAGE TITLE -->
            </div>
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb hide">
                <li>
                    <a href="javascript:;">Comptes</a><i class="fa fa-circle"></i>
                </li>
                <li class="active">
                    Modifier des Comptes
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
                                <i class="fa fa-globe"></i>Modification de mot de passe
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
                                        Echec de modifaication, mot de passe non conforme !
                                    </div>
                                <?php endif; ?>
                                <?php if ( $error == 'update'): ?>
                                    <div class="alert alert-success">
                                        <button class="close" data-close="alert"></button>
                                        Mot de passe modifié !!!
                                    </div>
                                <?php endif; ?>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php if ($users) : ?>
                                            <?php foreach ($users as $infos) : ?>
                                                <form class="form-horizontal" action="<?php echo site_url('Compte/update')."/".$this->session->userdata('id'); ?>" method="post" role="form">
                                                    <div class="modal-body">
                                                        <div class="form-body row">
                                                            <div class="col-md-12">
                                                                    
                                                                    <div class="form-group">
                                                                        <label class="col-md-3 control-label">Login </label>
                                                                        <div class="col-md-6">
                                                                            <input class="form-control placeholder-no-fix" disabled value="<?php echo $infos->email; ?>" type="text"  id="register_password"  name="email"/>
                                                                         </div>
                                                                        <?php echo form_error('prenom'); ?>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-3 control-label">Nom </label>
                                                                        <div class="col-md-6">
                                                                                                          
                                                                           <input class="form-control placeholder-no-fix" disabled value="<?php echo $infos->nom; ?>" type="text"  id="register_password"  name="nom"/>
                                                                               
                                                                        </div>
                                                                        <?php echo form_error('prenom'); ?>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-3 control-label">localisation </label>
                                                                        <div class="col-md-6">
                                                                                                          
                                                                           <input class="form-control placeholder-no-fix" disabled value="<?php echo $infos->localication; ?>" type="text"  id="register_password"  name="prenom"/>
                                                                               
                                                                        </div>
                                                                        <?php echo form_error('prenom'); ?>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-3 control-label">Contact </label>
                                                                        <div class="col-md-6">
                                                                                                          
                                                                           <input class="form-control placeholder-no-fix" disabled value="<?php echo $infos->numero; ?>" type="text"  id="register_password"  name="contact"/>
                                                                               
                                                                        </div>
                                                                        <?php echo form_error('prenom'); ?>
                                                                    </div>
                                                                    <div class="form-group" style="display:none">
                                                                        <label class="col-md-3 control-label">Profil </label>
                                                                        <div class="col-md-6">
                                                                        <input class="form-control placeholder-no-fix" disabled value="<?php //if($infos->type_user == "00") {echo "Admin";} elseif ($infos->type_user == "01"){echo "Standard";}else {echo "Abonne";}?>" disabled type="text"  id="register_password"  name="login"/>
                                                                         </div>
                                                                        <?php echo form_error('prenom'); ?>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-3 control-label">Mot de passe </label>
                                                                        <div class="col-md-6">
                                                                                <div class="input-icon">
                                                                                    <i class="fa fa-lock"></i>
                                                                                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Mot de passe" name="password"/>
                                                                                </div>
                                                                        </div>
                                                                        <?php echo form_error('prenom'); ?>
                                                                    </div>
                                                                     <div class="form-group">
                                                                        <label class="col-md-3 control-label">Comfirmation </label>
                                                                        <div class="col-md-6">
                                                                           <div class="input-icon">
                                                                                <i class="fa fa-check"></i>
                                                                                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Resaisir votre mot de passe" name="rpassword"/>
                                                                            </div>
                                                                        </div>
                                                                        <?php echo form_error('prenom'); ?>
                                                                    </div>

                                                            
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a  class="btn yellow pull-left" href="<?php echo site_url('Collaborateur')?>" data-dismiss="modal" aria-hidden="true">Annuler</a>
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