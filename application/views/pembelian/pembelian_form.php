<div class="">
    <div class="clearfix"></div>
    <div class="row">

      <div id="list"></div>


      <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Pembelian<small>different form elements</small></h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form action="<?php echo $action; ?>" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
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
<!--                 <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">WajibMembayar <?php echo form_error('WajibMembayar') ?></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control" name="WajibMembayar" id="WajibMembayar" placeholder="WajibMembayar" value="<?php echo $WajibMembayar; ?>" />
                    </div>
                </div> -->
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
        <!-- <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">IdBarang <?php echo form_error('idBarang') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">


            <input list="barang" class="form-control" name="idBarang" id="idBarang" placeholder="IdBarang" />
                
                </div>
        </div>
    -->







    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Barang</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="select2_single form-control" tabindex="-1" id="idBarang">
            <option>Cari Barang..</option>
            <?php 
            foreach ($barang as $b) {

                echo '<option value="'.$b->iddetail.'">'.$b->barang.' | '.$b->merek.' | '.$b->size.' | '.$b->warna.' </option>';

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
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Potongan </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="potongan" id="potongan" placeholder="potongan"  />
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
        echo '<option value="'.$b->iddetail.'"> '.$b->merek.' | '.$b->warna.' | '.$b->size.' | '.$b->satuan.'';
    }

    ?>

</datalist>

<script type="text/javascript">

    function add(){
        var idBarang = $("#idBarang").val();
        var hargaBeliSatuan = $("#hargaBeliSatuan").val();
        var potongan = $("#potongan").val();
        var jumlahBeli = $("#jumlahBeli").val();
        $.ajax({
            url:"<?php echo base_url() ?>index.php/pembelian/add_barang",
            data:"potongan="+potongan+"&idBarang="+idBarang+"&hargaBeliSatuan="+hargaBeliSatuan+"&jumlahBeli="+jumlahBeli,
            success: function (html) {
    // alert(idBarang+hargaBeliSatuan+hargaBeliTiapPak+jumlahBeli);
            // body...
            // alert(idBarang);
            load();
        }
    })
    }

    function load(){
        var idBarang = $("#idBarang").val();
        var hargaBeliSatuan = $("#hargaBeliSatuan").val();
        // var hargaBeliTiapPak = $("#hargaBeliTiapPak").val();
        var jumlahBeli = $("#jumlahBeli").val();
        $.ajax({
            url:"<?php echo base_url() ?>index.php/pembelian/list_barang",
            data:"idBarang="+idBarang+"&hargaBeliSatuan="+hargaBeliSatuan+"&jumlahBeli="+jumlahBeli,
            success: function (html) {
    // alert(idBarang+hargaBeliSatuan+hargaBeliTiapPak+jumlahBeli);
            // body...
            $("#list").html(html);
        }
    })
    }

    function remove(id) {
    // var idBarang = $("#idBarang").val();
    $.ajax({
        url:"<?php echo base_url() ?>index.php/pembelian/remove_barang",
        data:"id="+id,
        success: function (html) {

            load();
        }
    })
    
}


</script>

<body onload="load()">