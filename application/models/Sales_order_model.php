<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_order_model extends CI_Model {

    private $table = 'sales_order';

    public function get_all_orders()
    {
        $this->db->select('sales_order.*, products.nama_produk');
        $this->db->from($this->table);
        $this->db->join('products', 'products.id = sales_order.product_id');
        return $this->db->get()->result();
    }

    public function insert_order($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function search_orders($keyword)
    {
        $this->db->select('sales_order.*, products.nama_produk');
        $this->db->from($this->table);
        $this->db->join('products', 'products.id = sales_order.product_id');

        $this->db->group_start();
        $this->db->like('sales_order.nama_pelanggan', $keyword);
        $this->db->or_like('sales_order.nama', $keyword); // nama sales
        $this->db->or_like('products.nama_produk', $keyword);
        $this->db->group_end();

        return $this->db->get()->result();
    }

    public function get_order($id)
    {
        $this->db->select('sales_order.*, products.nama_produk, products.kode_produk');
        $this->db->from($this->table);
        $this->db->join('products', 'products.id = sales_order.product_id', 'left');
        $this->db->where('sales_order.id', $id);
        return $this->db->get()->row();
    }

    public function update_order($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function get_laporan($sales_id = null, $product_id = null, $start_date = null, $end_date = null)
    {
        $this->db->select('so.*, p.nama_produk');
        $this->db->from('sales_order so');
        $this->db->join('products p', 'so.product_id = p.id');

        if ($sales_id) {
            $this->db->where('so.nama', $sales_id);
        }

        if ($product_id) {
            $this->db->where('so.product_id', $product_id);
        }

        if ($start_date && $end_date) {
            $this->db->where('so.created_at >=', $start_date);
            $this->db->where('so.created_at <=', $end_date);
        }

        return $this->db->get()->result();
    }

    public function get_laporan_sales_order($tanggal_dari = null, $tanggal_sampai = null)
{
    $this->db->select('sales_order.*, products.nama_produk');
    $this->db->from($this->table);
    $this->db->join('products', 'products.id = sales_order.product_id');

    // Cek apakah tanggal diisi sebelum digunakan
    if (!empty($tanggal_dari)) {
        $this->db->where('sales_order.tglorder >=', $tanggal_dari);
    }

    if (!empty($tanggal_sampai)) {
        $this->db->where('sales_order.tglorder <=', $tanggal_sampai);
    }

    return $this->db->get()->result();
}
    public function get_laporan_produk($id) {
    $this->db->select('sales_order.*, customers.nama as nama_pelanggan, products.nama_produk, products.harga');
    $this->db->from('sales_order');
    $this->db->join('customers', 'customers.id = sales_order.nama_pelanggan');
    $this->db->join('products', 'products.id = sales_order.product_id');
    $this->db->where('sales_order.product_id', $id);
    return $this->db->get()->result();
}


    public function delete_order($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }
}
