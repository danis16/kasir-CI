<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembelian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pembelian_model');
        $this->load->library('form_validation');
        $this->mainlib->logged_in();
    }    

    public function ss()
    {
        print_r($this->session->userdata());
    }
    function data() {
        $table = 'view_pembelian';
        $primaryKey = 'id';
        $columns = array(
         array('db' => 'id', 'dt' => 0),array('db' => 'id', 'dt' => 0),
         array('db' => 'noNota', 'dt' => 1),
         array('db' => 'tanggal', 'dt' => 2,
  'formatter' => function( $d, $row ) {
            return date( 'l, j F Y', strtotime($d));
        }



            ),
         array('db' => 'nama', 'dt' => 3),
         array('db' => 'WajibMembayar', 'dt' => 4,
            'formatter'=>function($d, $row){
                return 'Rp '.number_format($d,2,",",".");
            }

            ),
         array('db' => 'status', 'dt' => 5),
// array('db' => 'YangDiBayar', 'dt' => 6),
         array('db' => 'username', 'dt' => 6),
         array(
            'db' => 'id',
            'dt' => 7,
            'formatter' => function( $d, $row ) {
                return anchor('Pembelian/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'");
                // .' '.
                // anchor('Pembelian/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'").' '
                // .anchor('Pembelian/delete/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
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

    public function x(){
        print_r($this->session->userdata());
    }

    public function index()
    {
        $pembelian = $this->Pembelian_model->get_all();

        $data = array(
            'pembelian_data' => $pembelian
            );

        $this->template->load('template','pembelian/pembelian_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pembelian_model->get_by_id($id);
        if ($row) {
            $supplier=$this->db->get_where('pelanggan',array('id'=> $row->idsupplier))->row_array();
            $data = array(
                'id' => $row->id,
                'idAdmin' => $row->idAdmin,
                'noNota' => $row->noNota,
                'tanggal' => $row->tanggal,
                'idsupplier' => $supplier['nama'],
                'WajibMembayar' => $row->WajibMembayar,
                'status' => $row->status,
		// 'YangDiBayar' => $row->YangDiBayar,
                );
            $data['detailpembelian']=$this->db->query('SELECT dp.id, b.kodeBarang, p.noNota, hargaBeliSatuan, jumlahBeli, username, potongan 
FROM detailpembelian dp, detailbarang b, pembelian p, admin a
WHERE dp.idBarang=b.id AND p.id=dp.idPembelian AND dp.idAdmin=a.id and dp.idPembelian="'.$id.'"')->result();
            $this->load->view('pembelian/pembelian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian'));
        }
    }

    public function create() 
    {   
        $data = array(
            'button' => 'Create',
            'action' => site_url('pembelian/create_action'),
            'id' => set_value('id'),
            'idAdmin'=>set_value('idAdmin'),
            'noNota' => set_value('noNota'),
            'tanggal' => date('Y-m-d'),
            'idsupplier' => set_value('idsupplier'),
            // 'WajibMembayar' => set_value('WajibMembayar'),
            'status' => set_value('status'),
	    // 'YangDiBayar' => set_value('YangDiBayar'),
            ); 
        $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();
        
        $data['barang']=$this->db->query('select db.id as iddetail, jb.barang, w.warna, s.size, m.merek 
            from barang b, detailbarang db, warna w, merek m, size s, jenisbarang jb
            where b.id=db.idBarang and m.id=b.idMerek and s.id=db.idUkuran and w.id=db.idWarna AND jb.id=b.barang AND db.idCabang='.$admin['idCabang'].' 
            AND stokAwal=0 and db.status="non aktif"
            order by db.id asc')->result();
        $data['supplier']=$this->db->get_where('pelanggan',array('status'=>'supplier'))->result();
        


        $this->template->load('template','pembelian/pembelian_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $admin = $this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();
            $nama=$this->input->post('idsupplier');
            $supplier=$this->db->get_where('pelanggan',array('nama'=>$nama))->row_array();
            $sql='SELECT SUM((hargaBeliSatuan*jumlahbeli)-potongan) as jumlah FROM detailpembelian where idpembelian is null and idAdmin="'.$admin['id'].'"';
            $total=$this->db->query($sql)->row_array();
           
            $data = array(
              'noNota' => $this->input->post('noNota',TRUE),
              'idAdmin'=>$admin['id'],
              'tanggal' => $this->input->post('tanggal',TRUE),
              'idsupplier' => $supplier['id'],
              'WajibMembayar' => $total['jumlah'],
              'status' => $this->input->post('status',TRUE),
		// 'YangDiBayar' => $this->input->post('YangDiBayar',TRUE),
              );

            $this->Pembelian_model->insert($data);

            $pembelian = $this->db->get_where('pembelian',$data)->row_array();
            $idpembelian = $pembelian['id'];

            $detailpembelian_temp = $this->db->get_where('detailpembelian',array('idAdmin'=>$admin['id'],'idPembelian'=>NULL))->result();
            foreach ($detailpembelian_temp as $d) {
                $this->db->where(array('idAdmin'=>$d->idAdmin,'idPembelian'=>$d->idPembelian));
                $this->db->update('detailpembelian',array(

                    // 'idBarang' => $d->idBarang,
                    'idPembelian' => $idpembelian,
                    // 'hargaBeliSatuan' => $d->hargaBeliSatuan,
                    // 'hargaBeliTiapPak' => $d->hargaBeliTiapPak,
                    // 'jumlahBeli' => $d->JumlahBeli,

                    ));
                // $this->db->where('idBarang',$d->idBarang);

                // $updateStok = array(
                //             'st' => $gambar['file_name']
                //             );

                //         $this->Barang_model->update($this->input->post('id', TRUE), $editGambar);


                // $this->db->delete('detailpembelian_temp');
            }
            if($_POST['status']=='LUNAS') {
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('pembelian'));
            }
            else {
                redirect(site_url('hutang/create'));

            }


        }
    }
    


    public function update($id) 
    {

//         $pembelian=$this->db->get('detailpembelian')->row_array();
//         $detailbarang=$this->db->get('detailbarang')->row_array();
//         $jumlahIdPembelian=$this->db->query('SELECT jumlahbeli FROM detailpembelian dp, detailbarang db, pembelian p WHERE db.id=dp.idBarang and p.id=dp.idPembelian and db.id=11')->row_array();
//         $sql=$this->db->query('SELECT dp.idBarang as id FROM detailpembelian dp, detailbarang db WHERE dp.idBarang=db.id and dp.idPembelian='.$pembelian['idPembelian'].' and dp.idBarang=10')->row_array();

// // foreach ($detailbarang as $p) {

//         print_r($sql['id']);

//     // }

//         die;


        $row = $this->Pembelian_model->get_by_id($id);
        $supplier = $this->db->get_where('supplier',array('id'=> $row->idsupplier))->row_array();

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pembelian/update_action'),
                'id' => set_value('id', $row->id),
                'noNota' => set_value('noNota', $row->noNota),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'idsupplier' => set_value('idsupplier', $supplier['nama']),
                'WajibMembayar' => set_value('WajibMembayar', $row->WajibMembayar),
                'status' => set_value('status', $row->status),
		// 'YangDiBayar' => set_value('YangDiBayar', $row->YangDiBayar),
                );
            $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();

            $data['barang']=$this->db->query('select sa.satuan, db.id as iddetail, b.barang, w.warna, s.size, m.merek, sa.satuan 
                from barang b, detailbarang db, warna w, merek m, size s, satuan sa, cabang c 
                where b.id=db.idBarang and m.id=b.idMerek and sa.id = db.idSatuan and s.id=db.idUkuran and w.id=db.idWarna AND db.idCabang=c.id and c.id='.$admin['idCabang'].' 
                GROUP by b.barang, s.size, m.merek, w.warna, sa.satuan, c.cabang asc')->result();

            $this->template->load('template','pembelian/pembelian_form_edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian'));
        }
    }
    

    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $nama = $this->input->post('idsupplier');
            $supplier = $this->db->get_where('supplier',array('nama'=>$nama))->row_array();
            $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();

            $data = array(
                'idAdmin' => $admin['id'],
                'noNota' => $this->input->post('noNota',TRUE),
                'tanggal' => $this->input->post('tanggal',TRUE),
                'idsupplier' => $supplier['id'],
                'WajibMembayar' => $this->input->post('WajibMembayar',TRUE),
                'status' => $this->input->post('status',TRUE),
        // 'YangDiBayar' => $this->input->post('YangDiBayar',TRUE),
                );
            // $this->load->model('Barang_model');


            // die;

            $this->Pembelian_model->update($this->input->post('id', TRUE), $data);


            if($_POST['status']=='Y'){
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('pembelian'));
            }
            else {
                redirect(site_url('hutang/create'));
            }
            
            // $this->session->set_flashdata('message', 'Update Record Success');
            // redirect(site_url('pembelian'));
        }
    }


    public function update_action_ori() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
          $nama = $this->input->post('idsupplier');
          $supplier = $this->db->get_where('supplier',array('nama'=>$nama))->row_array();
          $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();

          $data = array(
            'idAdmin' => $admin['id'],
            'noNota' => $this->input->post('noNota',TRUE),
            'tanggal' => $this->input->post('tanggal',TRUE),
            'idsupplier' => $supplier['id'],
            'WajibMembayar' => $this->input->post('WajibMembayar',TRUE),
            'status' => $this->input->post('status',TRUE),
		// 'YangDiBayar' => $this->input->post('YangDiBayar',TRUE),
            );

          $this->Pembelian_model->update($this->input->post('id', TRUE), $data);

      }
  }

  public function delete($id) 
  {

    $ro = $this->Pembelian_model->get_by_id_pembelian($id);

    if($ro){
            // $idPembelian=$this->uri->segment(3);
            // $sql = $this->db->query('SELECT dp.idBarang FROM detailpembelian dp , pembelian p WHERE p.id=dp.idPembelian and p.id='.$idPembelian.'')->row_array();
            // $pembelian=$this->db->get_where('pembelian',array('id'=>$idPembelian))->row_array();

            // print_r($pembelian);

            // die;


        $this->Pembelian_model->delete_pembelian($id);

        $row = $this->Pembelian_model->get_by_id($id);

        if ($row) {
            $this->Pembelian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pembelian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian'));
        }
    }

    else{
     $row = $this->Pembelian_model->get_by_id($id);

     if ($row) {
        $this->Pembelian_model->delete($id);
        $this->session->set_flashdata('message', 'Delete Record Success');
        redirect(site_url('pembelian'));
    } else {
        $this->session->set_flashdata('message', 'Record Not Found');
        redirect(site_url('pembelian'));
    }

    $this->session->set_flashdata('message', 'Record Not Found');
    redirect(site_url('pembelian'));
}



}



