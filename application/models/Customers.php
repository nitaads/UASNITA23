<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Customer_model');
        // Bisa tambah pengecekan role di sini, misal admin saja
    }

    public function index() {
        $data['title'] = 'Data Pelanggan';
        $data['customers'] = $this->Customer_model->get_all();
        $this->load->view('templates/header', $data);
        $this->load->view('customers/index', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        if ($_POST) {
            $data = [
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'telepon' => $this->input->post('telepon')
            ];
            $this->Customer_model->insert($data);
            redirect('customers');
        }
        $data['title'] = 'Tambah Pelanggan';
        $this->load->view('templates/header', $data);
        $this->load->view('customers/create', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id) {
        if ($_POST) {
            $data = [
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'telepon' => $this->input->post('telepon')
            ];
            $this->Customer_model->update($id, $data);
            redirect('customers');
        }
        $data['title'] = 'Edit Pelanggan';
        $data['customer'] = $this->Customer_model->get($id);
        $this->load->view('templates/header', $data);
        $this->load->view('customers/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id) {
        $this->Customer_model->delete($id);
        redirect('customers');
    }
}
