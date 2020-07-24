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
<script>
    Dropzone.autoDiscover = false;
    let fileName = '';
    let fileType = '';
    var fileUrl = '';

    var validateData = function(container) {
        if (container.val().length == 0) {
            container.parent().addClass('has-error has-feedback');
            container.siblings('.form-err').css('display', 'block');

            return false
        } else {
            container.parent().removeClass('has-error has-feedback');
            container.siblings('.form-err').css('display', 'none');

            return true;
        }
    }

    var validateImage = function() {
        if (fileName.length == 0) {
            $('.dropzone').css('border', '2px dashed rgb(242 89 97) !important');
            $('#imageHelp').parent().addClass('has-error has-feedback');
            $('#imageHelp').css('display', 'block');

            return false;
        } else {
            $('.dropzone').css('border', '2px dashed rgba(0, 0, 0, 0.13) !important');
            $('#imageHelp').css('display', 'none');

            return true;
        }
    }

    $('#supplyDetail').on('change paste keyup blur', function() {
        validateData($(this));
    });

    $('#supplyName').on('change paste keyup blur', function() {
        validateData($(this));
    });

    var swalFireDelete = function(id) {
        $.post(baseUrl + 'API/deleteSupplyData', {
            id: id
        }, function(ex) {
            swal({
                title: 'Berhasil',
                text: 'Data telah dihapus',
                icon: 'success',
                buttons: {
                    confirm: {
                        className: 'btn btn-success'
                    }
                }
            }).then((result) => {
                if (result) {
                    window.location.replace(baseUrl + 'cms/history');
                } else {
                    swal.close();
                }
            });
        });
    }

    var deleteData = function(id) {

        swal({
            title: 'Hapus Data',
            text: 'Apakah anda yakin akan menghapus data?',
            icon: 'warning',
            buttons: {
                confirm: {
                    text: 'Yakin',
                    className: 'btn btn-success'
                },
                cancel: {
                    visible: true,
                    text: 'Batal',
                    className: 'btn btn-danger'
                }
            }
        }).then((result) => {
            if (result) {
                swalFireDelete(id);
            } else {
                swal.close();
            }
        });
    }

    var editModal = function(id) {

        $('#editRowModal').modal({
            show: true
        });

        $.get(baseUrl + 'API/getSupplyDetail', {
            id: id
        }, function(ex) {
            $('#editID').val(ex.data.REC_ID);
            $('#editName').val(ex.data.NAME);
            $('#editDetail').val(ex.data.DESCRIPTION);
            $('#editImage').attr('src', baseUrl + 'assets/img/histori-suplai/' + ex.data.IMAGE);
            $('#editImage').attr('alt', ex.data.DESCRIPTION);
        });

        $('#formUpdate').submit(function(ex) {
            ex.preventDefault();

            let serialize = $('#formUpdate').serialize();

            $.post(baseUrl + 'API/updateSupplyData', serialize, function(resp) {
                console.log(resp);
                if (resp.code == '200') {
                    swal({
                        title: 'Berhasil',
                        text: 'Data berhasil ditambahkan',
                        icon: 'success',
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
                            window.location.replace(baseUrl + 'cms/history');
                        } else {
                            swal.close();
                        }
                    });
                } else {
                    swal({
                        title: 'Error!',
                        text: 'Terjadi kesalahan dalam input data, harap coba lagi',
                        icon: 'error',
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            },
                            cancel: {
                                visible: true,
                                className: 'btn btn-danger'
                            }
                        }
                    })
                }
            });
        });

    }

    $('#addRowModal').on('shown.bs.modal', function() {
        // console.log('kebuka');
        $('#dz-upload').dropzone({
            url: baseUrl + '/API/postSupplyImage',
            paramName: 'imgUpload',
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            autoProcessQueue: true,
            dictFallbackMessage: 'Browser tidak mendukung untuk upload file',
            dictFileTooBig: 'Upload gagal, file terlalu besar',
            dictInvalidFileType: 'Tipe file tidak sesuai format',
            dictCancelUpload: 'Batalkan Upload',
            dictRemoveFile: 'Hapus file',
            maxFiles: 1,
            maxfilesexceeded: function(file) {
                this.removeAllFiles();
                this.addFile(file);
            },
            success: function(file, resp) {
                // console.log(resp);
                fileName = resp.upload_data.file_name;
                fileType = resp.upload_data.file_type;
            },
            removedfile: function(file) {
                $.post(baseUrl + '/API/deleteIntroFiles', {
                    images: fileName
                }, function(resp) {
                    // console.log(resp);
                });

                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            }
        });

        $('#formHistory').submit(function(ex) {
            ex.preventDefault();

            let formData = $('#formHistory input').serialize();

            if (validateData($('#supplyDetail')) && validateData($('#supplyName')) && validateImage()) {

                console.log('clear proses');
                $.post(baseUrl + 'API/postSupplyData', formData + '&fileName=' + fileName + '&fileType=' + fileType, function(ex) {
                    console.log(ex);
                    if (ex.code == '200') {
                        swal({
                            title: 'Berhasil',
                            text: 'Data berhasil ditambahkan',
                            icon: 'success',
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
                                window.location.replace(baseUrl + 'cms/history');
                            } else {
                                swal.close();
                            }
                        });
                    } else {
                        swal({
                            title: 'Error!',
                            text: 'Terjadi kesalahan dalam input data, harap coba lagi',
                            icon: 'error',
                            buttons: {
                                confirm: {
                                    className: 'btn btn-success'
                                },
                                cancel: {
                                    visible: true,
                                    className: 'btn btn-danger'
                                }
                            }
                        })
                    }
                });
            } else {
                swal({
                    title: 'Error!',
                    text: 'Terjadi kesalahan dalam input data, harap coba lagi',
                    icon: 'error',
                    buttons: {
                        confirm: {
                            className: 'btn btn-success'
                        },
                        cancel: {
                            visible: true,
                            className: 'btn btn-danger'
                        }
                    }
                })
            }
        });
    });

    $('#btnLogout').click(function(ex) {
        swal({
            title: 'Logout dari sistem',
            text: 'Apa anda yakin ingin keluar dari sistem?',
            icon: 'warning',
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