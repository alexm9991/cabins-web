@extends('adminlte::page')

@section('title', 'Dashboard::pqrs')

@section('content')
<!-- div resposive -->

<!DOCTYPE html>
<html lang="es">

<body>

    <div style="max-width: 100%;">
        <nav>
            <div class="nav-logo">
                <img src="../imagenes/png-clipart-logo-house-home-house-angle-building-thumbnail.png" alt="Logo">
            </div>
            <div class="nav-cont">
                <div class="nav-links">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="nav center">
                            <li class="col-lg-1 col-md-1 col-sm-12 col-xs-12"><a href="#"><span>Inicio</span></a></li>
                            <li class="col-lg-1 col-md-2 col-sm-12 col-xs-12"><a href="#"><span>Servicios</span></a></li>
                            <li class="col-lg-1 col-md-2 col-sm-12 col-xs-12"><a href="#"><span>Productos</span></a></li>
                            <li class="col-lg-1 col-md-2 col-sm-12 col-xs-12"><a href="#"><span>Reservar</span></a></li>
                            <li class="col-lg-1 col-md-1 col-sm-12 col-xs-12"><a href="#"><span>Contáctanos</span></a></li>
                        </ul>
                    </div>
                </div>
                <button id="register-btn"><a href="#" id="button_nav1">Registrarse</a></button>
                <button id="login-btn"><a href="#" id="button_nav2">Iniciar sesión</a></button>
            </div>
        </nav>
        <h1 id="title_1" class="title">PQRS</h1>
        <h3 class="title">Peticiones - Quejas - Reclamos - Sugerencias</h4>
            <br>
            <div class="container">
                <h2>Registro PQRS</h2>
                <div class="container_form">
                    <form action="{{ route('pqrs.create') }}" method="POST">
                        <div class="form-group">
                            <label for="reserva">No. de Reserva:</label>
                            <input type="text" placeholder="Digite el numero de reserva" name="reserva" id="reserva" required>
                        </div>
                        <div class="form-group">
                            <label for="asunto">Asunto:</label>
                            <input type="text" placeholder="Escribe el asunto correspondiente al mensaje" name="asunto" id="asunto" required>
                        </div>
                        <div class="form-group">
                            <label for="mensaje">Mensaje:</label>
                            <textarea name="mensaje" placeholder="Escriba su petición, queja, reclamo o sugerencia" id="mensaje" required></textarea>
                        </div>
                        <button type="submit">Enviar petición</button>
                    </form>
                </div>
            </div>
            <br>
            <br>
            <footer class="bg-img">
                <div class="footer-col col-lg-2 col-md-2 col-sm-6 col-xs-12">
                    <img src="../imagenes/png-clipart-logo-house-home-house-angle-building-thumbnail.png" alt="Logo">
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
    </div>
</body>

</html>

@stop

@section('css')

<link rel="stylesheet" href="../../../css/pqrs.css">
<link rel="stylesheet" href="../../../css/nav.css">
<link rel="stylesheet" href="../../../css/footer.css">

@stop

@section('js')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('.formulario-send_request').submit(function(e) {
        e.preventDefault();

        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'PQRS enviado con exito!',
            showConfirmButton: false,
            timer: 1500
        })
        this.submit();
    });
</script>

@stop
