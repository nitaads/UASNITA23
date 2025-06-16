<div class="content-wrapper">
  <!-- Content Header -->
  <section class="content-header">
    <div class="container-fluid">
      <h1><?= isset($title) ? $title : 'Data Sales Order' ?></h1>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
<!-- Form Filter & Tombol Tambah -->
<div class="row mb-3">
  <div class="col-md-6">
    <form method="get" action="<?= site_url('sales_order') ?>">
      <div class="input-group">
        <input type="text" name="keyword" class="form-control" placeholder="Cari nama pelanggan atau produk..." value="<?= htmlspecialchars($this->input->get('keyword')) ?>">
        <div class="input-group-append">
          <button class="btn btn-primary" type="submit">
            <i class="fas fa-search"></i> Cari
          </button>
        </div>
      </div>
    </form>
  </div>

  <div class="col-md-6 text-right">
    <a href="<?= site_url('sales_order/create') ?>" class="btn btn-success">
      <i class="fas fa-plus"></i> Tambah Sales Order
    </a>
  </div>
</div>

      <!-- Tabel Data Sales Order -->
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal Order</th>
            <th>Nama Produk</th>
            <th>Nama Pelanggan</th>
            <th>Jumlah</th>
            <th>Harga Satuan</th>
            <th>Subtotal</th>
            <th>Status</th>
            <th>Sales</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($orders)) : ?>
            <?php $no = 1; foreach ($orders as $order) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= isset($order->tglorder) ? date('d-m-Y', strtotime($order->tglorder)) : '-' ?></td>
                <td><?= htmlspecialchars($order->nama_produk) ?></td>
                <td><?= htmlspecialchars($order->nama_pelanggan) ?></td>
                <td><?= $order->jumlah ?></td>
                <td><?= 'Rp ' . number_format($order->harga_satuan, 0, ',', '.') ?></td>
                <td><?= 'Rp ' . number_format($order->subtotal, 0, ',', '.') ?></td>
                <td><?= ucfirst($order->status) ?></td>
                <td><?= htmlspecialchars($order->nama) ?></td>
                <td>
                  <a href="<?= site_url('sales_order/edit/' . $order->id) ?>" class="btn btn-sm btn-primary">
  <i class="fas fa-edit"></i> Edit
</a>
<a href="<?= site_url('sales_order/delete/' . $order->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus sales order ini?')">
  <i class="fas fa-trash"></i> Hapus
</a>

                </td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td colspan="10" class="text-center">Belum ada data sales order.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>

    </div>
  </section>
</div>
