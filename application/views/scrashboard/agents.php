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
    $data['page'] = 'agents';
    $this->load->view('tpl/sidebar',$data);

    ?>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <h1>Agents <small>Liste des Adhérents</small></h1>
                </div>
                <!-- END PAGE TITLE -->
            </div>
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb hide">
                <li>
                    <a href="javascript:;">Adherents</a><i class="fa fa-circle"></i>
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
                                <i class="fa fa-globe"></i>Liste des Adhérents
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
                                        Agent desactivé!
                                    </div>
                                <?php endif; ?>
                                <?php if ( $error == 'actif'): ?>
                                    <div class="alert alert-success">
                                        <button class="close" data-close="alert"></button>
                                        Agent activé!
                                    </div>
                                <?php endif; ?>


                                    <div class="btn-group pull-right" style="display:none">
                                            <a href="#myModal1" role="button" class="btn blue" data-toggle="modal" <?php if($this->session->userdata('profil') != '00') echo 'style="display:none;"'; ?>>
                                                <i class="fa fa-plus"></i> Ajouter
                                            </a>
                                    </div>

                                 </div>
                                 <?php if ($agents) : ?>
                                <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <thead>
                                    <tr>
                                        <th style="">
                                            Nom & Prénom
                                        </th>
                                        <th>
                                            Nbre de filleuls
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
                                        <th width="15%">

                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($agents as $entr) : ?>
                                        <tr class="odd gradeX">
                                            <td style="">
                                                 <?php echo $entr->nom; ?> /  <?php echo $entr->type; ?>
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
                                                <?php if ($entr->etat == "A") { ?>
                                                    <span class="label label-sm label-success">
                                                    Actif </span>
                                                <?php } else{?>
                                                    <span class="label label-sm label-default">
                                                Inactif </span>
                                                <?php } ?>
                                            </td>
                                            <td class="center">

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
        </script>
</body>
</html>