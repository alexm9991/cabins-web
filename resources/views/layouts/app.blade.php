<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>@yield('tittle')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    @yield('styles')
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="nav-logo">
                <img src="{{ asset('imagenes/WhatsApp Image 2023-04-25 at 19.14.27.jpeg') }}" alt="Logo">
            </div>
            <div class="nav-cont">
                <div class="nav-links">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="nav center">
                            <li class="col-lg-1 col-md-1 col-sm-12 col-xs-12"><a href="{{url ('/')}}"><span>Inicio</span></a></li>
                            <li class="col-lg-1 col-md-2 col-sm-12 col-xs-12"><a href="{{ route('services.servicesviews') }}"><span>Servicios</span></a></li>
                            <li class="col-lg-1 col-md-1 col-sm-12 col-xs-12"><a href="{{ route('products.productsviews') }}"><span>Productos</span></a></li>
                            <li class="col-lg-1 col-md-2 col-sm-12 col-xs-12"><a href="#"><span>Reservar</span></a></li>
                            <li class="col-lg-1 col-md-1 col-sm-12 col-xs-12"><a href="#"><span>Contáctanos</span></a></li>
                        </ul>
                    </div>
                </div>


                @if(!auth()->user())
                <button id="register-btn"><a href="{{ url('register') }}" id="button_nav1">Registrarse</a></button>
                <button id="login-btn"><a href="{{ url('login') }}" id="button_nav2">Iniciar sesión</a></button>
                @else
                @if(!isset($role))
                <button id="register-btn"><a href="{{ url('register') }}" id="button_nav1">Registrarse</a></button>
                <button id="login-btn"><a href="{{ url('login') }}" id="button_nav2">Iniciar sesión</a></button>
                @elseif ($role == 2 or $role == 1)
                <button id="login-btn"><a href="{{ url('user-info') }}" id="button_nav2">Mi cuenta</a></button>
                @endif
                @endif


            </div>
        </nav>
    </header>

    <main class="py-4">
        @yield('content')
    </main>

 <footer class="bg-img">
            <div class="footer-col col-lg-2 col-md-2 col-sm-6 col-xs-12">
                <img src="{{asset('imagenes/WhatsApp Image 2023-04-25 at 19.14.27.jpeg')}}" alt="Logo">
                <br>
                <div class="logo-col">
                    <h3>Nuestra visión es...</h3>
                    <br>
                    <div class="social-icons">
                        <a href="#"><img src="{{asset('imagenes/facebook.png')}}" alt="logo FB"></a>
                        <a href="#"><img src="{{asset('imagenes/gorjeo.png')}}" alt="logo TW"></a>
                        <a href="#"><img src="{{asset('imagenes/instagram.png')}}" alt="Logo IG"></a>
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
