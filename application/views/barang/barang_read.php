<!doctype html>
<html>
    <head>
        <title>Barang READ </title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Barang Read</h2>
        <table class="table">
	    <tr><td>Barang</td><td><?php echo $barang; ?></td></tr>

	    <tr><td>IdMerek</td><td><?php echo $idMerek; ?></td></tr>
        <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $Keterangan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('barang') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
    
<table class="table"> 
    <tr>    
        <th>No</th>
        <th>Warna</th>
        <th>Size</th>
        <th>Harga Jual</th>
        <th>Stok</th>
        <th>Kode barang</th>
        <th>Cabang</th>
        </tr>
    
<?php $no=1; foreach ($db as $d): ?>
    <tr>    
            <td><?php echo $no++ ?></td>
            <td><?php echo $d->warna ?></td>
            <td><?php echo $d->size ?></td>
            <td><?php echo $d->hargaEcer ?></td>
            <td><?php echo $d->stokAwal ?></td>
            <td><?php echo $d->kodeBarang ?></td>
            <td><?php echo $d->idCabang ?></td>
    </tr>
<?php endforeach ?>



    </table>
        </body>
</html>