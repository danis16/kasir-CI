<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Pemesan<small>different form elements</small></h2>
 
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>


        <form action="<?php echo $action; ?>" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Tanggal Pesan <?php echo form_error('tanggal_pesan') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="date" class="form-control" name="tanggal_pesan" id="tanggal_pesan" placeholder="Tanggal Pesan" value="<?php echo $tanggal_pesan; ?>" />
                </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Tanggal Diambil <?php echo form_error('tanggal_diambil') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="date" class="form-control" name="tanggal_diambil" id="tanggal_diambil" placeholder="Tanggal Diambil" value="<?php echo $tanggal_diambil; ?>" />
                </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Nama Pelanggan <?php echo form_error('idPelanggan') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="namaPelanggan" id="idPelanggan" placeholder="Ketik nama Pelanggan"  value="<?php echo $NamaPelanggan ?>" />
                </div>
        </div>
      
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keterangan">Keterangan <?php echo form_error('keterangan') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
                </div>
        </div><div class="ln_solid"></div>
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
        <a href="<?php echo site_url('pemesan') ?>" class="btn btn-default"><i class="fa fa-reply-all"></i> Cancel</a>
    </div>
                        </div></form>
     </div>
            </div>
        </div>



        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Pemesan<small>different form elements</small></h2>
 
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>

        <form action="" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Cari Barang <?php echo form_error('tanggal_pesan') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input list="barang" class="form-control" name="idbarang" id="idbarang" placeholder="Cari barang.."  />
                </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Jumlah <?php echo form_error('tanggal_pesan') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="jumlah"  />
                </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Keterangan <?php echo form_error('tanggal_pesan') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <textarea class="form-control" rows="3" name="keterangann" id="keterangann" placeholder="Keterangan"></textarea>               </div>
        </div>

        <button type="button" class="btn btn-primary" onclick="add()" >ADD</button> 


        
        
    
        <div class="ln_solid"></div>

        <div id="list">
            
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
            
            <?php 
            $no=1;
            foreach ($list_barang as $b) {
                echo "<tr>
                <td>$no</td>
                <td>$b->barang</td>
                <td>$b->jumlah</td>
                <td>$b->keterangan</td>
                <td>Aksi</td>
                </tr>";
                $no++;
            }

             ?>

        </table>

        </div>
                       
                   
                        </form>
     </div>
            </div>
        </div>




    </div>
</div>

<datalist id="barang">
<?php 
    foreach ($barang as $b) {

        echo '<option value="'.$b->barang.'">';
        # code...
    }
 ?>

</datalist>



<datalist id="pelanggan">
<?php 
    foreach ($pelanggan as $p) {

        echo '<option value="'.$p->nama.'">';
        # code...
    }
 ?>

</datalist>


<script type="text/javascript">
    
function add() {
    var idbarang = $("#idbarang").val();
    var jumlah = $("#jumlah").val();
    var keterangann = $("#keterangann").val();
    $.ajax({
        url:"<?php echo base_url()?>index.php/pemesan/add_barang",
        data:"idbarang="+idbarang+"&jumlah="+jumlah+"&keterangann="+keterangann,
        success: function (html) {
          
            load();
            // body...
        }

    });
}

function load() {
var idbarang = $("#idbarang").val();
 $.ajax({
    url:"<?php echo base_url()?>index.php/pemesan/list_barang_ubah",
    data:"idbarang="+idbarang,
    success:function (html) {
        // document.write('asasasa');
        // alert('sukses');
        $("#list").html(html);
        // body...
    }
    
 });

}

function remove(id) {
$.ajax({
    url:"<?php echo base_url()?>index.php/pemesan/remove_barang",
    data:"id="+id,
    success:function (html) {
        // document.write('asasasa');
        // alert('sukses');
     load();
        // body...
    }
    
 });
    
}


</script>

<body onload="load()">