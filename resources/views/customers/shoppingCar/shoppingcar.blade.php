<!DOCTYPE html>
<html lang="en">

<head>
    @section('styles')
    @parent
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="{{ asset('css/shoppingcar/shoppingcar.css')}}">
</head>

<body style=" background-color:  #FFE6C7;" class="cuerpo">
<header>
        @include('layouts.nav')
</header>
    <div class="cabecera">
        <h1 class="h1titulo">Carrito de compras</h1>
    </div>
    <main>
        <div class=" tabla">
            <table style="margin-left: 2%;" class="bottom-border">
                <thead>
                    <tr>
                        <th style=" text-align: center; color: white;">PRODUCTOS</th>
                        <th></th>
                        <th>Precio </th>
                    </tr>
                </thead>
                <tbody>

                    <?php $total = 0; ?>
                    @foreach ($products as $index => $product)

                    @if (gettype($product) == 'object')

                    <?php $subtotal = $product->cantidad * $product->precio;

                    $format = number_format($subtotal) ?>
                    <tr>
                        <div style="margin-top: 25%; margin-bottom: 25%;">
                            <td style=" text-align: center;">
                                <img class="image" height="100px" src="{{ asset('storage/imgProducts').'/'.$product->imagen }}"/>
                            </td>

                        </div>
                        <form>
                            <td>
                                <div style="margin-bottom: 10%;">
                                    {{$product->nombre }}
                                </div>
                                <div style="margin-bottom: 5%;">
                                    <div class="contenedores">

                                        <a class="estilobtn  btnResta" data-idproducto="{{ $index }}">-</a>
                                        {{-- <a class="estilobtn  btnResta" data-idproducto="{{ $product->id }}">-</a> --}}
                                        {{-- <span class="estilovsta spanCantidad{{ $product->id }}"> --}}
                                        <span class="estilovsta spanCantidad{{ $index }}">
                                            {{ $product->cantidad }}</span>
                                        <input type="hidden" name="amount_products" value="1">
                                        <a class="estilobtn btnSuma" data-idproducto="{{ $index }}">+</a>
                                        {{-- <a class="estilobtn btnSuma" data-idproducto="{{ $product->id }}">+</a> --}}

                                    </div>
                                </div>
                            </td>

                        </form>
                        <td>
                            <div style="margin-bottom: 20%;">{{$format }}</div>
                            <a class="a-quitar" href="{{Route('shoppingCar.clearProduct', $index )}}"> <i class="fas fa-trash"></i></a>
                            {{-- <a class="a-quitar" href="{{Route('shoppingCar.clearProduct', $product->id )}}"> <i class="fas fa-trash"></i></a> --}}
                        </td>

                    </tr>


                    <?php $total = $total + $subtotal   ?>
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
                            <td><?php $formattotal = number_format($total) ?>${{$formattotal}}</td>
                        </tr>
                    </div>
                    <div>
                        <tr>
                            <td colspan="2">Total Servicios:</td>
                            <td><?php $formattotal = number_format($total) ?>${{$formattotal}}</td>
                        </tr>

                        <div style="border-bottom: 2px solid black; color: #333;"></div>
                    </div>
                    <div style="margin-top: 4%;">
                        <tr>
                            <td colspan="2">Total:</td>
                            <td><?php $formattotal = number_format($total) ?>${{$formattotal}}</td>
                        </tr>

                        <button class="realizar-compra button-content">Realizar compra</button>
                    </div>
                </div>
                <div class="buttons-options">
                    <a id="addbuy" class="a-content" href="{{ Route('products.productsviews') }}">Seguir comprando</a>
                    <a class="a-content" href="{{Route('shoppingCar.delete')}}">Vaciar carrito</a>
                </div>

            </div>
        </div>


    </main>
    @include('layouts.footer')
</body>
</html>

<script>

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

    const actualizar = (id, cantidad) => {
        $.ajax({
            url: '/shoppingCar/' + id + '/edit/' + cantidad, // la URL para la petición
            // url: '/shoppingCar/' + id + '/update/' + cantidad, // la URL para la petición
            type: 'GET', // especifica si será una petición POST o GET
            dataType: 'json', // el tipo de información que se espera de respuesta
            success: function(json) { // código a ejecutar si la petición es satisfactoria; la respuesta es pasada como argumento a la función
                console.log('Correcto');
                location.reload(); //
            },
            error: function(xhr, status) { // código a ejecutar si la petición falla; son pasados como argumentos a la función el objeto de la petición en crudo y código de estatus de la petición
                console.log('Disculpe, existió un problema');
            },
        });
    }


</script>
