<?php
  require('conector.php');


  //$event_id = $_POST['id'];
  //$response['id'] = $event_id;

    $con = new ConectorBD('localhost','root','');
    if ($con->initConexion('agenda_db')=='OK'){

      $data['start_date'] = $_POST['start_date'];
      //$data['allDay'] = $_POST['allDay'];
      $data['end_date'] = $_POST['end_date'];
      $data['end_hour'] = $_POST['end_hour'];
      $data['start_hour'] = $_POST['start_hour'];

      if ($con->actualizarRegistro('eventos', $data, "id = ".$_POST['id'])){
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
