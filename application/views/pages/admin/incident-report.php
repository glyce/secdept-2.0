
<div class="row">
	
	<div class="col-lg-12">
		<div class="box box-danger">
			<div class="box-header">
				<h4 class="box-title">List of Incident Report</h4>
			</div>
			<div class="box-body">
				<div class="table-responsive">
					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<th class="text-center">Reference #</th>
								<th class="text-center">Title</th>
								<th class="text-left">Body</th>
								<th class="text-center">Status</th>
								<th class="text-center">Date Created</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							
							<?php foreach ($incident_reports as $incident_report): ?>
							<tr>
								<td class="text-center"><?php echo $incident_report['id']; ?></td>
								<td class="text-center"><?php echo $incident_report['title']; ?></td>
								<td class="text-left"><?php echo $incident_report['body']; ?></td>
								<td class="text-center"><?php echo $incident_report['status_label']; ?></td>
								<td class="text-center"><?php echo $incident_report['created']; ?></td>
								
								<td class="text-center">
									<div class="btn btn-group">
										<a href="<?php echo site_url('admin/incident_report/approved/'.$incident_report['id']); ?>" class="<?php echo 'label label-success'; ?>"><i class="fa fa-check"></i> Approve</a>
										<a href="<?php echo site_url('admin/incident_report/declined/'.$incident_report['id']); ?>" class="<?php echo 'label label-danger'; ?>"><i class="fa fa-times"></i> Decline</a>
									</div>
								</td>
							</tr>
							<?php endforeach; ?>
						
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>