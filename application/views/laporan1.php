
<div class="">
  <div class="clearfix"></div>
  <div class="col-md-6">
  <form action="<?php echo base_url(); ?>index.php/laporanlaba/cetak_laporan_penjualan">
    <input type="hidden" name ="bulan_pembelian" value="<?php echo $_GET['bulan_pembelian'] ?>"> 
    <button class="btn btn-primary">CETAK LAPORAN PENJUALAN</button>
  </form>
  </div>
  <div class="col-md-6">
  <a href="<?php echo base_url(); ?>index.php/laporanlaba/cetak_laporan_stok">  
    <button class="btn btn-primary">CETAK LAPORAN STOK BARANG SEKARANG</button>
  </a>
  </div>

  <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title"> <h2>PILIH BULAN</h2>
          <div class="clearfix"></div>
          <div class="x_content">
           <form class="form-horizontal form-label-left">
             <br>
             <div class="form-group col-md-6">
               <!-- <label for="heard" class="control-label">Nama bulan</label> -->
               <select name="bulan_pembelian"  class="form-control col-md-10" id="bulan_pembelian">
                <option value=""><?php if (empty($_GET['bulan_pembelian'])) {
                  echo 'Pilih Bulan';
                }

                else{
                  echo $tampil_bulan['bulan'];
                }

                ?></option>
                <?php foreach ($bulan_pembelian->result() as $b): ?> 
                  <option value="<?php echo $b->b?>"><?php echo $b->bulan?></option>
                <?php endforeach ?>
                <!-- <input type="hidden" name="nama_bulan" value="<?php echo $b->bulan?>"> -->
              </select>
            </div>
            <div class="form-group col-md-6">
              <button class="btn btn-primary" >Klik</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title"> <h2>PILIH TANGGAL </h2>
        <div class="clearfix"></div>
        <div class="x_content">
         <form class="form-horizontal form-label-left">
           <br>
           <div class="form-group col-md-6">
             <input type="hidden" name ="bulan_pembelian" value="<?php echo $_GET['bulan_pembelian'] ?>">  
             <!-- <label for="heard" class="control-label">Nama bulan</label> -->
             <select name="tanggal_pembelian" id="tanggal_pembelian"  class="form-control col-md-10">
              <option value=""><?php if (empty($_GET['tanggal_pembelian'])){ ?>
                <?php echo 'Pilih Tanggal'; }
                else {

                  echo $_GET['tanggal_pembelian'];
                }
                ?>
              </option>
              <?php foreach ($tanggal_pembelian->result() as $b): ?> 
                <option value="<?php echo $b->t?>"><?php echo $b->t?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group col-md-6">
            <button class="btn btn-primary" >Klik</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
 //  function tanggal() {
 //    var tanggal_pembelian = $("#tanggal_pembelian").val();


 //   $.ajax({
 //    url:"<?php echo base_url() ?>index.php/laporanlaba",
 //    data:"tanggal_pembelian="+tanggal_pembelian,
 //    success:function() {

 //    }

 //  })

 // }





</script>




