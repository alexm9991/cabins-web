<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Contactanos</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>

<body>
    <header>
        <nav>
            <div class="nav-logo">
                <img src="imagenes/WhatsApp Image 2023-04-25 at 19.14.27.jpeg" alt="Logo">
            </div>

            <button id="shopin-car-btn"><img src="imagenes/carrito-de-compras.png" alt="Cesta"></button>

            <button id="burger-btn"><img src="imagenes/menu.png" alt="Menú"></button>
            <div class="nav-cont">
                <div class="nav-links">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="nav center">
                            <li class="col-lg-1 col-md-1 col-sm-3 col-xs-12"><a href="#"><span>Inicio</span></a></li>
                            <li class="col-lg-1 col-md-1 col-sm-3 col-xs-12"><a
                                    href="../../customers/services"><span>Servicios</span></a></li>
                            <li class="col-lg-1 col-md-1 col-sm-3 col-xs-12"><a
                                    href="{{ route('products.productsviews') }}"><span>Productos</span></a></li>
                            <li class="col-lg-1 col-md-1 col-sm-3 col-xs-12"><a href="#"><span>Reservar</span></a></li>
                            <li class="col-lg-1 col-md-1 col-sm-3 col-xs-12"><a href="#"><span>Contáctanos</span></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <button id="register-btn"
                    onclick="window.location.href='{{ url('register') }}'">Registrarse</a></button>
                <button id="login-btn" onclick="window.location.href='{{ url('login') }}'">Iniciar sesión</button>

                <button id="profile-btn" onclick="window.location.href='{{ url('user-info') }}'">Mi cuenta<img
                        class="subM-arrow" src="imagenes/down-arrow.png" alt=""></a></button>
                <button id="log-out-btn"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out<img
                        class="logout-icon" src="imagenes/logout.png" alt="Logout"></button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </div>
        </nav>
    </header>

    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center">
                <h1 align="center">CONTACTA CON NOSOTROS</h1>
                <div class="linea-blanca"></div>
                <br>
                <br>
                <br>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="dos">
                        <i class=""></i>
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold"> Amet minim mollit non deserunt ullamco est sit aliqua dolor do
                                amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat
                                sunt nostrud amet. </p>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="uno">
                        <i class="bi bi-envelope"></i>
                        <div class="d-flex flex-column">
                            <h5 class="font-weight-bold">Correo Administrativo:</h5>
                            <p class="m-0"> <a class="correo"
                                    href="laarboledafincacalarca@gmail.com">laarboledafincacalarca@gmail.com</a></p>
                        </div>
                        <br>
                        <br>
                    </div>
                    <div class="uno">
                        <i class="bi bi-telephone"></i>
                        <div class="d-flex flex-column">
                            <h5 class="font-weight-bold">Teléfono:</h5>
                            <p class="m-0"><a class="telefono" href="tel:305-s8605546">305-8605546</a></p>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="">
                        <i class="bi bi-geo-alt"></i>
                        <div class="d-flex flex-column">
                            <div class="uno">
                                <h5 class="font-weight-bold">Sede principal y Oficina:</h5>
                                <p>Calle 43 #41-15 Br/ Valle del Lili</p>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="uno">
                                <p class="m-0"> <strong> UBICACION FINCA:</strong> </p>
                                <div class="mapa">
                                    <hr><iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3977.6910492765855!2d-75.68431522610845!3d4.468406543629789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e38f727bf3fda87%3A0xab83da2b03563d2a!2sFinca%20tur%C3%ADstica%20la%20Arboleda!5e0!3m2!1ses!2sco!4v1681500080233!5m2!1ses!2sco"
                                        width="335" height="260" style="border: 0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
    </div>
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-up"></i></a>
    <footer class="bg-img">
        <div class="footer-col col-lg-1 col-md-1 col-sm-6 col-xs-12">
            <img id="logo-ft" src="imagenes/WhatsApp Image 2023-04-25 at 19.14.27.jpeg" alt="Logo">
            <div class="logo-col">
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
            <h3>Danos tu opinión</h3>
            <button class="contactButton" onclick="window.location.href='{{ url('pqrs.create') }}'"> PQRS</button>
        </div>
        <div class="footer_copyright">
            <div class="copy">©2023 Todos los derechos reservados</div>
            <div class="copy">Diseñado por ADSI - 205 SENA</div>
            <div class="copy">Terminos y Condiciones</div>
        </div>
    </footer>
    <div class="bg-ft"></div>
</body>

</html>
