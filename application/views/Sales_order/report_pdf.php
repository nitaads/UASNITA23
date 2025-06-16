<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <style>
        body { font-family: Arial; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: center; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2><?= $title ?></h2>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $o): ?>
                <tr>
                    <td><?= $o['order_id'] ?></td>
                    <td><?= $o['nama_produk'] ?></td>
                    <td><?= $o['jumlah'] ?></td>
                    <td><?= number_format($o['harga_satuan'], 2) ?></td>
                    <td><?= number_format($o['subtotal'], 2) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
