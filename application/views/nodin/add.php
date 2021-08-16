
<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Basic form elements</h4>
              <?php echo form_open_multipart(); ?>
              <div class="form-group">
                <label>No Nota Dinas</label>
                <?php echo form_input('no_nota_dinas', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Kepada</label>
                <?php echo form_input('kepada', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Tembusan</label>
                <?php echo form_input('tembusan', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Dari</label>
                <?php echo form_input('dari', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Perihal</label>
                <?php echo form_input('perihal', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Lampiran</label>
                <?php echo form_input('lampiran', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Tanggal Pengesahan</label>
                <input type="date" name="tgl_pengesahan" class="form-control" required="required" placeholder="">
              </div>
              <div class="form-group">
                <label>File upload</label><br>
                <div class="col-sm">
                  <div class="row">
                    <div class="col-sm">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file" name="file">
                        <label for="file" class="custom-file-label">Pilih file</label>
                        <p><i>* upload dengan format <b>pdf</b></i></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <button type="submit" class="btn btn-primary mr-2">Simpan</button>
              <a type="button" class="btn btn-light" href="<?php echo site_url('Notadinas'); ?>">Kembali</a>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>