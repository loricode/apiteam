<?php

class Api{

  public function getTeams(){

    $list = array();
    $conexion = new Conexion();
    $db = $conexion->getConexion();
    $sql = "SELECT * FROM teamfootball";
    $query = $db->prepare($sql);
    $query->execute();
    while($row = $query->fetch()) {
          $list[] = array(
            "id" => $row['id'],
            "name" => $row['name'],
            "trophy" => $row['trophy'],
            "image" => $row['image'] );
          }//fin del ciclo while 

    return $list;
  }
}

?>