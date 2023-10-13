<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Notes;
use App\Models\User;

class NoteContent extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $with = [
        'note'
    ];

    public function note()
    {
        return $this->belongsTo(Notes::class);
    }
}
