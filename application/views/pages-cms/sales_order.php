<style>
	.form-err {
		color: #F25961;
		display: none;
	}

	.so-text-bold {
		font-weight: bold;
		color: #16566b;
	}

	.so-hyperlink {
		text-decoration: none;
		color: #16566b;
	}

	.trans-unpaid {
		color: green;
	}

	.trans-paid {
		color: #16566b;
	}

	.trans-canceled {
		color: teal;
	}

	.trans-done {
		color: chartreuse;
	}

	.trans-unknown {
		color: plum;
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
							<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addSalesModal">
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
										<th>No.</th>
										<th>Nomor PO</th>
										<th>Surat Jalan</th>
										<th>Bukti Penerimaan</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($sales->result() as $data) { ?>
										<tr>
											<td><?php echo $counter++; ?></td>
											<td>
												<div class="row">
													<div class="col-12">
														<span class="so-text-bold w-50 text-align-left">No Po</span>
														<span class="w-50 text-align-left">: <?php echo $data->PO_NO; ?></span>
													</div>
													<div class="col-12">
														<span class="so-text-bold">Tanggal PO</span> : <?php echo date("d M Y", strtotime($data->PO_DATE)); ?>
													</div>
													<div class="col-12">
														<span class="so-text-bold">File PO</span> : <a class="so-hyperlink" target="_blank" href="<?php echo base_url('assets/doc/' . $data->PO_FILE); ?>">Unduh File</a>
													</div>
												</div>
											</td>
											<td>
												<div class="row">
													<div class="col-12">
														<span class="so-text-bold">Tanggal Kirim</span> : <?php echo ($data->DO_DATE == null ? '-' : date("d M Y", strtotime($data->DO_DATE))); ?>
													</div>
													<div class="col-12">
														<span class="so-text-bold">File Surat Jalan</span> :
													</div>
													<div class="col-12">
														<?php if ($data->DO_FILE == null) { ?>
															<a class="so-hyperlink" id="fileSJ" href="<?php echo '#'; ?>">-</a>
														<?php } else { ?>
															<a class="so-hyperlink" target="_blank" id="fileSJ" href="<?php echo base_url('assets/doc/' . $data->DO_FILE); ?>">Unduh File</a>
														<?php } ?>
													</div>
												</div>
											</td>
											<td>
												<div class="row">
													<div class="col-12">
														<span class="so-text-bold">Tanggal Diterima</span> : <?php echo ($data->INVOICE_DATE == null ? '-' : date("d M Y", strtotime($data->INVOICE_DATE))); ?>
													</div>
													<div class="col-12">
														<span class="so-text-bold">File Bukti Diterima</span> :
													</div>
													<div class="col-12">
														<?php if ($data->INVOICE_FILE == null) { ?>
															<a class="so-hyperlink" id="fileInv" href="<?php echo '#'; ?>">-</a>
														<?php } else { ?>
															<a class="so-hyperlink" target="_blank" id="fileInv" href="<?php echo base_url('assets/doc/' . $data->INVOICE_FILE); ?>">Unduh File</a>
														<?php } ?>
													</div>
												</div>
											</td>
											<td>
												<?php
												$colorCode;

												switch ($data->SO_STATUS) {
													case 'UNPAID':
														$colorCode = 'trans-unpaid';
														break;
													case 'PAID':
														$colorCode = 'trans-paid';
														break;
													case 'CANCELED':
														$colorCode = 'trans-canceled';
														break;
													case 'DONE':
														$colorCode = 'trans-done';
														break;
													default:
														$colorCode = 'trans-unknown';
														break;
												}
												?>
												<div class="row">
													<div class="col-12">
														<span class="font-weight-bold <?php echo $colorCode; ?>"><?php echo $data->SO_STATUS; ?></span>
													</div>
												</div>
											</td>
											<td>
												<button class="btn btn-icon btn-round btn-info btn-edit-so" data-sodate="<?php echo date("Y-m-d", strtotime($data->PO_DATE)); ?>" data-sjdate="<?php echo ($data->DO_DATE == null ? '' : date("Y-m-d", strtotime($data->DO_DATE))); ?>" data-indate="<?php echo ($data->INVOICE_DATE == null ? '' : date("Y-m-d", strtotime($data->INVOICE_DATE))); ?>" data-sono="<?php echo $data->PO_NO; ?>" data-toggle="tooltip" data-placement="top" title="Update Sales Order">
													<i class="fa fa-align-left"></i>
												</button>
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


<div class="modal fade" id="updateSalesModal" tabindex="-1" role="dialog" aria-hidden="true">
	<form id="formUpdateSO" enctype="multipart/form-data">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">
						<span class="fw-mediumbold">
							Update</span>
						<span class="fw-light">
							Sales Order
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
								<label>Nomor PO</label>
								<input id="editPO" name="editPO" type="text" class="form-control" readonly>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>Tanggal Terima PO</label>
								<input id="editDatePO" name="editDatePO" type="date" class="form-control" readonly>
							</div>
						</div>
						<div class="col-sm-12">
							<hr>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>Tanggal Surat Jalan</label>
								<input id="editSJPO" name="editSJPO" type="date" class="form-control">
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>File Surat Jalan</label>
								<div class="mt-2 dropzone" id="dz-SJ">
									<div class="dz-message" data-dz-message>
										<span class="d-flex justify-content-center">Klik / drag file untuk memulai proses upload </span>
									</div>
								</div>
								<small id="sjHelp" class="form-err form-text">File tidak boleh kosong</small>
							</div>
						</div>
						<div class="col-sm-12">
							<hr>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>Tanggal Penerimaan</label>
								<input id="editInvoicePO" name="editInvoicePO" type="date" class="form-control">
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>File Penerimaan</label>
								<div class="mt-2 dropzone" id="dz-invoice">
									<div class="dz-message" data-dz-message>
										<span class="d-flex justify-content-center">Klik / drag file untuk memulai proses upload </span>
									</div>
								</div>
								<small id="invoiceHelp" class="form-err form-text">File tidak boleh kosong</small>
							</div>
						</div>

					</div>

				</div>
				<div class="modal-footer no-bd">
					<button type="submit" id="updateRowButton" class="btn btn-primary">Update</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</form>
</div>

<div class="modal fade" id="addSalesModal" tabindex="-1" role="dialog" aria-hidden="true">
	<form id="formAddSO" enctype="multipart/form-data">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">
						<span class="fw-mediumbold">
							Tambah</span>
						<span class="fw-light">
							Sales Order Baru
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
								<label>Nomor PO</label>
								<input id="salesPO" name="salesPO" type="text" class="form-control" placeholder="Di isi dengan nomor PO">
								<small id="salesPO" class="form-err form-text">Nomor PO tidak boleh kosong</small>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>Tanggal Terima PO</label>
								<input id="salesCreatePO" name="salesCreatePO" type="date" class="form-control">
								<small id="salesCreatePO" class="form-err form-text">Tanggal PO tidak boleh kosong</small>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label>File PDF PO</label>
								<div class="mt-2 dropzone" id="dz-document">
									<!-- <div class="dz-default dz-message"></div> -->
									<div class="dz-message" data-dz-message>
										<span class="d-flex justify-content-center">Klik / drag file untuk memulai proses upload </span>
									</div>

								</div>
								<small id="imageHelp" class="form-err form-text">File tidak boleh kosong</small>
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