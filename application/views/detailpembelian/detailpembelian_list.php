<div class="">
    <div class="clearfix"></div>

    <div class="row">


        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Detail Pembelian<h2>
                    <h2><br></h2>



                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    
        <table class="table table-bordered table-striped" id="datatable-buttonss">
            <thead>
                <tr>
                    <th width="10px">Nota</th>
		    <th>Nama Barang</th>
		    <th>Kode Barang</th>
		    <th>Harga Beli Satuan</th>
		    <th>Jumlah Beli</th>
		    <!-- <th width='103px'>Action</th> -->
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
        "ajax": "<?php echo base_url().'index.php/detailpembelian/data'?>"
    } );
    t.on( 'order.dt search.dt', function () {
                    t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                        cell.innerHTML = i+1;
                    } );
                } ).draw();
} );
</script>