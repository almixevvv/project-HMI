<div class="main-panel">
	<div class="content">
		<div class="panel-header" style="background-image: url('<?php echo base_url('assets/img/intro-carousel/original/BACKGROUND 1.jpg'); ?>');background-size: cover;background-position: center;background-repeat: no-repeat;">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h2 class="pb-2 fw-bold" style="color: #16566b">Haluan Maritim Internasional CMS</h2>
						<h5 class="op-7 mb-2 fw-bold" style="color: #16566b">Dashboard</h5>
					</div>
				</div>
			</div>
		</div>
		<div class="page-inner mt--5">
			<div class="row mt--2">
				<div class="card card-info card-annoucement card-round">
					<div class="card-body text-center">
						<div class="card-opening">Hello <?php echo $this->session->userdata('NAME'); ?>,</div>
						<div class="card-desc">
							Selamat datang di halaman Website Content Management System PT Haluan Maritim Internasional!
						</div>
						<div class="card-detail">
							<a href="<?php echo base_url('cms/history'); ?>">
								<div class="btn btn-light btn-rounded" style="width: 20%">Histori Suplai</div>
							</a>&nbsp;&nbsp;
							<a href="<?php echo base_url('cms/sales'); ?>">
								<div class="btn btn-light btn-rounded" style="width: 20%">Sales Order</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="card full-height">
						<div class="card-header">
							<div class="card-title">Histori Sistem</div>
						</div>
						<div class="card-body">
							<ol class="activity-feed">
								<?php
								$colorArray = array(
									'feed-item-secondary',
									'feed-item-success',
									'feed-item-info',
									'feed-item-warning',
									'feed-item-danger'
								);

								foreach ($queryHistory->result() as $data) {
									$randIndex = array_rand($colorArray);
									$createDate = strtotime($data->CREATED_AT);

									switch ($data->ACTION_TYPE) {
										case 'UPDATE':
											$action = 'merubah';
											break;
										case 'POST':
											$action = 'menambahkan';
											break;
										case 'DELETE':
											$action = 'menghapus';
											break;
										default:
											$action = ' ';
											break;
									}
								?>
									<li class="feed-item feed-item-danger">
										<time class="date" datetime="<?php echo date('m-j', $createDate); ?>"><?php echo date('M j g:i a', $createDate); ?></time>
										<span class="text"> <strong><?php echo $data->USER_ID; ?></strong> <?php echo $action; ?> <strong><?php echo $data->ACTION_DATA; ?></strong> </span>
									</li>
								<?php } ?>
							</ol>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card full-height">
						<div class="card-header">
							<div class="card-head-row">
								<div class="card-title">Pesan</div>
							</div>
						</div>
						<div class="card-body">
							<?php

							$backArray = array(
								'bg-info',
								'bg-secondary',
								'bg-primary',
								'bg-danger',
							);

							if ($unreadMessages->num_rows() == 0) {
							?>

								<div class="d-flex justify-content-center">
									<div class="pt-5">
										<h4 style="-webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none; color: #23232375; font-style: italic;">Tidak ada pesan baru</h4>
									</div>

								</div>

								<?php } else {
								foreach ($unreadMessages->result() as $data) {
									$randIndex = array_rand($backArray);
									$createDate = strtotime($data->CREATED_AT);
								?>
									<a href="#" class="message-popup" style="text-decoration: none;" data-sender="<?php echo $data->MESSAGE_SENDER_NAME; ?>" data-email="<?php echo $data->MESSAGE_SENDER; ?>" data-message="<?php echo $data->MESSAGE_BODY; ?>" data-recid="<?php echo $data->REC_ID; ?>">
										<div class="d-flex">
											<div class="avatar avatar-online">
												<span class="avatar-title rounded-circle border border-white <?php echo $backArray[$randIndex]; ?>"><?php echo ucwords($data->MESSAGE_SENDER_NAME[0]); ?></span>
											</div>
											<div class="flex-1 ml-3 pt-1">
												<h6 class="text-uppercase fw-bold mb-1"><?php echo $data->MESSAGE_SENDER_NAME; ?> <span class="text-warning pl-3"><?php echo ($data->STATUS == 'ACTIVE' ? 'UNREAD' : 'READ'); ?></span></h6>
												<span class="text-muted"><?php echo $data->MESSAGE_TITLE; ?></span>
											</div>
											<div class="float-right pt-1">
												<small class="text-muted"><?php echo date('F j, Y, g:i a', $createDate); ?></small>
											</div>
										</div>
									</a>
									<div class="separator-dashed"></div>
							<?php
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-md-6">
					<div class="card card-stats card-info card-round">
						<div class="card-body">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="flaticon-interface-6"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">Histori Suplai</p>
										<h4 class="card-title"><?php echo $totalHistory->num_rows(); ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-6">
					<div class="card card-stats card-primary card-round">
						<div class="card-body">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="flaticon-users"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">Client</p>
										<h4 class="card-title">2</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view('templates-cms/copyright'); ?>

</div>