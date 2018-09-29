
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>SISTEM INFORMASI</title>

  <!-- Bootstrap -->
  <link href="<?php echo base_url(); ?>gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url(); ?>gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="<?php echo base_url(); ?>gentelella/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->
  <link href="<?php echo base_url(); ?>gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo base_url(); ?>gentelella/production/css/custom.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span> <?php echo $this->session->userdata('username') ?></span></a>
          </div>

          <div class="clearfix">

          </div>

          <!-- menu profile quick info -->
          <!-- <div class="profile"> -->
<!--                             <div class="profile_pic">
                                <img src="<?php echo base_url(); ?>gentelella/production/images/img.jpg" alt="..." class="img-circle profile_img">
                            </div>
                            <div class="profile_info"> -->
                              <!-- <span>Selamat Datang,</span> -->
                              <!-- <h2><?php echo $this->session->userdata('username'); ?></h2> -->
                              <!-- </div> -->
                              <!-- </div> -->
                              <!-- /menu profile quick info -->

                              <br />

                              <!-- sidebar menu -->
                              <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                                <!-- <div align="center" colour="white" font-size="50px"> -->
                                <!-- <a href="#"><?php echo $this->session->userdata('username')." | ". $this->session->userdata('idJabatan'); ?></a> -->
                                <!-- </div> -->
                                <div class="menu_section">
                                  <ul class="nav side-menu">   
                                    <li><a><i class="fa fa-paw"></i> Data User <span class="fa fa-chevron-down"></span></a>
                                      <ul class="nav child_menu">

                                        <?php if ($this->session->userdata('idJabatan')=='pemilik') {

                                          echo  '<li><a href="';
                                          echo base_url();
                                          echo 'index.php/admin">Data Admin</a></li>';
                                        } ?>

                                        <?php if ($this->session->userdata('idJabatan')=='karyawati'): ?>
                                          <li><a href="<?php echo base_url(); ?>index.php/pelanggan">Data Pelanggan</a></li>
                                          <li><a href="<?php echo base_url(); ?>index.php/supplier">Data Supplier</a></li>

                                        <?php endif ?>
                                      </ul>
                                    </li>


                                    <!-- <li><a href="<?php echo base_url(); ?>index.php/pemesan"><i class="fa fa-home"></i> Pemesan Barang</a></li> -->

                                    <?php 
                                    $jabatan = $this->session->userdata('idJabatan');
                                    ?>
                                    <?php if ($jabatan=='karyawati'): ?>

                                      <li><a><i class="fa fa-paw"></i> Barang <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                          <li><a href="<?php echo base_url(); ?>index.php/barang">Data Barang</a></li>
                                          <li><a href="<?php echo base_url(); ?>index.php/detailbarang">Data Detail Barang</a></li>

                                          <li><a href="<?php echo base_url(); ?>index.php/BarangRusak">Data Barang Rusak</a></li>
                                          <li><a href="<?php echo base_url(); ?>index.php/jenisbarang">Jenis Barang</a></li>
                                          <li><a href="<?php echo base_url(); ?>index.php/kategori">Kategori Barang</a></li>
                                          <li><a href="<?php echo base_url(); ?>index.php/merek">Merek Barang</a></li>
                                          <!-- <li><a href="<?php echo base_url(); ?>index.php/satuan">Satuan</a></li> -->
                                          <li><a href="<?php echo base_url(); ?>index.php/warna">Warna</a></li>
                                          <li><a href="<?php echo base_url(); ?>index.php/size">Size</a></li>
                                        </ul>
                                      </li>

                                      <li><a><i class="fa fa-paw"></i> Pindah Stok <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                          <li><a href="<?php echo base_url(); ?>index.php/pindahstok">Data Pindah Stok</a></li>
                                          <!-- <li><a href="<?php echo base_url(); ?>index.php/detailpindahstok">Data Detail Pindah Stok</a></li> -->
                                          <li><a href="<?php echo base_url(); ?>index.php/stokmasuk">Data Update Stok</a></li>
                                          <!-- <li><a href="<?php echo base_url(); ?>index.php/stokkeluar">Data Stok Keluar</a></li> -->
                                        </ul>
                                      </li>

                                      <li><a href="<?php echo base_url(); ?>index.php/pemesan"><i class="fa fa-paw"></i> Pemesan Barang 
                                        <!-- <span class="fa fa-chevron-down"></span> -->
                                      </a>
                                      <!-- <ul class="nav child_menu"> -->
                                      <!-- <li><a href="<?php echo base_url(); ?>index.php/pemesan">Data Pemesan</a></li> -->
                                      <!-- <li><a href="<?php echo base_url(); ?>index.php/detailpesanan">Data Detail Pemesan</a></li> -->
                                      <!-- </ul> -->
                                    </li>

                                    <li><a><i class="fa fa-paw"></i> Pembelian <span class="fa fa-chevron-down"></span></a>
                                      <ul class="nav child_menu">
                                        <li><a href="<?php echo base_url(); ?>index.php/pembelian">Data Pembelian</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/detailpembelian">Detail Pembelian</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/returpembelian">Retur Pembelian</a></li>
                                        <!-- <li><a href="<?php echo base_url(); ?>index.php/detailreturpembelian">Detail Retur Pembelian</a></li> -->
                                      </ul>
                                    </li>

                                    <li><a><i class="fa fa-paw"></i> Penjualan <span class="fa fa-chevron-down"></span></a>
                                      <ul class="nav child_menu">
                                        <li><a href="<?php echo base_url(); ?>index.php/penjualan">Data Penjualan</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/detailpenjualan">Detail Penjualan</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/returpenjualan">Return Penjualan</a></li>
                                        <!-- <li><a href="<?php echo base_url(); ?>index.php/detailreturpenjualan">Detail Return Penjualan</a></li> -->
                                      </ul>
                                    </li>

                                    <li><a><i class="fa fa-paw"></i> Hutang Piutang <span class="fa fa-chevron-down"></span></a>
                                      <ul class="nav child_menu">
                                        <li><a href="<?php echo base_url(); ?>index.php/hutang">Hutang</a></li>
                                        <!-- <li><a href="<?php echo base_url(); ?>index.php/detailhutang">Detail Hutang</a></li> -->
                                        <li><a href="<?php echo base_url(); ?>index.php/piutang">Piutang</a></li>
                                        <!-- <li><a href="<?php echo base_url(); ?>index.php/detailpiutang">Detail Piutang</a></li> -->
                                      </ul>
                                    </li>

                                  <?php endif ?>
