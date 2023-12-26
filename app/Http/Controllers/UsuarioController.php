<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    //
    public function profile()
    {
        return view ('profile');
    }

    public function changePassword()
    {
        return view ('changePassword');
    }
}
