<?php

namespace App\Http\Controllers;

use App\Models\Giornata;
use Illuminate\Http\Request;

class GiornataController extends Controller
{
    public function index()
    {
        return Giornata::all();
    }

    public function show($id)
    {
        return Giornata::with('tappe.note', 'tappe.valutazioni')->findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'viaggio_id' => 'required|exists:viaggi,id',
            'data' => 'required|date',
            'descrizione' => 'nullable|string',
        ]);

        $giornata = Giornata::create($request->all());

        return response()->json($giornata, 201);
    }

    public function update(Request $request, $id)
    {
        $giornata = Giornata::findOrFail($id);

        $request->validate([
            'viaggio_id' => 'required|exists:viaggi,id',
            'data' => 'required|date',
            'descrizione' => 'nullable|string',
        ]);

        $giornata->update($request->all());

        return response()->json($giornata, 200);
    }

    public function destroy($id)
    {
        $giornata = Giornata::findOrFail($id);
        $giornata->delete();

        return response()->json(null, 204);
    }
}
