<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inmueble extends CI_Model
{
  public function carga_inmuebles($where = ""){
    $res = $this->db->query("select *
                             from inmuebles join propietarios on 
                               (inmuebles.propietarios_id = propietarios.id)
                            $where");
    
    return $res->result_array();
  }
}