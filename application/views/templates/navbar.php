<header id="header">
    <div id="upper-navbar" class="container-fluid pl-0 pr-0 d-none d-md-none d-lg-block d-xl-block">
        <div class="bg-white">
            <div class="row">
                <div class="col-4">
                    <div id="logo">
                        <a href="<?php echo $this->uri->segment(1, 0) != 0 ? '#intro' : base_url('#intro'); ?>">
                            <img class=" w-50 pt-3 pb-3 ml-5" src="<?php echo base_url('assets/img/logo/Haluan_Maritim_FullLogo.png'); ?>" alt="HMI Logo" title="HMI Main Logo" style="margin-top: -5px;" />
                        </a>
                    </div>
                </div>
                <div class="col-8 d-flex justify-content-end">
                    <ul class="list-inline mb-0 pt-3 ml-5 pr-5">
                        <li class="list-inline-item mr-4">
                            <h6 class="text-primary mb-0">
                                <i class="fa fa-phone text-primary mr-2"></i> Hubungi Kami</h6>
                            <span>
                                <a class="btn pt-1" href="tel:021-536-51-222" style="color: #a7a7a7;"> (+62) 8111 369 153</a>
                            </span>
                        </li>
                        <li class="list-inline-item mr-4">
                            <h6 class="text-primary mb-0">
                                <i class="fab fa-whatsapp fa-1x mr-2" style="color: #00b011;"></i>WhatsApp</h6>
                            <span>
                                <a class="btn pt-1" href="https://web.whatsapp.com/send?phone=+62111369153" target="_blank">
                                    (+62) 8111 369 153</a></span>
                        </li>
                        <li class="list-inline-item mr-4">
                            <h6 class="text-primary mb-0">
                                <i class="fas fa-envelope text-primary mr-2"></i> Email</h6>
                            <span><a class="btn pt-1" href="#">
                                    info@haluanmaritim.com</a></span>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="bottom-navbar" class="container-fluid pt-3">
        <div id="logo" class="d-block d-lg-none pull-left ml-3">
            <a href="#intro">
                <img src="<?php echo base_url('assets/img/logo/Haluan_Maritim_FullLogo.png'); ?>" alt="HMI Logo" title="HMI Main Logo" />
            </a>
        </div>
        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="menu-active"><a href="<?php echo $this->uri->segment(1, 0) != 0 ? '#intro' : base_url('#intro'); ?>">Halaman Utama</a></li>
                <li><a href="<?php echo $this->uri->segment(1, 0) != 0 ? '#histori' : base_url('#histori'); ?>">Histori Suplai</a></li>
                <li><a href="<?php echo $this->uri->segment(1, 0) != 0 ? '#about' : base_url('#about'); ?>">Tentang Kami</a></li>
                <li><a href="<?php echo $this->uri->segment(1, 0) != 0 ? '#portfolio' : base_url('#portfolio'); ?>">Produk Kami</a></li>
                <li><a href="<?php echo $this->uri->segment(1, 0) != 0 ? '#clients' : base_url('#clients'); ?>">Client Kami</a></li>
                <li><a href="<?php echo $this->uri->segment(1, 0) != 0 ? '#contact' : base_url('#contact'); ?>">Kontak</a></li>
            </ul>
        </nav>
    </div>
</header>