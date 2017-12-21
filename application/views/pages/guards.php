	<div class="col-md-9">
		<div class="row">
            <div class="col-md-8">
                <h4>ABOUT CLIENT</h4>
                <p>hhhh</p>
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
                                        <th class="text-left">Licensed No.</th>
                                        <th class="text-left">Full Name</th>
                                        <th class="text-left">Client Name</th>
                                        <th class="text-center">Date Hired</th>
                                        <th class="text-center">Request Status</th>
                                        <th class="text-center" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ( ! empty($referred_guards['pending'])): ?>
                                    <?php foreach ($referred_guards['pending'] as $index => $pending_request): ?>
                                    <tr>
                                        <td class="text-left">
                                            <a class="btn btn-link" data-target="#details-<?php echo md5($index); ?>" data-toggle="modal">
                                            <?php echo $pending_request['license_number']; ?>
                                            </a>
                                        </td>	
                                        <td class="text-left"><?php echo $pending_request['employee_fullname']; ?></td>
                                        <td class="text-left"><?php echo $pending_request['client_fullname']; ?></td>
                                        <td class="text-center"><?php echo $pending_request['date_hired']; ?></td>
                                        <td class="text-center"><?php echo $pending_request['request_status_label'] ?></td>
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
                                                <div class="modal-header"><h3 class="modal-title">Confirmation Message</h3></div>
                                                <div class="modal-body">
                                                    Are you sure you want to Reject <b><?php echo $pending_request['employee_fullname']; ?></b>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-default" data-dismiss="modal">No</button>
                                                    <a href="<?php echo site_url('portal/reject_referal/'.$pending_request['request_id'].'/'.$user_data->id); ?>" class="btn btn-primary" >Yes</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                    <div role="tabpanel" class="tab-pane" id="approved">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped" id="dt-client-sg-requests">
                                <thead>
                                    <tr>
                                        <th class="text-left">Licensed No.</th>
                                        <th class="text-left">Full Name</th>
                                        <th class="text-left">Client Name</th>
                                        <th class="text-center">Date Hired</th>
                                        <th class="text-center">Request Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ( ! empty($referred_guards['approved'])): ?>
                                    <?php foreach ($referred_guards['approved'] as $index => $approved_request): ?>
                                    <tr>
                                        <td class="text-left"><?php echo $approved_request['license_number']; ?></td>
                                        <td class="text-left"><?php echo $approved_request['employee_fullname']; ?></td>
                                        <td class="text-left"><?php echo $approved_request['client_fullname']; ?></td>
                                        <td class="text-center"><?php echo $approved_request['date_hired']; ?></td>
                                        <td class="text-center"><?php echo $approved_request['request_status_label'] ?></td>
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
                    <div role="tabpanel" class="tab-pane" id="rejected">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped" id="dt-client-sg-requests">
                                <thead>
                                    <tr>
                                        <th class="text-left">Licensed No.</th>
                                        <th class="text-left">Full Name</th>
                                        <th class="text-left">Client Name</th>
                                        <th class="text-center">Date Hired</th>
                                        <th class="text-center">Request Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ( ! empty($referred_guards['rejected'])): ?>
                                    <?php foreach ($referred_guards['rejected'] as $index => $rejected_request): ?>
                                    <tr>
                                        <td class="text-left"><?php echo $rejected_request['license_number']; ?></td>
                                        <td class="text-left"><?php echo $rejected_request['employee_fullname']; ?></td>
                                        <td class="text-left"><?php echo $rejected_request['client_fullname']; ?></td>
                                        <td class="text-center"><?php echo $rejected_request['date_hired']; ?></td>
                                        <td class="text-center"><?php echo $rejected_request['request_status_label'] ?></td>
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
	</div