<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
        $users = User::paginate(15);

        return view('user.index')->with(compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        try{

            User::create($request->all());

            return back()->with('notification','Registro creado correctamente');

        } catch (Exception $e) {

            return back()->with('error', $e->getMessage());;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $user = User::findOrFail($id);

            return view('user.show')->with(compact('user'));

        } catch (Exception $e) {

            return back()->with('error', $e->getMessage());;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{

            $user = User::findOrFail($id);

            return view('user.edit')->with(compact('user'));

        } catch (Exception $e) {

            return back()->with('error', $e->getMessage());;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserRequest $request, $id)
    {
        try{
            $user = User::findOrFail($id);
            $user->update($request->all());

            return back()->with('notification','Registro actualizado correctamente');

        } catch (Exception $e) {

            return back()->with('error', $e->getMessage());;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $user = User::findOrFail($id);
            $user->delete();

            return back()->with('notification','registro eliminado correctamente');

        } catch (Exception $e) {

            return back()->with('error', $e->getMessage());;
        }
    }

    public function active($id){

        $user = User::findOrFail($id);
        $user->update(['discharge_date'=>NULL]);

        return back()->with('notification','registro activado correctamente');
    }
}
