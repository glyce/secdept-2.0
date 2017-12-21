<script>
    toastr.options.showEasing = 'swing';
    toastr.options.hideEasing = 'linear';
    toastr.options.closeEasing = 'linear';

    var notification = {};
    var isNotificationSound = '<?php echo isset($notification['sound']) ? true : false; ?>';
    
    notification.sound = function() {
        if (isNotificationSound)
        {
            $('#notification-sound')[0].play();
        }
    }
</script>
<div class="row">
    <div class="col-md-12">
        
        <?php if ($this->session->flashdata('message') != null): ?>
            <div class="alert alert-success alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>MESSAGE!</strong> <?php echo $this->session->flashdata('message'); ?>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success') != null): ?>
            <div class="alert alert-success alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>SUCCESS!</strong> <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('warning') != null): ?>
            <div class="alert alert-warning alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>WARNING!</strong> <?php echo $this->session->flashdata('warning'); ?>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error') != null): ?>
            <div class="alert alert-danger alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>ERROR!</strong> <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('try_again') != null): ?>
            <div class="alert alert-warning alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>TRY AGAIN!</strong> <?php echo $this->session->flashdata('try_again'); ?>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error_array') != null): ?>
            <div class="alert alert-danger alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>ERROR!</strong>
                <ul>
                    <?php foreach ($this->session->flashdata('error_array') as $key => $value): ?>
                    <li><?php echo $value; ?></li>
                    <?php endforeach ?>
                </ul>
                
            </div>
        <?php endif; ?>
        
    </div>
</div>
