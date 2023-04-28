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

        button.estilobtn {
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
            font-size: 24px;
            color: #fff;
            background-color: #00684D;
            border: none;
            cursor: pointer;

            border-radius: 20%;
        }

        button.color-button:hover {
            background-color: #444;
        }

        /* Estilos para el botón de regreso */

        a.btn {
            padding: 10px 20px;
            font-size: 24px;
            color: #fff;
            background-color: #999;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }

        a.btn:hover {
            background-color: #bbb;
        }


        /* Estilos para pantallas pequeñas */

        @media screen and (max-width: 767px) {

            /* Reducir el tamaño de fuente */
            h2,
            h3 {
                font-size: 1.5rem;
            }

            /* Alinear el botón agregar y el botón volver */
            main button,
            main a {
                display: block;
                margin: 10px auto;
            }

            /* Hacer la imagen más pequeña */
            .image-container img {
                max-width: 100%;
                height: auto;
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
            }

            /* Hacer la imagen más grande */
            .image-container img {
                max-width: 100%;
                height: auto;
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

        }

        .image-container img {
            width: 100%;
            height: auto;
            display: block;
        }

        .container {
            display: flex;
            justify-content: center;
        }

        .descripcion {
            text-align: justify;
        }
    </style>
</head>

<body>

    <main id="profile" class="profile">


        <hgroup class="section-title">
            <h2>{{ $products->name_product }}</h2>
            <br>
            <h3><i class="fas fa-dollar-sign"></i> {{ $products->price }}</h3>
            <br>
            <br>
            <p2>Cantidad</p2>

        </hgroup>

        <figure class="image-container">
            <img src="{{ asset('storage/imgProducts').'/'.$products->picture }}" alt="" />
        </figure>


        <form>
            <div>
                <button class="estilobtn" id="restar">-</button>
                <span class="estilovsta" id="numero">1</span>
                <button class="estilobtn" id="sumar">+</button>
            </div>


            <button type="sumbit" class="color-button"><i class="fas fa-shopping-cart"></i> agregar</button>
        </form>

        <a style="background-color: blue;" href="{{ Route('products.productsviews') }}" type="submit" class="btn btn-primary rounded-pill"><i class="fas fa-undo-alt"></i> {{ __('Return') }}</a>



        <description>
            <br>
            <br>
            <p class="descripcion" id="text">{{ $products->decripcion }}</p>
        </description>






    </main>




</body>



<script>
    const sumarBoton = document.getElementById('sumar');
    const restarBoton = document.getElementById('restar');
    const numeroElemento = document.getElementById('numero');

    let numeroActual = 1;

    sumarBoton.addEventListener('click', () => {
        numeroActual++;
        numeroElemento.textContent = numeroActual;
    });

    restarBoton.addEventListener('click', () => {
        if (numeroActual > 1) {
            numeroActual--;
            numeroElemento.textContent = numeroActual;
        }
    });


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