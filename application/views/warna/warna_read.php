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
        <h2 style="margin-top:0px">Warna Read</h2>
        <table class="table">
	    <tr><td>Warna</td><td><?php echo $warna; ?></td></tr>
	    <tr><td>Kode</td><td><?php echo $kode; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('warna') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>