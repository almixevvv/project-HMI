<!--     <style>
    @media screen and (min-width: 676px) {
        .modal-dialog {
          max-width: 1500px; /* New width for default modal */
          max-width: 90%; /* New width for default modal */
        }
    }
</style> -->

<div id="wrapper">

  <!-- Sidebar -->


  <div id="content-wrapper" style="background-color: #f7f7f7;">

    <div class="container-fluid">
      <a href="<?php echo base_url("cms/member"); ?>">
        <button class="btn btn-warning btn-sm" style="width: 6em;font-size: 10px;margin-bottom: 0.5em;" type="button">BACK</button><br>
      </a>
      <!-- ABOUT PART -->
      <div class="card mb-3">
        <div class="card-body" style="margin-bottom: -2em;">
          <?php foreach ($member->result() as $data) { ?>
            <div class="row">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-1">
                    <label style="font-size: 12px;">Name</label>
                  </div>
                  <div class="col-lg-4">
                    <label style="font-size: 12px;font-weight: bold;color: #0057B7;"><?php echo $data->MEMBER_NAME; ?></label>
                  </div>
                  <div class="col-lg-2">
                    <label style="font-size: 12px;">Tipe Member</label>
                  </div>
                  <div class="col-lg-5">
                    <label style="font-size: 12px;font-weight: bold;color: #0057B7;"><?php echo $data->TIPE_MEMBER; ?></label>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <form id="formRemarks" method="POST">
              <table class="table table-hover" cellspacing="0" style="font-size:12px">
                <thead class="thead-light">
                  <tr>
                    <th width="1%">NO</th>
                    <th width="15%">DOCUMENT TITLE</th>
                    <th width="15%">VIEW DOCUMENT</th>
                    <th width="50%">STATUS</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($dokumen->result() as $dt) {
                    $rec_id = $dt->REC_ID;
                    $member_id = $dt->MEMBER_ID;
                    $member_name = $dt->MEMBER_NAME;
                    $doc_id = $dt->DOC_ID;
                    $doc_name = $dt->NAME;
                    $doc_desc = $dt->DESCRIPTION;
                    $doc_file = $dt->FILE_NAME;
                    $doc_status = $dt->STATUS;
                    $doc_remarks = $dt->REMARKS;

                    echo "<tr>";
                  ?>
                    <td>
                      <?php echo $no++; ?>
                      <input type="hidden" name="txt_member_id" value="<?php echo $member_id; ?>">
                      <input type="hidden" name="txt_id_<?php echo $rec_id; ?>" value="<?php echo $rec_id; ?>">
                    </td>

                    <td>
                      <label><?php echo $doc_name; ?></label><br>
                      <label style="color: red;"><?php echo $doc_desc; ?></label>
                    </td>

                    <td>


                      <a href="<?php echo base_url('assets/member_dokumen/'  . sha1($member_id) . '/' .  $doc_file); ?>" target="_blank">
                        <?php
                        if ($doc_file != null) {
                          $fileExt = explode('.', $doc_file);
                          $fileName = substr($doc_file, 0, 10);

                          $fullName = $fileName . '...' . $fileExt[1];
                        } else {
                          $fullName = '';
                        }

                        echo $fullName;
                        ?>
                      </a>
                    </td>

                    <td>
                      <div class="row">
                        <div class="col-lg-2">
                          <label>Document Status</label>
                        </div>
                        <div class="col-lg-10">
                          <label>Remarks</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-2">
                          <select class="form-control" name="txt_status_<?php echo $rec_id; ?>" style="font-size: 12px;">
                            <?php if ($dt->STATUS == 'YES') : ?>
                              <option value="-">-</option>
                              <option selected value="YES">YES</option>
                              <option value="NO">NO</option>
                            <?php elseif ($dt->STATUS == 'NO') : ?>
                              <option value="-">-</option>
                              <option value="YES">YES</option>
                              <option selected value="NO">NO</option>
                            <?php elseif ($dt->STATUS == '' or $dt->STATUS == 'UPLOADED') : ?>
                              <option selected value="-">-</option>
                              <option value="YES">YES</option>
                              <option value="NO">NO</option>
                            <?php endif; ?>
                          </select>
                        </div>
                        <div class="col-lg-10">
                          <textarea class="form-control" name="txt_remarks_<?php echo $rec_id; ?>" style="font-size: 12px;"><?php echo $doc_remarks; ?></textarea>
                        </div>
                      </div>
                    </td>

                  <?php
                    echo "</tr>";
                  }
                  ?>
                </tbody>
              </table>
          </div>

          <?php
          if ($data->MEMBER_STATUS_VER == 'verified member') {
            $status = 'active';
          } else {
            $status = 'inactive';
          }
          ?>

          <div class="row">
            <div class="col-7">
              <div class="d-flex justify-content-start">
                <button type="button" <?php echo ($status == 'active' ? 'disabled' : ''); ?> data-memberid="<?php echo $member_id; ?>" class="btn-confirm-member btn btn-outline-primary mr-3">Konfirmasi Data Member</button>
                <button type="button" <?php echo ($status == 'active' ? 'disabled' : ''); ?> data-memberid="<?php echo $member_id; ?>" class="btn-reject btn btn-outline-danger" id="btnSaveRemarks">Request Ulang Dokumen</button>
              </div>
            </div>
            <!-- <div class="col-lg-5">
              <div class="d-flex justify-content-end">
                <button class="btn btn-success" style="font-size: 12px;" type="submit" id="btnSaveRemarks">SAVE</button><br>
              </div>
            </div> -->
          </div>
          </form>
        </div>
      </div>

    </div>
    <!-- end content -->

  </div>
  <!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<link rel="stylesheet" href="<?php echo base_url('reseller/assets/sweet-alert/sweetalert2.min.css'); ?>" />

<script type="text/javascript">
  $('#dataTable1').DataTable({
    responsive: true,
    "lengthMenu": [
      [50, -1],
      [50, 'All']
    ]
  });

  $('#btnSaveRemarks').click(function(e) {
    e.preventDefault();

    $.post(baseUrl + 'Cms/Member/verifiedDocument', $('#formRemarks').serialize(), function(resp) {
      if (resp.status == 200) {
        Swal.fire({
          title: 'Sukses',
          text: 'Proses Request ulang dokumen berhasil dilakukan',
          type: 'success',
          showCancelButton: false,
          showConfirmButton: true
        }).then((result) => {
          if (result.value) {
            location.reload();
          }
        });
      } else {
        Swal.fire({
          title: 'Gagal',
          text: "Validasi dokumen gagal, silahkan coba lagi",
          type: "warning",
          showCancelButton: false,
          showConfirmButton: true
        }).then((result) => {
          if (result.value) {
            location.reload();
          }
        });
      }
    });
  });

  $('.btn-confirm-member').click(function() {
    $(this).prop('disabled', true);
    let btn = $(this);
    let memberID = btn.data('memberid');

    $.post(baseUrl + 'API/API/postGenerateMemberID', {
      memberID: memberID
    }, function(resp) {
      $(this).prop('disabled', true);
      if (resp.status == 200) {
        Swal.fire({
          title: 'Sukses',
          text: 'Konfirmasi Member Berhasil',
          type: 'success',
          showCancelButton: false,
          showConfirmButton: true
        }).then((result) => {
          if (result.value) {
            window.location = baseUrl + 'cms/member';
          }
        });
      } else {
        Swal.fire({
          title: 'Gagal',
          text: "Konfirmasi member gagal, silahkan coba lagi",
          type: "warning",
          showCancelButton: false,
          showConfirmButton: true
        }).then((result) => {
          if (result.value) {
            location.reload();
          }
        });
      }
    });
  });
</script>
</body>