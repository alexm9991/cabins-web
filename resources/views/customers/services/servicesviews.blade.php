<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Servicios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{ asset('css/services/servicios.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
</head>

<body class="cuerpo">

<header>
        @include('layouts.nav')
</header>

    <!-- DEGRADADO -->
    <div class="degradado">
        <!--CUADRO CENTRADO-->
        <div class="cuadro-centrado">
            <p id="services">SERVICIOS</p>
            <div class="text-center">
                <p>Finca la Arboleda ofrecemos y garantizamos un excelente servicio que se ajusta a tus necesidades.</p>
                <div class="boton">
                    <a href="#" class="no_sub">RESERVAR AHORA</a>
                </div>
            </div>
        </div>
    </div>



    @foreach ($services as $S)
    @if ($S->id % 2 == 0)

    <div class="element">
        <div class="texto-left">
            <div id="titulo-left">
                <a href="#" class="orangered">
                    <h2>{{ $S->tittle }}</h2>
                </a>
            </div>
            <div id="text-left">
                <p>{{ $S->description }}</p>
            </div>
        </div>

        <div class="carousel-container">
            <div class="carousel">
                @foreach ($S->services_resource as $re)
                <div class="slide">
                    <img src="{{asset('storage/imgServices').'/'.$re->url}}" alt="">
                </div>
                @endforeach
            </div>
            <button class="prev-button">&#10094;</button>
            <button class="next-button">&#10095;</button>
        </div>


    </div>
    <a class="boton-modal" href="{{ route('services.detailservices',$S->id) }}">Ver detalles</a>
    <div class="orange-separator"></div>

    @else
    <section class="element">
        <div class="carousel-container">
            <div class="carousel">
                @foreach ($S->services_resource as $re)
                <div class="slide">
                    <img src="{{asset('storage/imgServices').'/'.$re->url}}" alt="">
                </div>
                @endforeach
            </div>
            <button class="prev-button">&#10094;</button>
            <button class="next-button">&#10095;</button>
        </div>


        <div class="texto-right">
            <div id="titulo-right">
                <a href="#" class="orangered">
                    <h2>{{ $S->tittle }}</h2>
                </a>
            </div>
            <div id="text-right">
                <p>{{ $S->description }}</p>

            </div>
        </div>

    </section>
    <a class="boton-modal" href="{{ route('services.detailservices',$S->id) }}">Ver detalles</a>
    <div class="orange-separator"></div>

    @endif
    @endforeach

    <div class="informacion-temporadas">
        <div id="titulo-temporadas">
          <h1>SECCION INFORMATIVA</h1>
        </div>
        <div class="informacion">
          <div id="imagen-temporadas">
            <img src="{{asset('imagenes/temporadas.png')}}"  alt="Calendario con las temporadas">
          </div>

          <div class="colores-temp">
            <div class="temp">
              <div class="txt">
                <p>Temporada Alta</p>
              </div>
            </div>

            <div class="temp">
              <div class="txt">
                <p>Temporada Media</p>
              </div>
            </div>

            <div class="temp">
              <div class="txt">
                <p>Temporada Baja</p>
              </div>
            </div>

          </div>
      </div>
    </div>

</body>

</html>


<script>
        document.addEventListener('DOMContentLoaded', function() {
            const carouselContainers = document.querySelectorAll('.carousel-container');

            carouselContainers.forEach(function(carouselContainer) {
                const carousel = carouselContainer.querySelector('.carousel');
                const prevButton = carouselContainer.querySelector('.prev-button');
                const nextButton = carouselContainer.querySelector('.next-button');

                let slideIndex = 0;

                function showSlide(index) {
                    carousel.style.transform = `translateX(-${index * 100}%)`;
                }

                function nextSlide() {
                    if (slideIndex < carousel.children.length - 1) {
                        slideIndex++;
                    } else {
                        slideIndex = 0;
                    }
                    showSlide(slideIndex);
                }

                function prevSlide() {
                    if (slideIndex > 0) {
                        slideIndex--;
                    } else {
                        slideIndex = carousel.children.length - 1;
                    }
                    showSlide(slideIndex);
                }

                nextButton.addEventListener('click', nextSlide);
                prevButton.addEventListener('click', prevSlide);
            });
        });
    </script>

