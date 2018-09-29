<div class="">
    <div class="clearfix"></div>
    <div class="row">

  <div id="list"></div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Pindah Stok</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
        <form action="<?php echo $action; ?>" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
	    <!-- <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">IdAdmin <?php echo form_error('idAdmin') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="idAdmin" id="idAdmin" placeholder="IdAdmin" value="<?php echo $idAdmin; ?>" />
                </div>
        </div> -->
 <!--        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Cabang</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="idCabang" id="idCabang" >
                <option>Pilih Cabang</option>
               <?php 
               foreach ($cabang as $c) {
                   # code...
                echo '<option value='.$c->idCabang.'> Cabang '.$c->idCabang.'</option>';
               }

                ?>
              </select>
            </div>
        </div> -->

	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Yang Menerima <?php echo form_error('YangMenerima') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input list="admin" class="form-control" name="YangMenerima" id="YangMenerima" placeholder="Ketik Penerima" value="<?php echo $YangMenerima; ?>" />
                </div>
        </div>

        <datalist id="admin">

        <?php 
        foreach ($admin as $a) {
            echo '<option value="'.$a->username.'">';
        }
         ?>
        </datalist>
	   <!--  <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int"> Cabang <?php echo form_error('idCabang') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12"> -->
<!-- cmb_dinamis($name,$table,$field,$pk,$selected) -->
 <!-- echo cmb_dinamis_satuan('idCabang','cabang','Cabang','id',$idCabang,'idCabang')  -->
 
          <!-- <div class="form-group"> -->




            <!-- <input type="text" class="form-control" name="idCabang" id="idCabang" placeholder="IdCabang" value="<?php echo $idCabang; ?>" /> -->
                <!-- </div>
        </div> -->
<!-- 	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Tanggal <?php echo form_error('tanggal') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
                </div>
        </div> -->
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
	    <a href="<?php echo site_url('pindahstok') ?>" class="btn btn-default"><i class="fa fa-reply-all"></i> Cancel</a>
	</div>
                        </div></form>
     </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Detail pindah stok</h2>
 
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
        <form method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
        <!-- <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">IdPindahStok <?php echo form_error('idPindahStok') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="idPindahStok" id="idPindahStok" placeholder="IdPindahStok" value="<?php echo $idPindahStok; ?>" />
                </div>
        </div> -->
<!--         <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Barang</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" id="idBarang">
                            <option>Cari Barang..</option>
                            <?php 
                            foreach ($barang as $b) {
            
                            echo '<option value="'.$b->iddetail.'">'.$b->barang.' | '.$b->size.' | '.$b->merek.' | '.$b->warna.' | '.$b->satuan.'</option>';

                            }

                             ?>

                          </select>
                        </div>
                      </div> -->

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Cari Barang </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input list="barang" class="form-control" name="idBarang" id="idBarang" placeholder="Ketik barang"  />
                </div>
        </div>


        <datalist id="barang">

        <?php 
        foreach ($barang as $b) {
            echo '<option value="'.$b->kodeBarang.'">';
        }
         ?>
        </datalist>


        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Jumlah <?php echo form_error('jumlah') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah"  />
                </div>
        </div><div class="ln_solid"></div>
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
        <button type="button" onclick="add()" class="btn btn-primary"><i class="fa fa-floppy-o"></i> ADD </button> 
    </div>
                        </div></form>

                      
     </div>
            </div>
        </div>


    </div>
</div>

<script type="text/javascript">
   
    function add() {
    var idbarang = $("#idBarang").val();
    var jumlah = $("#jumlah").val();
    var idCabang=$("#idCabang").val();

    $.ajax({
        url:"<?php echo base_url()?>index.php/pindahstok/add_stok",
        data:"idbarang="+idbarang+"&jumlah="+jumlah+"&idCabang="+idCabang,
        success: function (html) {
          
        load();

        }

    });
}

function load() {
    var idbarang = $("#idBarang").val();
    var jumlah = $("#jumlah").val();
    var idCabang=$("#idCabang").val();

 $.ajax({
    url:"<?php echo base_url()?>index.php/pindahstok/list",
    data:"idbarang="+idbarang+"&jumlah="+jumlah+"&idCabang="+idCabang,
    success:function (html) {
        $("#list").html(html);
    }
    
 });

}

function remove(id) {
    var idCabang=$("#idCabang").val();
$.ajax({
    url:"<?php echo base_url()?>index.php/pindahstok/remove",
    data:"id="+id+"&idCabang="+idCabang,
    success:function (html) {
     load();
    }
    
 });
    
}


</script>

<body onload="load()">