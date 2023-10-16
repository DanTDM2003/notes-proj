<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;
use App\Models\NoteContent;

class NoteContentController extends Controller
{
    public function store(Notes $note)
    {
        $attributes = request()->all();
        $attributes['note_id'] = $note->id;

        NoteContent::create($attributes);

        return back();
    }

    public function delete(NoteContent $content)
    {
        $content->delete();
        return back();
    }

    public function update(NoteContent $content)
    {
        $attributes = request()->validate([
            'content' => 'required|min:1|max:45'
        ]);;
        $content->update($attributes);
        return back();
    }
}