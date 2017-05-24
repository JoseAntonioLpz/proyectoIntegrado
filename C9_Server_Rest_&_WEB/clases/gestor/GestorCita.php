<?php
    require_once('../clases/Autoload.php');
    require_once('../clases/vendor/autoload.php');
    
    class GestorCita{
        private $gestor;
    
        function __construct($entityManager = null){
            $this->gestor = $entityManager;
            if($entityManager===null){
                $b = new Bootstrap();
                $this->gestor = $b->getEntityManager();
            }
        }
        
        function addCita(Cita $cita){
            try{
                //echo"<br>............................................................<br>";
                //var_dump($cita);
                $this->gestor->persist($cita);
                $this->gestor->flush();
                return $cita->getId();
            }catch(Exception $e){
                var_dump($e->getMessage());
                return 0;
            }
        }
        
        function getCitas($seguridadSocial){
            $dql = 'select r FROM Cita r where r.seguridadSocial = :seguridadSocial order by r.id desc';
            try{
                $query = $this->gestor->createQuery($dql)
                        ->setParameter('seguridadSocial', $seguridadSocial);
                $resultado = $query->getResult();
                $citas = array();
                
                foreach ($resultado as $cita){
                    $citas[] = $cita->getArray();
                }
                
                //var_dump($citas);
                return $citas;
            }catch(Exception $e){
                //var_dump($e->getMessage());
                return 0;
            }
        }
        
        function getCita($id){
            try{
                $repositorio = $this->gestor->getRepository('Cita');
                $cita = $repositorio->findOneBy(array('id' => $id));
                //var_dump($cita);
                //echo var_dump($user);
                return $cita;
            }catch(Exception $e){
                //var_dump($e->getMessage());
                return 0;
            }
        }
        
        function getAllCitas(){
            $citas = $this->gestor->getRepository('Cita');
            $todo = $citas->findAll();
            $arrayCitas = array();
            foreach($todo as $cita){
                //var_dump($cita->getArray());
                $arrayCitas[] = $cita->getArray();
            }
            return $arrayCitas;
        }
        
        function deleteCita($id){
            try{
                $cita = $this->getCita($id);
                $this->gestor->remove($cita);
                $this->gestor->flush();
                return 1;
            }catch(Exception $e){
                echo $e;
                return 0;
            }
        }
        
        function updateCita(Cita $cita){
            try{
                 //$cita = $cita;
                 //echo $cita->getReason();
                 $this->gestor->flush();
                 return $cita->getId();
             }catch(Exception $e){
                 $e->getMessage();
                 return 0;
             }   
        }
    }