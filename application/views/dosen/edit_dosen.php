<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Institute Teknologi dan Bisnis Bina Sarana Global</h1>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Form dosen</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="box-body">
          <form action="<?php echo base_url('dosen/update/'. $dosen['nidn']);?>" method="POST">
          <div class="box-body">
            <div class="form-group">
              <label for="nidn">Nidn</label>
              <input type="text" class="form-control" name="nidn" value="<?= $dosen['nidn']; ?>" id="nidn" placeholder="Nidn" required>
</div>
<div class="form-group">
              <label for="nama">Nama dosen</label>
              <input type="text" class="form-control" name="nama" value= "<?= $dosen['nama']; ?>" id="Nama dosen" placeholder="Nama_dosen" required>
</div>
<div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" name="alamat" value= "<?= $dosen['alamat']; ?>" id="Alamat" placeholder="Alamat" required>
</div>
<div class="form-group">
    <label for="jk">Jenis Kelamin</label>
    <select class="form-control" name="jk" id="Jenis_kelamin" required>
        <option value="">-- Pilih Jenis Kelamin --</option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>
</div>
<div class="form-group">
              <label for="email">email</label>
              <input type="text" class="form-control" name="email" value= "<?= $dosen['email']; ?>" id="email" placeholder="Email" required>
</div>
<div class="form-group">
              <label for="tlpn">tlpn</label>
              <input type="text" class="form-control" name="tlpn" value= "<?= $dosen['tlpn']; ?>" id="tlpn" placeholder="tlpn" required>
</div>
</div>
<div class ="box-footer">
    <button type ="submit" class = "btn btn-primary">Update</button>
    <a href="<?= base_url('dosen'); ?>" class="btn btn_secondary">Batal</a>
</div>
</form>
</div>
<div class="card-footer">
</div>
</div>
</section>
</div>