<?php
require_once('../clases/Autoload.php');
require_once('../clases/vendor/autoload.php');

class ControladorCita{
    
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
                $modelo = new ModeloCita();
                return $modelo->insertCita($this->json);
                break;
            case 'GET':
                switch(count($this->pRest)){
                    case 1:
                        $modelo = new ModeloCita();
                        return $modelo->getAllCitas();
                        break;
                    case 2:
                        $modelo = new ModeloCita();
                        return $modelo->getCitas($this->pRest[1]);
                        break;
                    case 3:
                        $modelo = new ModeloCita();
                        return $modelo->getCita($this->pRest[2]);
                        break;
                    default:
                        
                        break;
                }
                break;
            case 'DELETE':
                $modelo = new ModeloCita();
                return $modelo->deleteCita($this->pRest[1]);
                break;
            case 'PUT':
                $modelo = new ModeloCita();
                return $modelo->updateCita($this->json);
                break;
            default:
                echo 'Error, please use a correct method for obtain the information';
                break;
        }
    }
}
?>