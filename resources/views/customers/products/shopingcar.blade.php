<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shoping car</title>
</head>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #333;
        color: #fff;
        padding: 20px;
    }

    h1 {
        margin: 0;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    tfoot td {
        font-weight: bold;
    }

    input[type="number"] {
        width: 50px;
    }

    a,
    button {
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
    }

    a:hover,
    button:hover {
        background-color: #555;
    }

    button {
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
    }
</style>

<body>

    <header>
        <h1>Carrito de compras</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Imagen</th>
                    <th>Precio total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    
                        <td>{{ $products->name_product }}</td>
                        <td><input type="number" value="1" min="1"></td>
                        <td style="text-align: center;"><img  height="90px" style=""  src="{{ asset('storage/imgProducts').'/'.$products->picture }}" alt="" /></td>
                        <td>{{ $products->price }}</td>
                        
                </tr>


            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Total:</td>
                    <td>$65.00</td>
                </tr>
            </tfoot>
        </table>
        <a href="{{ Route('products.productsviews') }}">Seguir comprando</a>
        <a href="#">Vaciar carrito</a>
        <button>Realizar compra</button>
    </main>
</body>

</html>