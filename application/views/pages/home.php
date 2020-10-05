<section id="intro">
    <div class="intro-container">
        <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

            <ol class="carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <div class="carousel-item active" style="background-image: url('<?php echo base_url('assets/img/intro-carousel/BACKGROUND 1.jpg'); ?>');">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="text-capitalize">"Jangan sungkan untuk menghubungi kami</br>kami siap membantu untuk segala kebutuhan kapal anda."</h2>
                            <a href="#contact" class="btn-get-started scrollto">Hubungi Kami</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<main id="main">
    <section id="histori">
        <div class="container">

            <div class="row histori-cols">
                <div class="col-md-12 wow fadeInUp">
                    <header class="section-header">
                        <h3>histori suplai</h3>
                    </header>
                </div>

                <?php foreach ($supplyHistory->result() as $data) { ?>

                    <div class="d-none col-md-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="histori-col">
                            <div class="img mb-4">
                                <a href="<?php echo base_url('history/detail?id=' . $data->IMAGE_PARENT); ?>">
                                    <img src="<?php echo base_url('assets/img/histori-suplai/' . $data->IMAGE); ?>" alt="<?php echo $data->NAME; ?>" class="img-fluid">
                                </a>
                            </div>
                            <p class="title"><?php echo $data->DESCRIPTION; ?></p>
                        </div>
                    </div>

                    <div class="d-md-block col-md-4 wow fadeInUp my-4" data-wow-delay="0.2s">
                        <div class="histori-col h-100">
                            <div class="img mb-4">
                                <a href="<?php echo base_url('history/detail?id=' . $data->IMAGE_PARENT); ?>">
                                    <img src="<?php echo base_url('assets/img/histori-suplai/' . $data->IMAGE); ?>" alt="<?php echo $data->NAME; ?>" class="img-fluid w-100">
                                </a>
                            </div>
                            <p class="title"><?php echo $data->DESCRIPTION; ?></p>
                        </div>
                    </div>

                <?php } ?>

                <div class="col-12 wow fadeInUp" data-wow-delay="0.5s">
                    <span class="d-flex justify-content-center justify-content-md-end">
                        <a href="<?php echo base_url('history/supply'); ?>" id="readMoreButton" role="button" style="color: #16566b; transition: 0.5s;">
                            <h5>Lihat Selengkapnya</h5>
                        </a>
                    </span>
                </div>

            </div>

        </div>
    </section>

    <section id="about">
        <div class="container">

            <div class="row about-cols">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 wow fadeInUp">
                            <header class="section-header">
                                <h3>tentang kami</h3>
                                <p>PT Haluan Maritim Internasional adalah perusahaan yang bergerak dalam bidang perdagangan
                                    suku cadang dan perlengkapan kapal laut.
                                    </br>
                                    </br>
                                    Memberikan pelayanan dalam pengadaan-pengadaan kebutuhan kapal laut seperti keperluan <strong>Cathodic Protection (Zinc & Alumunium Anode)</strong>,
                                    <strong>Cabin Store</strong>, <strong>Deck Store</strong>, <strong>Electrical Store</strong>, <strong>Nautical Equipment</strong>, <strong>Marine Valves</strong>,
                                    <strong>Rope</strong>, <strong>Hawser</strong>, <strong>Rigging Equipment</strong>, <strong>Safety Equipment</strong></i> dan keperluan lainnya.
                                </p>
                            </header>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12 wow fadeInUp">
                            <header class="section-header">
                                <h3>visi</h3>
                                <p>Menjadi supplier kapal laut yang terus bertumbuh besar dengan mengedepankan pelayanan dan kualitas perusahaan guna menjaga kepercayaan customer.</p>
                            </header>
                        </div>
                    </div>

                </div>

                <div class="col-md-12 wow fadeInUp">
                    <header class="section-header">
                        <h3>misi</h3>
                    </header>
                </div>

                <div class="col-md-4 wow fadeInUp">
                    <div class="about-col">
                        <div class="img mb-5">
                            <img src="<?php echo base_url('assets/img/about-mission2.jpg'); ?>" alt="" class="img-fluid">
                            <div class="icon"><i class="ion-settings"></i></div>
                        </div>
                        <p class="title text-capitalize">Menjadi supplier kapal laut terlengkap guna memenuhi berbagai kebutuhan customer.</p>
                    </div>
                </div>

                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="about-col">
                        <div class="img mb-5">
                            <img src="<?php echo base_url('assets/img/about-vision.jpg'); ?>" alt="" class="img-fluid">
                            <div class="icon"><i class="ion-link"></i></div>
                        </div>
                        <p class="title text-capitalize">Menjalin kerjasama yang baik, flesibel dan saling menguntungkan dengan customer.</p>
                    </div>
                </div>

                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="about-col">
                        <div class="img mb-5">
                            <img src="<?php echo base_url('assets/img/about-plan.jpg'); ?>" alt="" class="img-fluid">
                            <div class="icon"><i class="ion-loop"></i></div>
                        </div>
                        <p class="title text-capitalize">Memberikan pelayanan terbaik dan kualitas barang sesuai kebutuhan.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section id="portfolio" class="section-bg">
        <div class="container">

            <header class="section-header">
                <h3 class="section-title">produk kami</h3>
            </header>

            <div class="row" data-aos="fade-up">
                <div class="col-md-6 pt-4">
                    <h4 style="font-weight: bold;">Cathodic Protection</h4>
                    <ul class="list-group">
                        <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Zinc Anode</li>
                        <li class="product-list2 list-group-item"><i class="ion-checkmark-round"></i> Alumunium Anode</li>
                        <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Dan lain-lain</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <img src="<?php echo base_url('assets/img/product-list/CATHODIC-PROTECTION.png'); ?>" class="img-fluid" alt="">
                </div>

            </div>

            <div class="row mt-5" data-aos="fade-up">
                <div class="col-md-6">
                    <h4 style="font-weight: bold;">Cabin Store</h4>
                    <div class="row">
                        <div class="col-6">
                            <ul class="list-group">
                                <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Brushes and Mats</li>
                                <li class="product-list2 list-group-item"><i class="ion-checkmark-round"></i> Cleaning Material</li>
                                <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Clothing Products</li>
                                <li class="product-list2 list-group-item"><i class="ion-checkmark-round"></i> Linen Products</li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="list-group">
                                <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Lavatory Equipment</li>
                                <li class="product-list2 list-group-item"><i class="ion-checkmark-round"></i> Tableware Utensils</li>
                                <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Galley Utensils</li>
                                <li class="product-list2 list-group-item"><i class="ion-checkmark-round"></i> Hardware</li>
                                <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Dan lain-lain</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="<?php echo base_url('assets/img/product-list/KOSONG-1.png'); ?>" class="img-fluid" alt="">
                </div>
            </div>

            <div class="row mt-5" data-aos="fade-up">
                <div class="col-md-6 pt-4">
                    <h4 style="font-weight: bold;">Deck Store</h4>
                    <div class="row">
                        <div class="col-5">
                            <ul class="list-group">
                                <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Deck Equipment</li>
                                <li class="product-list2 list-group-item"><i class="ion-checkmark-round"></i> Cargo Equipment</li>
                                <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Hose and Coupling</li>
                                <li class="product-list2 list-group-item"><i class="ion-checkmark-round"></i> Brushes</li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="list-group">
                                <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Petroleum Produts</li>
                                <li class="product-list2 list-group-item"><i class="ion-checkmark-round"></i> Oil Pollution Equipment</li>
                                <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Safety Protective Gear</li>
                                <li class="product-list2 list-group-item"><i class="ion-checkmark-round"></i> Dan lain-lain</li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <img src="<?php echo base_url('assets/img/product-list/DECK-STORE.png'); ?>" class="img-fluid" alt="">
                </div>

            </div>

            <div class="row mt-5" data-aos="fade-up">
                <div class="col-md-6 pt-4">
                    <h4 style="font-weight: bold;">Marine Valve</h4>
                    <ul class="list-group">
                        <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> JIS Marine Valve</li>
                        <li class="product-list2 list-group-item"><i class="ion-checkmark-round"></i> Butterfly Valve</li>
                        <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Dan lain-lain</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <img src="<?php echo base_url('assets/img/product-list/MARINE-VALVE.png'); ?>" class="img-fluid" alt="">
                </div>
            </div>

            <div class="row mt-5" data-aos="fade-up">
                <div class="col-md-6 pt-4">
                    <h4 style="font-weight: bold;">Rope, Hawser, dan Riggings Equipment</h4>
                    <div class="row">
                        <div class="col-6">
                            <ul class="list-group">
                                <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Anchor</li>
                                <li class="product-list2 list-group-item"><i class="ion-checkmark-round"></i> Anchor Chain</li>
                                <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Chains & Links</li>
                                <li class="product-list2 list-group-item"><i class="ion-checkmark-round"></i> Shackles</li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="list-group">
                                <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Turnbuckles</li>
                                <li class="product-list2 list-group-item"><i class="ion-checkmark-round"></i> Wire Clips</li>
                                <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Mooring Ropes</li>
                                <li class="product-list2 list-group-item"><i class="ion-checkmark-round"></i> Wire Ropes</li>
                                <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Dan lain-lain</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="<?php echo base_url('assets/img/product-list/ROPE.png'); ?>" class="img-fluid" alt="">
                </div>

            </div>

            <div class="row mt-5" data-aos="fade-up">
                <div class="col-md-6 pt-4">
                    <h4 style="font-weight: bold;">Nautical Equipment</h4>
                    <div class="row">
                        <div class="col-6">
                            <ul class="list-group">
                                <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Chart Room Materials</li>
                                <li class="product-list2 list-group-item"><i class="ion-checkmark-round"></i> Flags</li>
                                <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> GMDSS Radio Equipment</li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="list-group">
                                <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Nautical Recording Paper</li>
                                <li class="product-list2 list-group-item"><i class="ion-checkmark-round"></i> Office Consumables</li>
                                <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Publication and Charts</li>
                                <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Dan lain-lain</li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <img src="<?php echo base_url('assets/img/product-list/KOSONG-2.png'); ?>" class="img-fluid" alt="">
                </div>
            </div>

            <div class="row mt-5" data-aos="fade-up">
                <div class="col-md-6 pt-4">
                    <h4 style="font-weight: bold;">Safety Equipment</h4>
                    <div class="row">
                        <div class="col-6">
                            <ul class="list-group">
                                <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Breathing Apparatus</li>
                                <li class="product-list2 list-group-item"><i class="ion-checkmark-round"></i> Chemical & Gas Protection Suit</li>
                                <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Fire Fighting Equipment</li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="list-group">
                                <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Life Boat & Life Raft Accesories</li>
                                <li class="product-list2 list-group-item"><i class="ion-checkmark-round"></i> Safety Lights</li>
                                <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Safety Signs</li>
                                <li class="product-list2 list-group-item"><i class="ion-checkmark-round"></i> Dan lain-lain</li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <img src="<?php echo base_url('assets/img/product-list/SAFETY-EQ.png'); ?>" class="img-fluid" alt="">
                </div>

            </div>

            <div class="row mt-5" data-aos="fade-up">
                <div class="col-md-6 pt-4">
                    <h4 style="font-weight: bold;">Electrical Store</h4>
                    <div class="row">
                        <div class="col-6">
                            <ul class="list-group">
                                <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Battery</li>
                                <li class="product-list2 list-group-item"><i class="ion-checkmark-round"></i> Cables</li>
                                <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Lamps</li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="list-group">
                                <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Lighting Fixtures</li>
                                <li class="product-list2 list-group-item"><i class="ion-checkmark-round"></i> Plugs & Sockes</li>
                                <li class="product-list list-group-item"><i class="ion-checkmark-round"></i> Torch</li>
                                <li class="product-list2 list-group-item"><i class="ion-checkmark-round"></i> Dan lain-lain</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <section id="clients" class="wow fadeInUp">
        <div class="container">

            <header class="section-header">
                <h3>client kami</h3>
            </header>

            <div class="d-flex justify-content-around">
                <img style="width: 40%;" class="mx-2" src="<?php echo base_url('assets/img/customer/CUSTOMER 1.JPG'); ?>" alt="Soechi Lines">
                <img style="width: 13%;" class="mx-2" src="<?php echo base_url('assets/img/customer/CUSTOMER 2.png'); ?>" alt="Soechi Lines">
            </div>

        </div>
    </section>

    <section id="contact" class="section-bg wow fadeInUp">
        <div class="container">

            <div class="section-header">
                <h3>PT Haluan Maritim Internasional</h3>
                <blockquote class="blockquote">
                    <p> <i> "Jangan sungkan untuk menghubungi kami, kami siap membantu untuk segala kebutuhan kapal anda" </i></p>
                </blockquote>

            </div>

            <div class="row contact-info">
                <div class="col-md-4">
                    <div class="contact-address">
                        <i class="ion-ios-location-outline"></i>
                        <h3>alamat</h3>
                        <address> Mangga Dua Square Lt. 1 Blok OC Nomor 185<br>
                            Jakarta Utara 14420<br>
                        </address>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-phone">
                        <i class="ion-ios-telephone-outline"></i>
                        <h3>nomor telepon</h3>
                        <p><a href="tel:+155895548855">(+62) 8111 369 153</a></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-email">
                        <i class="ion-ios-email-outline"></i>
                        <h3>email</h3>
                        <p><a href="mailto:info@example.com">info@haluanmaritim.com</a></p>
                    </div>
                </div>

            </div>

            <div class="form">
                <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>
                <form action="#" method="post" role="form" class="contactForm" id="contactForm">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nama anda" data-rule="minlen:4" data-msg="Tolong tuliskan lebih dari 4 karakter" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email anda" data-rule="email" data-msg="Tolong tuliskan alamat email yang valid" />
                            <div class="validation"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Tolong tuliskan lebih dari 8 karakter" />
                        <div class="validation"></div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" id="message" rows="5" data-rule="required" data-msg="Tolong tuliskan pesan anda untuk kami" placeholder="Pesan"></textarea>
                        <div class="validation"></div>
                    </div>
                    <div class="text-center"><button type="submit">Kirim Pesan</button></div>
                </form>
            </div>

        </div>
    </section>

</main>