<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Admin</h2>
 
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
        <form action="<?php echo $action ?>" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar"><?php echo form_error('username') ?>Username </label> 
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username ?>" /> 
                </div>
        </div>
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar"><?php echo form_error('password') ?>Password </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password ?>" />
            <!-- <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required"> -->
                </div>
        </div>
<!--         <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Password </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
         <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">        </div>
        </div>
 -->        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar"><?php echo form_error('cabang') ?>Cabang <?php echo $idCabang ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <?php echo form_dropdown('idCabang', array(1=>'Cabang 1',2=>'Cabang 2'),array(2=>'Cabang 2'),'class = form-control') ?>
                </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar"><?php echo form_error('jabatan') ?>Jabatan </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <!-- <input type="text" class="form-control" name="password" id="password" placeholder="Password"  /> -->
                <?php echo form_dropdown('idJabatan', array('pemilik'=>'pemilik','karyawati'=>'karyawati'),array('karyawati'=>'karyawati'),'class = form-control') ?>
                </div>
        </div>

        



 <input type="hidden" name="id" value="<?php echo $id; ?>" /> 

        <div class="ln_solid"></div>
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
	      <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?php echo $button ?> </button> 
	    <a href="<?php echo site_url('admin') ?>" class="btn btn-default"><i class="fa fa-reply-all"></i> Cancel</a>
	</div>
                        </div></form>
     </div>
            </div>
        </div>
    </div>
</div>