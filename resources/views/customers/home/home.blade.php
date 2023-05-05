<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Home page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

</head>

<body>
    <header>
        <nav>
            <div class="nav-logo">
                <img src="imagenes/WhatsApp Image 2023-04-25 at 19.14.27.jpeg" alt="Logo">
            </div>
            <div class="nav-cont">
                <div class="nav-links">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="nav center">
                            <li class="col-lg-1 col-md-1 col-sm-12 col-xs-12"><a href="#"><span>Inicio</span></a></li>
                            <li class="col-lg-1 col-md-2 col-sm-12 col-xs-12"><a href="../../customers/services"><span>Servicios</span></a></li>
                            <li class="col-lg-1 col-md-1 col-sm-12 col-xs-12"><a href="{{ route('products.productsviews') }}"><span>Productos</span></a></li>
                            <li class="col-lg-1 col-md-2 col-sm-12 col-xs-12"><a href="#"><span>Reservar</span></a></li>
                            <li class="col-lg-1 col-md-1 col-sm-12 col-xs-12"><a href="#"><span>Contáctanos</span></a></li>
                        </ul>
                    </div>
                </div>
                @if(!auth()->user())
                <button id="register-btn"><a href="{{ url('register') }}" id="button_nav1">Registrarse</a></button>
                <button id="login-btn"><a href="{{ url('login') }}" id="button_nav2">Iniciar sesión</a></button>
                @elseif($rol->role_id == 2 or $rol->role_id == 1)
                <button id="login-btn"><a href="{{ url('user-info') }}" id="button_nav2">Mi cuenta</a></button>
                @endif


            </div>
        </nav>
    </header>
    <div class="container-body">
        <div class="container-img">
            <div class="texto">
                <h1> <strong> ¿BUSCAS UN LUGAR<br>PARA DESCONECTAR<br>DEL ESTRES DIARIO?</strong></h1>
                <p>vive una experiencia unica,disfruta de la naturaleza en su maximo explendor y descubre un oasis de
                    tranquilidad en nuestra finca, no esleres mas ,!Te sorprenderas¡</p>
            </div>
            <div class="imagen">
                <img src="{{ asset('imagenes/2021-06-24.jpg') }}" alt="">
            </div>
        </div>

        <div class="ancho-div">
            <div class="cont-map">
                <h3>🔘 Ubicanos</h3>
                <div class="link-map">
                    <button><a href="https://www.google.com/maps/place/Finca+turística+la+Arboleda/@4.3139151,-75.7512588,10z/data=!4m6!3m5!1s0x8e38f727bf3fda87:0xab83da2b03563d2a!8m2!3d4.4684012!4d-75.6817403!16s%2Fg%2F11py1js26s" target="_blank"> <strong>Abrir Mapa</strong></a></button>
                </div>
            </div>
        </div>

        <div class="separ"></div>
        <section class="container-about">

            <div class="subtitle">
                <h2 style="margin-top: 0;">Como trabajamos</h2>
                <p>A high-performing web-based car rental system for any rent- <br> a-car company and website</p>
            </div>
            <div class="about__main">
                <article class="about__icons three-section1">
                    <img src="imagenes/localizacion.png" class="about__icon">
                    <h3 class="about__title"><strong>Choose Location</strong></h3>
                    <p class="about__paragrah">Aliquam erat volutpat. Integer malesuada turpis id fringilla suscipit. Maecenas
                        ultrices, orci vitae convallis mattis</p>
                </article>

                <article class="about__icons three-section2">
                    <img src="imagenes/portafolio.png" class="about__icon">
                    <h3 class="about__title"><strong>Pick-up Date</strong></h3>
                    <p class="about__paragraph">Aliquam erat volutpat. Integer malesuada turpis id fringilla suscipit. Maecenas
                        ultrices, orci vitae convallis mattis.</p>
                </article>


                <article class="about__icons three-section3">
                    <img src="imagenes/automovil.png" class="about__icon">
                    <h3 class="about__title"><strong>Book your car</strong></h3>
                    <p class="about__paragrah">Aliquam erat volutpat. Integer malesuada turpis id fringilla suscipit. Maecenas
                        ultrices, orci vitae convallis mattis</p>
                </article>
            </div>
        </section>
        <div class="contenido-con" style="text-align:center;">
            <div class="container-con">
                <h1> Conoce este maravilloso lugar</h1>
                <p>Accede a diferentes planes según loque desees con diversos <br> productos, agéndate ya!!</p>
                <div class="square">
                    <div class="push-img">
                        <div style="background-image: url('imagenes/Finca.jpg');"></div>
                        <div style="background-image: url('imagenes/finca\ \(1\).jpg');"></div>
                        <div style="background-image: url('imagenes/finca\ \(2\).jpg');"></div>
                        <div style="background-image: url('imagenes/finca\ \(3\).jpg');"></div>
                        <div style="background-image: url('imagenes/finca\ \(4\).jpg');"></div>
                    </div>
                </div>
            </div>
            <div class="container-qn">
                <div class="titulo-quien">
                    <h1>Quienes Somos?</h1>
                    <p>A high-performing web-based car rental system for any rent- <br> a-car company and website</p>
                </div>
                <div class="izquierdo-div">
                    <div class="izquierdo-div-inner">
                        <img src="imagenes/imagen1.png" alt="Imagen 4">
                    </div>
                </div>
                <div class="derecho-divs">
                    <div class="derecho-div">
                        <img src="imagenes/imagen1.png" alt="Imagen 1">
                        <div class="derecho-h1-p">
                            <div class="container-h2">
                                <h2> <strong>Customer Support</strong> </h2>
                                <p>Aliquam erat volutpat. Integer malesuada turpis id fringilla <br> suscipit. Maecenas ultrices.</p>
                            </div>
                        </div>
                    </div>
                    <div class="derecho-div">
                        <img src="imagenes/imagen1.png" alt="Imagen 2">
                        <div class="derecho-h1-p">
                            <div class="container-h2">
                                <h2> <strong>Best Price Guarantted</strong> </h2>
                                <p>Aliquam erat volutpat. Integer malesuada turpis id fringilla <br> suscipit. Maecenas ultrices.</p>
                            </div>
                        </div>
                    </div>
                    <div class="derecho-div">
                        <img src="imagenes/imagen1.png" alt="Imagen 3">
                        <div class="derecho-h1-p">
                            <div class="container-h2">
                                <h2> <strong>Many Location</strong> </h2>
                                <p>Aliquam erat volutpat. Integer malesuada turpis id fringilla <br> suscipit. Maecenas ultrices.s</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contenedor-exp">
                <div class="uno">
                    <h2>Experiencias!</h2>
                </div>
                <div class="dos">
                    <img src="imagenes/imagen1.png" alt="">
                </div>
                <div class="tres">
                    <img src="imagenes/imagen1.png" alt="">
                </div>
            </div>
        </div>

        <a class="whatsapp-float" target="_blank" onclick="confirmarEnvio();"><i class="fa fa-whatsapp my-float"></i></a>

        <footer class="bg-img">
            <div class="footer-col col-lg-2 col-md-2 col-sm-6 col-xs-12">
                <img src="imagenes/WhatsApp Image 2023-04-25 at 19.14.27.jpeg" alt="Logo">
                <br>
                <div class="logo-col">
                    <h3>Nuestra visión es...</h3>
                    <br>
                    <div class="social-icons">
                        <a href="#"><img src="imagenes/facebook.png" alt="logo FB"></a>
                        <a href="#"><img src="imagenes/gorjeo.png" alt="logo TW"></a>
                        <a href="#"><img src="imagenes/instagram.png" alt="Logo IG"></a>
                    </div>
                </div>
            </div>
            <div class="footer-col col-lg-1-5 col-md-1 col-sm-6 col-xs-12">
                <h3>¿Por qué elegirnos?</h3>
                <p>How it works</p>
                <br>
                <p>Featured</p>
                <br>
                <p>Partnership</p>
            </div>
            <div class="footer-col col-lg-1-5 col-md-1 col-sm-6 col-xs-12">
                <h3>Contactos</h3>
                <p class="font-email">Correo: laarboledafincacalarca@gmail.com</p>
                <br>
                <p>Teléfono: +57 7383738</p>
                <br>
                <p>Celular: 312 526 77 26</p>
            </div>
            <div class="footer-col col-lg-1-5 col-md-1 col-sm-6 col-xs-12">
                <h3>Redes Sociales</h3>
                <ul>
                    <li><a href="#">TIKTOK</a></li>
                    <li><a href="#">INSTAGRAM</a></li>
                    <li><a href="#">TWITTER</a></li>
                    <li><a href="#">FACEBOOK</a></li>
                </ul>
            </div>
            <div class="footer-col col-lg-1-5 col-md-1 col-sm-12 col-xs-12">
                <h3>Danos tu opinión</h3>
                <br>
                <button class="contactButton"> PQRS
                    <div class="iconButton col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path fill="currentColor" d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"></path>
                        </svg>
                    </div>
                </button>
                <br>
            </div>
            <div class="footer_copyright">
                <div class="copy1">©2023 Todos los derechos reservados</div>
                <div class="copy2">Diseñado por ADSI - 205 SENA</div>
                <div class="copy3">Terminos y Condiciones</div>
            </div>
        </footer>
</body>

</html>

<script>
    function confirmarEnvio() {
        // Mostrar la confirmación de SweetAlert2
        Swal.fire({
            title: '¿Estás seguro de que quieres ir al chat de WhatsApp?',
            text: 'Serás redirigido a WhatsApp Web.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sí',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.isConfirmed) {
                window.open('https://web.whatsapp.com/send?phone=+573147723048&text=Hola, quiero pedir información sobre su finca turística 😊', '_blank');
            }
        });
    }
</script>
