<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Notes;

class Category extends Model
{
    use HasFactory;

    public function note()
    {
        return $this->hasMany(Notes::class);
    }
}
