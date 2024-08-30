<?php

namespace App\Http\Controllers;

use App\Models\Valutazione;
use Illuminate\Http\Request;

class ValutazioneController extends Controller
{
    public function index()
    {
        return Valutazione::all();
    }

    public function show($id)
    {
        return Valutazione::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tappa_id' => 'required|exists:tappe,id',
            'valutazione' => 'required|integer|min:1|max:5',
        ]);

        $valutazione = Valutazione::create($request->all());

        return response()->json($valutazione, 201);
    }

    public function update(Request $request, $id)
    {
        $valutazione = Valutazione::findOrFail($id);

        $request->validate([
            'tappa_id' => 'required|exists:tappe,id',
            'valutazione' => 'required|integer|min:1|max:5',
        ]);

        $valutazione->update($request->all());

        return response()->json($valutazione, 200);
    }

    public function destroy($id)
    {
        $valutazione = Valutazione::findOrFail($id);
        $valutazione->delete();

        return response()->json(null, 204);
    }
}
