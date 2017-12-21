
<div class="row">
	<div class="col-md-3">
		<?php include 'partial_appointment_sidewidget.php'; ?>
	</div>

	<div class="col-md-9">
		<div class="box box-danger">
			<div class="box-header with-border">
				<h3 class="box-title"></h3>
				<div class="box-tools pull-right">
					<div class="has-feedback">
						<input type="text" class="form-control input-sm" placeholder="Search Appointment">
						<span class="glyphicon glyphicon-search form-control-feedback"></span>
					</div>
				</div>
			</div>
			<div class="box-body no-padding">
				<div class="mailbox-controls">
					<button type="button" class="btn btn-default btn-sm checkbox-toggle">
						<i class="fa fa-square-o"></i>
					</button>
					<div class="btn-group">
						<button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
						<button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
						<button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
					</div>
					<button type="button" class="btn btn-default btn-sm">
						<i class="fa fa-refresh"></i>
					</button>
					<div class="pull-right">
						1-50/200
						<div class="btn-group">
							<button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
							<button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
						</div>
					</div>
				</div>
				<div class="table-responsive mailbox-messages">
					<table class="table table-hover table-striped">
						
						<tbody>
							<tr>
								<td><input type="checkbox"></td>
								<td class="mailbox-name">
									<a href="read_appointment"></a>
								</td>
								<td class="mailbox-subject">
									<b></b>
								</td>
								<td class="mailbox-attachment"></td>
								<td class="mailbox-date">5 mins ago</td>
							</tr>
						</tbody>
						
						
					</table>
				</div>
			</div>
		</div>
	</div>
</div>