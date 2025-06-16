<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1>Edit Sales</h1>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title">Form Edit Sales</h3>
        </div>
        <form action="<?= site_url('sales/update/' . $sales['id']) ?>" method="post">
          <div class="card-body">
            <div class="form-group">
              <div class="form-group">
              <label for="idsales">ID Sales</label>
             <input type="text" name="idsales" class="form-control" id="idsales" value="<?= htmlspecialchars($sales['idsales']) ?>" required>
          </div>
          </div>
            <div class="form-group">
              <label for="nama">Nama Sales</label>
              <input type="text" name="nama" class="form-control" id="nama" value="<?= htmlspecialchars($sales['nama']) ?>" required>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Update</button>
            <a href="<?= site_url('sales') ?>" class="btn btn-secondary">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
