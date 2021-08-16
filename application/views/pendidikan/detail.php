<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center">Form Monitoring Proses Pembelajaran</h1>
                    <h6 class="text-center font-weight-bold">Kelengkapan Dokumen</h6>
                    <hr>
                    <table class="table table-borderless w-100 mt-4">
                        <?php
                        $no = 1;
                        foreach ($pendidikan as $row) { ?>
                            <tr>
                                <td><strong>Objek Id</strong> </td>
                                <td>: <?= $row->object_id_pendidikan; ?></td>
                                <td><strong>Tahun Ajaran</strong></td>
                                <td>: <?= $row->tahun_ajaran; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Standar </strong></td>
                                <td>:
                                    <?php
                                    $id_standar = $row->standar_id;

                                    $this->db->where('id_standar', $id_standar);
                                    $this->db->from('standar');
                                    $query = $this->db->get();

                                    foreach ($query->Result() as $stt) {
                                        echo $stt->no_standar . ' (' . $stt->deskripsi_standar . ')';
                                    }

                                    ?>
                                </td>
                                <td><strong>Fakultas </strong> </td>
                                <td>: <?= $row->nama_fakultas; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Deskripsi </strong> </td>
                                <td>: <?= $row->des_pendidikan; ?></td>
                                <td><strong>Program Studi </strong> </td>
                                <td>: <?= $row->nama_prodi; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Pembuat </strong> </td>
                                <td>: <?= $row->name; ?></td>
                                <td><strong>Kegiatan</strong> </td>
                                <td>: <?= $row->kegiatan; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Dibuat </strong> </td>
                                <td>: <?= $row->pendidikan_timestamp; ?></td>
                                <td><strong>Periode</strong> </td>
                                <td>: <?= $row->periode; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Kelengkapan </strong> </td>
                                <td>:
                                    <?php
                                    $h_pendidikan = $row->id_pendidikan;

                                    $this->db->like('pendidikan_id', $h_pendidikan);
                                    $this->db->from('pendidikan_transaksi');
                                    $result = $this->db->count_all_results();
                                    // echo $total_asset;
                                    echo '<label class="badge badge-info badge-pill">' . $result . '/' . $total_asset . '</label>';
                                    ?>
                                </td>
                                <td><strong>Keterangan </strong> </td>
                                <td>: <?php
                                        if ($row->is_active_pendidikan > 1) {
                                            echo '<label class="badge badge-success badge-pill">Selesai</label>';
                                        } elseif ($row->is_active_pendidikan > 0) {
                                            echo '<label class="badge badge-primary badge-pill">Aktif</label>';
                                        } else {
                                            echo '<label class="badge badge-warning badge-pill">Nonaktif</label>';
                                        }
                                        ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    <hr>
                    <div class="text-left">
                        <!--<button type="button" class="btn btn-outline-info btn-fw" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"></i> Tambah</button>-->
                        <a class="btn btn-outline-primary btn-fw" href="<?php echo site_url('pendidikan/adddokumen/' . $row->id_pendidikan); ?>"><i class="fa fa-plus-circle"></i> Tambah</a>
                        <?php
                        $no = 1;
                        foreach ($pendidikan as $row) { ?>
                            <a class="btn btn-outline-danger btn-fw" href="<?php echo site_url('pendidikan/generatedokumen/' . $row->id_pendidikan); ?>" onclick="return confirm('PERHATIAN!!! generate akan menginput data secara otomatis')"><i class="fa fa-free-code-camp"></i> Generate</a>
                        <?php } ?>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Aspek</th>
                                    <th>Dokumen</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($dokumen as $row) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row->aspek; ?></td>
                                        <td><?= $row->nama_dokumen; ?></td>
                                        <td>
                                            <?php
                                            $id_role = $row->role_id;

                                            $this->db->where('id', $id_role);
                                            $this->db->from('user_role');
                                            $q = $this->db->get();

                                            foreach ($q->result() as $role);
                                            echo $role->role;
                                            ?>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="icon-layers"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                    <a class="dropdown-item" href="<?php echo site_url('pendidikan/detaildokumen/' . $row->id_transaksi_pendidikan); ?>">Detail</a>
                                                    <a class="dropdown-item" href="<?php echo site_url('pendidikan/deletedokumen/' . $row->id_transaksi_pendidikan); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <a type="button" class="btn btn-outline-light btn-fw" href="<?php echo site_url('pendidikan'); ?>">
                        <i class="fa fa-undo"></i>
                        Kembali
                    </a>
                    <hr>
                </div>
            </div>
        </div>

        <!-- Modal Tambah -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart(''); ?>
                        <div class="form-group">
                            <label>Pilih Objek Id</label>
                            <?php
                            $no = 1;
                            foreach ($pendidikan as $row) { ?>
                                <input type="text" name="pendidikan_id" id="pendidikan_id" class="form-control" value="<?php echo $row->id_pendidikan; ?>" readonly>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Aspek</label>
                            <select class="form-control" name="aspek_id" id="aspek_id">
                                <?php foreach ($ambilaspek as $asp) : ?>
                                    <option value="<?= $asp['id_aspek_pendidikan']; ?>"><?= $asp['aspek']; ?></option>
                                <? endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jenis Dokumen</label>
                            <select class="form-control" name="dokumen_id" id="dokumen_id">
                                <?php foreach ($ambildokumen as $adok) : ?>
                                    <option value="<?= $adok['id_dokumen_pendidikan']; ?>"><?= $adok['nama_dokumen']; ?></option>
                                <? endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan_dokumen" id="keterangan_dokumen" class="form-control" required>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-outline-success btn-fw mr-2">
                            <i class="fa fa-save"></i>
                            Simpan
                        </button>
                        <a type="button" class="btn btn-outline-light btn-fw" href="<?php echo site_url('DosenPendidikan'); ?>">
                            <i class="fa fa-undo"></i>
                            Kembali
                        </a>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Ends -->