<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Isisms<small>different form elements</small></h2>
 
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
        <form action="<?php echo $action; ?>" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
<!-- 	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="datetime">Tanggal <?php echo form_error('tanggal') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
                </div>
        </div> -->
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Nama <?php echo form_error('nama') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input list="user" type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                </div>
        </div>

        <datalist id="user">
<?php foreach ($user as $u): ?>
    <option value="<?php echo $u->nama ?>"></option>
<?php endforeach ?>

        </datalist>
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Tentang <?php echo form_error('tentang') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="tentang" id="tentang" placeholder="Tentang" value="<?php echo $tentang; ?>" />
                </div>
        </div>
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="isi">Isi <?php echo form_error('isi') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <textarea wrap="virtual" onkeyup="countit(this)" class="form-control" rows="3" name="isi" id="isi" placeholder="Isi"><?php echo $isi; ?></textarea>
                [1 sms max 120 karakter] <br>
                <input name="karakter" type="text" id="karakter" size="5" readonly="readonly">
                </div>


                <script type="text/javascript">
            function countit(what) {
                formcontent=what.form.isi.value 
                what.form.karakter.value=formcontent.length
            }
                </script>
        </div>
	    <div class="ln_solid"></div>
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('isisms') ?>" class="btn btn-default"><i class="fa fa-reply-all"></i> Cancel</a>
	</div>
                        </div></form>
     </div>
            </div>
        </div>
    </div>
</div>