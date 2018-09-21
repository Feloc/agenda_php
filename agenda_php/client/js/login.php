<?php

  require('../../server/conector.php');

  $con = new ConectorBD('localhost','root','');

  $response['conexion'] = $con->initConexion('agenda_db');

  if ($response['conexion']=='OK') {
    $response['msg'] = 'OK';
    //echo $response['msg'];

  /*  if ($resultado_consulta->num_rows != 0) {
      $response['msg'] = 'concedido';
    }else{
      $response['msg'] = 'rechazado';
    }*/

  }


  echo json_encode($response);

  $con->cerrarConexion();



 ?>
