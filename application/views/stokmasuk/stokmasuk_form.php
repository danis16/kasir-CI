<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Update Stok</h2>
 
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
        <form action="<?php echo $action; ?>" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
	<!--     <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Tanggal <?php echo form_error('tanggal') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
                </div>
        </div> -->
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Kode Barang <?php echo form_error('idDetalBarang') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input list="kodeBarang" type="text" class="form-control" name="idDetalBarang" id="idDetalBarang" placeholder="Cari kode barang" value="<?php echo $idDetalBarang; ?>" />
                </div>
        </div>

        <datalist id="kodeBarang">
        <?php 
        foreach ($barang as $b) {
            echo '<option value="'.$b->kodeBarang.'">';
        }
         ?>

        </datalist>
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Jumlah <?php echo form_error('jumlah') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" />
                </div>
        </div>
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keterangan">Keterangan <?php echo form_error('keterangan') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
                </div>
        </div>
<!-- 	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">IdAdmin <?php echo form_error('idAdmin') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="idAdmin" id="idAdmin" placeholder="IdAdmin" value="<?php echo $idAdmin; ?>" />
                </div>
        </div> -->
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="enum">Status <?php echo form_error('status') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <!-- <input  class="form-control" name="status" id="status" placeholder="Status" value="MASUK" /> -->
                
            <?php echo form_dropdown('status', array('MASUK'=>'MASUK','KELUAR'=>'KELUAR'),array('MASUK'=>'MASUK'),'class="form-control"') ?>
                </div>
        </div>

        <div class="ln_solid"></div>
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('stokmasuk') ?>" class="btn btn-default"><i class="fa fa-reply-all"></i> Cancel</a>
	</div>
                        </div></form>
     </div>
            </div>
        </div>
    </div>
</div>