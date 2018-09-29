<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Detailreturpembelian<small>different form elements</small></h2>
 
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
        <form action="<?php echo $action; ?>" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">IdReturpembelian <?php echo form_error('idReturpembelian') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="idReturpembelian" id="idReturpembelian" placeholder="IdReturpembelian" value="<?php echo $idReturpembelian; ?>" />
                </div>
        </div>
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">IdDetailBarang <?php echo form_error('idDetailBarang') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="idDetailBarang" id="idDetailBarang" placeholder="IdDetailBarang" value="<?php echo $idDetailBarang; ?>" />
                </div>
        </div>
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Jumlah <?php echo form_error('jumlah') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" />
                </div>
        </div>
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="enum">Kondisi <?php echo form_error('kondisi') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="kondisi" id="kondisi" placeholder="Kondisi" value="<?php echo $kondisi; ?>" />
                </div>
        </div>
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alasan">Alasan <?php echo form_error('alasan') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <textarea class="form-control" rows="3" name="alasan" id="alasan" placeholder="Alasan"><?php echo $alasan; ?></textarea>
                </div>
        </div><div class="ln_solid"></div>
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('detailreturpembelian') ?>" class="btn btn-default"><i class="fa fa-reply-all"></i> Cancel</a>
	</div>
                        </div></form>
     </div>
            </div>
        </div>
    </div>
</div>