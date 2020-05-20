
<div class="page-wrapper">
  
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Edit Doctor</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form  action="<?= base_url() ?>Doctor/edit_doctors" method="post" 
                          enctype="multipart/form-data" accept-charset="utf-8">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="fn" name="first_name" value="<?php echo empty($Doctor_data->first_name) ? "" : $Doctor_data->first_name ?>" >
                                        <p class="alert alert-danger" id="fne" style="display:none;">First Name is required</p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="last_name" value="<?php echo empty($Doctor_data->last_name) ? "" : $Doctor_data->last_name ?>" id="ln">
                                        <p class="alert alert-danger" id="lne" style="display:none;">Last Name is required</p>
                                        
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Username <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="username" value="<?php echo empty($Doctor_data->username) ? "" : $Doctor_data->username ?>" id="un">
                                          <p class="alert alert-danger" id="une" style="display:none;">UserName is required</p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" id="email" type="email" name="email" value="<?php echo empty($Doctor_data->email) ? "" : $Doctor_data->email ?>">
                                        <p id="email_error" style="display:none;" >email is available</p>
                                         <p class="alert alert-danger" id="emaile" style="display:none;">Email is required</p>
                                    </div>
                                </div>

                                

								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Birth <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input type="text"  id="datepickers" name="dob" class="form-control datetimepicker" value="<?= empty($Doctor_data->dob) ? "" : $Doctor_data->dob  ?>" >
                                            
                                              <p class="alert alert-danger" id="date_error" style="display:none;">Date of birth is required</p>
                                        </div>
                                    </div>
                                </div>

                                

                                <div>
                                <input type="hidden" name="id" value="<?php echo empty($Doctor_data->id) ? "" : $Doctor_data->id ?>">
                                </div>

                               
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Address <span class="text-danger">*</span></label>
												<input type="text" class="form-control " name="address" value="<?php echo empty($Doctor_data->address) ? "" : $Doctor_data->address ?>" id="address">
                           <p class="alert alert-danger" id="address_error" style="display:none;">Address is required</p>
											</div>
										</div>

                    

										<div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Country</label>
												<select class="form-control " name="Country">
												<option>INDIA</option>
												</select>
                         <?= form_error('Country') ?>

											</div>
										</div>

										<div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>City <span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="city" value="<?php echo empty($Doctor_data->city) ? "" : $Doctor_data->city ?>" id="city">
                          <p class="alert alert-danger" id="city_error" style="display:none;">City is required</p>
											</div>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>State/Province</label>
												<select class="form-control select" name="state">
													<option value="Andhra Pradesh">Andhra Pradesh</option>
                          <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                          <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                          <option value="Assam">Assam</option>
                          <option value="Bihar">Bihar</option>
                          <option value="Chandigarh">Chandigarh</option>
                          <option value="Chhattisgarh">Chhattisgarh</option>
                          <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                          <option value="Daman and Diu">Daman and Diu</option>
                          <option value="Delhi">Delhi</option>
                          <option value="Lakshadweep">Lakshadweep</option>
                          <option value="Puducherry">Puducherry</option>
                          <option value="Goa">Goa</option>
                          <option value="Gujarat">Gujarat</option>
                          <option value="Haryana">Haryana</option>
                          <option value="Himachal Pradesh">Himachal Pradesh</option>
                          <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                          <option value="Jharkhand">Jharkhand</option>
                          <option value="Karnataka">Karnataka</option>
                          <option value="Kerala">Kerala</option>
                          <option value="Madhya Pradesh">Madhya Pradesh</option>
                          <option value="Maharashtra">Maharashtra</option>
                          <option value="Manipur">Manipur</option>
                          <option value="Meghalaya">Meghalaya</option>
                          <option value="Mizoram">Mizoram</option>
                          <option value="Nagaland">Nagaland</option>
                          <option value="Odisha">Odisha</option>
                          <option value="Punjab">Punjab</option>
                          <option value="Rajasthan">Rajasthan</option>
                          <option value="Sikkim">Sikkim</option>
                          <option value="Tamil Nadu">Tamil Nadu</option>
                          <option value="Telangana">Telangana</option>
                          <option value="Tripura">Tripura</option>
                          <option value="Uttar Pradesh">Uttar Pradesh</option>
                          <option value="Uttarakhand">Uttarakhand</option>
                          <option value="West Bengal">West Bengal</option>
												</select>
											</div>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Postal Code</label>
												<input type="text" value="91403" name="postal_code" class="form-control" value="<?php echo empty($Doctor_data->postal_code) ? "" : $Doctor_data->postal_code ?>">
											</div>
										</div>
									</div>
								</div>

                    
                       


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="phone_number" value="<?php echo empty($Doctor_data->phone_number) ? "" : $Doctor_data->phone_number ?>" id="contact">

                                         <p class="alert alert-danger" id="contact_error" style="display:none;">Phone number is required</p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
									<div class="form-group">
										<label>Driver Image:</label>
										<div class="profile-upload">
											<div class="upload-img">
                        
												<img alt="" id="d" src="<?= base_url() ?>uploads/doctor_profiles/<?= empty($Doctor_data->image)?'user.jpg': $Doctor_data->image ?>">
											</div>
											<div class="upload-input">
												<input type="file" id="doctor_image" name="image" class="form-control">
                                                 <p id="file_error" style="display:none;">Type is not allowed</p>
											</div>
                                           
										</div>
									</div>
                                </div>
                            </div>
					
                            <div class="form-group">
                                <label class="display-block">Status</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="doctor_active" value="option1" checked>
									<label class="form-check-label" for="doctor_active">
									Active
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="doctor_inactive" value="option2">
									<label class="form-check-label" for="doctor_inactive">
									Inactive
									</label>
								</div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" id="save">Save</button>
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
        $.post("<?= base_url() ?>Doctor/CheckEmail", {email: email}, function(result){
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



                $('#datepickers').datetimepicker({
                    format: 'DD-MM-YYYY'
                });

                   $('#doctor_image').change(function(){
                var ext = $('#doctor_image').val().split('.').pop().toLowerCase();
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


      $('#save').click(function(event){
          
          var fn = $("#fn").val();
          var ln = $("#ln").val();
          var un = $("#un").val();
          var email = $("#email").val();
          var date = $("#datepickers").val();
          var address = $("#address").val();
          var city = $("#city").val();
          var education = $("#education").val();
          var contact = $("#contact").val();
          
          var count =0;

          if(fn.length <= 0){
           $('#fne').css('display','block');
           count++;

          }
          if(ln.length <= 0){
             $('#lne').css('display','block');    
             count++;
          }
          if(un.length <= 0){
             $('#une').css('display','block');    
             count++;
          }
          if(email.length <= 0){
             $('#emaile').css('display','block');    
             count++;
          }
          if(date.length <= 0){
             $('#date_error').css('display','block');    
             count++;
          }
          if(address.length <= 0){
             $('#address_error').css('display','block');    
             count++;
          }
          if(city.length <= 0){
             $('#city_error').css('display','block');    
             count++;
          }
          if(education.length <= 0){
             $('#education_error').css('display','block');    
             count++;
          }
          if(contact.length <= 0){
             $('#contact_error').css('display','block');    
             count++;
          }

          if(count <= 0){
            
          }
          else {
       event.preventDefault();
          }

      })

                  

             document.getElementById("doctor_image").onchange = function () {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        // get loaded data and render thumbnail.
                        document.getElementById("d").src = e.target.result;
                    };

                    // read the image file as a data URL.
                    reader.readAsDataURL(this.files[0]);
                };




          
     })
     </script>