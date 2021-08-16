<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <h4 class="card-title">Data Pendidikan dan Pengajaran</h4>
                                    <center>
                                        <div class="template-demo">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" class="btn btn-outline-secondary" href="<?php echo site_url('pendidikan'); ?>">Form <br>Pembelajaran</a>
                                            </div>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" class="btn btn-outline-secondary" href="<?php echo site_url('pendidikan/getAspek'); ?>">Aspek</a>
                                                <a type="button" class="btn btn-outline-secondary" href="<?php echo site_url('pendidikan/getTipedokumen'); ?>">Tipe <br>Dokumen</a>
                                                <a type="button" class="btn btn-outline-secondary" href="<?php echo site_url('pendidikan/getStatus'); ?>">Status <br>Dokumen</a>
                                                <a type="button" class="btn btn-outline-secondary" href="<?php echo site_url('pendidikan/getJad'); ?>">Kode <br>Jad</a>
                                                <a type="button" class="btn btn-outline-secondary" href="<?php echo site_url('pendidikan/getBorang'); ?>">Kode <br>Borang</a>
                                            </div>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-md">
                                <div class="card-body">
                                    <h4 class="card-title">Tipe Dokumen</h4>
                                    <hr>
                                    <a type="button" class="btn btn-primary" href="<?php echo site_url('pendidikan/addaspekdok'); ?>">Tambah</a>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table id="order-listing" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Standar</th>
                                                        <th>Mp</th>
                                                        <th>Sop</th>
                                                        <th>Formulir</th>
                                                        <th>Aspek</th>
                                                        <th>Nama Dokumen</th>
                                                        <th>Role</th>
                                                        <th>Target</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($aspekdok as $ad) { ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td>
                                                                <?php
                                                                $id_standar = $ad['standar_id'];

                                                                $this->db->where('id_standar', $id_standar);
                                                                $this->db->from('standar');
                                                                $q = $this->db->get();

                                                                foreach ($q->Result() as $s) {
                                                                    echo $s->no_standar;
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php

                                                                $id_mp = $ad['mp_id'];

                                                                $this->db->where('id_mp', $id_mp);
                                                                $this->db->from('mp');
                                                                $q = $this->db->get();

                                                                foreach ($q->Result() as $mp) {
                                                                    echo $mp->no_mp;
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $id_sop = $ad['sop_id'];

                                                                $this->db->where('id_sop', $id_sop);
                                                                $this->db->from('sop');
                                                                $q = $this->db->get();

                                                                foreach ($q->result() as $sop) {
                                                                    echo $sop->no_sop;
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $id_formulir = $ad['formulir_id'];

                                                                $this->db->where('id_formulir', $id_formulir);
                                                                $this->db->from('formulir');
                                                                $q = $this->db->get();

                                                                foreach ($q->Result() as $f) {
                                                                    echo $f->no_formulir;
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?php echo $ad['aspek']; ?></td>
                                                            <td><?php echo $ad['nama_dokumen']; ?></td>
                                                            <td>
                                                                <?php
                                                                $role_id = $ad['role_id'];

                                                                $this->db->where('id', $role_id);
                                                                $this->db->from('user_role');
                                                                $query = $this->db->get();

                                                                foreach ($query->result() as $role) {
                                                                    echo $role->role;
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?php echo $ad['target_dokumen']; ?></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-primary icon-btn dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="icon-layers"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                                                                        <a class="dropdown-item" href="<?php echo site_url('pendidikan/updateaspekdok/' . $ad['id_dokumen_pendidikan']); ?>">Edit</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item" href="<?php echo site_url('pendidikan/deleteaspekdok/' . $ad['id_dokumen_pendidikan']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
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