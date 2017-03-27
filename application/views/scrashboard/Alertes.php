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
    $data['page'] = 'alertes';
    $this->load->view('tpl/sidebar',$data);

    ?>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <h1>Alertes <small>Liste des Alertes</small></h1>
                </div>
                <!-- END PAGE TITLE -->
            </div>
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb hide">
                <li>
                    <a href="javascript:;">Alertes</a><i class="fa fa-circle"></i>
                </li>
                <li class="active">
                    Liste des Alertes
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
                                <i class="fa fa-globe"></i>Liste des Alertes
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="reload">
                                </a>
                            </div>
                        </div>

                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <?php if ( $error == 'desable'): ?>
                                    <div class="alert alert-warning">
                                        <button class="close" data-close="alert"></button>
                                        Alerte supprimée avec succès !!
                                    </div>
                                <?php endif; ?>
                                <?php if ( $vider == 'vide'): ?>
                                    <div class="alert alert-danger">
                                        <button class="close" data-close="alert"></button>
                                        Aucune alerte repertoriée !!
                                    </div>
                                <?php endif; ?>

                            </div>
                            <?php if ($alertes) : ?>
                                <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <thead>
                                    <tr>
                                        <th style="">
                                            Agent
                                        </th>
                                        <th>
                                            Profil
                                        </th>
                                        <th>
                                            contact
                                        </th>
                                        <th>
                                            Date
                                        </th>
                                        <th>
                                            Seuil
                                        </th>
                                        <th>
                                            Solde
                                        </th>
                                        <th>

                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($alertes as $entr) : ?>
                                        <tr class="odd gradeX">
                                            <td style="">
                                                <?php echo $entr->nom; ?>
                                            </td>
                                            <td>
                                                <?php echo $entr->profils; ?>
                                            </td>
                                            <td>
                                                <?php echo $entr->numero; ?>
                                            </td>
                                            <td>
                                                <?php echo $entr->reportings_date; ?>
                                            </td>
                                            <td>
                                                <span style="text-align: center; font-weight: bold; color: red"><?php  echo $entr->reportings_seuil; ?></span>
                                            </td>
                                            <td>
                                                <span style="text-align: center; font-weight: bold; color: red"><?php echo $entr->reportings_solde; ?></span>
                                            </td>
                                            <td style="text-align: center" >
                                                <a class="btn btn-xs btn-danger" onclick="javascript:suprimer('<?php echo $entr->reportings_id ?>')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
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
</div>
<!-- BEGIN FOOTER -->
<?php $this->load->view('tpl/footer'); ?>
<!-- END FOOTER -->
<?php $this->load->view('tpl/js_files'); ?>
<script type="text/javascript">
    function suprimer(id){
        bootbox.confirm("Voulez vous vraiment supprimer cette alerte ?", function(result) {
            if (result==true) {
                //alert(id);
                document.location.href = '<?php echo site_url('Alertes/supprimer/').'/'?>'+id;
            }
        });
    }
</script>
</body>
</html>