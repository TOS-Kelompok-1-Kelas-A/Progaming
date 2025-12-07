<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background: #eee; }
        h3 { text-align: center; margin: 0; }
    </style>
</head>
<body>

<h3>Laporan Inventory</h3>
<p>Dicetak: <?= date('d-m-Y') ?></p>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Satuan</th>
        </tr>
    </thead>

    <tbody>
        <?php $no = 1; foreach ($barang as $b): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $b['kode_barang'] ?></td>
                <td><?= $b['nama_barang'] ?></td>
                <td><?= $b['stok'] ?></td>
                <td><?= $b['satuan'] ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

</body>
</html>
