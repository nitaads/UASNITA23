<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public function index(){
        $data['content']= '<h1> Welcome to Adminlte 3 in codeigniter 3</h1>';
        $this->load->view('templates/header');
        $this->load->view('dashboard',$data);
        $this->load->view('templates/footer');
        $data['total_customers'] = $this->Customer_model->count_all();
$data['total_products'] = $this->Product_model->count_all();

        
        class Dashboard extends CI_Controller {

  public function admin() {
    // load view dashboard admin
    $this->load->view('dashboard_admin');
  }

  public function sales() {
    // load view dashboard sales
    $this->load->view('dashboard_sales');
  }

  public function manager() {
    // load view dashboard manager
    $this->load->view('dashboard_manager');
  }
}

    }
}