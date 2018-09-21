<?php
  require('conector.php');

  session_start();

  $event_id = $_POST['id'];
  $response['id'] = $event_id;

  if (isset($_SESSION['username'])) {
    //$response['msg'] = "OK";




    $con = new ConectorBD('localhost','root','');
    if ($con->initConexion('agenda_db')=='OK'){
      //$event_id = $_POST['id'];

      //$con->eliminarRegistro(['eventos'], "WHERE id ='".$event_id."'");
      //$response['sql'] = $con->eliminarRegistro('eventos', "id = 25");



      if ($con->eliminarRegistro('eventos', "id = 19")){

        $response['msg'] = 'OK';

      }else{
        $response['msg'] =  'No se elimino el evento';
      }

    }else {
      $response['msg'] = "No se pudo conectar a la Base de Datos";
    }


  }else {
    $response['msg'] = "No se ha iniciado una sesión";
  }

  echo json_encode($response);

$con->cerrarConexion();


 ?>
