<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Produk</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url('produk') ?>">Produk</a></li>
            <li class="breadcrumb-item active">Edit Produk</li>
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
          <h3 class="card-title">Form Edit Produk</h3>
        </div>

        <!-- form start -->
        <form action="<?= site_url('products/update/' . $product->id) ?>" method="post">
          <div class="card-body">
            <div class="form-group">
              <label for="kode_produk">Kode Produk</label>
              <input 
                type="text" 
                name="kode_produk" 
                class="form-control" 
                id="kode_produk" 
                required
                value="<?= set_value('kode_produk', $product->kode_produk) ?>"
              >
            </div>

            <div class="form-group">
              <label for="nama_produk">Nama Produk</label>
              <input 
                type="text" 
                name="nama_produk" 
                class="form-control" 
                id="nama_produk" 
                required
                value="<?= set_value('nama_produk', $product->nama_produk) ?>"
              >
            </div>

            <div class="form-group">
              <label for="harga">Harga</label>
              <input 
                type="number" 
                name="harga" 
                class="form-control" 
                id="harga" 
                required
                step="0.01"
                value="<?= set_value('harga', $product->harga) ?>"
              >
            </div>

            <div class="form-group">
              <label for="stok">Stok</label>
              <input 
                type="number" 
                name="stok" 
                class="form-control" 
                id="stok" 
                required
                value="<?= set_value('stok', $product->stok) ?>"
              >
            </div>
          </div>

          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?= site_url('produk') ?>" class="btn btn-secondary">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
