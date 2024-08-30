<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Viaggio;

class ViaggioController extends Controller
{
    public function index()
    {
        return Viaggio::all();
    }

    public function show($id)
    {
        return Viaggio::with('giornate.tappe.note', 'giornate.tappe.valutazioni')->findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_viaggio' => 'required|string|max:255',
            'descrizione' => 'nullable|string',
            'data_inizio' => 'required|date',
            'data_fine' => 'required|date',
        ]);

        $viaggio = Viaggio::create($request->all());

        return response()->json($viaggio, 201);
    }

    public function update(Request $request, $id)
    {
        $viaggio = Viaggio::findOrFail($id);

        $request->validate([
            'nome_viaggio' => 'required|string|max:255',
            'descrizione' => 'nullable|string',
            'data_inizio' => 'required|date',
            'data_fine' => 'required|date',
        ]);

        $viaggio->update($request->all());

        return response()->json($viaggio, 200);
    }

    public function destroy($id)
    {
        $viaggio = Viaggio::findOrFail($id);
        $viaggio->delete();

        return response()->json(null, 204);
    }
}
