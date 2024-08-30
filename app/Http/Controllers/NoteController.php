<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        return Note::all();
    }

    public function show($id)
    {
        return Note::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tappa_id' => 'required|exists:tappe,id',
            'contenuto' => 'required|string',
        ]);

        $note = Note::create($request->all());

        return response()->json($note, 201);
    }

    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);

        $request->validate([
            'tappa_id' => 'required|exists:tappe,id',
            'contenuto' => 'required|string',
        ]);

        $note->update($request->all());

        return response()->json($note, 200);
    }

    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        return response()->json(null, 204);
    }
}