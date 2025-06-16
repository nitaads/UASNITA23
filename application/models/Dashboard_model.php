<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function count_produk() {
        return $this->db->count_all('produk');
    }

    public function count_pelanggan() {
        return $this->db->count_all('pelanggan');
    }

    public function count_sales() {
        return $this->db->count_all('sales');
    }

    public function count_orders() {
        return $this->db->count_all('sales_order');
    }
}
