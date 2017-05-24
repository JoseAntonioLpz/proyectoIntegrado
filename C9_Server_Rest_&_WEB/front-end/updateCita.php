<?php
    include_once('header.php');
    if(isset($_SESSION['seguridadSocial'])){
        include_once('nav/nav1.php');
    }else{
        include_once('nav/nav.php');
    }
    //include_once('nav/nav1.php');
    include_once('../clases/Autoload.php');
    include_once('../clases/vendor/autoload.php');
    
    $gestor = new GestorCita();
    $id = $_GET['id'];
    //$cita = new Cita();
    $cita = $gestor->getCita($id);
    //var_dump($cita);
    
    if(isset($_POST['aceptar'])){
        if(!empty($_POST['seguridadSocial']) || !empty($_POST['telephone']) || !empty($_POST['type']) || !empty($_POST['reason']) || 
        !empty($_POST['fecha'])){
            //$cita->setId($id);
            //$cita->setId($id);
            //$cita->seguridadSocial = $_POST['seguridadSocial'];
            /*$modelo = new ModeloCita();
            $id = $_GET['id'];
            $cita = $gestor->getCita($id);*/
            //var_dump($cita);
            $cita->setSeguridadSocial($_POST['seguridadSocial']);
            $cita->setTelephone($_POST['telephone']);
            $cita->setType($_POST['type']);
            $cita->setReason($_POST['reason']);
            $cita->setFecha(date_create($_POST['fecha']));
            
            $gestor->updateCita($cita);
            //echo 'Todo correcto';
            if(isset($_SESSION['seguridadSocial'])){
                header('Location: home.php');
            }else{
                header('Location: index.php');
            }
        }else{
            echo 'Algun campo está vacío'; 
        }
    }
?>
    <div class="separador"></div>
    <div class="container fondoBlanco">
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                <div class="card">
                    <center>
                    <p class="titulo">Pedir una cita</p>
                    <form action="updateCita.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                        <input type="text" name="seguridadSocial" placeholder="Seguridad Social" value="<?php echo $cita->getSeguridadSocial()?>"/>
                        <br>
                        <br>
                        <input type="text" name="telephone" placeholder="Telefono" value="<?php echo $cita->getTelephone()?>"/>
                        <br>
                        <br>
                        <input type="text" name="type" placeholder="Tipo de consulta" value="<?php echo $cita->getType()?>"/>
                        <br>
                        <br>
                        <input type="text" name="reason" placeholder="Razón" value="<?php echo $cita->getReason()?>"/>
                        <br>
                        <br>
                        <input type="date" name="fecha" placeholder="Fecha" value="<?php 
                            $date = $cita->getFecha();
                            echo date_format($date ,'Y-m-d');?>"/>
                        <br>
                        <br>
                        <input type="submit" name="aceptar" value="Actualizar" class="buttons"/>
                    </form>
                    </center>
                </div>
                <div class="separador"></div>
            </div>
        </div>
    </div>
    <div class="separador"></div>
<?php
    include_once('footer.php');
?>