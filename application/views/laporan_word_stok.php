<!doctype html>
<html>
    <head>
        <title>Laporan Penjualan</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
    

<h1>Laporan Stok Barang</h1>
<h1>Cabang 1</h1>
<h2>Stok Barang Terbanyak</h2>
 <table class="word-table" style="margin-bottom: 10px">

    <tr>
      <th>No</th>
      <th>Nama Barang</th>
      <th>Merek</th>
      <th>Jumlah Stok</th>
  </tr>

<?php $no=1; foreach ($stok_barang_1 as $s): ?>
    <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $s->barang ?></td>
        <td><?php echo $s->merek ?></td>
        <td><?php echo $s->stokAwal ?></td>
    </tr>
<?php endforeach ?>
</table>

<h2>Stok Barang Tersedikit</h2>

<table class="word-table" style="margin-bottom: 10px">

    <tr>
      <th>No</th>
      <th>Nama Barang</th>
      <th>Merek</th>
      <th>Jumlah Stok</th>
  </tr>

<?php $no=1; foreach ($stok_barang_1_sedikit as $s): ?>
    <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $s->barang ?></td>
        <td><?php echo $s->merek ?></td>
        <td><?php echo $s->stokAwal ?></td>
    </tr>
<?php endforeach ?>
</table>

<h1>Cabang 2</h1>
<h2>Stok Barang Terbanyak</h2>
 <table class="word-table" style="margin-bottom: 10px">

    <tr>
      <th>No</th>
      <th>Nama Barang</th>
      <th>Merek</th>
      <th>Jumlah Stok</th>
  </tr>

<?php $no=1; foreach ($stok_barang_2 as $s): ?>
    <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $s->barang ?></td>
        <td><?php echo $s->merek ?></td>
        <td><?php echo $s->stokAwal ?></td>
    </tr>
<?php endforeach ?>
</table>

<h2>Stok Barang Tersedikit</h2>

<table class="word-table" style="margin-bottom: 10px">

    <tr>
      <th>No</th>
      <th>Nama Barang</th>
      <th>Merek</th>
      <th>Jumlah Stok</th>
  </tr>

<?php $no=1; foreach ($stok_barang_2_sedikit as $s): ?>
    <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $s->barang ?></td>
        <td><?php echo $s->merek ?></td>
        <td><?php echo $s->stokAwal ?></td>
    </tr>
<?php endforeach ?>
</table>



<br><br><br><br><br><br>
<?php echo date('d-m-Y') ?>
<br>
<br>
<br>
<br>
<br>
<?php echo $this->session->userdata('username') ?>

    </body>
</html>