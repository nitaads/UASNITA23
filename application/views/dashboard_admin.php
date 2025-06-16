<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= isset($title) ? $title : 'Dashboard' ?></h1>
        </div>
        <!-- Jika butuh breadcrumb, aktifkan bagian ini -->
        <!--
        <div class="col-sm-6 text-right">
  <a href="<?= site_url('products/create') ?>" class="btn btn-primary">+ Tambah Produk</a>
</div>

        -->
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <?= isset($content) ? $content : '' ?>
    </div>
  </section>
  
</div>
<!-- /.content-wrapper -->