public function add_barang()
{ 

    $this->load->model('Detailbarang_model');
    $idBarang = $_GET['idBarang'];
    $jumlahBeli = $_GET['jumlahBeli'];
    $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata['username']))->row_array();
    // $detailbarang=$this->db->get_where('detailbarang',array('id'=>$idBarang))->row_array();



    // $stokAkhir=$detailbarang['stokAwal']+$jumlahBeli;


    // $editStok=array('stokAwal'=>$stokAkhir);
    // $this->Detailbarang_model->update($idBarang,$editStok);

    $datatemp = array(
            // 'idBarang'=>$barang['iddetail'],
        'idBarang'=>$idBarang,
        'hargaBeliSatuan'=>$this->input->get('hargaBeliSatuan'),
            'potongan'=>$this->input->get('potongan'),
        'jumlahBeli'=>$jumlahBeli,
        'idAdmin'=>$admin['id']

            // 'jumlahBeli'=>$this->input->get('jumlahBeli')
        );

        // $editStok = array(
        //                     'stokAwal' => $stokAkhir
        //                     );

       $this->load->model('Detailbarang_model');


        // $editStok = array('stokAwal'=>$stokAkhir);
        $editStatus = array('status'=>'aktif');
        $this->Detailbarang_model->update($idBarang,$editStatus);


    $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array(); 


    // $this->Detailbarang_model->update($detailbarang['id'], $editStok);
    $this->db->insert('detailpembelian',$datatemp);
}


