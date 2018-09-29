<!DOCTYPE html>
<html>
<head>
    <title></title>

    <style type="text/css">
.coba{
font-size: 6px;
}
    </style>
      

</head>
<body>
<div class="coba">
    
<table>
    <tr>
        <td colspan="5" align="center">TOKO PRASASTY</td>
    </tr>
    <tr>
        <td colspan="5" align="center">Jl Daendels No 282 Ambal</td>
    </tr>
    <tr>
        <td colspan="5" align="center">---------------------------------------------------</td>
    </tr>
    <tr>
    <td>No Penjualan</td>
    <td><?php print_r($penjualan['id']); ?></td>
    </tr>
    <tr>
        <td colspan="5">
            
<table cellpadding="1">
<tr>
    <td>No</td>
    <td>Kode</td>
    <td>Barang</td>
    <td>Harga</td>
    <td>jumlah</td>
    <td>SubTotal</td>
</tr>
<?php $no=1 ?>
<?php foreach ($detailpenjualan as $d): ?>
    
<tr>
    <td><?php echo $no++ ?></td>
    <td><?php echo $d->kodeBarang ?></td>
    <td><?php echo $d->barang ?></td>
    <td><?php echo $d->hargaEcer ?></td>
    <td><?php echo $d->jumlahJual ?></td>
    <td align="right"><?php echo $d->jumlahJual*$d->hargaEcer ?></td>
</tr>

<?php endforeach ?>
<tr>
    <td colspan="5"><b>Total</td>
    <td colspan="1" align="right"><b><?php echo $penjualan['totalBayar'] ?></td>
</tr>
    <tr>
    <td colspan="5"><b>Keterangan</td>
    <td colspan="1"><b>LUNAS</td>
</tr>   
</table>



        </td>
        
    </tr>

    <tr>
        <td colspan="5" align="right">
        <br>
            <?php echo date('d M Y') ?>
        </td>
    </tr> 
    <tr>
        <td colspan="4"></td>
        <td align="center"><?php echo $this->session->userdata('username') ?></td>
    </tr>      
</table>
</div>
<script type="text/javascript">
    window.print();
</script>


</body>
</html>