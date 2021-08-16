<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Lampiran</h4>
                    <hr>
                    <?php
                    $no = 1;
                    foreach ($pendidikan as $row) { ?>
                        <a type="button" class="btn btn-outline-primary btn-fw" href="<?php echo site_url('PeningkatanPendidikan/tambahLampiran/' . $row->id_pendidikan_peningkatan); ?>">
                            <i class="fa fa-plus"></i>
                            Tambah
                        </a>
                    <?php } ?>
                    <hr>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Dokumen</th>
                                        <th>Deskripsi</th>
                                        <th>File</th>
                                        <th>Diunggah Oleh</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($lampiran as $l) { ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $l['nama_lampiran']; ?></td>
                                            <td><?php echo $l['deskripsi_lampiran']; ?></td>
                                            <td>
                                                <?php if ($l['file'] == false) {
                                                    echo '<button type="button" class="btn btn-icons btn-rounded btn-outline-light disabled""><i class="fa fa-eye-slash"></i></button>';
                                                } else {
                                                    echo '<a class="btn btn-icons btn-rounded btn-outline-success" href="' . base_url('unggah/pendidikan/' . $l['file']) . '" target="_blank"><i class="fa fa-eye pt-2 pl-0"></i></a>';
                                                }
                                                ?>
                                            </td>
                                            <td><?php
                                                $id_user =  $l['user_id'];
                                                $this->db->where('id', $id_user);
                                                $this->db->from('user');
                                                $q = $this->db->get();

                                                foreach ($q->Result() as $u) {
                                                    echo $u->name;
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="icon-layers"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                        <a class="dropdown-item" href="<?php echo site_url('PeningkatanPendidikan/suntingLampiran/' . $l['id_pendidikan_lampiran']); ?>">Edit</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="<?php echo site_url('PeningkatanPendidikan/hapusLampiran/' . $l['id_pendidikan_lampiran']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <hr>
                            <a type="button" class="btn btn-outline-danger btn-fw" href="<?php echo site_url('PeningkatanPendidikan'); ?>">
                                <i class="fa fa-undo"></i>
                                Kembali
                            </a>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>