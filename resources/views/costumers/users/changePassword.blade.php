@extends('adminlte::page')

@section('title', 'Change Password')

@section('content_header')
    <h1>{{ __('Change_Password') }}</h1>
@stop
@section('content')
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
            box-shadow: 0 2px 4px rgba(0, 0, 0, .3);
            padding: 30px;
            border-radius: 10px;
        }

        .profile-picture {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .3);
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
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title"></h3>
                            </div>

                            <form method="POST" action="{{ route('password.update') }}">

                                @csrf
                                <div class="box-body">

                                    <div class="form-group row">
                                        <label for="current_password">{{ __('Current_Password') }}</label>
                                        <input type="password" name="current_password" class="form-control"
                                            id="current_password" required>
                                    </div>

                                    <div class="form-group row">
                                        <label for="new_password">{{ __('New_Password') }}</label>
                                        <input type="password"  name="new_password" class="form-control" pattern=".{8,}"  id="new_password"
                                            required>
                                    </div>

                                    <div class="form-group row">
                                        <label for="new_password_confirmation">{{ __('Confirm') }}
                                            {{ __('New_Password') }}</label>
                                        <input type="password"  name="new_password_confirmation" pattern=".{8,}"  class="form-control"
                                            id="new_password_confirmation" required>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-success rounded-pill"><i class="fas fa-edit">{{ __('Change_Password') }}</i></button>
                                    <a type="submit" href="{{ route('users.userInfo') }}" class="btn btn-primary rounded-pill"><i class="fas fa-undo-alt"></i> {{ __('Return') }}</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
<script>
function validar() {
    var campo = document.getElementById("new_password").value;
    if (campo.length < 8) {
      alert("El campo debe tener al menos 8 caracteres");
      return false;
    }
    return true;
  }
</script>

<script>
@if(session('success')) {
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
                title: 'contraseña actualizada'
            })
        }
        @endif
</script>
@endsection