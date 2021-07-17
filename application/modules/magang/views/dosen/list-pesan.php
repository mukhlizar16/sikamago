`
<div class="pcoded-main-container">
	<div class="pcoded-content">
		<!-- [ breadcrumb ] start -->
		<div class="page-header">
			<div class="page-block">
				<div class="row align-items-center">
					<div class="col-md-12">
						<div class="page-header-title">
							<h5 class="m-b-10">Dashboard <?= is_admin() ? 'Administrator' : 'Pengguna' ?></h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= site_url('admin') ?>">
									<i class="feather icon-home"></i>
								</a>
							</li>
							<li class="breadcrumb-item">
								<a href="<?= site_url('admin') ?>">Dashboard</a>
							</li>
							<li class="breadcrumb-item">
								<a href="javascript:void(0)"><?= $breadcrumb ?></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- [ breadcrumb ] end -->

		<!-- START: Main content-->
		<div class="row">
		<div class="col-sm-12">
			<div class="card email-card">
				<div class="card-header">
					<div class="mail-header">
						<div class="row align-items-center">
							<!-- [ inbox-left section ] start -->
							<div class="col-xl-2 col-md-3">
								<a href="javascript:void" class="b-brand">
									<div class="b-bg">
										S
									</div>
									<span class="b-title text-muted">SiKaMaGo</span>
								</a>
							</div>

							<div class="col-xl-10 col-md-9">

							</div>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="mail-body">
						<div class="row">
							<!-- [ inbox-left section ] start -->
							<div class="col-xl-2 col-md-3">
								<div class="mb-3">
									<a href="javascript:void" class="btn waves-effect waves-light btn-rounded btn-outline-primary">Tulis Pesan</a>
								</div>
								<ul class="mb-2 nav nav-tab flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
									<li class="nav-item mail-section">
										<a class="nav-link text-left active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">
											<span><i class="feather icon-inbox"></i> Inbox</span>
											<span class="float-right">6</span>
										</a>
									</li>
									<li class="nav-item mail-section">
										<a class="nav-link text-left" id="v-pills-starred-tab" data-toggle="pill" href="#v-pills-starred" role="tab">
											<span><i class="feather icon-star-on"></i> Starred</span>
										</a>
									</li>
									<li class="nav-item mail-section">
										<a class="nav-link text-left" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-draft" role="tab">
											<span><i class="feather icon-file-text"></i> Drafts</span>
										</a>
									</li>
									<li class="nav-item mail-section">
										<a class="nav-link text-left" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-mail" role="tab">
											<span><i class="feather icon-navigation"></i> Sent Mail</span>
										</a>
									</li>
									<li class="nav-item mail-section">
										<a class="nav-link text-left" id="v-pills-Trash-tab" data-toggle="pill" href="#v-pills-Trash" role="tab">
											<span><i class="feather icon-trash-2"></i> Trash</span>
										</a>
									</li>
								</ul>
								<a class="email-more-link" data-toggle="collapse" href="#email-more-cont" role="button" aria-expanded="false" aria-controls="email-more-cont"><span><i class="feather icon-chevron-down mr-2"></i>More</span><span style="display: none;"><i class="feather icon-chevron-up mr-2"></i>Less</span></a>
								<div class="collapse" id="email-more-cont">
									<ul class="nav nav-tab flex-column nav-pills">
										<li class="nav-item mail-section">
											<a class="nav-link text-left">
												<span><i class="feather icon-zap"></i> Important</span>
												<span class="float-right">6</span>
											</a>
										</li>
										<li class="nav-item mail-section">
											<a class="nav-link text-left">
												<span><i class="feather icon-message-circle"></i> Chats</span>
											</a>
										</li>
										<li class="nav-item mail-section">
											<a class="nav-link text-left">
												<span><i class="feather icon-alert-triangle"></i> Spam</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
							<!-- [ inbox-left section ] end -->
							<!-- [ inbox-right section ] start -->
							<div class="col-xl-10 col-md-9 inbox-right">
								<div class="email-btn">
									<button type="button" class="btn waves-effect waves-light btn-icon btn-rounded btn-outline-secondary mb-2"><i class="feather icon-alert-circle"></i></button>
									<button type="button" class="btn waves-effect waves-light btn-icon btn-rounded btn-outline-secondary mb-2"><i class="feather icon-inbox"></i></button>
									<button type="button" class="btn waves-effect waves-light btn-icon btn-rounded btn-outline-secondary mb-2"><i class="feather icon-trash-2"></i></button>
									<div class="btn-group mb-2 mr-2 ">
										<button class="btn drp-icon btn-rounded btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-log-out"></i></button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="#">Move to</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item pl-4" href="#"><span><i class="feather icon-users mr-2"></i>Social</span></a>
											<a class="dropdown-item pl-4" href="#"><span><i class="feather icon-tag mr-2"></i>Promotion</span></a>
											<a class="dropdown-item pl-4" href="#"><span><i class="feather icon-upload-cloud mr-2"></i>Update</span></a>
											<a class="dropdown-item pl-4" href="#"><span><i class="feather icon-message-square mr-2"></i>Forum</span></a>
										</div>
									</div>
									<div class="btn-group mb-2 mr-2 ">
										<button class="btn drp-icon btn-rounded btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical"></i></button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="#!">Mark as unread</a>
											<a class="dropdown-item" href="#!">Mark as important</a>
											<a class="dropdown-item" href="#!">Mark as not important</a>
											<a class="dropdown-item" href="#!">Filter messages like these</a>
											<a class="dropdown-item" href="#!">Mute</a>
										</div>
									</div>
								</div>
								<div class="tab-content p-0" id="v-pills-tabContent">
									<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
										<ul class="nav nav-pills nav-fill mb-0" id="pills-tab" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" id="pills-primary-tab" data-toggle="pill" href="#pills-primary" role="tab" aria-controls="pills-primary" aria-selected="true"><span><i class="feather icon-inbox"></i>
                                                            primary</span></a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="pills-social-tab" data-toggle="pill" href="#pills-social" role="tab" aria-controls="pills-social" aria-selected="false"><span><i class="feather icon-users"></i>
                                                            Social</span></a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="pills-Promotion-tab" data-toggle="pill" href="#pills-Promotion" role="tab" aria-controls="pills-Promotion" aria-selected="false"><span><i class="feather icon-tag"></i>
                                                            Promotions</span></a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="pills-update-tab" data-toggle="pill" href="#pills-update" role="tab" aria-controls="pills-update" aria-selected="false"><span><i class="feather icon-upload-cloud"></i>
                                                            Update</span></a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="pills-forum-tab" data-toggle="pill" href="#pills-forum" role="tab" aria-controls="pills-forum" aria-selected="false"><span><i class="feather icon-message-square"></i>
                                                            Forum</span></a>
											</li>
										</ul>
										<div class="tab-content" id="pills-tabContent">
											<div class="tab-pane fade show active" id="pills-primary" role="tabpanel" aria-labelledby="pills-primary-tab">
												<div class="mail-body-content table-responsive">
													<table class="table">
														<tbody>
														<tr class="unread">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-1" id="checkbox-s-infill-1">
																			<label for="checkbox-s-infill-1" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">John Doe</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">Coming Up Next Week</a></td>
															<td class="email-time">13:02 PM</td>
														</tr>
														<tr class="unread">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-2" id="checkbox-s-infill-2">
																			<label for="checkbox-s-infill-2" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Google Inc</a></td>
															<td>
																<a href="email_read.html" class="email-name waves-effect">Lorem ipsum dolor sit amet, consectetuer</a>
																<div><a href="#!" class="mail-attach"><i class="feather icon-image mr-2"></i>user.png</a>
																	<a href="#!" class="mail-attach ml-2"><i class="feather icon-file-text mr-2"></i>file.doc</a>
																</div>
															</td>

															<td class="email-time">12:01 AM</td>
														</tr>
														<tr class="read">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-3" id="checkbox-s-infill-3">
																			<label for="checkbox-s-infill-3" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Sara Soudein</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">SVG new updates comes for you</a></td>
															<td class="email-time">00:05 AM</td>
														</tr>
														<tr class="read">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-4" id="checkbox-s-infill-4">
																			<label for="checkbox-s-infill-4" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Rinky Behl</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">Photoshop updates are available</a></td>
															<td class="email-time">10:01 AM</td>
														</tr>
														<tr class="read">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-5" id="checkbox-s-infill-5">
																			<label for="checkbox-s-infill-5" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Harry John</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">New upcoming data available</a></td>
															<td class="email-time">11:01 AM</td>
														</tr>
														<tr class="read">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-6" id="checkbox-s-infill-6">
																			<label for="checkbox-s-infill-6" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Hanry Joseph</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">SCSS current working for new updates</a></td>
															<td class="email-time">12:01 PM</td>
														</tr>
														<tr class="read">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-7" id="checkbox-s-infill-7">
																			<label for="checkbox-s-infill-7" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Liu Koi Yan</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">Charts waiting for you</a>
																<div><a href="#!" class="mail-attach"><i class="feather icon-film mr-2"></i>video</a></div>
															</td>
															<td class="email-time">07:15 AM</td>
														</tr>
														<tr class="read">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-8" id="checkbox-s-infill-8">
																			<label for="checkbox-s-infill-8" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Google Inc</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a></td>
															<td class="email-time">08:01 AM</td>
														</tr>
														<tr class="read">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-9" id="checkbox-s-infill-9">
																			<label for="checkbox-s-infill-9" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">John Doe</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">Coming Up Next Week</a></td>
															<td class="email-time">13:02 PM</td>
														</tr>
														<tr class="read">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-10" id="checkbox-s-infill-10">
																			<label for="checkbox-s-infill-10" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Hanry Joseph</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">SCSS current working for new updates</a>
																<div><a href="#!" class="mail-attach"><i class="feather icon-file-text mr-2"></i>file.doc</a></div>
															</td>
															<td class="email-time">12:01 PM</td>
														</tr>

														</tbody>
													</table>
												</div>

											</div>
											<div class="tab-pane fade" id="pills-social" role="tabpanel" aria-labelledby="pills-social-tab">
												<div class="mail-body-content table-responsive">
													<table class="table">
														<tbody>
														<tr class="unread">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-11" id="checkbox-s-infill-11">
																			<label for="checkbox-s-infill-11" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Google Inc</a></td>
															<td>
																<a href="email_read.html" class="email-name waves-effect">Lorem ipsum dolor sit amet, consectetuer</a>
																<div><a href="#!" class="mail-attach"><i class="feather icon-image mr-2"></i>user.png</a>
																	<a href="#!" class="mail-attach ml-2"><i class="feather icon-file-text mr-2"></i>file.doc</a>
																</div>
															</td>

															<td class="email-time">12:01 AM</td>
														</tr>
														<tr class="unread">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-12" id="checkbox-s-infill-12">
																			<label for="checkbox-s-infill-12" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">John Doe</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">Coming Up Next Week</a></td>
															<td class="email-time">13:02 PM</td>
														</tr>
														<tr class="unread">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-13" id="checkbox-s-infill-13">
																			<label for="checkbox-s-infill-13" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Sara Soudein</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">SVG new updates comes for you</a></td>
															<td class="email-time">00:05 AM</td>
														</tr>
														<tr class="read">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-14" id="checkbox-s-infill-14">
																			<label for="checkbox-s-infill-14" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Rinky Behl</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">Photoshop updates are available</a></td>
															<td class="email-time">10:01 AM</td>
														</tr>
														<tr class="read">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-15" id="checkbox-s-infill-15">
																			<label for="checkbox-s-infill-15" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Harry John</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">New upcoming data available</a></td>
															<td class="email-time">11:01 AM</td>
														</tr>
														</tbody>
													</table>
												</div>
											</div>
											<div class="tab-pane fade" id="pills-Promotion" role="tabpanel" aria-labelledby="pills-Promotion-tab">
												<div class="mail-body-content table-responsive">
													<table class="table">
														<tbody>
														<tr class="unread">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-16" id="checkbox-s-infill-16">
																			<label for="checkbox-s-infill-16" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Google Inc</a></td>
															<td>
																<a href="email_read.html" class="email-name waves-effect">Lorem ipsum dolor sit amet, consectetuer</a>
																<div><a href="#!" class="mail-attach"><i class="feather icon-image mr-2"></i>user.png</a>
																	<a href="#!" class="mail-attach ml-2"><i class="feather icon-file-text mr-2"></i>file.doc</a>
																</div>
															</td>

															<td class="email-time">12:01 AM</td>
														</tr>
														<tr class="unread">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-17" id="checkbox-s-infill-17">
																			<label for="checkbox-s-infill-17" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">John Doe</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">Coming Up Next Week</a></td>
															<td class="email-time">13:02 PM</td>
														</tr>
														<tr class="unread">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-18" id="checkbox-s-infill-18">
																			<label for="checkbox-s-infill-18" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Sara Soudein</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">SVG new updates comes for you</a></td>
															<td class="email-time">00:05 AM</td>
														</tr>
														<tr class="read">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-19" id="checkbox-s-infill-19">
																			<label for="checkbox-s-infill-19" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Rinky Behl</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">Photoshop updates are available</a></td>
															<td class="email-time">10:01 AM</td>
														</tr>
														<tr class="read">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-20" id="checkbox-s-infill-20">
																			<label for="checkbox-s-infill-20" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Harry John</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">New upcoming data available</a></td>
															<td class="email-time">11:01 AM</td>
														</tr>
														<tr class="read">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-21" id="checkbox-s-infill-21">
																			<label for="checkbox-s-infill-21" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Hanry Joseph</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">SCSS current working for new updates</a></td>
															<td class="email-time">12:01 PM</td>
														</tr>
														</tbody>
													</table>
												</div>
											</div>
											<div class="tab-pane fade" id="pills-update" role="tabpanel" aria-labelledby="pills-update-tab">
												<div class="mail-body-content table-responsive">
													<table class="table">
														<tbody>
														<tr class="unread">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-22" id="checkbox-s-infill-22">
																			<label for="checkbox-s-infill-22" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Google Inc</a></td>
															<td>
																<a href="email_read.html" class="email-name waves-effect">Lorem ipsum dolor sit amet, consectetuer</a>
																<div><a href="#!" class="mail-attach"><i class="feather icon-image mr-2"></i>user.png</a>
																	<a href="#!" class="mail-attach ml-2"><i class="feather icon-file-text mr-2"></i>file.doc</a>
																</div>
															</td>

															<td class="email-time">12:01 AM</td>
														</tr>
														<tr class="unread">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-23" id="checkbox-s-infill-23">
																			<label for="checkbox-s-infill-23" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">John Doe</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">Coming Up Next Week</a></td>
															<td class="email-time">13:02 PM</td>
														</tr>
														<tr class="unread">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-24" id="checkbox-s-infill-24">
																			<label for="checkbox-s-infill-24" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Sara Soudein</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">SVG new updates comes for you</a></td>
															<td class="email-time">00:05 AM</td>
														</tr>
														<tr class="unread">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-25" id="checkbox-s-infill-25">
																			<label for="checkbox-s-infill-25" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Rinky Behl</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">Photoshop updates are available</a></td>
															<td class="email-time">10:01 AM</td>
														</tr>
														<tr class="read">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-26" id="checkbox-s-infill-26">
																			<label for="checkbox-s-infill-26" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Harry John</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">New upcoming data available</a></td>
															<td class="email-time">11:01 AM</td>
														</tr>
														<tr class="read">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-27" id="checkbox-s-infill-27">
																			<label for="checkbox-s-infill-27" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Hanry Joseph</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">SCSS current working for new updates</a></td>
															<td class="email-time">12:01 PM</td>
														</tr>
														</tbody>
													</table>
												</div>
											</div>
											<div class="tab-pane fade" id="pills-forum" role="tabpanel" aria-labelledby="pills-forum-tab">
												<div class="mail-body-content table-responsive">
													<table class="table">
														<tbody>
														<tr class="unread">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-28" id="checkbox-s-infill-28">
																			<label for="checkbox-s-infill-28" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Google Inc</a></td>
															<td>
																<a href="email_read.html" class="email-name waves-effect">Lorem ipsum dolor sit amet, consectetuer</a>
																<div><a href="#!" class="mail-attach"><i class="feather icon-image mr-2"></i>user.png</a>
																	<a href="#!" class="mail-attach ml-2"><i class="feather icon-file-text mr-2"></i>file.doc</a>
																</div>
															</td>

															<td class="email-time">12:01 AM</td>
														</tr>
														<tr class="unread">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-29" id="checkbox-s-infill-29">
																			<label for="checkbox-s-infill-29" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">John Doe</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">Coming Up Next Week</a></td>
															<td class="email-time">13:02 PM</td>
														</tr>
														<tr class="unread">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-30" id="checkbox-s-infill-30">
																			<label for="checkbox-s-infill-30" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Sara Soudein</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">SVG new updates comes for you</a></td>
															<td class="email-time">00:05 AM</td>
														</tr>
														<tr class="unread">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-31" id="checkbox-s-infill-31">
																			<label for="checkbox-s-infill-31" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Rinky Behl</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">Photoshop updates are available</a></td>
															<td class="email-time">10:01 AM</td>
														</tr>
														<tr class="read">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-32" id="checkbox-s-infill-32">
																			<label for="checkbox-s-infill-32" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Harry John</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">New upcoming data available</a></td>
															<td class="email-time">11:01 AM</td>
														</tr>
														<tr class="read">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-33" id="checkbox-s-infill-33">
																			<label for="checkbox-s-infill-33" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Hanry Joseph</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">SCSS current working for new updates</a></td>
															<td class="email-time">12:01 PM</td>
														</tr>
														<tr class="read">
															<td>
																<div class="check-star">
																	<div class="form-group d-inline">
																		<div class="checkbox checkbox-primary checkbox-fill d-inline">
																			<input type="checkbox" name="checkbox-s-in-34" id="checkbox-s-infill-34">
																			<label for="checkbox-s-infill-34" class="cr"></label>
																		</div>
																	</div>
																	<a href="#"><i class="feather icon-star ml-2"></i></a>
																</div>
															</td>
															<td><a href="email_read.html" class="email-name waves-effect">Liu Koi Yan</a></td>
															<td><a href="email_read.html" class="email-name waves-effect">Charts waiting for you</a>
																<div><a href="#!" class="mail-attach"><i class="feather icon-film mr-2"></i>video</a></div>
															</td>
															<td class="email-time">07:15 AM</td>
														</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="v-pills-starred" role="tabpanel">
										<p class="mb-0">
										</p><div class="tab-pane fade show active" id="pills-starred" role="tabpanel">
											<div class="mail-body-content table-responsive">
												<table class="table">
													<tbody>
													<tr class="unread">
														<td>
															<div class="check-star">
																<div class="form-group d-inline">
																	<div class="checkbox checkbox-primary checkbox-fill d-inline">
																		<input type="checkbox" name="checkbox-s-in-35" id="checkbox-s-infill-35">
																		<label for="checkbox-s-infill-35" class="cr"></label>
																	</div>
																</div>
																<a href="#"><i class="feather icon-star ml-2"></i></a>
															</div>
														</td>
														<td><a href="email_read.html" class="email-name waves-effect">John Doe</a></td>
														<td><a href="email_read.html" class="email-name waves-effect">Coming Up Next Week</a></td>
														<td class="email-time">13:02 PM</td>
													</tr>
													<tr class="unread">
														<td>
															<div class="check-star">
																<div class="form-group d-inline">
																	<div class="checkbox checkbox-primary checkbox-fill d-inline">
																		<input type="checkbox" name="checkbox-s-in-36" id="checkbox-s-infill-36">
																		<label for="checkbox-s-infill-36" class="cr"></label>
																	</div>
																</div>
																<a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
															</div>
														</td>
														<td><a href="email_read.html" class="email-name waves-effect">Google Inc</a></td>
														<td>
															<a href="email_read.html" class="email-name waves-effect">Lorem ipsum dolor sit amet, consectetuer</a>
															<div><a href="#!" class="mail-attach"><i class="feather icon-image mr-2"></i>user.png</a>
																<a href="#!" class="mail-attach ml-2"><i class="feather icon-file-text mr-2"></i>file.doc</a>
															</div>
														</td>

														<td class="email-time">12:01 AM</td>
													</tr>
													<tr class="unread">
														<td>
															<div class="check-star">
																<div class="form-group d-inline">
																	<div class="checkbox checkbox-primary checkbox-fill d-inline">
																		<input type="checkbox" name="checkbox-s-in-37" id="checkbox-s-infill-37">
																		<label for="checkbox-s-infill-37" class="cr"></label>
																	</div>
																</div>
																<a href="#"><i class="feather icon-star ml-2"></i></a>
															</div>
														</td>
														<td><a href="email_read.html" class="email-name waves-effect">Sara Soudein</a></td>
														<td><a href="email_read.html" class="email-name waves-effect">SVG new updates comes for you</a></td>
														<td class="email-time">00:05 AM</td>
													</tr>
													<tr class="unread">
														<td>
															<div class="check-star">
																<div class="form-group d-inline">
																	<div class="checkbox checkbox-primary checkbox-fill d-inline">
																		<input type="checkbox" name="checkbox-s-in-38" id="checkbox-s-infill-38">
																		<label for="checkbox-s-infill-38" class="cr"></label>
																	</div>
																</div>
																<a href="#"><i class="feather icon-star ml-2"></i></a>
															</div>
														</td>
														<td><a href="email_read.html" class="email-name waves-effect">Rinky Behl</a></td>
														<td><a href="email_read.html" class="email-name waves-effect">Photoshop updates are available</a></td>
														<td class="email-time">10:01 AM</td>
													</tr>
													<tr class="read">
														<td>
															<div class="check-star">
																<div class="form-group d-inline">
																	<div class="checkbox checkbox-primary checkbox-fill d-inline">
																		<input type="checkbox" name="checkbox-s-in-39" id="checkbox-s-infill-39">
																		<label for="checkbox-s-infill-39" class="cr"></label>
																	</div>
																</div>
																<a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
															</div>
														</td>
														<td><a href="email_read.html" class="email-name waves-effect">Harry John</a></td>
														<td><a href="email_read.html" class="email-name waves-effect">New upcoming data available</a></td>
														<td class="email-time">11:01 AM</td>
													</tr>
													<tr class="read">
														<td>
															<div class="check-star">
																<div class="form-group d-inline">
																	<div class="checkbox checkbox-primary checkbox-fill d-inline">
																		<input type="checkbox" name="checkbox-s-in-40" id="checkbox-s-infill-40">
																		<label for="checkbox-s-infill-40" class="cr"></label>
																	</div>
																</div>
																<a href="#"><i class="feather icon-star ml-2"></i></a>
															</div>
														</td>
														<td><a href="email_read.html" class="email-name waves-effect">Hanry Joseph</a></td>
														<td><a href="email_read.html" class="email-name waves-effect">SCSS current working for new updates</a></td>
														<td class="email-time">12:01 PM</td>
													</tr>
													<tr class="read">
														<td>
															<div class="check-star">
																<div class="form-group d-inline">
																	<div class="checkbox checkbox-primary checkbox-fill d-inline">
																		<input type="checkbox" name="checkbox-s-in-41" id="checkbox-s-infill-41">
																		<label for="checkbox-s-infill-41" class="cr"></label>
																	</div>
																</div>
																<a href="#"><i class="feather icon-star ml-2"></i></a>
															</div>
														</td>
														<td><a href="email_read.html" class="email-name waves-effect">Liu Koi Yan</a></td>
														<td><a href="email_read.html" class="email-name waves-effect">Charts waiting for you</a>
															<div><a href="#!" class="mail-attach"><i class="feather icon-film mr-2"></i>video</a></div>
														</td>
														<td class="email-time">07:15 AM</td>
													</tr>
													<tr class="read">
														<td>
															<div class="check-star">
																<div class="form-group d-inline">
																	<div class="checkbox checkbox-primary checkbox-fill d-inline">
																		<input type="checkbox" name="checkbox-s-in-42" id="checkbox-s-infill-42">
																		<label for="checkbox-s-infill-42" class="cr"></label>
																	</div>
																</div>
																<a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
															</div>
														</td>
														<td><a href="email_read.html" class="email-name waves-effect">Google Inc</a></td>
														<td><a href="email_read.html" class="email-name waves-effect">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a></td>
														<td class="email-time">08:01 AM</td>
													</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="v-pills-draft" role="tabpanel">
										<div class="mail-body-content table-responsive">
											<table class="table">
												<tbody>
												<tr class="unread">
													<td>
														<div class="check-star">
															<div class="form-group d-inline">
																<div class="checkbox checkbox-primary checkbox-fill d-inline">
																	<input type="checkbox" name="checkbox-s-in-43" id="checkbox-s-infill-43">
																	<label for="checkbox-s-infill-43" class="cr"></label>
																</div>
															</div>
															<a href="#"><i class="feather icon-star ml-2"></i></a>
														</div>
													</td>
													<td><a href="email_read.html" class="email-name waves-effect">John Doe</a></td>
													<td><a href="email_read.html" class="email-name waves-effect">Coming Up Next Week</a></td>
													<td class="email-time">13:02 PM</td>
												</tr>
												<tr class="unread">
													<td>
														<div class="check-star">
															<div class="form-group d-inline">
																<div class="checkbox checkbox-primary checkbox-fill d-inline">
																	<input type="checkbox" name="checkbox-s-in-44" id="checkbox-s-infill-44">
																	<label for="checkbox-s-infill-44" class="cr"></label>
																</div>
															</div>
															<a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
														</div>
													</td>
													<td><a href="email_read.html" class="email-name waves-effect">Google Inc</a></td>
													<td>
														<a href="email_read.html" class="email-name waves-effect">Lorem ipsum dolor sit amet, consectetuer</a>
														<div><a href="#!" class="mail-attach"><i class="feather icon-image mr-2"></i>user.png</a>
															<a href="#!" class="mail-attach ml-2"><i class="feather icon-file-text mr-2"></i>file.doc</a>
														</div>
													</td>

													<td class="email-time">12:01 AM</td>
												</tr>
												<tr class="unread">
													<td>
														<div class="check-star">
															<div class="form-group d-inline">
																<div class="checkbox checkbox-primary checkbox-fill d-inline">
																	<input type="checkbox" name="checkbox-s-in-45" id="checkbox-s-infill-45">
																	<label for="checkbox-s-infill-45" class="cr"></label>
																</div>
															</div>
															<a href="#"><i class="feather icon-star ml-2"></i></a>
														</div>
													</td>
													<td><a href="email_read.html" class="email-name waves-effect">Sara Soudein</a></td>
													<td><a href="email_read.html" class="email-name waves-effect">SVG new updates comes for you</a></td>
													<td class="email-time">00:05 AM</td>
												</tr>
												<tr class="read">
													<td>
														<div class="check-star">
															<div class="form-group d-inline">
																<div class="checkbox checkbox-primary checkbox-fill d-inline">
																	<input type="checkbox" name="checkbox-s-in-46" id="checkbox-s-infill-46">
																	<label for="checkbox-s-infill-46" class="cr"></label>
																</div>
															</div>
															<a href="#"><i class="feather icon-star ml-2"></i></a>
														</div>
													</td>
													<td><a href="email_read.html" class="email-name waves-effect">Hanry Joseph</a></td>
													<td><a href="email_read.html" class="email-name waves-effect">SCSS current working for new updates</a></td>
													<td class="email-time">12:01 PM</td>
												</tr>
												<tr class="read">
													<td>
														<div class="check-star">
															<div class="form-group d-inline">
																<div class="checkbox checkbox-primary checkbox-fill d-inline">
																	<input type="checkbox" name="checkbox-s-in-47" id="checkbox-s-infill-47">
																	<label for="checkbox-s-infill-47" class="cr"></label>
																</div>
															</div>
															<a href="#"><i class="feather icon-star ml-2"></i></a>
														</div>
													</td>
													<td><a href="email_read.html" class="email-name waves-effect">Liu Koi Yan</a></td>
													<td><a href="email_read.html" class="email-name waves-effect">Charts waiting for you</a>
														<div><a href="#!" class="mail-attach"><i class="feather icon-film mr-2"></i>video</a></div>
													</td>
													<td class="email-time">07:15 AM</td>
												</tr>
												<tr class="read">
													<td>
														<div class="check-star">
															<div class="form-group d-inline">
																<div class="checkbox checkbox-primary checkbox-fill d-inline">
																	<input type="checkbox" name="checkbox-s-in-48" id="checkbox-s-infill-48">
																	<label for="checkbox-s-infill-48" class="cr"></label>
																</div>
															</div>
															<a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
														</div>
													</td>
													<td><a href="email_read.html" class="email-name waves-effect">Google Inc</a></td>
													<td><a href="email_read.html" class="email-name waves-effect">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a></td>
													<td class="email-time">08:01 AM</td>
												</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane fade" id="v-pills-mail" role="tabpanel">
										<div class="mail-body-content table-responsive">
											<table class="table">
												<tbody>
												<tr class="unread">
													<td>
														<div class="check-star">
															<div class="form-group d-inline">
																<div class="checkbox checkbox-primary checkbox-fill d-inline">
																	<input type="checkbox" name="checkbox-s-in-49" id="checkbox-s-infill-49">
																	<label for="checkbox-s-infill-49" class="cr"></label>
																</div>
															</div>
															<a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
														</div>
													</td>
													<td><a href="email_read.html" class="email-name waves-effect">Sara Soudein</a></td>
													<td><a href="email_read.html" class="email-name waves-effect">SVG new updates comes for you</a></td>
													<td class="email-time">00:05 AM</td>
												</tr>
												<tr class="read">
													<td>
														<div class="check-star">
															<div class="form-group d-inline">
																<div class="checkbox checkbox-primary checkbox-fill d-inline">
																	<input type="checkbox" name="checkbox-s-in-50" id="checkbox-s-infill-50">
																	<label for="checkbox-s-infill-50" class="cr"></label>
																</div>
															</div>
															<a href="#"><i class="feather icon-star ml-2"></i></a>
														</div>
													</td>
													<td><a href="email_read.html" class="email-name waves-effect">Hanry Joseph</a></td>
													<td><a href="email_read.html" class="email-name waves-effect">SCSS current working for new updates</a></td>
													<td class="email-time">12:01 PM</td>
												</tr>
												<tr class="unread">
													<td>
														<div class="check-star">
															<div class="form-group d-inline">
																<div class="checkbox checkbox-primary checkbox-fill d-inline">
																	<input type="checkbox" name="checkbox-s-in-51" id="checkbox-s-infill-51">
																	<label for="checkbox-s-infill-51" class="cr"></label>
																</div>
															</div>
															<a href="#"><i class="feather icon-star ml-2"></i></a>
														</div>
													</td>
													<td><a href="email_read.html" class="email-name waves-effect">John Doe</a></td>
													<td><a href="email_read.html" class="email-name waves-effect">Coming Up Next Week</a></td>
													<td class="email-time">13:02 PM</td>
												</tr>
												<tr class="unread">
													<td>
														<div class="check-star">
															<div class="form-group d-inline">
																<div class="checkbox checkbox-primary checkbox-fill d-inline">
																	<input type="checkbox" name="checkbox-s-in-52" id="checkbox-s-infill-52">
																	<label for="checkbox-s-infill-52" class="cr"></label>
																</div>
															</div>
															<a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
														</div>
													</td>
													<td><a href="email_read.html" class="email-name waves-effect">Google Inc</a></td>
													<td>
														<a href="email_read.html" class="email-name waves-effect">Lorem ipsum dolor sit amet, consectetuer</a>
														<div><a href="#!" class="mail-attach"><i class="feather icon-image mr-2"></i>user.png</a>
															<a href="#!" class="mail-attach ml-2"><i class="feather icon-file-text mr-2"></i>file.doc</a>
														</div>
													</td>

													<td class="email-time">12:01 AM</td>
												</tr>
												<tr class="read">
													<td>
														<div class="check-star">
															<div class="form-group d-inline">
																<div class="checkbox checkbox-primary checkbox-fill d-inline">
																	<input type="checkbox" name="checkbox-s-in-53" id="checkbox-s-infill-53">
																	<label for="checkbox-s-infill-53" class="cr"></label>
																</div>
															</div>
															<a href="#"><i class="feather icon-star ml-2"></i></a>
														</div>
													</td>
													<td><a href="email_read.html" class="email-name waves-effect">Liu Koi Yan</a></td>
													<td><a href="email_read.html" class="email-name waves-effect">Charts waiting for you</a>
														<div><a href="#!" class="mail-attach"><i class="feather icon-film mr-2"></i>video</a></div>
													</td>
													<td class="email-time">07:15 AM</td>
												</tr>
												<tr class="read">
													<td>
														<div class="check-star">
															<div class="form-group d-inline">
																<div class="checkbox checkbox-primary checkbox-fill d-inline">
																	<input type="checkbox" name="checkbox-s-in-54" id="checkbox-s-infill-54">
																	<label for="checkbox-s-infill-54" class="cr"></label>
																</div>
															</div>
															<a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
														</div>
													</td>
													<td><a href="email_read.html" class="email-name waves-effect">Google Inc</a></td>
													<td><a href="email_read.html" class="email-name waves-effect">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a></td>
													<td class="email-time">08:01 AM</td>
												</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane fade" id="v-pills-Trash" role="tabpanel">
										<div class="mail-body-content table-responsive">
											<table class="table">
												<tbody>
												<tr class="unread">
													<td>
														<div class="check-star">
															<div class="form-group d-inline">
																<div class="checkbox checkbox-primary checkbox-fill d-inline">
																	<input type="checkbox" name="checkbox-s-in-55" id="checkbox-s-infill-55">
																	<label for="checkbox-s-infill-55" class="cr"></label>
																</div>
															</div>
															<a href="#"><i class="feather icon-star ml-2"></i></a>
														</div>
													</td>
													<td><a href="email_read.html" class="email-name waves-effect">Liu Koi Yan</a></td>
													<td><a href="email_read.html" class="email-name waves-effect">Charts waiting for you</a>
														<div><a href="#!" class="mail-attach"><i class="feather icon-film mr-2"></i>video</a></div>
													</td>
													<td class="email-time">07:15 AM</td>
												</tr>
												<tr class="unread">
													<td>
														<div class="check-star">
															<div class="form-group d-inline">
																<div class="checkbox checkbox-primary checkbox-fill d-inline">
																	<input type="checkbox" name="checkbox-s-in-56" id="checkbox-s-infill-56">
																	<label for="checkbox-s-infill-56" class="cr"></label>
																</div>
															</div>
															<a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
														</div>
													</td>
													<td><a href="email_read.html" class="email-name waves-effect">Google Inc</a></td>
													<td><a href="email_read.html" class="email-name waves-effect">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a></td>
													<td class="email-time">08:01 AM</td>
												</tr>
												<tr class="unread">
													<td>
														<div class="check-star">
															<div class="form-group d-inline">
																<div class="checkbox checkbox-primary checkbox-fill d-inline">
																	<input type="checkbox" name="checkbox-s-in-57" id="checkbox-s-infill-57">
																	<label for="checkbox-s-infill-57" class="cr"></label>
																</div>
															</div>
															<a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
														</div>
													</td>
													<td><a href="email_read.html" class="email-name waves-effect">Sara Soudein</a></td>
													<td><a href="email_read.html" class="email-name waves-effect">SVG new updates comes for you</a></td>
													<td class="email-time">00:05 AM</td>
												</tr>
												<tr class="read">
													<td>
														<div class="check-star">
															<div class="form-group d-inline">
																<div class="checkbox checkbox-primary checkbox-fill d-inline">
																	<input type="checkbox" name="checkbox-s-in-58" id="checkbox-s-infill-58">
																	<label for="checkbox-s-infill-58" class="cr"></label>
																</div>
															</div>
															<a href="#"><i class="feather icon-star ml-2"></i></a>
														</div>
													</td>
													<td><a href="email_read.html" class="email-name waves-effect">Hanry Joseph</a></td>
													<td><a href="email_read.html" class="email-name waves-effect">SCSS current working for new updates</a></td>
													<td class="email-time">12:01 PM</td>
												</tr>
												<tr class="read">
													<td>
														<div class="check-star">
															<div class="form-group d-inline">
																<div class="checkbox checkbox-primary checkbox-fill d-inline">
																	<input type="checkbox" name="checkbox-s-in-59" id="checkbox-s-infill-59">
																	<label for="checkbox-s-infill-59" class="cr"></label>
																</div>
															</div>
															<a href="#"><i class="feather icon-star ml-2"></i></a>
														</div>
													</td>
													<td><a href="email_read.html" class="email-name waves-effect">John Doe</a></td>
													<td><a href="email_read.html" class="email-name waves-effect">Coming Up Next Week</a></td>
													<td class="email-time">13:02 PM</td>
												</tr>
												<tr class="read">
													<td>
														<div class="check-star">
															<div class="form-group d-inline">
																<div class="checkbox checkbox-primary checkbox-fill d-inline">
																	<input type="checkbox" name="checkbox-s-in-60" id="checkbox-s-infill-60">
																	<label for="checkbox-s-infill-60" class="cr"></label>
																</div>
															</div>
															<a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
														</div>
													</td>
													<td><a href="email_read.html" class="email-name waves-effect">Google Inc</a></td>
													<td>
														<a href="email_read.html" class="email-name waves-effect">Lorem ipsum dolor sit amet, consectetuer</a>
														<div><a href="#!" class="mail-attach"><i class="feather icon-image mr-2"></i>user.png</a>
															<a href="#!" class="mail-attach ml-2"><i class="feather icon-file-text mr-2"></i>file.doc</a>
														</div>
													</td>
													<td class="email-time">12:01 AM</td>
												</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<!-- [ inbox-right section ] end -->
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h5>Kirim Pesan</h5>
						<div class="card-header-right">
							<div class="btn-group card-option">
								<button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown"
										aria-haspopup="true" aria-expanded="false">
									<i class="feather icon-more-horizontal"></i>
								</button>
								<ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
									<li class="dropdown-item full-card"><a href="#!"><span><i
													class="feather icon-maximize"></i> maximize</span><span
												style="display:none"><i
													class="feather icon-minimize"></i> Restore</span></a></li>
									<li class="dropdown-item minimize-card"><a href="#!"><span><i
													class="feather icon-minus"></i> collapse</span><span
												style="display:none"><i class="feather icon-plus"></i> expand</span></a>
									</li>
									<li class="dropdown-item reload-card"><a href="#!"><i
												class="feather icon-refresh-cw"></i> reload</a></li>
									<li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i>
											remove</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="m-t-2 m-b-3" id="keterangan-pesan"></div>
						<button class="btn btn-sm btn-primary" data-toggle="collapse" data-target="#form-kirim" aria-expanded="false" aria-controls="form-kirim">
							Kirim Pesan
						</button>
						<div class="collapse" id="form-kirim">
							<form action="<?= site_url('dosen/kirim') ?>" id="pesan-dosen" method="post">
								<table class="table-borderless">
									<tr>
										<td><label for="" class="col-form-label">Penerima </label></td>
										<td>: &nbsp;</td>
										<td>
											<input type="text" name="penerima" id="input" class="form-control" required>
											<input type="text" name="id_penerima" id="id_penerima" class="form-control" hidden>
										</td>
									</tr>
									<tr>
										<td>Isi Pesan</td>
										<td>: &nbsp;</td>
										<td>
										<textarea name="pesan" id="mi" cols="30" rows="10"
												  class="form-control" required></textarea>
										</td>
									</tr>
								</table>
								<div class="mt-3">
									<button type="submit" class="btn btn-sm btn-primary">Kirim</button>
								</div>
							</form>
						</div>

						<div class="mt-5">
							<table id="list-kirim-pesan-dosen" class="table table-responsive table-borderless">
								<thead>
								<tr>
									<th>From</th>
									<th>To:</th>
									<th>Pesan</th>
									<th>Tanggal</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($pesanku->result_array() as $p) : ?>
									<tr>
										<td width="25%" class="sorting_1">
											<div class="d-inline-block align-middle">
												<img src="<?= base_url() ?>assets/magang/userfiles/<?= $p['foto_dsn'] ?>"
													 alt="Foto bimbingan" class="img-radius align-top m-r-15"
													 style="width:40px;">
												<div class="d-inline-block">
													<h6 class="m-b-0"><?= $p['np'] . ' ' . $p['nb'] ?></h6>
													<p class="m-b-0"><?= $p['email_dsn'] ?></p>
												</div>
											</div>
										</td>
										<td width="25%" class="sorting_1">
											<div class="d-inline-block align-middle">
												<img src="<?= base_url() ?>assets/magang/userfiles/<?= $p['foto_mhs'] ?>"
													 alt="Foto bimbingan" class="img-radius align-top m-r-15"
													 style="width:40px;">
												<div class="d-inline-block">
													<h6 class="m-b-0"><?= $p['napan'] . ' ' . $p['nabel'] ?></h6>
													<p class="m-b-0"><?= $p['email'] ?></p>
												</div>
											</div>
										</td>
										<td width="35%"><?= $p['isi_pesan'] ?></td>
										<td class="text-center"><?= tgl_jam_indo($p['tgl']) ?></td>
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- List Pesan -->
		<div class="row">
			<div class="col-sm-12">
				<div class="card">

					<div class="card-header">
						<h5>Daftar Pesan Baru</h5>
						<div class="card-header-right">
							<div class="btn-group card-option">
								<button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown"
										aria-haspopup="true" aria-expanded="false">
									<i class="feather icon-more-horizontal"></i>
								</button>
								<ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
									<li class="dropdown-item full-card"><a href="#!"><span><i
													class="feather icon-maximize"></i> maximize</span><span
												style="display:none"><i
													class="feather icon-minimize"></i> Restore</span></a></li>
									<li class="dropdown-item minimize-card"><a href="#!"><span><i
													class="feather icon-minus"></i> collapse</span><span
												style="display:none"><i class="feather icon-plus"></i> expand</span></a>
									</li>
									<li class="dropdown-item reload-card"><a href="#!"><i
												class="feather icon-refresh-cw"></i> reload</a></li>
									<li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i>
											remove</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="card-body">
						<table id="tabel-dosen-list-pesan" class="table table-hover dataTable nowrap table-responsive">
							<thead>
							<tr>
								<th width="5%" class="text-center">No</th>
								<th width="20%">Pengirim</th>
								<th>Isi Pesan</th>
								<th class="text-center">Jumlah</th>
								<th width="10%" class="text-center">Tanggal</th>
								<th width="5%" class="text-center">Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$data = $list_pesan->row_array();
							if($data['napan'] == null) { ?>
								<tr>
									<td class="text-center">Data Kosong</td>
								</tr>
							<?php }else{ ?>
								<?php
								$no = 1;
								foreach ($list_pesan->result_array() as $p) : ?>
									<tr>
										<td class="text-center"><?= $no++ ?></td>
										<td class="sorting_1">
											<div class="d-inline-block align-middle">
												<img src="<?= base_url() ?>assets/magang/userfiles/<?= $p['foto_mhs'] ?>"
													 alt="Foto bimbingan" class="img-radius align-top m-r-15"
													 style="width:40px;">
												<div class="d-inline-block">
													<h6 class="m-b-0"><?= $p['napan'] . ' ' . $p['nabel'] ?></h6>
													<p class="m-b-0"><?= $p['email_mhs'] ?></p>
												</div>
											</div>
										</td>
										<td><?= $p['isi_pesan'] ?></td>
										<td class="text-center"><?= $p['total'] ?></td>
										<td class="text-center"><?= tgl_jam_indo($p['tgl']) ?></td>
										<td>
											<a class="btn btn-sm btn-primary" href="<?= site_url('dosen/detail_pesan') ?>/<?= $p['id_p'] ?>">Lihat</a>
										</td>
									</tr>
								<?php endforeach; ?>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Main content-->
</div>
