<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return response()->json($user, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome'=> 'required|string',
            'email'=> 'required|email|unique:users,email',
            'tipo_usuario' => 'required|in:admin,funcionario',
            'senha' => 'required|string|min:6',
            'data_nascimento' => 'required|date'
        ]);


        $user = User::create($validated);

        return response()->json($user, 201);
    }

    public function update(Request $request, User $user)
{
    $validated = $request->validate([
        'nome' => 'required|string',
        'email' => [
            'required',
            'email',
            Rule::unique('users', 'email')->ignore($user->id),
        ],
        'tipo_usuario' => 'required|in:admin,funcionario',
        'senha' => 'nullable|string|min:6',
    ]);

        $user->update($validated);

        return response()->json($user, 200);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'message' => 'Usuário deletado com sucesso!'
        ], 200);
    }
}