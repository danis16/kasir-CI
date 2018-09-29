<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang_model extends CI_Model
{

    public $table = 'barang';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function delete_barang($id)
    {
        $this->db->where('idBarang', $id);
        $this->db->delete('detailbarang');

    }

        function get_by_id_barang($id)
    {
        $this->db->where('idBarang', $id);
        return $this->db->get('detailbarang')->row();
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
	$this->db->or_like('barang', $q);
	$this->db->or_like('gambar', $q);
	$this->db->or_like('idKategori', $q);
	$this->db->or_like('idMerek', $q);
	$this->db->or_like('hargaEcer', $q);
	$this->db->or_like('idSatuan', $q);
	$this->db->or_like('hargaGrosir', $q);
	$this->db->or_like('status', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('barang', $q);
	$this->db->or_like('gambar', $q);
	$this->db->or_like('idKategori', $q);
	$this->db->or_like('idMerek', $q);
	$this->db->or_like('hargaEcer', $q);
	$this->db->or_like('idSatuan', $q);
	$this->db->or_like('hargaGrosir', $q);
	$this->db->or_like('status', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

  

    function edit($where, $data){
        $this->db->where($where);
        return $this->db->update('barang', $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Barang_model.php */
/* Location: ./application/models/Barang_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-11 14:42:29 */
/* http://harviacode.com */