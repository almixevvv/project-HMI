<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-12 footer-info">
                    <h3>PT Haluan Maritim Internasional</h3>
                    <p>"Jangan sungkan untuk menghubungi kami, kami siap membantu untuk segala kebutuhan kapal anda."</p>
                </div>

                <div class="col-lg-4 col-md-12 footer-links">
                    <h4>Navigasi</h4>
                    <ul>
                        <li><i class="ion-ios-arrow-right"></i><a href="#intro">Halaman Utama</a></li>
                        <li><i class="ion-ios-arrow-right"></i><a href="#about">Tentang Kami</a></li>
                        <li><i class="ion-ios-arrow-right"></i><a href="#portfolio">Produk Kami</a></li>
                        <li><i class="ion-ios-arrow-right"></i><a href="#clients">Client Kami</a></li>
                        <li><i class="ion-ios-arrow-right"></i><a href="#contact">Kontak</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12 footer-contact">
                    <h4>Hubungi Kami</h4>
                    <p>
                        Mangga Dua Square Lt. 1 Blok OC Nomor 185<br>
                        Jakarta Utara 14420<br>
                        <strong><i class="fas fa-phone-volume"></i> : </strong> (+62) 8111 369 153<br>
                        <strong><i class="far fa-envelope-open"></i> : </strong> info@haluanmaritim.com<br>
                    </p>

                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong>PT Haluan Maritim Internasional</strong>
            <script>
                document.write(new Date().getFullYear())
            </script>. All Rights Reserved <br> Designed and developed by <a href="https://seichobee.com/" style="color: #ffffff; transition: 0.5s; text-decoration: underline; text-underline-position: under;"> Seichobee </a>
        </div>
    </div>
</footer>

<a href="#" class="back-to-top"><i class="mt-2 fa fa-chevron-up"></i></a>

<script src="<?php echo base_url('lib/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('lib/jquery/jquery-migrate.min.js'); ?>"></script>
<script src="<?php echo base_url('lib/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('lib/easing/easing.min.js'); ?>"></script>
<script src="<?php echo base_url('lib/superfish/hoverIntent.js'); ?>"></script>
<script src="<?php echo base_url('lib/superfish/superfish.min.js'); ?>"></script>
<script src="<?php echo base_url('lib/wow/wow.min.js'); ?>"></script>
<script src="<?php echo base_url('lib/waypoints/waypoints.min.js'); ?>"></script>
<script src="<?php echo base_url('lib/owlcarousel/owl.carousel.min.js'); ?>"></script>
<script src="<?php echo base_url('lib/isotope/isotope.pkgd.min.js'); ?>"></script>
<script src="<?php echo base_url('lib/lightbox/js/lightbox.min.js'); ?>"></script>
<script src="<?php echo base_url('lib/touchSwipe/jquery.touchSwipe.min.js'); ?>"></script>

<script src="<?php echo base_url('plugins/contactform/contactform.js'); ?>"></script>
<script src="<?php echo base_url('plugins/font-awesome/js/all.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/cms/js/plugin/sweetalert/sweetalert2.all.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/main.js'); ?>"></script>

<script>
    const getUrl = window.location;
    const baseUrl = getUrl.protocol + '//' + getUrl.host + '/' + getUrl.pathname.split('/')[0];

    let collapseStatus = false;

    var validateEmail = function($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test($email);
    }

    $('.row-images').each(function() {
        var $this = $(this);
        $this.on('click', function() {
            var image = $('.detail-main-images');
            //HARUS DIASIGN KE LOCAL VARIABLE BIAR BERUBAH
            var source = $(this).data('picture');
            image.fadeOut('fast', function() {
                image.attr('src', source);
                image.fadeIn('fast');
            });
        });
    });

    $('.product-link').click(function(ex) {
        let productTitle = $(this).data('title');
        Swal.fire({
            title: 'Kirimkan pertanyaan anda tentang ' + productTitle,
            html: '<input id="textName" class="swal2-input" placeholder="Nama anda">' +
                '<input id="textEmail" class="swal2-input" placeholder="Email anda">' +
                '<textarea id="textQuestion" class="swal2-textarea" placeholder="Pertanyaan anda">',
            showCancelButton: true,
            confirmButtonText: 'Kirim pesan',
            cancelButtonText: 'Batalkan',
            showLoaderOnConfirm: true,
            preConfirm: () => {
                if ($('#textName').val().length === 0) {
                    Swal.showValidationMessage('Nama tidak boleh kosong');
                } else if ($('#textEmail').val().length === 0) {
                    Swal.showValidationMessage('Alamat email tidak boleh kosong');
                } else if ($('#textQuestion').val().length === 0) {
                    Swal.showValidationMessage('Pertanyaan tidak boleh kosong');
                } else if (!validateEmail($('#textEmail').val())) {
                    Swal.showValidationMessage('Alamat email tidak sesuai format');
                } else {
                    return $.post(baseUrl + 'API/postMessagetoEmail', {
                        subject: $('#textName').val() + ' mengirimkan pesan tentang ' + productTitle + ' kepada anda',
                        message: $('#textQuestion').val(),
                        email: $('#textEmail').val(),
                        name: $('#textName').val()
                    }, function(resp) {
                        if (!resp.ok) {
                            Swal.fire({
                                title: 'Pesan gagal dikirim',
                                icon: 'error',
                                html: 'Pesan anda <b>gagal dikirim</b>, ' +
                                    'silahkan coba lagi ',
                                showCloseButton: false,
                                showCancelButton: false,
                            });
                        } else {
                            Swal.fire({
                                title: 'Pesan berhasil dikirim',
                                icon: 'success',
                                html: 'Pesan anda <b>berhasil dikirim</b>, ' +
                                    'mohon menunggu respon dari kami',
                                showCloseButton: false,
                                showCancelButton: false,
                            });
                        }
                        return resp;
                    });
                }

            }
        });
    });

    $('#readMoreButton').click(function() {
        if (!collapseStatus) {
            $('.collapseExample').collapse('show');
            collapseStatus = true;
        } else if (collapseStatus) {
            $('.collapseExample').collapse('hide');
            collapseStatus = false;
        }
    });

    $('#contactForm').submit(function(ex) {
        ex.preventDefault();

        let name = $('#name').val();
        let email = $('#email').val();
        let subject = $('#subject').val();
        let message = $('#message').val();

        if (name.length != 0 && email.length != 0 && subject.length != 0 && message.length != 0) {
            $.post(baseUrl + 'API/postMessagetoEmail', $('#contactForm').serialize(), function(ex) {
                // console.log(ex);
                if (ex.status == 200) {
                    swal({
                        title: 'Berhasil Kirim Pesan',
                        text: 'Pesan telah berhasil dikirim',
                        icon: 'success'
                    });
                    $('.swal-button-container').addClass('d-none');

                    $('#name').empty();
                    $('#email').empty();
                    $('#subject').empty();
                    $('#message').empty();
                } else {
                    swal({
                        title: 'Gagal Mengirim Pesan',
                        text: 'Pesan anda belum terkirim, silahkan coba lagi',
                        icon: 'error'
                    });
                    $('.swal-button-container').addClass('d-none');
                }
            });
        } else {
            // alert('masih ada yang kosong');
        }
    });
</script>

</body>

</html>