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
  <h1>Laporan Bulan <?php echo $tampil_bulan['bulan'] ?></h1>
  <h2>Laporan Penjualan </h2>
  <table class="word-table" style="margin-bottom: 10px" text-align="right">
    <tr>
      <th>Keterangan</th>
      <th>Debit</th>
      <th>Kredit</th>
    </tr>
    <tr>
      <td>Penjualan</td>
      <td>Rp <?php echo number_format($total_penjualan['total_penjualan'],2,",",".")?></td>
      <td></td>
    </tr>
    <tr>
      <td>Retur Penjualan</td>
      <td></td>
      <td>Rp <?php echo number_format($total_retur_penjualan['total_retur_penjualan'],2,",",".")?> </td>
    </tr>
    <tr>
      <td>Pembelian</td>
      <td></td>
      <td>Rp <?php echo number_format($pembelian['pembelian'],2,",",".")?></td>
    </tr>
    <tr>
      <td>Potongan Pembelian</td>
      <td>Rp <?php echo number_format($potongan['potongan'],2,",",".")?></td>
      <td></td>
    </tr>
    <tr>
      <td>Retur Pembelian</td>
      <td>Rp <?php echo number_format($retur_pembelian['retur_pembelian'],2,",",".") ?></td>
      <td></td>
    </tr>
    <tr>
      <td>Barang Rusak</td>
      <td></td>
      <td>Rp <?php echo number_format($barang_rusak['barang_rusak'],2,",",".") ?></td>
    </tr>
    <tr>
      <td>Stok Masuk</td>
      <td>Rp <?php echo number_format($stok_masuk['stok_masuk'],2,",",".") ?></td>
      <td></td>
    </tr>
    <tr>
      <td>Stok Keluar</td>
      <td></td>
      <td>Rp <?php echo number_format($stok_keluar['stok_keluar'],2,",",".") ?></td>
    </tr>

    <tr>
      <td>Beban</td>
      <td></td>
      <td> Rp <?php echo number_format($beban['jumlah'],2,",",".") ?></td>
    </tr>
    <tr><?php 
      $kredit = $total_retur_penjualan['total_retur_penjualan']+$pembelian['pembelian']+$barang_rusak['barang_rusak']+$beban['jumlah']+$stok_keluar['stok_keluar'];
      $debit=$total_penjualan['total_penjualan']+$retur_pembelian['retur_pembelian']+$stok_masuk['stok_masuk']+$potongan['potongan']; ?>
      <th>Jumlah</th>
      <th>Rp <?php echo number_format($debit,2,",",".")?> 
      </th>
      <th>Rp <?php echo number_format($kredit,2,",",".") ?> 

      </th>
    </tr>
    <tr>

      <th>
        <?php  
        $hasil=$debit-$kredit;

        if ($hasil>=0) {
          $data="LABA";
        }
        else {
          $data="RUGI";
        } 
        ?>
        <?php echo $data ?></th>
        <td colspan="2" align="center"> <b> Rp <?php echo number_format($hasil,2,',','.') ?></b></td>

      </tr>

    </table>




    <h2>Laporan Hutang</h2>


    <table class="word-table" style="margin-bottom: 10px">


      <tr>
        <th>Nama</th>
        <th>Jumlah hutang</th>
        <th>Yang sudah dibayar</th>
        <th>Kekurangan pembayaran</th>
        <th>Tanggal wajib membayar</th>
      </tr>
      <?php  
      foreach ($hutang as $h): 
        ?>
      <tr>
        <td><?php echo $h->nama ?></td>
        <td><?php echo number_format($h->hutang,0,',','.') ?></td>
        <td><?php echo number_format($h->yangsudahdibayar,0,',','.') ?></td>
        <td><?php echo number_format($h->kekuranganpembayaran,0,',','.') ?></td>
        <td><?php echo date('j F Y', strtotime($h->tanggalWajibBayar))  ?></td>
      </tr>
      <?php  
      endforeach;
      ?>


    </table>



    <h2> Laporan Piutang </h2>


    <table class="word-table" style="margin-bottom: 10px">


      <tr>
        <th>Nama</th>
        <th>Jumlah Piutang</th>
        <th>Yang sudah dibayar</th>
        <th>Kekurangan pembayaran</th>
        <th>Tanggal wajib membayar</th>
      </tr>';
      <?php  foreach ($piutang as $h):
      ?>

      <tr>
        <td><?php echo $h->nama ?></td>
        <td><?php echo $h->piutang ?></td>
        <td><?php echo $h->yangsudahdibayar ?></td>
        <td><?php echo $h->kurang ?></td>
        <td><?php echo$h->tanggalWajibBayar ?></td>
      </tr>
      <?php  
      endforeach ;

      ?>
    </table>





  <h2> Laporan Beban Pengeluaran </h2>

  <table class="word-table" style="margin-bottom: 10px">

    <tr>
      <th>No</th>
      <th>Nama Beban</th>
      <th>Tanggal</th>
      <th>Jumlah</th>
      <th>Nota</th>
      <th>Admin</th>
    </tr>
    <?php  
    $no=1;
    foreach ($bebanpengeluaran as $h): 
      ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $h->beban ?></td>
      <td><?php echo $h->tanggal ?></td>
      <td><?php echo $h->jumlah ?></td>
      <td><?php echo $h->noNota ?> </td>
      <td><?php echo $h->username ?></td>
    </tr>
    <?php  
    endforeach; 
    ?>
  </table>





  <h2> Laporan Barang Paling Banyak Terjual </h2>

  <table class="word-table" style="margin-bottom: 10px">

    <tr>
      <th>No</th>
      <th>Nama Barang</th>
      <th>Warna</th>
      <th>Ukuran</th>
      <th>Jumlah Jual</th>
      <th>Stok</th>
      <th>Cabang</th>
    </tr>
    <?php  
    $no=1;
    foreach ($barang as $b) {


      ?>

      
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $b->barang ?></td>
        <td><?php echo $b->warna ?></td>
        <td><?php echo $b->size ?></td>
        <td><?php echo $b->jumlahJual ?></td>
        <td><?php echo $b->stokAwal ?></td>
        <td>Cabang <?php echo $b->idCabang ?></td>
      </tr>

      <?php  }

      ?>


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