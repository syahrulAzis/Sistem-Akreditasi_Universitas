<?php $this->load->view('template/header'); ?>

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
                <label>Tanggal Rapat</label>
                <input type="date" name="tgl_rapat" class="form-control" required="required" placeholder="">
              </div>
              <div class="form-group">
                <label>Penyelenggara Rapat</label>
                <select class="js-example-basic-single w-100" name="jns_rapat" required="required">
                  <option Value=""> Pilih </option>
                  <option Value="Rektor"> Rektor </option>
                  <option Value="Dekan"> Dekan </option>
                  <option Value="Prodi"> Prodi </option>
                  <option Value="Prodi"> LPPM </option>
                  <option Value="Prodi"> LP3M </option>
                  <option Value="Prodi"> Perpustakaan </option>
                  <option Value="Prodi"> Kemahasiswaan </option>
                  <option Value="Prodi"> Kerjasama </option>
                  <option Value="Prodi"> Bahasa </option>
                  <option Value="Prodi"> Laboratorium </option>
                  <option Value="Prodi"> Kepegawaian </option>
                  <option Value="Prodi"> Umum </option>
                  <option Value="Prodi"> Keuangan </option>
                </select>
              </div>
              <div class="form-group">
                <label>Jenis Keputusan</label>
                <?php echo form_input('jns_keputusan', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Penanggung Jawab</label>
                <?php echo form_input('pis', null, 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Rencana Tanggal Pelaksanaan</label>
                <input type="date" name="rencana_tgl_pelaksanaan" class="form-control" required="required" placeholder="">
              </div>
              <div class="form-group">
                <label>Progres</label>
                <?php echo form_input('progres', null, 'class="form-control" required="required" placeholder="0 s/d 100%"'); ?>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="js-example-basic-single w-100" name="status" required="required">
                  <option Value=""> Pilih </option>
                  <option Value="Proses"> Proses </option>
                  <option Value="Selesai"> Selesai </option>
                  <option Value="Tidak Terlaksana"> Tidak Terlaksana </option>
                  <option Value="Ditunda"> Ditunda </option>
                </select>
              </div>
              <hr>
              <button type="submit" class="btn btn-primary mr-2">Simpan</button>
              <a type="button" class="btn btn-light" href="<?php echo site_url('hasilrapat/index'); ?>">Kembali</a>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php $this->load->view('template/footer'); ?>