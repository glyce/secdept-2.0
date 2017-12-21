<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>EBVSAI SecDept | Log in</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/bower_components/bootstrap/dist/css/bootstrap.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/bower_components/ionicons/css/ionicons.min.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/bower_components/iCheck/flat/blue.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/bower_components/iCheck/minimal/blue.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/dist/css/AdminLTE.css'); ?>">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<script type="text/javascript" src="<?php echo site_url('assets/libs/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
	</head>
	<style type="text/css">
		body{
			padding-top: 90px;
		}
	</style>
	<body class="hold-transition login-page">
		
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<div class="login-box">
			<div class="login-logo">
				<a href="javascript:void(0);"><b>EBVSAI</b> | SecDept</a>
			</div>
			<!-- /.login-logo -->
			<div class="login-box-body">
				<p class="login-box-msg"><?php echo lang('login_subheading'); ?></p>
				<div id="infoMessage" class="text-red"><?php echo $message;?></div>
				<?php if ($this->session->flashdata('success')): ?>
					<div id="infoMessage" class="text-green">
						<?php echo $this->session->flashdata('success'); ?>
					</div>
				<?php endif ?>
				<?php echo form_open("auth/login");?>
					<div class="form-group has-feedback">
						<?php echo form_input($identity);?>
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<?php echo form_input($password);?>
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>

					<div class="row">

						<div class="col-xs-12">
							<button type="submit" class="btn btn-danger btn-block btn-flat">Sign In</button>
						</div>
						<div class></div>
						<!-- /.col -->
					</div>

				<?php echo form_close();?>

				</div>
			<!-- /.login-box-body -->
		</div>
			</div>
		</div>
		<!-- /.login-box -->

		<script type="text/javascript" src="<?php echo site_url('assets/libs/bower_components/bootstrap/3.3.7/js/bootstrap.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo site_url('assets/libs/bower_components/iCheck/icheck.min.js'); ?>"></script>

		<!-- Custom JavaScript -->
		<script type="text/javascript" src="<?php echo site_url('assets/js/icheck-custom.js'); ?>"></script>
		<script>
			$(function () {
				$('#remember').iCheck({
					checkboxClass: 'icheckbox_square-blue',
					radioClass: 'iradio_square-blue',
					increaseArea: '20%' // optional
				});
				$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
					checkboxClass: 'icheckbox_minimal-blue',
					radioClass: 'iradio_minimal-blue'
				});
			});
		</script>
	</body>
</html>
