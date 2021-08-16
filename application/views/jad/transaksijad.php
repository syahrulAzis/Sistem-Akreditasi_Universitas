<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-md">
                                <div class="card-body">
                                    <h4 class="card-title">Transaksi JAD</h4>
                                    <hr>
                                    <a type="button" class="btn btn-outline-primary" href="<?php echo site_url('jad/addtransaksi'); ?>"><i class="fa fa-plus-circle"></i>Tambah</a>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table id="order-listing" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Dokumen</th>
                                                        <th>Jad</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($tj as $j) { ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php
                                                                $id_dokumen = $j['id_dokumen_pendidikan'];

                                                                $this->db->where('id_dokumen_pendidikan', $id_dokumen);
                                                                $this->db->from('pendidikan_dokumen');
                                                                $q = $this->db->get();

                                                                foreach ($q->result() as $dok) {
                                                                    echo $dok->nama_dokumen;
                                                                }
                                                                ?></td>
                                                            <td><?php
                                                                $id_jad = $j['id_jad'];

                                                                $this->db->where('id_jad', $id_jad);
                                                                $this->db->from('jad');
                                                                $q = $this->db->get();

                                                                foreach ($q->result() as $jd) {
                                                                    echo $jd->kode_jad;
                                                                }
                                                                ?></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="icon-layers"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                                        <a class="dropdown-item" href="<?php echo site_url('jad/deletetransaksi/' . $j['id_pjt']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>