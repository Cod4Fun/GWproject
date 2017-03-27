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
    $data['page'] = 'add_cards';
    $this->load->view('tpl/sidebar',$data);

    ?>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <div class="col-md-offset-2 page-title">
                    <h1>Import des cartes <small>Ajouter des cartes</small></h1>
                </div>
                <!-- END PAGE TITLE -->
            </div>
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb hide">
                <li>
                    <a href="javascript:;">cartes</a><i class="fa fa-circle"></i>
                </li>
                <li class="active">
                    Ajoutez des cartes
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE CONTENT INNER -->
            <div class="row">
                
                <div class="col-md-offset-2 col-md-8">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-globe"></i>Import de fichier
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                        
                                <div class="row">
                                <?php if ($error ==  "success"): ?>
                                                    <div class="alert alert-success">
                                                        <button class="close" data-close="alert"></button>
                                                        Enregistrement effectuer avec succès !!!
                                                    </div> 
                                <?php endif; ?>
                                <?php if ($error ==  "error"): ?>
                                                    <div class="alert alert-danger">
                                                        <button class="close" data-close="alert"></button>
                                                        Fichier non importer pour cause de doublon !!!
                                                    </div> 
                                <?php endif; ?>
                                <?php if ($error ==  "load"): ?>
                                                    <div class="alert alert-danger">
                                                        <button class="close" data-close="alert"></button>
                                                            Selectionner un fichier !!!
                                                    </div> 
                                <?php endif; ?>
                                    <div class="col-md-12">
                                        <?php //echo $error;?>
                                        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('Cards/bulkinsert'); ?>" method="post" role="form">
                                            <div class="modal-body">
                                                <div class="form-body">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="col-md-12 control-label">
                                                                Vous avez la possibilité d'importer un fichier CSV au modèle suivant.
                                                                - il doit comporter 3 colonnes presentés dans l'ordre recommendé.
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <span><b> Type | token | pays</b></span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <input type="file" name="fichier" id="fichier" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn yellow" data-dismiss="modal" aria-hidden="true">Annuler</button>
                                                <input class="btn green" type="submit" value="Valider">
                                            </div>
                                        </form>
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