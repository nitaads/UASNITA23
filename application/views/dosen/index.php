<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Institut Teknologi Bina Sarana Global</h1>
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
          <h3 class="card-title">Dosen</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <a href="<?=base_url('dosen/tambah');?>" class="btn btn-primary mb-3">Tambah Dosen</a>
          <?php if (!empty($dosen)):?>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nidn</th>
                  <th>Nama Dosen</th>
                  <th>jenis Kelamin</th>
                  <th>Email</th>
                  <th>Telp</th>
                  <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            <?php foreach ($dosen as $d): ?>
              <tr>
                    <td><?= $d['nidn'];?></td>
                    <td><?= $d['nama'];?></td>
                    <td><?= $d['jk'];?></td>
                    <td><?= $d['email'];?></td>
                    <td><?= $d['tlpn'];?></td>
                    <td>
                      <a href="<?=base_url('dosen/edit/'. $d['nidn']); ?>" class="btn btn-sm btn-info">Edit</a>
                      <a href="<?=base_url('dosen/hapus/'. $d['nidn']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin Hapus?')">Hapus</a>

						</td>
						</tr>
						<?php endforeach; ?>
						</tbody>
						</table>
						<?php else: ?>
							<p> Tidak ada dosen yang tersedia</p>
							<?php endif; ?>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
</div>
