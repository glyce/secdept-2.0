<div class="row">	
	<div class="col-lg-12">
			<div class="box box-danger">
				<div class="box-header">
					<input type="hidden" name="mode" value="view">										
					<h6 class="box-title">Details</h6>
					<div class="box-tools pull-right">
						<button type="button"  class="btn btn-warning btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-warning btn-sm" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				</hr>
				<div class="box-body">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab1" data-toggle="tab">Daily Time Record</a></li>
						<li><a href="#tab2" data-toggle="tab">Daily Activity</a></li>
						<li><a href="#tab3" data-toggle="tab">Incident Report</a></li>
						
					</ul>
					<div class="tab-content">
						<div class="tab-pane active fade in" id="tab1">
							<table class="table table-hover">
								<tr>
									<th class="text-center">...</th>
									<th class="text-center">Licensed Number</th>
									<th class="text-center">Full Name</th>
									<th class="text-center">Date Created</th>
									<th class="text-center">Inspector</th>
									<th class="text-center">Action</th>
								</tr>
								<tr>
									<td class="text-center">1</td>
									<td class="text-center">2</td>
									<td class="text-center">4</td>
									<td class="text-center">5</td>
									<td class="text-center">6</td>
									<td class="text-center"><a href="" class="btn btn-info">View DTR</a></td>
								</tr>
								
							</table>
						</div>

						<div class="tab-pane fade in" id="tab2">
						<table class="table table-hover">
								<tr>
									<th class="text-center">...</th>
									<th class="text-center">Licensed Number</th>
									<th class="text-center">Full Name</th>
									<th class="text-center">Date Created</th>
									<th class="text-center">Inspector</th>
									<th class="text-center">Action</th>
								</tr>
								<tr>
									<td class="text-center">1</td>
									<td class="text-center">2</td>
									<td class="text-center">4</td>
									<td class="text-center">5</td>
									<td class="text-center">6</td>
									<td class="text-center"><a href="" class="btn btn-warning">View D.A</a></td>
								</tr>
								
							</table>
						</div>

						<div class="tab-pane fade in" id="tab3">
						<table class="table table-hover">
								<tr>
									<th class="text-center">...</th>
									<th class="text-center">Licensed Number</th>
									<th class="text-center">Full Name</th>
									<th class="text-center">Date Created</th>
									<th class="text-center">Inspector</th>
									<th class="text-center">Action</th>
								</tr>
								<tr>
									<td class="text-center">1</td>
									<td class="text-center">2</td>
									<td class="text-center">4</td>
									<td class="text-center">5</td>
									<td class="text-center">6</td>
									<td class="text-center"><a href="" class="btn btn-danger">View I.R</a></td>
								</tr>
								
							</table>
						</div>
						
                    </div>

					</div>
				</div>
			</div>
		</div>

</div>
<script>
    $('#datatable-tab1').DataTable();
</script>
