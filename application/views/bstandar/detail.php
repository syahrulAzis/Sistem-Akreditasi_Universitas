<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin grid-margin-md-0 stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Detail Borang Standar</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-dark">
                  <li class="breadcrumb-item active" aria-current="page"><?php echo $standar['nama_bstandar']; ?></li>
                </ol>
              </nav>
              <ul class="nav nav-tabs tab-solid tab-solid-danger" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="tab-5-1" data-toggle="tab" href="#home-5-1" role="tab" aria-controls="home-5-1" aria-selected="true">Detail</a>
                </li>
              </ul>
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
                                  <th>Nama Standar</th>
                                  <td>:</td>
                                  <td><?php echo $standar['nama_bstandar']; ?></td>
                                </tr>
                                <tr>
                                  <th>Versi</th>
                                  <td>:</td>
                                  <td><?php echo $standar['versi_bstandar']; ?></td>
                                </tr>
                                <tr>
                                  <th>Tahun</th>
                                  <td>:</td>
                                  <td><?php echo $standar['tahun_bstandar']; ?></td>
                                </tr>
                                <tr>
                                  <th>Jenis</th>
                                  <td>:</td>
                                  <td><?php echo $standar['jenis_bstandar']; ?></td>
                                </tr>
                                <tr>
                                  <th>Timestamp</th>
                                  <td>:</td>
                                  <td><?php echo $standar['timestamp_bstandar']; ?></td>
                                </tr>
                              </tbody>
                            </table>
                            <hr>
                            <a type="button" class="btn btn-light" href="<?php echo site_url('bstandar'); ?>">Kembali</a>
                            <a type="button" class="btn btn-warning" href="<?php echo site_url('bstandar/update/' . $standar['id_bstandar']); ?>">Edit</a>
                            <a type="button" class="btn btn-danger" href="<?php echo site_url('bstandar/delete/' . $standar['id_bstandar']); ?>" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
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

    <?php $this->load->view('template/footer'); ?>