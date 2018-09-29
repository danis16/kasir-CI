<div class="">
    <div class="clearfix"></div>
    <div class="row">
<div id="list"></div>

        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Barang</h2>
 
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
        <form enctype="multipart/form-data" action="<?php echo $action; ?>" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
	  <input type="hidden" name="idbarang" id="idbarang" value="<?php print_r($this->uri->segment(3)) ?>" />
     
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Barang <?php echo form_error('barang') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="barang" id="barang" placeholder="Barang" value="<?php echo $barang; ?>" />
                </div>
        </div>

	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">IdKategori <?php echo form_error('idKategori') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                
            <input list="kategori" class="form-control" name="idKategori" id="idKategori" placeholder="IdKategori" value="<?php echo $idKategori; ?>" />
                </div>
        </div>
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">IdMerek <?php echo form_error('idMerek') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
               
            <input list="merek" class="form-control" name="idMerek" id="idMerek" placeholder="IdMerek" value="<?php echo $idMerek; ?>" />
                </div>
        </div>
	   
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="enum">Status <?php echo form_error('status') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
    <?php echo form_dropdown('status',array('DIJUAL'=>'DIJUAL','TIDAK DIJUAL'=>'TIDAK DIJUAL'),$status,"class='form-control'"); ?>

            <!-- <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /> -->
                
                </div>
        </div>


    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keterangan">Keterangan <?php echo form_error('keterangan') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan ?></textarea>
                </div>
        </div>



        <div class="ln_solid"></div>
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <input type="hidden" name="idd" value="<?php echo $this->uri->segment(3); ?>" /> 
	    <button type="submit" class="btn btn-primary" onclick="id()"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('barang') ?>" class="btn btn-default"><i class="fa fa-reply-all"></i> Cancel</a>
	</div>
                        </div></form>
     </div>
            </div>
        </div>

<script type="text/javascript">
       function id() {
    var id = $("#idd").val();
    
    $.ajax({
        data:"id="+id,
       
    })
        } 


</script>
<datalist id="kategori">
<?php 
    foreach ($kategori as $k) {
        echo '<option value="'.$k->kategori.'">';
    }

 ?>
</datalist>

<datalist id="merek">
<?php 
    foreach ($Merek as $m) {
        echo '<option value="'.$m->merek.'">';
    }

 ?>
</datalist>

<datalist id="warna">
    <?php 
    foreach ($warna as $w) {
        echo '<option value="'.$w->warna.'">';
    }
     ?>

</datalist>

<datalist id="size">
    <?php 
    foreach ($size as $w) {
        echo '<option value="'.$w->size.'">';
    }
     ?>

</datalist>


                <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Detailbarang</h2>
 
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
        <form action="<?php echo $action; ?>" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
     
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Warna <?php echo form_error('idWarna') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input list="warna" class="form-control" name="idWarna" id="idWarna" placeholder="IdWarna"  />
                </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Size <?php echo form_error('idUkuran') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input list="size" class="form-control" name="idUkuran" id="idUkuran" placeholder="IdUkuran"  />
                </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Harga <?php echo form_error('hargaEcer') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga"  />
                </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Kode Barang <?php echo form_error('hargaEcer') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="kodeBarang" id="kodeBarang" placeholder="kode barang"  />
                </div>
        </div>



    <div class="ln_solid"></div>
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <!-- <input type="hidden" name="idd" value="<?php echo $idd; ?>" />  -->
        <button onclick="load()" type="button" class="btn btn-primary">ADD</button>

    </div>
                        </div>

                        </form>
     </div>
            </div>
        </div>



    </div>
</div>

<script type="text/javascript">
    function add() {
    var idBarang = $("#idbarang").val();
    var idWarna = $("#idWarna").val();
    var idUkuran = $("#idUkuran").val();
    var hargaEcer = $("#harga").val();
    var kodeBarang =$("#kodeBarang").val();
    
    $.ajax({
        url:"<?php echo base_url() ?>index.php/barang/add_barang_ubah",
        data:"idBarang="+idBarang+"&idWarna="+idWarna+"&idUkuran="+idUkuran+"&hargaEcer"=hargaEcer,
        success: function (html) {
            load();
            // alert(idSatuan);

        }
    })
        // body...
    }

 function load() {
    alert('sik');
    }

    function load_ori() {
    var idWarna = $("#idWarna").val();
    var idUkuran = $("#idUkuran").val();
    var idBarang = $("#idbarang").val();

    $.ajax({
        url:"<?php echo base_url() ?>index.php/barang/list_barang_ubah",
        data:"idBarang="+idBarang+"&idWarna="+idWarna+"&idUkuran="+idUkuran,
        success: function (html) {
            // alert(idBarang);
           $("#list").html(html);
        }
    })

        // body...
    }
    function remove (id) {
    // var idWarna = $("#idWarna").val();
    var iddetail = $("#iddetail").val();
    
    $.ajax({
        url:"<?php echo base_url() ?>index.php/barang/remove_barang_ubah",
        data:"id="+id,
        success: function (html) {
           // $("#list").html(html);
           // load();
           // alert(iddetail+"        "+id);
        }
    })

    }


</script>
<body onload="load()">