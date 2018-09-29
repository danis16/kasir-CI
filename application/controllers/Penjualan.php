<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Penjualan_model');
    $this->load->library('form_validation');
    $this->mainlib->logged_in();
  }    
  function data() {
    $table = 'view_penjualan';
    $primaryKey = 'id';
    $columns = array(
     array('db' => 'id', 'dt' => 0),array('db' => 'id', 'dt' => 0),
     array('db' => 'username', 'dt' => 1),
     array('db' => 'tanggal', 'dt' => 2,

      'formatter' => function( $d, $row ) {
        return date( 'l, j F Y', strtotime($d));
      }


      ),
     array('db' => 'totalbayar', 'dt' => 3,
       'formatter'=>function($d, $row){
        return 'Rp '.number_format($d,2,",",".");
      }
      ),
     array('db' => 'status', 'dt' => 4),
     array(
      'db' => 'id',
      'dt' => 5,
      'formatter' => function( $d, $row ) {
        return 
        // anchor('Penjualan/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'").' '.
        // anchor('Penjualan/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'").''
        anchor('Penjualan/export_pdf/'.$d,'CETAK',"class='btn btn-sm btn-primary'");
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
    $penjualan = $this->Penjualan_model->get_all();

    $data = array(
      'penjualan_data' => $penjualan
      );

    $this->template->load('template','penjualan/penjualan_list', $data);
  }

  public function export_pdf($id)
  {

    // $this->load->library('pdf');

    $data['penjualan'] = $this->db->query('select * from penjualan where id="'.$id.'"')->row_array();
    $data['detailpenjualan']=$this->db->query('SELECT db.kodeBarang, jb.barang, jumlahJual, hargaEcer FROM penjualan p, detailpenjualan dp, detailbarang db, barang b, jenisbarang jb
      WHERE b.barang=jb.id and p.id=dp.idPenjualan AND p.id="'.$id.'" AND db.id=dp.idBarang AND b.id=db.idBarang')->result();
    
    $this->load->view('penjualan/penjualan_read',$data);


  }
  public function create() 
  {
    $data = array(
      'button' => 'Create',
      'action' => site_url('penjualan/create_action'),
      'id' => set_value('id'),
      'idAdmin' => set_value('idAdmin'),
      'tanggal' => date('Y-m-d'),
      'totalBayar' => set_value('totalBayar'),
      'status' => set_value('status'),
      );
    $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();

    $data['barang']=$this->db->query('select * from detailbarang where idCabang="'.$admin['idCabang'].'" and stokAwal >= 10')->result();

    $this->template->load('template','penjualan/penjualan_form', $data);
  }

  public function create_action() 
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->create();
    } else {
     $admin = $this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();

     $potongan=$this->input->post('potongann',TRUE);

     $sql='SELECT SUM((dp.jumlahJual*db.hargaEcer)-(dp.potongan)) AS subTotal
     FROM detailpenjualan dp, detailbarang db 
     WHERE db.id=dp.idBarang AND idPenjualan IS null and idAdmin="'.$admin['id'].'"';
     $query=$this->db->query($sql)->row_array();
     $totalbayar=$query['subTotal'];

     $data = array(
      'idAdmin' => $admin['id'],
      'tanggal' => $this->input->post('tanggal',TRUE),
      // 'potongan' => $potongan,
      'totalBayar' => $totalbayar,
      'status' => $this->input->post('status',TRUE),


      );

     $this->Penjualan_model->insert($data);

     $penjualan = $this->db->get_where('penjualan',$data)->row_array();
     $idpenjualan = $penjualan['id'];


     $penjualan_temp = $this->db->get_where('detailpenjualan',array('idAdmin'=>$admin['id'],'idPenjualan'=>null))->result();


     foreach ($penjualan_temp as $p) {
      $this->db->where(array('idAdmin'=>$p->idAdmin,'idPenjualan'=>$p->idPenjualan));
      $this->db->update('detailpenjualan', array(
        'idPenjualan' => $idpenjualan,
                // 'idBarang' => $p->idBarang,
                // 'jumlahJual' => $p->jumlahJual,
                // 'hargaJual' => $p->hargaJual,
                // 'subTotal' => $p->subTotal,
                    // 'idAdmin'=>$p->idAdmin
        ));
                // $this->db->where('idAdmin',$p->idAdmin);
            // $this->db->delete('detailpenjualan_temp');
    }

    if($_POST['status']=='LUNAS') {
      $this->session->set_flashdata('message', 'Create Record Success');
      redirect(site_url('penjualan'));
    }
    else {
      redirect(site_url('piutang/create'));

    }

  }
}

public function update($id) 
{
  $row = $this->Penjualan_model->get_by_id($id);

  if ($row) {
    $data = array(
      'button' => 'Update',
      'action' => site_url('penjualan/update_action'),
      'id' => set_value('id', $row->id),
      'idAdmin' => set_value('idAdmin', $row->idAdmin),
      'tanggal' => set_value('tanggal', $row->tanggal),
      'totalBayar' => set_value('totalBayar', $row->totalBayar),
      'status' => set_value('status', $row->status),
      );
    $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();

    $data['barang']=$this->db->query('select sa.satuan, db.id as iddetail, b.barang, w.warna, s.size, m.merek, sa.satuan 
      from barang b, detailbarang db, warna w, merek m, size s, satuan sa, cabang c 
      where b.id=db.idBarang and m.id=b.idMerek and sa.id = db.idSatuan and s.id=db.idUkuran and w.id=db.idWarna AND db.idCabang=c.id and c.id='.$admin['idCabang'].' 
      GROUP by b.barang, s.size, m.merek, w.warna, sa.satuan, c.cabang asc')->result();

    $this->template->load('template','penjualan/penjualan_form_edit', $data);
  } else {
    $this->session->set_flashdata('message', 'Record Not Found');
    redirect(site_url('penjualan'));
  }
}

public function update_action() 
{
  $this->_rules();

  if ($this->form_validation->run() == FALSE) {
    $this->update($this->input->post('id', TRUE));
  } else {
    $admin= $this->db->get_where('admin',array('username'=> $this->session->userdata('username')))->row_array();
    $data = array(
      'idAdmin' => $admin['id'],
      'tanggal' => $this->input->post('tanggal',TRUE),
      'totalBayar' => $this->input->post('totalBayar',TRUE),
      'status' => $this->input->post('status',TRUE),
      );

    $this->Penjualan_model->update($this->input->post('id', TRUE), $data);
    $this->session->set_flashdata('message', 'Update Record Success');
    redirect(site_url('penjualan'));
  }
}

public function delete($id) 
{

  $ro = $this->Penjualan_model->get_by_id_penjualan($id);

  if($ro){
    $this->Penjualan_model->delete_penjualan($id);

    $row = $this->Penjualan_model->get_by_id($id);

    if ($row) {
      $this->Penjualan_model->delete($id);
      $this->session->set_flashdata('message', 'Delete Record Success');
      redirect(site_url('penjualan'));
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('penjualan'));
    }}

    else{

      $row = $this->Penjualan_model->get_by_id($id);

      if ($row) {
        $this->Penjualan_model->delete($id);
        $this->session->set_flashdata('message', 'Delete Record Success');
        redirect(site_url('penjualan'));
      } else {
        $this->session->set_flashdata('message', 'Record Not Found');
        redirect(site_url('penjualan'));
      }

    }
    // }

    // else{

    //      if ($row) {
    //         $this->Penjualan_model->delete($id);
    //         $this->session->set_flashdata('message', 'Delete Record Success');
    //         redirect(site_url('penjualan'));
    //     } else {
    //         $this->session->set_flashdata('message', 'Record Not Found');
    //         redirect(site_url('penjualan'));
    //     }
    // }
  }

  public function _rules() 
  {
	// $this->form_validation->set_rules('idAdmin', 'idadmin', 'trim|required');
   $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
     // $this->form_validation->set_rules('totalBayar', 'totalbayar', 'trim|required');
   $this->form_validation->set_rules('status', 'status', 'trim|required');

   $this->form_validation->set_rules('id', 'id', 'trim');
   $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
 }


 public function rules()
 {
   $this->form_validation->set_rules('jumlahJual', 'jumlahJual', 'trim|required');
 }

 public function add_barang()
 { 

$this->rules();

  if ($this->form_validation->run() == FALSE) {
    $this->add_barang();
  } else {

  $idbarang = $_GET['idBarang'];
  $jumlahJual = $_GET['jumlahJual'];
  $detailbarang = $this->db->query('SELECT * FROM detailbarang WHERE kodeBarang="'.$idbarang.'" AND stokAwal>='.$jumlahJual.' LIMIT 1')->row_array();
  // $detailbarang = $this->db->get_where('detailbarang',array('kodeBarang'=>$idbarang))->row_array();

  

  $potongan=$this->input->get('potongan');
  $hargaJual=$detailbarang['hargaEcer'];
        // $stokAkhir=$detailbarang['stokAwal']-$jumlahJual;

  $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata['username']))->row_array();
        // $barang = $this->db->get_where('barang', array('barang'=>$idbarang))->row_array();
  $subTotal=($jumlahJual*$hargaJual)-$potongan;

  $datatemp = array(
    'idBarang' => $detailbarang['id'],
    'jumlahJual' => $jumlahJual,
        // 'hargaJual' => $hargaJual,
    'potongan' => $potongan,
        // 'subTotal' => $subTotal,
    'idAdmin' =>$admin['id']
    );
        // $this->load->model('Detailbarang_model');


        // $editStok = array('stokAwal'=>$stokAkhir);
        // $editStatus = array('status'=>'aktif');
        // $this->Detailbarang_model->update($idbarang,$editStok);

    // $barang = $this->db->get_where('barang', array(
        // 'barang'=>$idbarang))->row_array();

  $this->db->insert('detailpenjualan',$datatemp);
        # code...
}
} 


