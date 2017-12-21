<div class="row">
	<div class="col-md-3">
		<div class="box box-danger">
      <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="<?php echo site_url('assets/img/app/20170901-OBISPO-GLYCE.jpg'); ?>" alt="User profile picture">
          <h3 class="profile-username text-center"></h3>
          <p class="text-muted text-center"></p>
          <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                  <b>Hired Date</b> <a class="pull-right"></a>
              </li>
              <li class="list-group-item">
                  <b>Licensed Number</b> <a class="pull-right">543</a>
              </li>
              <li class="list-group-item">
                  <b>Position</b> <a class="pull-right">Admin</a>
              </li>
          </ul>
      </div>
      <!-- /.box-body -->
    </div>
	</div>
	
	     <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#personal" data-toggle="tab">Personal Info</a></li>
              <li ><a href="#timeline" data-toggle="tab">Educational Background</a></li>
              <li><a href="#settings" data-toggle="tab">Government ID</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="personal">
				 <div class="box-body">
					 <div class="form-group">
						<label class="control-label">Upload Profile Picture:</label>
						<input type="file" name="file_to_upload" id="file_to_upload" class="form-control">
					</div>

						<div class="form-group">
						  <label>Hired Date</label>
						  <input type="text" class="form-control" name="hired_date" placeholder="Hired Date" disabled>
						</div>
					  <div class="row">
							<div class="col-xs-4">
							<label>First Name</label>
							  <input type="text" class="form-control" name="guard_fname" placeholder="First Name" disabled>
							</div>
							<div class="col-xs-4">
							<label>Middle Name</label>
							  <input type="text" class="form-control" name="guard_mname" placeholder="Middle Name" disabled>
							</div>
							<div class="col-xs-4">
							<label>Last Name</label>
							  <input type="text" class="form-control" name="guard_lname" placeholder="Last Name" disabled>
							</div>
						</div>
						</br>
						<div class="row">
							<div class="col-xs-6">
							<label>Contact Number</label>
							  <input type="text" class="form-control" name="contact" placeholder="Contact" disabled>
							</div>
							<div class="col-xs-6">
							<label>Email</label>
							  <input type="text" class="form-control" name="email" placeholder="Email" disabled>
							</div>
						</div>
						</br>
						<div class="form-group">
						  <label>Current Address</label>
						  <input type="text" class="form-control" name="guard_caddress" placeholder="Enter Current Address" disabled>
						</div>
						<div class="form-group">
						<input type="hidden" name="btn_upload" value="upload">
						<button type="submit" class="btn btn-primary btn-md pull-right ">
							<i class="fa fa-cloud-upload"></i> <span>Edit</span>
						</button>
					</div>
						 
						
					  </div>
					  <!-- /.box-body -->

                

                
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
			  
			  </div>
                

              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
</div>