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
        <h2 style="margin-top:0px">Hutang Read</h2>
        <table class="table">
	    <tr><td>IdPembelian</td><td><?php echo $idPembelian; ?></td></tr>
	    <tr><td>TanggalWajibBayar</td><td><?php echo $tanggalWajibBayar; ?></td></tr>
	    <tr><td>KekuranganPembayaran</td><td><?php echo $kekuranganPembayaran; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('hutang') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>