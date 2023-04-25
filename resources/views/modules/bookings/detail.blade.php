@extends('adminlte::page')

@section('title', 'Detalle de Reservas')

@section('content_header')
<h1>{{ __('Bookings Detail') }}</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h4>{{ __('BOOKINGS DETAIL') }}</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>{{ __('Reservation code') }}:</label>
                        <span>{{ $booking->id }}</span>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Initial Date') }}:</label>
                        <span>{{ $booking->initial_date }}</span>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Final Date') }}:</label>
                        <span>{{ $booking->final_date }}</span>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Deposit') }}:</label>
                        <span>{{ $booking->deposit }}</span>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Total Paid') }}:</label>
                        <span>{{ $booking->isPaid }}</span>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Payment Method') }}:</label>
                        <span>{{ $booking->title_payment }}</span>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Service name') }}:</label>
                        <span>{{ $booking->tittle }}</span>
                    </div>
                    <hr>
                    <div class="text-center">
                        <h5>{{ __('PRODUCTS') }}</h5>
                    </div>
                    <div class="form-group">
                        @foreach ($booking_product as $boop)

                        <span>- {{ $boop->name_product }} </span><br>

                        @endforeach
                    </div>
                    <hr>
                    <div class="text-center">
                        <h5>{{ __('APPLICANT') }}</h5>
                    </div>
                    <div class="form-group">
                        <label>{{ __('User name') }}:</label>
                        <span>{{ $booking->name }} {{ $booking->last_name }}</span><br>
                        <label>{{ __('Phone Number') }}:</label>
                        <span>{{ $booking->phone_number }}</span><br>
                        <label>{{ __('Email') }}:</label>
                        <span>{{ $booking->email }}</span>
                    </div>
                    <hr>
                    <div class="text-center">
                        <h5>{{ __('MEMBERS') }}</h5>
                    </div>
                    @foreach ($booking_members as $boo)
                        <div class="form-group">
                            <label>{{ __('Name') }}:</label>
                            <span>{{ $boo->first_name_member }} {{ $boo->last_name_member }}</span><br>
                            <label>{{ __('Age') }}:</label>
                            <span>{{ $boo->age_member }}</span><br>
                            <label>{{ __('Document') }}:</label>
                            <span>{{ $boo->document_member }}</span>
                        </div>
                    @endforeach
                    <hr>
                    <div class="form-group">
                        <label>{{ __('Create Time') }}:</label>
                        <span>{{ $booking->create_time }}</span>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Update Time') }}:</label>
                        <span>{{ $booking->update_time }}</span>
                    </div>
                    <div class="form-group">
                        <label>{{ __('State Record') }}:</label>
                        <span>{{ $booking->state_record }}</span>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <div class="row mb-4">
                                <?php
                                if ($booking->state_record == 'ACTIVAR') {
                                ?>
                                    <form class="formulario-disable" action="{{ route('bookings.delete', $booking->id) }}" method="GET">
                                        <button class="btn btn-danger rounded-pill"><i class="fas fa-lock"></i> {{ __('Disable') }}</button>
                                    </form>
                                <?php
                                }
                                ?>
                                <?php
                                if ($booking->state_record == 'DESACTIVAR') {
                                ?>
                                    <form class="formulario-activate" action="{{ route('bookings.delete', $booking->id) }}" method="GET">
                                        <button class="btn btn-warning text-white rounded-pill"><i class="fas fa-lock-open"></i> {{ __('Activate') }}</button>
                                    </form>
                                <?php
                                }
                                ?>
                                <a href="{{ route('bookings.index') }}" class="btn btn-primary rounded-pill"><i class="fas fa-undo-alt"></i> {{ __('Return') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    $('.formulario-disable').submit(function(e) {
        e.preventDefault();

        Swal.fire({
            title: '¿Esta seguro de desactivar la reserva?',
            showDenyButton: true,
            confirmButtonText: 'Desactivar',
            denyButtonText: `Cancelar`,
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            } else if (result.isDenied) {
                Swal.fire('No se desactivo la reserva!!', '', 'info')
            }
        })
    })

    $('.formulario-activate').submit(function(e) {
        e.preventDefault();

        Swal.fire({
            title: '¿Esta seguro de activar la reserva?',
            showDenyButton: true,
            confirmButtonText: 'Activar',
            denyButtonText: `Cancelar`,
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            } else if (result.isDenied) {
                Swal.fire('No se activo la reserva!!', '', 'info')
            }
        })
    })
</script>
@stop