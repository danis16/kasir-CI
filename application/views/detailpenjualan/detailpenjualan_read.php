<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Detailpenjualan Read</h2>
        <table class="table">
	    <tr><td>IdPenjualan</td><td><?php echo $idPenjualan; ?></td></tr>
	    <tr><td>IdBarang</td><td><?php echo $idBarang; ?></td></tr>
	    <tr><td>JumlahJual</td><td><?php echo $jumlahJual; ?></td></tr>
	    <tr><td>Potongan</td><td><?php echo $potongan; ?></td></tr>
	    <tr><td>IdAdmin</td><td><?php echo $idAdmin; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('detailpenjualan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>