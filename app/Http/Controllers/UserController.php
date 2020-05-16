<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use Illuminate\Http\Request;
use App\User;
use Facade\Ignition\QueryRecorder\Query;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {

        if ($request) {
            $query = trim($request->get('search'));
            $users = User::where('name', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'asc')
                ->get();

            return view('usuarios.index', ['users' => $users, 'search' => $query]);
        }
        //      $users = User::all();
        //    return view('usuarios.index', ['users' => $users]);
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
        return view('usuarios.show', ['user' => User::FindOrFail($id)]);
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
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect('/usuarios');
    }
}
