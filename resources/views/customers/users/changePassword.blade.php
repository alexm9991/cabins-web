@extends('layouts.app')

@section('title', 'Cambiar contraseña')


@section('content')
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
          height: 400px;
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
          height:500px;
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

        .btn-primary {
          background-color: #007bff ;
          color: white;
          border: none;
          border-color: #007bff;
          text-decoration: none;
        }
        .btn-success {
          margin-right: 10px;
        }
        .btn-primary{
          margin-left: 10px;
        }
    </style>
    <h1>{{ __('Change Password') }}</h1>

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
                                        <label for="current_password">{{ __('Current Password') }}</label>
                                        <input type="password" name="current_password" class="form-control"
                                            id="current_password" required>
                                    </div>

                                    <div class="form-group row">
                                        <label for="new_password">{{ __('New Password') }}</label>
                                        <input type="password"  name="new_password" class="form-control" pattern=".{8,}"  id="new_password"
                                            required>
                                    </div>

                                    <div class="form-group row">
                                        <label for="new_password_confirmation">{{ __('Confirm') }}
                                        {{ __('New Password') }}</label>
                                        <input type="password"  name="new_password_confirmation" pattern=".{8,}"  class="form-control"
                                            id="new_password_confirmation" required>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-success rounded-pill"><i class="fa fa-edit"></i>{{ __('Change Password') }}</button>
                                    <a type="submit" href="{{ route('users.userInfo') }}" class="btn btn-primary rounded-pill"><i class="fasfa-undo-alt"></i> {{ __('Return') }}</a>
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
