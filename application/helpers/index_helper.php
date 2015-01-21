<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function filtros(){
  $out  = form_open('tabla', array('align' => 'center'));
  $out .=   form_label('Lavavajillas', 'lavavajillas');
  $out .=     form_checkbox('lavavajillas', null, comprobar_check('lavavajillas'));
  $out .=   '<br />';
  $out .=   form_label('Garaje', 'garaje');
  $out .=     form_checkbox('garaje', null, comprobar_check('garaje'));
  $out .=   '<br />';
  $out .=   form_label('Trastero', 'trastero');
  $out .=     form_checkbox('trastero', null, comprobar_check('trastero'));
  $out .=   '<br />';
  $out .=   form_label('Precio Mínimo', 'premin');
  $out .=     form_input('premin', comprobar_value('premin'));
  $out .=   '<br />';
  $out .=   form_label('Precio Máximo', 'premax');
  $out .=     form_input('premax', comprobar_value('premax'));
  $out .=   '<br />';
  $out .=   form_label('Número mínimo de habitaciones', 'hab');
  $out .=     form_input('hab', comprobar_value('hab'));
  $out .=   '<br />';
  $out .=   form_label('Número mínimo de baños', 'ban');
  $out .=     form_input('ban', comprobar_value('ban'));
  $out .=   '<br />';
  $out .=   form_submit('filtrar', 'Filtrar');
  $out .= form_close();
  $out .= "<hr/>";

  return $out;
}

function comprobar_value($nombre){
  $CI =& get_instance();
  $valor = $CI->input->post($nombre);

  return ($valor !== FALSE) ? $valor : "";
}

function comprobar_check($nombre){
  $CI =& get_instance();
  return ($CI->input->post($nombre) !== FALSE) ? TRUE : FALSE;
}

function tabla_inm($res){
  $out  = "<table border='1' style='margin:auto'>";
  $out .=    "<thead>";
  $out .=      "<th>Propietario</th><th>Habitaciones</th><th>Baños</th><th>Lavavajillas</th><th>Garaje</th><th>Trastero</th><th>Precio</th><th>Interes</th>";
  $out .=    "</thead>";
  $out .=    "<tbody>";

  if($res != NULL){
    foreach($res as $fila){
      $out .= "<tr>";
      $out .=     "<td>".$fila['nombre']."</td>";
      $out .=     "<td>".$fila['habitaciones']."</td>";
      $out .=     "<td>".$fila['baños']."</td>";
      $out .=     "<td>".$fila['lavavajillas']."</td>";
      $out .=     "<td>".$fila['garaje']."</td>";
      $out .=     "<td>".$fila['trastero']."</td>";
      $out .=     "<td>".$fila['precio']."</td>";
      $out .=     "<td>".$fila['interes']."</td>";
      $out .= "</tr>";
    }
  }

  $out .=    "</tbody>";
  $out .= "</table>";

  return $out;
}