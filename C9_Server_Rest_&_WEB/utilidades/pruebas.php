<?php
    /*require_once('../clases/Autoload.php');
    require_once('../clases/vendor/autoload.php');
    $b = new Bootstrap();
    $gestor = $b->getEntityManager();
    
    function getUser($seguridadSocial){
            $querySql= "SELECT * FROM usuario WHERE seguridadSocial = '" . $seguridadSocial . "'";
            try{
                $database = "pruebas";
                $usuario = "user";
                $contraseña = "clave";
                $host = "127.0.0.1";
                
                $link = mysql_connect($host, $usuario, $contraseña)
                    or die('No se pudo conectar: ' . mysql_error());
                mysql_select_db($database, $link) or die('No se pudo seleccionar la base de datos');
                
                $ress = mysql_query($querySql, $link) or die('Error en la consulta');
                if (!$ress) {
                    echo "Error de BD, no se pudo consultar la base de datos\n";
                    echo "Error MySQL: " . mysql_error();
                    exit;
                }
                while($line = mysql_fetch_assoc($ress)){
                    $user = new Usuario();
                    $user->setId($line['id']);
                    $user->setSeguridadSocial($line['seguridadSocial']);
                    $user->setPassword($line['password']);
                    $user->setFirstName($line['firstName']);
                    $user->setLastName($line['lastName']);
                }
                return $user;
                
            }catch(Exception $e){
                var_dump($e->getMessage());
                return 0;
            }
        
        }
        
        $user = getUser('75579266R');
        var_dump($user);
        echo '<br> .......................................................................... <br>';
        //NO RECONOCE LOS METODOS getRepository y createQuery

        
        
        function getUser2($seguridadSocial){
                $dql = 'select r FROM Usuario r where r.seguridadSocial = :seguridadSocial order by r.id desc';
                $query = $gestor->createQuery($dql)
                        ->setParameter('seguridadSocial', $seguridadSocial);
                $users = $query->getResult();
                $respuesta = array();
                
                foreach ($users as $user){
                    $respuesta[] = $user->getArray();
                }
                
                var_dump($respuesta);
                return $respuesta;
        }
        
        //$user2 = getUser2('75579266R');
        
        //var_dump($user2);
        
        echo '<br> .......................................................................... <br>';
        
        function getUser3($seguridadSocial){
                $repositorio = $gestor->getRepository('Usuario');
                $user = $repositorio->findOneBy(array('seguridadSocial' => $seguridadSocial));
                return $user->getArray();
        }
        
        //$user3 = getUser3('75579266R');
        
        //var_dump($user3);
                echo '<br> .......................................................................... <br>';
        function getUser4(){
            $user = $gestor->getReference('Usuario', $seguridadSocial);
            return $user->getArray();
        }
        
        $user4 = getUser4('75579266R');
        
        var_dump($user4);
        */
        
        
