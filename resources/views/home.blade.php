@extends('layouts.app_system')

@section('content_sys')
    <div class="card-header bg-dark text-white my-2 shadow rounded">Dashboard</div>
    <div class="row">
        <div class="col">
            <table class="table table-dark table-striped caption-top">
                <caption>Listado de Funciones</caption>
                <thead>
                  <tr>
                    <th scope="col">Función</th>
                    <th scope="col">Fecha de Inicio</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($theaters as $th )
                    <tr>
                        <td>{{$th->name}}</td>
                        <td>{{$th->created_at}}</td>
                        <td>
                            <a href="" class="btn btn-info">Ver</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection
