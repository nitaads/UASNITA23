<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Pelanggan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url('customers') ?>">Pelanggan</a></li>
            <li class="breadcrumb-item active">Edit Pelanggan</li>
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
          <h3 class="card-title">Form Edit Pelanggan</h3>
        </div>

        <!-- form start -->
        <form action="<?= site_url('customers/update/' . $customer['id']) ?>" method="post">
          <div class="card-body">
            <div class="form-group">
              <label for="nama">Nama Pelanggan</label>
              <input type="text" name="nama" class="form-control" id="nama" value="<?= htmlspecialchars($customer['nama']) ?>" required>
            </div>

            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control" rows="3" required><?= htmlspecialchars($customer['alamat']) ?></textarea>
            </div>

            <div class="form-group">
              <label for="telepon">Telepon</label>
              <input type="text" name="telepon" class="form-control" id="telepon" value="<?= htmlspecialchars($customer['telepon']) ?>" required>
            </div>
          </div>

          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?= site_url('customers') ?>" class="btn btn-secondary">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
