<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_sales extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('role') !== 'sales') {
            $this->session->set_flashdata('error', 'Akses hanya untuk sales.');
            redirect('auth/login');
        }
    }

    public function index() {
        $data['title'] = 'Dashboard Sales';
        $data['content'] = '<h1>Selamat datang di Dashboard Sales</h1>';
        $this->load->view('templates/header', $data);
        $this->load->view('dashboard_sales', $data);
        $this->load->view('templates/footer');
    }
}