public function add_barang_detail()
{
    $idbarang = $_GET['idBarang'];
    $idpembelian = $_GET['idpembelian'];
    $potongan=$_GET['potongan'];

        // $barang = $this->db->get_where('barang',array('barang'=>$idbarang))->row_array();
    $pembelian = $this->db->get_where('pembelian',array('id'=>$idpembelian))->row_array();
    $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata['username']))->row_array();

    $datatemp = array(
        'idpembelian' => $pembelian['id'],
        'idBarang' => $idbarang,
        'potongan' =>$potongan,
            // 'hargaBeliTiapPak' =>$this->input->get('hargaBeliTiapPak'),
        'jumlahBeli'=>$this->input->get('jumlahBeli'),
            // 'idAdmin'=>$admin['id']
        );


    $detailbarang = $this->db->get_where('detailbarang',array('id'=>$idbarang))->row_array();
    $stokAkhir=$detailbarang['stokAwal']+$_GET['jumlahBeli'];
    $editStok = array(
        'stokAwal'=>$stokAkhir
        );

    $this->load->model('Detailbarang_model');
    $this->Detailbarang_model->update($detailbarang['id'],$editStok);

    $this->db->insert('detailpembelian',$datatemp);

}

public function list_barang()
{
    $idbarang = $_GET['idBarang'];

    echo " 


    <div class='col-md-12 col-sm-12 col-xs-12'>
        <div class='x_panel'>
            <div class='x_title'>
                <h2>Tabel Detail Pembelian</h2>
                <div class='clearfix></div>
            </div>
            <div class='x_content'>

                <table class='table table-bordered'>
                   <tr>
                       <th>No</th>
                       <th>Barang</th>
                       <th>Merek</th>
                       <th>Warna</th>
                       <th>Size</th>
                       <th>Jumlah</th>
                       <th>Harga Satuan</th>
                       <th>potongan</th>
                       <th>sub total</th>
                       <th>Aksi</th>
                   </tr>


                   ";
                   $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata['username']))->row_array();
                   $sql='SELECT w.warna, dp.potongan, dp.id, jb.barang, m.merek, s.size, dp.hargaBeliSatuan, dp.jumlahBeli, dp.idAdmin, SUM((dp.hargaBeliSatuan*dp.jumlahBeli)-dp.potongan) AS subTotal 
                   FROM barang b, jenisbarang jb, merek m, detailbarang db, size s, detailpembelian dp, warna w
                   WHERE jb.id=b.barang and b.idMerek=m.id and db.idBarang=b.id and db.idUkuran=s.id and idPembelian is null and db.idWarna=w.id and dp.idAdmin="'.$admin['id'].'" AND dp.idBarang=db.id group by dp.id';

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
                    <td>$b->warna</td>
                    <td>$b->size</td>
                    <td>$b->jumlahBeli</td>
                    <td align='right'> Rp ";echo number_format($b->hargaBeliSatuan,2,",","."); echo"</td>
                    <td align='right'> Rp ";echo number_format($b->potongan,2,",","."); echo"</td>
                    <td align='right'> Rp ";echo number_format($b->subTotal,2,",","."); echo"</td>
                    
                    <td><a onclick='remove($b->id)'>delete</a></td>

                </tr>";
                $no++;
            }


            $sql='SELECT SUM((hargaBeliSatuan*jumlahbeli)-potongan) as jumlah FROM detailpembelian where idpembelian is null and idAdmin="'.$admin['id'].'"';
            $query=$this->db->query($sql)->row_array();
            if ($query==null) {
                $subTotal=0;
    # code...
            }
            else {
                $subTotal=$query['jumlah'];

            }


            echo '<tr> <td colspan=8 align="right"><b> TOTAL </b> </td>
            <td colspan=1 align="right"><b> Rp '.number_format($subTotal,2,",",".").'</b></td>
            <td></td>
            ';
            echo '</tr>';

            echo " </table>

        </div>
    </div>
