<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notas;


class NotasController extends Controller
{
    public function index()
    {
        return view('notas.todas.index', ['notas' => Notas::all()]);
    }

    public function store(Request $request)
    {
        $nota = new Notas();
        $nota->titulo = request('titulo');
        $nota->texto = request('texto');
        $nota->user_id = auth()->id();

        $nota->save();

        return redirect('notas/todas');
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
