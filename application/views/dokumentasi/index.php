<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Jejak Perubahan</h4>
                            <div class="mt-5">
                                <div class="vertical-timeline">
                                    <?php
                                    foreach ($dokumentasi as $d) { ?>
                                        <div class="timeline-wrapper <?php echo $d['cover']; ?>">
                                            <div class="timeline-badge"></div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h6 class="timeline-title"><?php echo $d['title']; ?></h6>
                                                </div>
                                                <div class="timeline-body">
                                                    <p><?php echo $d['content']; ?></p>
                                                    <p><a href="<?php echo site_url('dokumentasi/detail/' . $d['id_dok']); ?>">Detail ...</a><br></p>
                                                </div>
                                                <div class="timeline-footer d-flex align-items-center">
                                                    <span class="ml-auto font-weight-bold"><?php echo $d['time']; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial -->
    </div>
    <!-- main-panel ends -->
</div>