</div>";
}



public function list_barang_ubah()
{

    $idpembelian=$_GET['idpembelian'];


    $idbarang = $_GET['idBarang'];

    echo " 


    <div class='col-md-12 col-sm-12 col-xs-12'>
        <div class='x_panel'>
            <div class='x_title'>
                <h2>Tabel Detail Pembelian</h2>
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
                       <th>Harga Satuan</th>
                       <th>Harga Grosir</th>
                       <th>Jumlah</th>
                       <th>Aksi</th>
                   </tr>


                   ";

                   $sql="SELECT dt.id ,b.barang, dt.hargaBeliSatuan, dt.jumlahBeli, m.merek, s.size, w.warna
                   FROM barang b, detailbarang db, detailpembelian dt, merek m, size s, warna w, cabang c 
                   WHERE  b.id=db.idBarang and db.id=dt.idBarang and b.idMerek=m.id and db.idCabang=c.id and db.idUkuran = s.id and db.idWarna = w.id and dt.idPembelian=$idpembelian";
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
                    <td>$b->hargaBeliSatuan</td>

                    <td>$b->jumlahBeli</td>
                    <td><a onclick='remove($b->id)'>delete</a></td>

                </tr>";
                $no++;
            }


            echo " 


        </table>

    </div>
</div>
</div>";

}


