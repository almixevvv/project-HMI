<style>
	.form-err {
		color: #F25961;
		display: none;
	}

	.dropzone {
		padding: 30px 20px 25px !important;
		border: 2px dashed rgba(0, 0, 0, 0.13) !important;
		background: transparent !important;
	}
</style>

<div class="main-panel">
	<div class="content">
		<div class="panel-header" style="background-image: url('<?php echo base_url('assets/img/intro-carousel/original/BACKGROUND 1.jpg'); ?>');background-size: cover;background-position: center;background-repeat: no-repeat;">
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
						<div class="table-responsive">
							<table id="add-row" class="display table table-striped table-hover">
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
									<?php foreach ($history->result() as $data) { ?>
										<tr>

											<td><?php echo $counter++; ?></td>
											<td>
												<img src="<?php echo base_url('assets/img/histori-suplai/' . $data->IMAGE); ?>" alt="<?php echo $data->DESCRIPTION; ?>" class="img-fluid">
											</td>
											<td>
												Name : <br>
												<b><?php echo $data->NAME; ?></b><br><br>
												Detail :<br>
												<b><?php echo $data->DESCRIPTION; ?></b>
											</td>
											<td>
												<?php
												$createDate = strtotime($data->CREATED);
												$updateDate = strtotime($data->UPDATED);
												?>
												<label style="width: 5em;">Created</label> : <label style="color: #16566b; font-weight: bold;"><?php echo date('l, j F Y H:i:s', $createDate); ?></label><br>
												<label style="width: 5em;">Updated</label> : <label style="color: #16566b; font-weight: bold;"> <?php echo ($updateDate != null ? date('l, j F Y H:i:s', $updateDate) : ' -'); ?></label>
											</td>
											<td>
												<div class="form-button-action">
													<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Suplai" onclick='editModal("<?php echo $data->REC_ID; ?>")'>
														<i class="fa fa-edit"></i>
													</button>
													<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus Suplai" onclick='deleteData("<?php echo $data->REC_ID; ?>")'>
														<i class="fa fa-times"></i>
													</button>
												</div>
											</td>
										</tr>
									<?php } ?>
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
<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
	<form id="formHistory" enctype="multipart/form-data">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">
						<span class="fw-mediumbold">
							Tambah</span>
						<span class="fw-light">
							Suplai Baru
						</span>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Nama Suplai</label>
								<input id="supplyName" name="supplyName" type="text" class="form-control" placeholder="Di isi dengan nama suplai">
								<small id="nameHelp" class="form-err form-text">Nama suplai tidak boleh kosong</small>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>Detail Suplai</label>
								<input id="supplyDetail" name="supplyDetail" type="text" class="form-control" placeholder="Di isi dengan detail suplai">
								<small id="detailHelp" class="form-err form-text">Detail suplai tidak boleh kosong</small>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>Gambar Suplai</label>
								<div class="mt-2 dropzone" id="dz-upload">
									<div class="dz-message" data-dz-message>
										<span class="d-flex justify-content-center">Klik / drag gambar untuk memulai proses upload </span>
									</div>
								</div>
								<small id="imageHelp" class="form-err form-text">Gambar tidak boleh kosong</small>
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer no-bd">
					<button type="submit" id="addRowButton" class="btn btn-primary">Tambah</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</form>
</div>

<div class="modal fade" id="editRowModal" tabindex="-1" role="dialog" aria-hidden="true">
	<form id="formUpdate" enctype="multipart/form-data">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">
						<span class="fw-mediumbold">
							Edit</span>
						<span class="fw-light">
							Suplai
						</span>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Nama Suplai</label>
								<input id="editName" name="editName" type="text" class="form-control">
								<small id="editNameHelp" class="form-err form-text">Nama suplai tidak boleh kosong</small>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>Detail Suplai</label>
								<input id="editDetail" name="editDetail" type="text" class="form-control">
								<small id="editDetailHelp" class="form-err form-text">Detail suplai tidak boleh kosong</small>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>Gambar Suplai</label>
								<div class="mt-2 dropzone" id="dz-existing">
									<div class="dz-message" data-dz-message>
									</div>
								</div>
							</div>
						</div>
						<input id="editID" name="editID" type="hidden" class="form-control">
					</div>
				</div>
				<div class="modal-footer no-bd">
					<button type="submit" id="editButton" class="btn btn-primary">Edit</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="reloadPage()">Tutup</button>
				</div>

			</div>
		</div>
	</form>
</div>