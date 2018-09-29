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
        <h2 style="margin-top:0px">Detailpindahstok Read</h2>
        <table class="table">
	    <tr><td>IdPindahStok</td><td><?php echo $idPindahStok; ?></td></tr>
	    <tr><td>IdDetailBarang</td><td><?php echo $idDetailBarang; ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('detailpindahstok') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>