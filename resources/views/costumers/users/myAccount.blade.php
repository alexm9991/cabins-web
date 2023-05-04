@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
<h1>Perfil</h1>
@stop

@section('content')
<!DOCTYPE html>
<html>
<head>

	<!DOCTYPE html>
<html>
<head>
	<title>Perfil de Usuario</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;

		}

		body {
			background-color: #f8f8f8;
		}

		.container {
			display: flex;
			flex-direction: column;
			align-items: left;
			margin: 40px auto;
			max-width: 800px;
			background-color: #dcdcdc;
			box-shadow: 0 2px 4px rgba(0,0,0,.3);
			padding: 30px;
			border-radius: 10px;
		}

		.profile-picture {
			width: 200px;
			height: 200px;
			border-radius: 50%;
			object-fit: cover;
			box-shadow: 0 2px 4px rgba(0,0,0,.3);
			margin-bottom: 30px;
		}

		h1 {
			font-size: 32px;
			font-weight: 500;
			margin-bottom: 10px;
			color: #333;
			text-align: center;
		}

		h2 {
			font-size: 24px;
			font-weight: 400;
			margin-bottom: 20px;
			color: #666;
			text-align: center;
		}

		.info {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-bottom: 30px;
			color: #999;
			font-size: 18px;
			text-align: left;
		}

		.info span {
			color: #333;
			font-weight: 500;
			margin-left: 5px;
		}

		.social {
			display: flex;
			justify-content: center;
			margin-bottom: 30px;
		}

		.social a {
			display: flex;
			justify-content: center;
			align-items: center;
			background-color: #333;
			color: #fff;
			border-radius: 50%;
			width: 40px;
			height: 40px;
			margin: 0 10px;
			font-size: 18px;
			text-decoration: none;
			transition: background-color .3s;
		}

		.social a:hover {
			background-color: #666;
		}



		.skills {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			margin-bottom: 30px;
		}

		.skill {
			display: flex;
			align-items: center;
			background-color: #f2f2f2;
			color: #666;
			padding: 5px 10px;
			border-radius
        }
</style>
</head>
<body>

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
                            <button type="submit" class="btn btn-success btn-sm rounded-pill" ><i class="fas fa-save "> </i> {{ __('Update') }}</button>
                            <a type="submit" href="{{ route('users.showPassword',$user->id) }}" class="btn btn-info btn-sm rounded-pill" ><i class="fas fa-edit"> </i> {{ __('Change Password') }}</a>
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
