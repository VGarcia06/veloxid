<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VELOXID</title>
<!-- <link rel="stylesheet" href="css/fontello.css"> -->
    <link rel="stylesheet" href="template_welcome/assets/css/style.css">
    
</head>
<body>
<header>
    <div class="contenedor">
        <!-- <img src="img/logo.png"> -->
        <input type="checkbox" id="menu-bar">
        <label class="fontawesome-align-justify" for="menu-bar"></label>
                <nav class="menu">
                    <a href="">Inicio</a>        
                    <a href="#">Nosotros</a>
                    <a href="#">Servicios</a>
                    @if (Route::has('login'))    
                    <a href="{{ route('home') }}">Home</a>
                    @auth
                    @else
                    <a href="{{ route('cotizacion') }}">Cotizar</a>
                    <a href="{{ route('login') }}">Iniciar Sesión</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" >Registrar</a>
                    @endif

                    @endif
                    @endif
                </nav>
            </div>
</header>
        
        <main>
            <section class="banner">
                <img src="template_welcome/assets/img/portada.png">
                <!-- <div class="contenedor">
                    <h2>#######################</h2>
                    <p>¿#######################?</p>
                    <a href="#">Leer más</a>
                </div> -->
            </section>
            
            <section id="bienvenidos">
                <div class="contenedor">
                    <h2>Reparto de Paquetes en todo Lima </h2>
                    <p>Veloxid es una empresa que te acompaña en toda tu experiencia de transporte en cualquier material que necesites mover. Cuenta con un grupo de transportistas capaces de cuidar tus bienes desde el punto de recojo hasta el punto de entrega. </p>
                    <a href="#" class="boton">¡Calcula tu Envío Ahora!</a>
                </div>
            </section>
            
            <section id="blog">
                <h2>CONOCE NUESTROS SERVICIOS</h2>
                <div class="contenedor">
                    <article>
                        <img src="template_welcome/assets/img/servicio2.jpg">
                        <h4>Delivery Express</h4>
                    </article>
                    <article>
                        <img src="template_welcome/assets/img/servicio1.jpg">
                        <h4>Mensajería</h4>
                    </article>
                    <article>
                        <img src="template_welcome/assets/img/servicio.png">
                        <h4>Taxi Privado</h4>
                    </article>
                </div>
            </section>
            
            <section id="info">
                <h2>NUESTROS TRANSPORTES</h2>
                <div class="contenedor">
                    <div class="info-pet">
                        <img src="template_welcome/assets/img/bicicleta.png" alt="">
                        <!-- <h4>Foto 1</h4> -->
                    </div>
                    <div class="info-pet">
                        <img src="template_welcome/assets/img/moto.png" alt="">
                        <!-- <h4>Foto 2</h4> -->
                    </div>
                    <div class="info-pet">
                        <img src="template_welcome/assets/img/furgon.png" alt="">
                        <!-- <h4>Foto 3</h4> -->
                    </div>
                    <div class="info-pet">
                        <img src="template_welcome/assets/img/camion.png" alt="">
                        <!-- <h4>Foto 4</h4> -->
                    </div>
                </div>
            </section>
        </main>
        
        <footer>
            <div class="contenedor">
                <p class="copy">VELOXID &copy; 2020</p>
                <div class="sociales">
                    <a class="fontawesome-facebook-sign" href="#"></a>
                    <a class="fontawesome-twitter" href="#"></a>
                    <a class="fontawesome-camera-retro" href="#"></a>
                    <!-- <a class="fontawesome-google-plus-sign" href="#"></a> -->
                </div>
            </div>
        </footer>
</body>
</html>