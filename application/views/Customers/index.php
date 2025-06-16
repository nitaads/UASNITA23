<div class="content-wrapper">
  <!-- Content Header -->
  <section class="content-header">
    <div class="container-fluid">
      <h1><?= isset($title) ? $title : 'Dashboard Admin' ?></h1>
    </div>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <!-- Form Filter & Tambah -->
      <div class="row mb-3">
        <div class="col-md-6">
          <form method="get" action="<?= site_url('customers') ?>">
            <div class="input-group">
              <input type="text" name="keyword" class="form-control" placeholder="Cari nama pelanggan..." value="<?= htmlspecialchars($this->input->get('keyword')) ?>">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fas fa-search"></i> Cari
                </button>
              </div>
            </div>
          </form>
        </div>

        <div class="col-md-6 text-right">
          <a href="<?= site_url('customers/create') ?>" class="btn btn-success">
            <i class="fas fa-plus"></i> Tambah Pelanggan
          </a>
        </div>
      </div>

      <!-- Tabel pelanggan -->
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($customers)) : ?>
            <?php foreach ($customers as $index => $customer) : ?>
              <tr>
                <td><?= $index + 1 ?></td>
                <td><?= htmlspecialchars($customer['nama']) ?></td>
                <td><?= htmlspecialchars($customer['alamat']) ?></td>
                <td><?= htmlspecialchars($customer['telepon']) ?></td>
                <td>
                  <a href="<?= site_url('customers/edit/' . $customer['id']) ?>" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                  <a href="<?= site_url('customers/delete/' . $customer['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus pelanggan ini?')">
                    <i class="fas fa-trash"></i> Hapus
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td colspan="5" class="text-center">Belum ada data pelanggan.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>

    </div><!-- /.container-fluid -->
  </section>
</div>

