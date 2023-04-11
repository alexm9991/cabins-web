@extends('adminlte::page')

@section('title', 'Dashboard::pqrs')

@section('content')
<!-- div resposive -->

<body>
    <nav class="navbar">
        <div class="navbar-logo">
            <img src="ruta/del/logo.png" alt="Logo">
        </div>
        <div class="navbar-links">
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Servicios</a></li>
                <li><a href="#">Productos</a></li>
                <li><a href="#">Reservar</a></li>
                <li><a href="#">Contáctanos</a></li>
            </ul>
        </div>
        <button id="register-btn"><a href="#" id="button_nav1">Registrarse</a></button>
        <button id="login-btn"><a href="#" id="button_nav2">Iniciar sesión</a></button>

    </nav>
    <h1 id="title_1" class="title">PQRS</h1>
    <h3 class="title">Peticiones - Quejas - Reclamos - Sugerencias</h4>
        <br>
        <div class="container">
            <h2>Registro PQRS</h2>
            <div class="container_form">
                <form class="formulario-send_request" action="{{ route('pqrs.create') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="reserva">{{ __('Name_') }}:</label>
                        <input required maxlength="45" type="text" id="name_user" name="name_user" placeholder="Digite el numero de reserva" oninput="this.value = this.value.replace(/[^a-zA-Z- -]/,'')"  required>

                    </div>
                    <div class="form-group">
                        <label for="reserva">{{ __('Phone_') }}:</label>
                        <input required maxlength="10" type="text" id="phone_user" name="phone_user"  placeholder="Digite el numero de reserva" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  required>

                    </div>
                    <div class="form-group">
                        <label for="asunto">{{ __('Matter_') }}:</label>
                        <input required maxlength="50" type="text" id="title" name="title" placeholder="Escribe el asunto correspondiente al mensaje" required>
                    </div>
                    <div class="form-group">
                        <label for="mensaje">{{ __('Message') }}:</label>
                        <textarea required type="textarea" id="description" name="description" placeholder="Escriba su petición, queja, reclamo o sugerencia" id="description" required></textarea>

                    </div>
                    <button type="submit" class="btn btn-success" style="display: block;margin: 0 auto;"><i class="fas fa-save "></i> {{ __('Send request') }}</button>
                </form>
            </div>
        </div>
        <br>
        <br>
        <footer>
            <div class="footer-col">
                <img src="ruta/del/logo.png" alt="Logo">
                <br>
                <br>
                <br>
                <h3>Nuestra visión es...</h3>
                <br>
                <div class="social-icons">
                    <a href="#"><img src="../../../assets/imagenes/facebook.png" alt="logo FB"></a>
                    <a href="#"><img src="../../../assets/imagenes/gorjeo.png" alt="logo TW"></a>
                    <a href="#"><img src="../../../assets/imagenes/instagram.png" alt="Logo IG"></a>
                </div>
            </div>
            <div class="footer-col">
                <h3>¿Por qué elegirnos?</h3>
                <h3>How it works</h3>
                <h3>Featured</h3>
                <h3>Partnership</h3>
            </div>
            <div class="footer-col">
                <h3>Contactos</h3>
                <p>Correo: laarboledafincacalarca@gmail.com</p>
                <br>
                <p>Teléfono: +57 7383738</p>
                <br>
                <p>Celular: 312 526 77 26</p>
            </div>
            <div class="footer-col">
                <h3>Redes Sociales</h3>
                <ul>
                    <li><a href="#">TIKTOK</a></li>
                    <li><a href="#">INSTAGRAM</a></li>
                    <li><a href="#">TWITTER</a></li>
                    <li><a href="#">FACEBOOK</a></li>
                </ul>
            </div>
            <div class="footer_copyright">
                <div class="copy1">©2023 Todos los derechos reservados</div>
                <div class="copy2">Diseñado por ADSI - 205 SENA</div>
                <div class="copy3">Terminos y Condiciones</div>
            </div>
        </footer>
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
