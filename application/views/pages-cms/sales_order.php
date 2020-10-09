<style>
	.form-err {
		color: #F25961;
		display: none;
	}
</style>

<div class="main-panel">
	<div class="content">
		<div class="panel-header" style="background-image: url('<?php echo base_url('assets/img/intro-carousel/original/BACKGROUND 1.jpg'); ?>');background-size: cover;background-position: center;background-repeat: no-repeat;">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h2 class="pb-2 fw-bold" style="color: #16566b">Haluan Maritim Internasional CMS</h2>
						<h5 class="op-7 mb-2 fw-bold" style="color: #16566b">Sales Order</h5>
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
								Tambah Sales Order
							</button>
						</div>
					</div>
					<div class="card-body">
						<!-- Modal -->
						<div class="table-responsive">
							<table id="add-row" class="display table table-striped table-hover">
								<thead>
									<tr>
										<th style="width: 1%">No.</th>
										<th style="width: 20%">PO</th>
										<th style="width: 20%">Surat Jalan</th>
										<th style="width: 20%">Pembayaran</th>
										<th style="width: 20%">Bukti Penerimaan</th>
										<th style="width: 10%">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($sales->result() as $data) { ?>
										<tr>
											<td><?php echo $counter++; ?></td>
											<td>
												<label style="width: 6em;">No PO</label>:<label style="font-weight: bold;color: #16566b;"><?php echo $data->PO_NO; ?></label><br>
												<label style="width: 6em;">Tanggal PO</label>:<label style="font-weight: bold;color: #16566b;"><?php echo date("d M Y", strtotime($data->PO_DATE)); ?></label><br>
												<label style="width: 6em;">File PO</label>:<label><?php echo $data->FILE_PO; ?></label>
											</td>
											<td>
												<label style="width: 8em;">Tanggal Kirim</label>:<label style="font-weight: bold;color: #16566b;"><?php echo date("d M Y", strtotime($data->DO_DATE)); ?></label><br>
												<label style="width: 8em;">File Surat Jalan</label>:<label><?php echo $data->FILE_DO; ?></label>
											</td>
											<td>
												<?php if($data->STATUS == 'SUDAH BAYAR'):?>
													<label style="width: 6em;">Status</label>:<label style="font-weight: bold;color: green;"><?php echo $data->STATUS; ?></label><br>
												<?php else:?>
													<label style="width: 6em;">Status</label>:<label style="font-weight: bold;color: red;"><?php echo $data->STATUS; ?></label><br>
												<?php endif;?>
												<label style="width: 6em;">File Invoice</label>:<label><?php echo $data->FILE_INVOICE; ?></label>
											</td>
											<td>
												<label><?php echo $data->FILE_TERIMA; ?></label>
											</td>
											<td>
												
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
									<!-- <div class="dz-default dz-message"></div> -->
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
	<form id="formUpdate">
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
								<img id="editImage" class="img-fluid mx-auto">
							</div>
						</div>
						<input id="editID" name="editID" type="hidden" class="form-control">
					</div>
				</div>
				<div class="modal-footer no-bd">
					<button type="submit" id="editButton" class="btn btn-primary">Edit</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
				</div>

			</div>
		</div>
	</form>
</div>