<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body mx-auto">
                <img src="" id="imagepreview" class="img-fluid">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body mx-auto">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Nama Pengirim</label>
                            <input id="emailName" type="text" class="form-control" readonly style="opacity: 1 !important; background-color: white!important;">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Email Pengirim</label>
                            <input id="emailSender" type="text" class="form-control" readonly style="opacity: 1 !important; background-color: white!important;">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Pesan</label>
                            <textbox id="emailMessage" type="text" class="form-control" readonly style="opacity: 1 !important; background-color: white!important;" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-12">
                        <h4 class="mb-0">Ubah Password</h4>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Password Baru</label>
                            <input id="formPassword" type="password" class="form-control">
                            <small id="passHelp" class="form-err form-text">Password tidak boleh kosong</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <input id="formConfirmPassword" type="password" class="form-control">
                            <small id="confirmHelp" class="form-err form-text">Password tidak sama</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="submitPassword">Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

</div>
<script src="<?php echo base_url('assets/cms/js/core/jquery.3.2.1.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/cms/js/core/popper.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/cms/js/core/bootstrap.min.js'); ?>"></script>

<!-- jQuery UI -->
<script src="<?php echo base_url('assets/cms/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/cms/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js'); ?>"></script>

<!-- jQuery Scrollbar -->
<script src="<?php echo base_url('assets/cms/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js'); ?>"></script>


<!-- Chart JS -->
<script src="<?php echo base_url('assets/cms/js/plugin/chart.js'); ?>"></script>

<!-- jQuery Sparkline -->
<script src="<?php echo base_url('assets/cms/js/plugin/jquery.sparkline/jquery.sparkline.min.js'); ?>"></script>

<!-- Chart Circle -->
<script src="<?php echo base_url('assets/cms/js/plugin/chart-circle/circles.min.js'); ?>"></script>

<!-- Datatables -->
<script src="<?php echo base_url('assets/cms/js/plugin/datatables/datatables.min.js'); ?>"></script>

<!-- Bootstrap Notify -->
<script src="<?php echo base_url('assets/cms/js/plugin/bootstrap-notify/bootstrap-notify.min.js'); ?>"></script>

<!-- jQuery Vector Maps -->
<script src="<?php echo base_url('assets/cms/js/plugin/jqvmap/jquery.vmap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/cms/js/plugin/jqvmap/maps/jquery.vmap.world.js'); ?>"></script>

<!-- Sweet Alert -->
<script src="<?php echo base_url('assets/cms/js/plugin/sweetalert/sweetalert.min.js'); ?>"></script>

<!-- Atlantis JS -->
<script src="<?php echo base_url('assets/cms/js/atlantis.min.js'); ?>"></script>

<link rel="stylesheet" href="<?php echo base_url('lib/dropzone/dropzone.css'); ?>">
<script src="<?php echo base_url('lib/dropzone/dropzone.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/cms.1.0.js'); ?>"></script>
<script>
    $('#add-row').DataTable({});

    setInterval(function() {
        $.get(baseUrl + 'CMS/getUnpaidSOData', function(resp) {
            // console.log(resp);
            if (resp.rows != 0) {
                let messageCounter = resp.rows;
                $('#counter-icon').removeClass('d-none');
                $('#counter-message').removeClass('d-none');
                $('.message-counter').html(messageCounter);
                $('#notif-container').html(resp.result);
            } else {
                $('#counter-icon').addClass('d-none');
                $('#counter-message').addClass('d-none');
                $('.message-counter').html('');
                $('#notif-container').html(resp.result);
            }
        });
    }, 2000);

    Circles.create({
        id: 'circles-1',
        radius: 45,
        value: 60,
        maxValue: 100,
        width: 7,
        text: 5,
        colors: ['#f1f1f1', '#FF9E27'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true
    })

    Circles.create({
        id: 'circles-2',
        radius: 45,
        value: 70,
        maxValue: 100,
        width: 7,
        text: 36,
        colors: ['#f1f1f1', '#2BB930'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true
    })

    Circles.create({
        id: 'circles-3',
        radius: 45,
        value: 40,
        maxValue: 100,
        width: 7,
        text: 12,
        colors: ['#f1f1f1', '#F25961'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true
    });
</script>