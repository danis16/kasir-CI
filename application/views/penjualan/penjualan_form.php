<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div id="listdetail"></div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title"> 
                    <h2>Penjualan<small>different form elements</small></h2>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form action="<?php echo $action; ?>" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                        <input type="hidden" id="idpenjualan" value="<?php echo $this->uri->segment(3) ?>">
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Tanggal <?php echo form_error('tanggal') ?></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input readonly="readonly" type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
                            </div>
                        </div>
<!--         <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Potongan <?php echo form_error('totalBayar') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="potongann" id="potongann" placeholder="potongann" value="<?php echo $totalBayar; ?>" />
                </div>
        </div>
    -->        <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="enum">Status <?php echo form_error('status') ?></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <?php echo form_dropdown('status',array('LUNAS'=>'LUNAS','BELUM LUNAS'=>'BELUM LUNAS'),$status,"class='form-control'"); ?>
    </div>
</div>


<div class="ln_solid"></div>
<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
        <a href="<?php echo site_url('penjualan') ?>" class="btn btn-default"><i class="fa fa-reply-all"></i> Cancel</a>
    </div>
</div></form>
</div>
</div>
</div>


<div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Detailpenjualan<small>different form elements</small></h2>
            
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

<!--         <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">IdBarang </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input list="barang" class="form-control" name="idBarang" id="idBarang" placeholder="IdBarang"  />
                </div>
            </div> -->

            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Barang</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input list="barang" type="text" class="form-control" name="idBarang" id="idBarang" placeholder="Cari Barang"  />
                    
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
         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">JumlahJual <?php echo form_error('jumlahJual') ?> </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="number" class="form-control" name="jumlahJual" id="jumlahJual" placeholder="JumlahJual"  />
            </div>
        </div>
<!--         <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">HargaJual</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="hargaJual" id="hargaJual" placeholder="HargaJual"  />
                </div>
            </div> -->
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Potongan </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" class="form-control" name="potongan" id="potongan" placeholder="potongan"  />
                </div>
            </div><div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                    <button type="button" onclick="add()" class="btn btn-primary"><i class="fa fa-floppy-o"></i> ADD</button> 
                    <a href="<?php echo site_url('detailpenjualan') ?>" class="btn btn-default"><i class="fa fa-reply-all"></i> Cancel</a>
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
    function add() {
        var idBarang = $("#idBarang").val();
        var jumlahJual = $("#jumlahJual").val();
    // var hargaJual = $("#hargaJual").val();
    var potongan = $("#potongan").val();

    $.ajax({
        url:"<?php echo base_url() ?>index.php/penjualan/add_barang",
        data:"idpenjualan="+idpenjualan+"&idBarang="+idBarang+"&jumlahJual="+jumlahJual+"&potongan="+potongan,
        

        success: function() {
           load();
           // alert('');
       }

   })
        // body...
    }

    function load() {

        var idBarang = $("#idBarang").val();
        var jumlahJual = $("#jumlahJual").val();
        var hargaJual = $("#hargaJual").val();
        var subTotal = $("#subTotal").val();

        $.ajax({
            url:"<?php echo base_url()?>/index.php/penjualan/list_barang",
            data:"idBarang="+idBarang+"&jumlahJual="+jumlahJual+"&hargaJual="+hargaJual+"&subTotal="+subTotal,
            success: function(html) {
               $("#listdetail").html(html);
           // alert('sukses');
       }

   })
    }

    function remove(id) {
    // var idBarang = $("#idBarang").val();
    $.ajax({
        url:"<?php echo base_url() ?>index.php/penjualan/remove_barang",
        data:"id="+id,
        success: function (html) {

            load();
        }
    })
    
}


</script>

<body onload="load()">