<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= isset($title) ? $title : 'Sales Order System' ?></title>

  <!-- Custom Style: Fix kolom panjang -->
  <style>
    th.kode-produk, td.kode-produk {
      max-width: 150px;
      white-space: normal !important;
      word-wrap: break-word !important;
      overflow-wrap: break-word !important;
    }
  </style>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css') ?>">

  <!-- AdminLTE & Plugin Styles -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist/css/adminlte.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">

  <!-- jQuery & Bootstrap (wajib dimuat sebelum AdminLTE.js) -->
  <script src="<?= base_url('assets/adminlte/plugins/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left nav -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= site_url('dashboard_' . $this->session->userdata('role')) ?>" class="nav-link">Dashboard</a>
      </li>
    </ul>

    <!-- Right nav -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a href="<?= site_url('auth/logout') ?>" class="nav-link">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </li>
    </ul>
  </nav>

  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Logo -->
    <a href="<?= site_url('dashboard_' . $this->session->userdata('role')) ?>" class="brand-link">
      <img src="<?= base_url('assets/adminlte/dist/img/AdminLTELogo.png') ?>" alt="Logo" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">Sales Order</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- User panel -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/adminlte/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $this->session->userdata('username') ?></a>
          <small class="text-muted"><?= ucfirst($this->session->userdata('role')) ?></small>
        </div>
      </div>

      <!-- Menu -->
      <nav class="mt-2">
        <?php $role = $this->session->userdata('role'); ?>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
          <li class="nav-item">
            <a href="<?= site_url('dashboard_' . $role) ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard
              </p>
            </a>
          </li>

          <?php if ($role === 'admin') : ?>
            <li class="nav-item"><a href="<?= site_url('products') ?>" class="nav-link"><i class="nav-icon fas fa-box"></i><p>Produk</p></a></li>
            <li class="nav-item"><a href="<?= site_url('customers') ?>" class="nav-link"><i class="nav-icon fas fa-users"></i><p>Pelanggan</p></a></li>
            <li class="nav-item"><a href="<?= site_url('sales') ?>" class="nav-link"><i class="nav-icon fas fa-user-tie"></i><p>Sales</p></a></li>
          <?php endif; ?>

          <?php if (in_array($role, ['admin', 'sales'])) : ?>
            <li class="nav-item"><a href="<?= site_url('sales_order') ?>" class="nav-link"><i class="nav-icon fas fa-shopping-cart"></i><p>Sales Order</p></a></li>
          <?php endif; ?>

          <?php if (in_array($role, ['admin', 'manager'])) : ?>
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item"> <!-- Mulai menu baru -->
                <a href="<?= base_url('products/laporan');?>" class="nav-link">
                  <i class="far fa-newspaper nav-icon"></i>
                  <p>Laporan Produk</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item"> <!-- Mulai menu baru -->
                <a href="<?= base_url('Sales_order/laporan');?>" class="nav-link">
                  <i class="far fa-newspaper nav-icon"></i>
                  <p>Laporan Periode</p>
                </a>
              </li>
            </ul>

          </li>
          <?php endif; ?>

          <li class="nav-item">
            <a href="<?= site_url('auth/logout') ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i><p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Konten akan diteruskan di bagian view seperti dashboard_admin.php -->
