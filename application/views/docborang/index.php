<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Borang</h4>
                    <hr>
                        <a type="button" class="btn btn-primary" href="<?php echo site_url('docborang/add'); ?>">Tambah</a>
                    <hr>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <!-- <tr>
                                        <th></th>
                                        <th>
                                            <form>
                                                <input type="text"  class="form-control" name="standar">
                                            </form>
                                        </th>
                                        <th>
                                            <form>
                                                <input type="text"  class="form-control" name="butir">
                                            </form>
                                        </th>
                                        <th>
                                            <form>
                                                <input type="text"  class="form-control" name="prodi">
                                            </form>
                                        </th>
                                        <th>
                                            <form>
                                                <input type="text"  class="form-control" name="kode">
                                            </form>
                                        </th>
                                        <th>
                                            <form>
                                                <input type="text"  class="form-control" name="tanggal">
                                            </form>
                                        </th>
                                        <th>
                                            <form>
                                                <input type="text"  class="form-control" name="keterangan">
                                            </form>
                                        </th>
                                    </tr> -->
                                    <tr>
                                        <th>#</th>
                                        <th>Standar</th>
                                        <th>Butir</th>
                                        <th>Prodi</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
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
                                                $id_b = $b['bstandar_id'];

                                                $this->db->where('id_bstandar', $id_b);
                                                $this->db->from('b_standar');
                                                $q = $this->db->get();

                                                foreach ($q->result() as $s) {
                                                    echo $s->nama_bstandar;
                                                }
                                                ?>
                                            </td>
                                            <td><?php
                                                $id_b = $b['butirstandar_id'];

                                                $this->db->where('id_butirstandar', $id_b);
                                                $this->db->from('b_butirstandar');
                                                $q = $this->db->get();

                                                foreach ($q->result() as $s) {
                                                    echo $s->nama_butir;
                                                }
                                                ?>
                                            </td>
                                            <td><?php
                                                $id_b = $b['prodi_id'];

                                                $this->db->where('id_prodi', $id_b);
                                                $this->db->from('prodi');
                                                $q = $this->db->get();

                                                foreach ($q->result() as $s) {
                                                    echo $s->nama_prodi;
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $b['kode_dokumen']; ?></td>
                                            <td><?php echo $b['nama_dokumen']; ?></td>
                                            <td><?php echo $b['tanggal_terbit']; ?></td>
                                            <td><?php echo $b['keterangan_dokumen']; ?></td>
                                            <td>
                                                <div class="dropdown">
                                                        <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="icon-layers"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                        
                                                            <a class="dropdown-item" href="<?= site_url('docborang/detail/' . $b['id_dokumentransaksi']); ?>">Detail</a>
                                                            <!-- <a class="dropdown-item" href="<?= site_url('docborang/update/' . $b['id_dokumentransaksi']); ?>">Edit</a> -->
                                                            <a class="dropdown-item" href="<?= site_url('docborang/delete/' . $b['id_dokumentransaksi']); ?>">Hapus</a>
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