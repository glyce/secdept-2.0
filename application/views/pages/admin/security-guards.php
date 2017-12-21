<div class="row">
    <div class="col-sm-12">
        <div class="box box-danger">
            <div class="box-header with-border">
                <div class="box-title">List of Security Guards</div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="datatable-security-gurads">
                        <thead>
                            <tr>
                                <th class="text-center">....</th>
                                <th class="text-center">Licensed No.</th>
                                <th class="text-center">Full Name</th>
                                <th class="text-center">Hired Date</th>
                                <th class="text-center">Information</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($security_guards as $index => $security_guard): ?>
                            <tr>
                                <td class="text-center"><img src="<?php echo site_url($security_guard['profile_picture']); ?>" class="img-circle" width="30" height="30"></td>
                                <td><?php echo $security_guard['license_number']; ?></td>
                                <td><?php echo $security_guard['employee_fullname']; ?></td>
                                <td><?php echo $security_guard['date_hired']; ?></td>
                                <td class="text-center">
                                    <a class="btn btn-success btn-sm" title="View More" data-target="#details-<?php echo md5($index); ?>" data-toggle="modal">
                                        <span class="fa fa-search" aria-hidden="true"></span> View More Details
                                    </a>
                                </td>     
                                <td class="text-center">    
                                    <a class="btn btn-primary btn-sm" title="Edit Details" data-target="#edit-<?php echo md5($index); ?>" data-toggle="modal">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                    <a class="btn btn-danger btn-sm" title="Delete Information" data-target="#delete-<?php echo md5($index); ?>" data-toggle="modal">
                                        <span class="fa fa-trash"></span>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>            
                    </table>
                    <?php foreach ($security_guards as $index => $security_guard): ?>
                        <div class="modal fade" id="details-<?php echo md5 ($index); ?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color:#dd4b39;">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <font color="white"><p class="modal-title"><i class="fa fa-user-circle"></i> Security Guard Information</p></font>
                                    </div>
                                    <div class="modal-body">
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
						 <div id="edit-<?php echo md5($index); ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color:#dd4b39;">
                                        <font color="white"><p class="modal-title"><i class="fa  fa-user"> Edit Security Guard's Information</p></font></i>
                                        </div>
                                            <div class="modal-body">
                                            <ul class="nav nav-tabs">
                                            <li class="active"><a href="#taba-<?php echo md5($index); ?>" data-toggle="tab">Personal Information</a></li>
                                            <li><a href="#tabb-<?php echo md5($index); ?>" data-toggle="tab">Educational Background</a></li>
                                            <li><a href="#tabc-<?php echo md5($index); ?>" data-toggle="tab">Government ID Numbers</a></li>
                                            <li><a href="#tabd-<?php echo md5($index); ?>" data-toggle="tab">Personal Records</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active fade in" id="taba-<?php echo md5($index); ?>">
                                                <table class="table table-hover">
                                                    <tr>
                                                        <td>First Name:</td>
                                                        <td><input type="text" class="form-control" value=" <?php echo $security_guard['first_name']; ?>"></td>
                                                        <td>Gender:</td>
                                                        <td><input type="text" class="form-control" value="<?php echo $security_guard['gender_label']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Middle Name:</td>
                                                        <td><input type="text" class="form-control" value="<?php echo $security_guard['middle_name']; ?>"></td>
                                                        <td>Address:</td>
                                                        <td><input type="text" class="form-control" value="<?php echo $security_guard['address']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Last Name:</td>
                                                        <td><input type="text" class="form-control" value="<?php echo $security_guard['last_name']; ?>"></td>
                                                        <td>Civil Status:</td>
                                                        <td><input type="text" class="form-control" value="<?php echo $security_guard['civil_status_name']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date of Birth:</td>
                                                        <td><input type="text" class="form-control" value="<?php echo $security_guard['birth_date']; ?>"></td>
                                                        <td>Place of Birth:</td>
                                                        <td><input type="text" class="form-control" value="<?php echo $security_guard['birth_place']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Citizenship:</td>
                                                        <td><input type="text" class="form-control" value="<?php echo $security_guard['citizenship']; ?>"></td>
                                                        <td>Religion:</td>
                                                        <td><input type="text" class="form-control" value="<?php echo $security_guard['religion']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Height:</td>
                                                        <td><input type="text" class="form-control" value="<?php echo $security_guard['height']; ?>"></td>
                                                        <td>Weight:</td>
                                                        <td><input type="text" class="form-control" value="<?php echo $security_guard['weight']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Color of the Eye:</td>
                                                        <td><input type="text" class="form-control" value="<?php echo $security_guard['eyes_color']; ?>"></td>
                                                        <td>Color of the Hair:</td>
                                                        <td><input type="text" class="form-control" value="<?php echo $security_guard['hair_color']; ?>"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade in" id="tabb-<?php echo md5($index); ?>">
                                                    <table class= 'table table-hover'>
                                                        <tr>
                                                            <th>Educational Attainment</th>
                                                            <th>School Name</th>
                                                            <th>Address</th>
                                                            <th>Year Start</th>
                                                            <th>Year End</th>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" class="form-control" value=""></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                     
                                                    </table>
                                            </div>
                                            <div class="tab-pane fade in" id="tabc-<?php echo md5($index); ?>">
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
                                                        <td class="text-center"><input type="text" class="form-control" value="<?php echo $security_guard['license_number']; ?>"></td>
                                                        <td class="text-center"><input type="text" class="form-control" value="<?php echo $security_guard['licensed_number_expiration']; ?>"></td>
                                                        <td class="text-center"><input type="text" class="form-control" value="<?php echo $security_guard['sss']; ?>"></td>
                                                        <td class="text-center"><input type="text" class="form-control" value="<?php echo $security_guard['tin']; ?>"></td>
                                                        <td class="text-center"><input type="text" class="form-control" value="<?php echo $security_guard['hdmf']; ?>"></td>
                                                        <td class="text-center"><input type="text" class="form-control" value="<?php echo $security_guard['phic']; ?>"></td>
                                                    </tr>
                                                    
                                                 </table>
                                            </div>
                                             <div class="tab-pane fade in" id="tabd-<?php echo md5($index); ?>">
                                                <table class="table table-hover">
                                                    <tr>
                                                        <td>NBI Expiration Date:</td>
                                                        <td><input type="text" class="form-control" value=""></td>
                                                        <td>File:</td>
                                                        <td>
                                                            <a class="btn btn-link" data-target="#details-<?php echo md5($index); ?>" data-toggle="modal">
                                                             View File
                                                             </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Medical Records Expiration Date:</td>
                                                        <td><input type="text" class="form-control" value=""></td>
                                                        <td>File:</td>
                                                        <td><b></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Police Clearance Expiration Date:</td>
                                                        <td><input type="text" class="form-control" value=""></td>
                                                        <td>File :</td>
                                                        <td><b></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Barangay Clearance:</td>
                                                        <td><input type="text" class="form-control" value=""></td>
                                                        <td>File:</td>
                                                        <td><b></b></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Neuro Certificate:</td>
                                                        <td><input type="text" class="form-control" value=""></td>
                                                        <td>File:</td>
                                                        <td><b></b></td>
                                                    </tr>
                                                    
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                            <div class="modal-footer">
                                            <button class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                                            <button class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                </div>
                        </div>
                        <div id="delete-<?php echo md5($index); ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color:#dd4b39;">
                                        <font color="white"><p class="modal-title"><i class="fa  fa-exclamation-circle"> Confirmation Message</p></font></i>
                                        </div>
                                            <div class="modal-body">
                                            Are you sure you want to Delete <b><?php echo $security_guard['employee_fullname']; ?>'s Information</b>?
                                            </div>
                                            <div class="modal-footer">
                                            <button class="btn btn-danger" data-dismiss="modal">No</button>
                                            <button class="btn btn-success" data-dismiss="modal">Yes</button>
                                            </div>
                                        </div>
                                </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#datatable-security-gurads').DataTable();
</script>