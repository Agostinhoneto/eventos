<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssentoReservado;
use App\Models\AssentosReservado;

class AssentoReservadoController extends Controller
{
    // Method to display all reserved seats
    public function index()
    {
        $assentosReservados = AssentosReservado::all();
        return response()->json($assentosReservados);
    }

    // Method to display a specific reserved seat
    public function show($id)
    {
        $assentoReservado = AssentosReservado::find($id);

        if (!$assentoReservado) {
            return response()->json(['message' => 'Assento reservado não encontrado'], 404);
        }

        return response()->json($assentoReservado);
    }

    // Method to create a new reserved seat
    public function store(Request $request)
    {
        $request->validate([
            'assento_id' => 'required|exists:assentos,id',
            'nome_cliente' => 'required|string',
            'email_cliente' => 'required|email',
            // Add other validations as needed
        ]);

        $assentoReservado = AssentosReservado::create($request->all());

        return response()->json($assentoReservado, 201);
    }

    // Method to update an existing reserved seat
    public function update(Request $request, $id)
    {
        $request->validate([
            'assento_id' => 'required|exists:assentos,id',
            'nome_cliente' => 'required|string',
            'email_cliente' => 'required|email',
            // Add other validations as needed
        ]);

        $assentoReservado = AssentosReservado::find($id);

        if (!$assentoReservado) {
            return response()->json(['message' => 'Assento reservado não encontrado'], 404);
        }

        $assentoReservado->update($request->all());

        return response()->json($assentoReservado);
    }

    // Method to delete a reserved seat
    public function destroy($id)
    {
        $assentoReservado = AssentosReservado::find($id);

        if (!$assentoReservado) {
            return response()->json(['message' => 'Assento reservado não encontrado'], 404);
        }

        $assentoReservado->delete();

        return response()->json(['message' => 'Assento reservado excluído com sucesso']);
    }
}
