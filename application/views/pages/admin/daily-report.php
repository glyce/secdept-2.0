
<div class="row">
	<div class="col-lg-12">
		<div class="box box-danger">
			
			<div class="box-header">
				<h4 class="box-title">List of Daily Report</h4>
			</div>
			<div class="box-body">
				<div class="table-responsive">
					<table class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th class="text-center">Action</th>
								<th class="text-center">Reference #</th>
								<th class="text-center">Title</th>
								<th class="text-left">Body</th>
								<th class="text-center">Employee Name</th>
								<th class="text-center">Status</th>
								<th class="text-center">Date Created</th>
								<?php if ($default_group['tbl_group_id'] == 3): ?>
								<th class="text-center">Security Guard Report's List</th>
								
								
								<?php endif; ?>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($daily_activities as $daily_activity): ?>
							<tr>
								<td class="text-center">
									<div class="btn btn-group">
										<a href="<?php echo site_url('admin/daily_report/approved/'.$daily_activity['id']); ?>" title='Approve' class="<?php echo 'label label-success'; ?>"><i class="fa fa-check"></i></a>
										<a href="<?php echo site_url('admin/daily_report/declined/'.$daily_activity['id']); ?>" title='Decline' class="<?php echo 'label label-danger'; ?>"><i class="fa fa-times"></i></a>
									</div>
								</td>
								<td class="text-center"><?php echo $daily_activity['id']; ?></td>
								<td class="text-center"><?php echo $daily_activity['title']; ?></td>
								<td class="text-left"><?php echo $daily_activity['body']; ?></td>
								<td class="text-center"><?php echo $daily_activity['last_name'].', '.$daily_activity['first_name']; ?></td>
								<td class="text-center"><?php echo $daily_activity['status_label']; ?></td>
								<td class="text-center"><?php echo $daily_activity['created']; ?></td>
								<?php if ($default_group['tbl_group_id'] == 3): ?>
								<td class="text-center">
									<div class="btn btn-group">
										<a href="<?php echo site_url('admin/daily_report/add_report');?>"
										class="btn btn-info btn-sm"><span class="fa fa-eye"></span> View</a>
									</div>
								</td>
								<?php endif; ?>
							</tr>
							<?php endforeach; ?>
						
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
