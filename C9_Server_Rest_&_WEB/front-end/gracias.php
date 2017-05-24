<?php
    include_once('header.php');
    if(isset($_SESSION['seguridadSocial'])){
        include_once('nav/nav1.php');
    }else{
        include_once('nav/nav.php');
    }
    
?>
    <div class="separador"></div>
    <div class="container fondoBlanco">
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                <span class="gracias">
                    ¡Gracias por confiar en nosotros ;), a partir de ahora podrás disfrutar de nuestros servicios completos!
                </span>
            </div>
        </div>
    </div>
    <div class="separador"></div>
<?php
    include_once('footer.php');
?>