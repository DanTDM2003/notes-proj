<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\NoteContent;

class NotesController extends Controller
{
    public function index()
    {
        return view('notes.index', [
            'notes' => Notes::latest()->whereNull('state')->filter(request(['search', 'category']))->paginate(8)->withQueryString()
        ]);
    }

    public function show(Notes $note)
    {
        return view('notes.show', [
            'note' => $note
        ]);
    }

    public function store()
    {
        $attributes = Validator::make(request()->all(), [
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('notes')->where(fn($query) => $query->where('user_id', auth()->id())->where('slug', request('slug')))],
            'title' => ['required', Rule::unique('notes')->where(fn($query) => $query->where('user_id', auth()->id())->where('title', request('title')))],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        if($attributes->fails()) {
            return redirect('/notes')->with('fail', 'Fail to create a new post');
        }

        $attributes = $attributes->getData();
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        $attributes['border_color'] = "#9A4444";
        $attributes['background_color'] = "#DE8F5F";
        $attributes['title_color'] = "#000000";
        $attributes['content_color'] = "#000000";
        Notes::create($attributes);

        return redirect('/notes')->with('success', 'Successfully create a new post');
    }

    public function update(Notes $note)
    {
        $attributes = Validator::make(request()->all(), [
            'thumbnail' => 'image',
            'slug' => ['required', Rule::unique('notes')->where(fn($query) => $query->where('user_id', auth()->id())->where('slug', request('slug')))->ignore($note->id)],
            'title' => ['required', Rule::unique('notes')->where(fn($query) => $query->where('user_id', auth()->id())->where('title', request('title')))->ignore($note->id)],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        if($attributes->fails()) {
            return redirect('/notes')->with('fail', 'Fail to update a post');
        }
        $attributes = $attributes->getData();
        if (isset($attributes['thumbnail'])){
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }
        
        $note->update($attributes);

        return redirect('/notes')->with('success', 'Successfully update a post');
    }

    public function edit(Notes $note)
    {
        return view('notes.edit', [
            'note' => $note
        ]);
    }

    public function destroy(Notes $note)
    {
        NoteContent::where('note_id', $note->id)->delete();
        $note->delete();

        return redirect('/notes')->with('success', "Successfully delete a note");
    }
}
