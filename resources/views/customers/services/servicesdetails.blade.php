    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Servicios</title>

        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="{{ asset('css/services/detalles.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/services/carrousels.css') }}" />

    </head>

    <body>

        <header>
            @include('layouts.nav')
        </header>

        <!-- DEGRADADO -->
        <div class="degradado">
            <!--CUADRO CENTRADO-->
            <div class="cuadro-centrado">
                <p>Detalles de {{ $services->tittle }}</p>
            </div>
        </div>



        <!--Texto de CANCHA-->
        @foreach ($details as $detail)
            <div class="element">
                <div class="texto-left">
                    <div id="titulo-left">
                        <h2>{{ $detail->tittle }}</h2>
                    </div>
                    <div id="text-left">
                        <p>{{ $detail->description }}</p>
                    </div>
                    <!--Boton-->
                    <div class="boton-modal">
                        <label for="btn-modal" onclick="TittleModal('{{ $detail->tittle }}')"> RESERVAR AHORA </label>
                    </div>
                </div>

                <div class="carousel-container">
                    <div class="carousel">
                        @foreach ($detail->resource as $re)
                            <div class="slide">
                                <img src="{{ asset('storage/imgServices') . '/' . $re->url }}" alt="">
                            </div>
                        @endforeach
                    </div>
                    <button class="prev-button">&#10094;</button>
                    <button class="next-button">&#10095;</button>
                </div>


                </section>

            </div>
            <div class="orange-separator"></div>
        @endforeach





        <!--VENTANA MODAL-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(function() {
                $("#datepicker").datepicker();
            });
        </script>
        <input type="checkbox" id="btn-modal">
        <div class="container-modal">
            <div class="content-modal">
                <script>
                    var TittleModal = function(tittle){
                        var modalTitle = containerModal.querySelector("#Tittlemodal");
                     modalTitle.textContent = tittle;
                    }                    
                </script>
                <h2 id="Tittlemodal"></h2>
                <div class="cant_personas">
                    <p>Cantidad de personas: </p>
                    <br>
                    <div class="adultos">
                        <label id="adultos"> Adultos: </label>
                        <input type="number">
                    </div>
                    <div class="ninos">
                        <label id="niños"> Niños: </label>
                        <input type="number">
                    </div>
                </div>


                <!-- Fecha inicio - Fecha fin -->
                <div class="fecha">
                    <form>
                        <label for="datepicker">Fecha:</label>
                        <input type="text" id="datepicker" name="fecha">
                    </form>

                </div>

                <!-- Tabla -->
                <div class="table-body">
                    <table>
                        <tr>
                            <td>Temporada</td>
                            <td>Precio</td>
                        </tr>
                        <tr>
                            <td>Alta</td>
                            <td>$100.000</td>
                        </tr>
                        <tr>
                            <td>Media</td>
                            <td>$50.000</td>
                        </tr>
                        <tr>
                            <td>Baja</td>
                            <td>$30.000</td>
                        </tr>
                    </table>
                </div>

                <!-- Boton Aceptar - Cancelar -->
                <div class="botons">
                    <button class="cancel-button" id="cancelButton">Cancelar</button>


                    <button class="acept-button" id="aceptButton">Aceptar</button>
                </div>


            </div>

            <!-- Fin ventana Modal -->
        </div>


    </body>
    @include('layouts.footer')

    </html>


    <script>
        var openModal = function() {
            var containerModal = document.querySelector(".container-modal");
            
           
            
            containerModal.style.display = "block";
            containerModal.style.display = "flex";
        };

        var closeModal = function() {
            var containerModal = document.querySelector(".container-modal");
            containerModal.style.display = "none";
            var btnModal = document.getElementById("btn-modal");
            btnModal.checked = false;
        };

        var cancelButton = document.getElementById("cancelButton");
        cancelButton.addEventListener("click", function() {
            closeModal();
        });

        var aceptButton = document.getElementById("aceptButton");
        aceptButton.addEventListener("click", function() {
            alert("Botón de aceptar presionado");
        });

        var btnModal = document.getElementById("btn-modal");
        btnModal.addEventListener("change", function() {
            if (this.checked) {
                openModal();
            } else {
                closeModal();
            }
        });
    </script>
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
