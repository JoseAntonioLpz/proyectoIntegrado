<?php

header('Content-Type: application/json');

require_once('../clases/Autoload.php');
require_once('../clases/vendor/autoload.php');

//echo  file_get_contents('php://input');
$json = json_decode(file_get_contents('php://input'));
//echo $json->seguridadSocial;

$parameters = explode('/', $_GET['url']);
$method = $_SERVER['REQUEST_METHOD'];
$api = new Api($method, $json, $parameters, $_GET);
$api->findData();

$respuesta = json_encode($api->getResponse());
echo $respuesta;
