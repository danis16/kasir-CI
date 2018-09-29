<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Hutang</h2>
 
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
        <form action="<?php echo $action; ?>" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
<!-- 	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Cari Supplier <?php echo form_error('idPembelian') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input list="pelanggan" class="form-control" name="idSupplier" id="idSupplier" placeholder="Ketik Supplier" value="<?php echo $idSupplier; ?>" />
                </div>
        </div> -->

<!-- <datalist id="pelanggan">
<?php 
    foreach ($supplier as $p) {
        echo'<option value="'.$p->nama.'">';
    }

 ?>
</datalist>
 -->
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">TanggalWajibBayar <?php echo form_error('tanggalWajibBayar') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="date" class="form-control" name="tanggalWajibBayar" id="tanggalWajibBayar" placeholder="TanggalWajibBayar" value="<?php echo $tanggalWajibBayar; ?>" />
                </div>
        </div>  
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">KekuranganPembayaran <?php echo form_error('kekuranganPembayaran') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="kekuranganPembayaran" id="kekuranganPembayaran" placeholder="KekuranganPembayaran" value="<?php echo $kekuranganPembayaran; ?>" />
                </div>
        </div>
<div class="ln_solid"></div>
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('hutang') ?>" class="btn btn-default"><i class="fa fa-reply-all"></i>Close</a>
	</div>
                        </div></form>
     </div>
            </div>
        </div>


    </div>
</div>

