<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
    }

    public function index()
    {
        $keyword = $this->input->get('keyword');
        if ($keyword) {
            $data['customers'] = $this->Customer_model->search($keyword);
        } else {
            $data['customers'] = $this->Customer_model->get_all();
        }
        $data['title'] = 'Data Pelanggan';
        $this->load->view('templates/header', $data);
        $this->load->view('customers/index', $data);
        $this->load->view('templates/footer');

    }

   public function create()
{
    $data['title'] = 'Tambah Pelanggan';
    $this->load->view('templates/header', $data);
    $this->load->view('customers/create', $data);
    $this->load->view('templates/footer');
}


    public function store()
    {
        $data = [
            'nama'    => $this->input->post('nama'),
            'alamat'  => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon'),
        ];

        $this->Customer_model->insert($data);
        redirect('customers');
    }

    public function edit($id)
    {
       
    $data['customer'] = $this->Customer_model->get_by_id($id);
    if (!$data['customer']) {
        show_404();
    }
    $data['title'] = 'Edit Pelanggan';
    $this->load->view('templates/header', $data);
    $this->load->view('customers/edit', $data);
    $this->load->view('templates/footer');
    }


    public function update($id)
    {
        $data = [
            'nama'    => $this->input->post('nama'),
            'alamat'  => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon'),
        ];

        $this->Customer_model->update($id, $data);
        redirect('customers');
    }

    public function delete($id)
    {
        $this->Customer_model->delete($id);
        redirect('customers');
    }
}
