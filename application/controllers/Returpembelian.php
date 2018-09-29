<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Returpembelian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Returpembelian_model');
        $this->load->library('form_validation');
        $this->mainlib->logged_in();
    }    
    function data() {
        $table = 'view_returpembelian';
        $primaryKey = 'idRetur';
        $columns = array(
           array('db' => 'nonota', 'dt' => 0),array('db' => 'idRetur', 'dt' => 0),
           array('db' => 'nama', 'dt' => 1),
           array('db' => 'tanggal', 'dt' => 2,

  'formatter' => function( $d, $row ) {
            return date( 'l, j F Y', strtotime($d));
        }


            ),
           array('db' => 'username', 'dt' => 3),
           array(
            'db' => 'idRetur',
            'dt' => 4,
            'formatter' => function( $d, $row ) {
                return 
                anchor('Returpembelian/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'");
                // .' '.
                // anchor('Returpembelian/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'").' '.
                // anchor('Returpembelian/delete/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
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
        $returpembelian = $this->Returpembelian_model->get_all();

        $data = array(
            'returpembelian_data' => $returpembelian
            );

        $this->template->load('template','returpembelian/returpembelian_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Returpembelian_model->get_by_id($id);
        if ($row) {
            $data = array(
              'idRetur' => $row->idRetur,
              'idPembelian' => $row->idPembelian,
              'tanggal' => $row->tanggal,
              'idAdmin' => $row->idAdmin,
              );
            $this->load->view('returpembelian/returpembelian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('returpembelian'));
        }
    }

    public function create() 
    {
      if (empty($_GET['nota'])) {
      $nota=0;
      }
      else {
        $nota=$_GET['nota'];
      }

        $data = array(
            'button' => 'Create',
            'action' => site_url('returpembelian/create_action'),
            'idRetur' => set_value('idRetur'),
            'idPembelian' => set_value('idPembelian'),
            'tanggal' => date('Y-m-d'),
            'idAdmin' => set_value('idAdmin'),
            'kondisi'=> set_value('kondisi'),
            
            );
        $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();
        

        // $data['barang']=$this->db->query('select db.id as iddetail, jb.barang, w.warna, s.size, m.merek 
        //     from barang b, detailbarang db, warna w, merek m, size s, jenisbarang jb
        //     where b.id=db.idBarang and b.barang=jb.id and m.id=b.idMerek and s.id=db.idUkuran and w.id=db.idWarna AND db.idCabang='.$admin['idCabang'].' 
        //     GROUP by b.barang, s.size, m.merek, w.warna asc')->result();

        $data['barang']=$this->db->query('SELECT db.id AS iddetail, jb.barang, w.warna, s.size, m.merek 
            FROM barang b, detailbarang db, warna w, merek m, size s, jenisbarang jb, pembelian p, detailpembelian dp
            WHERE b.id=db.idBarang AND b.barang=jb.id AND m.id=b.idMerek AND s.id=db.idUkuran AND w.id=db.idWarna 
            AND p.id=dp.idPembelian AND dp.idBarang=db.id and nonota="'.$nota.'" and stokAwal > 0
            GROUP BY b.barang, s.size, m.merek, w.warna ASC')->result();


        $data['nomornota']=$nota;
        $data['nota']=$this->db->get('pembelian')->result();

        $this->template->load('template','returpembelian/returpembelian_form', $data);
    }

  
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $pembelian=$this->db->get_where('pembelian',array('noNota'=>$this->input->post('idPembelian',TRUE)))->row_array();

            $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();
            $data = array(
              'idPembelian' => $pembelian['id'],
              'tanggal' => $this->input->post('tanggal',TRUE),
              'idAdmin' => $admin['id'],
              );

            $this->Returpembelian_model->insert($data);

            $retur=$this->db->get_where('returpembelian',$data)->row_array();
            $idretur=$retur['idRetur'];

            // $returtemp = $this->db->get_where('detailreturpembelian',array('idReturpembelian'=>0,'idAdmin'=>$admin['id']))->result();
            $returtemp = $this->db->get_where('detailreturpembelian',array('idReturpembelian'=>0))->result();


            // print_r($returtemp);
            // die;

            foreach ($returtemp as $r) {
                $this->db->where(array('idReturpembelian'=>$r->idReturpembelian,'idAdmin'=>$admin['id']));
                $this->db->update('detailreturpembelian',array(
                    'idReturpembelian' => $idretur,
                    // 'idDetailBarang'=>$r->idDetailBarang,
                    // 'jumlah' => $r->jumlah,
                    // 'kondisi'=>$r->kondisi,
                    // 'alasan'=>$r->alasan

                    ));
                // $this->db->delete('detailreturpembelian_temp');
            }


            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('returpembelian'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Returpembelian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('returpembelian/update_action'),
                'idRetur' => set_value('idRetur', $row->idRetur),
                'idPembelian' => set_value('idPembelian', $row->idPembelian),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'idAdmin' => set_value('idAdmin', $row->idAdmin),
                'kondisi' => set_value('kondisi')
                );
            $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();

            $data['barang']=$this->db->query('select sa.satuan, db.id as iddetail, b.barang, w.warna, s.size, m.merek, sa.satuan 
                from barang b, detailbarang db, warna w, merek m, size s, satuan sa, cabang c 
                where b.id=db.idBarang and m.id=b.idMerek and sa.id = db.idSatuan and s.id=db.idUkuran and w.id=db.idWarna AND db.idCabang=c.id and c.id='.$admin['idCabang'].' 
                GROUP by b.barang, s.size, m.merek, w.warna, sa.satuan, c.cabang asc')->result();
            $data['nota']=$this->db->get('pembelian')->result();

            $this->template->load('template','returpembelian/returpembelian_form_edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('returpembelian'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idRetur', TRUE));
        } else {
            $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();  
            $data = array(
              'idPembelian' => $this->input->post('idPembelian',TRUE),
              'tanggal' => $this->input->post('tanggal',TRUE),
              'idAdmin' => $admin['id'],
              );

            $this->Returpembelian_model->update($this->input->post('idRetur', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('returpembelian'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Returpembelian_model->get_by_id($id);

        if ($row) {
            $this->Returpembelian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('returpembelian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('returpembelian'));
        }
    }

    public function _rules() 
    {
       // $this->form_validation->set_rules('idPembelian', 'idpembelian', 'trim|required');
       $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	// $this->form_validation->set_rules('idAdmin', 'idadmin', 'trim|required');

       $this->form_validation->set_rules('idRetur', 'idRetur', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }

   public function add_detailretur()
   {
    // $detailbarang=$this->db->get_where('detailbarang',array('id'=>$_GET['idBarang']))->row_array();
    // $Stok = $detailbarang['stokAwal']-$_GET['jumlah'];

    $admin=$this->db->get_where('admin',array('username'=>$this->session->userdata('username')))->row_array();
    // $editStok = array('stokAwal'=>$Stok);
    // $this->load->model('Detailbarang_model');
    // $this->Detailbarang_model->update($_GET['idBarang'],$editStok);
        // print_r($Stok);
        // die;

    $datatemp = array(
        'idDetailBarang'=>$_GET['idBarang'],
        'jumlah'=>$_GET['jumlah'],
        'kondisi'=>$_GET['kondisi'],
        'alasan'=>$_GET['alasan'],
        'idAdmin'=>$admin['id']
        );

// print_r($admin);
// die;

    $this->db->insert('detailreturpembelian',$datatemp);
}


public function add_detailretur_ubah()
{
    $idretur=$_GET['idretur'];

    $detailbarang=$this->db->get_where('detailbarang',array('id'=>$_GET['idBarang']))->row_array();
    $Stok = $detailbarang['stokAwal']-$_GET['jumlah'];

    $editStok = array('stokAwal'=>$Stok);
    $this->load->model('Detailbarang_model');
    $this->Detailbarang_model->update($_GET['idBarang'],$editStok);
        // print_r($Stok);
        // die;

    $datatemp = array(
        'idReturpembelian'=>$idretur,
        'idDetailBarang'=>$_GET['idBarang'],
        'jumlah'=>$_GET['jumlah'],
        'kondisi'=>$_GET['kondisi'],
        'alasan'=>$_GET['alasan']
        );

    $this->db->insert('detailreturpembelian',$datatemp);
}



public function list_detailretur()
{

   $idbarang = $_GET['idBarang'];

   echo " 


   <div class='col-md-12 col-sm-12 col-xs-12'>
    <div class='x_panel'>
        <div class='x_title'>
            <h2>Tabel Detail Retur Pembelian</h2>
            <div class='clearfix></div>
        </div>
        <div class='x_content'>

            <table class='table table-bordered'>
             <tr>
                 <th>No</th>
                 <th>Kode Barang</th>
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

             $sql="SELECT dt.id ,jb.barang, kodebarang, dt.jumlah, dt.kondisi, dt.alasan, m.merek, s.size, w.warna
             FROM barang b, jenisbarang jb, detailbarang db, detailreturpembelian dt, merek m, size s, warna w 
             WHERE b.barang=jb.id and b.id=db.idBarang and db.id=dt.idDetailBarang and b.idMerek=m.id and db.idUkuran = s.id and db.idWarna = w.id and idReturpembelian=0";
             $barang = $this->db->query($sql)->result();
// print_r($barang);
// die;
             $no=1;
             foreach ($barang as $b) {
                echo "<tr>
                <td>$no</td>
                <td>$b->kodebarang</td>
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


public function list_detailretur_ubah()
{
    $idretur = $_GET['idretur'];
    $idbarang = $_GET['idBarang'];

    echo " 


    <div class='col-md-12 col-sm-12 col-xs-12'>
        <div class='x_panel'>
            <div class='x_title'>
                <h2>Tabel Detail Retur Pembelian</h2>
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
                 FROM barang b, detailbarang db, detailreturpembelian dt, merek m, size s, warna w, returpembelian r 
                 WHERE  b.id=db.idBarang and db.id=dt.idDetailBarang and b.idMerek=m.id and db.idUkuran = s.id and db.idWarna = w.id and dt.idReturpembelian=r.idRetur and r.idRetur=".$idretur."";
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

    // $detailtemp=$this->db->get_where('detailreturpembelian_temp',array('id'=>$id))->row_array();
    // $detailbarang = $this->db->get_where('detailbarang',array('id'=>$detailtemp['idDetailBarang']))->row_array();

    // $stok = $detailbarang['stokAwal']+$detailtemp['jumlah'];

    // $editStok=array(
    //     'stokAwal'=>$stok
    //     );

    // $this->load->model('Detailbarang_model');
    // $this->Detailbarang_model->update($detailbarang['id'],$editStok);


    $this->db->where('id',$id);
    $this->db->delete('detailreturpembelian');

        # code...
}


public function remove_ubah()
{
    $id=$_GET['id'];

    $detailtemp=$this->db->get_where('detailreturpembelian',array('id'=>$id))->row_array();
    $detailbarang = $this->db->get_where('detailbarang',array('id'=>$detailtemp['idDetailBarang']))->row_array();

    $stok = $detailbarang['stokAwal']+$detailtemp['jumlah'];

    $editStok=array(
        'stokAwal'=>$stok
        );

    $this->load->model('Detailbarang_model');
    $this->Detailbarang_model->update($detailbarang['id'],$editStok);


    $this->db->where('id',$id);
    $this->db->delete('detailreturpembelian'); 
}

}

/* End of file Returpembelian.php */
/* Location: ./application/controllers/Returpembelian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-16 06:03:21 */
/* http://harviacode.com */