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
        <h2 style="margin-top:0px">Isisms Read</h2>
        <table class="table">
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Tentang</td><td><?php echo $tentang; ?></td></tr>
	    <tr><td>Isi</td><td><?php echo $isi; ?></td></tr>
	    <tr><td>IdAdmin</td><td><?php echo $idAdmin; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('isisms') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>