<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Passenger</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="<?= base_url() ?>Patient/add_patient" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First Name <span class="text-danger">*</span></label>
                                        <input class="form-control" name="first_name" type="text" value="<?= set_value('first_name') ?>">
                                        <?= form_error('firstname'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input class="form-control" name="last_name" type="text" value="<?= set_value('last_name') ?>">
                                        <?= form_error('lastname'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Username <span class="text-danger">*</span></label>
                                        <input class="form-control" name="username" type="text" value="<?= set_value('username') ?>">
                                        <?= form_error('username'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" id="email" name="email" type="email" value="<?= set_value('email') ?>">
                                        <?= form_error('email'); ?>
                                        <p id="email_error" style="display:none;" >email is available</p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" name="password" type="password">
                                        <?= form_error('password'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input class="form-control" name="cpassword" type="password">
                                        <?= form_error('cpassword'); ?>
                                    </div>
                                </div>
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <div class="cal-icon">
                                            <input type="text" data-format="dd-MM-yyyy" name="dob" id="datepicker" class="form-control datetimepicker" >
                                            <?= form_error('dob'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
									<div class="form-group gender-select">
										<label class="gen-label">Gender:</label>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" value="male" class="form-check-input" >Male
											</label>
										</div>

										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" value="female" class="form-check-input">Female
											</label>
										</div>
									</div>
                                </div>


								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Address</label>
												<input type="text" name="address" class="form-control " value="<?= set_value('address') ?>">
                                                <?= form_error('address'); ?>
											</div>
										</div>

                                        <div class="col-sm-6">
											<div class="form-group">
												<label>Problem</label>
												<input type="text" name="disease" class="form-control " value="<?= set_value('disease') ?>">
                                                <?= form_error('disease'); ?>
											</div>
										</div>

										<div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Country</label>
												<select class="form-control select" name="Country">
													<option>USA</option>
													<option>United Kingdom</option>
												</select>
											</div>
										</div>

										<div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group" >
												<label>City</label>
												<input type="text" name="city" class="form-control" value="<?= set_value('city') ?>">
                                                <?= form_error('city'); ?>
											</div>
										</div>

										<div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>State/Province</label>
												<select class="form-control select" name="state">
													<option>California</option>
													<option>Alaska</option>
													<option>Alabama</option>
												</select>
											</div>
										</div>

										<div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Postal Code</label>
												<input type="text" name="postal_code" class="form-control" value="<?= set_value('postal_code') ?>">
                                                <?= form_error('postal_code'); ?>
											</div>
										</div>
									</div>
								</div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone </label>
                                        <input class="form-control" name="phone_number" type="text" value="<?= set_value('phone_number') ?>">
                                        <?= form_error('phone_number'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
									<div class="form-group">
										<label>Avatar</label>
										<div class="profile-upload">
											<div class="upload-img">
												<img alt="" src="assets/img/user.jpg">
											</div>
											<div class="upload-input">
												<input type="file"  id="patient_image" name="patient_image" class="form-control" value="<?= set_value('patient_image') ?>">
                                                <p id="file_error" style="display:none;">File Type is not allowed</p>
											</div>
										</div>
									</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="display-block">Status</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="patient_active" value="option1" checked>
									<label class="form-check-label" for="patient_active">
									Active
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="patient_inactive" value="option2">
									<label class="form-check-label" for="patient_inactive">
									Inactive
									</label>
								</div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Create Patient</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
			
        </div>
        <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
     <script>
     $(document).ready(function(){
        $("#email").blur(function(){
        var email = $(this).val();
        $.post("<?= base_url() ?>Patient/CheckEmail", {email: email}, function(result){
         if(result == 1){
         $('#email_error').css({"display":"block","color":"red"});
         $('.submit-btn').prop('disabled', true);
         }
         else {
             
            $('#email_error').css({"display":"none"});
            $('.submit-btn').prop('disabled', false);
         }
  });
  });



                $('#datepicker').datetimepicker({
                    format: 'DD-MM-YYYY'
                });


                 $('#patient_image').change(function(){
                var ext = $('#patient_image').val().split('.').pop().toLowerCase();
                if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
                  //alert('invalid extension!');
                  
                  $('#file_error').css({"display":"block","color":"red"});
                  //$('#file_error').val('not allowed');
                  $('.submit-btn').prop('disabled', true);
                 }
                 else {
                     $('#file_error').css({"display":"none"});
                    $('.submit-btn').prop('disabled', false);
                 }
                 })
          
     })
     </script>
     