<?php $this->load->view('layouts/header'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1>Laporan Penjualan</h1>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <table id="datatable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal Order</th>
                <th>Nama Pelanggan</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Subtotal</th>
                <th>Status</th>
                <th>Nama Sales</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($laporan as $row): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= date('Y-m-d', strtotime($row->tanggal_order)) ?></td>
                  <td><?= html_escape($row->nama_pelanggan) ?></td>
                  <td><?= html_escape($row->nama_produk) ?></td>
                  <td><?= $row->jumlah ?></td>
                  <td>Rp<?= number_format($row->harga_satuan, 0, ',', '.') ?></td>
                  <td>Rp<?= number_format($row->subtotal, 0, ',', '.') ?></td>
                  <td><?= ucfirst($row->status) ?></td>
                  <td><?= html_escape($row->nama_sales ?? '-') ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>

<?php $this->load->view('layouts/footer'); ?>
