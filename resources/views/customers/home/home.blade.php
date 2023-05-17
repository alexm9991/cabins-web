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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <header>
        @include('layouts.nav')
    </header>
    <div class="container-body">
        <div class="container-img">
            <div class="texto">
                <h1> <strong> ¿BUSCAS UN LUGAR<br>PARA DESCONECTAR<br>DEL ESTRES DIARIO?</strong></h1>
                <p>Vive una experiencia unica,disfruta de la naturaleza en su maximo explendor y descubre un oasis de
                    tranquilidad en nuestra finca, no esperes mas ,!Te sorprenderas¡</p>
            </div>
            <div class="imagen">
                <img src="{{ asset('imagenes/2021-06-24.jpg') }}" alt="">
            </div>
        </div>

        <div class="ancho-div">
            <div class="cont-map">
                <img src="{{ asset('imagenes/maps-and-flags.png') }}" alt="">
                <h3>Ubicanos</h3>
                <button onclick="window.open('https://www.google.com/maps/place/Finca+turística+la+Arboleda/@4.3139151,-75.7512588,10z/data=!4m6!3m5!1s0x8e38f727bf3fda87:0xab83da2b03563d2a!8m2!3d4.4684012!4d-75.6817403!16s%2Fg%2F11py1js26s','_blank')"><strong>Abrir Mapa</strong></button>
            </div>
            <div class="cont-app">
                <img src="{{ asset('imagenes/mobile-app.png') }}" alt="">
                <h3>Descarga nuestra app</h3>
                <button onclick=""><strong>Descargar APK</strong></a></button>
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
                    <div class="acordeon">
                        <div style="background-image: url('imagenes/Finca.jpg');"></div>
                        <div style="background-image: url('imagenes/finca\ \(1\).jpg');"></div>
                        <div style="background-image: url('imagenes/finca\ \(2\).jpg');"></div>
                        <div style="background-image: url('imagenes/finca\ \(3\).jpg');"></div>
                        <div style="background-image: url('imagenes/finca\ \(4\).jpg');"></div>
                    </div>
                    <div class="carousel">
                        <div class="slides">
                          <div class="slide">
                            <img src="imagenes/Finca.jpg">
                          </div>
                          <div class="slide">
                            <img src="imagenes/finca (1).jpg">
                          </div>
                          <div class="slide">
                            <img src="imagenes/finca (2).jpg">
                          </div>
                          <div class="slide">
                            <img src="imagenes/finca (3).jpg">
                          </div>
                          <div class="slide">
                            <img src="imagenes/finca (4).jpg">
                          </div>
                        </div>
                        <button class="prev">Anterior</button>
                        <button class="next">Siguiente</button>
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
                        <img src="imagenes/finca (5).jpg" alt="Imagen 4">
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
                                <h2> <strong>Best Price Assured.</strong> </h2>
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
                    <img src="imagenes/finca (6).jpg" alt="">
                </div>
                <div class="tres">
                    <img src="imagenes/finca (7).jpg" alt="">
                </div>
            </div>
        </div>

        <a class="whatsapp-float" target="_blank" onclick="confirmarEnvio();"><i class="fa fa-whatsapp my-float"></i></a>
        @include('layouts.footer')
</body>

</html>

<script>
    const carousel = document.querySelector('.carousel');
    const slides = carousel.querySelector('.slides');
    const prevButton = carousel.querySelector('.prev');
    const nextButton = carousel.querySelector('.next');
    const slideWidth = carousel.clientWidth;

    let slideIndex = 0;

    function showSlide(index) {
    slides.style.transform = `translateX(-${index * slideWidth}px)`;
    }

    showSlide(slideIndex);

    function nextSlide() {
    slideIndex++;
    if (slideIndex >= slides.children.length) {
        slideIndex = 0;
    }
    showSlide(slideIndex);
    }

    function prevSlide() {
    slideIndex--;
    if (slideIndex < 0) {
        slideIndex = slides.children.length - 1;
    }
    showSlide(slideIndex);
    }

    nextButton.addEventListener('click', nextSlide);
    prevButton.addEventListener('click', prevSlide);

</script>

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
<script>
    if (window.innerWidth < 992) {
        $('.nav-cont').hide();
    }
    $('#burger-btn').click(function() {
        $('.nav-cont').slideToggle();
    });
    $(window).resize(function() {
        if (window.innerWidth >= 992) {
        $('.nav-cont').show();
        } else {
        $('.nav-cont').hide();
        }
    });
</script>
<script>
    function handleWindowSize() {
    if (window.innerWidth < 992) {
        $('#log-out-btn').show();
        $('#profile-btn').mouseenter(function() {
            clearTimeout(timeout);
        });
    } else {
        $('#log-out-btn').hide();
        var timeout;
        $('#profile-btn').mouseenter(function() {
            $('#log-out-btn').fadeIn();
        });
        $('#profile-btn').mouseleave(function() {
            timeout = setTimeout(function() {
                $('#log-out-btn').fadeOut();
            }, 500);
        });
        $('#log-out-btn').mouseenter(function() {
            clearTimeout(timeout);
        });
        $('#log-out-btn').mouseleave(function() {
            $('#log-out-btn').fadeOut();
        });
    }
}

    // Handle initial window size
    handleWindowSize();

    // Handle window resize
    $(window).resize(function() {
        handleWindowSize();
    });

    $('.subM-arrow').click(function(event) {
        event.stopPropagation();
        $('#log-out-btn').fadeIn();
    });
</script>

