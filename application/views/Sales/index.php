<div class="content-wrapper">
  <!-- Content Header -->
  <section class="content-header">
    <div class="container-fluid">
      <h1><?= isset($title) ? $title : 'Data Sales' ?></h1>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <!-- Form Filter & Tombol Tambah -->
      <div class="row mb-3">
        <div class="col-md-6">
          <form method="get" action="<?= site_url('sales') ?>">
            <div class="input-group">
              <input type="text" name="keyword" class="form-control" placeholder="Cari nama sales..." value="<?= htmlspecialchars($this->input->get('keyword')) ?>">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fas fa-search"></i> Cari
                </button>
              </div>
            </div>
          </form>
        </div>

        <div class="col-md-6 text-right">
          <a href="<?= site_url('sales/create') ?>" class="btn btn-success">
            <i class="fas fa-plus"></i> Tambah Sales
          </a>
        </div>
      </div>

      <!-- Tabel Data Sales -->
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>ID Sales</th> <!-- ← ubah dari 'Id' -->
      <th>Nama Sales</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($sales)) : ?>
      <?php foreach ($sales as $s) : ?>
        <tr>
          <td><?= htmlspecialchars($s['idsales']) ?></td> <!-- ← tampilkan idsales dari DB -->
          <td><?= htmlspecialchars($s['nama']) ?></td>
          <td>
            <a href="<?= site_url('sales/edit/' . $s['id']) ?>" class="btn btn-sm btn-primary">
              <i class="fas fa-edit"></i> Edit
            </a>
            <a href="<?= site_url('sales/delete/' . $s['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus sales ini?')">
              <i class="fas fa-trash"></i> Hapus
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php else : ?>
      <tr>
        <td colspan="3" class="text-center">Belum ada data sales.</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>


    </div>
  </section>
</div>
