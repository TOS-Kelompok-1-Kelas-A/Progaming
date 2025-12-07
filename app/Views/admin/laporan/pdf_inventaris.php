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

<h3>Laporan Inventaris</h3>
<p>Periode: <?= $start ?> s/d <?= $end ?></p>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Tanggal</th>
            <th>Jenis</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
        </tr>
    </thead>

    <tbody>
        <?php $no = 1; foreach ($laporan as $row): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['jenis'] == 'masuk' ? 'Barang Masuk' : 'Barang Keluar' ?></td>
                <td><?= $row['nama_barang'] ?></td>
                <td><?= $row['jumlah'] ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

</body>
</html>
