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

<script>
    $('#btnLogout').click(function(ex) {
        swal({
            title: 'Logout dari sistem',
            text: 'Apa anda yakin ingin keluar dari sistem?',
            type: 'warning',
            buttons: {
                confirm: {
                    className: 'btn btn-success'
                },
                cancel: {
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((result) => {
            if (result) {
                window.location.replace(baseUrl + 'CMS/logout');
            } else {
                swal.close();
            }
        });
    });

    $('#add-row').DataTable({});

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
</body>

</html>