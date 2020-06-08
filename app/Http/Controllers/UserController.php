<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserFormRequest;
use App\Role;

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
                ->paginate(10);
            return view('usuarios.index', ['users' => $users, 'search' => $query]);
        }
    }

    public function create()
    {
        $roles = Role::all(); //se importa el modelo
        return view('usuarios.create', ['roles' => $roles]);
    }


    public function store(UserFormRequest $request)
    {
        $usuario = new User();

        $usuario->name = request('name');
        $usuario->email = request('email');

        if ($request->hasFile('imagen')) {
            $file = $request->imagen;
            $file->move(public_path() . '/imagenes', $file->getClientOriginalName());
            $usuario->imagen = $file->getClientOriginalName();
        }

        $this->validate($request, [
            'email' => 'unique:users,email,' . $usuario->id
        ]);

        $usuario->password = bcrypt(request('password'));

        $usuario->save();
        $usuario->asignarRol($request->get('role'));

        return redirect('/usuarios');
    }


    public function show($id)
    {
        return view('usuarios.show', ['user' => User::findOrFail($id)]);
    }


    public function edit($id)
    {
        return view('usuarios.edit', ['user' => User::findOrFail($id)]);
    }


    public function update(UserFormRequest $request, $id)
    {
        $usuario = User::findOrFail($id);

        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');

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
