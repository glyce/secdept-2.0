<div class="row">
    <div class="col-sm-12">
        <div class="box box-danger">
            <div class="box-header with-border">
                <div class="box-title">List of Client</div>
            </div>
            <div class="box-body">
                <table class="table table-striped table-hover" id="datatable-clients">
                    <thead>
                        <tr>
                            <th class="text-center">DTI Form</th>
                            <th class="text-center">Company Name</th>
                            <th class="text-center">Company Address</th>
							<th class="text-center">Company Contact</th>
							<th class="text-center">Company Contact Person</th>
							<th class="text-center">Email</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clients as $client): ?>
                        <tr>
                            <td class="text-center"><a href="<?php echo site_url($client['dti_form_filepath']); ?>" class="btn btn-link">View DTI</a></td>
                            <td class="text-center"><?php echo $client['company_name']; ?></td>
                            <td class="text-center"><?php echo $client['address']; ?></td>
                            <td class="text-center"><?php echo $client['phone']; ?></td>
                            <td class="text-center"><?php echo $client['fullname']; ?></td>
                            <td class="text-center"><?php echo $client['email']; ?></td>
							<td class="text-center">
                                <a href="<?php echo $client['active'] == 1 ? site_url('admin/clients/deactivate/'.$client['user_id']) : site_url('admin/clients/approve/'.$client['user_id']); ?>"><?php echo $client['active'] == 1 ? '<span class="label label-danger">Deactivate</span>' : '<span class="label label-success">Activate</span>'; ?></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                        <?php if (empty($clients)): ?>
                        <tr>
                            <td colspan="5" class="text-center">-- NO RECORD FOUND --</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
				
				<div id="details" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color:#dd4b39;">
                                <font color="white"><p class="modal-title"><i class="fa  fa-user-circle"> Client's Information</p></font></i>
                            </div>
                            <div class="modal-body">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab" data-toggle="tab">Contact Person's Information</a></li>
                                    <li><a href="#tab2" data-toggle="tab">Account's Information</a></li>    
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active fade in" id="tab">
                                        <table class="table table-hover">
                                            <tr>
                                                <td>First Name:</td>
                                                <td><b></b></td>
                                            </tr>
                                            <tr>
                                                <td>Middle Name:</td>
                                                <td><b></b></td>
                                            </tr>
                                            <tr>
                                                <td>Last Name:</td>
                                                <td><b></b></td>
                                            </tr>
                                            <tr>
                                                <td>Contact #:</td>
                                                <td><b></b></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="tab-pane active fade in" id="tab2">
                                        <table class="table table-hover">
                                            <tr>
                                                <td>Email:</td>
                                                <td><b></b></td>
                                            </tr>
                                            <tr>
                                                <td>Username:</td>
                                                <td><b></b></td>
                                            </tr>
                                            
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-warning" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#datatable-clients').DataTable();
</script>