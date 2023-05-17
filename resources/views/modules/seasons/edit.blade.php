@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('Update seasons') }}</h1>
@stop

@section('content')
<div class="container">
    <form action="{{Route('seasons.update', $season->id)}}" method="POST" enctype="multipart/form-data">
     @csrf
     @method('PUT')
        <div class="mb-3">
            <label class="form-label">{{ __('TITTLE') }}</label>
            <select type="form-select" name="tittle" maxlength="255" class="form-control" placeholder="Titulo" value={{$season->tittle}}required>
            <option selected >Seleccione una Opcion</option>
            <option value="Temporada baja" {{$season->tittle === "Temporada baja" ? 'selected':''}}>Temporada Baja</option>
            <option value="Temporada media" {{$season->tittle === "Temporada media" ? 'selected':''}}>Temporada Media</option>
            <option value="Temporada alta" {{$season->tittle === "Temporada alta" ? 'selected':''}}>Temporada Alta</option>
            </select>

        <div class="mb-3">
            <label class="form-label">{{ __('DESCRIPTION') }}</label>
            <input type="text"  name="description" maxlength="255"  class="form-control" value={{$season->description}} required>
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('INITIAL DATE') }}</label>
            <input type="date"  name="initial_date" maxlength="255"  class="form-control" value={{$season->create_time}} required>
       
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('FINAL DATE') }}</label>
            <input type="date"  name="final_date" maxlength="255"  class="form-control" value={{$season->update_time}} required>
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('PRICE') }}</label>
            <input type="number"  name="price" maxlength="255"  class="form-control" value={{$season->price}} required>
        </div>

            <!-- <div class="mb-3">
                <label class="form-label">{{ __('PRICE') }}</label>
                <input type="number"  name="price" maxlength="255"  class="form-control" placeholder="Precio" required>
            </div> -->


        <br>
        <br>

        <a href="{{Route('seasons.index')}}" type="submit" class="btn btn-primary rounded-pill"><i class="fas fa-undo-alt"></i> {{ __('Return') }} </a>
        
        <button type="submit"  class="btn btn-success rounded-pill"><i class="fas fa-edit"></i> {{__('Update')}}</button>


    </form>

</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
