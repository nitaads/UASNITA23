<div class = "content-wrapper">
    <!-- Content Header (Page header) -->
     <section class = "content-header">
        <div class = "container-fluid">
        <div class = "row mb-2">
            <div class = "col-sm-6">
            <h1> Daftar Pesanan </h1>
        </div> 
            <div class = "col-sm-6">
                <ol class = "breadcrumb float-sm-right">
                    <li class = "breadcrumb-item"><a href="#">Home</a></li>
                    <li class = "breadcrumb-item active"> Blank Page </li>
                </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
     </section>
     <section class = "content">
        <!-- Default box -->
         <div class = "card">
            <div class = "card-header">
                <h3 class = "card-title"> List Produk </h3>

                <div class = "card-tools">
                    <button type = "button" class = "btn btn-tool" data-card-widget = "collapse" data-toggle = "tooltip" title = "Collapse">
                        <i class = "fas fa-minus"></i></button>
                    <button type = "button" class = "btn btn-tool" data-card-widget = "remove" data-toggle = "tooltip" title = "Remove">
                        <i class = "fas fa-minus"></i></button>
                </div>
            </div>
         <div class = "box-body">
    <h3> Laporan Produk </h3>
    <form method = "post" action = "<?= base_url ('Products/cetak_laporan') ?>">
        <div class = "box-body">
           <div class ="form-group">
            <label for="nama_product">Pilih Produk:</label>
            <select name="products" required>
                <option value="">-- Pilih Produk --</option>
                <?php foreach($products as $p): ?>
                    <option value="<?= $p->id ?>"><?= $p->nama_produk ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class= "box-footer">
            <button type="submit" class ="btn btn-primary">Tampilkan Laporan </button>
        </div>
</form>
</div>

</div>
        <!-- / .card-body -->
         <div class = "card-footer">
            Footer
         </div>
        <!-- / .card -->
        </div>
         </section>
         <!-- /.content -->
</div>