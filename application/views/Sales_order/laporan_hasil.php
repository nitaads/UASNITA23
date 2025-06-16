<div class = "content-wrapper">
    <!-- Content Header (Page header) -->
     <section class = "content-header">
        <div class = "container-fluid">
        <div class = "row mb-2">
            <div class = "col-sm-6">
            <h1> Laporan </h1>
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
     <div class = "content">

        <!-- Default box -->
         <div class = "card">
            <div class = "card-header">
                <h3 class = "card-title"> Sales Order Report </h3>

                <div class = "card-tools">
                    <button type = "button" class = "btn btn-tool" data-card-widget = "collapse" data-toggle = "tooltip" title = "Collapse">
                        <i class = "fas fa-minus"></i></button>
                    <button type = "button" class = "btn btn-tool" data-card-widget = "remove" data-toggle = "tooltip" title = "Remove">
                        <i class = "fas fa-minus"></i></button>
                </div>
            </div>
        <h3> Laporan Pesanan dari <?= $tanggal_dari ?> sampai <?= $tanggal_sampai ?> </h3>
        <table id = "datatable" border = "1" cellpadding = "5" cellspacing = "0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Produk </th> 
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($sales_order as $so): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $so->nama_pelanggan ?></td>
                        <td><?= $so->product_id ?></td>
                        <td><?= $so->jumlah ?></td>
                        <td>Rp <?= number_format($so->subtotal, 0, ',', '.') ?></td>

                    </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
        </div>
                <!-- /.card-body -->
                 <div class = "card-footer">
                    Footer
                 </div>
                <!-- /.card-footer-->
                </div>
                <!-- /.card -->

                 </section>
                 <!-- /.content -->
</div>