public function add_barang_ubah()
{

  $idbarang = $_GET['idBarang'];
  $idpenjualan = $_GET['idpenjualan'];
  $jumlahJual = $_GET['jumlahJual'];

  $detailbarang = $this->db->get_where('detailbarang',array('id'=>$idbarang))->row_array();
  $stokAkhir = $detailbarang['stokAwal']-$jumlahJual;

  $this->load->model('Detailbarang_model');
  $editStok = array('stokAwal'=>$stokAkhir);
// print_r($jumlahJual);        

  $this->Detailbarang_model->update($idbarang,$editStok);

        // $barang = $this->db->get_where('detailbarang',array('idBarang'=>$idbarang))->row_array();
  $penjualan = $this->db->get_where('penjualan', array('id'=>$idpenjualan))->row_array();
// print_r($penjualan);
        // die;

  $datatemp = array(
    'idPenjualan' => $penjualan['id'],
    'idBarang' => $idbarang,
    'jumlahJual' => $jumlahJual,
    'hargaJual' => $this->input->get('hargaJual'),
        // 'subTotal' => $this->input->get('subTotal')
    );

  $this->db->insert('detailpenjualan',$datatemp);
    # code...
}

public function list_barang()
{

 $idbarang = $_GET['idBarang'];
 // $detailbarang = $this->db->query('SELECT * FROM detailbarang WHERE kodeBarang="'.$idbarang.'" LIMIT 1')->row_array();
 //  if (empty($detailbarang['id'])) {
 //    echo "<script>alert('hahahhaa')</script>";
 //  }

 echo " 


 <div class='col-md-12 col-sm-12 col-xs-12'>
  <div class='x_panel'>
    <div class='x_title'>
      <h2>Tabel Detail Penjualan</h2>
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
         <th>Harga </th>
         <th>Potongan </th>
         <th>Sub Total</th>
         <th>Aksi</th>
       </tr>


       ";
       $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata['username']))->row_array();
               // $sql="SELECT dp.id as id, b.barang, m.merek, s.size, w.warna, db.hargaEcer, dp.potongan, dp.jumlahJual FROM detailpenjualan dp, detailbarang db, barang b, merek m, size s, warna w WHERE dp.idBarang=db.id AND db.idBarang=b.id AND b.idMerek=m.id AND db.idUkuran=s.id AND w.id=db.idWarna AND dp.idPenjualan is null and idAdmin='".$admin['id']."'";
       $sql="SELECT dp.id AS id, jb.barang, m.merek, s.size, w.warna, db.hargaEcer, dp.potongan, dp.jumlahJual, SUM((dp.jumlahJual*db.hargaEcer)-(dp.potongan)) AS subTotal
       FROM jenisbarang jb, detailpenjualan dp, detailbarang db, barang b, merek m, size s, warna w 
       WHERE dp.idBarang=db.id and jb.id=b.barang AND db.idBarang=b.id AND b.idMerek=m.id AND db.idUkuran=s.id AND w.id=db.idWarna AND dp.idPenjualan IS NULL and idAdmin='".$admin['id']."' GROUP BY dp.id";

       $barang = $this->db->query($sql)->result();


       $no=1;
       foreach ($barang as $b) {
        echo "<tr>
        <td>$no</td>
        <td>$b->barang</td>
        <td>$b->merek</td>
        <td>$b->size</td>
        <td>$b->warna</td>
        <td>$b->jumlahJual</td>
        <td>".number_format($b->hargaEcer,0,',','.')."</td>
        <td>$b->potongan</td>
        <td align='right'>".number_format($b->subTotal,0,',','.')."</td>


        <td><a onclick='remove($b->id)'>delete</a></td>

      </tr>";
      $no++;
    }


    $sql='SELECT SUM((dp.jumlahJual*db.hargaEcer)-(dp.potongan)) AS subTotal
    FROM detailpenjualan dp, detailbarang db 
    WHERE db.id=dp.idBarang AND idPenjualan IS null and idAdmin="'.$admin['id'].'"';
    $query=$this->db->query($sql)->row_array();
    if ($query==null) {
      $subTotal=0;
    # code...
    }
    else {
      $subTotal=$query['subTotal'];

    }


    echo '<tr> <td colspan=8 align="right"><b> TOTAL </b> </td>
    <td colspan=2><b>'.number_format($subTotal,0,',','.').' </b></td>';
    echo '</tr>';

    echo " 



  </table>

