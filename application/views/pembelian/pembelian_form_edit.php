<div class="">
    <div class="clearfix"></div>
    <div class="row">

                      <div id="list">
    
                      </div>


        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Pembelian</h2>
 
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
        <form action="<?php echo $action; ?>" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
        <input type="hidden" name="idpembelian" id="idpembelian" value="<?php print_r($this->uri->segment(3)) ?>" />
     

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">NoNota <?php echo form_error('noNota') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="noNota" id="noNota" placeholder="NoNota" value="<?php echo $noNota; ?>" />
                </div>
        </div>
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Tanggal <?php echo form_error('tanggal') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
                </div>
        </div>
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Idsupplier <?php echo form_error('idsupplier') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input list="supplier" class="form-control" name="idsupplier" id="idsupplier" placeholder="Idsupplier" value="<?php echo $idsupplier; ?>" />
                </div>
        </div>
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">WajibMembayar <?php echo form_error('WajibMembayar') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="WajibMembayar" id="WajibMembayar" placeholder="WajibMembayar" value="<?php echo $WajibMembayar; ?>" />
                </div>
        </div>
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="enum">Status <?php echo form_error('status') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            
<?php echo form_dropdown('status',array('LUNAS'=>'LUNAS','BELUM LUNAS'=>'BELUM LUNAS'),$status,"class='form-control'"); ?>

    
            <!-- <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /> -->
                </div>
        </div>





        <div class="ln_solid"></div>
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('pembelian') ?>" class="btn btn-default"><i class="fa fa-reply-all"></i> Cancel</a>
	</div>
                        </div></form>
     </div>
            </div>
        </div>

<datalist id="supplier">
<?php 

foreach ($supplier as $s) {
    echo '<option value="'.$s->nama.'">';
}
 ?>

</datalist>



        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Detailpembelian<small>different form elements</small></h2>
 
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
        <form method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
        
     
             <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Cari Barang</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" id="idBarang">
                            <option>Cari Barang..</option>
                            <?php 
                            foreach ($barang as $b) {
            
                            echo '<option value="'.$b->iddetail.'">'.$b->barang.' | '.$b->size.' | '.$b->merek.' | '.$b->warna.' | '.$b->satuan.'</osption>';

                            }

                             ?>

                          </select>
                        </div>
                      </div>
      
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">HargaBeliSatuan <?php echo form_error('hargaBeliSatuan') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="hargaBeliSatuan" id="hargaBeliSatuan" placeholder="HargaBeliSatuan" />
                </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">HargaBeliTiapPak <?php echo form_error('hargaBeliTiapPak') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="hargaBeliTiapPak" id="hargaBeliTiapPak" placeholder="HargaBeliTiapPak"  />
                </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Jumlah Barang Yang Dibeli <?php echo form_error('jumlahBeli') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="jumlahBeli" id="jumlahBeli" placeholder="JumlahBeli"  />
                </div>
        </div>
        <br>
        <div class="form-group">

        </div>
     <div class="ln_solid"></div>
                       <div class="form-group">
       <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button onclick="add()" type="button" class="btn btn-primary">ADD</button>
            </div>
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
    }

 ?>

</datalist>

<script type="text/javascript">
    
function add(){
    var idBarang = $("#idBarang").val();
    var hargaBeliSatuan = $("#hargaBeliSatuan").val();
    var hargaBeliTiapPak = $("#hargaBeliTiapPak").val();
    var jumlahBeli = $("#jumlahBeli").val();
    var idpembelian = $("#idpembelian").val();
    
    $.ajax({
        url:"<?php echo base_url() ?>index.php/pembelian/add_barang_detail",
        data:"idpembelian="+idpembelian+"&idBarang="+idBarang+"&hargaBeliSatuan="+hargaBeliSatuan+"&hargaBeliTiapPak="+hargaBeliTiapPak+"&jumlahBeli="+jumlahBeli,
        success: function (html) {
    // alert(idBarang+hargaBeliSatuan+hargaBeliTiapPak+jumlahBeli);
            // body...
            // alert(idpembelian);
            load();
        }
    })
}

function load(){
    var idBarang = $("#idBarang").val();
    var hargaBeliSatuan = $("#hargaBeliSatuan").val();
    var hargaBeliTiapPak = $("#hargaBeliTiapPak").val();
    var jumlahBeli = $("#jumlahBeli").val();
    var idpembelian = $("#idpembelian").val();
    $.ajax({
        url:"<?php echo base_url() ?>index.php/pembelian/list_barang_ubah",
        data:"idpembelian="+idpembelian+"&idBarang="+idBarang+"&hargaBeliSatuan="+hargaBeliSatuan+"&hargaBeliTiapPak="+hargaBeliTiapPak+"&jumlahBeli="+jumlahBeli,
        success: function (html) {
    // alert(idBarang+hargaBeliSatuan+hargaBeliTiapPak+jumlahBeli);
            // body...
            $("#list").html(html);
        }
    })
}

function remove(id) {
    var idBarang = $("#idBarang").val();
        $.ajax({
        url:"<?php echo base_url() ?>index.php/pembelian/remove_barang_detail",
        data:"id="+id,
        success: function (html) {
    // alert(idBarang+hargaBeliSatuan+hargaBeliTiapPak+jumlahBeli);
            // body...
            // $("#list").html(html);
            load();
        }
    })
    
}


</script>

<body onload="load()">