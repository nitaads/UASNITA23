<?php
class Laporan_model extends CI_Model {

    public function get_all() {
        $this->db->select('sales.nama as nama_sales, products.nama_produk, orders.tanggal_order, sales_order.jumlah, sales_order.subtotal');
        $this->db->from('sales_order');
        $this->db->join('orders', 'orders.id = sales_order.order_id');
        $this->db->join('sales', 'sales.id = orders.id_sales');
        $this->db->join('products', 'products.id = sales_order.product_id');
        return $this->db->get()->result();
    }

    public function get_filtered($sales_id = null, $product_id = null, $start_date = null, $end_date = null) {
        $this->db->select('sales.nama as nama_sales, products.nama_produk, orders.tanggal_order, sales_order.jumlah, sales_order.subtotal');
        $this->db->from('sales_order');
        $this->db->join('orders', 'orders.id = sales_order.order_id');
        $this->db->join('sales', 'sales.id = orders.id_sales');
        $this->db->join('products', 'products.id = sales_order.product_id');

        if ($sales_id) {
            $this->db->where('orders.id_sales', $sales_id);
        }

        if ($product_id) {
            $this->db->where('sales_order.product_id', $product_id);
        }

        if ($start_date && $end_date) {
            $this->db->where('orders.tanggal_order >=', $start_date);
            $this->db->where('orders.tanggal_order <=', $end_date);
        }

        return $this->db->get()->result();
    }
}
