<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_manager extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('role') !== 'manager') {
            $this->session->set_flashdata('error', 'Akses hanya untuk manager.');
            redirect('auth/login');
        }
    }

    public function index() {
        $data['title'] = 'Dashboard Manager';
        $data['content'] = '<h1>Selamat datang di Dashboard Manager</h1>';
        $this->load->view('templates/header', $data);
        $this->load->view('dashboard_manager', $data);
        $this->load->view('templates/footer');
    }
}
