<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
    }

    public function index() {
        $keyword = $this->input->get('keyword');
        $filter_stok = $this->input->get('filter_stok');

        $data['products'] = $this->Product_model->get_filtered($keyword, $filter_stok);
        $data['title'] = 'Daftar Produk';
        $data['keyword'] = $keyword;
        $data['filter_stok'] = $filter_stok;

        $this->load->view('templates/header', $data);
        $this->load->view('products/index', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        $data['title'] = 'Tambah Produk';
        $this->load->view('templates/header', $data);
        $this->load->view('products/create', $data);
        $this->load->view('templates/footer');
    }

    public function store() {
        $this->form_validation->set_rules('kode_produk', 'Kode Produk', 'required|is_unique[products.kode_produk]');
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('stok', 'Stok', 'required|integer');

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Tambah Produk';
            $this->load->view('templates/header', $data);
            $this->load->view('products/create', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kode_produk' => $this->input->post('kode_produk'),
                'nama_produk' => $this->input->post('nama_produk'),
                'harga'       => $this->input->post('harga'),
                'stok'        => $this->input->post('stok')
            ];
            $this->Product_model->insert($data);
            $this->session->set_flashdata('success', 'Produk berhasil ditambahkan');
            redirect('products');
        }
    }

    public function edit($id) {
        $product = $this->Product_model->get($id);
        if (!$product) show_404();

        if ($this->input->post()) {
            $data = [
                'kode_produk' => $this->input->post('kode_produk'),
                'nama_produk' => $this->input->post('nama_produk'),
                'harga'       => $this->input->post('harga'),
                'stok'        => $this->input->post('stok'),
            ];
            $this->Product_model->update($id, $data);
            redirect('products');
        }

        $data['product'] = $product;
        $data['title'] = 'Edit Produk';
        $this->load->view('templates/header', $data);
        $this->load->view('products/edit', $data);
        $this->load->view('templates/footer');
    }
public function update($id) {
    $data = [
        'kode_produk' => $this->input->post('kode_produk'),
        'nama_produk' => $this->input->post('nama_produk'),
        'harga'       => $this->input->post('harga'),
        'stok'        => $this->input->post('stok'),
    ];
    $this->Product_model->update($id, $data);
    redirect('products');
}

    public function delete($id) {
        $this->Product_model->delete($id);
        $this->session->set_flashdata('success', 'Produk berhasil dihapus');
        redirect('products');
    }


    public function laporan() {
        $this->load->model('Product_model');
        $data['products'] = $this->Product_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('Products/laporan_form', $data);  
        $this->load->view('templates/footer');
    }

    public function cetak_laporan() {
    $id = $this->input->post('Products');

    $this->load->model('Product_model');

    $data['laporan'] = $this->Product_model->get_laporan_produk($id);

    $products = $this->Product_model->get_by_id($id);
    $data['nama_produk'] = $products ? $products->nama_produk : 'Produk tidak ditemukan';

    $this->load->view('templates/header');
    $this->load->view('Products/laporan_hasil', $data);
    $this->load->view('templates/footer');
}
}
