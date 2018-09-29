<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->library('form_validation');
        $this->mainlib->logged_in();
    }    
    function data() {
        $table = 'view_barang';  
        $primaryKey = 'id';
        $columns = array(
         array('db' => 'id', 'dt' => 0),
         array('db' => 'barang', 'dt' => 1),

         array('db' => 'merek', 'dt' => 2),
         array('db' => 'keterangan', 'dt' => 3),
         array('db' => 'status', 'dt' => 4),
         array(
            'db' => 'id',
            'dt' => 5,
            'formatter' => function( $d, $row ) {
                return 
                anchor('Barang/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'").' '.
                anchor('Barang/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'").' '.
                anchor('Barang/delete/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
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

        $this->template->load('template','barang/barang_list', $data);
    }


    public function read($id) 
    {

        $row = $this->Barang_model->get_by_id($id);
        if ($row) {
            $detailbarang=$this->db->query('select * from detailbarang db, warna w, barang b, size s where db.idbarang=b.id and db.idWarna=w.id and db.idukuran=s.id and b.id="'.$row->id.'"')->result();
            $merek = $this->db->get_where('merek',array('id'=>$row->idMerek))->row_array();
            $barang = $this->db->get_where('jenisbarang',array('id'=>$row->barang))->row_array();
            $data = array(
              'id' => $row->id,
              'barang' => $barang['Barang'],
              'idMerek' => $merek['merek'],
              'status' => $row->status,
              'Keterangan' => $row->keterangan,
              'db'=>$detailbarang,
              );
            $this->load->view('barang/barang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('barang/create_action'),
            'id' => set_value('id'),
            'barang' => set_value('barang'),
            'kode' => set_value('kode'),
            'gambar' => set_value('gambar'),
            'idKategori' => set_value('idKategori'),
            'idMerek' => set_value('idMerek'),
            'status' => set_value('status'),
            'berlaku' => set_value('berlaku'),
            );

        $data['kategori']=$this->db->get('kategori')->result();
        $data['jenisbarang']=$this->db->get('jenisbarang')->result();
        $data['Merek']=$this->db->get('merek')->result();
        $data['warna']=$this->db->get('warna')->result();
        $data['size']=$this->db->get('size')->result();
        $this->template->load('template','barang/barang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {


          // $kategori=$this->input->post('idKategori');
          // $dataKategori=$this->db->get_where('kategori',array('kategori'=>$kategori))->row_array();
          $merek=$this->input->post('idMerek');
          $dataMerek=$this->db->get_where('merek',array('merek'=>$merek))->row_array();
          $barang=$this->db->get_where('jenisbarang',array('Barang'=>$this->input->post('barang',TRUE)))->row_array();

          $data = array(
            'barang' => $barang['id'],
            // 'idKategori' => $dataKategori['id'],
            'idMerek' => $dataMerek['id'],
            'status' => $this->input->post('status',TRUE),
            'keterangan' => $this->input->post('keterangan',TRUE),
            // 'kode' => $this->input->post('kode',TRUE),
            );


          $this->Barang_model->insert($data);

          $barang = $this->db->get_where('barang',$data)->row_array();
          $idbarang = $barang['id'];
          $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();
          $detailbarang = $this->db->get_where('detailbarang',array('idCabang'=>$admin['idCabang'],'idBarang'=>null))->result();

// print_r($detailbarang);
// die;

          foreach ($detailbarang as $d) {
            $this->db->where(array('idCabang'=>$d->idCabang,'idBarang'=>$d->idBarang));
            $this->db->update('detailbarang',array(
                'idBarang'=> $idbarang,
                    // 'idWarna'=> $d->idWarna,
                    // 'idUkuran'=> $d->idUkuran,
                    // 'idCabang'=>$admin['idCabang'],
                    // 'kodeBarang'=>$d->kodeBarang,
                    // 'hargaEcer'=>$d->hargaEcer
                ));
                // $this->db->delete('detailbarang_temp');

        }



        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(site_url('barang'));
    }
}

public function update($id) 
{

    $row = $this->Barang_model->get_by_id($id);
    // $kategori = $this->db->get_where('kategori',array('id'=>$row->idKategori))->row_array();
    $barang=$this->db->get_where('jenisbarang',array('id'=>$row->barang))->row_array();
    $merek = $this->db->get_where('merek',array('id'=>$row->idMerek))->row_array();
    
    if ($row) {
        $data = array(
            'button' => 'Update',
            'action' => site_url('barang/update_action'),
            'id' => set_value('id', $row->id),
            'barang' => set_value('barang', $barang['Barang']),

            // 'idKategori' => set_value('idKategori', $kategori['kategori']),
            'idMerek' => set_value('idMerek',$merek['merek']),
            'status' => set_value('status', $row->status),
            'keterangan' => set_value('keterangan', $row->keterangan),
            'berlaku' => set_value('berlaku'),
            );

        // $data['jenisbarang']=$this->db->get('jenisbarang')->result();
        $data['Merek']=$this->db->get('merek')->result();
        $data['warna']=$this->db->get('warna')->result();
        $data['size']=$this->db->get('size')->result();

        $this->template->load('template','barang/barang_form_edit', $data);
    } else {
        $this->session->set_flashdata('message', 'Record Not Found');
        redirect(site_url('barang'));
    }
}

public function update_action() 
{
    $this->_rules();
    if ($this->form_validation->run() == FALSE) {
        $this->update($this->input->post('id', TRUE));
    } else {
        // $kategori=$this->input->post('idKategori');
        $merek=$this->input->post('idMerek');

        // $dataKategori=$this->db->get_where('kategori',array('kategori'=>$kategori))->row_array();
        $dataMerek = $this->db->get_where('merek',array('merek'=>$merek))->row_array();


        $data = array(
            // 'barang' => $this->input->post('barang',TRUE),
            // 'idKategori' => $dataKategori['id'],
            // 'idMerek' => $dataMerek['id'],
            'status' => $this->input->post('status',TRUE),
            'keterangan' => $this->input->post('keterangan',true)
            );

        $this->Barang_model->update($this->input->post('id', TRUE), $data);



        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('barang'));

    }
}

public function delete($id) 
{

    $ro = $this->Barang_model->get_by_id_barang($id);

    if($ro){

        $this->Barang_model->delete_barang($id);

        $row = $this->Barang_model->get_by_id($id);

        if ($row) {
            $this->Barang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }

        $this->session->set_flashdata('message', 'Record Not Found');
        redirect(site_url('barang'));
    }

    $row = $this->Barang_model->get_by_id($id);

    if ($row) {
        $this->Barang_model->delete($id);
        $this->session->set_flashdata('message', 'Delete Record Success');
        redirect(site_url('barang'));
    } else {
        $this->session->set_flashdata('message', 'Record Not Found');
        redirect(site_url('barang'));
    }

    $this->session->set_flashdata('message', 'Record Not Found');
    redirect(site_url('barang'));

}

public function a()
{
    $this->session->userdata();
}

public function _rules() 
{
    $this->form_validation->set_rules('barang', 'barang', 'trim|required');
    // $this->form_validation->set_rules('kode', 'kode', 'trim|required|is_unique[barang.kode]');
    // $this->form_validation->set_rules('idKategori', 'idkategori', 'trim|required');
    $this->form_validation->set_rules('idMerek', 'idmerek', 'trim|required');
    // $this->form_validation->set_rules('hargaEcer', 'hargaecer', 'trim|required');
    // $this->form_validation->set_rules('idSatuan', 'idsatuan', 'trim|required');
    // $this->form_validation->set_rules('hargaGrosir', 'hargagrosir', 'trim|required');
    $this->form_validation->set_rules('status', 'status', 'trim|required');

    $this->form_validation->set_rules('id', 'id', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
}


// public function _ruless() 
// {
// 	$this->form_validation->set_rules('barang', 'barang', 'trim|required');
// 	// $this->form_validation->set_rules('gambar', 'gambar', 'trim|required');
// 	$this->form_validation->set_rules('idKategori', 'idkategori', 'trim|required');
// 	$this->form_validation->set_rules('idMerek', 'idmerek', 'trim|required');
// 	// $this->form_validation->set_rules('hargaEcer', 'hargaecer', 'trim|required');
// 	// $this->form_validation->set_rules('idSatuan', 'idsatuan', 'trim|required');
// 	// $this->form_validation->set_rules('hargaGrosir', 'hargagrosir', 'trim|required');
// 	$this->form_validation->set_rules('status', 'status', 'trim|required');

// 	$this->form_validation->set_rules('id', 'id', 'trim');
// 	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
// }

// public function _rulesdetailbarang()
// {
//  $this->form_validation->set_rules('kodeBarang', 'kodeBarang', 'trim|required|is_unique[detailbarang.kodeBarang]');
//  $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
// }


public function add_barang()
{

    $idWarna = $_GET['idWarna'];
    $idUkuran = $_GET['idUkuran'];
    // $kode = $_GET['kode'];

    
    $merek = $this->db->get_where('merek',array('merek'=>$_GET['merek']))->row_array();
    $barang=$this->db->get_where('jenisbarang',array('Barang'=>$_GET['barang']))->row_array();
    $warna = $this->db->get_where('warna',array('warna'=>$idWarna))->row_array();
    $ukuran = $this->db->get_where('size',array('size'=>$idUkuran))->row_array();
    $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();
    $pembelian = $this->db->query('SELECT MAX(id) AS id FROM pembelian')->row_array();
    $kodebeli=$pembelian['id']+1;
    $kode=$barang['Kode'].$merek['kode'].$warna['kode'].$ukuran['kode'].$admin['idCabang'];


    $caridata = $this->db->get_where('detailbarang',array('kodeBarang'=>$kode))->row_array();

    // if($caridata==null){
    $datatemp = array(
        'idBarang'=>NULL,
        'idUkuran'=>$ukuran['id'],
        'idWarna'=>$warna['id'],
        'hargaEcer'=>$_GET['harga'],
        'stokAwal'=>0,
        'idCabang'=>$admin['idCabang'],
        'kodeBarang'=>$kode,
            // 'idAdmin'=>$this->session->userdata['id'],
        );

    $this->db->insert('detailbarang',$datatemp);
// }
// else {
// echo "data sudah ada";
// }

}



public function add_barang_ubah()
{

    $idWarna = $_GET['idWarna'];
    $idUkuran = $_GET['idUkuran'];
    $idBarang = $_GET['idBarang'];

    $merek = $this->db->get_where('merek',array('merek'=>$_GET['merek']))->row_array();
    $barang=$this->db->get_where('jenisbarang',array('Barang'=>$_GET['barang']))->row_array();
    $warna = $this->db->get_where('warna',array('warna'=>$idWarna))->row_array();
    $ukuran = $this->db->get_where('size',array('size'=>$idUkuran))->row_array();
    $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();

    $kode=$barang['Kode'].$merek['kode'].$warna['kode'].$ukuran['kode'].$admin['idCabang'];

// print_r($kode);
// die;
    $caridata = $this->db->get_where('detailbarang',array('kodeBarang'=>$kode))->row_array();

    $datatemp = array(
        'idBarang'=>$idBarang,
        'idUkuran'=>$ukuran['id'],
        'idWarna'=>$warna['id'],
        'hargaEcer'=>$_GET['harga'],
        'stokAwal'=>0,
        'idCabang'=>$admin['idCabang'],
        'kodeBarang'=>$kode,
            // 'idAdmin'=>$this->session->userdata['id'],
        );

    $this->db->insert('detailbarang',$datatemp);


}



public function list_barang()
{
    $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();

    $sql='SELECT dt.id as iddetail, dt.idWarna, w.warna, s.size, dt.hargaEcer, dt.kodeBarang, dt.idCabang, dt.idBarang FROM warna w, size s, detailbarang dt WHERE dt.idWarna=w.id and dt.idUkuran=s.id AND dt.idBarang is null and dt.idCabang="'.$admin['idCabang'].'" ';
    $barang=$this->db->query($sql)->result();
    echo "
    <div class='col-md-12 col-sm-12 col-xs-12'>
        <div class='x_panel'>
            <div class='x_title'>
                <h2>Tabel Detail Barang</h2>
                <div class='clearfix></div>
            </div>
            <div class='x_content'>


                <table class='table table-bordered'>
                    <tr>
                        <th>No</th>
                        <th>Warna</th>
                        <th>Ukuran</th>
                        <th>Harga </th>
                        <th>kode barang</th>

                        <th>aksi</th>
                    </tr>";
                    $no=1;
                    foreach ($barang as $b) {
                        echo "<tr>
                        <td>$no</td>
                        <td>$b->warna</td>
                        <td>$b->size</td>
                        <td>$b->hargaEcer</td>
                        <td>$b->kodeBarang</td>

                        <td><a onclick='remove($b->iddetail)'>Delete</td>
                    </tr>";
                    $no++;
                }

                echo "</table>   </div>
            </div>
        </div>";

    }

    public function list_barang_ubah()
    {

        $idBarang = $_GET['idBarang'];

        $sql='SELECT dt.idCabang, dt.id as iddetail, dt.idWarna, w.warna, s.size, dt.hargaEcer, dt.kodeBarang 
        FROM barang b, detailbarang dt, warna w, size s WHERE dt.idWarna=w.id and dt.idUkuran=s.id and b.id=dt.idBarang and b.id="'.$idBarang.'"';
        $barang=$this->db->query($sql)->result();
        echo "
        <div class='col-md-12 col-sm-12 col-xs-12'>
            <div class='x_panel'>
                <div class='x_title'>
                    <h2>Tabel Detail Barang</h2>
                    <div class='clearfix></div>
                </div>
                <div class='x_content'>


                    <table class='table table-bordered'>
                        <tr>
                            <th>No</th>
                            <th>Warna</th>
                            <th>Ukuran</th>
                            <th>Harga</th>
                            <th>kode barang</th>
                            <th>Cabang</th>
                            <th>aksi</th>

                        </tr>";
                        $no=1;
                        foreach ($barang as $b) {
                            echo "<tr>
                            <td>$no</td>
                            <td>$b->warna</td>
                            <td>$b->size</td>
                            <td>$b->hargaEcer</td>
                            <td>$b->kodeBarang</td>
                            <td>$b->idCabang</td>
                            <td><a onclick='remove($b->iddetail)'>Delete</td>


                        </tr>";
                        $no++;
                    }

                    echo "</table>   </div>
                </div>
            </div>";

        }

        public function remove_barang()
        {

         $id=$_GET['id'];
         $this->db->where('id',$id);
         $this->db->delete('detailbarang');
     }

     public function remove_barang_ubah()
     {

         $id=$_GET['id'];
         $this->db->where('id',$id);
         $this->db->delete('detailbarang');
     }


 }

 /* End of file Barang.php */
 /* Location: ./application/controllers/Barang.php */
 /* Please DO NOT modify this information : */
 /* Generated by Harviacode Codeigniter CRUD Generator 2017-11-11 14:42:29 */
/* http://harviacode.com */