<div class="col-md-6 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Laporan Penjualan Bulan <?php if (empty($_GET['bulan_pembelian'])) {
        echo date('F');
      }

      else{
        echo $tampil_bulan['bulan'];
      }

      ?> </h2>

      <div class="clearfix"></div>
    </div>
    <div class="x_content" >
      <br>
      <table class="table table-bordered" >

        <tr>
          <th>Keterangan</th>
          <th>Debit</th>
          <th>Kredit</th>
        </tr>
        <tr>
          <td>Penjualan</td>
          <td>Rp <?php echo number_format($total_penjualan['total_penjualan'],2,",",".") ?></td>
          <td></td>
        </tr>
        <tr>
          <td>Retur Penjualan</td>
          <td></td>
          <td>Rp <?php echo number_format($total_retur_penjualan['total_retur_penjualan'],2,",",".") ?></td>
        </tr>
        <tr>
          <td>Pembelian</td>
          <td></td>
          <td>Rp <?php echo number_format($pembelian['pembelian'],2,",",".") ?></td>
        </tr>
        <tr>
          <td>Potongan Pembelian</td>
          <td>Rp <?php echo number_format($potongan['potongan'],2,",",".") ?></td>
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
          <td>Rp <?php echo number_format($beban['jumlah'],2,",",".") ?></td>
        </tr>
        <tr>
          <?php $debit=$total_penjualan['total_penjualan']+$retur_pembelian['retur_pembelian']+$stok_masuk['stok_masuk']+$potongan['potongan'] ?>
          <?php $kredit = $total_retur_penjualan['total_retur_penjualan']+$pembelian['pembelian']+$barang_rusak['barang_rusak']+$beban['jumlah']+$stok_keluar['stok_keluar'] ?> 
          <th>Jumlah</th>
          <th>Rp <?php echo  number_format($debit,2,",",".") ?></th>
          <th>Rp <?php echo  number_format($kredit,2,",",".") ?></th>
        </tr>
        <tr>

          <th><?php 

            $hasil=$debit-$kredit;

            if ($hasil>=0) {
              echo "LABA";
            }
            else {
              echo "RUGI";
            } ?></th>
            <td colspan="2" align="center"> <b> Rp <?php echo number_format($hasil,2,",",".") ?></b></td>

          </tr>

        </table>


      </div>
    </div>
  </div>



  <div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Laporan Penjualan Harian</h2>
        <div float="right" class="clearfix">
        </div>
      </div>
      <div class="x_content" >
        <br>
        
        
        <table class="table table-bordered">


          <tr>
            <th>Keterangan</th>
            <th>Debit</th>
            <th>Kredit</th>
          </tr>
          <tr>
            <td>Penjualan</td>
            <td>
              Rp
              <?php if ($penjualan_hari_ini['penjualan']>0) {
                echo number_format($penjualan_hari_ini['penjualan'],2,",",".");

              }

              else{
                echo '-';
              } ?></td>
              <td></td>
            </tr>
            <tr>
              <td>Retur Penjualan</td>
              <td></td>
              <td> Rp <?php if ($retur_penjualan_hari_ini['total_retur_penjualan']>0) {
                echo number_format($retur_penjualan_hari_ini['total_retur_penjualan'],2,",",".");
              }  
              else{
                echo "-";
              }
              ?></td>
            </tr>
            <tr>
              <td>Pembelian</td>
              <td></td>
              <td>Rp <?php if ($pembelian_hari_ini['pembelian']>0) {
                echo number_format($pembelian_hari_ini['pembelian'],2,",",".");
              } 
              else{
                echo '-';
              }
              ?></td>
            </tr>
            <tr>
              <td>Potongan Pembelian</td>
              <td>Rp <?php if ($potongan_hari_ini['potongan']>0) {
                echo number_format($potongan_hari_ini['potongan'],2,",",".");
              } 
              else{
                echo '-';
              }
              ?></td>
              <td></td>
            </tr>
            <tr>
              <td>Retur Pembelian</td>
              <td>Rp <?php if ($retur_pembelian_hari_ini['retur_pembelian']>0) {
               echo number_format($retur_pembelian_hari_ini['retur_pembelian'],2,",",".");

             }
             else {
              echo "-";
            }
            ?></td>
            <td></td>
          </tr>
          <tr>
            <td>Barang Rusak</td>
            <td></td>
            <td>Rp <?php if ($barang_rusak_hari_ini['barang_rusak']>0) {
              echo number_format($barang_rusak_hari_ini['barang_rusak'],2,",",".");
            }
            else {
              echo "-";
            }

            ?></td>
          </tr>


          <tr>
            <td>Stok Masuk</td>
            <td>Rp <?php if ($stok_masuk_hari_ini['stok_masuk']>0) {
              echo number_format($stok_masuk_hari_ini['stok_masuk'],2,",",".");
            }
            else {
              echo "-";
            }

            ?></td>
            <td></td>
          </tr>

          <tr>
            <td>Stok Keluar</td>
            <td></td>
            <td>Rp <?php if ($stok_keluar_hari_ini['stok_keluar']>0) {
              echo number_format($stok_keluar_hari_ini['stok_keluar'],2,",",".");
            }
            else {
              echo "-";
            }

            ?></td>
          </tr>
          <tr>
            <td>Beban</td>
            <td></td>
            <td>Rp <?php echo number_format($beban_hari_ini['jumlah'],2,",",".") ?></td>
          </tr>
          <tr>
            <?php $debit=$penjualan_hari_ini['penjualan']+$retur_pembelian_hari_ini['retur_pembelian']+$potongan_hari_ini['potongan']+$stok_masuk_hari_ini['stok_masuk'] ?>
            <?php $kredit = $retur_penjualan_hari_ini['total_retur_penjualan']+$pembelian_hari_ini['pembelian']+$barang_rusak_hari_ini['barang_rusak']+$beban_hari_ini['jumlah']+$stok_keluar_hari_ini['stok_keluar'] ?> 
            <th>Jumlah</th>
            <th>Rp <?php echo number_format($debit ,2,",",".")?></th>
            <th>Rp <?php echo number_format($kredit,2,",",".")?></th>
          </tr>
          <tr>

            <th><?php 

              $hasil=$debit-$kredit;

              if ($hasil>=0) {
                echo "LABA";
              }
              else {
                echo "RUGI";
              } ?></th>
              <td colspan="2" align="center"> <b> Rp <?php echo number_format($hasil ,2,",",".")?></b></td>
              <!-- <td></td> -->

            </tr>

          </table>


        </div>
      </div>
    </div>



    <div class="col-md-6 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Laporan Hutang</h2>

          <div class="clearfix"></div>
        </div>
        <div class="x_content" >
          <br>
          <table class="table table-bordered" >

            <tr>
              <th>Nama</th>
              <th>Jumlah hutang</th>
              <th>Yang sudah dibayar</th>
              <th>Kekurangan pembayaran</th>
              <th>Tanggal wajib membayar</th>
            </tr>
            <?php foreach ($hutang as $h): ?>

              <tr>
                <td><?php echo $h->nama ?></td>
                <td><?php echo number_format($h->hutang,0,',','.') ?></td>
                <td><?php echo number_format($h->yangsudahdibayar,0,',','.') ?></td>
                <td><?php echo number_format($h->kekuranganpembayaran,0,',','.') ?></td>
                <td><?php echo date('j F Y', strtotime($h->tanggalWajibBayar))  ?></td>
              </tr>
            <?php endforeach ?>

          </table>


        </div>
      </div>
    </div>



    <div class="col-md-6 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Laporan Piutang</h2>

          <div class="clearfix"></div>
        </div>
        <div class="x_content" >
          <br>
          <table class="table table-bordered" >

            <tr>
              <th>Nama</th>
              <th>Jumlah piutang</th>
              <th>Yang sudah dibayar</th>
              <th>Kekurangan pembayaran</th>
              <th>Tanggal wajib membayar</th>
            </tr>
            <?php foreach ($piutang as $h): ?>

              <tr>
                <td><?php echo $h->nama ?></td>
                <td><?php echo number_format($h->piutang,0,',','.') ?></td>
                <td><?php echo number_format($h->yangsudahdibayar,0,',','.') ?></td>
                <td><?php echo number_format($h->kurang,0,',','.') ?></td>
                <td><?php echo date('j F Y', strtotime($h->tanggalWajibBayar)) ?></td>
              </tr>
            <?php endforeach ?>

          </table>


        </div>
      </div>
    </div>



    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Laporan Beban Pengeluaran Bulan <?php if (empty($_GET['bulan_pembelian'])) {
            echo date('F');
          }

          else{
            echo $tampil_bulan['bulan'];
          }

          ?></h2>

          <div class="clearfix"></div>
        </div>
        <div class="x_content" >
          <br>
          <table class="table table-bordered" >

            <tr>
              <th>No</th>
              <th>Nama Beban</th>
              <th>Jumlah</th>
              <th>Tanggal</th>
              <th>Nota</th>
              <th>Admin</th>
            </tr>
            <?php 
            $no=1;
            foreach ($bebanpengeluaran as $h): ?>

            <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $h->beban ?></td>
              <td><?php echo 'Rp '.number_format($h->jumlah,2,",",".")?></td>
              <td><?php echo date( 'd F Y', strtotime($h->tanggal)) ?></td>
              <td><?php echo $h->noNota ?></td>
              <td><?php echo $h->username ?></td>
            </tr>
          <?php endforeach ?>

        </table>


      </div>
    </div>
  </div>





  <!-- grafik -->




  <div class="col-md-12 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Grafik Penjualan Bulan <?php if (empty($_GET['bulan_pembelian'])) {
          echo date('F');
        }

        else{
          echo $tampil_bulan['bulan'];
        }

        ?></h2>

        <div class="clearfix"></div>
      </div>
      <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>

        <canvas id="lineChart" width="676" height="338" style="width: 338px; height: 169px;"></canvas>
      </div>
    </div>
  </div>


  <div class="col-md-12 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">

        <h2>Grafik Pembelian Bulan <?php if (empty($_GET['bulan_pembelian'])) {
          echo date('F');
        }

        else{
          echo $tampil_bulan['bulan'];
        }

        ?></h2>

        <div class="clearfix"></div>
      </div>
      <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>


       <script type="text/javascript">
          //  function tanggal_pembelian() {
          //   var bulan_pembelian = $("#bulan_pembelian").val();

          //   $.ajax({
          //     url:"<?php echo base_url() ?>index.php/LaporanLaba",
          //     data:"bulan_pembelian="+bulan_pembelian,
          //     success: function (html) {
          //       alert('sukses');
          //     }
          //   })

          // }



        </script>
        <canvas id="lineChart_pembelian" width="676" height="338" style="width: 338px; height: 169px;"></canvas>
      </div>
    </div>
  </div>
  <!-- bar -->
  <div class="col-md-12 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Omset Penjualan pada Bulan <?php if (empty($_GET['bulan_pembelian'])) {
          echo date('F');
        }

        else{
          echo $tampil_bulan['bulan'];
        }

        ?></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
        <canvas id="mybarChart" width="676" height="338" style="width: 338px; height: 169px;"></canvas>
      </div>
    </div>
  </div>


  <script src="<?php echo base_url(); ?>gentelella/vendors/Chart.js/dist/Chart.js"></script>


  <script type="text/javascript">

 // Line chart
 var ctx = document.getElementById("lineChart");
 var lineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [<?php 
    foreach ($penjualan_tanggal as $p) {
      echo '"'.$p->tanggal.'"'.',';

    } ?>],
    datasets: [{
      label: "PENJUALAN",
      backgroundColor: "rgba(38, 185, 154, 0.31)",
      borderColor: "rgba(38, 185, 154, 0.7)",
      pointBorderColor: "rgba(38, 185, 154, 0.7)",
      pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
      pointHoverBackgroundColor: "#fff",
      pointHoverBorderColor: "rgba(220,220,220,1)",
      pointBorderWidth: 5,
      data: [<?php 
      foreach ($penjualan_tanggal as $p) {

        echo $p->totalbayar.',';
      }

      ?>]
    },
    

    ]
  },
});



 var ctx = document.getElementById("lineChart_pembelian");
 var lineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [<?php 
    foreach ($pembelian_tanggal as $p) {
      echo '"'.$p->tanggal.'"'.',';

    } ?>],
    datasets: [
    {
      label: "PEMBELIAN",
      backgroundColor: "rgba(3, 88, 106, 0.3)",
      borderColor: "rgba(3, 88, 106, 0.70)",
      pointBorderColor: "rgba(3, 88, 106, 0.70)",
      pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
      pointHoverBackgroundColor: "#fff",
      pointHoverBorderColor: "rgba(151,187,205,1)",
      pointBorderWidth: 1,
      data: [<?php 
      foreach ($pembelian_tanggal as $p) {

        echo $p->totalbayar.',';
        // echo number_format($p->totalbayar,0,",",".").',';
      }

      ?>]
    }

    ]
  },
});


// bar
var ctx = document.getElementById("mybarChart");
var mybarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [<?php 
    
    foreach ($tanggal_penjualan as $t) {
      echo '"'.$t->tanggal.'"'.','; 
      // echo '"'.date( 'd F Y', strtotime($h->tanggal)).'"'.','; 
    }



    // for ($i=1; $i < 32; $i++) { 
    //   echo '"'.$i.'",';
    // }


    ?>],
    datasets: [{
      label: '# Toko A',
      backgroundColor: "#26B99A",
      data: [<?php foreach ($penjualan_cabang1 as $p) {
        echo $p->jual.',';
      } ?>]
    }, {
      label: '# Toko B',
      backgroundColor: "#03586A",
      data: [<?php foreach ($penjualan_cabang2 as $p) {
       echo $p->jual.',';
     } ?>]
   }]
 },

 options: {
  scales: {
    yAxes: [{
      ticks: {
        beginAtZero: true
      }
    }]
  }
}
});

</script>




</div>
</div>