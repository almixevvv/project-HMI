<style>
    .btn-load-more {
        background: #105070;
        color: #f3f3f3 !important;
        font-weight: 500;
        font-size: 16px;
        letter-spacing: 1px;
        display: inline-block;
        padding: 8px 32px;
        border-radius: 50px;
        transition: 0.5s;
        margin: 10px;
        text-align: center;
        cursor: pointer;
    }
</style>

<main id="main" class="mt-5">
    <section id="histori">
        <div class="container">

            <div class="row histori-cols">
                <div class="col-md-12 wow fadeInUp">
                    <header class="section-header pt-5">
                        <h3>histori suplai</h3>
                    </header>
                </div>

                <div class="row" id="autoloadHolder">

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

                <div class="row">
                    <div class="col-12 w-100" id="autoloadTrigger">
                    </div>
                </div>



            </div>

        </div>
    </section>

</main>