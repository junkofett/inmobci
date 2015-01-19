<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tabla extends CI_Controller
{
  public function index(){
    $data['res'] = $this->Inmueble->carga_inmuebles();

    $this->load->view('index', $data);
  }
}