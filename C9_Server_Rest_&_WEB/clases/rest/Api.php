<?php

require_once('../clases/Autoload.php');
require_once('../clases/vendor/autoload.php');

class Api {
    
    private $method, $json, $pRest, $pGet, $respuesta;
    
    function __construct($method, $json , $pRest , $pGet){
        $this->method = $method;
        $this->json = $json;
        $this->pRest = $pRest;
        $this->pGet = $pGet;
    }
    
    function findData(){
        switch ($this->pRest[0]) {
            case 'cita':
                $controlador = new ControladorCita($this->method, $this->json, $this->pRest, $this->pGet);
                return $this->respuesta = $controlador->doOperation();
                break;
            case 'usuario':
                //echo('Acabas de entrar en la API');
                $controlador = new ControladorUsuario($this->method, $this->json, $this->pRest, $this->pGet);
                return $this->respuesta = $controlador->doOperation();
                break;
            default:
                echo 'Error';
                break;
        }
        
    }
    
    function getResponse(){
        return $this->respuesta;
    }
}