@extends('layouts.app_system')

@section('content_sys')
    <div class="card-header bg-dark text-white my-2 shadow rounded">Mis Reservaciones</div>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-dark table-striped caption-top shadow rounded">
                <caption>Listado de Reservaciones</caption>
                    <thead>
                    <tr>
                        <th scope="col">Código de Reserva</th>
                        <th scope="col">Teatro</th>
                        <th scope="col">Fecha de Reservación</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as  $r )
                        <tr>
                            <td>{{$r->code}}</td>
                            <td>{{$r->theater->name}}</td>
                            <td>{{$r->created_at}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('reservations.edit',$r->code)}}" class="btn btn-success">
                                        Editar
                                    </a>
                                    <form  action="{{route('reservations.destroy',$r->code)}}" method="post">
                                    @csrf @method('DELETE')
                                        <button class="btn btn-danger" onclick="return confirm('Se eliminara toda la reserva junto con las sillas, esta seguro de continuar ?');">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
