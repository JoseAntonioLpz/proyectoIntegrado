<?php
    include_once('header.php');
    if(isset($_SESSION['seguridadSocial'])){
        include_once('nav/nav1.php');
    }else{
        include_once('nav/nav.php');
    }
    include_once('../clases/Autoload.php');
    include_once('../clases/vendor/autoload.php');
    
    $error = '';
    
    $gestor = new GestorUsuario();
    $seguridadSocial = $_SESSION['seguridadSocial'];
    //$cita = new Cita();
    $user = $gestor->getUser($seguridadSocial);
    //modificar todo
    
    if(isset($_POST['Actualizar'])){
        if(!empty($_POST['name']) || !empty($_POST['lastName']) || !empty($_POST['seguridadSocial'])){
            //echo 'Todo bien';
            if($_POST['password'] === $_POST['repeat']){
                //echo 'las contraseñas coinciden';
                $user->setFirstName($_POST['name']);
                $user->setLastName($_POST['lastName']);
                $user->setSeguridadSocial($_POST['seguridadSocial']);
                //$encryptedPass = sha1($_POST['password']);
                //$user->setPassword($encryptedPass);
                
                $gestor->updateUser($user);
                $_SESSION['seguridadSocial'] = $user->getSeguridadSocial();
                $_SESSION['nombre'] = $user->getFirstName();
                $_SESSION['apellidos'] = $user->getLastName();
                //echo 'Todo correcto';
                header('Location: home.php');
            }else{
                $error = 'Las contraseñas no coinciden';
            }
        }else{
            $error = 'Algun campo obligatorio está vacío, por favor, rellenelos';
        }
    }
?>
    <div class="separador"></div>
    <div class="container fondoBlanco">
        <div class="card">
            <div class="centrar">
                <p class="titulo">Registrarse</p>
                <form action="updateUser.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="name" placeholder="Nombre" value="<?php echo $user->getFirstName() ?>"/>
                    <br>
                    <br>
                    <input type="text" name="lastName" placeholder="Apellidos" value="<?php echo $user->getLastName() ?>"/>
                    <br>
                    <br>
                    <input type="text" name="seguridadSocial" placeholder="Nº Seguridad Social" value="<?php echo $user->getSeguridadSocial() ?>"/>
                    <br>
                    <!--<br>
                    <input type="text" name="user" placeholder="Usuario"/>
                    <br>-->
                    <!--<br>
                    <input type="password" name="password" placeholder="Contraseña" value=""/>
                    <br>
                    <br>
                    <input type="password" name="repeat" placeholder="Repita la contraseña" value=""/>
                    <br>-->
                    <br>
                    <input type="submit" name="Actualizar" value="Actualizar" class="buttons"/>
                </form>
                <div class="MensajeDeError">
                    <?php
                        echo $error;
                    ?>
                </div>
            </div>
        </div>
        <div class="separador"></div>
    </div>
    <div class="separador"></div>
<?php
    include_once('footer.php');
?>