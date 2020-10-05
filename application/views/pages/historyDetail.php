<style>
    .detail-container {
        margin-top: 5em;
    }

    .detail-border {
        border-radius: 11px 11px 11px 11px;
        -moz-border-radius: 11px 11px 11px 11px;
        -webkit-border-radius: 11px 11px 11px 11px;
        border: 1px solid #e5e6e9;
        margin-bottom: 0.5em;
    }

    .product-text {
        color: black;
    }

    .detail-border>center>img {
        padding: 8px;
        max-width: 100%;
    }

    .detail-inner-container {
        width: 100%;
        padding-left: 1.5em;
        padding-right: 1.5em;
        padding-top: 0.7em;
        padding-bottom: 1.5em;
    }

    .product-link {
        border-bottom: 1px solid;
    }
</style>

<main class="detail-container">
    <section id="histori">
        <div class="container mt-0 mt-lg-5">

            <div class="row histori-cols">
                <div class="col-md-12 wow fadeInUp">
                    <header class="section-header">
                        <h3 class="product-text">history suplai</h3>
                    </header>
                </div>
            </div>

            <div class="row d-flex">
                <div class="col-12 col-lg-2 order-2 order-lg-1">
                    <div class="row">
                        <?php foreach ($allHistory->result() as $image) { ?>
                            <div class="col-4 col-lg-12">
                                <div class="detail-border">
                                    <center>
                                        <img data-picture="<?php echo base_url('assets/img/histori-suplai/' . $image->IMAGE); ?>" class="row-images" alt="<?php echo $image->DESCRIPTION; ?>" src="<?php echo base_url('assets/img/histori-suplai/' . $image->IMAGE); ?>" onerror="this.onerror=null;this.src='http://kikikuku.com/assets/images/no-image-icon.png' ">
                                    </center>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-12 col-lg-5 order-1 order-lg-2">
                    <div class="detail-border">
                        <center>
                            <img data-picture="<?php echo base_url('assets/img/histori-suplai/' . $image->IMAGE); ?>" class="detail-main-images" alt="<?php echo $image->DESCRIPTION; ?>" src="<?php echo base_url('assets/img/histori-suplai/' . $image->IMAGE); ?>" onerror="this.onerror=null;this.src='http://kikikuku.com/assets/images/no-image-icon.png' ">
                        </center>
                    </div>
                </div>
                <div class="col-12 col-lg-5 order-3 order-lg-3">
                    <div class="detail-border">
                        <div class="row detail-inner-container">
                            <div class="col-12">
                                <h4 class="product-text mb-2 font-weight-bold"><?php echo $productName; ?></h4>
                            </div>
                            <div class="col-12">
                                <hr class="mt-0 mb-2">
                            </div>
                            <div class="col-12">
                                <h5 class="product-text mb-2"><?php echo $productDescription; ?></h5>
                            </div>
                        </div>
                        <div class="row detail-inner-container mt-3">
                            <div class="col-12">
                                <p class="product-text mb-0">Tertarik dengan produk ini? <a href="#" class="product-link" data-title="<?php echo $productName; ?>" data-product="<?php echo $image->IMAGE_PARENT; ?>">Tanya lebih lanjut</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5 mb-2">
                <div class="col-12 wow fadeInUp">
                    <header class="product-detail">
                        <h3 class="product-text">Suplai Lainnya</h3>
                    </header>
                </div>
            </div>

            <div class="row">
                <?php foreach ($randomProduct->result() as $data) { ?>

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