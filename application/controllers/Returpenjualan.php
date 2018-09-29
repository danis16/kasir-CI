<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Returpenjualan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Returpenjualan_model');
    $this->load->library('form_validation');
    $this->mainlib->logged_in();
  }    
  function data() {
    $table = 'view_returpenjualan';
    $primaryKey = 'idRetur';
    $columns = array(
     array('db' => 'idRetur', 'dt' => 0),array('db' => 'idRetur', 'dt' => 0),
     array('db' => 'idPenjualan', 'dt' => 1),
     array('db' => 'tangal', 'dt' => 2,

  'formatter' => function( $d, $row ) {
            return date( 'l, j F Y', strtotime($d));
        }


      ),
     array('db' => 'username', 'dt' => 3),
     array(
      'db' => 'idRetur',
      'dt' => 4,
      'formatter' => function( $d, $row ) {
        return anchor('Returpenjualan/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'");
                // .' '.
                // anchor('Returpenjualan/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'").' '.
                // anchor('Returpenjualan/delete/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
      }
      )
     );

    $sql_details = array(
      'user' => $this->db->username,
      'pass' => $this->db->password,
      'db' => $this->db->database,
      'host' => $this->db->hostname
      );

    $this->load->library('ssp');
    echo json_encode(
      SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
      );
  }

  public function index()
  {
    $returpenjualan = $this->Returpenjualan_model->get_all();

    $data = array(
      'returpenjualan_data' => $returpenjualan
      );

    $this->template->load('template','returpenjualan/returpenjualan_list', $data);
  }

  public function read($id) 
  {
    $row = $this->Returpenjualan_model->get_by_id($id);
    if ($row) {
      $data = array(
        'idRetur' => $row->idRetur,
        'idPenjualan' => $row->idPenjualan,
        'tangal' => $row->tangal,
        'idAdmin' => $row->idAdmin,
        );
      $data['detail']=$this->db->query('SELECT dp.idRetur, db.kodeBarang, b.barang, dp.jumlah, dp.kondisi, dp.alasan 
        FROM detailreturpenjualan dp, returpenjualan r, detailbarang db, barang b 
        WHERE dp.idRetur=r.idRetur AND dp.idDetailBarang=db.id AND b.id=db.idBarang and dp.idRetur='.$id.'
        ')->result();
      $this->load->view('returpenjualan/returpenjualan_read', $data);
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('returpenjualan'));
    }
  }

  public function create() 
  {

    if (empty($_GET['idPenjualan'])) {
      $idpenjualan=0;
    }
    else{
      $idpenjualan=$_GET['idPenjualan'];
    }
    $data = array(
      'button' => 'Create',
      'action' => site_url('returpenjualan/create_action'),
      'idRetur' => set_value('idRetur'),
      'idPenjualan' => set_value('idPenjualan'),
      'tangal' => date('Y-m-d'),
      'idAdmin' => set_value('idAdmin'),
      'kondisi' => set_value('kondisi'),
      );
    $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();

        // $data['barang']=$this->db->query('select db.id as iddetail, b.barang, w.warna, s.size, m.merek 
        //     from barang b, detailbarang db, warna w, merek m, size s 
        //     where b.id=db.idBarang and m.id=b.idMerek and s.id=db.idUkuran and w.id=db.idWarna AND db.idCabang='.$admin['idCabang'].' 
        //     GROUP by b.barang, s.size, m.merek, w.warna asc')->result();

    // $data['barang']=$this->db->get_where('detailbarang',array('idCabang'=>$this->session->userdata('idCabang')))->result();
    $data['barang']=$this->db->query('SELECT * FROM PENJUALAN P, detailpenjualan DP, detailbarang db WHERE P.ID=DP.IDPENJUALAN AND dp.idBarang=db.id AND P.ID="'.$idpenjualan.'"')->result();
    $data['idpenjualan'] = $this->db->get('penjualan')->result();
    $data['dataidpenjualan']=$idpenjualan;
    $this->template->load('template','returpenjualan/returpenjualan_form', $data);
  }

  public function create_action() 
  {

    $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();

    $this->_rules();
    if ($this->form_validation->run() == FALSE) {
      $this->create();
    } else {
      $data = array(
        'idPenjualan' => $this->input->post('idPenjualan',TRUE),
        'tangal' => $this->input->post('tangal',TRUE),
        'idAdmin' => $admin['id'],
        );

      $this->Returpenjualan_model->insert($data);

      $retur=$this->db->get_where('returpenjualan',$data)->row_array();
      $idretur = $retur['idRetur'];

      $retur_temp = $this->db->get('detailreturpenjualan')->result();
            // $retur_tempp = $this->db->get('detailreturpenjualan_temp')->row_array();

$barangrusak=$this->db->query('select * from barangrusak where idDetailPembelian is null')->row_array();
$detailpembelian=$this->db->get_where('detailpembelian',array('idBarang'=>$barangrusak['idDetailBarang']))->row_array(); 

      foreach ($retur_temp as $r) {
        $this->db->where(array('idRetur'=>$r->idRetur,'idAdmin'=>$admin['id']));
        $this->db->update('detailreturpenjualan',array(
          'idRetur' => $idretur,
                    // 'idDetailBarang'=>$r->idDetailBarang,
                    // 'jumlah' => $r->jumlah,
                    // 'kondisi'=>$r->kondisi,
                    // 'alasan' => $r->alasan

          ));

                // $this->db->delete('detailreturpenjualan_temp');

      }

      $this->db->where('idDetailPembelian',$barangrusak['idDetailPembelian']);
      $this->db->update('barangrusak',array('idDetailPembelian'=>$detailpembelian['id']));


      $this->session->set_flashdata('message', 'Create Record Success');
      redirect(site_url('returpenjualan'));

    }



  }


  public function update($id) 
  {
    $row = $this->Returpenjualan_model->get_by_id($id);

    if ($row) {
      $data = array(
        'button' => 'Update',
        'action' => site_url('returpenjualan/update_action'),
        'idRetur' => set_value('idRetur', $row->idRetur),
        'idPenjualan' => set_value('idPenjualan', $row->idPenjualan),
        'tangal' => set_value('tangal', $row->tangal),
        'idAdmin' => set_value('idAdmin', $row->idAdmin),
        'kondisi' => set_value('kondisi'),
        );
      $this->template->load('template','returpenjualan/returpenjualan_form_edit', $data);
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('returpenjualan'));
    }
  }

  public function update_action() 
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->update($this->input->post('idRetur', TRUE));
    } else {
      $data = array(
        'idPenjualan' => $this->input->post('idPenjualan',TRUE),
        'tangal' => $this->input->post('tangal',TRUE),
        'idAdmin' => $this->input->post('idAdmin',TRUE),
        );

      $this->Returpenjualan_model->update($this->input->post('idRetur', TRUE), $data);
      $this->session->set_flashdata('message', 'Update Record Success');
      redirect(site_url('returpenjualan'));
    }
  }

  public function delete($id) 
  {
    $row = $this->Returpenjualan_model->get_by_id($id);

    if ($row) {
      $this->Returpenjualan_model->delete($id);
      $this->session->set_flashdata('message', 'Delete Record Success');
      redirect(site_url('returpenjualan'));
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('returpenjualan'));
    }
  }

  public function _rules() 
  {
   $this->form_validation->set_rules('idPenjualan', 'idpenjualan', 'trim|required');
   $this->form_validation->set_rules('tangal', 'tangal', 'trim|required');
	// $this->form_validation->set_rules('idAdmin', 'idadmin', 'trim|required');

   $this->form_validation->set_rules('idRetur', 'idRetur', 'trim');
   $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
 }

 public function add_detailretur()
 {

  $detailbarang=$this->db->get_where('detailbarang',array('kodeBarang'=>$_GET['idBarang']))->row_array();


        // die;

  $datatemp = array(
    'idDetailBarang'=>$detailbarang['id'],
    'jumlah'=>$_GET['jumlah'],
    'kondisi'=>$_GET['kondisi'],
    'alasan'=>$_GET['alasan'],
    'idAdmin'=>$this->session->userdata('id')
    );

  $this->db->insert('detailreturpenjualan',$datatemp);

    // $retur_temp=$this->db->query('SELECT MAX(id) as id FROM detailreturpenjualan')->row_array();

    // if ($_GET['kondisi']=='RUSAK') {

    //  $databarangrusak=array(
    //     'idDetailReturPenjualan_temp'=>$retur_temp['id'],
    //     'idDetailBarang'=>$_GET['idBarang'],
    //     'tanggal'=>date('Y-m-d'),
    //     'jumlah'=>$_GET['jumlah'],
    //     'keterangan'=>'data berasal dari RETUR PENJUALAN ',
    //     );
    //  $this->db->insert('barangrusak',$databarangrusak);

 // }

 // else{

    // $Stok = $detailbarang['stokAwal']+$_GET['jumlah'];

    // $editStok = array('stokAwal'=>$Stok);
    // $this->load->model('Detailbarang_model');
    // $this->Detailbarang_model->update($_GET['idBarang'],$editStok);


                // $EditJumlah = array('jumlah'=>$_GET['jumlah']);

// }
}

