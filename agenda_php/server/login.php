<?php

  require('conector.php');

  $con = new ConectorBD('localhost','root','');

  /*$username = $_POST['username'];
  echo $username;*/


  $response['conexion'] = $con->initConexion('agenda_db');

  if ($response['conexion']=='OK') {

    $resultado_consulta = $con->consultar(['usuarios'],
    ['email', 'contrasena', 'nombre'], 'WHERE email="'.$_POST['username'].'" AND contrasena="'.md5($_POST['password']).'"');


    if ($resultado_consulta->num_rows != 0) {
      $fila = $resultado_consulta->fetch_assoc();
      if (MD5($_POST['password']) == $fila['contrasena']) {
        $response['acceso'] = 'concedido';
        session_start();
        $_SESSION['username']=$fila['email'];
        $_SESSION['nombre'] = $fila['nombre'];
      }

    }/*else{$response['acceso'] = 'rechazado';
  }*/
}
  echo json_encode($response);

  $con->cerrarConexion();



 ?>
