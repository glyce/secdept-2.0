<div class="row">
    <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-header with-border">Management Tools</div>
            <div class="box-body">
                <button class="btn btn-success pull-right" onclick="saveEmployeeInformation()">
                    <i class="fa fa-floppy-o"></i> <span>Save Information</span>
                </button>
                <button class="btn btn-danger" onclick="saveEmployeeInformation()">
                    <i class="fa fa-archive"></i> <span>Archived</span>
                </button>
				<button class="btn btn-primary" onclick="saveEmployeeInformation()">
                    <i class="fa fa-file-o"></i> <span>List of Expired Documents</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    
    <form id="employee-registration-form" action="<?php echo site_url('admin/employees/add_new'); ?>" method="post">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#personal" data-toggle="tab">Personal Info</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Educational Background <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php foreach ($educational_attainments as $index => $educational_attainment): ?>
                            <li><a data-toggle="tab" href="#educational-attainment-<?php echo md5($index); ?>"><?php echo $educational_attainment['name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li><a href="#government_id" data-toggle="tab">Government ID</a></li>
                    <li><a href="#records" data-toggle="tab">Personal Records</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="personal">
                        <div class="box-body">
						<div class="row">
                            <div class="col-xs-6"">
                            <label>Employee Type</label>
                                    <select  name="guard_employee_type" class="form-control">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($employee_types as $employee_type): ?>
                                        <option value="<?php echo $employee_type['id']; ?>" <?php echo set_select('guard_employee_type', $employee_type['id']); ?>><?php echo $employee_type['name']; ?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <?php echo form_error('guard_employee_type', '<div class="text-red">', '</div>'); ?>
                            </div>
						</div>	
						</br>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label class="control-label">Upload Photo:</label>
                                    <input type="file" name="file_to_upload" id="file_to_upload" class="form-control">
                                </div>
                                <div class="col-xs-6">
                                    <label>Hired Date</label>
                                    <input type="text" class="form-control datehired" value="<?php echo set_value('guard_hired_date'); ?>" name="guard_hired_date" placeholder="Date Hired">
                                    <?php echo form_error('guard_hired_date', '<div class="text-red">', '</div>'); ?>
                                </div>
                            </div>
                            </br>
                            <div class="row">
                                <div class="col-xs-4">
                                <label>First Name</label>
                                    <input type="text" class="form-control" value="<?php echo set_value('guard_first_name'); ?>" name="guard_first_name" placeholder="First Name">
                                    <?php echo form_error('guard_first_name', '<div class="text-red">', '</div>'); ?>
                                </div>
                                <div class="col-xs-4">
                                <label>Middle Name</label>
                                    <input type="text" class="form-control" value="<?php echo set_value('guard_middle_name'); ?>" name="guard_middle_name" placeholder="Middle Name">
                                    <?php echo form_error('guard_middle_name', '<div class="text-red">', '</div>'); ?>
                                </div>
                                <div class="col-xs-4">
                                <label>Last Name</label>
                                    <input type="text" class="form-control" value="<?php echo set_value('guard_last_name'); ?>" name="guard_last_name" placeholder="Last Name">
                                    <?php echo form_error('guard_last_name', '<div class="text-red">', '</div>'); ?>
                                </div>
                            </div>
                            </br>
                            <div class="row">
                                <div class="col-xs-6">
                                <label>Contact Number</label>
                                    <input type="text" class="form-control" value="<?php echo set_value('guard_contact_number'); ?>" name="guard_contact_number" placeholder="Contact Number">
                                    <?php echo form_error('guard_contact_number', '<div class="text-red">', '</div>'); ?>
                                </div>
                                <div class="col-xs-6">
                                <label>Email</label>
                                    <input type="text" class="form-control" value="<?php echo set_value('guard_email'); ?>" name="guard_email" placeholder="Email Address">
                                    <?php echo form_error('guard_email', '<div class="text-red">', '</div>'); ?>
                                </div>
                            </div>
                            </br>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Gender</label>
                                    <select  name="guard_gender" class="form-control" required="true">
                                        <option value="">-- Select --</option>
                                        <option value="1" <?php echo set_select('guard_gender', 1); ?>>Male</option>
                                        <option value="0" <?php echo set_select('guard_gender', 0); ?>>Female</option>
                                    </select>
                                    <?php echo form_error('guard_gender', '<div class="text-red">', '</div>'); ?>
                                </div>
                                <div class="col-xs-6">
                                    <label>Civil Status</label>
                                    <select  name="guard_civil_status" class="form-control" required="true">
                                        <option value="">-- Select --</option>
                                        <option value="1" <?php echo set_select('guard_civil_status', 1); ?>>Single</option>
                                        <option value="2" <?php echo set_select('guard_civil_status', 2); ?>>Engaged</option>
                                        <option value="3" <?php echo set_select('guard_civil_status', 3); ?>>Married</option>
                                        <option value="4" <?php echo set_select('guard_civil_status', 4); ?>>Divorced</option>
                                        <option value="5" <?php echo set_select('guard_civil_status', 5); ?>>Widowed</option>
                                    </select>
                                    <?php echo form_error('guard_civil_status', '<div class="text-red">', '</div>'); ?>
                                </div>
                            </div>
                            </br>
                            <div class="row">
                                <div class="col-xs-5">
                                    <label>Birth Date</label>
                                    <input type="text" class="form-control birthdate" value="<?php echo set_value('guard_birthdate'); ?>" name="guard_birthdate" placeholder="yyyy-mm-dd">
                                    <?php echo form_error('guard_birthdate', '<div class="text-red">', '</div>'); ?>
                                </div>
                                <div class="col-xs-7">
                                    <label>Birth Place</label>
                                    <input type="text" class="form-control" value="<?php echo set_value('guard_birthplace'); ?>" name="guard_birthplace" placeholder="place of birth">
                                    <?php echo form_error('guard_birthplace', '<div class="text-red">', '</div>'); ?>
                                </div>
                            </div>
                            </br>
                            <div class="form-group">
                                <label>Current Address</label>
                                <input type="text" class="form-control" value="<?php echo set_value('guard_current_address'); ?>" name="guard_current_address" placeholder="Enter Current Address">
                                <?php echo form_error('guard_current_address', '<div class="text-red">', '</div>'); ?>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Citizenship</label>
                                    <input type="text" class="form-control" value="<?php echo set_value('guard_citizenship'); ?>" name="guard_citizenship" placeholder="ex.Filipino">
                                    <?php echo form_error('guard_citizenship', '<div class="text-red">', '</div>'); ?>
                                </div>
                                <div class="col-xs-6">
                                    <label>Religion</label>
                                    <input type="text" class="form-control" value="<?php echo set_value('guard_religion'); ?>" name="guard_religion" placeholder="ex.Roman Catholic">
                                    <?php echo form_error('guard_religion', '<div class="text-red">', '</div>'); ?>
                                </div>
                            </div>
                            </br>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Height</label>
                                    <input type="text" class="form-control" value="<?php echo set_value('guard_height'); ?>" name="guard_height" placeholder="Enter Height">
                                    <?php echo form_error('guard_height', '<div class="text-red">', '</div>'); ?>
                                </div>
                                <div class="col-xs-6">
                                    <label>Weight</label>
                                    <input type="text" class="form-control" value="<?php echo set_value('guard_weight'); ?>" name="guard_weight" placeholder="Enter Weight">
                                    <?php echo form_error('guard_weight', '<div class="text-red">', '</div>'); ?>
                                </div>
                            </div>
                            </br>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Eye Color</label>
                                    <input type="text" class="form-control" value="<?php echo set_value('guard_eye_color'); ?>" name="guard_eye_color" placeholder="Enter Eye Color">
                                    <?php echo form_error('guard_eye_color', '<div class="text-red">', '</div>'); ?>
                                </div>
                                <div class="col-xs-6">
                                    <label>Hair Color</label>
                                    <input type="text" class="form-control" value="<?php echo set_value('guard_hair_color'); ?>" name="guard_hair_color" placeholder="Enter Hair Color">
                                    <?php echo form_error('guard_hair_color', '<div class="text-red">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($educational_attainments as $index => $educational_attainment): ?>
                    <div class="tab-pane fade" id="educational-attainment-<?php echo md5($index); ?>">
                        <font size="3px;"><p><b><?php echo $educational_attainment['name']; ?></p></b></font>
                        
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label for="" class="control-label col-lg-3">School Name</label>
                                <div class="col-lg-7">
                                    <input type="text" name="<?php echo strtolower($educational_attainment['code']); ?>[school_name]" class="form-control" placeholder="Enter School Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-lg-3">School Address</label>
                                <div class="col-lg-7">
                                    <input type="text" name="<?php echo strtolower($educational_attainment['code']); ?>[school_address]" class="form-control" placeholder="Enter School Address">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-lg-3">Year Start</label>
                                <div class="col-lg-7">
                                    <input type="text" name="<?php echo strtolower($educational_attainment['code']); ?>[year_start]" class="form-control" placeholder="Enter Year Start">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-lg-3">Year End</label>
                                <div class="col-lg-7">
                                    <input type="text" name="<?php echo strtolower($educational_attainment['code']); ?>[year_end]" class="form-control" placeholder="Enter Year End">
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="<?php echo strtolower($educational_attainment['code']); ?>[educational_attainment_id]" value="<?php echo $educational_attainment['id']; ?>">
                    <?php endforeach; ?>
                    <div class="tab-pane" id="government_id">
                        <div class="row">
                            <div class="col-xs-6">
                                <label>Licensed Number</label>
                                <input type="text" class="form-control" value="<?php echo set_value('guard_licensed'); ?>" name="guard_licensed" placeholder="Enter Licensed Number">
                               
                            </div>
                            <div class="col-xs-6">
                                <label>Licensed Number Expiration Date</label>
                                <input type="text" class="form-control licensed_expiration" value="<?php echo set_value('guard_ln_expiration'); ?>" name="guard_ln_expiration" placeholder="Enter Expiration Date">
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <label>SSS Number</label>
                                <input type="text" class="form-control" value="<?php echo set_value('guard_sss'); ?>" name="guard_sss" placeholder="000-00000000-00">
                              
                            </div>
                            <div class="col-xs-6">
                                <label>TIN Number</label>
                                <input type="text" class="form-control" value="<?php echo set_value('guard_tin'); ?>" name="guard_tin" placeholder="0000-0000-0000-0000">
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <label>Pag-ibig Number</label>
                                <input type="text" class="form-control" value="<?php echo set_value('guard_hdmf'); ?>" name="guard_hdmf" placeholder="00000-00000-00000">
                               
                            </div>
                            <div class="col-xs-6">
                                <label>PhilHealth Number</label>
                                    <input type="text" class="form-control" value="<?php echo set_value('guard_phic'); ?>" name="guard_phic" placeholder="000-00000000-00">
                                    <?php echo form_error('guard_phic', '<div class="text-red">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="records">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>NBI Clearance Expiration Date:</label>
                                    <input type="text" class="form-control nbi_expiration" value="" placeholder="Enter Clearance Expiration Date">
                                    <?php //echo form_error('nbi', '<div class="text-red">', '</div>'); ?>
                                </div>
                                <div class="col-xs-6">
                                    <label class="control-label">Upload NBI File:</label>
                                    <input type="file" name="file_to_upload" id="file_to_upload" class="form-control">
                                    <?php //echo form_error('nbi_file', '<div class="text-red">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Medical Records Expiration Date</label>
                                    <input type="text" class="form-control medical_expiration" value="" name="guard_ln_expiration" placeholder="Enter Medical Record Expiration Date">
                                    <?php //echo form_error('medical', '<div class="text-red">', '</div>'); ?>
                                </div>
                                <div class="col-xs-6">
                                    <label class="control-label">Upload Medical Record File:</label>
                                    <input type="file" name="file_to_upload" id="file_to_upload" class="form-control">
                                    <?php //echo form_error('medical_file', '<div class="text-red">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Police Clearance Expiration Date</label>
                                    <input type="text" class="form-control clearance_expiration" value="" name="guard_sss" placeholder="Enter Police Clearance Expiration Date">
                                    <?php //echo form_error('police_clearance', '<div class="text-red">', '</div>'); ?>
                                </div>
                                <div class="col-xs-6">
                                    <label class="control-label">Upload Police Clearance File:</label>
                                    <input type="file" name="file_to_upload" id="file_to_upload" class="form-control">
                                    <?php //echo form_error('pc_file', '<div class="text-red">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Barangay Clearance Expiration Date</label>
                                    <input type="text" class="form-control barangay_expiration" value="" name="guard_tin" placeholder="Barangay Clearance Expiration Date">
                                    <?php //echo form_error('barangay_clearance', '<div class="text-red">', '</div>'); ?>
                                </div>
                                <div class="col-xs-6">
                                    <label class="control-label">Upload Barangay Clearance File:</label>
                                    <input type="file" name="file_to_upload" id="file_to_upload" class="form-control">
                                    <?php //echo form_error('bc_file', '<div class="text-red">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Neuro Certificate Expiration Date</label>
                                    <input type="text" class="form-control neuro_expiration" value="" name="guard_hdmf" placeholder="Neuro Certificate Expiration Date">
                                    <?php //echo form_error('neuro', '<div class="text-red">', '</div>'); ?>
                                </div>
                                <div class="col-xs-6">
                                    <label class="control-label">Upload Neuro Certificate File:</label>
                                    <input type="file" name="file_to_upload" id="file_to_upload" class="form-control">
                                    <?php //echo form_error('neuro_file', '<div class="text-red">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/libs/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
<script type="text/javascript" src="<?php echo site_url('assets/libs/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>

<script>

    $('.datehired').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });

    $('.birthdate').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });

    $('.licensed_expiration').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });

    $('.nbi_expiration').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });

    $('.medical_expiration').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });

    $('.clearance_expiration').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });

    $('.barangay_expiration').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });

    $('.neuro_expiration').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });
    function saveEmployeeInformation() {
        document.getElementById("employee-registration-form").submit();
    }
</script>