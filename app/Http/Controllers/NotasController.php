<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notas;


class NotasController extends Controller
{
    public function todas()
    {

        return view('notas.todas', ['notas'=> Notas::all()]);
    }
    public function favoritas()
    {
        return view('notas.favoritas');
    }
    public function archivadas()
    {
        return view('notas.archivadas');
    }
}
