<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Piutang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Piutang_model');
        $this->load->library('form_validation');
    }    
function data() {
        $table = 'piutang';
        $primaryKey = 'id';
        $columns = array(
         array('db' => 'id', 'dt' => 0),array('db' => 'id', 'dt' => 0),
array('db' => 'idPenjualan', 'dt' => 1),
array('db' => 'tanggalWajibBayar', 'dt' => 2,
  'formatter' => function( $d, $row ) {
            return date( 'l, j F Y', strtotime($d));
        }



    ),
array('db' => 'kekuraganPembayaran', 'dt' => 3,
'formatter' => function ($d, $row)
{
    return "Rp ".number_format($d,"2",",",".");
}

    ),
array('db' => 'status', 'dt' => 4),
array(
                'db' => 'id',
                'dt' => 5,
                'formatter' => function( $d, $row ) {
            return 
                   // anchor('Piutang/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Piutang/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'")
                   .' '.
                   anchor('Piutang/send/'.$d,'SMS',"class='btn btn-sm btn-danger'");
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
        $this->template->load('template','piutang/piutang_list');
    }

    public function send($id)
    {
        $piutang=$this->db->get_where('piutang',array('id'=>$id))->row_array();
        $pelanggan=$this->db->get_where('pelanggan',array('id'=>$piutang['id']))->row_array();
        $detailpiutang=$this->db->get_where('detailpiutang',array('idPiutang'=>$piutang['id']))->result();
        $jumlah_hutang=$this->db->query('select sum(jumlah) as jumlah from detailpiutang where idpiutang="'.$piutang['id'].'"')->row_array();

$piutangjumlah=$piutang['kekuraganPembayaran']-$jumlah_hutang['jumlah'];

            $email_api  = urlencode("daniswara.daniswara@gmail.com");
            $passkey_api    = urlencode("akuanakbaik");
            $no_hp_tujuan   = urlencode($pelanggan['noHP']);
            $isi_pesan  = urlencode("anda memiliki utang sejumlah ".$piutangjumlah." dengan tanggal jatuh tempo ".$piutang['tanggalWajibBayar']);


            $url    = "https://reguler.medansms.co.id/sms_api.php?action=kirim_sms&email=".$email_api."&passkey=".$passkey_api."&no_tujuan=".$no_hp_tujuan."&pesan=".$isi_pesan;
            $result = file_get_contents($url);
            $data   = explode("~~~", $result);

// echo $data[0]; //1=SUKSES, selain itu GAGAL
// echo $data[1]; //Panjang SMS
// echo $data[2]; //Jumlah SMS yang dikirim
// echo $data[3]; //Total Kredit yang digunakan
// echo $data[4]; //Sisa Kredit
// echo $data[5]; //Jenis Paket SMS (1=SMS Gratis, 0=SMS Reguler/SMS Center/SMS Masking



    }

    public function read($id) 
    {
        $row = $this->Piutang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'idPenjualan' => $row->idPenjualan,
		'tanggalWajibBayar' => $row->tanggalWajibBayar,
		'kekuraganPembayaran' => $row->kekuraganPembayaran,
		'status' => $row->status,
	    );
            $this->load->view('piutang/piutang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('piutang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('piutang/create_action'),
	    'id' => set_value('id'),
	    'idPenjualan' => set_value('idPenjualan'),
	    'tanggalWajibBayar' => set_value('tanggalWajibBayar'),
	    'kekuraganPembayaran' => set_value('kekuraganPembayaran'),
	    'status' => set_value('status'),
	);
        $data['pelanggan']=$this->db->get_where('pelanggan',array('status'=>'pelanggan'))->result();
        $this->template->load('template','piutang/piutang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
             $idpenjualan = $this->db->query('SELECT max(id) as max FROM penjualan')->row_array();
             $pelanggan=$this->db->get_where('pelanggan',array('nama'=>$this->input->post('idPelanggan')))->row_array();
            $data = array(
        'idPenjualan' => $idpenjualan['max'],
        'idPelanggan' => $pelanggan['id'],
        'tanggalWajibBayar' => $this->input->post('tanggalWajibBayar',TRUE),
        'kekuraganPembayaran' => $this->input->post('kekuraganPembayaran',TRUE),
        'status' => "BELUM LUNAS",
        );

            $this->Piutang_model->insert($data);
             $idpiutang = $this->db->query('SELECT max(id) as max FROM piutang')->row_array();
            $datadetailpiutang=array(
                'idPiutang'=>$idpiutang['max'],
                'idAdmin'=>$this->session->userdata('id'),
                'date'=>date('Y-m-d'),
                'jumlah'=>0,
                );

            $this->load->model('detailpiutang_model');
            $this->detailpiutang_model->insert($datadetailpiutang);
            
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('piutang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Piutang_model->get_by_id($id);

        if ($row) {
            $pelanggan=$this->db->get_where('pelanggan',array('id'=>$row->idPelanggan))->row_array();
            $data = array(
                'button' => 'Update',
                'action' => site_url('piutang/update_action'),
		'id' => set_value('id', $row->id),
        'idPenjualan' => set_value('idPenjualan', $row->idPenjualan),
		'idPelanggan' => set_value('idPelanggan', $pelanggan['nama']),
		'tanggalWajibBayar' => set_value('tanggalWajibBayar', $row->tanggalWajibBayar),
		'kekuraganPembayaran' => set_value('kekuraganPembayaran', $row->kekuraganPembayaran),
		'status' => set_value('status', $row->status),
	    );
            $this->template->load('template','piutang/piutang_edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('piutang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            
            $data = array(
		// 'idPenjualan' => $this->input->post('idPenjualan',TRUE),
		'tanggalWajibBayar' => $this->input->post('tanggalWajibBayar',TRUE),
		'kekuraganPembayaran' => $this->input->post('kekuraganPembayaran',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Piutang_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('piutang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Piutang_model->get_by_id($id);

        if ($row) {
            $this->Piutang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('piutang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('piutang'));
        }
    }

    public function _rules() 
    {
	// $this->form_validation->set_rules('idPenjualan', 'idpenjualan', 'trim|required');
	$this->form_validation->set_rules('tanggalWajibBayar', 'tanggalwajibbayar', 'trim|required');
	$this->form_validation->set_rules('kekuraganPembayaran', 'kekuraganpembayaran', 'trim|required');
	// $this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

 public function bayar()
    {

        $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata['username']))->row_array();
        $this->db->insert('detailpiutang',array(
            'idPiutang'=>$_GET['idpiutang'],
            'idAdmin'=>$admin['id'],
            'date'=>date('Y-m-d'),
            'jumlah'=>$_GET['bayar']
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

        $this->db->select('date,jumlah,username,detailpiutang.id as id');
        $this->db->from('detailpiutang');
        $this->db->join('admin','admin.id=detailpiutang.idAdmin');
        $this->db->join('piutang','piutang.id=detailpiutang.idPiutang');
        $this->db->where('piutang.id',$_GET['idpiutang']);
        $query=$this->db->get()->result();

$no=1;
        foreach ($query as $q) {
            echo '<tr><td>'.$no.'</td>';
            echo '<td>'.$q->date.'</td>';
            echo '<td>'.$q->jumlah.'</td>';
            echo '<td>'.$q->username.'</td>';
            echo "<td><a onclick='remove($q->id)' >Delete</td>";
        $no++;
        }


    $sql='SELECT SUM(jumlah) as totalbayar FROM `detailpiutang` WHERE idPiutang='.$_GET['idpiutang'].'';
    $totalbayar=$this->db->query($sql)->row_array();
    $kurangbayar=$_GET['kurangbayar']-$totalbayar['totalbayar'];
    if($totalbayar['totalbayar']>=$_GET['kurangbayar']){
        $status="LUNAS";
         $this->Piutang_model->update($_GET['idpiutang'],array('status'=>$status));

    }
    else{
        $status="BELUM LUNAS";
        $this->Piutang_model->update($_GET['idpiutang'],array('status'=>$status));
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
    $this->db->delete('detailpiutang');
}


}

/* End of file Piutang.php */
/* Location: ./application/controllers/Piutang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-12 12:39:11 */
/* http://harviacode.com */