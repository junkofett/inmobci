<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tabla extends CI_Controller
{
	private $where = "where ";

  public function index(){
  	$tmpl = array('table_open' => '<table border="1" style="margin:auto">');

  	$where = ($this->input->post('filtrar')) ? crear_where() : "";

    $data['res'] = $this->Inmueble->carga_inmuebles();

		$this->table->set_template($tmpl);

    $this->load->view('index', $data);
  }

  private function crear_where(){
  	$lavavajillas = $this->load->post('lavavajillas');
  	$trastero = $this->load->post('trastero');
  	$garaje = $this->load->post('garaje');
  	$premin = $this->load->post('premin');
  	$premax = $this->load->post('premax');
  	$hab = $this->load->post('hab');
  	$ban = $this->load->post('ban');

  	$where .= ($lavavajillas !== FALSE) ? comprobar_where()."lavavajillas is true " : "";
    $where .= ($garaje !== FALSE) ? comprobar_where()."garaje is true " : "";
    $where .= ($trastero !== FALSE) ? comprobar_where()."trastero is true " : "";

    if((isset($premin) && $premin != "") && (isset($premax) && $premax != "")){
      $where .= comprobar_where()."precio between $premin and $premax ";
    }

    if((isset($premin) && $premin != "") && (isset($premax) && $premax == "")){
      $where .= comprobar_where()."precio >= $premin ";
    }

    if((isset($premin) && $premin == "") && (isset($premax) && $premax != "")){
      $where .= comprobar_where()."precio <= $premax ";
    }

    if((isset($hab) && $hab != "")){
      $where .= comprobar_where()."habitaciones >= $hab";
    }

    if((isset($ban) && $ban != "")){
      $where .= comprobar_where()."baños >= $ban";
    }
  }

  private function comprobar_where(){
    if($where != "where ")
      $where .= "and ";
  }

  /*Lavavajillas <input type="checkbox" name="lavavajillas" <?=(isset($lavavajillas) && $lavavajillas == "on") ? "checked" : "" ?> > <br>
      Garaje <input type="checkbox" name="garaje" <?=(isset($garaje) && $garaje == "on") ? "checked" : "" ?> > <br>
      Trastero <input type="checkbox" name="trastero" <?=(isset($trastero) && $trastero == "on") ? "checked" : "" ?> > <br>
      Precio Mínimo <input type="text" name="premin" value=<?=(isset($premin) && $premin != "") ? "$premin" : "" ?> > <br>
      Precio Máximo <input type="text" name="premax" value=<?=(isset($premax) && $premax != "") ? "$premax" : ""  ?> > <br>
      Número minimo de habitaciones <input type="text" name="hab" value=<?=(isset($hab) && $hab != "") ? "$hab" : ""  ?> > <br>
      Número mínimo de baños  <input type="text" name="ban" value=<?=(isset($ban) && $ban != "") ? "$ban" : ""  ?> > <br>
      <br>*/
}