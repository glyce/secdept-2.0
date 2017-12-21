<div class="container-fluid">
	<form method="post" class="form-horizontal" action="<?php echo site_url('portal/register'); ?>" enctype="multipart/form-data">
		<div class="row">
		
		<div class="col-md-12">
				<div class="panel panel-danger">
					<div class="panel-heading">Company's Information</div>
					<div class="panel-body">

						<i style="margin-left: 120px ; color:red">* Required Fields</i>
					</br>
					<div class="form-group">
							<label class="control-label col-sm-3 requiredField" for="register_company_name">
								Company Name
								<span class="asteriskField text-red">*</span>
							</label>
							<div class="col-sm-9">
								<textarea class="form-control" cols="2" rows="2" id="register_company_name" name="register_company_name" placeholder="Company Name"><?php echo set_value('register_company_name'); ?></textarea>
								<?php echo form_error('register_company_name', '<div class="text-red">', '</div>'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-sm-3 requiredField" for="register_company_address">
								Company Address
								<span class="asteriskField text-red">*</span>
							</label>
							<div class="col-sm-9">
								<textarea class="form-control" cols="5" rows="5" id="register_company_address" name="register_company_address" placeholder="Address"><?php echo set_value('register_company_address'); ?></textarea>
								<?php echo form_error('register_company_address', '<div class="text-red">', '</div>'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3 requiredField" for="register_company_contact_number" >
								Company Contact #
								<span class="asteriskField text-red">*</span>
							</label>
							<div class="col-sm-9">
								<input class="form-control" value="<?php echo set_value('register_company_contact_number'); ?>" placeholder="Tel. / Mobile" id="register_company_contact_number" name="register_company_contact_number" type="text"/>
								<?php echo form_error('register_company_contact_number', '<div class="text-red">', '</div>'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Select City <span class="asteriskField text-red">*</span></label>
							<div class="col-md-9">
								<select name="register_city_id" class="form-control select-city">
									<option value="">SELECT CITY</option>
									<?php foreach ($cities as $key => $city): ?>
									<option value="<?php echo $city['id']; ?>" <?php echo set_select('register_city_id', $city['id']); ?>><?php echo $city['name'].', '.$city['province_name']; ?></option>
									<?php endforeach ?>
								</select>
								<?php echo form_error('register_city_id', '<div class="text-red">', '</div>'); ?>
							</div>
						</div>
						<div class="form-group has-feedback">
							<label class="control-label col-md-3">DTI Form: <span class="asteriskField text-red">*</span></label>
							<div class="col-md-3">
								<input type="file" name="register_dti_form" id="register_dti_form" class="form-control" value="<?php echo set_value('register_dti_form'); ?>" placeholder="DTI Form"/>
								<?php echo form_error('register_dti_form', '<div class="text-red">', '</div>'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
			
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-danger">
					<div class="panel-heading">Contact Person Information</div>
					<div class="panel-body">
						<div class="form-group">
							<label class="control-label col-sm-3 requiredField" for="first_name">
								First Name
								<span class="asteriskField text-red">*</span>
							</label>
							<div class="col-sm-9">
								<input class="form-control" value="<?php echo set_value('register_last_name'); ?>" id="register_first_name" name="register_first_name" placeholder="First name" type="text"/>
								<?php echo form_error('register_first_name', '<div class="text-red">', '</div>'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3 requiredField" for="register_middle_name">
								Middle Name
							</label>
							<div class="col-sm-9">
								<input class="form-control" value="<?php echo set_value('test'); ?>" id="register_middle_name" name="register_middle_name" placeholder="Middle Name" type="text"/>
								<?php echo form_error('register_middle_name', '<div class="text-red">', '</div>'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3 requiredField" for="register_last_name">
								Last Name
								<span class="asteriskField text-red">*</span>
							</label>
							<div class="col-sm-9">
								<input class="form-control" value="<?php echo set_value('register_last_name'); ?>" id="register_last_name" name="register_last_name" placeholder="Last Name" type="text"/>
								<?php echo form_error('register_last_name', '<div class="text-red">', '</div>'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3 requiredField" for="register_company_contact_number" >
								Contact #
								<span class="asteriskField text-red">*</span>
							</label>
							<div class="col-sm-9">
								<input class="form-control" value="<?php echo set_value('register_company_contact_number'); ?>" placeholder="Tel. / Mobile"id="register_company_contact_number" name="register_company_contact_number" type="text"/>
								<?php echo form_error('register_company_contact_number', '<div class="text-red">', '</div>'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="panel panel-danger">
					<div class="panel-heading">Account's Information</div>
					<div class="panel-body">
						<div class="form-group">
							<label class="control-label col-md-3 requiredField" for="register_email">
								Email Address<span class="asteriskField text-red">*</span>
							</label>
							<div class="col-sm-9">
								<input class="form-control" id="register_email" name="register_email" value="<?php echo set_value('register_email'); ?>" placeholder="Email" type="text"/>
								<?php echo form_error('register_email', '<div class="text-red">', '</div>'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 requiredField" for="register_username">
								Username <span class="asteriskField text-red">*</span>
							</label>
							<div class="col-sm-9">
								<input class="form-control" id="register_username" name="register_username" placeholder="Username" value="<?php echo set_value('register_username'); ?>" type="text"/>
								<?php echo form_error('register_username', '<div class="text-red">', '</div>'); ?>
							</div>	
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 requiredField" for="register_password">
								Password<span class="asteriskField text-red">*</span>
							</label>
							<div class="col-sm-9">
								<input class="form-control" id="register_password" name="register_password" placeholder="Password" value="<?php echo set_value('register_password'); ?>" type="password"/>
								<?php echo form_error('register_password', '<div class="text-red">', '</div>'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 requiredField" for="retype_password">
								Re-type Password <span class="asteriskField text-red">*</span>
							</label>
							<div class="col-sm-9">
								<input class="form-control" id="retype_password" name="retype_password" value="<?php echo set_value('retype_password'); ?>" placeholder="Re-type password" type="password"/>
								<?php echo form_error('retype_password', '<div class="text-red">', '</div>'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-offset-3 col-md-9">
								<input name="accept_terms" type="checkbox" value="I agree in terms and conditions"/>
								I agree in <a href="<?php echo site_url('assets/tnc.pdf'); ?>">terms and conditions</a>
								<?php echo form_error('accept_terms', '<div class="text-red">', '</div>'); ?>
							</label>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<input type="hidden" name="submit" value="submit">
								<button class="btn btn-primary btn-block" type="submit" id="register_signup">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>


	<div id="terms-condition" class="modal fade">
	   <div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background-color:darkred;">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<font color="white"><h4><i class="fa fa-fw fa-compass"></i><b>Terms And Conditions</b></h4></font>
				</div>
				<div class="modal-body">
				<p>Example Only</p>
				</div>
			</div>			
		</div>			
	</div>
	
<link rel="stylesheet" href="<?php echo site_url('assets/libs/bower_components/select2/dist/css/select2.min.css'); ?>">
<script src="<?php echo site_url('assets/libs/bower_components/select2/dist/js/select2.min.js'); ?>"></script>
<script>
	
	$(function() {
		$('.select-city').select2();
	});

</script>