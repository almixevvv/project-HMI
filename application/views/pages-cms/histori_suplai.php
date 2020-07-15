<div class="main-panel">
	<div class="content">
		<div class="panel-header" style="background-image: url('<?php echo base_url('assets/img/intro-carousel/original/BACKGROUND 1.jpg');?>');background-size: cover;background-position: center;background-repeat: no-repeat;">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h2 class="pb-2 fw-bold" style="color: #16566b">Haluan Maritim Internasional CMS</h2>
						<h5 class="op-7 mb-2 fw-bold" style="color: #16566b">Histori Suplai</h5>
					</div>
				</div>
			</div>
		</div>
		<div class="page-inner mt--5">
			<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<!-- <h4 class="card-title">Histori Suplai</h4> -->
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
											Tambah Histori Suplai
										</button>
									</div>
								</div>
								<div class="card-body">
									<!-- Modal -->
									<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														New</span> 
														<span class="fw-light">
															Row
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p class="small">Create a new row using this form, make sure you fill them all</p>
													<form>
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Name</label>
																	<input id="addName" type="text" class="form-control" placeholder="fill name">
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Position</label>
																	<input id="addPosition" type="text" class="form-control" placeholder="fill position">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Office</label>
																	<input id="addOffice" type="text" class="form-control" placeholder="fill office">
																</div>
															</div>
														</div>
													</form>
												</div>
												<div class="modal-footer no-bd">
													<button type="button" id="addRowButton" class="btn btn-primary">Add</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th style="width: 10%">No.</th>
													<th style="width: 30%">Gambar</th>
													<th style="width: 30%">Deskripsi</th>
													<th style="width: 20%">Info</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td><img src="<?php echo base_url('assets/img/histori-suplai/EXAMPLE-1.png'); ?>" alt="" class="img-fluid" style="width: 40%;"></td>
													<td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
													</td>
													<td>
														<label style="width: 5em;">Created</label> : <label style="color: #16566b; font-weight: bold;">14 Juli 2020</label><br>
														<label style="width: 5em;">Updated</label> : <label style="color: #16566b; font-weight: bold;">15 Juli 2020</label>
													</td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</button>
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="fa fa-times"></i>
															</button>
														</div>
													</td>
												</tr>
												<tr>
													<td>2</td>
													<td><img src="<?php echo base_url('assets/img/histori-suplai/EXAMPLE-2.png'); ?>" alt="" class="img-fluid" style="width: 40%;"></td>
													<td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
													</td>
													<td>
														<label style="width: 5em;">Created</label> : <label style="color: #16566b; font-weight: bold;">14 Juli 2020</label><br>
														<label style="width: 5em;">Updated</label> : <label style="color: #16566b; font-weight: bold;">15 Juli 2020</label>
													</td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</button>
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="fa fa-times"></i>
															</button>
														</div>
													</td>
												</tr>
												<tr>
													<td>3</td>
													<td><img src="<?php echo base_url('assets/img/histori-suplai/EXAMPLE-3.png'); ?>" alt="" class="img-fluid" style="width: 40%;"></td>
													<td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
													</td>
													<td>
														<label style="width: 5em;">Created</label> : <label style="color: #16566b; font-weight: bold;">14 Juli 2020</label><br>
														<label style="width: 5em;">Updated</label> : <label style="color: #16566b; font-weight: bold;">15 Juli 2020</label>
													</td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</button>
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="fa fa-times"></i>
															</button>
														</div>
													</td>
												</tr>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
			
		</div>
	</div>

	<?php $this->load->view('templates-cms/copyright'); ?>

</div>