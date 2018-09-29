<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->library('form_validation');
    }    
function data() { 
        $table = 'kategori';
        $primaryKey = 'id';
        $columns = array(
         array('db' => 'id', 'dt' => 0),array('db' => 'id', 'dt' => 0),
array('db' => 'kategori', 'dt' => 1),
array(
                'db' => 'id',
                'dt' => 2,
                'formatter' => function( $d, $row ) {
            return 
            // anchor('Kategori/read/'.$d,'<i class="fa fa-eye"></i>',"class='btn btn-sm btn-danger'").' '.
                   anchor('Kategori/update/'.$d,'<i class="fa fa-edit"></i>',"class='btn btn-sm btn-danger'");
                   // .' '.
                   // anchor('Kategori/delete/'.$d,'<i class="fa fa-trash"></i>',"class='btn btn-sm btn-danger'");
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
        $kategori = $this->Kategori_model->get_all();

        $data = array(
            'kategori_data' => $kategori
        );

        $this->template->load('template','kategori/kategori_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Kategori_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kategori' => $row->kategori,
	    );
            $this->load->view('kategori/kategori_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kategori/create_action'),
	    'id' => set_value('id'),
	    'kategori' => set_value('kategori'),
	);
        $this->template->load('template','kategori/kategori_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kategori' => $this->input->post('kategori',TRUE),
	    );

            $this->Kategori_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kategori'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kategori_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kategori/update_action'),
		'id' => set_value('id', $row->id),
		'kategori' => set_value('kategori', $row->kategori),
	    );
            $this->template->load('template','kategori/kategori_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kategori' => $this->input->post('kategori',TRUE),
	    );

            $this->Kategori_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kategori'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kategori_model->get_by_id($id);

        if ($row) {
            $this->Kategori_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kategori'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kategori', 'kategori', 'trim|required|is_unique[kategori.kategori]');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


        public function add_kategori()
    {
        $kategori = $_GET['kategori'];
    
        $data = array(
            'kategori'=>$kategori
            );
        $this->db->insert('kategori',$data);

    }


    public function modal_kategori()
    {

        echo '                  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Masukan kategori baru :</h4>
                        </div>
                        <div class="modal-body">
                        
                           <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Kategori"/>
                        
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="addKategori()">Save</button>
                          <!-- <button type="button" class="btn btn-primary" >Save changes</button> -->
                        </div>

                      </div>
                    </div>
                  </div>';
    }


}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-10 18:58:15 */
/* http://harviacode.com */