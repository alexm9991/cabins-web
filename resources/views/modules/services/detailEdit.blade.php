@extends('adminlte::page')

@section('title', 'Actualizar Servicio')

@section('content_header')
<h1>{{ __('Update detail service') }}</h1>
@stop
@section('content')
<div class="container">

    <form class="confirmar" action="{{Route('services.detailUpdate',['id'=>$services->id,'de'=>$detail_services ->id])}}" method="GET"><!--Aqui va el POST-->
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">{{ __('TITTLE') }}</label>
            <input type="text" name="tittle" maxlength="255" value="{{$detail_services->tittle}}" class="form-control" placeholder="Titlle">
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('DESCRIPTION') }}</label>
            <input type="text" name="description" maxlength="255" value="{{$detail_services->description}}" class="form-control" placeholder="Description">
        </div>

        <div class="card-header">
            <table id='tableServices' class="table">
                <thead>
                    <tr>

                        <th scope="col">{{ __('Image') }}</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail_services ->resource as $re)
                    <tr>
                        <td>
                            <div class="mb-3">
                                <img class="img-thumbnail" width="350" src="{{asset('storage/imgServices').'/'.$re->url}}">
                            </div>
                        </td>

                        <td class="text-center">
                            <div class="row">
                                <a class="btn btn-success rounded-pill" href="{{ route('services.editImg', ['id'=>$services->id,'im' => $re->id, 'de' => $detail_services->id]) }}">
                                    <i class="fas fa-edit"></i> {{ __('Change') }}
                                </a>
                            </div>
                        </td>
                        {{-- <td class="text-center">
                                    <div class="row">
                                        <a class="btn btn-success" href="">
                                            <i class="fas fa-times-square"></i>{{ __('Delete') }}
                        </a>
        </div>
        </td> --}}
        </tr>
        @endforeach
        </tbody>
        </table>

        <button type="submit" class="btn btn-success rounded-pill"><i class="fas fa-edit"> </i>{{__('Update')}} </button>
        <a href="{{Route('services.showDetails',$services->id)}}" type="submit" class="btn btn-primary rounded-pill"><i class="fas fa-undo-alt"></i> {{ __('Return') }}</a>

    </form>

</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    @if(session('error')) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Imagen No Valida!',
            footer: 'Elige una imagen de tipo png,jpg,jpeg o gif'
        })
    }
    @endif



    $('.confirmar').submit(function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Desea Actualizar El Detalle del Servicio?',
            showDenyButton: true,
            confirmButtonText: 'Actualizar',
            denyButtonText: `Cancelar`,
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            } else if (result.isDenied) {
                Swal.fire('No Se Actualizo El Destalle del Servicio', '', 'info')
            }
        })
    })


    var input = document.getElementById('numero');
    input.addEventListener('input', function() {
        if (this.value.length > 12)
            this.value = this.value.slice(0, 12);
    })
</script>

<script>
    @if(session('ok') == 'ok')
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Detalle del servicio Creado Satisfactoriamente',
        showConfirmButton: false,
        timer: 2500
    })
    @endif


    @if(session("update"))
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Imagen Actualizada correctamente ',
        showConfirmButton: false,
        timer: 2500
    })
    @endif
</script>
@stop
