<div class="">
    <div class="clearfix"></div>

    <div class="row">


        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Detail Barang <h2>
                    <h2></h2>
                    </a><div class="clearfix"></div>
                </div>
                    <a href="<?php echo base_url()?>index.php/detailbarang/cetak"><button class="btn btn-primary"> DAFTAR HARGA </button>
                <div class="x_content">
                    
        <table class="table table-bordered table-striped" id="datatable-buttonss">
            <thead>
                <tr>
                    <th width="10px">ID</th>
            <th>Barang</th>
		    <th>Merek</th>
		    <th>Warna</th>
		    <th>Ukuran</th>
		    <th>HargaEcer</th>
		    <th>StokAwal</th>
		    <th>Cabang</th>
		    <th>KodeBarang</th>
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
        "ajax": "<?php echo base_url().'index.php/detailbarang/data'?>"
    } );
    t.on( 'order.dt search.dt', function () {
                    t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                        cell.innerHTML = i+1;
                    } );
                } ).draw();
} );
</script>