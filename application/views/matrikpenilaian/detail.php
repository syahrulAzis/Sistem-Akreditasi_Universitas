<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin grid-margin-md-0 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data</h4>
                            <div class="tab-content tab-content-solid">
                                <div class="tab-pane fade show active" id="home-5-1" role="tabpanel" aria-labelledby="tab-5-1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover">
                                                            <tbody>
                                                                <tr>
                                                                    <th>No Butir Matrik</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $matrik['no_butir_matrik']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Kode Elemen Penilaian</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $matrik['kode_elemen_penilaian']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Elemen Penilaian</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $matrik['elemen_penilaian']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Kode Indikator</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $matrik['kode_indikator']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Indikator Penilaian</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $matrik['indikator_penilaian']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Kode Magterik Penilaian Borang</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $matrik['kode_magterik_penilaian_borang']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Kode Ringkasan Standar</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $matrik['kode_ringkasan_standar']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Nomor Dokumen</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $matrik['nomor_dokumen']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Standar Pendiidkan</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $matrik['standar_pendidikan']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Diunggah Oleh</th>
                                                                    <td>:</td>
                                                                    <td><?php
                                                                        $ids = $matrik['user_id'];

                                                                        $this->db->where('id', $ids);
                                                                        $this->db->from('user');
                                                                        $query = $this->db->get();

                                                                        foreach ($query->result() as $user) {
                                                                            echo $user->name;
                                                                        }
                                                                        ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Timestamp</th>
                                                                    <td>:</td>
                                                                    <td><?php echo $matrik['matrik_timestamp']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <hr>
                                                        <a type="button" class="btn btn-outline-light" href="<?php echo site_url('MatrikPenilaian'); ?>"><i class="fa fa-undo"></i> Kembali</a>
                                                        <a type="button" class="btn btn-outline-warning" href="<?php echo site_url('MatrikPenilaian/update/' . $matrik['id_penilaian']); ?>"><i class="fa fa-pencil"></i> Edit</a>
                                                        <a type="button" class="btn btn-outline-danger" href="<?php echo site_url('MatrikPenilaian/delete/' . $matrik['id_penilaian']); ?>" onclick="return confirm('Apakah kamu yakin ?')"><i class="fa fa-trash"></i> Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>