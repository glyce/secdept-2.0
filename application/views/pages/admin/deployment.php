<div class="row">
	<div class="col-md-12">
		<div class="box box-danger">
			<div class="box-header with-border">
				<h4 class="box-title">Available</h4>
			</div>
			<div class="box-body">
				<form id="myForm" action="<?php echo site_url('admin/deployment/submit_selected_guards'); ?>" method="post">
					<div class="form-inline">
						<div class="form-group">
							<label class="control-label">Client: </label>
							<select id="client_id" name="client_id" class="form-control" required="true">
								<option value="">-- Select Client --</option>
								<?php foreach ($clients as $index => $client): ?>
								<option value="<?php echo $client['id']; ?>"><?php echo $client['fullname']; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<button class="btn btn-success pull-right" type="submit"><i class="fa fa-send"></i> SUBMIT SELECTED GUARD/S</button>
					</div>
					<hr>
					<div class="table-responsive">
						<table class="table table-hover table-striped" id="dt-client-sg-available-1">
							<thead>
								<tr>
									<th class="text-center"><input type="checkbox" id="checkAll"></th>
									<th class="text-center">#</th>
									<th class="text-left">Licensed No.</th>
									<th class="text-left">Full Name</th>
									<th class="text-left">Date Hired</th>
								</tr>
							</thead>
							<tbody>
								<?php if (!empty($available_security_guards)): ?>
								<?php foreach ($available_security_guards as $index => $security_guard): ?>
								<tr>
									<td class="text-center"><input type="checkbox" id="checkItem" name="employee_ids[]" value="<?php echo $security_guard['id']; ?>"></td>
									<td class="text-center"><?php echo $security_guard['id']; ?></td>
									<td class="text-left">
										<a class="btn btn-link" data-target="#details-<?php echo md5($index); ?>" data-toggle="modal">
											<?php echo $security_guard['license_number']; ?>
										</a>
									</td>
									<td class="text-left"><?php echo $security_guard['employee_fullname']; ?></td>
									<td class="text-left"><?php echo $security_guard['date_hired']; ?></td>
								</tr>
								<?php endforeach ?>
								<?php endif ?>
								<?php if (empty($available_security_guards)): ?>
								<tr>
									<td class="text-center" colspan="5">-- No Record Found --</td>
								</tr>
								<?php endif ?>
							</tbody>
						</table>
					</div>
				</form>
								
				<div id="details-<?php echo md5($index); ?>" class="modal fade" role="dialog">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header" style="background-color:#dd4b39;">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<font color="white"><h4 class="modal-title"><i class="fa fa-user"></i> Security Guard Information</h4></font>
							</div>
							<div class="modal-body">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab1-" data-toggle="tab">Personal Information</a></li>
									<li><a href="#tab2-" data-toggle="tab">Educational Background</a></li>
									<li><a href="#tab3-" data-toggle="tab">Government ID Numbers</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active fade in" id="tab1-">
										<table class="table table-hover">
											<tr>
												<td>First Name:</td>
												<td><b><?php echo $security_guard['first_name']; ?></td></b></td>
												<td>Gender:</td>
												<td><b><?php echo $security_guard['first_name']; ?></b></td>
											</tr>
											<tr>
												<td>Middle Name:</td>
												<td><b><?php echo $security_guard['middle_name']; ?></b></td>
												<td>Address:</td>
												<td><b></b></td>
											</tr>
											<tr>
												<td>Last Name:</td>
												<td><b><?php echo $security_guard['last_name']; ?></b></td>
												<td>Civil Status:</td>
												<td><b></b></td>
											</tr>
											<tr>
												<td>Date of Birth:</td>
												<td><b></b></td>
												<td>Place of Birth:</td>
												<td><b></b></td>
											</tr>
											<tr>
												<td>Citizenship:</td>
												<td><b></b></td>
												<td>Religion:</td>
												<td><b></b></td>
											</tr>
											<tr>
												<td>Height:</td>
												<td><b></b></td>
												<td>Weight:</td>
												<td><b></b></td>
											</tr>
											<tr>
												<td>Color of the Eye:</td>
												<td><b></b></td>
												<td>Color of the Hair:</td>
												<td><b></b></td>
											</tr>
										</table>
									</div>
									<div class="tab-pane fade in" id="tab2-">
									
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
									<div class="tab-pane fade in" id="tab3-"><table class= 'table table-hover'>
										<tr>
											<th>Licensed Number</th>
											<th>L.N Expiration Date</th>
											<th>SSS</th>
											<th>TIN</th>
											<th>HDMF</th>
											<th>PHIC</th>
										</tr>
										
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
										
									</table></div>
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
				
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="box box-danger">
			<div class="box-header"><h4 class="box-title">Requests</h4></div>
			<div class="box-body">
				
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#pending" aria-controls="pending" role="tab" data-toggle="tab">Pending</a></li>
					<li role="presentation"><a href="#approved" aria-controls="approved" role="tab" data-toggle="tab">Approved</a></li>
					<li role="presentation"><a href="#rejected" aria-controls="rejected" role="tab" data-toggle="tab">Rejected</a></li>
				</ul>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="pending">
						<div class="table-responsive">
							
							<table class="table table-hover table-striped" id="dt-pending">
								<thead>
									<tr>
										<th class="text-left">Licensed No.</th>
										<th class="text-left">Full Name</th>
										<th class="text-left">Client Name</th>
										<th class="text-center">Date Hired</th>
										<th class="text-center">Request Status</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									
									<?php if ( ! empty($referred_security_guards['pending'])): ?>
									<?php foreach ($referred_security_guards['pending'] as $index => $pending_request): ?>
									<tr>
										<td class="text-left"><?php echo $pending_request['request_id']; ?> -- <?php echo $pending_request['license_number']; ?></td>
										<td class="text-left"><?php echo $pending_request['employee_fullname']; ?></td>
										<td class="text-left"><?php echo $pending_request['client_fullname']; ?></td>
										<td class="text-center"><?php echo $pending_request['date_hired']; ?></td>
										<td class="text-center"><?php echo $pending_request['request_status_label'] ?></td>
										<td class="text-center">
											<a class="btn btn-danger btn-sm" href="<?php echo site_url('admin/deployment/cancel_request/' . $pending_request['request_id']); ?>" onclick="return confirm('Are you sure you want to cancel this request?');">
                                        		<span class="fa fa-times"> CANCEL</span>
											</a>
										</td>
									</tr>
									<?php endforeach; ?>
									<?php else: ?>
									<tr>
										<td class="text-center" colspan="5">-- No Record Found --</td>
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

<script>
	$('#dt-client-sg-available-1').DataTable();
	$('#dt-pending').DataTable();
	$('#dt-approved').DataTable();
	$('#dt-rejected').DataTable();
	$('#dt-cancelled').DataTable();
</script>