public function list_detailretur()
{

 $idbarang = $_GET['idBarang'];

 echo " 


 <div class='col-md-12 col-sm-12 col-xs-12'>
  <div class='x_panel'>
    <div class='x_title'>
      <h2>Tabel Detail Retur Penjualan</h2>
      <div class='clearfix></div>
    </div>
    <div class='x_content'>

      <table class='table table-bordered'>
       <tr>
         <th>No</th>
         <th>Barang</th>
         <th>Merek</th>
         <th>Size</th>
         <th>Warna</th>
         <th>Jumlah</th>
         <th>Kondisi </th>
         <th>Alasan</th>
         <th>Aksi</th>

       </tr>


       ";

       $sql="SELECT dt.id ,jb.barang, dt.jumlah, dt.kondisi, dt.alasan, m.merek, s.size, w.warna
       FROM jenisbarang jb, barang b, detailbarang db, detailreturpenjualan dt, merek m, size s, warna w 
       WHERE jb.id=b.barang and dt.idRetur = 0 and b.id=db.idBarang and db.id=dt.idDetailBarang and b.idMerek=m.id and db.idUkuran = s.id and db.idWarna = w.id";
       $barang = $this->db->query($sql)->result();
// print_r($barang);
// die;
       $no=1;
       foreach ($barang as $b) {
        echo "<tr>
        <td>$no</td>
        <td>$b->barang</td>
        <td>$b->merek</td>
        <td>$b->size</td>
        <td>$b->warna</td>
        <td>$b->jumlah</td>
        <td>$b->kondisi</td>
        <td>$b->alasan</td>
         <td><a onclick='remove($b->id)'>delete</a></td>

      </tr>";
      $no++;
    }

    echo " </table>

  </div>
</div>
</div>";

}

