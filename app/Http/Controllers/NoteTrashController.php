<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;

class NoteTrashController extends Controller
{
    public function index()
    {
        return view('notes.index', [
            'notes' => Notes::latest()->where('state', '=', 'deleted')->filter(request(['search', 'category']))->paginate(8)->withQueryString()
        ]);
    }

    public function update(Notes $note)
    {
        $note->update(['state' => 'deleted']);
        return redirect('/notes')->with('success', 'Successfull move a note to trash');
    }

    public function revive(Notes $note)
    {
        $note->update(['state' => null]);
        return redirect('/notes');
    }
}
