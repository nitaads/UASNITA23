<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Pelanggan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url('customers') ?>">Pelanggan</a></li>
            <li class="breadcrumb-item active">Tambah Pelanggan</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Form Tambah Pelanggan</h3>
        </div>

        <!-- form start -->
        <form action="<?= site_url('customers/store') ?>" method="post">
          <div class="card-body">
            <div class="form-group">
              <label for="nama">Nama Pelanggan</label>
              <input type="text" name="nama" class="form-control" id="nama" required>
            </div>

            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control" rows="3" required></textarea>
            </div>

            <div class="form-group">
              <label for="telepon">Telepon</label>
              <input type="text" name="telepon" class="form-control" id="telepon" required>
            </div>
          </div>

          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= site_url('customers') ?>" class="btn btn-secondary">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
