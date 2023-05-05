<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <style>
        /* Estilos generales */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            color: #333;
            background: linear-gradient(to bottom, #FFE6C7 0%, #ffffff 50%);


        }

        h1,
        h2,
        h3 {
            font-weight: normal;
            text-align: center;
        }

        /* Estilos para la lista de productos */
        .products {
            display: flex;
            flex-wrap: wrap;
            margin: 20px;
            padding: 50px;
            justify-content: space-between;
        }


        /* Estilos para cada producto */
        .thumbnail {

            transition: 1s ease;
            -moz-transition: 1s ease;
            -webkit-transition: 1s ease;
            -o-transition: 1s ease;
            flex-basis: calc(23.33% - 20px);
            margin: 20px 0;
            padding: 10px;
            background-color: #fff;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .thumbnail:hover {
            transform: scale(1.1);
            -moz-transform: scale(1.1);
            -webkit-transform: scale(1.1);
            -o-transform: scale(1.1);
            -ms-transform: scale(1.1);
            background: lightgrey;
        }

        .thumbnail img {
            max-height: 100%;
            width: 100%;
        }

        .thumbnail h4 {
            margin: 10px 0;
            font-size: 1.2rem;
            text-align: center;
            color: #3c7d54;
        }

        .thumbnail p {
            margin: 10px;
            text-align: center;
            line-height: 1.5;
            font-size: larger;
            margin-left: 20px;
        }


        .buy-button {
            display: block;
            margin: 10px auto;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #FF6000;
            color: #fff;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;

            background: linear-gradient(0deg, rgba(255, 151, 0, 1) 0%, rgba(251, 75, 2, 1) 100%);

        }

        .titulo {
            color: #FFA559;

            font-family: Arial, sans-serif;
        }

        /* Estilos para el formulario de búsqueda */
        form {
            border-radius: 5px;
            margin-top: 10px;
            padding: 10px;
        }

        input {
            outline: none;
        }


        input[type=search] {
            background: #ededed;
            border: none;
            padding: 10px 10px 10px 40px;
            width: 97%;
            border-radius: 10px;
            transition: all .5s;
        }

        input[type=search]:focus {
            width: 90%;
            background-color: #fff;
            border-color: #6dcff6;
            box-shadow: 0 0 5px rgba(109, 207, 246, .5);
        }

        .centered-box {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            animation: shadow 1s ease-in-out infinite alternate;
            width: 80%;
            text-align: center;
        }

        .centered-box h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin: 0;
            padding: 0;
            color: #FFA559;
        }

        .centered-box p {
            font-size: 1.2rem;
            margin: 20px 0 0;
            padding: 0;
        }

        @keyframes shadow {
            0% {
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            }

            100% {
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            }
        }
    </style>
</head>

<body>
    <main>
        <br><br><br>

        <div class="centered-box">
            <h1>¡PRODUCTOS!</h1>
            <p>tenemos una amplia variedad de productos para todos los gustos y necesidades.
                Seguro que encontraras algo que te encante. los podras agregar en el momento de estar realizando la reserva
                ¿QUE ESPERAS?</p>
        </div>

        <br><br><br><br>

        <div>
            <h1 class="titulo">ELIGE Y COMPRA YA!</h1>
            <h2>Tenemos diferentes categorías para que tomes las que más se adapten a tu plan</h2>
        </div>


        <form>
            <input id="Buscador" name="buscador" type="Search" placeholder="Buscar" aria-label="Search">
        </form>

        <div class="products">
            @foreach ($products as $P)

            <div class="thumbnail">
                <h1>{{ $P->name_product}}</h1>
                <img height="300px" src="{{ asset('storage/imgProducts').'/'.$P->picture}}" alt="">

                <div style="display: flex; align-items: center; ">
                    <p>${{ $P->price}}/unidad</p>
                    <a style="text-decoration: none;" href="{{ route('products.showviews', $P->id) }}" class="buy-button"> {{ __('See More') }}</a>
                </div>
            </div>

            @endforeach
            <div id="no-results-message" class="hit-the-floor" style="display: none; font-size: 2rem; ">{{__('No results found')}}</div>

        </div>

    </main>



</body>

<!-- esto es para el buscador -->
<script>
    const buscador = document.getElementById("Buscador");
    const productos = document.querySelectorAll(".products .thumbnail");

    buscador.addEventListener("keyup", function(event) {
        const term = event.target.value.toLowerCase();

        productos.forEach(function(producto) {
            const title = producto.querySelector("h1").textContent.toLowerCase();

            if (title.includes(term)) {
                producto.style.display = "block";
            } else {
                producto.style.display = "none";
            }

            // esto es lo que muestra el mensaje de no se encontro resultados
            const noResultsMessage = document.getElementById("no-results-message");

            if (document.querySelectorAll(".products .thumbnail[style*='display: block']").length === 0) {
                noResultsMessage.style.display = "block";
            } else {
                noResultsMessage.style.display = "none";
            }

        });
    });
</script>

</html>
