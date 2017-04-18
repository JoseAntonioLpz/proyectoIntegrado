<?php
    include_once('header.php');
    include_once('nav.php');
?>
<script type="text/javascript">

    velocidad = 4000;

    var capas_images = ["img/slider1.jpg", "img/slider2.jpg", "img/slider3.png"];
    imagen_actual = 0;

    function cortina(){
        var objeto =document.getElementById("imagen_cambiante");
        objeto.src = capas_images[imagen_actual];
        setTimeout("cortina()",velocidad)
        imagen_actual = (imagen_actual+1)%3;
    }

    window.onload = function()
    {
        cortina();
    }    
</script>
<div class="separador"></div>
    <div class="container fondoBlanco">
        <div class="separador"></div>
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                <div class="slider">
                    <a name="inicio"></a>
                    <section id="imgRandom">
                        <img id="imagen_cambiante"/>				
                    </section>
                </div>
            </div>
        </div>
    </div>
    <div class="container fondoBlanco">
        <br>
        <a name="servicios"></a>
        <center><span class="titulillos">Servicios</span></center>
        <br>
        <div class="row">
            <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6">
                <!--card 1-->
                <a href="" class="app">
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                                <img class="img-responsive center-block" src="img/medico.png"/>
                            </div>
                            <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                                <span class="descripcion">
                                    ¿Necesitas una cita médica? Tranquilo, pulsa en este enlace y podrás pedirla de manera rápida y eficaz.
                                </span>
                            </div>
                        </div>
                    </div>
                </a>    
            </div>
            <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6">
                <!--card 2-->
                <a href="" class="app">
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                                <span class="descripcion">¿Pediste una cita y no recuerdas cuando es? Puedes consultar tus citas siguiendo este enlace.</span>
                            </div>
                            <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                                <img class="img-responsive center-block" src="img/lupa.png"/>
                            </div>
                        </div>
                    </div>
                </a>    
            </div>
        </div>
        
        <hr>
        <a name="noticias"></a>
        <center><span class="titulillos">Noticias</span></center>
        <div class="row">
            <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                <!--card 1-->
                <div class="card">
                    <div class="row">
                        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                            <img class="img-responsive center-block" src="img/noticia1.jpg"/>
                        </div>
                    </div>
                    <br>
                    <div class="row">    
                        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                            <span class="tituloNoticia">
                                Sanidad reclama 31 millones al Hospital de Manises por retribuciones del personal estatutario.
                            </span>
                            <br>
                            <br>
                            <div class="cuerpo">
                                Las diferencias entre la Conselleria de Sanidad y la empresas que explota el área de salud de Manises son las más cuantiosas de todas las que el departamento
                                <br><br>
                                    <center>
                                        <a href="http://valenciaplaza.com/sanidad-manises-pleito-personal-estatutario" class="boton">
                                            Leer más.
                                        </a>
                                    </center>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                <!--card 2-->
                <div class="card">
                    <div class="row">
                        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                            <img class="img-responsive center-block" src="img/noticia2.jpg"/>
                        </div>
                    </div>
                    <br>
                    <div class="row">    
                        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                            <span class="tituloNoticia">
                                "La sanidad pública es una apuesta necesaria"
                            </span>
                            <br>
                            <br>
                            <div class="cuerpo">
                                David García Delgado es el gerente del hospital Parque, ubicado en Santa Cruz de Tenerife. Siempre se ha decantado por la gestión sanitaria. Ahora, tras asumir durante un tiempo la dirección médica
                                <br><br>
                                <center>
                                    <a href="http://eldia.es/sociedad/2017-04-16/13--sanidad-publica-es-apuesta-necesaria.htm" class="boton">
                                        Leer más.
                                    </a>
                                </center>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                <!--card 3-->
                <div class="card">
                    <div class="row">
                        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                            <img class="img-responsive center-block" src="img/noticia3.jpg"/>
                        </div>
                    </div>
                    <br>
                    <div class="row">    
                        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                            <span class="tituloNoticia">
                                La Ribera debería cerrar 10 días para poder aplicar las demandas de Sanidad
                            </span>
                            <br>
                            <br>
                            <div class="cuerpo">
                                Las exigencias que impone la Conselleria de Sanidad para iniciar la reversión del Hospital de la Ribera al sistema público sanitario son tan estrictas que para poder cumplirlas habría que paralizar la asistencia 
                                <br>
                                <br>
                                <center>
                                    <a href="http://www.elmundo.es/comunidad-valenciana/2017/04/12/58ed30f046163fa5648b45ed.html" class="boton">
                                    Leer más.
                                    </a>
                                </center>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="separador"></div>
    </div>
<div class="separador"></div>
<?php
    include_once('footer.php');
?>