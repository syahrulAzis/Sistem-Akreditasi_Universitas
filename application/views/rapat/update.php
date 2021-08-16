<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Basic form elements</h4><br>
              <?php echo form_open_multipart(); ?>
              <div class="form-group">
                <label>Hari</label>
                <select class="js-example-basic-single w-100" name="hari" required="required">
                <option value="<?= $rapat['hari']; ?>"><?= $rapat['hari']; ?></option>
                  <option Value="Senin"> Senin </option>
                  <option Value="selasa"> Selasa </option>
                  <option Value="Rabu"> Rabu </option>
                  <option Value="Kamis"> Kamis </option>
                  <option Value="Jumat"> Jumat </option>
                  <option Value="Sabtu"> Sabtu </option>
                  <option Value="Minggu"> Minggu </option>
                </select>
              </div>
              <div class="form-group">
                <label>Tanggal Rapat</label>
                <input type="date" name="tanggal" value="<?php echo $rapat['tanggal']; ?>" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label>Jenis Rapat</label>
                <select class="js-example-basic-single w-100" name="jenis_rapat" required="required">
                <option value="<?= $rapat['jenis_rapat']; ?>"><?= $rapat['jenis_rapat']; ?></option>
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
                <label>Materi/Agenda</label>
                <?php echo form_input('materi', $rapat['materi'], 'class="form-control" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Peserta Undangan</label>
                <?php echo form_input('pst_undangan', $rapat['pst_undangan'], 'class="form-control" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Pimpinan Rapat</label>
                <?php echo form_input('pimpinan_rapat', $rapat['pimpinan_rapat'], 'class="form-control" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Notulen Rapat</label>
                <?php echo form_input('notulen_rapat', $rapat['notulen_rapat'], 'class="form-control" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>Semester</label>
                <select class="js-example-basic-single w-100" name="semester" required="required">
                <option value="<?= $rapat['semester']; ?>"><?= $rapat['semester']; ?></option>
                  <option Value="Genap"> Genap </option>
                  <option Value="Ganjil"> Ganjil </option>
                </select>
              </div>
              <div class="form-group">
                <label>Tahun Akademik</label>
                <select class="js-example-basic-single w-100" name="thn_akademik" required="required">
                <option value="<?= $rapat['thn_akademik']; ?>"><?= $rapat['thn_akademik']; ?></option>
                  <option Value="2019-2020"> 2019-2020 </option>
                  <option Value="2020-2021"> 2020-2021 </option>
                </select>
              </div>
              <div class="form-group">
                <label>Jumlah</label>
                <?php echo form_input('jml_rapat', $rapat['jml_rapat'], 'class="form-control" required="required" placeholder=""'); ?>
              </div>
              <div class="form-group">
                <label>File Upload Notuteln, Daftar Hadir, Udangan Rapat & Foto</label><br>
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
              <a type="button" class="btn btn-light" href="<?php echo site_url('rapat'); ?>">Kembali</a>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php $this->load->view('template/footer'); ?>