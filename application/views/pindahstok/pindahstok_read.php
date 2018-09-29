<?php
$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->SetTitle('Pindah Stok');
            $pdf->SetHeaderMargin(30);
            $pdf->SetTopMargin(20);
            $pdf->setFooterMargin(20);
            $pdf->SetAutoPageBreak(true);
            $pdf->SetAuthor('Author');
            $pdf->SetDisplayMode('real', 'default');
            $pdf->AddPage();
            $i=0;
            $html='<TABLE cellpadding="5" >
<tr>
    <td></td>
    <td></td>
</tr>

<tr>
    <td>Kepada Cabang</td>
    <td>: Cabang '.$atas['idCabang'].'</td>
    <td></td>
</tr>
<tr>
    <td>Yang Menerima</td>
    <td>: '.$atas['YangMenerima'].'</td>
    <td></td>
</tr>
<tr>
    <td>Keterangan</td>
    <td>: '.$atas['keterangan'].'</td>
    <td> </td>
</tr>
<tr>
    <td></td>
    <td></td>
</tr>


</TABLE>


<table border="1" cellpadding="3">
    <tr>
        <td>nomor</td>
        <td>barang</td>
        <td>size</td>
        <td>warna</td>
        <td>jumlah</td>
        <td>kode</td>
    
</tr>';

foreach ($bawah as $row) 
                {
                    $i++;
                    $html.='<tr bgcolor="#ffffff">
                            <td align="center">'.$i.'</td>
                            <td>'.$row->barang.'</td>
                            <td>'.$row->size.'</td>
                            <td>'.$row->warna.'</td>
                            <td>'.$row->jumlah.'</td>
                            <td>'.$row->kodeBarang.'</td>
                        </tr>';

                }
            $html.='</table>
<br><br><br><br><br><br>Kebumen,  ';

        $html.=date('d M Y');

        $html.='<br><br><br><br>';
        $html.=$this->session->userdata('username');

            
            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->Output('pindah_stok.pdf', 'I');
?>
?>

