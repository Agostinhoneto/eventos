<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class EventoController extends Controller
{
    // Método para exibir todos os eventos
    public function index()
    {
        dd('090');
        $eventos = Evento::all();
        return response()->json($eventos);
    }

    // Método para exibir um evento específico
    public function show($id)
    {
        $evento = Evento::find($id);

        if (!$evento) {
            return response()->json(['message' => 'Evento não encontrado'], 404);
        }

        return response()->json($evento);
    }

    // Método para criar um novo evento
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'descricao' => 'required|string',
            'data' => 'required|date',
            // Adicione outras validações conforme necessário
        ]);

        $evento = Evento::create($request->all());

        return response()->json($evento, 201);
    }

    // Método para atualizar um evento existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string',
            'descricao' => 'required|string',
            'data' => 'required|date',
            // Adicione outras validações conforme necessário
        ]);

        $evento = Evento::find($id);

        if (!$evento) {
            return response()->json(['message' => 'Evento não encontrado'], 404);
        }

        $evento->update($request->all());

        return response()->json($evento);
    }

    // Método para excluir um evento
    public function destroy($id)
    {
        $evento = Evento::find($id);

        if (!$evento) {
            return response()->json(['message' => 'Evento não encontrado'], 404);
        }

        $evento->delete();

        return response()->json(['message' => 'Evento excluído com sucesso']);
    }
}