</div>
</div>
</div>";

}

public function list_barang_ubah()
{
  $idpenjualan = $_GET['idpenjualan'];   

  $idbarang = $_GET['idBarang'];

  echo " 


  <div class='col-md-12 col-sm-12 col-xs-12'>
    <div class='x_panel'>
      <div class='x_title'>
        <h2>Tabel Detail Penjualan</h2>
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
           <th>Harga </th>
           <th>Sub Total</th>
           <th>Aksi</th>
         </tr>


         ";

         $sql="SELECT dt.id ,b.barang, dt.hargaJual, dt.jumlahJual, dt.subTotal, m.merek, s.size, w.warna
         FROM barang b, detailbarang db, detailpenjualan dt, merek m, size s, warna w, penjualan p
         WHERE  b.id=db.idBarang and db.id=dt.idBarang and b.idMerek=m.id and db.idUkuran = s.id and db.idWarna = w.id and p.id=dt.idPenjualan and p.id=$idpenjualan";
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
          <td>$b->hargaJual</td>
          <td>$b->jumlahJual</td>
          <td>$b->subTotal</td>
          <td><a onclick='remove($b->id)'>delete</a></td>

        </tr>";
        $no++;
      }

      echo " </table>

    </div>
  </div>
</div>";


}






public function remove_barang()
{
 $id=$_GET['id'];

 // $detailpenjualan_temp=$this->db->get_where('detailpenjualan',array('id'=>$id))->row_array();
 // $detailbarang=$this->db->get_where('detailbarang',array('id'=>$detailpenjualan_temp['idBarang']))->row_array();
 // $stokAkhir = $detailbarang['stokAwal']+$detailpenjualan_temp['jumlahJual'];



 // $this->load->model('Detailbarang_model');

 // $editStok=array('stokAwal'=>$stokAkhir);

 // $this->Detailbarang_model->update($detailbarang['id'],$editStok);

 $this->db->where('id',$id);
 $this->db->delete('detailpenjualan');
}


public function remove_barang_detail()
{
  $id=$_GET['id'];

  $detailpenjualan=$this->db->get_where('detailpenjualan',array('id'=>$id))->row_array();
  $detailbarang=$this->db->get_where('detailbarang',array('id'=>$detailpenjualan['idBarang']))->row_array();

  $stokAkhir = $detailbarang['stokAwal']+$detailpenjualan['jumlahJual'];



  $this->load->model('Detailbarang_model');

  $editStok=array('stokAwal'=>$stokAkhir);

  $this->Detailbarang_model->update($detailbarang['id'],$editStok);

  $this->db->where('id',$id);
  $this->db->delete('detailpenjualan');
}



}

/* End of file Penjualan.php */
/* Location: ./application/controllers/Penjualan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-13 10:59:00 */
/* http://harviacode.com */