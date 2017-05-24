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
    
    $gestor = new GestorUsuario();
    $gestor->deleteUser($_SESSION['seguridadSocial']);
    header('Location: logout.php');
?>
    <div class="separador"></div>
    <div class="container fondoBlanco">
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                <div class="card">
                    <center>
                    
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