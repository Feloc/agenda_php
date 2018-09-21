<?php

  require('conector.php');

  $con = new ConectorBD('localhost','root','');

  if ($con->initConexion('agenda_db')=='OK') {
    $conexion = $con->getConexion();

    //$date = date("d/m/y");

    $insert = $conexion->prepare('INSERT INTO usuarios (id, nombre, email, contrasena, fecha_nacimiento) VALUES (?,?,?,?,?)');

    $insert->bind_param("issss", $id, $nombre, $email, $contrasena, $fecha_nacimiento);


    //insertar los datos
    $id = 1;
    $nombre = 'Pablo Gonzales';
    $email = 'pablo.g@mail.com';
    $contrasena = md5('12345');
    $fecha_nacimiento = '1985-07-18';
    $insert->execute();

    $id = 2;
    $nombre = 'Maria Rodriguez';
    $email = 'm_rodriguez@mail.com';
    $contrasena = md5('12345');
    $fecha_nacimiento = '1978-03-29';
    $insert->execute();

    $id = 3;
    $nombre = 'Felipe Ocampo Ceballos';
    $email = 'focdi@hotmail.com';
    $contrasena = md5('123456');
    $fecha_nacimiento = '1981-11-01';
    $insert->execute();

    echo "Se insertaron los registros exitosamente otra vez";

    $con->cerrarConexion();

  }else {
    echo "Se presentó un error en la conexión";
  }




 ?>
