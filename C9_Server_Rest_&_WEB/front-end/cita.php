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
    
    if(isset($_POST['aceptar'])){
        if(!empty($_POST['seguridadSocial']) || !empty($_POST['telephone']) || !empty($_POST['type']) || !empty($_POST['reason']) || 
        !empty($_POST['fecha'])){
            $cita = new Cita();
            $gestor = new GestorCita();
            
            $cita->setSeguridadSocial($_POST['seguridadSocial']);
            $cita->setTelephone($_POST['telephone']);
            $cita->setType($_POST['type']);
            $cita->setReason($_POST['reason']);
            $cita->setFecha(date_create($_POST['fecha']));
            
            $gestor->addCita($cita);
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
                    <form action="cita.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="seguridadSocial" placeholder="Seguridad Social" 
                        <?php 
                            if(isset($_SESSION['seguridadSocial'])){
                                echo 'value="' . $_SESSION['seguridadSocial'] . '"';
                            } 
                        ?>
                        />
                        <br>
                        <br>
                        <input type="text" name="telephone" placeholder="Telefono"/>
                        <br>
                        <br>
                        <input type="text" name="type" placeholder="Tipo de consulta"/>
                        <br>
                        <br>
                        <input type="text" name="reason" placeholder="Razón"/>
                        <br>
                        <br>
                        <input type="date" name="fecha" placeholder="Fecha"/>
                        <br>
                        <br>
                        <input type="submit" name="aceptar" value="Pedir cita" class="buttons"/>
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