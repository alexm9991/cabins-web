<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Document</title>
    <style>
        /* Estilos generales */

        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            color: #333;
            line-height: 1.5;

        }

        /* Estilos para el encabezado */

        .section-title {
            margin-bottom: 20px;
        }

        h2 {
            font-size: 50px;
            font-weight: bold;
            text-decoration: underline;


            color: #333;
            margin-bottom: 10px;
        }

        h3 {
            font-size: 25px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        p2 {

            font-size: 24px;
            color: black;
        }

        #text {
            font-size: 18px;
            line-height: 1.5;
        }

        /* Estilos para la imagen */

        .image-container {
            margin-bottom: 20px;
            width: 100%;
            height: 100%;

            border-radius: 20px;
        }

        img {
            max-width: 100%;
        }

        /* Estilos para el botón de cantidad */

        nav {
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            margin-bottom: 5px;
        }

        div {
            display: flex;
            align-items: center;
        }

        a.estilobtn {
            padding: 5px 10px;
            font-size: 24px;
            background-color: #ddd;
            border: none;
            cursor: pointer;
            margin-right: 10px;
        }

        span.estilovsta {
            font-size: 24px;
            font-weight: bold;
            margin: 0 10px;
        }

        /* Estilos para el botón de agregar */

        button.color-button {
            padding: 10px 20px;
            font-size: 100%;
            color: #FF6000;
            background-color: #FFE6C7;
            border: none;
            cursor: pointer;

            border-radius: 20px;
        }

        button.color-button:hover {
            background-color: #FF6000;
            color: #ddd ;
        }




        /* Estilos para pantallas pequeñas */

        @media screen and (max-width: 767px) {



            /* Alinear el botón agregar y el botón volver */
            main button,
            main {
                display: block;
                margin: 10px auto;

            }

            a {
                display: block;
                margin: 10px auto;
                font-size: 10%;
            }

            /* Hacer la imagen más grande */
            .image-container img {
                min-width: 40%;
                min-height: 40%;

            border-radius: 20px;
            }

        }

        /* Estilos para pantallas medianas y grandes */

        @media screen and (min-width: 768px) {

            /* Alinear la sección de información del producto y la imagen */
            main {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            /* Establecer un ancho fijo para la sección de información del producto */
            .section-title,
            nav {
                width: 45%;
            }

            /* Establecer un ancho fijo para la imagen */
            .image-container {
                width: 45%;

            border-radius: 20px;
            }

            /* Hacer la imagen más grande */
            .image-container img {
                max-width: 100%;
                height: auto;

            border-radius: 20px;
            }

            /* Alinear el botón agregar y el botón volver */
            main button,
            main a {
                display: inline-block;
                margin: 10px;
            }
        }


        .profile {
            display: grid;

            margin: 10%;

            grid-template:
                "section-title visual" auto
                "description visual" auto
                "nav visual" 0fr / 32% 1fr;
            column-gap: 40px;
        }

        .profile hgroup {
            grid-area: section-title;
            margin: 5%;
        }

        .profile form {
            grid-area: description;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 10%;
        }

        p {
            width: 300px;
            word-break: break-all;
        }


        .profile figure {
            grid-area: visual;

        }

        .image-container {
            width: 100%;
            max-width: 800px;
            /* Puedes cambiar este valor según sea necesario */
            margin: auto;

            border-radius: 20px;

        }

        .image-container img {
            width: 100%;
            height: auto;
            display: block;

            margin-left: 10%;

            border-radius: 20px;
        }

        .container {
            display: flex;
            justify-content: center;
        }

        .descripcion {
            text-align: justify;
        }


        .btnv {
            background-color: #ffffff;
            border: 2px solid #ff6600;
            color: #ff6600;
            cursor: pointer;
            font-size: 16px;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
            border-radius: 50px;
        }

        .btnv:hover {
            background-color: #ff6600;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <main id="profile" class="profile">

        <hgroup class="section-title">
            <h2 style=" color: #FF6000;">{{ $products->name_product }}</h2>
            <br>
            <h3><i class="fas fa-dollar-sign"></i> {{ $products->price }}</h3>
            <br>
            <br>
            <p2>Cantidad</p2>

        </hgroup>

        <figure class="image-container">
            <img src="{{ asset('storage/imgProducts').'/'.$products->picture }}" alt="" />
        </figure>


        <div>
            <form action="{{Route('products.addproductscar', $products->id)}}" method="GET">

                <a class="estilobtn" id="restar">-</a>
                <span class="estilovsta" id="numero">1</span>
                <input type="hidden" name="amount_products" value="1" id="amount_products">
                <a class="estilobtn" id="sumar">+</a>

                <button type="submit" class="color-button" onclick="enviarContenido()"><i class="fas fa-shopping-cart"></i> {{ __('Add') }}</button>
            </form>
        </div>

        <a href="{{ Route('products.productsviews') }}" type="submit" class="btnv"><i class="fas fa-undo-alt"></i> {{ __('Return') }}</a>

        <description>
            <br>
            <br>
            <p class="descripcion" id="text">{{ $products->decripcion }}</p>
        </description>


    </main>

</body>

<script>
    // Obtener elementos DOM
    const restarBtn = document.querySelector("#restar");
    const sumarBtn = document.querySelector("#sumar");
    const cantidadSpan = document.querySelector("#numero");
    const cantidadInput = document.querySelector("#amount_products");

    // Inicializar cantidad
    let cantidad = parseInt(cantidadSpan.innerText);

    // Función para actualizar cantidad
    const actualizarCantidad = (nuevaCantidad) => {
        cantidad = nuevaCantidad;
        cantidadSpan.innerText = cantidad;
        cantidadInput.value = cantidad;
    };

    // Manejar evento de clic en botón "restar"
    restarBtn.addEventListener("click", () => {
        if (cantidad > 1) {
            actualizarCantidad(cantidad - 1);
        }
    });

    // Manejar evento de clic en botón "sumar"
    sumarBtn.addEventListener("click", () => {
        actualizarCantidad(cantidad + 1);
    });
</script>



<script>
    const text = document.getElementById("text");
    const chars = text.innerText.split("");
    let output = "";

    for (let i = 0; i < chars.length; i++) {
        output += chars[i];

        if ((i + 1) % 32 === 0) {

            if (chars[i] === " ") {
                output += "<br>";
            } else if (chars[i + 1] === " ") {
                output += "<br>";
            } else {
                output += "- <br>";
            }

        }
    }

    text.innerHTML = output;
</script>

</html>
