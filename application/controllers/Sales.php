<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sales_model');
    }

    public function index()
    {
        $keyword = $this->input->get('keyword');
        if ($keyword) {
            $data['sales'] = $this->Sales_model->search($keyword);
        } else {
            $data['sales'] = $this->Sales_model->get_all();
        }
        $data['title'] = 'Data Sales';
        $this->load->view('templates/header', $data);
        $this->load->view('sales/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Sales';
        $data['kode_otomatis'] = $this->Sales_model->generate_kode(); // ← kode otomatis
        $this->load->view('templates/header', $data);
        $this->load->view('sales/create', $data);
        $this->load->view('templates/footer');
    }

   public function store()
{
    $data = [
        'idsales' => $this->input->post('idsales'),
        'nama' => $this->input->post('nama')
    ];

    $this->Sales_model->insert($data);  // <- Panggil model insert
    redirect('sales');
}


    public function edit($id)
    {
        $data['sales'] = $this->Sales_model->get_by_id($id);
        if (!$data['sales']) {
            show_404();
        }
        $data['title'] = 'Edit Sales';
        $this->load->view('templates/header', $data);
        $this->load->view('sales/edit', $data);
        $this->load->view('templates/footer');
    }

   public function update($id)
{
    $data = [
        'idsales' => $this->input->post('idsales'),
        'nama' => $this->input->post('nama')
    ];

    $this->Sales_model->update($id, $data); 
    redirect('sales');
}

    public function delete($id)
    {
        $this->Sales_model->delete($id);
        redirect('sales');
    }
}
