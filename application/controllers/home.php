<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('modelo');
  }

  function index(){
    // $data['kpi1'] = $this->modelo->kpi1();
    // $data['kpi2'] = $this->modelo->kpi2();
    // $data['kpi3'] = $this->modelo->kpi3();
    // $data['kpi4'] = $this->modelo->kpi4();
    $this->load->view('index');
  }

  function kpi1(){
    echo json_encode($this->modelo->kpi1());

  }

    function kpi2(){
    echo json_encode($this->modelo->kpi2());

  }
  
}
