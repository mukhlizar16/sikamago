<?php
defined('BASEPATH') or exit('No direct script access allowed');
$uri1 = $this->uri->segment(1);
?>

<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="author" content="SmakinBaik">
<meta name="description" content="Sistem informasi manajemen kinerja berbasis akuntabel, integratif dan komunikatif">

<link rel="icon" href="<?= base_url() ?>assets/landing/image/favicon.ico">

<title><?= $title ?></title>

<!-- General CSS Files -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
	  integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<!-- CSS Libraries -->
<link rel="stylesheet" href="<?= config_item('kkn_modules') ?>summernote/summernote-bs4.css">
<link rel="stylesheet" href="<?= config_item('kkn_modules') ?>datatables/datatables.min.css">
<link rel="stylesheet" href="<?= config_item('kkn_modules') ?>select2/css/select2.min.css">

<?php if ($uri1 == 'profil') : ?>
<link rel="stylesheet" href="<?= base_url() ?>filepond/dist/filepond.min.css">
<link rel="stylesheet" href="<?= base_url() ?>filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css">
<link rel="stylesheet" href="<?= base_url() ?>filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css">
<link rel="stylesheet" href="<?= base_url() ?>filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.min.css">
<link rel="stylesheet" href="<?= base_url() ?>filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.css">
<link rel="stylesheet" href="<?= base_url() ?>filepond-plugin-image-edit/dist/filepond-plugin-image-edit.min.css">
<?php endif; ?>

<?php if (is_admin_kkn()) : ?>
	<link href="<?= config_item('kkn_modules') ?>datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" type="text/css">
<?php endif; ?>

<?php if (is_mahasiswa()) : ?>
	<!--<link rel="stylesheet" href="<?/*= config_item('kkn_modules') */?>bootstrap-daterangepicker/daterangepicker.css">-->
<?php endif; ?>

<!-- Template CSS -->
<link rel="stylesheet" href="<?= config_item('kkn_css') ?>style.css">
<link rel="stylesheet" href="<?= config_item('kkn_css') ?>components.css">

<!-- Start GA -->
<!--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>-->
<!-- /END GA -->
