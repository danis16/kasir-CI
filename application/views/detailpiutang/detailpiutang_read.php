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
        <h2 style="margin-top:0px">Detailpiutang Read</h2>
        <table class="table">
	    <tr><td>IdPiutang</td><td><?php echo $idPiutang; ?></td></tr>
	    <tr><td>IdAdmin</td><td><?php echo $idAdmin; ?></td></tr>
	    <tr><td>Date</td><td><?php echo $date; ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('detailpiutang') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>