<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Hutang</h2>
 
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
        <form action="<?php echo $action; ?>" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Cari Pelanggan <?php echo form_error('idPembelian') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input readonly="readonly" list="pelanggan" class="form-control" name="idSupplier" id="idSupplier" placeholder="Ketik Supplier" value="<?php echo $idSupplier; ?>" />
                </div>
        </div>

<datalist id="pelanggan">
<?php 
    foreach ($supplier as $p) {
        echo'<option value="'.$p->nama.'">';
    }

 ?>
</datalist>

	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Tanggal Wajib Bayar <?php echo form_error('tanggalWajibBayar') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="date" readonly="readonly" class="form-control" name="tanggalWajibBayar" id="tanggalWajibBayar" placeholder="TanggalWajibBayar" value="<?php echo $tanggalWajibBayar; ?>" />
                </div>
        </div>  
	    <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Kekurangan Pembayaran <?php echo form_error('kekuranganPembayaran') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input readonly="readonly" type="text" class="form-control" name="kekuranganPembayaran" id="kekuranganPembayaran" placeholder="KekuranganPembayaran" value="<?php echo $kekuranganPembayaran; ?>" />
                </div>
        </div>
	<div class="ln_solid"></div>
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <a href="<?php echo site_url('hutang') ?>" class="btn btn-default"><i class="fa fa-reply-all"></i>Close</a>
	</div>
                        </div></form>
     </div>
            </div>
        </div>

    <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Detailhutang</h2>
 
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
        <form method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
      <!--   <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">IdHutang <?php echo form_error('idHutang') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="idHutang" id="idHutang" placeholder="IdHutang" value="<?php echo $idHutang; ?>" />
                </div>
        </div> -->
<!--         <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Tanggal <?php echo form_error('tanggal') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
                </div>
        </div> -->
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Bayar <?php echo form_error('bayar') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="bayar" id="bayar" placeholder="Bayar"  />
                </div>
        </div><div class="ln_solid"></div>
                        <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <input type="hidden" id="idhutang" value="<?php echo $this->uri->segment(3) ?>" /> 
        <button type="button" class="btn btn-primary" onclick="bayarr()"> ADD </button> 

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
    var idhutang = $("#idhutang").val();
    
 // alert('success');
    $.ajax({
        url:"<?php echo base_url() ?>index.php/Hutang/bayar",
        data:"bayar="+bayar+"&idhutang="+idhutang,
        success: function (html) {
            // alert('sukses');
            load();
 
        }
    })
}

function load() {
    var kurangbayar=$("#kekuranganPembayaran").val();
    var idhutang = $("#idhutang").val();
    $.ajax({
        url:"<?php echo base_url()?>index.php/hutang/list",
        data:"idhutang="+idhutang+"&kurangbayar="+kurangbayar,
        success:function (html){
            $("#list").html(html);
        }
    })
}

function remove(id){
    
$.ajax({
        url:"<?php echo base_url() ?>index.php/hutang/remove",
        data:"id="+id,
        success: function() {
            load();
            // alert('berhasil hapus');
        }

    })

    }






</script>

<body onload="load()">