<!doctype html>
<html>
<head>
   
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    <style>
        body{
            padding: 15px;
        }
    </style>
</head>
<body>
    <h2 style="margin-top:0px">Data Pesanan</h2>
    <table class="table">
       <tr><td>Tanggal Pesan</td><td><?php echo $tanggal_pesan; ?></td></tr>
       <tr><td>Tanggal Diambil</td><td><?php echo $tanggal_diambil; ?></td></tr>
       <tr><td>IdPelanggan</td><td><?php echo $idPelanggan; ?></td></tr>
       <tr><td>idAdmin</td><td><?php echo $idAdmin; ?></td></tr>
       <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
   </table>

    <h4 style="margin-top:0px">Detail Pesanan</h4>
   <table class="table">
       <tr>
           <th><B>Barang</th>
           <td><B>Keterangan</td>
           <td><B>Jumlah</td>
       </tr>
       <?php foreach ($detailpesanan as $d): ?>
           <tr>
               <td><?php echo $d->barang ?></td>
               <td><?php echo $d->keterangan ?></td>
               <td><?php echo $d->jumlah ?></td>
           </tr>
       <?php endforeach ?>
       <tr><td></td>
       <td><a href="<?php echo site_url('pemesan') ?>" class="btn btn-default">Cancel</a></td><td></td></tr>
   </table>

   <script type="text/javascript">
window.print();
   </script>
</body>
</html>