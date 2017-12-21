<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" href="<?php echo site_url('assets/img/app/logoEBVSAI.png'); ?>">

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		<title><?php echo $site_title . ' | ' . $page_header; ?></title>

		<!-- <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
		<link rel="shortcut icon" type="image/png" href="http://eg.com/favicon.png"/> -->

		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/bower_components/bootstrap/dist/css/bootstrap.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/bower_components/toastr/toastr.min.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/dist/css/AdminLTE.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/dist/css/skins/_all-skins.min.css'); ?>">
		<style>
			.asteriskField {
				color: #ff0000;
			}
			.nav-tabs-custom > .nav-tabs > li.active {
				border-top-color: #dd4b39;
			}
		</style>
		<script type="text/javascript" src="<?php echo site_url('assets/libs/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo site_url('assets/libs/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>

		<script type="text/javascript" src="<?php echo site_url('assets/libs/bower_components/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo site_url('assets/libs/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo site_url('assets/libs/bower_components/toastr/toastr.min.js'); ?>"></script>
		<script type="text/javascript">
			var BASE_URL = '<?php echo base_url(); ?>';
		</script>


		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

	</head>
	<body class="<?php echo $layout_color . ' ' . $layout_option; ?>">

		<audio id="notification-sound">
			<source src="<?php echo site_url('assets/media/notification-sound/inquisitiveness.ogg'); ?>" type="audio/ogg">
			<source src="<?php echo site_url('assets/media/notification-sound/inquisitiveness.mp3'); ?>" type="audio/mpeg">
			Your browser does not support the audio element.
		</audio>

		<div class="wrapper">
			<?php (isset($main_header)) ? $this->load->view($main_header) : ''; ?>
			<?php (isset($main_sidebar)) ? $this->load->view($main_sidebar) : ''; ?>
			<div class="content-wrapper">
				<section class="content-header">
					<h1><?php echo $page_header; ?></h1>
					<ol class="breadcrumb">
						<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
						<li class="active">Here</li>
					</ol>
				</section>
				<section class="content">
					<?php $this->load->view('widgets/alert-messages'); ?>
					<?php (isset($sub_view)) ? $this->load->view($sub_view) : ''; ?>
				</section>
			</div>
			<?php (isset($main_footer)) ? $this->load->view($main_footer) : ''; ?>
			<?php (isset($main_control_sidebar)) ? $this->load->view($main_control_sidebar) : ''; ?>
		</div>
		
		<script type="text/javascript" src="<?php echo site_url('assets/libs/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
		
		<script type="text/javascript" src="<?php echo site_url('assets/libs/dist/js/app.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo site_url('assets/libs/dist/js/adminlte.min.js'); ?>"></script>
	</body>
</html>
