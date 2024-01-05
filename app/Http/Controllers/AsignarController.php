<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AsignarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();

        return view('administrador.permisos.listUser', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::find($id);

        $roles = Role::all();

        return view('administrador.roles.userRol', compact('user', 'roles'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $user = User::find($id);

        //vendedor 2
        //repartidor 3

        $user->roles()->sync($request->roles);
        //Cambiar el rol del modelo usuario
        if ($request->roles[0] == 1) {
            $user->rol = 'Administrador';
        }elseif ($request->roles[0] == 2) {
            $user->rol = 'Vendedor';
        }elseif ($request->roles[0] == 3) {
            $user->rol = 'Repartidor';
        }elseif ($request->roles[0] == 4) {
            $user->rol = 'Cliente';
        }else{
            $user->rol = 'Cliente';
        }



        $user->save();

        return redirect()->route('asignar.edit', $user);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
