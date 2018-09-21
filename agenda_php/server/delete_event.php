<?php
  require('conector.php');


  $event_id = $_POST['id'];
  $response['id'] = $event_id;

    $con = new ConectorBD('localhost','root','');
    if ($con->initConexion('agenda_db')=='OK'){

      if ($con->eliminarRegistro('eventos', $event_id)){
        $response['msg'] = 'OK';
      }else{
        $response['msg'] =  'No se elimino el evento';
      }
    }else {
      $response['msg'] = "No se pudo conectar a la Base de Datos";
    }

  echo json_encode($response);

$con->cerrarConexion();


 ?>
