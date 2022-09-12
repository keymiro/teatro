<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReservationRequest;
use Illuminate\Validation\Rules\Unique;

class ReservationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservation = Reservation::where('user_id',auth()->user()->id)->get();
        $reservations = $reservation->unique('code');

        return view('reservation.index')->with(compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationRequest $request)
    {
        try{

           $seats        = $request->input('seat');
           $theater_id   = $request->input('theater_id');
           $code         = $this->generateCode(5);
           $noRepeatSeat = $this->validationNoRepeatSeat($seats,$theater_id);

           if($noRepeatSeat){

                return back()->with('error', 'Las butacas: '.$noRepeatSeat.' ya estan reservadas');
           }

            foreach ($seats as $key => $seat)
            {
                Reservation::create([
                    'code'      =>$code,
                    'seat'      =>$seats[$key],
                    'theater_id'=>$theater_id,
                    'user_id'   =>auth()->user()->id,
                ]);
            }

            return back()->with('notification', 'Registro guardado correctamente');

        } catch (Exception $e) {

            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{

             $reservations = Reservation::where('code',$id)->get();
             $otherSeats = Reservation::where('code','!=',$id)->where('theater_id',$reservations[0]->theater_id)->get();

            return view('reservation.edit')->with(compact('reservations','otherSeats'));

        } catch (Exception $e) {

            return back()->with('error', $e->getMessage());;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(StoreReservationRequest $request,$id)
    {
        try{
            $this->destroy($request->input('code'));

            $seats        = $request->input('seat');
            $theater_id   = $request->input('theater_id');

            $noRepeatSeat = $this->validationNoRepeatSeat($seats,$theater_id);

           if($noRepeatSeat){

                return back()->with('error', 'Las butacas: '.$noRepeatSeat.' ya estan reservadas');
           }

            foreach ($seats as $key => $seat)
            {

                Reservation::create([
                    'code'      =>$request->input('code'),
                    'seat'      =>$seats[$key],
                    'theater_id'=>$theater_id,
                    'user_id'   =>auth()->user()->id,
                ]);
            }

            return back()->with('notification', 'Registro actualizado correctamente');

         } catch (Exception $e) {

             return back()->with('error', $e->getMessage());
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $user = Reservation::where('code',$id);
            $user->delete();

            return back()->with('notification','registro eliminado correctamente');

        } catch (Exception $e) {

            return back()->with('error', $e->getMessage());;
        }
    }

    /**
     * Genera un código ramdon sin repetirse para la reserva
     *
     */
    public function generateCode($longitud) {

        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern)-1;

        for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};

        return strtoupper('cod_'.$key);
    }

    /**
     * Valida que no puedan  repetir la misma butaca en una misma función
     *
     */
    public function validationNoRepeatSeat(array $seats,$theater_id){

        $seatRepeat = [];

        foreach ($seats as $key => $value) {
            $reservation = Reservation::where([
                                                ['theater_id', '=', $theater_id],
                                                ['seat', '=', $seats[$key]],
                                             ])->get();

                if (count($reservation)>0) {

                    $seatRepeat[] = $seats[$key];
                }
        }

        if (!empty($seatRepeat)) {

            return implode(", ", $seatRepeat);
        }

        return false;
    }
}
