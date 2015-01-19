<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function filtros(){
  $out  = form_open('tabla', array('align' => 'center'));
  $out .=   form_label('Lavavajillas', 'lavavajillas');
  $out .=     form_checkbox('lavavajillas');
  $out .=   '<br />';
  $out .=   form_label('Garaje', 'garaje');
  $out .=     form_checkbox('garaje');
  $out .=   '<br />';
  $out .=   form_label('Trastero', 'trastero');
  $out .=     form_checkbox('trastero');
  $out .=   '<br />';
  $out .=   form_label('Precio Mínimo', 'premin');
  $out .=     form_input('premin');
  $out .=   '<br />';
  $out .=   form_label('Precio Máximo', 'premax');
  $out .=     form_input('premax');
  $out .=   '<br />';
  $out .=   form_label('Número mínimo de habitaciones', 'hab');
  $out .=     form_input('hab');
  $out .=   '<br />';
  $out .=   form_label('Número mínimo de baños', 'ban');
  $out .=     form_input('ban');
  $out .=   '<br />';
  $out .=   form_submit('filtrar', 'Filtrar');
  $out .= form_close();
  $out .= "<hr/>";

  return $out;
}

function tabla_inm($res){
  $CI =& get_instance();
  return $CI->table->generate($res);
}

    /*<form action="index.php" method="get" align="center">
      Lavavajillas <input type="checkbox" name="lavavajillas" <?=(isset($lavavajillas) && $lavavajillas == "on") ? "checked" : "" ?> > <br>
      Garaje <input type="checkbox" name="garaje" <?=(isset($garaje) && $garaje == "on") ? "checked" : "" ?> > <br>
      Trastero <input type="checkbox" name="trastero" <?=(isset($trastero) && $trastero == "on") ? "checked" : "" ?> > <br>
      Precio Mínimo <input type="text" name="premin" value=<?=(isset($premin) && $premin != "") ? "$premin" : "" ?> > <br>
      Precio Máximo <input type="text" name="premax" value=<?=(isset($premax) && $premax != "") ? "$premax" : ""  ?> > <br>
      Número minimo de habitaciones <input type="text" name="hab" value=<?=(isset($hab) && $hab != "") ? "$hab" : ""  ?> > <br>
      Número mínimo de baños  <input type="text" name="ban" value=<?=(isset($ban) && $ban != "") ? "$ban" : ""  ?> > <br>
      <br>
      <input type="submit" value="Filtrar">
    </form>*/