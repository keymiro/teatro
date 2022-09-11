@extends('layouts.app_system')

@section('content_sys')
    <div class="card-header bg-dark text-white my-2 shadow rounded">Listado de Butacas</div>
    <div class="row">
        <div class="col">
            <button class="btn btn-outline-primary" disabled><i class="fa-solid fa-user"></i> Libre</button>
            <button class="btn btn-primary" disabled><i class="fa-solid fa-user"></i> Ocupado</button>
            <div class="table-responsive">
                <form action="{{route('reservations.store')}}" method="POST">
                    @csrf
                    <table class="table table-dark table-striped table-bordered  caption-top shadow">
                            <caption>Butacas</caption>
                        <thead>
                            <tr>
                                <th colspan="{{$theater->column}}" class="table-primary"><h4 class="text-center">Escenario</h4></th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= $theater->row; $i++)
                                <tr>
                                    @for ($j = 1; $j <= $theater->column; $j++)
                                    <td>
                                        <input type="hidden" name="theater_id" value="{{$theater->id}}">
                                        <div class="form-check">

                                            {{$checkedDisabled = ''}}

                                            @foreach ($reservatios as $r )

                                                @if ($r->seat==$i.'-'.$j)

                                                    @php($checkedDisabled = 'checked disabled')

                                                @endif

                                            @endforeach

                                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                <input type="checkbox" class="btn-check" id="btncheck{{$i.$j}}" autocomplete="off" {{$checkedDisabled}} value="{{$i}}-{{$j}}" name="seat[]">
                                                <label class="btn btn-outline-primary btn-sm" for="btncheck{{$i.$j}}">
                                                    <i class="fa-solid fa-user"></i> {{$i}}-{{$j}}
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    @endfor
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                <button type="submit" class="btn btn-primary">Guardar reserva</button>
            </form>
            </div>
        </div>
    </div>
@endsection
