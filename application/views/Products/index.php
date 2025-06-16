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
          <form method="get" action="<?= site_url('Products') ?>">
            <div class="input-group">
              <input type="text" name="keyword" class="form-control" placeholder="Cari nama produk..." value="<?= $this->input->get('keyword') ?>">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fas fa-search"></i> Cari
                </button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-6 text-right">
          <a href="<?= site_url('products/create') ?>" class="btn btn-success">
            <i class="fas fa-plus"></i> Tambah Produk
          </a>
        </div>
      </div>

      <!-- Tabel produk -->
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($products)) : ?>
            <?php foreach ($products as $index => $product) : ?>
              <tr>
                <td><?= $index + 1 ?></td>
                <td><?= htmlspecialchars($product->kode_produk) ?></td>
                <td><?= htmlspecialchars($product->nama_produk) ?></td>
                <td><?= number_format($product->harga, 2, ',', '.') ?></td>
                <td><?= (int)$product->stok ?></td>
                <td>
                  <a href="<?= site_url('products/edit/' . $product->id) ?>" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                  <a href="<?= site_url('products/delete/' . $product->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus produk ini?')">
                    <i class="fas fa-trash"></i> Hapus
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td colspan="6" class="text-center">Data produk kosong</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>

    </div><!-- /.container-fluid -->
  </section>
</div>
