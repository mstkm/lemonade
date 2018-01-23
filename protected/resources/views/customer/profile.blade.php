@extends('layouts.main')

@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
					<div class="panel panel-profile" style="min-height: 80vh;">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="assets/img/user-medium.png" class="img-circle" alt="Avatar">
										<h3 class="name">{{auth::user()->name}}</h3>
										<span class="online-status status-available">Available</span>
									</div>
								
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Basic Info</h4>
										<ul class="list-unstyled list-justify">
											<li>Birthdate <span>24 Aug, 2016</span></li>
											<li>Mobile <span>{{auth::user()->noHP}}</span></li>
											<li>Email <span>{{auth::user()->email}}</span></li>

										</ul>
									</div>

							
                                    <div class="text-center"><a href="{{url('admin/user/edit/'.auth::user()->id)}}" class="btn btn-primary">Edit Profile</a> | <a href="{{url('event/book')}}" class="btn btn-primary">Book Event</a></div>

								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								<h4 class="heading">{{auth::user()->name}}'s History</h4>								
								<!-- TABBED CONTENT -->
								<!-- <div class="custom-tabs-line tabs-line-bottom left-aligned">
									<ul class="nav" role="tablist">
										<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Recent Activity</a></li>
										<li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Projects <span class="badge">7</span></a></li>
									</ul>
								</div> -->
								<div class="tab-content">
									<div class="tab-pane fade in active" id="tab-bottom-left1">
										<ul class="list-unstyled activity-timeline">
										<?php if(isset($history)) {
											foreach($history as $item)
											{?>
											<li>
												<i class="fa fa-calendar activity-icon"></i>
                                                <p>{{$item->name}} @<?php echo date('d-M-Y H:i', strtotime($item->startevent)); ?> <a href="#">Di {{$item->alamat}}</a> 
                                                <span class="timestamp"><span class="label 
												@if($item->status=='canceled')
												label-danger
												@else
												label-success
												@endif
												">{{strtoupper($item->status)}}</span> | <?php echo date('d-M-Y', strtotime($item->created_at)); ?> | </span></p>
                                            </li>
                                            
										<?php } 
										}
										else {?>
											<li>
												<i class="fa fa-calendar activity-icon"></i>
                                                <p>TIDAK ADA RIWAYAT BOOKING EVENT
                                                <span class="timestamp"</span></p>
                                            </li>
										<?php } ?>

										</ul>
										<!-- <div class="margin-top-30 text-center"><a href="#" class="btn btn-default">See all activity</a></div> -->
									</div>
									<div class="tab-pane fade" id="tab-bottom-left2">
										<div class="table-responsive">
											<table class="table project-table">
												<thead>
													<tr>
														<th>Title</th>
														<th>Progress</th>
														<th>Leader</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><a href="#">Spot Media</a></td>
														<td>
															<div class="progress">
																<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
																	<span>60% Complete</span>
																</div>
															</div>
														</td>
														<td><img src="assets/img/user2.png" alt="Avatar" class="avatar img-circle"> <a href="#">Michael</a></td>
														<td><span class="label label-success">ACTIVE</span></td>
													</tr>
													<tr>
														<td><a href="#">E-Commerce Site</a></td>
														<td>
															<div class="progress">
																<div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%;">
																	<span>33% Complete</span>
																</div>
															</div>
														</td>
														<td><img src="assets/img/user1.png" alt="Avatar" class="avatar img-circle"> <a href="#">Antonius</a></td>
														<td><span class="label label-warning">PENDING</span></td>
													</tr>
													<tr>
														<td><a href="#">Project 123GO</a></td>
														<td>
															<div class="progress">
																<div class="progress-bar" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;">
																	<span>68% Complete</span>
																</div>
															</div>
														</td>
														<td><img src="assets/img/user1.png" alt="Avatar" class="avatar img-circle"> <a href="#">Antonius</a></td>
														<td><span class="label label-success">ACTIVE</span></td>
													</tr>
													<tr>
														<td><a href="#">Wordpress Theme</a></td>
														<td>
															<div class="progress">
																<div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
																	<span>75%</span>
																</div>
															</div>
														</td>
														<td><img src="assets/img/user2.png" alt="Avatar" class="avatar img-circle"> <a href="#">Michael</a></td>
														<td><span class="label label-success">ACTIVE</span></td>
													</tr>
													<tr>
														<td><a href="#">Project 123GO</a></td>
														<td>
															<div class="progress">
																<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																	<span>100%</span>
																</div>
															</div>
														</td>
														<td><img src="assets/img/user1.png" alt="Avatar" class="avatar img-circle" /> <a href="#">Antonius</a></td>
														<td><span class="label label-default">CLOSED</span></td>
													</tr>
													<tr>
														<td><a href="#">Redesign Landing Page</a></td>
														<td>
															<div class="progress">
																<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																	<span>100%</span>
																</div>
															</div>
														</td>
														<td><img src="assets/img/user5.png" alt="Avatar" class="avatar img-circle" /> <a href="#">Jason</a></td>
														<td><span class="label label-default">CLOSED</span></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- END TABBED CONTENT -->
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
@endsection