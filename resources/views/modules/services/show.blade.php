@extends('adminlte::page')

@section('title', 'Details')

@section('content_header')
<h1>Detalles del Servicio</h1>
@stop

@section('content')

<div class="container">
    <form action="{{Route('services.update', $services->id)}}" method="GET"><!--Aqui va el POST-->
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">{{ __('TITTLE') }}</label>
            <input type="text" name="tittle" maxlength="20" value="{{$services->tittle}}" class="form-control" placeholder="Titlle" readonly="readonly">
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('DESCRIPTION') }}</label>
            <input type="text" name="description" maxlength="255" value="{{$services->description}}" class="form-control" placeholder="Description" readonly="readonly">
        </div>
        <div class="mb-3">
            <label class="form-label">{{ __('MAX INDIVIDUALS') }}</label>
            <input type="number" name="max_individuals" min=0 max=100 value="{{$services->max_individuals}}" class="form-control" placeholder="Max_individuals" readonly="readonly">
        </div>
        <div class="mb-3">
            <label class="form-label">{{ __('RULES') }}</label>
            <input type="text" name="rules" value="{{$services->rules}}" class="form-control" placeholder="Rules" readonly="readonly">
        </div>
        <!-- {{$price = $services->people_for_prices->first()->price;}}-->
        <div class="mb-3">
            <label class="form-label">{{ __('PRICE') }}</label>
            <input type="number" min=0 max=99999999999 name="price" class="form-control" value="{{$price}}" placeholder="Price" readonly="readonly">
        </div>

        <div style="text-align: center; ">
            <a style="margin: 10px;" href="{{ Route('services') }}" type="submit" class="btn btn-primary rounded-pill"><i class="fas fa-undo-alt"></i> {{ __('Return') }}</a>
            <a style="margin: 10px;" href="{{ route('services.showDetails', $services->id) }}" type="submit" class="btn btn-success rounded-pill"><i class="fas fa-folder-open"></i> {{ __('See service details') }}</a>
        </div>

    </form>

</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
