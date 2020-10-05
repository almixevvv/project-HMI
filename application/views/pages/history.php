<!-- <section id="intro">
    <div class="intro-container">
        <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

            <ol class="carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <div class="carousel-item active" style="background-image: url('<?php echo base_url('assets/img/intro-carousel/BACKGROUND 1.jpg'); ?>');">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="text-capitalize">"Jangan sungkan untuk menghubungi kami</br>kami siap membantu untuk segala kebutuhan kapal anda."</h2>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section> -->

<main id="main" class="mt-5">
    <section id="histori">
        <div class="container">

            <div class="row histori-cols">
                <div class="col-md-12 wow fadeInUp">
                    <header class="section-header">
                        <h3>histori suplai</h3>
                    </header>
                </div>

                <?php foreach ($allHistory->result() as $data) { ?>
                    <div class="d-none col-md-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="histori-col">
                            <div class="img mb-4">
                                <a href="<?php echo base_url('history/detail?id=' . $data->IMAGE_PARENT); ?>">
                                    <img src="<?php echo base_url('assets/img/histori-suplai/' . $data->IMAGE); ?>" alt="<?php echo $data->NAME; ?>" class="img-fluid">
                                </a>
                            </div>
                            <p class="title text-capitalize"><?php echo $data->DESCRIPTION; ?></p>
                        </div>
                    </div>

                    <div class="d-md-block col-md-4 wow fadeInUp my-4" data-wow-delay="0.2s">
                        <div class="histori-col h-100">
                            <div class="img mb-4">
                                <a href="<?php echo base_url('history/detail?id=' . $data->IMAGE_PARENT); ?>">
                                    <img src="<?php echo base_url('assets/img/histori-suplai/' . $data->IMAGE); ?>" alt="<?php echo $data->NAME; ?>" class="img-fluid w-100">
                                </a>
                            </div>
                            <p class="title text-capitalize"><?php echo $data->DESCRIPTION; ?></p>
                        </div>
                    </div>
                <?php } ?>

            </div>

        </div>
    </section>

</main>