<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sales_order_model');
        $this->load->model('Sales_model');
        $this->load->model('Product_model');
        $this->load->library('pdf'); // Library export PDF
    }

    public function index()
    {
        $data['title'] = 'Laporan Penjualan';
        $data['sales_list'] = $this->Sales_model->get_all();
        $data['produk_list'] = $this->Product_model->get_all();

        $sales_id = $this->input->get('sales_id');
        $product_id = $this->input->get('product_id');
        $start = $this->input->get('start_date');
        $end = $this->input->get('end_date');

        $data['laporan'] = $this->Sales_order_model->get_laporan($sales_id, $product_id, $start, $end);

        $this->load->view('templates/header', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }

    public function export_pdf()
    {
        $sales_id = $this->input->get('sales_id');
        $product_id = $this->input->get('product_id');
        $start = $this->input->get('start_date');
        $end = $this->input->get('end_date');

        $data['laporan'] = $this->Sales_order_model->get_laporan($sales_id, $product_id, $start, $end);

        $this->load->library('pdf');
        $this->pdf->load_view('laporan/pdf', $data);
        $this->pdf->render();
        $this->pdf->stream("laporan_penjualan.pdf", array("Attachment"=>0));
    }
}
