@extends('layouts.app')

@section('tittle', 'Servicios')
@section('content')

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Servicios</title>
    @section('styles')
        @parent
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="{{ asset('css/services/servicios.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/carrousels.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
        <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
        <style>
            .cuerpo {
                background-color: #fff;
            }

            .carousel-container {
                position: relative;
                width: 500px;
                overflow: hidden;
            }

            .carousel {
                display: flex;
                width: 700px;
                transition: transform 0.5s ease-in-out;
            }


            .slide {
                flex: 0 0 100%;
            }

            .slide img {
                width: 100%;
            }

            .prev-button,
            .next-button {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                width: 50px;
                height: 50px;
                background-color: gray;
                color: white;
                border: none;
                font-size: 24px;
                cursor: pointer;
            }

            .prev-button {
                left: 10px;
            }

            .next-button {
                right: 10px;
            }
        </style>

    </head>
@endsection

<body class="cuerpo">

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
                      <img src="{{asset('storage/imgServices').'/'.$re->url}}" alt="100px" width="">
                    </div>
                    @endforeach
                  </div>
                  <button class="prev-button">&#10094;</button>
                  <button class="next-button">&#10095;</button>
                </div>


            </div>

            <div class="orange-separator"></div>
        @else
            <section class="element">
              <div class="carousel-container">
                <div class="carousel">
                 @foreach ($S->services_resource as $re)
                  <div class="slide">
                    <img src="{{asset('storage/imgServices').'/'.$re->url}}" alt="100px" width="">
                  </div>
                  @endforeach
                </div>
                <button class="prev-button">&#10094;</button>
                <button class="next-button">&#10095;</button>
              </div>

                <!--Texto de las zonas recreacionales-->
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

            <div class="orange-separator"></div>
        @endif
    @endforeach

    <script>
        const carousel = document.querySelector('.carousel');
        const prevButton = document.querySelector('.prev-button');
        const nextButton = document.querySelector('.next-button');

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
    </script>

</body>

</html>


@endsection
