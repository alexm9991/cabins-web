@extends('layouts.app')

@section('title', 'Mi Perfil')


@section('content_header')
<h1>Mi Perfil</h1>
@stop

@section('content')


<h1>Mi Perfil</h1>

	<div class="container">
		<div class="card">
            <div class="card-body">
                
                <form method="POST" class="confirmar" action="{{ route('users.upMyacount', $user->id) }}" id="edit-user-form">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}:</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" id="phone_number" max="9999999999" name="phone_number" value="{{ $user->phone_number }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="identification_type" class="col-md-4 col-form-label text-md-right">{{ __('Identification Type') }}:</label>
                        <div class="col-md-6">
                            <select id="identification_type" class="form-control @error('identification_type') is-invalid @enderror" name="identification_type" required autofocus>
                                <option value="">Seleccione un tipo de identificación</option>
                                <option value="cedula de ciudadania" {{ $user->identification_type == 'cedula de ciudadania' ? 'selected' : '' }}>Cédula de ciudadanía</option>
                                <option value="cedula de extranjeria" {{ $user->identification_type == 'cedula de extranjeria' ? 'selected' : '' }}>Cédula de extranjería</option>
                                <option value="pasaporte" {{ $user->identification_type == 'pasaporte' ? 'selected' : '' }}>Pasaporte</option>
                                <option value="tarjeta de identidad" {{ $user->identification_type == 'tarjeta de identidad' ? 'selected' : '' }}>Tarjeta de identidad</option>
                            </select>
                            @error('identification_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="identification_number" class="col-md-4 col-form-label text-md-right">{{ __('Identification Number') }}:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="identification_number" name="identification_number" value="{{ $user->identification_number }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}:</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}:</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" id="age" max="100" name="age" value="{{ $user->age }}">
                        </div>
                    </div>



                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success btn-sm rounded-pill" ><i class="fa fa-save"> </i> {{ __('Update') }}</button>
                            <a type="submit" href="{{ route('users.showPassword',$user->id) }}" class="btn btn-info btn-sm rounded-pill" ><i class="fa fa-edit"> </i> {{ __('Change Password') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

	</div>
</body>
</html>

@endsection

@section('js')

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
                title: 'Usuario actualizado'
            })
        }
        @endif
    $('.confirmar').submit(function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Desea Actualizar El Usuario?',
            showDenyButton: true,
            confirmButtonText: 'Actualizar',
            denyButtonText: `Cancelar`,
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            } else if (result.isDenied) {
                Swal.fire('No Se Actualizo El Usuario', '', 'info')
            }
        })
    })
</script>


@endsection

@section('styles')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    
    
    
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
            font-family: "Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";

            
		}
        body {
			background-color: #FFFFFF;
		}
        
        .container {
          max-width: 800px;
          height: 590px;
          margin: 0 auto;
          padding: 20px;
          background: #FFE1C5 !important;
          margin-top: 30px;
          margin-bottom: 30px;
          border-radius: 12px;
          display: flex;
          flex-direction: column;
          align-items: center;
       }

        h1 {
          margin-top: 10px;
          font-size: 32px;
          font-weight: 500;
          margin-bottom: 10px;
          color: #333;
          text-align: center;
        }

        .card {
          border: none;
          box-shadow: 0 0 5px rgba(0,0,0,0.3);
          border-radius: 10px;
          background: #FFFFFF;
          width: 100%;
          margin-top: 20px;
          height:600px;
          margin-bottom: 30px;
          display: flex;
          justify-content: center;
          align-items: center;
        }

        .card-body {
          padding: 0 50px;
        }

        .form {
          width: 100%;
          height: 100%; 
          box-sizing: border-box;
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          
        }

        .form-group {
          display: flex;
          justify-content:  column;
          margin-bottom: 16px;
          align-items: center;
          margin-right: 90px;
        }

        label {
          width: 40%;
          text-align: right;
          font-weight: bold;
  
        }

        input{
          width: 150%;
          padding: 7px;
          font-size: 16px;
          border-radius: 4px;
          border: 1px solid #ccc;
          box-shadow: inet 0 2px 2px rgba(0,0,0,0.1);
          margin-left: 30px;
        }
        select {
          width: 110%;
          padding: 7px;
          font-size: 16px;
          border-radius: 4px;
          border: 1px solid #ccc;
          box-shadow: inet 0 2px 2px rgba(0,0,0,0.1);
          margin-left: 43px;
        }

        .btn {
          border-radius: 20px;
          font-size: 16px;
          font-weight: bold;
          padding: 7px 10px;
          margin-top: 5px;
          cursor: pointer;
          margin-left: 160px;
        }

        .btn-success {
          background-color: #28a745 ;
          color: white;
          border: none;
          border-color: #28a745;
        }

        .btn-info {
          background-color: #007bff ;
          color: white;
          border: none;
          border-color: #007bff;
          text-decoration: none;
        }
        .btn-success {
          margin-right: 10px;
        }
        .btn-info{
            margin-left: 10px;
        }

       


/* Ajustes responsivos */
/*@media screen and (max-width: 768px) {
  .container {
    max-width: 90%;
    margin-top: 3%;
    margin-bottom: 3%;
    height: auto;
  }
  
  .card {
    height: auto;
    margin-top: 5%;
    margin-bottom: 5%;
  }
  
  .form-group {
    display: flex;
    flex-direction: column;
    margin-right: 0;
    margin-bottom: 2%;
    text-align: center;
  }
  
  label {
    width: 100%;
    margin-bottom: 2%;
    text-align: center;
  }
  
  input, .select {
    width: 100%;
    margin-right: 0;
    margin-bottom: 2%;
  }
  
  .btn {
    margin-left: 0;
    margin-top: 5%;
    margin-bottom: 5%;
  }
  
  .btn-success, .btn-info {
    margin: 0;
    margin-bottom: 2%;
    width: 100%;
    margin-top: 4%;
  }
}*/


</style>

@endsection
