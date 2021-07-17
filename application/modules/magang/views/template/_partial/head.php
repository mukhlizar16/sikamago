<title><?= $title ?></title>
<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 11]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<?php
$uri_2 = $this->uri->segment(2);
?>
<![endif]-->
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="admin-sikamago">
<meta name="title" content="sikamago">
<meta name="keywords" content="sikamago, sikamago utu, sikamago apps, web app, login">
<meta name="description" content="Aplikasi magang dan kkn online.">
<!-- Favicon icon -->
<link rel="icon" href="<?= config_item('base_url') ?>assets/magang/theme/images/favicon.ico" type="image/x-icon">

<!-- custom page css-->
<link rel="stylesheet" href="<?= config_item('magang_css') ?>plugins/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= config_item('magang_css') ?>plugins/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= config_item('magang_css') ?>plugins/prism-coy.css">
<link rel="stylesheet" href="<?= config_item('magang_css') ?>plugins/select2.min.css">


<?php if ($uri_2 == 'pesan') : ?>
	<link rel="stylesheet" href="<?= config_item('magang_js') ?>plugins/jquery-ui/jquery-ui.css">
<?php endif; ?>
<!-- vendor css -->
<link rel="stylesheet" href="<?= config_item('magang_js') ?>plugins/dropify/css/dropify.min.css">
<link rel="stylesheet" href="<?= config_item('magang_js') ?>plugins/toastr/toastr.min.css">
<link rel="stylesheet" href="<?= config_item('magang_css') ?>plugins/trumbowyg.min.css">
<?php if (is_mhs()) : ?>
	<link rel="stylesheet" href="<?= config_item('magang_css') ?>plugins/daterangepicker.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<?php endif; ?>
<link rel="stylesheet" href="<?= config_item('magang_css') ?>style.css">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script>
	(function (i, s, o, g, r, a, m) {
		i['GoogleAnalyticsObject'] = r;
		i[r] = i[r] || function () {
			(i[r].q = i[r].q || []).push(arguments)
		}, i[r].l = 1 * new Date();
		a = s.createElement(o),
				m = s.getElementsByTagName(o)[0];
		a.async = 1;
		a.src = g;
		m.parentNode.insertBefore(a, m)
	})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

	ga('create', 'UA-193201674-1', 'auto');
	ga('send', 'pageview');
</script>
