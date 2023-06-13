<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro PQRS</title>
  <link rel="stylesheet" href="{{ asset('css/pqrs/createpqrs.css') }}">
  <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>

<body>
  <header>
    @include('layouts.nav')
  </header>
  <div class="PQRS-cont">
    <h1 id="title_1" class="title">PQRS</h1>
    <h3 class="title">Peticiones - Quejas - Reclamos - Sugerencias</h4>
      <div class="container">
        <h2>Registro PQRS</h2>
        <div class="container_form">
          <form class="formulario-send_request" action="{{ Route('pqrs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="reserva">{{ __('Name') }}:</label>
              <input class="p-3 mb-2 bg-white text-dark" style="border: none;outline: none;border-bottom: 2px solid #FFA559;" required maxlength="45" type="text" id="name_user" name="name_user" placeholder="Digite su nombre" oninput="this.value = this.value.replace(/[^a-zA-Z- -]/,'')" required>
            </div>
            <div class="form-group">
              <label for="reserva">{{ __('Phone Number') }}:</label>
              <input class="p-3 mb-2 bg-white text-dark" style="border: none;outline: none;border-bottom: 2px solid #FFA559;" required maxlength="10" type="text" id="phone_user" name="phone_user" placeholder="Digite su teléfono" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
            </div>
            <div class="form-group">
              <label for="asunto">{{ __('Bookings code') }}:</label>
              <input class="p-3 mb-2 bg-white text-dark" style="border: none;outline: none;border-bottom: 2px solid #FFA559;" required maxlength="10" type="text" id="bookings_code" name="bookings_code" placeholder="Digite el código de su reserva" oninput="this.value = this.value.toUpperCase().replace(/[^A-Z- 0-9]/,'')" required>
            </div>
            <div class="form-group">
              <label for="asunto">{{ __('Type') }}:</label>
              <select style="border-radius:10px;margin: 0% 0% 0% 1%;" class="btn btn-light" aria-label="Default select example" name="type" required>
                <option value="">--Seleccione una opción--</option>
                <option value="{{ __('QUESTION') }}">{{ __('QUESTION') }}</option>
                <option value="{{ __('COMPLAINT') }}">{{ __('COMPLAINT') }}</option>
                <option value="{{ __('SUGGESTION') }}">{{ __('SUGGESTION') }}</option>
                <option value="{{ __('CLAIM') }}">{{ __('CLAIM') }}</option>
              </select>
            </div>
            <div class="form-group">
              <label for="asunto">{{ __('Reason') }}:</label>
              <select style="border-radius:10px;margin: 0% 0% 0% 1%;" class="btn btn-light" aria-label="Default select example" name="reason" required>
                <option value="">--Seleccione una opción--</option>
                <option value="{{ __('CABINS CLEAN') }}">{{ __('CABINS CLEAN') }}</option>
                <option value="{{ __('POOL CLEAN') }}">{{ __('POOL CLEAN') }}</option>
                <option value="{{ __('FEEDING') }}">{{ __('FEEDING') }}</option>
                <option value="{{ __('NOISE') }}">{{ __('NOISE') }}</option>
              </select>
            </div>
            <div class="form-group">
              <label for="mensaje">{{ __('Message') }}:</label>
              <textarea required type="textarea" id="description" name="description" placeholder="Escriba su petición, queja, reclamo o sugerencia" id="description" required></textarea>
            </div>

            <!-- inicio -->
            <div class="form-group">
              <label>{{ __('Evidence') }}:</label>
              <input style="border-radius:10px" type="file" name="evidence" id="evidence" accept=".pdf" class="form-control" readonly>
              <span id="error-message" style="color: red; display: none;">El archivo seleccionado no es un PDF válido.</span>
            </div>
<!-- fin -->

            <button type="submit" class="btn btn-success" style="display: block;margin: 0 auto;"><i class="fas fa-save "></i> {{ __('Send request') }}</button>
          </form>
        </div>
      </div>
  </div>
  @include('layouts.footer')
</body>

</html>

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- inicio -->
<script>
  document.getElementById('evidence').addEventListener('change', function() {
    var fileInput = this;
    var errorMessage = document.getElementById('error-message');

    if (fileInput.files && fileInput.files.length > 0) {
      var file = fileInput.files[0];
      var extension = file.name.split('.').pop().toLowerCase();

      if (extension !== 'pdf') {
        errorMessage.style.display = 'block';
        fileInput.value = '';
      } else {
        errorMessage.style.display = 'none';
      }
    }
  });
</script>

<script>
  window.addEventListener('DOMContentLoaded', function() {
    var form = document.querySelector('.formulario-send_request');
    var formFields = form.querySelectorAll('input, select, textarea');

    if (localStorage.getItem('formCache')) {
      var formCache = JSON.parse(localStorage.getItem('formCache'));

      for (var i = 0; i < formFields.length; i++) {
        var fieldName = formFields[i].name;
        if (formCache[fieldName]) {
          formFields[i].value = formCache[fieldName];
        }
      }
    }

    form.addEventListener('submit', function() {
      var formCache = {};

      for (var i = 0; i < formFields.length; i++) {
        var fieldName = formFields[i].name;
        var fieldValue = formFields[i].value;
        formCache[fieldName] = fieldValue;
      }

      localStorage.setItem('formCache', JSON.stringify(formCache));
    });
  });

  window.addEventListener('load', function() {
    localStorage.removeItem('formCache');
  });
</script>

@if(session('save')){
<script>
  var codigo = "{{ session('save') }}";
  Swal.fire({
    icon: 'success',
    title: 'PQRS creada!',
    text: 'Tú número de radicado es: ' + codigo,
    codigo,
    footer: 'Gracias por darnos tu opinión!'
  }).then(function() {
    document.querySelector('.formulario-send_request').reset();
    localStorage.removeItem('formCache');
  });
</script>
}
@endif
<!-- fin -->




@if(session('save')) {
<script>
  var codigo = "{{ session('save') }}";
  Swal.fire({
    icon: 'success',
    title: 'PQRS creada!',
    text: 'Tú número de radicado es: ' + codigo,
    codigo,
    footer: 'Gracias por darnos tu opinion!'
  })
</script>
}
@endif

@if(session('error')) {
<script>
  Swal.fire({
    icon: 'error',
    title: 'Lo siento!',
    text: 'Número de reserva no válido',
    footer: 'Intenta nuevamente'
  })
</script>
}
@endif
