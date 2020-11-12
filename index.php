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


?>