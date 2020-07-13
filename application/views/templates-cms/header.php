<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>HMI CMS - <?php echo $page; ?></title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link href="<?php echo base_url('assets/img/logo/icon.png'); ?>" rel="icon">
    <link href="<?php echo base_url('assets/img/logo/icon.png'); ?>" rel="apple-touch-icon">

    <!-- Fonts and icons -->
    <script src="<?php echo base_url('assets/cms//js/plugin/webfont/webfont.min.js'); ?>"></script>
    <script>
        const getUrl = window.location;
        const baseUrl = getUrl.protocol + '//' + getUrl.host + '/' + getUrl.pathname.split('/')[0];

        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: [baseUrl + 'assets/cms/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url('assets/cms/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/cms/css/atlantis.min.css'); ?>">
</head>

<body>