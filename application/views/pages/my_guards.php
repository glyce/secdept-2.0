<link rel="stylesheet" href="<?php echo site_url('assets/style.css'); ?>">

<div class="row">

    <div class="col-lg-3 col-sm-8">
        <div class="card hovercard">
            <div class="cardheader"></div>
            <div class="avatar">
                <img alt="" src="<?php echo site_url('assets/img/app/logoEBVSAI.png'); ?>">
            </div>
            <div class="info">
                <div class="title">
                    <a target="_blank" href=""><?php echo ucfirst(strtolower($user_data->first_name)); ?> <?php echo ucfirst(strtolower($user_data->last_name)); ?></a>
                </div>
            </div>
        </div>

        <ul class="nav nav-pills nav-stacked">
            <li><a href=""><i class="fa fa-users"></i> Total Guard Referral
                <span class="label label-primary pull-right"><?php echo $total_refered_guards; ?></span></a></li>
            <li><a href=""><i class="fa fa-envelope"></i> Message</a></li>  
            <li><a href="javascript:void(0);"><i class="fa fa-user"></i>   My Security Guards</a></li>               
        </ul>
    </div>

	
</div>

<link rel="stylesheet" href="<?php echo site_url('assets/libs/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css'); ?>">
<script src="<?php echo site_url('assets/libs/bower_components/moment/moment.js'); ?>"></script>
<script src="<?php echo site_url('assets/libs/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'); ?>"></script>
<script>
    $('.time_start').datetimepicker({
        format: 'LT'
    });
    $('.time_end').datetimepicker({
        format: 'LT'
    });
</script>
