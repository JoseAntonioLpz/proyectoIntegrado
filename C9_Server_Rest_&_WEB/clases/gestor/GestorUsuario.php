<?php
    require_once('../clases/Autoload.php');
    require_once('../clases/vendor/autoload.php');
    
    class GestorUsuario{
        private $gestor;
    
        function __construct($entityManager = null){
            $this->gestor = $entityManager;
            if($entityManager===null){
                $b = new Bootstrap();
                $this->gestor = $b->getEntityManager();
            }
        }
        
        function addUser(Usuario $user){
            try{
                $this->gestor->persist($user);
                $this->gestor->flush();
                return $user->getId();
            }catch(Exception $e){
                var_dump($e->getMessage());
                return 0;
            }
        }
        
        function getUser($seguridadSocial){
            try{
                $repositorio = $this->gestor->getRepository('Usuario');
                $user = $repositorio->findOneBy(array('seguridadSocial' => $seguridadSocial));
                //echo var_dump($user);
                return $user;
            }catch(Exception $e){
                //var_dump($e->getMessage());
                return 0;
            }
        
        }
        
        function deleteUser($seguridadSocial){
            //echo $seguridadSocial;
            try{
                $user = $this->getUser($seguridadSocial);
                $this->gestor->remove($user);
                $this->gestor->flush();
                return 1;
            }catch(Exception $e){
                return 0;
            }
        }
        
        function updateUser(Usuario $user){
            try{
                 $user = $user;
                 $this->gestor->flush();
                 return $user->getId();
             }catch(Exception $e){
                 $e->getMessage();
                 return 0;
             }
        }
    }