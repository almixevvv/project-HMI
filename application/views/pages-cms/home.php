<div class="main-panel">
	<div class="content">
		<div class="panel-header" style="background-image: url('<?php echo base_url('assets/img/intro-carousel/original/BACKGROUND 1.jpg');?>');background-size: cover;background-position: center;background-repeat: no-repeat;">
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
						<div class="card-opening">Hello <?php echo $this->session->userdata('NAME');?>,</div>
						<div class="card-desc">
							Selamat datang di halaman Website Content Management System PT Haluan Maritim Internasional!
						</div>
						<div class="card-detail">
							<a href="<?php echo base_url('cms/histori_suplai'); ?>">
								<div class="btn btn-light btn-rounded" style="width: 20%">Histori Suplai</div>
							</a>&nbsp;&nbsp;
							<a href="<?php echo base_url('cms/histori_suplai'); ?>">
								<div class="btn btn-light btn-rounded" style="width: 20%">Client</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="card full-height">
						<div class="card-header">
							<div class="card-title">Histori Suplai</div>
						</div>
						<div class="card-body">
							<ol class="activity-feed">
								<li class="feed-item feed-item-secondary">
									<time class="date" datetime="9-25">Sep 25</time>
									<span class="text">Responded to need <a href="#">"Volunteer opportunity"</a></span>
								</li>
								<li class="feed-item feed-item-success">
									<time class="date" datetime="9-24">Sep 24</time>
									<span class="text">Added an interest <a href="#">"Volunteer Activities"</a></span>
								</li>
								<li class="feed-item feed-item-info">
									<time class="date" datetime="9-23">Sep 23</time>
									<span class="text">Joined the group <a href="single-group.php">"Boardsmanship Forum"</a></span>
								</li>
								<li class="feed-item feed-item-warning">
									<time class="date" datetime="9-21">Sep 21</time>
									<span class="text">Responded to need <a href="#">"In-Kind Opportunity"</a></span>
								</li>
								<li class="feed-item feed-item-danger">
									<time class="date" datetime="9-18">Sep 18</time>
									<span class="text">Created need <a href="#">"Volunteer Opportunity"</a></span>
								</li>
								<li class="feed-item">
									<time class="date" datetime="9-17">Sep 17</time>
									<span class="text">Attending the event <a href="single-event.php">"Some New Event"</a></span>
								</li>
							</ol>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card full-height">
						<div class="card-header">
							<div class="card-head-row">
								<div class="card-title">Messages</div>
								<div class="card-tools">
									<ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
										<li class="nav-item">
											<a class="nav-link" id="pills-today" data-toggle="pill" href="#pills-today" role="tab" aria-selected="true">Today</a>
										</li>
										<li class="nav-item">
											<a class="nav-link active" id="pills-week" data-toggle="pill" href="#pills-week" role="tab" aria-selected="false">Week</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="pills-month" data-toggle="pill" href="#pills-month" role="tab" aria-selected="false">Month</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="d-flex">
								<div class="avatar avatar-online">
									<span class="avatar-title rounded-circle border border-white bg-info">J</span>
								</div>
								<div class="flex-1 ml-3 pt-1">
									<h6 class="text-uppercase fw-bold mb-1">Joko Subianto <span class="text-warning pl-3">pending</span></h6>
									<span class="text-muted">I am facing some trouble with my viewport. When i start my</span>
								</div>
								<div class="float-right pt-1">
									<small class="text-muted">8:40 PM</small>
								</div>
							</div>
							<div class="separator-dashed"></div>
							<div class="d-flex">
								<div class="avatar avatar-offline">
									<span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
								</div>
								<div class="flex-1 ml-3 pt-1">
									<h6 class="text-uppercase fw-bold mb-1">Prabowo Widodo <span class="text-success pl-3">open</span></h6>
									<span class="text-muted">I have some query regarding the license issue.</span>
								</div>
								<div class="float-right pt-1">
									<small class="text-muted">1 Day Ago</small>
								</div>
							</div>
							<div class="separator-dashed"></div>
							<div class="d-flex">
								<div class="avatar avatar-away">
									<span class="avatar-title rounded-circle border border-white bg-danger">L</span>
								</div>
								<div class="flex-1 ml-3 pt-1">
									<h6 class="text-uppercase fw-bold mb-1">Lee Chong Wei <span class="text-muted pl-3">closed</span></h6>
									<span class="text-muted">Is there any update plan for RTL version near future?</span>
								</div>
								<div class="float-right pt-1">
									<small class="text-muted">2 Days Ago</small>
								</div>
							</div>
							<div class="separator-dashed"></div>
							<div class="d-flex">
								<div class="avatar avatar-offline">
									<span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
								</div>
								<div class="flex-1 ml-3 pt-1">
									<h6 class="text-uppercase fw-bold mb-1">Peter Parker <span class="text-success pl-3">open</span></h6>
									<span class="text-muted">I have some query regarding the license issue.</span>
								</div>
								<div class="float-right pt-1">
									<small class="text-muted">2 Day Ago</small>
								</div>
							</div>
							<div class="separator-dashed"></div>
							<div class="d-flex">
								<div class="avatar avatar-away">
									<span class="avatar-title rounded-circle border border-white bg-danger">L</span>
								</div>
								<div class="flex-1 ml-3 pt-1">
									<h6 class="text-uppercase fw-bold mb-1">Logan Paul <span class="text-muted pl-3">closed</span></h6>
									<span class="text-muted">Is there any update plan for RTL version near future?</span>
								</div>
								<div class="float-right pt-1">
									<small class="text-muted">2 Days Ago</small>
								</div>
							</div>
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
										<h4 class="card-title">3</h4>
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