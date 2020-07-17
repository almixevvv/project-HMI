<style type="text/css">
  body {
    background: url('assets/img/intro-carousel/BACKGROUND 3.jpg') center no-repeat fixed;
  }
</style>

<body>

  <div class="container">
    <div class="card card-login mx-auto mt-5" style="background-color: transparent;border:transparent;">
      <div class="card-body">
        <div class="d-flex justify-content-center">
          <img src="<?php echo base_url('assets/img/logo/Haluan_Maritim_FullLogo.png'); ?>" alt="Haluan Maritim Logo" style="width: 35%;">
        </div>
        <center>
          <form id="loginForm">
            <div class="form-group" style="margin-top: 3em;">
              <div class="form-label-group">
                <input type="text" id="inputEmail" name="txt-username" class="form-control" placeholder="Username" required="required" autofocus="autofocus" style="width: 35%;">
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="txt-password" class="form-control" placeholder="Password" required="required" style="width: 35%;">
              </div>
            </div>
        </center>
        <center>
          <button type="submit" class="btn" style="background-color: #16566b;color: white;">Masuk</button>
        </center>
        </form>
      </div>
    </div>
  </div>

</body>
<script src="<?php echo base_url('assets/cms/js/core/jquery.3.2.1.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/cms/js/plugin/sweetalert/sweetalert.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/login-cms.1.0.min.js'); ?>"></script>