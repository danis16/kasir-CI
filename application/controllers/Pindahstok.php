<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pindahstok extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pindahstok_model');
        $this->load->library('form_validation');
        $this->mainlib->logged_in();
    }    
    function data() {
        $table = 'view_pindahstok';
        $primaryKey = 'id';
        $columns = array(
           array('db' => 'id', 'dt' => 0),array('db' => 'id', 'dt' => 0),
           array('db' => 'username', 'dt' => 1),
           array('db' => 'yangmenerima', 'dt' => 2),
           array('db' => 'idCabang', 'dt' => 3),
           array('db' => 'tanggal', 'dt' => 4,
  'formatter' => function( $d, $row ) {
            return date( 'l, j F Y', strtotime($d));
        }


            ),
           array('db' => 'keterangan', 'dt' => 5),
           array(
            'db' => 'id',
            'dt' => 6,
            'formatter' => function( $d, $row ) {
                return 
                anchor('Pindahstok/export_pdf/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'");
            // .' '.
            // anchor(.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'");
            // .' '.
                   // anchor('Pindahstok/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'").' '.
                   // anchor('Pindahstok/delete/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
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
        $pindahstok = $this->Pindahstok_model->get_all();

        $data = array(
            'pindahstok_data' => $pindahstok
            );

        $this->template->load('template','pindahstok/pindahstok_list', $data);
    }

    public function read($id) 
    {

        $row = $this->Pindahstok_model->get_by_id($id);
        if ($row) {
            $data = array(
              'id' => $row->id,
              'idAdmin' => $row->idAdmin,
              'YangMenerima' => $row->YangMenerima,
              'idCabang' => $row->idCabang,
              'tanggal' => $row->tanggal,
              'keterangan' => $row->keterangan,
              );
            $this->load->view('pindahstok/pindahstok_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pindahstok'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pindahstok/create_action'),
            'id' => set_value('id'),
            'idAdmin' => set_value('idAdmin'),
            'YangMenerima' => set_value('YangMenerima'),
            'idCabang' => set_value('idCabang'),
            'tanggal' => set_value('tanggal'),
            'keterangan' => set_value('keterangan'),
            ); 
        $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();
        
        $data['cabang'] = $this->db->query('select * from ADMIN where idcABANG != '.$admin['idCabang'].'')->result();
        $cabang = $this->db->query('select * from ADMIN where idcABANG != '.$admin['idCabang'].'')->row_array();
        $data['admin'] = $this->db->get('admin')->result();

        $data['barang']=$this->db->query('select db.id as iddetail, b.barang, w.warna, s.size, m.merek, db.kodeBarang
            from barang b, detailbarang db, warna w, merek m, size s 
            where b.id=db.idBarang and m.id=b.idMerek and s.id=db.idUkuran and w.id=db.idWarna AND DB.idcABANG='.$admin['idCabang'].' 
            GROUP by db.kodeBarang, b.barang, s.size, m.merek, w.warna asc')->result();

        $this->template->load('template','pindahstok/pindahstok_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
         $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();
         $cabang = $this->db->query('select idCabang from admin where idCabang != "'.$admin['idCabang'].'"')->row_array();
         $data = array(
          'idAdmin' => $admin['id'],
          'YangMenerima' => $this->input->post('YangMenerima',TRUE),
          'idCabang' => $cabang['idCabang'],
          'tanggal' => date('Y-m-d'),
          'keterangan' => $this->input->post('keterangan',TRUE),
          );

         $this->Pindahstok_model->insert($data);

         $pindahstok=$this->db->get_where('pindahstok',$data)->row_array();
         $idpindahstok=$pindahstok['id'];

         $datatemp=$this->db->get_where('detailpindahstok',array('idPindahStok'=>0))->result();;

         foreach ($datatemp as $d) {
            $this->db->where('idPindahStok',$d->idPindahStok);
            $this->db->update('detailpindahstok',array(
                'idPindahStok'=>$idpindahstok,
                    // 'idDetailBarang'=>$d->idDetailBarang,
                    // 'jumlah'=>$d->jumlah,
                'idAdmin'=>$admin['id']
                ));
                // $this->db->delete('detailpindahstok_temp');

        }

        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(site_url('pindahstok'));
    }
}

public function update($id) 
{
    $row = $this->Pindahstok_model->get_by_id($id);

    if ($row) {
        $data = array(
            'button' => 'Update',
            'action' => site_url('pindahstok/update_action'),
            'id' => set_value('id', $row->id),
            'idAdmin' => set_value('idAdmin', $row->idAdmin),
            'YangMenerima' => set_value('YangMenerima', $row->YangMenerima),
            'idCabang' => set_value('idCabang', $row->idCabang),
            'tanggal' => set_value('tanggal', $row->tanggal),
            'keterangan' => set_value('keterangan', $row->keterangan),
            );
        $this->template->load('template','pindahstok/pindahstok_form', $data);
    } else {
        $this->session->set_flashdata('message', 'Record Not Found');
        redirect(site_url('pindahstok'));
    }
}

public function update_action() 
{
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
        $this->update($this->input->post('id', TRUE));
    } else {
        $data = array(
          'idAdmin' => $this->input->post('idAdmin',TRUE),
          'YangMenerima' => $this->input->post('YangMenerima',TRUE),
          'idCabang' => $this->input->post('idCabang',TRUE),
          'tanggal' => $this->input->post('tanggal',TRUE),
          'keterangan' => $this->input->post('keterangan',TRUE),
          );

        $this->Pindahstok_model->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('pindahstok'));
    }
}

public function delete($id) 
{
    $row = $this->Pindahstok_model->get_by_id($id);

    if ($row) {
        $this->Pindahstok_model->delete($id);
        $this->session->set_flashdata('message', 'Delete Record Success');
        redirect(site_url('pindahstok'));
    } else {
        $this->session->set_flashdata('message', 'Record Not Found');
        redirect(site_url('pindahstok'));
    }
}

public function _rules() 
{
	// $this->form_validation->set_rules('idAdmin', 'idadmin', 'trim|required');
	$this->form_validation->set_rules('YangMenerima', 'yangmenerima', 'trim|required');
	// $this->form_validation->set_rules('idCabang', 'idcabang', 'trim|required');
	// $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	// $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
}

public function add_stok()
{
    
    $ambildetailbarang = $this->db->get_where('detailbarang',array('kodeBarang'=>$_GET['idbarang']))->row_array();

        // $idDetailBarang=$ambildetailbarang['id'];

    $jumlah=$_GET['jumlah'];
    $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata['username']))->row_array();
    
    $detailbarang=$this->db->get_where('detailbarang',array('kodeBarang'=>$_GET['idbarang']))->row_array();
    
    $stok=$detailbarang['stokAwal']-$jumlah;
    
    $this->load->model('Detailbarang_model');
    $editStok=array('stokAwal'=>$stok);
    $this->Detailbarang_model->update($detailbarang['id'],$editStok);

    $insertDetailtemp=array(
        'idDetailBarang'=>$detailbarang['id'],
        'jumlah'=>$jumlah,
        'idAdmin'=>$admin['id']
        );

    $this->db->insert('detailpindahstok',$insertDetailtemp);
    $cabang = $this->db->query('SELECT * FROM admin WHERE idCabang!='.$admin['idCabang'].' GROUP BY idCabang')->row_array();
    $caridata=$this->db->get_where('detailbarang',array(
        'idBarang'=>$detailbarang['idBarang'],
        'idWarna'=>$detailbarang['idWarna'],
        'idUkuran'=>$detailbarang['idUkuran'],
        'hargaEcer'=>$detailbarang['hargaEcer'],
            // 'idSatuan'=>$detailbarang['idSatuan'],
            // 'hargaGrosir'=>$detailbarang['hargaGrosir'],
            // 'berlaku'=>$detailbarang['berlaku'],
        'idCabang'=>$cabang['idCabang'],
            // 'kodeBarang'=>$detailbarang['kodeBarang']
        ))->row_array();

    $databarang = $this->db->get_where('barang',array('id'=>$detailbarang['idBarang']))->row_array();
    $jenisbarang=$this->db->get_where('jenisbarang',array('id'=>$databarang['barang']))->row_array();
    $merek = $this->db->get_where('merek',array('id'=>$databarang['idMerek']))->row_array();

    

    // $kode = $this->db->get_where('barang',array('id'=>$ambildetailbarang['idBarang']))->row_array();
    $warna = $this->db->get_where('warna',array('id'=>$ambildetailbarang['idWarna']))->row_array();
    $ukuran = $this->db->get_where('size',array('id'=>$ambildetailbarang['idUkuran']))->row_array();
    $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();
    // $cabang = $this->db->get_where('cabang',array('id'=>$admin['idCabang']))->row_array();
    $cabang = $this->db->query('select * from ADMIN where idCabang != '.$admin['idCabang'].'')->row_array();
    
    $kode=$jenisbarang['Kode'].$merek['kode'].$warna['kode'].$ukuran['kode'].$cabang['idCabang'];
    // $kode=$kode['kode'].$warna['kode'].$ukuran['kode'].$cabang['idCabang'];
    if($caridata==null){
        $datadetailbaru=array(
            'idBarang'=>$detailbarang['idBarang'],
            'idWarna'=>$detailbarang['idWarna'],
            'idUkuran'=>$detailbarang['idUkuran'],
            'hargaEcer'=>$detailbarang['hargaEcer'],
            // 'idSatuan'=>$detailbarang['idSatuan'],
            // 'hargaGrosir'=>$detailbarang['hargaGrosir'],
            // 'berlaku'=>$detailbarang['berlaku'],
            'stokAwal'=>$jumlah,
            'idCabang'=>$cabang['idCabang'],
            'kodeBarang'=>$kode,
            // 'idDetailPembelian'=>$detailbarang['idDetailPembelian']
            );            

        $this->Detailbarang_model->insert($datadetailbaru);

    }
    else{
            // $detailbarang=$this->db->get_where('detailbarang',array(''))
        $stokakhir=$jumlah+$caridata['stokAwal'];
        $this->Detailbarang_model->update($caridata['id'],array('stokAwal'=>$stokakhir));



    }


}

public function list()
{
    $idbarang = $_GET['idbarang'];

    echo " 


    <div class='col-md-12 col-sm-12 col-xs-12'>
        <div class='x_panel'>
            <div class='x_title'>
                <h2>Tabel Detail Pindah Stok</h2>
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
                     <th>Aksi</th>
                 </tr>
                 

                 ";
                 $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata['username']))->row_array();
                 $sql='SELECT dt.id AS iddetail, db.id ,jb.barang, dt.jumlah, m.merek, s.size, w.warna
                 FROM barang b, detailbarang db, detailpindahstok dt, merek m, size s, warna w, jenisbarang jb
                 WHERE b.id=db.idBarang AND db.id=dt.idDetailBarang AND b.idMerek=m.id AND db.idUkuran = s.id AND jb.id=b.barang AND db.idWarna = w.id AND dt.idPindahStok=0';

// and db.idCabang=c.id and c.id="'.$admin['idCabang'].'"
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
                    <td><a onclick='remove($b->iddetail)'>delete</a></td>

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
    $idCabang=$_GET['idCabang'];

    $detailtemp=$this->db->get_where('detailpindahstok',array('id'=>$id))->row_array();
    $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata['username']))->row_array();

    $datadetail_asal=$this->db->get_where('detailbarang',array('id'=>$detailtemp['idDetailBarang'],'idCabang'=>$admin['idCabang']))->row_array();
    $datadetail_yangdituju=$this->db->get_where('detailbarang',array(
        'idBarang'=>$datadetail_asal['idBarang'],
        'idWarna'=>$datadetail_asal['idWarna'],
        'idUkuran'=>$datadetail_asal['idUkuran'],
        'hargaEcer'=>$datadetail_asal['hargaEcer'],
            // 'idSatuan'=>$datadetail_asal['idSatuan'],
            // 'hargaGrosir'=>$datadetail_asal['hargaGrosir'],
            // 'berlaku'=>$datadetail_asal['berlaku'],
        'idCabang'=>$idCabang
        ))->row_array();
        // $datatemp = $this->db->get_where('detailpembelian_temp',array('id'=>$id))->row_array();
    
    $stokAsal = $datadetail_asal['stokAwal']+$detailtemp['jumlah'];
    $stokYangDituju=$datadetail_yangdituju['stokAwal']-$detailtemp['jumlah'];


    $this->load->model('Detailbarang_model');

    $editStok_asal = array(
        'stokAwal' => $stokAsal
        );
    
    $this->Detailbarang_model->update($datadetail_asal['id'], $editStok_asal);



    $editStok_yangdituju = array(
        'stokAwal' => $stokYangDituju
        );
    
    $this->Detailbarang_model->update($datadetail_yangdituju['id'], $editStok_yangdituju);


    $this->db->where('id',$id);
    $this->db->delete('detailpindahstok');
    # code...
}



public function export_pdf()
{

    $this->load->library('pdf');

    $data['atas']=$this->db->query('SELECT * FROM pindahstok p, admin a WHERE p.idAdmin=a.id ORDER BY p.id DESC LIMIT 1
        ')->row_array();
    $idPindahStok=$this->db->query('SELECT * FROM pindahstok ORDER BY id DESC LIMIT 1')->row_array();
    $data['bawah']=$this->db->query('SELECT jb.barang,size,warna,jumlah,kodeBarang FROM detailpindahstok dp, detailbarang db, jenisbarang jb, barang b, merek m, size s, warna w  
        WHERE dp.idPindahStok="'.$idPindahStok['id'].'"
        AND db.id=dp.idDetailBarang AND b.id=db.idBarang AND b.idMerek=m.id and jb.id=b.barang
        AND db.idUkuran=s.id AND db.idWarna=w.id')->result();

    $this->load->view('pindahstok/pindahstok_read',$data);


}



}

/* End of file Pindahstok.php */
/* Location: ./application/controllers/Pindahstok.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-21 19:01:19 */
/* http://harviacode.com */