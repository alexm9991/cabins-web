<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
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
            justify-content: space-around;
            margin: 20px;
            padding: 50px;

            position: absolute;
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
            max-width: 100%;
            max-height: 100%;
            display: block;
        }

        .thumbnail h4 {
            margin: 10px 0;
            font-size: 1.2rem;
            text-align: center;
            color: #3c7d54;
        }

        .thumbnail p {
            margin: 10px ;
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
            background-color: #3c7d54;
            color: #fff;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;

            background: linear-gradient(0deg, rgba(255, 151, 0, 1) 0%, rgba(251, 75, 2, 1) 100%);

        }

        @media screen and (max-width: 767px) {
            .container {
                max-width: 90%;
                margin: 0 auto;
            }

            .menu {
                display: none;
            }

            .menu-icon {
                display: block;
            }

            /* Otros estilos para pantallas pequeñas */
        }


        @media screen and (min-width: 768px) {
            .container {
                max-width: 95%;
                margin: 0 auto;
            }

            .menu {
                display: block;
            }

            .menu-icon {
                display: none;
            }

            /* Otros estilos para pantallas grandes */
        }


        /* Estilos para el formulario de búsqueda */
        form {
            background: #fff;
            color: #133783;
            border: 1px solid;
            border-color: #e5e6e9 #dfe0e4 #d0d1d5;
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

        /*    
este se lo acomoda para el boton buscar en el buscador
        button {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        } */


        .pagination-container {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

.pagination-link {
  border: 1px solid #ccc;
  border-radius: 4px;
  padding: 5px 10px;
  margin: 0 5px;
  text-decoration: none;
  color: #333;
}

.pagination-link.active {
  background-color: #007bff;
  color: #fff;
}

.pagination-link:hover {
  background-color: #eee;
}

    </style>
</head>

<body>
<main>
    <br>
    <br>
    <br>

    <h1>ELIGE Y COMPRA YA</h1>
    <h2>Tenemos diferentes categorías para que tomes las que más se adapten a tu plan</h2>

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
    </div>

    <!-- <ul class="pagination"></ul> -->
</main>



</body>
<!--   esto es para la pagination

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>
<script>
    $(document).ready(function() {
        const itemsPerPage = 6;
        const $products = $(".products .thumbnail");
        const numItems = $products.length;
        const numPages = Math.ceil(numItems / itemsPerPage);

        // initialize pagination plugin
        $(".pagination").pagination({
            items: numItems,
            itemsOnPage: itemsPerPage,
            cssStyle: "light-theme",
            onPageClick: function(pageNumber) {
                // hide all items
                $products.hide();

                // determine range of items to show for current page
                const startIndex = (pageNumber - 1) * itemsPerPage;
                const endIndex = startIndex + itemsPerPage;

                // show the range of items for the current page
                $products.slice(startIndex, endIndex).show();
            }
        });
    });
</script> -->

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
        });
    });
</script>

</html>