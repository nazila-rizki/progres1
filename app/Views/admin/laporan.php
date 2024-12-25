<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Pasien</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<br>
<h2 style="text-align: center;">Laporan Data Pasien</h2>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Id Pasien</th>
            <th>Nama Pasien</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Keluhan</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($pasien as $p): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $p['id_pasien'] ?></td>
                <td><?= $p['nm_pasien'] ?></td>
                <td><?= $p['jenis_kelamin'] ?></td>
                <td><?= $p['tgl_lahir'] ?></td>
                <td><?= $p['alamat'] ?></td>
                <td><?= $p['keluhan'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div style="text-align: right; font-family: 'Georgia', serif; margin-top: 50px;">
    <p style="font-size: 18px; margin-bottom: 50px; color: #4b4b4b; letter-spacing: 1px;">
        <strong>Bekasi, 29-August-2022</strong>
    </p>
    <div style="margin-bottom: 100px; font-style: italic; font-size: 16px; color: #7a7a7a;">
        Hormat Kami,<br>
        <span style="font-size: 20px; font-weight: bold;">TTD</span>
    </div>
    <p style="font-size: 16px; font-weight: bold; margin-top: 0; border-top: 2px solid #000; width: 300px; text-align: center; margin-left: auto; padding-top: 10px;">
        Siti Fajar STr.Keb
    </p>
</div>





</body>

</html>