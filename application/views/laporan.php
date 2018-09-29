
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Penjualan</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content" >
                    <br>


                    <table class="table table-bordered" >
                        <tr>
                            <!-- <td>Penjualan</td> -->
            <!-- <td>Pembelian</td>
            <td>Laba</td> -->
        </tr>
        <?php 
            // foreach ($total_penjualan as $l) {
        // echo '<tr>';
            // echo '<td>'.$l->total_penjualan.'</td>';
            // echo '<td>'.$l->pembelian.'</td>';
            // echo '<td>'.$l->laba.'</td>';
        // echo '</tr>';
            // }

        ?>
        <tr>
           <td ><h2>Laporan Penjualan</h2></td>
           <td align="right" colspan="2"><h2>Tanggal : <?php echo date('d-m-Y'); ?></h2></td>
       </tr>
       <tr>
           <td>Penjualan</td>
           <td align="right">
               <?php echo $total_penjualan['total_penjualan']; ?>
           </td>

           <td></td>
       </tr>

       <tr>
           <td>Retur Penjualan</td>
         <td></td>
           <td align="right">
             -  <?php echo $total_retur_penjualan['total_retur_penjualan']; ?>
         </td>
     </tr>
<?php $hasil_penjualan=$total_penjualan['total_penjualan']-$total_retur_penjualan['total_retur_penjualan'] ?>
     <tr>
       <td colspan="2"><b>Hasil Penjualan</b></td>
       <!-- <td></td> -->
       <td align="right"><?php echo $hasil_penjualan ; ?></td>
   </tr>


</table>


</div>
</div>
</div>



<div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Pembelian</h2>

            <div class="clearfix"></div>
        </div>
        <div class="x_content" >
            <br>


            <table class="table table-bordered" >
                <tr>
                </tr>
                <tr>
                   <td><h2>Laporan Pembelian</h2></td>
                   <td align="right" colspan="2"><h2>Tanggal : <?php echo date('d-m-Y'); ?></h2></td>
               </tr>
               <tr>
                   <td>Pembelian</td>
                   <td align="right">
                   <?php echo $pembelian['pembelian']; ?>
                   </td>
                   <td></td>
               </tr>

                <tr>
                   <td>Barang Rusak</td>
                   <td align="right">
                       <?php echo $barang_rusak['barang_rusak']; ?>
                   </td>
                   <td></td>
               </tr>

               <tr>
                   <td>Retur Pembelian</td>
                   <td></td>
                   <td align="right">
                      - <?php echo $retur_pembelian['retur_pembelian']; ?>
                   </td>
               </tr>

<?php $hasil_pembelian=$pembelian['pembelian']-$retur_pembelian['retur_pembelian']+$barang_rusak['barang_rusak'] ?>
               <tr>
                   <td colspan="2"><b>Hasil Pembelian</b></td>
                   <!-- <td></td> -->
                   <td align="right"><?php echo $hasil_pembelian; ?></td>
               </tr>


           </table>


       </div>
   </div>
</div>






<div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Perhitungan Laba / Rugi</h2>

            <div class="clearfix"></div>
        </div>
        <div class="x_content" >
            <br>


            <table class="table table-bordered" >
                <tr>
                </tr>
                <tr>
                   <td><h2>Laporan Laba / Rugi</h2></td>
                   <td align="right" colspan="2"><h2>Tanggal : <?php echo date('d-m-Y'); ?></h2></td>
               </tr>
               <tr>
                   <td>Hasil Penjualan</td>
                   <td align="right">
                   <?php echo $hasil_penjualan; ?>
                   </td>
                   <td></td>
               </tr>
<!-- 
               <tr>
                   <td>Hasil Penjualan</td>
                   <td align="right">
                   <?php echo $modal['modal']; ?>
                   </td>
                   <td></td>
               </tr> -->

               <tr>
                   <td>Hasil Pembelian</td>
                   <td></td>
                   <td align="right">
                      - <?php echo $hasil_pembelian; ?>
                   </td>
               </tr>


                <tr>
                   <td>Beban yang dikeluarkan</td>
                   <td></td>
                   <td align="right">
                      - <?php echo $beban['jumlah']; ?>
                   </td>
               </tr>
<?php $hasil_akhir=$hasil_penjualan-$hasil_pembelian-$beban['jumlah'] ?>
               <tr>
                   <td colspan="2"><b><?php if ($hasil_akhir>=0) {
                       echo'LABA';
                   } 
                   else{
                    echo'RUGI';
                    }?></b></td>
                   <!-- <td></td> -->
                   <td align="right"><?php echo $hasil_akhir ?></td>
               </tr>


           </table>


       </div>
   </div>
</div>




</div>
</div>