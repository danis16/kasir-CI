<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hutang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Hutang_model');
        $this->load->library('form_validation');
         $this->mainlib->logged_in();
    }    
function data() {
        $table = 'view_hutang';
        $primaryKey = 'id';
        $columns = array(
         array('db' => 'id', 'dt' => 0),
array('db' => 'idPembelian', 'dt' => 1),
array('db' => 'tanggalWajibBayar', 'dt' => 2,
         'formatter' => function( $d, $row ) {
            return date( 'l, j F Y', strtotime($d));
        }

    ),
array('db' => 'nama', 'dt' => 3),
array('db' => 'kekuranganPembayaran', 'dt' => 4,
    'formatter' => function ($d,$row)
    {
        return "Rp ".number_format($d, 2,",",".");

    }
    ),
array('db' => 'status', 'dt' => 5),
array(
                'db' => 'id',
                'dt' => 6,
                'formatter' => function( $d, $row ) {
            return 
            // anchor('Hutang/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Hutang/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'")
                   // .' '.
                   // anchor('Hutang/delete/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'")

                    ;
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
        $hutang = $this->Hutang_model->get_all();

        $data = array(
            'hutang_data' => $hutang
        );

        $this->template->load('template','hutang/hutang_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Hutang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'idPembelian' => $row->idPembelian,
		'tanggalWajibBayar' => $row->tanggalWajibBayar,
		'kekuranganPembayaran' => $row->kekuranganPembayaran,
		'status' => $row->status,
	    );
            $this->load->view('hutang/hutang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hutang'));
        }
    }

    public function create() 
    { 
        // print_r($idpembelian);
        // die;
        $data = array(
            'button' => 'Create',
            'action' => site_url('hutang/create_action'),
        'id' => set_value('id'),
        'idSupplier' => set_value('idSupplier'),
        'tanggalWajibBayar' => set_value('tanggalWajibBayar'),
        'kekuranganPembayaran' => set_value('kekuranganPembayaran'),
        // '' => set_value('kekuranganPembayaran'),
        'status' => set_value('status'),
    );
        $data['supplier']=$this->db->get_where('pelanggan',array('status'=>'supplier'))->result();
        $this->template->load('template','hutang/hutang_create', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
        $pembelian=$this->db->query('SELECT * FROM pembelian ORDER BY id DESC LIMIT 1')->row_array();
        // $supplier = $this->db->get_where('pembelian',array('idSupplier'=>$pembelian['idSupplier'],'idAdmin'=>$this->session->userdata('id')))->row_array();
        $idpembelian = $this->db->query('SELECT max(id) as max FROM pembelian')->row_array();
            $data = array(
        'idPembelian' => $idpembelian['max'],
		'idSupplier' => $pembelian['idsupplier'],
		'tanggalWajibBayar' => $this->input->post('tanggalWajibBayar',TRUE),
		'kekuranganPembayaran' => $this->input->post('kekuranganPembayaran',TRUE),
		'status' => "BELUM LUNAS",
	    );

            $this->Hutang_model->insert($data);
            $idhutang = $this->db->query('SELECT max(id) as max FROM hutang')->row_array();
            $datadetailhutang = array(
                'idHutang' => $idhutang['max'],
                'idAdmin' => $this->session->userdata('id'),
                'tanggal' => date('Y-m-d'),
                'bayar' => 0,
             );

            $this->load->model('detailhutang_model');
            $this->detailhutang_model->insert($datadetailhutang);

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('hutang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Hutang_model->get_by_id($id);

        if ($row) {
            $supplier=$this->db->get_where('pelanggan',array('status'=>'supplier'))->row_array();
            $data = array(
                'button' => 'Update',
                'action' => site_url('hutang/update_action'),
		'id' => set_value('id', $row->id),
		'idSupplier' => set_value('idSupplier', $supplier['nama']),
		'tanggalWajibBayar' => set_value('tanggalWajibBayar', $row->tanggalWajibBayar),
		'kekuranganPembayaran' => set_value('kekuranganPembayaran', $row->kekuranganPembayaran),
		'status' => set_value('status', $row->status),
	    );
            $data['supplier']=$this->db->get_where('pelanggan',array('status'=>'supplier'))->result();
            $this->template->load('template','hutang/hutang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hutang'));
        }
    }
    
  //   public function update_action() 
  //   {
        
  //       $this->_rules();

  //       if ($this->form_validation->run() == FALSE) {
  //           $this->update($this->input->post('id', TRUE));
  //       } else {
  //           $data = array(
		// 'idPelanggan' => $this->input->post('idPelanggan',TRUE),
		// 'tanggalWajibBayar' => $this->input->post('tanggalWajibBayar',TRUE),
		// 'kekuranganPembayaran' => $this->input->post('kekuranganPembayaran',TRUE),
  //       'status' => $this->input->post('status',TRUDDE),
		// // 'status' => $status,
	 //    );

  //           $this->Hutang_model->update($this->input->post('id', TRUE), $data);
  //           $this->session->set_flashdata('message', 'Update Record Success');
  //           redirect(site_url('hutang'));
  //       }
  //   }
    
    // public function delete($id) 
    // {
    //     $row = $this->Hutang_model->get_by_id($id);

    //     if ($row) {
    //         $this->Hutang_model->delete($id);
    //         $this->session->set_flashdata('message', 'Delete Record Success');
    //         redirect(site_url('hutang'));
    //     } else {
    //         $this->session->set_flashdata('message', 'Record Not Found');
    //         redirect(site_url('hutang'));
    //     }
    // }

    public function _rules() 
    {
	// $this->form_validation->set_rules('idPembelian', 'idpembelian', 'trim|required');
	$this->form_validation->set_rules('tanggalWajibBayar', 'tanggalwajibbayar', 'trim|required');
	$this->form_validation->set_rules('kekuranganPembayaran', 'kekuranganpembayaran', 'trim|required');
	// $this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


    public function bayar()
    {

        $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata['username']))->row_array();
        $this->db->insert('detailhutang',array(
            'idHutang'=>$_GET['idhutang'],
            'idAdmin'=>$admin['id'],
            'tanggal'=>date('Y-m-d'),
            'bayar'=>$_GET['bayar']
            ));
    }

    public function list()
    {
        echo ' <table class="table table-bordered" >
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Jumlah Bayar</th>
            <th>Admin</th>
            <th>Aksi</th>
        </tr>
        ';

        $this->db->select('tanggalWajibBayar,bayar,username,detailhutang.id as id');
        $this->db->from('detailhutang');
        $this->db->join('admin','admin.id=detailhutang.idAdmin');
        $this->db->join('hutang','hutang.id=detailhutang.idHutang');
        $this->db->where('hutang.id',$_GET['idhutang']);
        $query=$this->db->get()->result();

$no=1;
        foreach ($query as $q) {
            echo '<tr><td>'.$no.'</td>';
            echo '<td>'.$q->tanggalWajibBayar.'</td>';
            echo '<td>'.$q->bayar.'</td>';
            echo '<td>'.$q->username.'</td>';
            echo "<td><a onclick='remove($q->id)' >Delete</td>";
        $no++;
        }

    $sql='SELECT SUM(bayar) as totalbayar FROM `detailhutang` WHERE idHutang='.$_GET['idhutang'].'';
    $totalbayar=$this->db->query($sql)->row_array();
    $kurangbayar=$_GET['kurangbayar']-$totalbayar['totalbayar'];
    if($totalbayar['totalbayar']>=$_GET['kurangbayar']){
        $status="LUNAS";
         $this->Hutang_model->update($_GET['idhutang'],array('status'=>$status));

    }
    else{
        $status="BELUM LUNAS";
        $this->Hutang_model->update($_GET['idhutang'],array('status'=>$status));
    }

    echo'

        </tr>
        <tr>
        <td colspan=3><b>Total Bayar</b></td>
        <td colspan=2><b>'.$totalbayar['totalbayar'].'</b></td>
        </tr>

        <tr>
        <td colspan=3><b>Kurang Pembayaran</b></td>
        <td colspan=2><b>'.$kurangbayar.'</b></td>
        </tr>


        <tr>
        <td colspan=3><b>STATUS</b></td>
        <td colspan=2><b>'.$status.'</b></td>
        </tr>
        </table>';
    }

public function remove()
{
    print_r($_GET['id']);
    $this->db->where('id',$_GET['id']);
    $this->db->delete('detailhutang');
}


}

/* End of file Hutang.php */
/* Location: ./application/controllers/Hutang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-10 22:18:20 */
/* http://harviacode.com */