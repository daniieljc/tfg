<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserExtra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function home()
    {
        return view('dashboard.index');
    }

    public function ofertas()
    {
        return view('dashboard.ofertas');
    }

    public function cuenta()
    {
        $infoE = UserExtra::where('user_id', Auth::user()->id)->first();
        return view('dashboard.ajustes', ['infoE' => $infoE]);
    }

    public function cuentaP(Request $request)
    {
        User::where('id', Auth::user()->id)->update(array('nombre' => $request->nombre, 'apellidos' => $request->apellidos, 'email' => $request->email));
        return redirect('dasboard/ajustes');
    }
}
