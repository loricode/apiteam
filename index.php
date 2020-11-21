<?php

require_once("cors.php");
require_once("api.php");
require_once("conexion.php");

ini_set('display_errors', 1);
error_reporting(E_ALL);
header("Content-Type:application/json");

$url = $_SERVER['REQUEST_URI'];
$methodHTTP = $_SERVER['REQUEST_METHOD'];

if($url == '/apiteam/' && $methodHTTP == 'GET'){
     $teams = array();
     $api = new Api();
     $teams = $api->getTeams();
     echo json_encode($teams);
}

if($url == '/apiteam/' && $methodHTTP == 'POST'){
	$data = $_POST;
     $api = new Api();
     $result = $api->addTeam($data);
     echo $result;
}
  
if($methodHTTP == 'DELETE'){
	 $data = $_GET;
	 $api = new Api();
      $result = $api->deleteTeam($data);
	 echo $result;
}

if(!empty($_GET['id']) && $methodHTTP == 'GET'){
	 $data = $_GET;
	 $api = new Api();
     $result = $api->getTeam($data);
	 echo json_encode($result);
}

if($url == '/apiteam/' && $methodHTTP == 'PUT'){
      $data = json_decode(file_get_contents('php://input'), true);
      $api = new Api();
      $result = $api->updateTeam($data);
      echo $result;
     
}


?>