
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        

<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div>
          <h1>DATA REALTIME</h1>

          <div class="clearfix"></div>
        </div>
        </div>
        </div>


<div class="col-md-6 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Laporan Stok Barang Terbanyak Cabang 1</h2>

          <div class="clearfix"></div>
        </div>
        <div class="x_content" >
          <br>

          <?php 

          if (empty($stok_barang_1)) {
            echo "<H2>DATA MASIH KOSONG</H2>";
          }
          else {
           ?>
           <table class="table table-bordered" >

            <tr>
              <th>No</th>
              
              <th>Nama barang</th>
              <th>Merek</th>
              <th>Stok</th>
              
              
            </tr>
            <?php 
            $no=1;
            foreach ($stok_barang_1 as $b) {


              ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $b->barang ?></td>
                <td><?php echo $b->merek ?></td>
                <td><?php echo $b->stokAwal ?></td>

              </tr>
              <?php
            }

            ?>

          </table>

          <?php } ?>
        </div>
      </div>

    </div>


    <div class="col-md-6 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Laporan Stok Barang Tersedikit Cabang 1</h2>

          <div class="clearfix"></div>
        </div>
        <div class="x_content" >
          <br>

          <?php 

          if (empty($stok_barang_1_sedikit)) {
            echo "<H2>DATA MASIH KOSONG</H2>";
          }
          else {
           ?>
           <table class="table table-bordered" >

            <tr>
              <th>No</th>
              
              <th>Nama barang</th>
              <th>Merek</th>
              <th>Stok</th>
              
              
            </tr>
            <?php 
            $no=1;
            foreach ($stok_barang_1_sedikit as $b) {


              ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $b->barang ?></td>
                <td><?php echo $b->merek ?></td>
                <td><?php echo $b->stokAwal ?></td>

              </tr>
              <?php
            }

            ?>

          </table>

          <?php } ?>
        </div>
      </div>

    </div>




    <div class="col-md-6 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Laporan Stok Barang Terbanyak Cabang 2</h2>

          <div class="clearfix"></div>
        </div>
        <div class="x_content" >
          <br>

          <?php 

          if (empty($stok_barang_2)) {
            echo "<H2>DATA MASIH KOSONG</H2>";
          }
          else {
           ?>
           <table class="table table-bordered" >

            <tr>
              <th>No</th>
              <th>Nama barang</th>
              <th>Merek</th>
              <th>Stok</th>
              
              
            </tr>
            <?php 
            $no=1;
            foreach ($stok_barang_2 as $b) {


              ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $b->barang ?></td>
                <td><?php echo $b->merek ?></td>
                <td><?php echo $b->stokAwal ?></td>

              </tr>
              <?php
            }

            ?>

          </table>

          <?php } ?>
        </div>
      </div>

    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Laporan Stok Barang Tersedikit Cabang 2</h2>

          <div class="clearfix"></div>
        </div>
        <div class="x_content" >
          <br>

          <?php 

          if (empty($stok_barang_2_sedikit)) {
            echo "<H2>DATA MASIH KOSONG</H2>";
          }
          else {
           ?>
           <table class="table table-bordered" >

            <tr>
              <th>No</th>
              <th>Nama barang</th>
              <th>Merek</th>
              <th>Stok</th>
              
              
            </tr>
            <?php 
            $no=1;
            foreach ($stok_barang_2_sedikit as $b) {


              ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $b->barang ?></td>
                <td><?php echo $b->merek ?></td>
                <td><?php echo $b->stokAwal ?></td>

              </tr>
              <?php
            }

            ?>

          </table>

          <?php } ?>
        </div>
      </div>

    </div>


    </div>
</div>