public function remove_barang()
{

    $id=$_GET['id'];

    // $detailtemp=$this->db->get_where('detailpembelian_temp',array('id'=>$id))->row_array();
    // $datadetail=$this->db->get_where('detailbarang',array('id'=>$detailtemp['idBarang']))->row_array();
    // $datatemp = $this->db->get_where('detailpembelian_temp',array('id'=>$id))->row_array();

    // $stokAkhir = $datadetail['stokAwal']-$datatemp['JumlahBeli'];


    // $this->load->model('Detailbarang_model');

    // $editStok = array(
    //     'stokAwal' => $stokAkhir
    //     );

    // $this->Detailbarang_model->update($datadetail['id'], $editStok);

    $this->db->where('id',$id);
    $this->db->delete('detailpembelian');
    # code...
}


public function remove_barang_detail()
{
    $id=$_GET['id'];

    $detailpembelian = $this->db->get_where('detailpembelian',array('id'=>$id))->row_array();  
    $detailbarang = $this->db->get_where('detailbarang',array('id'=>$detailpembelian['idBarang']))->row_array();

    $stokAkhir=$detailbarang['stokAwal']-$detailpembelian['jumlahBeli'];    

    $this->load->model('Detailbarang_model');

    $editStok=array('stokAwal'=>$stokAkhir);

    $this->Detailbarang_model->update($detailbarang['id'],$editStok);

    $this->db->where('id',$id);
    $this->db->delete('detailpembelian');
    # code...
}

public function _rules() 
{
	$this->form_validation->set_rules('noNota', 'nonota', 'trim|required|is_unique[pembelian.noNota]');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('idsupplier', 'idsupplier', 'trim|required');
	// $this->form_validation->set_rules('WajibMembayar', 'wajibmembayar', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
}

public function _ruless()
{
    $this->form_validation->set_rules('idBarang', 'Barang', 'trim|required|is_unique[detailpembelian_temp.idBarang]');
        # code...
}


}

/* End of file Pembelian.php */
/* Location: ./application/controllers/Pembelian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-10 21:46:34 */
/* http://harviacode.com */