<?php
    require_once('../clases/Autoload.php');
    require_once('../clases/vendor/autoload.php');
    
    class ModeloUsuario{
        private $gestorUsuario ,$gestor;
    
        function __construct(){
            $b = new Bootstrap();
            $this->gestor = $b->getEntityManager();
            $this->gestorUsuario = new GestorUsuario($this->gestor);
        }
        
        function insertUsuario($objeto){
            //echo('Esto es el modelo');
            $usuario = new Usuario();
            $usuario->setSeguridadSocial($objeto->seguridadSocial);
            //echo  $usuario->getSeguridadSocial() . ('Mirando seguridad social');
            $usuario->setPassword($objeto->password);
            $usuario->setFirstName($objeto->firstName);
            $usuario->setLastName($objeto->lastName);
            return $this->gestorUsuario->addUser($usuario);
        }
        
        function deleteUsuario($seguridadSocial){
            return $this->gestorUsuario->deleteUser($seguridadSocial);
        }
        
        function updateUsuario($objeto){
            $usuario =  $this->gestorUsuario->getUser($objeto->seguridadSocial);
            //$usuario->setId($objeto->id);
            //$usuario->setSeguridadSocial($objeto->seguridadSocial);
            $usuario->setFirstName($objeto->firstName);
            $usuario->setLastName($objeto->lastName);
            $usuario->setPassword($objeto->password);
            return $this->gestorUsuario->addUser($usuario);
        }
        
        function getUsuario($seguridadSocial){
            return $this->gestorUsuario->getUser($seguridadSocial);
        }
    }