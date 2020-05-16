<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('usuarios.index', ['users' => $users]);
    }

    public function create()
    {
        return view('usuarios.create');
    }
    public function store(Request $request)
    {
        $usuario = new User();
        $usuario->name = request('name');
        $usuario->email = request('email');
        $usuario->password = request('password');

        $usuario->save();
        return redirect('/usuarios');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        return view('usuarios.edit', ['user' => User::FindOrFail($id)]);
    }
    public function update(UserFormRequest $request, $id)
    {
        $usuario = User::FindOrFail($id);

        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email'); //hace el request para haga el update pero al pasar a UserFormRequest no existe su regla ya que se hace en el controlador

        $this->validate($request, [
            'email' => 'unique:users,email,' . $usuario->id
        ]);

        $usuario->update();
        return redirect('/usuarios');
    }
    public function destroy($id)
    {
        //
    }
}
