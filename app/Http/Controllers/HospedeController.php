<?php

namespace App\Http\Controllers;

use App\Models\Hospede;
use Illuminate\Http\Request;

class HospedeController extends Controller
{
    public function index() 
    { 
        return Hospede::orderBy('nome')->get(); 
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'documento' => 'required|string|max:30|unique:hospedes,documento',
            'telefone' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:255',
        ]);
        return response()->json(Hospede::create($dados), 201);
    }

    public function show(Hospede $hospede) 
    { 
        return $hospede; 
    }

    public function update(Request $request, Hospede $hospede)
    {
        $dados = $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'documento' => 'sometimes|required|string|max:30|unique:hospedes,documento,' . $hospede->id,
            'telefone' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:255',
        ]);
        $hospede->update($dados);
        return $hospede;
    }

    public function destroy(Hospede $hospede)
    {
        $hospede->delete();
        return response()->noContent();
    }
}