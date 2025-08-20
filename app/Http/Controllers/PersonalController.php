<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    // Listar todos los registros
    public function index()
    {
        return Personal::all();
    }

    // Crear un nuevo registro
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:personals,email',
            'telefono' => 'nullable|string|max:20',
        ]);

        $personal = Personal::create($request->all());

        return response()->json($personal, 201);
    }

    // Mostrar un registro específico
    public function show($id)
    {
        return Personal::findOrFail($id);
    }

    // Actualizar un registro
    public function update(Request $request, $id)
    {
        $personal = Personal::findOrFail($id);
        $personal->update($request->all());

        return response()->json($personal, 200);
    }

    // Eliminar un registro
    public function destroy($id)
    {
        $personal = Personal::findOrFail($id);
        $personal->delete();

        return response()->json(null, 204);
    }
}