public function list_detailretur_edit()
{
  $idretur=$_GET['id'];
  $idbarang = $_GET['idBarang'];

  echo " 


  <div class='col-md-12 col-sm-12 col-xs-12'>
    <div class='x_panel'>
      <div class='x_title'>
        <h2>Tabel Detail Retur Penjualan</h2>
        <div class='clearfix></div>
      </div>
      <div class='x_content'>

        <table class='table table-bordered'>
         <tr>
           <th>No</th>
           <th>Barang</th>
           <th>Merek</th>
           <th>Size</th>
           <th>Warna</th>
           <th>Jumlah</th>
           <th>Kondisi </th>
           <th>Alasan</th>
           <th>Aksi</th>
         </tr>


         ";

         $sql="SELECT dt.id ,b.barang, dt.jumlah, dt.kondisi, dt.alasan, m.merek, s.size, w.warna 
         FROM barang b, detailbarang db, detailreturpenjualan dt, merek m, size s, warna w 
         WHERE b.id=db.idBarang and db.id=dt.idDetailBarang and b.idMerek=m.id 
         and db.idUkuran = s.id and db.idWarna = w.id and dt.idRetur=$idretur";
         $barang = $this->db->query($sql)->result();
// print_r($barang);
// die;
         $no=1;
         foreach ($barang as $b) {
          echo "<tr>
          <td>$b->id</td>
          <td>$b->barang</td>
          <td>$b->merek</td>
          <td>$b->size</td>
          <td>$b->warna</td>
          <td>$b->jumlah</td>
          <td>$b->kondisi</td>
          <td>$b->alasan</td>
          <td><a onclick='remove($b->id)'>delete</a></td>

        </tr>";
        $no++;
      }

      echo " </table>

    </div>
  </div>
</div>";

}


public function remove()
{
  $id=$_GET['id'];
  // $detailreturpenjualan_temp = $this->db->get_where('detailreturpenjualan_temp',array('id'=>$id))->row_array();
  // $detailbarang=$this->db->get_where('detailbarang',array('id'=> $detailreturpenjualan_temp['idDetailBarang']))->row_array();
  //       // $detailtemp=$this->db->get_where('detailreturpenjualan_temp',array('idDetailBarang'=>$detailbarang['idBarang']))->row_array();

  // $barangrusak=$this->db->get_where('barangrusak',array('idDetailReturPenjualan_temp'=>$id))->row_array();

  // if ($detailreturpenjualan_temp['kondisi']=="RUSAK") {
  //   print_r($barangrusak['id']);
  //           // die;
  //           // $this->load->model('Barangrusak_model');
  //           // $this->Barangrusak_model->delete($id);


  //   $this->db->where('id',$barangrusak['id']);
  //   $this->db->delete('barangrusak');

  // }

  // else {

  //   $stok = $detailbarang['stokAwal']-$detailreturpenjualan_temp['jumlah'];

  //   $editStok=array(
  //     'stokAwal'=>$stok
  //     );

  //   $this->load->model('Detailbarang_model');
  //   $this->Detailbarang_model->update($detailbarang['id'],$editStok);


  // }
  $this->db->where('id',$id);
  $this->db->delete('detailreturpenjualan');

}






}

/* End of file Returpenjualan.php */
/* Location: ./application/controllers/Returpenjualan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-16 11:18:17 */
/* http://harviacode.com */