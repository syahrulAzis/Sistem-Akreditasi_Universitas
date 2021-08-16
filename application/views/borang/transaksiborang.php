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
                                    <h4 class="card-title">Transaksi Borang</h4>
                                    <hr>
                                    <a type="button" class="btn btn-outline-primary" href="<?php echo site_url('borang/addtransaksi'); ?>"><i class="fa fa-plus-circle"></i>Tambah</a>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table id="order-listing" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Dokumen</th>
                                                        <th>Kode Borang</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($borang as $b) { ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php
                                                                $id_dokumen = $b['id_dokumen_pendidikan'];

                                                                $this->db->where('id_dokumen_pendidikan', $id_dokumen);
                                                                $this->db->from('pendidikan_dokumen');
                                                                $q = $this->db->get();

                                                                foreach ($q->result() as $dok) {
                                                                    echo $dok->nama_dokumen;
                                                                }
                                                                ?></td>
                                                            <td><?php
                                                                $id_kborang = $b['id_kborang'];

                                                                $this->db->where('id_kborang', $id_kborang);
                                                                $this->db->from('kborang');
                                                                $q = $this->db->get();

                                                                foreach ($q->result() as $kb) {
                                                                    echo $kb->kode_borang;
                                                                }
                                                                ?></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="icon-layers"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                                        <a class="dropdown-item" href="<?php echo site_url('borang/deletetransaksi/' . $b['id_btp']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
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