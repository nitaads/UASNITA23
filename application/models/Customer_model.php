<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

    public function get_all()
    {
        return $this->db->get('customers')->result_array();
    }

    public function search($keyword)
    {
        $this->db->like('nama', $keyword);
        return $this->db->get('customers')->result_array();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('customers', ['id' => $id])->row_array();
    }

    public function insert($data)
    {
        $this->db->insert('customers', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id)->update('customers', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id)->delete('customers');
    }
}
