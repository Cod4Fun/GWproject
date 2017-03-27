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
    $data['page'] = 'collaborateurs';
    $this->load->view('tpl/sidebar',$data);

    ?>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <h1>Collaborateurs <small>Liste des Collaborateurs</small></h1>
                </div>
                <!-- END PAGE TITLE -->
            </div>
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb hide">
                <li>
                    <a href="javascript:;">Collaborateurs</a><i class="fa fa-circle"></i>
                </li>
                <li class="active">
                    Liste des Collaborateurs
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
                                <i class="fa fa-globe"></i>Liste des Collaborateurs
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="reload">
                                </a>
                            </div>
                        </div>
                        
                            <div class="portlet-body">
                                <div class="table-toolbar">
                                 <?php if ($error == 'doublon'):?>
                                                    <div class="alert alert-danger">
                                                        <button class="close" data-close="alert"></button>
                                                        Enregistrement non effectué, le collaborateur existe deja !
                                                    </div> 
                                                        
                                        <?php endif;?>
                                        <?php if ($error == 'success'):?>
                                                    <div class="alert alert-success">
                                                        <button class="close" data-close="alert"></button>
                                                        Enregistrement effectué avec success !!!
                                                    </div> 
                                                        
                                        <?php endif;?>
                                        <?php if ( $error == 'desable'): ?>
                                            <div class="alert alert-warning">
                                                <button class="close" data-close="alert"></button>
                                                Agent desactivé!
                                            </div>
                                        <?php endif; ?>
                                        <?php if ( $error == 'actif'): ?>
                                            <div class="alert alert-success">
                                                <button class="close" data-close="alert"></button>
                                                Agent activé
                                            </div>
                                        <?php endif; ?>                              
                                    <div class="btn-group pull-right">                                                  
                                            <a href="#myModal1" role="button" class="btn blue" data-toggle="modal">
                                                <i class="fa fa-plus"></i> Ajouter
                                            </a>                                                
                                    </div>

                                             
                                 </div>
                                 <?php if ($agents) : ?>            
                                <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <thead>
                                    <tr>
                                        <th style="">
                                            Nom
                                        </th>
                                        <th>
                                            Localisation
                                        </th>
                                        <th>
                                            Mails
                                        </th>
                                        <th>
                                            Contacts
                                        </th>
                                        <th>
                                            Statut
                                        </th>
                                        <th style="display:none">
                                            Statut
                                        </th>
                                        <th>

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
                                               <?php echo $entr->localication; ?>
                                            </td>
                                            <td>
                                                <?php echo $entr->email; ?>
                                            </td>
                                            <td>
                                                <?php  echo $entr->numero; ?>
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
                                            <td style="display:none">
                                                   
                                            </td>
                                            <td class="center">
                                                   
                                                        
                                                    <a class="btn default btn-xs default" href="<?php echo site_url('Collaborateur/modifier/'.$entr->id_user) ?>">
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
                        <form class="form-horizontal" action="<?php echo site_url('Collaborateur/insertion') ?>" method="post" role="form">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h2 class="modal-title">Fiche Collaborateur</h2>
                        </div>
                        <div class="modal-body">
                            
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Nom  </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" value="" placeholder="Nom " required name="nom">
                                        </div>
                                        <?php echo form_error('bureau'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Localisation </label>
                                        <div class="col-md-8">
                                            <input type="text" id="prenom" class="form-control center" value="" name="localisation" required placeholder="ville">
                                        </div>
                                        <?php echo form_error('ville'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Email </label>
                                        <div class="col-md-8">
                                            <input type="text" id="commune" class="form-control center" value="" name="email" required placeholder="email">
                                        </div>
                                        <?php echo form_error('commune'); ?>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Contact </label>
                                        <div class="col-md-8">
                                            <input type="text" id="contact" class="form-control center" value="" name="numero" required placeholder="contact">
                                        </div>
                                        <?php echo form_error('contact'); ?>
                                    </div>
                                    <div class="form-group"<?php if ($this->session->userdata('type') == "ADMIN_PAYS"){  echo 'style="display:none;"'; } ?>>
                                        <label class="col-md-3 control-label">Pays</label>
                                        <div class="col-md-8">   
                                           <select name="pays" id="select2_sample4" class="select2 form-control">
                                               <option value="">Selectionner un Pays</option>
                                               <option value="CI">Cote d'Ivoire</option>               
                                               <option value="GH">Ghana</option>               
                                               <option value="NG">Nigeria</option>
                                           </select>
                                        </div>   
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Type</label>
                                        <div class="col-md-8">   
                                           <select name="pays" id="select2_sample4" class="select2 form-control" required>
                                               <option value="">Selectionner un Type</option>
                                               <option value="ADMIN"<?php if ($this->session->userdata('type') != "ADMIN"){  echo 'style="display:none;"'; } ?>>Admin</option>               
                                               <option value="COLLABORATEUR">Standard</option>               
                                           </select>
                                        </div>   
                                    </div>  
                                    
                                </div>
                            
                        </div>
                        <div class="modal-footer" style="padding-top: 0px!important;">
                            <button class="btn yellow" data-dismiss="modal" aria-hidden="true">Annuler</button>
                            <input class="btn blue" type="submit" value="Valider">
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
                bootbox.confirm("Voulez vous vraiment supprimer ce collaborateur ?", function(result) {
                    if (result==true) {
                        //alert(id);
                        document.location.href = '<?php echo site_url('Collaborateur/supprimer/').'/'?>'+id;
                    }
                });
            }
            function activate(id){
                bootbox.confirm("Voulez vous vraiment activer le collaborateur ?", function(result) {
                    if (result==true){
                        document.location.href = '<?php echo site_url('Collaborateur/activer/').'/'?>'+id;
                    }
                    else    { alert(" Annuler");};
                });
            }
        </script>
</body>
</html>