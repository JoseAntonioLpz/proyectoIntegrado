<?php
/*
require_once('../clases/Autoload.php');
require_once('../clases/vendor/autoload.php');
*/
//..............................................................................
/*
switch ($this->metodo) {
    case 'POST':
        echo 'Post';
        break;
    case 'GET':
        echo 'Get';
        break;
    case 'DELETE':
        echo 'Delete';
        break;
    case 'PUT':
        echo 'Put';
        break;
    default:
        echo 'Error, please use a correct method for obtain the information';
        break;
}
*/
//..............................................................................
/*    function getUser($seguridadSocial){
            //$dql = 'select r FROM Usuario r where r.seguridadSocial = :seguridadSocial order by r.id desc';
            
            //$seguridadSocial = '75579266R';
            
            
            
            /*$querySql= "SELECT * FROM usuario WHERE seguridadSocial = '" . $seguridadSocial . "'";
            //echo $querySql;*/
            
            
            
          //  try{
                /*$dbc = mysqli_connect('127.0.0.1','user','clave','pruebas') 
                    or die('No se puede conectar a la base de datos' . mysql_error());
                    
                $res = mysqli_query($dbc,$querySql) or die ('error en la consulta');
                
                while($line = mysqli_fetch_array($res)){
                    $user.setId($line['id']);
                    $user.setSeguridadSocial($line['seguridadSocial']);
                    $user.setPassword($line['password']);
                    $user.setFirstName($line['firstName']);
                    $user.setLastName($line['lastName']);
                }*/
                /*$database = "pruebas";
                $usuario = "user";
                $contraseña = "clave";
                $host = "127.0.0.1";
                
                $link = mysql_connect($host, $usuario, $contraseña)
                    or die('No se pudo conectar: ' . mysql_error());
                //echo 'Connected successfully';
                mysql_select_db($database, $link) or die('No se pudo seleccionar la base de datos');
                
                $ress = mysql_query($querySql, $link) or die('Error en la consulta');
                //var_dump($ress);
                if (!$ress) {
                    echo "Error de BD, no se pudo consultar la base de datos\n";
                    echo "Error MySQL: " . mysql_error();
                    exit;
                }
                //$line = mysql_fetch_array($ress);
                echo('fuera');
                var_dump($ress);
                while($line = mysql_fetch_assoc($ress)){
                    echo'Dentro';
                    var_dump($line);
                    $user = new Usuario();
                    $user->setId($line['id']);
                    //echo $line['id'];
                    $user->setSeguridadSocial($line['seguridadSocial']);
                    $user->setPassword($line['password']);
                    $user->setFirstName($line['firstName']);
                    $user->setLastName($line['lastName']);
                    //$user->setLastName('lopez');
                    var_dump($user);
                    
                }*/
                //ESTO FUNCIONA
                /*$USUARIOS = $this->gestor->getRepository('Usuario');
                $TODO = $USUARIOS->findAll();
                var_dump($TODO);*/
                //...................................................................
                //ESTO NO FUNCIONA
      /*          $repositorio = $this->gestor->getRepository('Usuario');
                $user = $repositorio->findOneBy(array('seguridadSocial' => $seguridadSocial));
                echo var_dump($user);
                //$user = $this->gestor->getReference('Usuario', $seguridadSocial);
                return $user;
                //.....................................................................
                /*$query = $this->gestor->createQuery($dql)
                        ->setParameter('seguridadSocial', $seguridadSocial);
                $users = $query->getResult();
                $respuesta = array();
                
                foreach ($users as $user){
                    $respuesta[] = $user->getArray();
                }
                
                var_dump($respuesta);
                return $respuesta;*/
                //var_dump($user);
                //$user = new Usuario();
                
                //return $user;
                
       /*     }catch(Exception $e){
                var_dump($e->getMessage());
                return 0;
            }
        
        }
    */    
    
            
//....................................................................................


//SESIONES

/*
    <?php
        session_start();
    ?>
        <!DOCTYPE html>
        <html>
        <body>
        $_SESSION["favcolor"] = "green";
    <?php
        // remove all session variables
        session_unset(); 
        
        // destroy the session 
        session_destroy(); 
    ?>
    
*/
?>