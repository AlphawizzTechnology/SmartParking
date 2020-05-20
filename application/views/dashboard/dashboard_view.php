<div class="page-wrapper">

            <div class="content">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
							<span class="dash-widget-bg1"><i class="fa fa-user-o" aria-hidden="true"></i></span>
							<div class="dash-widget-info text-right">
								<h3><?= empty($dc)?'0':$dc ?></h3>
								<span class="widget-title1">Driver <i class="fa fa-user" aria-hidden="true"></i></span>
							</div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-car"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?= empty($pc)?'0':$pc ?></h3>
                                <span class="widget-title2">Passenger<i class="fa fa-car" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?= empty($apc)?'0':$apc ?></h3>
                                <span class="widget-title3">Booking<i class="fa fa-calendar" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
					
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><h3><?= empty($ppc)?'0':$ppc ?></h3></h3>
                                <span class="widget-title4">Pending <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

				
				<div class="row">
					<div class="col-12 col-md-6 col-lg-8 col-xl-8">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title d-inline-block">Upcoming Booking</h4> <a href="<?= base_url() ?>Appointment" class="btn btn-primary float-right">View all</a>
							</div>
							<div class="card-body p-0">
								<div class="table-responsive">
									<table class="table mb-0">
										<thead class="d-none">
											<tr>
												<th>Patient Name</th>
												<th>Doctor Name</th>
												<th>Timing</th>
												<th class="text-right">Status</th>
											</tr>
										</thead>
										<tbody>
										<?php foreach($App as $A):  ?>
											<tr>
												<td style="min-width: 200px;">
													<p class="avatar">B</p>
													<h2><?= $A->full_name ?> <span><?= $A->address ?></span></h2>
												</td>                 
												<td>
													<h5 class="time-title p-0">Appointment With</h5>
													<p>Dr. <?= $A->Doctor_name ?></p>
												</td>
												<td>
													<h5 class="time-title p-0">Timing</h5>
													<p><?= $A->appointment_time ?></p>
												</td>
												<td class="text-right">
													<a href="<?= base_url() ?>AdminDashboard/Approve/<?= empty($A->appointment_id)?'':$A->appointment_id ?>" class="btn btn-outline-primary take-btn">Take up</a>
												</td>
											</tr>
											<?php  endforeach ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
                    <!-- <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="card member-panel">
							<div class="card-header bg-white">
								<h4 class="card-title mb-0">Doctors</h4>
							</div>
                            <div class="card-body">
                                <ul class="contact-list">
								<?php  foreach($doc as $d):?>
                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a href="<?= base_url() ?>doctor/doctors_profile/<?= empty($d->id)?'':$d->id ?>" title="John Doe"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status online"></span></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis"><?= empty($d->Doctor_name)?'':$d->Doctor_name ?></span>
                                                <span class="contact-date"><?= empty($d->education)?'':$d->education ?></span>
                                            </div>
                                        </div>
                                    </li>
                                   <?php endforeach ?>
                                </ul>
                            </div>
                            <div class="card-footer text-center bg-white">
                                <a href="<?= base_url() ?>Doctor" class="text-muted">View all Doctors</a>
                            </div>
                        </div>
                    </div> -->
				</div>
				<div class="row">
					<div class="col-12 col-md-12 col-lg-12 col-xl-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title d-inline-block">New Passenger </h4> <a href="<?= base_url()?>Patient" class="btn btn-primary float-right">View all</a>
							</div>
							<div class="card-block">
								<div class="table-responsive">
									<table class="table mb-0 new-patient-table datatable" >
										<thead>
											<th>Patient Name</th>
											<th>Patient Email</th>
											<th>Patient Phone Number</th>
											<th>Patient Problem</th>
										</thead>
										<tbody>
										<?php  foreach($pat as $A):?>
											<tr>
												<td>
													<img width="28" height="28" class="rounded-circle" src="<?= base_url() ?>uploads/patients_profiles/<?= empty($A->Patient_image)?'user.png':$A->Patient_image ?>" alt=""> 
													<h2><?= empty($A->Patient_name)?'':$A->Patient_name ?></h2>
												</td>
												<td><?= empty($A->email)?'':$A->email ?></td>
												<td><?= empty($A->phone_number)?'':$A->phone_number ?></td>
												<td><button class="btn btn-primary btn-primary-one float-right"><?= empty($A->disease)?'Not specify':$A->disease ?></button></td>
											</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="col-12 col-md-6 col-lg-4 col-xl-4"> -->
						<!-- <div class="hospital-barchart">
							<h4 class="card-title d-inline-block">Hospital Management</h4>
						</div>
						<div class="bar-chart">
							<div class="legend">
								<div class="item">
									<h4>Level1</h4>
								</div>
								
								<div class="item">
									<h4>Level2</h4>
								</div>
								<div class="item text-right">
									<h4>Level3</h4>
								</div>
								<div class="item text-right">
									<h4>Level4</h4>
								</div>
							</div>
							<div class="chart clearfix">
								<div class="item">
									<div class="bar">
										<span class="percent">16%</span>
										<div class="item-progress" data-percent="16">
											<span class="title">OPD Patient</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="bar">
										<span class="percent">71%</span>
										<div class="item-progress" data-percent="71">
											<span class="title">New Patient</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="bar">
										<span class="percent">82%</span>
										<div class="item-progress" data-percent="82">
											<span class="title">Laboratory Test</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="bar">
										<span class="percent">67%</span>
										<div class="item-progress" data-percent="67">
											<span class="title">Treatment</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="bar">
										<span class="percent">30%</span>									
										<div class="item-progress" data-percent="30">
											<span class="title">Discharge</span>
										</div>
									</div>
								</div>
							</div>
						</div> -->
					 </div>
				</div>
            </div>
            
        </div>