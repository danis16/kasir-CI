<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div id="list_detailretur"></div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Returpenjualan<small>different form elements</small></h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left">
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">IdPenjualan <?php echo form_error('idPenjualan') ?></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input list="idpenjualan" class="form-control" name="idPenjualan" id="idPenjualan" placeholder="IdPenjualan" value="<?php echo $dataidpenjualan; ?>" />
                            <button class="btn btn-primary">KLIK</button>
                        </div>
                    </div>
                    <datalist id="idpenjualan">
                        <?php 
                        foreach ($idpenjualan as $p) {
                            echo '<option value="'.$p->id.'">';
                        }
                        ?>
                    </datalist>
                </form>
                <form action="<?php echo $action; ?>" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Tangal <?php echo form_error('tangal') ?></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" class="form-control" name="tangal" id="tangal" placeholder="Tangal" value="<?php echo $tangal; ?>" />
                        <input type="hidden" class="form-control" name="idPenjualan" id="idPenjualan" placeholder="IdPenjualan" value="<?php echo $dataidpenjualan; ?>" />
                            
                        </div>
                    </div>
	   <!--  <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">IdAdmin <?php echo form_error('idAdmin') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="idAdmin" id="idAdmin" placeholder="IdAdmin" value="<?php echo $idAdmin; ?>" />
                </div>
            </div> --><div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                 <input type="hidden" name="idRetur" value="<?php echo $idRetur; ?>" /> 
                 <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
                 <a href="<?php echo site_url('returpenjualan') ?>" class="btn btn-default"><i class="fa fa-reply-all"></i> Cancel</a>
             </div>
         </div></form>
     </div>
 </div>
</div>



<div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Detailreturpenjualan<small>different form elements</small></h2>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form action="<?php echo $action; ?>" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
      <!--   <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">IdRetur <?php echo form_error('idRetur') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="idRetur" id="idRetur" placeholder="IdRetur" value="<?php echo $idRetur; ?>" />
                </div>
            </div> -->
       <!--  <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">IdDetailBarang <?php echo form_error('idDetailBarang') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                </div>
            </div> -->

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Barang</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input list="databarang" type="text" class="form-control" name="idBarang" id="idBarang" placeholder="IdDetailBarang"  />
                  
            </div>
        </div>

        <datalist id="databarang">
        <?php foreach ($barang as $b): ?>
            <option value="<?php echo $b->kodeBarang ?>">
        <?php endforeach ?>
        </datalist> 

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Jumlah <?php echo form_error('jumlah') ?></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah"  />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="enum">Kondisi <?php echo form_error('kondisi') ?></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?php echo form_dropdown('kondisi',array('BAIK'=>'BAIK','RUSAK'=>'RUSAK'),$kondisi,"class='form-control' id='kondisi' "); ?>

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
                <button type="button" class="btn btn-primary" onclick="add()" ><i class="fa fa-floppy-o"></i> ADD</button> 
            </div>
        </div></form>
    </div>
</div>
</div>


</div>
</div>

<script type="text/javascript">
    function add() {
        var idBarang = $("#idBarang").val();
        var jumlah = $("#jumlah").val();
        var kondisi = $("#kondisi").val();
        var alasan = $("#alasan").val();

        $.ajax({
            url:'<?php echo base_url()?>index.php/returpenjualan/add_detailretur',
            data: 'idBarang='+idBarang+'&jumlah='+jumlah+'&kondisi='+kondisi+'&alasan='+alasan,
            success: function(){
                load();
            }
        })
    }

    function load() {
        var idBarang=$("#idBarang").val();
        $.ajax({
            url:"<?php echo base_url()?>index.php/returpenjualan/list_detailretur",
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
        url:"<?php echo base_url()?>index.php/returpenjualan/remove",
        data:"id="+id,
        success:function(html){
            load();
        }
    })

}


</script>
<body onload="load()">