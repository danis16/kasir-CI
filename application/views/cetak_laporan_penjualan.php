<?php
$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('Laporan Penjualan');
$pdf->SetHeaderMargin(30);
$pdf->SetTopMargin(20);
$pdf->setFooterMargin(20);
$pdf->SetAutoPageBreak(true);
$pdf->SetAuthor('Author');
$pdf->SetDisplayMode('real', 'default');
$pdf->AddPage();
$i=0;
$html='

<h1> Tabel Laporan Penjualan </h1>'
;


$html.=' <br>
<table border="1" cellpadding="5px" >

    <tr>
      <th>Keterangan</th>
      <th>Debit</th>
      <th>Kredit</th>
  </tr>
  <tr>
      <td>Penjualan</td>
      <td>'.$total_penjualan['total_penjualan'].'</td>
      <td></td>
  </tr>
  <tr>
      <td>Retur Penjualan</td>
      <td></td>
      <td>'.$total_retur_penjualan['total_retur_penjualan'].'</td>
  </tr>
  <tr>
      <td>Pembelian</td>
      <td></td>
      <td>'.$pembelian['pembelian'].'</td>
  </tr>
  <tr>
      <td>Potongan Pembelian</td>
      <td>'.$potongan['potongan'].'</td>
      <td></td>
  </tr>
  <tr>
      <td>Retur Pembelian</td>
      <td>'.$retur_pembelian['retur_pembelian'].'</td>
      <td></td>
  </tr>
  <tr>
      <td>Barang Rusak</td>
      <td></td>
      <td>'.$barang_rusak['barang_rusak'].'</td>
  </tr>
  <tr>
      <td>Stok Masuk</td>
      <td>'.$stok_masuk['stok_masuk'].'</td>
      <td></td>
  </tr>
  <tr>
      <td>Stok Keluar</td>
      <td></td>
      <td>'.$stok_keluar['stok_keluar'].'</td>
  </tr>

  <tr>
      <td>Beban</td>
      <td></td>
      <td>'.$beban['jumlah'].'</td>
  </tr>
  <tr>
      <th>Jumlah</th>
      <th>'.$debit=$total_penjualan['total_penjualan']+$retur_pembelian['retur_pembelian']+$stok_masuk['stok_masuk']+$potongan['potongan'].' 
      </th>
      <th>'.$kredit = $total_retur_penjualan['total_retur_penjualan']+$pembelian['pembelian']+$barang_rusak['barang_rusak']+$beban['jumlah']+$stok_keluar['stok_keluar'].'  

      </th>
  </tr>
  <tr>

      <th>';

        $hasil=$debit-$kredit;

        if ($hasil>=0) {
          $data="LABA";
      }
      else {
          $data="RUGI";
      } 

      $html.='  '.$data.'</th>
      <td colspan="2" align="center"> <b> '.$hasil.'</b></td>

  </tr>

</table>';


$html.='
<h1> Laporan Hutang </h1>
<table border="1" cellpadding="5px">

  <tr>
    <th>Nama</th>
    <th>Jumlah hutang</th>
    <th>Yang sudah dibayar</th>
    <th>Kekurangan pembayaran</th>
    <th>Tanggal wajib membayar</th>
</tr>';
foreach ($hutang as $h): 

    $html.='<tr>
<td>'.$h->nama.'</td>
<td>'.$h->hutang.'</td>
<td>'.$h->yangsudahdibayar.'</td>
<td>'.$h->kekuranganpembayaran.'</td>
<td>'.$h->tanggalWajibBayar.'</td>
</tr>';
endforeach;

$html.='

</table>

';


$html.='
<h1> Laporan Piutang </h1>
<table border="1" cellpadding="5px">

  <tr>
    <th>Nama</th>
    <th>Jumlah Piutang</th>
    <th>Yang sudah dibayar</th>
    <th>Kekurangan pembayaran</th>
    <th>Tanggal wajib membayar</th>
</tr>';

foreach ($piutang as $h):
    $html.='
<tr>
  <td>'.$h->nama.'</td>
  <td>'.$h->piutang.'</td>
  <td>'.$h->yangsudahdibayar.'</td>
  <td>'.$h->kurang.'</td>
  <td>'.$h->tanggalWajibBayar.'</td>
</tr>';
endforeach ;

$html.='     </table>
';


$html.='
<h1> Laporan Beban Pengeluaran </h1>

<table border="1" cellpadding="5px">

  <tr>
    <th>No</th>
    <th>Nama Beban</th>
    <th>Tanggal</th>
    <th>Nota</th>
    <th>Admin</th>
</tr>';

$no=1;
foreach ($bebanpengeluaran as $h): 
  $html.='
<tr>
    <td>'.$no++.'</td>
    <td>'.$h->beban.'</td>
    <td>'.$h->tanggal.'</td>
    <td>'.$h->noNota.' </td>
    <td>'.$h->username.'</td>
</tr>';
endforeach; 
$html.='
</table>

';



$html.=' <br><br><br><br><br><br>
<h1> Laporan Barang Paling Banyak Terjual </h1>

<table border="1" cellpadding="5px" >

    <tr>
      <th>No</th>
      <th>Nama Barang</th>
      <th>Warna</th>
      <th>Ukuran</th>
      <th>Jumlah Jual</th>
      <th>Stok</th>
      <th>Cabang</th>
  </tr>';

  $no=1;
  foreach ($barang as $b) {


      $html.='
      <tr>
        <td>'.$no++.'</td>
        <td>'.$b->barang.'</td>
        <td>'.$b->warna.'</td>
        <td>'.$b->size.'</td>
        <td>'.$b->jumlahJual.'</td>
        <td>'.$b->stokAwal.'</td>
        <td>Cabang '.$b->idCabang.'</td>
    </tr>';

}

;$html.='

</table>

<br><br><br><br><br><br>
'.date('d-m-Y').'
<br>
<br>
<br>
<br>
<br>
'.$this->session->userdata('username').'
';


$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('laporan_harian.pdf', 'I');
?>
?>

