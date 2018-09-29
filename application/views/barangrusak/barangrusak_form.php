<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Barangrusak<small>different form elements</small></h2>
 
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
        <form class="form-horizontal form-label-left">
            
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="enum">Nomor Nota </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input value="<?php echo $notatampil ?>" list="nota_list" type="text" class="form-control" name="nota_barang" id="nota" placeholder="nomor Nota"  />
                <button class="btn btn-primary">KLIK</button>
                </div>
        </div>

            
        </form>
        <form action="<?php echo $action; ?>" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
        <!-- <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Tanggal <?php echo form_error('tanggal') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
                </div>
        </div> -->

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Kode barang </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input list="kode" type="text" class="form-control" name="idDetailBarang" id="idDetailBarang" placeholder="ketik kode barang" value="<?php echo $idDetailBarang; ?>" />
            <input value="<?php echo $notatampil ?>" type="hidden" name="nota" id="nota" placeholder="nomor Nota"  />
                </div>
        </div>

        <datalist id="kode">
        <?php 
        foreach ($kode as $k) {
            echo '<option value="'.$k->kodeBarang.'">';
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
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="enum">Penyebab <?php echo form_error('penyebab') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                <?php echo form_dropdown('penyebab',array('supplier'=>'supplier','debu'=>'debu','jatuh'=>'jatuh','lama'=>'lama','lain-lain'=>'lain-lain'),array('debu'=>'debu'),'class="form-control"'); ?>
            <!-- <input type="text" class="form-control" name="penyebab" id="penyebab" placeholder="Penyebab" value="<?php echo $penyebab; ?>" /> -->
                </div>
        </div>



<datalist id="nota_list">
<?php foreach ($nota as $n) {
    echo '<option value="'.$n->nota.'">';
} ?>
</datalist>    

        <div class="ln_solid"></div>
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('barangrusak') ?>" class="btn btn-default"><i class="fa fa-reply-all"></i> Cancel</a>
	</div>
                        </div></form>
     </div>
            </div>
        </div>
    </div>
</div>