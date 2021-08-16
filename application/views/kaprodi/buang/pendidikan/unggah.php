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
                                <label>Pendidikan Id</label>
                                <input type="text" class="form-control" name="pendidikan_id" id="pendidikan_id" value="<?= $dokumen['pendidikan_id']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Aspek</label>
                                <input type="text" class="form-control" name="aspek" id="aspek" value="<?= $dokumen['aspek']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Dokumen</label>
                                <input type="text" class="form-control" name="nama_dokumen" id="nama_dokumen" value="<?= $dokumen['nama_dokumen']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Diunggah Oleh</label>
                                <input type="text" class="form-control" name="user_id" id="user_id" value="<?php $id_name = $dokumen['user_id'];
                                                                                                            $this->db->from('user');
                                                                                                            $this->db->where('id', $id_name);
                                                                                                            $query = $this->db->get();

                                                                                                            if ($query->num_rows() > 0) {
                                                                                                                foreach ($query->result() as $na) {
                                                                                                                    echo $na->name;
                                                                                                                }
                                                                                                            } else {
                                                                                                                echo 'null';
                                                                                                            }
                                                                                                            ?>" readonly>
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
                            <a type="button" class="btn btn-light" href="<?php echo site_url('KaprodiPendidikan/detail/' . $dokumen['pendidikan_id']); ?>">Kembali</a>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>