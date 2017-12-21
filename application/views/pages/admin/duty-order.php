<div class="row">
	<div class="col-md-4">
		<div class="box box-success">
				<div class="box-body">
					<a href="" class="uploadLink">
						<img src="<?php echo site_url('assets/img/profile_pics/EMPLOYEE-0001.jpg');?>" alt="User Profile Picture" class="profile-user-img img-responsive img-circle" >
					</a>
					<h4 class="text-center"><?php echo isset($selected_inspector['employee_fullname']) ? $selected_inspector['employee_fullname'] : 'NO SELECTED DATA';?></h4>
						<ul class="list-group">
							<li class="list-group-item">
								<strong style="color: green;"><i class="fa fa-user-circle-o"></i>	Member Since| </strong> <?php echo isset($selected_inspector['date_hired']) ? $selected_inspector['date_hired'] : '--';?>
							</li>
							<li class="list-group-item">
								<strong style="color: green;"><i class="fa fa-id-badge"></i>	Licensed Number| </strong> <?php echo isset($selected_inspector['license_number']) ? $selected_inspector['license_number'] : '--' ;?>
							</li>
							<li class="list-group-item">
								<strong style="color: green;"><i class="fa fa-gear"></i> Status| </strong> <?php echo isset($selected_inspector['civil_status_name']) ? $selected_inspector['civil_status_name'] : '--';?>
							</li>
							<li class="list-group-item">
								<strong style="color: green;"><i class="fa fa-map-marker"></i> Address|</strong> <?php echo isset($selected_inspector['address']) ?  $selected_inspector['address'] : '--';?>
							</li>
							<li class="list-group-item">
								<strong style="color: green;"><i class="fa fa-phone"></i> Contact Number|</strong>
							</li>
							<li class="list-group-item">
								<strong style="color: green;"><i class="fa fa-envelope"></i> Email|</strong> <?php echo isset($selected_inspector['email']) ? $selected_inspector['email'] : '--';?>
							</li>
						</ul>	
				</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="box box-danger">
			<div class="box-header with-border">
				<h4 class="box-title">File Duty Order</h4>
            </div>
			<div class="box-body">
				<form class="form-horizontal"id="myForm" action="<?php echo site_url('admin/duty_order/selected_inspector/');?>" method="post">
						<div class="form-group">
							<label class="col-md-3 control-label" for="">Inspectors</label>
								<div class="col-md-6">
										<select name="employee_id" class="form-control" onchange="this.form.submit()">
											<option value="">--Select Inspector--</option>
											<?php foreach ($list_inspectors as $list_inspector): ?>
											<option value="<?php echo $list_inspector['employee_id']; ?>" <?php echo ($employee_id == $list_inspector['employee_id']) ? 'selected':''; ?>><?php echo $list_inspector['id'] . '-' . $list_inspector['employee_fullname']; ?></option>
											<?php endforeach; ?>
										</select>
								</div>	
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="">City</label>
								<div class="col-md-6">
										<select name="" class="form-control">
											<option value="">--Select City--</option>
											<option value=""></option>


										</select>
								</div>	
						</div>	
				</form>
				</br>
				<!-- <?php  dump($list_inspector); ?> -->
				<label class="col-md-3 control-label" for="">List of Designated Area</label>
				</br>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th class="text-center">Client Name</th>
							<th class="text-center">Designated Area</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-center">example</td>
							<td class="text-center">example</td>
							<td class="text-center">
								<a href="" class="btn btn-link"><span class="fa fa-eye"></span>
								Guard's List</a>
							</td>

						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
    $('#datatable-ddo').DataTable();
</script>