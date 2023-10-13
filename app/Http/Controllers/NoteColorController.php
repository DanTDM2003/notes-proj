<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;

class NoteColorController extends Controller
{
    public function update(Notes $note)
    {
        $note->update(request()->all());

        return back();
    }
}
