<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public $table = 'admin';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('password', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('password', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }



    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function user_register($input){
        $this->load->helper('site_helper');
        $encrypt_password = bCrypt($input['password'],12);
        $array_user =  array(

            'username' => $input['username'],
            'tanggal' => date('Y-m-d'),
            'password' => $encrypt_password,
            'idCabang'=>$input['idCabang'],
            'idJabatan'=>$input['idJabatan']
            // 'email' => $input['email'],
            // 'active_since'=>date('Y-m-d')

         );

        $this->db->insert('admin', $array_user);
    }

    function user_update($input,$id){
        $this->load->helper('site_helper');
        $encrypt_password = bCrypt($input['password'],12);
        $array_user =  array(

            'username' => $input['username'],
            'tanggal' => date('Y-m-d'),
            'password' => $encrypt_password,
            'idCabang'=>$input['idCabang'],
            'idJabatan'=>$input['idJabatan']
            // 'email' => $input['email'],
            // 'active_since'=>date('Y-m-d')

         );
          $this->db->where($this->id, $id);
        $this->db->update('admin', $input);
    }

        public function exist_row_check($field, $data)
    {
        $this->db->where($field, $data);
        $this->db->from('admin');
        $query=$this->db->get();
        return $query->num_rows();
        # code...
    }

    public function get_user_detail($username)
    {
        $this->db->where("username",$username);
        $query = $this->db->get('admin');

        if($query->num_rows() > 0){
            $data = $query->row();
            $query->free_result();
        }
        else {
            $data = NULL;
        }

        return $data;
        
        # code...
    }





}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-06 12:39:07 */
/* http://harviacode.com */