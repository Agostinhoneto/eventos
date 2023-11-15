<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assentos;

class AssentoController extends Controller
{
    // Método para exibir todos os assentos
    public function index()
    {
        $assentos = Assentos::all();
        return response()->json($assentos);
    }

    // Método para exibir um assento específico
    public function show($id)
    {
        $assento = Assentos::find($id);

        if (!$assento) {
            return response()->json(['message' => 'Assento não encontrado'], 404);
        }

        return response()->json($assento);
    }

    // Método para criar um novo assento
    public function store(Request $request)
    {
        $request->validate([
            'evento_id' => 'required|exists:eventos,id',
            'numero' => 'required|string',
            // Adicione outras validações conforme necessário
        ]);

        $assento = Assentos::create($request->all());

        return response()->json($assento, 201);
    }

    // Método para atualizar um assento existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'evento_id' => 'required|exists:eventos,id',
            'numero' => 'required|string',
            // Adicione outras validações conforme necessário
        ]);

        $assento = Assentos::find($id);

        if (!$assento) {
            return response()->json(['message' => 'Assento não encontrado'], 404);
        }

        $assento->update($request->all());

        return response()->json($assento);
    }

    // Método para excluir um assento
    public function destroy($id)
    {
        $assento = Assentos::find($id);

        if (!$assento) {
            return response()->json(['message' => 'Assento não encontrado'], 404);
        }

        $assento->delete();

        return response()->json(['message' => 'Assento excluído com sucesso']);
    }
}
