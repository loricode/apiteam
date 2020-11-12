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


public function addTeam($data){
  $name = $data['name'];
  $trophy = $data['trophy'];
  $image = $data['image'];
  $conexion = new Conexion();
  $db = $conexion->getConexion();
  $sql = "INSERT INTO teamfootball (name, trophy, image) VALUES (:name,:trophy,:image)";
  $query = $db->prepare($sql);
  $query->bindParam(':name', $name);
  $query->bindParam(':trophy', $trophy);
  $query->bindParam(':image', $image);
  $query->execute();
  
  return '{"msg":"added successfully"}';
}


}

?>