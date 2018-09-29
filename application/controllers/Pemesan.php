  <?php

  if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemesan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pemesan_model');
        $this->load->library('form_validation');

        $this->load->library('session');
        $this->mainlib->logged_in();
        $this->load->model('Detailpesanan_model');


    }


    function data() {
        $table = 'view_pemesan';
        $primaryKey = 'id';
        $columns = array(
           array('db' => 'id', 'dt' => 0),array('db' => 'id', 'dt' => 0),
           array('db' => 'tanggal_pesan', 'dt' => 1,
  'formatter' => function( $d, $row ) {
            return date( 'l, j F Y', strtotime($d));
        }


            ),
           array('db' => 'tanggal_diambil', 'dt' => 2,

  'formatter' => function( $d, $row ) {
            return date( 'l, j F Y', strtotime($d));
        }


            ),
           array('db' => 'nama', 'dt' => 3),
           array('db' => 'username', 'dt' => 4),
           array('db' => 'keterangan', 'dt' => 5),
           array('db' => 'waktu_pembaharuan', 'dt' => 6,
  'formatter' => function( $d, $row ) {
            return date( 'l, j F Y - H:i:s', strtotime($d));
        }



            ),
           array('db' => 'status', 'dt' => 7),
           array('db' => 'status_ambil', 'dt' => 8),
           array('db' => 'tempat', 'dt' => 9),
           array(
            'db' => 'id',
            'dt' => 10,
            'formatter' => function( $d, $row ) {
                return anchor('Pemesan/update_status/'.$d,'B',"class='btn btn-sm btn-danger' ")
                .' '.
                anchor('Pemesan/update_status_ambil/'.$d,'A',"class='btn btn-sm btn-danger'")                .' '.
                anchor('Pemesan/update_tempat/'.$d,'T',"class='btn btn-sm btn-danger'")
                .' '.
                anchor('Pemesan/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'")
                // .' '.
                // anchor('','sms',"class='btn btn-sm btn-danger' onclick='send(this.val)'")
                .' '.
                anchor('Pemesan/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'");
                // anchor('Pemesan/read/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
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



public function update_status($id)
{
    $idpemesan = $this->uri->segment(3);
    $pemesan = $this->db->get_where('pemesan',array('id'=>$idpemesan))->row_array();
    if ($pemesan['status']=='sudah') {
        $dataa=array(
            'status'=>"belum",
            'waktu_pembaharuan'=>date('Y-m-d H:i:s')
            );
    }
    else {
        $dataa=array(
            'status'=>"sudah",
            'waktu_pembaharuan'=>date('Y-m-d H:i:s')
            );

        $pelanggan=$this->db->get_where('pelanggan',array('id'=>$pemesan['idPelanggan']))->row_array();
        

        $email_api  = urlencode("daniswara.daniswara@gmail.com");
        $passkey_api    = urlencode("akuanakbaik");
        $no_hp_tujuan   = urlencode($pelanggan['noHP']);
        $isi_pesan  = urlencode("Pesanan anda sudah sampai -- TOKO PRASASTY");


        $url    = "https://reguler.medansms.co.id/sms_api.php?action=kirim_sms&email=".$email_api."&passkey=".$passkey_api."&no_tujuan=".$no_hp_tujuan."&pesan=".$isi_pesan;
        $result = file_get_contents($url);
        $data   = explode("~~~", $result);

// echo $data[0]; //1=SUKSES, selain itu GAGAL
// echo $data[1]; //Panjang SMS
// echo $data[2]; //Jumlah SMS yang dikirim
// echo $data[3]; //Total Kredit yang digunakan
// echo $data[4]; //Sisa Kredit
// echo $data[5]; //Jenis Paket SMS (1=SMS Gratis, 0=SMS Reguler/SMS Center/SMS Masking
    if ($data[0]==1) {
         $status='terkirim';
         // echo '<script>alert("pesan terkirim")</script>';
     } 
     else{
        $status='tidak terkirim';
        // echo '<script>alert("pesan tidak terkirim")</script>';
     }


     $datasms=array(
        'tanggal'=>date('Y-m-d H:i:s'),
        'nama'=>$pelanggan['id'],
        'tentang'=>'pemesanan barang',
        'isi'=>'pesanan anda sudah sampai -- TOKO PRASASTY',
        'idAdmin'=>$this->session->userdata('id'),
        'status'=>$status,
        );
    
    $this->db->insert('isisms',$datasms);


}



$this->db->where('id',$idpemesan);
$this->db->update('pemesan',$dataa);

redirect('pemesan'); 

}



public function update_status_ambil($id)
{
    $idpemesan = $this->uri->segment(3);
    $pemesan = $this->db->get_where('pemesan',array('id'=>$idpemesan))->row_array();
    if ($pemesan['status_ambil']=='sudah') {
        $data=array(
            'status_ambil'=>"belum",
            'waktu_pembaharuan'=>date('Y-m-d H:i:s')
            );
    }
    else {
        $data=array(
            'status_ambil'=>"sudah",
            'waktu_pembaharuan'=>date('Y-m-d H:i:s')
            );

    }

    $this->db->where('id',$id);
    $this->db->update('pemesan',$data);

    redirect('pemesan'); 

}

public function update_tempat($id)
{
    $idpemesan = $this->uri->segment(3);
    $pemesan = $this->db->get_where('pemesan',array('id'=>$idpemesan))->row_array();
        // if ($pemesan['status_ambil']=='sudah') {
    $data=array(
        'tempat'=>$this->session->userdata('idCabang'),
        'waktu_pembaharuan'=>date('Y-m-d H:i:s')
        );
        // }
        // else {
        //     $data=array(
        //         'status_ambil'=>"sudah",
        //         'waktu_pembaharuan'=>date('Y-m-d H:i:s')
        //         );

        // }

    $this->db->where('id',$id);
    $this->db->update('pemesan',$data);

    redirect('pemesan'); 

}

public function index()
{
    $pemesan = $this->Pemesan_model->get_all();

    $data = array(
        'pemesan_data' => $pemesan
        );

    $this->template->load('template','pemesan/pemesan_list', $data);
}

public function read($id) 
{
    $row = $this->Pemesan_model->get_by_id($id);
    if ($row) {
        $pelanggan=$this->db->get_where('pelanggan',array('id'=>$row->idPelanggan))->row_array();
        $data = array(
            'id' => $row->id,
            'tanggal_pesan' => $row->tanggal_pesan,
            'tanggal_diambil' => $row->tanggal_diambil,
            'idPelanggan' => $pelanggan['nama'],
            'idAdmin' => $this->session->userdata('username'),
            'keterangan' => $row->keterangan,
            );
        $data['detailpesanan']=$this->db->query('SELECT jb.barang, dp.keterangan, dp.jumlah, dp.idCabang 
            FROM detailpesanan dp, barang b, jenisbarang jb WHERE b.barang=jb.id and b.id=dp.idBarang and idPemesan='.$id.'')->result();
        $this->load->view('pemesan/pemesan_read', $data);
    } else {
        $this->session->set_flashdata('message', 'Record Not Found');
        redirect(site_url('pemesan'));
    }
}

public function create() 
{
    $data = array(
        'button' => 'Create',
        'action' => site_url('pemesan/create_action'),
        'id' => set_value('id'),
        'tanggal_pesan' => date('Y-m-d'),
        'tanggal_diambil' => set_value('tanggal_diambil'),
        'idPelanggan' => set_value('idPelanggan'),
        'idAdmin' => set_value('idAdmin'),
        'keterangan' => set_value('keterangan'),
        );
    $data['barang'] = $this->db->get('jenisbarang')->result();
    $data['pelanggan'] = $this->db->get_where('pelanggan',array('status'=>"pelanggan"))->result();
    $this->template->load('template','pemesan/pemesan_form', $data);
}
public function x()
{

    $a=$this->session->userdata();
    print_r($a);

        # code...
}

public function create_action() 
{
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
        $this->create();
    } else {
        $nama = $this->input->post('namaPelanggan');
        $pelanggan = $this->db->get_where('pelanggan',array('nama'=>$nama))->row_array();
        $admin = $this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();


        $data = array(
            'tanggal_pesan' => date('Y-m-d'),
            'tanggal_diambil' => $this->input->post('tanggal_diambil',TRUE),
            'idPelanggan' => $pelanggan['id'],
            'idAdmin' => $admin['id'],
            'keterangan' => $this->input->post('keterangan',TRUE),
            'status'=>'belum',
            'status_ambil'=>'belum',
            'waktu_pembaharuan'=>date('Y-m-d H:i:s'),
            'idCabang'=>$admin['idCabang'],
            );

        $this->Pemesan_model->insert($data);
        $pemesanan = $this->db->get_where('pemesan',$data)->row_array();
        $idpemesanan=$pemesanan['id'];
            //pindah semua dari tabel pemesanan temp ke tabel pemesanan detail

            //ambil data
        $pemesanan=$this->db->get_where('detailpesanan',array('idCabang'=>$admin['idCabang'],'idPemesan'=>null))->result();

        foreach ($pemesanan as $pt) {
         $this->db->where(array('idCabang'=>$pt->idCabang,'idPemesan'=>$pt->idPemesan));
         $this->db->update('detailpesanan', array(
            'idPemesan'=>$idpemesanan,
                // 'idBarang'=>$pt->idBarang,
                // 'jumlah'=>$pt->jumlah,
                // 'keterangan'=>$pt->keterangan)
            ));
               // $this->db->delete('detailpesanan_temp');

     }


     $this->session->set_flashdata('message', 'Create Record Success');
     redirect(site_url('pemesan'));
 }
}

public function update($id) 
{

    $row = $this->Pemesan_model->get_by_id($id);

    $pelanggan = $this->db->get_where('pelanggan',array('id'=>$row->idPelanggan))->row_array();
    $idpemesan = $this->uri->segment(3);


    $sql="SELECT dt.idbarang, b.barang, dt.jumlah, dt.keterangan, p.id FROM detailpesanan dt, barang b, pemesan p WHERE dt.idBarang=b.id and p.id=$idpemesan and dt.idPemesan=p.id";

    if ($row) {
        $data = array(
            'button' => 'Update',
            'action' => site_url('pemesan/update_action'),
            'id' => set_value('id', $row->id),
            'tanggal_pesan' => set_value('tanggal_pesan', $row->tanggal_pesan),
            'tanggal_diambil' => set_value('tanggal_diambil', $row->tanggal_diambil),
            'idPelanggan' => set_value('idPelanggan', $row->idPelanggan),
        // 'idPelanggan' => set_value('idPelanggan', $pelanggan['nama']),
            'idAdmin' => set_value('idAdmin', $row->idAdmin),
            'keterangan' => set_value('keterangan', $row->keterangan),
            'list_barang' => $this->db->query($sql)->result()
            );
        $NamaPelanggan = $pelanggan['nama'];
        $data['barang'] = $this->db->get('jenisbarang')->result();
        // $data['pelanggan'] = $this->db->get('pelanggan')->result();
        $data['NamaPelanggan']=$NamaPelanggan;
        $this->template->load('template','pemesan/pemesan_edit', $data);
    } else {
        $this->session->set_flashdata('message', 'Record Not Found');
        redirect(site_url('pemesan'));
    }
}

public function update_action_ori() 
{
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
        $this->update($this->input->post('id', TRUE));
    } else {
        $data = array(
            'tanggal_pesan' => $this->input->post('tanggal_pesan',TRUE),
            'tanggal_diambil' => $this->input->post('tanggal_diambil',TRUE),
            'idPelanggan' => $this->input->post('namaPelanggan',TRUE),
            'idAdmin' => $this->input->post('idAdmin',TRUE),
            'keterangan' => $this->input->post('keterangan',TRUE),
            );

        $this->Pemesan_model->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('pemesan'));
    }
}


public function update_action() 
{
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->update($this->input->post('id', TRUE));
  } else {
    $nama = $this->input->post('namaPelanggan');
    $pelanggan = $this->db->get_where('pelanggan',array('nama'=>$nama))->row_array();
    $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();


    $data = array(
        'tanggal_pesan' => $this->input->post('tanggal_pesan',TRUE),
        'tanggal_diambil' => $this->input->post('tanggal_diambil',TRUE),
        'idPelanggan' => $pelanggan['id'],
        'idAdmin' => $admin['id'],
        'keterangan' => $this->input->post('keterangan',TRUE),
        );

    $this->Pemesan_model->update($this->input->post('id', TRUE), $data);
    $pemesanan = $this->db->get_where('pemesan',$data)->row_array();
    $idpemesanan=$pemesanan['id'];
            //pindah semua dari tabel pemesanan temp ke tabel pemesanan detail

            // //ambil data
            // $pemesanan_temp=$this->db->get('detailpesanan')->result();

            // foreach ($pemesanan_temp as $pt) {
               // $this->db->insert('detailpesanan', array(
               //  'idPemesan'=>$idpemesanan,
               //  'idBarang'=>$pt->idBarang,
               //  'jumlah'=>$pt->jumlah,
               //  'keterangan'=>$pt->keterangan));
               // $this->db->where('idBarang',$pt->idBarang);
               // $this->db->delete('detailpesanan_temp');

            // }


    $this->session->set_flashdata('message', 'Create Record Success');
    redirect(site_url('pemesan'));
}
}

public function delete($id) 
{
        // $idd= $this->uri->segment(3);

    $row = $this->Pemesan_model->get_by_idd($id);

    if ($row) {
        $this->Pemesan_model->delete_pemesan($id);

        $roww = $this->Pemesan_model->get_by_id($id);

        if($roww){

            $this->Pemesan_model->delete($id);

            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pemesan'));
            
        }
    }
    else{ 

        $this->Pemesan_model->delete_pemesan($id);

        $roww = $this->Pemesan_model->get_by_id($id);

        if($roww){

            $this->Pemesan_model->delete($id);

            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pemesan'));
            
        }
    }
}


// public function deletedetail($id) 
//     {
//         $row = $this->Detailpesanan_model->get_by_id($id);

//         if ($row) {
//             $this->Detailpesanan_model->delete($id);
//             $this->session->set_flashdata('message', 'Delete Record Success');
//             redirect(site_url('detailpesanan'));
//         } else {
//             $this->session->set_flashdata('message', 'Record Not Found');
//             redirect(site_url('detailpesanan'));
//         }
//     }






//     public function deletee($id) 
//     {
//         $row = $this->Pemesan_model->get_by_id($id);

//         if ($row) {
//             $this->Pemesan_model->delete($id);

//             $detailpesanan = $this->db->get('detailpesanan')->result();

//             foreach ($detailpesanan as $d) {
//                 $this->db->where('id',$d->idPemesan);
//                 $this->db->delete('detailpesanan');


//             }


//             $this->session->set_flashdata('message', 'Delete Record Success');
//             redirect(site_url('pemesan'));
//         } else {
//             $this->session->set_flashdata('message', 'Record Not Found');
//             redirect(site_url('pemesan'));
//         }
//     }



public function add_barang()
{ 
    $idbarang = $_GET['idbarang'];
    $jenisbarang = $this->db->get_where('jenisbarang', array('Barang'=>$idbarang))->row_array();
    $barang=$this->db->get_where('barang',array('barang'=>$jenisbarang['id']))->row_array();
    // $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();

    $datatemp = array(
        'idBarang' => $barang['id'],
        'jumlah' => $this->input->get('jumlah'),
        'keterangan' => $this->input->get('keterangann'),
        'idCabang'=>$this->session->userdata['idCabang'],
        );

    $barang = $this->db->get_where('barang', array(
        'barang'=>$idbarang))->row_array();

    $this->db->insert('detailpesanan',$datatemp);
        # code...
} 


public function add_barang_detail()
{ 
    $idbarang = $_GET['idbarang'];
    $idpemesan = $_GET['idpemesan'];
        // $namapelanggan = $_GET['namaPelanggan'];
        // $idPelanggan = "SELECT id FROM pelanggan WHERE nama='$namapelanggan'";

        // $pelanggan = $this->db->get_where('pelanggan',array('pelanggan'=>$idPelanggan)->row_array());
    $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();
    
    $jenisbarang = $this->db->get_where('jenisbarang', array('Barang'=>$idbarang))->row_array();
    $barang=$this->db->get_where('barang',array('barang'=>$jenisbarang['id']))->row_array();
    $pemesan = $this->db->get_where('pemesan', array('id'=>$idpemesan))->row_array();


    $datatemp = array(
        'idPemesan' => $pemesan['id'],
        'idBarang' => $barang['id'],
        'jumlah' => $this->input->get('jumlah'),
        'keterangan' => $this->input->get('keterangann'),
        'idCabang'=>$admin['idCabang'],
        );

    $barang = $this->db->get_where('barang', array(
        'barang'=>$idbarang))->row_array();

    $this->db->insert('detailpesanan',$datatemp);
        # code...
}

public function list_barang()
{
    $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();
    $sql='SELECT dt.idbarang, jb.barang, dt.jumlah, dt.keterangan FROM detailpesanan dt, barang b, jenisbarang jb WHERE b.barang=jb.id and dt.idBarang=b.id and idPemesan is null and dt.idCabang="'.$admin['idCabang'].'"';
    $barang=$this->db->query($sql)->result();
    echo "<table class='table table-bordered'>
    <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
        <th>aksi</th>
    </tr>";
    $no=1;
    foreach ($barang as $b) {
        echo "<tr>
        <td>$no</td>
        <td>$b->barang</td>
        <td>$b->jumlah</td>
        <td>$b->keterangan</td>
        <td><a onclick='remove($b->idbarang)'>Delete</td>
    </tr>";
    $no++;
}

echo "</table>";

}

public function list_barang_ubah()
{
    $idpemesan = $_GET['idpemesan'];   
    $sql="SELECT dt.idbarang, jb.barang, dt.jumlah, dt.keterangan, p.id FROM jenisbarang jb, detailpesanan dt, barang b, pemesan p WHERE b.barang=jb.id and dt.idBarang=b.id and p.id=$idpemesan and dt.idPemesan=p.id";

    $barang=$this->db->query($sql)->result();
    echo "<table class='table table-bordered'>
    <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
        <th>aksi</th>
    </tr>";
    $no=1;
    foreach ($barang as $b) {
        echo "<tr>
        <td>$no</td>
        <td>$b->barang</td>
        <td>$b->jumlah</td>
        <td>$b->keterangan</td>
        <td><a onclick='remove($b->idbarang)'>Delete</td>
    </tr>";
    $no++;
}

echo "</table>";

}






public function remove_barang()
{
   $id=$_GET['id'];
   $this->db->where('idbarang',$id);
   $this->db->delete('detailpesanan_temp');
}


public function remove_barang_detail()
{
   $id=$_GET['id'];
   $this->db->where('idbarang',$id);
   $this->db->delete('detailpesanan');
}


public function _rules() 
{
    $this->form_validation->set_rules('tanggal_pesan', 'tanggal pesan', 'trim|required');
    $this->form_validation->set_rules('tanggal_diambil', 'tanggal diambil', 'trim|required');
    // $this->form_validation->set_rules('idPelanggan', 'idpelanggan', 'trim|required');
    // $this->form_validation->set_rules('idAdmin', 'idAdmin', 'trim|required');
    // $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

    $this->form_validation->set_rules('id', 'id', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
}

}

/* End of file Pemesan.php */
/* Location: ./application/controllers/Pemesan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-07 12:53:49 */
/* http://harviacode.com */