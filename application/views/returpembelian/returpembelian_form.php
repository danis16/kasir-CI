<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div id="list_detailretur"></div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Retur Pembelian</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">IdPembelian <?php echo form_error('idPembelian') ?></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <!-- <input list="nota" onchange="barang(this.value)" class="form-control" name="idPembelian" id="idPembelian" placeholder="Ketik nomor nota" value="<?php echo $idPembelian; ?>" /> -->
                                <input list="nota" class="form-control" name="nota" id="idPembelian" placeholder="Ketik nomor nota" value="<?php echo $nomornota ?>" />
                                <button class="btn btn-primary">KLIK</button>
                                <!-- <a href="<?php echo base_url()?>index.php/returpembelian/create?nota=" onclick="barang(val)">Klik</a> -->
                            </div>

                        </div>
                    </form>
                    <form action="<?php echo $action; ?>" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Tanggal <?php echo form_error('tanggal') ?></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" class="form-control" name="idPembelian" value="<?php echo $nomornota ?>" />
                                <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
                            </div>
                        </div>
      <!--   <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">IdAdmin <?php echo form_error('idAdmin') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="idAdmin" id="idAdmin" placeholder="IdAdmin" value="<?php echo $idAdmin; ?>" />
                </div>
            </div> --><div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                   <input type="hidden" name="idRetur" value="<?php echo $idRetur; ?>" /> 
                   <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
                   <a href="<?php echo site_url('returpembelian') ?>" class="btn btn-default"><i class="fa fa-reply-all"></i> Cancel</a>
               </div>
           </div></form>
       </div>
   </div>
</div>


<div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Detail retur pembelian</h2>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form action="<?php echo $action; ?>" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
        <!-- <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">IdReturpembelian <?php echo form_error('idReturpembelian') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="idReturpembelian" id="idReturpembelian" placeholder="IdReturpembelian" value="<?php echo $idReturpembelian; ?>" />
                </div>
            </div> -->
      <!--   <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">IdDetailBarang <?php echo form_error('idDetailBarang') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="idDetailBarang" id="idDetailBarang" placeholder="IdDetailBarang"  />
                </div>
            </div> -->

            <div class="form-group">
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
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Jumlah <?php echo form_error('jumlah') ?></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah"  />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="enum">Kondisi <?php echo form_error('kondisi') ?></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?php echo form_dropdown('kondisi',array('BAIK'=>'BAIK','RUSAK'=>'RUSAK'),$kondisi,"class='form-control' id='kondisi'"); ?>

                <!-- <input type="text" class="form-control" name="kondisi" id="kondisi" placeholder="Kondisi"  /> -->
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alasan">Alasan <?php echo form_error('alasan') ?></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea class="form-control" rows="3" name="alasan" id="alasan" placeholder="Alasan"></textarea>
            </div>
        </div><div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <!-- <input type="hidden" name="id" value="<?php echo $id; ?>" />  -->
                <button type="button" onclick="add()" class="btn btn-primary"><i class="fa fa-floppy-o"></i> ADD </button> 
                <!-- <a href="<?php echo site_url('detailreturpembelian') ?>" class="btn btn-default"><i class="fa fa-reply-all"></i> Cancel</a> -->
            </div>
        </div></form>
    </div>
</div>
</div>


</div>
</div>

<datalist id="nota">

    <?php 
    foreach ($nota as $n) {
        echo '<option value="'.$n->noNota.'">';
    }
    ?>

</datalist>

<script type="text/javascript">

    function add() {
        var idBarang = $("#idBarang").val();
        var jumlah = $("#jumlah").val();
        var kondisi = $("#kondisi").val();
        var alasan = $("#alasan").val();

        $.ajax({
            url:'<?php echo base_url()?>index.php/returpembelian/add_detailretur',
            data: 'idBarang='+idBarang+'&jumlah='+jumlah+'&kondisi='+kondisi+'&alasan='+alasan,
            success: function(){
                load();
            }
        })
    }





    function load() {
        var idBarang=$("#idBarang").val();
        $.ajax({
            url:"<?php echo base_url()?>index.php/returpembelian/list_detailretur",
            data:"idBarang="+idBarang,
            success: function(html){
                $("#list_detailretur").html(html);
            }
        })

    // body...
}

function remove(id){
    // var idBarang = $("#idBarang").val();
    $.ajax({
        url:"<?php echo base_url()?>index.php/returpembelian/remove",
        data:"id="+id,
        success:function(html){
            load();
        }
    })

}


</script>
<body onload="load()">