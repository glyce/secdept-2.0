<h1><?php echo lang('create_user_heading');?></h1>
<p><?php echo lang('create_user_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_user");?>

      <p>
            <label for="">FIRST NAME</label> <br />
            <?php echo form_input($first_name);?>
      </p>

      <p>
            <label for="">LAST NAME</label> <br />
            <?php echo form_input($last_name);?>
      </p>
      
      <?php
      if($identity_column!=='email') {
          echo '<p>';
          echo '<label for="">IDENTITY</label>';
          echo '<br />';
          echo form_error('identity');
          echo form_input($identity);
          echo '</p>';
      }
      ?>

      <p>
            <label for="">COMPANY</label> <br />
            <?php echo form_input($company);?>
      </p>

      <p>
            <label for="">EMAIL</label> <br />
            <?php echo form_input($email);?>
      </p>

      <p>
           <label for="">PHONE</label> <br />
            <?php echo form_input($phone);?>
      </p>

      <p>
            <label for="">PASSWORD</label> <br />
            <?php echo form_input($password);?>
      </p>

      <p>
            <label for="">RETYPE PASSWORD</label> <br />
            <?php echo form_input($password_confirm);?>
      </p>

      <p><button type="submit">Submit</button></p>

<?php echo form_close();?>
