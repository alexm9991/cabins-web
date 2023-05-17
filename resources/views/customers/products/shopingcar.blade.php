@extends('layouts.app')

@section('tittle','Detalles')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    @section('styles')
    @parent
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <style>
        .cuerpo {
            font-family: Arial, sans-serif;

            padding: 0;
            background-color: #fff;
        }

        .cabecera {
            color: #333;
            padding: auto;
        }

        .h1titulo {
            font-size: 50px;
            margin: 0 auto;
            text-align: center;
            margin-bottom: 5%;
            color: #FFA559;

        }

        .contenedores {
            display: flex;
            align-items: center;
        }

        a.estilobtn {

            border-radius: 10px;
            padding: 5px 10px;
            font-size: 20px;
            background-color: #ddd;
            border: none;
            cursor: pointer;
            margin-right: 10px;
        }

        span.estilovsta {
            font-size: 20px;
            font-weight: bold;
            margin: 10px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th {
            background-color: #FFA559;
            text-align: left;
            height: 50px;

        }

        td {
            text-align: left;
        }




        .a-content,
        .button-content {
            background-color: #333;
            border: none;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            margin: 20px 10px;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease-in-out;

            border-radius: 10px;
        }

        .a-quitar {
            background-color: #333;
            border: none;
            color: #fff;
            cursor: pointer;
            display: inline-block;

            padding: 8px;
            text-decoration: none;
            border-radius: 10px;

            margin-left: 5px;
            margin-bottom: 30%;
        }

        .image {
            max-height: 100%;
            width: auto;
            border-radius: 10%;
        }



        .bottom-border {
            border-collapse: collapse;
        }

        .bottom-border th,
        .bottom-border td {
            border-bottom: 3px solid #333;
        }

        @keyframes animateLine {
            from {
                width: 0%;
            }

            to {
                width: 100%;
            }
        }

        .cuadro {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            animation: shadow 1s ease-in-out infinite alternate;
            width: 80%;
            text-align: center;
        }

        .cuadro h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #FFA559;
        }

        .cuadro p {
            font-size: 1.2rem;
            padding: 0;
        }

        .tabla {
            display: flex;
            justify-content: space-between;
            flex-basis: 80%;
        }

        .totaldiv {
            margin-left: 10%;
            margin-bottom: 25%;
            display: flex;
            justify-content: space-between;
            flex-basis: 40%;
            max-height: 13em;
        }
    </style>


</head>

@endsection

<body style=" background-color:  #FFE6C7;" class="cuerpo">
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
                    @foreach ($products as $product)
                    @if (gettype($product) == 'object')

                    <?php $subtotal = $product->cantidad * $product->precio;

                    $format = number_format($subtotal) ?>
                    <tr>
                        <div style="margin-top: 25%; margin-bottom: 25%;">
                            <td style=" text-align: center;">
                                <img class="image" height="100px" src="{{ asset('storage/imgProducts').'/'.$product->imagen }}" alt="" />
                            </td>

                        </div>
                        <form>
                            <td>
                                <div style="margin-bottom: 10%;">
                                    {{$product->nombre }}
                                </div>
                                <div style="margin-bottom: 5%;">
                                    <div class="contenedores">

                                        <a class="estilobtn  btnResta" data-idproducto="{{ $product->id }}">-</a>
                                        <span class="estilovsta spanCantidad{{ $product->id }}">
                                            {{ $product->cantidad }}</span>
                                        <input type="hidden" name="amount_products" value="1">
                                        <a class="estilobtn btnSuma" data-idproducto="{{ $product->id }}">+</a>

                                    </div>
                                </div>
                            </td>

                        </form>
                        <td>
                            <div style="margin-bottom: 20%;">{{$format }}</div>
                            <a class="a-quitar" href="{{Route('products.clearProduct', $product->id )}}"> <i class="fas fa-trash"></i></a>
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

                        <button style=" font-size: 16px;font-weight: bold; text-transform: uppercase;" class="button-content">Realizar compra</button>
                    </div>
                </div>
                <div style="margin-top: 50%;  margin-right: 20%; display: flex; flex-direction: column;">
                    <a id="addbuy" class="a-content" href="{{ Route('products.productsviews') }}">Seguir comprando</a>
                    <a class="a-content" href="{{Route('products.clearcar')}}">Vaciar carrito</a>
                </div>

            </div>
        </div>


    </main>
</body>


</html>


<script>
    


    $(document).on('click', '.btnSuma', function() {
        let idproducto = $(this).attr('data-idproducto');
        let cantidad = parseInt($(".spanCantidad" + idproducto).text(), 0);
        cantidad++;
        $(".spanCantidad" + idproducto).text(cantidad);
        actualizar(idproducto, cantidad);
        location.reload(); //
    });

    $(document).on('click', '.btnResta', function() {
        let idproducto = $(this).attr('data-idproducto');
        let cantidad = parseInt($(".spanCantidad" + idproducto).text(), 0);
        cantidad--;
        if (cantidad > 0) {
            $(".spanCantidad" + idproducto).text(cantidad);
            actualizar(idproducto, cantidad);
            location.reload(); //
        }

    });

    const actualizar = (id, cantidad) => {
        $.ajax({
            url: '/products/' + id + '/shopingcar/' + cantidad, // la URL para la petición
            type: 'GET', // especifica si será una petición POST o GET
            dataType: 'json', // el tipo de información que se espera de respuesta
            success: function(json) { // código a ejecutar si la petición es satisfactoria; la respuesta es pasada como argumento a la función
                console.log('Correcto');
            },
            error: function(xhr, status) { // código a ejecutar si la petición falla; son pasados como argumentos a la función el objeto de la petición en crudo y código de estatus de la petición
                console.log('Disculpe, existió un problema');
            },
        });
    }

    
</script>


@endsection