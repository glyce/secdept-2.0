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
            <li><a href=""><i class="fa fa-user"></i>   My Security Guards</a></li>               
        </ul>
    </div>

	<div class="col-md-9">
		<div class="row">
            <div class="col-md-8">
                <h4><?php echo ucfirst(strtolower($user_data->first_name)); ?> <?php echo ucfirst(strtolower($user_data->last_name)); ?></h4>
				
         
            </div>
            <div class="col-md-4">
                <div class="box box-solid box-danger">
                    <div class="box-header with-border">
                        <h4 class="box-title">Summary</h4>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <a href="">
                                    <i class="fa fa-check"></i> Approved Guards
                                    <span class="label label-primary pull-right"><?php echo count($referred_guards['approved']); ?></span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-times"></i> Rejected Guards
                                    <span class="label label-primary pull-right"><?php echo count($referred_guards['rejected']); ?></span>
                                </a>
                            </li>
                        </ul>        
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#pending" aria-controls="pending" role="tab" data-toggle="tab">Pending</a></li>
                    <li role="presentation"><a href="#approved" aria-controls="approved" role="tab" data-toggle="tab">Approved</a></li>
                    <li role="presentation"><a href="#rejected" aria-controls="rejected" role="tab" data-toggle="tab">Rejected</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="pending">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped" id="dt-client-sg-requests">
                                <thead>
                                    <tr>
										<th class="text-left">...</th>
                                        <th class="text-left">Licensed No.</th>
                                        <th class="text-left">Full Name</th>
                                        <th class="text-center">Date Hired</th>
                                        <th class="text-center" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ( ! empty($referred_guards['pending'])): ?>
                                    <?php foreach ($referred_guards['pending'] as $index => $pending_request): ?>
                                    <tr>
										<td class="text-left"><img src="class="img-circle" width="30" height="30"></td>
                                        <td class="text-left">
                                            <a class="btn btn-link" data-target="#modal-details-<?php echo md5($index).md5($pending_request['request_id']); ?>" data-toggle="modal">
                                                <?php echo $pending_request['license_number']; ?>
                                            </a>
                                        </td>	
                                        <td class="text-left"><?php echo $pending_request['employee_fullname']; ?></td>
                                        <td class="text-center"><?php echo $pending_request['date_hired']; ?></td>
                                        <td class="text-center">
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#modal-approve-<?php echo $index; ?>">
                                                <i class="fa fa-check text-green"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#modal-reject-<?php echo $index; ?>">
                                                <i class="fa fa-times text-red"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                    <tr>
                                        <td class="text-center" colspan="4">-- No Record Found --</td>
                                    </tr>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                        <?php if ( ! empty($referred_guards['pending'])): ?>
                        <?php foreach ($referred_guards['pending'] as $index => $pending_request): ?>
                            <div class="modal fade" id="modal-approve-<?php echo $index; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color:darkred;">
                                        <font color="white"><p class="modal-title"><i class="fa  fa-exclamation-triangle">Confirmation Message</p></i></font></div>
                                        <div class="modal-body">
                                            Are you sure you want to Approve <b><?php echo $pending_request['employee_fullname']; ?></b>?
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-default" data-dismiss="modal">No</button>
                                            <a href="<?php echo site_url('portal/approve_referal/'.$pending_request['request_id'].'/'.$user_data->id); ?>" class="btn btn-primary" >Yes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modal-reject-<?php echo $index; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="<?php echo site_url('portal/reject_referal/'.$pending_request['request_id'].'/'.$user_data->id); ?>" class="form-horizontal" method="post">
                                            <div class="modal-header"><h3 class="modal-title">Confirmation Message</h3></div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-9">
                                                        <h4 class="alert alert-info">Are you sure you want to Reject <b><?php echo $pending_request['employee_fullname']; ?></b>?</h4>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Remarks</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="remarks" id="" cols="4" rows="4" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-default" data-dismiss="modal">No</button>
                                                <button class="btn btn-primary" type="submit">Yes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modal-details-<?php echo md5($index).md5($pending_request['request_id']); ?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color:#dd4b39;">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <font color="white"><p class="modal-title"><i class="fa fa-user-circle"></i> Security Guard Information</p></font>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                                $record = $this->employee_model->get_with_user_data(array(
                                                    'where' => array('tbl_employees.id' => $pending_request['employee_id'])
                                                ), true);
                                                $security_guard = $record[0];
                                            ?>
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#tab1-<?php echo md5($index); ?>" data-toggle="tab">Personal Information</a></li>
                                                <li><a href="#tab2-<?php echo md5($index); ?>" data-toggle="tab">Educational Background</a></li>
                                                <li><a href="#tab3-<?php echo md5($index); ?>" data-toggle="tab">Government ID Numbers</a></li>
                                                <li><a href="#tab4-<?php echo md5($index); ?>" data-toggle="tab">Personal Records</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active fade in" id="tab1-<?php echo md5($index); ?>">
                                                    <table class="table table-hover">
                                                        <tr>
                                                            <td>First Name:</td>
                                                            <td><b><?php echo $security_guard['first_name']; ?></b></td>
                                                            <td>Gender:</td>
                                                            <td><b><?php echo $security_guard['gender_label']; ?></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Middle Name:</td>
                                                            <td><b><?php echo $security_guard['middle_name']; ?></b></td>
                                                            <td>Address:</td>
                                                            <td><b><?php echo $security_guard['address']; ?></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Last Name:</td>
                                                            <td><b><?php echo $security_guard['last_name']; ?></b></td>
                                                            <td>Civil Status:</td>
                                                            <td><b><?php echo $security_guard['civil_status_name']; ?></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Date of Birth:</td>
                                                            <td><b><?php echo $security_guard['birth_date']; ?></b></td>
                                                            <td>Place of Birth:</td>
                                                            <td><b><?php echo $security_guard['birth_place']; ?></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Citizenship:</td>
                                                            <td><b><?php echo $security_guard['citizenship']; ?></b></td>
                                                            <td>Religion:</td>
                                                            <td><b><?php echo $security_guard['religion']; ?></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Height:</td>
                                                            <td><b><?php echo $security_guard['height']; ?></b></td>
                                                            <td>Weight:</td>
                                                            <td><b><?php echo $security_guard['weight']; ?></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Color of the Eye:</td>
                                                            <td><b><?php echo $security_guard['eyes_color']; ?></b></td>
                                                            <td>Color of the Hair:</td>
                                                            <td><b><?php echo $security_guard['hair_color']; ?></b></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade in" id="tab2-<?php echo md5($index); ?>">
                                                        <table class= 'table table-hover'>
                                                            <tr>
                                                                <th>Educational Attainment</th>
                                                                <th>School Name</th>
                                                                <th>Address</th>
                                                                <th>Year Start</th>
                                                                <th>Year End</th>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        
                                                        </table>
                                                </div>
                                                <div class="tab-pane fade in" id="tab3-<?php echo md5($index); ?>">
                                                    <table class= 'table table-hover'>
                                                        <tr>
                                                            <th class="text-center">Licensed Number</th>
                                                            <th class="text-center">L.N Expiration Date</th>
                                                            <th class="text-center">SSS</th>
                                                            <th class="text-center">TIN</th>
                                                            <th class="text-center">HDMF</th>
                                                            <th class="text-center">PHIC</th>
                                                        </tr>
                                                    
                                                        <tr>
                                                            <td class="text-center"><?php echo $security_guard['license_number']; ?></td>
                                                            <td class="text-center"><?php echo $security_guard['licensed_number_expiration']; ?></b></td>
                                                            <td class="text-center"><?php echo $security_guard['sss']; ?></td>
                                                            <td class="text-center"><?php echo $security_guard['tin']; ?></td>
                                                            <td class="text-center"><?php echo $security_guard['hdmf']; ?></td>
                                                            <td class="text-center"><?php echo $security_guard['phic']; ?></td>
                                                        </tr>
                                                        
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade in" id="tab4-<?php echo md5($index); ?>">
                                                    <table class="table table-hover">
                                                        <tr>
                                                            <td>NBI Expiration Date:</td>
                                                            <td><b></b></td>
                                                            <td>File:</td>
                                                            <td>
                                                                <a class="btn btn-link" data-target="#details-<?php echo md5($index); ?>" data-toggle="modal">
                                                                View File
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Medical Records Expiration Date:</td>
                                                            <td><b></b></td>
                                                            <td>File:</td>
                                                            <td><b></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Police Clearance Expiration Date:</td>
                                                            <td><b></b></td>
                                                            <td>File :</td>
                                                            <td><b></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Barangay Clearance:</td>
                                                            <td><b></b></td>
                                                            <td>File:</td>
                                                            <td><b></b></td>
                                                        </tr>

                                                        <tr>
                                                            <td>Neuro Certificate:</td>
                                                            <td><b></b></td>
                                                            <td>File:</td>
                                                            <td><b></b></td>
                                                        </tr>
                                                        
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">
                                                <span class="fa fa-remove-circle"></span> Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php endif ?>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="approved">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped" id="dt-client-sg-requests">
                                <thead>
                                    <tr>
                                        <th class="text-left">Licensed No.</th>
                                        <th class="text-left">Full Name</th>
                                        <th class="text-center">Date Hired</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ( ! empty($referred_guards['approved'])): ?>
                                    <?php foreach ($referred_guards['approved'] as $index => $approved_request): ?>
                                    <?php $modal_details_id = md5($index).md5($approved_request['request_id']); ?>
                                    <tr>
                                        <td class="text-left">
                                            <a class="btn btn-link" data-target="#modal-details-approved-<?php echo md5($index).md5($approved_request['request_id']); ?>" data-toggle="modal">
                                                <?php echo $approved_request['license_number']; ?>
                                            </a>
                                        </td>
                                        <td class="text-left"><?php echo $approved_request['employee_fullname']; ?></td>
                                        <td class="text-center"><?php echo $approved_request['date_hired']; ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-warning btn-sm" title="Time Record" data-target="#details-<?php echo $modal_details_id; ?>" data-toggle="modal">
											    <span class="fa fa-clock-o" aria-hidden="true"></span>
											</a>
											<a class="btn btn-success btn-sm" title="Daily Activity" data-target="#dta-<?php echo $modal_details_id; ?>" data-toggle="modal">
                                                <span class="fa fa-folder-open" aria-hidden="true"></span>
                                            </a>
											<a class="btn btn-danger btn-sm" title="Incident Report" data-target="#ir-<?php echo $modal_details_id; ?>" data-toggle="modal">
                                                <span class="fa fa-folder" aria-hidden="true"></span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                    <tr>
                                        <td class="text-center" colspan="4">-- No Record Found --</td>
                                    </tr>
                                    <?php endif ?>
                                </tbody>
                            </table>
                            <?php if ( ! empty($referred_guards['approved'])): ?>
                                <?php foreach ($referred_guards['approved'] as $index => $approved_request): ?>
                                    <?php $key = multidimensional_search($approved_schedule, array('id' => $approved_request['request_id'], 'client_id' => $approved_request['client_id'])); ?>
                                    <?php $modal_details_id = md5($index).md5($approved_request['request_id']); ?>
                                    <div id="details-<?php echo $modal_details_id; ?>" class="modal fade">
                                        <div class="modal-dialog">
                                            <form action="<?php echo site_url('portal/update_security_guard_schedule/'.$approved_request['request_id']); ?>" class="form-horizontal" method="post">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background-color:#dd4b39;">
                                                        <font color="white"><p class="modal-title"><i class="fa  fa-clock-o"> Time Record</p></font></i>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-3">Shift Work</label>
                                                            <div class="col-sm-8">
                                                                <?php
                                                                    if (isset($approved_schedule[$key]['shift_schedule'])) {
                                                                        $a = $approved_schedule[$key]['shift_schedule'];
                                                                        $shift_schedules = get_shift_schedule();
                                                                        $current_shift = search($shift_schedules, 'id', $a);
                                                                    }
                                                                    
                                                                ?>
                                                                <select name="shift_schedule" class="form-control" required="true">
                                                                    <?php if (isset($current_shift[0]['id'])): ?>
                                                                    <option value="<?php echo $current_shift[0]['id']; ?>"><?php echo $current_shift[0]['text']; ?></option>
                                                                    <?php else: ?>
                                                                    <option value="">--Select--</option>
                                                                    <?php foreach ($shift_schedules as $shift_schedule): ?>
                                                                        <option value="<?php echo $shift_schedule['id']; ?>"><?php echo $shift_schedule['text']; ?></option>
                                                                    <?php endforeach; ?>

                                                                    <?php endif; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-3">Time In</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control time_start" name="time_start" required="true" value="<?php echo isset($approved_schedule[$key]['time_start']) ? $approved_schedule[$key]['time_start'] : ''; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-3">Time Out</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control time_end" name="time_end" required="true" value="<?php echo isset($approved_schedule[$key]['time_end']) ? $approved_schedule[$key]['time_end'] : ''; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-3">Over Time</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" name="over_time" value="<?php echo isset($approved_schedule[$key]['over_time']) ? $approved_schedule[$key]['over_time'] : ''; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-3">Day Off</label>
                                                            <div class="col-sm-8">
                                                                <?php
                                                                    if (isset($approved_schedule[$key]['day_off'])) {
                                                                        $a = $approved_schedule[$key]['day_off'];
                                                                        $days = get_days();
                                                                        $current_dayoff = search($days, 'id', $a);
                                                                    }
                                                                ?>
                                                                <select  name="day_off" class="form-control" required="true">
                                                                    <?php if (isset($current_dayoff[0]['id'])): ?>
                                                                    <option value="<?php echo $current_dayoff[0]['id']; ?>"><?php echo $current_dayoff[0]['text']; ?></option>
                                                                    <?php else: ?>
                                                                    <option value="">-----</option>
                                                                    <?php foreach ($days as $day): ?>
                                                                        <option value="<?php echo $day['id']; ?>"><?php echo $day['text']; ?></option>
                                                                    <?php endforeach; ?>
                                                                    <?php endif; ?>
                                                                </select>
                                                            </div>
                                                        </div>	
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                                                        <button class="btn btn-success" type="submit">SUBMIT</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div id="dta-<?php echo $modal_details_id; ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="<?php echo site_url('portal/send_daily_time_activity/'); ?>" method="post" class="form-horizontal">
                                                    <div class="modal-header" style="background-color:#dd4b39;">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <font color="white"><p class="modal-title"><i class="fa  fa-folder-open"> Daily Time Activity</p></font></i>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-sm-2">Title</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" name="title" placeholder="Title:" required="true">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-sm-2">Body</label>
                                                            <div class="col-sm-9">
                                                                <textarea class="form-control" name="body" cols="20" rows="5" placeholder="Put some message here..." required="true"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-offset-2 col-sm-9">
                                                                <input type="hidden" name="employee_id" value="<?php echo $approved_request['employee_id']; ?>">
                                                                <input type="hidden" name="client_id" value="<?php echo $approved_request['client_id']; ?>">
                                                                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-paper-plane"></i> SEND</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="ir-<?php echo $modal_details_id; ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="<?php echo site_url('portal/send_incident_report/'); ?>" method="post" class="form-horizontal">
                                                    <div class="modal-header" style="background-color:#dd4b39;">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <font color="white"><p class="modal-title"><i class="fa  fa-folder">Incident Report</p></font></i>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-sm-2">Title</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" name="inicident_title" placeholder="Title:" required="true">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-sm-2">Body</label>
                                                            <div class="col-sm-9">
                                                                <textarea class="form-control" name="inicident_body" cols="20" rows="5" placeholder="Put some message here..." required="true"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-offset-2 col-sm-9">
                                                                <input type="hidden" name="incident_employee_id" value="<?php echo $approved_request['employee_id']; ?>">
                                                                <input type="hidden" name="incident_client_id" value="<?php echo $approved_request['client_id']; ?>">
                                                                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-paper-plane"></i> SEND</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="modal-details-approved-<?php echo md5($index).md5($approved_request['request_id']); ?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color:#dd4b39;">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <font color="white"><p class="modal-title"><i class="fa fa-user-circle"></i> Security Guard Information</p></font>
                                                </div>
                                                <div class="modal-body">
                                                    <?php
                                                        $record = $this->employee_model->get_with_user_data(array(
                                                            'where' => array('tbl_employees.id' => $approved_request['employee_id'])
                                                        ), true);
                                                        $security_guard = $record[0];
                                                    ?>
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#tab1-<?php echo md5($index).md5($approved_request['request_id']); ?>" data-toggle="tab">Personal Information</a></li>
                                                        <li><a href="#tab2-<?php echo md5($index).md5($approved_request['request_id']); ?>" data-toggle="tab">Educational Background</a></li>
                                                        <li><a href="#tab3-<?php echo md5($index).md5($approved_request['request_id']); ?>" data-toggle="tab">Government ID Numbers</a></li>
                                                        <li><a href="#tab4-<?php echo md5($index).md5($approved_request['request_id']); ?>" data-toggle="tab">Personal Records</a></li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active fade in" id="tab1-<?php echo md5($index).md5($approved_request['request_id']); ?>">
                                                            <table class="table table-hover">
                                                                <tr>
                                                                    <td>First Name:</td>
                                                                    <td><b><?php echo $security_guard['first_name']; ?></b></td>
                                                                    <td>Gender:</td>
                                                                    <td><b><?php echo $security_guard['gender_label']; ?></b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Middle Name:</td>
                                                                    <td><b><?php echo $security_guard['middle_name']; ?></b></td>
                                                                    <td>Address:</td>
                                                                    <td><b><?php echo $security_guard['address']; ?></b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Last Name:</td>
                                                                    <td><b><?php echo $security_guard['last_name']; ?></b></td>
                                                                    <td>Civil Status:</td>
                                                                    <td><b><?php echo $security_guard['civil_status_name']; ?></b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Date of Birth:</td>
                                                                    <td><b><?php echo $security_guard['birth_date']; ?></b></td>
                                                                    <td>Place of Birth:</td>
                                                                    <td><b><?php echo $security_guard['birth_place']; ?></b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Citizenship:</td>
                                                                    <td><b><?php echo $security_guard['citizenship']; ?></b></td>
                                                                    <td>Religion:</td>
                                                                    <td><b><?php echo $security_guard['religion']; ?></b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Height:</td>
                                                                    <td><b><?php echo $security_guard['height']; ?></b></td>
                                                                    <td>Weight:</td>
                                                                    <td><b><?php echo $security_guard['weight']; ?></b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Color of the Eye:</td>
                                                                    <td><b><?php echo $security_guard['eyes_color']; ?></b></td>
                                                                    <td>Color of the Hair:</td>
                                                                    <td><b><?php echo $security_guard['hair_color']; ?></b></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div class="tab-pane fade in" id="tab2-<?php echo md5($index).md5($approved_request['request_id']); ?>">
                                                                <table class= "table table-hover">
                                                                    <tr>
                                                                        <th>Educational Attainment</th>
                                                                        <th>School Name</th>
                                                                        <th>Address</th>
                                                                        <th>Year Start</th>
                                                                        <th>Year End</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td><?php echo $security_guard['school_name']; ?></td>
                                                                        <td><?php echo $security_guard['school_address']; ?></td>
                                                                        <td><?php echo $security_guard['year_start']; ?></td>
                                                                        <td><?php echo $security_guard['year_end']; ?></td>
                                                                    </tr>
                                                                
                                                                </table>
                                                        </div>
                                                        <div class="tab-pane fade in" id="tab3-<?php echo md5($index).md5($approved_request['request_id']); ?>">
                                                            <table class= "table table-hover">
                                                                <tr>
                                                                    <th class="text-center">Licensed Number</th>
                                                                    <th class="text-center">L.N Expiration Date</th>
                                                                    <th class="text-center">SSS</th>
                                                                    <th class="text-center">TIN</th>
                                                                    <th class="text-center">HDMF</th>
                                                                    <th class="text-center">PHIC</th>
                                                                </tr>
                                                            
                                                                <tr>
                                                                    <td class="text-center"><?php echo $security_guard['license_number']; ?></td>
                                                                    <td class="text-center"><?php echo $security_guard['licensed_number_expiration']; ?></b></td>
                                                                    <td class="text-center"><?php echo $security_guard['sss']; ?></td>
                                                                    <td class="text-center"><?php echo $security_guard['tin']; ?></td>
                                                                    <td class="text-center"><?php echo $security_guard['hdmf']; ?></td>
                                                                    <td class="text-center"><?php echo $security_guard['phic']; ?></td>
                                                                </tr>
                                                                
                                                            </table>
                                                        </div>
                                                        <div class="tab-pane fade in" id="tab4-<?php echo md5($index).md5($approved_request['request_id']); ?>">
                                                            <table class="table table-hover">
                                                                <tr>
                                                                    <td>NBI Expiration Date:</td>
                                                                    <td><b></b></td>
                                                                    <td>File:</td>
                                                                    <td>
                                                                        <a class="btn btn-link" data-target="#details-<?php echo md5($index); ?>" data-toggle="modal">
                                                                        View File
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Medical Records Expiration Date:</td>
                                                                    <td><b></b></td>
                                                                    <td>File:</td>
                                                                    <td><b></b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Police Clearance Expiration Date:</td>
                                                                    <td><b></b></td>
                                                                    <td>File :</td>
                                                                    <td><b></b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Barangay Clearance:</td>
                                                                    <td><b></b></td>
                                                                    <td>File:</td>
                                                                    <td><b></b></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Neuro Certificate:</td>
                                                                    <td><b></b></td>
                                                                    <td>File:</td>
                                                                    <td><b></b></td>
                                                                </tr>
                                                                
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                                                        <span class="fa fa-remove-circle"></span> Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif ?>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="rejected">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped" id="dt-client-sg-requests">
                                <thead>
                                    <tr>
                                        <th class="text-left">Licensed No.</th>
                                        <th class="text-left">Full Name</th>
                                        <th class="text-center">Date Hired</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ( ! empty($referred_guards['rejected'])): ?>
                                    <?php foreach ($referred_guards['rejected'] as $index => $rejected_request): ?>
                                    <tr>
                                        <td class="text-left"><?php echo $rejected_request['license_number']; ?></td>
                                        <td class="text-left"><?php echo $rejected_request['employee_fullname']; ?></td>
                                        <td class="text-center"><?php echo $rejected_request['date_hired']; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                    <tr>
                                        <td class="text-center" colspan="4">-- No Record Found --</td>
                                    </tr>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
