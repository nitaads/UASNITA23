<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    public function get_all() {
        return $this->db->get('products')->result();
    }

    public function get($id) {
        return $this->db->get_where('products', ['id' => $id])->row();
    }

    public function get_by_id($id) {
        return $this->db->get_where('products', ['id' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('products', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('products', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('products');
    }

    public function get_filtered($keyword = null, $filter_stok = null) {
        if ($keyword) {
            $this->db->like('nama_produk', $keyword);
        }

        if ($filter_stok === 'habis') {
            $this->db->where('stok', 0);
        } elseif ($filter_stok === 'rendah') {
            $this->db->where('stok <', 10);
        }

        return $this->db->get('products')->result();
    }

   public function get_laporan_produk($id) {
    $this->db->select('sales_order.*, customers.nama as nama, products.nama_produk as nama_produk');
    $this->db->from('sales_order');
    $this->db->join('customers', 'customers.id = sales_order.nama_pelanggan');
    $this->db->join('products', 'products.id = sales_order.product_id');
    $this->db->where('sales_order.product_id', $id);
    return $this->db->get()->result();
}
}