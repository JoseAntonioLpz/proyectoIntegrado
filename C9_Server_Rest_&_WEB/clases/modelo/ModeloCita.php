<?php
    require_once('../clases/Autoload.php');
    require_once('../clases/vendor/autoload.php');
    
    class ModeloCita{
        private $gestocita ,$gestor;
    
        function __construct(){
            $b = new Bootstrap();
            $this->gestor = $b->getEntityManager();
            $this->gestorCita = new GestorCita($this->gestor);
        }
        
        function insertCita($objeto){
            $cita = new Cita();
            $cita->setSeguridadSocial($objeto->seguridadSocial);
            $cita->setType($objeto->type);
            $cita->setReason($objeto->reason);
            $cita->setTelephone($objeto->telephone);
            $cita->setFecha(date_create($objeto->fecha));
            //var_dump($cita->getFecha());
            return $this->gestorCita->addCita($cita);
        }
        
        function getCita($id){
            //echo $id;
            $cita = $this->gestorCita->getCita($id);
            return $cita->getArray();
        }
        
        function getCitas($seguridadSocial){
            return $this->gestorCita->getCitas($seguridadSocial);
        }
        
        function getAllCitas(){
            return $this->gestorCita->getAllCitas();
        }
        
        function deleteCita($id){
            return $this->gestorCita->deleteCita($id);
        }
        
        function updateCita($objeto){
            //$cita = new Cita();
            //$cita->setId($objeto->id);
            $cita = $this->gestorCita->getCita($objeto->id);
            $cita->setSeguridadSocial($objeto->seguridadSocial);
            $cita->setType($objeto->type);
            $cita->setReason($objeto->reason);
            $cita->setTelephone($objeto->telephone);
            $cita->setFecha(date_create($objeto->fecha));
            return $this->gestorCita->updateCita($cita);
        }
    }