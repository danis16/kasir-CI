<!doctype html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Daftar Harga</h2>
        <table class="table">
        <tr>
            <th>No</th>
            <th>barang</th>
            <th>size</th>
            <th>warna</th>
            <th>hargaEcer</th>
            <th>stokAwal</th>
            <th>idCabang</th>
            <th>kodeBarang</th>
        </tr>
          
            <?php $no=1; foreach ($detailbarang as $d): ?>
        <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $d->barang ?></td>
                <td><?php echo $d->size ?></td>
                <td><?php echo $d->warna ?></td>
                <td><?php echo $d->hargaEcer ?></td>
                <td><?php echo $d->stokAwal ?></td>
                <td><?php echo $d->idCabang ?></td>
                <td><?php echo $d->kodeBarang ?></td>
        </tr>
            <?php endforeach ?>
	
    </table>

    <script type="text/javascript">
    window.print();
    </script>
        </body>
</html>