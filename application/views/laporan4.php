
<div class="">
    <div class="clearfix"></div>
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

    <div class="col-md-6 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Laporan Penjualan Barang Bulan <?php if (empty($_GET['bulan_pembelian'])){
            echo date('F');

            } 

else {
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
              <?php
            }

            ?>

          </table>


        </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Laporan Penjualan Barang Tanggal <?php if (empty($_GET['tanggal_pembelian'])){ 
            echo date('d');    
          }
          else {
            echo $_GET['tanggal_pembelian'];
          }

          ?></h2>

          <div class="clearfix"></div>
        </div>
        <div class="x_content" >
          <br>

          <?php 

          if (empty($barang_hari_ini)) {
            echo "<H2>DATA MASIH KOSONG</H2>";
          }
          else {
           ?>
           <table class="table table-bordered" >

            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Warna</th>
              <th>Ukuran</th>
              <th>Jumlah Jual</th>
              <th>Cabang</th>
              
            </tr>
            <?php 
            $no=1;
            foreach ($barang_hari_ini as $b) {


              ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $b->barang ?></td>
                <td><?php echo $b->warna ?></td>
                <td><?php echo $b->size ?></td>
                <td><?php echo $b->jumlahJual ?></td>
                <td>Cabang <?php echo $b->idCabang ?></td>

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