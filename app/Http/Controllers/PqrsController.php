<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Pqrs;
use Illuminate\Http\Request;
use DateTime;

class PqrsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    //Funcion para ver los PQRS activos
    public function index()
    {
        $pqrs = Pqrs::select('*')
            ->where('state_record', '=', 'ACTIVAR')
            ->get();
        return view('modules.pqrs.index', ['pqrs' => $pqrs]);
    }


    //Funcion para ver el PQRS
    public function view_pqrs(Pqrs $pqr)
    {
        return view('modules.pqrs.update', compact('pqr'));
    }


    // Funcion para eliminar o desactivar el Pqrs
    public function delete($id)
    {
        $pqrs = Pqrs::findOrFail($id);
        if ($pqrs->state_record == 'ACTIVAR') {
            $pqrs->state_record = 'DESACTIVAR';
        }
        $pqrs->save();
        return redirect()->route('pqrs.index');
    }


    // Funcion para cambiar la gestion del Pqrs
    public function update(Request $request, $id)
    {
        $pqrs = Pqrs::find($id);
        $validatedData = $request->validate([
            'condition' => 'required|string|max:15'
        ]);
        $pqrs->condition = $request->input('condition');
        $pqrs->save();
        return redirect()->route('pqrs.index')->with('update', 'ok');
    }


    // Funcion para la vista de crear Pqrs
    public function showCreate()
    {
        return view('modules.pqrs.create');
    }


    // Funcion para crear Pqrs

    public function create(Request $request)
    {
        $validar_id = Bookings::select('id')
            ->where('id', '=', $request->post('bookings_id'))
            ->get();

        if ($validar_id == "[]") {
            return redirect()->route('pqrs.showCreate')->with('not', 'ok');
        } else {
            $pqrs = new Pqrs;

            $pqrs->name_user = $request->post('name_user');
            $pqrs->phone_user = $request->post('phone_user');
            $pqrs->bookings_id = $request->post('bookings_id');
            $pqrs->type = $request->post('type');
            $pqrs->reason = $request->post('reason');
            $pqrs->description = $request->post('description');


            $fecha = new DateTime();

            if (isset($_FILES['evidence']) && ($_FILES['evidence']['name'] != null)) {
                $fecha = new DateTime();
                $Types = array('image/jpeg', 'image/png', 'image/gif', 'image/jpg');

                $evidence = $fecha->getTimestamp() . "_" .  $_FILES['evidence']['name']; //subir la imagen con tiempo diferente, para diferenciar el mismo nombre pero hora diferente
                $imagen_temporal = $_FILES['evidence']['tmp_name'];
                $validation = $_FILES['evidence']['type'];

                if (in_array($validation, $Types)) {
                    move_uploaded_file($imagen_temporal, "storage/imgPQRS/" . $evidence); //mover la imagen y guardarla en una carpeta

                    $pqrs->evidence = $evidence;
                }
            }

            function generarCodigo($longitud)
            {
                do {
                    $caracteres = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                    $codigo = "";
                    for ($i = 0; $i < $longitud; $i++) {
                        $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
                    }

                    $resultado = Pqrs::select('file_number')
                        ->where('file_number', '=', $codigo)
                        ->get();

                } while ($resultado != "[]");

                return $codigo;
            }

            $codigo = generarCodigo(10);

            $pqrs->file_number = $codigo;

            $pqrs->save();

            //PONER LA RUTA DE LA PAGINA PQRS VISTA CLIENTE
            return redirect()->route('pqrs.showCreate')->with('yes', 'ok');
        }
    }
}
