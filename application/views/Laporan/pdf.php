<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Berita</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Berita</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Filter Laporan</h3>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('berita/cetak_laporan') ?>" target="_blank">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="tanggal_dari">Dari Tanggal</label>
                            <input type="date" class="form-control" name="tanggal_dari" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tanggal_sampai">Sampai Tanggal</label>
                            <input type="date" class="form-control" name="tanggal_sampai" required>
                        </div>
                        <div class="form-group col-md-4 align-self-end">
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-print"></i> Tampilkan / Cetak
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
</div>
