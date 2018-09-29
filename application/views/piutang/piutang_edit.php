<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Piutang<small>different form elements</small></h2>
 
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
        <form action="<?php echo $action; ?>" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
	<div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Pelanggan <?php echo form_error('idPenjualan') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input readonly="readonly" list="pelanggan" class="form-control" name="idPelanggan" id="idPelanggan" placeholder="Cari Pelanggan" value="<?php echo $idPelanggan ?>" />
                </div>
        </div>

        <datalist id="pelanggan">
        <?php 
        foreach ($pelanggan as $p) {
            echo '<option value="'.$p->nama.'">';
        }
         ?>
        </datalist>
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Tanggal Wajib Bayar <?php echo form_error('tanggalWajibBayar') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input readonly="readonly" type="date" class="form-control" name="tanggalWajibBayar" id="tanggalWajibBayar" placeholder="TanggalWajibBayar" value="<?php echo $tanggalWajibBayar; ?>" />
                </div>
        </div>
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Kekuragan Pembayaran <?php echo form_error('kekuraganPembayaran') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input readonly="readonly" type="text" class="form-control" name="kekuraganPembayaran" id="kekuraganPembayaran" placeholder="KekuraganPembayaran" value="<?php echo $kekuraganPembayaran; ?>" />
                </div>
        </div>
	  <div class="ln_solid"></div>
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <!-- <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>  -->
	    <a href="<?php echo site_url('piutang') ?>" class="btn btn-default"><i class="fa fa-reply-all"></i> Close</a>
	</div>
                        </div></form>
     </div>
            </div>
        </div>


         <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Detailpiutang</h2>
 
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
        <form  method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
        
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Bayar <?php echo form_error('jumlah') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="bayar" id="bayar" placeholder="Jumlah"  />
                </div>
        </div><div class="ln_solid"></div>
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <input type="hidden" id="idpiutang" value="<?php echo $this->uri->segment(3) ?>" /> 
        <button type="button" onclick="bayarr()" class="btn btn-primary"><i class="fa fa-floppy-o"></i> ADD</button> 
    </div>
                        </div></form>
                        <div id="list"></div>
     </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
function bayarr(){
    var bayar = $("#bayar").val();
    var idpiutang = $("#idpiutang").val();
    
 // alert('success');
    $.ajax({
        url:"<?php echo base_url() ?>index.php/piutang/bayar",
        data:"bayar="+bayar+"&idpiutang="+idpiutang,
        success: function (html) {
            // alert('sukses');
            load();
 
        }
    })
}

function load() {
    var kurangbayar=$("#kekuraganPembayaran").val();
    var idpiutang = $("#idpiutang").val();
    $.ajax({
        url:"<?php echo base_url()?>index.php/piutang/list",
        data:"idpiutang="+idpiutang+"&kurangbayar="+kurangbayar,
        success:function (html){
            $("#list").html(html);
        }
    })
}

function remove(id){
    
$.ajax({
        url:"<?php echo base_url() ?>index.php/piutang/remove",
        data:"id="+id,
        success: function() {
            load();
            // alert('berhasil hapus');
        }

    })

    }






</script>

<body onload="load()">
