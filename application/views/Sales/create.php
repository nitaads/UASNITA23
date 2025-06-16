<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1>Tambah Sales</h1>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Form Tambah Sales</h3>
        </div>
        <form action="<?= site_url('sales/store') ?>" method="post">
          <div class="card-body">
            <div class="form-group">
  <label for="idsales">ID Sales</label>
  <input type="text" name="idsales" class="form-control" id="idsales" placeholder="Contoh: SLS-0001" value="<?= set_value('idsales') ?>" required>
</div>
            <div class="form-group">
              <label for="nama">Nama Sales</label>
              <input type="text" name="nama" class="form-control" id="nama" required>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
            <a href="<?= site_url('sales') ?>" class="btn btn-secondary">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
