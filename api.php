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

public function deleteTeam($data){
  $id = $data['id'];
  $conexion = new Conexion();
  $db = $conexion->getConexion();
  $sql = "DELETE FROM teamfootball WHERE id=:id";
  $query = $db->prepare($sql);
  $query->bindParam(':id', $id);
  $query->execute();
  return '{"msg":"removed"}';
}

public function getTeam($data){
    $id = $data['id'];
    $list = array();
    $conexion = new Conexion();
    $db = $conexion->getConexion();
    $sql = "SELECT * FROM teamfootball WHERE id=:id";
    $query = $db->prepare($sql);
    $query->bindParam(':id', $id); 
    $query->execute();
    while($row = $query->fetch()) {
          $list[] = array(
            "id" => $row['id'],
            "name" => $row['name'],
            "trophy" => $row['trophy'],
            "image" => $row['image'] );
          }//fin del ciclo while 

    return $list[0];
  }


public function updateTeam($data){
  $id = $data['id'];
  $name = $data['name'];
  $trophy = $data['trophy'];
  $image = $data['image'];
  $conexion = new Conexion();
  $db = $conexion->getConexion();
  $sql="UPDATE teamfootball SET name=:name,trophy=:trophy,image=:image
        WHERE id=:id";
  $query = $db->prepare($sql);
  $query->bindParam(':id', $id); 
  $query->bindParam(':name', $name);
  $query->bindParam(':trophy', $trophy);
  $query->bindParam(':image', $image);
  $query->execute();

  return '{"msg":"updated successfully"}';
}


}

?>