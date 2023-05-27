<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

use DateTime;
use Illuminate\Support\Facades\Cache;

class shoppingCarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request, $id) # función para agregar los datos en la cache
    {
        $this->store($id, $request->amount_products);
        return redirect(route('shoppingCar.index')); # redirecciona a la vista del carrito
    }

    public function edit($id, $cantidad) # función para actualizar los datos en la cache
    {
        $this->update($id, $cantidad);
        return ['estado' => 'success'];
    }

    public function update($id, $cantidad) # función para actualizar los datos en la cache
    {
        $registro = Cache::get($id);
        $datos['id'] = $registro->id ?? '';
        $datos['nombre'] = $registro->nombre ?? '';
        $datos['precio'] = $registro->precio ?? 0;
        $datos['imagen'] = $registro->imagen ?? '';
        $datos['cantidad'] = $cantidad ?? 1;
        $datos = json_decode(json_encode($datos));
        Cache::forever($id, $datos);
    }

    public function store($id, $cantidad, $type = 'product') # función para guardar los datos en la cache
    {
        $user = auth()->user();
        # Consultar el producto
        $product = Product::findOrFail($id);
        # En un arreglo guardamos los datos que necesitamos mostrar o traer a la vista del carrito
        $datos['id'] = $product->id ?? '';
        $datos['nombre'] = $product->name_product ?? '';
        $datos['precio'] = $product->price ?? 0;
        $datos['imagen'] = $product->picture ?? '';
        $datos['cantidad'] = $cantidad ?? 1;
        # Se modifica el arreglo como un string en forma de json y despues se pasa el string a un json
        $datos = json_decode(json_encode($datos));
        Cache::forever($type . $user?->id . $product?->id, $datos);
    }

    public function index(Request $request) # función para mostrar la vsta del carrito
    {
        $user = auth()->user();
        $keys = Product::all()->pluck('id')->toArray(); # se consultan todos los productos y los convertimos a arreglo
        $cont = 0;
        foreach ($keys as $key) {
            $keys[$cont] = 'product'. $user?->id . $key;
            $cont++;
        }
        // $services = Service::all()->pluck('id')->toArray();
        // foreach ($services as $service) {
        //     $keys[$cont] = 'service'. $user?->id . $service;
        //     $cont++;
        // }

        # consultamos todos los productos en la cache con los id de los productos (llaves)
        $products = Cache::many($keys);
        // dd($products);
        return view('customers.shoppingCar.shoppingcar', compact('products'));
    }

    public function delete()
    {
        // $products = [
        //     "id" => "",
        //     "name_product" => "",
        //     "decripcion" => "",
        //     "price" => 0,
        //     "picture" => "",
        //     "create_time" => "",
        //     "update_time" => "",
        //     "state_record" => ""
        // ];
        $user = auth()->user();
        $userId = $user->id;
        $keys = Product::all()->pluck('id')->toArray(); # se consultan todos los productos y los convertimos a arreglo
        foreach ($keys as $key) {
            $idRegistro = 'product'.$userId . $key;
            Cache::flush($idRegistro);
        }
        // Cache::flush(); # Se elimina todo lo que coincida con las llaves

        // return view('customers.shoppingCar.shoppingcar', compact('products'));
        return redirect(route('shoppingCar.index')); # redirecciona a la vista del carrito
    }

    public function clearProduct($id)
    {
        $user = auth()->user();
        $userId = $user->id;
        $key = $id; // Construir la llave de caché para el producto a eliminar
        Cache::forget($key); // Eliminar el elemento de la caché con la llave especificada

        // Obtener los productos restantes en la caché
        // $products = [
        //     "id" => "",
        //     "name_product" => "",
        //     "decripcion" => "",
        //     "price" => 0,
        //     "picture" => "",
        //     "create_time" => "",
        //     "update_time" => "",
        //     "state_record" => ""
        // ];
        // $user = auth()->user();
        // $keys = Product::all()->pluck('id')->toArray(); # se consultan todos los productos y los convertimos a arreglo
        // foreach ($keys as $index => $key) {
        //     $keys[$index] = 'product'.$user?->id . $key;
        // }
        // # consultamos todos los productos en la cache con los id de los productos (llaves)
        // $products = Cache::many($keys);

        // return view('customers.shoppingCar.shoppingcar', compact('products'));
        return redirect(route('shoppingCar.index')); # redirecciona a la vista del carrito
    }
}
