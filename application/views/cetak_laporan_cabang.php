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
<h1> Laporan Cabang '.$this->session->userdata('idCabang').' </h1>
<h2> Generate by '.$this->session->userdata('username').' <h2>
<h3> '.date('d-m-Y').' <h3>

<table border="1" cellpadding="5px" align="right">
<tr>
<th>Keterangan</th>
<th>Jumlah</th>
</tr>
<tr>
<td>Penjualan</td>
<td>Rp '.number_format($penjualan['penjualan'],2,",",".").'</td>
</tr>

<tr>
<td>Retur Penjualan</td>
<td> - Rp '.number_format($retur_penjualan['retur_penjualan'],2,",",".").'</td>
</tr>
<tr>
<td>Pembayaran Hutang</td>
<td>Rp '.number_format($hutang['BAYAR'],2,",",".").'</td>
</tr>
<tr>
<td>Total</td>';
$total=$hutang['BAYAR']+$penjualan['penjualan']-$retur_penjualan['retur_penjualan'];
$html.='
<td>'.number_format($total,2,",",".").'</td>
</tr>

</table>


';



$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('laporan_harian.pdf', 'I');
 ?>