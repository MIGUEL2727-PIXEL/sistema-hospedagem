<?php

namespace App\Http\Controllers;

use App\Models\Propriedade;
use Illuminate\Http\Request;

class PropriedadeController extends Controller
{
    public function index() 
    { 
        return Propriedade::withCount('quartos')->get(); 
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
        ]);
        return response()->json(Propriedade::create($dados), 201);
    }

    public function show(Propriedade $propriedade) 
    { 
        return $propriedade->load('quartos'); 
    }

    public function update(Request $request, Propriedade $propriedade)
    {
        $dados = $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'endereco' => 'sometimes|required|string|max:255',
        ]);
        $propriedade->update($dados);
        return $propriedade;
    }

    public function destroy(Propriedade $propriedade)
    {
        $propriedade->delete();
        return response()->noContent();
    }
}