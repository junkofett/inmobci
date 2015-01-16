<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Examen PHP 1er Trimestre</title>
  </head>
  <body><?php
    require 'auxiliar.php';

    $con = conectar();
    $where = "where ";
    $href = "";

    limpiar_datos_get();

    extract($_GET);

    function limpiar_datos_get(){
      foreach ($_GET as $key => $value)
        $_GET["$key"] = trim($value);
    }

    function comprobar_where(){
      global $where;

      if($where != "where ")
        $where .= "and ";
    }

    function devolver_href($numero){
      global $href;

      $href = "index.php?estoyinteresado=$numero&";
      $href .= (isset($lavavajillas) && $lavavajillas == "on") ? "lavavajillas=on&" : "" ;
      $href .= (isset($garaje) && $garaje == "on") ? "garaje=on&" : ""; 
      $href .= (isset($trastero) && $trastero == "on") ? "trastero=on" : "";
      $href .= (isset($premin) && $premin != "") ? "premin=$premin&" : "";
      $href .= (isset($premax) && $premax != "") ? "premax=$premax&" : "";
      $href .= (isset($hab) && $hab != "") ? "hab=$hab&" : "";
      $href .= (isset($ban) && $ban != "") ? "ban=$ban" : "";

      return $href;
    }

    $where .= (isset($lavavajillas) && $lavavajillas != "") ? comprobar_where()."lavavajillas is true " : "";
    $where .= (isset($garaje) && $garaje !="") ? comprobar_where()."garaje is true " : "";
    $where .= (isset($trastero) && $trastero !="") ? comprobar_where()."trastero is true " : "";

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

    //echo $where;

    $res = pg_query($con, "select *
                             from inmuebles join propietarios on 
                               (inmuebles.propietarios_id = propietarios.id)".
                ($where != "where " ? $where : ""));

    $fila = pg_fetch_all($res); ?>
    <h3 align="center">Criterios de busqueda</h3>
    <form action="index.php" method="get" align="center">
      Lavavajillas <input type="checkbox" name="lavavajillas" <?=(isset($lavavajillas) && $lavavajillas == "on") ? "checked" : "" ?> > <br>
      Garaje <input type="checkbox" name="garaje" <?=(isset($garaje) && $garaje == "on") ? "checked" : "" ?> > <br>
      Trastero <input type="checkbox" name="trastero" <?=(isset($trastero) && $trastero == "on") ? "checked" : "" ?> > <br>
      Precio Mínimo <input type="text" name="premin" value=<?=(isset($premin) && $premin != "") ? "$premin" : "" ?> > <br>
      Precio Máximo <input type="text" name="premax" value=<?=(isset($premax) && $premax != "") ? "$premax" : ""  ?> > <br>
      Número minimo de habitaciones <input type="text" name="hab" value=<?=(isset($hab) && $hab != "") ? "$hab" : ""  ?> > <br>
      Número mínimo de baños  <input type="text" name="ban" value=<?=(isset($ban) && $ban != "") ? "$ban" : ""  ?> > <br>
      <br>
      <input type="submit" value="Filtrar">
    </form>

    <table border="1" style="margin:auto">
      <thead>
        <th>Propietario</th>
        <th>Habitaciones</th>
        <th>Baños</th>
        <th>Lavavajillas</th>
        <th>Garaje</th>
        <th>Trastero</th>
        <th>Precio</th>
        <th>Interés</th>
      </thead>
      <tbody> <?php
        foreach($fila as $v){ ?>
          <tr>
              <td><?= $v['nombre'] ?></td>
              <td><?= $v['habitaciones'] ?></td>
              <td><?= $v['baños'] ?></td>
              <td><?= ($v['lavavajillas']) == 't' ? "Sí" : "No" ?></td>
              <td><?= ($v['garaje']) == 't' ? "Sí" : "No" ?></td>
              <td><?= ($v['trastero']) == 't' ? "Sí" : "No" ?></td>
              <td><?= $v['precio'] ?></td>
              <td><a href=<?=devolver_href($v['numero'])?>><button>Estoy Interesado</button></a></td>
          </tr> <?php
        } ?>        
      </tbody>
    </table> <?php

    if(isset($estoyinteresado) && $estoyinteresado != ""){
      $res = pg_query_params($con,"select *
                                     from inmuebles join propietarios on 
                               (inmuebles.propietarios_id = propietarios.id)
                                    where inmuebles.numero = $1",[$estoyinteresado]); 
      $fila = pg_fetch_assoc($res); ?>

      <h2>Propietario: <?= $fila['nombre'] ?> <br> Telefono: <?= $fila['telefono']?></h2> <?php
    }

    pg_close($con); ?>
  </body>
</html>