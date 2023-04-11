<?php

namespace App\Http\Controllers;

use App\Models\Pqrs;
use Illuminate\Http\Request;

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
        return redirect()->route('pqrs.index');
    }


    // Funcion para la vista de crear Pqrs
    public function showCreate()
    {
        return view('modules.pqrs.create');
    }


    // Funcion para crear Pqrs
    public function create(Request $request)
    {
        $pqrs = new Pqrs;
        $pqrs -> title = $request->post('title');
        $pqrs -> description = $request->post('description');
        $pqrs -> name_user = $request->post('name_user');
        $pqrs -> phone_user = $request->post('phone_user');
        $pqrs -> save();

        //PONER LA RUTA DE LA PAGINA PQRS VISTA CLIENTE
        return redirect()->route('pqrs.showCreate')->with('success', 'Pqrs create successfully.');
    }
}
