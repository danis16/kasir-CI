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
        <h2 style="margin-top:0px">Piutang Read</h2>
        <table class="table">
	    <tr><td>IdPenjualan</td><td><?php echo $idPenjualan; ?></td></tr>
	    <tr><td>TanggalWajibBayar</td><td><?php echo $tanggalWajibBayar; ?></td></tr>
	    <tr><td>KekuraganPembayaran</td><td><?php echo $kekuraganPembayaran; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('piutang') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>