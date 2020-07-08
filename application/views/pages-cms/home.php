<style type="text/css">
  body {
    background: url('assets/img/ico/BACKGROUND 3.jpg') center no-repeat fixed;
  }
</style>

<body>

  <div class="container">
    <div class="card card-login mx-auto mt-5" style="background-color: transparent;border:transparent;">
      <div class="card-body">
        <div class="d-flex justify-content-center">
          <img src="<?php echo base_url('assets/img/ico/Haluan_Maritim_FullLogo.png'); ?>" alt="Bulog Logo" style="width: 35%;">
        </div>
        <center>
          <?php echo form_open('CMS/login_process'); ?>
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
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>

</body>