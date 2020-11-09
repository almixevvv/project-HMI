<div class="wrapper">

	<div class="main-header">
		<!-- Logo Header -->
		<div class="logo-header" data-background-color="white">

			<a href="<?php echo base_url('cms/dashboard'); ?>" class="logo">
				<img src="<?php echo base_url('assets/img/logo/Haluan_Maritim_FullLogo.png'); ?>" alt="navbar brand" class="navbar-brand" style="width: 90%;">
			</a>
			<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon">
					<i class="icon-menu"></i>
				</span>
			</button>
			<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
			<div class="nav-toggle">
				<button class="btn btn-toggle toggle-sidebar">
					<i class="icon-menu"></i>
				</button>
			</div>
		</div>
		<!-- End Logo Header -->

		<!-- Navbar Header -->
		<nav class="navbar navbar-header navbar-expand-lg" style="background-color: #16566b;">

			<div class="container-fluid">
				<div class="collapse" id="search-nav">
					<label class="text-white op-7">"Jangan Sungkan Untuk Menghubungi Kami, Kami Siap Membantu Untuk Segala Kebutuhan Kapal Anda."</label>
				</div>
				<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
					<li class="nav-item dropdown hidden-caret">
						<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-bell"></i>
							<span class="notification message-counter d-none" id="counter-icon"></span>
						</a>
						<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
							<li>
								<div class="dropdown-title d-none" id="counter-message">Anda memiliki <span class="message-counter"></span> transaksi yang belum terbayar</div>
							</li>
							<li>
								<div class="notif-scroll scrollbar-outer">
									<div class="notif-center" id="notif-container">
									</div>
								</div>
							</li>
						</ul>
					</li>
					<li class="nav-item dropdown hidden-caret">
						<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
							<div class="avatar-sm">
								<img src="<?php echo base_url('assets/cms/img/haggen.png'); ?>" alt="..." class="avatar-img rounded-circle">
							</div>
						</a>
						<ul class="dropdown-menu dropdown-user animated fadeIn">
							<div class="dropdown-user-scroll scrollbar-outer">
								<li>
									<div class="user-box">
										<div class="avatar-lg"><img src="<?php echo base_url('assets/cms/img/haggen.png'); ?>" alt="image profile" class="avatar-img rounded"></div>
										<div class="u-text">
											<h4><?php
												echo $this->session->userdata('NAME');
												?></h4>
											<p class="text-muted"><?php
																	echo $this->session->userdata('GROUP_ID');
																	?></p>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" id="btnLogout">Logout</a>
								</li>
							</div>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
		<!-- End Navbar -->
	</div>