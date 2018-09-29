<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Detailpiutang<small>different form elements</small></h2>
 
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
        <form action="<?php echo $action; ?>" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">IdPiutang <?php echo form_error('idPiutang') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="idPiutang" id="idPiutang" placeholder="IdPiutang" value="<?php echo $idPiutang; ?>" />
                </div>
        </div>
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">IdAdmin <?php echo form_error('idAdmin') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="idAdmin" id="idAdmin" placeholder="IdAdmin" value="<?php echo $idAdmin; ?>" />
                </div>
        </div>
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Date <?php echo form_error('date') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="date" id="date" placeholder="Date" value="<?php echo $date; ?>" />
                </div>
        </div>
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Jumlah <?php echo form_error('jumlah') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" />
                </div>
        </div><div class="ln_solid"></div>
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('detailpiutang') ?>" class="btn btn-default"><i class="fa fa-reply-all"></i> Cancel</a>
	</div>
                        </div></form>
     </div>
            </div>
        </div>
    </div>
</div>