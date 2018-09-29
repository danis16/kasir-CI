<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div id="list"></div>

        <div class="col-md-7 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Barang<small>different form elements</small></h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form action="<?php echo $action; ?>" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" enctype="multipart/form-data">


                       <!--  <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Kode <?php echo form_error('kode') ?></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" name="kode" id="kode" placeholder="kode" value="<?php echo $kode; ?>" />
                            </div>
                        </div>
                    -->
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Barang <?php echo form_error('barang') ?></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input list="list_barang" type="text" class="form-control" name="barang" id="barang" placeholder="Barang" value="<?php echo $barang; ?>" />
                        </div>
                    </div>

                    <datalist id="list_barang">
                        <?php 
                        foreach ($jenisbarang as $b) {
                            echo '<option value="'.$b->Barang.'">';
                        }
                        ?>

                    </datalist>

                   <!--  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">IdKategori <?php echo form_error('idKategori') ?></label>
                        Small modal
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input list="kategori_list" class="form-control" name="idKategori" id="idKategori" placeholder="IdKategori" value="<?php echo $idKategori; ?>" />
                        </div>

                    </div> -->
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int" onclick="formMerek()">Merek <?php echo form_error('idMerek') ?></label>
<!-- 
    <button onclick="formMerek()" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Tambah Merek</button>

                  <div id="modalMerek" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" >
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Masukan Merek baru :</h4>
                        </div>
                        <div class="modal-body">
                        
                           <input type="text" class="form-control" name="merek" id="merek" placeholder="Merek" />
                        
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="addMerek()">Save</button>
                        
                        </div>

                      </div>
                    </div>
                  </div>
              -->

              <div class="col-md-6 col-sm-6 col-xs-12">

                <input list="merek_list" class="form-control" name="idMerek" id="merek" placeholder="Merek" value="<?php echo $idMerek; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="enum">Status <?php echo form_error('status') ?></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?php echo form_dropdown('status',array('DIJUAL'=>'DIJUAL','TIDAK DIJUAL'=>'TIDAK DIJUAL'),$status,"class='form-control'"); ?>

                <!-- <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /> -->
                
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keterangan">Keterangan <?php echo form_error('keterangan') ?></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"></textarea>
            </div>
        </div>





        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
             <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
             <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
             <a href="<?php echo site_url('barang') ?>" class="btn btn-default"><i class="fa fa-reply-all"></i> Cancel</a>
         </div>
     </div></form>
 </div>
</div>
</div>

<script type="text/javascript">
 function addKategori() {
    var kategori = $("#kategori").val();
    
    $.ajax({
        url:"<?php echo base_url() ?>index.php/kategori/add_kategori",
        data:"kategori="+kategori,
        success: function (html) {
          alert('sukses');
      }
  })

}

function addMerek() {
    var merek = $("#merek").val();
    
    $.ajax({
        url:"<?php echo base_url() ?>index.php/merek/add_merek",
        data:"merek="+merek,
        success: function (html) {
            alert('sukses');
            
        }
    })
        // body...
    }



    function formKategori() {
// percobaan ke 1
        // $("#modalKategori").modal('hide');
        // $("#modalMerek").modal('show');

// percobaan ke 2
        // $('#modalMerek').on('hide.bs.modal', function (e) {
        //     $("#modalKategori").modal('show');            
        // })

// percobaan ke 3

$('#modalMerek').on('hide.bs.modal', function (e) {
    $("#modalKategori").modal('show');            
})

}



function formMerek() {
    $("#modalMerek").modal('hide');
    $("#modalKategori").modal('show');
}


</script>

<datalist id="kategori_list">
    <?php 
    foreach ($kategori as $k) {
        echo '<option value="'.strtoupper($k->kategori).'">';
    }

    ?>
</datalist>

<datalist id="merek_list">
    <?php 
    foreach ($Merek as $m) {
        echo '<option value="'.strtoupper($m->merek).'">';
    }

    ?>
</datalist>

<datalist id="warna">
    <?php 
    foreach ($warna as $w) {
        echo '<option value="'.$w->warna.'">';
    }
    ?>

</datalist>

<datalist id="size">
    <?php 
    foreach ($size as $w) {
        echo '<option value="'.$w->size.'">';
    }
    ?>

</datalist>




<div class="col-md-5 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Detailbarang<small>different form elements</small></h2>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form action="<?php echo $action; ?>" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Warna <?php echo form_error('idWarna') ?></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input list="warna" class="form-control" name="idWarna" id="idWarna" placeholder="Cari warna"  />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Size <?php echo form_error('idUkuran') ?></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input list="size" class="form-control" name="idUkuran" id="idUkuran" placeholder="Cari Ukuran"  />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Harga Jual<?php echo form_error('harga') ?></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control" name="harga" id="harga" placeholder="harga"  />
                    </div>
                </div>
<!--         <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Kode Barang <?php echo form_error('kodebarang') ?></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="kodeBarang" id="kodeBarang" placeholder="kode barang"  />
                </div>
            </div> -->

            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 

                    <button onclick="add()" type="button" class="btn btn-primary">ADD</button>
                    <a href="<?php echo site_url('detailbarang') ?>" class="btn btn-default"><i class="fa fa-reply-all"></i> Cancel</a>
                </div>
            </div>

        </form>
    </div>
</div>
</div>



</div>
</div>

<script type="text/javascript">


    function add() {
        var idWarna = $("#idWarna").val();
        var idUkuran = $("#idUkuran").val();
        var barang = $("#barang").val();
        var harga = $("#harga").val();
        var merek = $("#merek").val();


        $.ajax({
            url:"<?php echo base_url() ?>index.php/barang/add_barang",
            data:"harga="+harga+"&merek="+merek+"&idWarna="+idWarna+"&idUkuran="+idUkuran+"&barang="+barang,
            success: function (html) {
           // $("#list").html(html);
           // alert('sukses');
           load();
       }
   })
//     var idWarna = $("#idWarna").val();
//     var idUkuran = $("#idUkuran").val();
//     var kodeBarang = $("#kodeBarang").val();
//     var harga = $("#harga").val();

// // alert('sukses');    
//     $.ajax({
//         url:"<?php echo base_url()?>index.php/barang/add_barang",
//         data:"harga="+harga+"&idWarna="+idWarna+"&idUkuran="+idUkuran+"&kodeBarang="+kodeBarang,
//         success: function (html) {
//             // load();
//             alert('sukses');

    //     }
    // })

}
function load () {

    var idWarna = $("#idWarna").val();
    var idUkuran = $("#idUkuran").val();
    
    $.ajax({
        url:"<?php echo base_url() ?>index.php/barang/list_barang",
        data:"idWarna="+idWarna+"&idUkuran="+idUkuran,
        success: function (html) {
           $("#list").html(html);
       }
   })
        // body...
    }
    function remove (id) {
        var iddetail = $("#iddetail").val();

        $.ajax({
            url:"<?php echo base_url() ?>index.php/barang/remove_barang",
            data:"id="+id,
            success: function (html) {
            // alert(id);
            $("#list").html(html);
            load();
        }
    })

    }




</script>
<body onload="load()">