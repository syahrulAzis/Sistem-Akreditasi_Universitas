<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>LP3M - Universitas Buana Perjuangan Karawang</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/iconfonts/simple-line-icon/css/simple-line-icons.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/iconfonts/font-awesome/css/font-awesome.min.css" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_horizontal-navbar.html -->
    <nav class="navbar horizontal-layout col-lg-12 col-12 p-0">
      <div class="nav-top flex-grow-1">
        <div class="container d-flex flex-row h-100 align-items-center">
          <div class="text-center navbar-brand-wrapper d-flex align-items-center">
            <a class="navbar-brand brand-logo" href="<? echo site_url('/'); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="<? echo site_url('/'); ?>"><img src="<?php echo base_url(); ?>assets/images/logo-mini.png" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between flex-grow-1">
            <ul class="navbar-nav navbar-nav-right mr-0 ml-auto">
              <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                  <img src="<?php echo base_url('unggah/profile/') . $user['image']; ?>" alt="profile" />
                  <span class="nav-profile-name"><?= $user['name']; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                  <a class="dropdown-item" href="<?= base_url('profil'); ?>">
                    <i class="icon-user text-primary mr-2"></i>
                    Profil
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>">
                    <i class="icon-logout text-primary mr-2"></i>
                    Keluar
                  </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="icon-menu text-dark"></span>
            </button>
          </div>
        </div>
      </div>
      <div class="nav-bottom">
        <div class="container">
          <ul class="nav page-navigation">

            <!-- QUERY MENU -->
            <?php
            $role_id = $this->session->userdata('role_id');

            $queryMenu = "SELECT `user_menu`.`id`, `menu`, `user_menu`.`icon`
                          FROM `user_menu` JOIN `user_access_menu`
                          ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                          WHERE `user_access_menu`.`role_id` = $role_id
                          ORDER BY `user_access_menu`.`menu_id` ASC
                          ";

            $menu = $this->db->query($queryMenu)->result_array();
            ?>
            <!-- END QUERY MENU -->

            <!-- LOOPING MENU-->
            <?php foreach ($menu as $m) : ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="link-icon <?= $m['icon']; ?>"></i>
                  <span class="menu-title"><?= $m['menu']; ?></span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="submenu">
                  <ul class="submenu-item">
                    <!-- LOOPING SUB-MENU -->
                    <?php
                    $menuId = $m['id'];
                    $querySubMenu = "SELECT *
                                    FROM `user_sub_menu` 
                                    WHERE `menu_id` = $menuId
                                    AND `is_active` = 1
                    ";
                    $subMenu = $this->db->query($querySubMenu)->result_array();
                    ?>

                    <?php foreach ($subMenu as $sm) : ?>
                      <li class="nav-item"><a class="nav-link" href="<?php echo site_url($sm['url']); ?>"><?= $sm['title']; ?></a></li>
                    <?php endforeach; ?>
                    <!-- END LOOPING SUB-MENU -->
                  </ul>
                </div>
              </li>

            <?php endforeach; ?>
            <!-- END LOOPING MENU-->
          </ul>
        </div>
      </div>
    </nav>