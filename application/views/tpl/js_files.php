<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<script src="<?php echo plugins_url('jquery.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo plugins_url('jquery-migrate.min.js'); ?>" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo plugins_url('jquery-ui/jquery-ui.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo plugins_url('bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo plugins_url('bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo plugins_url('jquery-slimscroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo plugins_url('jquery.blockui.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo plugins_url('jquery.cokie.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo plugins_url('uniform/jquery.uniform.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo plugins_url('bootstrap-switch/js/bootstrap-switch.min.js'); ?>" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo plugins_url('jqvmap/jqvmap/jquery.vmap.js'); ?>" type="text/javascript"></script>
<script src="<?php echo plugins_url('jqvmap/jqvmap/maps/jquery.vmap.russia.js'); ?>" type="text/javascript"></script>
<script src="<?php echo plugins_url('jqvmap/jqvmap/maps/jquery.vmap.world.js'); ?>" type="text/javascript"></script>
<script src="<?php echo plugins_url('jqvmap/jqvmap/maps/jquery.vmap.europe.js'); ?>" type="text/javascript"></script>
<script src="<?php echo plugins_url('jqvmap/jqvmap/maps/jquery.vmap.germany.js'); ?>" type="text/javascript"></script>
<script src="<?php echo plugins_url('jqvmap/jqvmap/maps/jquery.vmap.usa.js'); ?>" type="text/javascript"></script>
<script src="<?php echo plugins_url('jqvmap/jqvmap/data/jquery.vmap.sampledata.js'); ?>" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<script src="<?php echo plugins_url('morris/morris.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo plugins_url('morris/raphael-min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo plugins_url('jquery.sparkline.min.js'); ?>" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo js_url('metronic'); ?>" type="text/javascript"></script>
<script src="<?php echo js_url('layout'); ?>" type="text/javascript"></script>
<script src="<?php echo js_url('quick-sidebar'); ?>" type="text/javascript"></script>
<srcipt src="<?php echo js_url('jquery.maskedinput'); ?>" type="text/javascript"></srcipt>
<script src="<?php echo js_url('demo'); ?>" type="text/javascript"></script>
<script src="<?php echo js_url('index3'); ?>" type="text/javascript"></script>
<script src="<?php echo js_url('tasks'); ?>" type="text/javascript"></script>
<script src="<?php echo js_url('charts-flotcharts'); ?>"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN CHARTS FLOTS PLUGINS -->
<script src="<?php echo plugins_url('flot/jquery.flot.min.js'); ?>"></script>
<script src="<?php echo plugins_url('flot/jquery.flot.resize.min.js'); ?>"></script>
<script src="<?php echo plugins_url('flot/jquery.flot.pie.min.js'); ?>"></script>
<script src="<?php echo plugins_url('flot/jquery.flot.stack.min.js'); ?>"></script>
<script src="<?php echo plugins_url('flot/jquery.flot.crosshair.min.js'); ?>"></script>
<script src="<?php echo plugins_url('flot/jquery.flot.categories.min.js'); ?>" type="text/javascript"></script>
<!-- END CHARTS FLOTS PLUGINS -->
<!-- BEGIN DATATABLES PLUGINS -->
<script src="<?php echo js_url('table-managed'); ?>"></script>
<script type="text/javascript" src="<?php echo plugins_url('select2/select2.min.js'); ?>"></script>
<script src="<?php echo base_url() ?>assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo plugins_url('datatables/media/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo plugins_url('datatables/plugins/bootstrap/dataTables.bootstrap.js'); ?>"></script>
<script type="text/javascript" src="<?php echo plugins_url('bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo plugins_url('clockface/js/clockface.js') ;?>"></script>
<script type="text/javascript" src="<?php echo plugins_url('bootstrap-daterangepicker/moment.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo plugins_url('bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
<script type="text/javascript" src="<?php echo plugins_url('bootstrap-colorpicker/js/bootstrap-colorpicker.js'); ?>"></script>
<script type="text/javascript" src="<?php echo plugins_url('bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js'); ?>"></script>
<script src="<?php echo plugins_url('bootbox/bootbox.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo js_url('components-pickers'); ?>"></script>
<script src="<?php echo base_url() ?>assets/scripts/ui-alert-dialog-api.js" type="text/javascript"></script>
<!-- END DATATABLES PLUGINS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   TableManaged.init();
   Demo.init(); // init demo features   
   //QuickSidebar.init(); // init quick sidebar
   ComponentsPickers.init();
   ChartsFlotcharts.init();
   ChartsFlotcharts.initCharts();
   ChartsFlotcharts.initPieCharts();
   FormSamples.init();
   ChartsFlotcharts.initBarCharts();
   UIAlertDialogApi.init();   
   
    //Index.init(); // init index page
 Tasks.initDashboardWidget(); // init tash dashboard widget  
 
});
</script>
<!-- END JAVASCRIPTS -->