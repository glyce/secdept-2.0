<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="shortcut icon" href="<?php echo site_url('assets/img/app/logoEBVSAI.png'); ?>">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php echo 'EBVSAI | ' . $page_header; ?></title>

    <!-- <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
    <link rel="shortcut icon" type="image/png" href="http://eg.com/favicon.png"/> -->

    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/bower_components/bootstrap/dist/css/bootstrap.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/bower_components/toastr/toastr.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/dist/css/AdminLTE.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/dist/css/skins/_all-skins.min.css'); ?>">
        
    <script type="text/javascript" src="<?php echo site_url('assets/libs/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/libs/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/libs/bower_components/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/libs/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/libs/bower_components/toastr/toastr.min.js'); ?>"></script>
    <script type="text/javascript">
        var BASE_URL = '<?php echo base_url(); ?>';
    </script>

    <style type="text/css">
        html {
            font-family: Rockwell;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        body {
            padding-top: 120px;
            font-family: Rockwell;
        }
        footer {
           
            height: 39px;
            bottom: 0;
            width: 100%;
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:darkred;">
        <div class="container" style="padding-top:8px;">
            <div class="navbar-header" >
                <img src="<?php echo site_url('assets/img/app/logoEBVSAI.png'); ?>" alt="Logo" style="width:80px;height:80px;" class="navbar-brand" href="index.php">
                <a class="navbar-brand" href="<?php echo site_url(); ?>" style="padding-top:28px;"><strong>EX-BATAAN VETERANS SECURITY AGENCY</a></strong>
            </div>
           <?php echo get_menu($menus); ?>
        </div>
    </nav>
    </hr>
    <div class="container">
        <?php (isset($sub_view)) ? $this->load->view($sub_view) : ''; ?>
        </hr>
        <footer>
            <strong>Copyright &copy; <b>Ex-Bataan Veterans Security Agency, INC. 2017</strong>
        </footer>
    </div>

    <div class="modal fade" id="modal-login">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color:darkred;">
                    <font color="white"><h4 class="modal-title"><i class="fa fa-unlock"></i><b> Login</b></h4></font>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post">
                        <div class="form-group has-feedback">
                            <label class="col-md-3 control-label">Username</label>
                            <div class="col-md-8">
                                <input type="text" id="username" name="username" class="form-control" placeholder="Username" required="true" />
                                <i class="glyphicon glyphicon-user form-control-feedback"></i>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label class="col-md-3 control-label">Password</label>
                            <div class="col-md-8">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="true" />
                                <i class="glyphicon glyphicon-lock form-control-feedback"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-4">
                                <button type="button" class="btn btn-default btn-block" id="btn-cancel">Cancel</button>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-success btn-block" id="btn-signin" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Please wait...">Sign in</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>      
        </div>          
    </div>
    <script type="text/javascript">
        $(function() {

            var mdFormLogin = $('#modal-login');
            var btnLogin  = $('#btn-login');
            var btnSignin = $('#btn-signin');
            var btnCancel = $('#btn-cancel');
            var username  = $('#username');
            var password  = $('#password');

            btnLogin.on('click', function(e) {
                
                mdFormLogin.modal({
                    backdrop: false,
                    keyboard: false
                });
            });

            btnCancel.on('click', function(e) {
                mdFormLogin.modal('hide');
                window.location="<?php echo site_url(); ?>";
            });

            btnSignin.on('click', function(e) {

                var userCredentials = {
                    username: username.val(),
                    password: password.val(),
                };

                console.log('userCredentials', userCredentials);

                username[0].setAttribute('disabled', true);
                password[0].setAttribute('disabled', true);
                btnCancel[0].setAttribute('disabled', true);

                var $this = $(this);
                $this.button('loading');

                setTimeout(function() {
                    $this.button('reset');

                    $.ajax({
                        url: '<?php echo site_url('auth/frontend_login'); ?>',
                        method: 'POST',
                        data: userCredentials,
                        dataType: 'json',
                        success: function(response) {

                            username[0].removeAttribute('disabled');
                            password[0].removeAttribute('disabled');
                            btnCancel[0].removeAttribute('disabled');

                            if (response.status == 'success') {
                                toastr.success(response.message);
                                window.location = response.redirect_to;
                            }
                            if (response.status == 'error') {
                                toastr.warning(response.message);
                            }
                        }, error: function(error) {
                            toastr.error(error);
                        }
                    });
                }, 1000);
            });

        });
    </script>
    <?php if ($this->session->flashdata('logout_message')): ?>
    <script>toastr.success('<?php echo $this->session->flashdata('logout_message'); ?>');</script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('success')): ?>
    <script>toastr.success('<?php echo $this->session->flashdata('success'); ?>');</script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
    <script>toastr.error('<?php echo $this->session->flashdata('error'); ?>');</script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('upload_dti')): ?>
    <script>toastr.info('<?php echo $this->session->flashdata('upload_dti'); ?>');</script>
    <?php endif; ?>
    
    <!-- test commit -->
    <script type="text/javascript" src="<?php echo site_url('assets/libs/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/libs/dist/js/app.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo site_url('assets/libs/dist/js/adminlte.min.js'); ?>"></script>
</body>
</html>