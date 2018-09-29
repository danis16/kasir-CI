
<div class="">
  <div class="clearfix"></div>
  <div class="row">




    
<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div>
          <h1>DATA GRAFIK</h1>

          <div class="clearfix"></div>
        </div>
        </div>
        </div>


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
      <div class="x_title"> <h2>PILIH BARANG </h2>
        <div class="clearfix"></div>
        <div class="x_content">
         <form class="form-horizontal form-label-left">
           <br>
           <div class="form-group col-md-6">
             <input type="hidden" name ="bulan_pembelian" value="<?php echo $_GET['bulan_pembelian'] ?>">  
             <!-- <label for="heard" class="control-label">Nama bulan</label> -->
             <select name="pilih_barang" id="tanggal_pembelian"  class="form-control col-md-10">
                <option value=""><?php if (empty($_GET['pilih_barang'])){ ?>
                  <?php echo 'Pilih Barang'; }
                else {

                  echo $jenisbarangg['Barang'];

                }
                   ?>
                </option>
              <?php foreach ($jenisbarang as $b): ?> 
                <option value="<?php echo $b->id?>"><?php echo $b->Barang?></option>
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





    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Merek</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>

            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
          <canvas id="canvasDoughnut_custom_merek" width="676" height="338" style="width: 338px; height: 169px;"></canvas>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Size</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>

            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
          <canvas id="canvasDoughnut_custom_size" width="676" height="338" style="width: 338px; height: 169px;"></canvas>
        </div>
      </div>
    </div>


    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Warna</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>

            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
          <canvas id="canvasDoughnut_custom_warna" width="676" height="338" style="width: 338px; height: 169px;"></canvas>
        </div>
      </div>
    </div>




<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div>
          <h1>DATA GRAFIK SAAT INI</h1>

          <div class="clearfix"></div>
        </div>
        </div>
        </div>


    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Kategori Paling Banyak Terjual Bulan <?php echo date('F') ?></small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>

            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
          <canvas id="canvasDoughnut" width="676" height="338" style="width: 338px; height: 169px;"></canvas>
        </div>
      </div>
    </div>







    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Kategori Barang Saat ini</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
          <canvas id="canvasDoughnut_saatini" width="676" height="338" style="width: 338px; height: 169px;"></canvas>
        </div>
      </div>
    </div>
    




    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Kategori Banyak Terjual Cabang 1</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
          <canvas id="canvasDoughnut_cabang1" width="676" height="338" style="width: 338px; height: 169px;"></canvas>
        </div>
      </div>
    </div>




    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Kategori Banyak Terjual Cabang 2</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
          <canvas id="canvasDoughnut_cabang2" width="676" height="338" style="width: 338px; height: 169px;"></canvas>
        </div>
      </div>
    </div>
    



    <!-- <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Barang Yang Paling Banyak Terjual</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
          <canvas id="canvasDoughnut_penjualan_terbanyak" width="676" height="338" style="width: 338px; height: 169px;"></canvas>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Penjualan Terbanyak Bulan ini</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
          <canvas id="canvasDoughnut_penjualan_terbanyak_bulan" width="676" height="338" style="width: 338px; height: 169px;"></canvas>
        </div>
      </div>
    </div>
    
 -->

    

    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Merek Paling Banyak Terjual Bulan <?php echo date('F') ?></small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>

            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
          <canvas id="canvasDoughnut_merek1" width="676" height="338" style="width: 338px; height: 169px;"></canvas>
        </div>
      </div>
    </div>


    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Merek Saat ini</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>

            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
          <canvas id="canvasDoughnut_merek2" width="676" height="338" style="width: 338px; height: 169px;"></canvas>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Warna Paling Banyak Terjual <?php echo date('F') ?></small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>

            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
          <canvas id="canvasDoughnut_warna1" width="676" height="338" style="width: 338px; height: 169px;"></canvas>
        </div>
      </div>
    </div>


    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Warna Saat ini</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>

            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
          <canvas id="canvasDoughnut_warna2" width="676" height="338" style="width: 338px; height: 169px;"></canvas>
        </div>
      </div>
    </div>



  <div class="col-md-12 col-sm-6 col-xs-12">
  <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Size Paling Banyak Terjual <?php echo date('F') ?></small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>

            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
          <canvas id="canvasDoughnut_size1" width="676" height="338" style="width: 338px; height: 169px;"></canvas>
        </div>
      </div>
    </div>
 


   <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Size Saat ini</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>

            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
          <canvas id="canvasDoughnut_size2" width="676" height="338" style="width: 338px; height: 169px;"></canvas>
        </div>
      </div>
    </div>
    </div>
<!--     <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Size Saat ini</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>

            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
          <canvas id="canvasDoughnut_size2" width="676" height="338" style="width: 338px; height: 169px;"></canvas>
        </div>
      </div>
    </div>
 -->

