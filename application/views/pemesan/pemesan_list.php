<div class="">
    <div class="clearfix"></div>

    <div class="row">


        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Pemesan<small>

		
        <?php echo anchor(site_url('pemesan/create'), '<i class="fa fa-files-o"></i> Create', 'class="btn btn-sm btn-primary"'); ?></small></h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    
        <table class="table table-bordered table-striped" id="datatable-buttonss">
            <thead>
                <tr>
                    <th width="10px">No</th>
		    <th>Tanggal Pesan</th>
		    <th>Tanggal Diambil</th>
		    <th>IdPelanggan</th>
		    <th>IdAdmin</th>
            <th>Keterangan</th>
            <th>Waktu di Perbarui</th>
            <th>Barang</th>
            <th>Ambil</th>
            <th>Tempat</th>
		    <!-- <th>Nama Admin</th> -->
		    <th width='103px'>Action</th>
                </tr>
            </thead> </tbody>
        </table>
                 </div>
            </div>
        </div>

       
            </div>
        </div>
    </div>
</div><script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
$(document).ready(function() {
    var t =$('#datatable-buttonss').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo base_url().'index.php/pemesan/data'?>"
    } );
    t.on( 'order.dt search.dt', function () {
                    t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                        cell.innerHTML = i+1;
                    } );
                } ).draw();
} );



function send(val) {
alert(val);
// $.ajax({
//     url:"<?php echo base_url()?>index.php/pemesan/remove_barang",
//     data:"id="+id,
//     success:function (html) {
//      load();
//         // body...
//     }
    
//  });
    
}


</script>