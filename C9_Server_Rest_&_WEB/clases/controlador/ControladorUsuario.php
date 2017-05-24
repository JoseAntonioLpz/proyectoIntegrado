<?php
require_once('../clases/Autoload.php');
require_once('../clases/vendor/autoload.php');

class ControladorUsuario{
    
    private $method, $json, $pRest, $pGet;
    
    function __construct($method, $json , $pRest , $pGet){
        $this->method = $method;
        $this->json = $json;
        $this->pRest = $pRest;
        $this->pGet = $pGet;
    }
    
    function doOperation(){
        switch ($this->method) {
            case 'POST':
                //echo ('Estoy en el controlador');
                $modelo = new ModeloUsuario();
                return $modelo->insertUsuario($this->json);
                break;
            case 'GET':
                $modelo = new ModeloUsuario();
                //echo $this->pRest[1] . 'mostrando ss';
                $user = $modelo->getUsuario($this->pRest[1]);
                return $user->getArray();
                break;
            case 'DELETE':
                $modelo = new ModeloUsuario();
                return $modelo->deleteUsuario($this->pRest[1]);
                break;
            case 'PUT':
                $modelo = new ModeloUsuario();
                return $modelo->updateUsuario($this->json);
                break;
            default:
                echo 'Error, please use a correct method for obtain the information';
                break;
        }
    }
}
?>