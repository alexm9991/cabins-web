<?php

namespace App\Http\Controllers;
use App\Models\Detail_service;
use App\Models\People_for_price;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Types_individual;
use App\Models\Resource;
use DateTime;

class ServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $services = Service::with('people_for_prices','type_service_individuals','detail_service','services_resource')->get();


        return view('modules.services.index', compact('services'));
        // return view('backend.services.home');
    }

    public function create()
    {
        $services = Service::all();
        return view('modules.services.create', compact('services'));
    }

    public function store(Request $request)
    {
        $services = new Service();
        $services1 = Types_individual::find(1);
        $types_id = $services1 ->id;
        $services -> tittle =$request ->title;
        $services -> description =$request ->description;
        $services -> max_individuals =$request ->max_individuals;
        $services -> rules = $request -> rules;
        $services -> save();

        $people_for_prices = new People_for_price();
        $people_for_prices -> price = $request -> price;
        $people_for_prices -> SERVICES_id = $services -> id;
        $people_for_prices -> TYPES_INDIVIDUALS_id = $types_id;

        $people_for_prices -> save();

        return redirect(route('services'))->with('ok','ok');
    }

    public function show($id)
    {
        $services = Service::with('people_for_prices','type_service_individuals','detail_service')->find($id);


        return view('modules.services.show' ,compact('services'));
    }

    public function edit($id)
    {
        $services = Service::with('people_for_prices','type_service_individuals','detail_service')->find($id);


        return view('modules.services.edit' ,compact('services'));
    }
    public function detailEdit($id1,$id2)
    {
        $services = Service::find($id1);

        $detail_services = Detail_service::find($id2);


        return view('modules.services.detailEdit' ,compact('services','detail_services'));
    }

    public function update(Request $request, $id)
    {

        $services = Service::findOrFail($id);
        $services -> tittle = $request ->tittle;
        $services -> description = $request ->description;
        $services -> max_individuals = $request ->max_individuals;
        $services -> rules = $request -> rules;
        $services -> save();

        $people_for_prices = $services -> people_for_prices()->firstOrFail();
        $people_for_prices -> price = $request ->price;
        $people_for_prices -> save();

        return redirect(route('services',$id))->with('update','ok');
    }

    public function detailUpdate(Request $request, $id1,$id2)
    {

        $detail_services = Detail_service::findOrFail($id2);
        $detail_services -> tittle = $request ->tittle;
        $detail_services -> description = $request ->description;
        $detail_services -> save();

        return redirect(route('services.showDetails',$id1))->with('update','ok');
    }

    public function addDetail($id)
    {
        $services = Service::with('people_for_prices','type_service_individuals','detail_service')->find($id);


        return view('modules.services.createDetail' ,compact('services'));

    }
    public function createDetail(Request $request, $id)
    {

        $services = Service::findOrFail($id);
        $detail_services = new Detail_service();
        $detail_services -> tittle = $request -> tittle;
        $detail_services -> description = $request -> description;
        $detail_services -> SERVICES_id = $services ->id;
        $detail_services-> save();
        return redirect(route('services.showDetails',$services->id))->with('ok','ok');
    }
    public function showDetails($id)
    {
        $services = Service::with('people_for_prices','type_service_individuals','detail_service')->find($id);


        return view('modules.services.showDetails' ,compact('services'));

    }

    public function disableServices($id){
        $services = Service::findOrFail($id);
        $people_for_prices = $services->people_for_prices()->firstOrFail();

        if ($services->state_record == 'ACTIVAR') {
            $state_record = 'DESACTIVAR';
        } else {
            $state_record = 'ACTIVAR';
        }
        $services->state_record = $state_record;
        $services->save();

        $people_for_prices->state_record = $state_record;
        $people_for_prices->save();

        return redirect()->back();
    }
 #Desactivar detalles servicios
    public function disableDetailServices($id){

        $detail_services = Detail_service::findOrFail($id);

        if ($detail_services->state_record == 'ACTIVAR') {
            $state_record = 'DESACTIVAR';
        } else {
            $state_record = 'ACTIVAR';
        }

        $detail_services->state_record =$state_record;
        $detail_services->save();

        return redirect()->back();
    }

    public function activeServices($id){
        $services = Service::findOrFail($id);

        $people_for_prices = $services->people_for_prices()->firstOrFail();

        if ($services->state_record = 'DESACTIVAR') {
            $state_record = 'ACTIVAR';
        } else {
            $state_record = 'DESACTIVAR';
        }
        $services->state_record = $state_record;
        $services->save();

        $people_for_prices->state_record = $state_record;
        $people_for_prices->save();

        return redirect()->back();
    }
 #Activar detalles servicios
    public function activeDetailServices($id){

        $detail_services = Detail_service::findOrFail($id);

        if ($detail_services->state_record = 'DESACTIVAR') {
            $state_record = 'ACTIVAR';
        } else {
            $state_record = 'DESACTIVAR';
        }

        $detail_services->state_record = $state_record;
        $detail_services->save();

        return redirect()->back();
    }

    //Funciones Imagenes
    public function addImage($service_id,$detail_id)
    {
        $services = Service::findOrFail($service_id);
        $detail_services= Detail_service::findOrFail($detail_id);
        return view('modules.services.addImage', compact('services','detail_services'));
    }

    public function storeImage(Request $request,$service_id,$detail_id)
    {
        $detail_services= Detail_service::findOrFail($detail_id);
        $resources = new Resource();

        if (isset($_FILES['picture']) && ($_FILES['picture']['name']!=null))  {
            $fecha = new DateTime();
            $Types = array('image/jpeg', 'image/png', 'image/gif', 'image/jpg');

            $picture = $fecha->getTimestamp() . "_" .  $_FILES['picture']['name']; //subir la imagen con tiempo diferente, para diferenciar el mismo nombre pero hora diferente
            $imagen_temporal = $_FILES['picture']['tmp_name'];
            $validation = $_FILES['picture']['type'];

            if (in_array($validation, $Types)) {

                move_uploaded_file($imagen_temporal, "storage/imgServices/" . $picture); //mover la imagen y guardarla en una carpeta

                $resources->url = $picture;
                $resources->DETAIL_SERVICES_id = $detail_services->id;
                $resources->save();
                return redirect(route('services.showDetails',$service_id))->with('save', 'ok');
            } else {

                return redirect()->back()->with('not', 'ok');
            }
        }
        return redirect()->back()->with('not', 'ok');
    }

    public function editImg($id_ser,$id_re,$id_de)
    {
        $services = Service::findOrFail($id_ser);
        $resources = Resource::findOrFail($id_re);
        $detail_services = Detail_service::findOrFail($id_de);
        return view('modules.services.editImg', compact('services','resources','detail_services'));
    }

    public function updateImg(Request $request,$id_ser,$id_re,$id_de)
    {
        $services = Service::findOrFail($id_ser);
        $resources = Resource::findOrFail($id_re);
        $detail_services = Detail_service::findOrFail($id_de);

        $rutaArchivo = public_path('storage/imgServices/') . '/' . $resources->url;

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
                move_uploaded_file($imagen_temporal, "storage/imgServices/" . $picture);

                $resources->url = $picture;
                $resources->save();
                return redirect(route('services.detailEdit',['id' => $services->id,'de' => $detail_services->id]))->with('update', 'ok');
            } else {
                $resources->url = $request->pictureOld;
                $resources->save();
                return redirect()->back()->with('error', 'ok');
            }
        } else if (isset($_FILES['picture']) && ($_FILES['picture']['name']==null)){
            $resources->url = $request->pictureOld;
            $resources->save();
            return redirect(route('services.detailEdit',['id' => $services->id,'de' => $detail_services->id]))->with('update', 'ok');
        }
    }
}
