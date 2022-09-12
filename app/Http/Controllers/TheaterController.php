<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Exception;
use App\Models\Theater;
use Illuminate\Http\Request;

class TheaterController extends Controller
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
    public function index($id)
    {
        try{

            $theater = Theater::findOrFail($id);
            $reservations = Reservation::where('theater_id',$id)->get();

            return view('theater.index')->with(compact('theater','reservations'));

        } catch (Exception $e) {

            return back()->with('error', $e->getMessage());;
        }
    }
}
