@extends('layouts.app_system')

@section('content_sys')
    <div class="card-header bg-dark text-white my-2 shadow rounded">Listado de Butacas</div>
    <div class="row">
        <div class="col">
            <div class="text-center">
                <button class="btn btn-dark" disabled><i class="fa-solid fa-ticket"></i> Código Reserva: {{$reservations[0]->code}}</button>
                <button class="btn btn-outline-secondary" disabled><i class="fa-solid fa-user"></i> Libre</button>
                <button class="btn btn-primary" disabled><i class="fa-solid fa-user"></i> Ocupado</button>
                <button class="btn btn-success" disabled><i class="fa-solid fa-user"></i> Mis butacas</button>
            </div>
            <div class="alert alert-info alert-dismissible fade show my-2" role="alert">
                <strong>Para reservar una butaca dar click sobre los recuadros sin relleno de color, tenga en cuenta que aquí vera sus butacas por reserva</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="table-responsive">
                <form action="{{route('reservations.update',$reservations[0]->code)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <table class="table table-info table-striped table-bordered  caption-top shadow">
                            <caption>Butacas</caption>
                        <thead>
                            <tr>
                                <th colspan="{{$reservations[0]->theater->column}}" class="bg bg-success text-white"><h4 class="text-center">Escenario</h4></th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= $reservations[0]->theater->row; $i++)
                                <tr>
                                    @for ($j = 1; $j <= $reservations[0]->theater->column; $j++)
                                    <td>
                                        <input type="hidden" name="theater_id" value="{{$reservations[0]->theater->id}}">
                                        <input type="hidden" name="code" value="{{$reservations[0]->code}}">
                                        <div class="form-check">

                                            @php($checkedDisabled = '')
                                            @php($btnColor = 'btn-outline-secondary')

                                            @foreach ($otherSeats as $o )

                                                @if ($o->seat==$i.'-'.$j)

                                                    @php($btnColor = 'btn-outline-primary')
                                                    @php($checkedDisabled = 'checked disabled')

                                                @endif

                                            @endforeach

                                            @foreach ($reservations as $r )

                                                @if ($r->seat==$i.'-'.$j &&  Auth::user()->id == $r->user_id)

                                                        @php($btnColor = 'btn-outline-success')
                                                        @php($checkedDisabled = 'checked')

                                                @elseif ($r->seat==$i.'-'.$j)

                                                        @php($btnColor = 'btn-outline-primary')
                                                        @php($checkedDisabled = 'checked disabled')
                                                @endif

                                            @endforeach

                                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                <input type="checkbox" class="btn-check" id="btncheck{{$i.$j}}" autocomplete="off" {{$checkedDisabled}} value="{{$i}}-{{$j}}" name="seat[]">
                                                <label class="btn {{$btnColor}} btn-sm" for="btncheck{{$i.$j}}">
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
                <button type="submit" class="btn btn-primary">Actulizar reserva</button>
            </form>
            </div>
        </div>
    </div>
@endsection