<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div>
          <h1>Penyebab Barang Rusak</h1>

          <div class="clearfix"></div>
        </div>
        </div>
        </div>



    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Penyebab Barang Rusak</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
          <canvas id="pieChart" width="676" height="338" style="width: 338px; height: 169px;"></canvas>
        </div>
      </div>
    </div>


    <script src="<?php echo base_url(); ?>gentelella/vendors/Chart.js/dist/Chart.js"></script>

    
    <script type="text/javascript">

   // Pie chart
   var ctx = document.getElementById("pieChart");
   var data = {
    datasets: [{
      data: [<?php echo $supplier['jumlah'] ?>, <?php echo $jatuh['jumlah'] ?>, <?php echo $debu['jumlah'] ?>, <?php echo $lama['jumlah'] ?>, <?php echo $lainlain['jumlah'] ?>],
      backgroundColor: [
      "#455C73",
      "#9B59B6",
      "#BDC3C7",
      "#26B99A",
      "#3498DB"
      ],
          label: 'My dataset' // for legend
        }],
        labels: [
        "Supplier",
        "Jatuh",
        "Debu",
        "Lama",
        "Lain-lain"
        ]
      };

      var pieChart = new Chart(ctx, {
        data: data,
        type: 'pie',
        otpions: {
          legend: false
        }
      });

   // Doughnut chart
   var ctx = document.getElementById("canvasDoughnut");
   var data = {
    labels: [
    <?php 
    foreach ($kategori_penjualan as $k) {
      echo '"'.$k->kategori.'"'.',';
    }
    ?>
    ],
    datasets: [{
      data: [<?php foreach ($kategori_penjualan as $k) {
        echo $k->jumlah.',';
      } ?>],
      backgroundColor: [
      "#455C73",
      "#9B59B6",
      "#BDC3C7",
      "#26B99A",
      "#3498DB"
      ],
      hoverBackgroundColor: [
      "#34495E",
      "#B370CF",
      "#CFD4D8",
      "#36CAAB",
      "#49A9EA"
      ]

    }]

  };

  var canvasDoughnut = new Chart(ctx, {
    type: 'doughnut',
    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
    data: data
  });



  var ctx = document.getElementById("canvasDoughnut_custom_merek");
   var data = {
    labels: [
    <?php 
    foreach ($custom_merek as $k) {
      echo '"'.$k->merek.'"'.',';
    }
    ?>
    ],
    datasets: [{
      data: [<?php foreach ($custom_merek as $k) {
        echo $k->jumlah.',';
      } ?>],
      backgroundColor: [
      "#455C73",
      "#9B59B6",
      "#BDC3C7",
      "#26B99A",
      "#3498DB"
      ],
      hoverBackgroundColor: [
      "#34495E",
      "#B370CF",
      "#CFD4D8",
      "#36CAAB",
      "#49A9EA"
      ]

    }]

  };

  var canvasDoughnut = new Chart(ctx, {
    type: 'doughnut',
    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
    data: data
  });





  var ctx = document.getElementById("canvasDoughnut_custom_size");
   var data = {
    labels: [
    <?php 
    foreach ($custom_size as $k) {
      echo '"'.$k->size.'"'.',';
    }
    ?>
    ],
    datasets: [{
      data: [<?php foreach ($custom_size as $k) {
        echo $k->jumlah.',';
      } ?>],
      backgroundColor: [
      "#455C73",
      "#9B59B6",
      "#BDC3C7",
      "#26B99A",
      "#3498DB"
      ],
      hoverBackgroundColor: [
      "#34495E",
      "#B370CF",
      "#CFD4D8",
      "#36CAAB",
      "#49A9EA"
      ]

    }]

  };

  var canvasDoughnut = new Chart(ctx, {
    type: 'doughnut',
    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
    data: data
  });



  var ctx = document.getElementById("canvasDoughnut_custom_warna");
   var data = {
    labels: [
    <?php 
    foreach ($custom_warna as $k) {
      echo '"'.$k->warna.'"'.',';
    }
    ?>
    ],
    datasets: [{
      data: [<?php foreach ($custom_warna as $k) {
        echo $k->jumlah.',';
      } ?>],
      backgroundColor: [
      "#455C73",
      "#9B59B6",
      "#BDC3C7",
      "#26B99A",
      "#3498DB"
      ],
      hoverBackgroundColor: [
      "#34495E",
      "#B370CF",
      "#CFD4D8",
      "#36CAAB",
      "#49A9EA"
      ]

    }]

  };

  var canvasDoughnut = new Chart(ctx, {
    type: 'doughnut',
    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
    data: data
  });




  var ctx = document.getElementById("canvasDoughnut_saatini");
  var data = {
    labels: [
    <?php 
    foreach ($kategori_saat_ini as $k) {
      echo '"'.$k->kategori.'"'.',';
    }
    ?>
    ],
    datasets: [{
      data: [<?php foreach ($kategori_saat_ini as $k) {
        echo $k->jumlah.',';
      } ?>],
      backgroundColor: [
      "#455C73",
      "#9B59B6",
      "#BDC3C7",
      "#26B99A",
      "#3498DB"
      ],
      hoverBackgroundColor: [
      "#34495E",
      "#B370CF",
      "#CFD4D8",
      "#36CAAB",
      "#49A9EA"
      ]

    }]

  };

  var canvasDoughnut = new Chart(ctx, {
    type: 'doughnut',
    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
    data: data
  });




  var ctx = document.getElementById("canvasDoughnut_cabang1");
  var data = {
    labels: [
    <?php 
    foreach ($kategori_cabang1 as $k) {
      echo '"'.$k->kategori.'"'.',';
    }
    ?>
    ],
    datasets: [{
      data: [<?php foreach ($kategori_cabang1 as $k) {
        echo $k->jumlah.',';
      } ?>],
      backgroundColor: [
      "#455C73",
      "#9B59B6",
      "#BDC3C7",
      "#26B99A",
      "#3498DB"
      ],
      hoverBackgroundColor: [
      "#34495E",
      "#B370CF",
      "#CFD4D8",
      "#36CAAB",
      "#49A9EA"
      ]

    }]

  };

  var canvasDoughnut = new Chart(ctx, {
    type: 'doughnut',
    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
    data: data
  });




  var ctx = document.getElementById("canvasDoughnut_cabang2");
  var data = {
    labels: [
    <?php 
    foreach ($kategori_cabang2 as $k) {
      echo '"'.$k->kategori.'"'.',';
    }
    ?>
    ],
    datasets: [{
      data: [<?php foreach ($kategori_cabang2 as $k) {
        echo $k->jumlah.',';
      } ?>],
      backgroundColor: [
      "#455C73",
      "#9B59B6",
      "#BDC3C7",
      "#26B99A",
      "#3498DB"
      ],
      hoverBackgroundColor: [
      "#34495E",
      "#B370CF",
      "#CFD4D8",
      "#36CAAB",
      "#49A9EA"
      ]

    }]

  };

  var canvasDoughnut = new Chart(ctx, {
    type: 'doughnut',
    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
    data: data
  });



  var ctx = document.getElementById("canvasDoughnut_merek1");
  var data = {
    labels: [
    <?php 
    foreach ($merek_penjualan as $k) {
      echo '"'.$k->merek.'"'.',';
    }
    ?>
    ],
    datasets: [{
      data: [<?php foreach ($merek_penjualan as $k) {
        echo $k->jumlah.',';
      } ?>],
      backgroundColor: [
      "#455C73",
      "#9B59B6",
      "#BDC3C7",
      "#26B99A",
      "#3498DB"
      ],
      hoverBackgroundColor: [
      "#34495E",
      "#B370CF",
      "#CFD4D8",
      "#36CAAB",
      "#49A9EA"
      ]

    }]

  };

  var canvasDoughnut = new Chart(ctx, {
    type: 'doughnut',
    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
    data: data
  });


  var ctx = document.getElementById("canvasDoughnut_merek2");
  var data = {
    labels: [
    <?php 
    foreach ($merek_saat_ini as $k) {
      echo '"'.$k->merek.'"'.',';
    }
    ?>
    ],
    datasets: [{
      data: [<?php foreach ($merek_saat_ini as $k) {
        echo $k->jumlah.',';
      } ?>],
      backgroundColor: [
      "#455C73",
      "#9B59B6",
      "#BDC3C7",
      "#26B99A",
      "#3498DB"
      ],
      hoverBackgroundColor: [
      "#34495E",
      "#B370CF",
      "#CFD4D8",
      "#36CAAB",
      "#49A9EA"
      ]

    }]

  };

  var canvasDoughnut = new Chart(ctx, {
    type: 'doughnut',
    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
    data: data
  });


  var ctx = document.getElementById("canvasDoughnut_warna1");
  var data = {
    labels: [
    <?php 
    foreach ($warna_penjualan as $k) {
      echo '"'.$k->warna.'"'.',';
    }
    ?>
    ],
    datasets: [{
      data: [<?php foreach ($warna_penjualan as $k) {
        echo $k->jumlah.',';
      } ?>],
      backgroundColor: [
      "#455C73",
      "#9B59B6",
      "#BDC3C7",
      "#26B99A",
      "#3498DB"
      ],
      hoverBackgroundColor: [
      "#34495E",
      "#B370CF",
      "#CFD4D8",
      "#36CAAB",
      "#49A9EA"
      ]

    }]

  };

  var canvasDoughnut = new Chart(ctx, {
    type: 'doughnut',
    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
    data: data
  });


  var ctx = document.getElementById("canvasDoughnut_warna2");
  var data = {
    labels: [
    <?php 
    foreach ($warna_saat_ini as $k) {
      echo '"'.$k->warna.'"'.',';
    }
    ?>
    ],
    datasets: [{
      data: [<?php foreach ($warna_saat_ini as $k) {
        echo $k->jumlah.',';
      } ?>],
      backgroundColor: [
      "#455C73",
      "#9B59B6",
      "#BDC3C7",
      "#26B99A",
      "#3498DB"
      ],
      hoverBackgroundColor: [
      "#34495E",
      "#B370CF",
      "#CFD4D8",
      "#36CAAB",
      "#49A9EA"
      ]

    }]

  };

  var canvasDoughnut = new Chart(ctx, {
    type: 'doughnut',
    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
    data: data
  });
  var canvasDoughnut = new Chart(ctx, {
    type: 'doughnut',
    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
    data: data
  });


  var ctx = document.getElementById("canvasDoughnut_size1");
  var data = {
    labels: [
    <?php 
    foreach ($size_penjualan as $k) {
      echo '"'.$k->size.'"'.',';
    }
    ?>
    ],
    datasets: [{
      data: [<?php foreach ($size_penjualan as $k) {
        echo $k->jumlah.',';
      } ?>],
      backgroundColor: [
      "#455C73",
      "#9B59B6",
      "#BDC3C7",
      "#26B99A",
      "#3498DB"
      ],
      hoverBackgroundColor: [
      "#34495E",
      "#B370CF",
      "#CFD4D8",
      "#36CAAB",
      "#49A9EA"
      ]

    }]

  };

  var canvasDoughnut = new Chart(ctx, {
    type: 'doughnut',
    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
    data: data
  });
  var canvasDoughnut = new Chart(ctx, {
    type: 'doughnut',
    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
    data: data
  });


  var ctx = document.getElementById("canvasDoughnut_size2");
  var data = {
    labels: [
    <?php 
    foreach ($size_saat_ini as $k) {
      echo '"'.$k->size.'"'.',';
    }
    ?>
    ],
    datasets: [{
      data: [<?php foreach ($size_saat_ini as $k) {
        echo $k->jumlah.',';
      } ?>],
      backgroundColor: [
      "#455C73",
      "#9B59B6",
      "#BDC3C7",
      "#26B99A",
      "#3498DB"
      ],
      hoverBackgroundColor: [
      "#34495E",
      "#B370CF",
      "#CFD4D8",
      "#36CAAB",
      "#49A9EA"
      ]

    }]

  };

  var canvasDoughnut = new Chart(ctx, {
    type: 'doughnut',
    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
    data: data
  });

  var ctx = document.getElementById("canvasDoughnut_penjualan_terbanyak");
  var data = {
    labels: [
    <?php 
    foreach ($penjualan_terbanyak as $k) {
      echo '"'.$k->barang.'"'.',';
    }
    ?>
    ],
    datasets: [{
      data: [<?php foreach ($penjualan_terbanyak as $k) {
        echo $k->jumlahJual.',';
      } ?>],
      backgroundColor: [
      "#455C73",
      "#9B59B6",
      "#BDC3C7",
      "#26B99A",
      "#3498DB"
      ],
      hoverBackgroundColor: [
      "#34495E",
      "#B370CF",
      "#CFD4D8",
      "#36CAAB",
      "#49A9EA"
      ]

    }]

  };

  var canvasDoughnut = new Chart(ctx, {
    type: 'doughnut',
    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
    data: data
  });
  var canvasDoughnut = new Chart(ctx, {
    type: 'doughnut',
    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
    data: data
  });

  var ctx = document.getElementById("canvasDoughnut_penjualan_terbanyak_bulan");
  var data = {
    labels: [
    <?php 
    foreach ($penjualan_terbanyak_bulan as $k) {
      echo '"'.$k->barang.'"'.',';
    }
    ?>
    ],
    datasets: [{
      data: [<?php foreach ($penjualan_terbanyak_bulan as $k) {
        echo $k->stokAwal.',';
      } ?>],
      backgroundColor: [
      "#455C73",
      "#9B59B6",
      "#BDC3C7",
      "#26B99A",
      "#3498DB"
      ],
      hoverBackgroundColor: [
      "#34495E",
      "#B370CF",
      "#CFD4D8",
      "#36CAAB",
      "#49A9EA"
      ]

    }]

  };

  var canvasDoughnut = new Chart(ctx, {
    type: 'doughnut',
    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
    data: data
  });

</script>




</div>
</div>