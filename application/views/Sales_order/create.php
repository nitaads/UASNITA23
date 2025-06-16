<?php $this->load->view('layouts/header'); ?>

<div class="container mt-4">
    <h3 class="mb-4"><?= html_escape($title) ?></h3>

    <?= form_open('sales_order/create'); ?>

    <div class="form-group">
        <label for="tglorder"> Tanggal Order </label>
        <input type="date" name="tglorder" id="tglorder" class="form-control" value="<?= set_value('tglorder') ?>" required>
    </div>

    <div class="form-group">
        <label for="product_id">Produk</label>
            <select name="product_id" id="product_id" class="form-control" required>
        <option value="">-- Pilih Produk --</option>
        <?php foreach ($produk_list as $produk): ?>
            <option 
                value="<?= $produk->id ?>" 
                data-harga="<?= $produk->harga ?>" 
                data-stok="<?= $produk->stok ?>">
                <?= $produk->kode_produk ?> - <?= $produk->nama_produk ?>
            </option>
        <?php endforeach; ?>
    </select>
    </div>

    <div class="form-group">
        <label for="nama_pelanggan">Nama Pelanggan</label>
        <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" value="<?= set_value('nama_pelanggan') ?>" required>
    </div>

    <div class="form-group">
        <label for="jumlah">Jumlah</label>
        <input type="number" name="jumlah" id="jumlah" class="form-control" value="<?= set_value('jumlah') ?>" min="1" required>
    </div>

    <div class="form-group">
        <label for="harga_satuan">Harga Satuan</label>
        <input type="number" name="harga_satuan" id="harga_satuan" class="form-control" readonly>
    </div>

    <div class="form-group">
        <label for="subtotal">Subtotal</label>
        <input type="number" name="subtotal" id="subtotal" class="form-control" readonly>
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control" required>
            <option value="">-- Pilih Status --</option>
            <option value="draft" <?= set_select('status', 'draft') ?>>Draft</option>
            <option value="dikirim" <?= set_select('status', 'dikirim') ?>>Dikirim</option>
            <option value="selesai" <?= set_select('status', 'selesai') ?>>Selesai</option>
            <option value="dibatalkan" <?= set_select('status', 'dibatalkan') ?>>Dibatalkan</option>
        </select>
    </div>

    <div class="form-group">
                    <label for="nama">Nama sales</label>
                    <select class="form-control" name="nama" id="nama"required>
                      <option value="">--Pilih sales--</option> 
                    <?php if(!empty($sales)):?>
                    <?php foreach ($sales as $pl): ?>
                    <option value="<?= $pl->nama;?>"><?= $pl->nama;?></option>
                  <?php endforeach;?>
                <?php endif; ?>
                </select>
                </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= site_url('sales_order') ?>" class="btn btn-secondary">Kembali</a>

    <?= form_close(); ?>
</div>

<script>
    const productSelect = document.getElementById('product_id');
    const hargaField = document.getElementById('harga_satuan');
    const jumlahField = document.getElementById('jumlah');
    const subtotalField = document.getElementById('subtotal');

    // Set harga_satuan saat produk dipilih
    productSelect.addEventListener('change', function () {
        const selectedOption = this.options[this.selectedIndex];
        const harga = selectedOption.getAttribute('data-harga') || 0;
        hargaField.value = harga;
        hitungSubtotal();
    });

    // Hitung subtotal saat jumlah diubah
    jumlahField.addEventListener('input', hitungSubtotal);

    function hitungSubtotal() {
        const harga = parseFloat(hargaField.value) || 0;
        const jumlah = parseFloat(jumlahField.value) || 0;
        subtotalField.value = harga * jumlah;
    }
</script>


<?php $this->load->view('layouts/footer'); ?>
