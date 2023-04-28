@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
<h1>{{ __('Services') }}</h1>
@stop

@section('content')
<div class="content container ">
    <div class="col-sm-12">
        <div class="card px-3">
            <nav class="navbar bg-body-tertiary">
                <div style="padding-top: 15px;">
                    <a class="btn btn-success rounded-pill" href="{{ Route('services.create')}}"><i class="fas fa-plus-square"></i> {{ __('Create New') }} </a>
                </div>
            </nav>

            <!-- <div class="card-header"> -->
            <div class="dataTables_length">
                <table id="tabla" class="table table-striped">
                    <thead>
                        <tr>

                            <th scope="col">{{ __('TITTLE') }}</th>
                            <th scope="col">{{ __('DESCRIPTION') }}</th>
                            <th scope="col">{{ __('MAX INDIVIDUALS') }}</th>
                            <th scope="col">{{ __('CREATION TIME') }}</th>
                            <th scope="col">{{ __('PRICE') }}</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($services as $S)
                        <tr>

                            <td class="text-center">{{ $S->tittle }}</td>
                            <td class="text-center">{{ $S->description }}</td>
                            <td class="text-center">{{ $S->max_individuals }}</td>
                            <td class="text-center">{{ date('d/m/Y', strtotime($S->create_time)) }}</td>
                            @foreach ($S->people_for_prices as $pe)
                            <td class="text-center">{{ $pe->price }}</td>

                            @endforeach

                            <td class="text-center">
                                <div class="row">
                                    <a class="btn btn-info btn-sm rounded-pill" href="{{ route('services.show', $S->id) }}"><i class="fas fa-eye"></i> {{ __('See More') }}</a>
                                </div>
                            </td>

                            <td class="text-center">
                                <div class="row">
                                    <a class="btn btn-success btn-sm rounded-pill" href="{{ route('services.edit', $S->id) }}"><i class="fas fa-edit"></i> {{ __('Edit') }}</a>
                                </div>
                            </td>

                            <td class="text-center">
                                <div class="row">
                                    <?php
                                    if ($S->state_record == 'ACTIVAR') {
                                    ?>
                                        <form action="{{route('services.disableServices', $S->id) }}" class="desactivar" method="get">
                                            <button class="btn btn-danger btn-sm rounded-pill"><i class="fas fa-lock"></i> {{ __('Disable') }}</button>
                                        </form>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if ($S->state_record == 'DESACTIVAR') {
                                    ?>
                                        <form action="{{route('services.activeServices', $S->id) }}" class="activar" method="get">
                                            <button class="btn btn-warning text-white btn-sm rounded-pill"><i class="fas fa-lock-open"></i> {{ __('Activate') }} </button>
                                        </form>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </td>

            </div>
            </td>
            </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="{{asset('js/datatables.js')}}"></script>

<script>
    console.log('Hi!');
</script>
<script>
    @if(session('ok') == 'ok')
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Servicio Creado Satisfactoriamente',
        showConfirmButton: false,
        timer: 2500
    })
    @endif


    @if(session("update"))
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Servicios Actualizado Correctamente ',
        showConfirmButton: false,
        timer: 2500
    })
    @endif
</script>

<script>
    @if(session('update')) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Servicio actualizado'
        })
    }
    @endif


    @if(session('save')) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Servicio guardado'
        })
    }
    @endif

    $('.activar').submit(function(e) {
        e.preventDefault();


        Swal.fire({
            title: 'Desea Activar El Servicio?',
            text: "El Servicio se cambiara al estado activo, por lo tanto se mostrará en la pagina principal",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Activar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }

        })

    });

    $('.desactivar').submit(function(e) {
        e.preventDefault();


        Swal.fire({
            title: 'Desea Desactivar El Servicio?',
            text: "El Servicio cambiara al estado inactivo, por lo tanto NO se mostrara en la pagina principal",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Desactivar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }

        })

    });
</script>

<script>
    $('#tableServices').DataTable();
</script>
@stop
