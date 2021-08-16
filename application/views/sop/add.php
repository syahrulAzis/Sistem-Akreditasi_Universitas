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
                <label>Standar</label>
                <select class="js-example-basic-single w-100" name="standar_id" id="standar_id" required>
                  <?php foreach ($standar as $s) : ?>
                    <option value="<?= $s['id_standar']; ?>"><?= $s['no_standar']; ?> (<?= $s['deskripsi_standar']; ?>)</option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>MP</label>
                <select class="js-example-basic-single w-100" name="mp_id" id="mp_id" required>
                  <?php foreach ($mp as $m) : ?>
                    <option value="<?= $m['id_mp']; ?>">
                      <?php
                      $id_standar = $m['standar_id'];

                      $this->db->where('id_standar', $id_standar);
                      $this->db->from('standar');
                      $query = $this->db->get();

                      foreach ($query->result() as $stn) {
                        echo $stn->no_standar . '/' . $m['no_mp'];
                      }

                      // $m['standar_id'] . '/' . $m['no_mp'];
                      ?>
                      (
                      <?= $m['deskripsi_mp']; ?>
                      )</option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>No SOP</label>
                <?php echo form_input('no_sop', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Deskripsi</label>
                <?php echo form_textarea('deskripsi_sop', null, 'class="form-control" required="required"'); ?>
              </div>
              <div class="form-group">
                <label>Revisi</label>
                <input type="number" name="revisi_sop" class="form-control" required="required" placeholder="">
              </div>
              <div class="form-group">
                <label>Tanggal Pembuatan</label>
                <input type="date" name="tgl_pembuatan" class="form-control" required="required" placeholder="">
              </div>
              <div class="form-group">
                <label>Tanggal Berlaku</label>
                <input type="date" name="tgl_berlaku" class="form-control" required="required" placeholder="">
              </div>
              <div class="form-group">
                <label>Penyimpanan</label>
                <?php echo form_input('penyimpanan', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Dibuat oleh</label>
                <?php echo form_input('pembuat', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Diperiksa oleh</label>
                <?php echo form_input('pemeriksa', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Disetujui oleh</label>
                <?php echo form_input('menyetujui', null, 'class="form-control" required="required" placeholder=""'); ?>
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
              <a type="button" class="btn btn-light" href="<?php echo site_url('sop'); ?>">Kembali</a>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php $this->load->view('template/footer'); ?>