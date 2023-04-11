@extends('adminlte::page')

@section('title', 'Gestión de usuarios')

@section('content_header')
<h1>{{ __('Users management') }}</h1>
@stop

@section('content')

<div class="content container ">
    <div class="col-sm-12">
        <div style="margin-bottom: 30px">
            <form class="container-fluid justify-content-start">
                <a href="{{ route('users.showCreate')}}" class="btn btn-success rounded-pill">
                    <i class="fas fa-plus-square"></i> {{ __('Create New') }}</a>
            </form>
        </div>

        <div class="card px-3" style="border-radius:15px">
            <div class="dataTables_length" style="padding:20px">
                <table id="tabla" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">{{ __('NAME') }}</th>
                            <th class="text-center">{{ __('DOCUMENT') }}</th>
                            <th class="text-center">{{ __('ROLE') }}</th>
                            <th class="text-center">{{ __('CREATION TIME') }}</th>
                            <th class="text-center"></th>
                            <th class="text-center"></th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td class="text-center">{{ $user->name }} {{ $user->last_name }}</td>
                            <td class="text-center">{{ $user->identification_number }}</td>
                            <td class="text-center">{{ $user->role_name }}</td>
                            <td class="text-center">{{ date('d/m/Y', strtotime($user->create_time)) }}</td>

                            <td class="text-center">
                                <div class="text-center">
                                    <a class="btn btn-info rounded-pill" href="{{ route('users.show', $user->id) }}">
                                        <i class="fas fa-folder-open"></i> {{ __('See More') }}
                                    </a>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="text-center">
                                    <a class="btn btn-success rounded-pill" href="{{ route('users.edit', $user->id) }}"">
                                        <i class="fas fa-edit"></i> {{ __('Edit') }}
                                    </a>
                                </div>
                            </td>
                            <td class="text-center">

                                <div class="row">
                                    <?php
                                    if ($user->state_record == 'ACTIVAR') {
                                    ?>
                                        <form action="{{route('user.delete', $user->id) }}" class="desactivar" method="get" >
                                            <button class="btn btn-danger rounded-pill"><i class="fas fa-lock"></i> {{ __('Disable') }}</button>
                                        </form>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if ($user->state_record == 'DESACTIVAR') {
                                    ?>
                                        <form action="{{route('user.delete', $user->id) }}" class="activar" method="get">
                                            <button class="btn btn-warning text-white rounded-pill"><i class="fas fa-lock-open"></i> {{ __('Activate') }} </button>
                                        </form>
                                    <?php
                                    }
                                    ?>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
    @stop

    @section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/datatables.js')}}"></script>

    @stop
