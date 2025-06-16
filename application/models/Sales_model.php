<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_model extends CI_Model {

    private $table = 'sales';

    public function get_all()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function get_all_sales(): mixed{
        return $this->db->get('sales')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }

    public function search($keyword)
    {
        return $this->db->like('nama', $keyword)->get($this->table)->result_array();
    }

    public function generate_kode()
    {
        $date = date('Ymd');
        $prefix = 'SLS-' . $date . '-';

        $this->db->like('idsales', $prefix);
        $this->db->order_by('idsales', 'DESC');
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() > 0) {
            $last_id = $query->row_array()['idsales'];
            $last_number = (int)substr($last_id, -3);
            $next_number = $last_number + 1;
        } else {
            $next_number = 1;
        }

        return $prefix . str_pad($next_number, 3, '0', STR_PAD_LEFT);
    }
}
