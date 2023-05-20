@extends('adminlte::page')

@section('title', 'Actualizar PQRS')

@section('content_header')
<h1>{{ __('PQRS management') }}</h1>
@stop

@section('content')
<br>
<div class="content container">
    <div class="col-sm-10">
        <div class="card px-3" style="background-color: #D7D7D7; border-radius:15px">
            <div style="margin: 2% 6% 2% 6%;">
                <br>
                <div class="row mb-3">
                    <div class="col mb">
                        <label style="float: left;" for="name" class=" text-md-end">
                            <h5><b>{{ __('Name') }}</b></h5>
                        </label>
                        <input readonly="readonly" type="text" style="width:60%;height: 25px;border:none;border-radius:4px;margin: 0% 0% 0% 3%; " value="{{ $pqr-> name_user}}">
                    </div>
                    <div class="col mb">
                        <label style="float: left;" for="name" class=" text-md-end">
                            <h5><b>{{ __('Phone Number') }}</b></h5>
                        </label>
                        <input readonly="readonly" type="text" style="width:30%;height: 25px;border:none;border-radius:4px;margin: 0% 0% 0% 3%;" value="{{ $pqr->phone_user }}">
                    </div>
                    <br>
                </div>
                <div class="">
                    <h5><b>{{ __('Type') }}</b></h5>
                    <input readonly="readonly" type="text" style="width:100%;height: 35px;border:none;border-radius:8px" value="{{ $pqr->type }}">
                </div>
                <br>
                <div class="">
                    <h5><b>{{ __('Reason') }}</b></h5>
                    <input readonly="readonly" type="text" style="width:100%;height: 35px;border:none;border-radius:8px" value="{{ $pqr->reason }}">
                </div>
                <br>
                <div class="">
                    <h5><b>{{ __('File_number') }}</b></h5>
                    <input readonly="readonly" type="text" style="width:100%;height: 35px;border:none;border-radius:8px" value="{{ $pqr->file_number }}">
                </div>
                <br>
                <div class="">
                    <h5><b>{{ __('Bookings_id') }}</b></h5>
                    <input readonly="readonly" type="text" style="width:100%;height: 35px;border:none;border-radius:8px" value="{{ $pqr->bookings_id }}">
                </div>
                <br>
                <div>
                    <h5><b>{{ __('Description') }}</b></h5>
                    <style type="text/css">
                        textarea {
                            resize: none;
                        }
                    </style>
                    <textarea readonly="readonly" type="text" style="width: 100%;height:100%;border:none;border-radius:10px" cols="40" rows="10">{{ $pqr->description }}</textarea>

                </div>

                @if(null != $pqr->evidence) <php { ?>
                <br>
                <div class="">
                    <h5><b>{{ __('Evidence') }}</b></h5>
                    <img class="card-img-top" src="{{ asset('storage/imgPQRS').'/'.$pqr->evidence}}" alt="" style="border-radius:10px;">
                </div>
                <php } ?>
                @endif

                <br>
                <div class="row mb-3">
                    <div class="col mb">
                        <label style="margin: 0% 0% 0% 0%;" for="name" class=" text-md-end">
                            <h5><b>{{ __('Create Time') }}</b></h5>
                        </label>
                        <input readonly="readonly" type="text" style="width:38%;height: 25px;border:none;border-radius:4px;margin: 0% 0% 0% 3%; " value="{{ $pqr-> create_time}}">
                    </div>
                    <div class="col mb">
                        <label style="float: left;" for="name" class=" text-md-end">
                            <h5><b>{{ __('Update Time') }}</b></h5>
                        </label>
                        <input readonly="readonly" type="text" style="width:38%;height: 25px;border:none;border-radius:4px;margin: 0% 0% 0% 3%;" value="{{ $pqr->update_time }}">
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <div class="col mb">
                        <form class="formulario-state" action="{{ route('pqrs.update', $pqr->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select style="border-radius:10px;margin: 0% 0% 0% 1%;" class="btn btn-light" aria-label="Default select example" name="condition">
                                <option value="{{ __('MANAGED') }}" {{ $pqr->condition == 'GESTIONADO' ? 'selected' : '' }}>{{ __('MANAGED') }}</option>
                                <option value="{{ __('IN PROGRESS') }}" {{ $pqr->condition == 'EN PROCESO' ? 'selected' : '' }}>{{ __('IN PROGRESS') }}</option>
                                <option value="{{ __('NO MANAGED') }}" {{ $pqr->condition == 'NO GESTIONADO' ? 'selected' : '' }}>{{ __('NO MANAGED') }}</option>
                            </select>
                            <button style="margin: 0% 0% 0% 3%" type="submit" class="btn btn-success rounded-pill"><i class="fas fa-edit"></i>
                                {{ __('Update') }}
                            </button>

                        </form>
                    </div>
                    <div class="col mb">
                        <form class="formulario-delete" action="{{ route('pqrs.disableProducts', $pqr->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button style="float: right;" type="submit" class="btn btn-danger rounded-pill"><i class="fas fa-lock"></i>
                                {{ __('Delete') }}
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div class="form-group row,">
            <a href="{{ route('pqrs.index') }}" class="btn btn-primary rounded-pill"><i class="fas fa-undo-alt"></i> {{ __('Return') }}</a>
        </div>
        <br>
    </div>
</div>
@stop


@section('css')

@stop


@section('js')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('.formulario-delete').submit(function(e) {
        e.preventDefault();

        Swal.fire({
            title: '¿Esta seguro de eliminar la PQRS?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33C',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Aceptar',
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })

    });

    $('.formulario-state').submit(function(e) {
        e.preventDefault();

        Swal.fire({
            title: '¿Esta seguro de actualizar la PQRS?',
            showDenyButton: true,
            confirmButtonText: 'Actualizar',
            denyButtonText: `Cancelar`,
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            } else if (result.isDenied) {
                Swal.fire('No se actualizó la PQRS!!', '', 'info')
            }
        })
    })
</script>

@stop
