<?php
session_start();
include_once('../clases/Autoload.php');
include_once('../clases/vendor/autoload.php');

$id = $_GET['id'];

$gestor = new GestorCita();
$gestor->deleteCita($id);

if(isset($_SESSION['seguridadSocial'])){
    header('Location: home.php');
}else{
    header('Location: consultas.php');
}