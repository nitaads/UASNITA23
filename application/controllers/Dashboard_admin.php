<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_admin extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('role') !== 'admin') {
            $this->session->set_flashdata('error', 'Akses hanya untuk admin.');
            redirect('auth/login');
        }
    }
    
    public function index() {
        $data['title'] = 'Dashboard Admin';
        $data['content'] = '<h1>Selamat datang di Dashboard Admin</h1>';
        $this->load->view('templates/header', $data);
        $this->load->view('dashboard_admin', $data);
        $this->load->view('templates/footer');
    }
}
