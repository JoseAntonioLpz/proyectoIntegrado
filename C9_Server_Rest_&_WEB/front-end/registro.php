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
    
    if(isset($_POST['registro'])){
        if(!empty($_POST['name']) || !empty($_POST['lastName']) || !empty($_POST['seguridadSocial']) || 
        !empty($_POST['password']) || !empty($_POST['repeat'])){
            //echo 'Todo bien';
            if($_POST['password'] === $_POST['repeat']){
                //echo 'las contraseñas coinciden';
                $gestor = new GestorUsuario();
                $user = new Usuario();
                
                $user->setFirstName($_POST['name']);
                $user->setLastName($_POST['lastName']);
                $user->setSeguridadSocial($_POST['seguridadSocial']);
                $encryptedPass = sha1($_POST['password']);
                $user->setPassword($encryptedPass);
                
                $gestor->addUser($user);
                //echo 'Todo correcto';
                header('Location: gracias.php');
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
                <form action="registro.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="name" placeholder="Nombre"/>
                    <br>
                    <br>
                    <input type="text" name="lastName" placeholder="Apellidos"/>
                    <br>
                    <br>
                    <input type="text" name="seguridadSocial" placeholder="Nº Seguridad Social"/>
                    <br>
                    <!--<br>
                    <input type="text" name="user" placeholder="Usuario"/>
                    <br>-->
                    <br>
                    <input type="password" name="password" placeholder="Contraseña"/>
                    <br>
                    <br>
                    <input type="password" name="repeat" placeholder="Repita la contraseña"/>
                    <br>
                    <br>
                    <input type="submit" name="registro" value="Registrarse" class="buttons"/>
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