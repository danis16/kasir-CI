<!doctype html>
<html>
<head>
    <title>Retur Penjualan</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    <style>
        body{
            padding: 15px;
        }
    </style>
</head>
<body>
    <h2 style="margin-top:0px">Returpenjualan </h2>
    <table class="table">
       <tr><td>IdPenjualan</td><td><?php echo $idPenjualan; ?></td></tr>
       <tr><td>Tangal</td><td><?php echo $tangal; ?></td></tr>
       <tr><td>IdAdmin</td><td><?php echo $idAdmin; ?></td></tr>
   </table>

    <h2 style="margin-top:0px">Detail Returpenjualan </h2>
   <table class="table">
    <tr>
        <td>Kode Barang</td>
        <td>Nama Barang</td>
        <td>Jumlah</td>
        <td>Kondisi</td>
        <td>Alasan</td>
    </tr>
<?php foreach ($detail as $k): ?>
    <tr>
        <td><?php echo $k->kodeBarang ?></td>
        <td><?php echo $k->barang ?></td>
        <td><?php echo $k->jumlah ?></td>
        <td><?php echo $k->kondisi ?></td>
        <td><?php echo $k->alasan ?></td>
    </tr>

<?php endforeach ?>

       <tr><td></td><td></td><td></td><td></td><td><a href="<?php echo site_url('returpenjualan') ?>" class="btn btn-default">Cancel</a></td></tr>
   </table>
</body>
</html>