<!--                  <li><a href="<?php echo base_url(); ?>index.php/isisms"><i class="fa fa-home"></i> SMS</a></li>
                 <li><a href="<?php echo base_url(); ?>index.php/cabang"><i class="fa fa-home"></i> Cabang</a></li>
               -->
               <!-- <li><a href="<?php echo base_url(); ?>index.php/totalbeban">Input Pengeluaran</a></li> -->
<?php if ($jabatan=='pemilik'): ?>
                 <li><a href="<?php echo base_url(); ?>index.php/totalbeban"><i class="fa fa-paw"></i> Input Pengeluaran </span></a>
  
<?php endif ?>
               <?php if ($jabatan=='karyawati'): ?>
                 
                 <li><a href="<?php echo base_url(); ?>index.php/laporanlaba/laporan_tiap_cabang"><i class="fa fa-paw"></i> Laporan Tiap Cabang </span></a>
               <?php endif ?>
                 
               <?php if ($jabatan=='pemilik'): ?>


                   <li><a><i class="fa fa-paw"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url(); ?>index.php/laporanlaba">Laporan Penjualan</a></li>
                      <!-- <li><a href="<?php echo base_url(); ?>index.php/laporanlaba/laporanbarang">Laporan Pendataan Barang</a> -->

                         <li><a>Laporan Barang<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="<?php echo base_url(); ?>index.php/laporanlaba/laporanbarangstok">Stok Barang</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>index.php/laporanlaba/laporanbarangterjual">Barang Terjual</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>index.php/laporanlaba/laporanbarang">Grafik</a>
                            </li>
                          </ul>
                        </li>

                      <!-- </li> -->
                      <!-- <li><a href="<?php echo base_url(); ?>index.php/laporanlaba/cetak_laporan_penjualan">Cetak Laporan Penjualan</a></li> -->

                    </ul>
                  <?php endif ?>

                  <?php if ($jabatan=='karyawati'): ?>
                   <li><a href="<?php echo base_url(); ?>index.php/isisms"><i class="fa fa-paw"></i> SMS </span></a>

                   <?php endif ?>

                   <?php if ($jabatan=='pemilik'): ?>

                   </li>     <li><a><i class="fa fa-paw"></i> Other <span class="fa fa-chevron-down"></span></a>
                   <ul class="nav child_menu">
                    <li><a href="<?php echo base_url(); ?>index.php/isisms">SMS</a></li>
                    <!-- <li><a href="<?php echo base_url(); ?>index.php/cabang">Cabang</a></li> -->
                    <li><a href="<?php echo base_url(); ?>index.php/beban">Beban</a></li>

                  </ul>
                </li>
              <?php endif ?>
            </ul>
          </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
          <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="Logout">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
          </a>
        </div>
        <!-- /menu footer buttons -->
      </div>
    </div>

    <!-- top navigation -->
    <div class="top_nav">

      <div class="nav_menu">
        <nav class="" role="navigation">
          <div class="nav toggle">
            <a id="menu_toggle"></a>
          </div>

          <ul class="nav navbar-nav navbar-right">
            <li class="">
              <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
               <i class="fa fa-paw"> </i> <label> </label> <label>Menu</label> <label> </label> <i class="fa fa-paw"> </i>
                <!-- <img src="<?php echo base_url(); ?>gentelella/production/images/img.jpg" alt=""> -->
                <label> </label> <label> </label> <span class=" fa fa-angle-down"></span>
              </a>
              <ul class="dropdown-menu dropdown-usermenu pull-right">
                <li>   <a href="<?php echo base_url('index.php/login/logout') ?>">Logout</a>
                </li>
                <li>
                  <!-- <a href=""> -->

                    <!-- <span class="badge bg-red pull-right">50%</span> -->
                    <a href="<?php echo base_url()?>index.php/admin/manual"><span>Manual Book</span></a>
                    <!-- <span>Manual Book</span> -->
                  </a>
                </li>


              </ul>
            </li>


          </ul>
        </nav>
      </div>

    </div>
    <!-- /top navigation -->

    <!-- page content -->
    <div class="right_col" role="main" style="min-height: 621px;">
      <?php echo $contents; ?>
      <div class="clearfix"></div>
    </div>
    <!-- /page content -->

    <!-- footer content -->
    <footer>
      <div class="pull-right">
        Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
      </div>
      <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
  </div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>gentelella/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>gentelella/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>gentelella/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo base_url(); ?>gentelella/vendors/nprogress/nprogress.js"></script>
<!-- chart  -->

<!-- Datatables -->
<script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
<script src="<?php echo base_url(); ?>gentelella/vendors/jszip/dist/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>gentelella/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>gentelella/vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>gentelella/vendors/parsleyjs/dist/parsley.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url(); ?>gentelella/production/js/custom.js"></script>

<!-- Datatables -->
<script>
  $(document).ready(function() {
    var handleDataTableButtons = function() {
      if ($("#datatable-buttons").length) {
        $("#datatable-buttons").DataTable({

          responsive: true
        });
      }
    };

    TableManageButtons = function() {
      "use strict";
      return {
        init: function() {
          handleDataTableButtons();
        }
      };
    }();

    $('#datatable').dataTable();
    $('#datatable-keytable').DataTable({
      keys: true
    });

    $('#datatable-responsive').DataTable();

    $('#datatable-scroller').DataTable({
      ajax: "js/datatables/json/scroller-demo.json",
      deferRender: true,
      scrollY: 380,
      scrollCollapse: true,
      scroller: true
    });

    var table = $('#datatable-fixed-header').DataTable({
      fixedHeader: true
    });

    TableManageButtons.init();
  });



      // Bar chart
      
    </script>
    <!-- /Datatables -->
  </body>
  </html>