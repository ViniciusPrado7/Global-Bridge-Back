<?php

namespace App\Http\Controllers;

use App\Models\UserName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserNameController extends Controller
{
    public function index()
    {
        $usernames = UserName::all();
        return response()->json($usernames, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome'=> 'required|string',
            'email'=> 'required|email|unique:user_names,email',
            'tipo_usuario' => 'required|in:admin,funcionario',
            'senha' => 'required|string|min:6',
            'data_nascimento' => 'required|date'
        ]);

        

        $user = UserName::create($validated);

        return response()->json($user, 201);
    }

    public function update(Request $request, UserName $userName)
{
    $validated = $request->validate([
        'nome' => 'required|string',
        'email' => [
            'required',
            'email',
            Rule::unique('user_names', 'email')->ignore($userName->id),
        ],
        'tipo_usuario' => 'required|in:admin,funcionario',
        'senha' => 'nullable|string|min:6',
    ]);

        $userName->update($validated);

        return response()->json($userName, 200);
    }

    public function destroy(UserName $userName)
    {
        $userName->delete();

        return response()->json([
            'message' => 'Usuário deletado com sucesso!'
        ], 200);
    }
}