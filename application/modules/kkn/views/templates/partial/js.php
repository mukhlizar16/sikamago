<?php
$uri1 = $this->uri->segment(1);
$uri2 = $this->uri->segment(2);
?>
<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?= config_item('kkn_js') ?>stisla.js"></script>

<!-- JS Libraies -->
<script src="<?= config_item('kkn_modules') ?>summernote/summernote-bs4.js"></script>
<script src="<?= config_item('kkn_modules') ?>chocolat/dist/js/jquery.chocolat.min.js"></script>
<script src="<?= config_item('kkn_modules') ?>datatables/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= config_item('kkn_modules') ?>select2/js/select2.min.js"></script>
<script src="<?= config_item('kkn_modules') ?>select2/js/i18n/id.js"></script>

<!-- Template JS File -->
<script src="<?= config_item('kkn_js') ?>scripts.js"></script>
<script src="<?= config_item('kkn_js') ?>custom.js"></script>

<?php if (is_admin_kkn()) : ?>
	<script src="<?= config_item('kkn_js') ?>admin-script.js"></script>

	<script src="<?= config_item('kkn_modules') ?>datatables/jquery.dataTables.min.js"></script>
	<script src="<?= config_item('kkn_modules') ?>datatables/dataTables.bootstrap4.min.js"></script>
	<script src="<?= config_item('kkn_modules') ?>datatables/dataTables.responsive.min.js"></script>
	<script src="<?= config_item('kkn_modules') ?>datatables/dataTables.buttons.min.js"></script>
	<script src="<?= config_item('kkn_modules') ?>datatables/buttons.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
<?php endif ?>

<!-- JS Libraies -->
<?php if (is_mahasiswa()) : ?>
	<!--<script src="<?/*= config_item('kkn_modules') */?>bootstrap-daterangepicker/daterangepicker.js"></script>-->
	<script src="<?= config_item('kkn_js') ?>mahasiswa.js"></script>
<?php endif; ?>

<?php if ($uri2 == 'profil') : ?>
	<script src="<?= config_item('kkn_js') ?>profil.js"></script>
<?php endif; ?>
