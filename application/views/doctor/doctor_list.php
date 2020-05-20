<div class="main-wrapper">
        
        
        <div class="page-wrapper">
       
            <div class="content">
                <div class="row">
                
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Driver</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="<?= base_url() ?>Doctor/add_doctors" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Driver</a>
                    </div>
                </div>

				<div class="row doctor-grid">
                <?php  foreach($doctors as $doc): ?>
                
                    <div class="col-md-4 col-sm-4  col-lg-3">
                        <div class="profile-widget">
                            <div class="doctor-img">
                                <a class="avatar" href="<?= base_url() ?>doctor/doctors_profile/<?=$doc->id ?>"><img alt="" src="<?= base_url() ?>uploads/doctor_profiles/<?= empty($doc->image)?'user.jpg': $doc->image ?>"></a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="<?= base_url() ?>Doctor/edit_doctors/<?= $doc->id ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor"><i class="fa fa-trash-o m-r-5"></i> Delete</a> -->
                                    <a class="dropdown-item" href="<?= base_url() ?>Doctor/delete_doctors/<?= $doc->id ?>"><i class="fa fa-pencil m-r-5"></i> Delete</a>
                                </div>
                            </div>
                            <h4 class="doctor-name text-ellipsis"><a href="<?= base_url() ?>doctor/doctors_profile/<?=$doc->id ?>"><?php echo $doc->first_name .' '.$doc->last_name; ?></a></h4>
                            <div class="doc-prof"><?= $doc->profession ?></div>
                            <div class="user-country">
                                <i class="fa fa-map-marker"></i> <?= $doc->address ?>
                            </div>
                        </div>
                    </div>
                 <?php endforeach;  ?>
                    
                    
                </div>
				<!-- <div class="row">
                    <div class="col-sm-12">
                        <div class="see-all">
                            <a class="see-all-btn" href="javascript:void(0);">Load More</a>
                        </div>
                    </div>
                </div> -->
            </div>
            
        </div>
		<div id="delete_doctor" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body text-center">
						<img src="assets/img/sent.png" alt="" width="50" height="46">
						<h3>Are you sure want to delete this Doctor?</h3>
						<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
							<button type="submit" class="btn btn-danger">Delete</button>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>