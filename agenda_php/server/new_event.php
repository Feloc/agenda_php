<?php

  require('conector.php');

  session_start();

  if (isset($_SESSION['username'])) {

    $con = new ConectorBD('localhost','root','');
    $response['conexion'] = $con->initConexion('agenda_db');

    $id = $con->consultar(['usuarios'], ['id'], "WHERE email ='".$_SESSION['username']."'");
    $fila = $id->fetch_assoc();
    //$response['id']=$fila['id'];
    //$response['mssg'] = $_SESSION['username'];

    $data['titulo'] = $_POST['titulo'];
    $data['start_date'] = $_POST['start_date'];
    $data['allDay'] = $_POST['allDay'];
    $data['end_date'] = $_POST['end_date'];
    $data['end_hour'] = $_POST['end_hour'];
    $data['start_hour'] = $_POST['start_hour'];
    $data['fk_usuario'] = $fila['id'];

    if ($response['conexion']=='OK') {

      if($con->insertData('eventos', $data)) {
        $response['msg'] = 'OK';
      }else {
        $response['msg'] = "Se ha producido un error en la inserción";
      }
    }else {
      $response['msg'] = "Se presentó un error en la conexión";
    }
};

  echo json_encode($response);
  //echo json_encode($data);


  $con->cerrarConexion();

 ?>
