<?php

namespace App\Http\Controllers;

use App\Models\Tappa;
use Illuminate\Http\Request;

class TappaController extends Controller
{
    public function index()
    {
        return Tappa::all();
    }

    public function show($id)
    {
        return Tappa::with('note', 'valutazioni')->findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'giornata_id' => 'required|exists:giornate,id',
            'titolo' => 'required|string|max:255',
            'descrizione' => 'nullable|string',
            'immagine' => 'nullable|string',
            'latitudine' => 'required|numeric',
            'longitudine' => 'required|numeric',
        ]);

        $tappa = Tappa::create($request->all());

        return response()->json($tappa, 201);
    }

    public function update(Request $request, $id)
    {
        $tappa = Tappa::findOrFail($id);

        $request->validate([
            'giornata_id' => 'required|exists:giornate,id',
            'titolo' => 'required|string|max:255',
            'descrizione' => 'nullable|string',
            'immagine' => 'nullable|string',
            'latitudine' => 'required|numeric',
            'longitudine' => 'required|numeric',
        ]);

        $tappa->update($request->all());

        return response()->json($tappa, 200);
    }

    public function destroy($id)
    {
        $tappa = Tappa::findOrFail($id);
        $tappa->delete();

        return response()->json(null, 204);
    }
}