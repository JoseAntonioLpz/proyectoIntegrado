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
    if(isset($_POST['enviar'])){
        if(!empty($_POST['user']) || !empty(!empty($_POST['password']))){
            $gestor = new GestorUsuario();
            $pass = sha1($_POST['password']);
            
            $user = $gestor->getUser($_POST['user']);
            
            if($user->getPassword() === $pass){
                //session_start();
                $_SESSION['seguridadSocial'] = $user->getSeguridadSocial();
                $_SESSION['nombre'] = $user->getFirstName();
                $_SESSION['apellidos'] = $user->getLastName();
                $_SESSION['id'] = $user->getId();
                //$_SESSION['password'] = $_POST['password'];
                header('Location: home.php');
            }else{
                $error = 'La contraseña no es correcta';
            }
            
        }else{
            $error = 'Algún campo está vacío, por favor rellene todos los campos';
        }
    }
?>
    <div class="separador"></div>  
    <div class="container fondoBlanco">
        <div class="separadorLogin"></div>
        <div class="card">
            <div class="centrar">
                <p class="titulo">Iniciar sesión</p>
                <form action="login.php" method="post" enctype="multipart/form-data">
                <input type="text" name="user" placeholder="Usuario"/>
                <br>
                <br>
                <input type="password" name="password" placeholder="Contraseña"/>
                <br>
                <br>
                <input type="submit" name="enviar" value="Iniciar sesión" class="buttons"/>
            </form>
            <br>
            ¿Aún no tienes cuenta? Crea una pulsando <a href="registro.php" class="linkRegistro">aquí</a>
            </div>
            <div class="MensajeDeError">
                <?php
                    echo $error;
                ?>
            </div>
        </div>    
        <div class="separadorLogin"></div>
    </div>
    <div class="separador"></div>

<?php
    include_once('footer.php');
?>