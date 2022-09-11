<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Theater;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    public function store(Request $request)
    {
        try{

           $code = $this->code(15);
           $seats = $request->input('seat');

        foreach ($seats as $key => $seat)
        {
            Reservation::create([
                'code'      =>$code,
                'seat'      =>$seats[$key],
                'theater_id'=>$request->input('theater_id'),
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function code($longitud) {

        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern)-1;

        for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};

        return 'cod_'.$key;
    }
}
