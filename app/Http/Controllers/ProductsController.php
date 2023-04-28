<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use DateTime;

class productsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('modules.products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('modules.products.create')->with('products', $products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $products = request() -> except('_token');
        // Product:: insert($products);

        $products = new Product();
        $products->name_product = $request->name_product;
        $products->decripcion = $request->decripcion;
        $products->price = $request->price;

        $fecha = new DateTime();



        if (isset($_FILES['picture']) && ($_FILES['picture']['name']!=null))  {
            $fecha = new DateTime();
            $Types = array('image/jpeg', 'image/png', 'image/gif', 'image/jpg');

            $picture = $fecha->getTimestamp() . "_" .  $_FILES['picture']['name']; //subir la imagen con tiempo diferente, para diferenciar el mismo nombre pero hora diferente
            $imagen_temporal = $_FILES['picture']['tmp_name'];
            $validation = $_FILES['picture']['type'];

            if (in_array($validation, $Types)) {
                move_uploaded_file($imagen_temporal, "storage/imgProducts/" . $picture); //mover la imagen y guardarla en una carpeta

                $products->picture = $picture;
                $products->save();
                return redirect(route('products.index'))->with('save', 'ok');
            } else {
                return redirect()->back()->with('error', 'ok');
            }
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::findOrFail($id);
        return view('modules.products.edit', compact('products'));
    }

    public function details($id)
    {
        $products = Product::findOrFail($id);
        return view('modules.products.show', compact('products'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Product::findOrFail($id);
        $products->name_product = $request->name_product;
        $products->decripcion = $request->decripcion;
        $products->price = $request->price;


        $rutaArchivo = public_path('storage/imgProducts/') . '/' . $products->picture;


        if (isset($_FILES['picture']) && ($_FILES['picture']['name']!=null))  {
            $fecha = new DateTime();
            $Types = array('image/jpeg', 'image/png', 'image/gif', 'image/jpg');

            $picture = $fecha->getTimestamp() . "_" .  $_FILES['picture']['name']; //subir la imagen con tiempo diferente, para diferenciar el mismo nombre pero hora diferente
            $imagen_temporal = $_FILES['picture']['tmp_name'];
            $validation = $_FILES['picture']['type'];

            if (in_array($validation, $Types)) {
                if (file_exists($rutaArchivo)) {
                    unlink($rutaArchivo);
                }
                move_uploaded_file($imagen_temporal, "storage/imgProducts/" . $picture);

                $products->picture = $picture;
                $products->save();
                return redirect(route('products.index'))->with('update', 'ok');
            } else {
                $products->picture = $request->pictureOld;
                $products->update();
                return redirect()->back()->with('error', 'ok');
            }
        } else if (isset($_FILES['picture']) && ($_FILES['picture']['name']==null)){
            $products->picture = $request->pictureOld;
            $products->update();
            return redirect(route('products.index'))->with('update', 'ok');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function disableProducts($id)
    {
        $products = Product::findOrFail($id);

        if ($products->state_record = 'ACTIVAR') {
            $products->state_record = 'DESACTIVAR';
        } else {
            $products->state_record = 'ACTIVAR';
        }

        $products->save();

        return redirect()->back();
    }

    public function activeProducts($id)
    {
        $products = Product::findOrFail($id);

        if ($products->state_record = 'DESACTIVAR') {
            $products->state_record = 'ACTIVAR';
        } else {
            $products->state_record = 'DESACTIVAR';
        }

        $products->save();

        return redirect()->back();
    }

    public function productsviews()
    {
        $products = Product::where('state_record', 'ACTIVAR')->get();
        return view('modules.products.productsviews')->with('products', $products);
        
    }

    public function showviews($id)
    {
        $products = Product::findOrFail($id);
        return view('modules.products.showviews', compact('products'));
    }



}
