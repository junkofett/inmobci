<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inmueble extends CI_Model
{
	private function crear_boton($tlf){
		$form  =	form_open('tabla');
  	$form .=	  form_hidden('telefono', $tlf);
  	$form .=		form_submit('interes', 'Estoy Interesado');
  	$form .=	form_close();

  	return $form;
	}

  public function carga_inmuebles($where){
    $res = $this->db->query("select *
                             from inmuebles join propietarios on 
                               (inmuebles.propietarios_id = propietarios.id)
                            $where");

	  $tablacom = $res->result_array();

	  $tablafil = NULL;

	  for($i = 0; $i < count($tablacom); $i++){
	  	foreach($tablacom[$i] as $key => $value){
	  		switch($key){
	  			case 'nombre':				$tablafil[$i][$key] = $value;
	  														break;
	  			case 'habitaciones':	$tablafil[$i][$key] = $value;
	  														break;
	  			case 'baños':					$tablafil[$i][$key] = $value;
	  														break;
	  			case 'lavavajillas':	$tablafil[$i][$key] = ($value == 't') ? 'Sí' : 'No';
	  														break;
	  			case 'garaje':				$tablafil[$i][$key] = ($value == 't') ? 'Sí' : 'No';
	  														break;
	  			case 'trastero':			$tablafil[$i][$key] = ($value == 't') ? 'Sí' : 'No';
	  														break;
	  			case 'precio':				$tablafil[$i][$key] = $value;
	  														break;
	  		}
	  		if(!empty($tablafil[$i]))
	  			$tablafil[$i]['interes'] = $this->crear_boton($tablacom[$i]['telefono']);
	  	}
	  }

    return (!is_null($tablafil)) ? $tablafil : NULL;
  }
}