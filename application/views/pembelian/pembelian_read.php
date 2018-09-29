<!doctype html>
<html>
    <head>
        <title>Pembelian Read</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Pembelian Read</h2>
        <table class="table">
        <tr><td>NoNota</td><td><?php echo $noNota; ?></td></tr>
        <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
        <tr><td>Idsupplier</td><td><?php echo $idsupplier; ?></td></tr>
        <tr><td>WajibMembayar</td><td><?php echo $WajibMembayar; ?></td></tr>
        <tr><td>Status</td><td><?php echo $status; ?></td></tr>
    </table>

        <h2 style="margin-top:0px">Detail Pembelian</h2>
    <table class="table">
        <tr>
            <td>Id</td>
            <td>Kode Barang</td>
            <td>No Nota</td>
            <td>Harga Beli</td>
            <td>Jumlah Beli</td>
            <td>Potongan</td>
            <td>Admin</td>
        </tr>

        <?php 
        $no=1;
        foreach ($detailpembelian as $p): ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $p->kodeBarang ?></td>
                <td><?php echo $p->noNota ?></td>
                <td><?php echo $p->hargaBeliSatuan ?></td>
                <td><?php echo $p->jumlahBeli ?></td>
                <td><?php echo $p->potongan ?></td>
                <td><?php echo $p->username ?></td>
            </tr>
        <?php endforeach ?>

        <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

        <td><a href="<?php echo site_url('pembelian') ?>" class="btn btn-default">Cancel</a></td></tr>
    </table>
        </body>
</html>