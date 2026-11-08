<?php

namespace App\Http\Controllers;

use App\Models\Quarto;
use Illuminate\Http\Request;

class QuartoController extends Controller
{
    public function index(Request $request)
    {
        $query = Quarto::with('propriedade');
        if ($request->filled('propriedade_id')) {
            $query->where('propriedade_id', $request->propriedade_id);
        }
        return $query->get();
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'propriedade_id' => 'required|exists:propriedades,id',
            'tipo' => 'required|string|max:100',
            'capacidade' => 'required|integer|min:1',
            'tarifa_base' => 'required|numeric|min:0',
        ]);
        return response()->json(Quarto::create($dados), 201);
    }

    public function show(Quarto $quarto) 
    { 
        return $quarto->load('propriedade'); 
    }

    public function update(Request $request, Quarto $quarto)
    {
        $dados = $request->validate([
            'propriedade_id' => 'sometimes|required|exists:propriedades,id',
            'tipo' => 'sometimes|required|string|max:100',
            'capacidade' => 'sometimes|required|integer|min:1',
            'tarifa_base' => 'sometimes|required|numeric|min:0',
        ]);
        $quarto->update($dados);
        return $quarto;
    }

    public function destroy(Quarto $quarto)
    {
        $quarto->delete();
        return response()->noContent();
    }
}