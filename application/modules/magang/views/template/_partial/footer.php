<!-- Required Js -->
<script src="<?= config_item('magang_js') ?>vendor-all.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="<?= config_item('magang_js') ?>plugins/bootstrap.min.js"></script>
<script src="<?= config_item('magang_js') ?>ripple.js"></script>
<script src="<?= config_item('magang_js') ?>pcoded.min.js"></script>
<!--<script src="<? /*= config_item('magang_js') */ ?>menu-setting.min.js"></script>-->

<!-- Apex Chart -->
<script src="<?= config_item('magang_js') ?>plugins/apexcharts.min.js"></script>

<!-- DataTables -->
<script src="<?= config_item('magang_js') ?>plugins/jquery.dataTables.min.js"></script>
<script src="<?= config_item('magang_js') ?>plugins/dataTables.bootstrap4.min.js"></script>
<script src="<?= config_item('magang_js') ?>plugins/buttons.colVis.min.js"></script>
<script src="<?= config_item('magang_js') ?>plugins/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="<?= config_item('magang_js') ?>plugins/jszip.min.js"></script>
<script src="<?= config_item('magang_js') ?>plugins/dataTables.buttons.min.js"></script>
<script src="<?= config_item('magang_js') ?>plugins/buttons.html5.min.js"></script>
<script src="<?= config_item('magang_js') ?>plugins/buttons.bootstrap4.min.js"></script>
<script src="<?= config_item('magang_js') ?>plugins/dataTables.responsive.min.js"></script>
<script src="<?= config_item('magang_js') ?>plugins/prism.js"></script>

<!-- custom-chart js -->
<script src="<?= config_item('magang_js') ?>plugins/jquery-ui/jquery-ui.js"></script>
<script src="<?= config_item('magang_js') ?>plugins/sweetalert.min.js"></script>
<script src="<?= config_item('magang_js') ?>plugins/dropify/js/dropify.min.js"></script>
<script src="<?= config_item('magang_js') ?>plugins/trumbowyg.min.js"></script>
	<script src="<?= config_item('magang_js') ?>plugins/select2.full.min.js"></script>

<?php if (is_admin() || is_operator()) : ?>
	<script src="<?= config_item('magang_js') ?>pages/dashboard-main.js"></script>
	<script src="<?= config_item('magang_js') ?>script-code.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<?php endif; ?>

<?php if (is_PA() || is_PAR()) : ?>
	<script src="<?= config_item('magang_js') ?>dosen-script.js"></script>
<?php endif; ?>

<?php if (is_SPV()) : ?>
	<script src="<?= config_item('magang_js') ?>mitra-script.js"></script>
<?php endif; ?>

<?php if (is_mhs()) : ?>
	<script src="<?= config_item('magang_js') ?>second-script.js"></script>
	<script src="<?= config_item('magang_js') ?>pages/form-select-custom.js"></script>
	<script src="<?= config_item('magang_js') ?>plugins/moment.js"></script>
	<script src="<?= config_item('magang_js') ?>plugins/daterangepicker.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	<script src="<?= config_item('magang_js') ?>plugins/jquery.bootstrap.wizard.min.js"></script>
<?php endif; ?>

<script>
	// tinymce editor
	$(window).on('load', function () {
		$('#tinymce-editor').trumbowyg({
			svgPath: "<?= config_item('magang_css') ?>/plugins/icons.svg",
			btns: [
				['viewHTML'],
				['undo', 'redo'],
				['formatting'],
				['strong', 'em', 'del'],
				['superscript', 'subscript'],
				['link'],
				['insertImage'],
				['unorderedList', 'orderedList'],
				['horizontalRule'],
				['removeformat'],
				['fullscreen']
			]
		});
	});

	$('body').tooltip({selector: '[data-toggle="tooltip"]'});
</script>
<?php if (is_mhs() && $this->uri->segment(2) == 'data_demografi') { ?>
	<script>
		Morris.Bar({
			element: 'grafik',
			data: <?php echo $data ?>,
			xkey: ['nama_bulan'],
			ykeys: ['wanita_subur'],
			labels: ['Wanita Subur'],
		});
	</script>
<?php } ?>
