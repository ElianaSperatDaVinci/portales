<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function all()
    {
        $usuarios = User::with('role')->get();

        return view('users.index', [
            'usuarios' => $usuarios, 
        ]);
    }

    public function view(int $id)
    {
        $usuario = User::with('role', 'reservas.disco')->findOrFail($id);
        // $usuario = User::FindOrFail($id);

        return view('users.view', [
            'usuario' => $usuario,
            'roles' => Role::all()
        ]);
    }

    public function createForm()
    {
        return view('users.create-form', [
            'usuario' => User::all(),
            'roles' => Role::all()
        ]);
    }

    public function createProcess(Request $request)
    {

        //$request->validate($this->validationRules, $this->validationMessages);

        $input = $request->only(['name', 'email', 'password' , 'role_fk']);

        try {

            DB::beginTransaction();

            $usuario = User::create($input);
            
            DB::commit();

            return redirect()
                ->route('users.index')
                ->with('feedback.message', 'El usuario ' . e($input['name']) . ' fue creado.');

        } catch (\Exception $e) {

            DB::rollback();

            throw $e;

            return redirect()
                ->back(fallback: route('users.create.form'))
                ->with('feedback.message', 'Ocurrió un error al crear el usuario.');

        }
    }

    public function editForm(int $id)
    {
        return view('users.edit-form', [
            'usuario' => User::findOrFail($id),
            'roles' => Role::all(),
        ]);
    }

    public function editProcess(int $id, Request $request)
    {
        $usuario = User::findOrFail($id);

        // $request->validate($this->validationRules, $this->validationMessages);

        $input = $request->only('name', 'email', 'role_fk');

        $usuario->update($input);
        
        return redirect()
            ->route('users.index')
            ->with('feedback.message', 'El usuario fue modificado');
    }
}
