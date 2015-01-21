<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tabla extends CI_Controller
{
  private function comprobar_where($where){
	  if($where != "where ")
	    return "and ";
  }

  private function comprobar_filtro($filtro){
  	return ($filtro !== FALSE) ? TRUE : FALSE; 
  }

 	private function crear_where(){
 		$where = "where ";
		$lavavajillas = $this->input->post('lavavajillas');
		$trastero = $this->input->post('trastero');
		$garaje = $this->input->post('garaje');
		$premin = $this->input->post('premin');
		$premax = $this->input->post('premax');
		$hab = $this->input->post('hab');
		$ban = $this->input->post('ban');

		if($this->comprobar_filtro($lavavajillas)){
			$where .= $this->comprobar_where($where);
			$where .= "lavavajillas is true ";
		}

		if($this->comprobar_filtro($trastero)){
			$where  .= $this->comprobar_where($where);
			$where .= "trastero is true ";	
		}

		if($this->comprobar_filtro($garaje)){
			$where .= $this->comprobar_where($where);
			$where .= "garaje is true ";	
		}

	  if(($premin != "") && ($premax != "")){
			$where .= $this->comprobar_where($where);
	    $where .= "precio between $premin and $premax ";
	  }

	  if(($premin != "") && (($premax == ""))){
			$where .= $this->comprobar_where($where);
	    $where .= "precio >= $premin ";
	  }

	  if(($premin == "") && ($premax != "")){
			$where .= $this->comprobar_where($where);
	    $where .= "precio <= $premax ";
	  }

	  if($hab != ""){
			$where .= $this->comprobar_where($where);
	    $where .= "habitaciones >= $hab";
	  }

	  if($ban != ""){
			$where .= $this->comprobar_where($where);
	    $where .= "baños >= $ban";
	  }

	  return ($where != "where ") ? $where : "";
	}

	public function index(){
		$where = ($this->input->post('filtrar')) ? $this->crear_where() : "";

	  $data['res'] = $this->Inmueble->carga_inmuebles($where);
	  
	  if($this->input->post('telefono'))
	  	$data['telefono'] = $this->input->post('telefono');

	  $this->load->view('index', $data);
	}
}