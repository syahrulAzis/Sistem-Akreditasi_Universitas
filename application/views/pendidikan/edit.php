<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Basic form elements</h4>
                            <form action="" method="POST">
                                <input type="hidden" name="id_pendidikan" value="<?= $pendidikan['id_pendidikan']; ?>">
                                <div class="form-group">
                                    <label>Standar</label>
                                    <select class="js-example-basic-single w-100" name="standar_id" id="standar_id" required>
                                        <option value="<?= $pendidikan['standar_id']; ?>">
                                            <?php
                                            $id_standar = $pendidikan['standar_id'];

                                            $this->db->where('id_standar', $id_standar);
                                            $this->db->from('standar');
                                            $query = $this->db->get();

                                            foreach ($query->result() as $sst) {
                                                echo $sst->no_standar;
                                            }
                                            ?>
                                        </option>
                                        <?php foreach ($standar as $sst) : ?>
                                            <option value="<?= $sst['id_standar']; ?>"><?= $sst['no_standar']; ?> (<?= $sst['deskripsi_standar']; ?>)</option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input type="text" name="des_pendidikan" id="des_pendidikan" class="form-control" value="<?= $pendidikan['des_pendidikan']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Ajaran</label>
                                    <input type="text" name="tahun_ajaran" id="tahun_ajaran" class="form-control" value="<?= $pendidikan['tahun_ajaran']; ?>" placeholder="2019-2020" required>
                                </div>
                                <div class="form-group">
                                    <label>Periode</label>
                                    <select class="js-example-basic-single w-100" name="periode" id="periode" required>
                                        <option value="<?= $pendidikan['periode']; ?>"><?= $pendidikan['periode']; ?></option>
                                        <option value="Ganjil">Ganjil</option>
                                        <option value="Genap">Genap</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kegiatan</label>
                                    <select class="js-example-basic-single w-100" name="kegiatan" id="kegiatan" required>
                                        <option value="<?= $pendidikan['kegiatan']; ?>"><?= $pendidikan['kegiatan']; ?></option>
                                        <option value="UTS">UTS</option>
                                        <option value="UAS">UAS</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Fakultas</label>
                                    <select class="js-example-basic-single w-100" name="fakultas_id" id="fakultas_id" required>
                                        <option value="<?= $pendidikan['fakultas_id']; ?>">
                                            <?php
                                            $id_fakultas = $pendidikan['fakultas_id'];

                                            $this->db->where('id_fakultas', $id_fakultas);
                                            $this->db->from('fakultas');
                                            $query = $this->db->get();

                                            foreach ($query->result() as $ff) {
                                                echo $ff->nama_fakultas;
                                            }

                                            ?>
                                        </option>
                                        <?php foreach ($fakultas as $m) : ?>
                                            <option value="<?= $m['id_fakultas']; ?>"><?= $m['nama_fakultas']; ?></option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Program Studi</label>
                                    <select class="js-example-basic-single w-100" name="prodi_id" id="prodi_id" required>
                                        <option value="<?= $pendidikan['prodi_id']; ?>">
                                            <?php
                                            $id_prodi = $pendidikan['prodi_id'];

                                            $this->db->where('id_prodi', $id_prodi);
                                            $this->db->from('prodi');
                                            $query = $this->db->get();

                                            foreach ($query->result() as $pr) {
                                                echo $pr->nama_prodi;
                                            }
                                            ?>
                                        </option>
                                        <?php foreach ($prodi as $p) : ?>
                                            <option value="<?= $p['id_prodi']; ?>"><?= $p['nama_prodi']; ?></option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="js-example-basic-single w-100" name="is_active_pendidikan" id="is_active_pendidikan" required>
                                        <option value="<?= $pendidikan['is_active_pendidikan']; ?>"><?= $pendidikan['is_active_pendidikan']; ?></option>
                                        <option value="0">Nonaktif</option>
                                        <option value="1">Pelaksanaan</option>
                                        <option value="2">Evaluasi</option>
                                        <option value="3">Pengendalian</option>
                                        <option value="4">Peningkatan</option>
                                    </select>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-outline-success btn-fw mr-2">
                                    <i class="fa fa-save"></i>
                                    Simpan
                                </button>
                                <a type="button" class="btn btn-outline-danger btn-fw" href="<?php echo site_url('pendidikan'); ?>">
                                    <i class="fa fa-undo"></i>
                                    Kembali
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>