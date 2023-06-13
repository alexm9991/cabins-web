<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
            integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.wompi.co/wompi-widgets.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/shoppingcar/shoppingcar.css') }}">
    </head>

    <body style=" background-color:  #FFE6C7;" class="cuerpo">
        <header>

            @include('layouts.nav')
        </header>
        <div class="cabecera" style="margin-top: 8%;">
            <h1 class="h1titulo">Carrito de compras</h1>
        </div>
        <main>
            @php
                $totalP = 0;
                $totalS = 0;
            @endphp

            <table class="bottom-border">
                <thead>
                    <tr>
                        <th style=" text-align: center; color: white;">SERVICIOS</th>

                        <th>Cantidad Adultos</th>
                        <th>Cantidad Niños</th>
                        <th>Estadia</th>
                        <th>Precio </th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($detailServices as $index => $detailService)
                        @if (gettype($detailService) == 'object')
                            <?php
                            $subtotalS = $detailService->precio;
                            $formatS = number_format($subtotalS);
                            ?>
                            <tr>
                                <div style="margin-top: 25%; margin-bottom: 25%;">
                                    <td style=" text-align: center;">
                                        <div style="margin-bottom: 10%;">
                                            {{ $detailService->nombre }}
                                        </div>

                                        <img style="margin-bottom: 10%;" class="image"
                                            height="100px"src="{{ asset('storage/imgServices') . '/' . $detailService->imgServicios }}" />
                                    </td>

                                </div>
                                <form>
                                    <td>
                                        <div style="margin-bottom: 5%;" class="contenedores">
                                            <a class="estilobtn  btnRestaSA"
                                                data-iddetail_serviceA="{{ $index }}">-</a>
                                            <span class="estilovsta spanCantidadAdulto{{ $index }}">
                                                {{ $detailService->cantidad_adultos }}
                                            </span>
                                            <input type="hidden" name="amount_products" value="1">
                                            <a class="estilobtn btnSumaSA"
                                                data-iddetail_serviceA="{{ $index }}">+</a>

                                        </div>
                                    </td>
                                </form>
                                <form>
                                    <td>
                                        <div style="margin-bottom: 5%;" class="contenedores">
                                            <a class="estilobtn  btnRestaSN"
                                                data-iddetail_serviceN="{{ $index }}">-</a>
                                            <span class="estilovsta spanCantidadNinos{{ $index }}">
                                                {{ $detailService->cantidad_ninos }}
                                            </span>
                                            <input type="hidden" name="amount_products" value="1">
                                            <a class="estilobtn btnSumaSN"
                                                data-iddetail_serviceN="{{ $index }}">+</a>
                                        </div>
                                    </td>
                                </form>
                                <td>

                                    <label type="text" name="fecha" readonly> fecha inicial :
                                        {{ $detailService->fecha_inicial }} <br>
                                        fecha final: {{ $detailService->fecha_final }} <br> dias:
                                        {{ $detailService->dias }}
                                    </label>
                                </td>

                                <td>
                                    <div style="margin-bottom: 20%;">$ {{ $formatS }}</div>
                                    <a class="a-quitar" href="{{ Route('shoppingCar.clearProduct', $index) }}"> <i
                                            class="fas fa-trash"></i></a>
                                </td>

                            </tr>

                            <?php $totalS = $totalS + $subtotalS; ?>
                        @endif
                    @endforeach

                </tbody>
            </table>

            <div class=" tabla">


                <!-----------------------------------------Productos-------------------------------------------------------------------->
                <table style="margin-left: 2%;" class="bottom-border">
                    <thead>
                        <tr>
                            <th style=" text-align: center; color: white;">PRODUCTOS</th>
                            <th></th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $index => $product)
                            @if (gettype($product) == 'object')
                                <?php $subtotal = $product->cantidad * $product->precio;

                                $format = number_format($subtotal); ?>
                                <tr>
                                    <div style="margin-top: 25%; margin-bottom: 25%;">
                                        <td style=" text-align: center;">
                                            <img class="image" height="100px"
                                                src="{{ asset('storage/imgProducts') . '/' . $product->imagen }}" />
                                        </td>

                                    </div>
                                    <form>
                                        <td>
                                            <div style="margin-bottom: 10%;">
                                                {{ $product->nombre }}
                                            </div>
                                            <div style="margin-bottom: 5%;">
                                                <div class="contenedores">

                                                    <a class="estilobtn  btnResta"
                                                        data-idproducto="{{ $index }}">-</a>
                                                    <span class="estilovsta spanCantidad{{ $index }}">
                                                        {{ $product->cantidad }}</span>
                                                    <input type="hidden" name="amount_products" value="1">
                                                    <a class="estilobtn btnSuma"
                                                        data-idproducto="{{ $index }}">+</a>

                                                </div>
                                            </div>
                                        </td>

                                    </form>

                                    <td>
                                        <div style="margin-bottom: 20%;">$ {{ $format }}</div>
                                        <a class="a-quitar" href="{{ Route('shoppingCar.clearProduct', $index) }}"> <i
                                                class="fas fa-trash"></i></a>
                                    </td>

                                </tr>


                                <?php $totalP = $totalP + $subtotal; ?>
                            @endif
                        @endforeach

                    </tbody>


                </table>
                <div style="display: flex; flex-direction: column;" class="totaldiv">
                    <div class="cuadro">
                        <div style="margin: 4%;">
                            <h3 style=" font-size: 20px;" class="h1titulo">Resumen Reserva</h3>
                        </div>
                        <div style="margin-bottom: 4%;">
                            <tr>
                                <td colspan="2">Total Productos:</td>
                                <td><?php $formattotalP = number_format($totalP); ?>${{ $formattotalP }}</td>
                            </tr>
                        </div>
                        <div>
                            <tr>
                                <td colspan="2">Total Servicios:</td>
                                <td><?php $formattotalS = number_format($totalS); ?>${{ $formattotalS }}</td>
                            </tr>

                            <div style="border-bottom: 2px solid black; color: #333;"></div>
                        </div>
                        <div style="margin-top: 4%;">
                            <tr>
                                <td colspan="2">Total:</td>
                                <td><?php $formattotal = $totalP + $totalS;
                                $formattotalF = number_format($formattotal); ?>${{ $formattotalF }}</td>
                            </tr>

                            <div>
                                <div>
                                    @php
                                        $totalenviar = $formattotal * 100;
                                        function generarReferenciaPago()
                                        {
                                            $longitud = 20; // Longitud de la referencia de pago
                                            $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_';
                                            $referencia = '';

                                            for ($i = 0; $i < $longitud; $i++) {
                                                $indice = rand(0, strlen($caracteres) - 1);
                                                $referencia .= $caracteres[$indice];
                                            }
                                            return $referencia;
                                    } @endphp <div>
                                        <div>
                                            <br>
                                            <form>
                                                <script src="https://checkout.wompi.co/widget.js" data-render="button"
                                                    data-public-key="pub_test_dz1eHfGhkYNzdzgff6YqngESzgqLRYvV" data-currency="COP"
                                                    data-amount-in-cents="{{ $totalenviar }}" data-reference="{{ generarReferenciaPago() }}" redirect-url="https://www.fincaturisticalaarboleda.com//bookings/success">
                                                </script>
                                            </form>
                                            <br>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 50%;  margin-right: 20%; display: flex; flex-direction: column;">
                        <a id="addbuy" class="a-content" href="{{ Route('products.productsviews') }}">Seguir
                            comprando</a>
                        <a class="a-content" href="{{ Route('shoppingCar.delete') }}">Vaciar carrito</a>
                    </div>
        </main>
        @include('layouts.footer')
    </body>

    </html>

    <script>
        //Otro metodo

        $(document).on('click', '.btnSuma', function() {
            let idproducto = $(this).attr('data-idproducto');
            let cantidad = parseInt($(".spanCantidad" + idproducto).text(), 0);
            cantidad++;
            $(".spanCantidad" + idproducto).text(cantidad);
            console.log(cantidad);
            actualizar(idproducto, cantidad);
            // location.reload(); //
        });

        $(document).on('click', '.btnResta', function() {
            let idproducto = $(this).attr('data-idproducto');
            let cantidad = parseInt($(".spanCantidad" + idproducto).text(), 0);
            cantidad--;
            if (cantidad > 0) {
                $(".spanCantidad" + idproducto).text(cantidad);
                actualizar(idproducto, cantidad);
                // location.reload(); //
            }

        });

        $(document).on('click', '.btnSumaSA', function() {
            let iddetail_serviceA = $(this).attr('data-iddetail_serviceA');
            let cantidadA = parseInt($(".spanCantidadAdulto" + iddetail_serviceA).text(), 0);
            cantidadA++;
            $(".spanCantidadAdulto" + iddetail_serviceA).text(cantidadA);
            actualizarA(iddetail_serviceA, cantidadA);
            // location.reload(); //
        });

        $(document).on('click', '.btnRestaSA', function() {
            let iddetail_serviceA = $(this).attr('data-iddetail_serviceA');
            console.log(iddetail_serviceA);
            let cantidadA = parseInt($(".spanCantidadAdulto" + iddetail_serviceA).text(), 0);
            console.log(cantidadA);
            cantidadA--;
            if (cantidadA > 0) {
                $(".spanCantidadAdulto" + iddetail_serviceA).text(cantidadA);
                actualizarA(iddetail_serviceA, cantidadA);
                // location.reload(); //
            }

        });

        $(document).on('click', '.btnSumaSN', function() {
            let iddetail_serviceN = $(this).attr('data-iddetail_serviceN');
            let cantidadN = parseInt($(".spanCantidadNinos" + iddetail_serviceN).text(), 0);
            cantidadN++;
            $(".spanCantidadNinos" + iddetail_serviceN).text(cantidadN);
            console.log(cantidadN);
            actualizarN(iddetail_serviceN, cantidadN);
            // location.reload(); //
        });

        $(document).on('click', '.btnRestaSN', function() {
            let iddetail_serviceN = $(this).attr('data-iddetail_serviceN');
            let cantidadN = parseInt($(".spanCantidadNinos" + iddetail_serviceN).text(), 0);
            cantidadN--;
            if (cantidadN > 0) {
                $(".spanCantidadNinos" + iddetail_serviceN).text(cantidadN);
                actualizarN(iddetail_serviceN, cantidadN);
                // location.reload(); //
            }

        });



        const actualizar = (id, cantidad) => {
            $.ajax({
                url: '/shoppingCar/' + id + '/edit/' + cantidad, // la URL para la petición
                // url: '/shoppingCar/' + id + '/update/' + cantidad, // la URL para la petición
                type: 'GET', // especifica si será una petición POST o GET
                dataType: 'json', // el tipo de información que se espera de respuesta
                success: function(
                    json
                ) { // código a ejecutar si la petición es satisfactoria; la respuesta es pasada como argumento a la función
                    console.log('Correcto');
                    location.reload(); //
                },
                error: function(xhr,
                    status
                ) { // código a ejecutar si la petición falla; son pasados como argumentos a la función el objeto de la petición en crudo y código de estatus de la petición
                    console.log('Disculpe, existió un problema');
                },
            });
        }

        const actualizarA = (id, cantidad) => {
            $.ajax({
                url: '/shoppingCar/' + id + '/editServicesA/' + cantidad, // la URL para la petición
                // url: '/shoppingCar/' + id + '/update/' + cantidad, // la URL para la petición
                type: 'GET', // especifica si será una petición POST o GET
                dataType: 'json', // el tipo de información que se espera de respuesta
                success: function(
                    json
                ) { // código a ejecutar si la petición es satisfactoria; la respuesta es pasada como argumento a la función
                    console.log('Correcto');
                    location.reload(); //
                },
                error: function(xhr,
                    status
                ) { // código a ejecutar si la petición falla; son pasados como argumentos a la función el objeto de la petición en crudo y código de estatus de la petición
                    console.log('Disculpe, existió un problema');
                },
            });
        }


        const actualizarN = (id, cantidad) => {
            $.ajax({
                url: '/shoppingCar/' + id + '/editServicesN/' + cantidad, // la URL para la petición
                // url: '/shoppingCar/' + id + '/update/' + cantidad, // la URL para la petición
                type: 'GET', // especifica si será una petición POST o GET
                dataType: 'json', // el tipo de información que se espera de respuesta
                success: function(
                    json
                ) { // código a ejecutar si la petición es satisfactoria; la respuesta es pasada como argumento a la función
                    console.log('Correcto');
                    location.reload(); //
                },
                error: function(xhr,
                    status
                ) { // código a ejecutar si la petición falla; son pasados como argumentos a la función el objeto de la petición en crudo y código de estatus de la petición
                    console.log('Disculpe, existió un problema');
                },
            });
        }

        @if (session('error'))
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'EXCEDISTE LA CANTIDAD DE PERSONAS!',
                    footer: 'Elige la cantidad dentro de nuestro rango'
                })
            }
        @endif
    </script>
