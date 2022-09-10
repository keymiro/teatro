@extends('layouts.app_system')

@section('content_sys')
<div class="card-header shadow rounded bg-dark text-white">
    Creación de Socio
</div>
<div class="container">
    <form class="row g-3 my-4" method="POST" action="{{route('users.store')}}">
        @csrf
        <div class="col-md-6">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" name="dni" class="form-control" id="dni" required>
        </div>
        <div class="col-md-6">
            <label for="first_name" class="form-label">Nombres</label>
            <input type="text" name="first_name" class="form-control" id="first_name" required>
        </div>
        <div class="col-md-6">
          <label for="last_name" class="form-label">Apellidos</label>
          <input type="text" name="last_name" class="form-control" id="last_name" required>
        </div>
        <div class="col-md-6">
          <label for="email" class="form-label">Email</label>
          <input type="text" name="email" class="form-control" id="email" required>
        </div>
        <div class="col-md-6">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
</div>
@endsection
