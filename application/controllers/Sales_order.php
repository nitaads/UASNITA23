<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_order extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sales_order_model');
        $this->load->model('Orders_model');
        $this->load->model('Product_model');
        $this->load->model('Sales_model');
    }

    public function index()
    {
        $data['title'] = 'Data Sales Order';
        $keyword = $this->input->get('keyword');

        if (!empty($keyword)) {
            $data['orders'] = $this->Sales_order_model->search_orders($keyword);
        } else {
            $data['orders'] = $this->Sales_order_model->get_all_orders();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('sales_order/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Sales Order';
        $data['order_list'] = $this->Orders_model->get_all();
        $data['produk_list'] = $this->Product_model->get_all();
        $data['sales'] = $this->Sales_model->get_all_sales();

        if ($this->input->post()) {
            $jumlah = $this->input->post('jumlah');
            $harga = $this->input->post('harga_satuan');

            $dataInsert = [

                'product_id'     => $this->input->post('product_id'),
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'jumlah'         => $jumlah,
                'harga_satuan'   => $harga,
                'subtotal'       => $jumlah * $harga,
                'status'         => $this->input->post('status'),
                'nama'           => $this->input->post('nama'),
                'tglorder'       => $this->input->post('tglorder')
            ];
            $this->Sales_order_model->insert_order($dataInsert);
            redirect('sales_order');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('sales_order/create', $data);
        $this->load->view('templates/footer');
    }

   public function edit($id)
{
    $this->load->model('Product_model'); // pastikan tetap diload
    $this->load->model('Sales_model');

    $order = $this->Sales_order_model->get_order($id);
    if (!$order) {
        show_404();
    }

    $data['title'] = 'Edit Sales Order';
    $data['order'] = $order;
    $data['produk_list'] = $this->Product_model->get_all();
    $data['sales'] = $this->Sales_model->get_all_sales();

    if ($this->input->post()) {
        $jumlah = $this->input->post('jumlah');
        $harga = $this->input->post('harga_satuan');

        $dataUpdate = [
            'tglorder'       => $this->input->post('tglorder'),
            'product_id'     => $this->input->post('product_id'),
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'jumlah'         => $jumlah,
            'harga_satuan'   => $harga,
            'subtotal'       => $jumlah * $harga,
            'status'         => $this->input->post('status'),
            'nama'           => $this->input->post('nama')
        ];
        $this->Sales_order_model->update_order($id, $dataUpdate);
        redirect('sales_order');
    } else {
        // Ambil harga berdasarkan produk yang dipilih (jika form baru dibuka atau product_id diganti)
        $selected_product_id = $this->input->post('product_id') ?? $order->product_id;
        $selected_product = $this->Product_model->get_by_id($selected_product_id);
        $data['order']->harga_satuan = $selected_product ? $selected_product->harga : $order->harga_satuan;
    }

    $this->load->view('templates/header', $data);
    $this->load->view('sales_order/edit', $data);
    $this->load->view('templates/footer');
}


    public function delete($id)
    {
        $this->Sales_order_model->delete_order($id);
        redirect('sales_order');
    }

    //  Tambahan Fungsi Laporan
    public function laporan()
    {
        $tanggal_dari = $this->input->get('tanggal_dari');
        $tanggal_sampai = $this->input->get('tanggal_sampai');

        $data['title'] = 'Laporan Sales Order';
        $data['tanggal_dari'] = $tanggal_dari;
        $data['tanggal_sampai'] = $tanggal_sampai;

        if ($tanggal_dari && $tanggal_sampai) {
            $data['sales_order'] = $this->Sales_order_model->get_laporan_sales_order($tanggal_dari, $tanggal_sampai);
        } else {
            $data['sales_order'] = [];
        }

        $this->load->view('templates/header', $data);
        $this->load->view('sales_order/laporan_form', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_laporan() {
        $tanggal_dari = $this->input->post('tanggal_dari');
        $tanggal_sampai = $this->input->post('tanggal_sampai');

        $data['sales_order'] = $this->Sales_order_model->get_laporan_sales_order($tanggal_dari, $tanggal_sampai);
        $data['tanggal_dari'] = $tanggal_dari;
        $data['tanggal_sampai'] = $tanggal_sampai;

        if ($tanggal_dari && $tanggal_sampai) {
        $this->load->model('Sales_order_model');
        $data['sales_order'] = $this->Sales_order_model->get_laporan_sales_order($tanggal_dari, $tanggal_sampai);
    } else {
        $data['sales_order'] = [];
    }

        $this->load->view('templates/header');
        $this->load->view('Sales_order/laporan_hasil', $data);
        $this->load->view('templates/footer');

        }

    public function cetak_pdf()
{
    $tanggal_dari = $this->input->get('tanggal_dari');
    $tanggal_sampai = $this->input->get('tanggal_sampai');

    $data['title'] = 'Laporan PDF Sales Order';
    $data['tanggal_dari'] = $tanggal_dari;
    $data['tanggal_sampai'] = $tanggal_sampai;
    $data['sales_order'] = $this->Sales_order_model->get_laporan_sales_order($tanggal_dari, $tanggal_sampai);

    $html = $this->load->view('Sales_order/laporan_hasil', $data, true);

    $this->load->library('pdf');
    $this->pdf->loadHtml($html);
    $this->pdf->setPaper('A4', 'landscape');
    $this->pdf->render();
    $this->pdf->stream("Laporan_Sales_Order_{$tanggal_dari}_sampai_{$tanggal_sampai}.pdf", array("Attachment" => true));
}

}
