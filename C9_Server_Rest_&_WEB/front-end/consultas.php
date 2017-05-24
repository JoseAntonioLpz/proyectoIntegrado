<?php
    include_once('header.php');
    if(isset($_SESSION['seguridadSocial'])){
        include_once('nav/nav1.php');
    }else{
        include_once('nav/nav.php');
    }
    include_once('../clases/Autoload.php');
    include_once('../clases/vendor/autoload.php');
    
    $busqueda = false;
    
    if(isset($_POST['buscar'])){
        if(!empty($_POST['seguridadSocial'])){
            $gestor = new GestorCita();
            //echo $_POST['seguridadSocial'];
            $citas = $gestor->getCitas($_POST['seguridadSocial']);
            //var_dump($citas);
            $busqueda = true;
        }else{
            
        }
    }
    
?>
    <div class="separador"></div>
    <div class="container fondoBlanco">
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                <div class="card">
                    <div class="centrar">
                        <br>
                        <p class="titulo">Consultar</p>
                        <form action="consultas.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="seguridadSocial" placeholder="Seguridad Social"/>
                        <br>
                        <br>
                        <input type="submit" name="buscar" value="Buscar" class="buttons"/>
                    </form>
                    <br>
                    </div>
                    <div class="MensajeDeError">
                        <?php
                            echo $error;
                        ?>
                    </div>
                    <?php
                        if($busqueda === true){
                            if(count($citas) == 0){
                                ?>
                                    <span class="contador">
                                        <?php
                                        echo 'No se ha encontrado ninguna cita vinculada a este Nº de Seguridad Social';
                                        ?>
                                    </span>
                                <?php
                            }else{
                                if(count($citas) == 1){
                                    ?>
                                        <span class="contador">
                                            <?php
                                            echo 'Se ha encontrado ' . count($citas) . ' cita vinculada a este Nº de Seguridad Social';
                                            ?>
                                        </span>
                                    <?php
                                }else{
                                    ?>
                                        <span class="contador">
                                            <?php
                                            echo 'Se han encontrado ' . count($citas) . ' citas vinculadas a este Nº de Seguridad Social';
                                            ?>
                                        </span>
                                    <?php
                                }
                                
                                ?>
                                    <br>
                                    <br>
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
                                    <!--<a href="deleteCita.php?id=<?php //echo $cita['id'] ?>" class="boton">Borrar</a>-->
                                    <hr>    
                                    <?php
                                }    
                            }
                        }
                    ?>
                </div>
                <div class="separador"></div>
            </div>
        </div>
    </div>
    <div class="separador"></div>
<?php
    include_once('footer.php');
?>