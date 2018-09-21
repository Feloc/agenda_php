<?php
  header('content-Type:application/json');
  require('conector.php');

  session_start();

  //$response['mssg'] = 'sesion';

  if (isset($_SESSION['username'])) {


    $con = new ConectorBD('localhost','root','');
    if ($con->initConexion('agenda_db')=='OK'){
      $id = $con->consultar(['usuarios'], ['id'], "WHERE email ='".$_SESSION['username']."'");
      $fila = $id->fetch_assoc();

      $response['mssg'] = $_SESSION['username'];

      $eventos = $con->consultar(['eventos'],['*'],"WHERE fk_usuario='".$fila['id']."'");
      //$response['eventos'] = $eventos->fetch_assoc();
      $i = 0;
      while ($fila = $eventos->fetch_assoc()) {
        $response['eventos'][$i]['id']=$fila['id'];
        $response['eventos'][$i]['title']=$fila['titulo'];
        $response['eventos'][$i]['start']=$fila['start_date']."T".$fila['start_hour'];
        $response['eventos'][$i]['end']=$fila['end_date'];

        $i++;
      }

      $response['msg'] = 'OK';
      $response['nombre'] = $_SESSION['nombre'];

    }else {
      $response['msg'] = "No se pudo conectar a la Base de Datos";
    }


  }else {
    $response['msg'] = "No se ha iniciado una sesión";
  }

  echo json_encode($response);

  $con->cerrarConexion();
 ?>
