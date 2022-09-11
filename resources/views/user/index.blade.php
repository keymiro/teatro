@extends('layouts.app_system')

@section('content_sys')
    <div class="card-header bg-dark text-white my-2 shadow rounded">Listado de Socios</div>
    <div class="row">
        <div class="col">
            <table class="table table-dark table-striped caption-top">
                <caption>Listado de Socios</caption>
                <thead>
                  <tr>
                    <th scope="col">DNI</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Email</th>
                    <th scope="col">Fecha Inactivación</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $u )
                    <tr>
                        <td>{{$u->dni}}</td>
                        <td>{{$u->first_name}}</td>
                        <td>{{$u->last_name}}</td>
                        <td>{{$u->email}}</td>
                        <td>{{$u->discharge_date}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{route('users.edit',$u->id)}}" class="btn btn-success">Editar</a>
                                <a href="{{route('users.show',$u->id)}}" class="btn btn-info">Detalles</a>
                                <form  action="{{route('users.destroy',$u->id)}}" method="post">
                                @csrf @method('DELETE')
                                    <button class="btn btn-danger" onclick="return confirm('Estás seguro que desea eliminar el registro?');">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              {{ $users->links() }}
        </div>
    </div>
@endsection
