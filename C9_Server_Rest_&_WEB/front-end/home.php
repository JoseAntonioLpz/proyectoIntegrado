<?php
    include_once('header.php');
    if(isset($_SESSION['seguridadSocial'])){
        include_once('nav/nav1.php');
    }else{
        include_once('nav/nav.php');
    }
    include_once('../clases/Autoload.php');
    include_once('../clases/vendor/autoload.php');
    
    $gestor = new GestorCita();
    $citas = $gestor->getCitas($_SESSION['seguridadSocial']);
    
    
    //echo $_SESSION['seguridadSocial'];
?>
    <div class="separador"></div>
    <div class="container fondoBlanco">
        <div class="row">
            <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                <div class="card">
                    <center>
                        <p class="titulo">Tus citas</p>
                        <?php
                        foreach($citas as $cita){
                                    //echo 'hola';
                                    ?>
                                    <!--<div class="card">-->
                                    <span class="">
                                        <?php
                                            echo  'Nº identificador de la cita: ' . $cita['id'];
                                        ?>
                                    </span>
                                    <br>
                                    <span class="">
                                        <?php
                                            echo 'Nº seguridad social del paciente: ' . $cita['seguridadSocial'];
                                        ?>
                                    </span>
                                    <br>
                                    <span class="">
                                        <?php
                                            echo 'Tipo de consulta medica: ' . $cita['type'];
                                        ?>
                                    </span>
                                    <br>
                                    <span class="">
                                        <?php
                                            echo 'Razón de la cita: ' . $cita['reason'];
                                        ?>
                                    </span>
                                    <br>
                                    <span class="">
                                        <?php
                                            echo 'Telefono de contacto: ' . $cita['telephone'];
                                        ?>
                                    </span>
                                    <br>
                                    <span class="">
                                        <?php
                                            $date = $cita['fecha'];
                                            echo 'Fecha: ' . date_format($date, 'd-m-Y')
                                            //echo 'Fecha: ' . $cita['fecha'];
                                        ?>
                                    </span>
                                    <!--</div>-->
                                    <br>
                                    <a href="deleteCita.php?id=<?php echo $cita['id'] ?>" class="boton">Borrar</a>
                                    <a href="updateCita.php?id=<?php echo $cita['id'] ?>" class="boton">Editar Cita</a>
                                    <hr>    
                                    <?php
                                } 
                        ?>
                    </center>
                </div>
                <div class="separador"></div>
            </div>
            <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                <div class="fotoUser">
                    <div class="card">
                        <center>
                            <div class="author-photo-circle">
                                <div class="foto" style="background-image: url('img/user.png')"></div>
                            </div>
                            <br>
                            <p>Bienvenido <?php echo $_SESSION['nombre'] ?> </p>
                            <a href="updateUser.php" class="linkRegistro">Editar perfil</a>
                            <br>
                            <a href="cita.php" class="linkRegistro">Nueva Cita</a>
                            <br>
                            <a href="borrarUsuario.php" class="linkRegistro">Eliminar Cuenta</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="separador"></div>
    
<?php
    include_once('footer.php');
?>